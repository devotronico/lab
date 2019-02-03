<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-09</h1>";


echo "array_map";
echo "<br><br>";


/**
 * array_map  http://php.net/manual/en/function.array-map.php
 * arg1: funzione che prende per argomento ogni elemento dell' array
 *       del secondo argomento della funzione array_map
 * arg2: array
 */
$arr = array(1, 2, 3, 4, 5);

// funzione normale
function cube($n)
{

    return ($n * $n * $n);
}

$a = array_map("cube", $arr); // arg1: funzione cube, arg2: array $arr

echo "<pre>";
print_r($a);
echo "</pre>";

// funzione lambda
$cube = function ($n) {

    return ($n * $n * $n);
};

$b = array_map($cube, $arr); // arg1: lambda $cube, arg2: array $arr

echo "<pre>";
print_r($b);
echo "</pre>";










