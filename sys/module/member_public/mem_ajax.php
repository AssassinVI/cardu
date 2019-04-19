<?php
require_once '../../core/inc/config.php';
require_once '../../core/inc/function.php';

if ($_POST) {
  //-- 修改密碼 --
  if ($_POST['type']=='update_password') {
    pdo_update('user_data', ['ud_password'=>md5($_POST['ud_password'])], ['ud_pk'=>$_POST['ud_pk']]);
  }
  //-- 修改E-mail --
  elseif($_POST['type']=='update_email'){
    pdo_update('user_data', ['ud_email'=>$_POST['ud_email']], ['ud_pk'=>$_POST['ud_pk']]);
  }
  //-- 進行確認 --
  elseif($_POST['type']=='update_ud_active'){
    pdo_update('user_data', ['ud_active'=>$_POST['ud_active']], ['ud_pk'=>$_POST['ud_pk']]);
  }
  //-- 重發確認信 --
  elseif($_POST['type']=='re_mail'){
    $URL='http://'.$_SERVER['HTTP_HOST'];

    $row=pdo_select("SELECT ud_email, ud_nickname, ud_activekey FROM user_data WHERE ud_pk=:ud_pk", ['ud_pk'=>$_POST['ud_pk']]);
    
    $body_data='
     <table border="0" width="600">
       <tbody><tr>
         <td width="100%">
      <img src="http://www.cardu.com.tw/images/mail_head.gif" class="CToWUd">
         </td>
       </tr>
       <tr>
         <td width="100%" bgcolor="#E0E0E0"><br>
      感謝您加入《卡優新聞網》的會員<br>
      為確認您的資料正確性，請點擊下列網址進入確認畫面，即可成為《卡優網》會員<br>
      <a href="'.$URL.'/sys/module/member_public/member_confirm.php?k='.$row['ud_activekey'].'" target="_blank" >'.$URL.'/sys/module/member_public/member_confirm.php?k='.$row['ud_activekey'].'</a><p>
      (本確認信為系統自動寄發，請勿直接回覆本信函，<wbr>若您有相關問題，可進入 <a href="'.$URL.'" target="_blank">'.$URL.'</a> 查詢，<br>
      或E-mail至客服信箱: <a href="mailto:service@cardu.com.tw" target="_blank">service@cardu.com.tw</a>，《卡優新聞網》<wbr>將盡快為您服務)<br>
         </p></td>
       </tr>
     </tbody></table>
    ';
    send_Mail('卡優新聞網', 'paper@cardu.com.tw', $row['ud_nickname'].'的會員確認信', $body_data, [$row['ud_nickname']], [$row['ud_email']]);
  }
}

?>