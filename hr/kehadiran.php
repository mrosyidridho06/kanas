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
            <div class="card shadow mb-4">
                <div class="card-header py-3">Kehadiran Pegawai</div>
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
</html>