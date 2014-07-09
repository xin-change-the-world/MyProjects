#/usr/bin/python
#encoding=utf-8
'''
#
#
# 数据库连接池
# Auther：张广欣
# Date：2014-07-01
# Version: 1.0
#
'''
from DBUtils.PooledDB import PooledDB
import MySQLdb
import MySQLdb.cursors
import logging
import datetime 

'''
dbapi ：数据库接口
mincached ：启动时开启的空连接数量
maxcached ：连接池最大可用连接数量
maxshared ：连接池最大可共享连接数量
maxconnections ：最大允许连接数量
blocking ：达到最大数量时是否阻塞
maxusage ：单个连接最大复用次数
setsession ：用于传递到数据库的准备会话，如 [”set name UTF-8″] 。

使用示例
db=pooled.connection()
cur=db.cursor()
cur.execute(...)
    =cur.fetchone()
cur.close() # or del cur
db.close() # or del db
'''
class DBPool(object):

    def __init__(self, DBConfig):
        try:
            self._pool = PooledDB(
                MySQLdb, 
                mincached=10, 
                maxcached=100, 
                maxshared=100,
                maxusage=5,
                blocking=True,
                host=DBConfig['host'],
                port=DBConfig['port'], 
                user=DBConfig['user'],
                passwd=DBConfig['passwd'],
                db=DBConfig['db'],
                charset=DBConfig['charset'],
                local_infile = 1,
                cursorclass = MySQLdb.cursors.DictCursor )

        except Exception, e:
            ExcPlus()

    def getConnection(self):
        '''获取数据库连接'''
        return self._pool.connection()

    def shutdownAllConnection(self):
        '''关闭所有连接'''
        for conn in self._pool:
            conn.close()

class MySQL(object):
    '''对MySQLdb常用函数进行封装的类'''
    
    error_code = '' #MySQL错误号码

    _conn = None # 数据库conn
    _cur = None #游标
        
    def __init__(self, connect):
        u'构造器：根据数据库连接参数，创建MySQL连接'
        try:
            self._conn = connect
        except Exception, e:
            ExcPlus()
        
        self._cur = self._conn.cursor()

    def selectDB(self, sql):
        u'切换数据库'
        self._conn.select_db(sql)
        
    def query(self,sql):
        u'执行 SELECT 语句'     
        try:
            #self._cur.execute("SET NAMES utf8") 
            result = self._cur.execute(sql)
        except MySQLdb.Error, e:
            self.error_code = e.args[0]
            print "数据库错误代码:",e.args[0],e.args[1]
            ExcPlus()
            result = False
        return result

    def update(self,sql):
        u'执行 UPDATE 及 DELETE 语句'
        try:
            self._cur.execute("SET NAMES utf8") 
            result = self._cur.execute(sql)
            self._conn.commit()
        except MySQLdb.Error, e:
            self.error_code = e.args[0]
            print "数据库错误代码:",e.args[0],e.args[1]
            ExcPlus()
            result = False
        return result
        
    def insert(self,sql):
        u'执行 INSERT 语句。如主键为自增长int，则返回新生成的ID'
        try:
            self._cur.execute("SET NAMES utf8")
            self._cur.execute(sql)
            self._conn.commit()
            return self._conn.insert_id()
        except MySQLdb.Error, e:
            self.error_code = e.args[0]
            ExcPlus()
            return False
    
    def fetchAllRows(self):
        u'返回结果列表'
        return self._cur.fetchall()

    def fetchOneRow(self):
        u'返回一行结果，然后游标指向下一行。到达最后一行以后，返回None'
        return self._cur.fetchone()
 
    def getRowCount(self):
        u'获取结果行数'
        return self._cur.rowcount
                            
    def commit(self):
        u'数据库commit操作'
        self._conn.commit()
                        
    def rollback(self):
        u'数据库回滚操作'
        self._conn.rollback()
             
    def __del__(self): 
        u'释放资源（系统GC自动调用）'
        try:
            self._cur.close() 
            self._conn.close() 
        except:
            pass
        
    def close(self):
        u'关闭本次连接'
        self.__del__()

'''
DB_CONFIG = {'host':'localhost',
            'port': 3306,
            'user':'root',
            'passwd':'',
            'db':'data_center',
            'charset':'utf8'}
DBConnect = DBPool(DB_CONFIG)


import multiprocessing
from MultiProcess import Worker, WorkerManager

def test_job(id, msg, sleep = 0.001):   
    db = MySQL(DBConnect.getConnection())
    import time
    #time.sleep(5)
    db.query("SELECT * FROM test.userinfo")
    data = db.fetchAllRows()
    print data

    return id
def test(msg):   
    import socket   
    socket.setdefaulttimeout(10)   
    print 'start testing'    
    wm = WorkerManager(10)   
    for i in range(10):    
        wm.add_job( test_job, i, msg, i*0.001)    
    wm.wait_for_complete()   
    print 'end testing'
    return "%s res    " % msg  


pool = multiprocessing.Pool(processes=4)
result = []
for i in xrange(10):
    msg = "process %d" % i
    result.append(pool.apply_async(test,(msg, )))
pool.close()
pool.join()

for res in result:
    print res.get()
    print "Sub-porcess(es) done."
'''