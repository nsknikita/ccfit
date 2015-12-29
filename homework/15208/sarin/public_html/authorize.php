<?php
session_start();
if(isset($_SESSION[logged one]))
{
header("Location: ./secretplace.php");
         exit;
     }
if($_POST["submit"]) {
if (S_POST"user_pass" == "123")
{
header("location: ./secretplace.php);
exit;
}
$_SESSION["a}=1;
header("Location: ./index.php");
}
else{
echo "NOT THAT WAY";
}
?>

