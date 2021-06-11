</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan</title>
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/DataTables/Button-1.7.0/css/buttons.bootstrap4.min.css">
    <script src="../assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php include('../sidebar.php')?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary text-center">Bahan Baku</h4>
                <div align="right" class="pt-1">
                    <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Bahan</i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover display" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Supplier</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Waktu</th>
                                <th align="center">Aksi</th>
                            </tr>
                        </thead>
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
        <h4 class="modal-title">Input Bahan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form">
        <label>Nama Bahan</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" />
        <br />
        <label>Supplier</label>
        <select class="form-control" name="supplier" required>
                        <option value="" selected="">Pilih Supplier</option>
                        <?php
                        $sql_supp = mysqli_query($conn, "SELECT * FROM tb_supplier") or die (mysqli_error($conn));
                        while($data_supp = mysqli_fetch_array($sql_supp)){
                            echo '<option value="'.$data_supp['id_supplier'].'">'.$data_supp['nama_supplier'].'</option>';
                        } ?>
                    </select>
                    <br/>
        <label>Jumlah Barang</label>
        <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control"></input>
        <br />  
        <label>Satuan</label>
        <select class="form-control" name="supplier" required>
            <option value="" selected="">Pilih Satuan</option>
            <option value="Gram">Gram</option>
            <option value="Pcs">Pcs</option>
            <option value="mL">mL</option>
        </select>
        <br />
        <label>Harga</label>
        <input type="text" name="harga_barang" id="harga_barang" class="form-control" />
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
                "ajax": "bahan_list.php",
                dom: 'Bftrip',
                button: [
                    {
                        extend :'pdf',
                        oriented :'potrait',
                        pageSize : 'Legal',
                        title : 'Daftar Bahan',
                        download : 'open'
                    },
                    'csv', 'excel', 'print', 'copy'
                ],
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : 3,
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\"class=\"btn btn-warning btn-xs\"><i class=\"fa fa-edit\"></i></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>
    <script>
    $(document).ready(function(){
        // Begin Aksi Insert
        $('#insert_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#nama_supplier').val() == "")  
        {  
        alert("Mohon Isi Nama ");  
        }  
        else if($('#alamat_supplier').val() == '')  
        {  
        alert("Mohon Isi Alamat");  
        }
        else if($('#hp_supplier').val() == '')  
        {  
        alert("Mohon Isi Nomor Hp");  
        }  
        
        else 
        {  
        $.ajax({  
            url:"proses.php",  
            method:"POST",  
            data:$('#insert_form').serialize(),  
            beforeSend:function(){  
            $('#insert').val("Inserting");  
            },  
            success:function(data){  
            $('#insert_form')[0].reset();  
            $('#add_data_Modal').modal('hide');  
            $('#supplier-table').html(data);  
            }  
        });  
        }  
        });
        // end add
        
        // edit
        $(document).on('click', '.edit_data', function(){
        var id_supplier = $(this).attr("id_supplier");
        $.ajax({
        url:"edit.php",
        method:"POST",
        data:{id_supplier:id_supplier},
        success:function(data){
            $('#form_edit').html(data);
            $('#editModal').modal('show');
        }
        });
        });
        // end edit
        });
 </script>
</html>