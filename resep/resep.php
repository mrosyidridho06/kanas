<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resep</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">

</head>

<body>
    <?php require('../navbar.php')?>
    <section class="contact-clean" style="background: var(--light);">
        <main>
            <h2 style="text-shadow: 0px 0px 1px var(--blue);text-align: center;">Resep Kanas</h2>
            <form class="border rounded shadow" method="post">
                <h2 class="text-center">Masukkan Nama Bahan Baku</h2>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Nama Resep</label><input class="form-control" type="text" name="resep" placeholder="Nama Resep"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Nama Bahan Baku</label><select class="form-control">
                        <optgroup label="Bahan">
                            <option value="12" selected="">Telur</option>
                            <option value="13">Tepung</option>
                            <option value="14">Gula</option>
                        </optgroup>
                    </select></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Satuan</label><input class="form-control" type="text" name="satuan" placeholder="Satuan"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Qty</label><input class="form-control" type="text" name="qty" placeholder="Qty"></div>
                <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Harga</label><input class="form-control" type="text" name="harga" placeholder="Harga"></div>
                <div class="form-group" style="text-align: right;"><button class="btn btn-primary" type="submit">Kirim</button></div>
            </form>
        </main>
    </section>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>

</html>