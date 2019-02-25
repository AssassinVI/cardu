<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST && !empty($_POST['ns_label'])) {

 	$ns_label_arr=explode(',', $_POST['ns_label']);

 	$sql_query='';
 	$param_arr=[];
 	$ns_label_arr_count=count($ns_label_arr);

 	for ($i=0; $i <$ns_label_arr_count ; $i++) { 
 	   $sql_query.=' lb_name LIKE :lb_name'.$i.' OR ';
       $param_arr=array_merge($param_arr, ['lb_name'.$i=>'%'.$ns_label_arr[$i].'%']);
 	}

 	$sql_query=substr($sql_query, 0,-3);
 	
 	$pdo=new PDO_fun;
 	$row_label= $pdo->select("SELECT lb_name FROM search_label WHERE ".$sql_query." ORDER BY lb_num DESC, lb_name ASC", $param_arr);
    echo json_encode($row_label);
 }
?>