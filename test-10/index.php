<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-10</h1>";


echo "array_reduce";
echo "<br><br>";

/**
 * array_reduce  http://php.net/manual/en/function.array-reduce.php
 * arg1: array
 * arg2: callback con 2 argomenti
 *   callback arg1: Contiene il valore di ritorno della precedente iterazione; nel caso della prima iterazione invece mantiene il valore di iniziale
 *   callback arg2: Contiene il valore dell'attuale iterazione
 * arg3: Se l'iniziale facoltativa è disponibile, verrà utilizzata all'inizio del processo o come risultato finale nel caso in cui l'array sia vuoto
 * Ritorna: il valore risultante (non l'array)
 * Ritorna: Se l'array è vuoto e l'iniziale non viene passato, array_reduce() restituisce NULL
 */

// callback/funzione che verrà passata come secondo parametro
// la funzione array_reduce utilizza questa callback/funzione
// fintato non avrà ciclato tutti gli elementi dell' array
// al primo ciclo i parametri $carry, $item avranno lo stesso del primo elemento dell' array
// nel caso di un array con elementi [3,4,5] il loro valore è di 3
function sum($carry, $item)
{
    $carry += $item;
    return $carry;
}

$add = function ($carry, $item) {

    $carry += $item;
    return $carry;
};

$a = array(1, 2, 3, 4, 5);
$x = array();

var_dump(array_reduce($a, "sum")); // callback normale int(15)
var_dump(array_reduce($a, $add)); // callback lambda  int(15)
var_dump(array_reduce($x, "sum", "No data to reduce")); // string(17) "No data to reduce"
echo "<br><br>";














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
