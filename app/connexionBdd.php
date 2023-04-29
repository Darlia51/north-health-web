<?php

$host = getenv('STACKHERO_MYSQL_HOST');
$user = getenv('STACKHERO_MYSQL_USER');
$password = getenv('STACKHERO_MYSQL_ROOT_PASSWORD');
$database = getenv('STACKHERO_MYSQL_DATABASE');

$conn = mysqli_init();

$mysqliConnected = $conn->real_connect($host, $user, $password, $database, NULL, NULL, MYSQLI_CLIENT_SSL);
if (!$mysqliConnected) {
  die("Connect Error: " . $conn->connect_error());
}
?>
