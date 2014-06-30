#!/usr/bin/env python
# -*- coding: utf-8 -*- 
import gevent
from gevent import Timeout

seconds = 10
timeout = Timeout(seconds)
timeout.start()

def wait():
	gevent.sleep(2)

def w2():
	print("ddddddddd")
try:
    gevent.joinall([gevent.spawn(wait),gevent.spawn(w2),])

except Timeout:
	print('Could not complete')