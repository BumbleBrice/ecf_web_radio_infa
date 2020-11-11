<?php
$sqlHost     = '127.0.0.1'; 		
$sqlUser     = 'root';			
$sqlPassword = '';				
$dbName      = 'web_radio';  	

	


	try
	{
		$bdd = new PDO('mysql:host='.$sqlHost.';dbname='.$dbName.';charset=utf8',$sqlUser,$sqlPassword) or die($pdo->errorInfo());
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
?>