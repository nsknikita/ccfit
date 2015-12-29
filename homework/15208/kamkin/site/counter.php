<?php
	$fp = fopen('fp.i','r');
	$count = 0;
	$count = $count + fgets($fp,99999) + 1;
	fclose($fp);
	echo 'Hello!<br>';
	echo "Количество посещений страницы: $count<br>";
	$fp = fopen('fp.i','w');
	fwrite($fp, $count);
	fclose($fp);

	$fp_u = fopen('fp_u.i','r');
	$count = 0 + fgets($fp_u,99999);
	fclose($fp_u);
	if (!isset($_COOKIE['if_visited'])) {
		$time = mktime(0,0,0,1,1,2020);
		setcookie('if_visited', 1, $time);
		$count = $count + 1;
		$fp_u = fopen('fp_u.i','w');
		fwrite($fp_u,$count);
		fclose($fp_u);
	}


	echo "Количество уникальных посетителей: $count";
?>
