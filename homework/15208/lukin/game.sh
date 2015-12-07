#!/bin/bash

TMP=`expr $RANDOM % 101`

echo "Угадай число от 0 до 100"

for count in 7 6 5 4 3 2 1
do
	echo "Кол-во оставшихся попыток: $count"
	read try
	if ((try != TMP))
	then
		if ((try < TMP))
		then
			echo "Больше"
		else
			echo "Меньше"
		fi
	else
		echo -e "Ты угадал!"
		exit 0
	fi
done

echo -e "Ты проиграл\nЯ загадал $TMP"

exit 0

