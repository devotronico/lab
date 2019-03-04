<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="../../style.css" rel="stylesheet" type="text/css">
<link href="../../css/stile.css" rel="stylesheet" type="text/css" media="screen">
<!-- <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> -->
<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
<title>Modifica Cliente</title>
<style>
html { font-family: sans-serif; }
#logo { display: none; }
.page-title { margin-bottom: 0; text-align: center; color: #000; }
.message { width: 300px; margin: 0 auto; padding: 0; text-align: center; font-weight: bold; color: #000; }
.message-error { background-color: #DC3545; }
.message-success { background-color: #28A745; }
/* <TABLE-INPUT> */
.table_input { border-collapse:collapse; }

.row-input { margin: 0; padding: 0; display: flex; justify-content: center; }

.col_right-input {

	position: relative;
	width: 650px;
	height: 922px;
	border: 1px solid gray;
	background-color: #ccc;
}

.box_right-input-one {
	position: relative;
    top: 307px;
    border-top: 1px solid black;
    padding-left: 10px;
}

.box_right-input-two {
	position: relative;
    top: 574px;
    padding-left: 10px;
    border-top: 1px solid black;
}

input { padding: 6px 8px; font-size:15px; }

.col_input{
	border: 1px black solid;
	padding: 5px 10px;
	text-align: center;
	font-size: 18px;
}

.col_left-input { background-color: #333; color: white; }

.col_input-th { background-color: green; color: white; }

.col_input-td { background-color: #ddd }

.col_input-td-textarea { background-color: yellow; }

.col_input-td-anagrafica { background-color: orange; }

.aggiungi-indirizzi { padding: 15px; text-align: center; }

.btn { cursor: pointer;  border-radius: 8px; }

.btn-indirizzo-add{
	font-size: 15px;
	padding: 12px;
	text-align: center;
}

.btn-indirizzo-delete{
	padding: 6px;
	background-color: #DC3545;
	color: #fff;
}

.col_input-td-altriindirizzi { text-align: left; }

.input-altriindirizzi { width: 90%; }

.btn-hidden { display: none; }

.btn-update { background-color: blue; color: #fff }
/* </TABLE-INPUT> */


/* <TABLE-INFO> */
.separatore { width: 1400px; height: 40px; margin: auto; border-bottom:2px solid gray }

.row-info { padding: 0; height: 1260px; display: flex; justify-content: center;  }

.table_info { border-collapse:collapse; }

.col_info { padding: 0 4px; }

.line_info { line-height: .3; }


.col_right-info {
	position: relative;
    width: 500px;
    height: 1110px;
	border: 1px solid gray;
	background-color: #ccc;
}

.box_right-info-one, .box_right-info-two { padding-left: 10px; }

.box_right-info-three {
	position: relative;
    top: 830px;
    padding-left: 10px;
    border-top: 1px solid black;
}

.col_info{ border: 1px black solid;
padding: 0;
/* padding: 4px;  */
font-size: 15px;
 }

.col_info-th {  padding-left: 4px; text-align: center; background-color: #aaa; color: black; }
.col_info-td {  padding-left: 4px;}

.line-istruzioni { margin: 0; font-size: 18px; font-weight: 600 }

.line_info { line-height: .4; }

.special-char { font-size: 20px; font-weight: bold; }
.special-char-asterisco { font-size: 30px; font-weight: bold; }
.special-word { font-weight: bold; }

.attenzione-title { font-size: 20px; }
.attenzione { font-size: 17px; }
/* </TABLE INFO> */

.bottoni-blu { margin-top: 10px; }
</style>
</head>
<body>
<h2 class="page-title">Modifica Cliente</h2>
<?php
include("../../libreria.php");
print $menu;
print $logo;
if ( isset($_GET["success"]) ) { ?>
<p class="message message-success"><?=$_GET["success"]?></p>
<?php } else if ( isset($_GET["error"]) ) { ?>
	<p class="message message-error"><?=$_GET["error"]?></p>
<?php } ?>
<!-- </TABLE-INPUT> -->
<div class="row row-input">
<div class="col_wrapper col_left col_left-input">
<form method="get" action="xxaggiorna/cliente.php">
<table class="table_input" id="dati">
<tbody class="table_input-body">
<?php
$idCliente = $_GET["id"];
$sql = "SELECT *
FROM clienti WHERE id =$idCliente";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	$id = $row["id"];
	$ragioneSociale = $row["ragione_sociale"];
	$partitaIva = $row["partita_iva"];
	$codiceFiscale = $row["codice_fiscale"];

	$email = $row["email"];
	$telefono = $row["telefono"];
	$fax = $row["fax"];
	$indirizzo = $row["indirizzo"]; // indirizzo completo
	$areaGeografica = $row["area_geografica"];
	$pec = $row["pec"];
	$codice_identificativo_sdi = $row["codice_identificativo_sdi"];
	//Indirizzo
	$indirizzo_via = $row["indirizzo_via"];
	$indirizzo_ncivico = $row["indirizzo_ncivico"];
	$indirizzo_cap = $row["indirizzo_cap"];
	$indirizzo_comune = $row["indirizzo_comune"];
	$indirizzo_provincia = $row["indirizzo_provincia"];
	$altriIndirizzi = str_replace("; ", "</br>", $row["altriIndirizzi"]);
	$arrayAltriIndirizzi = explode(";", $row["altriIndirizzi"]);
?>
 	<tr class="row_input"><th class="col_input col_input-th">ID</th><td class="col_input col_input-td"><input name="id" value="<?=$id?>" size="50px"readonly></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Ragione Sociale</th ><td class="col_input col_input-td"><input name="rsociale" value="<?=$ragioneSociale?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Partita IVA</th><td class="col_input col_input-td"><input name="piva" value="<?=$partitaIva?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Codice Fiscale</th><td class="col_input col_input-td"><input name="cfiscale" value="<?=$codiceFiscale?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">E-mail</th><td class="col_input col_input-td"><input name="email" value="<?=$email?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Telefono</th><td class="col_input col_input-td"><input name="telefono" value="<?=$telefono?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Fax</th><td class="col_input col_input-td"><input name="fax" value="<?=$fax?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Indirizzo Generale</th><td class="col_input col_input-td col_input-td-textarea"><textarea name ="indirizzo" cols="50" rows="5" disabled><?=$indirizzo?></textarea></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">Indirizzo(Via)</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="indirizzo_via" value="<?=$indirizzo_via?>" size="50px"></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">N. Civico</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="indirizzo_ncivico" value="<?=$indirizzo_ncivico?>" size="50px"></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">CAP</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="indirizzo_cap" value="<?=$indirizzo_cap?>" size="50px"></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">Comune</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="indirizzo_comune" value="<?=$indirizzo_comune?>" size="50px"></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">Provincia</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="indirizzo_provincia" value="<?=$indirizzo_provincia?>" size="50px"></td></tr>
	<tr class="row_input"><th class="col_input col_input-th">Area Geografica</th><td class="col_input col_input-td col_input-td-anagrafica">
	<select name="areaGeografica">
<?php
	$sqlAG = "SELECT id, paese FROM areageografica";
	$resSqlAG = $conn->query($sqlAG);
	while($datiSqlAG = $resSqlAG->fetch_assoc()){

		$idArea = $datiSqlAG["id"];
		$area = $datiSqlAG["paese"];

		if($idArea == $areaGeografica){ ?>
		<option value="<?=$idArea?>" selected><?=$area?></option>
		<?php } else{ ?>
			<option value="<?=$idArea?>"><?=$area?></option>
		<?php
		}
	}
?>
	</select></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">PEC</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="pec" value="<?=$pec?>" size="50px"></td></tr>
    <tr class="row_input"><th class="col_input col_input-th">Codice Identificatico<br>(fattura elettronica)</th><td class="col_input col_input-td col_input-td-anagrafica"><input name="codice_identificativo_sdi" value="<?=$codice_identificativo_sdi?>" size="50px" maxlength="7"></td></tr>
	<tr class="row_input">
		<th class="col_input col_input-th aggiungi-indirizzi" colspan="2">
		<button id="test" class="btn btn-indirizzo-add">Aggiungi Altri Indirizzi</button>
		<!-- <br><small style="font-size:13px">bottone momentaneamente disabilitato per manutenzione</small> -->
		</th>
	</tr>
	<?php
	$nIndirizzi = count($arrayAltriIndirizzi);

	for($i=0; $i<$nIndirizzi; $i++){

		$altroIndirizzo = $arrayAltriIndirizzi[$i];
		?>
		<tr class="row_input row_input-indirizzo">
			<td class="col_input col_input-td col_input-td-altriindirizzi" colspan="2">
				<input name="altri_indirizzi[]" class="input-altriindirizzi" value="<?=$altroIndirizzo?>">
				<button class="btn btn-indirizzo-delete btn-hidden">CANC</button>
			</td>
		</tr>
		<?php
	}
}
}
?>
	<tr class="row_input row_input-update"><td class="col_input col_input-td" colspan='2'><input type="submit" class="btn btn-update" value='Aggiorna'></td></tr>
</tbody>
</table>
</form>
</div>
<div class="col_wrapper col_right col_right-input">
	<div class="box_right-input box_right-input-one">
		<p class="attenzione">
		ATTENZIONE<br>
		se ci sono informazioni nel campo generale “Indirizzo” di colore giallo<br>
		e sono vuoti i campi di colore arancione,<br>
		premendo il pulsante blue “Aggiorna”<br>
		il contenuto nel campo generale “Indirizzo” di colore giallo<br>
		verrà cancellato e sarà sostituito con informazioni vuote.<br>
		Quindi i campi arancioni sovrascrivono e compongono il testo del campo giallo.
		</p>
	</div>
	<div class="box_right-input box_right-input-two">
		<p class="attenzione">
		Gli indirizzi che vengono inseriti a fianco a sinistra nella sezione "Altri Indirizzi"<br>
		non vengono utilizzati per la fatturazione elettronica
		</p>
	</div>
</div>
</div>
<!-- </TABLE-INPUT> -->

<!-- <TABLE-INFO> -->
<div class="separatore"></div>
<p class="line-istruzioni" align="center" style="margin-top:36px">ISTRUZIONI Per la compilazione nell' ipotesi di anagrafica italiana</p>
<div class="row row-info">
<div class="col_wrapper col_left col_left-info">
<table class="table_info" align="center">
<tr class="row_info">
	<th class="col_info col_info-th">Ragione Sociale</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza massima di 80 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri:  <span class="special-char">€</span></p>
		<p class="line_info">Esempio: Fratelli Rossi le 4Stagioni Company S.P.A.</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Partita IVA <span class="special-char-asterisco">*</span></th>
	<td class="col_info col_info-td">
	<p class="line_info">Lunghezza compresa tra 1 e 28 caratteri</p>
	<p class="line_info">Esempio: DE167869490</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Codice Fiscale</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 11 e 16 caratteri</p>
		<p class="line_info">Non sono ammesse lettere minuscole</p>
		<p class="line_info">Esempio: ABCXYZ58R15H571T</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">E-mail</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 7 e 256 caratteri</p>
		<p class="line_info">Non sono ammesse email senza i carattere:  <span class="special-char">@ .</span></p>
		<p class="line_info">Esempio: aziendapelati123@mail456.com</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Telefono</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 5 e 12 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri:  <span class="special-char">€ °</span></p>
		<p class="line_info">Esempio: 333456789012</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Fax</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 5 e 12 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri:  <span class="special-char">€ °</span></p>
		<p class="line_info">Esempio: 555123456789</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Indirizzo(Via) <span class="special-char-asterisco">*</span></th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 1 e 60 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri:  <span class="special-char">€</span></p>
		<p class="line_info">Esempio: Via Costantinopoli</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">N. Civico</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 1 e 8 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri:  <span class="special-char">€ °</span></p>
		<p class="line_info">Esempio: 123/A</p>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">CAP <span class="special-char-asterisco">*</span></th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza 5 caratteri</p>
		<p class="line_info">Sono ammessi solo caratteri numerici</p>
		<p class="line_info">80040</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Comune <span class="special-char-asterisco">*</span></th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 1 e 60 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri:  <span class="special-char">€</span></p>
		<p class="line_info">Esempio: Ottaviano</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Provincia</th>
	<td class="col_info col_info-td">
	<p class="line_info">Lunghezza 2 caratteri</p>
	<p class="line_info">Sono ammessi solo caratteri maiuscoli</p>
	<p class="line_info">Esempio: NA</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Area Geografica <span class="special-char-asterisco">*</span></th>
	<td class="col_info col_info-td">
	<p class="line_info">Lunghezza 2 caratteri</p>
	<p class="line_info">Sono ammessi solo caratteri maiuscoli</p>
	<p class="line_info">Esempio: IT</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">PEC <span class="special-char">#</span></th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 7 e 256 caratteri</p>
		<p class="line_info">Non sono ammesse email senza i carattere:  <span class="special-char">@ .</span></p>
		<p class="line_info">Esempio: aziendapelati123@mail456.com</p>
	</td>
</tr>

<tr class="row_info">
	<th class="col_info col_info-th">Codice Identificatico <span class="special-char">#</span><br>(fattura elettronica)</th>
	<td class="col_info col_info-td">
		<p class="line_info">Lunghezza compresa tra 6 e 7 caratteri</p>
		<p class="line_info">Non sono ammessi caratteri: minuscoli o speciali</p>
		<p class="line_info">Esempio: 1234567</p>
	</td>
</tr>

</table>
</div>
<div class="col_wrapper col_right col_right-info">
<div class="box_right-info box_right-info-one">
<p class="attenzione-title">
Altre regole per la generazione delle fattura elettronica:
</p>
</div>
<div class="box_right-info box_right-info-two">
<p class="attenzione">I campi contrassegnati col il simbolo asterisco <span class="special-char-asterisco">*</span> sono obbligatori</p>
</div>
<div class="box_right-info box_right-info-three">
<p class="attenzione">
I campi contrassegnati col simbolo cancelletto <span class="special-char">#</span><br>
sono il <span class="special-word">Codice Identificativo</span> e la <span class="special-word">PEC</span><br>
Si deve obbligatoriamente disporre di almeno uno di questi due valori,<br>
altrimenti la fattura elettronica non può essere generata.
</p>
</div>
</div>
</div>
<!-- </TABLE-INFO> -->
<div class="bottoni-blu">
<?php bottoni(1);?>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {


// <DELETE-ROW>
const deleteRow = function(e){

this.parentNode.remove();
};

// seleziona tutti i bottoni delete
const selectAllButtonDelete = function(e){

	const buttons = document.querySelectorAll(".btn-indirizzo-delete");
	for ( const button of buttons ) { button.addEventListener('click', deleteRow, false); }
};
// </DELETE-ROW>



// <RESET-MESSAGE>
const resetMessage = function() { console.log("OK");

	const message = document.querySelector(".message");

	message.innerHTML = "";
}

// seleziona tutti gli elementi input
const selectAllInputs = function(e){

	const inputs = document.querySelectorAll("input");

	for ( const input of inputs ) { input.addEventListener('click', resetMessage, false); }
};
// </RESET-MESSAGE>




// <ON REFRESH>
selectAllButtonDelete();
selectAllInputs();
// </ON REFRESH>




// <ADD ROW>
const aggiungiriga = function() {

	event.preventDefault();

	// crea elemento TR
	const newTR = document.createElement("TR");
	newTR.classList.add("row_input", "row_input-indirizzo");

	//  seleziona ultima riga della tabella ultima riga (bottone aggiorna)
	const lastRow = document.querySelector(".row_input-update");
	const tableBodyINPUT = document.querySelector(".table_input-body"); // seleziona tabella
	tableBodyINPUT.insertBefore(newTR, lastRow);

	// crea elemento TD
	const newTD = document.createElement("TD");
	newTD.classList.add("col_input", "col_input-td", "col_input-td-altriindirizzi"); // input-altriindirizzi
	newTD.setAttribute("colspan", "2");

	newTR.appendChild(newTD);


	// crea elemento INPUT
	const newINPUT = document.createElement("INPUT");
	newINPUT.classList.add("input-altriindirizzi");
	newINPUT.setAttribute("name", "altri_indirizzi[]");
	newTD.appendChild(newINPUT);

	// crea elemento BUTTON
	const newBtnDelete = document.createElement("BUTTON");
	newBtnDelete.classList.add("btn", "btn-indirizzo-delete");
	newBtnDelete.innerHTML = "CANC";

	newTD.appendChild(newBtnDelete);

	selectAllButtonDelete();
}

const buttonAdd = document.querySelector(".btn-indirizzo-add");
buttonAdd.addEventListener("click", aggiungiriga, false);
// </ADD ROW>
});
</script>
</body>
</html>

