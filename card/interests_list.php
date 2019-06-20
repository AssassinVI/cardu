<?php 
 require '../share_area/conn.php';
 require 'config.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網 - 卡情報 > 權益變更</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="https://www.cardu.com.tw" />
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="cardNews_body">

    <div class="container">

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
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/card/card.php">卡情報</a> / <a href="javascript:;">權益變更</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                <div class="row">

                  <div class="col-md-12 col">
                  
                      <?php 
                       //-- 判斷是否為手機 --
                       if (wp_is_mobile()){
                      
                       //============================================
                       //每頁的輪播 (手機)
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                                      FROM appNews as n
                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                      WHERE n.mt_id='$mt_id' AND n.ns_nt_pk='nt201902121004593' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                      ORDER BY n.ns_vfdate DESC LIMIT 0,10";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                       } 
                       else{

                         //============================================
                         //每頁的輪播 (電腦)
                         //設定好sql後，交由 func.php執行
                         //============================================
                         $sql_carousel="
                          SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                          FROM appNews as n
                          INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                          WHERE n.mt_id='$mt_id' AND n.ns_nt_pk='nt201902121004593' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                          ORDER BY n.ns_vfdate DESC LIMIT 0,6
                          ";
                         slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                        
                       }
                      ?>
                      
                  
                  </div>



                   <?php 
                    //-- 判斷是否為手機 --
                    if (wp_is_mobile()){
                   ?>

                   <!--手機板廣告-->
                     <div class="col-md-12 row">
                         <div class="col-md-6 col banner d-md-none d-sm-block ">
                             <img src="https://placehold.it/365x100" alt="">
                         </div>
                     </div>
                     <!--廣告end-->
                     

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

                   <?php } ?>



                   <?php 
                     //-- 分頁判斷數 --
                     $num=12;
                     //--- 分頁起頭數 ---
                     $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                     //-- 目前分頁 --
                     $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];


                     //-- 總頁數 --
                     $row_list_total=$pdo->select("SELECT count(*) as total
                                             FROM appNews
                                             WHERE mt_id='$mt_id' AND ns_nt_pk='nt2019021210051224' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate"
                                             , ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')], 'one');
                     $total_page=ceil(((int)$row_list_total['total'])/$num);


                     $row_list=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, n.StartDate, nt.area_id
                                            FROM appNews as n
                                            INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                            WHERE n.mt_id='$mt_id' AND n.ns_nt_pk='nt2019021210051224' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                            ORDER BY n.ns_vfdate DESC LIMIT $now_page_num, $num", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                    $row_list_num=count($row_list);
                    $count_i=ceil($row_list_num/3);

                    for ($i=0; $i <$count_i ; $i++) { 
                      
                      echo '<div class="col-md-12 col">
                             <div class="cardshap redius_bg">';

                      for ($j=$i*3; $j <($i+1)*3 ; $j++) { 
                       
                       if ($j<$row_list_num) {
                         $row_list_one=$row_list[$j];
                         $ns_ftitle=mb_substr($row_list_one['ns_ftitle'], 0,15,'utf-8');
                         $ns_msghtml=mb_substr(strip_tags($row_list_one['ns_msghtml']), 0,55,'utf-8');
                         $url=news_url($row_list_one['mt_id'], $row_list_one['Tb_index'], $row_list_one['ns_nt_pk'], $row_list_one['area_id']);
                         $fb_url=urlencode($url);
                         echo '
                         <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="'.$url.'" style="background-image: url('.$img_url.$row_list_one['ns_photo_1'].');"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                           <a href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'">
                            <h3>'.$ns_ftitle.'<small>('.date('Y/m/d', strtotime($row_list_one['StartDate'])).')</small></h3>
                            <p>'.$ns_msghtml.'...</p>
                            </a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=119&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="119" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                         </div>';
                       }
                      }

                      echo '</div>
                          </div>';


                     //-- 廣告 --
                     if (wp_is_mobile()) {
                       if ($i!=3) {
                         echo '
                         <div class="col-md-12 row">
                         <div class="col-md-6 col banner d-md-none d-sm-block ">
                             <img src="https://placehold.it/365x100" alt="">
                         </div>
                         </div>';
                       }
                     }
                     else{
                       if ($i%2==0) {
                         echo '<div class="col-md-12 col banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
                       }
                       else{
                         echo '<div class="col-md-12 row phone_hidden">
                                  <div class="col-md-6 col banner ">
                                      <img src="https://placehold.it/365x100" alt="">
                                  </div>
                                  <div class="col-md-6 col banner">
                                      <img src="https://placehold.it/365x100">
                                  </div>
                              </div>';
                       }
                     }
                    }
                   ?>


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


                    <?php 
                     //-- 分頁 --
                     paging($total_page, $page);
                    ?>

                    <div class="col-12 py-5">
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
              if (!wp_is_mobile()) {
                require 'right_area_div.php';
              }
            ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>