<?php

$tmp = rand(0, 100);
$try_counter=7;
$stdin = fopen("php://stdin", 'r');

echo "Введи число от 1 до 100\n";

while ($try_counter != 0)
{
        echo "Осталось $try_counter попыток.\n";
        fscanf(STDIN, "%d", $num);
        if  ( $tmp < $num )
        {
        	echo "Не угадал. Мое число меньше.\n";
        }
	elseif ( $tmp > $num )
        {
        	echo "Не угадал. Мое число больше.\n";
        }
	elseif ( $tmp == $num )
        {
        	echo "Угадал.\n";
                exit();
        }

        $try_counter--;
}

echo "Ты проиграл.\n";

?>
