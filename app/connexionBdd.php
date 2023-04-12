<?php
	$dbhost = $_ENV['CLEARDB_DATABASE_HOST'];
	$dbuser = $_ENV['CLEARDB_DATABASE_USER'];
	$dbpass = $_ENV['CLEARDB_DATABASE_PASSWORD'];
	$dbname = $_ENV['DATABASE_NAME'];

	
	$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error());
?>
