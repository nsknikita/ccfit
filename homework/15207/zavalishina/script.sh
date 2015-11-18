#!/bin/bash


let "x=$RANDOM % 100"
count=7

echo "Угадай число, которое я загадал. Введи число от 1 до 100."
while [ $count -ne 0 ]
do
	read num
	if [ "$num" -gt "$x" ]
		then echo "Нет, мое число меньше."
	else 
		if [ "$num" -lt "$x" ]
			then echo "Нет, мое число больше."
		else 
			if [ "$num" -eq "$x" ]
				then echo "Да, верно."
				exit 0
			fi
		fi
	fi
	let "count-= 1"
done
echo "Ты проиграл."
