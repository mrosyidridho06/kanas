<?php require_once "config.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="<?=base_url()?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Article-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Article-List.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Header-Blue.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Map-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/styles.css">
</head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background: var(--white);opacity: 1;filter: blur(0px) brightness(100%) grayscale(0%);">
            <div class="container"><img src="<?=base_url()?>/assets/img/pesanlokal-com-kanaskitchen-logo-aLgOa7.jpg" style="height: 50px;padding: 0px;margin-right: 10px;"><a class="navbar-brand" href="<?=base_url()?>">Kana's Kitchen</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/resep.php">Resep</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/supplier/supplier.php">Supplier</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/pegawai/pegawai.php">Pegawai</a></li>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#" style="color: rgb(34,34,34);">Bahan</a>
                            <div class="dropdown-menu"><a class="dropdown-item" href="<?=base_url()?>/bahan/bahan.php">Bahan Baku</a><a class="dropdown-item" href="<?=base_url()?>/bahan/list.php">List Bahan Baku</a></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/hr/hr.php">HR Management</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
    <script src="<?=base_url()?>/assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>
</html>