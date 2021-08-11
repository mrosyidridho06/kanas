<?php
	include "../config.php";
 

	session_start();

	$idh = $_GET["id"];
 
	// query sql
	$sql = "DELETE tb_resep, tb_resepdetails FROM tb_resep JOIN tb_resepdetails ON tb_resep.id_resep=tb_resepdetails.id_resep AND tb_resep.id_resep='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
 
	if($query){
        header("Location: resep_details.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
 
	$_SESSION["hapus"] = 'Data Berhasil Dihapus';

	mysqli_close($conn);
?>