#!/bin/bash

let "tmp = $RANDOM % 100"
try_counter=7

echo "Введи число от 1 до 100"

while [ $try_counter -ne 0  ]
do
	echo "Осталось $try_counter попыток."
	read num
	if  [ $tmp -lt $num ]
		then
			echo "Не угадал. Мое число меньше."
		else
			if [ $tmp -gt $num ]
				then
					echo "Не угадал. Мое число больше."
			else
				if [ $tmp -eq $num ]
				then
					echo "Угадал."
					exit 0
				fi
			fi
	fi

	let "try_counter-=1"
done

echo "Ты проиграл."
