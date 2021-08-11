 <?php
//insert.php
require_once "../config.php";
date_default_timezone_set('Asia/Makassar');
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($conn, $_POST["nama_barang"]);  
    $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah_barang"]);    
    $satuan = mysqli_real_escape_string($conn, $_POST["satuan"]);
    $harga = mysqli_real_escape_string($conn, $_POST["harga_barang"]);
    $supp = mysqli_real_escape_string($conn, $_POST["supplier"]);
    $date = date("Y-m-d H:i:s");
    $query = "
    INSERT INTO tb_bahan(nama_barang, jumlah_barang, satuan, harga_barang, waktu, id_supplier)  
    VALUES('$name', '$jumlah', '$satuan', $harga, $date, $supp)";
    $sql = mysqli_query($conn, $query)or die (mysqli_error($conn));
    if( $sql ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header( 'Location: bahan.php' );
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        echo "<a href='bahan.php'>Kembali Ke Halaman Supplier</a>";
    }
}
else {
    die("Akses dilarang...");
}
$_SESSION["sukses"] = 'Data Berhasil Disimpan';
?>