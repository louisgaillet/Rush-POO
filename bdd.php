<?php 
	try{
	$bdd = new PDO("mysql:host=****;port=****;dbname=pool_php_rush", '*****', '*****');
	}

	catch (PDOException $e){
		error_log($e->getMessage(), 3, ERROR_LOG_FILE);
		echo "PDO ERROR: ".$e->getMessage()."storage in ".ERROR_LOG_FILE."\n";
		echo "Error connection to DB\n";
		//die();
	}


 ?>
