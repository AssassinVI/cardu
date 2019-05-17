<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
  
  $pdo=new PDO_fun;

  switch ($_POST['type']) {

  	//---------------------------------------------------------------- 信用卡前六名輪播 -----------------------------------------------------------------------
  	case 'slide_6_card':


  	  $row=$pdo->select("SELECT cc_group_id
  	                     FROM credit_card
  	                     WHERE cc_fun_id LIKE :cc_fun_id AND cc_group_state IN (0,3)
                         GROUP BY cc_group_id
                         ORDER BY cc_publish DESC
  	                     LIMIT 0,6" ,['cc_fun_id'=>'%'.$_POST['cc_fun_id'].'%']);
      $row_num=count($row);
      for ($i=0; $i <$row_num ; $i++) { 

        $row_card_group=$pdo->select("SELECT cc.cc_group_id, cc.cc_photo, 
                                             ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name
                                      FROM credit_card as cc
                                      INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel 
                                      INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                      WHERE cc.cc_group_id=:cc_group_id 
                                      ORDER BY level.OrderBy ASC
                                      LIMIT 0,1", ['cc_group_id'=>$row[$i]['cc_group_id']], 'one');
      

  	    $row[$i]['cc_photo']=empty($row_card_group['cc_photo']) ? 'CardSample.png':$row_card_group['cc_photo'];

        //-- 完整卡名(卡組) --
  	    $row[$i]['cc_cardname']=wp_is_mobile() ? mb_substr($row_card_group['bi_shortname'].$row_card_group['cc_cardname'], 0, 11) : mb_substr($row_card_group['bi_shortname'].$row_card_group['cc_cardname'], 0, 14);
        
        //-- 卡連結 --
  	    $row[$i]['cc_url']='../cardNews/type.php?gid='.$row_card_group['cc_group_id'];

      }
      echo json_encode($row);
  	break;
    //---------------------------------------------------------------- 信用卡前六名輪播 END -----------------------------------------------------------------------

  	default:
  	  echo "error";
  	break;
  }

  $pdo->close();
}
?>