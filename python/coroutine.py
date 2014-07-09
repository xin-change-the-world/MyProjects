#!/usr/bin/env python
# -*- coding: utf-8 -*- 

def foo():
	for i in range(10):
		yield i
		print "foo：主控又回到我手上了，打我啊笨蛋。"
bar = foo()
# 执行coroutine
print bar.next()
print "main：现在主控权在我们手上，做点难事。"
print "main：hello baby！"
# 回到刚才foo这个coroutine中断的地方继续执行
print bar.next()
print bar.next()