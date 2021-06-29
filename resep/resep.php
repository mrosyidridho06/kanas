<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resep</title>
</head>

<body>
    <?php require('../sidebar.php')?>
   <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            Resep
            </div>
            <div class="card-body">
                <form action="post" action="">
                <label>Nama Resep</label><div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input class="form-control" type="text" name="nama_resep" placeholder="Nama Resep"></div>
                    <select class="form-control" name="supplier" required>
                        <option value="" selected="">Pilih Bahan</option>
                        <?php
                        $sql_supp = mysqli_query($conn, "SELECT * FROM tb_bahan") or die (mysqli_error($conn));
                        while($data_supp = mysqli_fetch_array($sql_supp)){
                            echo '<option value="'.$data_supp['id_bahan'].'">'.$data_supp['nama_barang'].','.$data_supp['harga_barang'].'</option>';
                        } ?>
                    </select>
                    <div class="pt-4">
                        <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <?php
                    include_once "../config.php";
                        // Tampilkan semua data
                        $q = $conn->query("SELECT * FROM tb_bahan INNER JOIN tb_supplier ON tb_bahan.id_supplier = tb_supplier.id_supplier");

                        $no = 1; // nomor urut
                        while($dt = mysqli_fetch_assoc($q)){
                        ?>
                        <tr>  
                            <td><?= $no++?>.</td>
                            <td><?= $dt['nama_barang'] ?></td>
                            <td><?= $dt['satuan'] ?></td>
                            <td><?= $dt['harga_barang'] ?></td>

                            <td><a href="edit.php?id=<?=$dt['id_bahan']?>" title="Edit" data-toggle="tooltip"><span class="fa fa-edit"></span></a></td>
                            <td><a href="delete.php?id=<?= $dt['id_bahan'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" title="Hapus" data-toggle="tooltip"><span class="fa fa-trash"></span></a></td>
                        </tr>
                        <?php
                    }
                ?> 
   </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Kana's Kitchen © 2021</p>
    </footer>
</body>

</html>