<?php
include "../config.php";
    $nama_resep = $_POST['namaresep'];
    $total = $_POST['total'];
    $tgl = date('Y-m-d H:i:s');

    mysqli_query($conn, "INSERT INTO tb_resep (id_resep, nama_resep, total, waktu) VALUES (NULL, '$nama_resep', '$total', '$tgl')");

    $id_resep = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $key){
        $id_bahan = $key['id'];
        $harga = $key['harga'];
        $qty = $key['qty'];
        $tot = $harga*$qty;

        mysqli_query($conn, "INSERT INTO tb_resepdetails (id_resepdetails, id_resep, id_barang, qty, harga, total) VALUES (NULL, '$id_resep', '$id_bahan', '$qty', $harga, '$tot')")or die(mysqli_error($conn));
    }
    $_SESSION['cart'] = [];
    header('location: resep_details.php');
?>