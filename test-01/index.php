<?php
/*
# NON CANCELLARE
## session_name('NOMEMIASESSIONE');
### header('Cache-Control: no cache') [index.php]
### prevent-browser-cache-for-php-site
### setcookie("PHPSESSID","",time()-3600,"/"); // 
set_time_limit(300);
ini_set('max_execution_time', 300)


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$mysqli::warning_count
mysqli::debug()
mysqli::get_connection_stats()
mysqli::stat
---

JS
JSON.stringify(data);
removeAttribute
toFixed(2)
parseFloat
match
onchange
remove()
insertRow
cloneNode
insertCell


var mapForm = document.createElement("form");
    mapForm.target = "Map";
    mapForm.method = "POST"; // or "post" if appropriate
    mapForm.action = "expxls.php";

    var mapInput = document.createElement("input");
    mapInput.type = "text";
    mapInput.name = "int[]";
    mapInput.value = titoli;
    mapForm.appendChild(mapInput);

   var mapInput2 = document.createElement("input");
    mapInput2.type = "text";
    mapInput2.name = "righe[]";
    mapInput2.value = righe;
    mapForm.appendChild(mapInput2);

  document.body.appendChild(mapForm);

     map = window.open("", "Map", "status=0,title=0,height=600,width=800,scrollbars=1");
 mapForm.submit();

 document.body.removeChild(mapForm);

 ---
/*
// $sign = $imponibile <=> 0;
$sign = ( $imponibile > 0 ) ? 1 : ( ( $imponibile < 0 ) ? -1 : 0 ); 
switch ( $sign ) {
      case 0: 
      break;
      case -1: 
      break;
      case 1: 
      break;
}
*/








/*
[ft] => 31/19/E
[dtemiss] => 2019-01-25
[dtregistrazione] => 2019-01-25
[fornitore] => 3
[protFornitore] => 549988
[dicIntenti] => --Selezione una voce--
[valuta] => euro
[dtsca] => 2019-01-26
[pagamento] => 1
[cambio] => 1
[imponibile€] => 244.00
[imponibile] => 200.00
[iva] => 44.00
[ivato] => 244.00
[costo0] => 5
[desc0] => test
[qt0] => 2
[pzu0] => 100
[pzt0] => 200
[aliq0] => 3
[tot0] => 244



$elencoCosti = array(); $elencoQt = array(); $elencoPZU = array();
$elencoPZT = array(); $elencoVAT = array(); $elencoTOT = array();
$elencoDesc = array();

foreach(array_keys($_GET) as $parametri){

    $label = strval($parametri);
    switch($parametri){
        case (strpos($label, 'costo') !== false) : array_push($elencoCosti, $_GET[$label]);
            break;
        case (strpos($label, 'qt') !== false) : array_push($elencoQt, $_GET[$label]);
            break;
        case (strpos($label, 'pzu') !== false) : array_push($elencoPZU, $_GET[$label]);
            break;
        case (strpos($label, 'pzt') !== false) : array_push($elencoPZT, $_GET[$label]);
            break;
        case (strpos($label, 'aliq') !== false) : array_push($elencoVAT, $_GET[$label]);
            break;
        case (strpos($label, 'tot') !== false) : array_push($elencoTOT, $_GET[$label]);
            break;
          case (strpos($label, 'desc') !== false) : array_push($elencoDesc, $_GET[$label]);
            break;
    }
}


print $rifFtOut;
//query di scrittura della fattura

include("../../libreria.php");

$sql = "INSERT INTO ftin(id, codice, fornitore, cliente, dataEmissione, dataScadenza, dataRegistrazione, imponibile, importoIva, totale, ordine, stato, pagamento, valuta, dicIntenti, protocollo, cambio, impoEuro, totaleEuro,rifFtOut,is_elettronica)
VALUES (NULL,
'$protocollo', '$fornitore','$cliente','$dataEmissione', '$dataScadenza', '$dataRegistrazione', '$imponibile', '$iva', '$ivato', '$ordine', 'ricevuta', '$pagamento', '$valuta', '$dicIntenti', '$protFornitore', '$cambio', '$impEuro','$totaleEuro', '$rifFtOut',0)";

$results = $conn->query($sql);

//query di scrittura delle righe

$sqlFattura = "SELECT id, codice FROM ftin ORDER BY id DESC LIMIT 1";
$resFattura = $conn->query($sqlFattura);
$fattura = $resFattura->fetch_assoc();
$idFattura = $fattura["id"];

$totRighe = count($elencoCosti);
for($i = 0; $i < $totRighe; $i++){
    $costi = $elencoCosti[$i];
    $desc = addslashes($elencoDesc[$i]);
    $qt = $elencoQt[$i];
    $pzu = $elencoPZU[$i];
    $pzt = $elencoPZT[$i];
    $vat = $elencoVAT[$i];
    $tot = $elencoTOT[$i];

$sqlRow = "INSERT INTO ftin_row(id, fattura, data, costo, descrizione, qt, pzu, pzt, vat, tot)
VALUES (NULL, '$idFattura', '$dataEmissione','$costi', '$desc', '$qt', '$pzu', '$pzt', '$vat', '$tot')";

$results = $conn->query($sqlRow);
}
*/



