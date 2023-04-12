<?php

// On vide toutes les variables de session
$_SESSION = array();

// Supprimer la session
session_destroy();

// Fermeture de la connexion à la base de données
mysqli_close($mysqli);
?>