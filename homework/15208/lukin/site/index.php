<?php
	file_put_contents("include/.count", $count = file_get_contents("include/.count") + 1);
	echo "�� $count ����������<BR>";
	$inip = $_SERVER['REMOTE_ADDR'];
	$ip =  file("include/.iplist");
	$cip = 0;
	for ($i = 0; $i < count($ip); $i++)
	{
		if (strcmp("$ip[$i]", "$inip\n") == 0) $cip = $i + 1;
	}
	if ($cip > 0)
	{
		echo "����� ���������� �����������: $i<BR>�� ���� $cip ���������� �����������<BR>";
		$cip--;
		echo "��� ip: $ip[$cip]<BR>";
	}
	else
	{
		$i++;
		echo "�� $i ���������� ����������<BR>��� ip: $inip<BR>";
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
		echo "�� $cip ���������� ������������.\n";
		fwrite($iplist, "\n$ip");
	}
	else
	{
	echo "�� ���� $cip ���������� �������������"
	}
	fclose($iplist);
*/
?>
