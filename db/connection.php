<?php
$host = "localhost";
$user = "root";
$password = "root";      
$dbname = "db";

   $conn = new mysqli(hostname: $host, username: $user, password: $password, database: $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


?>
