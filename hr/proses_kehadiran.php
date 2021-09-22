<?php
include "../config.php";
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($conn, $_POST["nama_karyawan"]);  
    $tgl = mysqli_real_escape_string($conn, $_POST["tanggal_priode"]);
    $jmlh_hari = mysqli_real_escape_string($conn, $_POST["masuk"]);
    $izin = mysqli_real_escape_string($conn, $_POST["izin"]);
    $lembur = mysqli_real_escape_string($conn, $_POST["jumlah_lembur"]);

    $query = "INSERT INTO tb_kehadiran (id_kehadiran, id_pegawai, masuk, izin, lembur, tanggal) VALUES('0', '$name', '$jmlh_hari', '$izin', '$lembur', '$tgl')";
    $sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
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