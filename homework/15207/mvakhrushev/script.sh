#!/bin/bash


TRY=0
MAX_TRY=8
TRY_LEFT=8
RAND=$RANDOM
let "RAND %= 100"

echo
echo "Try to guess my number! Enter your number, looser:"

while [ "$TRY" -lt $MAX_TRY ]
do
	read
	if [ "$REPLY" -eq $RAND ]
		then
			echo "Correct!"
			exit 0
		else
			let "TRY_LEFT -= 1"
			if [ "$REPLY" -gt $RAND ]
				then echo "Incorrect! Conceived number is lower!";
				else echo "Incorrect! Conceived number is bigger!"
			fi 
			echo "$TRY_LEFT attempts left..."
			let "TRY += 1"
	fi
done

echo "LOOSER! Correct answer - $RAND"
echo
exit 0
