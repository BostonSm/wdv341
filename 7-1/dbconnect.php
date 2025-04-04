<?php
$host = 'localhost'; // server address
$dbname = 'wdv341'; // name of database
$username = 'root'; // MySQL username 
$password = ''; // MySQL password 

try {
    // PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection successful!";
} catch (PDOException $e) {
   
    echo "Connection failed: " . $e->getMessage();
}
?>