定时执行任务，如果此任务在执行中，则不执行
*/1 * * * * /bin/ps aux|grep rsyncFile.py|grep -v grep||/usr/bin/python /usr/home/xin/rsyncFile.py
