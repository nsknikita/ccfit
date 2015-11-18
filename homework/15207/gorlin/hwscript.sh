#!/bin/bash

I=7
let "Q = $RANDOM % 100"
echo "try to guess the number"
while [ "$I" -gt "0" ]
do
	echo "You have $I attempts"
	read U
	if [ $Q -eq $U ]
	then
		echo "Congratulations! You Win!"
		exit 0
	else
		if [ $Q -gt $U ]
		then
			echo You need higher value
		else
			if [ $Q -lt $U ]
			then
				echo You need lower value
			fi
		fi
	fi
	let "I-=1"
done
echo Oops, you lose
