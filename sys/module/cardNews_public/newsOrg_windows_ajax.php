<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

if ($_POST && isset($_POST['type'])) {

 	$pdo=new PDO_fun;
   
  //-- 撈取已有信用卡、金融卡的卡群組卡等 --
  if ($_POST['type']=='org_level') {
    
    $row=$pdo->select("SELECT org.Tb_index as org_id, org.org_nickname, level.Tb_index as level_id, level.attr_name
                       FROM org_level as org_le 
                       INNER JOIN card_org as org ON org_le.org_id=org.Tb_index 
                       INNER JOIN card_level as level ON org_le.level_id=level.Tb_index 
                       WHERE org.mt_id=:mt_id ORDER BY org.OrderBy ASC, level.OrderBy ASC", ['mt_id'=>$_POST['card_type']]);

    foreach ($row as $row_one) {
      $row_group[$row_one['org_nickname']][]=$row_one;
    }

    echo json_encode($row_group);
  }

 }
?>