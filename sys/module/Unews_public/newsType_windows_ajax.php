<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

  if ($_POST) {
  	 
  	 $pdo=new PDO_fun;
  	 $row_type=$pdo->select("SELECT nt_name, Tb_index FROM news_type WHERE unit_id=:unit_id", ['unit_id'=>$_POST['unit_id']]);
  	 echo  json_encode($row_type);
  }
?>