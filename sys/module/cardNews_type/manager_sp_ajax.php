<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 
 if ($_POST) {
  if (!empty($_POST['Tb_index'])) {
  	pdo_select("UPDATE news_type SET nt_sp_idx='0'", 'no');
  	pdo_update('news_type', ['nt_sp_idx'=>'1'], ['Tb_index'=> $_POST['Tb_index'] ]);
  }
 }
 
?>