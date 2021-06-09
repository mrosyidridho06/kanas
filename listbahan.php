<?php include('navbar.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>List Bahan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
</head>

<body>
    <div class="container text-center pt-2">
        <h2>Daftar List Bahan</h2>
    </div>
    <div class="col-md-12 search-table-col">
        <!-- <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span> -->
        <div class="text-center">
            <table class="table table-striped table-bordered display w-100" id="mydata">
                <thead>
                    <tr>
                        <th scope="row">No.</th>
                        <th scope="row">Nama</th>
                        <th scope="row">Supplier</th>
                        <th scope="row">Jumlah</th>
                        <th scope="row">Satuan</th>
                        <th scope="row">Harga</th>
                        <th scope="row">Tanggal Input</th>
                        <th colspan="2" class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require('config.php');
                    // Tampilkan semua data
                    $q = $conn->query("SELECT * FROM tb_bahan");

                    $no = 1; // nomor urut
                    while($dt = mysqli_fetch_array($q)){
                    ?>
                    <tr>  
                    <td><?= $no++ ?></td>
                    <td><?= $dt['nama_barang'] ?></td>
                    <td><?= $dt['supplier'] ?></td>
                    <td><?= $dt['jumlah_barang'] ?></td>
                    <td><?= $dt['satuan'] ?></td>
                    <td><?= $dt['harga_barang'] ?></td>
                    <td><?= $dt['waktu'] ?></td>
                    <td><a href="edit.php?id=<?=$dt['id_bahan']?>" title="Edit" data-toggle="tooltip"><span class="fa fa-pencil"></span></a></td>
                    <td><a href="delete.php?id=<?= $dt['id_bahan'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" title="Hapus" data-toggle="tooltip"><span class="fa fa-trash"></span></a></td>
                    </tr>
                    <?php
                    }
                ?> 
                </tbody>
            </table>
        </div>
    </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>
</html>