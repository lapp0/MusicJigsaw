import MySQLdb
import time
while True:
        #wait 100 seconds between
        time.sleep(1)
        #store last looked at location in bar DB


        f = open("lastindex.txt", "r+")

        db = MySQLdb.connect("localhost","root","password","jigsaw")
        cursor = db.cursor()
        size = str(cursor.execute("SELECT * FROM  `user_rating` WHERE  `bar_id` IS NOT NULL"))
        currentindex = f.readline().split("\n")[0]
	f.truncate()
	f.write(size)

        #every (arbitrary time) 100s look at all new submissions
	for i in range(int(currentindex), int(size)):
		val = cursor.execute("SELECT `bar_rating` FROM  `user_rating` WHERE `bar_id` =`" + str(i) + "`")
		print(str(val))
#import time
#while True:
        #wait 100 seconds between
      #  time.sleep(1)
        #store last looked at location in bar DB


     #   f = open("lastindex.txt", "r+")

    #    db = MySQLdb.connect("localhost","root","password","jigsaw")
   #     cursor = db.cursor()
  #      size = cursor.execute("SELECT * FROM  `user_rating` WHERE  `bar_id` IS NOT NULL")
 #       print(size)
#	f.truncate()
#	f.write(size)
#	index = f.readline().split("\n")[0]
#
#	for i in range(int(index), int(size)):
#		import MySQLdb
#import time
#while True:
        #wait 100 seconds between
#        time.sleep(1)
        #store last looked at location in bar DB


#        f = open("lastindex.txt", "r+")

#        db = MySQLdb.connect("localhost","root","password","jigsaw")
#        cursor = db.cursor()
#        size = cursor.execute("SELECT * FROM  `user_rating` WHERE  `bar_id` IS NOT NULL")
#        print(size)

        #every (arbitrary time) minute look at all new submissions


        #if there is a song with a high rating (3 or higher) view metadata

        #The likelyhood of an item showing up is effected linearly by their rating,
        #therefore the improvement to their score is divided by their rating. It is
        #so their given rating (from form) is divided by their current rating (from DB)
        #and added to their current rating (from DB)
        #addition of chords and times also added by number of chords in bar
#import MySQLdb
#import time
#while True:
        #wait 100 seconds between
      #  time.sleep(1)
        #store last looked at location in bar DB


        #f = open("lastindex.txt", "r+")

        #db = MySQLdb.connect("localhost","root","password","jigsaw")
        #cursor = db.cursor()
        #size = cursor.execute("SELECT * FROM  `user_rating` WHERE  `bar_id` IS NOT NULL")
       # print(size)

        #every (arbitrary time) minute look at all new submissions


        #if there is a song with a high rating (3 or higher) view metadata

        #The likelyhood of an item showing up is effected linearly by their rating,
        #therefore the improvement to their score is divided by their rating. It is
        #so their given rating (from form) is divided by their current rating (from DB)
        #and added to their current rating (from DB)
        #addition of chords and times also added by number of chords in bar


        #if there is a song with a high rating (3 or higher) view metadata

        #The likelyhood of an item showing up is effected linearly by 
