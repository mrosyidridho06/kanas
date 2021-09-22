<?php 
require_once "../config.php"; 
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] === 'pemilik') {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji Pegawai</title>
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/DataTables/Button-1.7.0/css/buttons.bootstrap4.min.css">
    <script src="../assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php include "../sidebar.php"?>
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penggajian</h1>
            <div align="right" class="pt-1">
                <a href="" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Gaji</i></button>
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
                            <th scope="row">Tanggal Pembayaran</th>
                            <th scope="row">Jumlah Kehadiran</th>
                            <th scope="row">BPJS</th>
                            <th scope="row">Bonus</th>
                            <th scope="row">Lembur</th>
                            <th scope="row">Gaji Harian</th>
                            <th scope="row">Potongan</th>
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
        <form method="post" id="insert_form" action="proses_gaji.php">
        <label>Nama Karyawan</label>
        <select class="form-control" name="nama_karyawan" id="gaji" required>
            <option value="" selected="">Pilih Karyawan</option>
            <?php
            $sql_kar = mysqli_query($conn, "SELECT * FROM tb_kehadiran INNER JOIN tb_pegawai ON tb_kehadiran.id_pegawai = tb_pegawai.id_pegawai") or die (mysqli_error($conn));
            while($data_kar = mysqli_fetch_array($sql_kar)){
                echo '<option value="'.$data_kar['id_kehadiran'].'">'.$data_kar['nama_pegawai'].'</option>';
            } ?>
        </select>
        <br />
        <label>Tanggal Pembayaran</label>
        <input type="date" name="tanggal_priode" class="form-control"></input>
        <br>
        <!-- <label>BPJS</label>
            <?php
                $sql_kar = mysqli_query($conn, "SELECT * FROM tb_kehadiran") or die (mysqli_error($conn));
                while($data_kar = mysqli_fetch_array($sql_kar)){
                    echo '<option value="'.$data_kar['id_kehadiran'].'">'.$data_kar['masuk'].'</option>';
            } ?> -->
        <label>Jumlah Hari</label>
        <input type="number" name="jumlah_hari" class="form-control" id="jmlh_hari" readonly></input>
        <br>
        <label>Gaji Harian</label>
        <input type="number" name="gaji_harian" class="form-control"></input>
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
        <label>Upah lembur</label>
        <input type="number" name="uang_lembur" id="uang_lembur" class="form-control"></input>
        <br>
        <label>Potongan</label>
        <input type="number" name="potongan" class="form-control"></input>
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
                "rowId": 'id_penggajian',
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
                        "targets" : 9,
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"gaji_print.php?id="+data+"\"target='_blank'\"><span class=\"fa fa-print\"></span></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"pl-4\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>
</body>
    <?php }else { ?>
        <script>window.location="../dashboard.php"</script>
    <?php } ?>
</html>
<?php }else{
    header("Location: ../dashboard.php");
} ?>