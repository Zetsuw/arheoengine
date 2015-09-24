<?php

$criteriu = $_GET["criteriu"];
$valCriteriu = $_GET["valCriteriu"];
$pagina = $_GET["valCriteriu"];

$file = fopen("tabel.csv","r");

$keys = array(
	"identificatorul_sitului", 
	"url", 
	"codul_ran_al_sitului", 
	"codul_lmi_al_sitului", 
	"judetul", 
	"unitatea_administrativa", 
	"localitatea", 
	"codul_siruta", 
	"adresa_sitului", 
	"punctul", 
	"nume_alternative_ale_punctului", 
	"numele_punctului_in_alte_limbi", 
	"reper", 
	"reper_hidrografic", 
	"tipul_reperului_hidrografic", 
	"parcela_cadastrala", 
	"longitudine", 
	"latitudine", 
	"altitudine", 
	"longitudine", 
	"latitudine", 
	"forma_de_relief", 
	"suprafata_sitului", 
	"numele_sitului", 
	"nume_alternative_ale_sitului", 
	"numele_sitului în alte limbi", 
	"categoria_sitului", 
	"tipul sitului", 
	"datarea relativã a sitului", 
	"epoca (sit)", 
	"descoperitorul sitului", 
	"data descoperirii sitului", 
	"starea de conservare", 
	"regim de proprietate", 
	"descrierea sitului", 
	"observa?ii la sit", 
	"utilizarea terenului", 
	"identificatorul ansamblului", 
	"codul RAN al ansamblului", 
	"codul LMI al ansamblului", 
	"numele ansamblului", 
	"tipul ansamblului", 
	"datarea relativã a ansamblului", 
	"epoca (ansamblu)", 
	"perioada (ansamblu)", 
	"cultura (ansamblu)", 
	"faza culturalã (ansamblu)", 
	"localizarea ansamblului în sit", 
	"descrierea ansamblului", 
	"observa?ii la ansamblu", 
	"identificatorul complexului", 
	"numele complexului", 
	"tipul complexului", 
	"datarea relativã a complexului", 
	"epoca (complex)", 
	"perioada (complex)", 
	"cultura (complex)", 
	"faza culturalã (complex)", 
	"descrierea complexului", 
	"observa?ii la complex", 
	"identificatorul obiectului", 
	"categoriea obiectului", 
	"tipul obiectului", 
	"materialul", 
	"datarea relativã a obiectului", 
	"epoca (obiect)", 
	"perioada (obiect)", 
	"cultura (obiect)", 
	"faza culturalã (obiect)", 
	"descrierea obiectului", 
	"observa?ii la obiect", 
	"data actualizãrii"

);

$situri = array();
$index = 0;
while(! feof($file))
	{
		if($index>15) break;
		$var = fgetcsv($file, 0, ";");
		if($var){
		$tabel = array_combine ( $keys , $var );
		$situri[] = $tabel;
		$index++;
	}
}
fclose($file);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ArheoENGINE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Stylesheets -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	
	<link href="css/animate.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="js/jquery-2.1.4.min.js"></script>
	
	<link rel="icon" type="image/png" href="favicon.png" />
	
</head>
<body>
	
	<a href="index.php"><div id="logo" class="wow bounceIn"></div></a>
	
	<div class="box-90" style="overflow-x:scroll">
		<div id="error"><i class="fa fa-exclamation-triangle"></i> Nu stii sa cauti
			<i class="fa fa-times rightClose" onClick="$('#error').fadeOut();"></i>
		</div>
		<table style="width:100%">
			<tr>
				<td>Denumire</td>
				<td>Categorie</td> 
				<td>Tip</td>
				<td>Judet</td>
				<td>Localitate</td>
				<td>Cronologie</td>
				<td>Detalii</td>
			</tr>
			<?php foreach($situri as $value): ?>
			<tr>
				<td><?php echo $value["numele_sitului"]; ?></td>
				<td><?php echo $value["categoria_sitului"]; ?></td> 
				<td><?php echo $value["tipul sitului"]; ?></td> 
				<td><?php echo $value["judetul"]; ?></td> 
				<td><?php echo $value["localitatea"]; ?></td> 
				<td><?php echo $value["numele_sitului"]; ?></td> 
				<td><?php echo $value["numele_sitului"]; ?></td> 
			</tr>
			<?php endforeach; ?>
		</table>
		
		</div>
		<br>
		<br>
		<br>
		<br>
		
		
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>