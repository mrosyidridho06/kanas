<?php

$db_host = "localhost";
$db_user = "id17427729_kanas";
$db_pass = "dW/Ff7RS7%-@1Hfh";
$db_name = "id17427729_kanaskitchen";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}