<?php 
include_once "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php if ($_SESSION['role'] == 'pemilik') { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>
<body>
<?php include "../sidebar.php"?>
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List User</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover display" id="example">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "rowId": 'id',
            "ajax": "list_user.php",
            columnDefs : [
                {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 3,
                    "render" : function(data, type, row) {
                        var btn = "<center><a href=\"edit.php?id="+data+"\"><span class=\"fa fa-edit\"></span></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"pl-2\"><i class=\"fa fa-trash\"></i></a></center>";
                        return btn;
                    }
                }

            ]
        } );
    } );
</script>
</html>
<?php }else { ?>
    <script>window.location="../dashboard.php"</script>
<?php } ?>
<?php }else{
	header("Location: ../index.php");
} ?>