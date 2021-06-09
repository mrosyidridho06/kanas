<?php
include "../config.php";
$idb = $_POST['id_bahan'];
$nama = $_POST['nama_barang'];
$supp = $_POST['supplier'];
$jumlah = $_POST['jumlah_barang'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga_barang'];

$query = mysqli_query($conn,"UPDATE tb_bahan SET nama_barang = '$nama', supplier = '$supp', jumlah_barang = '$jumlah', satuan = '$satuan', harga_barang = '$harga' WHERE id_bahan = '$idb'");

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