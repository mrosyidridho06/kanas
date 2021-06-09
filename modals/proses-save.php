<?php
include "../config.php";
$nama = $_POST['nama_barang'];
$supp = $_POST['supplier'];
$jumlah = $_POST['jumlah_barang'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga_barang'];

$query = mysqli_query($conn,"INSERT INTO tb_bahan (nama_barang, supplier, jumlah_barang, satuan, harga_barang) VALUES ('$nama','$supp', '$jumlah', '$satuan', '$harga')");

if($query) // jika insert data berhasil
{
 // fungsi untuk membuat format json
 header('Content-Type: application/json');
 // untuk load data yang sudah ada dari tabel
 $content = file_get_contents('http://localhost/kanas/modals/modal-data.php', true);
 $data = array('status'=>'success', 'data'=> $content);
 echo json_encode($data);
}
else // jika insert data gagal
{
 $data = array('status'=>'failed', 'data'=> null);
 echo json_encode($data);
}

?>