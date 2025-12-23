<?php

$host = "localhost";
$username = "root";
$password = "";
$database =  "myproject";

$db_connect = mysqli_connect($host, $username, $password, $database);

if (!$db_connect) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($db_connect, "utf8mb4");
 
//echo "Database connected successfully.";

?> 