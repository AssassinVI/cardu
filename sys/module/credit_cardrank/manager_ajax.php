<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    
  //-- 撈卡排行 --
 	if ($_POST['type']=='show_one_rank') {
 		
    $row=$pdo->select("SELECT ccs_typename_03, ccs_cc_pk2 FROM credit_cardrank WHERE Tb_index=:Tb_index ORDER BY ccs_order ASC", ['Tb_index'=>$_POST['Tb_index']], 'one');
    echo json_encode($row);
 	}


 }
?>