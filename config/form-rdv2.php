<?php
// Reprendre la session
session_start();

// Récupérer les données
$city = $row['idCity'];
$city = $_POST['city'];
$establishment = $_POST['establishment'];
$professionnal = $_POST['professionnal'];

// Stocker les données dans la session
$_SESSION['city'] = $city;
$_SESSION['establishment'] = $establishment;
$_SESSION['professionnal'] = $professionnal;

// Redirection
header("Location: ../public/php/prendre-rdv-3.php");
?>
