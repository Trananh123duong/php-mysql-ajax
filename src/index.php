<?php
$host = 'mysql';
$dbname = 'phptestdb';
$username = 'user';
$password = 'userpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
