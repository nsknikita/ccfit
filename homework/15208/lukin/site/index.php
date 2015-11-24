<?php
	file_put_contents("include/.count", $count = file_get_contents("include/.count") + 1);
	echo "Вы $count посетитель<BR>";
	$inip = $_SERVER['REMOTE_ADDR'];
	$ip =  file("include/.iplist");
	$cip = 0;
	for ($i = 0; $i < count($ip); $i++)
	{
		if (strcmp("$ip[$i]", "$inip\n") == 0) $cip = $i + 1;
	}
	if ($cip > 0)
	{
		echo "Всего уникальных посетителей: $i<BR>Вы были $cip уникальным посетителем<BR>";
		$cip--;
		echo "Ваш ip: $ip[$cip]<BR>";
	}
	else
	{
		$i++;
		echo "Вы $i уникальный посетитель<BR>Ваш ip: $inip<BR>";
		$ipfile = fopen("include/.iplist", 'a');
		fwrite($ipfile, "$inip\n");
		fclose($ipfile);
	}
/*	$iplist = fopen("include/.ip", 'r+');
	$work = 0;
	$cip = 0;
	fgets($iplist);
	while ($work == 0) {
		if(!($ip = fgets($iplist))) {$work = 1}
		$cip++;
		if(strcmp("$ip","$inip") == 0) {$work = 2}
	}
	if (work == 1) {
		echo "Вы $cip уникальный пользователь.\n";
		fwrite($iplist, "\n$ip");
	}
	else
	{
	echo "Вы были $cip уникальным пользователем"
	}
	fclose($iplist);
*/
?>
