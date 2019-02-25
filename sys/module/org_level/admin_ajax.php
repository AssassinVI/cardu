<?php 
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 if ($_POST) {
 	
 	if ($_POST['switch']=='on') {
 		$parem=[
 			'Tb_index'=>'ol'.date('YmdHis').rand(0,99),
 			'org_id'=>$_POST['org_id'],
 			'level_id'=>$_POST['level_id']
 		];
 		pdo_insert('org_level', $parem);
 	}
 	else{
 		$where=[
 			'org_id'=>$_POST['org_id'],
 			'level_id'=>$_POST['level_id']
 		];
 		pdo_delete('org_level', $where);
 	}
 }
?>