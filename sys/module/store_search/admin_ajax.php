<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;

 	//-- 商店 --
 	if (!empty($_POST['st_type'])) {
 		$row_st_type= $pdo->select("SELECT Tb_index, st_name FROM store WHERE st_type=:st_type ORDER BY OrderBy ASC", ['st_type'=>$_POST['st_type']]);
 		echo json_encode($row_st_type);
 	}

 	
 }
?>