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
		{
			$situri[] = $table;
		}
	}
}
fclose($file);

$results = count($situri);

$situri = array_slice($situri, $index, $page*$rows);

$pages = ceil($results/$rows);

function search_col(){
	return "style='background-color: #f9febc; color: black;'";
}
function search_val($value_of_search){
	return $value_of_search;
}

if($results==0) header('Location:index.php?error=404');
if($value_of_search=="NONE") header('Location:index.php?error=date');
?>