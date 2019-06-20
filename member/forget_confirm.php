<?php 
require '../share_area/conn.php';


if (strlen($_GET['k'])>20) {

  $row=$pdo->select("SELECT ud_userid, ud_nickname, ud_email ,ud_password_new
                     FROM user_data 
                     WHERE ud_pk=:ud_pk AND ud_activekey=:ud_activekey", 
                     ['ud_pk'=>$_GET['p'], 'ud_activekey'=>$_GET['k']], 'one');

  if (empty($row['ud_userid'])) {
  	location_up('/footer/contact_report.php', '驗證碼錯誤，請與我們客服人員聯絡');
  	exit();
  }

  $pdo->update('user_data', ['ud_password'=>$row['ud_password_new']], ['ud_activekey'=>$_GET['k']]);
  

  location_up('member.php', '新密碼已啟動，請使用新密碼登入會員，修改密碼');
}
else{
 
 location_up('/member/my404.php');
}


?>