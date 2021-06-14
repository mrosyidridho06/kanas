<?php
//update.php
$connect = mysqli_connect("localhost", "root", "", "kanas");
if(!empty($_POST))
{
 $output = '';
    $name = mysqli_real_escape_string($connect, $_POST["nama_supplier"]);  
    $alamat = mysqli_real_escape_string($connect, $_POST["alamat_supplier"]);  
    $hp = mysqli_real_escape_string($connect, $_POST["hp_supplier"]);  
    $query = "
    UPDATE tb_supplier set nama_supplier = '$name', alamat_supplier = '$alamat', hp_supplier ='$hp' where id_supplier = '$_POST[id]'
    ";
     
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Diupdate</label>';
     $select_query = "SELECT * FROM tb_supplier ORDER BY id_supplier DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="55%">Nama Karyawan</th>  
                         <th width="15%">Lihat</th>  
                         <th width="15%">Edit</th>  
                         <th width="15%">Hapus</th>  
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["nama"] . '</td>  
                         <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                         <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-warning btn-xs edit_data" /></td>   
                         <td><input type="button" name="delete" value="Hapus" id="' . $row["id"] . '" class="btn btn-danger btn-xs hapus_data" /></td>
                      
                    </tr>
      ';
     }
     $output .= '</table>';
    }else{
        $output .= mysqli_error($connect);
    }
    echo $output;
}
?>