<?php
$root = $_SERVER['DOCUMENT_ROOT'];

$params = [ 

    /*Cartelle e percorsi utilizzati per creare/leggere i file xml/pdf nel repository locale*/    
    'baseurl' => [
        'sftp_in' => $root . "/workspace/IMCA/repository-doc/sftp/IN/",
        'sftp_out' => $root . "/workspace/IMCA/repository-doc/sftp/OUT/",
        'sftp_out_unzip' => $root . "/workspace/IMCA/repository-doc/sftp/OUT/unzip/",
        'local_eftout' => $root . "/workspace/IMCA/repository-doc/eftout/",
        'local_eftin' => $root . "/workspace/TEST/gestionale-download-file-pdf/repository-doc/eftin/",
        'local_ricevute' => $root . "/workspace/IMCA/repository-doc/ricevute/",
    ]
];
?>
