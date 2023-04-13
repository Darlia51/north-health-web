<?php

$hostname = parse_url(getenv('STACKHERO_MYSQL_HOST'));
$user = parse_url(getenv('STACKHERO_MYSQL_USER'));
$password = parse_url(getenv('STACKHERO_MYSQL_PASSWORD'));
$database = parse_url(getenv('STACKHERO_MYSQL_DATABASE'));

// Configuration SSL/TLS
$sslOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => true
    )
);

// Connexion à la base de données avec SSL/TLS
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, "AES256-SHA256", $sslOptions);
mysqli_real_connect($conn, $hostname, $user, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

echo "Connexion réussie";

// Fermeture de la connexion
mysqli_close($conn);

?>
