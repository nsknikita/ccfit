#!/bin/bash

TMP=`expr $RANDOM % 101`

echo "������ ����� �� 0 �� 100"

for count in 7 6 5 4 3 2 1
do
	echo "���-�� ���������� �������: $count"
	read try
	if ((try != TMP))
	then
		if ((try < TMP))
		then
			echo "������"
		else
			echo "������"
		fi
	else
		echo -e "�� ������!"
		exit 0
	fi
done

echo -e "�� ��������\n� ������� $TMP"

exit 0

