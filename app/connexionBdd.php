<?php

$host = getenv('STACKHERO_MYSQL_HOST');
$user = getenv('STACKHERO_MYSQL_USER');
$password = getenv('STACKHERO_MYSQL_ROOT_PASSWORD');
$database = getenv('STACKHERO_MYSQL_DATABASE');

$conn = new mysqli($host, $user, $password, $database, MYSQLI_CLIENT_SSL);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

echo "Connexion réussie" . $conn->host_info . "\n";

// Fermeture de la connexion


?>
