<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>卡優新聞網-理財、消費、支付卡資訊網站</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    
    <?php 
     require 'share_area/fb_config.php';
    ?>

    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
    <?php 
     //-- 共用CSS --
     require 'share_area/share_css.php';
    ?>

  </head>
  <body class="index_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         require 'share_area/header.php';
        ?>
        
        <!-- Hearder News -->
        <div class="index-content-left col0 row">
            <div class="col-md-12 col">
            
                <div id="iNews" class="cardshap news_slide">
                    
                    <div class="swiper-container">
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
                                      <div class="swiper-slide" style="background-image: url(sys/img/'.$row_news_one['ns_photo_1'].');"> 
                                        <div class=" title hole">
                                          <a href="news/list.php?nt_pk='.$row_news_one['pk'].'">'.$row_news_one['nt_name'].'</a>
                                        </div>
                                        <a href="'.$url.'" title="'.$row_news_one['ns_ftitle'].'">
                                            <div  class=" word shadow_text" >'.$ns_ftitle.'</div>
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
                        
                        <!-- 如果需要导航按钮 -->
                        <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                        <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                        
                    </div>

                </div>
            
            </div>
        </div>

        <div class="index-content-right-noMove col0 row">

                    <div class="col-md-12 col">
                    
                        <div id="iNewsR01" class="iNewsR cardshap ">
                            
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
                                     //$titl_url=$row_cardNews_one['ns_nt_pk']=='nt201902121004593' ? 'card/new_card_list.php' : 'message/list.php?mt_pk='.$row_cardNews_one['pk'];
                                     $ns_ftitle=mb_substr($row_cardNews_one['ns_ftitle'], 0,14,'utf-8');
                                     $slide_txt.='
                                                <div class="swiper-slide img_div brown_tab" style="background-image: url(sys/img/'.$row_cardNews_one['ns_photo_1'].');"> 
                                                  <div class=" title hole">
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
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                
                            </div>

                        </div>
                    
                    </div>
                    <div class="col-md-12 col">
                    
                        <div id="iNewsR02" class="iNewsR cardshap">
                            
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                  <?php 
                                   //--- 優情報 (優行動pay-pay攻略、優票證-票證攻略、優集點-集點攻略) Banner (NewsAndType view檢視表)---
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

                                     $ns_ftitle=mb_substr($row_Unews_one['ns_ftitle'], 0,14,'utf-8');
                                     $slide_txt.='
                                                <div class="swiper-slide img_div '.$area_color.'" style="background-image: url(sys/img/'.$row_Unews_one['ns_photo_1'].');"> 
                                                  <div class=" title hole">
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
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                
                            </div>

                        </div>
                    
                    </div>

        </div>
        <div class="clearfix"></div>
        <!-- Hearder News end-->
        
        <!--油價-->
        <div class="row">
            <div class="col-md-12 col0">
                <div id="iOil" class="shadow_div">
                    <div class="pl-5 row no-gutters show">
                      <div class="word col-6">
                        <span class="title blue_br shadow_text">中油</span>
                        <?php 
                          $oil_time=$pdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=1 AND op_valid_time<=DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 'no', 'one');

                          $row_oil=$pdo->select("SELECT op_oil_type, op_price FROM oil_price WHERE op_store=1 AND op_valid_time=:op_valid_time ORDER BY op_showorder ASC", 
                                                ['op_valid_time'=>$oil_time['op_valid_time']]);
                          $oil_txt='';
                          foreach ($row_oil as $oil_one) {
                            $oil_txt.='<span class="blue_font">'.$oil_one['op_oil_type'].'</span> '.$oil_one['op_price'].' / ';
                          }
                          echo substr($oil_txt, 0,-3);
                        ?>
                      </div>
                      <div class="word col-6">
                        <span class="title green_br shadow_text">台塑</span>

                        <?php 
                          $oil_time=$pdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=2 AND op_valid_time<=DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 'no', 'one');

                          $row_oil=$pdo->select("SELECT op_oil_type, op_price FROM oil_price WHERE op_store=2 AND op_valid_time=:op_valid_time ORDER BY op_showorder ASC", 
                                                ['op_valid_time'=>$oil_time['op_valid_time']]);
                          $oil_txt='';
                          foreach ($row_oil as $oil_one) {
                            $oil_txt.='<span class="blue_font">'.$oil_one['op_oil_type'].'</span> '.$oil_one['op_price'].' / ';
                          }
                          echo substr($oil_txt, 0,-3);
                        ?>
                        
                      </div>
                    </div>
                    <div class="pl-5 row no-gutters ">
                      <div class="word col-6">
                        <span class="title blue_br shadow_text">卡油</span>
                        <a href="rank/cardrank.php?10" class="blue_txt">卡油省最大，加油卡比一比</a>
                      </div>
                      <div class="word col-6">
                        <span class="title green_br shadow_text">優惠</span>
                        <a href="https://cardu.srl.tw/news/detail.php?news2019060610172150" class="green_txt">Q4加油刷卡優惠總整理</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!--#油價 end-->
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">
                
                <div class="row">

                    <!--廣告-->
                    <div class="col-md-12 col"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    
                    <!--============================================卡排行============================================-->
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap">
                           
                           <div class="card_rank row no-gutters">

                             <div class="col-2">
                               <div class="card_fun w-h-100 hv-center hole">
                                   <div class="text-center mt-05">
                                    <a class="text-light" href="rank/rank.php">
                                       <img src="img/component/card_rank_logo.png" alt=""> <p class="mb-0 mt-025">卡排行</p>
                                    </a>
                                   </div>
                               </div>  
                             </div>
                             <div class="col-10">
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
                                      	echo '
                                      	<div class="swiper-slide '.$active.'" index="'.$x.'" Tb_index="'.$rct_one['Tb_index'].'" > 
                                         <div class="text-center"  >
                                            <a href="rank/cardrank.php?'.$rct_one['old_id'].'" title="'.$rct_one['cc_so_cname'].'">
                                              <img src="sys/img/'.$active_img.'" alt="'.$rct_one['cc_so_cname'].'" > <br> '.$rct_one['cc_so_cname'].'
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

                           <div class="ccard slider">
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">
                                    <!-- /js/main.js 卡排行 -->
                                  </div>
                                                                    
                              </div>

                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

                           </div>
                            
                        </div>
                    </div>
                    <!--============================================卡排行end============================================ -->
                    
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!--============================================卡情報============================================-->

                    <?php 
                       $row_cn_type=$pdo->select("SELECT Tb_index, nt_name, pk
                                                    FROM news_type 
                                                    WHERE area_id='at2019021114154632' AND unit_id='un2019011716575635' AND nt_sp=0 AND OnLineOrNot=1
                                                    ORDER BY OrderBy ASC");
                       $x=1;
                       $rand_num=rand(1,count($row_cn_type));
                       //-- tab html --
                       $list_txt='';
                       //-- 內容html --
                       $content_txt='';

                       foreach ($row_cn_type as $cn_type) {
                         
                         //------- 顯示分類 ---------
                         if ($x==$rand_num) {
                           $list_txt.= '<a class="newsType_a ms_enter" href="message/list.php?mt_pk='.$cn_type['pk'].'" nt_id="'.$cn_type['Tb_index'].'" tab-link="'.$x.'">'.$cn_type['nt_name'].'</a>';

                           //-- 內容 --
                           $row_cn=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_photo_1, area_id
                                        FROM NewsAndType
                                        WHERE (ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                        ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                        ['ns_nt_pk'=>$cn_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$cn_type['Tb_index'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                            
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
                               <a href="'.$news_url.'" title="'.$row_cn[$index]['ns_ftitle'].'">
                                   <div class="img_div"  style="background-image: url(sys/img/'.$row_cn[$index]['ns_photo_1'].');">
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

                           $content_txt.='<div class="news_list_div show" tab="'.$x.'">
                                            <div class="swiper-container sub_slide">
                                               <div class="swiper-wrapper">
                                               '.$slide_txt.'
                                               </div>

                                               <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                               <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                            </div>
                                          </div>';
                         }

                         //------- 隱藏分類 ---------
                         else{
                           $list_txt.= '<a class="newsType_a" href="message/list.php?mt_pk='.$cn_type['pk'].'" nt_id="'.$cn_type['Tb_index'].'" tab-link="'.$x.'">'.$cn_type['nt_name'].'</a>';
                           //$content_txt.='<div class="news_list_div " tab="'.$x.'"></div>';
                         }
                       
                       $x++; }
                    ?>

                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap big_tab tab_list_div brown_tab">
                          <div class="tab_menu row no-gutters">
                             <div class="col-3">
                                <div class="title_tab hole">
                                  <a class="text-light" href="card/card.php">
                                    <i class="icon align-middle" style="background-image: url(img/component/icon/icon5.png); background-size: 100%;"></i>
                                    <h4 class="d-inline-block align-middle">卡情報</h4>
                                  </a>
                                </div>
                             </div> 
                             <div class="col-9">
                                <div class="w-h-100 hv-around menu">

                                  <?php echo $list_txt; ?>

                                </div>
                            </div>
                          </div>

                          <div class="content_tab">

                             <?php echo $content_txt; ?>

                          </div>
                        </div>
                    </div>
                    <!--============================================卡情報end ============================================-->
                    
                    <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                    <!--============================================優行動Pay============================================-->

                    <?php 
                       $row_un_type=$pdo->select("SELECT Tb_index, nt_name, pk
                                                    FROM news_type 
                                                    WHERE area_id='at2019011117341414' AND unit_id='un2019011717534416' AND nt_sp=0 AND OnLineOrNot=1
                                                    ORDER BY OrderBy ASC");
                       $x=1;
                       $rand_num=rand(1,count($row_un_type));
                       //-- tab html --
                       $list_txt='';
                       //-- 內容html --
                       $content_txt='';

                       foreach ($row_un_type as $un_type) {
                         
                         //------- 顯示分類 ---------
                         if ($x==$rand_num) {
                           $list_txt.= '<a class="newsType_a ms_enter" href="mpay/list.php?mt_pk='.$un_type['pk'].'" nt_id="'.$un_type['Tb_index'].'" tab-link="'.$x.'">'.$un_type['nt_name'].'</a>';

                           //-- 內容 --
                           $row_un=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_photo_1, area_id
                                        FROM NewsAndType
                                        WHERE (ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                        ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                        ['ns_nt_pk'=>$un_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$un_type['Tb_index'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                            
                           $slide_txt='';

                           for ($i=0; $i <2 ; $i++) { 

                             $news_txt='';
                             
                             for ($j=0; $j <3 ; $j++) { 
                               $index=($i*3)+$j;
                               $ns_ftitle=mb_substr($row_un[$index]['ns_ftitle'], 0,14, 'utf-8');
                               //-------------- 網址判斷 ------------------
                               $news_url=news_url($row_un[$index]['mt_id'], $row_un[$index]['Tb_index'], $row_un[$index]['ns_nt_pk'], $row_un[$index]['area_id']);
                               
                               $news_txt.='
                               <div class="col-4 cards-3">
                               <a href="'.$news_url.'" title="'.$row_un[$index]['ns_ftitle'].'">
                                   <div class="img_div"  style="background-image: url(sys/img/'.$row_un[$index]['ns_photo_1'].');">
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

                           $content_txt.='<div class="news_list_div show" tab="'.$x.'">
                                            <div class="swiper-container sub_slide">
                                               <div class="swiper-wrapper">
                                               '.$slide_txt.'
                                               </div>

                                               <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                               <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                            </div>
                                          </div>';
                         }

                         //------- 隱藏分類 ---------
                         else{
                           $list_txt.= '<a class="newsType_a" href="mpay/list.php?mt_pk='.$un_type['pk'].'" nt_id="'.$un_type['Tb_index'].'" tab-link="'.$x.'">'.$un_type['nt_name'].'</a>';
                           //$content_txt.='<div class="news_list_div " tab="'.$x.'"></div>';
                         }
                       
                       $x++; }
                    ?>
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap big_tab tab_list_div blueGreen_tab">
                          <div class="tab_menu row no-gutters">
                             <div class="col-3">
                                <div class="title_tab hole">
                                  <a class="text-light" href="mpay/mpay.php">
                                    <i class="icon align-middle" style="background-image: url(img/component/icon/icon6.png);"></i>
                                    <h4 class="d-inline-block align-middle">優行動Pay</h4>
                                  </a>
                                </div>
                             </div> 
                             <div class="col-9">
                                <div class="w-h-100 hv-around menu">

                                   <?php echo $list_txt; ?>

                                </div>
                            </div>
                          </div>

                          <div class="content_tab">
                             
                             <?php echo $content_txt; ?>

                          </div>
                            
                        </div>
                    </div>
                    <!--============================================優行動Pay end============================================ -->

                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!--============================================優票證&優集點============================================-->

                    <?php 
                      $row_un_type=$pdo->select("SELECT nt.Tb_index, nt.nt_name, ar.at_name, nt.area_id
                                                   FROM news_type as nt 
                                                   INNER JOIN appArea as ar ON ar.Tb_index=nt.area_id
                                                   WHERE (nt.area_id='at2019011117435970' OR nt.area_id='at2019011117443626') AND nt.nt_sp=0 AND nt.OnLineOrNot=1
                                                   GROUP BY nt.area_id
                                                   ORDER BY nt.OrderBy ASC");
                      //-- tab html --
                      $list_txt='';
                      //-- 內容html --
                      $content_txt='';
                      $rand_num=rand(1,count($row_un_type));
                      $x=1;
                      foreach ($row_un_type as $un_type) {
                        $active=$x==$rand_num ? 'active show':'';
                        $active_dir=$x==$rand_num ? 'icon':'icon_down';

                        $title_url=$un_type['area_id']=='at2019011117435970' ? 'eticket/eticket.php' : 'epoint/epoint.php';
                        $title_icon=$un_type['area_id']=='at2019011117435970' ? 'background-image: url(img/component/'.$active_dir.'/icon8.png); background-size: 63%;' : 'background-image: url(img/component/'.$active_dir.'/icon9.png);';

                       //-- tab --
                       $list_txt.= '
                        <li class="nav-item">
                          <a class="nav-link py-2 pl-0 flex-x-center '.$active.'" id="'.$un_type['area_id'].'-tab"  tab-target="#'.$un_type['area_id'].'" href="'.$title_url.'"   aria-selected="true"><i class="icon" style="'.$title_icon.'"></i> '.$un_type['at_name'].'</a>
                        </li>';


                       //-- 內容 --
                       $row_un=$pdo->select("SELECT n.Tb_index, n.mt_id, n.ns_nt_pk, n.ns_ftitle, n.ns_photo_1, nt.area_id
                                                      FROM appNews as n 
                                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                                      WHERE (n.ns_nt_pk=:ns_nt_pk OR n.ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                      ORDER BY n.ns_vfdate DESC LIMIT 0,6", 
                                                      ['ns_nt_pk'=>$un_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$un_type['Tb_index'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                       $row_un_count=count($row_un);
                       $slide_txt='';

                       for ($i=0; $i <3 ; $i++) { 
                                
                                $news_txt='';

                                for ($j=0; $j <2 ; $j++) { 
                                  
                                     $index=($i*2)+$j;
                                     $ns_ftitle=mb_substr($row_un[$index]['ns_ftitle'], 0,14, 'utf-8');

                                     //-------------- 網址判斷 ------------------
                                     $news_url=news_url($row_un[$index]['mt_id'], $row_un[$index]['Tb_index'], $row_un[$index]['ns_nt_pk'], $row_un[$index]['area_id']);
                                     
                                     $news_txt.='
                                     <div class="col-6 cards-2">
                                       <a href="'.$news_url.'" title="'.$row_un[$index]['ns_ftitle'].'">
                                        <div class="img_div"  style="background-image: url(sys/img/'.$row_un[$index]['ns_photo_1'].');">
                                            <p>'.$ns_ftitle.'</p>
                                        </div>
                                       </a>
                                     </div>';
                                  
                                }
                                
                                if ($i<ceil($row_un_count/2)) {
                                    $slide_txt.='
                                    <div class="swiper-slide">
                                    <div class="row no-gutters">
                                      '.$news_txt.'
                                    </div>
                                  </div>';
                                }
                                
                       }

                       $content_txt.='
                                      <div class="tab-pane fade '.$active.'" id="'.$un_type['area_id'].'" role="tabpanel" aria-labelledby="'.$un_type['area_id'].'-tab">
                                        <div class="swiper-container sub_slide">
                                            <div class="swiper-wrapper">
                                              '.$slide_txt.'  
                                            </div>
                                            
                                            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                        </div>
                                      </div>';

                       $x++;
                     }
                    ?>


                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                          <?php echo $list_txt; ?>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                          <?php echo $content_txt; ?>


                        </div>
                      </div>
                    </div>
                    <!--============================================優票證&優集點end ============================================-->

                    <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                    <!--============================================優旅行============================================-->

                    <?php 
                       $row_un_type=$pdo->select("SELECT nt.Tb_index, nt.nt_name, nt.pk, un.un_name, nt.unit_id
                                                    FROM news_type as nt 
                                                    INNER JOIN appUnit as un ON un.Tb_index=nt.unit_id
                                                    WHERE nt.area_id='at2019011117461656' AND nt.nt_sp=0 AND nt.OnLineOrNot=1
                                                    GROUP BY nt.unit_id
                                                    ORDER BY un.OrderBy ASC");
                       $x=1;
                       $rand_num=rand(1,count($row_un_type));
                       //-- tab html --
                       $list_txt='';
                       //-- 內容html --
                       $content_txt='';

                       foreach ($row_un_type as $un_type) {

                        switch ($un_type['unit_id']) {
                          //-- 旅行分享 --
                          case 'un2019011717563437':
                            $list_url='travel/share.php';
                          break;
                          //-- 行程推薦 --
                          case 'un2019011717564690':
                            $list_url='travel/recommend.php';
                          break;
                          //-- 刷卡秘笈 --
                          case 'un2019011717570690':
                            $list_url='travel/tip.php';
                          break;
                          //-- 優惠情報 --
                          case 'un2019011717571414':
                            $list_url='travel/preferential.php';
                          break;
                          //-- 日本嬉遊趣 --
                          case 'un2019011717573494':
                            $list_url='travel/jp/index.php';
                          break;

                        }
                         
                         //------- 顯示分類 ---------
                         if ($x==$rand_num) {
                           $list_txt.= '<a class="newsType_a ms_enter" href="'.$list_url.'" un_id="'.$un_type['unit_id'].'" tab-link="'.$x.'">'.$un_type['un_name'].'</a>';

                           //-- 內容 --
                           $ns_nt_ot_pk='';
                           $row_nt=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id=:unit_id", ['unit_id'=>$un_type['unit_id']]);
                           foreach ($row_nt as $row_nt_one) {
                             $ns_nt_ot_pk.=" ns_nt_ot_pk LIKE '%".$row_nt_one['Tb_index']."%' OR ";
                           }
                           $ns_nt_ot_pk=substr($ns_nt_ot_pk, 0,-3);

                           $row_un=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_photo_1, area_id
                                        FROM NewsAndType
                                        WHERE (unit_id=:unit_id OR $ns_nt_ot_pk) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                        ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                        ['unit_id'=>$un_type['unit_id'], 'StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                            
                           $slide_txt='';

                           for ($i=0; $i <2 ; $i++) { 

                             $news_txt='';
                             
                             for ($j=0; $j <3 ; $j++) { 
                               $index=($i*3)+$j;
                               $ns_ftitle=mb_substr($row_un[$index]['ns_ftitle'], 0,14, 'utf-8');
                               //-------------- 網址判斷 ------------------
                               $news_url=news_url($row_un[$index]['mt_id'], $row_un[$index]['Tb_index'], $row_un[$index]['ns_nt_pk'], $row_un[$index]['area_id']);
                               
                               $news_txt.='
                               <div class="col-4 cards-3">
                               <a href="'.$news_url.'" title="'.$row_un[$index]['ns_ftitle'].'">
                                   <div class="img_div"  style="background-image: url(sys/img/'.$row_un[$index]['ns_photo_1'].');">
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

                           $content_txt.='<div class="news_list_div show" tab="'.$x.'">
                                            <div class="swiper-container sub_slide">
                                               <div class="swiper-wrapper">
                                               '.$slide_txt.'
                                               </div>

                                               <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                               <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                            </div>
                                          </div>';
                         }

                         //------- 隱藏分類 ---------
                         else{
                           $list_txt.= '<a class="newsType_a" href="'.$list_url.'" un_id="'.$un_type['unit_id'].'" tab-link="'.$x.'">'.$un_type['un_name'].'</a>';
                           //$content_txt.='<div class="news_list_div " tab="'.$x.'"></div>';
                         }
                       
                       $x++; }
                    ?>

                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap big_tab tab_list_div green_tab">
                          <div class="tab_menu row no-gutters">
                             <div class="col-3">
                                <div class="title_tab hole">
                                 <a class="text-light" href="travel/index.php">
                                   <i class="icon align-middle" style="background-image: url(img/component/icon/icon10.png);"></i>
                                   <h4 class="d-inline-block align-middle">優旅行</h4>
                                 </a>
                                </div>
                             </div> 
                             <div class="col-9">
                                <div class="w-h-100 menu hv-around">
                                  
                                <?php echo $list_txt; ?>
                                  
                                </div>
                            </div>
                          </div>
                          <div class="content_tab">
                             
                             <?php echo $content_txt; ?>

                          </div>
                        </div>
                    </div>
                    <!--============================================優旅行end ============================================-->

                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap big_tab tab_list_div darkpurple_tab">
                          <div class="tab_menu row no-gutters">
                             <div class="col-3">
                                <div class="title_tab hole">
                                  <i class="icon" style="background-image: url(img/component/icon/icon11.png); background-size: 95%;"></i><h4>人氣排行</h4>
                                </div>
                             </div> 
                             <div class="col-9">
                                <div class="w-h-100 menu hv-around">
                                  <a class="newsType_a ms_enter" href="rank/newcard.php" tab-link="1">新卡人氣排行</a>
                                  <a class="newsType_a" href="rank/apply.php" tab-link="2">辦卡人氣排行</a>
                                  <a class="newsType_a" href="rank/click.php" tab-link="3">點閱人氣排行</a>
                                  
                                </div>
                            </div>
                          </div>
                  
                          <div class="content_tab ">

                            <!--人氣排行-->
                             <div class="news_list_div row no-gutters ccard show" tab="1">
                              <?php 

                                //-------------------------------------------- 新卡人氣排行 ---------------------------------------------------------

                                $row_new_card=$pdo->select("SELECT bc.card_group_id
                                                            FROM appNews_bank_card as bc
                                                            INNER JOIN appNews as news ON bc.news_id=news.Tb_index
                                                            WHERE news.ns_nt_pk='nt201902121004593' AND news.ns_verify=3 AND news.ns_vfdate >=:month_ago
                                                            GROUP BY bc.card_group_id
                                                            ORDER BY news.ns_viewcount DESC, news.ns_mobvecount DESC
                                                            LIMIT 0,6", ['month_ago'=>date('Y-m-d H:i:s',strtotime('-3 month'))]);
                                $silde_txt='';
                                for ($i=0; $i <2 ; $i++) { 
                                  
                                  $ccard_list='';
                                  for ($j=0; $j <3 ; $j++) { 
                                   
                                     $index=($i*3)+$j;
                                     $row_car_d=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name, cc.cc_interest_desc, 
                                                                     cc.cc_doc_url, cc.cc_doc_path
                                                              FROM credit_card as cc
                                                              INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                                              INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                              WHERE cc.cc_group_id=:cc_group_id
                                                              ORDER BY level.OrderBy ASC
                                                              LIMIT 0,1", ['cc_group_id'=>$row_new_card[$index]['card_group_id']], 'one');

                                     
                                     //-- 卡名 --
                                     $card_name=$row_car_d['bi_shortname'].'_'.$row_car_d['cc_cardname'].'_'.$row_car_d['org_nickname'].$row_car_d['attr_name'];
                                     //-- 卡特色 --
                                     $card_adv_txt='';
                                     $card_adv=preg_split('/\n/',$row_car_d['cc_interest_desc']);
                                     for ($k=0; $k <4 ; $k++) { 
                                       $card_adv_txt.=mb_substr($card_adv[$k],0,15,'utf-8').'<br>';
                                     }
                                     
                                     //-- 立即辦卡 --
                                     if (!empty($row_car_d['cc_doc_url'])) {
                                       $cc_doc='<a target="_blank" href="'.$row_car_d['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                     }
                                     elseif(!empty($row_car_d['cc_doc_path'])){
                                       $cc_doc='<a target="_blank" href="'.$row_car_d['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                     }
                                     else{
                                       $cc_doc='';
                                     }
                                     //-- 卡片圖 --
                                     $cc_photo=empty($row_car_d['cc_photo']) ? 'CardSample.png':$row_car_d['cc_photo'];
                                     
                                     $ccard_list.= '
                                     <div class="col-4 cards-3">
                                       <div class=" hv-center">
                                           <a href="card/creditcard.php?cc_pk='.$row_car_d['Tb_index'].'&cc_group_id='.$row_car_d['cc_group_id'].'" title="'.$card_name.'">
                                            <span class="top_Medal">'.($index+1).'</span>
                                            <img src="sys/img/'.$cc_photo.'" alt="'.$card_name.'">
                                            <p>'.mb_substr($card_name, 0,14,'utf-8').'</p>
                                           </a>
                                       </div>
                                       <div class="card_txt">
                                           <p>
                                               '.$card_adv_txt.'
                                           </p>
                                       </div>
                                       <div class="card_btn  hv-center">
                                           '.$cc_doc.'
                                           <button type="button" card_id="'.$row_car_d['Tb_index'].'" cc_group_id="'.$row_car_d['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered add_contrast_card btnOver">加入比較</button>
                                       </div>
                                    </div>';  
                                  }
                                  //-- for j --


                                      $silde_txt.='
                                       <div class="swiper-slide">
                                         <div class="row no-gutters">
                                           '.$ccard_list.'
                                         </div>
                                        </div>';

                                }
                                //-- for i --

                                
                              ?>
                              <div class="col-md-12">
                                <div class="swiper-container sub_slide h-100 mx-0">
                                    <div class="swiper-wrapper">
                                        
                                        <?php echo $silde_txt; ?>
                                        
                                    </div>
                                    
                                    <!-- 如果需要导航按钮 -->
                                    <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                    
                                </div>
                              </div>
                              
                             </div>
                             <!--人氣排行 END -->
                             
                             
                             <!-- 辦卡人氣排行 -->
                             <div class="news_list_div row no-gutters ccard " tab="2">
                                <?php 
                                 //-------------------------------------------- 辦卡人氣排行 ---------------------------------------------------------
                                  $row_add_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                   cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                            FROM credit_cardrank as ccr
                                                            INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                            INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                            WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                            GROUP BY cc.Tb_index
                                                            ORDER BY ccrc.assigncount DESC 
                                                            LIMIT 0,6", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                                  $silde_txt='';
                                  for ($i=0; $i < 2; $i++) { 
                                    
                                    $ccard_list='';
                                    for ($j=0; $j < 3; $j++) { 
                                      
                                      $index=($i*3)+$j;
                                      $add_card_one=$row_add_card[$index];
                                      //-- 卡名 --
                                      $card_name=$add_card_one['bi_shortname'].'_'.$add_card_one['cc_cardname'].'_'.$add_card_one['org_nickname'].$add_card_one['attr_name'];
                                      //-- 卡特色 --
                                      $card_adv_txt='';
                                      $card_adv=preg_split('/\n/',$add_card_one['cc_interest_desc']);
                                      for ($k=0; $k <4 ; $k++) { 
                                        $card_adv_txt.=mb_substr($card_adv[$k],0,15,'utf-8').'<br>';
                                      }
                                      //-- 立即辦卡 --
                                      if (!empty($add_card_one['cc_doc_url'])) {
                                        $cc_doc='<a target="_blank" href="'.$add_card_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                      }
                                      elseif(!empty($add_card_one['cc_doc_path'])){
                                        $cc_doc='<a target="_blank" href="'.$add_card_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                      }
                                      else{
                                        $cc_doc='';
                                      }
                                      //-- 卡片圖 --
                                      $cc_photo=empty($add_card_one['cc_photo']) ? 'CardSample.png':$add_card_one['cc_photo'];

                                      $ccard_list.= '
                                      <div class="col-4 cards-3">
                                      <div class=" hv-center">
                                          <a href="card/creditcard.php?cc_pk='.$add_card_one['Tb_index'].'&cc_group_id='.$add_card_one['cc_group_id'].'" title="'.$card_name.'">
                                           <span class="top_Medal">'.($index+1).'</span>
                                           <img src="sys/img/'.$cc_photo.'" alt="'.$card_name.'">
                                           <p>'.mb_substr($card_name, 0,14,'utf-8').'</p>
                                          </a>
                                      </div>
                                      <div class="card_txt">
                                          <p>
                                              '.$card_adv_txt.'
                                          </p>
                                      </div>
                                      <div class="card_btn  hv-center">
                                          '.$cc_doc.'
                                          <button type="button" card_id="'.$add_card_one['Tb_index'].'" cc_group_id="'.$add_card_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$add_card_one['cc_photo'].'" class="btn gray-layered add_contrast_card btnOver">加入比較</button>
                                      </div>
                                      </div>';

                                    }
                                    //-- for j --

                                    $silde_txt.='
                                     <div class="swiper-slide">
                                       <div class="row no-gutters">
                                         '.$ccard_list.'
                                       </div>
                                      </div>';
                                  }
                                  //-- for i --

                                ?>

                                <div class="col-md-12">
                                  <div class="swiper-container sub_slide h-100 mx-0">
                                      <div class="swiper-wrapper">
                                          
                                          <?php echo $silde_txt; ?>
                                          
                                      </div>
                                      
                                      <!-- 如果需要导航按钮 -->
                                      <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                      <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                      
                                  </div>
                                </div>

                             </div>
                             <!-- 辦卡人氣排行 END -->
                             
                             <!-- 點閱人氣排行 -->
                             <div class="news_list_div row no-gutters ccard" tab="3">

                              <?php 
                               $row_view_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_cardrank as ccr
                                                         INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                         INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                         WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                         GROUP BY cc.Tb_index
                                                         ORDER BY ccrc.viewcount DESC 
                                                         LIMIT 0,6", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                               
                               $silde_txt='';
                               for ($i=0; $i < 2; $i++) { 
                                 
                                 $ccard_list='';
                                 for ($j=0; $j < 3; $j++) { 
                                   
                                   $index=($i*3)+$j;
                                   $add_view_one=$row_view_card[$index];
                                   //-- 卡名 --
                                   $card_name=$add_view_one['bi_shortname'].'_'.$add_view_one['cc_cardname'].'_'.$add_view_one['org_nickname'].$add_view_one['attr_name'];
                                   //-- 卡特色 --
                                   $card_adv_txt='';
                                   $card_adv=preg_split('/\n/',$add_view_one['cc_interest_desc']);
                                   for ($k=0; $k <4 ; $k++) { 
                                     $card_adv_txt.=mb_substr($card_adv[$k],0,15,'utf-8').'<br>';
                                   }
                                   //-- 立即辦卡 --
                                   if (!empty($add_view_one['cc_doc_url'])) {
                                     $cc_doc='<a target="_blank" href="'.$add_view_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                   }
                                   elseif(!empty($add_view_one['cc_doc_path'])){
                                     $cc_doc='<a target="_blank" href="'.$add_view_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                   }
                                   else{
                                     $cc_doc='';
                                   }
                                   //-- 卡片圖 --
                                   $cc_photo=empty($add_view_one['cc_photo']) ? 'CardSample.png':$add_view_one['cc_photo'];

                                   $ccard_list.= '
                                   <div class="col-4 cards-3">
                                   <div class=" hv-center">
                                       <a href="card/creditcard.php?cc_pk='.$add_view_one['Tb_index'].'&cc_group_id='.$add_view_one['cc_group_id'].'" title="'.$card_name.'">
                                        <span class="top_Medal">'.($index+1).'</span>
                                        <img src="sys/img/'.$cc_photo.'" alt="'.$card_name.'">
                                        <p>'.mb_substr($card_name, 0,14,'utf-8').'</p>
                                       </a>
                                   </div>
                                   <div class="card_txt">
                                       <p>
                                           '.$card_adv_txt.'
                                       </p>
                                   </div>
                                   <div class="card_btn  hv-center">
                                       '.$cc_doc.'
                                       <button type="button" card_id="'.$add_view_one['Tb_index'].'" cc_group_id="'.$add_view_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$add_view_one['cc_photo'].'" class="btn gray-layered add_contrast_card btnOver">加入比較</button>
                                   </div>
                                   </div>';

                                 }
                                 //-- for j --

                                 $silde_txt.='
                                  <div class="swiper-slide">
                                    <div class="row no-gutters">
                                      '.$ccard_list.'
                                    </div>
                                   </div>';
                               }
                               //-- for i --
                               
                              ?>

                              <div class="col-md-12">
                                <div class="swiper-container sub_slide h-100 mx-0">
                                    <div class="swiper-wrapper">
                                        
                                        <?php echo $silde_txt; ?>
                                        
                                    </div>
                                    
                                    <!-- 如果需要导航按钮 -->
                                    <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                    
                                </div>
                              </div>

                             </div>
                             <!-- 點閱人氣排行 END -->
                          </div>
                            
                        </div>
                    </div>
                    <!--人氣排行end -->




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right-noMove col0">
                
                <div class="row">
                    
                     <!--============================= 信用卡快搜&權益快搜 ===============================-->
                     <div class="col-md-12 col">
                       <div class="cardshap darkpurple_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active  pl-30" id="card-tab" tab-target="#card" href="javascript:;" aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/index/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="right-tab" tab-target="#right" href="javascript:;" aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/index/icon2.png); background-size: 80%;"></i>權益快搜
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content ccard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select class="c_search_bk">
                                      <option value="">--選擇銀行--</option>
                                      <?php 
                                        $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info ORDER BY bi_code ASC");
                                        foreach ($row_bank as $row_bank_one) {
                                          echo '<option value="'.$row_bank_one['Tb_index'].'">'.$row_bank_one['bi_shortname'].'</option>';
                                        }
                                      ?>
                                  </select>

                                  <select class="c_search_cc">
                                      <option value="">--選擇信用卡--</option>
                                  </select>  
                                </div>

                                <div class="col-3">
                                  <div class="hv-center w-h-100">
                                      <button id="c_search_btn" type="button">GO</button>
                                  </div>
                                </div>
                               
                            </form>
                          </div>
                          <div class="tab-pane fade" id="right" role="tabpanel" aria-labelledby="right-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  
                                  <select class="int_search_item">
                                      <option value="">選擇比較的權益項目</option>
                                      <?php 
                                        $row_int=$pdo->select("SELECT Tb_index, eq_name 
                                                               FROM card_eq_item 
                                                               WHERE mt_id='site2019021216245137' AND is_im_eq=1 AND Tb_index!='eq2019021217592167' AND Tb_index!='eq2019021218000948' 
                                                               ORDER BY OrderBy ASC");
                                        foreach ($row_int as $row_int_one) {
                                          echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                        }
                                      ?>
                                  </select>

                                  <select class="int_search_item">
                                      <option value="">選擇比較的權益項目</option>
                                      <?php 
                                        foreach ($row_int as $row_int_one) {
                                          echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                        }
                                      ?>
                                  </select>
                                </div>

                                <div class="col-3">
                                 <div class="hv-center w-h-100">
                                   <button id="int_search_btn" type="button">GO</button>
                                 </div>
                                </div>
                               
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--============================= 信用卡快搜&權益快搜 END ===============================-->


                    <!--============================= 熱門新聞&熱門好康 ===============================-->
                    <div class="col-md-12 col">
                       <div class="cardshap blue_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active  pl-30" id="hotNews-tab" tab-target="#hotNews" href="javascript:;" aria-selected="true">
                                <i class="icon" style="background-image: url(img/component/icon/index/icon3.png); background-size: 80%;"></i> 熱門新聞
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="hotGift-tab" tab-target="#hotGift" href="javascript:;" aria-selected="false">
                                <i class="icon" style="background-image: url(img/component/icon_down/index/icon4.png); background-size: 76%;"></i> 熱門好康
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="hotNews" role="tabpanel" aria-labelledby="hotNews-tab">

                            <ul class="tab_list cardu_li">
                              <?php 
                               $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                           FROM NewsAndType as n
                                                           INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                                           WHERE n.mt_id='site2018111910430599' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                           AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                                           GROUP BY n.Tb_index
                                                           ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                                           LIMIT 0,5", 
                                                           ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                               foreach ($row_hot_news as $hot_news) {

                                 $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                                 //-------------- 網址判斷 ------------------
                                 $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                                 echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                               }
                              ?>
                            </ul>
                           
                          </div>
                          <div class="tab-pane fade" id="hotGift" role="tabpanel" aria-labelledby="hotGift-tab">

                            <ul class="tab_list cardu_li">
                              <?php 
                               $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                           FROM NewsAndType as n
                                                           INNER JOIN message_click_total as mct ON mct.ack_type_pk=n.Tb_index
                                                           WHERE n.mt_id='site201901111555425' AND n.unit_id!='un2019021114153096' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                           AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND mct.ack_click_date >=:day_ago
                                                           GROUP BY n.Tb_index
                                                           ORDER BY mct.ack_click_total DESC, n.ns_vfdate DESC
                                                           LIMIT 0,5", 
                                                           ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                               foreach ($row_hot_news as $hot_news) {

                                 $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                                 //-------------- 網址判斷 ------------------
                                 $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                                 echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                               }
                              ?>
                                
                            </ul>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--============================= 熱門新聞&熱門好康 END ===============================-->
                    
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x100" alt="">
                    </div>
                    
                    <!--============================= 新卡訊 ===============================-->
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one brown_tab">
                           <div class="title_tab hole">
                               <i class="icon" style="background-image: url(img/component/icon/icon5.png); background-size: 100%;"></i><h4>新卡訊</h4>
                               <a class="more_link" href="card/new_card_list.php"></a>
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

                                    $ns_ftitle=mb_substr($card_news['ns_ftitle'], 0,14, 'utf-8');
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
                    </div>
                    <!--============================= 新卡訊 END ===============================-->
                    

                    <!--============================= 熱門支付 ===============================-->
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one blueGreen_tab">
                           <div class="title_tab hole">
                               <i class="icon" style="background-image: url(img/component/icon/icon6.png);"></i> <h4>熱門支付</h4>
                               
                           </div>
                           <div class="content_tab" style="height: 250px;">
                               <ul class="tab_list cardu_li">

                                <?php 
                                 $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                             FROM NewsAndType as n
                                                             INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                                             WHERE n.area_id='at2019011117341414' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                             AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                                             GROUP BY n.Tb_index
                                                             ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                                             LIMIT 0,7", 
                                                             ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                                 foreach ($row_hot_news as $hot_news) {

                                   $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                                   //-------------- 網址判斷 ------------------
                                   $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                                   echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                                 }
                                ?>

                            </ul>
                           </div>
                       </div>
                    </div>
                    <!--============================= 熱門支付 END ===============================-->
                    

                    <!--============================= 活動公告 ===============================-->
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one orange_tab">
                           <div class="title_tab hole">
                               <i class="icon" style="background-image: url(img/component/icon/icon7.png);"></i><h4>活動公告</h4>
                               <a class="more_link" href="member/index.php"></a>
                           </div>
                           <div class="content_tab">
                               <ul class="tab_list">

                                <?php 
                                 $row_note=$pdo->select("SELECT Tb_index, note_type, aTitle, StartDate
                                                         FROM appNotice
                                                         ORDER BY StartDate DESC
                                                         LIMIT 0,2");

                                 foreach ($row_note as $note) {
                                   $aTitle=mb_substr($note['aTitle'], 0,14,'utf-8');
                                   $note_url=$note['note_type']==0 ? 'member/notify_detail.php?wn_pk='.$note['Tb_index'] : 'member/event_activity_detail.php?em_pk='.$note['Tb_index'].'&em_type=1';

                                   echo '<li><a title="'.$note['aTitle'].'" href="'.$note_url.'"><p class="active_date">'.$note['StartDate'].'</p> '.$aTitle.'</a></li>';
                                 }
                                ?>
                                
                            </ul>
                           </div>
                       </div>
                    </div>
                    <!--============================= 活動公告 END ===============================-->

                    
                    <!--============================= 熱門票證&熱門集點  ===============================-->
                    <div class="col-md-12 col">
                       <div class="cardshap pink_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active pl-0 flex-x-center" id="hotTicket-tab" tab-target="#hotTicket" href="javascript:;" aria-selected="true"><i class="icon" style="background-image: url(img/component/icon/index/icon8.png); background-size: 63%;"></i> 熱門票證</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="hotSet-tab" tab-target="#hotSet" href="javascript:;" aria-selected="false"><i class="icon" style="background-image: url(img/component/icon_down/index/icon9.png);"></i> 熱門集點</a>
                          </li>
                        </ul>
                        <div class="tab-content py-2" id="myTabContent" style="height: 209px;">
                          <div class="tab-pane fade show active" id="hotTicket" role="tabpanel" aria-labelledby="hotTicket-tab">

                            <ul class="tab_list cardu_li">

                              <?php 
                               //-- 熱門票證 --
                               $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                           FROM NewsAndType as n
                                                           INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                                           WHERE n.area_id='at2019011117435970' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                           AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                                           GROUP BY n.Tb_index
                                                           ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                                           LIMIT 0,7", 
                                                           ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                               foreach ($row_hot_news as $hot_news) {

                                 $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                                 //-------------- 網址判斷 ------------------
                                 $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                                 echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                               }
                              ?>
                            </ul>
                           
                          </div>
                          <div class="tab-pane fade" id="hotSet" role="tabpanel" aria-labelledby="hotSet-tab">

                            <ul class="tab_list cardu_li">
                              <?php 
                               //-- 熱門集點 --
                               $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                           FROM NewsAndType as n
                                                           INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                                           WHERE n.area_id='at2019011117443626' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                           AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                                           GROUP BY n.Tb_index
                                                           ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                                           LIMIT 0,7", 
                                                           ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                               foreach ($row_hot_news as $hot_news) {

                                 $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                                 //-------------- 網址判斷 ------------------
                                 $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                                 echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                               }
                              ?>
                            </ul>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--============================= 熱門票證&熱門集點 END ===============================-->

                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x100" alt="">
                    </div>


                    <div class="col-md-12 col">
                       <div class="cardshap tab_one green_tab">
                           <div class="title_tab hole">
                               <i class="icon" style="background-image: url(img/component/icon/icon10.png);"></i><h4>熱門旅行</h4>
                           </div>
                           <div class="content_tab" style="height: 250px;">
                               <ul class="tab_list cardu_li">
                                <?php 
                                 //-- 熱門旅行 --
                                 $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                             FROM NewsAndType as n
                                                             INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                                             WHERE n.area_id='at2019011117461656' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                             AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                                             GROUP BY n.Tb_index
                                                             ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                                             LIMIT 0,7", 
                                                             ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                                 foreach ($row_hot_news as $hot_news) {

                                   $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                                   //-------------- 網址判斷 ------------------
                                   $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                                   echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                                 }
                                ?>
                                
                            </ul>
                           </div>
                       </div>
                    </div>

                    
                    <?php
                     //-- 共用Footer --
                    require 'share_area/footer.php';
                    ?>
                    

                </div>
            </div>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
                
        
    </div><!-- container end-->


    <?php 
     //-- 共用JS --
     require 'share_area/share_js.php';
    ?>

  </body>
</html>
