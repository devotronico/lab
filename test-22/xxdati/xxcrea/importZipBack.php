<?php

// http://localhost/gestionale-5/sorgenti/xxdati/importXmlFront.php
// http://localhost/gestionale-5/sorgenti/xxdati/xxcrea/importXmlBack.php

$message = '';
//$comeBack = "../importZipFront.php"; // percorso da riattivare/modificare
$comeBack = "../importZipFront.php";

if(!isset($_POST["submit"])){

    header("Location: ".$comeBack); die;
}


// CONTROLLA SE IL FILE E' VUOTO
if( !filesize($_FILES["fileToUpload"]["tmp_name"])){

    $message = "Il file è vuoto.<br>";
    header("Location: ".$comeBack."?error=".$message); die;
} 


//-------------------------------------------- 


include('../../params.php');
// IMPORTAZIONE CONTENUTO DEL FILE ZIP
// $nomefolderZip1 = $_FILES["fileToUpload"]["name"]; //  folder__zip-1.zip
$nomefolderZip = $_FILES["fileToUpload"]["tmp_name"]; // C:\xampp\tmp\php33AA.tmp
$datetime = date("YmdHis");
$annoCorrente = date("y"); // 19



// CREA LE DIRECTORY
// C:/xampp/htdocs/gestionale-form-xml-zip/repository-doc/eftin/19
$pathDestinationDir = $params['baseurl']['local_eftin'] . $annoCorrente; 

if(!is_dir( $pathDestinationDir )){
    
    mkdir(  $pathDestinationDir ); // "repository-doc/eftin/ + anno corrente,
}


// CREA LE DIRECTORY Temporanea
// C:/xampp/htdocs/gestionale-form-xml-zip/repository-doc/eftin/19/tmp
$pathTemporary = $pathDestinationDir . "/tmp" ; 

if(!is_dir( $pathTemporary )){
    
    mkdir( $pathTemporary ); // "repository-doc/eftin/ + anno corrente,
}


$zip = new ZipArchive;

if (!$zip->open($nomefolderZip)) {

    die("Errore nell' aprire il file zip: $nomefolderZip");
}


// <FASE-1> controllare se è gia stata caricata la stessa fattura contrllando il numero di protocollo del fornitore
for ($i = 0; $i < $zip->numFiles; ++$i) {

    $nomeFileFE = $zip->getNameIndex($i); // 1-18 IT0526289001418361_0YZF8.xml
    
    $basenameFE = pathinfo($nomeFileFE, PATHINFO_BASENAME); // 1-18 IT0526289001418361_0YZF8.xml


    if (preg_match('@\/@', $nomeFileFE)) { // DA CONTROLLARE [!]

        $message = "Errore il file zip NON deve contenere cartelle";
        header("Location: ".$comeBack."?error=".$message);  die;
    }
    else if (preg_match('/^([0-9]{8}\_)?IT[0-9]{11}\_[0-9A-Z]{1,}\.([xX][mM][lL])$/', $basenameFE)) {  

        copy("zip://{$nomefolderZip}#{$nomeFileFE}", "$pathTemporary/{$nomeFileFE}");
        require '../../components/ImportValidate.php';

        $target_tmp_file = $pathTemporary . "/" . $nomeFileFE;

        $importValidate = new ImportValidate($target_tmp_file); // IL FILE PASSATO NON é VALIDO

       // $error = $importValidate->checkIfXmlIsValid();
       
       /**
        * Se il file xml della fattura è corrotto o difettoso
        */
        if ( !$importValidate->checkIfXmlIsValid()){

            $message = "Il file caricato: $nomeFileFE <br>contiene errori e non è valido";
            header("Location: ".$comeBack."?error=".$message); die;
        }
        /**
         * SE il file caricato è una fattura elettronica
        */
        if ( !$importValidate->isFatturaElettronica() ){

            $message= "Il file caricato: $nomeFileFE <br>NON è una fattura elettronica";
        }


        /**
         * Controllo se la fattura elettronica ha il numero protocollo del fornitore già salvato nella tabella ftin
        */
        include('../../conn.php');
        $dati = $importValidate->billingAlreadyExists($conn);
        // $protocolloFornitore = $importValidate->billingAlreadyExists($conn);
        if ( $dati ) {
//             return ["protocolloFornitore" => $protocolloFornitore, "ragioneSocialeFornitore" => $ragioneSocialeFornitore];//$result->fetch_assoc()['protocollo']; 

            $message = "Una ".$dati["documentName"]." con protocollo ".$dati["protocollo"]." del fornitore ".$dati["ragioneSociale"]." è già presente nel database";
            // $message = "Una fattura con protocollo ".$dati["protocollo"]." del fornitore ".$dati["ragioneSociale"]."<br>è già presente nel database"; documentType
           // $message = "Una fattura con protocollo $protocolloFornitore<br>è già presente nel database";
        }
        // unlink($target_tmp_file) or die("Il file non si è cancellato");
        break;
    }
}
// </FASE-1>
if ( file_exists($target_tmp_file) ) {
    unlink($target_tmp_file) or die("Il file non si è cancellato");

} else {
    $message = "nel file zip non è stata trovato un file xml della fattura elettronica";
}

if ( !empty($message) ) { header("Location: ".$comeBack."?error=".$message);  die;}


// C:/xampp/htdocs/gestionale-form-xml-zip/repository-doc/eftin/19/20190104143323
$pathAllegati = $pathDestinationDir . "/" . $datetime;

mkdir( $pathAllegati ); // repository-doc/eftin/19/20190104103020


$allegati = '';
for ($i = 0; $i < $zip->numFiles; ++$i) {

    $nomeFile = $zip->getNameIndex($i); // 1-18 IT0526289001418361_0YZF8.xml

    $ext = pathinfo($nomeFile, PATHINFO_EXTENSION); // cattura l'estensione xml, pdf, txt, jpg ...

    $basename = pathinfo($nomeFile, PATHINFO_BASENAME); // 1-18 IT0526289001418361_0YZF8.xml

  
    if (preg_match('/^([0-9]{8}\_)?IT[0-9]{11}\_[0-9A-Z]{1,}\.(([xX][mM][lL])|([pP][dD][fF]))$/', $basename)) { // NEW

        copy("zip://{$nomefolderZip}#{$nomeFile}", "$pathDestinationDir/{$basename}");
        if (preg_match('/(.xml)$/i', $ext)) {

            $target_file = $pathDestinationDir . "/" . $nomeFile;
        }
    } 
    else { 

        copy("zip://{$nomefolderZip}#{$nomeFile}", "$pathAllegati/{$basename}"); 
        $allegati .= $datetime . "/" . $basename . ";";
    }
}

if(strlen($allegati) > 0)
    $allegati = substr($allegati, 0, -1); //tolgo l'ultimo cartattere ';' per corretta esplosione della stringa

$zip->close();


// salva nella tabella ftin
include('../../components/fe2db.php');
$newFtin = new fe2db($target_file, $conn, ['allegati' => $allegati], $params); //arg. 1: percorso della cartella file unzippato + nome file
$newFtin->executeSql(); //Salva nel DB eseguendo le query
      
$message = "Caricamento riuscito";
header("Location: ".$comeBack."?success=".$message);

    





 
