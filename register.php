<?php
include "configlogin.php";
include "config.php";
$msg="";
if(!isset($_SESSION)){
    session_start();
}
    if(isset($_POST['register'])){
    
        // filter data yang diinputkan
        $name = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = md5($_POST["password"]);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        
        
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        
        $cekuname = "SELECT id FROM tb_user WHERE username = '$username' OR email='$email'";
        $hasilcekuname = mysqli_query($conn, $cekuname);
        
        // if(strlen($password) < 8 || $number || $uppercase || $lowercase){
        //     $msg = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
        // }else{
            
        // }
            if($hasilcekuname-> num_rows > 0){
                echo "<script>alert('Username atau password sudah terpakai!');history.go(-1);</script>";
            }
                else{
                    // menyiapkan query
                    $sql = "INSERT INTO tb_user (nama, username, email, password, role) 
                            VALUES (:nama, :username, :email, :password, :role)";
                    $stmt = $db->prepare($sql);
                
                    // bind parameter ke query
                    $params = array(
                        ":nama" => $name,
                        ":username" => $username,
                        ":password" => $password,
                        ":email" => $email,
                        ":role" => $role
                    );
                
                    // eksekusi query untuk menyimpan ke database
                    $saved = $stmt->execute($params);
                
                    // jika query simpan berhasil, maka user sudah terdaftar
                    // maka alihkan ke halaman login
                    if($saved) header("Location: dashboard.php");
                }
    }
$_SESSION["sukses"] = 'User berhasil ditambahkan';
?>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
if ($_SESSION['role'] == 'pemilik'){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" />
</head>
<body>
<?php include "sidebar.php";?>
<div class="container">
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                </div>
            <div class="card-body">
    <div class="row">
        <div class="col-md-6">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama kamu" required/>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" required/><span class="hasil-username"></span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Alamat Email" required/>
                <span class="hasil-email"></span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required />
                <span><?php echo $msg ?></span>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</html>
<script>
$(document).ready(function() {
 $('#username').change(function() {  // Jika terjadi perubahan pada id email
      var username = $(this).val(); // Ciptakan variabel email untuk menampung alamat email yang diinputkan
      $.ajax({ // Lakukan pengiriman data dengan Ajax
         type: 'POST', // dengan tipe pengiriman POST
          url: 'cekmail.php', // dan kirimkan prosesnya ke file cek-email.php
         data: 'username=' + username, // datanya ialah data email
            
            success: function(response) { // Jika berhasil
              $('.hasil-username').html(response); // Tampilkan pesan ke class hasil-email
         }
       });
    });
});
$(document).ready(function() {
 $('#email').change(function() {  // Jika terjadi perubahan pada id email
      var email = $(this).val(); // Ciptakan variabel email untuk menampung alamat email yang diinputkan
      $.ajax({ // Lakukan pengiriman data dengan Ajax
         type: 'POST', // dengan tipe pengiriman POST
          url: 'cekmail.php', // dan kirimkan prosesnya ke file cek-email.php
         data: 'email=' + email, // datanya ialah data email
            
            success: function(response) { // Jika berhasil
              $('.hasil-email').html(response); // Tampilkan pesan ke class hasil-email
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