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
�� ����� ��� <b><?php echo $username; ?></b> | <a href="a1.php">�����</a>
<form action="index.php" method="POST">

<p><b>��������� ����� �� 1 �� 128</b></p>
<p><b>� ��� ���� 7 �������</b></p>
<p> ������� �����:
<input type="text" name="Digit" size="3">
<input type="submit" value="���������"></p>
</form>
<?php

$rand=$_SESSOIN['rand'];
$try=$_SESSION['try'];

if(($_POST['Digit']!="")&&(isset($_POST['Digit'])))
{
	if($_POST['Digit'] >$rand)
	{
		echo "��������� ����� ������ �����������.<br>";
	$try--;
		echo "� ��� ��������� ".$try." �������.<br>";
	}
	if($_POST['Digit'] <$rand)
	{
		echo "��������� ����� ������ �����������.<br>";
	$try--;
		echo "� ��� ��������� ".$try." �������.<br>";
	}
	if($_POST['Digit'] == $rand)
	{
		echo "�� ������� �����<br>";
		echo "���-�� ������� ��� ��� ������� ���������.<br>";
		unset($_SESSION['rand']);
	}
}
$_SESSION['try']=$try;

if($try==0)
{
	echo "�� ���������.<br>";
	echo "� ������� �����".$Num."<br>";
	echo "���-�� ������� ��� ��� ������� ���������.<br>";
	unset($_SESSION['rand']);
}
?>
</html>
