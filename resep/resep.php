<?php 
include"../config.php";
if(!isset($_SESSION)){
    session_start();
}
$sum = 0;
if(!empty($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $key => $value){
        $sum =$sum+$value['harga']*$value['qty'];
    }
}

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resep</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
</head>

<body>
    <?php require('../sidebar.php');
    // print_r($_SESSION);
    ?>
   <div class="container">
       <h3 class="mb-2 text-gray-800">Resep</h3>
        <form method="post" action="proses_resep.php" class="form-inline">
        <!-- <label>Nama Resep</label><div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input class="form-control" type="text" name="nama_resep" placeholder="Nama Resep"></div> -->
            <div class="form-group">
                <select class="form-control bahan" name="bahan" id="bahan" required>
                    <option>
                    <?php
                    $sql_supp = mysqli_query($conn, "SELECT * FROM tb_bahan") or die (mysqli_error($conn));
                    while($data_supp = mysqli_fetch_array($sql_supp)){
                        echo '<option value="'.$data_supp['id_bahan'].'">'.$data_supp['nama_barang'].', '.$data_supp['jumlah_barang'].' '.$data_supp['satuan'].', '.$data_supp['harga_barang'].'</option>';
                    } ?>
                    </option>
                </select>
            </div>
            <div class="fotm-group mx-1">
                <input type="number" name="qty" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="form-group mx-2">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
        <br><br>
        <div class="card shadow mb-4">
                <div class="card-body">
                <h3>Resep Details</h3>
                <form action="tambah_resep.php" method="post" class="form-inline my-4">
                    <input type="hidden" name="total" value="<?=$sum?>">
                    <div class="form-group mx-2">
                        <input type="text" name="namaresep" placeholder="Nama Resep" class="form-control" required>
                    </div>
                    <div class="form-group mx-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Bahan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Quantity</th>
                            <th align="right">Harga</th>
                            <th align="center">Aksi</th>
                            <th>Sub Total</th>
                        </tr>
                        <?php
                        if(!empty($_SESSION['cart']))
                            foreach($_SESSION['cart'] as $key => $value)
                            {
                        ?>
                            <tr>
                                <td><?=$value['nama']?></td>
                                <td><?=$value['jumlah']?></td>
                                <td><?=$value['satu']?></td>
                                <td><?=$value['qty']?></td>
                                <td align="right">Rp. <?=number_format($value['harga'])?></td>
                                <td align="center"><a href="delete.php?id=<?=$value['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i></i></a></td>
                                <td align="right">Rp. <?=number_format($value['qty']*$value['harga'])?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <h5 align="right">Total Rp. <?=number_format($sum)?></h5>
                </div>
            </div>
        </div>
   </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Kana's Kitchen © 2021</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#bahan").select2({
                placeholder: "Pilih bahan"
            });
        });
    </script>
</body>
</html>
<?php }else { ?>
        <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>