<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <title>卡優新聞網-優旅行</title>
    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅" />
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <link rel="shortcut icon" href="../images/favicon.ico" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-優旅行" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-優旅行" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
    
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>
</head>

<body class="travel_body">
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
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">優旅行</a></p>
          </div>
        </div>

            <!--版面--->
            <div class="row">
                <!--版面左側-->
                <div class="index-content-left col0">
                 
                    <div class="row">
                        <div class="col-md-12 col">
                          
                        <?php 

                         //-- 優旅行單元 --
                         $ns_nt_ot_pk_query="";
                         $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id='at2019011117461656'");
                         foreach ($row_newsType as $newsType) {
                          $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                         }
                         $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


                         //-- 判斷是否為手機 --
                         if (wp_is_mobile()){
                        
                         //============================================
                         //每頁的輪播 (手機)
                         //設定好sql後，交由 func.php執行
                         //============================================
                         $sql_carousel="SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id
                                        FROM NewsAndType
                                        WHERE (area_id='at2019011117461656' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                        ORDER BY ns_vfdate DESC LIMIT 0,10";

                         slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                         } 
                         else{

                           //============================================
                           //每頁的輪播 (電腦)
                           //設定好sql後，交由 func.php執行
                           //============================================

                           $sql_carousel="
                            SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id
                            FROM NewsAndType
                            WHERE (area_id='at2019011117461656' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                            ORDER BY ns_vfdate DESC LIMIT 0,6";
                           slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                          
                         }
                        ?>

                        </div>


                    <!--廣告-->
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
                    <!--廣告end-->    


                    <!--旅行分享-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="box-tab"  href="share.php">旅行分享</a>
                            <a class="top_link" href="share.php" title="更多"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">


                              <?php 

                               //-- 旅行分享單元 --
                               $ns_nt_ot_pk_query="";
                               $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id='un2019011717563437'");
                               foreach ($row_newsType as $newsType) {
                                $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                               }
                               $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);

                               //-- 旅行分享 --
                               $row_news_con=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, area_id
                                                           FROM NewsAndType 
                                                           WHERE (unit_id='un2019011717563437' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                           ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                                           ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                               $slide_txt='';

                               for ($i=0; $i <2 ; $i++) { 
                                        
                                        $news_txt='';

                                        for ($j=0; $j <3 ; $j++) { 
                                          $index=($i*3)+$j;
                                          $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');
                                          $ns_msghtml=mb_substr(strip_tags( $row_news_con[$index]['ns_msghtml']), 0,30, 'utf-8');

                                          //-------------- 網址判斷 ------------------
                                          $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                                          
                                          $news_txt.='
                                          <div class="col-md-4 cards-3 col-12">
                                             <a href="'.$news_url.'">
                                                 <div class="img_div w-100-ph" title="'.$row_news_con[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                                 </div>
                                                 <h6 class="mt-2">'.$ns_ftitle.'</h6>
                                                 <p class="px-3">'.$ns_msghtml.'</p>
                                             </a>
                                          </div>';
                                        }

                                        $slide_txt.='
                                        <div class="swiper-slide">
                                        <div class="row no-gutters travel_text">
                                          '.$news_txt.'
                                        </div>
                                      </div>';
                               }

                               $content_txt='<div class="tab-pane fade show '.$active.'" id="card_'.$x.'" role="tabpanel" aria-labelledby="card_'.$x.'-tab">
                                               <div class="swiper-container sub_slide">
                                                  <div class="swiper-wrapper">
                                                  '.$slide_txt.'
                                                  </div>

                                                  <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                                  <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                               </div>
                                              </div>';
                                echo $content_txt;
                              ?>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--旅行分享end -->


                    <!--行程推薦-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="box-tab"  href="recommend.php" tab-target="#box" aria-selected="true">行程推薦</a>
                            <a class="top_link" title="更多" href="recommend.php"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                            <?php 
                             //-- 行程推薦單元 --
                             $ns_nt_ot_pk_query="";
                             $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id='un2019011717564690'");
                             foreach ($row_newsType as $newsType) {
                              $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                             }
                             $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


                             //-- 行程推薦 --
                             $row_news_con=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, area_id
                                                         FROM NewsAndType 
                                                         WHERE (unit_id='un2019011717564690' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                         ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                                         ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                             $slide_txt='';

                             for ($i=0; $i <2 ; $i++) { 
                                      
                                      $news_txt='';

                                      for ($j=0; $j <3 ; $j++) { 
                                        $index=($i*3)+$j;
                                        $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');
                                        $ns_msghtml=mb_substr(strip_tags( $row_news_con[$index]['ns_msghtml']), 0,30, 'utf-8');

                                        //-------------- 網址判斷 ------------------
                                        $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                                        
                                        $news_txt.='
                                        <div class="col-md-4 cards-3 col-12">
                                           <a href="'.$news_url.'">
                                               <div class="img_div w-100-ph" title="'.$row_news_con[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                               </div>
                                               <h6 class="mt-2">'.$ns_ftitle.'</h6>
                                               <p class="px-3">'.$ns_msghtml.'</p>
                                           </a>
                                        </div>';
                                      }

                                      $slide_txt.='
                                      <div class="swiper-slide">
                                      <div class="row no-gutters travel_text">
                                        '.$news_txt.'
                                      </div>
                                    </div>';
                             }

                             $content_txt='<div class="tab-pane fade show '.$active.'" id="card_'.$x.'" role="tabpanel" aria-labelledby="card_'.$x.'-tab">
                                             <div class="swiper-container sub_slide">
                                                <div class="swiper-wrapper">
                                                '.$slide_txt.'
                                                </div>

                                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                             </div>
                                            </div>';
                              echo $content_txt;
                            ?>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--行程推薦end -->
                     <!--廣告-->
                <div class="col-md-12 row">
                    <div class="col-md-6 col ">
                        <div class="cardshap hotCard tab_one green_tab">
                            <div class="title_tab hole">
                                <h4>刷卡秘笈 </h4>
                                <a class="more_link" href="tip.php"></a>
                            </div>
                            <div class="content_tab">
                               <div class="row no-gutters hv-center">

                                <?php 
                                //-- 刷卡秘笈單元 --
                                $ns_nt_ot_pk_query="";
                                $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id='un2019011717570690'");
                                foreach ($row_newsType as $newsType) {
                                 $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                                }
                                $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


                                 //-- 刷卡秘笈 --
                                 $row_news_con=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, area_id
                                                             FROM NewsAndType 
                                                             WHERE (unit_id='un2019011717570690' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                             ORDER BY ns_vfdate DESC LIMIT 0,2", 
                                                             ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                                 foreach ($row_news_con as $news_con) {

                                  $ns_ftitle=mb_substr($news_con['ns_ftitle'], 0,15, 'utf-8');
                                  //-------------- 網址判斷 ------------------
                                  $news_url=news_url($news_con['mt_id'], $news_con['Tb_index'], $news_con['ns_nt_pk'], $news_con['area_id']);
                                   
                                   echo '
                                  <div class="travel_text">
                                    <a class="img_b" href="'.$news_url.'">
                                     <div class="img_div w-h-100" title="'.$news_con['ns_ftitle'].'" style="background-image: url(../sys/img/'.$news_con['ns_photo_1'].');"></div>
                                     <h6 class="mt-2">'.$ns_ftitle.'</h6>
                                   </a>
                                  </div>';
                                 }
                                ?>

                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col ">
                        <div class="cardshap hotCard tab_one green_tab">
                            <div class="title_tab hole">
                                <h4>優惠情報 </h4>
                                 <a class="more_link" href="banefit.php"></a>
                            </div>
                            <div class="content_tab">
                                <div class="row no-gutters travel_text">

                                  <?php 
                                   //-- 優惠情報 --
                                   $row_news_con=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, area_id
                                                               FROM NewsAndType 
                                                               WHERE unit_id='un2019011717571414' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                               ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                                               ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                                    $x=1;
                                    foreach ($row_news_con as $news_con) {
                                      
                                      $ns_ftitle=mb_substr($news_con['ns_ftitle'], 0,10, 'utf-8');
                                      //-------------- 網址判斷 ------------------
                                      $news_url=news_url($news_con['mt_id'], $news_con['Tb_index'], $news_con['ns_nt_pk'], $news_con['area_id']);

                                      echo '
                                      <div class="col-md-6 col-6">
                                        <a class="img_c" href="'.$news_url.'">
                                         <div class="img_div w-h-100" title="'.$news_con['ns_ftitle'].'" style="background-image: url(../sys/img/'.$news_con['ns_photo_1'].');"></div>
                                         <h6 class="mt-2">'.$ns_ftitle.'</h6>
                                       </a>
                                      </div>';

                                      if ($x%2==0) {
                                        echo '<hr>';
                                      }
                                      $x++;
                                    }

                                  ?>

                                  
                                </div>
                               

                            </div>
                        </div>
                    </div>
                    

                        </div>
                <!--優惠情報end-->
                     
                     
                    </div>
                </div>
                <!--版面左側end-->
                <!--版面右側-->
                <?php 
                  require 'right_area_div.php';
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
        
         <?php 
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>
</body>

</html>