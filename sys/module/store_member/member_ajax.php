<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';


// DB table to use
$table = 'store_member';
 
// Table's primary key
$primaryKey = 'sm_pk';



$columns = array(
	array( 
      'db' => 'sm_pk', 
      'dt' => 0 ,
      'formatter'=>function( $d, $row ){
            
            $row=pdo_select("SELECT sm_user_id FROM store_member WHERE sm_pk=:sm_pk", ['sm_pk'=>$d]);
            return '<a href="../member_public/store_mem_detail_windows.php?sm_pk='.$d.'" data-fancybox data-type="iframe">'.$row['sm_user_id'].'</a>';
        }
    ),
    array( 
      'db' => 'sm_pk', 
      'dt' => 1 ,
      'formatter'=>function( $d, $row ){
        $row=pdo_select("SELECT sm_user_name, sm_user_title FROM store_member WHERE sm_pk=:sm_pk", ['sm_pk'=>$d]);
        return $row['sm_user_name'].'('.$row['sm_user_title'].')';
      }
    ),
    array('db'=>'sm_user_phone', 'dt'=>2),
    array('db'=>'sm_user_email', 'dt'=>3),
    array('db'=>'sm_company_name', 'dt'=>4),
    array('db'=>'sm_company_keyman', 'dt'=>5),
    array('db'=>'sm_company_id', 'dt'=>6),
    array(
      'db'=>'sm_status', 
      'dt'=>7,
      'formatter'=>function( $d, $row ){
        switch ($d) {
          case '0':
            return '<span class="nowrap">未確認</span>';
          break;
          case '1':
            return '<span class="nowrap">審核成功</span>';
          break;
          case '2':
            return '<span class="nowrap">審核未通過</span>';
          break;
          case '3':
            return '<span class="text-danger">未審核</span>';
          break;
        }
      }
    ),
    array('db'=>'sm_logincnt', 'dt'=>8),
    array('db'=>'sm_creattime', 'dt'=>9),
    array('db'=>'sm_loginip', 'dt'=>10),
    array(
        'db'        => 'sm_pk',
        'dt'        => 11,
        'formatter' => function( $d, $row ) {
            
            $row=pdo_select("SELECT sm_status FROM store_member WHERE sm_pk=:sm_pk", ['sm_pk'=>$d]);
            if ($row['sm_status']!='0') {
              return '
                <div class="nowrap">
                <a href="../member_public/mem_password_windows.php?ud_pk='.$d.'" data-fancybox data-type="iframe">重設密碼</a>
                </div>
                ';
            }
            else{
              return '
                <div class="nowrap">
                <a href="../member_public/mem_password_windows.php?ud_pk='.$d.'" data-fancybox data-type="iframe">重設密碼</a>
                <a class="re_mail" ud_pk="'.$d.'" href="javascript:;">重新確認</a>
                </div>
                ';
            }
            
        }
    )
);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;

$sm_creattime_s=empty($_POST['sm_creattime_s']) ? "" : " sm_creattime>='".$_POST['sm_creattime_s']."' AND ";
$sm_creattime_e=empty($_POST['sm_creattime_e']) ? "" : " sm_creattime<='".$_POST['sm_creattime_e']."' AND ";
$sm_status=" sm_status LIKE '%".$_POST['sm_status']."%' AND ";
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

$where=$ud_regtime_s.$ud_regtime_e.$sm_status.$keywords;
$where=substr($where, 0, -5);

echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where)
);

?>