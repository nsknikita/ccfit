<html>
	<head>
		<title>Select</title>
	</head>
	<body>
		<select>
			<?php
				$fin = fopen("file.txt", "r");
				while (($s = fgets($fin))) 
					echo "<option>".$s."</option>";
			?>
		</select>
	</body>
</html>
