<?php
$host = '192.168.52.2';
$db   = 'ktl';
$user = 'kriangsak_admin';
$pass = 'qazwsxedc123';

$_SESSION['@_hostname']="???????????????????";
$dsn = "mysql:host=$host;dbname=$db;";

try {
	 
     $pdo = new PDO($dsn, $user, $pass);
	 $pdo->exec("set names utf8");
	
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}

?>