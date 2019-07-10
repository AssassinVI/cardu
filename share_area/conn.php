<?php 
if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'){
    Header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}
 require dirname(__FILE__).'/../sys/core/inc/config.php';
 require dirname(__FILE__).'/../sys/core/inc/function.php';
 require dirname(__FILE__).'/../sys/core/inc/pdo_fun_calss.php';
 //-- 前台特殊用 --
 require dirname(__FILE__).'/../share_area/func.php';

   $URL='https://'.$_SERVER['HTTP_HOST'];
   $FB_URL='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

   $pdo=new PDO_fun;



   if ($_GET) {
     //-- 會員登出 --
     if (isset($_GET['logout'])) {
       
       unset($_SESSION['ud_pk']);
       unset($_SESSION['ud_nickname']);
       unset($_SESSION['ud_photo']);
       setcookie('ud_pk', '', time()-3600000,'/');
       location_up('/index.php', '已登出會員');
     }
   }

   


   // ----- 驗證cookie 登入 -----
   if (isset($_COOKIE['ud_pk']) && !isset($_GET['logout'])) {
     check_cookie_login($_COOKIE['ud_pk']);
   }



   //------- 會員登入 --------------
   if (!empty($_POST['login'])) {


   	 if (!empty($_POST['ud_userid_lg']) ) {
       
   	   $row_login=$pdo->select("SELECT ud_pk, ud_nickname, ud_photo, ud_userid, ud_active
   	   	                        FROM user_data 
   	   	                        WHERE ud_userid=:ud_userid AND ud_password=:ud_password",
   	   	                        ['ud_userid'=>$_POST['ud_userid_lg'], 'ud_password'=>md5($_POST['ud_password_lg'])], 'one');

       if (!empty($row_login['ud_pk'])) {
         
         //-- 判斷有無啟用會員 --
         if ($row_login['ud_active']=='0') {
           location_up('/index.php', '您的會員未啟用，請先到註冊信箱點擊確認信裡的連結，以啟用會員');
           exit();
         }

         //-- 記住帳號 --
         if (!empty($_POST['remember_id'])) {
           setcookie('remember_id', $row_login['ud_userid'], time()+3600000, '/');
         }
         else{
           setcookie('remember_id', '', time()-3600000, '/');
         }

         $_SESSION['ud_pk']=$row_login['ud_pk'];
         $_SESSION['ud_nickname']=$row_login['ud_nickname'];
         $_SESSION['ud_photo']=$row_login['ud_photo'];

         $pdo->select("UPDATE user_data SET ud_logintime=:ud_logintime, ud_loginip=:ud_loginip, ud_logincnt=ud_logincnt+1 WHERE ud_pk=:ud_pk", 
                       ['ud_logintime'=>date('Y-m-d H:i:s'), 'ud_loginip'=>user_ip(), 'ud_pk'=>$row_login['ud_pk']]);

         location_up($FB_URL, $_SESSION['ud_nickname'].'歡迎登入~');
       }
       else{
        location_up($FB_URL, '帳號或密碼錯誤，請重新登入');
       }

   	 }
     else{
       location_up($FB_URL, '請輸入您的帳號密碼');
     }

   }
?>