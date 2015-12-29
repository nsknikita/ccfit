<?php
        session_start();
        if (!isset($_SESSION["logged_user"]))
        {
                header("Location: ../");
                exit;
        }
?>
<?php
        file_put_contents("../txtinclude/.count", $count = file_get_contents("../txtinclude/.count") + 1);
        $count_inf =  "Вы $count посетитель<BR>";
        $inip = $_SERVER['REMOTE_ADDR'];
        $ip =  file("../txtinclude/.iplist");
        $cip = 0;
        for ($i = 0; $i < count($ip); $i++){
                if (strcmp("$ip[$i]", "$inip\n") == 0) $cip = $i + 1;
        }
        if ($cip > 0)
        {
                $unic_inf =  "Всего уникальных посетителей: $i<BR>Вы были $cip уникальным посетителем";
                $cip--;
        }
        else
        {
                $i++;
		$unic_inf = "Вы $i уникальный посетитель";
                $ipfile = fopen("../txtinclude/.iplist", 'a');
                fwrite($ipfile, "$inip\n");
                fclose($ipfile);
        }
	$ip_inf = "Ваш ip: $inip";
?>

<?php
	
?>


<html>
<head>
	<title>Главная страница</title>
	<link type="text/css" rel="stylesheet" href="./styles/secondstyle.css" />
</head>
<body>
	<div>
		<table id=passes>
			<thead> <tr><th>Привет, <?=$_SESSION['logged_user']?></th></tr>
				<tr><td>Информация о посещениях:</td></tr></thead>
			<tbody>
				<tr>
					<td><?=$count_inf?></td>
				</tr>
				<tr>
					<td><?=$ip_inf?></td>
				</tr>
				<tr>
                                        <td><?=$unic_inf?></td>
                                </tr>
				<tr>
                                        <td>
						<form method="post" action="../index.php">
							<input id="exit_button" type=Submit name=exit value=Выйти>
						</form>
					</td>
                                </tr>
			</tbody>
		</table>
	</div>
	<div>
	<form method="post">
        <table id=xmls>
	<thead>
		<tr><td>Списки групп нгу</td></tr>
		<tr><td><input type="text" name="numbers" required placeholder="Введите цифры"/></td></tr>
		<tr><td><input type=submit name=xml_button value="показать список" /></td></tr>
	</thead>
	<tbody>
        <?php
		if($_POST['xml_button']){
                $numbers=$_POST['numbers'];
                $xml = simplexml_load_file('https://my.nsu.ru/public/resp/student-groups/group.xvm?ref='.$numbers);
                if($xml) {
			if(count($xml->children())) {
				echo "<tr><td>".iconv('utf-8','KOI8-R', $xml['name'])."</tr></td>";
				echo "<tr><td>"."Кол-во студентов: ".count($xml->children())."</tr></td>";
				foreach($xml->children() as $key) {
        	        	        echo "<tr><td>".iconv('utf-8','KOI8-R', $key['name']." ".$key['status'])."</tr></td>";
        	        	}
			} else {
				echo "<tr><td>"."пустой список"."</tr></td>";
			}
		} else {
			echo "<tr><td>"."Не найдено"."</td></tr>";
		}
		}
        ?>
	</tbody>
	<table/>
	</form>

	</div>
</body>
</html>
