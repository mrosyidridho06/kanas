<?php
 include "../config.php";
 $bahan_id=$_POST['id_bahan'];
 $query=mysqli_query($conn,"Delete FROM tb_bahan WHERE id_bahan ='$bahan_id'");
 
 
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