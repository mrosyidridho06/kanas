<?php
include "config.php";

// cek apakah tombol simpan sudah diklik atau blum?
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
    <?php 
        if(isset($_SESSION['update']))
        {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['update']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        unset($_SESSION['update']);
        }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
        <?php
            // buat query untuk ambil data dari database
            $currentUser = $_SESSION['id'];
            $sql = "SELECT * FROM tb_user WHERE id = '$currentUser' ";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $user = mysqli_fetch_array($query);
            // jika data yang di-edit tidak ditemukan
            if( mysqli_num_rows($query) < 1 ){
                die("data tidak ditemukan...");
            }
        ?>
                <form action="up_profile.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" value="<?php echo $user['nama']; ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username" value="<?php echo $user['username']; ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary" name="update" value="Update" />
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
</body>
</html>
<script>
$(document).ready(function() {
 $('#username').change(function() {  // Jika terjadi perubahan pada id email
      var username = $(this).val(); // Ciptakan variabel email untuk menampung alamat email yang diinputkan
      $.ajax({ // Lakukan pengiriman data dengan Ajax
         type: 'POST', // dengan tipe pengiriman POST
          url: 'cekmail.php', // dan kirimkan prosesnya ke file cek-email.php
         data: 'username=' + username,  // datanya ialah data email
            
            success: function(response) { // Jika berhasil
              $('.hasil-username').html(response); // Tampilkan pesan ke class hasil-email
         }
       });
    });
});
</script>
<?php }else { ?>
    <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>