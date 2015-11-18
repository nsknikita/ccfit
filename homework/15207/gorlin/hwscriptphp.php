<?php
	$I = 7;
	$Q = rand(0, 100);
	echo "Try to guess the number 0-100\n";
	while ($I > 0)
	{
		echo "You have $I attempts\n";
		$I--;
		fscanf(STDIN, "%d", $t);
		if ($t == $Q)
		{
			echo "Congratulation, you win!\n";
			exit;
		}
		else
			if ($t < $Q)
				echo "You need higher value\n";
			else
				if ($t > $Q)
					echo "You need lower value\n";
	}
	echo "Oops, you lose\n";
?>
