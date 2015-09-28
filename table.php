<?php

if(isset($_GET["searchby"])){
	if($_GET["searchby"]!="")
		$searchby = $_GET["searchby"];
	else $searchby = "NONE";
} else {
	$searchby = "NONE";
}
if(isset($_GET["value"])){
	if($_GET["value"]!="")
		$value = $_GET["value"];
	else $value = "NONE";
} else {
	$value = "NONE";
}
if(isset($_GET["page"]) ){
	if($_GET["page"]!="")
		$page = $_GET["page"];
	else $page = 1;
} else {
	$page = 1;
}
if(isset($_GET["rows"]) ){
	if($_GET["rows"]!="")
		$rows = $_GET["rows"];
	else $rows = 15;
} else {
	$rows = 15;
}
if(isset($_GET["ages"]) ){
	if($_GET["ages"]!=""){
		$ages = $_GET["ages"];
		$value = $ages;
	}
	else $ages = "NONE";
} else {
	$ages = "NONE";
}

$file = fopen("data.csv","r");

$keys = array(
	"identificatorul_sitului", 
	"url", 
	"codul_ran_al_sitului", 
	"codul_lmi_al_sitului", 
	"Judet", 
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
	"Epoca sit", 
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
$index = $rows*($page-1);

while(! feof($file))
{
	$var = fgetcsv($file, 0, "|", chr(8));
	if($var){
		$table = array_combine ( $keys , $var );
		if($table[$searchby]==$value)
		{
			$situri[] = $table;
		}
	}
}
fclose($file);

$results = count($situri);

$situri = array_slice($situri, $index, $page*$rows);


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
	<link href="css/table.css" rel="stylesheet" type="text/css">
	
	<link href="css/animate.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="js/jquery-2.1.4.min.js"></script>
	
	<link rel="icon" type="image/png" href="favicon.png" />
	
</head>
<body>
	
	<a href="index.php"><div id="logo" class="wow bounceIn"></div></a>
	
	<div class="box-90">

		S-au afisat <?php echo $results ?> rezultate pentru: <?php echo $searchby . " - " . $value; ?>.
		<br><br>
		<table style="width:100%">
			<tr>
				<td>Denumire</td>
				<td>Categorie</td> 
				<td>Tip</td>
				<td>Judet</td>
				<td>Localitate</td>
				<td>Epoca sit</td>
				<td>Pagina cu detalii</td>
			</tr>
			<?php foreach($situri as $value): ?>
			<tr>
				<td><?php echo $value["numele_sitului"]; ?></td>
				<td><?php echo $value["categoria_sitului"]; ?></td> 
				<td><?php echo $value["tipul sitului"]; ?></td> 
				<td><?php echo $value["Judet"]; ?></td> 
				<td><?php echo $value["localitatea"]; ?></td> 
				<td><?php echo $value["Epoca sit"]; ?></td> 
				<td><?php echo $value["suprafata_sitului"]; ?></td> 
			</tr>
			<?php endforeach; ?>
		</table>

		<div id="pagination">
			<a href="" class="button">1</a>
		</div>
		
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>