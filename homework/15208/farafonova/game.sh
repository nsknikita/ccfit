#!/bin/bash

number=$[ $RANDOM % 100 + 1 ]
tries=7

echo "Guess the number from 1 to 100. You have 7 tries :)"

while [ $tries -ne 0 ]
do
	read n #считали число
	if [ "$n" -gt "$number" ]; then
		echo "My number is less!"

	else
		if [ "$n" -lt "$number" ]; then
			echo "My number is more!"
	
		else
			echo "You guessed it!"
			exit 0
	fi
	fi	
	tries=$[ tries - 1]
done
echo "You losе."
