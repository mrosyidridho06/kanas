<?php 
include "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'pemilik'){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Pegawai</title>
</head>

<body>
   <?php include "../sidebar.php" ?>
   <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
                </div>
            <div class="card-body">
            <?php
                // kalau tidak ada id di query string
                if( !isset($_GET['id']) ){
                    header('Location: pegawai.php');
                }

                //ambil id dari query string
                $id = $_GET['id'];
                
                // buat query untuk ambil data dari database
                $sql = "SELECT * FROM tb_pegawai WHERE id_pegawai=$id";
                $query = mysqli_query($conn, $sql);
                $peg = mysqli_fetch_array($query);

                // jika data yang di-edit tidak ditemukan
                if( mysqli_num_rows($query) < 1 ){
                    die("data tidak ditemukan...");
                }

                ?>

            <form action="update.php" method="post" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Pegawai information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nama<span class="small text-danger">*</span></label>
                                        <input type="hidden" name="id_pegawai" value="<?php echo $peg['id_pegawai'];?>">
                                        <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $peg['nama_pegawai'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Alamat<span class="small text-danger">*</span></label>
                                        <input type="text" name="alamat_pegawai" class="form-control" value="<?php echo $peg['alamat_pegawai'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Jenis Kelamin<span class="small text-danger">*</span></label>
                                        <?php $jk = $peg['jenis_kelamin']; ?>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option <?php echo ($jk == 'Laki-laki') ? "selected": "" ?>>Laki-laki</option>
                                            <option <?php echo ($jk == 'Perempuan') ? "selected": "" ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="satuan">No. Hp<span class="small text-danger">*</span></label>
                                        <input type="number" name="hp_pegawai" class="form-control" value="<?php echo $peg['hp_pegawai'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="satuan">Agama<span class="small text-danger">*</span></label>
                                        <input type="agama" name="agama" class="form-control" value="<?php echo $peg['agama'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Jabatan<span class="small text-danger">*</span></label>
                                        <input type="text" name="jabatan" class="form-control" value="<?php echo $peg['jabatan_pegawai'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Tanggal Masuk<span class="small text-danger">*</span></label>
                                        <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $peg['tanggal_masuk'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class= "col-sm">
                                <div class= "form-group focused">
                                    <label class="form-control-label" for="foto">Foto <span class="small text-danger">*Ukuran Maksimum 4 MB</span></label>
                                    <div class="text-center">
                                    <img src="img/<?php echo $peg['foto']; ?>" width="100px" height="100px" />
                                    </div>
                                    <input type="hidden" name="y" value="<?php echo $peg['foto']; ?>" />
                                    <input type="file" name="file_foto" class="form-control">
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