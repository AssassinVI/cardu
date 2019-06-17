<?php 
 require 'share_area/conn.php';

   if (wp_is_mobile()) {
     include 'index_mobile.php';
   }
   else{
     
     include 'index_pc.php';
   }
?>