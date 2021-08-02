<?php
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kehadiran</title>
</head>
<body>
<?php include "../sidebar.php"?>
    <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kehadiran Pegawai</h1>
            <div align="right" class="pt-1">
                <a href="" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Kehadiran</i></button>
            </div>
        </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="form-inline mb-4" action="" method="POST">
                            <label class="font-weight-bold">Dari</label>
                            <input type="date" name="dari_tanggal" class="form-control mb-2 mr-sm-2" required>
                            <br>
                            <label class="font-weight-bold">Sampai</label>
                            <input type="date" name="sampai_tanggal" class="form-control mb-2 mr-sm-2" required>
                            <input type="submit" class="btn btn-primary" name="filter" value="Filter">
                </form>
                    <!-- <form action="" method="GET" class="form-inline mb-4">
                        <div class="input-group mb-2 mr-sm-2">
                            <label class="px-2 font-weight-bold">Bulan</label>
                            <select name="bulan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <label class="px-2 font-weight-bold">Tahun</label>
                            <select name="tahun" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php 
                                $qry=mysqli_query($conn, "SELECT tanggal FROM master_gaji GROUP BY year(tanggal)");
                                while($t=mysqli_Fetch_array($qry)){
                                    $data = explode('-',$t['tanggal']);
                                    $tahun = $data[0];
                                    echo "<option value='$tahun'>$tahun</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="filter" class="btn btn-primary mb-2">Tampilkan</button>
                    </form> -->
                    <table class="table table-hover">
                        <tr>
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Masuk</th>
                                <th>Izin</th>
                                <th>Alpa</th>
                                <th>Lembur</th>
                                <th>Potongan</th>
                            </thead>
                        </tr>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM master_gaji INNER JOIN tb_pegawai ON master_gaji.id_pegawai = tb_pegawai.id_pegawai");
                        // $sql = mysqli_query($conn, "SELECT master_gaji.masuk, master_gaji.sakit, master_gaji.izin, master_gaji.alpha, master_gaji.lembur, master_gaji.potongan FROM master_gaji INNER JOIN  tb_pegawai ON master_gaji.id_pegawai=tb_pegawai.nama_pegawai WHERE master_gaji.bulan=$bulantahun ORDER BY tb_pegawai.id_pegawai ASC");
                        // var_dump ($sql);
                        $no=1;
                        if(isset($_POST['filter'])){
                            $dari_tanggal = mysqli_real_escape_string($conn, $_POST['dari_tanggal']);
                            $sampai_tanggal = mysqli_real_escape_string($conn, $_POST['sampai_tanggal']);
                            $data_hadir = mysqli_query($conn, "SELECT * FROM master_gaji INNER JOIN tb_pegawai ON master_gaji.id_pegawai = tb_pegawai.id_pegawai WHERE tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
                        }else{
                            echo "isi tanggal";
                        }
                        while($data=mysqli_fetch_array($data_hadir)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_pegawai'] ?></td>
                                <td><?= $data['jabatan_pegawai'] ?></td>
                                <td><?= $data['masuk'] ?></td>
                                <td><?= $data['izin'] ?></td>
                                <td><?= $data['alpha'] ?></td>
                                <td><?= $data['lembur'] ?></td>
                                <td><?= $data['potongan'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
    </div>
</body>
<!-- Modals Tambah data -->
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Input Gaji</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form" action="proses_kehadiran.php">
        <label>Nama Karyawan</label>
        <select class="form-control" name="nama_karyawan" id="gaji" required>
            <option value="" selected="">Pilih Karyawan</option>
            <?php
            $sql_kar = mysqli_query($conn, "SELECT * FROM tb_pegawai") or die (mysqli_error($conn));
            while($data_kar = mysqli_fetch_array($sql_kar)){
                echo '<option value="'.$data_kar['id_pegawai'].'">'.$data_kar['nama_pegawai'].'</option>';
            } ?>
        </select>
        <br />
        <label>Tanggal</label>
        <input type="date" name="tanggal_priode" class="form-control"></input>
        <br>
        <label>Masuk</label>
        <input type="number" name="masuk" class="form-control"></input>
        <br>
        <label>Izin</label>
        <input type="number" name="izin" class="form-control"></input>
        <br>
        <label>Sakit</label>
        <input type="number" name="sakit" class="form-control"></input>
        <br>
        <label>Alpha</label>
        <input type="number" name="alpa" class="form-control"></input>
        <br>
        <label>lembur</label>
        <input type="number" name="jumlah_lembur" id="lembur" class="form-control"></input>
        <br>
        <label>Potongan</label>
        <input type="number" name="potongan" id="lembur" class="form-control"></input>
        <br>
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
</html>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?=base_url()?>/assets/DataTables/jQuery-3.3.1/jQuery-3.3.1.js"></script> -->
    <!-- <script src="<?=base_url()?>/assets/DataTables/dataTables.min.js"></script> -->
    <script src="<?=base_url()?>/assets/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>