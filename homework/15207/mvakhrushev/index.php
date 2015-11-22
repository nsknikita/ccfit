<?php

$random = mt_rand(0, 100);
$max_attempts = 7;

echo "\nGuess my number, looser!\n";

for ($i = 1; $i <= $max_attempts; $i++) {
	$user_number = +(fgets(STDIN));
	
	if ($user_number == $random) {
		echo "\nYes! Congratulations! It's right!\n";
		exit;
	}
	else {
		echo "No! ";
		if ($user_number < $random) {
			echo "Number is bigger. ";
		}
		else {
			echo "Number is lower. ";
		}
		echo ($max_attempts-$i) . " attempts left...\n";	
	}
}

echo "\nYou didn't guess.. " . $random . " - correct number.\n";


?>
