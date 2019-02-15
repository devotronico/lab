<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-21</h1>";

echo "Raccolta query";
echo "<br><br>";

$sql = $conn->query("SELECT * FROM ftout");
while($dati = $sql->fetch_assoc()){
    
    $id = $dati["id"];
    $codice = $dati["codice"];
    $data = $dati["dataEmissione"];
    $idCliente = $dati["cliente"];
    
    $sqlCli = $conn->query("SELECT * FROM clienti WHERE id = $idCliente");
    $datiCli = $sqlCli->fetch_assoc();
    
    $nome = $datiCli["ragione_sociale"];
    
    print "<option value=$id>$codice - $data - $nome</option>";
}
    
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


            ?>

<select  class="selectToc" name="dicIntenti" id="dicIntenti" onchange="return residuoDic()">
<option selected>--Selezione una voce--</option>
    <?php
    $sqlDic = "SELECT id, numero, cliente, importo
    FROM dich_intenti_ric";
    $resDic = $conn->query($sqlDic);
    while($datiDic = $resDic->fetch_assoc()){
        $id = $datiDic["id"];
        $numero = $datiDic["numero"];
        $forn = $datiDic["cliente"];
        
        $sqlFornitore = $conn->query("SELECT * FROM clienti WHERE id = $forn");
        $datiFornitore = $sqlFornitore->fetch_assoc();
        $nomeFornitore = $datiFornitore["ragione_sociale"];
        
        
        $sqlResiduo = "SELECT id, dicIntenti, SUM(imponibile) FROM ftin WHERE dicIntenti = $id";
        $resResiduo = $conn->query($sqlResiduo);
        $datiResiduo = $resResiduo->fetch_assoc();
        $consumato = $datiResiduo["SUM(imponibile)"];
        
        $residuo = $datiDic["importo"] - $consumato;
        
        
        print "<option value=$id id=$forn label=$residuo>$nomeFornitore - $numero</option>";
        
    }
    
    ?>
</select>


<?php


print"<td>
											<select class='selectToc' name='semil$i' id='semil$i' >
											<option value=''>-- scegli prodotto --</option>";
												
											$sqlProdotti = "SELECT * FROM imballaggi";
											$resProdotti = $conn->query($sqlProdotti);
											while($datiProdotto = $resProdotti->fetch_assoc()){
											$idProdotto = $datiProdotto["id"];
											$codiceProdotto = $datiProdotto["codice"];
											$idBrand = $datiProdotto["brand"];
											$sqlBrand = $conn->query("SELECT * FROM brand WHERE id = $idBrand");
											$datiBrand = $sqlBrand->fetch_assoc();
											$nomeBrand = $datiBrand["brand"];
							
											
												
										
											
												print "<option value=$idProdotto>$codiceProdotto"." - ".$nomeBrand."</option>";
											
										
						
						
						
											}
						
											print "</select></td>";