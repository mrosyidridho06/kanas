<?php 
require_once "../config.php";

if(!empty($_POST)){
    // var_dump($_POST); 
    // var_dump($_FILES);
    // die;
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $nama_gambar =rand(0,9999).$_FILES['file_foto']['name'];
        $x = explode('.', $nama_gambar);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['file_foto']['size'];
        $file_tmp = $_FILES['file_foto']['tmp_name'];
        
        $nama_peg = mysqli_real_escape_string($conn, $_POST['nama_pegawai']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat_pegawai']);
        $JK = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
        $hp = mysqli_real_escape_string($conn, $_POST['hp_pegawai']);
        $agama = mysqli_real_escape_string($conn, $_POST['agama']);
        $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan_pegawai']);
        $tglmasuk = mysqli_real_escape_string($conn, $_POST['tanggal_masuk']);
                                
                //KONEKSI DATABASE DAN EKSEKUSI QUERY 
                
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 4044070){
                        move_uploaded_file($file_tmp, 'img/'.$nama_gambar);
                        $query = "INSERT INTO tb_pegawai (nama_pegawai , alamat_pegawai, jenis_kelamin, hp_pegawai, agama, jabatan_pegawai, tanggal_masuk, foto) VALUES ('$nama_peg', '$alamat','$JK', '$hp', '$agama', '$jabatan', '$tglmasuk', '$nama_gambar')";
                        $sql = mysqli_query($conn, $query);
                        if($sql){
                            echo 'file berhasil di upload';
                            header('location: pegawai.php');
                        }else{
                            echo 'gagal';
                        }
                    }else{
                        echo 'kebesaran';
                    }
                }else{
                    echo 'ektensi beda';
                }
                
                // mysqli_query($conn, $query);
                
                // if(mysqli_affected_rows($conn) > 0){
                //     echo "<script>
                //     alert('data berhasil ditambahkan!');
                //     document.location.href = '../index.php';
                //     </script>";
                // }else {
                //     echo "<script>
                //     alert('data gagal ditambahkan!');
                //     document.location.href = '../index.php';
                //     </script>";
                // }
        }
        $_SESSION["sukses"] = 'Data Berhasil Disimpan';
 ?>