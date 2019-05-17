<?php session_start();
//尚未load出舊照片
//尚未標千還未排除disable的
//目前暫時用tb_index進入的內容頁
require '../share_area/conn.php';
require '../share_area/get_news.php';
require 'config.php';


 if (wp_is_mobile()) {
  include("index_mobiie.php");
 }
 else{
  include("index_pc.php");
 }



?>