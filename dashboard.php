<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
</head>

<body>
    <?php require('sidebar.php')?>
    <?php
        include_once "config.php";

        $data_barang = mysqli_query($conn, "SELECT * FROM tb_bahan");
        $data_peg = mysqli_query($conn, "SELECT * FROM tb_pegawai");
        $data_sup = mysqli_query($conn, "SELECT * FROM tb_supplier");
        $jumlahbah = mysqli_num_rows($data_barang);
        $jumlahpeg = mysqli_num_rows($data_peg);
        $jumlahsup = mysqli_num_rows($data_sup);
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card shadow rounded">
                    <div class="card-body">
                    <i class="fa fa-cube float-end"></i>
                    <h6 class="text-uppercase">Jumlah Bahan</h6>
                    <h2 class="my-2"><?php echo $jumlahbah;?></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="card shadow rounded">
                    <div class="card-body">
                    <i class="fa fa-cube float-end"></i>
                    <h6 class="text-uppercase">Jumlah Supplier</h6>
                    <h2 class="my-2"><?php echo $jumlahsup;?></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="card shadow rounded">
                    <div class="card-body">
                    <i class="fa fa-cube float-end"></i>
                    <h6 class="text-uppercase">Jumlah Pegawai</h6>
                    <h2 class="my-2"><?php echo $jumlahpeg;?></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="card shadow rounded">
                    <div class="card-body">
                    <i class="fa fa-cube float-end"></i>
                    <h6 class="text-uppercase">Jumlah Pegawai</h6>
                    <h2 class="my-2"><?php echo $jumlahpeg;?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>

</html>