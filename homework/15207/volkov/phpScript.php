<?php
$x=rand(1,10);
echo "X is $x\n";
$count = 5;
while ($count-- > 0) {
	fscanf(STDIN,"%d", $y);
	if ($y > $x) {
		echo "Less\n";
	} else {
		if ($y < $x) {
			echo "More\n";
		} else {
			echo "Perfect!";
			exit(0);
		}
	}
}
echo "Loose...";
?>
