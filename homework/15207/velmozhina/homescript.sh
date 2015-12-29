 #!/bin/bash

C=7
let "R = $RANDOM % 100"
echo "Try to guess number"
while [ "$C" -gt "0" ]
do
	read X
	if [ $X -eq $R ]
	then
		echo "YOU WON"
		exit 0
	else
		echo You have $C attempts
		if [ $X -lt $R ]
		then
			echo "Need higher number "
		else
			if [ $X -gt $R ]
			then
				echo "Need smaller number"
			fi
		fi
	fi
let "C--";
done
echo YOU LOSE
