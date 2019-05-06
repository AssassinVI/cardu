<?php session_start();
//尚未load出舊照片
//尚未標千還未排除disable的
//目前暫時用tb_index進入的內容頁
require '../share_area/conn.php';
require '../share_area/get_news.php';

$todayis=date("Y-m-d"); //取得要查詢的日期，預設為今日
$mt_id="site2019011116095854";//優區
$area_id="at2019011117341414";//優行動Pay
 if (wp_is_mobile()) {
  include("index_mobile.php");
 }
 else{
  include("index_pc.php");
 }


?>