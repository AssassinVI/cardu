<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-- 首頁次版區切換 --
	case 'news_tap_ch':

      //-- 內容 --
      if (!empty($_POST['nt_id'])) {
        $where_sql="(ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)";
        $where=['ns_nt_pk'=>$_POST['nt_id'], 'ns_nt_ot_pk'=>'%'.$_POST['nt_id'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')];
      }
      else{
        
        $ns_nt_ot_pk='';
        $row_nt=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id=:unit_id", ['unit_id'=>$_POST['un_id']]);
        foreach ($row_nt as $row_nt_one) {
          $ns_nt_ot_pk.=" ns_nt_ot_pk LIKE '%".$row_nt_one['Tb_index']."%' OR ";
        }
        $ns_nt_ot_pk=substr($ns_nt_ot_pk, 0,-3);
        $where_sql="(unit_id=:unit_id OR ".$ns_nt_ot_pk.")";
        $where=['unit_id'=>$_POST['un_id'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')];
      }

      $row_cn=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_photo_1, area_id
                   FROM NewsAndType
                   WHERE ".$where_sql." AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                   ORDER BY ns_vfdate DESC LIMIT 0,6", $where);



      $slide_txt='';

      for ($i=0; $i <2 ; $i++) { 

        $news_txt='';
        
        for ($j=0; $j <3 ; $j++) { 
          $index=($i*3)+$j;
          $ns_ftitle=mb_substr($row_cn[$index]['ns_ftitle'], 0,14, 'utf-8');
          //-------------- 網址判斷 ------------------
          $news_url=news_url($row_cn[$index]['mt_id'], $row_cn[$index]['Tb_index'], $row_cn[$index]['ns_nt_pk'], $row_cn[$index]['area_id']);
          
          $news_txt.='
          <div class="col-4 cards-3">
          <a href="'.$news_url.'">
              <div class="img_div" title="'.$row_cn[$index]['ns_ftitle'].'" style="background-image: url(sys/img/'.$row_cn[$index]['ns_photo_1'].');">
              </div>
              <p>'.$ns_ftitle.'</p>
          </a>
          </div>';
        }

          $slide_txt.='
          <div class="swiper-slide">
          <div class="row no-gutters show">
            '.$news_txt.'
          </div>
        </div>';
      }

      $content_txt='<div class="news_list_div show" tab="'.$_POST['tab_link'].'">
                       <div class="swiper-container sub_slide">
                          <div class="swiper-wrapper">
                          '.$slide_txt.'
                          </div>

                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                       </div>
                     </div>';
      echo $content_txt;

	break;
  
  //------------------ 人氣排行切換(手機板) ------------------------
  case 'favorite_card_ph':
   
   //-- 新卡人氣排行 --
   if ($_POST['tap']=='pop_card') {

       $row_new_card=$pdo->select("SELECT bc.card_group_id
                                   FROM appNews_bank_card as bc
                                   INNER JOIN appNews as news ON bc.news_id=news.Tb_index
                                   WHERE news.ns_nt_pk='nt201902121004593' AND news.ns_verify=3 AND news.ns_vfdate >=:month_ago
                                   GROUP BY bc.card_group_id
                                   ORDER BY news.ns_viewcount DESC, news.ns_mobvecount DESC
                                   LIMIT 0,6", ['month_ago'=>date('Y-m-d H:i:s',strtotime('-3 month'))]);
       $x=1;
       foreach ($row_new_card as $new_card_one) {
         
         $row_car_d=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name, cc.cc_interest_desc, cc.cc_doc_url, cc.cc_doc_path
                                  FROM credit_card as cc
                                  INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                  INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                  WHERE cc.cc_group_id=:cc_group_id
                                  ORDER BY level.OrderBy ASC
                                  LIMIT 0,1", ['cc_group_id'=>$new_card_one['card_group_id']], 'one');

         
         //-- 卡名 --
         // $card_name=$row_car_d['bi_shortname'].'_'.$row_car_d['cc_cardname'].'_'.$row_car_d['org_nickname'].$row_car_d['attr_name'];
         $card_name=$row_car_d['bi_shortname'].'_'.$row_car_d['cc_cardname'];
         //-- 卡特色 --
         $card_adv_txt='';
         $card_adv=preg_split('/\n/',$row_car_d['cc_interest_desc']);
         for ($i=0; $i <3 ; $i++) { 
           $card_adv_txt.= mb_substr($card_adv[$i], 0,10,'utf-8').'<br>';

         }
         
         //-- 立即辦卡 --
         if (!empty($row_car_d['cc_doc_url'])) {
           $cc_doc='<a target="_blank" href="'.$row_car_d['cc_doc_url'].'" class="btn btn-orange btnOver">立即辦卡</a>';
         }
         elseif(!empty($row_car_d['cc_doc_path'])){
           $cc_doc='<a target="_blank" href="'.$row_car_d['cc_doc_path'].'" class="btn btn-orange btnOver">立即辦卡</a>';
         }
         else{
           $cc_doc='';
         }
         //-- 卡片圖 --
         $cc_photo=empty($row_car_d['cc_photo']) ? 'CardSample.png':$row_car_d['cc_photo'];

         echo '
         <div class="swiper-slide">
          <div class=" hv-center">
              <a href="card/creditcard.php?cc_pk='.$row_car_d['Tb_index'].'&cc_group_id='.$row_car_d['cc_group_id'].'" title="'.$card_name.'">
              <span class="top_Medal">'.$x.'</span><img src="sys/img/'.$cc_photo.'" alt="'.$card_name.'"><p>'.$card_name.'</p>
              </a>
          </div>
          <div class="card_txt">
              <p>
                 '.$card_adv_txt.'
              </p>
          </div>
          <div class="card_btn  hv-center">
              '.$cc_doc.'
          </div>
        </div>';
       $x++; }
   }


   //-- 辦卡人氣排行 --
   elseif($_POST['tap']=='add_card'){
      //-------------------------------------------- 新卡人氣排行 ---------------------------------------------------------
       $row_add_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                        cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                 FROM credit_cardrank as ccr
                                 INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                 INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                 WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                 ORDER BY ccrc.assigncount DESC 
                                 LIMIT 0,6", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

       $x=1;
       foreach ($row_add_card as $add_card_one){

         //-- 卡名 --
         // $card_name=$add_card_one['bi_shortname'].'_'.$add_card_one['cc_cardname'].'_'.$add_card_one['org_nickname'].$add_card_one['attr_name'];
            $card_name=$add_card_one['bi_shortname'].'_'.$add_card_one['cc_cardname'];
         //-- 卡特色 --
         $card_adv_txt='';
         $card_adv=preg_split('/\n/',$add_card_one['cc_interest_desc']);
         for ($i=0; $i <3 ; $i++) { 
           $card_adv_txt.=mb_substr($card_adv[$i], 0,10,'utf-8').'<br>';
         }
         //-- 立即辦卡 --
         if (!empty($add_card_one['cc_doc_url'])) {
           $cc_doc='<a target="_blank" href="'.$add_card_one['cc_doc_url'].'" class="btn btn-orange btnOver">立即辦卡</a>';
         }
         elseif(!empty($add_card_one['cc_doc_path'])){
           $cc_doc='<a target="_blank" href="'.$add_card_one['cc_doc_path'].'" class="btn btn-orange btnOver">立即辦卡</a>';
         }
         else{
           $cc_doc='';
         }
         //-- 卡片圖 --
         $cc_photo=empty($add_card_one['cc_photo']) ? 'CardSample.png':$add_card_one['cc_photo'];

         echo '
         <div class="swiper-slide">
          <div class=" hv-center">
              <a href="card/creditcard.php?cc_pk='.$add_card_one['Tb_index'].'&cc_group_id='.$add_card_one['cc_group_id'].'" title="'.$card_name.'">
              <span class="top_Medal">'.$x.'</span><img src="sys/img/'.$cc_photo.'" alt="'.$card_name.'"><p>'.$card_name.'</p>
              </a>
          </div>
          <div class="card_txt">
              <p>
                 '.$card_adv_txt.'
              </p>
          </div>
          <div class="card_btn  hv-center">
              '.$cc_doc.'
          </div>
        </div>';
       $x++; }
   }


   //-- 點閱人氣排行 --
   elseif($_POST['tap']=='point_card'){
     $row_view_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                      cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                               FROM credit_cardrank as ccr
                               INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                               INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                               WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                               ORDER BY ccrc.viewcount DESC 
                               LIMIT 0,3", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
     $x=1;
     foreach ($row_view_card as $add_view_one){
       
       //-- 卡名 --
       //$card_name=$add_view_one['bi_shortname'].'_'.$add_view_one['cc_cardname'].'_'.$add_view_one['org_nickname'].$add_view_one['attr_name'];
       $card_name=$add_view_one['bi_shortname'].'_'.$add_view_one['cc_cardname'];
       //-- 卡特色 --
       $card_adv_txt='';
       $card_adv=preg_split('/\n/',$add_view_one['cc_interest_desc']);
       for ($i=0; $i <3 ; $i++) { 
         $card_adv_txt.=mb_substr($card_adv[$i], 0,10,'utf-8').'<br>';
       }
       //-- 立即辦卡 --
       if (!empty($add_view_one['cc_doc_url'])) {
         $cc_doc='<a target="_blank" href="'.$add_view_one['cc_doc_url'].'" class="btn btn-orange btnOver">立即辦卡</a>';
       }
       elseif(!empty($add_view_one['cc_doc_path'])){
         $cc_doc='<a target="_blank" href="'.$add_view_one['cc_doc_path'].'" class="btn btn-orange btnOver">立即辦卡</a>';
       }
       else{
         $cc_doc='';
       }
       //-- 卡片圖 --
       $cc_photo=empty($add_view_one['cc_photo']) ? 'CardSample.png':$add_view_one['cc_photo'];

        echo '
        <div class="swiper-slide">
         <div class=" hv-center">
             <a href="card/creditcard.php?cc_pk='.$add_view_one['Tb_index'].'&cc_group_id='.$add_view_one['cc_group_id'].'" title="'.$card_name.'">
             <span class="top_Medal">'.$x.'</span><img src="sys/img/'.$cc_photo.'" alt="'.$card_name.'"><p>'.$card_name.'</p>
             </a>
         </div>
         <div class="card_txt">
             <p>
                '.$card_adv_txt.'
             </p>
         </div>
         <div class="card_btn  hv-center">
             '.$cc_doc.'
         </div>
       </div>';

      $x++;}
   }
  break;
	
	default:
	 echo "error";
		break;
  }
}

?>