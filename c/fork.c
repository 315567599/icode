#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>

int
main(void)
{
	pid_t pid; //pid 表示fork 函数的返回值
	pid = fork();

	if (pid < 0) {
		printf("fork error");
	}

	if (pid == 0) { //child process
		printf("Child process, pid:%d, parent process id:%d\n", getpid(), getppid());
		sleep(10);
		exit(0);
	}

	//the parent process
	printf("Parent process,pid:%d, parent process id :%d\n", getpid(), getppid());
	int child_pid;
	int tmp;

	while (1) {
		if ((child_pid = wait3(&tmp, 1, NULL)) != 0) {
			printf("收到子进程信号，子进程id:%d\n", child_pid);
			break;
		} else {
			printf("还没有收到子进程的信号\n");
			sleep(2);
		}
	}

	return 0;
}
