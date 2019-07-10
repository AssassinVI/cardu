<?php 
 require '../share_area/conn.php';

 //-- 紀錄LOG --
 message_click_total($_SERVER['QUERY_STRING']);

 $row_detail=$pdo->select("SELECT * FROM appNews WHERE Tb_index=:Tb_index",['Tb_index'=>$_SERVER['QUERY_STRING']],'one');
 $ns_msghtml=mb_substr(strip_tags($row_detail['ns_msghtml']), 0, 400, 'utf-8');


 //-- 404 判斷 --
 if (empty($row_detail['Tb_index'])) {
  location_up('../member/my404.php?card','');
  exit();
 }


 //-- 關聯信用卡 --
 $row_card=$pdo->select("SELECT  cc.cc_interest_desc, cc.cc_doc_path, cc.cc_doc_url
                         FROM appNews_bank_card as abc
                         INNER JOIN credit_card as cc ON cc.cc_group_id=abc.card_group_id AND cc.cc_cardorg=abc.org_id AND cc.cc_cardlevel=abc.level_id
                         INNER JOIN card_level as level ON  level.Tb_index=abc.level_id
                         WHERE abc.news_id=:news_id
                         ORDER BY level.OrderBy ASC
                         LIMIT 0,1", ['news_id'=>$_SERVER['QUERY_STRING']], 'one');


 //-- 上下篇新聞  --
 $where=[
   'StartDate'=>date('Y-m-d'), 
   'EndDate'=>date('Y-m-d'), 
   'ns_nt_pk'=>$row_detail['ns_nt_pk'], 
   'ns_nt_ot_pk'=>'%'.$row_detail['ns_nt_pk'].'%', 
   'ns_vfdate'=>$row_detail['ns_vfdate']
 ];
 
 //-- 上一篇 --
 $prev_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate
                                   FROM NewsAndType 
                                   WHERE ns_verify=3 AND OnLineOrNot=1 
                                   AND StartDate<=:StartDate AND EndDate>=:EndDate AND ns_nt_pk=:ns_nt_pk 
                                   AND ns_vfdate>:ns_vfdate  ORDER BY ns_vfdate ASC LIMIT 0,1 ", $where, 'one');
 
 //-- 下一篇 --
 $next_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate
                                   FROM NewsAndType 
                                   WHERE ns_verify=3 AND OnLineOrNot=1 
                                   AND StartDate<=:StartDate AND EndDate>=:EndDate AND ns_nt_pk=:ns_nt_pk 
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


    <title><?php echo $row_detail['ns_ftitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row_detail['ns_ftitle']; ?>,新卡訊,卡情報"/>  
    <meta name="description" content="<?php echo $ns_msghtml;?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $row_detail['ns_ftitle']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $row_detail['ns_ftitle']; ?>" />
    <meta property="og:description" content="<?php echo $ns_msghtml;?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="cardNews_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="new_card_list.php">新卡訊</a></p>
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
                          <h2><?php echo $row_detail['ns_ftitle']; ?></h2>
                          <div class="row no-gutters my-3">

                            <div class="col-md-6">
                              <h4><?php echo $row_detail['ns_stitle']; ?></h4>
                            </div>
                            <div class="col-md-6">


                                <!-- 分享 -->
                               <div class="search_div hv-center">

                                <?php 
                                  if (!empty($row_card['cc_doc_url'])) {
                                    echo '<a target="_blank" href="'.$row_card['cc_doc_url'].'" class="btn warning-layered btnOver mr-3">立即辦卡</a>';
                                  }
                                  else{
                                    echo '<a target="_blank" href="'.$row_card['cc_doc_path'].'" class="btn warning-layered btnOver mr-3">立即辦卡</a>';
                                  }

                                  //-- 收藏 ---
                                  $save_a_attr=empty( $_SESSION['ud_pk'] ) ? 'data-fancybox data-src="#member_div"' : 'onclick="my_favorite(\''.$_SERVER['QUERY_STRING'].'\');"';
                                ?>


                                <div class="fb-like mr-2" data-href="<?php echo $FB_URL;?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                 <!-- FB分享 -->
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=319016928941764&display=popup&link=<?php echo urlencode($FB_URL);?>&redirect_uri=https://www.facebook.com/', 'FB分享', config='height=600,width=800');">
                                  <img src="../img/component/search/fb.png" alt="" title="分享">
                                 </a>
                                 <!-- LINE分享 -->
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://social-plugins.line.me/lineit/share?url=<?php echo urlencode($FB_URL);?>', 'LINE分享', config='height=600,width=800');">
                                  <img src="../img/component/search/line.png" alt="" title="Line">
                                 </a>
                                 <!-- 訊息 -->
                                 <a class="search_btn message_btn" href="javascript:;"><img src="../img/component/search/message.png" alt="" title="訊息"></a>
                                 <!-- 更多 -->
                                 <a id="arrow_btn" class="search_btn phone_hidden" href="javascript:;"><img src="../img/component/search/arrow.png" alt="" title="更多"></a>
                               </div>
                               <div class="more_search">
                                 <a target="_blank" href="new_card_print.php?<?php echo $_SERVER['QUERY_STRING'];?>"><img src="../img/component/search/print.png" alt="" title="列印"></a>
                                 <a href="javascript:;" <?php echo $save_a_attr; ?>><img src="../img/component/search/work.png" alt="" title="收藏"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_mail.php?<?php echo $_SERVER['QUERY_STRING'];?>"><img src="../img/component/search/mail.png" alt="" title="信箱"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_error.php"><img src="../img/component/search/mood.png" alt="" title="回報"></a>
                               </div>
                               <!-- 分享 END -->
                            </div>
                          </div> 
                          
                          <!-- 信用卡特色 -->
                          <div class="row no-gutters my-3 newcard_g cardshap">
                            <?php 
                             if (empty($row_detail['ccard_sp'])) {
                               
                               $card_adv=preg_split('/\n/',$row_card['cc_interest_desc']);
                               foreach ($card_adv as $card_adv_one) {
                                 echo '<div class="col-md-6 py-1"><span><img src="../img/component/li_brown.png"> </span>'.$card_adv_one.'</div>';
                               }

                             }
                             else {
                               $card_adv=preg_split('/\n/',$row_detail['ccard_sp']);
                               foreach ($card_adv as $card_adv_one) {
                                 echo '<div class="col-md-6 py-1"><span><img src="../img/component/li_brown.png"> </span>'.$card_adv_one.'</div>';
                               }
                             }
                             
                            ?>
                          </div> 
                          <!-- 信用卡特色 END -->

                        </div>

                        <div class="pb-3 mx-3 detail_content">


                        <?php 
                         
                         //-- 首圖 --
                         echo '<p>
                                <img src="'.$img_url.$row_detail['ns_photo_1'].'" alt="'.$row_detail['ns_alt_1'].'">
                               </p>';
                         

                        if(wp_is_mobile()){
                          //-- 手機廣告 --
                          echo '
                          <a href="#" class="hv-center banner">
                           <img src="http://placehold.it/900x300" alt="">
                         </a>';

                        }
                        
                        //-- html 內文 --
                        echo $row_detail['ns_msghtml'];

                        //-- 尾圖 --
                        if(!empty($row_detail['ns_photo_2'])) {

                          echo '<p>
                                 <img src="'.$img_url.$row_detail['ns_photo_2'].'" alt="'.$row_detail['ns_alt_2'].'">
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

                          


                           <div class="col-md-12 col hv-center">
                            <div class="row paybg">
                              
                             <div class="col-md-4 hv-center">
                              <p>☆謹慎理財，信用至上☆</p>
                             </div>
                             <div class="col-md-8 hv-center">
                              <p>本文中之活動內容以該銀行、公司公告為準<br>
                                 本文中之各註冊商標、公司名稱，皆屬該公司所有</p>
                             </div> 
                            
                           </div> 
                          </div>
                        </div>

                      </div>
                    </div>

                    
                     <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center banner ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col hv-center banner">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->
                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->



                    <!--延伸閱讀-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">相關新卡訊</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">

                              <?php 
                               $related_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, mt_id, ns_nt_pk, area_id
                                                           FROM NewsAndType
                                                           WHERE ns_nt_pk=:ns_nt_pk AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND Tb_index!=:Tb_index
                                                           ORDER BY ns_vfdate DESC
                                                           LIMIT 0,6", 
                                                           ['Tb_index'=>$_SERVER['QUERY_STRING'], 'ns_nt_pk'=>$row_detail['ns_nt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                               
                               $x=1;
                               $c_news_txt='';
                               foreach ($related_news as $related_news_one) {

                                 $url=news_url($related_news_one['mt_id'], $related_news_one['Tb_index'], $related_news_one['ns_nt_pk'], $related_news_one['area_id']);
                                 $ns_ftitle=mb_substr($related_news_one['ns_ftitle'], 0,15,'utf-8');

                                 //-- 手機樣式 --
                                 if (wp_is_mobile() && $x>2) {

                                   if ($x==3) {
                                     $c_news_txt.= ' 
                                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                         <div class="col-md-4 col-6 py-2 ">
                                            <a target="_blank" class="img_div news_list_img" href="#" style="background-image: url(https://placehold.it/150x100);"></a>
                                         </div>
                                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                           <div class="mb-2">
                                            
                                              <h3>
                                               <a target="_blank" href="#" >我是廣告我是廣告我是廣告我是廣告 </a>
                                              </h3>
                                            
                                           </div>
                                          </div>
                                         </div>';
                                   }
                                   
                                   $c_news_txt.= '
                                       <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                         <div class="col-md-4 col-6 py-2 ">
                                            <a target="_blank" class="img_div news_list_img" href="'.$url.'" style="background-image: url(../sys/img/'.$related_news_one['ns_photo_1'].');"></a>
                                         </div>
                                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                           <div class="mb-2">
                                            <h3>
                                             <a target="_blank" href="'.$url.'" title="'.$related_news_one['ns_ftitle'].'">'.$ns_ftitle.'</a>
                                            </h3>
                                             
                                           </div>
                                          </div>
                                         </div>';
                                 }

                                 //-- 電腦樣式 --
                                 else{

                                  $c_news_txt.= '
                                   <div class="col-md-4 cards-3 py-md-2 col-6">
                                      <a target="_blank" href="'.$url.'" title="'.$related_news_one['ns_ftitle'].'">
                                          <div class="img_div"  style="background-image: url(../sys/img/'.$related_news_one['ns_photo_1'].');">
                                          </div>
                                          <p>'.$ns_ftitle.'</p>
                                      </a>
                                   </div>';
                                 }

                                 
                                 $x++;
                                 // echo '
                                 // <div class="col-md-4 col-12 cards-3 py-md-2">
                                 //   <a href="'.$url.'" title="'.$related_news_one['ns_ftitle'].'">
                                 //       <div class="img_div w-100-ph"  style="background-image: url(../sys/img/'.$related_news_one['ns_photo_1'].');">
                                 //       </div>
                                 //       <p>'.$ns_ftitle.'</p>
                                 //   </a>
                                 // </div>';
                               }
                               echo $c_news_txt;
                               ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--延伸閱讀end -->
                   

                   <?php 
                     if(wp_is_mobile()){
                    ?>
                     <!--信用卡推薦-->
                      <div class="col-md-12 col ">

                          <div class="cardshap brown_tab exception">
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

                         <div class="cardshap brown_tab phone_hidden">
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
                    <div id="message_area" class="col-md-12 col">

                        <div class="cardshap brown_tab ">
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
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">Facebook留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="fb-comments" data-width="100%" data-href="http://srl.tw/cardu/news_detail.html" data-numposts="5"></div>
                           
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
              if (!wp_is_mobile()) {
                require 'right_area_div.php';
              }
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
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>

        <script type="text/javascript">
          $(document).ready(function() {
            
            //-- alt 圖說 & 手機加入fancybox --
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