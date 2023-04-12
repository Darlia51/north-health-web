<?php
	$dbhost = parse_url(getenv('STACKHERO_MYSQL_HOST'));
	$dbuser = parse_url(getenv('STACKHERO_MYSQL_USER'));
	$dbpass = parse_url(getenv('STACKHERO_MYSQL_PASSWORD'));
	$db = parse_url(getenv('STACKHERO_MYSQL_USER'));
	$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($mysqli);
?>