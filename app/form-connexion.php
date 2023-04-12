<?php
// Démarrer la session
session_start();

// Inclure le fichier de connexion à la base de données
include ("./connexionBdd.php");

// Récupérer les valeurs des champs de formulaire
$insuranceNumber = $_POST['insuranceNumber'];
$password = $_POST['password'];

// Vérifier si l'utilisateur existe dans la base de données
$result = mysqli_query($mysqli, "SELECT * FROM patients WHERE insuranceNumber = '$insuranceNumber' AND password = '$password'");
if (mysqli_num_rows($result) === 1) {

    // L'utilisateur existe, stocker ses informations de session
    $row = mysqli_fetch_assoc($result);
    $_SESSION['insuranceNumber'] = $insuranceNumber;
    
    // Rediriger vers la page d'accueil de l'utilisateur
    header("Location: ../pages/accueil-connecte.html");
} else {
    echo "Le numéro de sécurité sociale ou le mot de passe est incorrect.";
}
?>