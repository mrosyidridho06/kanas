<?php require_once "../config.php"; ?>
<table border="1">
  <thead>
   <tr>
    <th>No</th>
    <th>Nama Pegawai</th>
    <th>Alamat Pegawai</th>
    <th>Jenis Kelamin</th>
    <th>No. HP</th>
    <th>Agama</th>
    <th>Jabatan</th>
    <th>Tanggal join</th>
    <th>Gambar</th>
   </tr>
  </thead>
  <tbody>
   <?php
    $no=1;
    $sql=mysql_query("SELECT * FROM tb_pegawai order by id_pegawai desc");
    while ($data = mysql_fetch_array($sql)) {
   ?>
    <tr>
     <td><?=$no++?></td>
     <td><?=$data['nama_pegawai']?></td>
     <td><?=$data['alamat_pegawai']?></td>
     <td><?=$data['jenis_kelamin']?></td>
     <td><?=$data['hp_pegawai']?></td>
     <td><?=$data['agama']?></td>
     <td><?=$data['jabatan_pegawai']?></td>
     <td><?=$data['tanggal_masuk']?></td>
     <td><img src="data:img/jpeg;base64,<?=base64_encode($data['file_gambar'] )?>" width="100"></td>
    </tr>
   <?php
    }
   ?>
  </tbody>
 </table>