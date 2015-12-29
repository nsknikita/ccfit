<?
session_start();
if(!isset($_SESSION['rand']))
{
	$_SESSION['rand']=rand(1,128);
	$_SESSION['try']=7;
}
?>
<?php
if (!isset($_SESSION['username']) && isset($_COOKIE['username']))
	$_SESSION['username'] = $_COOKIE['username'];

$username = $_SESSION['username'];

if ($username == null)
{
		header("Location: a1.php");
			exit();
		}	
?>
<html>
Вы вошли как <b><?php echo $username; ?></b> | <a href="a1.php">Выход</a>
<form action="index.php" method="POST">

<p><b>Загаданно число от 1 до 128</b></p>
<p><b>У вас есть 7 попыток</b></p>
<p> Введите число:
<input type="text" name="Digit" size="3">
<input type="submit" value="Проверить"></p>
</form>
<?php

$rand=$_SESSOIN['rand'];
$try=$_SESSION['try'];

if(($_POST['Digit']!="")&&(isset($_POST['Digit'])))
{
	if($_POST['Digit'] >$rand)
	{
		echo "Введенное число больше загаданного.<br>";
	$try--;
		echo "У вас остальось ".$try." попыток.<br>";
	}
	if($_POST['Digit'] <$rand)
	{
		echo "Введенное число меньше загаданного.<br>";
	$try--;
		echo "У вас остальось ".$try." попыток.<br>";
	}
	if($_POST['Digit'] == $rand)
	{
		echo "Вы угадали число<br>";
		echo "Что-бы сыграть еще раз нажмите Проверить.<br>";
		unset($_SESSION['rand']);
	}
}
$_SESSION['try']=$try;

if($try==0)
{
	echo "Вы проиграли.<br>";
	echo "Я загадал число".$Num."<br>";
	echo "Что-бы сыграть еще раз нажмите Проверить.<br>";
	unset($_SESSION['rand']);
}
?>
</html>
