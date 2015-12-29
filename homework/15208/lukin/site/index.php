<?php
	session_start();
	$phrase = "password";
	if (isset($_SESSION["logged_user"]))
	{
		if(!$_POST["exit"]){
			header("Location: ./codeinclude/");
			exit;
		}
		else{
		unset ($_SESSION["logged_user"]);
		}
	}
	else  if ($_POST["submit"]) {
                $phrase = "wrong password";
                $pass = explode("|", file("./txtinclude/logins")[$_POST["login"]]);
                if(substr($pass[1], 0, -1) == $_POST["pass"]) {
                        $_SESSION["logged_user"]=$pass[0];
                        header("Location: ./codeinclude/");
                	exit;
        	}
        }
?>
<html>
<head>
	<title>Авторизация</title>
	<link type="text/css" rel="stylesheet" href="./codeinclude/styles/firststyle.css" />
</head>
<body>
	<form id="login_form" method="post">
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
		<input class="login_input" type=password name=pass required placeholder="<?=$phrase?>" />
		<input id="login_submit" type=submit name=submit value=Войти>
	</form>
</body>
</html>
