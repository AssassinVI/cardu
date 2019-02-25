<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM card_level");
 $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 // 	$Tb_index='level'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
 // 	                  'mt_id'=>'site2018110611041573',
	// 		          'attr_name'=>$row['cl_name'],
	// 		          'OrderBy'=>$row['cl_sod'],
	// 		         'OnLineOrNot'=>$row['cl_status']

	// 		         ];
	// pdo_insert('card_attr', $param);

	//  $num++;
 }




?>