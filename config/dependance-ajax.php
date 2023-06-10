<?php
// Include the database connection file
include("./connexionBdd.php");

if (isset($_POST['city']) && !empty($_POST['city'])) {

	// Fetch establishment name base on city id -----------------------------
	$query = "SELECT * FROM establishments WHERE idCity = ".$_POST['city'];
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		echo '<option value="">Selectionnez un établissement</option>';
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['idEstablishment'].'">'.$row['establishmentName'].'</option>';
		}
	} else {
		echo '<option value="">Establishment non disponible</option>';
	}
} elseif(isset($_POST['establishment']) && !empty($_POST['establishment'])) {

	// Fetch professionnal name base on establishment id ---------------------
	$query = "SELECT * FROM professionnals WHERE idEstablishment = ".$_POST['establishment'];
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		echo '<option value="">Selectionnez un professionnel</option>';
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['idProfessionnal'].'">'."Dr ".$row['lastName']." ".$row['firstName'].'</option>';
		}
	} else {
		echo '<option value="">Professionnal non disponible</option>';
	}
}
?>
