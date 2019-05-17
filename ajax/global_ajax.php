<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-- 立即辦卡+1 --
	case 'apply_card':
     $pdo->select("UPDATE credit_cardrank SET ccs_cc_assigncount=ccs_cc_assigncount+1 WHERE ccs_cc_pk=:ccs_cc_pk AND ccs_cc_so_pk=:ccs_cc_so_pk", ['ccs_cc_pk'=>$_POST['cc_id'], 'ccs_cc_so_pk'=>$_POST['ccrank_type']]);
     
     $row_one_date=$pdo->select("SELECT COUNT(*) as total FROM credit_cardrank_count WHERE ccr_id=:ccr_id AND ccr_date=:ccr_date", ['ccr_id'=>$_POST['ccrank_type'], 'ccr_date'=>date('Y-m-d')], 'one');
     if ($row_one_date['total']>0) {
     	$pdo->select("UPDATE credit_cardrank_count SET assigncount=assigncount+1 WHERE ccr_id=:ccr_id AND ccr_date=:ccr_date", ['ccr_id'=>$_POST['ccrank_type'], 'ccr_date'=>date('Y-m-d')]);
     }
     else{
     	$param=[
          'Tb_index'=>'ccro'.date('YmdHis').rand(0,99),
          'ccr_id'=>$_POST['ccrank_type'],
          'ccr_date'=>date('Y-m-d'),
          'assigncount'=>1,
          'create_time'=>date('Y-m-d H:i:s')
     	];
     	$pdo->insert('credit_cardrank_count', $param);
     }
	break;
	
	default:
		# code...
		break;
  }
}

?>