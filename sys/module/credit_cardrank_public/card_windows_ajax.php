<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    


    //-- 撈信用卡 --
 	if ($_POST['type']=='show_cc') {
 		
 		//-- 正常使用 --
 		if (!empty($_POST['cc_bi_pk']) && empty($_POST['show_stop_cc'])) {
 			$row_cc_group= $pdo->select("SELECT Tb_index, cc_cardname, cc_group_id, cc_status_name, cc_group_state FROM credit_card WHERE cc_bi_pk=:cc_bi_pk AND (cc_group_state='0' OR cc_group_state='3') GROUP BY cc_group_id", ['cc_bi_pk'=>$_POST['cc_bi_pk']]);
 			echo json_encode($row_cc_group);
 		}
    //-- 停發/停卡 --
 		else{
 			$row_cc_group= $pdo->select("SELECT Tb_index, cc_cardname, cc_group_id, cc_status_name, cc_group_state FROM credit_card WHERE cc_bi_pk=:cc_bi_pk  GROUP BY cc_group_id", ['cc_bi_pk'=>$_POST['cc_bi_pk']]);
 			echo json_encode($row_cc_group);
 		}
 	}
  



  //-- 撈信用卡卡等 --
  elseif($_POST['type']=='show_cc_level'){

   //-- 發卡組織等名稱 --
   $org_name=[];
   $org=$pdo->select("SELECT Tb_index, org_nickname FROM card_org ORDER BY OrderBy ASC");
   foreach ($org as $org_one) {
    $org_name[$org_one['Tb_index']]=$org_one['org_nickname'];
   } 

    //-- 卡等名稱 --
   $level_name=[];
   $level=$pdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
   foreach ($level as $level_one) {
    $level_name[$level_one['Tb_index']]=$level_one['attr_name'];
   }
     
     //-- 正常使用 --
    if (!empty($_POST['cc_bi_pk']) && empty($_POST['show_stop_cc'])) {
      $row_cc_level= $pdo->select("SELECT Tb_index, cc_cardorg, cc_cardlevel, cc_cardname, cc_group_id, cc_status_name, cc_group_state, cc_stop_publish, cc_stop_card 
                                   FROM credit_card WHERE cc_group_id=:cc_group_id AND cc_stop_publish='0' AND cc_stop_card='0'", ['cc_group_id'=>$_POST['cc_group_id']]);

      for ($i=0; $i <count($row_cc_level) ; $i++) { 
        $row_cc_level[$i]['level_name']=$org_name[$row_cc_level[$i]['cc_cardorg']].'_'.$level_name[$row_cc_level[$i]['cc_cardlevel']];
      }
      echo json_encode($row_cc_level);
    }
    //-- 停發/停卡 --
    else{
      $row_cc_level= $pdo->select("SELECT Tb_index, cc_cardorg, cc_cardlevel, cc_cardname, cc_group_id, cc_status_name, cc_group_state, cc_stop_publish, cc_stop_card 
                                   FROM credit_card WHERE cc_group_id=:cc_group_id ", ['cc_group_id'=>$_POST['cc_group_id']]);
      for ($i=0; $i <count($row_cc_level) ; $i++) { 
        $row_cc_level[$i]['level_name']=$org_name[$row_cc_level[$i]['cc_cardorg']].'_'.$level_name[$row_cc_level[$i]['cc_cardlevel']];
      }
      echo json_encode($row_cc_level);
    }
  }



//------------ 撈信用卡(多張) ------------------
if ($_POST['type']=='show_cc_more') {

   $keyWords=empty($_POST['keywords']) ? '' : $_POST['keywords'];
   $row_cc_level= $pdo->select("SELECT cc_cardname, cc_group_id, cc_status_name, cc_group_state, cc_stop_publish, cc_stop_card
                                FROM credit_card 
                                WHERE 
                                cc_bi_pk=:cc_bi_pk AND 
                                cc_stop_publish='0' AND 
                                cc_stop_card='0' AND 
                                (cc_cardname LIKE :keyWords OR cc_interest_desc LIKE :keyWords) GROUP BY cc_group_id", 
                                ['cc_bi_pk'=>$_POST['cc_bi_pk'], 'keyWords'=>'%'.$keyWords.'%']);

   for ($i=0; $i <count($row_cc_level) ; $i++) { 
     $row_cc_level[$i]['level_name']=$org_name[$row_cc_level[$i]['cc_cardorg']].'_'.$level_name[$row_cc_level[$i]['cc_cardlevel']];
   }
   echo json_encode($row_cc_level);


}



//------------ 撈信用卡卡等(多張) ------------------
if ($_POST['type']=='show_cc_level_more') {
  
  //-- 發卡組織等名稱 --
   $org_name=[];
   $org=$pdo->select("SELECT Tb_index, org_nickname FROM card_org ORDER BY OrderBy ASC");
   foreach ($org as $org_one) {
    $org_name[$org_one['Tb_index']]=$org_one['org_nickname'];
   } 

    //-- 卡等名稱 --
   $level_name=[];
   $level=$pdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
   foreach ($level as $level_one) {
    $level_name[$level_one['Tb_index']]=$level_one['attr_name'];
   }

   $keyWords=empty($_POST['keywords']) ? '' : $_POST['keywords'];
   $row_cc_level= $pdo->select("SELECT cc.Tb_index as Tb_index, cc_cardorg, cc_cardlevel, cc_cardname, cc_group_id, cc_status_name, cc_group_state, cc_stop_publish, cc_stop_card
                                FROM credit_card as cc 
                                INNER JOIN card_org as org ON cc.cc_cardorg=org.Tb_index 
                                INNER JOIN card_level as level ON cc.cc_cardlevel=level.Tb_index 
                                WHERE 
                                cc_bi_pk=:cc_bi_pk AND 
                                cc_stop_publish='0' AND 
                                cc_stop_card='0' AND 
                                (cc_cardname LIKE :keyWords OR cc_interest_desc LIKE :keyWords OR org.org_nickname LIKE :keyWords OR level.attr_name LIKE :keyWords)", 
                                ['cc_bi_pk'=>$_POST['cc_bi_pk'], 'keyWords'=>'%'.$keyWords.'%']);

   for ($i=0; $i <count($row_cc_level) ; $i++) { 
     $row_cc_level[$i]['level_name']=$org_name[$row_cc_level[$i]['cc_cardorg']].'_'.$level_name[$row_cc_level[$i]['cc_cardlevel']];
   }
   echo json_encode($row_cc_level);


}

 	

 	
 }
?>