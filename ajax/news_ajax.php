<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-- 主題分類6篇文章 --
	case 'subject_news':
     
     $news_type=empty($_POST['ns_nt_pk']) ? $_POST['ns_nt_sp_pk'] : $_POST['ns_nt_pk'];
	 $news_type_txt=empty($_POST['ns_nt_pk']) ? 'ns_nt_sp_pk=:news_type' : 'ns_nt_pk=:news_type';

      $row=$pdo->select("SELECT ns_ftitle,ns_photo_1,ns_msghtml FROM  appNews
                          where mt_id = 'site2018111910430599' and $news_type_txt
                          and ns_vfdate<>'0000-00-00 00:00:00' 
                          and  StartDate<=:today and EndDate>=:today
                          order by ns_vfdate desc
                          LIMIT 0, 6", ['news_type'=>$news_type, 'today'=>date('Y-m-d')]);
     echo json_encode($row);
	break;
	
	default:
		# code...
		break;
  }
}

?>