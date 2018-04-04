enum hdfsStreamType
{
    HDFS_STREAM_UNINITIALIZED = 0,
    HDFS_STREAM_INPUT = 1,
    HDFS_STREAM_OUTPUT = 2,
};

struct hdfsFile_internal {
    void* file;
    enum hdfsStreamType type;
    int flags;
};


if (!file || file->type == HDFS_STREAM_UNINITIALIZED) {
	errno = EBADF;
	return -1;
}

/**********************************/
void main( ) 
{ 
    enum weekday {sun,mon,tue,wed,thu,fri,sat} day； 
       int k； 
        printf("input a number(0--6)")； 
        scanf("%d",&k)； 
        day=(enum weekday)k； 
        switch(day) 
        { 
            case sun： printf("sunday/n")；break； 
                case mon： printf("monday/n")；break； 
                case tue： printf("tuesday/n")；break； 
                case wed： printf("wednesday/n")；break； 
                case thu： printf("thursday/n")；break； 
                case fri： printf("friday/n")；break； 
                case sat： printf("satday/n")；break； 
                default： printf("input error/n")；break； 
        } 
} 
/*
程序运行结果为： 
input a number(0--6)1 
monday 
*/
