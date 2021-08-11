<?php
	include "../config.php";
 

	session_start();

	$idh = $_GET["id"];
	$qu = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE id_pegawai='$idh'");
    $data_gambar = mysqli_fetch_array($qu);
	$foto = $data_gambar['foto'];
	unlink("img/".$foto);
	
	// query sql
	$sql = "DELETE FROM tb_pegawai WHERE id_pegawai='$idh'";
	$query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	
 
	if($query){
        header("Location: pegawai.php");
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
 
	$_SESSION["hapus"] = 'Data Berhasil Dihapus';

	mysqli_close($conn);
?>