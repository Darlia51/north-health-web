<?php

$hostname = "dd0tzw.stackhero-network.com";
$user = "root";
$password = "QrfQHDT1KLY79ytGovmtg5SXlQ6vicuc";
$database ="north-health-bdd";

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
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL, $sslOptions);
mysqli_real_connect($conn, $hostname, $user, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

echo "Connexion réussie";

// Fermeture de la connexion
mysqli_close($conn);

?>