<?php
	$server = "localhost";
	$login = "root";
	$pass = "140603";
	try {
		$connexion = new PDO("mysql:host=$server;dbname=vims", $login, $pass);
		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e) 
	{
		echo 'Echec : '.$e->getMessage();
	}
?>