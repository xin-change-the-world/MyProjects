#!/usr/bin/env python
#coding=utf-8
"""
The wiki from https://github.com/PyMySQL/PyMySQL/wiki/WhyPyMySQL
Why PyMySQL?

It's pure Python and runs anywhere Python does. 
This includes Python 2.4 through the latest Python 3, 
the Java VM, or .NET. No C compilation required, so no headaches on Mac OS X or Windows.

It's also a drop-in replacement for the standard way of connecting to MySQL in Python, MySQLdb. 
Just put the following code at the very top of your Python program:
import pymysql
pymysql.install_as_MySQLdb()

pymysql是python实现的非阻塞的mysql驱动，适用于gevent
"""
from gevent.pool import Pool

__version__ = '0.1'

class PyMySQLPoolError(Exception):
    """General MySQLPool error."""

class InvalidConnection(PyMySQLPoolError):
    """Database connection is invalid."""

class TooManyConnections(PyMySQLPoolError):
    """Too many database connections were opened."""

class PyMySQLPool(object):
    """Pool for pymysql

    """

    version = __version__

    def __init__(self, min):
        self.pool = Pool(10)
        self.pool.start()

    def addConnection(self, db):
        while True:
            db.recv()

    def add_handler(self, socket):
        if self.pool.full():
            raise Exception("At maximum pool size")
        else:
            self.pool.spawn(self.addConnection, socket)

    def shutdown(self):
        self.pool.kill()
