<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    


    //-- 撈信用卡 --
 	if ($_POST['type']=='show_dc') {
 		
 		//-- 正常使用 --
 		if (!empty($_POST['dc_bi_pk']) && empty($_POST['show_stop_dc'])) {
 			$row_dc_group= $pdo->select("SELECT Tb_index, dc_cardname, dc_group_id, dc_group_state FROM debit_card WHERE dc_bi_pk=:dc_bi_pk AND (dc_group_state='0' OR dc_group_state='3') GROUP BY dc_group_id", ['dc_bi_pk'=>$_POST['dc_bi_pk']]);
 			echo json_encode($row_dc_group);
 		}
    //-- 停發/停卡 --
 		else{
 			$row_dc_group= $pdo->select("SELECT Tb_index, dc_cardname, dc_group_id, dc_group_state FROM debit_card WHERE dc_bi_pk=:dc_bi_pk  GROUP BY dc_group_id", ['dc_bi_pk'=>$_POST['dc_bi_pk']]);
 			echo json_encode($row_dc_group);
 		}
 	}
  



  //-- 撈信用卡卡等 --
  elseif($_POST['type']=='show_dc_level'){

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
    if (!empty($_POST['dc_bi_pk']) && empty($_POST['show_stop_dc'])) {
      $row_dc_level= $pdo->select("SELECT Tb_index, dc_debitorg, dc_debitlevel, dc_cardname, dc_group_id, dc_group_state, dc_stop_publish, dc_stop_card 
                                   FROM debit_card WHERE dc_group_id=:dc_group_id AND dc_stop_publish='0' AND dc_stop_card='0'", ['dc_group_id'=>$_POST['dc_group_id']]);

      for ($i=0; $i <count($row_dc_level) ; $i++) { 
        $row_dc_level[$i]['level_name']=$org_name[$row_dc_level[$i]['dc_debitorg']].$level_name[$row_dc_level[$i]['dc_debitlevel']];
      }
      echo json_encode($row_dc_level);
    }
    //-- 停發/停卡 --
    else{
      $row_dc_level= $pdo->select("SELECT Tb_index, dc_debitorg, dc_debitlevel, dc_cardname, dc_group_id, dc_group_state, dc_stop_publish, dc_stop_card 
                                   FROM debit_card WHERE dc_group_id=:dc_group_id ", ['dc_group_id'=>$_POST['dc_group_id']]);
      for ($i=0; $i <count($row_dc_level) ; $i++) { 
        $row_dc_level[$i]['level_name']=$org_name[$row_dc_level[$i]['dc_debitorg']].$level_name[$row_dc_level[$i]['dc_debitlevel']];
      }
      echo json_encode($row_dc_level);
    }
  }


 	

 	
 }
?>