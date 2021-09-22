<?php
include "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik'){?>
<?php
if(isset($_POST["bahan"]))
{
    $idbahan = $_POST['bahan'];
    $jumlah = $_POST['qty'];

    $data = mysqli_query($conn, "SELECT * FROM tb_bahan WHERE id_bahan = '$idbahan'");
    $b = mysqli_fetch_assoc($data);

	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "id");
		if(!in_array($b["id_bahan"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
				'id'		=>	$b["id_bahan"],
				'nama'		=>	$b["nama_barang"],
                'jumlah'	=>	$b["jumlah_barang"],
				'satu'		=>	$b["satuan"],
				'harga'		=>	$b["harga_barang"],
                'qty'		=>	$jumlah
			);
			$_SESSION["cart"][$count] = $item_array;
		}
		else{
			echo '<script>alert("Item Already Added")</script>';
		}
	}else{
		$item_array = array(
            'id'		=>	$b["id_bahan"],
            'nama'		=>	$b["nama_barang"],
            'jumlah'	=>	$b["jumlah_barang"],
            'satu'		=>	$b["satuan"],
            'harga'		=>	$b["harga_barang"],
            'qty'		=>	$jumlah
        );
		$_SESSION["cart"][0] = $item_array;
	}
    header('location: resep.php');
}?>
<?php }else { ?>
        <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>