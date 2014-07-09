#!/usr/bin/env python
#coding=utf-8

import gevent
import urllib2
import time
import MySQLdb, pymysql
pymysql.install_as_MySQLdb()
#import MySQLdb
from DBUtils import PooledDB  
import gevent.monkey
gevent.monkey.patch_socket()

DB_CONFIG = {'host':'127.0.0.1',
            'port': 3306,
            'user':'root',
            'passwd':'',
            'db':'data_center',
            'charset':'utf8'}
'''
pool = PooledDB.PooledDB(MySQLdb,100,50,100,490,False,
host='localhost',user='root',passwd='',db='test',
charset='utf8')   
'''
def fetch(pid):
    print ("Process %s: start work" % (pid))
    
    db = pymysql.connect(host = 'localhost', passwd = '', user = 'root', db= 'test')
    cursor = db.cursor()
    cursor.execute("SELECT * FROM test.userinfo WHERE username LIKE '%T084DKt0mu%'")
    for c in cursor:
        print c
    cursor.close()
    db.close()
    '''
    gevent.sleep(0)
    connect =  pool.connection()
    cursor = connect.cursor()
    cursor.execute("SELECT * FROM test.userinfo WHERE username LIKE '%T084DKt0mu%'")
    for c in cursor:
        print c
    cursor.close()
    '''
    print('Process %s: end work' % (pid))
    return pid

def asynchronous():
    i = 0
    jobs = []
    for i in range(0, 50):
        jobs.append(gevent.spawn(fetch, i))
    gevent.joinall(jobs)
    value = []
    for job in jobs:
        print job.value
        value.append(job.value)

start = time.time()
print('Asynchronous:')
asynchronous()
stop = time.time()
print stop-start