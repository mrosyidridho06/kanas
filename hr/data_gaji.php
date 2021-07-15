<?php 
include '../config.php';
$gaji=$_POST['gaji'];
$hasil = mysqli_query($conn, "SELECT tb_pegawai.id_pegawai, tb_pegawai.nama_pegawai, master_gaji.masuk, master_gaji.lembur FROM master_gaji INNER JOIN tb_pegawai ON master_gaji.id_pegawai = tb_pegawai.id_pegawai WHERE id_gaji = '$gaji'");
// $hasil = mysqli_query($conn, "SELECT tb_pegawai.id_pegawai, tb_pegawai.nama_pegawai, master_gaji.masuk, master_gaji.lembur FROM master_gaji.id_pegawai INNER JOIN tb_pegawai ON (master_gaji.id_pegawai = tb_pegawai.id_pegawai) where id_pegawai='$gaji'");
$result = mysqli_fetch_array($hasil);
echo json_encode($result);
?>