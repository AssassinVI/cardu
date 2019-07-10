<?php
 require '../share_area/conn.php';

 if ($_GET) {

   $pdo=NEW PDO_fun;

   $msg_type_color=['','#3F58B5','#D2A335','','#32A2BD'];
   $calendar_arr=[];
    //-- 會員收藏文章 --
 	$row=$pdo->select("SELECT n.mt_id, n.ns_nt_pk, n.area_id, n.EndDate as n_e_date, note.EndDate as note_e_date, note.note_type, cc.cc_group_id,
                              aa.at_name, mf.mf_msg_pk, mf.mf_msg_title, mf.mf_create_time, mf.mf_pk
                       FROM my_favorite as mf 
                       LEFT JOIN NewsAndType as n ON n.Tb_index=mf.mf_msg_pk
                       LEFT JOIN appNotice as note ON note.Tb_index=mf.mf_msg_pk
                       LEFT JOIN credit_card as cc ON cc.Tb_index=mf.mf_msg_pk
                       LEFT JOIN appArea as aa ON aa.Tb_index=n.area_id
                       WHERE mf.mf_ud_pk=:mf_ud_pk 
                       ORDER BY mf.mf_create_time DESC", ['mf_ud_pk'=>$_SESSION['ud_pk']]);
 	foreach ($row as $row_one) {
        
        //-- 新聞 --
 		if (strpos($row_one['mf_msg_pk'], 'news')!==FALSE) {
 		  $url=news_url($row_one['mt_id'], $row_one['mf_msg_pk'], $row_one['ns_nt_pk'], $row_one['area_id']);
 		  $calendar_arr[]=array(
 	 		'id'=>$row_one['mf_msg_pk'],
 	 		'color'=>'#3F58B5',
 	 		'url'=>$url,
 	 		'title'=>$row_one['mf_msg_title'],
 	 		'start'=>$row_one['n_e_date'],
 	 		'end'=>$row_one['n_e_date'],
 	 		'allDay'=>true
 	 	);
 		}
 		//-- 公告活動 --
 		elseif(strpos($row_one['mf_msg_pk'], 'note')!==FALSE){
 		  $url=$row_one['note_type']=='0' ? '../member/notify_detail.php?'.$row_one['mf_msg_pk'] : '../member/event_activity_detail.php?'.$row_one['mf_msg_pk'];
 		  $calendar_arr[]=array(
 	 		'id'=>$row_one['mf_msg_pk'],
 	 		'color'=>'#3F58B5',
 	 		'url'=>$url,
 	 		'title'=>$row_one['mf_msg_title'],
 	 		'start'=>$row_one['note_e_date'],
 	 		'end'=>$row_one['note_e_date'],
 	 		'allDay'=>true
 	 	);
 		}
 		//-- 信用卡 --
 		elseif(strpos($row_one['mf_msg_pk'], 'ccard')!==FALSE){
 		  $url='../card/creditcard.php?cc_pk='.$row_one['mf_msg_pk'].'&cc_group_id='.$row_one['cc_group_id'];
 		  $type_name='信用卡';
 		}
 	}



 	//-- 信用卡帳單繳款截止日 --
 	$row_bill=$pdo->select("SELECT mbd.mbd_expdate, mbd.mbd_amount, mb.mb_bill_name, mbd.mbd_pk, mb.mb_pk
 		                    FROM my_billing_detail as mbd
 		                    INNER JOIN my_billing as mb ON mb.mb_pk=mbd.mbd_mb_pk
 		                    INNER JOIN bank_info as bi ON bi.Tb_index=mb.mb_bill_bi_pk OR bi.old_id=mb.mb_bill_bi_pk
 		                    WHERE mbd.mbd_ud_pk=:mbd_ud_pk", ['mbd_ud_pk'=>$_SESSION['ud_pk']]);
    foreach ($row_bill as $bill_one) {
    	
    	array_push($calendar_arr, 
    		array(
       		'id'=>$bill_one['mbd_pk'],
       		'color'=>'#D2A335',
       		'url'=>'../member/mybill_history.php?mb_pk='.$bill_one['mb_pk'],
       		'title'=>$bill_one['mb_bill_name'].' $'.$bill_one['mbd_amount'],
       		'start'=>$bill_one['mbd_expdate'],
       		'end'=>$bill_one['mbd_expdate'],
       		'allDay'=>true
       	   ));
      	  
    }


 	echo json_encode($calendar_arr);
 }
?>