<?php 
 require 'conn.php';

 if ($_POST) {
 	
 	//-- 轉寄 --
 	if ($_POST['type']=='send_mail') {
 		//-- GOOGLE recaptcha 驗證程式 --
 		GOOGLE_recaptcha('6Le2HRIUAAAAAJJbt4e5F6g6yuW-FmSAYg--3R43', $_POST['g-recaptcha-response'], 'send_mail.php');

 		 $body_data='
 		 <img style="width:100px;" src="'.$URL.'/img/component/logo.png" alt=""><br>
         <p>Hi，您好! <br> 您的朋友 '.$_POST['name'].' 從 卡優新聞網 轉寄了一則訊息給您：</p>
         <h3><a href="'.$_POST['send_news_url'].'">'.$_POST['send_news'].'</a></h3>
         <p>全文網址: <a href="'.$_POST['send_news_url'].'">'.$_POST['send_news_url'].'</a></p>';
 		  
 		  $fd_mail=explode(',', $_POST['fd_mail']);
 		  $name_data=[];
 		  for ($i=0; $i <count($fd_mail) ; $i++) { 
 		  	$name_data[$i]='好友'.($i+1);
 		  }
 		 
 		  send_Mail('paper', 'server@srl.tw', $_POST['name'].'轉寄了一則訊息給您', $body_data, $name_data, $fd_mail);

 		  echo "send";
 	}

    //-- 回報錯誤 --
 	else{

     //-- GOOGLE recaptcha 驗證程式 --
 	 GOOGLE_recaptcha('6Le2HRIUAAAAAJJbt4e5F6g6yuW-FmSAYg--3R43', $_POST['g-recaptcha-response'], 'send_error.php');

 	     $body_data='
 		 <img style="width:100px;" src="'.$URL.'/img/component/logo.png" alt=""><br>
         <p>
           回報者姓名:'.$_POST['name'].'<br>
           回報者Email:'.$_POST['my_mail'].'<br>
           回報新聞:<a href="'.$_POST['send_news_url'].'">'.$_POST['send_news'].'</a><br>
           錯誤內容:'.$_POST['error_content'].'<br>
           正確內容:'.$_POST['correct_content'].'<br>
           正確出處:'.$_POST['correct_url'].'<br>
         </p>
         ';
 		  
 		  
 		  $adds_data=['d974252037@gmail.com'];
 		  $name_data=['卡優管理員'];
 		 
 		  send_Mail('paper', 'server@srl.tw', '卡優新聞網-錯誤回報', $body_data, $name_data, $adds_data);

 		  echo "send";
 	}
 }
?>