<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-13</h1>";


echo "array_walk";
echo "<br><br>";

/**
 * array_walk  http://php.net/manual/en/function.array-walk.php
 * Ritorna: true
 */
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");


// con una callback con tre argomenti:
// cambia il valore di ogni elemento dell' array
// per esempio se all' indice "d" abbiamo il valore lemon
// allora il valore verrà cambiato in "fruit: lemon"
function test_alter(&$item1, $key, $prefix) {
    $item1 = "$prefix: $item1"; 
}

function test_print($item2, $key) {
    echo "$key. $item2<br>";
}

echo "Prima:<br>";
array_walk($fruits, 'test_print');
// Before ...: d. lemon
// a. orange
// b. banana
// c. apple


// con il terzo argomento altera il valore degli elementi
array_walk($fruits, 'test_alter', 'fruit'); 

echo "Dopo:<br>";
array_walk($fruits, 'test_print');
// d. fruit: lemon
// a. fruit: orange
// b. fruit: banana
// c. fruit: apple















echo "Regular/Bitwise";
echo "<br><br>";


/**
 * Regular
 */
/*
echo (true && true); // 1
echo (true && false); // nothing

echo (true || false); // 1
echo (false || false); // nothing

echo (true xor false); // 1
echo (false xor false); // nothing
*/


/**
 * Bitwise
 */
/*
echo (true & true); // 1
echo (true & false); // 0

echo (true | false); // 1
echo (false | false); // 0

echo (true ^ false); // 1
echo (false ^ false); // 0
*/

$var = 2;
// $var = 2;
// $var = 3;
//echo (!($var & 1));
echo ($var & 1);
?>
