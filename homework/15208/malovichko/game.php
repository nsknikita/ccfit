<?php
//$random=mt_rand(0,100);
$random=rand(0,100);
$attempt=7;
echo "\nGuess the number\n";
for($i=1; $i<=$attempt; $i++)
{
	$value = fgets(STDIN);
	if($value == $random)
	{
		echo "\nWell done\n";
		exit;
	}
	else
	{
		echo "\nWrong\n";
		if($value<$random)
		{
			echo "\nMy number is bigger\n";
		}
		else
		{
			echo "\nMy number is lower\n";
		}
	}
}
?>
