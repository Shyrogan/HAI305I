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
<<<<<<< HEAD
=======
    //var_dump($e);
    echo $e->getMessage(); 
    echo $e->getCODE();
    echo "1";
>>>>>>> 1e05b39faffab6ccc9ae7e2c7bad363cf0776f28
}
?>