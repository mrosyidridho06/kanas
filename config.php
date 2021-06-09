<?php

date_default_timezone_set('Asia/Makassar');
session_start();

include_once "conn.php";

// $host = "localhost";		         // host = localhost because database hosted on the same server where PHP files are hosted
// $dbname = "kanas";              // Database name
// $username = "root";		// Database username
// $password = "";	        // Database password


// Establish connection to MySQL database
$conn = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);


// Check if connection established successfully
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

function base_url($url = null){
    $base_url = "http://localhost/kanas";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
?>