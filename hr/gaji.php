<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji Pegawai</title>
</head>
<body>
    <?php include "../sidebar.php"?>
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bahan Baku</h1>
            <div align="right" class="pt-1">
                <a href="" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Bahan</i></button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover display" id="tb_gaji">
                    <thead>
                        <tr>
                            <!-- <th>No.</th> -->
                            <th scope="row">Nama</th>
                            <th scope="row">Tanggal Priode</th>
                            <th scope="row">Jumlah Kehadiran</th>
                            <th scope="row">BPJS</th>
                            <th scope="row">Bonus</th>
                            <th scope="row">Lembur</th>
                            <th scope="row">Gaji Pokok</th>
                            <th scope="row">Total Gaji</th>
                            <th colspan="2" class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Kana's Kitchen © 2021</p>
    </footer>
</body>

<!-- Modals Tambah data -->
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Input Gaji</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form" action="proses.php">
        <label>Nama Karyawan</label>
        <select class="form-control" name="nama_karyawan" id="gaji" required>
            <option value="" selected="">Pilih Karyawan</option>
            <?php
            $sql_kar = mysqli_query($conn, "SELECT * FROM master_gaji INNER JOIN tb_pegawai ON master_gaji.id_pegawai = tb_pegawai.id_pegawai") or die (mysqli_error($conn));
            while($data_kar = mysqli_fetch_array($sql_kar)){
                echo '<option value="'.$data_kar['id_gaji'].'">'.$data_kar['nama_pegawai'].'</option>';
            } ?>
        </select>
        <br />
        <label>Tanggal</label>
        <input type="date" name="tanggal_priode" class="form-control"></input>
        <br>
        <!-- <label>BPJS</label>
            <?php
                $sql_kar = mysqli_query($conn, "SELECT * FROM master_gaji") or die (mysqli_error($conn));
                while($data_kar = mysqli_fetch_array($sql_kar)){
                    echo '<option value="'.$data_kar['id_gaji'].'">'.$data_kar['masuk'].'</option>';
            } ?> -->
        <label > Jumlah Hari</label>
        <input type="number" name="jumlah_hari" class="form-control" id="jmlh_hari" readonly></input>
        <br>
        <label>BPJS</label>
        <input type="number" name="tun_bpjs" class="form-control"></input>
        <br>
        <label>Bonus</label>
        <input type="number" name="bonus" class="form-control"></input>
        <br>
        <label>lembur</label>
        <input type="number" name="jumlah_lembur" id="lembur" class="form-control" readonly></input>
        <br>
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    <!-- Modals Edit -->
    <div id="editModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Data Supplier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body" id="form_edit">
        <form class="shadow" action="update.php" method="post">
            <label>Nama Barang</label>
            <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><input type="hidden" name="id_bahan" value="<?php echo $bahan['id_bahan']; ?>"><input class="form-control" type="text" name="nama_barang" value="<?php echo $bahan['nama_barang']; ?>"></div>
            <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Supplier</label><input class="form-control" type="text" name="nama_supplier" value="<?php echo $bahan['nama_supplier']; ?>" disabled></div>
            <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Jumlah Barang</label><input class="form-control" type="text" name="jumlah_barang" value="<?php echo $bahan['jumlah_barang']; ?>"></div>
            <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label for="satuan">Satuan</label><?php $satuan = $bahan['satuan']; ?><select class="form-control" name="satuan">
                    <option <?php echo ($satuan == 'Gram') ? "selected": "" ?>>Gram</option>
                    <option <?php echo ($satuan == 'Pcs') ? "selected": "" ?>>Pcs</option>
                    <option <?php echo ($satuan == 'mL') ? "selected": "" ?>>mL</option>
            </select></div>
            <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;"><label>Harga</label><input class="form-control" type="text" name="harga_barang" value="<?php echo $bahan['harga_barang']; ?>"></div>
            <div class="form-group" style="text-align: right;"><input class="btn btn-primary" name="save" value="save" type="submit"></input></div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?=base_url()?>/assets/DataTables/jQuery-3.3.1/jQuery-3.3.1.js"></script> -->
    <!-- <script src="<?=base_url()?>/assets/DataTables/dataTables.min.js"></script> -->
    <script src="<?=base_url()?>/assets/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
	$('#gaji').change(function () {
		var gaji = { gaji: $('#gaji').val()};
		var url = 'data_gaji.php';
		$.post(url, gaji, function(data) {
			var result = JSON.parse(data);
			if (gaji != '') {
				$('#jmlh_hari').val(result.masuk);
                $('#lembur').val(result.lembur);
			} else {
				$('#jmlh_hari').val('');
                $('#lembur').val('');
			}
		});
	});
	</script>

    <script>
        $(document).ready(function() {
            $('#tb_gaji').DataTable( {
                "processing": false,
                "serverSide": true,
                "rowId": 'id',
                "ajax": "get_gaji.php",
                // dom: 'Bftrip',
                // button: [
                //     {
                //         extend :'pdf',
                //         oriented :'potrait',
                //         pageSize : 'Legal',
                //         title : 'Daftar Bahan',
                //         download : 'open'
                //     },
                //     'csv', 'excel', 'print', 'copy'
                // ],
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : 8,
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\"><span class=\"fa fa-edit\"></span></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"pl-4\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>
</body>
</html>