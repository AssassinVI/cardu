<?php 
require '../share_area/conn.php';


if (strlen($_GET['k'])>20) {

  $row=$pdo->select("SELECT ud_userid, ud_nickname, ud_email  FROM user_data WHERE ud_activekey=:ud_activekey", ['ud_activekey'=>$_GET['k']], 'one');

  if (empty($row['ud_userid'])) {
  	location_up('/footer/contact_report.php', '驗證碼錯誤，請與我們客服人員聯絡');
  	exit();
  }

  $pdo->update('user_data', ['ud_active'=>1], ['ud_activekey'=>$_GET['k']]);

  $body_data='
  <table border="0" width="600">
  <tbody><tr>
    <td width="100%">
     <img src="'.$URL.'/img/component/unnamed.gif" class="CToWUd">
    </td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#E0E0E0"><br>
      感謝您註冊成為《卡優新聞網》(<a href="'.$URL.'" target="_blank">'.$URL.'</a>)的會員，
      您已可使用《卡優新聞網》的各項服務<p>

  以下是您註冊帳號<br>
  請妥為保管及熟記，避免遺失或遭他人盜用<br>
  帳號：'.$row['ud_userid'].'<br>
  暱稱：'.$row['ud_nickname'].'<br>
  E-mail：<a href="mailto:'.$row['ud_email'].'" target="_blank">'.$row['ud_email'].'</a><br>
    <br>
    並請加入＜<a href="https://www.facebook.com/cardu.tw/" target="_blank" >卡優新聞網粉絲專頁</a>＞，<wbr>掌握更多即時的卡好康與優情報資訊<br>
    歡迎至卡優新聞網  討論區，進行<a href="http://www.cardu.com.tw/phpBB2/index.php" target="_blank" >報到</a>程序，讓更多會員與您互動、交流<br>
  <br>
    由於本網站之個人密碼採高度保密系統，若您忘記密碼，<wbr>需重新申請，請至本網 <a href="'.$URL.'/member/password.php" target="_blank" >忘記密碼</a>，以帳號、身份證字號申請密碼。</p><p>

  (本確認信為系統自動寄發，請勿直接回覆本信函，<wbr>若您有相關問題，可進入 <a href="'.$URL.'" target="_blank" >'.$URL.'</a> 查詢，<br>
  或E-mail至客服信箱: <a href="mailto:service@starwin.com.tw" target="_blank">service@starwin.com.tw</a>，《卡優新聞網》<wbr>將盡快為您服務)<br>
    </p><p></p></td>
  </tr>
  </tbody></table>';
  
  send_Mail('卡優新聞網', 'paper@cardu.com.tw', $row['ud_nickname'].'的會員註冊成功信', $body_data, [$row['ud_nickname']], [$row['ud_email']]);

  location_up('/index.php', '已確認您的信箱，感謝您的加入');
}
else{
 
 location_up('/member/my404.php');
}


?>