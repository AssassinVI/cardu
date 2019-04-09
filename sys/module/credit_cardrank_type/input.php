<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM credit_cardrank_typeOLD");
 $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 // 	$Tb_index='r_type'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
	// 		          'cc_so_cname'=>$row['cc_so_cname'],
	// 		          'cc_so_photo_1'=>$row['cc_so_photo_1'],
	// 		          'cc_so_photo_1_hover'=>$row['cc_so_photo_1_hover'],
	// 		          'cc_so_order'=>$row['cc_so_order'],
	// 		          'cc_so_status'=>$row['cc_so_status'],
	// 		          'cc_so_show_order_icon'=>$row['cc_so_show_order_icon'],
	// 		          'cc_so_del_flag'=>$row['cc_so_del_flag'],
	// 		          'cc_so_type_01_cname'=>$row['cc_so_type_01_cname'],
	// 		          'cc_so_type_02_cname'=>$row['cc_so_type_02_cname'],
	// 		          'cc_so_type_02_order'=>$row['cc_so_type_02_order'],
	// 		          'cc_so_type_03_cname'=>$row['cc_so_type_03_cname'],
	// 		          'cc_so_type_03_order'=>$row['cc_so_type_03_order'],
	// 		          'cc_so_viewcount'=>$row['cc_so_viewcount'],
	// 		          'cc_so_create_time'=>$row['cc_so_create_time'],
	// 		          'cc_so_delete_time'=>$row['cc_so_delete_time'],
	// 		          'cc_so_update_time'=>$row['cc_so_update_time']
	// 		         ];
	// pdo_insert('credit_cardrank_type', $param);

	//  $num++;
 }




?>