#!/bin/bash


ranNum=$RANDOM
let "ranNum %= 100"

echo "GO"

for count in 7 6 5 4 3 2 1
do
	echo "attempt $count" 
       read chislo
       if ((chislo == ranNum))
       then
	       echo "You win!"
	       echo "$ranNum"
	       exit 0
       else
	       if ((chislo > ranNum))
	       then
		       echo "Your num >"
	       else
		       echo "Your num <"
	       fi
       fi 

done

echo "You lose =("
echo "num = $ranNum"
exit 0
