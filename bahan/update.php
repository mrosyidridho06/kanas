<?php

include("../config.php");

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
    $sql = "UPDATE tb_bahan, tb_supplier SET nama_barang='$nama', tb_supplier.id_supplier = tb_bahan.id_supplier, jumlah_barang='$jb', satuan='$satuan', harga_barang='$harga' WHERE id_bahan=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: bahan.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>