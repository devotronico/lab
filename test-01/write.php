<?php

$myfile = fopen("logs.txt", "wr") or die("Unable to open file!");
$txt = "user id date2";
// fwrite($myfile, $txt);
$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
fclose($myfile);


