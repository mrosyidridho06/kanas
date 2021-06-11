<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['save'])){

    // ambil data dari formulir
    $id = $_POST['id_bahan'];
    $nama = $_POST['nama_barang'];
    $supp = $_POST['supplier'];
    $jb = $_POST['jumlah_barang'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga_barang'];

    // buat query update
    $sql = "UPDATE tb_bahan SET nama_barang='$nama', supplier='$supp', jumlah_barang='$jb', satuan='$satuan', harga_barang='$harga' WHERE id_bahan=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>