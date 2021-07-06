<?php
include "../config.php";

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_nama'			=>	$_POST["hidden_nama"],
                'item_satuan'			=>	$_POST["hidden_satuan"],
				'item_harga'		=>	$_POST["hidden_harga"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_nama'			=>	$_POST["hidden_nama"],
            'item_satuan'			=>	$_POST["hidden_satuan"],
			'item_harga'		=>	$_POST["hidden_harga"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="reseptes.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tes</title>
	</head>
	<body>
    <?php include_once "../sidebar.php"?>
		<br />
		<div class="container">
            <h2 class="text-muted">Resep</h2>
            <hr>
			<?php
				$query = "SELECT * FROM tb_bahan ORDER BY id_bahan ASC";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
            <div class="row block">  
                <div class="col-md-4">
                    <form method="post" action="reseptes.php?action=add&id=<?php echo $row["id_bahan"]; ?>">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                            <!-- <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br /> -->

                            <h4 class="text-info"><?php echo $row["nama_barang"]; ?></h4>

                            <h4 class="text-info"><?php echo $row["satuan"]; ?></h4>

                            <h4 class="text-danger">Rp <?php echo number_format($row["harga_barang"]); ?></h4>

                            <input type="number" name="quantity" value="1" class="form-control" />

                            <input type="hidden" name="hidden_nama" value="<?php echo $row["nama_barang"]; ?>" />

                            <input type="hidden" name="hidden_satuan" value="<?php echo $row["satuan"]; ?>" />

                            <input type="hidden" name="hidden_harga" value="<?php echo $row["harga_barang"]; ?>" />

                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                        </div>
                    </form>
                </div>
            </div>  
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>Nama Bahan</th>
                        <th>Satuan</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_nama"]; ?></td>
                        <td><?php echo $values["item_satuan"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rp <?php echo $values["item_harga"]; ?></td>
						<td>RP <?php echo number_format($values["item_quantity"] * $values["item_harga"], 2);?></td>
						<td><a href="reseptes.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_harga"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td>Rp <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	</body>
</html>
