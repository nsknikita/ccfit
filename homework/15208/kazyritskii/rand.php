<?
session_start();

if(!isset($_SESSION['randNum']))
{
	$_SESSION['randNum']=rand(0, 128);
	$_SESSION['tryes']=7;
}
?>

<html>

<form action="rand.php" method="POST">
<p><b>Я загадал число от 0 до 128, попробуй отгадать.</b></p>
<p><b>У тебя есть 7 попыток.</b></p>
<p>Ваше число:
<input type="text" name="Digit" size="10" maxlength="5"><br>
<input type="submit" value="OK"></p>
</form>

<?php
	$Num=$_SESSION['randNum'];
	$try=$_SESSION['tryes'];
if(($_POST['Digit']!="")&&(isset($_POST['Digit'])))
{
if($_POST['Digit'] > $Num)
{echo "Ваше число больше моего.<br>";
$try--;
echo"Осталось ".$try." попыток.<br>";
}
if($_POST['Digit']<$Num)
{echo"Ваше число меньше моего.<br>";
$try--;
echo"Осталось ".$try." попыток.<br>";
}
if($_POST['Digit']==$Num)
{echo"Поздравляю! Вы угадали мое число! Это действительно-".$Num."<br>";
echo"Хотите сыграть еще раз?<br>";
echo"Нажмите кнопку OK<br>";
unset($_SESSION['randNum']);
}

}
$_SESSION['tryes']=$try;
if($try==0)
{
	echo"Вы проиграли.<br>";
	echo"Я загадал число-".$Num."<br>";
echo"Хотите сыграть еще раз?<br>";
echo"Нажмите кнопку OK<br>";

	unset($_SESSION['randNum']);
}
?>

</html>
