struct epoll_event ev, events[MAX_EVENTS];

int listen_sock, nfds, epollfd;

/* Set up listening socket, 'listen_sock' (socket(),bind(), listen()) */

/* 1. 创建一个epoll描述符 */

epollfd = epoll_create(10);



ev.events = EPOLLIN;

ev.data.fd = listen_sock;



/* 2. 注册监听事件 */

epoll_ctl(epollfd, EPOLL_CTL_ADD, listen_sock, &ev);

for (;;) {

	/* 3. 监听事件 */

	nfds = epoll_wait(epollfd, events, MAX_EVENTS, -1);

	/* 4. 处理事件 */

	for (n = 0; n < nfds; ++n) {

		if (events[i].data.fd == listener_fd) {

			HandleAccept(events[i].data.fd);

			continue;

		}



		if (events[i].events & EPOLLIN) {

			HandleRead(events[i].data.fd);

		}

		if (events[i].events & EPOLLOUT) {

			HandleWrite(events[i].data.fd);

		}

	}

}
