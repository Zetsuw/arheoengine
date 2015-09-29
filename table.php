<?php
include 'engine.php';
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
			<a href="table.php?searchby=<?php echo $searchby; ?>" <?php if($page==$i) echo "style='color: gray;'"; ?>><?php echo $i; ?></a>
		<?php endfor; ?>
		</div>
		
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>