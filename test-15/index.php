<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-13</h1>";


echo "LOGS";
echo "<br><br>";



// <CODE3>
/*
$txt = date('Y-m-d H:i:s');
if(filesize('logs_test.txt') > 10000) {
    file_put_contents('logs_test.txt', $txt.PHP_EOL);
} else {
file_put_contents('logs_test.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
}
*/

$datetime = date("YmdHis");
$annoCorrente = date("y"); // 19
$meseCorrente = date("m"); // 01
$annoCorrente = "20";
$meseCorrente = "02";

// CREA LE DIRECTORY
$pathDestinationDir = "logs". $annoCorrente; 

if(!is_dir( $pathDestinationDir )){
    
    mkdir(  $pathDestinationDir ); // "repository-doc/eftin/ + anno corrente,
}


function file_force_contents($filename, $data, $flags = 0){

    if(!is_dir(dirname($filename))) {

        mkdir(dirname($filename).'/', 0777, TRUE);
    }
    return file_put_contents($filename, $data.PHP_EOL, FILE_APPEND | LOCK_EX);
    // return file_put_contents($filename, $data, $flags);
}


file_force_contents("logs/$annoCorrente/$meseCorrente/log.txt", $datetime); 

// </CODE3>





