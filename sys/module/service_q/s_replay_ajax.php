<?php
 require_once '../../core/inc/config.php';
 require_once '../../core/inc/function.php';
 require_once '../../core/inc/security.php';
 require '../../core/inc/pdo_fun_calss.php';


 if ($_POST) {
   $pdo=new PDO_fun;
   $param=[
   	'sqm_status'=>$_POST['sqm_status'],
   	'sqm_rtext'=>$_POST['sqm_rtext'],
   	'sqm_rdate'=>date('Y-m-d H:i:s'),
   	'sqm_rkiman'=>$_SESSION['admin_name']
   ];
   $where=['sqm_pk'=>$_POST['sqm_pk']];
   $pdo->update('service_question_manage', $param, $where);
   
   if ($_POST['sqm_status']=='1') {
   	 $body_data='<p>
   	                親愛的'. $_POST['sqm_ud_nickname'] .'您好：<br>
   	                感謝您於卡優新聞網提供的資訊/建議，回覆如下：
   	               </p>
   	               <div style="background-color: #ddd; padding: 5px;">
   	                 發送時間：'.date('Y-m-d H:i:s').'<br>
   	                 <p style="border:1px solid #333;">
   	                  <b>內容：</b><br>
   	                  '.nl2br($_POST['sqm_ptext']).'
   	                 </p><br>
   	                 
   	                 <p style="border:1px solid #333;">
   	                   <b>回覆：</b><br>
   	                   '.nl2br($_POST['sqm_rtext']).'
   	                 </p>
   	               </div>
   	               <p>
   	                  此信件為系統自動發送，請勿直接回覆<br>
                      卡優新聞網感謝您的支持與建議，敬祝順心。
                    </p>';
   	   $name_data=[$_POST['sqm_ud_nickname']];
   	   $adds_data=[$_POST['sqm_mail']];
   	   send_Mail('卡優新聞網', 'paper@cardu.com.tw', '卡優新聞回覆：'.$_POST['sqm_title'], $body_data, $name_data, $adds_data);
   }
   
 }
?>