#!/usr/bin/env python
#coding=utf-8

import gevent
import urllib2
import time
import gevent.monkey
gevent.monkey.patch_socket()

def fetch(pid, url):
  print('Process %s: %s start work' % (pid, url))
  flag = None
  status = None
  error_msg = None
  try :
    req_obj = urllib2.Request(url)
    response = urllib2.urlopen(req_obj, timeout=10)
    status = response.code
    result = response.read()
    flag = True
  except Exception, e :
    error_msg = str(e)
    flag = False

  print('Process %s: %s %s' % (pid, url, status))
  return (pid, flag, url, status, error_msg)

def asynchronous():
  i = 0
  jobs = []
  url = 'http://107.167.184.223/'
  for i in range(0, 100) : 
    jobs.append(gevent.spawn(fetch, i, url))
  gevent.joinall(jobs)
  value = []
  for job in jobs:
 #	  print job.value
    value.append(job.value)

start = time.time()
print('Asynchronous:')
asynchronous()
stop = time.time()
print stop-start