<?php 
require_once "../config.php"; 
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'pemilik'){?>
    
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
    <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From Date</label>
                                            <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>To Date</label>
                                            <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Click to Filter</label> <br>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table table-borderd">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Masuk</th>
                                        <th>Izin</th>
                                        <th>Lembur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php 
                                require_once('../config.php');
                                    // $con = mysqli_connect("localhost","root","","nodemcu_test1");

                                    if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                    {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $no=1;

                                        $query = "SELECT * FROM tb_kehadiran INNER JOIN tb_pegawai ON tb_kehadiran.id_pegawai = tb_pegawai.id_pegawai WHERE tanggal BETWEEN '$from_date' AND '$to_date' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['nama_pegawai']; ?></td>
                                                    <td><?= $row['jabatan_pegawai']; ?></td>
                                                    <td><?= $row['masuk']; ?></td>
                                                    <td><?= $row['izin']; ?></td>
                                                    <td><?= $row['lembur']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
<!-- Modals Tambah data -->
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Input Kehadiran</h4>
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
        <label>lembur</label>
        <input type="number" name="jumlah_lembur" id="lembur" class="form-control"></input>
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
    <?php }else { ?>
        <script>window.location="../dashboard.php"</script>
        <?php } ?>
</html>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?=base_url()?>/assets/DataTables/jQuery-3.3.1/jQuery-3.3.1.js"></script> -->
    <!-- <script src="<?=base_url()?>/assets/DataTables/dataTables.min.js"></script> -->
    <script src="<?=base_url()?>/assets/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php }else{
    header("Location: ../index.php");
} ?>