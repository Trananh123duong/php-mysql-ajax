<?php
$con = mysqli_connect('db', 'MYSQL_USER', 'MYSQL_PASSWORD', 'MYSQL_DATABASE', 3306);

if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

echo 'Connected successfully';
?>
