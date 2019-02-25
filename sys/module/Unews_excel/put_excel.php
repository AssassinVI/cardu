<?php 
  header('Content-type:application/vnd.ms-excel'); //宣告網頁格式
  if (!empty($_POST['activity_s_date']) || !empty($_POST['activity_e_date'])) {
    $filename='活動期間'.$_POST['StartDate'].'至'.$_POST['EndDate'].'之優情報資料.xls';
  }
  elseif (!empty($_POST['StartDate']) || !empty($_POST['EndDate'])) {
    $filename='上架期間'.$_POST['StartDate'].'至'.$_POST['EndDate'].'之優情報資料.xls';
  }
  elseif(!empty($_POST['ns_st_vfdate']) || !empty($_POST['ns_en_vfdate'])){
    $filename='審核期間'.$_POST['StartDate'].'至'.$_POST['EndDate'].'之優情報資料.xls';
  }
  else{
    //-- 情報狀態 --
    $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];
    $filename=$ns_verify_arr['ver_'.$_POST['ns_verify']].'優情報資料.xls';
  }
  header('Content-Disposition: attachment; filename='.$filename); //設定檔案名稱

 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {
   
   $pdo=new PDO_fun;

  
    //-- 商店 (名稱) --
   $store_names_arr=[];
   $store=$pdo->select("SELECT Tb_index, st_nickname FROM store");
   foreach ($store as $store_one) {
     $store_names_arr[$store_one['Tb_index']]=$store_one['st_nickname'];
   }


   //-- 單元分類 --
   $area_news_type_txt='';

   //-- 選單元分類 --
   if (!empty($_POST['area_id'])) {
      
      //-- 選情報分類 --
      if (!empty($_POST['ns_nt_pk'])) {
        $area_news_type_txt=" ns_nt_pk LIKE '%".$_POST['ns_nt_pk']."%' AND ";
      }
      //-- 選情報分類 (全部) --
      else{

        $area_news_type=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id=:area_id", ['area_id'=>$_POST['area_id']]);
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
if (empty($_POST['st_type']) && empty($_POST['st_main_type']) && empty($_POST['st_second_type']) && empty($_POST['ns_store'])) {
    $ns_store_txt='';
}
else{
    $ns_store_txt='';
    $where=[
     'st_type'=>'%'.$_POST['st_type'].'%',
     'st_main_type'=>'%'.$_POST['st_main_type'].'%',
     'st_second_type'=>'%'.$_POST['st_second_type'].'%',
     'Tb_index'=>'%'.$_POST['ns_store'].'%',

    ];
    $row_store=$pdo->select("SELECT Tb_index FROM store WHERE st_type LIKE :st_type AND st_main_type LIKE :st_main_type AND st_second_type LIKE :st_second_type AND Tb_index LIKE :Tb_index", $where);
    foreach ($row_store as $row_store_one) {
      $ns_store_txt.=" ns_store LIKE '%".$row_store_one['Tb_index']."%' OR ";
    }

    $ns_store_txt=substr($ns_store_txt, 0,-3);
    $ns_store_txt=" (".$ns_store_txt.") AND ";
}
   

   //-- 活動期間 --
   $activity_s_date=empty($_POST['activity_s_date']) ? "" : " activity_s_date >= '".$_POST['activity_s_date']."' AND ";
   $activity_e_date=empty($_POST['activity_e_date']) ? "" : " activity_e_date <= '".$_POST['activity_e_date']."' AND ";
   
   //-- 上架期間 --
   $StartDate=empty($_POST['StartDate']) ? "" : " StartDate >= '".$_POST['StartDate']."' AND ";
   $EndDate=empty($_POST['EndDate']) ? "" : " StartDate <= '".$_POST['EndDate']."' AND ";
   
   //-- 審核期間 --
   $ns_st_vfdate=empty($_POST['ns_st_vfdate']) ? "" : " ns_vfdate >= '".$_POST['ns_st_vfdate']." 00:00:00' AND ";
   $ns_en_vfdate=empty($_POST['ns_en_vfdate']) ? "" : " ns_vfdate <= '".$_POST['ns_en_vfdate']." 23:59:59' AND ";
   
   //-- 關鍵字 --
   //-- 關鍵字 --
     $ns_keyWord_txt='';
     $keyWord=strpos($_POST['ns_keyWord'], ',')!=FALSE ? explode(',', $_POST['ns_keyWord']) : explode(' ', $_POST['ns_keyWord']);
     foreach ($keyWord as $keyWord_one) {
       $ns_keyWord_txt.=" concat(ns_ftitle, ns_stitle, ns_msghtml, ns_label) LIKE '%".$keyWord_one."%' AND ";
     }

   $ns_keyWord_txt=' ('.substr($ns_keyWord_txt, 0,-4).') AND ';


   
   $where=[
    'ns_nt_sp_pk'=>'%'.$_POST['ns_nt_sp_pk'].'%',
    'ns_verify'=>'%'.$_POST['ns_verify'].'%',
    'ns_bank'=>'%'.$_POST['ns_bank'].'%',
    'ns_reporter'=>'%'.$_POST['ns_reporter'].'%',
   ];

   $sql_query="SELECT * 
                      FROM appNews 
                      WHERE 
                      mt_id='site2019011116095854' AND 
                      ns_nt_sp_pk LIKE :ns_nt_sp_pk AND 
                      ns_verify LIKE :ns_verify AND 
                      ns_bank LIKE :ns_bank AND 
                      ns_reporter LIKE :ns_reporter AND "
                      .$area_news_type_txt.$ns_store_txt.$activity_s_date.$activity_e_date.$StartDate.$EndDate.$ns_st_vfdate.$ns_en_vfdate.$ns_keyWord_txt;

    $sql_query=substr($sql_query, 0,-4);

   $row=$pdo->select($sql_query, $where);


   
 }
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style type="text/css">
    td{ mso-number-format:\@; }
    tbody{ font-size: 13px; }
  </style>
</head>
<body>
   <table border="1" cellpadding="5" cellspacing="0">
      <thead style="background-color: #eee;">
      
         <tr>

                <th>主分類</th>
                <th>情報標題</th>
                <th>商店簡稱</th>
                <th>點閱數(PC)</th>
                <th>點閱數(手機)</th>
                <th>特級點閱數</th>
                <th>FB按讚數</th>
                <th>情報狀態</th>
                <th>活動時間</th>
                <th>上架期間</th>
                <th>撰稿者</th>
                <th>審核者</th>
                <th>完稿時間</th>
                <th>審核時間</th>
                

         </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($row as $row_one) {
          
            //-- 情報分類 (名稱) --
            $row_type_arr=[];
            $row_type=pdo_select("SELECT Tb_index, nt_name FROM news_type", 'no');
            foreach ($row_type as $row_type_one) {
               $row_type_arr[$row_type_one['Tb_index']]=$row_type_one['nt_name'];
            }

            //-- 情報狀態 --
            $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];

            //-- 活動期間 --
            if ($row_one['activity_s_date']=='0000-00-00' && $row_one['activity_e_date']=='0000-00-00'){
               $activity_date='';
            }
            else{
               $activity_s_date=$row_one['activity_s_date']=='0000-00-00' ? '即日起':$row_one['activity_s_date'];
               $activity_date=$activity_s_date.'~'.$row_one['activity_e_date'];
            }


          echo '
          <tr>

          <td>'.$row_type_arr[$row_one['ns_nt_pk']].'</td>
          <td>'.$row_one['ns_ftitle'].'</td>
          <td>'.$store_names_arr[$row_one['ns_store']].'</td>
          <td>'.$row_one['ns_viewcount'].'</td>
          <td>'.$row_one['ns_mobvecount'].'</td>
          <td>'.$row_one['ns_proj_viewcount'].'</td>
          <td>'.$row_one['ns_fbcount'].'</td>
          <td>'.$ns_verify_arr['ver_'.$row_one['ns_verify']].'</td>
          <td>'.$activity_date.'</td>
          <td>'.$row_one['StartDate'].'~'.$row_one['EndDate'].'</td>
          <td>'.$row_one['ns_reporter'].'</td>
          <td>'.$row_one['ns_vfman_2_name'].'</td>
          <td>'.$row_one['ns_fwdate'].'</td>
          <td>'.$row_one['ns_vfdate'].'</td>
          

          </tr>';
          }
        ?>
         
      </tbody>
   </table>
</body>
</html>