<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();
 $sql=$pdo->prepare("SELECT * FROM bank_info_OLD");
 $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 	$Tb_index='bank'.date('YmdHis').$num; 

 // 	$param=  [        'Tb_index'=>$Tb_index,
	// 		          'bi_code'=>$row['bi_code'],
	// 		          'bi_fullname'=>$row['bi_fullname'],
	// 		          'bi_shortname'=>$row['bi_shortname'],

	// 		          'bi_logo'=>$row['bi_logo'],
			               
	// 		         'bi_area'=>$row['bi_area'],
	// 		         'bi_tel'=>$row['bi_tel'],
	// 		         'bi_fax'=>$row['bi_fax'],
	// 		         'bi_city'=>$row['bi_city'],
	// 		         'bi_zipcode'=>$row['bi_zipcode'],
	// 		         'bi_addr'=>$row['bi_addr'],
	// 		         'bi_tel_card'=>$row['bi_tel_card'],
	// 		         'bi_tel2_card'=>$row['bi_tel2_card'],
	// 		         'bi_tel3_card'=>$row['bi_tel3_card'],
	// 		         'bi_tel_lost'=>$row['bi_tel_lost'],
	// 		         'bi_bank_url'=>$row['bi_bank_url'],
	// 		         'bi_card_url'=>$row['bi_card_url'],
	// 		         'bi_desc'=>$row['bi_desc'],
			        
	// 		         'bi_msg_assign_title'=>$row['bi_msg_assign_title'],
	// 		         'bi_msg_assign_url'=>$row['bi_msg_assign_url'],
	// 		         'bi_contact_name'=>$row['bi_contact_name'],
	// 		         'bi_contact_tel'=>$row['bi_contact_tel'],
	// 		         'bi_contact_email'=>$row['bi_contact_email'],
	// 		         'bi_contact_job'=>$row['bi_contact_job'],
			          
	// 		         'OnLineOrNot'=>$row['bi_status']

	// 		         ];
	// pdo_insert('bank_info', $param);

	 $num++;
 }




?>