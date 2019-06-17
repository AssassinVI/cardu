<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';


// DB table to use
$table = 'user_data';
 
// Table's primary key
$primaryKey = 'ud_pk';



$columns = array(
	array( 
      'db' => 'ud_userid', 
      'dt' => 0 ,
      'formatter'=>function( $d, $row ){
            
            $row_id=pdo_select("SELECT ud_pk FROM user_data WHERE ud_userid=:ud_userid", ['ud_userid'=>$d]);
            return '<a href="../member_public/mem_detail_windows.php?ud_pk='.$row_id['ud_pk'].'" data-fancybox data-type="iframe">'.$d.'</a>';
        }
    ),
    array( 'db' => 'ud_realname', 'dt' => 1 ),
    array('db'=>'ud_nickname', 'dt'=>2),
    array('db'=>'ud_email', 'dt'=>3),
    array('db'=>'ud_mobile', 'dt'=>4),
    array('db'=>'ud_active', 'dt'=>5,
          'formatter'=>function( $d, $row ){
            $active=$d==1 ? '已確認':'<span class="text-danger">未確認</span>';
            return $active;
        }
    ),
    array('db'=>'ud_regtime', 'dt'=>6),
    array('db'=>'ud_update', 'dt'=>7),
    array('db'=>'ud_regip', 'dt'=>8),
    array('db'=>'ud_logincnt', 'dt'=>9),
    array('db'=>'ud_inviter', 'dt'=>10),
    array(
        'db'        => 'ud_pk',
        'dt'        => 11,
        'formatter' => function( $d, $row ) {
            
            $row=pdo_select("SELECT ud_active FROM user_data WHERE ud_pk=:ud_pk", ['ud_pk'=>$d]);
            if ($row['ud_active']=='1') {
              return '
                <div class="nowrap">
                <a href="../member_public/mem_password_windows.php?ud_pk='.$d.'" data-fancybox data-type="iframe">重設密碼</a>
                <a href="../member_public/mem_email_windows.php?ud_pk='.$d.'" data-fancybox data-type="iframe">修改E-mail</a>
                </div>
                ';
            }
            else{
              return '
                <div class="nowrap">
                <a href="../member_public/mem_password_windows.php?ud_pk='.$d.'" data-fancybox data-type="iframe">重設密碼</a>
                <a href="../member_public/mem_email_windows.php?ud_pk='.$d.'" data-fancybox data-type="iframe">修改E-mail</a>
                <a class="update_ud_active"  ud_pk="'.$d.'" href="javascript:;">進行確認</a>
                <a class="re_mail" ud_pk="'.$d.'" href="javascript:;">重發確認信</a>
                </div>
                ';
            }
            
        }
    )
);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;

$ud_regtime_s=empty($_POST['ud_regtime_s']) ? "" : " ud_regtime>='".$_POST['ud_regtime_s']."' AND ";
$ud_regtime_e=empty($_POST['ud_regtime_e']) ? "" : " ud_regtime<='".$_POST['ud_regtime_e']."' AND ";
$ud_update_s=empty($_POST['ud_update_s']) ? "" : " ud_update>='".$_POST['ud_update_s']."' AND ";
$ud_update_e=empty($_POST['ud_update_e']) ? "" : " ud_update<='".$_POST['ud_update_e']."' AND ";

if (!empty($_POST['keywords'])) {
   $keywords=""; 
   $keywords_arr=explode(',', $_POST['keywords']);
   foreach ($keywords_arr as $keywords_arr_one) {
      $keywords.= "(ud_userid LIKE '%".$keywords_arr_one."%' OR 
                 ud_nickname LIKE '%".$keywords_arr_one."%' OR 
                    ud_email LIKE '%".$keywords_arr_one."%' OR 
                 ud_realname LIKE '%".$keywords_arr_one."%') AND ";
   }
}
else{
   $keywords=""; 
}

$where=$ud_regtime_s.$ud_regtime_e.$ud_update_s.$ud_update_e.$keywords;
$where=substr($where, 0, -5);

echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where)
);

?>