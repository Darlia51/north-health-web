<?php
// Reprendre la session
session_start();

// Récupérer les données
$appointmentsTimeSlots = $_POST['appointmentsTimeSlots'];
$appointmentDate = $_POST['appointmentDate'];

// Stocker les données dans la session
$_SESSION['appointmentDate'] = $appointmentDate;
$_SESSION['appointmentsTimeSlots'] = $appointmentsTimeSlots;

// Redirection
header("Location: ../public/php/prendre-rdv-4.php");
?>
