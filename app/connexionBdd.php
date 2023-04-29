<?php

$hostname = parse_url(getenv('STACKHERO_MYSQL_HOST'));
$user = parse_url(getenv('STACKHERO_MYSQL_USER'));
$password = parse_url(getenv('STACKHERO_MYSQL_ROOT_PASSWORD'));
$database = parse_url(getenv('STACKHERO_MYSQL_DATABASE'));

$conn = mysqli_init();
$mysqliConnected = $mysqli->real_connect($hostname, $user, $password, $database, NULL, NULL, MYSQLI_CLIENT_SSL);
if (!$mysqliConnected) {
  die("Connect Error: " . $mysqli->connect_error());

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

echo "Connexion réussie" . $conn->host_info . "\n";

// Fermeture de la connexion
$conn->close();

?>
