<?php 

try
{
	// $bdd = new PDO('mysql:host=vincentlqkp4.mysql.db;dbname=vincentlqkp4;charset=utf8', 'vincentlqkp4', 'Tombidu59');
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}