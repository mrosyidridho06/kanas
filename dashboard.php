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
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Bahan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahbah;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Supplier</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahsup;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-badge fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Pegawai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahpeg;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Resep</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahsup;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cube fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="row">
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
        </div> -->
</body>

</html>