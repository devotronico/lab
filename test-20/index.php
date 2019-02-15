<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-13</h1>";

echo "VALUTE";
echo "<br><br>";


// <CODE10: Valute>
function getValutaFromISo($valuta_iso){
        
    $sql = "SELECT id FROM divise WHERE codice LIKE '$valuta_iso'";
    $result = $this->conn->query($sql);
    $divise = require "../divise.php";
    $valuta = strtolower($divise[$valuta_iso][0]);
    if($result->num_rows == 0){ // se la divisa non è già registrato nel db
        
        $numero = $divise[$valuta_iso][1];

        $sql = "INSERT INTO divise(`id`, `codice`, `valuta`, `numero`) VALUES (null, '$valuta_iso', '$valuta', $numero)";
        $this->conn->query($sql);
    }

    return $valuta;
}
// </NEW: getValutaFromISo>

function getTassoCambio(){

    return 1;
}
// </CODE10: Valute>


// <CODE9: Valute>
// https://fixer.io/
$BaseURL = "http://data.fixer.io/api/latest";
$APIKey = "?access_key=1675012151bac4aae76c5f06d85baf4c";
$urlComplete = $BaseURL.$APIKey;
$content = file_get_contents($urlComplete);		

$obj = json_decode($content);

echo $content;


echo "<pre>";
print_r($obj);
echo "</pre>";

// </CODE9: Valute>
// <CODE8: Valute>
/*
$quantità = 1.0;
$codice = "USD";
$data = date("d-m-Y");

$url = "http://sdw.ecb.europa.eu/curConverter.do?sourceAmount=$quantità&sourceCurrency=$codice&targetCurrency=EUR&inputDate=$data&submitConvert.x=44&submitConvert.y=8";
// $url = "http://sdw.ecb.europa.eu/curConverter.do?sourceAmount=1.0&sourceCurrency=$codice&targetCurrency=EUR&inputDate=$data&submitConvert.x=44&submitConvert.y=8";
// $url = "http://sdw.ecb.europa.eu/curConverter.do?sourceAmount=1.0&sourceCurrency=$codice&targetCurrency=EUR&inputDate=06-02-2019&submitConvert.x=44&submitConvert.y=8";
// $url = "http://sdw.ecb.europa.eu/curConverter.do?sourceAmount=1.0&sourceCurrency=USD&targetCurrency=EUR&inputDate=06-02-2019&submitConvert.x=44&submitConvert.y=8";

$content = file_get_contents($url);

$x = "1&nbsp;EUR&nbsp;=&nbsp;";
$y = "&nbsp;$codice";
// $y = "&nbsp;$codice</a></td>";

$token1 = explode($x, $content);

$token2 = explode($y, $token1[1]);

echo $token2[0];
*/





/*
  * 
 * Il seguente codice � del tutto inutile. Forse destinato ad uso non pi� implementato. 
 * Poteva essere soggetto a errori: Url non raggungibile per mancanza di connessione internet o restrizioni del sito provider, errore nel download e/o parser del file XML.
 * Non viene prelevato il valore di cambio, ma solo inserite le options con valuta USD e GBP.
 * Per tale motivo � stato eliminato ed inserite le options direttamente nel codice html.  
  * 
  */
  /*
   $XMLContent=file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml"); 
//   $XMLContent=file_get_contents("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml"); 
             

  echo "<pre>";
  print_r($XMLContent);
  echo "</pre>";

  foreach($XMLContent as $line){ 
    if(preg_match("/currency='([[:alpha:]]+)'/",$line,$currencyCode)){ 
      if(preg_match("/rate='([[:graph:]]+)'/",$line,$rate)){ 
 
        //echo'1&euro; = '.$rate[1].' '.$currencyCode[1].'<br/>'; 

      	
      	$valuta = $currencyCode[1];
      	if($valuta == 'USD' || $valuta == 'GBP'){
      		
		
		switch($valuta){
			case 'USD' : $valuta = 'dollaro';
				break;
			case 'GBP' : $valuta = 'sterlina';
				break;
			
		}
      	
      	
      	$tasso = $rate[1];
      	$cambio = number_format(1/$tasso, 4);
      	
      //print $currencyCode[1]." <input type='number' lavel=$valuta     value=$cambio></br>";
      print"<option value=$valuta> $valuta</option>";}
      
      } 
      
    } 
  } 
  */
  // </CODE8: Valute>




// <CODE7: Valute>
/*


$divise = require "conn.php";
$divise = require "divise.php";

$valuta_iso = "USD";
$valuta = strtolower($divise[$valuta_iso][0]);
$numero = $divise[$valuta_iso][1];


$sql = "SELECT id FROM divise WHERE codice LIKE '$valuta_iso'";
$result = $conn->query($sql);
if($result->num_rows == 0){ // se la divisa non è già registrato nel db



$sql = "INSERT INTO divise(`id`, `codice`, `valuta`, `numero`) VALUES (null, '$valuta_iso', '$valuta', $numero)";
$conn->query($sql);
} else { echo "KO"; }
echo "<br>";
echo $valuta_iso;
echo "<br>";
echo $valuta;
echo "<br>";
echo $numero;


// echo "<pre>";print_r($divise[$valuta_iso][0]);"</pre>";
// echo "<pre>";print_r($divise["EUR"][0]);"</pre>";
// echo "<pre>";print_r($divise["EUR"]);"</pre>";
// echo "<pre>";print_r($divise);"</pre>";

// INSERT INTO divise(`id`, `codice`, `valuta`, `numero`) VALUES (null, 'EUR', 'euro', 978)

// var_dump(getValutaFromISo($valuta_iso));
*/
// </CODE7: Valute>
