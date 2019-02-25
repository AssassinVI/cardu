<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';


// DB table to use
$table = 'bank_info';
 
// Table's primary key
$primaryKey = 'Tb_index';



$columns = array(
	array( 'db' => 'bi_code', 'dt' => 0 ),
    array( 'db' => 'bi_shortname', 'dt' => 1 ),
    array( 
    	'db' => 'bi_logo',  
    	'dt' => 2, 
    	'formatter'=>function( $d, $row ){
    		return '<img style="width: 50px;" src="../../img/'.$d.'">';
    	}
    ),
    array( 'db' => 'bi_tel',  'dt' => 3 ),
    array( 'db' => 'bi_tel_card',  'dt' => 4 ),
    array( 
    	'db' => 'bi_addr',  
    	'dt' => 5,
    	'formatter'=>function( $d, $row ){
    		$bi_addr=explode(',', $d);
    		return $bi_addr[0].$bi_addr[1];
    	}
    ),
    array( 
    	'db' => 'OnLineOrNot',  
    	'dt' => 6,
    	'formatter'=>function( $d, $row ){
    		$OnLineOrNot= $d=='0' ? '下線':'上線';
    		return $OnLineOrNot;
    	}
    ),
    array(
        'db'        => 'Tb_index',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {

            return '            <a href="manager.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
								<button type="button" class="btn btn-rounded btn-info btn-sm">
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯</button>
								</a>

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