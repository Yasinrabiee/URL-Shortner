<?php
	define('servername', 'localhost');
	define('username', 'shortner');
	define('password', 'Yasinrb021');
	define('dbname', 'shortner');

	$conn = mysqli_connect(servername, username, password, dbname);
	mysqli_set_charset($conn, 'utf8mb4');
	
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
?>