import MySQLdb
import midigenfinal1
from midigenfinal1 import generatingFile
import random
import time

dataBase=MySQLdb.connect("localhost","root","password","jigsaw")
cursor=dataBase.cursor()
jigsaw="jigsaw"


def probability(count):
	return [0.01,0.1,0.3,0.6,0.9,1.0][count]

def updatingQueue():
	while True:
		size=cursor.execute("SELECT * FROM  `bar_queue` WHERE  `bar_id` IS NOT NULL ")
		dataBase.commit()
		print size
		if size>=25:
			break
		Threashold=random.uniform(0,1)
		print Threashold
		T=True
		if Threashold<0.3:
			id=generatingNewBar()
			cursor.execute("INSERT INTO `bar_queue` (`bar_id`) VALUE (%d)"%id)
			dataBase.commit()
			T=False
		while T:
			cursor.execute("SELECT * FROM `user_rating` WHERE `bar_rating`/`count_rate_time` > 3.5")
			(id,rate,count)=cursor.fetchall()[0]
			Threashold=random.uniform(0,1)
			if (probability(count)>Threashold):
				cursor.execute("INSERT INTO `bar_queue` (`bar_id`) VALUE (%d)"%id)
				break
			dataBase.commit()

def generatingNewBar():
	size=cursor.execute("SELECT * FROM  `user_rating` WHERE  `bar_id` IS NOT NULL ")+1
	
	generatingFile(1,str(size))
	cursor.execute("INSERT INTO `user_rating` (`bar_id`,`bar_rating`,`count_rate_time`) VALUE (%d,3,0)"%size)
	dataBase.commit()
	return size

if __name__ == '__main__':
	while True:
		time.sleep(1)
		updatingQueue()
		print "Hehe"
