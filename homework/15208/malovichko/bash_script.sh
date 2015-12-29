#!bin/bash
let "my = $RANDOM % 100 + 1" 
num=7
echo "Guess my number"
while [ $num -ne 0 ]
do
read number
if [ $my -lt $number ]
then
echo "My number is lower"
else 
if [ $my -gt $number ]
then 
echo "My number is bigger"
else
if [ $my -eq $number ]
then
echo "Well done"
exit 0
fi
fi
let "num -= 1"
done
echo "Failure"
