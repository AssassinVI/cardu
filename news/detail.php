<?php session_start();
//尚未load出舊照片
//目前暫時用tb_index進入的內容頁
require '../share_area/conn.php';
require '../share_area/get_news.php';
require 'config.php';

//-- 紀錄LOG --
news_click_total($_SERVER['QUERY_STRING']);

$todayis=date("Y-m-d"); //取得要查詢的日期，預設為今日

//取出ID 
$temparray=explode("?",$_SERVER[REQUEST_URI]);

//echo $temparray[1];

if (!$temparray[1]) {
  location_up('back','好像有東西出錯了唷，請回上一頁');

}else{
     $sql_temp="
      SELECT ns_ftitle,ns_stitle,ns_reporter,ns_photo_1,ns_alt_1,ns_photo_2,ns_alt_2,ns_msghtml,Tb_index,StartDate,ns_date,ns_nt_pk,ns_news FROM  appNews
      where ns_verify=3 and OnLineOrNot=1  
      and StartDate<='$todayis' and EndDate>='$todayis'
      and Tb_index='$temparray[1]'
      order by ns_vfdate desc
      ";
     
    $row=pdo_select($sql_temp, $where);

    $ns_msghtml=mb_substr( strip_tags($row['ns_msghtml']), 0,50).'...';


    //取出類別資料
    $pk = $row['ns_nt_pk'];


    $row_pk=pdo_select("SELECT * FROM news_type WHERE Tb_index='$pk'", $where);

    //echo "SELECT * FROM news_type WHERE Tb_index='$pk'";
    $nt_pk =$row_pk['pk'];
    $nt_name =$row_pk['nt_name'];
    }


