 #!/bin/bash

C=0
let "R = $RANDOM % 100"
echo "Try to guess number"
while [ "$C" -lt "7" ]
do
	read X
	if [ $X -eq $R ]
	then
		echo "YOU WON"
		exit 0
	else
		if [ $X -lt $R ]
		then
			echo "Need higher number"
		else
			if [ $X -gt $R ]
			then
				echo "Need smaller number"
			fi
		fi
	fi
let "C++";
done
echo YOU LOSE
