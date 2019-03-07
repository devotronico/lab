<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-21</h1>";

echo "Raccolta query";
echo "<br><br>";



//#############################
$anno = date('Y');
$sqlFTT = "SELECT id, codice FROM ftout WHERE YEAR(dataEmissione) = " . $anno . " AND RIGHT(codice, 1) = 'T'	ORDER BY id DESC LIMIT 1";
$resFTT = $conn->query($sqlFTT);
$datiFTT = $resFTT->fetch_assoc();
$codiceT = $datiFTT["codice"];


$sqlFTB = "SELECT id, codice FROM ftout WHERE YEAR(dataEmissione) = " . $anno . " AND RIGHT(codice, 1) = 'B'	ORDER BY id DESC LIMIT 1";
$resFTB = $conn->query($sqlFTB);
$datiFTB = $resFTB->fetch_assoc();
$codiceB = $datiFTB["codice"];

$sqlFTE = "SELECT id, codice FROM ftout WHERE YEAR(dataEmissione) = " . $anno . " AND RIGHT(codice, 1) = 'E'	ORDER BY id DESC LIMIT 1";
$resFTE = $conn->query($sqlFTE);
$datiFTE = $resFTE->fetch_assoc();
$codiceE = $datiFTE["codice"];

$sqlFT = "SELECT id, codice FROM ftout WHERE YEAR(dataEmissione) = " . $anno . " AND RIGHT(codice, 1) BETWEEN '0' AND '9' ORDER BY codice * 1 DESC LIMIT 1";
$resFT = $conn->query($sqlFT);
$datiFT = $resFT->fetch_assoc();
$codice = $datiFT["codice"];

        print "Ultima T: ".$codiceT;
        print " - Ultima B: ".$codiceB;
        print " - Ultima: ".$codice."</br>";
        print " - Ultima elettronica: ".$codiceE."</br>";

        print "<input type=\"text\" name='ft'  required>
        </th>";



#---
/*
SELECT * AS `d`
FROM `ddtout`
LEFT JOIN `clienti` AS `c`
ON `c.id` = `d.cliente`
WHERE 1



SELECT OrderID, Quantity,
CASE
    WHEN condition1 THEN result1
    WHEN condition2 THEN result2
    WHEN conditionN THEN resultN
    ELSE result
END;
FROM OrderDetails;


SELECT OrderID, Quantity, IF(Quantity>10, "MORE", "LESS")
FROM OrderDetails;



SELECT p.productID, p.numOfLikes,
CASE WHEN cp.customerID IS NULL THEN 'false' ELSE 'true'
END isLiked
FROM Products p
LEFT JOIN CustomerProducts cp ON cp.productID = p.productID
AND cp.customerID = 107678695429
WHERE p.productID IN (52979957765,69833654277,69757075461,69128650757)




#---
SELECT * AS `d`
FROM `ddtout`
LEFT JOIN `clienti` AS `c`
ON `c.id` = `d.cliente`
WHERE 1
*/
#---


$sql = $conn->query("SELECT imballaggi.id, imballaggi.codice, imballaggi.brand AS imballaggibrand, brand.brand AS brand_brand
FROM imballaggi
LEFT JOIN brand ON imballaggi.brand = brand.id ");
while($dati = $sql->fetch_assoc()){

	$idProdotto = $dati["id"];
	$codiceProdotto = $dati["codice"];
	$nomeBrand = $dati["brand_brand"];
	echo "<option value=$idProdotto>$codiceProdotto"." - ".$nomeBrand."</option>";
}


/*
SELECT OrderID, Quantity, IF(Quantity>10, "MORE", "LESS")
FROM OrderDetails;

#---

SELECT p.productID, p.numOfLikes,
CASE WHEN cp.customerID IS NULL THEN 'false' ELSE 'true'
END isLiked
FROM Products p
LEFT JOIN CustomerProducts cp ON cp.productID = p.productID
AND cp.customerID = 107678695429
WHERE p.productID IN (52979957765,69833654277,69757075461,69128650757)
*/
#---


$anno = date('Y');
$sqlFT = "SELECT id, codice FROM ncredito_ricevute WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'I'
UNION
SELECT 	id, codice FROM ftin WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'I'
UNION
SELECT id, codice FROM parcelle WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'I'
ORDER BY CAST(LEFT(codice, LOCATE('/', codice)-1) AS UNSIGNED) DESC LIMIT 1";
$resFT = $conn->query($sqlFT);
$datiFT = $resFT->fetch_assoc();
$aa = date('y');
$utlimaftI = $datiFT["codice"];

#---------



//Ultimo codice numerazione default
$sqlFT = "SELECT id, codice FROM ncredito_ricevute WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) BETWEEN '0' AND '9'
UNION
SELECT 	id, codice FROM ftin WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) BETWEEN '0' AND '9'
UNION
SELECT id, codice FROM parcelle WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) BETWEEN '0' AND '9'
ORDER BY CAST(LEFT(codice, LOCATE('/', codice)-1) AS UNSIGNED) DESC LIMIT 1";

