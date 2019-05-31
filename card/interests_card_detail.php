<?php 
 require '../share_area/conn.php';

 //-- 紀錄LOG --
 message_click_total($_SERVER['QUERY_STRING']);

 $row_detail=$pdo->select("SELECT * FROM appNews WHERE Tb_index=:Tb_index",['Tb_index'=>$_SERVER['QUERY_STRING']],'one');
 $ns_msghtml=mb_substr(strip_tags($row_detail['ns_msghtml']), 0, 400, 'utf-8');

 //-- 關聯信用卡 --
 $row_card=$pdo->select("SELECT bank_id, org_id
                         FROM appNews_bank_card 
                         WHERE news_id=:news_id
                         LIMIT 0,1", ['news_id'=>$_SERVER['QUERY_STRING']], 'one');

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $row_detail['ns_ftitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row_detail['ns_ftitle']; ?>,權益變更,卡情報"/>  
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
        
        <!-- 麵包屑 -->
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="interests_list.php">權益變更</a></p>
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
                                <div class="fb-like mr-2" data-href="<?php echo $FB_URL;?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=319016928941764&display=popup&link=<?php echo $FB_URL;?>&redirect_uri=https://www.facebook.com/', 'FB分享', config='height=600,width=800');"><img src="../img/component/search/fb.png" alt="" title="分享"></a>
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://social-plugins.line.me/lineit/share?url=<?php echo $FB_URL;?>', 'LINE分享', config='height=600,width=800');"><img src="../img/component/search/line.png" alt="" title="Line"></a>
                                <a class="search_btn" href="#fb_message"><img src="../img/component/search/message.png" alt="" title="訊息"></a>
                                 <a id="arrow_btn" class="search_btn" href="javascript:;"><img src="../img/component/search/arrow.png" alt="" title="更多"></a>
                               </div>
                               <div class="more_search">
                                 <a target="_blank" href="print.php?<?php echo $temparray[1]?>"><img src="../img/component/search/print.png" alt="" title="列印"></a>
                                 <a href="javascript:;" data-fancybox data-src="#member_div"><img src="../img/component/search/work.png" alt="" title="收藏"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_mail.php"><img src="../img/component/search/mail.png" alt="" title="信箱"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_error.php"><img src="../img/component/search/mood.png" alt="" title="回報"></a>
                               </div>
                               <!-- 分享 END -->
                            </div>
                          </div> 

                         
                        </div>

                        <div class="pb-3 mx-3 detail_content">

                          <?php 
                           if (!empty($row_detail['ns_photo_1'])){

                             $ns_alt_1=!empty($row_detail['ns_alt_1']) ? '<p>▲'.$row_detail['ns_alt_1'].'</p>' : '';
                             echo '
                             <div class="con_img">
                              <img src="'.$img_url.$row_detail['ns_photo_1'].'" alt="" >'.$ns_alt_1.'
                             </div>';
                           }
                          ?>

                            <?php 
                              echo $row_detail['ns_msghtml']; 
                              
                              //-- 注意事項 --
                              if (!empty($row_detail['note'])) {
                                echo '<p>◉注意事項：<br>'.$row_detail['note'].'</p>';
                              }

                              //-- 延伸閱讀 --
                              if (!empty($row_detail['ns_news'])) {

                                $ns_news=explode(',', $row_detail['ns_news']);
                                $ns_news_txt='';
                                foreach ($ns_news as $ns_news_one) {
                                  
                                  $row_ns_news=$pdo->select("SELECT ns_ftitle, mt_id, Tb_index, ns_nt_pk, area_id 
                                                             FROM NewsAndType 
                                                             WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_news_one], 'one');

                                  $ns_news_url=news_url($row_ns_news['mt_id'], $row_ns_news['Tb_index'], $row_ns_news['ns_nt_pk'], $row_ns_news['area_id']);

                                  $ns_news_txt.='▶▶<a href="'.$ns_news_url.'">'.$row_ns_news['ns_ftitle'].'</a><br>';
                                }
                                echo '<p>◉延伸閱讀：<br>'.$ns_news_txt.'</p>';
                              }
                            ?>

                             <div class="col-md-12 col px-0 hv-center">
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
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
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

                     <!--XXＸ更多好康-->
                    <div class="col-md-12 col">

                      <?php 
                        $where=['Tb_index'=>$_SERVER['QUERY_STRING'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')];

                        if (!empty($row_card['bank_id'])) {
                          $where_txt='ns_bank LIKE :ns_bank';
                          $where['ns_bank']='%'.$row_card['bank_id'].'%';

                          $title_name=$pdo->select("SELECT bi_shortname as t_anme FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$row_card['bank_id']], 'one');
                        }
                        else{
                          $where_txt='ns_org LIKE :ns_org';
                          $where['ns_org']='%'.$row_card['org_id'].'%';

                          $title_name=$pdo->select("SELECT org_nickname as t_anme FROM card_org WHERE Tb_index=:Tb_index", ['Tb_index'=>$row_card['org_id']], 'one');
                        }

                        $related_bk_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, mt_id, ns_nt_pk, area_id
                                                           FROM NewsAndType
                                                           WHERE $where_txt AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND Tb_index!=:Tb_index
                                                           ORDER BY ns_vfdate DESC
                                                           LIMIT 0,3", $where);
                        
                      ?>

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">
                              <?php echo $title_name['t_anme']; ?>更多好康</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters">

                              <?php 
                               foreach ($related_bk_news as $related_news_one) {

                                 $url=news_url($related_news_one['mt_id'], $related_news_one['Tb_index'], $related_news_one['ns_nt_pk'], $related_news_one['area_id']);
                                 $ns_ftitle=mb_substr($related_news_one['ns_ftitle'], 0,15,'utf-8');

                                 echo '
                                 <div class="col-md-4 col-12 cards-3 py-md-2">
                                   <a href="'.$url.'">
                                       <div class="img_div w-100-ph" title="'.$related_news_one['ns_ftitle'].'" style="background-image: url(../sys/img/'.$related_news_one['ns_photo_1'].');">
                                       </div>
                                       <p>'.$ns_ftitle.'</p>
                                   </a>
                                 </div>';
                               }
                              ?>
                          
                               
                            </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--XXＸ更多好康end -->
                    
                    <!--相關好康-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">相關權益變更</a>
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
                                                           LIMIT 0,3", 
                                                           ['Tb_index'=>$_SERVER['QUERY_STRING'], 'ns_nt_pk'=>$row_detail['ns_nt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                               foreach ($related_news as $related_news_one) {

                                 $url=news_url($related_news_one['mt_id'], $related_news_one['Tb_index'], $related_news_one['ns_nt_pk'], $related_news_one['area_id']);
                                 $ns_ftitle=mb_substr($related_news_one['ns_ftitle'], 0,15,'utf-8');

                                 echo '
                                 <div class="col-md-4 col-12 cards-3 py-md-2">
                                   <a href="'.$url.'">
                                       <div class="img_div w-100-ph" title="'.$related_news_one['ns_ftitle'].'" style="background-image: url(../sys/img/'.$related_news_one['ns_photo_1'].');">
                                       </div>
                                       <p>'.$ns_ftitle.'</p>
                                   </a>
                                 </div>';
                               }
                              ?>

                               
                            </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--相關好康end -->


                    
                    
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

                    
                    <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content py-md-4 py-0" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4">
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
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4">
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
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>




                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->
                    <!--手機板信用卡推薦-->
                            <div class="col-md-12 col d-md-none d-sm-block">

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
                              



                    <!--網友留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
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

                   <div class="col-12 py-4">
                    </div>

                  
                  <?php 
                 //-- 手機懸浮廣告 --
                 if (wp_is_mobile()) {
                ?>

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
                <?php
                 }
                ?>


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
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>