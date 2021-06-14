<?php
//insert.php
require_once "../config.php";
session_start();
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($conn, $_POST["nama_supplier"]);  
    $alamat = mysqli_real_escape_string($conn, $_POST["alamat_supplier"]);    
    $hp = mysqli_real_escape_string($conn, $_POST["hp_supplier"]);
    $query = "
    INSERT INTO tb_supplier(nama_supplier, alamat_supplier, hp_supplier)  
     VALUES('$name', '$alamat', '$hp')
    ";
    $sql = mysqli_query($conn, $query);
    if( $sql ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header( 'Location: supplier.php' ) ;
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        echo "<a href='supplier.php'>Kembali Ke Halaman Supplier</a>";
    }
}
else {
    die("Akses dilarang...");
}
$_SESSION["sukses"] = 'Data Berhasil Disimpan';
?>