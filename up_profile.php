<?php
include "config.php";
if(isset($_POST['update'])){
    // ambil data dari formulir
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    
    // buat query update
    $sql = "UPDATE tb_user SET nama = '$nama', username='$uname', email='$email' WHERE id='$id'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    // apakah query update berhasil?
    if( $query ){
        $_SESSION["update"] = 'Data Berhasil Diupdate';
        header('location:profile.php');
    }else{
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
}
?>