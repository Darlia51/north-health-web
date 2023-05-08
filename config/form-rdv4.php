<?php
include("./connexionBdd.php");

// Reprendre la session
session_start();

// Récupérer les données enregistrées dans la session
$insuranceNumber = $_SESSION['insuranceNumber'];
$consultationType = $_SESSION['consultationType'];
$city = $_SESSION['city'];
$establishment = $_SESSION['establishment'];
$professionnal = $_SESSION['professionnal'];
$appointmentDate = $_SESSION['appointmentDate'];
$appointmentsTimeSlots = $_SESSION['appointmentsTimeSlots'];

// récupération des valeurs checkbox sélectionnées
if(isset($_POST['options'])){
  $idHospitalizationOptions = array($_POST['options']);
	$idHospitalizationOptions = implode(',', $idHospitalizationOptions);
}

// Préparer la requête d'insertion
$stmt = $conn->prepare("INSERT INTO Appointments (idConsultationType, idCity, idEstablishment, idProfessionnal, appointmentDate, idAppointmentsTimeSlots, idHospitalizationOptions, insuranceNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Liage des paramètres
$stmt->bind_param("iiiisisi", $consultationType, $city, $establishment, $professionnal, $appointmentDate, $appointmentsTimeSlots, $idHospitalizationOptions, $insuranceNumber);


// Exécution de la requête
	if ($stmt->execute()) {
		header("Location: ../public/html/rendez-vous-confirm.html");
	} else {
		echo "Une erreur est survenue lors de l'ajout du rendez-vous.";
	}

// Fermer la connexion
$conn->close();
?>