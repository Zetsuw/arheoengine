<?php
	if(isset($_GET["error"])){
		if($_GET["error"]!="")
			$error = $_GET["error"];
		else $error = "NONE";
	} else {
		$error = "NONE";
	}
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

	<div class="box-full">
		<div id="logo" class="wow bounceIn"></div>
	
		<form action="table.php" id="cautare">

			<?php if($error!="NONE"): ?>
				<div id="error"><i class="fa fa-exclamation-triangle"></i> <?php if($error=="404"): ?>
						Nu se pot gasi rezultate.
					<?php elseif ($error=="date"): ?>
						Datele nu au fost introduse corect.
					<?php endif; ?>
					<i class="fa fa-times rightClose"></i>
				</div>
			<?php endif; ?>

			<div id="search_categs" class="casetaInput wow fadeInLeft">
				<span class="casetaText">Selectati criteriu:</span>

				<select name="searchby" class="input_criteriu" form="cautare" id="search_categories">
					<option value="tipul sitului">Tip sit</option>
					<option value="codul_siruta">Cod SIRUTA</option>
					<option value="Judet">Judet</option>
					<option value="Comuna">Comuna</option>
					<option value="Localitate">Localitate</option>
					<option value="Epoca sit">Epoca</option>
					<option value="Datare">Datare</option>
				</select>
			</div>
			
			<div id="search_value" class="casetaInput wow fadeIn">
				<span class="casetaText">Introduceti o valoare:</span>

				<input type="text" id="value" class="inputtext" name="value" placeholder="Valuare criteriu...">
			</div>

			<div id="age_options" class="casetaInput wow fadeIn">
				<span class="casetaText">Selectati epoca:</span>

				<select name="ages" class="input_criteriu" form="cautare" id="ages">
					<option value="Antichitate">Antichitate</option>
					<option value="Antichitate Târzie">Antichitate Târzie</option>
					<option value="Eneolitic">Eneolitic</option>
					<option value="Epoca bizantina">Epoca bizantină</option>
					<option value="Epoca bronzului">Epoca bronzului</option>
					<option value="Epoca elenistica">Epoca elenistică</option>
					<option value="Epoca fierului">Epoca fierului</option>
					<option value="Epoca geto-dacica">Epoca geto-dacică</option>
					<option value="Epoca geto-dacica">Epoca greacă</option>
					<option value="Epoca greco-romana">Epoca greco-romana</option>
					<option value="Epoca medievala">Epoca medievală</option>
					<option value="Epoca migratiilor">Epoca migratiilor</option>
					<option value="Epoca moderna">Epoca modernă</option>
					<option value="Epoca post-romana">Epoca post-romană</option>
					<option value="Epoca romana">Epoca romană</option>
					<option value="Epoca romano-bizantina">Epoca romano-bizantină</option>
					<option value="Hallstatt">Hallstatt</option>
					<option value="Latene">La Tene</option>
					<option value="Mezolitic">Mezolitic</option>
					<option value="Necunoscuta">Necunoscuta</option>
					<option value="Neolitic">Neolitic</option>
					<option value="Neprecizata">Neprecizata</option>
					<option value="Paleolitic">Paleolitic</option>
					<option value="Preistorie">Preistorie</option>
				</select>
			</div>

			<div class="casetaInput wow fadeInRight">
				<span class="casetaText"><i class="fa fa-question-circle" title="Randuri afisate pe pagina de rezultate"></i> Randuri:</span>

				<input type="text" class="inputtext" style="width: 100px; display: block; clear: both;" name="rows" value="15">
			</div>
			
			<input type="hidden" name="page" value="1">
			
			<input type="submit" class="button wow fadeInUp" value="Cauta">
			
		</form>
		
		<center>Numar total de situri: <span class="total_results">25.965</span><br>
		<a href="">Afisati-le pe toate</a>
		</center>
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>