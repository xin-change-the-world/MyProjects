#!/usr/bin/env python
#-*-coding:utf8-*-
import os
import datetime
import time

start = '2015-02-05 01:05:00'
end = '2015-02-05 01:09:59'
dir = '/data2/wd/20150204/95/'

file_list = os.listdir(dir)
file_dict = {}
file_time_list = []
for f in file_list:
    print int(os.path.getmtime(dir+f)),datetime.datetime.fromtimestamp(os.path.getmtime(dir+f)).strftime('%Y-%m-%d %H:%M:%S'),f
    f_dict = {}
    f_dict['success_time'] = datetime.datetime.fromtimestamp(os.path.getmtime(dir+f)).strftime('%Y-%m-%d %H:%M:%S')
    f_dict['file_name'] = f
    file_dict[int(os.path.getmtime(dir+f))] = f_dict
    file_time_list.append(int(os.path.getmtime(dir+f)))
print file_dict
print file_time_list
print sorted(file_time_list)
start_time = int(time.mktime(time.strptime(start,'%Y-%m-%d %H:%M:%S')))
end_time = int(time.mktime(time.strptime(end,'%Y-%m-%d %H:%M:%S')))
start_file_key = 0
end_file_key = 0
for i in file_time_list:
    if i<start_time:
        start_file_key = i
    if i>end_time:
        end_file_key = i
        break
print start
print end
print file_dict[start_file_key]
print file_dict[end_file_key]
