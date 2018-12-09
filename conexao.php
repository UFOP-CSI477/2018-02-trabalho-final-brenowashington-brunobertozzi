<?php
	$database = "spotted";
	$dbusername = "spotted";
	$dbpassword = "123456";
	$dbhost = "127.0.0.1";
	$mysql = "mysql:host=$dbhost;dbname=$database";

	$connection = new PDO($mysql, $dbusername, $dbpassword)or die ("Não foi possível conectar com o banco de dados");
?>