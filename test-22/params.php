<?php
$root = $_SERVER['DOCUMENT_ROOT'];
//$root = "http://192.168.1.68:8080";

$params = [ 
    /*parametri intermediario Siav, possono essere vuoi, ils sistema siav li riscrive in automatico*/
    'trasmittenteIdPaese' => "IT", 
    'trasmittenteIdCodice' => "02334550288", // SIAV
    
    /*Dati Azienda Cedente/Prestatore, ovvero IMCA*/
    'idPaese' => "IT", 
    'idCodice' => "00183180652",
    'denominazione' => "I.M.C.A. s.p.a.",
    'regimeFiscale' => "RF01",
    'sedeIndirizzo' => "Via Provinciale San Marzano",
    'sedeNumeroCivico' => "1014",
    'sedeCap' => "84016",
    'sedeComune' => "Pagani",
    'sedeProvincia' => "SA",
    'sedeNazione' => "IT",
    'istitutoFinanziario' => 'MONTE DEI PASCHI DI SIENA',
    'iban' => 'IT57K0103076040000000966301',
    'bic' => 'PASCITM1SA9',

    'valuteIsoCode' => ['euro' => 'EUR', 'dollaro' => 'USD', 'sterlina' => 'GBP', 'sterlina' => 'LSD'], //array per conversione valute da formato gestionale a formato ISO utilizzato nelle fe  
    
    /*Dati di connesisone dello spazio SFTP messo a disposizione da SIAV*/
    'sftp_fe' => [
        'host' => 'ftp02.siavcloud.com',
        'username' => 'FtpELMETEL_TEST',
        'password' => '6M85NT7fh6Kv',
        'port' => 22
    ],
    
    /*Cartelle e percorsi utilizzati per creare/leggere i file xml/pdf nel repository locale*/    
    'baseurl' => [
        'sftp_in' => $root . "/workspace/IMCA/repository-doc/sftp/IN/",
        'sftp_out' => $root . "/workspace/IMCA/repository-doc/sftp/OUT/",
        'sftp_out_unzip' => $root . "/workspace/IMCA/repository-doc/sftp/OUT/unzip/",
        'local_eftout' => $root . "/workspace/IMCA/repository-doc/eftout/",
        'local_eftin' => $root . "/workspace/IMCA/repository-doc/eftin/",
        'local_ricevute' => $root . "/workspace/IMCA/repository-doc/ricevute/",
    ],
    'logs' => [
        'error' => $root . "/workspace/IMCA/logs/error/",
        'cron' => $root . "/workspace/IMCA/logs/cron/",
       
    ],
    
    'file_progressivo_invio' => $root . "/workspace/IMCA/repository-doc/progressivo_invio_fe.txt",
];

// LOGS
//   $errorDir = $_SERVER['DOCUMENT_ROOT']."/workspace/IMCA/logs/error";




/*
'baseurl' => [
        'sftp_in' => $root . "/IMCA-FE-DEMO/repository-doc/sftp/IN/",
        'sftp_out' => $root . "/IMCA-FE-DEMO/repository-doc/sftp/OUT/",
        'sftp_out_unzip' => $root . "/IMCA-FE-DEMO/repository-doc/sftp/OUT/unzip/",
        'local_eftout' => $root . "/IMCA-FE-DEMO/repository-doc/eftout/",
        'local_eftin' => $root . "/IMCA-FE-DEMO/repository-doc/eftin/",
        'local_ricevute' => $root . "/IMCA-FE-DEMO/repository-doc/ricevute/",
    ],
*/




?>
