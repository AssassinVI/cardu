<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require '../../core/inc/pdo_fun_calss.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';

// SELECT dce.*, cei.eq_name, cei.is_im_eq, cei.OrderBy, dc.dc_stop_publish, dc.dc_stop_card, dc.dc_group_state 
// FROM `debit_card_eq` as dce
// INNER JOIN card_eq_item as cei ON cei.Tb_index=dce.`eq_id`
// INNER JOIN debit_card as dc ON dc.Tb_index=dce.`card_id`
// GROUP BY `group_id`  


// DB table to use
$table = 'credit_card_eq_d';
 
// Table's primary key
$primaryKey = 'Tb_index';

$columns = array(
	array( 'db' => 'eq_name', 'dt' => 'eq_name' ),
    array( 'db' => 'content', 'dt' => 'content' ),
    array( 'db' => 'sm_content',  'dt' => 'sm_content' ),
    array( 'db' => 'note',  'dt' => 'note' ),
    array( 'db' => 'number_data',  
           'dt' => 'number_data',
           'formatter'=> function ($d, $row ){
              $txt='<input type="text" name="number_data" value="'.$d.'">';
              return $txt;
        }),
    array( 
        'db' => 'group_id',  
        'dt' => 'group_id',
        'formatter'=>function( $d, $row ){
          
          $pdo=new PDO_fun;

          $row_cc=$pdo->select("SELECT cc.cc_cardname, cc.org_nickname, cc.attr_name
                                FROM credit_card_eq as cced
                                INNER JOIN cc_detail as cc ON cc.Tb_index=cced.card_id
                                WHERE cced.group_id=:group_id", ['group_id'=>$d]);

          $html='<a class="show_cc_a">展開 <i class="fa fa-angle-down"></i></a>';

          $cc_g_arr=[];
          foreach ($row_cc as $cc_one) {
             $cc_g_arr[$cc_one['cc_cardname']][]=$cc_one;
          }
           
          $html_g='';
          foreach ($cc_g_arr as $cc_g_arr_s) {
             
             $html_ol='';
             foreach ($cc_g_arr_s as $cc_g_arr_one) {
                $html_ol.='<li>'.$cc_g_arr_one['org_nickname'].$cc_g_arr_one['attr_name'].'</li>';
             }
             
             $html_g.='<a class="cc_g_a" href="javascript:;">'.$cc_g_arr_s[0]['cc_cardname'].' <i class="fa fa-angle-down"></i></a>
                       <ul class="cc_orgLevel" style="display:none;">'.$html_ol.'</ul>';
          }

          $html.='<div class="cc_g_div" style="display:none;">'.$html_g.'</div>';
          
          
         

          
          return $html;
        }),
    array( 
        'db' => 'Tb_index',  
        'dt' => 'update',
        'formatter'=>function( $d, $row ){

            return '<a href="manager.php?Tb_index='.$d.'">修改</a>';
        }),
    array( 
        'db' => 'Tb_index',  
        'dt' => 'delete',
        'formatter'=>function( $d, $row ){

            return '<a class="del_cce" href="javascript:;" Tb_index="'.$d.'">刪除</a>';
        }),
    array( 'db' => 'OrderBy', 'dt' => 'OrderBy' )

);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;

//-- 判斷是否顯示停發或停卡 --
$show_stop_cc_txt=empty($_GET['show_stop_cc']) ? " AND cc_stop_publish=0 AND cc_stop_card=0": "";

//-- 判斷權益項目是否，(全部權益、重要權益) --
if ($_GET['eq_pk']=='all') {
  $eq_id_txt="";
}
elseif($_GET['eq_pk']=='import'){
  $eq_id_txt=" AND is_im_eq=1 ";
}
else{
  $eq_id_txt=" AND eq_id='".$_GET['eq_pk']."' ";
}
$where="bank_id='".$_GET['bi_pk']."' ".$eq_id_txt.$show_stop_cc_txt;

echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
);

?>
