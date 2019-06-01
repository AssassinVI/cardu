<?php session_start();
//尚未load出舊照片
//尚未標千還未排除disable的
//目前暫時用tb_index進入的內容頁
//目前load 出來的資料有點少，再檢查一下sql唷
require '../share_area/conn.php';
require '../share_area/get_news.php';
require 'config.php';

$todayis=date("Y-m-d"); //取得要查詢的日期，預設為今日

//取出類別資料
$pk = $_GET['nt_pk'];

$row=pdo_select('SELECT * FROM news_type WHERE pk='.$pk, $where);
$Tb_index =$row['Tb_index'];
$nt_name =$row['nt_name'];

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-<?php echo $nt_name?>新聞</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-<?php echo $nt_name?>新聞" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-<?php echo $nt_name?>新聞" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>


  </head>
  <body class="news_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/news/news.php">新聞</a> / <a href="javascript:;"><?php echo $nt_name?></a></p>
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
                       $sql_carousel="
                                      SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                      where mt_id = 'site2018111910430599' 
                                      and ns_verify=3 and OnLineOrNot=1
                                      and  StartDate<=:StartDate and EndDate>=:EndDate
                                      and ns_nt_pk='$Tb_index'
                                      order by ns_vfdate desc
                                      LIMIT 0, 10
                                     ";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                       } 
                       else{

                         //============================================
                         //每頁的輪播 (電腦)
                         //設定好sql後，交由 func.php執行
                         //============================================
                         $sql_carousel="
                          SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                          where mt_id = 'site2018111910430599' 
                          and ns_verify=3 and OnLineOrNot=1 
                          and StartDate<=:StartDate and EndDate>=:EndDate
                          and ns_nt_pk='$Tb_index'
                          order by ns_vfdate desc
                          LIMIT 0, 6
                          ";
                         slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                        
                       }
                      ?>

                      </div>
                    


                    <!--廣告-->
                    <?php 
                      if (wp_is_mobile()){
                    ?>
                       <div class="co bannerl-md-12 col banner"><img src="http://placehold.it/900x300" alt="banner"></div><!--banner end -->
                    <?php 
                     }else{
                    ?>

                      <div class="co bannerl-md-12 col banner"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    <?php
                     }
                    ?>
                    



                    <?php 
                      //-- 分頁判斷數 --
                      $num=12;
                      //--- 分頁起頭數 ---
                      $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                      //-- 目前分頁 --
                      $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];


                      //-- 總頁數 --
                      $row_list_total=$pdo->select("SELECT count(*) as total
                                              FROM NewsAndType
                                              WHERE mt_id='$mt_id' AND pk=:pk AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate"
                                              , ['pk'=>$_GET['nt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')], 'one');
                      $total_page=ceil(((int)$row_list_total['total'])/$num);


                      $row_list=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id, n.StartDate
                                             FROM appNews as n
                                             INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                             WHERE n.mt_id='$mt_id' AND nt.pk=:pk AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                             ORDER BY n.ns_vfdate DESC LIMIT $now_page_num, $num", ['pk'=>$_GET['nt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                     $row_list_num=count($row_list);
                     $count_i=ceil($row_list_num/3);

                     for ($i=0; $i <$count_i ; $i++) { 
                       
                       echo '<div class="col-md-12 col">
                              <div class="cardshap redius_bg">';

                       for ($j=$i*3; $j <($i+1)*3 ; $j++) {
                        
                        if ($j<$row_list_num) {

                          $row_list_one=$row_list[$j];
                          

                          $ns_ftitle=mb_substr($row_list_one['ns_ftitle'], 0,15,'utf-8');
                          $ns_msghtml=mb_substr(strip_tags($row_list_one['ns_msghtml']), 0,50,'utf-8');
                          $url=news_url($row_list_one['mt_id'], $row_list_one['Tb_index'], $row_list_one['ns_nt_pk'], $row_list_one['area_id']);
                          $fb_url=urlencode($url);
                 
                          //-- 圖文廣告(手機) --
                          if (wp_is_mobile() && $j==0){
                            echo '
                            <div class="row no-gutters py-md-3 mx-md-4 news_list">
                             <div class="col-md-4 col-6 py-2 pl-2">
                               <a class="img_div news_list_img" href="#" style="background-image: url(http://placehold.it/150x100);"></a>
                             </div>
                             <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                              <div class="mb-2">
                                <a href="#" title="廣告">
                                 <h3>我是圖文廣告</h3>
                                </a>
                              </div>
                               <p>我是圖文廣告...</p>
                             </div>
                            </div>';
                          }
                          
                          //-- 圖文廣告(手機) END --

                          echo '
                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                           <div class="col-md-4 col-6 py-2 pl-2">
                             <a class="img_div news_list_img" href="'.$url.'" style="background-image: url('.$img_url.$row_list_one['ns_photo_1'].');"></a>
                           </div>
                           <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <div class="mb-2">
                              <a href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'">
                               <h3>'.$row_list_one['ns_ftitle'].'</h3>
                               <br>
                               <small>('.$row_list_one['StartDate'].')</small>
                              </a>
                            </div>
                             <p>'.$ns_msghtml.'...</p>
                             
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
                        if ($i!=3 && $i!=$count_i) {
                          echo '
                          <div class="col-md-12 row">
                          <div class="col-md-6 col banner d-md-none d-sm-block ">
                              <img src="https://placehold.it/900x300" alt="">
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

                    <?php 
                     //-- 分頁 --
                     paging($total_page, $page);
                    ?>



                    <?php 
                     if(wp_is_mobile()){
                    ?>
                     <!--信用卡推薦-->
                      <div class="col-md-12 col mb-5 pb-5">

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


    <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>
    <script type="text/javascript">
      $("#pagenum").val("list.php?nt_pk=4&PageNo=<?php echo $PageNo;?>");
    </script>
  </body>
</html>