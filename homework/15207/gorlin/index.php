<html>
	<head>
		<title>Count</title>
	</head>
	<body>
		<?php
			$fp = fopen("counter.txt", "r");
			fscanf($fp, "%d", $c);
			$c++;
			fclose($fp);

			$fp = fopen("counter.txt", "w+");
			fwrite($fp, "$c");
			fclose($fp);

			$fp = fopen("identc.txt", "r");
			fscanf($fp, "%d", $d);
			fclose($fp);

			$fp = fopen("tw.txt", "r");
			$ip = getenv('REMOTE_ADDR');
			fscanf($fp, "%s", $str);

			if (stristr($str,"$ip"))
			{
				fclose($fp);
				echo "All entrances $c, different entrances $d";
			}
			else
			{
				fclose($fp);

				$d++;
				echo "All entrances $c, different entrances $d";
				$fp = fopen("tw.txt", "a");
				fwrite($fp, "$ip");
				fclose($fp);

				$fp = fopen("identc.txt", "w+");
				fwrite($fp, "$d");
				fclose($fp);
			}
		?>
	</body>
</html>
