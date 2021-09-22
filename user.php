<?php
require_once("configlogin.php");
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik' || $_SESSION['role'] == 'admin' ){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?php include "sidebar.php";?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <div class="card-body">
        <?php
            if($_SESSION['pemilik']){
                $sesi = $_SESSION['pemilik'];
            }elseif($_SESSION['admin']){
                $sesi = $_SESSION['admin'];
            }elseif($_SESSION['user']){
                $sesi = $_SESSION['user'];
            }
            // buat query untuk ambil data dari database
            $sql = "SELECT * FROM tb_user WHERE role=";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $user = mysqli_fetch_assoc($query);
            // jika data yang di-edit tidak ditemukan
            if( mysqli_num_rows($query) < 1 ){
                die("data tidak ditemukan...");
            }
        ?>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" value="<?php echo $user['nama_lengkap']; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" /><span class="hasil-username"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" />
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="custom-select mb-3"
                                    name="role">
                                <option selected value="user">Pegawai</option>
                                <option value="admin">HR</option>
                                <option value="pemilik">Pemilik</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="register" value="Daftar" />
                    </form>
                </div>
            </div>
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