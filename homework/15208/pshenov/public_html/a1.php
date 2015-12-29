<?
session_start();
?>
<?php

function Login($username,$remember)
{
	if($_SESSION =='')
	return false;	
	$_SESSION["username"]=$username;

	if(!$remember)
{
	setcookie("username",$username,time()+3600 * 24 * 7 );
  	return true;
}
	
}

function Logout()
{
	
	setcookie("username", '', time()-1);
unset($_SESSION["username"]);
}

$enter_site=false;

Logout();

if (count($_POST) > 0)
	$enter_site=Login($_POST["username"], $_POST["remember"] == "on");

if ($enter_site)
{
	header("Location: index.php");

exit();
}

?>

<html>
<body>
<h1>Вход на сайт</h1>
<form action="index.php" method="post">
Введите имя:
<br/>
<input type="text" name="username" />
<br/>
<input type="checkbox" name="remember" /> Запомнить меня
<br/>
<input type="submit" value="Войти" />
</form>
</body>
</html>
