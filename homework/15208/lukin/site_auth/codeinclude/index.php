<?php
        session_start();
        if (!isset($_SESSION["logged_user"]))
        {
                header("Location: ../index.php");
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


<html>
<head>
	<title>������� ��������</title>
	<link type="text/css" rel="stylesheet" href="./styles/secondstyle.css" />
</head>
<body>
	<div>
		<table>
			<thead><th>���������� � ����������</th></thead>
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
</body>
</html>
