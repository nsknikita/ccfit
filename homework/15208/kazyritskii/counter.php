<?php
echo "Hello Dear Friend <br>";
echo "You are:";
$cur = file_get_contents('text.txt');
echo $cur++;
file_put_contents('text.txt',$cur);
?>
