<?php 
 require 'sys/core/inc/config.php';
 require 'sys/core/inc/function.php';
 require 'sys/core/inc/pdo_fun_calss.php';
 //-- 前台用FUN --
 require 'share_area/func.php';

   $URL='http://'.$_SERVER['HTTP_HOST'];
   $FB_URL='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

   $pdo=new PDO_fun;

   if (wp_is_mobile()) {
     include 'index_mobile.php';
   }
   else{
     
     include 'index_pc.php';
   }
?>