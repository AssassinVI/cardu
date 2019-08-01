<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require '../../core/inc/pdo_fun_calss.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';
require '../../../share_area/func.php';



// DB table to use
$table = 'appNews';
 
// Table's primary key
$primaryKey = 'Tb_index';

$columns = array(
	array( 
        'db' => 'ns_nt_pk', 
        'dt' => 0,
        'formatter'=>function( $d, $row ){

            //-- 新聞分類 (名稱) --
            $row_type_arr=[];
            $row_type=pdo_select("SELECT Tb_index, nt_name FROM news_type", 'no');
            foreach ($row_type as $row_type_one) {
               $row_type_arr[$row_type_one['Tb_index']]=$row_type_one['nt_name'];
            }

            return $row_type_arr[$d];
        }),
    array( 'db' => 'ns_ftitle', 'dt' => 1 ),
    array( 'db' => 'ns_viewcount',  'dt' => 2 ),
    array( 'db' => 'ns_mobvecount',  'dt' => 3 ),
    array( 'db' => 'ns_fbcount',  'dt' => 4 ),
    array( 
        'db' => 'ns_verify',  
        'dt' => 5,
        'formatter'=>function( $d, $row ){
            //-- 新聞狀態 --
            $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];
            return $ns_verify_arr['ver_'.$d];
        }),
    array( 
        'db' => 'Tb_index',  
        'dt' => 6,
        'formatter'=>function( $d, $row ){
            //-- 上架期間 --
            $row_time=pdo_select("SELECT StartDate, EndDate FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            return $row_time['StartDate'].'~'.$row_time['EndDate'];
        }),
    array( 'db' => 'ns_reporter',  'dt' => 7 ),
    array( 'db' => 'ns_vfman_2_name',  'dt' => 8 ),
    array( 'db' => 'ns_vfdate',  'dt' => 9 ),
    array( 'db' => 'ns_fwdate',  'dt' => 10 ),
    array( 'db' => 'ns_date',  'dt' => 11 ),
    array( 'db' => 'ns_nt_pk_sort',  'dt' => 12 ),
    array(
        'db'        => 'Tb_index',
        'dt'        => 13,
        'formatter' => function( $d, $row ) {
            //-- 主標 + 網址 --
            $row_name=pdo_select("SELECT * FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            $url=news_url($row_name['mt_id'], $row_name['Tb_index'], $row_name['ns_nt_pk'], $row_name['area_id']);
            return '            
                                <a href="javascript:;" onclick="window.open(\'../news_public/newsView_windows.php?Tb_index='.$d.'\', \''.$row_name['ns_ftitle'].'\', config=\'height=800,width=900\');" >
                                  <i class="fa fa-binoculars" aria-hidden="true"></i>預覽
                                </a>｜
                                <a href="'.$url.'" target="_blank">
                                  <i class="fa fa-globe" aria-hidden="true"></i>網址
                                </a>｜
                                <a href="manager.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
                                  <i class="fa fa-pencil-square" aria-hidden="true"></i>修改
                                </a>｜
                                <a href="manager_verify.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
                                  <i class="fa fa-eye" aria-hidden="true"></i>重審
                                </a>｜
                                <a class="del_news_btn" href="" Tb_index="'.$d.'">
                                  <i class="fa fa-trash" aria-hidden="true"></i>刪除
                                </a>';
        }
    ),
//     array(
//         'db'        => 'Tb_index',
//         'dt'        => 13,
//         'formatter' => function( $d, $row ) {
//             //-- 主標 --
//             $row_name=pdo_select("SELECT mt_id, Tb_index, ns_nt_pk, area_id FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
//             $url=news_url($row_name['mt_id'], $row_name['Tb_index'], $row_name['ns_nt_pk'], $row_name['area_id']);

//             return '            
//                                 <a href="'.$url.'" target="_blank">
//                                 <i class="fa fa-globe" aria-hidden="true"></i>
//                                 網址
//                                 </a>';
//         }
//     ),
//     array(
//         'db'        => 'Tb_index',
//         'dt'        => 14,
//         'formatter' => function( $d, $row ) {

//             return '            
//                                 <a href="manager.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
//                                 <i class="fa fa-pencil-square" aria-hidden="true"></i>
//                                 修改
//                                 </a> ';
//         }
//     ),
//     array(
//         'db'        => 'Tb_index',
//         'dt'        => 15,
//         'formatter' => function( $d, $row ) {

//             return '            
//                                 <a href="manager_verify.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
//                                 <i class="fa fa-eye" aria-hidden="true"></i>
//                                 重審
//                                 </a>
// ';
//         }
//     ),
//     array(
//         'db'        => 'Tb_index',
//         'dt'        => 16,
//         'formatter' => function( $d, $row ) {

//             return '            
//                                 <a class="del_news_btn" href="" Tb_index="'.$d.'">
//                                 <i class="fa fa-trash" aria-hidden="true"></i>
//                                 刪除
//                                 </a>';
//         }
//     )
);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;

$StartDate=empty($_GET['StartDate']) ? "" : " StartDate >= '".$_GET['StartDate']."' AND ";
$EndDate=empty($_GET['EndDate']) ? "" : " StartDate <= '".$_GET['EndDate']."' AND ";

$ns_st_vfdate=empty($_GET['ns_st_vfdate']) ? "" : " ns_vfdate >= '".$_GET['ns_st_vfdate']." 00:00:00' AND ";
$ns_en_vfdate=empty($_GET['ns_en_vfdate']) ? "" : " ns_vfdate <= '".$_GET['ns_en_vfdate']." 23:59:59' AND ";

$ns_keyWord_txt='';
if (strpos($_GET['ns_keyWord'], ',')!=FALSE) {
   $ns_keyWord=explode(',', $_GET['ns_keyWord']);

   foreach ($ns_keyWord as $ns_keyWord_one) {
     
     $ns_keyWord_txt.="
        (ns_ftitle LIKE '%".$ns_keyWord_one."%' OR 
         ns_stitle LIKE '%".$ns_keyWord_one."%' OR 
         ns_msghtml LIKE '%".$ns_keyWord_one."%' OR 
         ns_label LIKE '%".$ns_keyWord_one."%') AND ";
   }
}
elseif(strpos($_GET['ns_keyWord'], ' ')!=FALSE){
   $ns_keyWord=explode(' ', $_GET['ns_keyWord']);

   foreach ($ns_keyWord as $ns_keyWord_one) {
     
     $ns_keyWord_txt.="
        (ns_ftitle LIKE '%".$ns_keyWord_one."%' OR 
         ns_stitle LIKE '%".$ns_keyWord_one."%' OR 
         ns_msghtml LIKE '%".$ns_keyWord_one."%' OR 
         ns_label LIKE '%".$ns_keyWord_one."%') AND ";
   }
}
elseif(!empty($_GET['ns_keyWord'])){
    
    $ns_keyWord_txt.="
        (ns_ftitle LIKE '%".$_GET['ns_keyWord']."%' OR 
         ns_stitle LIKE '%".$_GET['ns_keyWord']."%' OR 
         ns_msghtml LIKE '%".$_GET['ns_keyWord']."%' OR 
         ns_label LIKE '%".$_GET['ns_keyWord']."%') AND ";
}




$where="mt_id='site2018111910430599' AND 
        ns_nt_pk LIKE '%".$_GET['ns_nt_pk']."%' AND 
        ns_nt_sp_pk LIKE '%".$_GET['ns_nt_sp_pk']."%' AND 
        ns_verify LIKE '%".$_GET['ns_verify']."%' AND 
        ns_bank LIKE '%".$_GET['ns_bank']."%' AND 
        ns_reporter LIKE '%".$_GET['ns_reporter']."%' AND "
        .$StartDate.$EndDate.$ns_st_vfdate.$ns_en_vfdate.$ns_keyWord_txt;

$where=substr($where, 0,-4);

echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where )
);

?>