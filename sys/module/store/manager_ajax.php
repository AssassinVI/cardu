<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;

 	//-- 主分類 --
 	if (!empty($_POST['st_type'])) {
 		$row_st_type= $pdo->select("SELECT Tb_index, st_name FROM store_type_main WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$_POST['st_type']]);
 		echo json_encode($row_st_type);
 	}
 	
 	//-- 次分類 --
 	if (!empty($_POST['st_main_type'])) {
 		$row_st_type= $pdo->select("SELECT Tb_index, st_name FROM store_type_second WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$_POST['st_main_type']]);
 		echo json_encode($row_st_type);
 	}
 	
 }
?>