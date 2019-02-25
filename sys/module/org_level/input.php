<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM card_orgOLD");
 $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 // 	$Tb_index='org'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
	// 		          'mt_id'=>'site2018110611172385',
	// 		          'org_name'=>$row['co_org'],
	// 		          'org_nickname'=>$row['co_name'],
	// 		          'org_image'=>$row['co_logo'],
	// 		          'OrderBy'=>$row['co_sod'],
	// 		          'OnLineOrNot'=>$row['co_status']
	// 		         ];
	// pdo_insert('card_org', $param);

	//  $num++;
 }




?>