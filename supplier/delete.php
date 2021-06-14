<?php
	include "../config.php";
 
	$idh = $_GET["id"];
 
	// query sql
	$sql = "DELETE FROM tb_supplier WHERE id_supplier='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
 
	if($query){
        header("location:supplier.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
 
	mysqli_close($conn);
?>