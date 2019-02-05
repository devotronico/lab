<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-13</h1>";


echo "WRITE ON FILE DATA FROM DATABASE";
echo "<br><br>";


// <CODE2>

require "conn.php";

$sql = "SELECT * FROM ftin_row";

$result = $conn->query($sql);

$dati = $result->fetch_assoc();

while($dati = $result->fetch_assoc()){

    $rigaId = $dati["id"];
    $rigaData = $dati["data"];
    $rigaTotale = $dati["tot"];
    $fatturaId = $dati["fattura"];

    $sqlFattura = "SELECT * FROM ftin WHERE id = '{$fatturaId}'";
    $resFattura = $conn->query($sqlFattura);

    if ( $datiFattura = $resFattura->fetch_assoc() ) { // Restituisce un array associativo che corrisponde alla riga recuperata o NULL se non ci sono più righe.

        echo "riga con id: ".$rigaId." è associata alla fattura con id: ".$fatturaId."<br>";
    } else { 

        $txt = "La riga con id: ".$rigaId." con data: ".$rigaData." del totale: ".$rigaTotale." NON è associata a nessuna fattura";
        file_put_contents('logs_test.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
        echo $txt."<br>";
    }
}

// </CODE2>





