<?php 
require '../share_area/conn.php';

if ($_POST) {
	
   if ($_POST['type']=='online') {
   	
   	 $bank_row=$pdo->select("SELECT * FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['Tb_index']]);
   	 echo json_encode($bank_row);
   }
}

$pdo=NULL;
?>