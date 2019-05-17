<?php 
 require dirname(__FILE__).'/../sys/core/inc/config.php';
 require dirname(__FILE__).'/../sys/core/inc/function.php';
 require dirname(__FILE__).'/../sys/core/inc/pdo_fun_calss.php';
 //-- 前台特殊用 --
 require dirname(__FILE__).'/../share_area/func.php';

   $URL='https://'.$_SERVER['HTTP_HOST'];
   $FB_URL='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

   $pdo=new PDO_fun;
?>