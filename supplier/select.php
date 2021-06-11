<?php  
require_once "../config.php";
//select.php  
if(isset($_POST["supplier_id"]))
{
 $output = '';
 $query = "SELECT * FROM tb_supplier WHERE id_supplier = '".$_POST["supplier_id"]."'";
 $result = mysqli_query($conn, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Name</label></td>  
            <td width="70%">'.$row["nama_supplier"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Alamat</label></td>  
            <td width="70%">'.$row["alamat_supplier"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Gender</label></td>  
            <td width="70%">'.$row["hp_supplier"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>