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
	$sql = "DELETE FROM tb_supplier WHERE id_supplier='$idh'";
	$query = mysqli_query($conn, $sql) or die ('Gagal menghapus karena supplier digunakan pada bahan:'(mysqli_error($conn)));
	if($query){
	    $_SESSION["delete"] = 'Data Telah Dihapus';
        header("location:supplier.php");
	} else {
		echo "<script>alert('Data tidak dapat dihapus karena digunakan pada bahan!');history.go(-1);</script>";
	}
	mysqli_close($conn);
?>
<?php }else { ?>
    <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>