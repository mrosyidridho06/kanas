<!doctype html>
<html lang="en">
<head>
<title>CRUD PHP MySQLi Modal Bootstrap</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container mt-5 mb-5">
  <h2>CRUD PHP MySQLi Modal Bootstrap</h2>
  <p>CRUD PHP MySQLi Modal Bootstrap</p>
  <p class="text-right"><a href="javascript.void(0)" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a> <a href="datatable.php" class="btn btn-info" >Datatable</a></p>      

<table id="mytable" class="table table-bordered">
    <thead>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Supplier</th>
      <th>Jumlah</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Tanggal Masuk</th>
      <th>Action</th>
    </thead>
 <tbody id="modal-data">
<?php 
  //menampilkan data mysqli
  include "../config.php";
  $no = 0;
  $modal=mysqli_query($conn,"SELECT * FROM tb_bahan ORDER BY id_bahan DESC");
  while($r=mysqli_fetch_array($modal)){
  $no++;
       
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['nama_barang']; ?></td>
      <td><?php echo  $r['supplier']; ?></td>
      <td><?php echo  $r['jumlah_barang']; ?></td>
      <td><?php echo  $r['satuan']; ?></td>
      <td><?php echo  $r['harga_barang']; ?></td>
      <td><?php echo  $r['waktu']; ?></td>
      <td>
         <a href="javascript:void(0)" class='open_modal' id='<?php echo  $r['id_bahan']; ?>'>Edit</a>
         <a href="javascript:void(0)" class="delete_modal" data-id='<?php echo  $r['id_bahan']; ?>'>Delete</a>
      </td>
  </tr>
 

<?php } ?>
</tbody>
</table>
</div>

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

       <div class="modal-header">
        <h5 class="modal-title">Add Data Using Modal Boostrap (popup)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <form id="form-save" action="proses-save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
          <div class="form-group" style="padding-bottom: 5px;">
                 <label for="nama_barang">Nama Barang</label>
                    <input type="hidden" name="id_bahan" id="id_bahan"  class="form-control"/>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                </div>

                <div class="form-group" style="padding-bottom: 5px;">
                    <label for="Description">Supplier</label>
                    <input name="supplier" id="supplier" class="form-control"></input>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                    <label for="Description">Jumlah</label>
                    <input name="jumlah_barang" id="jumlah_barang" class="form-control"></input>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                    <label>Satuan</label>
                        <select class="form-control" name="satuan" id="satuan">
                            <option value="Gram" selected="">Gram</option>
                            <option value="Pcs">Pcs</option>
                            <option value="mL">mL</option>
                        </select>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                    <label for="Description">Harga</label>
                    <input name="harga_barang" id="harga_barang" class="form-control"></input>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Save
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
   
   <div class="modal-header">
        <h5 class="modal-title">Are you sure to delete this data ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <button type="button"class="btn btn-danger" id="delete_link">Delete</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
 $(document).ready(function () {
   $(".open_modal").click(function(e) {
       var m = $(this).attr("id_bahan");
     $.ajax({
       url: "../modals/modal-edit.php",
       type: "GET",
       data : {id_bahan: m,},
       success: function (ajaxData){
       $("#ModalEdit").html(ajaxData);
       $("#ModalEdit").modal('show',{backdrop: 'true'});
      }
   });
        });
    });
</script>


<!-- Ajax untuk menyimpan data--> 
<script type="text/javascript">
    $("#form-save").on('submit', function(e){
  e.preventDefault();
  $.ajax({
   method:  $(this).attr("method"), // untuk mendapatkan attribut method pada form
   url: $(this).attr("action"),  // untuk mendapatkan attribut action pada form
   data: { 
    id_bahan: $('#id_bahan').val(),
    nama_barang: $('#nama_barang').val(),
    supplier: $('#supplier').val(),
    jumlah_barang: $('#jumlah_barang').val(),
    harga_barang: $('#harga_barang').val(),
   },
   success:function(response){
    console.log(response);
    $("#modal-data").empty();
    $("#modal-data").html(response.data);
    $("#ModalAdd").modal('hide');
    $('#name').val('');
    $('#supplier').val('');
    $('#jumlah_barang').val('');
    $('#harga_barang').val('');
   },
   error: function(e)
   {
    // Error function here
   },
   beforeSend:function(b){
    // Before function here
   }
  })
  .done(function(d) {
   // When ajax finished
  });
 });
</script>

<!-- Ajax untuk update data--> 
<script type="text/javascript">
    $('body').on('submit','#form-update', function(e){
  e.preventDefault();
  $.ajax({
   method:  $(this).attr("method"), // untuk mendapatkan attribut method pada form
   url: $(this).attr("action"),  // untuk mendapatkan attribut action pada form
   data: { 
    id_bahan: $('#id_bahan').val(),
    nama_barang: $('#nama_barang').val(),
    supplier: $('#supplier').val(),
    jumlah_barang: $('#jumlah_barang').val(),
    harga_barang: $('#harga_barang').val(),
   },
   success:function(response){
    console.log(response);
    $("#modal-data").empty();
    $("#modal-data").html(response.data);
    $("#ModalEdit").modal('hide');
   },
   error: function(e)
   {
    // Error function here
   },
   beforeSend:function(b){
    // Before function here
   }
  })
  .done(function(d) {
   // When ajax finished
  });
 });
</script>

<!-- Ajax untuk delete data--> 
<script type="text/javascript">
    $('body').on('click','.delete_modal', function(e){
  let modal_id = $(this).data('id_bahan');
  $('#modal_delete').modal('show', {backdrop: 'static'});
  $("#delete_link").on("click", function(){
   e.preventDefault();
   $.ajax({
    method:  'POST', // untuk mendapatkan attribut method pada form
    url: '../modals/proses-delete.php',  // untuk mendapatkan attribut action pada form
    data: { 
     id_bahan: id_bahan
    },
    success:function(response){
     console.log(response);
     $("#modal-data").empty();
     $("#modal-data").html(response.data);
     $("#modal_delete").modal('hide');
    },
    error: function(e)
    {
     // Error function here
    },
    beforeSend:function(b){
     // Before function here
    }
   })
   .done(function(d) {
    // When ajax finished
   });
  });
 });
</script>

</body>
</html>