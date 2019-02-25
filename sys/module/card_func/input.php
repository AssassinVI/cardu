<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM card_func_img");
 $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 // 	$Tb_index='fun'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
	// 		          'mt_id'=>'site2018110517362644',
	// 		          'fun_name'=>$row['cfi_function'],
	// 		          'fun_txt'=>$row['cfi_msgdesc'],
	// 		          'card_image'=>$row['cfi_image'],
	// 		          'card_image_hover'=>$row['cfi_image_hover'],
	// 		          'OrderBy'=>$row['cfi_sod'],
	// 		          'OnLineOrNot'=>$row['cfi_status']
	// 		         ];
	// pdo_insert('card_func', $param);

	//  $num++;
 }




?>