<?php
/**
 * @author Tyutyunkov Vyacheslav (tve@softmotions.com)
 */

require_once './system/settings.php';

$errors = array();
$infos = array();

if (isset($_POST['action']) && $_POST['action'] == 'register') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    if (strlen($login) < 3) {
        $errors[] = 'Too short login';
    }
    if (strlen($login) > 64) {
        $errors[] = 'Too long login';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Too short password';
    }
    if (strlen($password) > 64) {
        $errors[] = 'Too long password';
    }
    if ($password != $cpassword) {
        $errors[] = 'Passwords are different';
    }

    if (empty($errors)) {
        $db = new mysqli(TH_MYSQL_HOST, TH_MYSQL_USER, TH_MYSQL_PASSWORD, TH_MYSQL_DATABASE);
        // todo: check connect

        $stmt = $db->prepare('SELECT COUNT(*) FROM users WHERE login = ?');

        $stmt->bind_param('s', $login);
        $stmt->bind_result($count);

        $stmt->execute();
        $stmt->fetch();

        $stmt-> close();

        if ($count > 0) {
            $errors[] = 'Not unique login';
        } else {
            $stmt = $db->prepare('INSERT INTO users (login, password, name, email) VALUES (?, ?, ?, ?)');
            $stmt->bind_param('ssss', $login, md5($password), $name, $email);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $infos[] = 'User created';
                $login = '';
                $name = '';
                $email = '';
            };
            $stmt->close();
        }

        $db->close();
    }
}
?>


<h1>Register form</h1>

<?php
if (!empty($errors)) {
?>
<pre style="color: red">
<?php foreach($errors as $error) echo $error . "\n";?>
</pre>
<?php
}
?>

<?php
if (!empty($infos)) {
?>
<pre style="color: green">
<?php foreach($infos as $info) echo $info . "\n";?>
</pre>
<?php
}
?>

<form action="" method="post">
    <input type="hidden" name="action" value="register"/>
    Name: <input name="name" value="<?=$name?>"/> <br/>
    Email: <input name="email" value="<?=$email?>"/> <br/>
    Login: <input name="login" value="<?=$login?>"/><br/>
    Password: <input name="password" type="password"/> <br/>
    Confirm password: <input name="cpassword" type="password"/> <br/>
    <input type="submit" value="Go!">
</form>



