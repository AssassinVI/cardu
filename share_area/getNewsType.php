<?php 
//先取出卡好康底下的分類，再從優行動pay的分類中
$pdo_OLD=pdo_conn();
$sql_type=$pdo_OLD->prepare($sql_type_temp);
$sql_type->execute();
$row_types = $sql_type->fetchAll();

foreach ($row_types as $row_type) {
   $type_all_id.="'".$row_type['Tb_index']."',";
}
$type_all_id = substr($type_all_id, 0, -1); //去掉最後一碼，
?>