<?php
	// Reprendre la session
	session_start();
	
	// Récupérer $insuranceNumber depuis la session
	$insuranceNumber = $_SESSION['insuranceNumber'];

	// Inclure le fichier de connexion à la base de données
	include ("../../app/connexionBdd.php");?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/barre-nav.css"/>
	<link rel="stylesheet" href="../css/dossier-patient.css"/>
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!--full calendar-->
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../javascript/script-dossier-patient.js"></script>

	<title>Dossier patient - North Health</title>
</head>


<body>
	
	<!--MENU DE NAVIGATION-->
	<header>
		<nav class="navbar navbar-expand-lg">
				<img class="logo" src="../../assets/images/logo-northhealth.png">
				
			<div class="container-fluid" style="justify-content:end;">
				<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="../html/accueil-connecte.html">Accueil</a></li>
						<li class="nav-item"><a class="nav-link" href="./prendre-rdv-1.php">Prendre RDV</a></li>
						<li class="nav-item"><a class="nav-link disabled" href="./dossier-patient.php" >Dossier patient</a></li>
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
		<h1>Dossier patient</h1>
		<!--TAB BAR-->
		<div class="tab-bar-et-contenus">
			<!-- Encadré avec les onglets -->
			<div class="tab">
				<button class="tablinks active" onclick="openTab(event, 'fenetre-perso')">Informations personnelles</button>
				<button class="tablinks" onclick="openTab(event, 'fenetre-med')">Informations médicales</button>
				<button class="tablinks" onclick="openTab(event, 'exam-consult')">Examens et consultations</button>
			</div>

			<?php

			// Requête pour récupérer les informations de l'utilisateur
			$sql = "SELECT * FROM Patients WHERE insuranceNumber=$insuranceNumber";
			$result = mysqli_query($conn, $sql);

			// Récupération des données de l'utilisateur
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$lastName = $row['lastName'];
					$firstName = $row['firstName'];
					$birthDate = $row['birthDate'];
					$adress = $row['adress'];
					$city = $row['city'];
					$phoneNumber = $row['phoneNumber'];
					$email = $row['email'];
					$insurancePlan = $row['insurancePlan'];
					$healthInsurance = $row['healthInsurance'];
					$regularDoctor = $row['regularDoctor'];
				}
			} else {
				exit();
			}
			?>

			<!-- Onglet informations personnelles -->
			<div id="fenetre-perso" class="tabcontent">
				<form class="form-infos-persos">
					<div class="info colonne-infos-persos">
						<label for="lastName">Nom :</label>
						<input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" disabled>

						<label for="firstName ">Prénom :</label>
						<input type="text" id="firstName " name="firstName " value="<?php echo $firstName; ?>" disabled>

						<label for="birthDate">Date de naissance :</label>
						<input type="text" id="birthDate" name="birthDate" value="<?php echo $birthDate; ?>" disabled>
					</div>

					<div class="info colonne-infos-persos">
						<label for="adress">Adresse :</label>
						<input type="text" id="adress" name="adress" value="<?php echo $adress; ?>" disabled>

						<label for="city">Ville :</label>
						<input type="text" id="city" name="city" value="<?php echo $city; ?>" disabled>

						<label for="phoneNumber">Numéro de téléphone :</label>
						<input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>" disabled>

					</div>
			
					<div class="info colonne-infos-persos">

						<label for="email">Adresse e-mail :</label>
						<input type="text" id="email" name="email" value="<?php echo $email; ?>" disabled>

						<label for="password">Mot de passe :</label>
						<input type="password" id="password" name="password" value="<?php echo $password; ?>" disabled>
					</div>

					<div class="boutons-infos-perso">
						<input type="submit" value="Enregistrer" disabled>
						<input type="submit" value="Modifier" onclick="toggleDisabled('fenetre-perso')">
					</div>
				</form>
				<br>
				
			</div>
			
			<!-- Onglet informations médicales -->
			<div id="fenetre-med" class="tabcontent";>
				<form class="form-infos-medic">

					<div class="info infos-medic">
						<label for="insuranceNumber">Numéro de sécurité sociale :</label>
						<input type="text" id="insuranceNumber" name="insuranceNumber" value="<?php echo $insuranceNumber; ?>" disabled>
			
						<label for="regularDoctor">Médecin traitant :</label>
						<input type="text" id="regularDoctor" name="regularDoctor" value="<?php echo $regularDoctor; ?>" disabled>
					</div>
			
					<div class="info infos-medic">
						<label for="insurancePlan">Régime d'assurance maladie :</label>
						<input type="text" id="insurancePlan" name="insurancePlan" value="<?php echo $insurancePlan; ?>" disabled>
						
						<label for="healthInsurance">Mutuelle :</label>
						<input type="text" id="healthInsurance" name="healthInsurance" value="<?php echo $healthInsurance; ?>" disabled>
					</div>

					<div class="boutons-infos-med">
						<input type="submit" value="Enregistrer" disabled>
						<input type="submit" value="Modifier" onclick="toggleDisabled('fenetre-med')">
					</div>
				</form>
			</div>
			
			<!-- Onglet examens et consultations -->
			<div id="exam-consult" class="tabcontent">
			<?php 
				// Requête SQL pour récupérer les données des rendez-vous de l'utilisateur
				$sql="SELECT * FROM appointment_view WHERE insuranceNumber = '$insuranceNumber'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
						// Affiche le tableau
						echo '<table class="table">';
						echo '<thead>';
						echo '<tr>';
						echo '<th>Date</th>';
						echo '<th>Heure</th>';
						echo '<th>Type de consultation</th>';
						echo '<th>Professionnel</th>';
						echo '<th>Établissement</th>';
						echo '<th>Ville</th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';

						// Parcourt les résultats de la requête et affiche chaque rendez-vous sous forme de ligne dans le tableau
						while($row = $result->fetch_assoc()) {
								echo '<tr>';
								echo '<td>' . $row['appointmentDate'] .'</td>';
								echo '<td>' . $row['timeSlot'] .'</td>';
								echo '<td>' . $row['consultationType'] . '</td>';
								echo '<td>' . $row['fullName'] . '</td>';
								echo '<td>' . $row['establishmentName'] . '</td>';
								echo '<td>' . $row['cityName'] . '</td>';
								echo '</tr>';
						}
						// Lignes vides pour combler l'espace vide
						for($i = 0; $i < 3; $i++) {
							echo 
								'<tr style="height:41px;">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								</tr>
								';
						}
				} else {
						echo "Aucun rendez-vous n'a été trouvé pour cet utilisateur.";
				}
			?>
					<tr style="height:41px; border-bottom:1px solid black;">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
			</div>
		</div>
	</main>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>