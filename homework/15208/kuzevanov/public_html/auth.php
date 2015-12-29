<?php

session_start();
if (isset($_SESSION['autorized']))
{
	header('locatoin: index.php');
	exit;
}


if (isset($_POST['login']))
{
	$login = trim($_POST['login']);
	$password = trim($_POST['password']);

	$lpp = "\n". $login.":".$password."\n";
	#echo $lpp;


	$file=file('logins.txt');
	if(in_array($lpp, $file))
	{
		#echo "true!!!";
		$_SESSION['autorized'] = $login;
		header('location: index.php');
		exit;
	}
	 


}

?>

<H1> Auth required </H1>

<?php
if($login){
?>
<h2 style="color: red;">Auth failed</h2>
<?php
}
?>

<html>
<head>
<title> Форма входа </title>
</head>
<body>

<form name="authform" method="post" action="">

Логин: <input type="text" name="login" size="20"><br>
Пароль: <input type="password" name="password" size="20"><br>
<input type="submit" name="sign" value="Войти">

</form>


</body>
</html>
