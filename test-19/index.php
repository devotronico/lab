<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-13</h1>";

echo "EMPTY";
echo "<br><br>";



/*
http://sdw.ecb.europa.eu/curConverter.do?
sourceAmount=1.0&
sourceCurrency=USD&
targetCurrency=EUR&
inputDate=06-02-2019&
submitConvert.x=14&
submitConvert.y=4

*/


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

//echo $content;






