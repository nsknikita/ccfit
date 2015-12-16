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
		echo "Кол-во уникальных посетителей: $i<BR>Вы были $cip уникальным посетителем<BR>";
	}
	else
	{
		$i++;
		echo "Вы $i уникальный посетитель<BR>";
		$ipfile = fopen("include/.iplist", 'a');
		fwrite($ipfile, "$inip\n");
		fclose($ipfile);
	}
	echo "Ваш ip: $inip<BR>";
?>
