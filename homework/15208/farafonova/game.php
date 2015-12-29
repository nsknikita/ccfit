<?php

$tries = 7;
$number = rand(1, 100);
$in;

echo "Guess the number from 1 to 100. You have 7 tries :)\n";
echo "Enter the number: ";

while ($tries != 0)
{
	$tries -= 1;
	fscanf(STDIN, "%d", $in);
	if ($number < $in)
	{
		echo "My number is less! Tries left: $tries\n";
	}
	elseif ($number > $in) {
		echo "My number is more! Tries left: $tries\n";
	}
	else
	{
		echo "You guessed it!\n";
		exit();
	}
}

echo "You lose.\n";

?>
