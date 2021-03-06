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
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     require 'share_area/index_m/share_css.php';
    ?>



  </head>
  <body>

    <?php
       //-- 共用 Header -- 
       require 'share_area/phone/header.php';
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
                <div class="swiper-pagination"></div>
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
                   //--- 卡情報 (刷卡整理) Banner (NewsAndType view檢視表)---
                   $row_cardNews=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, nt_name, pk
                                           FROM NewsAndType
                                           WHERE mt_id='site201901111555425' AND unit_id='un2019011716580977' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                           ORDER BY ns_vfdate DESC LIMIT 0,5", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                   $x=1;
                   $slide_txt='';
                   foreach ($row_cardNews as $row_cardNews_one) {
                    
                     $url=news_url($row_cardNews_one['mt_id'], $row_cardNews_one['Tb_index'], $row_cardNews_one['ns_nt_pk'], $row_cardNews_one['area_id']);

                     if (empty($row_cardNews_one['pk'])) {
                       $titl_url=$row_cardNews_one['ns_nt_pk']=='nt201902121004593' ? 'card/new_card_list.php' : 'message/list.php?mt_pk='.$row_cardNews_one['ns_nt_pk'];
                     }
                     else{
                       $titl_url=$row_cardNews_one['ns_nt_pk']=='nt201902121004593' ? 'card/new_card_list.php' : 'message/list.php?mt_pk='.$row_cardNews_one['pk'];
                     }
                     
                     $ns_ftitle=mb_substr($row_cardNews_one['ns_ftitle'], 0,10,'utf-8');
                     $slide_txt.='
                               

                                <div class="swiper-slide img_div brown_tab" style="background-image: url(sys/img/'.$row_cardNews_one['ns_photo_1'].');"> 
                                  <div class=" title top_hole">
                                    <a href="card/card.php">卡情報</a>
                                  </div>
                                  <a class="w-h-100 d-block" href="'.$url.'" title="'.$row_cardNews_one['ns_ftitle'].'">
                                      <div  class=" word shadow_text" >'.$ns_ftitle.'</div>
                                  </a>
                                </div>';
                     
                     //-- 廣告 --
                     // if ($x%2==0) {
                     //   $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../img/component/slide_photo1.jpg);"> 
                     //                <a class="w-h-100 d-block" href="#" title="廣告">
                     //                    <div class="word shadow_text" >我是廣告</div>
                     //                </a>
                     //              </div>';
                     // }

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
                   $row_Unews=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, n.area_id, n.nt_name, n.pk, a.at_name
                                            FROM NewsAndType as n
                                            INNER JOIN appArea as a ON a.Tb_index=n.area_id
                                            WHERE n.mt_id='site2019011116095854' 
                                            AND (n.unit_id='un2019011717535610' OR n.unit_id='un2019011717541797' OR n.unit_id='un2019011717545061') 
                                            AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND n.OnLineOrNot=1
                                            ORDER BY n.ns_vfdate DESC LIMIT 0,5", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                   $x=1;
                   $slide_txt='';
                   foreach ($row_Unews as $row_Unews_one) {
                    
                     $url=news_url($row_Unews_one['mt_id'], $row_Unews_one['Tb_index'], $row_Unews_one['ns_nt_pk'], $row_Unews_one['area_id']);
                     //$titl_url=$row_Unews_one['ns_nt_pk']=='nt201902121004593' ? 'card/new_card_list.php' : 'message/list.php?mt_pk='.$row_Unews_one['pk'];

                     //-- 版區顏色 --
                     switch ($row_Unews_one['area_id']) {
                       //-- 優行動pay --
                       case 'at2019011117341414':
                        $area_color='blueGreen_tab';
                        $titl_url='mpay/mpay.php';
                       break;
                       //-- 優票證 --
                       case 'at2019011117435970':
                         $area_color='pink_tab';
                         $titl_url='eticket/eticket.php';
                       break;
                       //-- 優集點 --
                       case 'at2019011117443626':
                         $area_color='Darkbrown_tab';
                         $titl_url='epoint/epoint.php';
                       break;
                       //-- 優旅行 --
                       case 'at2019011117461656':
                         $area_color='green_tab';
                         $titl_url='travel/index.php';
                       break;
                     }

                     $ns_ftitle=mb_substr($row_Unews_one['ns_ftitle'], 0,10,'utf-8');
                     $slide_txt.='
                                <div class="swiper-slide img_div '.$area_color.'" style="background-image: url(sys/img/'.$row_Unews_one['ns_photo_1'].');"> 
                                  <div class=" title top_hole">
                                    <a href="'.$titl_url.'">'.$row_Unews_one['at_name'].'</a>
                                  </div>
                                  <a class="w-h-100 d-block" href="'.$url.'" title="'.$row_Unews_one['ns_ftitle'].'">
                                      <div  class=" word shadow_text" >'.$ns_ftitle.'</div>
                                  </a>
                                </div>';
                     
                     //-- 廣告 --
                     // if ($x%2==0) {
                     //   $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../img/component/slide_photo1.jpg);"> 
                     //                <a class="w-h-100 d-block" href="#" title="廣告">
                     //                    <div class="word shadow_text" >我是廣告</div>
                     //                </a>
                     //              </div>';
                     // }

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
                    $rand_num=rand(1,count($row_cc_type));
                    foreach ($row_cc_type as $rct_one) {
                      $active=$x==$rand_num ? 'active':'';
                      $active_img=$x==$rand_num ? $rct_one['cc_so_photo_1_hover']:$rct_one['cc_so_photo_1'];
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
            <!-- 給予隨機卡功能 -->
            <input type="hidden" name="rand_num" value="<?php echo $rand_num;?>">
           </div>
         </div>

         <div class="ccard ccard_rank">
             
            <div class="swiper-container">
                <div class="swiper-wrapper">

                 <!-- /js/index_m/main.js 卡排行 -->

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
                                  $row_card_news=$pdo->select("SELECT n.Tb_index, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.area_id, n.mt_id, n.ns_nt_pk, n.ccard_sp, cc.cc_interest_desc
                                                              FROM NewsAndType as n 
                                                              INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                              INNER JOIN credit_card as cc ON cc.cc_group_id=abc.card_group_id AND cc.cc_cardorg=abc.org_id AND cc.cc_cardlevel=abc.level_id
                                                              WHERE n.ns_nt_pk='nt201902121004593' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 AND n.OnLineOrNot=1
                                                              AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                              ORDER BY n.ns_vfdate DESC 
                                                              LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                  $x=1;
                                  foreach ($row_card_news as $card_news) {

                                    $ns_ftitle=mb_substr($card_news['ns_ftitle'], 0,20, 'utf-8');
                                    $ns_msghtml=mb_substr(strip_tags($card_news['ns_msghtml']), 0,55,'utf-8');

                                    //-------------- 網址判斷 ------------------
                                    $news_url=news_url($card_news['mt_id'], $card_news['Tb_index'], $card_news['ns_nt_pk'], $card_news['area_id']);

                                    $show=$x==1 ? 'show':'';

                                    $ccard_sp_txt='';
                                    $ccard_sp=empty($card_news['ccard_sp']) ? preg_split('/\n/',$card_news['cc_interest_desc']) : preg_split('/\n/',$card_news['ccard_sp']);
                                    $y=1;
                                    foreach ($ccard_sp as $ccard_sp_one) {
                                      if ($y<=3) {
                                        $ccard_sp_txt.='<li>'.$ccard_sp_one.'</li>';
                                    }
                                    $y++;
                                    }

                                    echo '
                                  <div class="card">
                                   <div class="card-header" id="heading'.$x.'">
                                     <h5 class="mb-0">
                                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$x.'" aria-expanded="true" aria-controls="collapse'.$x.'">
                                         '.$ns_ftitle.'
                                       </button>
                                     </h5>
                                   </div>

                                   <div id="collapse'.$x.'" class="collapse '.$show.'" aria-labelledby="heading'.$x.'" data-parent="#new_card">
                                     <div class="card-body">
                                      <a style="top: 0; left: 0;" class="position-absolute w-h-100" href="'.$news_url.'" title="'.$card_news['ns_ftitle'].'"></a>
                                       <div class="card_one">
                                         <a href="'.$news_url.'" title="'.$card_news['ns_ftitle'].'">
                                          <img src="sys/img/'.$card_news['ns_photo_1'].'" alt=""> <br>
                                          '.$ns_ftitle.'
                                         </a>
                                       </div>
                                       <div class="card_info star_li">
                                        
                                         <ul>
                                         '.$ccard_sp_txt.'
                                        </ul>
                                        
                                       </div>
                                       <a class="card_more" href="'.$news_url.'">more</a>
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
      <div id="iCardRanking" class="cardshap tab_one darkpurple_tab favorite_card">
                          <div class="tab_menu row no-gutters">
                             <div class="col-12">
                                <div class="title_tab hole">
                                  <i class="icon" style="background-image: url(img/component/icon/icon11.png); background-size: 95%;"></i><h4>人氣排行</h4>
                                  <a class="tab_link" href="rank/newcard.php"></a>
                                </div>
                             </div> 
                             <div class="col-12">
                                <div class="swiper-container swiper-tag">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"><a href="javascript:;" tap="pop_card">新卡人氣排行</a></div>
                                        <div class="swiper-slide"><a href="javascript:;" tap="add_card">辦卡人氣排行</a></div>
                                        <div class="swiper-slide"><a href="javascript:;" tap="point_card">點閱人氣排行</a></div>
                                    </div>
                                </div>
                            </div>
                          </div>

                          <div class="content_tab ccard popularity">


                           <div class="swiper-container swiper-card">
                               <div class="swiper-wrapper ">

                              
                                <?php //-- /js/index_m/main.js  人氣排行 隨機撈資料 ?>
                                   
                               </div>

                           </div>

                           <!-- 如果需要导航按钮 -->
                           <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                           <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>

                           

                          </div>
                        </div>
      <!-- 人氣排行 END -->


      <!--廣告-->
      <div class="p-8px"><img class="w-100" src="http://srl.tw/cardu_m/img/component/AD3.png" alt="banner"></div><!--banner end -->


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



      <!--廣告-->
      <div class="p-8px"><img class="w-100" src="http://srl.tw/cardu_m/img/component/AD3.png" alt="banner"></div><!--banner end -->



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