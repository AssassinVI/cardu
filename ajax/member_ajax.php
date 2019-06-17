<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-- 驗證會員帳號是否重複 --
	case 'check_userid':
     
     $row=$pdo->select("SELECT COUNT(*) as num FROM user_data WHERE ud_userid=:ud_userid", ['ud_userid'=>$_POST['ud_userid']], 'one');
     echo $row['num'];
     
	break;

	//-- 驗證暱稱是否重複 --
	case 'check_ud_nickname':
     
     $row=$pdo->select("SELECT COUNT(*) as num FROM user_data WHERE ud_nickname=:ud_nickname", ['ud_nickname'=>$_POST['ud_nickname']], 'one');
     echo $row['num'];
     
	break;

	//-- 驗證E-mail是否重複 --
	case 'check_ud_email':
     
     $row=$pdo->select("SELECT COUNT(*) as num FROM user_data WHERE ud_email=:ud_email", ['ud_email'=>$_POST['ud_email']], 'one');
     echo $row['num'];
     
	break;

	//-- FB或google 資料加密 --
	case 'F_G_aes_encrypt':
      
      echo aes_encrypt($aes_key, $_POST['id']);

	break;

	//-- FB 和 GOOGLE 登入 --
	case 'FB_G_login':

     $row=$pdo->select("SELECT COUNT(*) as num, ud_pk, ud_nickname, ud_photo FROM user_data WHERE ud_email=:ud_email", ['ud_email'=>$_POST['ud_email']], 'one');
     echo $row['num'];

     setcookie('ud_pk', $row['ud_pk'], time()+3600000, '/');
     $_SESSION['ud_pk']=$row['ud_pk'];
     $_SESSION['ud_nickname']=$row['ud_nickname'];
     $_SESSION['ud_photo']=$row['ud_photo'];

	break;
	
	default:
		# code...
		break;
  }
}
?>