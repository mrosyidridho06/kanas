<?php 
require_once "../config.php"; 
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'admin') {?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pegawai</title>
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="../assets/DataTables/Button-1.7.0/css/buttons.bootstrap4.min.css"> -->
    <!-- <script src="../assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script> -->
    <!-- <script src="../assets/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script> -->
    <!-- <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Navigation-Clean.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->


</head>

<body>
   <?php include_once '../sidebar.php'?>
        <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pegawai</h1>
            <div align="right" class="pt-1">
                <a href="" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Pegawai</i></button>
            </div>
        </div>
            <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!-- <th>No. </th> -->
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No. Hp</th>
                                        <th>Agama</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Input Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
    <form action="aksi.php" id="insert_form" method="post" enctype="multipart/form-data">
                    <label>Nama</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama"  required>
                    </div>
                    <label>Alamat</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="alamat_pegawai" placeholder="Alamat"  required>
                    </div>
                    <label>Jenis Kelamin</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <select class="form-control" name="jenis_kelamin" required>
                            <option  value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <label>Nomor Telpon</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="hp_pegawai" placeholder="No. Hp" required>
                    </div>
                    <label>Agama</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="agama" placeholder="Agama" required>
                    </div>
                    <label>Jabatan</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="text" name="jabatan_pegawai" placeholder="Jabatan" required>
                    </div>
                    <label>Tanggal Masuk</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="date" name="tanggal_masuk" required>
                    </div>
                    <label>Gambar</label>
                    <div class="form-group" style="margin: 1px;padding: 0px;padding-bottom: 6px;">
                        <input class="form-control" type="file" name="file_foto" required>
                    </div>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
            </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
    <?php }else { ?>
        <script>window.location="../dashboard.php"</script>
        <?php } ?>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="<?=base_url()?>/assets/DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script> -->
    <script src="../assets/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "rowId": 'id',
                "ajax": "data_peg.php",
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
                            var btn = "<center><a href=\"edit.php\" id='editModal' data-toggle='modal' data-target='#editModal'><span class=\"fa fa-edit\"></span></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>
</html>
    <?php if(@$_SESSION['sukses']){ ?>
        <script>
            swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>

    

<?php }else{
    header("Location: dashboard.php");
} ?>