#!/bin/bash

TMP=`expr $RANDOM % 101`

echo "угадайте число от 0 до 100"

for count in 7 6 5 4 3 2 1
do
	echo "кол-во оставшихся попыток: $count"
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
		echo -e "Вы угадали!\n"
		exit 0
	fi
done

echo -e "Вы не справились\nчисло $TMP"

exit 0

