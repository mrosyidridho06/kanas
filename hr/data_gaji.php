<?php 
include '../config.php';
$gaji=$_POST['gaji'];
$hasil = mysqli_query($conn, "SELECT tb_pegawai.id_pegawai, tb_pegawai.nama_pegawai, tb_kehadiran.masuk, tb_kehadiran.lembur FROM tb_kehadiran INNER JOIN tb_pegawai ON tb_kehadiran.id_pegawai = tb_pegawai.id_pegawai WHERE id_kehadiran = '$gaji'");
// $hasil = mysqli_query($conn, "SELECT tb_pegawai.id_pegawai, tb_pegawai.nama_pegawai, tb_kehadiran.masuk, master_gaji.lembur FROM master_gaji.id_pegawai INNER JOIN tb_pegawai ON (master_gaji.id_pegawai = tb_pegawai.id_pegawai) where id_pegawai='$gaji'");
$result = mysqli_fetch_array($hasil);
echo json_encode($result);
?>