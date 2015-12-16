#!/bin/bash



let "TMP=$RANDOM % 100"

counter=8

while [ $counter -ne 0 ]
do
	echo "ostalos popitok: $counter"
	read ch

	if [ $ch -lt $TMP ]
	then echo "Beri bolshe"
	else
		if [ $ch -gt $TMP ]
		then echo "beri menshe"
		else
			echo "ugadal"
			exit 0
		fi
	fi
	let "counter-=1"
done
echo "ne poluchios. chislo bilo $TMP"

