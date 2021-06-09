<?php 
require('../config.php');
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$namaErr = $alamatErr = $hpErr = "";

//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if(isset($_POST['save'])){
    //JIKA DATA ADA YANG KOSONG
    if(!isset($_POST['nama_supplier']) || !isset($_POST['alamat_supplier']) || !isset($_POST['hp_supplier'])){
        if($_POST['nama_supplier'] == ""){
            $namaErr = "Nama tidak boleh kosong!";
        }
        if($_POST['alamat_supplier'] == ""){
            $alamatErr = "alamat tidak boleh kosong!";
        }
        if($_POST['hp_supplier'] == ""){
            $hpErr = "No handphone tidak boleh kosong!";
        }
    }else{
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)
        $nama = $_POST['nama_supplier'];
        $alamat = $_POST['alamat_supplier'];
        $hp = $_POST['hp_supplier'];

        $query = "INSERT INTO tb_supplier (nama_supplier , alamat_supplier, hp_supplier) VALUES('$nama', '$alamat', '$hp')";

        //KONEKSI DATABASE DAN EKSEKUSI QUERY 
        if (mysqli_query($conn, $query)) {
            header("location:../bahan.php");
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
    <title>Supplier</title>
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <!-- <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Navigation-Clean.css"> -->


</head>

<body>
   <?php include_once '../navbar.php'?>
    <section class="contact-clean" style="background: var(--light);">
        <main>
            <!-- <h2 style="text-shadow: 0px 0px 1px var(--blue);text-align: center;">Bahan Baku</h2> -->
            <form class="shadow" action="" method="post">
                <h2 class="text-center">Input Supplier</h2>
                    <label>Nama</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="nama_supplier" placeholder="Nama">
                    </div>
                    <label>Alamat</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="alamat_supplier" placeholder="Alamat">
                    </div>
                    <label>No. Hp</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="hp_supplier" placeholder="No. Hp">
                    </div>
                <div class="form-group" style="text-align: right;"><input class="btn btn-primary" name="save" value="save" type="submit"></input></div>
            </form>
        </main>
    </section>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>

</html>