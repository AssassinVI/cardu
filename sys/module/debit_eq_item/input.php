<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM card_pref_img");
 $sql->execute();
 $num=1;
 // while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 // 	$Tb_index='pref'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
	// 		          'mt_id'=>'site2018110617521258',
	// 		          'pref_name'=>$row['cpi_preferential'],
	// 		          'pref_txt'=>$row['cpi_msgdesc'],
	// 		          'pref_image'=>$row['cpi_image'],
	// 		          'OrderBy'=>$row['cpi_sod'],
	// 		          'OnLineOrNot'=>$row['cpi_status']
	// 		         ];
	// pdo_insert('card_pref', $param);

	//  $num++;
 // }




?>