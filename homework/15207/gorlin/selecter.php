<html>
	<head>
		<title>StringSelecter</title>
	</head>
	<body>
		<select>
			<?php
				$fin = fopen("tf.txt", "r");
				while (($p = fgets($fin))) 
					echo "<option>".$p."</option>";
			?>
		</select>
	</body>
</html>
