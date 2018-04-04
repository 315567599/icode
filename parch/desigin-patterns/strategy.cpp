#include<iostream>  
#include<stdio.h>  
using namespace std;  

//Strategy类，定义所有支持的算法的公共接口    
class Strategy    
{    
	public:  
		virtual void algorithmInterface(){}    
};    
//ConcreteStrategy封装了具体的算法或行为，继承于Strategy    
class ConcreteStrategyA:public Strategy    
{    
	public:  
		void algorithmInterface()    
		{    
			printf("算法A实现\n");    
		}    
};    
class ConcreteStrategyB:public Strategy    
{    
	public:  
		void algorithmInterface()    
		{    
			printf("算法A实现\n");    
		}    
};    
class ConcreteStrategyC:public Strategy    
{    
	public:  
		void algorithmInterface()    
		{    
			printf("算法C实现\n");    
		}    
};    
//Context用一个ConcreteStrategy来配置，维护一个对Strategy对象的引用    
class Context    
{    
	private:  
		Strategy *strategy=new Strategy();    

	public:  
		void Context(Strategy strategy)    
		{    
			this.strategy = strategy;    
		}    
		void contextInterface()    
		{    
			strategy.algorithmInterface();    
		}    
};    
//客户端代码    
int main()    
{    
	Context *context;    
	context = new Context(new ConcreteStrategyA());    
	context->contextInterface();    

	context = new Context(new ConcreteStrategyB());    
	context->contextInterface();    

	context = new Context(new ConcreteStrategyC());    
	context->contextInterface();    

}   
