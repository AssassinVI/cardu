<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    
    //-- 撈信用卡 --
 	if ($_POST['type']=='show_dc') {
 		
 		//-- 信用卡群組 --
 		if (!empty($_POST['dc_bi_pk']) && empty($_POST['show_stop_dc'])) {
 			$row_dc_group= $pdo->select("SELECT Tb_index, dc_cardname, dc_group_id, dc_group_state FROM debit_card WHERE dc_bi_pk=:dc_bi_pk AND (dc_group_state='0' OR dc_group_state='3') GROUP BY dc_group_id", ['dc_bi_pk'=>$_POST['dc_bi_pk']]);
 			echo json_encode($row_dc_group);
 		}
 		else{
 			$row_dc_group= $pdo->select("SELECT Tb_index, dc_cardname, dc_group_id, dc_group_state FROM debit_card WHERE dc_bi_pk=:dc_bi_pk  GROUP BY dc_group_id", ['dc_bi_pk'=>$_POST['dc_bi_pk']]);
 			echo json_encode($row_dc_group);
 		}
 	}

 	//-- 改變信用卡狀態 --
 	elseif($_POST['type']=='ch_status'){

 	   $orglevel=explode(',', $_POST['orglevel']);
       
       switch ($_POST['dc_status']) {
       	case 0:
       	 $prame=[ 'dc_stop_publish'=>0, 'dc_stop_card'=>0];
       		break;
       	case 1:
       	 $prame=[ 'dc_stop_publish'=>1, 'dc_stop_card'=>0];
       		break;
       	case 2:
       	 $prame=[ 'dc_stop_publish'=>0, 'dc_stop_card'=>1];
       		break;
       }
       
       $where=[
         'dc_debitorg'=> $orglevel[0],
         'dc_debitlevel'=> $orglevel[1],
         'dc_group_id'=>$_POST['dc_group_id']
       ];

       $pdo->update('debit_card', $prame, $where);

 	}

 	

 	
 }
?>