<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';


// DB table to use
$table = 'service_question_manage';
 
// Table's primary key
$primaryKey = 'sqm_pk';



$columns = array(
	array( 
      'db' => 'sqm_type', 
      'dt' => 'sqm_type' ,
      'formatter'=>function( $d, $row ){
            
            $sqm_type_arr[0]='聯絡我們';
            $sqm_type_arr[2]='錯誤回報';
            $sqm_type_arr[11]='聯絡我們';
            $sqm_type_arr[12]='行銷合作';
            $sqm_type_arr[13]='廣告刊登';

            return $sqm_type_arr[$d];
        }
    ),
    array( 
        'db' => 'sqm_pk', 
        'dt' => 'sqm_ch_name' ,
        'formatter'=>function( $d, $row ){
              
              $row=pdo_select("SELECT sqm_type, sqm_type_name FROM service_question_manage WHERE sqm_pk=:sqm_pk", ['sqm_pk'=>$d]);

              if ($row['sqm_type']=='2') {
                return $row['sqm_type_name'];
              }
              else{
                $sqm_ch_arr[11]='聯絡我們';
                $sqm_ch_arr[12]='行銷合作';
                $sqm_ch_arr[13]='廣告刊登';
                return $sqm_ch_arr[$row['sqm_type']];
              }
          }
      ),
    array('db'=>'sqm_title', 'dt'=>'sqm_title'),
    array('db'=>'sqm_pdate', 'dt'=>'sqm_pdate'),
    array('db'=>'sqm_status', 'dt'=>'sqm_status', 'formatter'=>function( $d, $row ){
      
      $sqm_status_arr=['未處理', '已處理', '免處理'];
      return $sqm_status_arr[$d];
    }),
    array('db'=>'sqm_rkiman', 'dt'=>'sqm_rkiman'),
    array('db'=>'sqm_rdate', 'dt'=>'sqm_rdate'),
    array('db'=>'sqm_pk', 'dt'=>'sqm_reply', 'formatter'=>function( $d, $row ){
      return '<a data-fancybox data-type="iframe" href="service_replay.php?sqm_pk='.$d.'">回覆</a>';
    }),
    array('db'=>'sqm_pk', 'dt'=>'sqm_review', 'formatter'=>function( $d, $row ){
      return '<a href="javascript:;" onclick="window.open(\'service_review.php?sqm_pk='.$d.'\', \'預覽\', config=\'height=800,width=900\');"><i class="fa fa-binoculars" aria-hidden="true"></i>預覽</a>';
    })
);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;



echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns)
);

?>