<?php

define('HOST', 'localhost');
define('DB_NAME', 'db_selly');
define('USER', 'root');
define('PASS', 'root');
define('PORT', 3306);


try{
	$db = new PDO("mysql:host=". HOST . ";dbname=" . DB_NAME, USER, PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
}
?>