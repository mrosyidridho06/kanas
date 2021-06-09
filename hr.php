<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HR</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
</head>

<body>
    <?php include('navbar.php');?>
    <section class="contact-clean" style="background: var(--light);">
        <h2 style="text-shadow: 0px 0px 1px var(--blue);text-align: center;">HRD</h2>
        <main>
            <form class="shadow" method="post">
                <h2 class="text-center">Gaji Bulanan</h2><label>Nama</label>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input class="form-control" type="text" name="Nama Barang" placeholder="Nama"></div><label>Periode Gaji</label>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input class="form-control" type="date"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Jumlah Hari</label><input class="form-control" type="text" name="name" placeholder="Jumlah Hari"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>BPJS</label><input class="form-control" type="text" name="name" placeholder="BPJS"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Bonus</label><input class="form-control" type="text" name="name" placeholder="Bonus"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Total Harian</label><input class="form-control" type="text" name="name" placeholder="Total Harian"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Lembur</label><input class="form-control" type="text" name="name" placeholder="Lembur"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Tunjangan Jabatan</label><input class="form-control" type="text" name="name" placeholder="Tunjangan Jabatan"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Total Gaji</label><input class="form-control" type="text" name="name" placeholder="Total Gaji"></div>
                <div class="form-group" style="text-align: right;"><button class="btn btn-primary" type="submit">Kirim</button></div>
            </form>
        </main>
    </section>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
    <!-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
</body>

</html>