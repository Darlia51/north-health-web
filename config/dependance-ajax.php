<?php
// Include the database connection file
include("./connexionBdd.php");

if (isset($_POST['cityId']) && !empty($_POST['cityId'])) {

	// Fetch establishment name base on city id -----------------------------
	$query = "SELECT * FROM establishments WHERE idCity = ".$_POST['cityId'];
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		echo '<option value="">Selectionnez un établissement</option>';
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['idEstablishment'].'">'.$row['establishmentName'].'</option>';
		}
	} else {
		echo '<option value="">Establishment non disponible</option>';
	}
} elseif(isset($_POST['establishmentId']) && !empty($_POST['establishmentId'])) {

	// Fetch professionnal name base on establishment id ---------------------
	$query = "SELECT * FROM professionnals WHERE idEstablishment = ".$_POST['establishmentId'];
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
