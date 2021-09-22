<?php
include "../config.php";
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['save'])){
    // ambil data dari formulir
    $id = $_POST['id_supplier'];
    $nama = $_POST['nama_supplier'];
    $alamat = $_POST['alamat_supplier'];
    $hp = $_POST['hp_supplier'];
    // buat query update
    $sql = "UPDATE tb_supplier SET nama_supplier = '$nama', alamat_supplier='$alamat', hp_supplier='$hp' WHERE id_supplier='$id'";
    $query = mysqli_query($conn, $sql);
    // apakah query update berhasil?
    if( $query ){
        $_SESSION["update"] = 'Data Berhasil Diupdate';
        header('location:supplier.php');
    }else{
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
?>