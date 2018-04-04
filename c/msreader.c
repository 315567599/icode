//
////  从多个套接字中获取消息
////  本示例简单地再循环中使用recv函数
////
#include "zhelpers.h"

int main (void) 
{
	//  准备上下文和套接字
	void *context = zmq_init (1);

	//  连接至任务分发器
	void *receiver = zmq_socket (context, ZMQ_PULL);
	zmq_connect (receiver, "tcp://localhost:5557");

	//  连接至天气服务
	void *subscriber = zmq_socket (context, ZMQ_SUB);
	zmq_connect (subscriber, "tcp://localhost:5556");
	zmq_setsockopt (subscriber, ZMQ_SUBSCRIBE, "10001 ", 6);

	//  处理从两个套接字中接收到的消息
	//  这里我们会优先处理从任务分发器接收到的消息
	while (1) {
		//  处理等待中的任务
		int rc;
		for (rc = 0; !rc; ) {
			zmq_msg_t task;
			zmq_msg_init (&task);
			if ((rc = zmq_recv (receiver, &task, ZMQ_NOBLOCK)) == 0) {
				//  处理任务
			}
			zmq_msg_close (&task);
		}
		//  处理等待中的气象更新
		for (rc = 0; !rc; ) {
			zmq_msg_t update;
			zmq_msg_init (&update);
			if ((rc = zmq_recv (subscriber, &update, ZMQ_NOBLOCK)) == 0) {
				//  处理气象更新
			}
			zmq_msg_close (&update);
		}
		// 没有消息，等待1毫秒
		s_sleep (1);
	}
	//  程序不会运行到这里，但还是做正确的退出清理工作
	zmq_close (receiver);
	zmq_close (subscriber);
	zmq_term (context);
	return 0;
}
