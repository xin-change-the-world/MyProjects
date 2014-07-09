import gevent
from gevent.queue import Queue, Empty
import MySQLdb, pymysql
pymysql.install_as_MySQLdb()
import gevent.monkey
gevent.monkey.patch_socket()

PyMysqlPool = Queue(maxsize=5)
for i in xrange(5):
    PyMysqlPool.put(pymysql.connect(host = 'localhost', user = 'guangxin', passwd = '123456', db= 'test'))

tasks = Queue(maxsize=3)

DB_CONFIG = {'host':'127.0.0.1',
            'port': 3306,
            'user':'root',
            'passwd':'',
            'db':'data_center',
            'charset':'utf8'}
def worker(n, db):
    try:
        while not PyMysqlPool.empty():

            task = tasks.get(timeout=1) # decrements queue size by 1
            print('Worker %s got task %s' % (n, task))
            #db = pymysql.connect(host = 'localhost', passwd = '', user = 'root', db= 'test')
            db = PyMysqlPool.get()
            cursor = db.cursor()
            cursor.execute("SELECT * FROM test.userinfo WHERE username LIKE '%T084DKt0mu%'")
            for c in cursor:
                print c
            cursor.close()
            #db.close()
            PyMysqlPool.put(db)
            gevent.sleep(0)
    except Empty:
        print('Quitting time!')

def boss():
    """
    Boss will wait to hand out work until a individual worker is
    free since the maxsize of the task queue is 3.
    """

    for i in xrange(1,200):
        tasks.put(i)
    print('Assigned all work in iteration 1')

    for i in xrange(10,20):
        tasks.put(i)
    print('Assigned all work in iteration 2')

gevent.joinall([ gevent.spawn(boss) ] + [ gevent.spawn(worker, i, PyMysqlPool.get()) for i in range(20) ])


for db in PyMysqlPool.get(timeout=5):
    db.close()
