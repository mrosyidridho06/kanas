<?php
require_once "../config.php";
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($conn, $_POST["nama_karyawan"]);  
    $tgl = mysqli_real_escape_string($conn, $_POST["tanggal_priode"]);
    $jab = mysqli_real_escape_string($conn, $_POST["jabatan"]);    
    $jmlh_hari = mysqli_real_escape_string($conn, $_POST["masuk"]);
    $izin = mysqli_real_escape_string($conn, $_POST["izin"]);
    $lembur = mysqli_real_escape_string($conn, $_POST["jumlah_lembur"]);

    $query = "INSERT INTO tb_kehadiran VALUES('', '$name', '$jmlh_hari', '$izin', '$lembur', '$tgl')";
    $sql = mysqli_query($conn, $query);
    if( $sql ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header( 'Location: kehadiran.php' );
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        echo "<div><a href='kehadiran.php'>Kembali Ke Halaman kehadiran</a></div>";
    }
}
else {
    die("Akses dilarang...");
}
$_SESSION["sukses"] = 'Data Berhasil Disimpan';
?>