MusicJigsaw
===========

Originally started as project for Midwest Facebook Hackathon by team members Andrew, Lei, Darren and Ding

"Using crowdsourcing and an evolutionary algorithm to help a computer generate music."

Interface:

User is goes to home page and is given a "bar" (4 second series of chords/notes) to rate.

They rate 5 total until a "movement" (40 second series of bars) loads, and they rate that.

They are given the option to view the most popular movements, FAQ and website statistics.


Backend:

All ratings are stored in a SQL DB.

All bars served to users are either randomly generated from a series of chords/notes, modified from an existing bar or is an existing bar being re-rated.

All melodies are the same except instead of being a series of chords/notes, they are a series of bars.

High rated bars and melodies are kept to be re-rated or modified in an evolutionary algorithm. Low rated bars and melodies are unlikely to be re-rated or modified.


Complete:

Scraped pianochord.com for over 100 chords into file

Random chord retriever from file

Made random bar generator

Add user ratings to DB

Make frontend getting bars from bar serving queue

Have script populate queue with bar mp3s


TODO:

Make random melody generator

Make weighted chord/tempo, bar and melody generator (more popular chords/tempos and bars, more likely to be used in bars and melodies respecively)

Have script populate queue with melody mp3s

Make bar and melody modification algorithm 

Sequence ratings (see which sequences of two bars fit together well and give them a higher weight)

Analytics: how many times something has been rated, what makes it up, etc.

Fix multi-octave chord/note generation

Fix meta-data (data used to make mp3) generation and storage

Fix other poorly written backend components

Secure front-end components
