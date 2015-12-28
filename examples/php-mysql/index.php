<?php
/**
 * @author Tyutyunkov Vyacheslav (tve@softmotions.com)
 */

require_once './system/settings.php';

session_start();

if (!isset($_SESSION[AUTH_CONST])) {
    header('Location: auth.php');
    exit;
}

?>

<H1>Yahoo!</H1>


<?php


// TODO: logout link
// TODO: get user info from DB