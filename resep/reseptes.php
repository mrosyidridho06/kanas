<?php
include "../config.php";

if (isset($_POST['submit'])) {
    $nb = $_POST['nama_barang'];
    $hrg = $_POST['harga'];
    $qty = $_POST['qty'];
   
    $q = mysqli_query($conn, "INSERT INTO tb_resep (nama_barang, harga, qty) VALUES ('$nb', '$hrg', '$qty')");
   
    if($q) {
     header('Location: index.php');
    } else {
     echo "<script>alert('Gagal menambahkan data'); window.location.href = index.php;</script>";
    }
   }
   
?>