$resFT = $conn->query($sqlFT);
$datiFT = $resFT->fetch_assoc();
// $aa = date('y');
$utlimaft = $datiFT["codice"];


#------------------------


$sqlFTE = "SELECT * FROM (
SELECT id, codice, dataEmissione AS dat FROM ftout
UNION
SELECT id, codice, data AS dat  FROM ncredito_emesse
) AS temp
WHERE YEAR(temp.dat) = " . $anno . " AND RIGHT(codice, 1) = 'E'
ORDER BY temp.dat DESC LIMIT 1";


#-----------------


$sqlLotti = $conn->query("SELECT ddtout.id, ddtout.codice, ddtout.data, ddtout.cliente, ddtout.fornitore, clienti.ragione_sociale AS rsocialeclienti, fornitori.ragione_sociale AS rsocialefornitori
FROM ddtout
LEFT JOIN clienti ON ddtout.cliente = clienti.id AND clienti.id != 0
LEFT JOIN fornitori ON ddtout.fornitore = fornitori.id AND fornitori.id != 0");
while($dati = $sqlLotti->fetch_assoc()){
	$id = $dati["id"];
	$codice = $dati["codice"];
	$data  = $dati["data"];
	$ricevente = $dati["rsocialeclienti"] ? $dati["rsocialeclienti"] : $dati["rsocialefornitori"];

	echo "<option value=$id>$codice - $ricevente - $data</option>";
}

#---
## FILE: pagamento_fornitore.php
$sql = "SELECT PR.importoPagato AS `p_importoPagato`, PR.fattura AS `p_fat`, PR.ncredito AS `p_not`, PR.parcella AS `p_par`, PR.bPaga AS `p_bus`, SUM(PR.importoPagato) AS `totalePagato`,
f.id AS f_id, f.codice AS f_codice, f.protocollo AS f_protocollo, f.dataEmissione AS f_dataEmissione, f.totale AS f_totale,
n.id AS n_id, n.codice AS n_codice, n.numeroNC AS n_numeroNC, n.dataEmissione AS n_dataEmissione, n.totale AS n_totale,
p.id AS p_id, p.codice AS p_codice, p.dataEmissione AS p_dataEmissione, p.numeroParcella AS p_numeroParcella, p.totale AS p_totale
FROM `pagamenti_row` AS `PR`
LEFT JOIN `ftin` AS f ON PR.fattura = f.id
LEFT JOIN `ncredito_ricevute` AS n ON PR.ncredito = n.id
LEFT JOIN `parcelle` AS p ON PR.parcella = p.id
WHERE PR.pagamento = '$id'
GROUP BY PR.fattura, PR.ncredito, PR.parcella
HAVING totalePagato > 0";


#---
// REGULAR EXPRESSION REGEX
$sql = "SELECT * FROM `eftin_import` WHERE `file_sbustato` NOT REGEXP BINARY '\.xml$'";

#----
// PROTOCOLLI
// SELECT CAST(LEFT(20/19/E, LOCATE('/', 20/19/E)-1) AS UNSIGNED) ritorna E
//Ultimo codice fattura, parcelle, note di credito. numerazione /I
$anno = date('Y');
$sqlFT = "SELECT id, codice FROM ncredito_ricevute WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'I'
UNION
SELECT 	id, codice FROM ftin WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'I'
UNION
SELECT id, codice FROM parcelle WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'I'
ORDER BY CAST(LEFT(codice, LOCATE('/', codice)-1) AS UNSIGNED) DESC LIMIT 1";
$resFT = $conn->query($sqlFT);
$datiFT = $resFT->fetch_assoc();
// $aa = date('y');
$utlimaftI = $datiFT["codice"];

//Ultimo codice fattura elettronica numerazione /E
$sqlFT = "SELECT id, codice FROM ncredito_ricevute WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'E'
UNION
SELECT 	id, codice FROM ftin WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'E'
UNION
SELECT id, codice FROM parcelle WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) = 'E'
ORDER BY CAST(LEFT(codice, LOCATE('/', codice)-1) AS UNSIGNED) DESC LIMIT 1";

$resFT = $conn->query($sqlFT);
$datiFT = $resFT->fetch_assoc();
// $aa = date('y');
$utlimaftE = $datiFT["codice"];
//$utlimaftInt = (int) str_replace('/'.$aa, '', $datiFT["codice"]);
//$codiceft = $utlimaftInt + 1 . '/'.$aa;

//Ultimo codice numerazione default
$sqlFT = "SELECT id, codice FROM ncredito_ricevute WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) BETWEEN '0' AND '9'
UNION
SELECT 	id, codice FROM ftin WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) BETWEEN '0' AND '9'
UNION
SELECT id, codice FROM parcelle WHERE YEAR(dataEmissione) = $anno AND RIGHT(codice, 1) BETWEEN '0' AND '9'
ORDER BY CAST(LEFT(codice, LOCATE('/', codice)-1) AS UNSIGNED) DESC LIMIT 1";




