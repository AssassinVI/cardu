<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;

   if ($_POST['type']=='del_store') {//刪除

    $where=array('Tb_index'=>$_POST['store_id']);
   	$del_row=$pdo->select('SELECT st_logo FROM store WHERE Tb_index=:Tb_index', $where, 'one');
   	
   	if (isset($del_row['st_logo'])) { unlink('../../img/'.$del_row['st_logo']); }
   	 $pdo->delete('store', $where);
   }
 	
 }
?>