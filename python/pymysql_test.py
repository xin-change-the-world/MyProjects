#/usr/bin/python
#encoding=utf-8
'''
#
#
# pymysql使用示例
# Auther：xin.change.the.world@gmail.com
# Date：2014-07-07
# Version: 1.0
#
'''
import MySQLdb, pymysql
pymysql.install_as_MySQLdb()
import MySQLdb.cursors

DB_CONFIG = {'host':'127.0.0.1',
            'port': 3306,
            'user':'root',
            'passwd':'',
            'db':'test',
            'charset':'utf8'}
conn = pymysql.connect(host='127.0.0.1', user='root', passwd=None, db='test')
# conn = pymysql.connect(host='127.0.0.1', port=3306, user='root', passwd=None, db='mysql')
cur = conn.cursor()
data = [{'id':6,'name':'f'},{'id':7,'name':'g'},{'id':8,'name':'g'},{'id':9,'name':'g'},{'id':10,'name':'g'}]
iter(data)
next(data)
#data = ((6,'f'),(7,'f'),(8,'f'),(9,'f'),(10,'f'),)
cur.executemany("INSERT INTO test.test VALUES (%s, %s)", data)
conn.commit()#没有提交的话，无法插入
# print cur.description
# r = cur.fetchall()
# print r
# ...or...
for r in cur:
   print r

cur.close()
conn.close()