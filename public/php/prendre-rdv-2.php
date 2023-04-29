<?php
// Inclure le fichier bdd
include("../../app/connexionBdd.php");

// Reprendre la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/barre-nav.css"/>
	<link rel="stylesheet" href="../css/prendre-rdv.css"/>
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			include_once("../html/recurrence/numerotations-2.html");
		?>
		
		<!--FORMULAIRE-->
		<h3 class="h3-prise-rdv margin-ville">Les professionnels des cliniques et laboratoires North Health proposent de vous accueillir dans diverses villes de France.</h3>
		<div class="groupe" style="margin-top:50px;">
			<form class="form-etape-2" action="../../app/form-rdv2.php" method="POST"
			style="display:flex; column-gap:100px; justify-content: center;">

				<!-- Choix de la ville -->
				<div class="form-ville">
					<label for="city">Ville :</label>
					<select class="form-control" name="city" id="city" style="width:105%;" required>
						<option value="">Sélectionnez une ville</option>
						<?php
						$query = "SELECT * FROM Cities";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<option value="'.$row['idCity'].'">'.$row['cityName'].'</option>';
							}
						}else{
							echo '<option value="">City not available</option>';
						}?>
					</select>
				</div>

				<!-- Choix de l'établissement -->
				<div class="form-etablissement">
					<label for="city">Établissement :</label>
					<select class="form-control" name="establishment" id="establishment" style="width:105%;" required>
						<option value="">Selectionnez un établissement</option>
					</select>
				</div>

				<!-- Choix du professionnel -->
				<div class="form-professionnel">
					<label for="city">Professionnel :</label>
					<select class="form-control" name="professionnal" id="professionnal" style="width:105%;" required>
						<option value="">Selectionnez un professionnel</option>
					</select>
				</div>
				
				<button class="gauche rdv" type="button" onclick="window.history.back()">Précédent</button>
				<a href="./prendre-rdv-3.php" class="droit rdv">
					<button class="droit rdv" type="submit" value="Envoyer">Suivant</button></a>
			</form>
		</div>
	</main>


	<script type="text/javascript">
  $(document).ready(function(){
    // Ville dependance ajax
    $("#city").on("change",function(){
      var cityId = $(this).val();
      $.ajax({
        url :"../../app/dependance-ajax.php",
        type:"POST",
        cache:false,
        data:{cityId:cityId},
        success:function(data){
          $("#establishment").html(data);
          $('#professionnal').html('<option value="">Selectionnez un professionnel</option>');
        }
      });
    });

    // Establissement dependance ajax
    $("#establishment").on("change", function(){
      var establishmentId = $(this).val();
      $.ajax({
        url :"../../app/dependance-ajax.php",
        type:"POST",
        cache:false,
        data:{establishmentId:establishmentId},
        success:function(data){
          $("#professionnal").html(data);
        }
      });
    });
  });
	</script>

	<!--Activation des menus désactivés suite à une sélection
	<script>
   const citySelect = document.getElementById('city_id');
   const etablissementSelect = document.getElementById('etablissement_id');
   const prosSelect = document.getElementById('professionnal_id');
   citySelect.addEventListener('change', () => {
      etablissementSelect.removeAttribute('disabled');
   });
   etablissementSelect.addEventListener('change', () => {
      prosSelect.removeAttribute('disabled');
   });
	</script>
-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
