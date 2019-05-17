<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>卡優新聞網-理財、消費、支付卡資訊網站</title>
    
    <meta name="theme-color" content="#253b8e" />
    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta property="fb:admins" content="100000121777752" />
    <meta property="fb:admins" content="100008160723180" />
    <meta property="fb:app_id" content="616626501755047" />
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="https://www.cardu.com.tw" />
      
      
    <?php 
     require 'share_area/index_m/share_css.php';
    ?>



  </head>
  <body>

    <?php
       //-- 共用 Header -- 
       require 'share_area/index_m/header.php';
    ?>

    <div class="container-fluid top-space">
      
    
      <div class="row no-gutters tab-3">
        <div class="col-12 big_slide_tab">
          <div class="news_slide">
            
            <div class="swiper-container ">
                <div class="swiper-wrapper">

                  <?php 
                   //--- 新聞 Banner (NewsAndType view檢視表)---
                   $row_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, nt_name, pk
                                           FROM  NewsAndType
                                           where mt_id = 'site2018111910430599' AND ns_vfdate<>'0000-00-00 00:00:00' AND ns_verify=3 
                                           AND  StartDate<=:StartDate AND EndDate>=:EndDate
                                           order by ns_vfdate desc
                                           LIMIT 0, 10", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                   $x=1;
                   $slide_txt='';
                   foreach ($row_news as $row_news_one) {
                    
                     $url=news_url($row_news_one['mt_id'], $row_news_one['Tb_index'], $row_news_one['ns_nt_pk'], $row_news_one['area_id']);
                     $ns_ftitle=mb_substr($row_news_one['ns_ftitle'], 0,20,'utf-8');
                     $slide_txt.='
                                <div class="swiper-slide blue_tab" style="background-image: url(sys/img/'.$row_news_one['ns_photo_1'].');">
                                  <div class=" title top_hole py-1">
                                    <a href="news/list.php?nt_pk='.$row_news_one['pk'].'">'.$row_news_one['nt_name'].'</a>
                                  </div>
                                  <a href="'.$url.'">
                                      <div  class="word shadow_text">'.$ns_ftitle.'...</div>
                                  </a>
                                </div>';
                     
                     //-- 廣告 --
                     if ($x%2==0) {
                       $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../img/component/slide_photo1.jpg);"> 
                                    <a href="#" title="廣告">
                                        <div class="word shadow_text" >我是廣告</div>
                                    </a>
                                  </div>';
                     }

                   $x++;
                   }
                   echo $slide_txt;
                  ?>
                </div>
                <!-- 如果需要分页器 -->
                <!-- <div class="swiper-pagination"></div> -->
                <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>
            </div>

          </div>
        </div>
        <div class="col-12">
          <div class="row no-gutters small_slide_tab">
            <div class="col-6 ">
              <div class="tab_one other_slide">
                <div class="swiper-container">
                <div class="swiper-wrapper">

                  <?php 
                   //--- 卡情報 Banner (NewsAndType view檢視表)---
                   $row_cardNews=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, nt_name, pk
                                           FROM NewsAndType
                                           WHERE mt_id='site201901111555425' AND ns_nt_pk!='nt2019021210051224' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                           ORDER BY ns_vfdate DESC LIMIT 0,10", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                   $x=1;
                   $slide_txt='';
                   foreach ($row_cardNews as $row_cardNews_one) {
                    
                     $url=news_url($row_cardNews_one['mt_id'], $row_cardNews_one['Tb_index'], $row_cardNews_one['ns_nt_pk'], $row_cardNews_one['area_id']);
                     $titl_url=$row_cardNews_one['ns_nt_pk']=='nt201902121004593' ? 'card/new_card_list.php' : 'message/list.php?mt_pk='.$row_cardNews_one['pk'];
                     $ns_ftitle=mb_substr($row_cardNews_one['ns_ftitle'], 0,10,'utf-8');
                     $slide_txt.='
                               

                                <div class="swiper-slide img_div brown_tab" style="background-image: url(sys/img/'.$row_cardNews_one['ns_photo_1'].');"> 
                                  <div class=" title top_hole">
                                    <a href="'.$titl_url.'">'.$row_cardNews_one['nt_name'].'</a>
                                  </div>
                                  <a class="w-h-100 d-block" href="'.$url.'" title="'.$row_cardNews_one['ns_ftitle'].'">
                                      <div  class=" word shadow_text" >'.$ns_ftitle.'</div>
                                  </a>
                                </div>';
                     
                     //-- 廣告 --
                     if ($x%2==0) {
                       $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../img/component/slide_photo1.jpg);"> 
                                    <a class="w-h-100 d-block" href="#" title="廣告">
                                        <div class="word shadow_text" >我是廣告</div>
                                    </a>
                                  </div>';
                     }

                   $x++;
                   }
                   echo $slide_txt;
                  ?>
                    
                </div>
                
              </div>
              </div>
              
            </div>
            <div class="col-6">
              <div class="tab_one other_slide">
                <div class="swiper-container">
                <div class="swiper-wrapper">
                  <?php 
                   //--- 優情報 Banner (NewsAndType view檢視表)---
                   $row_Unews=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, nt_name, pk
                                           FROM NewsAndType
                                           WHERE mt_id='site2019011116095854' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                           ORDER BY ns_vfdate DESC LIMIT 0,10", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                   $x=1;
                   $slide_txt='';
                   foreach ($row_Unews as $row_Unews_one) {
                    
                     $url=news_url($row_Unews_one['mt_id'], $row_Unews_one['Tb_index'], $row_Unews_one['ns_nt_pk'], $row_Unews_one['area_id']);
                     $titl_url=$row_Unews_one['ns_nt_pk']=='nt201902121004593' ? 'card/new_card_list.php' : 'message/list.php?mt_pk='.$row_Unews_one['pk'];

                     //-- 版區顏色 --
                     switch ($row_Unews_one['area_id']) {
                       //-- 優行動pay --
                       case 'at2019011117341414':
                        $area_color='blueGreen_tab';
                        $titl_url='mpay/list.php?pk='.$row_Unews_one['pk'];
                       break;
                       //-- 優票證 --
                       case 'at2019011117435970':
                         $area_color='pink_tab';
                         $titl_url='eticket/list.php?pk='.$row_Unews_one['pk'];
                       break;
                       //-- 優集點 --
                       case 'at2019011117443626':
                         $area_color='brown_tab';
                         $titl_url='epoint/list.php?pk='.$row_Unews_one['pk'];
                       break;
                       //-- 優旅行 --
                       case 'at2019011117461656':
                         $area_color='green_tab';
                         $titl_url='travel/list.php?pk='.$row_Unews_one['pk'];
                       break;
                     }

                     $ns_ftitle=mb_substr($row_Unews_one['ns_ftitle'], 0,10,'utf-8');
                     $slide_txt.='
                                <div class="swiper-slide img_div '.$area_color.'" style="background-image: url(sys/img/'.$row_Unews_one['ns_photo_1'].');"> 
                                  <div class=" title top_hole">
                                    <a href="'.$titl_url.'">'.$row_Unews_one['nt_name'].'</a>
                                  </div>
                                  <a class="w-h-100 d-block" href="'.$url.'" title="'.$row_Unews_one['ns_ftitle'].'">
                                      <div  class=" word shadow_text" >'.$ns_ftitle.'</div>
                                  </a>
                                </div>';
                     
                     //-- 廣告 --
                     if ($x%2==0) {
                       $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../img/component/slide_photo1.jpg);"> 
                                    <a class="w-h-100 d-block" href="#" title="廣告">
                                        <div class="word shadow_text" >我是廣告</div>
                                    </a>
                                  </div>';
                     }

                   $x++;
                   }
                   echo $slide_txt;
                  ?>
                   
                </div>
                
              </div>
              </div>
              
            </div>
          </div>
        </div>
        
      </div>

      <!--廣告-->
      <div class="p-8px"><img class="w-100" src="http://srl.tw/cardu_m/img/component/AD3.png" alt="banner"></div><!--banner end -->

      
      <!-- 卡排行 -->
      <div id="iCardRanking" class="cardshap">
         <div class="card_rank row no-gutters">
           <div class="col-12">
             <div class="card_fun w-h-100 hole">
                 <div class=" mt-05">
                     <img src="img/component/card_rank_logo.png" alt=""> <span class="mb-0 mt-025">卡排行</span>
                     <a class="tab_link" href="rank/rank.php"></a>
                 </div>
             </div>  
           </div>
           <div class="col-12">
            <div class="swiper_div">
               <div class="swiper-container">
                 <div class="swiper-wrapper">
                  <?php 
                    //-- 卡排行分類 --
                    $row_cc_type=$pdo->select("SELECT Tb_index, cc_so_cname, cc_so_photo_1, cc_so_photo_1_hover, old_id
                                               FROM credit_cardrank_type 
                                               WHERE cc_so_status=1 ORDER BY cc_so_order ASC");
                    $x=1;
                    foreach ($row_cc_type as $rct_one) {
                      $active=$x==1 ? 'active':'';
                      $active_img=$x==1 ? $rct_one['cc_so_photo_1_hover']:$rct_one['cc_so_photo_1'];
                      $cardrank_url=wp_is_mobile() ? 'javascript:;' :'second.php?'.$rct_one['old_id'].'" title="'.$rct_one['cc_so_cname'];
                      echo '
                      <div class="swiper-slide '.$active.'" index="'.$x.'" Tb_index="'.$rct_one['Tb_index'].'" > 
                       <div class="text-center"  >
                          <a href="'.$cardrank_url.'">
                            <img src="../sys/img/'.$active_img.'" alt="'.$rct_one['cc_so_cname'].'" > <br> '.$rct_one['cc_so_cname'].'
                          </a>
                        </div>
                      </div>';
                      $x++;
                    }
                  ?>
                 </div>

             </div>

             <!-- 如果需要导航按钮 -->
                 <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                 <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>

            </div>
           </div>
         </div>

         <div class="ccard ccard_rank">
             
            <div class="swiper-container">
                <div class="swiper-wrapper">

                  <?php 
                     //-- 現金回饋 隨機(無條件/有條件) --
                     $rand_cc_so_pk=['r_type201904010959361', 'r_type201904010959362'];
                     $row_ccard_rank=$pdo->select("SELECT ccs_cc_cardname, ccs_cc_pk, ccs_cc_group_id
                                                   FROM credit_cardrank 
                                                   WHERE ccs_cc_so_pk=:ccs_cc_so_pk ORDER BY ccs_order ASC LIMIT 0,6", ['ccs_cc_so_pk'=>$rand_cc_so_pk[rand(0,1)]]);
                     $x=1;
                     foreach ($row_ccard_rank as $rcr_one) {
                       //-- 單卡 --
                       if (!empty($rcr_one['ccs_cc_pk'])) {
                          $row_ccard=$pdo->select("SELECT cc_photo FROM credit_card WHERE Tb_index=:Tb_index", ['Tb_index'=>$rcr_one['ccs_cc_pk']], 'one');
                       }
                       //-- 卡組 --
                       else{
                          $row_ccard=$pdo->select("SELECT cc_photo 
                                                   FROM credit_card as cc
                                                   INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                   WHERE cc_group_id=:cc_group_id 
                                                   ORDER BY level.OrderBy ASC
                                                   LIMIT 0,1", ['cc_group_id'=>$rcr_one['ccs_cc_group_id']], 'one');
                       }

                       //-- 卡片圖 --
                       $cc_photo=empty($row_ccard['cc_photo']) ? 'CardSample.png':$row_ccard['cc_photo'];

                       $ccs_cc_cardname=explode(']', $rcr_one['ccs_cc_cardname']);
                       $ccs_cc_shortname=mb_strlen($ccs_cc_cardname[1],'utf-8')>10 ? mb_substr($ccs_cc_cardname[1], 0,10,'utf-8'):$ccs_cc_cardname[1];

                       $cc_url=!empty($rcr_one['ccs_cc_pk']) ? '../cardNews/creditcard.php?cc_pk='.$rcr_one['ccs_cc_pk'].'&cc_group_id='.$rcr_one['ccs_cc_group_id'] : '../cardNews/type.php?gid='.$rcr_one['ccs_cc_group_id'];
                       echo '
                       <div class="swiper-slide">
                          <div class="w-h-100 hv-center">
                            <a href="'.$cc_url.'" title="'.$ccs_cc_cardname[1].'"><span class="top_Medal">'.$x.'</span><img src="../sys/img/'.$cc_photo.'" alt="'.$ccs_cc_cardname[1].'"><br>'.$ccs_cc_shortname.'</a>
                          </div>
                       </div>';
                      $x++;
                     }
                  ?>

                </div>
                                                  
            </div>

            <!-- 如果需要导航按钮 -->
            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
         </div>
      </div>
      <!-- 卡排行 END -->

      <!-- 新卡訊 -->
      <div class="cardshap tab_one brown_tab">
                           <div class="title_tab hole">
                               <i class="icon" style="background-image: url(img/component/icon/icon5.png); background-size: 100%;"></i><h4>新卡訊</h4>
                               <a class="tab_link" href="card/new_card_list.php"></a>
                           </div>
                          
                               <div class="accordion" id="new_card">
                                 <?php 
                                  $row_card_new=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                     cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo
                                                              FROM appNews as n 
                                                              INNER JOIN appNews_bank_card as nbc ON nbc.news_id=n.Tb_index
                                                              INNER JOIN cc_detail as cc ON cc.cc_group_id=nbc.card_group_id
                                                              WHERE ns_nt_pk='nt201902121004593' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                              AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                              GROUP BY cc.cc_group_id
                                                              ORDER BY ns_vfdate DESC 
                                                              LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                  $x=1;
                                  foreach ($row_card_new as $card_new) {

                                    //-- 卡名 --
                                    $card_name=$card_new['bi_shortname'].'-'.$card_new['cc_cardname'];
                                    //-- 卡特色 --
                                    $card_adv_txt='';
                                    $card_adv=preg_split('/\n/',$card_new['cc_interest_desc']);
                                    $card_adv_num=count($card_adv) >3 ? 3:count($card_adv);
                                    for ($i=0; $i <$card_adv_num ; $i++) { 
                                      $card_adv_txt.='<li>'.mb_substr($card_adv[$i], 0,15,'utf-8') .'</li>';
                                    }
                                    
                                    //-- 卡片圖 --
                                    $cc_photo=empty($card_new['cc_photo']) ? 'CardSample.png':$card_new['cc_photo'];

                                    $show=$x==1 ? 'show':'';
                                    
                                    echo '
                                  <div class="card">
                                   <div class="card-header" id="heading'.$x.'">
                                     <h5 class="mb-0">
                                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$x.'" aria-expanded="true" aria-controls="collapse'.$x.'">
                                         '.$card_name.'
                                       </button>
                                     </h5>
                                   </div>

                                   <div id="collapse'.$x.'" class="collapse '.$show.'" aria-labelledby="heading'.$x.'" data-parent="#new_card">
                                     <div class="card-body">
                                       <div class="card_one">
                                         <a href="card/creditcard.php?cc_pk='.$card_new['Tb_index'].'&cc_group_id='.$card_new['cc_group_id'].'" title="'.$card_name.'">
                                          <img src="sys/img/'.$cc_photo.'" alt=""> <br>
                                          '.$card_name.'
                                         </a>
                                       </div>
                                       <ul class="card_info star_li">
                                           '.$card_adv_txt.'
                                       </ul>
                                       <a class="card_more" href="card/creditcard.php?cc_pk='.$card_new['Tb_index'].'&cc_group_id='.$card_new['cc_group_id'].'">more</a>
                                     </div>
                                   </div>
                                 </div>';
                                  $x++; }
                                 ?>
                               </div>
                       </div>
                    <!-- 新卡訊 END -->

      <!--廣告-->
      <div class="p-8px"><img class="w-100" src="http://srl.tw/cardu_m/img/component/AD3.png" alt="banner"></div><!--banner end -->



      <!-- 卡情報 -->
      <div class="cardshap tab_one brown_tab">
          <div class="title_tab hole">
              <i class="icon" style="background-image: url(img/component/icon/icon5.png); background-size: 100%;"></i><h4>卡情報</h4>
              <a class="tab_link" href="card/card.php"></a>
          </div>
                          
           <div class="row no-gutters tab-3">
            <?php 
              //-- 套用 share_area/fun.php 首頁 卡情報、優票證、優旅行 fun --
              index_html_fun1('un2019011716580977', 'un2019011716575635'); 
            ?>
           </div>                    
      </div>
      <!-- 卡情報 END -->


      <!-- 人氣排行 -->
      <div id="iCardRanking" class="cardshap tab_one orange_tab favorite_card">
                          <div class="tab_menu row no-gutters">
                             <div class="col-12">
                                <div class="title_tab hole">
                                  <i class="icon" style="background-image: url(img/component/icon/icon11.png); background-size: 95%;"></i><h4>人氣排行</h4>
                                </div>
                             </div> 
                             <div class="col-12">
                                <div class="swiper-container swiper-tag">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"><a class="active" href="javascript:;" tap="pop_card">新卡人氣排行</a></div>
                                        <div class="swiper-slide"><a href="javascript:;" tap="add_card">辦卡人氣排行</a></div>
                                        <div class="swiper-slide"><a href="javascript:;" tap="point_card">點閱人氣排行</a></div>
                                    </div>
                                </div>
                            </div>
                          </div>

                          <div class="content_tab ccard popularity">


                           <div class="swiper-container swiper-card">
                               <div class="swiper-wrapper ">

                                <?php 
                                  //-------------------------------------------- 新卡人氣排行 ---------------------------------------------------------

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
                                ?>

                                   
                               </div>

                           </div>

                           <!-- 如果需要导航按钮 -->
                           <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                           <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>

                           

                          </div>
                        </div>
      <!-- 人氣排行 END -->


      <!-- 優行動Pay -->
      <div class="cardshap tab_one blueGreen_tab">
          <div class="title_tab hole">
              <i class="icon" style="background-image: url(img/component/icon/icon6.png); background-size: 100%;"></i><h4>優行動Pay</h4>
              <a class="tab_link" href="mpay/mpay.php"></a>
          </div>
                          
           <div class="row no-gutters tab-3">
             <?php 
              //-- 套用 share_area/fun.php 首頁 優行動pay、優集點 fun --
              index_html_fun2('at2019011117341414');
             ?>
           </div>                    
      </div>
      <!-- 優行動Pay END -->


      <!-- 優票證 -->
      <div class="cardshap tab_one pink_tab">
          <div class="title_tab hole">
              <i class="icon" style="background-image: url(img/component/icon/icon8.png); background-size: 67%;"></i><h4>優票證</h4>
              <a class="tab_link" href="eticket/eticket.php"></a>
          </div>
                          
           <div class="row no-gutters tab-3">
             <?php 
               //-- 套用 share_area/fun.php 首頁 卡情報、優票證、優旅行 fun --
               index_html_fun1('un2019011717541797', 'un2019011717541054'); 
             ?>
           </div>                    
      </div>
      <!-- 優票證 END -->



      <!-- 優集點 -->
      <div class="cardshap tab_one dark_brown_tab">
          <div class="title_tab hole">
              <i class="icon" style="background-image: url(img/component/icon/icon9.png); background-size: 100%;"></i><h4>優集點</h4>
              <a class="tab_link" href="epoint/epoint.php"></a>
          </div>
                          
           <div class="row no-gutters tab-3">
             
              <?php 
               //-- 套用 share_area/fun.php 首頁 優行動pay、優集點 fun --
               index_html_fun2('at2019011117443626');
              ?>
             
           </div>                    
      </div>
      <!-- 優集點 END -->


      <!-- 優旅行 -->
      <div class="cardshap tab_one green_tab">
          <div class="title_tab hole">
              <i class="icon" style="background-image: url(img/component/icon/icon10.png); background-size: 100%;"></i><h4>優旅行</h4>
              <a class="tab_link" href="travel/index.php"></a>
          </div>
                          
           <div class="row no-gutters tab-3">
             <?php 
               //-- 套用 share_area/fun.php 首頁 卡情報、優票證、優旅行 fun --
               index_html_fun1('un2019011717563437', 'un2019011717571414'); 
             ?>
           </div>                    
      </div>
      <!-- 優旅行 END -->

      <!--浮動廣告-->
      <div class="ad_fixed_ph">
        <div class="swiper-container sub_ph_slide">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="#"><img class="w-100" src="../img/component/20190430112646-1.jpg" alt=""></a>
                </div>
                <div class="swiper-slide">
                   <a href="#"><img class="w-100" src="../img/component/20181016094907-1.gif" alt=""></a>
                </div>
            </div>
            
            <!-- 如果需要导航按钮 -->
            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        </div>
      </div>
       
    </div>

   
  <?php 
    //-- 共用footer --
    require 'share_area/index_m/footer.php';
   ?>


   <?php 
    //-- 共用JS --
    require 'share_area/index_m/share_js.php';
   ?>

  </body>
</html>