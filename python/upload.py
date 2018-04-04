#!/opt/python/bin/python
import argparse, os
import commands
import ess
import time
import logging
from datetime import timedelta, datetime

yesterday = datetime.today() + timedelta(-1)
yesterday_format = yesterday.strftime('%Y%m%d')


def log_txt(loginfo):
    logfile = '/data/scripts/logs/upload.log'
    logger = None
    logger = logging.getLogger()
    hdlr = logging.FileHandler(logfile)
    formatter = logging.Formatter("[%(asctime)s] %(message)s", "%Y-%m-%d %H:%M:%S")
    hdlr.setFormatter(formatter)
    logger.addHandler(hdlr)
    logger.setLevel(logging.DEBUG)
    logging.info(loginfo)
    logger.removeHandler(hdlr)


def getComStr(cmd):
    try:
        stat, proStr = commands.getstatusoutput(cmd)
        return stat, proStr
    except:
        return 1, 'can not run {0} '.format(cmd)


if __name__ == '__main__':

    parser = argparse.ArgumentParser(description="your script description")
    parser.add_argument('--host', required=True, type=str)
    parser.add_argument('--upload_dir', required=True, type=str)
    args = parser.parse_args()
    host = args.host
    cmd = "find {0} -type f -mtime -1".format(args.upload_dir)
    yesterday = datetime.today() + timedelta(-1)
    yesterday_format = yesterday.strftime('%Y%m%d')
    status, result = getComStr(cmd)
    if status == 0:
        upload_ess = ess.public_bucket('opslogs')
        file_list = [x.strip() for x in result.split()]
        for m in file_list:
            if 'app' in m:
                file_key = m.replace('/data/logs/app', "{0}/{1}/shihui".format(yesterday_format, host))
            elif 'nginx' in m:
                file_key = m.replace('/data/logs/nginx', "{0}/{1}/shihui/nginx".format(yesterday_format, host))
            else:
                file_key = m.replace('/data/logs', "{0}/{1}/shihui".format(yesterday_format, host))

            if os.path.getsize(m):
                if m.endswith('.gz'):
                    t_result=getComStr('rsync -av {} /data/upload/'.format(m))
                    file_name='/data/upload/{}'.format(m.split('/')[-1])
                else:
                    tt_result=getComStr('rsync -av {} /data/upload/'.format(m))
                    t_result=getComStr('gzip /data/upload/{}'.format(m.split('/')[-1]))
                    if t_result[0]==0:
                        file_name='/data/upload/{}.gz'.format(m.split('/')[-1])
                    else:
                        file_name='/data/upload/{}'.format(m.split('/')[-1])
                result = upload_ess.uploadFile_put(file_key, file_name)
                del_result=getComStr("rm {} -f".format(file_name))
            else:
                file_name=m
                result = "size is 0"
            log_str = "{0}:{1}:{2}".format(file_name, file_key, result)
            log_txt(log_str)
    else:
        log_txt(result)
