import gevent
from gevent import monkey
gevent.monkey.patch_all()
from gevent.queue import Queue