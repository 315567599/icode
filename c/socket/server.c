#include <string.h>
#include <errno.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netinet/ip.h>
#include <netdb.h>

#define MAXLINE 4096

int
main(int argc, char *argv[])
{
	int listen_fd, conn_fd;
	struct sockaddr_in server_addr;

	char buf[MAXLINE];

	if((listen_fd = socket(AF_INET, SOCK_STREAM, 0)) == -1){
		printf("create socket error: %s(errno:%d)\n", strerror(errno), errno);
		exit(0);
	}

	memset(&server_addr, 0, sizeof(server_addr));
	server_addr.sin_family = AF_INET;
	server_addr.sin_addr.s_addr = INADDR_ANY;
	server_addr.sin_port = htons(6666);

	if(bind(listen_fd, (struct sockaddr*)&server_addr, sizeof(server_addr)) == -1){
		printf("bind socket error:  %s(errno: %d)\n", strerror(errno), errno);
		exit(0);
	}

	if(listen(listen_fd, 100) == -1){
		printf("listen socket error: %s(errno: %d)\n", strerror(errno), errno);
		exit(0);
	}

	printf("=========================waiting for client's request====================\n");

	while(1){
		if((conn_fd = accept(listen_fd, (struct sockaddr*)NULL,NULL)) == -1){
			printf("accept socket error: %s(errno: %d)\n", strerror(errno), errno);
			continue;
		}

		int n = recv(conn_fd, buf,MAXLINE,0);
		buf[n] = '\0';
		printf("recv msg from client:%s\n",buf);
		close(conn_fd);
	}

	close(listen_fd);

}
