<?php
include "../config.php";
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['save'])){
    // ambil data dari formulir
    $id = $_POST['id_bahan'];
    $nama = $_POST['nama_barang'];
    $supp = $_POST['nama_supplier'];
    $jb = $_POST['jumlah_barang'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga_barang'];
    // buat query update
    $sql = "UPDATE tb_bahan a, tb_supplier b SET a.nama_barang='$nama', a.jumlah_barang='$jb', a.satuan='$satuan', a.harga_barang='$harga', a.id_supplier='$supp' WHERE id_bahan='$id' AND a.id_supplier=b.id_supplier";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    // apakah query update berhasil?
    if( $query ){
        $_SESSION["update"] = 'Data Berhasil Diupdate';
        header('location:bahan.php');
    }else{
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
?>