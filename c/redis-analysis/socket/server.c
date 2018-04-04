#include "anet.h"
#include <string.h>

#define MAX_BUF_SIZE 100
int
main(int argc, char *argv)
{
	char err_buf[MAX_BUF_SIZE];	
	int server_fd;

	if ((server_fd = anetTcpServer(err_buf, 5555, "127.0.0.1")) == ANET_ERR) {
		printf("anetTcpServer error: %s \n", err_buf);
	}
	printf("tcp server start,fd: %d \n", server_fd);
	for(;;){
		int accept_fd;
		char client_ip[30];
		int  client_port;
		int client_msg[MAX_BUF_SIZE];

		if ((accept_fd = anetAccept(err_buf, server_fd, client_ip, &client_port))== ANET_ERR){
			printf("anetAccept error: %s \n", err_buf);
		}
		printf("accept_fd: %d\n", accept_fd);
		
		while (1) {
			read(accept_fd, client_msg, 20);
			printf("client_ip:%s\n, client_port:%d\n, client_msg:%s\n", client_ip, client_ip, client_msg);
			anetWrite(accept_fd, "received!\n", 20);
		}

	}
}

