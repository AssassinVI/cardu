<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM news_use_tag");
 $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 // 	$Tb_index='label'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
	// 		          'lb_name'=>$row['nut_tag']
	// 		         ];
	// pdo_insert('search_label', $param);

	//  $num++;
 }




?>