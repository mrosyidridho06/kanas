<?php 
require('../config.php');
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
// $namaErr = $supplierErr = $jumlahErr = $satuanErr = $hargaErr = "";

//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
// if(isset($_POST['save'])){
    //JIKA DATA ADA YANG KOSONG
    // if(!isset($_POST['nama_barang']) || !isset($_POST['supplier']) || !isset($_POST['jumlah_barang']) || !isset($_POST['satuan']) || !$_POST['harga_barang']){
    //     if($_POST['nama_barang'] == ""){
    //     $namaErr = "Nama tidak boleh kosong!";
    //     }
    //     if($_POST['supplier'] == ""){
    //         $supplierErr = "Username tidak boleh kosong!";
    //     }
    //     if($_POST['jumlah_barang'] == ""){
    //         $jumlahErr = "Password tidak boleh kosong!";
    //     }
    //     if($_POST['satuan'] == ""){
    //         $satuanErr = "Email tidak boleh kosong!";
    //     }
    //     if($_POST['harga_barang'] == ""){
    //         $hargaErr = "Email tidak boleh kosong!";
    //     }
    // }else{
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)\
        // $id = '';
        // $nama =$_POST['nama_barang'];
        // $jumlah =$_POST['jumlah_barang'];
        // $satuan =$_POST['satuan'];
        // $harga =$_POST['harga_barang'];
        // $supp = $_POST['nama_supplier'];
        // $jam = '';

        // mysqli_query($conn, "INSERT INTO tb_bahan (id_bahan, nama_barang, jumlah_barang, satuan, harga_barang, id_supplier) VALUES('$id', '$nama', '$jumlah', '$satuan', '$harga', '$supp', '$jam')") or die(mysqli_error($conn));

        // $supp = $_POST['nama_supplier'];
        // foreach($supp as $suplier){
        //     mysqli_error($conn, "INSERT INTO tb_supplier (id_supplier, nama_supplier) VALUES('$id','$supp')") or die(mysqli_error($conn));
        // }
        // echo "<script>window.location='list.php';</script>";
        //KONEKSI DATABASE DAN EKSEKUSI QUERY 
        //     echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        // }else{
        //     //JIKA GAGAL KONEK DATABASE / EKSEKUSI QUERY
        //     echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
        // }
    // }

    $insert = mysqli_query($conn, "INSERT INTO tb_bahan VALUES ('', '$_POST[nama_barang]', '$_POST[jumlah_barang]', '$_POST[satuan]', '$_POST[harga_barang]', CURRENT_TIME(), '$_POST[supplier]')");

    if($insert){
        echo 'berhasil';
    }else{
        echo 'gagal';
    }



 ?>