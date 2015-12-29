<html>
	<head>
	<title> Егор Казырицкий </title>
	</head>
<body
bgcolor="C0C0C0" text=black>
</body>
</html>

<?php
echo "Добро пожаловать! <br>";
file_put_contents("count",$count = file_get_contents("count")+1);
echo "Вы $count пользователь<br>";
$inip = $_SERVER['REMOTE_ADDR'];
$ip = file("iplist");
$cip = 0;
for ($i = 0;$i < count($ip);$i++)
{
	if(strcmp("$ip[$i]","$inip\n") == 0) $cip = $i+1;
}
if ($cip>0)
{
	echo "Кол-во уникальных пользователей: $i<br>Вы были $cip уникальным пользователем<br>";
}
else
{
	$i++;
	echo "Вы $i уникальный пользователь<br>";
	$ipfile = fopen("iplist",'a');
	fwrite($ipfile,"$inip\n");
	fclose($ipfile);
}
//$cur = file_get_contents('text.txt');
//echo $cur++;
//file_put_contents('text.txt',$cur);
echo "Ваш ip: $inip<br>";
?>
