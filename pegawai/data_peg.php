<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'tb_pegawai';
 
// Table's primary key
$primaryKey = 'id_pegawai';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'nama_pegawai', 'dt' => 0 ),
    array( 'db' => 'alamat_pegawai',  'dt' => 1 ),
    array( 'db' => 'jenis_kelamin',   'dt' => 2 ),
    array( 'db' => 'hp_pegawai',     'dt' => 3 ),
    array( 'db' => 'agama',     'dt' => 4 ),
    array( 'db' => 'jabatan_pegawai',     'dt' => 5 ),
    array( 'db' => 'tanggal_masuk',     'dt' => 6 ),
    array( 
        'db' => 'foto',
        'dt' => 7,
        'formatter' => function( $row, $d ) {
            return "<img class='zoom' src='img/'<?php echo' style='height:50px;width:50px;align:middle;'/>";
        }),      
    array( 'db' => 'id_pegawai',     'dt' => 8 ),
    // array(
    //     'db'        => 'start_date',
    //     'dt'        => 4,
    //     'formatter' => function( $d, $row ) {
    //         return date( 'jS M y', strtotime($d));
    //     }
    // ),
    // array(
    //     'db'        => 'salary',
    //     'dt'        => 5,
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);
 
// SQL server connection information
include_once "../conn.php";
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);