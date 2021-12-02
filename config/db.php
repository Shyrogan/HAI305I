<?php

define('HOST', 'localhost');
define('DB_NAME', 'techsalesdb');
define('USER', 'root');
define('PASS', '');
define('PORT', 3306);

try{
	$db = new PDO("mysql:host=". HOST . ";dbname=" . DB_NAME, USER, PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connect > OK !";
} catch(PDOException $e) {
    var_dump($e);
    echo $e->getMessage(); 
    echo $e->getCODE();
    echo "45";
}
?>