<?php
include('config.php'); // Meng-includekan file koneksi ke database
  
if(isset($_POST["username"]))
{
    // Cek apakah ada permintaan Ajax
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    
    $hasil = mysqli_query($conn,"SELECT id FROM tb_user WHERE username='$_POST[username]'");
    $email = mysqli_num_rows($hasil);
     
    // Jika datanya diatas 0 (ada)
    if($email > 0) {
        echo '<font style=color:#F00>Username sudah terdaftar</font>'; // Tampilkan pesan
    }else{ // Jika belum ada
        echo '<font style=color:#06F>Username tersedia</font>'; // Tampilkan pula pesan
    }
}
?>
