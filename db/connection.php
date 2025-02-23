<?php
$host = "localhost";
$user = "root";
$password = "root";      
$dbname = "db";
    //datbase connection
   $conn = new mysqli(hostname: $host, username: $user, password: $password, database: $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


?>
