<?php
//insert.php
require_once "../config.php";
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
        echo "Data Berhasil Diubah"."</br>";
        echo "<a href='data.php'>Kembali Ke Halaman Depan</a>";
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
}
else {
    die("Akses dilarang...");
}
?>