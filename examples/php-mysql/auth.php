<?php
/**
 * @author Tyutyunkov Vyacheslav (tve@softmotions.com)
 */

require_once './system/settings.php';

session_start();

if (isset($_SESSION[AUTH_CONST])) {
    header('Location: index.php');
    exit;
}

$login = '';
if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);


    $db = new mysqli(TH_MYSQL_HOST, TH_MYSQL_USER, TH_MYSQL_PASSWORD, TH_MYSQL_DATABASE);
    if ($db->connect_error) {
        echo 'Connection error: ' . $db->connect_error;
    } else {
        $stmt = $db->prepare('SELECT COUNT(*) FROM users WHERE login = ? AND password = ?');

        $stmt->bind_param('ss', $login, md5($password));

        $stmt->execute();

        $stmt->bind_result($count);

        $stmt->fetch();

        $stmt->close();

        $db->close();

        if ($count == 1) {
            $_SESSION[AUTH_CONST] = $login;
            header('Location: index.php');
            exit;
        }
    }
}

?>

<h1>Auth required</h1>

<?php
if ($login) {
?>
    <h2 style="color: red;">Auth failed</h2>
<?php
}
?>

<form action="" method="post">
    Login: <input name="login" value="<?=$login?>"/><br/>
    Password: <input name="password" type="password"/> <br/>
    <input type="submit" value="Go!">
</form>


