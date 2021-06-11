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
if(isset($_POST["supplier_id"]))
{
 $output = '';
 require_once "../config.php";
 $query = "SELECT * FROM tb_supplier WHERE id = '".$_POST["supplier_id"]."'";
 $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
     $output .= '
        <form method="post" id="update_form">
        <label>Nama Supplier</label>
        <input type="hidden" name="id_supplier" id="id" value="'.$_POST["id_supplier"].'" class="form-control" />
        <input type="text" name="nama_supplier" id="enama" value="'.$row['nama_supplier'].'" class="form-control" />
        <br />
        <label>Alamat Supplier</label>
        <textarea name="alamat_supplier" id="ealamat" class="form-control">'.$row['alamat_supplier'].'</textarea>
        <br /> 
        <label>Nomor Handphone</label>
        <input type="text" name="hp_supplier" id="hp" value="'.$row['hp_supplier'].'" class="form-control" />
        <br />
        <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
 
    </form>
     ';
    echo $output;
}
?>