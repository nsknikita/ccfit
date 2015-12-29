<?php
session_start();

if(isset($_SESSION[logged one])){
header("Location: ./index.php");
         exit;
     }
if($_POST["submit"]) {
$pass = explode(" | ", file("./logs") [$)POST["login"]]);
if(substr($pass[1], 0 , -1) == $POST["pass"])
{
$_SESSION[logged_one"]=$pass[0];
$_SESSION["a"]=0;
header("location: ./index.php);
exit;
} 
$_SESSION["a}=1;
header("Location: ../index.php");
}
else{
echo "NOT THAT WAY";
}
?>

