 <head>
  <meta charset="utf-8">
  <title> Malovichko </title> <style>
 body {
    background: #445EA1; /* Цвет фона */
    color: #000000; /* Цвет текста */
   }
#login_form{
	position:absolute;
	top: 200px;
	left: 250px;
	height: 100px;
	width: 250px;
	text-align: center;
	background-color: #221499;
	border: 2px solid #090342;
	margin: -50px 0 0 -125px;
}

.login_input{
	width: 200px;
	margin-top: 10px;
}

#login_submit{
	border-radius: 5px;
	margin-top: 10px;
}
</style>
 </head>
 <body>
  <p><img src="http://rylik.ru/uploads/posts/2011-03/1299577413_1.jpg" align="right" width="1200" heigth="1200" >
 </p>
 <?php

$file = 'visitors.txt';

if (!file_exists($file)) {
 $f = fopen($file, 'w');
 fwrite($f, 0);
 fclose($f);
}

$f = fopen($file, "r");
$visitors = fread($f, 99);
fclose($f);

if (!isset($_COOKIE['visited'])) {
 $visitors++;
 setcookie('visited', 'was');

 $f = fopen($file, 'w');
 fwrite($f, $visitors);
 fclose($f);
}

echo "Уникальных посетителей: " . $visitors;

?>


  <form id="login_form" method="post">
                <select class="login_input" name="login" size=1>
                        <option value=0>admin</option>
                        <option value=1>Elena</option>
                        <option value=2>Alina</option>
                </select>
                <input class="login_input" type=password name=pass required placeholder="password" />
                <input id="login_submit" type=submit name=submit value=Войти>
        </form> 
<?php
session_start();
	if ($_POST['login'] == 'admin' && $_POST['pass'] == 'password') {
	$_SESSION['auth'] = '1';
	echo 'Вы авторизовались';
	}
if (isset($_GET['logout'])) unset($_SESSION['auth']);
	?>
 </body>
</html>
