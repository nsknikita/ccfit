<html>
	<head>
	</head>
	<body>
		<?php

			error_reporting(E_ALL);
			  $count = file_get_contents("counter");
			  file_put_contents("counter", $count + 1);
			  echo "Эту страницу посетили $count раз(а).";

			  echo "</br>"; //говнокод :(

			  $count = file_get_contents("unique_counter");

			  if (!isset($_COOKIE["lastvisit"]))
			  {
			  	$time = mktime(0, 0, 0, 1, 1, 2020); /*по идее должно быть в начале*/
			  	setcookie('lastvisit', 1, $time);
			  	$count += 1;
			  	file_put_contents("unique_counter", $count);
			  }

			  echo "Количество уникальных посещений: $count";
		?>
	</body>
</html>
