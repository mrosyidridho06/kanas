<?php
include "../config.php";
$bahan_id = $_GET['id_bahan'];
$modal=mysqli_query($conn,"SELECT * FROM tb_bahan WHERE id_bahan='$bahan_id'");
while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
        <h5 class="modal-title">Edit Data Using Modal Boostrap (popup)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
         <form id="form-update" action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="Modal Name">Nama Barang</label>
                    <input type="hidden" name="id_bahan" id="edit-id"  class="form-control" value="<?php echo $r['id_bahan']; ?>" />
                    <input type="text" name="nama_barang" id="edit-name" class="form-control" value="<?php echo $r['nama_barang']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Description">Supplier</label>
                    <textarea name="supplier" id="edit-supplier" class="form-control"><?php echo $r['supplier']; ?></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Description">Jumlah</label>
                    <textarea name="jumlah_barang" id="edit-jumlah_barang" class="form-control"><?php echo $r['jumlah_barang']; ?></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Description">Satuan</label>
                    <textarea name="satuan" id="edit-satuan" class="form-control"><?php echo $r['satuan']; ?></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Description">Harga</label>
                    <textarea name="harga_barang" id="edit-harga_barang" class="form-control"><?php echo $r['harga_barang']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Date">Waktu</label>       
                    <input type="text" name="waktu"  class="form-control" value="<?php echo $r['waktu']; ?>" disabled/>
                </div>

             <div class="modal-footer">
                 <button class="btn btn-success" type="submit">
                     Update
                 </button>

                 <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                  Cancel
                 </button>
             </div>

             </form>

             <?php } ?>

            </div>
        </div>
    </div>