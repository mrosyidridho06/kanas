<?php 
include_once "../config.php";

if(!isset($_SESSION)){
    session_start();
}
$idgaji = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_gaji WHERE id_penggajian='$idgaji'");
$gaji = mysqli_fetch_assoc($data);
// print_r($resep);

$details=mysqli_query($conn, "SELECT * FROM tb_gaji INNER JOIN tb_kehadiran ON tb_gaji.id_kehadiran=tb_kehadiran.id_kehadiran INNER JOIN tb_pegawai ON tb_kehadiran.id_pegawai=tb_pegawai.id_pegawai WHERE tb_gaji.id_penggajian='$idgaji'");



if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Gaji</title>
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
    <table class="table table-borderless table-responsive-sm" style="max-width: 80%;" align="center">
        <tr>
            <th class="text-center">Penggajian</th>
        </tr>
        <tr>
            <td align="left">Kode: <?=$gaji['id_penggajian']?></td>
        </tr>
        <tr>
            <td align="left">Tanggal: <?=$gaji['tanggal']?></td>
        </tr>
    </table>
    <hr>
    <table class="table table-borderless table-responsive-sm" style="max-width: 80%;" align="center" width="50%" border="0" cellpadding="3" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Nama Pegawai</th>
                <th scope="col" >Jumlah Masuk</th>
                <th scope="col" >Lembur</th>
                <th scope="col" class="text-right">Gaji Harian</th>
                <th scope="col" class="text-right">BPJS</th>
                <th scope="col" class="text-right">Bonus</th>
                <th scope="col" class="text-right">Potongan</th>
                <th scope="col" class="text-right">Total Gaji</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_array($details)){?>
            <tr>
                <td ><?=$row['nama_pegawai']?></td>
                <td ><?=$row['jumlah_hari']?></td>
                <td ><?=$row['lembur']?></td>
                <td align="right">Rp. <?=number_format($row['gaji_harian'])?></td>
                <td align="right">Rp. <?=number_format($row['bpjs'])?></td>
                <td align="right">Rp. <?=number_format($row['bonus'])?></td>
                <td align="right">Rp. <?=number_format($row['potongan'])?></td>
                <td align="right">Rp. <?=number_format($row['total_gaji'])?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

<?php }else { ?>
        <script>window.location="../dashboard.php"</script>
<?php } ?>
</html>
<?php }else{
	header("Location: ../index.php");
} ?>