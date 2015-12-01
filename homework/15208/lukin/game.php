<?php
echo "Угадай число от 0 до 100\n";
$ran = rand(0, 100);
for ($i = 7; $i > 0; $i--)
{
	echo "Осталось $i попыток\n";
	fscanf(STDIN, "%d\n", $try);
	if ($try == $ran)
	{
	echo "Ты угадал!\n";
	die();
	}
	if ($try < $ran) {echo "Больше\n";}else{echo "Меньше\n";}

}
echo "Ты проиграл.\nЯ загадал $ran\n";
?>
