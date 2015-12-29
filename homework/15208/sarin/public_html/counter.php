<?php
echo "HELLO <br>";
echo "YOU ARE:";
$cur = file_get_contents('text.txt');
echo $cur++;
file_put_contents('text.txt',$cur);
?>
