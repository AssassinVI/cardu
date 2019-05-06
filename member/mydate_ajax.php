<?php
 require '../sys/core/inc/config.php';
 require '../sys/core/inc/function.php';
 require '../sys/core/inc/pdo_fun_calss.php';

 if ($_GET) {

   $pdo=NEW PDO_fun;

   $msg_type_color=['','#3F58B5','#D2A335','','#32A2BD'];
    
    //-- 會員收藏文章 --
  //   $where=['start_time'=>$_GET['start'], 'end_time'=>$_GET['end']];
 	// $row=$pdo->select("SELECT mf_type, msg_id, msg_title, msg_url, msg_end_time 
 	// 	               FROM my_favorites 
 	// 	               WHERE mem_id=:mem_id AND msg_delete=0 AND msg_disable=0 AND msg_end_time>=:start_time AND msg_end_time<=:end_time", $where);
 	// foreach ($row as $row_one) {
 		
 	// 	$calendar_arr[]=array(
 	//  		'id'=>$row_one['msg_id'],
 	//  		'type'=>$row_one['mf_type'],
 	//  		'url'=>$row_one['msg_url'],
 	//  		'title'=>$row_one['msg_title'],
 	//  		'start'=>$row_one['msg_end_time'],
 	//  		'end'=>$row_one['msg_end_time'],
 	//  		'allDay'=>true
 	//  	);
 	// }


   $calendar_arr[]=array(
 	 		'id'=>'12',
 	 		'color'=>$msg_type_color[1], //-- 判斷文章類型(顏色) --
 	 		'url'=>'http://cardu.srl.tw/webmap.html',
 	 		'title'=>'遊日血拼賺回饋 必備信用卡大公開~',
 	 		'start'=>'2019-04-25',
 	 		'end'=>'2019-04-25',
 	 		'allDay'=>true
 	 	);



   $calendar_arr[]=array(
 	 		'id'=>'13',
 	 		'color'=>$msg_type_color[2], //-- 判斷文章類型(顏色) --
 	 		'url'=>'http://cardu.srl.tw/webmap.html',
 	 		'title'=>'電子支付兩強爭霸戰　LINE Pay街口優惠比較',
 	 		'start'=>'2019-04-15',
 	 		'end'=>'2019-04-15',
 	 		'allDay'=>true
 	 	);

 	echo json_encode($calendar_arr);
 }
?>