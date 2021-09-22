<?php
include "../config.php";
if(isset($_POST['save'])){
    // ambil data dari formulir
    $id = $_POST['id_pegawai'];
    $nama = $_POST['nama_pegawai'];
    $alamat = $_POST['alamat_pegawai'];
    $jk = $_POST['jenis_kelamin'];
    $hp = $_POST['hp_pegawai'];
    $agama = $_POST['agama'];
    $jab = $_POST['jabatan'];
    $tgl = $_POST['tanggal_masuk'];
    $y = $_POST['y'];

    $fileName = $_FILES['file_foto']['name'];
    $tempLocation = $_FILES['file_foto']['tmp_name'];
    $newfileName = rand(9999,1000).date('ymdhis').$fileName;
    $imgExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); 
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
    $imgSize = $_FILES['file_foto']['size'];
    
    if(in_array($imgExt, $valid_extensions) === true){    
        //cek besar       
        if($imgSize < 4044070){
            if (move_uploaded_file($tempLocation,'img/'.$newfileName)){
                $query = "SELECT * FROM tb_pegawai WHERE id_pegawai='".$id."'";
                $sql = mysqli_query($conn, $query) or die(mysqli_error($conn)); // Eksekusi/Jalankan query dari variabel $query
                $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
                
                if(is_file("img/".$data['foto'])) // Jika gambar ada
                    unlink("img/".$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images
                    
                $query = "UPDATE tb_pegawai SET nama_pegawai = '$nama', alamat_pegawai = '$alamat', jenis_kelamin = '$jk', hp_pegawai = '$hp', agama = '$agama', jabatan_pegawai = '$jab', tanggal_masuk = '$tgl', foto = '$newfileName' WHERE id_pegawai = '$id'";
                $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if($sql){
                        header('location: pegawai.php');
                        $_SESSION["update"] = 'Data Berhasil Diupdate';
                    }else{
                        echo "<script>alert('Gagal di update!');history.go(-1);</script>";
                    }
            }
        }else{
            echo "<script>alert('File foto kebesaran!');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('Ektensi file foto berbeda atau tidak diperbolehkan!');history.go(-1);</script>";
    }
}else{
    echo 'Akses Dilarang';
}
?>