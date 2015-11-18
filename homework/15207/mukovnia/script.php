<?php
$tpm=rand(0,100);
$quantity=8;
echo "nazovi chislo ot 0 do 100\n";
	while ($quantity != 0)
	{
	fscanf(STDIN, "%d", $num);
		if ( $tpm < $num )
			echo "beri menshe\n";
		elseif ( $tpm > $num )
			echo "beri bolshe\n";
		else
		{
			echo "ugadal\n";
			exit;
		}
	$quantity--;
	echo "ostalos popitok: $quantity\n";
	}
echo "ne poluchilos. chislo bilo $tpm"
?>

