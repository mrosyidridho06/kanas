<?php
include "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<?php
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
<?php }else { ?>
    <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>