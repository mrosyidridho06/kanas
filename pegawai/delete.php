<?php
	include "../config.php";
 

	session_start();

	$idh = $_GET["id"];
 
	// query sql
	$sql = "DELETE FROM tb_pegawai WHERE id_pegawai='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
 
	if($query){
        header("Location: pegawai.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
 
	$_SESSION["hapus"] = 'Data Berhasil Dihapus';

	mysqli_close($conn);
?>