<?php
$host = 'localhost';
$dbname = 'wdv341';
$username = 'root';
$password = '';

try {
    // PDO connection using the $pdo variable
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>