<?php 
include_once "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'pemilik') { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/DataTables/Button-1.7.0/css/buttons.bootstrap4.min.css">
    <script src="../assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php include('../sidebar.php')?>
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Supplier</h1>
            <div align="right" class="pt-1">
                <a href="" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Supplier</i></button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover display" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Hp</th>
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
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>

<!-- Modals Tambah data -->
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Input Supplier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form" action="aksi.php">
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" required />
        <br />
        <label>Alamat Supplier</label>
        <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" required></textarea>
        <br />
        <br />  
        <label>Nomor Handphone</label>
        <input type="text" name="hp_supplier" id="hp_supplier" class="form-control" required />
        <br />
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
    <form method="post" id="edit_form" action="edit.php">
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" required />
        <br />
        <label>Alamat Supplier</label>
        <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" required></textarea>
        <br />
        <br />  
        <label>Nomor Handphone</label>
        <input type="text" name="hp_supplier" id="hp_supplier" class="form-control" />
        <br />
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
    <script src="<?=base_url()?>/assets/DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>/assets/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/assets/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "rowId": 'id',
                "ajax": "data_supp.php",
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
                        "targets" : 3,
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php\" id='editModal' data-toggle='modal' data-target='#editModal'><span class=\"fa fa-edit\"></span></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"pl-4\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>
    <script>
    $(document).ready(function(){
        // edit
        $(document).on('click', '.edit_data', function(){
        var id = $(this).attr("id_supplier");
        $.ajax({
        url:"edit.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            $('#form_edit').html(data);
            $('#editModal').modal('show');
        }
        });
        });
        // end edit
        });
 </script>
 <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses  -->
    <?php if(@$_SESSION['sukses']){ ?>
        <script>
            swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>
    <?php }else { ?>
        <script>window.location="../dashboard.php"</script>
        <?php } ?>
</html>
<?php }else{
	header("Location: ../index.php");
} ?>