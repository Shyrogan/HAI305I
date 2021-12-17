<?php

define('HOST', 'localhost');
define('DB_NAME', 'Selly_db');
define('USER', 'root');
define('PASS', '');
define('PORT', 3306);


try{
	$db = new PDO("mysql:host=". HOST . ";dbname=" . DB_NAME, USER, PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
}
?>