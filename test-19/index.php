<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-13</h1>";

echo "LOGS";
echo "<br><br>";







class ImportValidate{
    
    private $pathFileXML; 
    private $objDocumento;
   
    /**
     *  Parametri costruttore:
     * [1] $pathFileXML: percorso + nome file xml
     *   es.: /repository-doc/sftp/OUT/unzip/20181203_2001_05880_B2B_FATTURE_PASSIVE_IT00183180652/IT00001111111_0000G.xml
     * 
     * Il costruttore converte in un oggetto SimpleXMLElement Object la stringa xml del file
     */
    function __construct($pathFileXML){

        $this->pathFileXML = $pathFileXML;
   
        if (file_exists($this->pathFileXML)) {

            $xml = file_get_contents($this->pathFileXML);
            libxml_use_internal_errors(true);
            $this->objDocumento = simplexml_load_string($xml); 

        }
    }



    private function writeErrorInLogs($filename, $data, $flags = 0){

        if(!is_dir(dirname($filename))) {

            mkdir(dirname($filename).'/', 0777, TRUE);
        }
        return file_put_contents($filename, $data.PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    public function checkIfXmlIsValid(){ 

        if ($this->objDocumento === false) {

            $testo = "";
            
            foreach(libxml_get_errors() as $error) {
                
                $testo .= "\n\nErrore : ".$error->message."Linea: ".$error->line."  Colonna: ".$error->column;
            }
            
            $dir = $_SERVER['DOCUMENT_ROOT']."/workspace/IMCA/logs/import_err-manual";
            $annoCorrente = date("y"); // 19
            $meseCorrente = date("m"); // 01
            $datetime = date("H-i-s_d-m-Y").".txt";

            $this->writeErrorInLogs("$dir/$annoCorrente/$meseCorrente/$datetime", $testo); 

            return false;
        }
        else {
        
            return true;
        }
    }




/**
* Controlla se il file xml ha il nodo FatturaElettronicaHeader
*/
public function isFatturaElettronica(){ 

   // var_dump($this->objDocumento); die;
    return property_exists((object)$this->objDocumento, "FatturaElettronicaHeader");
}



    // Se nel file XML esiste il nodo "DatiRitenuta" allora il documento sarà registrato come una parcella
    // altrimenti si andrà a leggere il valore del nodo "TipoDocumento" che determina il tipo di documento 
    private function getTipoDocumento(){
        
        if ( property_exists((object)$this->objDocumento->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento, "DatiRitenuta") ) {
            
            return "TD06";
        } else {
            
            return $this->objDocumento->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->TipoDocumento;
        }
    }


/**
 * Se nella tabella ftin è stata salvata già una fattura 
 *  con lo stesso id del fornitore e
 *  con lo stesso numero di protocollo
 * non bisogna salvarlo  04887780650
 */
public function billingAlreadyExists($conn){

    $piva = $this->objDocumento->FatturaElettronicaHeader->CedentePrestatore->DatiAnagrafici->IdFiscaleIVA->IdCodice;

    $piva = strval($piva);

     
//  var_dump($dati);die;

   
   // $piva = "04887780650";
    //Fornitori
    // $sql = "SELECT id, ragione_sociale FROM fornitori WHERE partita_iva LIKE '%$piva'";
    $sql = "SELECT id, ragione_sociale FROM fornitori WHERE partita_iva LIKE '$piva'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dati = $result->fetch_assoc();
        $idFornitore = $dati['id'];
        $ragioneSocialeFornitore = $dati['ragione_sociale'];
    } //else { die("ERRORE"); }


    // VE0000065      0017942A
    $protocollo = $this->objDocumento->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->Numero; 
 
    $tipoDocumento = $this->getTipoDocumento();


    switch ( $tipoDocumento ) {

        case 'TD01':
            $sql = "SELECT protocollo FROM ftin WHERE protocollo = '{$protocollo}' AND fornitore = '{$idFornitore}'";
            $documentName = "fattura";
        break;

        case 'TD04':
            $sql = "SELECT numeroNC FROM ncredito_ricevute WHERE numeroNC = '{$protocollo}' AND fornitore = '{$idFornitore}'";
            $documentName = "nota credito";
        break;

        case 'TD06':
            $sql = "SELECT numeroParcella FROM parcelle WHERE numeroParcella = '{$protocollo}' AND fornitore = '{$idFornitore}'";
            $documentName = "parcella";
        break;
    }


   $result = $conn->query($sql);
   
        if($result->num_rows > 0){

            return ["documentName" => $documentName, "protocollo" => $protocollo, "ragioneSociale" => $ragioneSocialeFornitore];

    } else { return false; }
}







} // CHIUDE CLASSE



/**
 * <FatturaElettronicaBody><DatiGenerali><DatiGeneraliDocumento><TipoDocumento>TD01</TipoDocumento>
 */

// public function getDocumentType(){ 

//     return $this->objDocumento->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->TipoDocumento;
 
// }

