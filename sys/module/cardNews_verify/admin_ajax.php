<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';
 
 if ($_POST) {
   $pdo=new PDO_fun;

   if (!empty($_POST['area_id'])) {

     //-- 優旅行 --
   	 if ($_POST['area_id']=='at2019011117461656') {

        $unit_arr=[];
        $row_unit=$pdo->select("SELECT Tb_index, un_name FROM appUnit");
        foreach ($row_unit as $unit_one) {
        	$unit_arr[$unit_one['Tb_index']]=$unit_one['un_name'];
        }

   	 	$row_type=$pdo->select("SELECT Tb_index, unit_id, nt_name FROM news_type WHERE area_id=:area_id ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id']]);
   	 	$row_type_num=$pdo->select("SELECT COUNT(*) as num FROM news_type WHERE area_id=:area_id", ['area_id'=>$_POST['area_id']], 'one');

   	 	for ($i=0; $i <(int)$row_type_num['num'] ; $i++) { 
   	 		$row_type[$i]['nt_name']='['.$unit_arr[$row_type[$i]['unit_id']].'] '.$row_type[$i]['nt_name'];
   	 	}
        echo json_encode($row_type);
   	 }

   	 //-- 其他 --
   	 else{
   	   	 $row_type=$pdo->select("SELECT Tb_index, nt_name FROM news_type WHERE area_id=:area_id ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id']]);
   	     echo json_encode($row_type);
   	 }
   	 
   }
 }
 
?>