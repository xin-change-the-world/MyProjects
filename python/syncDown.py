#!/usr/bin/python
# # -*- coding: utf-8 -*- 
urls = [ 'http://www.google.com', 'http://www.baidu.com', 'http://www.python.org' ]
import time
import gevent
from gevent import monkey
monkey.patch_all()

import urllib2

def print_head(url):
	print '[%s]:Starting %s' % (time.strftime('%Y-%m-%d %H:%M:%S'), url)
	data = urllib2.urlopen(url).read()
	print '%s: %s bytes: %r' % (url, len(data), data[:50])

jobs = [gevent.spawn(print_head, url) for url in urls]
gevent.joinall(jobs)