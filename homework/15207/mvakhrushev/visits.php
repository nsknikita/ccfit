<?php

$file = 'visitors.txt';

if (!file_exists($file)) {
    $f = fopen($file, 'w');
    fwrite($f, 0);
    fclose($f);
}

$f = fopen($file, "r");
$visitors = fread($f, 99);
fclose($f);

if (!isset($_COOKIE['visited'])) {
    $visitors++;
    setcookie('visited', 'was');

    $f = fopen($file, 'w');
    fwrite($f, $visitors);
    fclose($f);
}

echo "Уникальных посетителей: " . $visitors;

?>
