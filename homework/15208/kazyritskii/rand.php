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
<p><b>� ������� ����� �� 0 �� 128, �������� ��������.</b></p>
<p><b>� ���� ���� 7 �������.</b></p>
<p>���� �����:
<input type="text" name="Digit" size="10" maxlength="5"><br>
<input type="submit" value="OK"></p>
</form>

<?php
	$Num=$_SESSION['randNum'];
	$try=$_SESSION['tryes'];
if(($_POST['Digit']!="")&&(isset($_POST['Digit'])))
{
if($_POST['Digit'] > $Num)
{echo "���� ����� ������ �����.<br>";
$try--;
echo"�������� ".$try." �������.<br>";
}
if($_POST['Digit']<$Num)
{echo"���� ����� ������ �����.<br>";
$try--;
echo"�������� ".$try." �������.<br>";
}
if($_POST['Digit']==$Num)
{echo"����������! �� ������� ��� �����! ��� �������������-".$Num."<br>";
echo"������ ������� ��� ���?<br>";
echo"������� ������ OK<br>";
unset($_SESSION['randNum']);
}

}
$_SESSION['tryes']=$try;
if($try==0)
{
	echo"�� ���������.<br>";
	echo"� ������� �����-".$Num."<br>";
echo"������ ������� ��� ���?<br>";
echo"������� ������ OK<br>";

	unset($_SESSION['randNum']);
}
?>

</html>
