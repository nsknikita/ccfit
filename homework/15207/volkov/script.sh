#!/bin/bash

let "x=$RANDOM % 10"
count=5
echo $x
while [ "$count" -ne 0 ]
do
	read y
	if [ "$y" -lt "$x" ] 
	then 
		echo "Number more "
	else
		if [ "$y" -gt "$x" ]
		then
			echo "Number less"
		else
			echo "Perfect!"
			exit 0
		fi
	fi
let "count-=1"
done
echo "Loose..."
