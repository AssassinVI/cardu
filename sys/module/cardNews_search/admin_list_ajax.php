<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require '../../core/inc/pdo_fun_calss.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';
require '../../../share_area/func.php';

$pdo=new PDO_fun;

// DB table to use
$table = 'appNews';
 
// Table's primary key
$primaryKey = 'Tb_index';

$columns = array(
    array( 
        'db' => 'ns_nt_pk', 
        'dt' => 0,
        'formatter'=>function( $d, $row ){

            //-- 單元分類 (名稱) --
            $row_type=pdo_select("SELECT area_id FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            $row_area=pdo_select("SELECT at_name FROM appArea WHERE Tb_index=:Tb_index", ['Tb_index'=>$row_type['area_id']]);

            return $row_area['at_name'];
        }),
	array( 
        'db' => 'ns_nt_pk', 
        'dt' => 1,
        'formatter'=>function( $d, $row ){

            //-- 新聞分類 (名稱) --
            $row_type_arr=[];
            $row_type=pdo_select("SELECT Tb_index, nt_name FROM news_type", 'no');
            foreach ($row_type as $row_type_one) {
               $row_type_arr[$row_type_one['Tb_index']]=$row_type_one['nt_name'];
            }

            return $row_type_arr[$d];
        }),
    array( 'db' => 'ns_ftitle', 'dt' => 2 ),
    array( 
        'db' => 'Tb_index',  
        'dt' => 3,
        'formatter'=>function( $d, $row ){

            //-- 銀行 (名稱) --
            $pdo=new PDO_fun;
            $where=['news_id'=>$d];
            $row_bank=$pdo->select("SELECT bk.bi_shortname
                                        FROM appNews_bank_card as nbc 
                                        INNER JOIN bank_info as bk ON nbc.bank_id=bk.Tb_index 
                                        WHERE nbc.news_id=:news_id AND nbc.bank_id!='' AND nbc.card_group_id!='' 
                                        GROUP BY nbc.bank_id 
                                        LIMIT 0,1", $where, 'one');
            return $row_bank['bi_shortname'];
            $pdo=NULL;

        }),
    array( 'db' => 'ns_viewcount',  'dt' => 4 ),
    array( 'db' => 'ns_mobvecount',  'dt' => 5 ),
    array( 'db' => 'ns_fbcount',  'dt' => 6),
    array( 
        'db' => 'ns_verify',  
        'dt' => 7,
        'formatter'=>function( $d, $row ){
            //-- 新聞狀態 --
            $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];
            return $ns_verify_arr['ver_'.$d];
        }),
    array( 
        'db' => 'Tb_index',  
        'dt' => 8,
        'formatter'=>function( $d, $row ){
            //-- 活動期間 --
            $row_time=pdo_select("SELECT activity_s_date, activity_e_date FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            if ($row_time['activity_s_date']=='0000-00-00' && $row_time['activity_e_date']=='0000-00-00') {
               return '';
            }
            else{
               $activity_s_date=$row_time['activity_s_date']=='0000-00-00' ? '即日起':$row_time['activity_s_date'];
               return $activity_s_date.'<br>~<br>'.$row_time['activity_e_date']; 
            }
            
        }),
    array( 
        'db' => 'Tb_index',  
        'dt' => 9,
        'formatter'=>function( $d, $row ){
            //-- 上架期間 --
            $row_time=pdo_select("SELECT StartDate, EndDate FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            return $row_time['StartDate'].'<br>~<br>'.$row_time['EndDate'];
        }),
    array( 'db' => 'ns_reporter',  'dt' => 10 ),
    array( 'db' => 'ns_vfman_2_name',  'dt' => 11 ),
    array( 'db' => 'ns_vfdate',  'dt' => 12 ),
    array( 'db' => 'ns_nt_pk_sort',  'dt' => 13 ),

    array(
        'db'        => 'Tb_index',
        'dt'        => 14,
        'formatter' => function( $d, $row ) {
            //-- 主標 + 網址 --
            $row_name=pdo_select("SELECT * FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            $url=news_url($row_name['mt_id'], $row_name['Tb_index'], $row_name['ns_nt_pk'], $row_name['area_id']);
            return '            
                                <a href="javascript:;" onclick="window.open(\'../cardNews_public/newsView_windows.php?Tb_index='.$d.'\', \''.$row_name['ns_ftitle'].'\', config=\'height=800,width=900\');">
                                <i class="fa fa-binoculars" aria-hidden="true"></i>
                                預覽
                                </a>｜

                                <a target="_blank" href="'.$url.'">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                網址
                                </a>｜

                                <a href="manager.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								修改
								</a>｜
                                

                                <a href="manager_verify.php?MT_id=' . $_GET['MT_id'] . '&Tb_index=' . $d . '" >
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                重審
                                </a>｜

                                <a class="del_news_btn" href="" Tb_index="'.$d.'">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                刪除
                                </a>';
        }
    )
);


// SQL server connection information--> to config.php
$sql_details = $DataTable_sql_conn;


//-- 單元分類 --
$area_news_type_txt='';

//-- 選單元分類 --
if (!empty($_GET['area_id'])) {
   
   //-- 選情報分類 --
   if (!empty($_GET['ns_nt_pk'])) {
     $area_news_type_txt=" ns_nt_pk LIKE '%".$_GET['ns_nt_pk']."%' AND ";
   }
   //-- 選情報分類 (全部) --
   else{

     $area_news_type=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id=:area_id", ['area_id'=>$_GET['area_id']]);
     foreach ($area_news_type as $area_news_type_one) {
       $area_news_type_txt.=" ns_nt_pk LIKE '%".$area_news_type_one['Tb_index']."%' OR ";
     }
       $area_news_type_txt=substr($area_news_type_txt, 0,-3);
       $area_news_type_txt=" ( ".$area_news_type_txt." ) AND ";
   }
}
//-- 選單元分類 (全部) --
else{
    $area_news_type_txt=" ns_nt_pk LIKE '%%' AND ";
}



$activity_s_date=empty($_GET['activity_s_date']) ? "" : " activity_s_date >= '".$_GET['activity_s_date']."' AND ";
$activity_e_date=empty($_GET['activity_e_date']) ? "" : " activity_e_date <= '".$_GET['activity_e_date']."' AND ";

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




$where="mt_id='site201901111555425' AND 
        ns_nt_sp_pk LIKE '%".$_GET['ns_nt_sp_pk']."%' AND 
        ns_verify LIKE '%".$_GET['ns_verify']."%' AND 
        ns_bank LIKE '%".$_GET['ns_bank']."%' AND 
        ns_reporter LIKE '%".$_GET['ns_reporter']."%' AND "
        .$area_news_type_txt.$activity_s_date.$activity_e_date.$StartDate.$EndDate.$ns_st_vfdate.$ns_en_vfdate.$ns_keyWord_txt;

$where=substr($where, 0,-4);


echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where  )
);
$pdo=NULL;
?>

