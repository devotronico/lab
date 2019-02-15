<!-- url:  localhost/gestionale-form-xml-zip/importZipFront.php  -->
<!-- url:  localhost/gestionale-form-xml-zip/importZipBack.php  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>

html, body{
    min-height: 100%; 
    min-height: 100vh; 
    background-color: #ccc;
}
::-webkit-scrollbar{display:none}

.container {
  min-height: 100%; 
  min-height: 100vh; 
  display: flex;
  padding-top: 50px;
  /* align-items: center; */
  justify-content: center;
}

.wrapper{
    min-height: 100%; 
    padding-bottom: 50px;
    width: 1000px;
    border: 1px solid silver;
    background-color: #ddd;
}


.nav{
    background-color: #fff;
}


.title{
    margin-top: 80px;
    margin-bottom: 80px;
}

.tutorial{
    width:90%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid silver;
}

.message{

    display: flex;
    align-items: center;
    justify-content: center;
}
.alert{
    min-width: 400px;
}


.form__box{

    display: flex;
    align-items: center;
    justify-content: center;
}

form{
    width: 600px;
    margin-top: 20px;
    padding: 50px;
    border: 1px solid silver;
    border-radius:6px;
    background-color: #fff;
    box-shadow: 1px 4px 15px 1px grey;
}

.form-group{
    padding: 10px;
}
</style>
<body>
<div class="container">

<div class="wrapper">
<?php
$base = "http://192.168.1.87/workspace/IMCA";
// $base = "http://localhost/gestionale-5/sorgenti"; 
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= $base ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?= $base ?>/dashnuovi.php">Nuovo</a></li>
    <li class="breadcrumb-item"><a href="<?= $base ?>/xxdati/importZipFront.php">Refresh</a></li>
  </ol>
</nav>
    <h4 class="text-center title">Importazione manuale di file Zip</h4>
<p class="text-center">
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Istruzioni
</button>
</p>
<div class="tutorial">
<div class="collapse" id="collapseExample">
  <div class="card card-body">
<p>Quando arriva una fattura elettronica via pec</p> 
<p>spesso oltre alla fattura arrivano anche altri file allegati alla stessa pec</p>
<p>quindi bisogna scaricare il file della fattura e tutti gli allegati all'interno di una cartella vuota.</p>
</p><br>
<p>Controllare tra tutti i file pdf, aprendoli uno alla volta, se c'è un file pdf della fattura elettronica. 
<p>Il file pdf della fattura elettronica deve avere lo stesso nome del file xml della fattura elettronica ( esempio.: IT0526289001418361_0YZF8.xml )</p> 
<p>ma deve finire con le lettere pdf ( esempio.: IT0526289001418361_0YZF8.pdf )</p> 
<p>Se è diverso allora va rinominato.</p> 
<p>ATTENZIONE I file che hanno all'interno del proprio nome i caratteri: _MT_ NON sono fatture elettroniche ( esempio.: IT0526289001418361_0YZF8_MT_003.xml )</p> 
</p><br>
<p>Entrare nella cartella che contiene i file scaricati.</p> 
<p>Selezionare tutti i file scaricati e comprimerli in un unico file zip.</p> 
<p>ATTENZIONE non bisogna zippare la cartella che contiene i file ma i file all' interno della cartella.</p> 
</p><br>
<p>Dopo che è stato creato il file zip caricarlo nel form sottostante e premere il bottone Carica file zip</p><br>
</div>
</div>
</div>
    <div class="form__box">
        <form class="form-inline" action="xxcrea/importZipBack.php" method="post" enctype="multipart/form-data">
    <?php if ( isset($_GET) ) : ?>
    <div class="message">

    <?php if ( isset($_GET["error"]) ) : ?>
        <div class="alert alert-danger" role="alert">
        <strong><?= $_GET["error"] ?></strong>
        </div>
    <?php elseif ( isset($_GET["success"]) ) : ?>
    <div class="alert alert-success" role="alert">
    <strong><?= $_GET["success"] ?></strong>
        </div>
    <?php endif ; ?>

    </div>
    <?php endif ; ?>

            <div class="form-group mb-2">
                <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" accept=".zip">
            </div> 
            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary"  value="Carica file zip" name="submit">
            </div> 
        </form>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>




















