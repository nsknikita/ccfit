
#!bin/bash

let "my = $RANDOM % 100 + 1" 
try=7
echo "Угодай число, которое я задумал!"

while [ $try -ne 0 ]
do
          echo "У тебя осталось $try попыток"
          read number
          if [ $my -lt $number ]
              then
                echo "Не угадал. Загаданное число меньше!"
              else 
                if [ $my -gt $number ]
                   then 
                     echo "Не угадал. Загаданное число больше!"
                   else
                     if [ $my -eq $number ]
                        then
                          echo "Угадал!"
                          exit 0
                     fi
                fi
  let "try -= 1"
done

echo "Неудача!"
