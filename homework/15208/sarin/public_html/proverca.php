<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    session_start();//  ��� ��������� �������� �� �������. ������ � ��� �������� ������  ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� �  ����� ������ ���������!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
    {
    exit ("<body><div align='center'><br/><br/><br/><h3>�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!" . "<a href='index.php'> <b>�����</b> </a></h3></div></body>");
    }
    //���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//������� ������ �������
    $login = trim($login);
    $password = trim($password);
	
     //������������ � ���� ������.
    $dbcon = mysql_connect("localhost", "��� �������������� ����", "������ �������������� ����"); 
    mysql_select_db("��� ���� ������", $dbcon);
	if (!$dbcon)
	{
    echo "<p>��������� ������ ��� ������������� � MySQL!</p>".mysql_error(); exit();
    } else {
    if (!mysql_select_db("��� ���� ������", $dbcon))
    {
    echo("<p>��������� ���� ������ �� ����������!</p>");
    }
	}
 //��������� �� ���� ��� ������ � ������������ � ��������� �������
$result = mysql_query("SELECT * FROM ��� ������� WHERE login='$login'", $dbcon);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["password"]))
    {
    //���� ������������ � ��������� ������� �� ����������
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>��������, ���ģ���� ���� login ��� ������ ��������." . "<a href='index.php'> <b>�����</b> </a></h3></div></body>");
    }
    else {
    //���� ����������, �� ������� ������
    if ($myrow["password"]==$password) {
    //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
    $_SESSION['login']=$myrow["login"]; 
    $_SESSION['id']=$myrow["id"];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
   header("Location:index.php"); 
    }
 else {
    //���� ������ �� �������

    exit ("<body><div align='center'><br/><br/><br/>
	<h3>��������, ���ģ���� ���� login ��� ������ ��������." . "<a href='index.php'> <b>�����</b> </a></h3></div></body>");
    }
    }
    ?>
