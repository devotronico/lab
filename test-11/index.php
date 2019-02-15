<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-11</h1>";


echo "array_filter";
echo "<br><br>";





/**
 * array_filter http://php.net/manual/en/function.array-filter.php
 * Filtra gli elementi di un array usando una funzione di callback
 * Cicla ciascun valore dell' array passandoli alla funzione di callback.
 * Se la funzione di callback ritorna true, il valore corrente dell'array viene restituito nell'array dei risultati.
 * Le chiavi dell' array vengono preservate.
 */
$arr = array(6, 7, 8, 9, 10, 11, 12);

function filtra($var) {
   
    return ($var < 9);
}

$filtraLmb = function($var) {

    return ($var > 9);
};

echo "Il secondo argomento è una funzione normale";
echo "<pre>";print_r(array_filter($arr, "filtra"));echo "</pre>";
echo "Il secondo argomento è una funzione lambda";
echo "<pre>";print_r(array_filter($arr, $filtraLmb));echo "</pre>";
