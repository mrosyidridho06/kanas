<?php 
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Supplier</title>
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <!-- <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/Navigation-Clean.css"> -->
</head>
<body>
   <?php include('../sidebar.php')?>
    <!-- <section class="cntact-clean" style="background: var(--light);"> -->
            <h3 class="text-center">Data Supplier</h3>
        <main id="supplier-table">
        <div class="container">
        <div align="right">
        <div class="pb-3">
            <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Tambah Data Supplier</button>
        </div>
    </div>
        <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>No. Hp</th>
            <th>Lihat Detail</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
            <?php
                require_once "../config.php";
                    // Tampilkan semua data
                    $q = $conn->query("SELECT * FROM tb_supplier");

                    $no = 1; // nomor urut
                    while($row = mysqli_fetch_assoc($q)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?php echo $row["nama_supplier"]; ?></td>
                <td><?php echo $row["alamat_supplier"]; ?></td>
                <td><?php echo $row["hp_supplier"]; ?></td>
                <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id_supplier"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id_supplier"]; ?>" class="btn btn-success btn-xs edit_data" /></td> 
                <td><input type="button" name="delete" value="Hapus" id="<?php echo $row["id_supplier"]; ?>" class="btn btn-danger btn-xs hapus_data" /></td>
            </tr>
            <?php
            }
        ?>
        </table>            
        </div>
        </main>
    <!-- </section> -->
    <footer class="footer-basic text-center">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>
    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Input Data Dengan Menggunakan Modal Bootstrap</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form">
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" />
        <br />
        <label>Alamat Supplier</label>
        <textarea name="alamat_supplier" id="alamat_supplier" class="form-control"></textarea>
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
    
    <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Detail Data Supplier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body" id="detail_karyawan">
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    
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
  
  else 
  {  
   $.ajax({  
    url:"aksi.php",  
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
//END Aksi Insert
 
//Begin Tampil Detail Karyawan
 $(document).on('click', '.view_data', function(){
  var supplier_id = $(this).attr("id_supplier");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{supplier_id:supplier_id},
   success:function(data){
    $('#detail_supplier').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
//End Tampil Detail Karyawan
  
//Begin Tampil Form Edit
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
//End Tampil Form Edit
 
//Begin Aksi Delete Data
 $(document).on('click', '.hapus_data', function(){
  var id_supplier = $(this).attr("id");
  $.ajax({
   url:"delete.php",
   method:"POST",
   data:{id_supplier:id_supplier},
   success:function(data){
   $('#supplier-table').html(data);  
   }
  });
 });
}); 
//End Aksi Delete Data
 </script>
</html>