?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title><?php echo $row['ns_ftitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row['ns_ftitle']; ?>,<?php echo $nt_name; ?>,新聞"/>  
    <meta name="description" content="<?php echo $ns_msghtml;?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $row['ns_ftitle']; ?>｜卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:image" content="<?php echo $URL.'/sys/img/'.$row['ns_photo_1'];?>" />
    <meta property="og:title" content="<?php echo $row['ns_ftitle']; ?>｜卡優新聞網" />
    <meta property="og:description" content="<?php echo $ns_msghtml;?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="<?php //echo $FB_URL;?>" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="news_body">

    <div class="container detail_page">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../share_area/phone/header.php';
         }
         else{
          require '../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/news/news.php">新聞</a> / <a href="list.php?nt_pk=<?php echo $nt_pk?>"><?php echo $nt_name;?></a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="pt-3 mx-3 detail_title">
                          <h2><?php echo $row['ns_ftitle'];?></h2>
                          <div class="row no-gutters my-3">

                            <div class="col-md-8 col-12">
                              <h4><?php echo $row['ns_stitle'];?></h4>
                               <p>記者 <?php echo $row['ns_reporter'];?> 報導 <?php echo $row['ns_date'];?></p>
                            </div>
                            <div class="col-md-4 col-12">
                               <div class="search_div hv-center">
                                <div class="fb-like mr-2" data-href="<?php echo $FB_URL;?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=319016928941764&display=popup&link=<?php echo $FB_URL;?>&redirect_uri=https://www.facebook.com/', 'FB分享', config='height=600,width=800');"><img src="../img/component/search/fb.png" alt="" title="分享"></a>
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://social-plugins.line.me/lineit/share?url=<?php echo $FB_URL;?>', 'LINE分享', config='height=600,width=800');"><img src="../img/component/search/line.png" alt="" title="Line"></a>
                                <a class="search_btn" href="#fb_message"><img src="../img/component/search/message.png" alt="" title="訊息"></a>
                                 <a id="arrow_btn" class="search_btn d-none d-md-block" href="javascript:;"><img src="../img/component/search/arrow.png" alt="" title="更多"></a>
                               </div>
                               <div class="more_search">
                                 
                                 <a  target="_blank" href="print.php?<?php echo $temparray[1]?>"><img src="../img/component/search/print.png" alt="" title="列印"></a>
                                 <a href="javascript:;" data-fancybox data-src="#member_div"><img src="../img/component/search/work.png" alt="" title="收藏"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_mail.php?<?php echo $_SERVER['QUERY_STRING'];?>"><img src="../img/component/search/mail.png" alt="" title="信箱"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_error.php"><img src="../img/component/search/mood.png" alt="" title="回報"></a>
                               </div>
                            </div>
                          </div> 

                         
                        </div>
                        
                        <!-- 內文 -->
                        <div class="pb-3 mx-3 detail_content">

                          <?php 
                           
                           //-- 首圖 --
                           echo '
                           <div class="con_img">
                            <img src="'.$img_url.$row['ns_photo_1'].'" alt="'.$row['ns_alt_1'].'" title="'.$row['ns_alt_1'].'">
                            <p>▲'.$row['ns_alt_1'].'</p>
                          </div>';

                          if(wp_is_mobile()){
                            //-- 手機廣告 --
                            echo '
                            <div class="hv-center banner">
                             <img src="http://placehold.it/900x300" alt="">
                           </div>';

                          }
                          
                          //-- html 內文 --
                          echo $row['ns_msghtml'];

                          //-- 尾圖 --
                          if(!empty($row['ns_photo_2'])) {

                            $ns_alt_2=!empty($row['ns_alt_2']) ? '<p>▲'.$row['ns_alt_2'].'</p>' : '';

                            echo '<div class="con_img">
                                   <img src="'.$img_url.$row['ns_photo_2'].'" alt="'.$row['ns_alt_2'].'" title="'.$row['ns_alt_2'].'">
                                   '.$ns_alt_2.'
                                  </div>';
                          }


                          if(wp_is_mobile()){
                            //-- 手機廣告 --
                            echo '
                            <div class="hv-center banner">
                             <img src="http://placehold.it/900x300" alt="">
                           </div>';

                          }
                          
                          ?>
                        
                           

                        </div>
                        <!-- 內文 END -->
                        
                      </div>
                    </div>

                    
                    <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col hv-center banner">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->


                    <?php require('../share_area/news_other1.php'); // 延伸閱讀區塊：：：：：：：：：：：：：：：：：：：：：：：?>


                    <?php 
                     if(wp_is_mobile()){
                    ?>
                     <!--信用卡推薦-->
                      <div class="col-md-12 col ">

                          <div class="cardshap blue_tab exception">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item news_tab">
                              <a class="nav-link active pl-30 py-2" id="special_1-tab" aria-selected="true">信用卡推薦</a>
                            </li>
                          </ul>
                          <div class="tab-content p-0" id="myTabContent">
                            <div class="tab-pane fade show active"  role="tabpanel" >

                              <div class="row no-gutters mx-2 py-3 card_list">
                                <div class="col-md-4 text-center">
                                  <a class="card_list_img" href="#">
                                    <img src="../img/component/card1.png" alt="" title="新聞">
                                  </a>
                                  <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                                </div>
                                <div class="col-md-4 card_list_txt rank_color phone_card">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><b>●</b>感應式刷卡快速結帳</li>
                                    <li><b>●</b>高額旅遊平安險</li>
                                    <li><b>●</b>華航機票優惠</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 phone_hidden">
                                  <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                  <p>謹慎理財 信用至上</p>
                                </div>
                              </div>
                             
                            </div>
                           
                          </div>
                        </div>
                      </div>
                      <!--信用卡推薦end --> 


                      <!-- 懸浮廣告 -->
                      <div class="ad_fixed_ph">
                        <div class="swiper-container sub_ph_slide">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                  <a href="#"><img class="w-100" src="http://placehold.it/900x180" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                   <a href="#"><img class="w-100" src="http://placehold.it/900x180" alt=""></a>
                                </div>
                            </div>
                            
                            <!-- 如果需要导航按钮 -->
                            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                      </div>
                      <!-- 懸浮廣告 END -->

                    <?php }else{ ?>
                     
                     <!--廣告-->
                     <div class="col-md-12 row phone_hidden">
                         <div class="col-md-6 col ad_news">
                           <div class="row no-gutters">
                             <div class="col-md-6 h-center">
                              <img src="../img/component/ad_sm.png"> 
                             </div>
                            <div class="col-md-6">
                             <div class="best">
                              <img src="../img/component/best.png">
                             </div>
                             <h6>匯豐現金回饋卡</h6>
                             <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                            </div>
                          </div>
                         </div>
                         <div class="col-md-6 col ad_news">
                           <div class="row no-gutters">
                             <div class="col-md-6 h-center">
                              <img src="../img/component/ad_sm.png"> 
                             </div>
                            <div class="col-md-6">
                             <div class="best">
                              <img src="../img/component/best.png">
                             </div>
                             <h6>匯豐現金回饋卡</h6>
                             <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                            </div>
                          </div>
                         </div>
                     </div>
                     <!--廣告end-->


                     <!--信用卡推薦-->
                     <div class="col-md-12 col">

                         <div class="cardshap blue_tab phone_hidden">
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item news_tab">
                             <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                           </li>
                         </ul>
                         <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                             <div class="row no-gutters mx-2 py-3 card_list">
                               <div class="col-md-4 text-center">
                                 <a class="card_list_img" href="#">
                                   <img src="../img/component/card1.png" alt="" title="新聞">
                                 </a>
                                 <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                               </div>
                               <div class="col-md-4 card_list_txt">
                                 <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                 <ul>
                                   <li>國內現金回饋1.22%</li>
                                   <li>國外現金回饋2.22%</li>
                                   <li>感應式刷卡快速結帳</li>
                                   <li>高額旅遊平安險</li>
                                   <li>華航機票優惠</li>
                                 </ul>
                               </div>
                               <div class="col-md-4 ">
                                 <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                 <p>謹慎理財 信用至上</p>
                               </div>
                             </div>

                             <div class="row no-gutters mx-2 py-3 card_list">
                               <div class="col-md-4 text-center">
                                 <a class="card_list_img" href="#">
                                   <img src="../img/component/card2.png" alt="" title="新聞">
                                 </a>
                                 <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                               </div>
                               <div class="col-md-4 card_list_txt">
                                 <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                 <ul>
                                   <li>國內現金回饋1.22%</li>
                                   <li>國外現金回饋2.22%</li>
                                   <li>感應式刷卡快速結帳</li>
                                   <li>高額旅遊平安險</li>
                                   <li>華航機票優惠</li>
                                 </ul>
                               </div>
                               <div class="col-md-4 ">
                                 <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                 <p>謹慎理財 信用至上</p>
                               </div>
                             </div>

                             <div class="row no-gutters mx-2 py-3 card_list">
                               <div class="col-md-4 text-center">
                                 <a class="card_list_img" href="#">
                                   <img src="../img/component/card3.png" alt="" title="新聞">
                                 </a>
                                 <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                               </div>
                               <div class="col-md-4 card_list_txt">
                                 <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                 <ul>
                                   <li>國內現金回饋1.22%</li>
                                   <li>國外現金回饋2.22%</li>
                                   <li>感應式刷卡快速結帳</li>
                                   <li>高額旅遊平安險</li>
                                   <li>華航機票優惠</li>
                                 </ul>
                               </div>
                               <div class="col-md-4 ">
                                 <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                 <p>謹慎理財 信用至上</p>
                               </div>
                             </div>
                            
                           </div>
                          
                         </div>
                       </div>
                     </div>
                     <!--信用卡推薦end -->

                    <?php
                     }
                    ?>


                    



                    <!--網友留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap blue_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">網友留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <p>您尚未登入，請先<a href="#">登入會員</a></p>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--網友留言end -->


                    <!--Facebook留言-->
                    <div id="fb_message" class="col-md-12 col pb-5 mb-5 pb-md-0 mb-md-4">

                        <div class="cardshap blue_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">Facebook留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="fb-comments" data-width="100%" data-href="<?php echo $FB_URL;?>" data-numposts="5"></div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->

                   
                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
             <?php 
              require 'right_area_div.php';
             ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    

    <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

    <script type="text/javascript">
      $(document).ready(function() {
        //-- alt 圖說 --
        img_txt('.detail_content p img');
      });

      $(window).on('load', function() {
        
        //-- 內文插入廣告 --
        html_ad();
      });
    </script>

  </body>
</html>