<?php
	$dbhost = parse_url(getenv('STACKHERO_MYSQL_HOST'));
	$dbuser = parse_url(getenv('STACKHERO_MYSQL_USER'));
	$dbpass = parse_url(getenv('STACKHERO_MYSQL_PASSWORD'));
	$dbname = substr(parse_url(getenv('STACKHERO_MYSQL_DATABASE')), 1);

	$mysqli = mysqli_connect($dbhost['host'], $dbuser['user'], $dbpass['pass'], $dbname) or die($mysqli);
?>
