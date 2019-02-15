<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-08</h1>";

echo "STATIC VARIABLE";
echo "<br><br>";

/**
 * NON STATIC VARIABLE
 * Ogni volta che la funzione viene richiamata
 * la variabile statica perde il suo nuovo valore
 * e quindi viene reinizializzata ogni volta
 */
function test1()
{
    $a = 0;
    echo $a;
    $a++;
}
test1();
echo "<br>";
test1();
echo "<br><br>";

/**
 * STATIC VARIABLE
 * Ogni volta che la funzione viene richiamata
 * la variabile statica mantiene il suo valore
 * e quindi non viene reinizializzata ogni volta
 */
function test2()
{
    static $b = 0;
    echo $b;
    $b++;
}
test2();
echo "<br>";
test2();
echo "<br><br>";
