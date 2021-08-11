<?php
	include "../config.php";
 

	session_start();

	$idh = $_GET["id"];
    $cart =$_SESSION['cart'];

    $k = array_filter($cart, function($var) use ($idh){
        return ($var['id']==$idh);
    });
 
    foreach ($k as $key => $value){
        unset($_SESSION['cart'][$key]);
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    
    header('location: resep.php');
?>