<?php
	include "config.php";
 
	$idh = $_GET["id"];
 
	// query sql
	$sql = "DELETE FROM tb_bahan WHERE id_bahan='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
 
	if($query){
        header("location:list.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
 
	mysqli_close($conn);
?>