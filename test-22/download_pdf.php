<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-21</h1>";

echo "Header";
echo "<br><br>";




// echo"<pre>";print_r($_GET);echo"<pre>"; // DEBUG


if(isset($_GET['file']) && isset($_GET['type']) && isset($_GET['y'])){

    include('fake-params.php'); // da cambiare in  include('../params.php');

    $nomeFileXML = $_GET['file'];

  
    // preg_match('/(.xml|.XML)$/', $nomeFileXML, $arrEstensioneXML);
    preg_match('/(.xml)$/i', $nomeFileXML, $arrEstensioneXML);
    $estensioneXML = $arrEstensioneXML[0];
 
    $nome_pdf = basename($nomeFileXML, $estensioneXML) . '.pdf'; 
   
    $local_dir = 'local_' . $_GET['type'];

    $dir = $params['baseurl'][$local_dir] . $_GET['y']; // NEW

    $file = $dir . '/' . $nome_pdf; // NEW

    // $file = $params['baseurl'][$local_dir] . $_GET['y'] . '/' . $nome_pdf; // NEW

  

   $filesize = filesize($file);

/*
    // DEBUG MULTILINE
    echo"<br>nomeFileXML: $nomeFileXML";
    echo"<br>estensioneXML:". $estensioneXML;
    echo"<br>nome_pdf: $nome_pdf";
    echo"<br>local_dir: $local_dir";
    echo"<br>dir: $dir";
    echo"<br>file: $file";
    echo"<br>basename:". basename($file);
    echo"<br>filesize:". filesize($file);
    echo"<br>";
*/
   
    if (file_exists($file)) { 
        //  die("OK");   // DEBUG

        setHeaders($file, $filesize);

    }  else { die("KO"); }   // DEBUG
}


// Prima versione per come sono impostati gli headers
function setHeadersOld($file){


    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}




function setHeaders($file){
    header('Pragma: public');  // required
    header('Expires: 0');  // no cache
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

    header('Cache-Control: private', false);
    header('Content-Type: application/pdf');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file)) . ' GMT');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header("Content-Transfer-Encoding:  binary");
   // header('Content-Length: ' . filesize($file)); // provide file size
    header('Connection: close');
    readfile($file);
    exit();
}



// Il minimo indispensabile di header settati
// per fare il download del file
function setHeadersMini($file, $filesize){

header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=".basename($file));
readfile($file);
}


