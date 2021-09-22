<?php 
include_once "../config.php";

if(!isset($_SESSION)){
    session_start();
}

$idresep = $_GET['idresep'];
$data = mysqli_query($conn, "SELECT * FROM tb_resep WHERE id_resep='$idresep'");
$resep = mysqli_fetch_assoc($data);
// print_r($resep);

$details=mysqli_query($conn, "SELECT tb_resepdetails.*, tb_bahan.id_bahan, tb_bahan.nama_barang, tb_bahan.jumlah_barang, tb_bahan.satuan, tb_bahan.harga_barang FROM tb_resepdetails INNER JOIN tb_bahan ON tb_resepdetails.id_barang=tb_bahan.id_bahan WHERE tb_resepdetails.id_resep='$idresep'");



if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Resep</title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="<?=base_url()?>/assets/fonts/font-awesome.min.css">
</head>
<body>
    <div class="text-center">
        <img src="<?=base_url()?>/assets/img/pesanlokal-com-kanaskitchen-logo-aLgOa7-removebg-preview.png" style="height: 60px;">
    </div>
    <h5 class="text-center">Kana's Kitchen</h5>
    <hr>
    <table class="table table-borderless table-responsive-sm" style="max-width: 50%;" align="center" width="50%">
        <tr>
            <th class="text-center">RESEP</th>
        </tr>
        <tr>
            <td align="left">Nama: <?=$resep['nama_resep']?></td>
        </tr>
    </table>
    <hr>
    <table class="table table-borderless table-responsive-sm" style="max-width: 50%;" align="center" width="50%" border="0" cellpadding="3" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Nama Bahan</th>
                <th scope="col" class="text-center">Jumlah Bahan</th>
                <th scope="col" class="text-center">Satuan</th>
                <th scope="col" class="text-center">Quantity</th>
                <th width=20% scope="col" class="text-right">Harga</th>
                <th width=20% scope="col" class="text-right">Sub Total</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_array($details)){?>
            <tr>
                <td><?=$row['nama_barang']?></td>
                <td align="center"><?=$row['jumlah_barang']?></td>
                <td align="center"><?=$row['satuan']?></td>
                <td align="center"><?=$row['qty']?></td>
                <td align="right">Rp. <?=number_format($row['harga_barang'])?></td>
                <td align="right">Rp. <?=number_format($row['total'])?></td>
            </tr>
        <?php
        }
        ?>
            <tr>
                <td class="h6 text-uppercase font-weight-bold" align="right" colspan="5">Total</td>
                <td align="right">Rp. <?=number_format($resep['total'])?></td>
            </tr>
    </table>
</body>

<?php }else { ?>
        <script>window.location="../dashboard.php"</script>
<?php } ?>
</html>
<?php }else{
	header("Location: ../index.php");
} ?>