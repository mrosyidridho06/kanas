<?php
require_once "../config.php";
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($conn, $_POST["nama_karyawan"]);  
    $tgl = mysqli_real_escape_string($conn, $_POST["tanggal_priode"]);    
    $jmlh_hari = mysqli_real_escape_string($conn, $_POST["jumlah_hari"]);
    $bpjs = mysqli_real_escape_string($conn, $_POST["tun_bpjs"]);
    $bonus = mysqli_real_escape_string($conn, $_POST["bonus"]);
    $lembur = mysqli_real_escape_string($conn, $_POST["jumlah_lembur"]);
    $potongan = mysqli_real_escape_string($conn, $_POST["potongan"]);


    $upah_harian = $jmlh_hari*50000;
    $uang_lembur = $lembur*10000;
    $pot = $potongan;

    $total_gaji = ($uang_lembur+$upah_harian+$bpjs+$bonus-$pot); 
    $query = "INSERT INTO tb_gaji (id_penggajian, id_kehadiran, tanggal, gaji_harian, jumlah_hari, bpjs, bonus, lembur, potongan, total_gaji) VALUES('0', '$name', '$tgl','$upah_harian', '$jmlh_hari', '$bpjs', '$bonus', '$lembur','$potongan','$total_gaji')";
    $sql = mysqli_query($conn, $query);
    if( $sql ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header( 'Location: gaji.php' );
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        echo "<a href='gaji.php'>Kembali Ke Halaman Supplier</a>";
    }
}
else {
    die("Akses dilarang...");
}
$_SESSION["sukses"] = 'Data Berhasil Disimpan';
?>