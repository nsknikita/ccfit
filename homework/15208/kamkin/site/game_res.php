<?php 
if (!isset($_COOKIE['res'])) {
	header('Location: game.php');
	exit;
}
$res = $_COOKIE['res'];
$cnt = $_COOKIE['game'];
$num = $_COOKIE['game_num'];
if ($res==1) {
	echo "�� ��������, ������� � ������ �������: $cnt";
}

if ($res==-1) {
	echo "�� ���������, ���������� �����: $num";
}


setcookie('game',null,-1);
setcookie('game_num',null,-1);
setcookie('res',null,-1); 
?>
<form action ="game.php">
	<button type="submit">OK</button>
<form>

