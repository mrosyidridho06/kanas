<?php 
require_once "../config.php";
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
// $namaErr = $alamatErr = $jkErr= $hpErr = $agmErr = $jbtnErr;

//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if(isset($_POST['save'])){
    // var_dump($_POST); 
    // var_dump($_FILES);
    // die;
    //JIKA DATA ADA YANG KOSONG
    // if( !isset($_POST['nama_pegawai']) || 
    //     !isset($_POST['alamat_pegawai']) || 
    //     !isset($_POST['jenis_kelamin']) ||
    //     !isset($_POST['hp_pegawai']) ||
    //     !isset($_POST['agama']) ||
    //     !isset($_POST['jabatan_pegawai']) ||
    //     !isset($_POST['tanggal_masuk']) ||
    //     !isset($_POST['foto'])){

    //     if($_POST['nama_pegawai'] == ""){
    //         $namaErr = "Nama tidak boleh kosong!";
    //     }
    //     if($_POST['alamat_pegawai'] == ""){
    //         $alamatErr = "alamat tidak boleh kosong!";
    //     }
    //     if($_POST['jenis_kelamin'] == ""){
    //         $jkErr = "Jenis Kelamin tidak boleh kosong!";
    //     }
    //     if($_POST['hp_pegawai'] == ""){
    //         $hpErr = "No handphone tidak boleh kosong!";
    //     }
    //     if($_POST['agama'] == ""){
    //         $agmErr = "Agama tidak boleh kosong!";
    //     }
    //     if($_POST['jabatan_pegawai'] == ""){
    //         $jbtnErr = "Jabatan tidak boleh kosong!";
    //     }
    //     if($_POST['tanggal_masuk'] == ""){
    //         $tglErr = "Tanggal tidak boleh kosong!";
    //     }
        
    // }else{
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $nama_gambar =$_FILES['file_foto']['name'];
        $x = explode('.', $nama_gambar);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['file_foto']['size'];
        $file_tmp = $_FILES['file_foto']['tmp_name'];
        
        $nama_peg = $_POST['nama_pegawai'];
        $alamat = $_POST['alamat_pegawai'];
        $JK = $_POST['jenis_kelamin'];
        $hp = $_POST['hp_pegawai'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan_pegawai'];
        $tglmasuk = $_POST['tanggal_masuk'];
                                
                //KONEKSI DATABASE DAN EKSEKUSI QUERY 
                
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 4044070){
                        move_uploaded_file($file_tmp, 'img/'.$nama_gambar);
                        $query = "INSERT INTO tb_pegawai (nama_pegawai , alamat_pegawai, jenis_kelamin, hp_pegawai, agama, jabatan_pegawai, tanggal_masuk, foto, file_foto) VALUES ('$nama_peg', '$alamat','$JK, '$hp', '$agama', '$jabatan', '$tglmasuk', '$nama_gambar', '$file_tmp')";
                        mysqli_query($conn, $query);
                        if($query){
                            echo 'file berhasil di upload';
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
        
 ?>