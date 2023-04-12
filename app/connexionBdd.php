<?php
	$dbhost = getenv('STACKHERO_MYSQL_HOST');
	$dbuser = getenv('STACKHERO_MYSQL_USER');
	$dbpass = getenv('STACKHERO_MYSQL_PASSWORD');
	$db = getenv('STACKHERO_MYSQL_USER');

	$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($mysqli);
?>
