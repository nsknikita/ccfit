<?php 
session_start();

if (!isset($_SESSION[AUTH])) {
	include "login.php";
	die();
}

?>

<?php
include "counter.php";
?>

<form action="logout.php">
	<button type="submit">OUT</button>
</form>

