<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST && !empty($_POST['type'])) {
   
   //-- 刪除新聞 --
   if ($_POST['type']=='delete') {

    $where=['Tb_index'=>$_POST['Tb_index']];

   	$del_row=pdo_select('SELECT ns_photo_1, ns_photo_2 FROM appNews WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['ns_photo_1'])) { unlink('../../img/'.$del_row['ns_photo_1']); }
    if (isset($del_row['ns_photo_2'])) { unlink('../../img/'.$del_row['ns_photo_2']); }


   	 pdo_delete('appNews', $where);
    
   }
 }
?>