<?php 
	define('DBNAME', 'cvpro');
	define('USERNAME', 'root');
	define('PASSWORD', 'root');

function DB(){
	try {
		
		$db = new PDO("mysql:host=localhost;dbname=".DBNAME,USERNAME,PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	} catch (Exception $e) {
		die($e->getMessage());
	}
}
	
	
 ?>