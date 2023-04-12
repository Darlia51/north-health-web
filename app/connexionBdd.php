<?php
	$dbhost = parse_url(getenv('STACKHERO_MYSQL_HOST'))['host'];
	$dbuser = getenv('STACKHERO_MYSQL_USER');
	$dbpass = getenv('STACKHERO_MYSQL_PASSWORD');
	$dbname = getenv('STACKHERO_MYSQL_DATABASE');
	
	$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error());
?>
