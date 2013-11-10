#function to get chord from scrapednotes
def getchord():
	chordDB = open("ScrapedNotes.txt", "r")
	chords = chordDB.readlines()
	
	#get how many lines there are
	numlines = int(chords[0].split(" ")[0])
	rn = random.randint(1,numlines)
	
	return chords[rn]
