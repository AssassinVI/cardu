<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {
   
   $pdo=new PDO_fun;
   
   //----------------------------------- 情報分類 ------------------------------------------
  if (isset($_POST['nt_sp'])) {
     
   if ($_POST['nt_sp']==0) {
       
       //-- 優旅行 --
       if ($_POST['area_id']=='at2019011117461656') {

          $row_news_type=$pdo->select("SELECT Tb_index, nt_name, unit_id FROM news_type WHERE area_id=:area_id AND nt_sp=0 ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id']]);
          for ($i=0; $i <count($row_news_type) ; $i++) { 
             $unit_name=$pdo->select("SELECT un_name FROM appUnit WHERE Tb_index=:Tb_index", ['Tb_index'=>$row_news_type[$i]['unit_id']], 'one');
             $row_news_type[$i]['nt_name']='['.$unit_name['un_name'].']'.$row_news_type[$i]['nt_name'];
          }
       }
       else{
         $row_news_type=$pdo->select("SELECT Tb_index, nt_name FROM news_type WHERE area_id=:area_id AND nt_sp=0 ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id']]);
       }
   	 
   }
   //-- 特別議題分類 --
   else{
     $row_news_type=$pdo->select("SELECT Tb_index, nt_name 
                                  FROM news_type 
                                  WHERE area_id=:area_id AND nt_sp=1 AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>=:nt_sp_end_date 
                                  ORDER BY OrderBy ASC", 
                                  ['area_id'=>$_POST['area_id'], 'nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
   }

   echo json_encode($row_news_type);
  }
  
  //------------------------------------------ 商店分類 -------------------------------------------------
  else{
    
    //-- 撈商店主分類 --
    if ($_POST['type']=='store_type') {
       
       $row_store_type=$pdo->select("SELECT Tb_index, st_name FROM store_type_main WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$_POST['st_type']]);
       echo json_encode($row_store_type);
    }

    //-- 撈商店次分類 --
    elseif($_POST['type']=='store_s_type'){
       $row_store_type=$pdo->select("SELECT Tb_index, st_name FROM store_type_second WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$_POST['st_main_type']]);
       echo json_encode($row_store_type);
    }

    //-- 撈商店名稱 --
    elseif($_POST['type']=='store'){
       $st_type=empty($_POST['st_type']) ? '': $_POST['st_type'];
       $st_main_type=empty($_POST['st_main_type']) ? '': $_POST['st_main_type'];
       $st_second_type=empty($_POST['st_second_type']) ? '': $_POST['st_second_type'];
       
       $row_store=$pdo->select("SELECT Tb_index, st_name FROM store WHERE st_type LIKE :st_type AND st_main_type LIKE :st_main_type AND st_second_type LIKE :st_second_type ORDER BY OrderBy ASC", ['st_type'=>'%'.$_POST['st_type'].'%', 'st_main_type'=>'%'.$_POST['st_main_type'].'%', 'st_second_type'=>'%'.$_POST['st_second_type'].'%']);
       echo json_encode($row_store);
    }
  }

 }
?>