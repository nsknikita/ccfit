<html>
	<head>
	<title> ���� ���������� </title>
	</head>
<body
bgcolor="C0C0C0" text=black>
</body>
</html>

<?php
echo "����� ����������! <br>";
file_put_contents("count",$count = file_get_contents("count")+1);
echo "�� $count ������������<br>";
$inip = $_SERVER['REMOTE_ADDR'];
$ip = file("iplist");
$cip = 0;
for ($i = 0;$i < count($ip);$i++)
{
	if(strcmp("$ip[$i]","$inip\n") == 0) $cip = $i+1;
}
if ($cip>0)
{
	echo "���-�� ���������� �������������: $i<br>�� ���� $cip ���������� �������������<br>";
}
else
{
	$i++;
	echo "�� $i ���������� ������������<br>";
	$ipfile = fopen("iplist",'a');
	fwrite($ipfile,"$inip\n");
	fclose($ipfile);
}
//$cur = file_get_contents('text.txt');
//echo $cur++;
//file_put_contents('text.txt',$cur);
echo "��� ip: $inip<br>";
?>
