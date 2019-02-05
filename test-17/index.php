<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-13</h1>";


echo "IF PROPERTY EXISTS";
echo "<br><br>";

 // <CODE0>
 $file = "20190123_IT04887780650_0000234183.xml";
 // $file = "IT00183180652_00172.xml";
 if (file_exists($file)) {
     $xml = file_get_contents($file);
     $objDocumento = simplexml_load_string($xml);
     // echo "<pre>";print_r($objDocumento);die;
 
     
     if ( property_exists((object)$objDocumento->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento, "DatiRitenuta") ) {

         var_dump($objDocumento->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->DatiRitenuta);
         die("SI");

     } else { die("NO"); }
 } 
 // <DatiRitenuta></DatiRitenuta> $objDocumento
 // </CODE2>





