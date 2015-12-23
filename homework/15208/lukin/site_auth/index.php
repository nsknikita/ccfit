<?php
	session_start();
	if (isset($_SESSION["logged_user"]))
	{
		if(!$_POST["exit"]){
			header("Location: ./codeinclude/index.php");
			exit;
		}
		else{
		unset ($_SESSION["logged_user"]);
		}
	}
?>
<html>
<head>
	<title>Авторизация</title>
	<link type="text/css" rel="stylesheet" href="./codeinclude/styles/firststyle.css" />
</head>
<body>
	<form id="login_form" method="post" action="./codeinclude/auth.php">
		<select class="login_input" name="login" size=1>
<?php
			$logins = file("./txtinclude/logins");
			for ($i = 0; $i < (count($logins) - 1); $i++)
			{
				$login = explode("|",$logins[$i]);
				print("\t\t\t<option value=$i>$login[0]</option>\n");
			}
		?>
		</select>
		<input class="login_input" type=password name=pass value=password>
		<input id="login_submit" type=submit name=submit value=Войти>
	</form>
</body>
</html>
