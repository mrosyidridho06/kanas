<?php
date_default_timezone_set('Asia/Makassar');
include "conn.php";
if(!isset($_SESSION)){
    session_start();
}
// Establish connection to MySQL database
$conn = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
// Check if connection established successfully
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

function base_url($url = null){
    $base_url = "https://kanaskitchen.000webhostapp.com";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
?>