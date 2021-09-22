<?php
include "configlogin.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik' || $_SESSION['role'] == 'admin' ){?>
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
            <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
        </div>
        <div class="card-body">
                <form action="resetpass.php" method="POST">
                    <?php if (isset($_GET['error'])) { ?>
                 		<p class="alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
                 	<?php } ?>
                 	<?php if (isset($_GET['success'])) { ?>
                        <p class="success alert alert-success" role="alert"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Password Lama</label>
                                <input class="form-control" type="password" name="op" placeholder="Password" />
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input class="form-control" type="password" name="np" placeholder="Password" />
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Konfirmasi Password Baru</label>
                                <input class="form-control" type="password" name="nn" placeholder="Password" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary"/>
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