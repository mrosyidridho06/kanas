<?php
	include "../config.php";
	$idh = $_GET["id"];
	// query sql
	$sql = "DELETE FROM tb_bahan WHERE id_bahan='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	if($query){
        header("Location: bahan.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	$_SESSION["delete"] = 'Data Berhasil Dihapus';
	mysqli_close($conn);
?>