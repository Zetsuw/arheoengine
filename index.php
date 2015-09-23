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
	
</head>
<body>

	<div class="box-full">
		<a href="index.php"><div id="logo" class="wow bounceIn"></div></a>
	
		<form action="table.php" id="cautare">
			<div id="casetaInput" class="wow fadeInLeft">
				<select name="criteriu" class="input_criteriu" form="cautare">
					<option value="Categorie sit">Categorie sit</option>
					<option value="Tip sit">Tip sit</option>
					<option value="Cod SIRUTA">Cod SIRUTA</option>
					<option value="Judet">Judet</option>
					<option value="Comuna">Comuna</option>
					<option value="Localitate">Localitate</option>
					<option value="Epoca">Epoca</option>
					<option value="Datare">Datare</option>
					<option value="Stare inregistrare">Stare inregistrare</option>
					<option value="Numai situri ilustrate">Numai situri ilustrate</option>
				</select>
			</div>
			
			<div id="casetaInput" class="wow fadeInRight">
				<input type="text" class="inputtext" name="valCriteriu" placeholder="Valuare criteriu...">
			</div>
			
			<input type="hidden" name="pagina" value="1">
			
			<input type="submit" class="button wow fadeInUp" value="Cauta">
			
		</form>
		
		<center>Numar total de situri: <span class="total_results">1500</span><br>
		<a href="">Vezi mai mult</a>
		</center>
	</div>
	
	<!-- JavaScript -->
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/smoothscroll.js"></script>
	
</body>
</html>