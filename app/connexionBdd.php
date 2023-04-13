<?php

$hostname = "dd0tzw.stackhero-network.com";
$user = "root";
$password = "QrfQHDT1KLY79ytGovmtg5SXlQ6vicuc";
$database ="north-health-bdd";

// Connexion à la base de données
$conn = mysqli_connect($hostname, $user, $password, $database);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

echo "Connexion réussie";

// Fermeture de la connexion
mysqli_close($conn);

?>