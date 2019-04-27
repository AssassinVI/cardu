<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-- 信用卡快搜(信用卡組) --
	case 'ccard_group':
     $row=$pdo->select("SELECT cc_group_id, cc_cardname FROM credit_card WHERE cc_bi_pk=:cc_bi_pk AND cc_group_state IN (0,3) GROUP BY cc_group_id", ['cc_bi_pk'=>$_POST['cc_bi_pk']]);
     echo json_encode($row); 
	break;
	
	default:
		# code...
		break;
  }
}

?>