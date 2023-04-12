<?php
	// Reprendre la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/barre-nav.css"/>
	<link rel="stylesheet" href="../css/prendre-rdv.css"/>
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!--full calendar-->
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
	<title>Prendre un rendez-vous - North Health</title>
</head>


<body>
	
	<!--MENU DE NAVIGATION-->
	<header>
		<nav class="navbar navbar-expand-lg">
				<img class="logo" src="../../assets/images/logo-northhealth.png">

			<div class="container-fluid" style="justify-content:end;">
				<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="../html/accueil-connecte.html">Accueil</a></li>
						<li class="nav-item"><a class="nav-link disabled" href="./prendre-rdv-1.php" style="color:#4f6b6b;">Prendre RDV</a></li>
						<li class="nav-item"><a class="nav-link" href="./dossier-patient.php">Dossier patient</a></li>
						<li class="nav-item"><a class="nav-link" href="../html/prescriptions-ordonnances.html">Prescriptions et ordonnances</a></li>
						<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modaleDeconnexion">Déconnexion
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
												<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
										</svg>
							</a>
						</li>
				</ul>
			</div>
		</nav>


		<!--MODALE DECONNEXION-->
		<div class="modal fade" id="modaleDeconnexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Êtes-vous sûr(e) de vouloir vous déconnecter ?
					</div>
					<div class="modal-footer">
						<a href="../../index.php" class="btn btn-success">Oui</a>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
					</div>
				</div>
			</div>
		</div>
	</header>


	<main>
		<h1>Prendre rendez-vous</h1>

		<!--NUMEROTATION -->
		<?php
			include_once("../html/recurrence/numerotations-4.html");
		?>

		<!--FORMULAIRE-->
		<div class="groupe-infosComp4bis">
			<h3 class="h3-prise-rdv">Dans le cas d'une hospitalisation, sélectionnez les éventuelles options souhaitées</h3>
			
			<form class="form-rdv-checkbox" action="../../app/form-rdv4.php" method="POST">
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="1">
				<label for="HospitalizationOptions">Chambre privative calme</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="2">
				<label for="HospitalizationOptions">Petit-déjeuner gourmand</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="3">
				<label for="HospitalizationOptions">Collation d'après-midi</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="4">
				<label for="HospitalizationOptions">Boisson non alcoolisée au choix 1/j</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="5">
				<label for="HospitalizationOptions">Machine à boissons chaudes et dosettes</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="6">
				<label for="HospitalizationOptions">Trousse de bienvenue</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="7">
				<label for="HospitalizationOptions">Chaussons</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="8">
				<label for="HospitalizationOptions">Télévision</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="9">
				<label for="HospitalizationOptions">WIFI</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="10">
				<label for="HospitalizationOptions">Coffre-fort</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="11">
				<label for="HospitalizationOptions">Réfrigérateur</label>
			</div>
			<div class="checkbox-etape4">
				<input type="checkbox" name="options" value="12">
				<label for="HospitalizationOptions">Téléphone</label>
			</div>
			
				<button class="gauche rdv" type="button" onclick="window.history.back()">Précédent</button>
				<a href="../html/rendez-vous-confirm.html" class="droit rdv">
					<button class="droit" type="submit">Terminer</button></a>
			</form>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
