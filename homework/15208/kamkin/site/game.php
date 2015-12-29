<form action ="reset.php">
        <button type="submit">Начать заново</button>
</form>
<?php
if (!isset($_COOKIE['game'])) {
 	setcookie('game',7,time() + 3600);
	setcookie('game_num', rand(0,100),time() + 3600);
	setcookie('prev',0,time(),3600);
	header('Location: game.php');
	exit;
}

$count = $_COOKIE['game'];
$num = $_COOKIE['game_num'];
$chk = ($_POST['number']);




	if (ctype_digit($_POST['number']) and $chk>=0 and $chk<=100) {
		setcookie('prev',$_POST['number']);
		$number = $_POST['number'];
		$count -=1;
		setcookie('game',$count);
		if ($count < 7) {
		        if ($num < $number) {
				echo "$number больше искомого.";
			}
			if ($num > $number) {
				echo "$number меньше искомого.";
			}
			if ($num == $number) {
				setcookie('res',1,time() + 3600);
				header('Location: game_res.php');
				exit;
			}
			if ($count == 0) {
				setcookie('res',-1, time() + 3600);
				header('Location: game_res.php');
				exit;
			}
		}
	}
	else {
		if (!isset($_POST['number'])) {
			echo 'Введите число</br>';
		}
		if ($chk>100 or $chk<0) {
			echo 'Вы ввели число не от 0 до 100</br>';
		}
		else {
			echo 'Это не число</br>';
		}
		if ($count <7) {
			$prev = $_COOKIE['prev'];
			echo "Предыдущее введенное число $prev";
                        if ($num > $prev) {
                                echo ' меньше искомого.';
                        }
                        if ($num < $prev) {
                                echo ' больше искомого.';
                        }
                        if ($num == $prev) {
                                setcookie('res',1,time() + 3600);
                                header('Location: game_res.php');
                                exit;
			}
                        if ($count == 0) {
                                setcookie('res',-1,time() + 3600);
                                header('Location: game_res.php');
                                exit;
                        }
                }
	}
	echo "<br/>Осталось попыток: $count<br/>";





?>

<form action="" method="post">
	Введите число от 0 до 100: <input name="number" type="number_int"/> <br/>
	<input type ="submit" value="try">
</form>
