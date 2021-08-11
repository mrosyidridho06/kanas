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
 $query = "SELECT * FROM tb_supplier WHERE id = '".$_POST["id_supplier"]."'";
 $result = mysqli_query($conn, $query);
}
?>