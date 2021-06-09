<?php 
require('config.php');
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$namaErr = $supplierErr = $jumlahErr = $satuanErr = $hargaErr = "";

//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if(isset($_POST['save'])){
    //JIKA DATA ADA YANG KOSONG
    if(!isset($_POST['nama_barang']) || !isset($_POST['supplier']) || !isset($_POST['jumlah_barang']) || !isset($_POST['satuan']) || !$_POST['harga_barang']){
        if($_POST['nama_barang'] == ""){
        $namaErr = "Nama tidak boleh kosong!";
        }
        if($_POST['supplier'] == ""){
            $supplierErr = "Username tidak boleh kosong!";
        }
        if($_POST['jumlah_barang'] == ""){
            $jumlahErr = "Password tidak boleh kosong!";
        }
        if($_POST['satuan'] == ""){
            $satuanErr = "Email tidak boleh kosong!";
        }
        if($_POST['harga_barang'] == ""){
            $hargaErr = "Email tidak boleh kosong!";
        }
    }else{
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)
        $nama = $_POST['nama_barang'];
        $supplier = $_POST['supplier'];
        $jumlah = $_POST['jumlah_barang'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga_barang'];

        $query = "INSERT INTO tb_bahan (nama_barang,supplier,jumlah_barang,satuan,harga_barang) VALUES('$nama', '$supplier', '$jumlah', '$satuan', '$harga')";

        //KONEKSI DATABASE DAN EKSEKUSI QUERY 
        if (mysqli_query($conn, $query)) {
            header("location:list.php");
        }
        //     echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        // }else{
        //     //JIKA GAGAL KONEK DATABASE / EKSEKUSI QUERY
        //     echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
        // }
    }
    
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bahan</title>
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <!-- <link rel="stylesheet" href="assets/fonts/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css"> -->

</head>

<body>
   <?php require('navbar.php')?>
    <section class="contact-clean" style="background: var(--light);">
        <main>
            <h2 style="text-shadow: 0px 0px 1px var(--blue);text-align: center;">Bahan Baku</h2>
            <form class="shadow" action="" method="post">
                <h2 class="text-center">Input Bahan Baku</h2><label>Nama Barang</label>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang"></div><label>Supplier</label>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><select class="form-control" name="supplier" required>
                        <option value="" selected="">Pilih Supplier</option>
                        <?php
                        $sql_supp = mysqli_query($conn, "SELECT * FROM tb_supplier") or die (mysqli_error($conn));
                        while($data_supp = mysqli_fetch_array($sql_supp)){
                            echo '<option value="'.$data_supp['id_supplier'].'">'.$data_supp['nama_supplier'].'</option>';
                        } ?>
                    </select></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Jumlah Barang</label><input class="form-control" type="text" name="jumlah_barang" placeholder="Jumlah Barang"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Satuan</label><select class="form-control" name="satuan">
                        <option value="Gram" selected="">Gram</option>
                        <option value="Pcs">Pcs</option>
                        <option value="mL">mL</option>
                    </select></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Harga</label><input class="form-control" type="text" name="harga_barang" placeholder="Harga"></div>
                <div class="form-group" style="text-align: right;"><input class="btn btn-primary" name="save" value="save" type="submit"></input></div>
            </form>
        </main>
    </section>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>

</html>