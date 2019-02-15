<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-05</h1><br>";
// header('Content-type: text/plain');

echo "CLOSURE FUNCTION";
echo "<br><br>";
/**
 * Funzione Normale
 * Normalmente la variabile definita al di fuori della funzione
 * non viene riconosciuta all' interna della stessa
 * quindi avremo un errore di tipo: Notice: Undefined variable: saluto
 */
function noClosure()
{
    return $saluto; //  Undefined variable
};

echo noClosure(); // Ciao Mondo
echo "<br><br>";

/**
 * Funzione Closure
 * Quando una funzione è dichiarata, ha la capacità di fare riferimento a tutte le variabili che sono dichiarate nel suo ambito.
 * Una variabile dichiarata al di fuori della funzione non sarà quindi “visibile” al suo interno.
 * Le Closure, non sono altro che funzioni anonime che conoscono alcune variabili che non sono state definite al loro interno.
 * La clausola use in pratica permette alla funzione di importare nel proprio scope la variabile $saluto e di farne uso.
 */
$saluto = 'Ciao Mondo';
$closure = function () use ($saluto) {
    return $saluto;
};

echo $closure(); // Ciao Mondo
echo "<br><br>";

/**
 * Funzione Closure: passaggio per valore
 * La variabile di default viene importata per valore,
 * ciò significa che se aggiorniamo il valore della variabile importata nella closure,
 * la variabile esterna non sarà aggiornata.
 */
$variabile = 1;
$close = function () use ($variabile) {
    echo $variabile++;
};

$close(); // 1
$close(); // 1
$close(); // 1
echo $variabile; // 1 | il suo valore NON cambia
echo "<br><br>";

/**
 * Funzione Closure: passaggio per riferimento
 * Vediamo ora un esempio di passaggio per riferimento
 * anteponendo davanti alla nome della variabile il simbolo &,
 * e creiamo il classico contatore:
 */
$counter = 1;
$closure = function () use (&$counter) {
    echo $counter++;
};

$closure(); // 1
$closure(); // 2
$closure(); // 3
echo $counter; // 4 | il suo valore è cambiato
echo "<br><br>";

/**
 *
 */
/*
$aggiungi = function ($valore_da_aggiungere) {
return function ($x) use ($valore_da_aggiungere) {
return $x + $valore_da_aggiungere;
};
};

$aggiungi_6 = $aggiungi(6);
$aggiungi_8 = $aggiungi(8);

echo $aggiungi_6(10); // 16
echo $aggiungi_8(10); // 18
echo "<br><br>";
 */

$myArray = array(1, 2, 3, 4, 5);

// multiply each array value with 2
array_walk($myArray, function (&$value, $index) {
    $value *= 2;
});

print_r($myArray);

/**
 * Un'altra cosa interessante che si può fare con le closure è caricare una classe.
 * Per esempio:
 */
class MyClass
{
    public function __construct()
    {
        echo 'Classe inizializzata!';
    }
} // chiude classe

// funzione closure
$getMyClass = function () {
    $myClass = new MyClass();
    return $myClass;
};

$getMyClass();
// $myClass = $getMyClass();
