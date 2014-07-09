#!/usr/bin/env python
#coding=utf-8
import logging
import datetime 

today = datetime.date.today() #获得今天的日期
yesterday = today - datetime.timedelta(days=1) #用今天日期减掉时间差，参数为1天，获得昨天的日期

#('DEBUG', 'INFO', 'WARNING', 'ERROR', 'CRITICAL').
logging.basicConfig(level=logging.DEBUG,
                format='%(asctime)s %(filename)s[line:%(lineno)d] %(levelname)s %(message)s',
                datefmt='%Y-%m-%d %H:%M:%S',
                filename='%s.log' % yesterday,
                filemode='a')
#################################################################################################
#定义一个StreamHandler，将INFO级别或更高的日志信息打印到标准错误，并将其添加到当前的日志处理对象#
console = logging.StreamHandler()
console.setLevel(logging.INFO)
formatter = logging.Formatter('%(name)-12s: %(levelname)-8s %(message)s')
console.setFormatter(formatter)
logging.getLogger('').addHandler(console)
#################################################################################################

if __name__ == '__main__':
	logger.debug("debug message")  
logger.info("info message")  
logger.warn("warn message")  
logger.error("error message") 