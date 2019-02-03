<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-06</h1>";

echo "LAMBDA FUNCTION";
echo "<br><br>";
/**
 * Funzioni anonime
 * La funzioni lambda (o “funzioni anonime”) sono semplicemente funzioni usa e getta,
 * che possono essere definite in qualsiasi momento e che sono in genere associato ad una variabile.
 */
$quadrato = function ($x) {
    return $x * $x;
}; // <-- si aspetta il punto e virgola
echo $quadrato(3); // 9
echo "<br><br>";

/**
 * LAMBDA 1
 */
$arrayNum = array(1, 3, 6, 5, 2, 8);
$filtered = array_filter($arrayNum, function ($item) {
    return $item > 2;
});

echo "<pre>";
print_r($filtered);
echo "</pre>";
echo "<br><br>";
/**
 * LAMBDA esempio 1
 * Crea una nuova funzione anonima e la assegna a una variabile
 * la funzione built-in Array_filter accetta sia i dati che la funzione passata come variabile
 */
$arr1 = array(1, 2, 3, 4, 5, 6);

$filter_even = function ($item) { // funzione anonima
    return ($item % 2) == 0;
};

$output1 = array_filter($arr1, $filter_even);

echo "<pre>";
print_r($output1);
echo "</pre>";
echo "<br><br>";

/**
 * LAMBDA esempio 2
 * La funzione non ha bisogno di essere assegnata a una variabile.
 * Possiamo inserire la funzione direttamente come secondo argomento
 */
$arr2 = array(1, 2, 3, 4, 5, 6);

$output2 = array_filter($arr2, function ($item) {
    return ($item % 2) == 0;
});
echo "<pre>";
print_r($output2);
echo "</pre>";
echo "<br><br>";
