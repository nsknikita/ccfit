#!/bin/bash
MAX=101
NUM=0
IFDONE=0
RND=$(($RANDOM%$MAX))



for try in 7 6 5 4 3 2 1
do
	echo "�������� ������� $try; ������� �����:"
	read NUM
	if ((NUM == RND))
	then
		echo "�� ������� �����"
		exit 0
	else
		if ((NUM < RND))
		then
			echo "���� ����� ������ ��������"
		else
			echo "���� ����� ������ ��������"
		fi
	fi
done
echo "�� �� ������� ����� $RND"
exit 0

