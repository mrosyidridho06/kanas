<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kanas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
   <?php require('navbar.php')?>
    <section class="contact-clean" style="background: var(--light);">
        <main>
            <h2 style="text-shadow: 0px 0px 1px var(--blue);text-align: center;">Bahan Baku</h2>
            <?php

                include("config.php");

                // kalau tidak ada id di query string
                if( !isset($_GET['id']) ){
                    header('Location: list.php');
                }

                //ambil id dari query string
                $id = $_GET['id'];

                // buat query untuk ambil data dari database
                $sql = "SELECT * FROM tb_bahan WHERE id_bahan=$id";
                $query = mysqli_query($conn, $sql);
                $bahan = mysqli_fetch_assoc($query);

                // jika data yang di-edit tidak ditemukan
                if( mysqli_num_rows($query) < 1 ){
                    die("data tidak ditemukan...");
                }

                ?>

            <form class="shadow" action="update.php" method="post">
                <h2 class="text-center">Input Bahan Baku</h2>
                <label>Nama Barang</label>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input type="hidden" name="id_bahan" value="<?php echo $bahan['id_bahan']; ?>"><input class="form-control" type="text" name="nama_barang" value="<?php echo $bahan['nama_barang']; ?>"></div>
                <label>Supplier</label>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input class="form-control" type="text" name="supplier" value="<?php echo $bahan['supplier']; ?>"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Jumlah Barang</label><input class="form-control" type="text" name="jumlah_barang" value="<?php echo $bahan['jumlah_barang']; ?>"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label for="satuan">Satuan</label><?php $satuan = $bahan['satuan']; ?><select class="form-control" name="satuan">
                        <option <?php echo ($satuan == 'Gram') ? "selected": "" ?>>Gram</option>
                        <option <?php echo ($satuan == 'Pcs') ? "selected": "" ?>>Pcs</option>
                        <option <?php echo ($satuan == 'mL') ? "selected": "" ?>>mL</option>
                </select></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Harga</label><input class="form-control" type="text" name="harga_barang" value="<?php echo $bahan['harga_barang']; ?>"></div>
                <div class="form-group" style="text-align: right;"><input class="btn btn-primary" name="save" value="save" type="submit"></input></div>
            </form>
        </main>
    </section>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>