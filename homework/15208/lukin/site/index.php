<?php
	file_put_contents("include/.count", $count = file_get_contents("include/.count") + 1);
	echo "÷Ù $count ÐÏÓÅÔÉÔÅÌØ<BR>";
	$inip = $_SERVER['REMOTE_ADDR'];
	$ip =  file("include/.iplist");
	$cip = 0;
	for ($i = 0; $i < count($ip); $i++)
	{
		if (strcmp("$ip[$i]", "$inip\n") == 0) $cip = $i + 1;
	}
	if ($cip > 0)
	{
		echo "÷ÓÅÇÏ ÕÎÉËÁÌØÎÙÈ ÐÏÓÅÔÉÔÅÌÅÊ: $i<BR>÷Ù ÂÙÌÉ $cip ÕÎÉËÁÌØÎÙÍ ÐÏÓÅÔÉÔÅÌÅÍ<BR>";
		$cip--;
		echo "÷ÁÛ ip: $ip[$cip]<BR>";
	}
	else
	{
		$i++;
		echo "÷Ù $i ÕÎÉËÁÌØÎÙÊ ÐÏÓÅÔÉÔÅÌØ<BR>÷ÁÛ ip: $inip<BR>";
		$ipfile = fopen("include/.iplist", 'a');
		fwrite($ipfile, "$inip\n");
		fclose($ipfile);
	}
?>
