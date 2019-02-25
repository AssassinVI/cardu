<?php 
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {
   
   $pdo=new PDO_fun;

   $StartDate=empty($_POST['StartDate']) ? "" : " StartDate >= '".$_POST['StartDate']."' AND ";
   $EndDate=empty($_POST['EndDate']) ? "" : " StartDate <= '".$_POST['EndDate']."' AND ";

   $ns_st_vfdate=empty($_POST['ns_st_vfdate']) ? "" : " ns_vfdate >= '".$_POST['ns_st_vfdate']." 00:00:00' AND ";
   $ns_en_vfdate=empty($_POST['ns_en_vfdate']) ? "" : " ns_vfdate <= '".$_POST['ns_en_vfdate']." 23:59:59' AND ";

   $ns_keyWord_txt='';
   if (strpos($_POST['ns_keyWord'], ',')!=FALSE) {
      $ns_keyWord=explode(',', $_POST['ns_keyWord']);

      foreach ($ns_keyWord as $ns_keyWord_one) {
        
        $ns_keyWord_txt.="
           (ns_ftitle LIKE '%".$ns_keyWord_one."%' OR 
            ns_stitle LIKE '%".$ns_keyWord_one."%' OR 
            ns_msghtml LIKE '%".$ns_keyWord_one."%' OR 
            ns_label LIKE '%".$ns_keyWord_one."%') AND ";
      }
   }
   elseif(strpos($_POST['ns_keyWord'], ' ')!=FALSE){
      $ns_keyWord=explode(' ', $_POST['ns_keyWord']);

      foreach ($ns_keyWord as $ns_keyWord_one) {
        
        $ns_keyWord_txt.="
           (ns_ftitle LIKE '%".$ns_keyWord_one."%' OR 
            ns_stitle LIKE '%".$ns_keyWord_one."%' OR 
            ns_msghtml LIKE '%".$ns_keyWord_one."%' OR 
            ns_label LIKE '%".$ns_keyWord_one."%') AND ";
      }
   }
   elseif(!empty($_POST['ns_keyWord'])){
       
       $ns_keyWord_txt.="
           (ns_ftitle LIKE '%".$_POST['ns_keyWord']."%' OR 
            ns_stitle LIKE '%".$_POST['ns_keyWord']."%' OR 
            ns_msghtml LIKE '%".$_POST['ns_keyWord']."%' OR 
            ns_label LIKE '%".$_POST['ns_keyWord']."%') AND ";
   }
   
   $where=[
    'ns_nt_pk'=>'%'.$_POST['ns_nt_pk'].'%',
    'ns_nt_sp_pk'=>'%'.$_POST['ns_nt_sp_pk'].'%',
    'ns_verify'=>'%'.$_POST['ns_verify'].'%',
    'ns_bank'=>'%'.$_POST['ns_bank'].'%',
    'ns_reporter'=>'%'.$_POST['ns_reporter'].'%',
   ];

   $sql_query="SELECT * 
                      FROM appNews 
                      WHERE 
                      mt_id='site2018111910430599' AND 
                      ns_nt_pk LIKE :ns_nt_pk AND 
                      ns_nt_sp_pk LIKE :ns_nt_sp_pk AND 
                      ns_verify LIKE :ns_verify AND 
                      ns_bank LIKE :ns_bank AND 
                      ns_reporter LIKE :ns_reporter AND "
                      .$StartDate.$EndDate.$ns_st_vfdate.$ns_en_vfdate.$ns_keyWord_txt;

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
                <th>主標題</th>
                <th>點閱數(PC)</th>
                <th>點閱數(手機)</th>
                <th>FB按讚數</th>
                <th>新聞狀態</th>
                <th>上架期間</th>
                <th>記者/作者</th>
                <th>審核者</th>
                <th>審核時間</th>
                <th>完稿時間</th>

   	  	 </tr>
   	  </thead>
   	  <tbody>
   	  	<?php 
          foreach ($row as $row_one) {
          
            //-- 新聞分類 (名稱) --
            $row_type_arr=[];
            $row_type=pdo_select("SELECT Tb_index, nt_name FROM news_type", 'no');
            foreach ($row_type as $row_type_one) {
               $row_type_arr[$row_type_one['Tb_index']]=$row_type_one['nt_name'];
            }

            //-- 新聞狀態 --
            $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];

          echo '
          <tr>

          <td>'.$row_type_arr[$row_one['ns_nt_pk']].'</td>
          <td>'.$row_one['ns_ftitle'].'</td>
          <td>'.$row_one['ns_viewcount'].'</td>
          <td>'.$row_one['ns_mobvecount'].'</td>
          <td>'.$row_one['ns_fbcount'].'</td>
          <td>'.$ns_verify_arr['ver_'.$row_one['ns_verify']].'</td>
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