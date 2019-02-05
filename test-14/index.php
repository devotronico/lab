<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-14</h1>";


echo "XML";
echo "<br><br>";



/*
$string = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;
*/

$fileXML = "file.xml";
$string = file_get_contents($fileXML);
libxml_use_internal_errors(true);
$xml = simplexml_load_string($string);


if ($xml === false) {


    $datetime = date("H-i-s_d-m-Y").".txt";
    
    $testo = "";

    echo "Errore Nel Caricamento del XML\n";
    foreach(libxml_get_errors() as $error) {
       
        echo "<br>", "Linea: ".$error->line."<br>Colonna: ".$error->column."<br>Errore: ".$error->message;
     
        $testo .= "\n\nErrore : ".$error->message."Linea: ".$error->line."  Colonna: ".$error->column;
    }
    $annoCorrente = date("y"); // 19
    $meseCorrente = date("m"); // 01
    $errorDir = "logs-error"; 
    // file_force_contents("$errorDir/$annoCorrente/$meseCorrente/log.txt", $testo); 
    file_force_contents("$errorDir/$annoCorrente/$meseCorrente/$datetime", $testo); 
}
else {

echo "<pre>";print_r($xml);echo "</pre>";

var_dump($xml);

echo $xml->title;

}



function file_force_contents($filename, $data, $flags = 0){

    if(!is_dir(dirname($filename))) {

        mkdir(dirname($filename).'/', 0777, TRUE);
    }
    return file_put_contents($filename, $data.PHP_EOL, FILE_APPEND | LOCK_EX);
    // return file_put_contents($filename, $data, $flags);
}



// $testo .= "\nLinea: ".$error->line."  Colonna: ".$error->column."\nErrore: ".$error->message;
// echo "<br>", "Linea: ".$error->line."<br>Colonna: ".$error->column."<br>Errore: ".$error->message;
// $testo .= "Linea: ".$error->line."<br>Colonna: ".$error->column."<br>Errore: ".$error->message;




