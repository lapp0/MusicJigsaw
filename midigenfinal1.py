from pyknon.genmidi import Midi
from pyknon.music import NoteSeq
from random import randint
import os

Bar = 1
soundfont="soundfont.sf2"
E=['A','B','C','D','E','F','G']
F=['#','b','']
G=[1, 2, 2, 4, 4, 4, 4, 8, 8, 8, 8, 8, 8, 8, 8, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16]
H=[',', '', "''"]
dataBaseNotesLow=[(e+f+str(g)+H[randint(0,1)],1.0/g) for e in E for f in F for g in G]
dataBaseNotesHigh=[(e+f+str(g)+H[randint(1,2)],1.0/g) for e in E for f in F for g in G]
dataChords=open("ScrapedNotes.txt",'r')
dataBaseChords=[line.split(" ")[:-1] for line in dataChords]

def generateNotesSeq(length,dataBase):
	generateList=[]
	currentLength=0
	while currentLength<length:
		threshold=randint(0,5)
		index=randint(0,len(dataBase)-1)
		if length-currentLength>=dataBase[index][1]:
			generateList.append(dataBase[index][0]+" ")
			currentLength+=dataBase[index][1]
	generateSq="".join(generateList)
	return generateSq

def generatingBarsNotes(length,dataBase,bars=Bar):
	barSeq=""
	for i in range(bars):
		barSeq=barSeq+generateNotesSeq(length,dataBase)
	return NoteSeq(barSeq)

def generatingChords(length,dataBase):
	generateList=[]
	currentLength=0
	while currentLength<length:
		index=randint(0,len(dataBase)-1)
		time=[1, 2, 4, 8, 16]
		t=time[randint(0,len(time)-1)]
		if length-currentLength>=1.0/t:
			#print "".join([s+str(t)+" " for s in dataBase[index]])
			generateList.append(NoteSeq("".join([s+str(t)+H[randint(0,2)]+" " for s in dataBase[index]])))
			currentLength+=1.0/t
	return generateList

def generatingBarChords(length,dataBase, bars=Bar):
	barSeq=[]
	for i in range(bars):
		barSeq=barSeq+generatingChords(length,dataBase)
	return barSeq


def generatingFile(length,name):
	"""
	Generating with 3 track, one with chords one with high single notes one with low single notes
	length: who long one bar can be,example 1:4/4 0.75:3/4 0.5:2/5 
	"""
	midi = Midi(3, tempo=60)
	barSeqnotesLow=generatingBarsNotes(length,dataBaseNotesLow)
	barSeqnotesHigh=generatingBarsNotes(length,dataBaseNotesHigh)
	barSeqchords=generatingBarChords(length,dataBaseChords)
	#metadata = barSeqnotesLow + "\n" + barSeqnotesHigh + "\n" + barSeqchords + "\n"
	midi.seq_notes(barSeqnotesLow,track=0)
	midi.seq_notes(barSeqnotesHigh,track=1)
	midi.seq_chords(barSeqchords,track=2)
	midi.write(name+".mid")
	os.system('fluidsynth -F %s.wav %s %s.mid' %(name,soundfont,name))
	os.system('lame --preset insane %s.wav' %name)
	os.system('rm -Rf %s.wav' %name)
	#os.system('timidity -Or -o - %s.mid | lame -r - %s.mp3' %(name, name))
	os.system('rm -Rf %s.mid' %name)
	#return metadata
