<?php
$servername='localhost';
$username= 'madhu';
$password='w1llres0lve';
$dbname='trail';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
