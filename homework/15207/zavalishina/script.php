<?php

$num = rand(0, 100);
$count = 7;

echo "Угадай число, которое я загадал.\n Введи число от 1 до 100\n";

while ($count>0)
{
	echo "Осталось $count попыток. \n";
	fscanf(STDIN, "%d", $usernum);
	if ($usernum > $num) 
		echo "Нет. Мое число меньше.\n";
	elseif ($usernum < $num)
		echo "Нет. Мое число больше.\n";
	else
	{
		 echo "Да, верно.\n";
		exit();
	}
	$count--;
}

echo "Ты проиграл.\n";

?>
