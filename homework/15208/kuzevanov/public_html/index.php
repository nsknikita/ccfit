

<?php
session_start();
if (!isset($_SESSION['autorized']))
{
	header('location: auth.php');
	exit;
}
	
echo ' You are  ';

$fp = fopen('counter.txt', 'r');
$i = fgets($fp, 10);
fclose($fp);
$i = $i + 1;
$fp = fopen("counter.txt", "a");
ftruncate($fp, 0);
$test = fwrite($fp, $i);
fclose($fp);
echo $i;

echo "123";

?>

<H1> Добро пожаловать! </H1>
