<?php 
include_once "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<?php include "../sidebar.php"?>
<html>
    <head>
        <title>Edit Supplier</title>
    </head>
    <body>
       <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Supplier</h6>
                </div>

                <div class="card-body">
                    <?php

                    include_once  "../config.php";
    
                    // kalau tidak ada id di query string
                    if( !isset($_GET['id']) ){
                        header('Location: supplier.php');
                    }
    
                    //ambil id dari query string
                    $id = $_GET['id'];
    
                    // buat query untuk ambil data dari database
                    $sql = "SELECT * FROM tb_supplier WHERE id_supplier=$id ";
                    $query = mysqli_query($conn, $sql);
                    $supp = mysqli_fetch_assoc($query);
    
                    // jika data yang di-edit tidak ditemukan
                    if( mysqli_num_rows($query) < 1 ){
                        die("data tidak ditemukan...");
                    }

                ?>

                    <form method="POST" action="update.php" autocomplete="off">

                        <h6 class="heading-small text-muted mb-4">Supplier information</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nama Supplier<span class="small text-danger">*</span></label>
                                        <input type="hidden" name="id_supplier" value="<?php echo $supp['id_supplier'];?>">
                                        <input type="text" name="nama_supplier" class="form-control" value="<?php echo $supp['nama_supplier'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Nomor Handphone</label>
                                        <input type="number" class="form-control" name="hp_supplier" value="<?php echo $supp['hp_supplier']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Alamat<span class="small text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="alamat_supplier"><?php echo $supp['alamat_supplier'];?></textarea>
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
                </div>
            </div>
        </div> 
    </body>
</html>
<?php }else { ?>
<script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>