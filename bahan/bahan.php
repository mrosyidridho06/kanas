<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.24/css/jquery.dataTables.css"> -->
    <!-- <link rel="stylesheet" href="../assets/DataTables/Button-1.7.0/css/buttons.bootstrap4.min.css"> -->
    <!-- <link rel="stylesheet" href="../assets/DataTables/dataTables.css"> -->

</head>
<body>
<?php include('../sidebar.php')?>
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
                    <table class="table table-hover display" id="bahan_b">
                    <thead>
                        <tr>
                            <!-- <th>No.</th> -->
                            <th scope="row">Nama</th>
                            <th scope="row">Supplier</th>
                            <th scope="row">Jumlah</th>
                            <th scope="row">Satuan</th>
                            <th scope="row">Harga</th>
                            <th scope="row">Tanggal Input</th>
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
        <h4 class="modal-title">Input Bahan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form" action="proses.php">
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
        <select class="form-control" name="satuan" required>
            <option value="" selected="">Pilih Satuan</option>
            <option value="Gram">Gram</option>
            <option value="Pcs">Pcs</option>
            <option value="mL">mL</option>
        </select>
        <br />
        <label>Harga</label>
        <input type="number" name="harga_barang" id="harga_barang" class="form-control" />
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
    <!-- <script src="<?=base_url()?>/assets/DataTables/dataTables.min.js"></script>
    <script src="<?=base_url()?>/assets/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#bahan_b').DataTable( {
                "processing": false,
                "serverSide": true,
                "rowId": 'id',
                "ajax": "bahan_list.php",
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
                        "targets" : 6,
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\"><span class=\"fa fa-edit\"></span></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"pl-4\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>

    <script>
    $('#update_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#enama').val() == "")  
        {  
        alert("Mohon Isi Nama ");  
        }  
        else if($('#ealamat').val() == '')  
        {  
        alert("Mohon Isi Alamat");  
        }  
        
        else 
        {  
        $.ajax({  
            url:"update.php",  
            method:"POST",  
            data:$('#update_form').serialize(),  
            beforeSend:function(){  
            $('#update').val("Updating");  
            },  
            success:function(data){  
            $('#update_form')[0].reset();  
            $('#editModal').modal('hide');  
            $('#employee_table').html(data);  
            }  
        });  
        }  
        });
</script>
    <?php 
    if(isset($_POST["id"]))
    {
    $output = '';
    require_once "../config.php";
    $query = "SELECT * FROM tb_supplier WHERE id = '".$_POST["supplier_id"]."'";
    $result = mysqli_query($conn, $query);
    }
    ?>

    <?php if(@$_SESSION['sukses']){ ?>
        <script>
            swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>

    <?php if(@$_SESSION['hapus']){ ?>
        <script>
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            }
        })
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['hapus']); } ?>
</html>