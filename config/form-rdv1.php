<?php
// Reprendre la session
session_start();

// Récupérer les données
$consultationType = $_POST['consultationType'];

// Stocker les données dans la session
$_SESSION['consultationType'] = $consultationType;

// Redirection
header("Location: ../public/php/prendre-rdv-2.php");
?>
