<?php 
include_once "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Bahan</title>
</head>

<body>
   <?php include "../sidebar.php" ?>
   <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Bahan</h6>
                </div>
            <div class="card-body">
            <?php

                include_once  "../config.php";

                // kalau tidak ada id di query string
                if( !isset($_GET['id']) ){
                    header('Location: bahan.php');
                }

                //ambil id dari query string
                $id = $_GET['id'];
                
                $supp = mysqli_query($conn, "SELECT DISTINCT nama_supplier FROM tb_supplier");
                
                
                // buat query untuk ambil data dari database
                $sql = "SELECT * FROM tb_bahan INNER JOIN tb_supplier ON tb_bahan.id_supplier = tb_supplier.id_supplier WHERE id_bahan=$id ";
                $query = mysqli_query($conn, $sql);
                $bahan = mysqli_fetch_array($query);

                // jika data yang di-edit tidak ditemukan
                if( mysqli_num_rows($query) < 1 ){
                    die("data tidak ditemukan...");
                }

                ?>

            <form action="update.php" method="post">
                <h6 class="heading-small text-muted mb-4">Bahan information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nama Bahan<span class="small text-danger">*</span></label>
                                        <input type="hidden" name="id_bahan" value="<?php echo $bahan['id_bahan'];?>">
                                        <input type="text" name="nama_barang" class="form-control" value="<?php echo $bahan['nama_barang'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Harga<span class="small text-danger">*</span></label>
                                        <input type="text" name="harga_barang" class="form-control" value="<?php echo $bahan['harga_barang'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Jumlah Bahan<span class="small text-danger">*</span></label>
                                        <input type="text" name="jumlah_barang" class="form-control" value="<?php echo $bahan['jumlah_barang'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="satuan">Satuan<span class="small text-danger">*</span></label>
                                        <?php $satuan = $bahan['satuan']; ?>
                                        <select class="form-control" name="satuan">
                                            <option <?php echo ($satuan == 'Gram') ? "selected": "" ?>>Gram</option>
                                            <option <?php echo ($satuan == 'Pcs') ? "selected": "" ?>>Pcs</option>
                                            <option <?php echo ($satuan == 'mL') ? "selected": "" ?>>mL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Supplier<span class="small text-danger">*</span></label>
                                        <?php
                                            $sql = mysqli_query($conn, "SELECT id_supplier FROM tb_bahan WHERE id_bahan='".$id."' LIMIT 1");
                                            $result = mysqli_fetch_array($sql);
                                            $id = $result['id_supplier'];
                                            
                                            $query = mysqli_query($conn, "SELECT * FROM tb_supplier");
                                            ?>
                                            <select class="form-control" name='nama_supplier'>
                                              <?php
                                                while ($suppli = mysqli_fetch_array($query)) {
                                              ?>
                                            <option value="<?php echo $suppli['id_supplier']; ?>" <?php if ($id == $suppli['id_supplier']) { echo 'selected'; } ?> ><?php echo $suppli['nama_supplier']; ?></option>
                                            <?php } ?> </select></p>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
            </form>
</body>
</html>
<?php }else { ?>
    <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} 
?>