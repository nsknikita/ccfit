<?php

$ranNum = rand(0 , 100);
echo "Game has started!\n";

for ($i = 7; $i > 0; $i--)
{
	echo "Attempt $i \n";
	fscanf(STDIN, "%d", $chislo);
	if ($chislo == $ranNum)
	{
		echo "You win\n";
		return;
	}
	else
	{
		if ($chislo > $ranNum)
		{
			echo "Your num >\n";
		}
		else
		{
			echo "Your num <\n";
		}
	}
}

echo "You lose =( $ranNum\n";
?>

