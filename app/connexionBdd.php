<?php
	$dbhost = $_ENV['STACKHERO_MYSQL_HOST'];
	$dbuser = $_ENV['STACKHERO_MYSQL_USER'];
	$dbpass = $_ENV['STACKHERO_MYSQL_PASSWORD'];
	$dbname = $_ENV['STACKHERO_MYSQL_DATABASE'];

	
	$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error());
?>
