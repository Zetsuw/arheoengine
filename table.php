<?php

$value_of_search="NONE";

if(isset($_GET["searchby"])){
	if($_GET["searchby"]!="")
		$searchby = $_GET["searchby"];
	else $searchby = "NONE";
} else {
	$searchby = "NONE";
}
if(isset($_GET["value"])){
	if($_GET["value"]!=""){
		$value = $_GET["value"];
		$value_of_search=$value;
	}
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
		$value_of_search=$ages;
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
	"datarea relativa a sitului", 
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
	"datarea relativa a ansamblului", 
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
		if($table[$searchby]==$value_of_search)
		//if(levenshtein($table[$searchby],$value_of_search))
		{
			$situri[] = $table;
			print_r(levenshtein($table[$searchby],$value_of_search));
		}
	}
}
fclose($file);

$results = count($situri);

$situri = array_slice($situri, $index, $rows);

$pages = ceil($results/$rows);

function search_col(){
	return "style='background-color: #f9febc; color: black;'";
}

if($searchby=="Epoca sit"){
	$search_val = "ages";
}
else {
	$search_val = "value";
}

//if($results==0) header('Location:index.php?error=404');
//if($value_of_search=="NONE") header('Location:index.php?error=date');
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

		S-au gasit <?php echo $results ?> rezultate pentru: <?php echo $searchby . " - " . $value_of_search; ?>.
		<br><br>
		<table style="width:100%">
			<tr style="background: #1581b4;">
				<td>Denumire(+pagina detalii)</td>
				<td>Tip sit</td> 
				<td>Categorie sit</td> 
				<td>Cod SIRUTA</td>
				<td>Judet</td>
				<td>Localitate</td>
				<td>Epoca sit</td>
				<td>Datare</td>
			</tr>
			<?php $indd=1; foreach($situri as $value): ?>
			<tr <?php if($indd%2==0) echo "style='background-color: #2e2e2e;'" ?>>
				<td><a href="details.php?siruta=<?php echo $value["codul_siruta"]; ?>"><?php echo $value["numele_sitului"]; ?></a></td>
				<td><?php echo $value["categoria_sitului"]; ?></td> 
				<td><?php echo $value["tipul sitului"]; ?></td> 
				<td <?php if($searchby=="codul_siruta") echo search_col(); ?>><?php echo $value["codul_siruta"]; ?></td> 
				<td <?php if($searchby=="Judet") echo search_col(); ?>><?php echo $value["Judet"]; ?></td> 
				<td><?php echo $value["localitatea"]; ?></td> 
				<td <?php if($searchby=="Epoca sit") echo search_col(); ?>><?php echo $value["Epoca sit"]; ?></td> 
				<td><?php echo $value["datarea relativa a sitului"]; ?></td> 
			</tr>
			<?php $indd++; endforeach; ?>
		</table>

		<div id="pagination">
			<?php for($i=1; $i<=$pages; $i++): ?>
			<a href="table.php?searchby=<?php echo $searchby; ?>&<?php echo $search_val."=".$value_of_search."&rows=".$rows."&page=".$i; ?>" <?php if($page==$i) echo "style='color: gray;'"; ?>><?php echo $i; ?></a>
		<?php endfor; ?>
		</div>
		
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>