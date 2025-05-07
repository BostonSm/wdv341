<?php
$host = '';// change if needed
$dbname = ''; // change if needed
$username = ''; // change if needed
$password = '';     // change if needed

try {
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}
?>