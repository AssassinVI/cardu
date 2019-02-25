<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {
   
   $pdo=new PDO_fun;
   
   //-- 情報分類 --
   if ($_POST['nt_sp']==0) {
   	 $row_news_type=$pdo->select("SELECT Tb_index, nt_name FROM news_type WHERE area_id=:area_id AND nt_sp=0 ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id']]);
   }
   //-- 特別議題分類 --
   else{
     $row_news_type=$pdo->select("SELECT Tb_index, nt_name FROM news_type WHERE area_id=:area_id AND nt_sp=1 AND nt_sp_begin_date<=:today AND nt_sp_end_date>=:today ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id'], 'today'=>date('Y-m-d')]);
   }

   echo json_encode($row_news_type);
 }
?>