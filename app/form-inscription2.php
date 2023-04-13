<?php
include("./connexionBdd.php");

// Reprendre la session
session_start();

// Récupérer les données
$insuranceNumber = $_POST['insuranceNumber'];
$insurancePlan = $_POST['insurancePlan'];
$healthInsurance = $_POST['healthInsurance'];
$regularDoctor = $_POST['regularDoctor'];

// Récupère les données enregistrées dans la session
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$lastName = $_SESSION['lastName'];
$firstName = $_SESSION['firstName'];
$adress = $_SESSION['adress'];
$city = $_SESSION['city'];
$birthDate = $_SESSION['birthDate'];
$phoneNumber = $_SESSION['phoneNumber'];

// Vérifier si les données obligatoires sont remplies avant l'insertion
if ($insuranceNumber && $insurancePlan && $lastName && $firstName && $adress && $city && $birthDate) {

	// Vérifier si les données optionnelles sont remplies
	if (!$phoneNumber) {
	$phoneNumber = NULL;
	}
	if (!$regularDoctor) {
	$regularDoctor = NULL;
	}
	if (!$healthInsurance) {
	$healthInsurance = NULL;
	}
}

	// Préparer la requête d'insertion
	$stmt = $conn->prepare("INSERT INTO Patients (email, password, lastName, firstName, adress, city, birthDate, phoneNumber, insuranceNumber, insurancePlan, healthInsurance, 	regularDoctor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	// Liage des paramètres
	$stmt->bind_param('ssssssssssss', $email, $password, $lastName, $firstName, $adress, 	$city, $birthDate, $phoneNumber, $insuranceNumber, $insurancePlan, $healthInsurance, 	$regularDoctor);

	// Exécution de la requête
	if ($stmt->execute()) {
		header("Location: ../public/html/inscription-reussie.html");
	} else {
		echo "Une erreur est survenue lors de l'ajout du patient.";
	}

	// Supprimer la session
	session_destroy();

	$stmt->close();

	// Fermeture de la connexion à la base de données
	mysqli_close($conn);

?>