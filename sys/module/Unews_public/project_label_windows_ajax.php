<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST && !empty($_POST['add_proj_label'])) {
    
    $pdo=new PDO_fun;
 	$row_label= $pdo->select("SELECT lb_name FROM project_label WHERE lb_name=:lb_name ORDER BY lb_name ASC", ['lb_name'=>$_POST['add_proj_label']], 'one');
 	if (empty($row_label['lb_name'])) {
       $Tb_index='pl'.date('YmdHis').rand(0,99);
 	   $param=[
 	   	'Tb_index'=>$Tb_index,
 	   	'nt_id'=>$_POST['nt_id'],
 	   	'lb_type'=>$_POST['lb_type'],
 	   	'lb_name'=>$_POST['add_proj_label']
 	   ];
 	   $pdo->insert('project_label', $param);
 	   echo json_encode($param);
 	}
 	else{
 	  echo "error";
 	}
 }
?>