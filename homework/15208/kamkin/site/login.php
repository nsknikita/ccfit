<?php

session_start();

if (isset($_SESSION[AUTH])) {
	header('Location: indeex.php');
	exit;
}

if (isset($_POST['login'])) {
	$login = trim($_POST['login']);
	$password = trim($_POST['password']);
	echo "Неверное имя пользователя или пароль.";
	$file = file("users.base");
	foreach($file as $key){
		$ar = explode("|", $key);
		$lg = trim($ar[0]);
		$pw = trim($ar[1]);
		if (!strcmp($lg,$login) and !strcmp($pw,$password)) {
			echo "($login|$ar[0]) ($password|$ar[1])";
			$_SESSION[AUTH] = $login;
			header('Location: index.php');
			exit;
		}
	}
}



?>

<form action="" method="post">
	Логин: 
	<?php
		$file = file("users.base");
		echo '<select name="login">';
		foreach($file as $key){
			$ar = explode("|", $key);
			echo '<option value='.$ar[0].'>'.$ar[0].'</option>';
		}
		echo '</select><br/>';
	?>

	Пароль: <input name="password" type="password"/> <br/>
	<input type="submit" value="Вход">
</form>
