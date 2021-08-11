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
// $table = "SELECT * FROM tb_bahan INNER JOIN tb_supplier ON tb_bahan.id_supplier = tb_supplier.id_supplier";
$table = 'tb_bahan';
// $table = <<<EOT
//     (
//         SELECT
//             a.id_barang,
//             a.nama_barang,
//             a.jumlah_barang,
//             a.satuan,
//             a.harga_barang,
//             a.waktu,
//             a.id_supplier,
//             b.nama_supplier
//         FROM tb_bahan a
//         LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
//     ) temp
// EOT;
 
// Table's primary key
$primaryKey = 'id_bahan';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$joinQuery = "FROM `{$table}` AS `c` INNER JOIN `tb_supplier` AS `cn` ON (`c`.`id_supplier` = `cn`.`id_supplier`)";


$columns = array(
    array( 'db' => '`c`.`nama_barang`', 'dt' => 0, 'field' => 'nama_barang' ),
    array( 'db' => '`cn`.`nama_supplier`',  'dt' => 1, 'field' => 'nama_supplier', 'as' => 'nama_supplier' ),
    array( 'db' => '`c`.`jumlah_barang`',   'dt' => 2, 'field' => 'jumlah_barang' ),
    array( 'db' => '`c`.`satuan`',     'dt' => 3, 'field' => 'satuan' ),
    array( 'db' => '`c`.`harga_barang`',     'dt' => 4, 'formatter' => function( $d, $row ) {
                    return 'Rp.' .number_format($d,0,',','.');
                }, 'field' => 'harga_barang' ),
    array( 'db' => '`c`.`waktu`',     'dt' => 5, 'field' => 'waktu' ),
    array( 'db' => '`c`.`id_bahan`',     'dt' => 6, 'field' => 'id_bahan' ),

    // array( 'db' => 'nama_barang', 'dt' => 0 ),
    // array( 'db' => 'nama_supplier',  'dt' => 1 ),
    // array( 'db' => 'jumlah_barang',   'dt' => 2),
    // array( 'db' => 'satuan',     'dt' => 3),
    // array(
    //         'db'        => 'harga_barang',
    //         'dt'        => 4,
    //         'formatter' => function( $d, $row ) {
    //             return 'Rp.'.number_format($d);
    //         }
    //     ),
    // array( 'db' => 'waktu',     'dt' => 5),
    // array( 'db' => 'id_bahan',     'dt' => 6, ),


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
// $aColumns = array('id_supplier', 'nama_supplier');
 
// SQL server connection information
include_once "../conn.php";
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../ssp.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
);