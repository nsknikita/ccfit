<html>
	<head>
		<title>MyPage</title>
	</head>
	<body>
		<?php
			$fn = fopen("file.txt", "r");
			fscanf($fn, "%d", $t);
			fclose($fn);
			$t++;
			$fn = fopen("file.txt", "w+");
			fwrite($fn, "$t");
			fclose($fn);
			echo "$t";
		?>
	</body>
</html>
