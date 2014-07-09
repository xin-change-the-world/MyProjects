import gevent
from gevent.queue import Queue
import time
tasks = Queue()

def worker(n):
    while not tasks.empty():
        task = tasks.get()
        print('Worker %s got task %s' % (n, task))
        gevent.sleep(0)
        time.sleep(1)

    print('Quitting time!')

def boss(t):
    print t
    for i in xrange(1,100):
        tasks.put_nowait(i)

gevent.spawn(boss,'a').join()

gevent.joinall([
    gevent.spawn(worker, 'steve'),
    gevent.spawn(worker, 'john'),
    gevent.spawn(worker, 'nancy'),
])