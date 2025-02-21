<?php
// Database connection parameters
$host = 'localhost'; // or your server address
$dbname = 'wdv341'; // name of your database
$username = 'roots'; // your MySQL username (default: 'root' for XAMPP)
$password = ''; // your MySQL password (default: '' for XAMPP)

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Output success message
    echo "Connection successful!";
} catch (PDOException $e) {
    // Output error message
    echo "Connection failed: " . $e->getMessage();
}
?>