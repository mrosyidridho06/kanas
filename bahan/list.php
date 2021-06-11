<?php include_once('navbar.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\DataTables\DataTables-1.10.24\css\dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container p-5">
<h2 class="text-center">Daftar Bahan</h2>
<table id="example" class="display table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Supplier</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
    </table>
    </div>
    <footer class="footer-basic" style="background: var(--light);">
        <p class="copyright">Company Name © 2021</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "rowId": 'id',
                "ajax": "bahan_list.php",
                dom: 'Bftrip',
                button: [
                    {
                        extend :'pdf',
                        oriented :'potrait',
                        pageSize : 'Legal',
                        title : 'Daftar Bahan',
                        download : 'open'
                    },
                    'csv', 'excel', 'print', 'copy'
                ],
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : 6,
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\"class=\"btn btn-warning btn-xs\"><i class=\"fa fa-pencil\"></i></a><a href=\"delete.php?id="+data+"\" onclick=\"return confirm('Yakin Mau dihapus')\"class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></a></center>";
                            return btn;
                        }
                    }

                ]
            } );
        } );
    </script>
</html>