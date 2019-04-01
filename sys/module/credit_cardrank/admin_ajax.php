<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    
    //-- 撈信用卡 --
 	if ($_POST['type']=='show_cc') {
 		
 		//-- 信用卡群組 --
 		if (!empty($_POST['cc_bi_pk']) && empty($_POST['show_stop_cc'])) {
 			$row_cc_group= $pdo->select("SELECT Tb_index, cc_cardname, cc_group_id, cc_status_name, cc_group_state FROM credit_card WHERE cc_bi_pk=:cc_bi_pk AND (cc_group_state='0' OR cc_group_state='3') GROUP BY cc_group_id", ['cc_bi_pk'=>$_POST['cc_bi_pk']]);
 			echo json_encode($row_cc_group);
 		}
 		else{
 			$row_cc_group= $pdo->select("SELECT Tb_index, cc_cardname, cc_group_id, cc_status_name, cc_group_state FROM credit_card WHERE cc_bi_pk=:cc_bi_pk  GROUP BY cc_group_id", ['cc_bi_pk'=>$_POST['cc_bi_pk']]);
 			echo json_encode($row_cc_group);
 		}
 	}

 	//-- 改變信用卡狀態 --
 	elseif($_POST['type']=='ch_status'){

 	   $orglevel=explode(',', $_POST['orglevel']);
       
       switch ($_POST['cc_status']) {
       	case 0:
       	 $prame=['cc_status_name'=>'', 'cc_stop_publish'=>0, 'cc_stop_card'=>0];
       		break;
       	case 1:
       	 $prame=['cc_status_name'=>'停發', 'cc_stop_publish'=>1, 'cc_stop_card'=>0];
       		break;
       	case 2:
       	 $prame=['cc_status_name'=>'停卡', 'cc_stop_publish'=>0, 'cc_stop_card'=>1];
       		break;
       }
       
       $where=[
         'cc_cardorg'=> $orglevel[0],
         'cc_cardlevel'=> $orglevel[1],
         'cc_group_id'=>$_POST['cc_group_id']
       ];

       $pdo->update('credit_card', $prame, $where);

 	}

 	

 	
 }
?>