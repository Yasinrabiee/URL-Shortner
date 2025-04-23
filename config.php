<?php
	define('dbServername', 'localhost');
	define('dbUsername', 'yasinrabiee_shortner');
	define('dbPassword', 'Yasinrb021');
	define('dbName', 'yasinrabiee_shortner');
	// Replace url
	define('url', 'https://yasinrabiee.ir/url/?url=');
	define('dbUsername', 'shortner');
	define('dbPassword', 'Yasinrb021');
	define('dbName', 'shortner');
	// Replace url
	define('url', 'localhost/url_shortner/?url=');
	
	define('adminUsername', 'admin');
	define('adminPass', 'Admin#123');

	$conn = mysqli_connect(dbServername, dbUsername, dbPassword, dbName);
	mysqli_set_charset($conn, 'utf8mb4');
	
	define('adminUsername', 'admin');
	define('adminPass', 'root');
?>
