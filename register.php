<?php

require_once("configlogin.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = md5($_POST["password"]);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);


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
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama kamu" />
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
                <select class="form-select mb-3"
		                name="role" 
		                aria-label="Default select example">
                    <option selected value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="pemilik">Pemilik</option>
                </select>
                <!-- <input class="form-control" type="text" name="role" placeholder="role" /> -->
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
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
         data: 'username=' + username,  // datanya ialah data email
            
            success: function(response) { // Jika berhasil
              $('.hasil-username').html(response); // Tampilkan pesan ke class hasil-email
         }
       });
    });
});
</script>