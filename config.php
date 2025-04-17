<?php
	define('dbServername', 'localhost');
<<<<<<< HEAD
	define('dbUsername', 'yasinrabiee_shortner');
	define('dbPassword', 'Yasinrb021');
	define('dbName', 'yasinrabiee_shortner');
	// Replace url
	define('url', 'https://yasinrabiee.ir/url/?url=');
=======
	define('dbUsername', 'shortner');
	define('dbPassword', 'Yasinrb021');
	define('dbName', 'shortner');
	// Replace url
	define('url', 'localhost/url_shortner/?url=');
	
	define('adminUsername', 'admin');
	define('adminPass', 'Admin#123');

	$conn = mysqli_connect(dbServername, dbUsername, dbPassword, dbName);
	mysqli_set_charset($conn, 'utf8mb4');
>>>>>>> a4615c88a7f61f26dbb32aae42171b30aee76ad7
	
	define('adminUsername', 'admin');
	define('adminPass', 'root');
?>