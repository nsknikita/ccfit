<?php
session start();
if (isset($_SESSION["logged_one"]))
	{
	if (!$_POST["exit"])
		{
		header("Location: ./secretplace.php");
		exit;
		}
	unset ($_SESSION["logged_one"]);
	}
if ($_SESSION["a"]==1)
	{
	echo "WRONG PASSWORD";
	}
	?>
<html>
 <head>
     <title>ENTER PASSWORD</title>
 </head>
 <body>
 <form action="authorize.php" method="post">
     LOGIN:<input type="text" name="user_name"><br>
     PASSWORD:<input type="password" name="user_pass"><br>
     <input type="submit" name="Submit">
 </form>
 </body>
 </html>

