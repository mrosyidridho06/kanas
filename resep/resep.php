<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resep</title>
</head>

<body>
    <?php require('../sidebar.php')?>
   <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <div class="card-body">
                    <form action="post" action></form>
                        <select class="form-control" name="supplier" required>
                            <option value="" selected="">Pilih Bahan</option>
                            <?php
                            $sql_supp = mysqli_query($conn, "SELECT * FROM tb_bahan") or die (mysqli_error($conn));
                            while($data_supp = mysqli_fetch_array($sql_supp)){
                                echo '<option value="'.$data_supp['id_bahan'].'">'.$data_supp['nama_barang'].','.$data_supp['harga_barang'].'</option>';
                            } ?>
                        </select>
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