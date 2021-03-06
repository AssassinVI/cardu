<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';
require '../../core/inc/pdo_fun_calss.php';
require_once '../../core/inc/security.php';
require '../../core/inc/ssp.class.php';
require '../../../share_area/func.php';



// DB table to use
$table = 'NewsAndType';
 
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
            //-- 主分類 --
            $ns_nt_pk_arr=explode(',', $d);
            $ns_nt_pk=pdo_select("SELECT nt.area_id, nt.nt_name, un.un_name
                                  FROM news_type as nt
                                  INNER JOIN appUnit as un ON un.Tb_index=nt.unit_id
                                  WHERE nt.Tb_index=:Tb_index", ['Tb_index'=>$ns_nt_pk_arr[0]]);
            //-- 優旅行 --
            if ($ns_nt_pk['area_id']=='at2019011117461656') {
              $nt_name=$ns_nt_pk['un_name'];
            }
            else{
               $nt_name=$ns_nt_pk['nt_name'];
            }

            return $nt_name;
        }),
    array( 'db' => 'ns_ftitle', 'dt' => 2 ),
    array( 
        'db' => 'ns_store',  
        'dt' => 3,
        'formatter'=>function( $d, $row ){

            //-- 商店 (名稱) --
            $row_store=pdo_select("SELECT st_name FROM store WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            return $row_store['st_name'];

        }),
    array( 
        'db' => 'ns_bank',  
        'dt' => 4,
        'formatter'=>function( $d, $row ){

            //-- 銀行 (名稱) --
            $row_bank=pdo_select("SELECT bi_shortname FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            return $row_bank['bi_shortname'];

        }),
    array( 'db' => 'ns_viewcount',  'dt' => 5 ),
    array( 'db' => 'ns_mobvecount',  'dt' => 6 ),
    array( 'db' => 'ns_fbcount',  'dt' => 7),
    array( 
        'db' => 'ns_verify',  
        'dt' => 8,
        'formatter'=>function( $d, $row ){
            //-- 新聞狀態 --
            $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];
            return $ns_verify_arr['ver_'.$d];
        }),
    array( 
        'db' => 'Tb_index',  
        'dt' => 9,
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
        'dt' => 10,
        'formatter'=>function( $d, $row ){
            //-- 上架期間 --
            $row_time=pdo_select("SELECT StartDate, EndDate FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            return $row_time['StartDate'].'<br>~<br>'.$row_time['EndDate'];
        }),
    array( 'db' => 'ns_reporter',  'dt' => 11 ),
    array( 'db' => 'ns_vfman_2_name',  'dt' => 12 ),
    array( 'db' => 'ns_vfdate',  'dt' => 13 ),
    array( 'db' => 'ns_nt_pk_sort',  'dt' => 14 ),


    array(
        'db'        => 'Tb_index',
        'dt'        => 15,
        'formatter' => function( $d, $row ) {
            //-- 主標 + 網址 --
            $row_name=pdo_select("SELECT * FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$d]);
            $url=news_url($row_name['mt_id'], $row_name['Tb_index'], $row_name['ns_nt_pk'], $row_name['area_id']);
            return '            
                                <a href="javascript:;" onclick="window.open(\'../Unews_public/newsView_windows.php?Tb_index='.$d.'\', \''.$row_name['ns_ftitle'].'\', config=\'height=800,width=900\');">
                                <i class="fa fa-binoculars" aria-hidden="true"></i>
                                預覽
                                </a>｜

                                <a target="_blank" href="'.$url.'" >
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

$pdo=new PDO_fun;
//------------------------------------- 單元分類 -----------------------------------------------
$area_news_type_txt='';

//-- 選單元分類 --
if (!empty($_GET['area_id'])) {
   
   //-- 選情報分類 --
   if (!empty($_GET['ns_nt_pk'])) {
     
     //-- 判斷優旅行 --
     $area_news_type_txt= $_GET['area_id']=='at2019011117461656' ? " unit_id LIKE '%".$_GET['ns_nt_pk']."%' AND " : " ns_nt_pk LIKE '%".$_GET['ns_nt_pk']."%' AND ";

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


//------------------------------------- 商店 -----------------------------------------------
if (empty($_GET['st_type']) && empty($_GET['st_main_type']) && empty($_GET['st_second_type']) && empty($_GET['ns_store'])) {
    $ns_store_txt='';
}
else{
    $ns_store_txt='';
    $where=[
     'st_type'=>'%'.$_GET['st_type'].'%',
     'st_main_type'=>'%'.$_GET['st_main_type'].'%',
     'st_second_type'=>'%'.$_GET['st_second_type'].'%',
     'Tb_index'=>'%'.$_GET['ns_store'].'%',

    ];
    $row_store=$pdo->select("SELECT Tb_index FROM store WHERE st_type LIKE :st_type AND st_main_type LIKE :st_main_type AND st_second_type LIKE :st_second_type AND Tb_index LIKE :Tb_index", $where);
    foreach ($row_store as $row_store_one) {
      $ns_store_txt.=" ns_store LIKE '%".$row_store_one['Tb_index']."%' OR ";
    }

    $ns_store_txt=substr($ns_store_txt, 0,-3);
    $ns_store_txt=" (".$ns_store_txt.") AND ";
}


//-- 活動期間 --
$activity_s_date=empty($_GET['activity_s_date']) ? "" : " activity_s_date >= '".$_GET['activity_s_date']."' AND ";
$activity_e_date=empty($_GET['activity_e_date']) ? "" : " activity_e_date <= '".$_GET['activity_e_date']."' AND ";
//-- 上架期間 --
$StartDate=empty($_GET['StartDate']) ? "" : " StartDate >= '".$_GET['StartDate']."' AND ";
$EndDate=empty($_GET['EndDate']) ? "" : " StartDate <= '".$_GET['EndDate']."' AND ";
//-- 審核期間 --
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




$where="mt_id='site2019011116095854' AND 
        ns_nt_sp_pk LIKE '%".$_GET['ns_nt_sp_pk']."%' AND 
        ns_verify LIKE '%".$_GET['ns_verify']."%' AND 
        ns_reporter LIKE '%".$_GET['ns_reporter']."%' AND "
        .$area_news_type_txt.$ns_store_txt.$activity_s_date.$activity_e_date.$StartDate.$EndDate.$ns_st_vfdate.$ns_en_vfdate.$ns_keyWord_txt;

$where=substr($where, 0,-4);

echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where )
);

?>