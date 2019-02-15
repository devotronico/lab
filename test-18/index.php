<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-13</h1>";


echo "ist-files-in-directory";
echo "<br><br>";


/**
 * Legge tutte le cartelle e i file contenute nel progetto
 */
$rootDir = __DIR__; // __DIR__ = C:\xampp\htdocs\CodeWall

$currentDirectoryItems = array_diff(scandir($rootDir . "/", 1), [".", ".."]); // Use array_diff to remove both period values eg: ("." , "..")
$allFiles = [];
foreach ($currentDirectoryItems as $value) {
    $allFiles[] = $value;

    if (is_dir($rootDir . "/" . $value)) { // Check if specified path is a directory
        $allFiles[] = array_diff(scandir($rootDir . "/" . $value), [".", ".."]); // Use array_diff to remove both period values eg: ("." , "..");
    }
}
// print_r($allFiles);


echo "<pre>";print_r($allFiles);echo "</pre>"; // printa tutte le cartelle e i file

