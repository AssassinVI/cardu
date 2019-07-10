<?php 
 require '../share_area/conn.php';
 require 'config.php';

 //-- 紀錄LOG --
 news_click_total($_SERVER['QUERY_STRING']);

 $row=$pdo->select("SELECT * FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

 //-- 404 判斷 --
 if (empty($row['Tb_index'])) {
  location_up('../member/my404.php?travel','');
  exit();
 }

 $ns_msghtml=mb_substr(strip_tags($row['ns_msghtml']), 0,100);

 //-- 判斷單元 --
 switch ($row['unit_id']) {
   //-- 旅行分享 --
   case 'un2019011717563437':
     $crumbs_html='<a href="share.php?tr_pk='.$row['ns_nt_pk'].'">旅行分享-'.$row['nt_name'].'</a>';
     //--版面右側--
     $right_area='right_area_div_share.php';
   break;

   //-- 行程推薦 --
   case 'un2019011717564690':
     $crumbs_html='<a href="recommend.php?tr_pk='.$row['ns_nt_pk'].'">行程推薦-'.$row['nt_name'].'</a>';
     //--版面右側--
     $right_area='right_area_div_recommend.php';
   break;

   //-- 刷卡秘笈 --
   case 'un2019011717570690':
     $crumbs_html='<a href="tip.php">刷卡秘笈</a>';
     //--版面右側--
     $right_area='right_area_div_tip.php';
   break;

   //-- 優惠情報 --
   case 'un2019011717571414':
     $crumbs_html='<a href="preferential.php">優惠情報</a>';
     //--版面右側--
     $right_area='right_area_div_preferential.php';
   break;

   //-- 日本嬉遊去 --
   case 'un2019011717573494':
     $crumbs_html='<a href="jp/index.php">日本嬉遊趣</a> / <a href="jp/about.php?tr_pk='.$row['ns_nt_pk'].'">'.$row['nt_name'].'</a>';
     //--版面右側--
     $right_area='right_area_div_jp.php';
   break;
   
   default:
     # code...
     break;
 }



 //-- 上下篇新聞  --
 
  //-- 上刊到其他單元 --
  $ns_nt_ot_pk_query="";
   $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id=:unit_id", ['unit_id'=>$row['unit_id']]);
   foreach ($row_newsType as $newsType) {
    $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
   }
   $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


 $where=[
   'StartDate'=>date('Y-m-d'), 
   'EndDate'=>date('Y-m-d'), 
   'unit_id'=>$row['unit_id'], 
   'ns_vfdate'=>$row['ns_vfdate']
 ];
 
 //-- 上一篇 --
 $prev_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate
                                   FROM NewsAndType 
                                   WHERE ns_verify=3 AND OnLineOrNot=1 
                                   AND StartDate<=:StartDate AND EndDate>=:EndDate AND unit_id=:unit_id 
                                   AND ns_vfdate>:ns_vfdate  ORDER BY ns_vfdate ASC LIMIT 0,1 ", $where, 'one');
 
 //-- 下一篇 --
 $next_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate
                                   FROM NewsAndType 
                                   WHERE ns_verify=3 AND OnLineOrNot=1 
                                   AND StartDate<=:StartDate AND EndDate>=:EndDate AND unit_id=:unit_id 
                                   AND ns_vfdate<:ns_vfdate  ORDER BY ns_vfdate DESC LIMIT 0,1 ", $where, 'one');

 $prev_btn_display=empty($prev_news['Tb_index']) ? 'd-none':'d-block';
 $next_btn_display=empty($next_news['Tb_index']) ? 'd-none':'d-block';

 $prev_url=news_url($prev_news['mt_id'], $prev_news['Tb_index'], $prev_news['ns_nt_pk'], $prev_news['area_id']);
 $next_url=news_url($next_news['mt_id'], $next_news['Tb_index'], $next_news['ns_nt_pk'], $next_news['area_id']);

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title><?php echo $row['ns_ftitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row['ns_ftitle']; ?>,<?php echo $row['nt_name']; ?>,優旅行"/>  
    <meta name="description" content="<?php echo $ns_msghtml.'...';?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $row['ns_ftitle']; ?>｜卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $row['ns_ftitle']; ?>｜卡優新聞網" />
    <meta property="og:description" content="<?php echo $ns_msghtml.'...';?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="travel_body">

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


        <!-- 上下篇按鈕 -->
        <div class="<?php echo $prev_btn_display; ?> d-md-none PrevNext_div prev_btn">
          <a href="<?php echo $prev_url; ?>"><i class="fa fa-angle-left"></i></a>
        </div>
        <div class="<?php echo $next_btn_display; ?> d-md-none PrevNext_div next_btn">
          <a href="<?php echo $next_url; ?>"><i class="fa fa-angle-right"></i></a>
        </div>


        
        <!-- 麵包屑 -->
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="index.php">優旅行</a> / <?php echo $crumbs_html; ?></p>
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
                          <h2><?php echo $row['ns_ftitle']; ?></h2>
                           
                          <div class="row no-gutters my-3">
                            <div class="col-md-8">
                             <p>
                               <?php 
                                echo '記者 '.$row['ns_reporter'].' '.$row['StartDate'];
                               ?>
                               <!-- 記者 溫子豪 報導 2017/08/17 -->
                             </p>
                            </div>
                            <div class="col-md-4">
                               <?php 
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 // 新聞內頁分享功能按鈕 In share_area/func.php：：：：：：：：：：：：：：：：：：：：：：：
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 news_share_btn($FB_URL, $_SERVER['QUERY_STRING']); 
                               ?>
                            </div>
                          </div> 

                         
                        </div>

                        <div class="pb-3 mx-3 detail_content">

                          <?php 
                              //-- 首圖 --
                              echo '<p>
                                     <img src="'.$img_url.$row['ns_photo_1'].'" alt="'.$row['ns_alt_1'].'">
                                    </p>';

                              if(wp_is_mobile()){
                                //-- 手機廣告 --
                                echo '
                                <a href="#" class="hv-center banner">
                                 <img src="http://placehold.it/900x300" alt="">
                               </a>';

                              }

                              //-- html 內文 --
                              echo $row['ns_msghtml'];


                            //-- 尾圖 --
                            if(!empty($row['ns_photo_2'])) {

                              echo '<p>
                                     <img src="'.$img_url.$row['ns_photo_2'].'" alt="'.$row['ns_alt_2'].'">
                                    </p>';
                            }

                            if(wp_is_mobile()){
                              //-- 手機廣告 --
                              echo '
                              <a href="#" class="hv-center banner">
                               <img src="http://placehold.it/900x300" alt="">
                             </a>';
                            }
                           ?>

                        </div>

                      </div>
                    </div>

                    

                    <?php 
                    if(wp_is_mobile()){
                   ?>
                    <!--信用卡推薦-->
                     <div class="col-md-12 col ">

                         <div class="cardshap <?php echo $tab_style; ?> exception">
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
                                 <h4 class="text-center">匯豐銀行 MasterCard 鈦金卡</h4>
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
                                    <div class="col-md-6 col banner ">
                                        <img src="https://placehold.it/365x100" alt="">
                                    </div>
                                    <div class="col-md-6 col banner">
                                        <img src="https://placehold.it/365x100">
                                    </div>
                                </div>
                    <!--廣告end-->


                    <!--信用卡推薦-->
                    
                    <!--信用卡推薦end -->

                   <?php
                    }
                   ?>



                    <!--延伸閱讀-->
                    <?php 
                     $color_tab='green_tab';
                     require('../share_area/news_other1.php'); // 延伸閱讀區塊：：：：：：：：：：：：：：：：：：：：：：：
                    ?>
                    <!--延伸閱讀end -->

                    
                    
                   

                    
                   

                    <!--網友留言-->
                    <div id="message_area" class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">網友留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          
                          <?php 
                            //-- 網友留言 HTML --
                            require '../share_area/discuss_html.php';
                          ?>
                         
                        </div>
                      </div>
                    </div>
                    <!--網友留言end -->


                    <!--Facebook留言-->
                    <div id="fb_message" class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">Facebook留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="fb-comments" data-width="100%" data-href="<?php echo $FB_URL; ?>" data-numposts="5"></div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->


                    <!-- 上一則/下一則 -->
                     <div id="PrevNext_footer" class="col-md-12 row d-md-none pt-3 pb-5 mb-5">
                       <div class="col-6 d-block border-right">
                         <a <?php echo $prev_btn_display; ?> href="<?php echo $prev_url;?>">
                           <i class="fa fa-chevron-circle-left"></i>上一則 <br>
                           <p><?php echo $prev_news['ns_ftitle']; ?></p>
                         </a>
                       </div>
                       <div class="col-6 d-block text-right">
                         <a <?php echo $next_btn_display; ?> href="<?php echo $next_url;?>">
                           <i class="fa fa-chevron-circle-right"></i>下一則 <br>
                           <p><?php echo $next_news['ns_ftitle']; ?></p>
                         </a>
                         </div>
                       </div>
                       <!-- 上一則/下一則 -->


                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
              require $right_area;
            ?>
            <!--版面右側end-->
             <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60">
                        </div>
                    </div>
                    <!--廣告end-->
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
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

    <script type="text/javascript">
      $(document).ready(function() {
        //-- alt 圖說 --
        img_txt('.detail_content p img');
        
        //-- 圖寬限制 --
        img_750_w('.detail_content img');
        //-- table 優化 --
        html_table('.detail_content>table');
      });

      $(window).on('load', function() {
        //-- 內文插入廣告 --
        html_ad();
      });
    </script>

  </body>
</html>