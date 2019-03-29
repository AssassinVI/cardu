<?php 
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {
   
   $pdo=new PDO_fun;

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

   //-- 銀行 (名稱) --
   $bank_names_arr=[];
   $bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info");
   foreach ($bank as $bank_one) {
     $bank_names_arr[$bank_one['Tb_index']]=$bank_one['bi_shortname'];
   }

   //-- 組織 (名稱) --
   $org_names_arr=[];
   $org=$pdo->select("SELECT Tb_index, org_nickname FROM card_org");
   foreach ($org as $org_one) {
     $org_names_arr[$org_one['Tb_index']]=$org_one['org_nickname'];
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
                      mt_id='site201901111555425' AND 
                      ns_nt_sp_pk LIKE :ns_nt_sp_pk AND 
                      ns_verify LIKE :ns_verify AND 
                      ns_bank LIKE :ns_bank AND 
                      ns_reporter LIKE :ns_reporter AND "
                      .$area_news_type_txt.$activity_s_date.$activity_e_date.$StartDate.$EndDate.$ns_st_vfdate.$ns_en_vfdate.$ns_keyWord_txt;

    $sql_query=substr($sql_query, 0,-4);
    $sql_query.=" ORDER BY ns_vfdate DESC";

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
                <th>組織/銀行</th>
                <th>點閱數(PC)</th>
                <th>點閱數(手機)</th>
                <th>特級點閱數</th>
                <th>FB按讚數</th>
                <th>情報狀態</th>
                <th>活動時間</th>
                <th>上架期間</th>
                <th>撰稿者</th>
                <th>審核者</th>
                <th>審核時間</th>
                <th>完稿時間</th>

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

            //-- 組織/銀行 --
            $bank_org=empty($row_one['ns_bank']) ? $org_names_arr[$row_one['ns_org']] : $bank_names_arr[$row_one['ns_bank']] ;

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
          <td>'.$bank_org.'</td>
          <td>'.$row_one['ns_viewcount'].'</td>
          <td>'.$row_one['ns_mobvecount'].'</td>
          <td>'.$row_one['ns_proj_viewcount'].'</td>
          <td>'.$row_one['ns_fbcount'].'</td>
          <td>'.$ns_verify_arr['ver_'.$row_one['ns_verify']].'</td>
          <td>'.$activity_date.'</td>
          <td>'.$row_one['StartDate'].'~'.$row_one['EndDate'].'</td>
          <td>'.$row_one['ns_reporter'].'</td>
          <td>'.$row_one['ns_vfman_2_name'].'</td>
          <td>'.$row_one['ns_vfdate'].'</td>
          <td>'.$row_one['ns_fwdate'].'</td>

          </tr>';
          }
        ?>
         
   	  </tbody>
   </table>
</body>
</html>