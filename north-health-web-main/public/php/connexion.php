<?php
	// Créer la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/connexion.css"/>
	<link rel="stylesheet" href="../css/barre-nav.css"/>
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title>Connexion - North Health</title>
</head>

<body>

	<header>
		<nav>
			<a href="../../index.php">
				<img class="logo" src="../../fichiers/images/logo-northhealth.png">
			</a>
		</nav>
	</header>


	<h1>Connexion</h1>
	<form action="../../config/form-connexion.php" method="POST">
		<div>
			<label for="insuranceNumber">Numéro de sécurité sociale :</label><br>
			<input type="text" id="insuranceNumber" name="insuranceNumber" required pattern="[0-9]{15}"><br>
		</div>
		
		<div>
			<label for="password">Mot de passe :</label><br>
			<input type="password" id="password" name="password" required><br><br>
		</div>
		
		<button type="submit">Se connecter</button>
	</form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>