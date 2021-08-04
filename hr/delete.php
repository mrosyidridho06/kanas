<?php
	include "../config.php";
 

	session_start();

	$idh = $_GET["id"];
 
	// query sql
	$sql = "DELETE FROM tb_gaji WHERE id_penggajian='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
 
	if($query){
        header("Location: gaji.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
 
	$_SESSION["hapus"] = 'Data Berhasil Dihapus';

	mysqli_close($conn);
?>