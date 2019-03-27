<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';


// DB table to use
$table = 'search_label';
 
// Table's primary key
$primaryKey = 'Tb_index';



$columns = array(
	array( 'db' => 'lb_name', 'dt' => 0 ),
    array(
        'db'        => 'Tb_index',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {

            return '            

								<a href="admin.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '"
								   onclick="if (!confirm(\'確定要刪除 [' . $d . '] ?\')) {return false;}">
								<button type="button" class="btn btn-rounded btn-warning btn-sm">
								<i class="fa fa-trash" aria-hidden="true"></i>
								刪除</button>
								</a>';
        }
    )
);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;


echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns)
);

?>