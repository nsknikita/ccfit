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
        $count_inf =  "�� $count ����������<BR>";
        $inip = $_SERVER['REMOTE_ADDR'];
        $ip =  file("../txtinclude/.iplist");
        $cip = 0;
        for ($i = 0; $i < count($ip); $i++){
                if (strcmp("$ip[$i]", "$inip\n") == 0) $cip = $i + 1;
        }
        if ($cip > 0)
        {
                $unic_inf =  "����� ���������� �����������: $i<BR>�� ���� $cip ���������� �����������";
                $cip--;
        }
        else
        {
                $i++;
		$unic_inf = "�� $i ���������� ����������";
                $ipfile = fopen("../txtinclude/.iplist", 'a');
                fwrite($ipfile, "$inip\n");
                fclose($ipfile);
        }
	$ip_inf = "��� ip: $inip";
?>

<?php
	
?>


<html>
<head>
	<title>������� ��������</title>
	<link type="text/css" rel="stylesheet" href="./styles/secondstyle.css" />
</head>
<body>
	<div>
		<table id=passes>
			<thead> <tr><th>������, <?=$_SESSION['logged_user']?></th></tr>
				<tr><td>���������� � ����������:</td></tr></thead>
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
							<input id="exit_button" type=Submit name=exit value=�����>
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
		<tr><td>������ ����� ���</td></tr>
		<tr><td><input type="text" name="numbers" required placeholder="������� �����"/></td></tr>
		<tr><td><input type=submit name=xml_button value="�������� ������" /></td></tr>
	</thead>
	<tbody>
        <?php
		if($_POST['xml_button']){
                $numbers=$_POST['numbers'];
                $xml = simplexml_load_file('https://my.nsu.ru/public/resp/student-groups/group.xvm?ref='.$numbers);
                if($xml) {
			if(count($xml->children())) {
				echo "<tr><td>".iconv('utf-8','KOI8-R', $xml['name'])."</tr></td>";
				echo "<tr><td>"."���-�� ���������: ".count($xml->children())."</tr></td>";
				foreach($xml->children() as $key) {
        	        	        echo "<tr><td>".iconv('utf-8','KOI8-R', $key['name']." ".$key['status'])."</tr></td>";
        	        	}
			} else {
				echo "<tr><td>"."������ ������"."</tr></td>";
			}
		} else {
			echo "<tr><td>"."�� �������"."</td></tr>";
		}
		}
        ?>
	</tbody>
	<table/>
	</form>

	</div>
</body>
</html>
