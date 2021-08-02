<?php
require_once "../config.php";
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($conn, $_POST["nama_karyawan"]);  
    $tgl = mysqli_real_escape_string($conn, $_POST["tanggal_priode"]);
    $jab = mysqli_real_escape_string($conn, $_POST["jabatan"]);    
    $jmlh_hari = mysqli_real_escape_string($conn, $_POST["masuk"]);
    $izin = mysqli_real_escape_string($conn, $_POST["izin"]);
    $sakit = mysqli_real_escape_string($conn, $_POST["sakit"]);
    $alpa = mysqli_real_escape_string($conn, $_POST["alpa"]);
    $lembur = mysqli_real_escape_string($conn, $_POST["jumlah_lembur"]);
    $pot = mysqli_real_escape_string($conn, $_POST["potongan"]);

    $query = "INSERT INTO master_gaji VALUES('', '$name', '$jmlh_hari', '$sakit', '$izin',  '$alpa', '$lembur', '$pot', '$tgl')";
    $sql = mysqli_query($conn, $query);
    if( $sql ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header( 'Location: kehadiran.php' );
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        echo "<a href='kehadiran.php'>Kembali Ke Halaman Supplier</a>";
    }
}
else {
    die("Akses dilarang...");
}
$_SESSION["sukses"] = 'Data Berhasil Disimpan';
?>