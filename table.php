<?php

$criteriu = $_GET["criteriu"];
$valCriteriu = $_GET["valCriteriu"];
$pagina = $_GET["valCriteriu"];

$file = fopen("data1.csv","r");

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
	
</head>
<body>
	
	<a href="index.php"><div id="logo" class="wow bounceIn"></div></a>
	
	<div class="box-90" style="overflow-x:scroll">
		<div class="grid-container outline">
			<div class="row">
				<div class="col-1"><p>Denumire</p></div> 
				<div class="col-1"><p>Categorie</p></div> 
				<div class="col-1"><p>Tip</p></div> 
				<div class="col-1"><p>Judet</p></div> 
				<div class="col-1"><p>Localitate</p></div> 
				<div class="col-1"><p>Cronologie</p></div> 
				<div class="col-1"><p>Detalii</p></div> 
			</div> 
			<div class="row">
				<div class="col-1"><p>col-2</p></div> 
				<div class="col-1"><p>col-2</p></div> 
				<div class="col-1"><p>col-2</p></div> 
				<div class="col-1"><p><?php echo $valCriteriu; ?></p></div> 
				<div class="col-1"><p>col-2</p></div> 
				<div class="col-1"><p>col-2</p></div> 
				<div class="col-1"><p>col-2</p></div> 
			</div> 
		</div>
		<br>
		<br>
		<br>
		<br>
		
		<?php 
while(! feof($file))
  {
  echo "<pre>";
  print_r(fgetcsv($file, 0, ";"));
  print_r(fgetcsv($file, 0, ";"));
  echo "</pre>";
  }
fclose($file);
?>
		
		
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>