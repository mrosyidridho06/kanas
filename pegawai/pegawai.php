<?php require_once "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pegawai</title>
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <!-- <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Navigation-Clean.css"> -->


</head>

<body>
   <?php include_once '../sidebar.php'?>
    <section class="contact-clean" style="background: var(--light);">
        <main>
            <!-- <h2 style="text-shadow: 0px 0px 1px var(--blue);text-align: center;">Bahan Baku</h2> -->
            <form class="shadow" action="aksi.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center">Input Pegawai</h2>
                    <label>Nama</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama"  required>
                    </div>
                    <label>Alamat</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="alamat_pegawai" placeholder="Alamat"  required>
                    </div>
                    <label>Jenis Kelamin</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <select class="form-control" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </div></select>
                    <label>Nomor Telpon</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="hp_pegawai" placeholder="No. Hp" required>
                    </div>
                    <label>Agama</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="agama" placeholder="Agama" required>
                    </div>
                    <label>Jabatan</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="jabatan_pegawai" placeholder="Jabatan" required>
                    </div>
                    <label>Tanggal Masuk</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="date" name="tanggal_masuk" required>
                    </div>
                    <label>Gambar</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="file" name="file_foto" required>
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