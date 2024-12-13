<?php
$connection = mysqli_connect('mysql', 'user', 'userpassword', 'phptestdb', 3306);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

echo 'Connected successfully';
?>
