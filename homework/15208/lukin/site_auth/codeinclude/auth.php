<?php
	session_start();
	if(isset($_SESSION["logged_user"])){
		header("Location: ./index.php");
                exit;
	}
	$phrase = "wrong password";
	if($_POST["submit"]){
		$pass = explode("|", file("../txtinclude/logins")[$_POST["login"]]);
		if(substr($pass[1], 0, -1) == $_POST["pass"])
		{
			$_SESSION["logged_user"]=$pass[0];
			header("Location: ./index.php");
			exit;
		}
	}
	else{
		$phrase = "Так не пойдёт";
	}
?>
<html>
<head>
	<title>auth</title>
</head>
<body style="position: absolute;height:100%; width:100%; background-color: #F4EBC3">
	<div style=" position: absolute; margin: 10% 25%; height: 50%; width: 50%; background-color: #CC5500; border: 2px solid #ffffff; border-radius: 40px">
		<div style="position:absolute; margin: 10% 25%; text-align:center; height: 50%; width: 50%; background-color: #900020; border: 2px solid #ffffff; border-radius: 40px">
			<p style="max-width:100%;font-family: cursive; color: white"><?php print($phrase); ?></p>
			<form style="max-width:100%"method="post" action="../index.php">
				<input  style="max-width:100%" type=Submit value="Попробовать ещё раз">
			</form>
		</div>
	</div>
</body>
</html>
