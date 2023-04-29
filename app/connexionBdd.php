<?php

$hostname = parse_url(getenv('STACKHERO_MYSQL_HOST'));
$user = parse_url(getenv('STACKHERO_MYSQL_USER'));
$password = parse_url(getenv('STACKHERO_MYSQL_ROOT_PASSWORD'));
$database = parse_url(getenv('STACKHERO_MYSQL_DATABASE'));

$conn = new mysqli($host, $user, $password, $database);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

echo "Connexion réussie" . $conn->host_info . "\n";

// Fermeture de la connexion


?>
