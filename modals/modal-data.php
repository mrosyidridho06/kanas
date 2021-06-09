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