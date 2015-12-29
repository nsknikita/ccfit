<?php
echo 'Список группы по ссылке:</br>';
$string = "https://my.nsu.ru/public/resp/student-groups/group.xvm?ref=";

$string1 = '8477';
if (isset($_POST['numb'])) {
	$string1 = $_POST['numb'];
}
$string = $string.$string1;

echo "$string</br>";


$file = file_get_contents($string);

$i = 50;
$file = iconv('utf-8', 'KOI8-U', $file);
$len = strlen($file);
$mode = 0;
$nw = 0;
$symb = '"';
while (1) {
	$nw = 0;
	if ($mode==1) {
		if ($file[$i]!=$symb[0]) {
			echo "$file[$i]";
		}
		else {
			$mode=0;
			$nw = 1;
			$i +=12;
		}
	}
	if ($mode==0 and $nw==0) {
		if ($file[$i]==$symb[0]) {
			$mode=1;
			echo '</br>';
		}
	}

	$i += 1;
	if ($i == $len) {
		break;
	}
}

?>
</br>Введите ссылку:
<form action="" method="post">
<input name="numb"><br/>
</form>
