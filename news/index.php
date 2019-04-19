<?php session_start();
//尚未加上link
//尚未load出舊照片
//尚未標千還未排除disable的
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>卡優新聞網-焦點新聞</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

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
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>


  </head>
  <body class="news_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         require '../share_area/header.php';
        ?>

        <!-- 麵包屑 -->
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="#">首頁</a> / <a href="#">新聞</a></p>
          </div>
        </div>

        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                    <?php 
                    //===================================
                    //去除所有的空白
                    //===================================

                    function myTrim($str)
                    {
                    $search = array(" ","　","\n","\r","\t");
                    $replace = array("","","","","");
                    return str_replace($search, $replace, $str);
                    }


                    $todayis=date("Y-m-d");
                    //===================================
                    //取出最新 12筆資料,依審核完成時間
                    //===================================
                    $pdo=pdo_conn();
                    $sql=$pdo->prepare("
                      SELECT ns_ftitle,ns_photo_1,ns_msghtml FROM  appNews
                      where mt_id = 'site2018111910430599' and ns_vfdate<>'0000-00-00 00:00:00' 
                      and  StartDate<='$todayis' and EndDate>='$todayis'
                      order by ns_vfdate desc
                      LIMIT 0, 12
                   
                      ");
                    $sql->execute();


                    //分批取出part1---------
                    $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                      //echo "222".$row['ns_ftitle']."<br>";
                        if($i==1){
                          $activeornot="active";
                        }else{
                          $activeornot="";
                        }

                      $ns_ftitle=$row['ns_ftitle'];
                      $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 15,"utf-8");
                      $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                      $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

                      $photo1.="<a href=\"#\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";


                      $msg1.="<a class=\"$activeornot\" href=\"#\" index=\"$i\" title=\"$ns_ftitle\">
                                <h4>$ns_stitle</h4>
                                <p>$ns_msghtml...</p>
                              </a>\n";
                      if ( $i==4 ) break;
                    $i++; } //end part1


                    //分批取出part2---------
                    $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                      $activeornot=""; //預設後面都沒有囉

                      $ns_ftitle=$row['ns_ftitle'];
                      $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 15,"utf-8");
                      $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                      $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

                      $photo2.="<a href=\"#\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";


                      $msg2.="<a class=\"$activeornot\" href=\"#\" index=\"$i\" title=\"$ns_ftitle\">
                                <h4>$ns_stitle</h4>
                                <p>$ns_msghtml...</p>
                              </a>\n";
                      if ( $i==4 ) break;
                    $i++; } //end part2


                    //分批取出part2---------
                    $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                      $activeornot=""; //預設後面都沒有囉

                      $ns_ftitle=$row['ns_ftitle'];
                      $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 15,"utf-8");
                      $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                      $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

                      $photo3.="<a href=\"#\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";


                      $msg3.="<a class=\"$activeornot\" href=\"#\" index=\"$i\" title=\"$ns_ftitle\">
                                <h4>$ns_stitle</h4>
                                <p>$ns_msghtml...</p>
                              </a>\n";
                      if ( $i==4 ) break;
                    $i++; } //end part2


                    ?>
                  
                      <!-- 四小三大輪播 -->
                      <div id="new_iNews" class="cardshap new_slide">
                          <div class="swiper-container">
                              <div class="swiper-wrapper">
                                  <div class="swiper-slide" > 

                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <?php echo $photo1?>
                                      </div>
                                      <div class="slide_list">
                                         <?php echo $msg1?>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="swiper-slide"> 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <?php echo $photo2?>
                                      </div>
                                      <div class="slide_list">
                                        <?php echo $msg2?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="swiper-slide" > 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <?php echo $photo3?>
                                      </div>
                                      <div class="slide_list">
                                        <?php echo $msg3?>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <!-- 如果需要分页器 -->
                              <div class="swiper-pagination"></div>

                          </div>
                      </div>
                      <!-- 四小三大輪播 END -->
                  
                  </div>

                    <!--廣告-->
                    <div class="col-md-12 col"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->

                    <?php 
                    //===================================
                    //取出特別議題頁籤
                    //===================================
                      $sql_special=$pdo->prepare("
                        SELECT nt_name,Tb_index FROM news_type
                        where mt_id='site2018111910445721' and nt_sp=1 and nt_sp_begin_date <= '$todayis' and nt_sp_end_date >= '$todayis' 
                        order by OrderBy  
                        LIMIT 0, 4");
                      $sql_special->execute();
                      $row_specials = $sql_special->fetchAll();

                    ?>
                    
                   

                    <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap blue_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                              <?php 
                              //tab來個回圈＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
                              $i=1;
                              foreach ($row_specials as $row_special) {
                                if($i==1){
                                    $activeornot="active";
                                  }else{
                                    $activeornot="";
                                  }
                              $nt_name = $row_special['nt_name'];

                              echo "<li class='nav-item news_tab'>
                                      <a class='nav-link pl-30 py-2 $activeornot' id='special_$i-tab' href='second.php' tab-target='#special_$i' aria-selected='true'>$nt_name</a>
                                    </li>";
                              $i++;}
                              ?>



                        </ul>

                        <div class="tab-content" id="myTabContent">

                              <?php 
                              //內容也來個回圈＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
                              $y=1;
                              foreach ($row_specials as $row_special) {
                                  if($y==1){
                                    $activeornot="active";
                                  }else{
                                    $activeornot="";
                                  }

                                  $Tb_index = $row_special['Tb_index'];


                                  $sql_part=$pdo->prepare("
                                    SELECT ns_ftitle,ns_photo_1,ns_msghtml FROM  appNews
                                    where mt_id = 'site2018111910430599' and ns_nt_sp_pk='$Tb_index'
                                    and ns_vfdate<>'0000-00-00 00:00:00' 
                                    and  StartDate<='$todayis' and EndDate>='$todayis'
                                    order by ns_vfdate desc
                                    LIMIT 0, 6
                                 
                                    ");
                                  $sql_part->execute();

                                  //分批取出part1---------
                                  $i=1; while ($row_part=$sql_part->fetch(PDO::FETCH_ASSOC)) {

                                    $ns_ftitle=$row_part['ns_ftitle'];
                                    $ns_msghtml=$row_part['ns_msghtml'];
                                    $ns_photo_1="../sys/img/".$row_part['ns_photo_1'];

                                    $part1.="
                                    <div class='col-4 cards-3'>
                                           <a href='#'>
                                           <div class='img_div' title='$ns_ftitle' style='background-image: url($ns_photo_1);'>
                                           </div>
                                           <p>$ns_ftitle</p>
                                       </a>
                                    </div>
                                    ";

                                    if ( $i==3 ) break;
                                  $i++; } //end part1

                                  //分批取出part2---------
                                  $i=1; while ($row_part=$sql_part->fetch(PDO::FETCH_ASSOC)) {

                                    $ns_ftitle=$row_part['ns_ftitle'];
                                    $ns_msghtml=$row_part['ns_msghtml'];
                                    $ns_photo_1="../sys/img/".$row_part['ns_photo_1'];

                                    $part2.="
                                    <div class='col-4 cards-3'>
                                           <a href='#'>
                                           <div class='img_div' title='$ns_ftitle' style='background-image: url($ns_photo_1);'>
                                           </div>
                                           <p>$ns_ftitle</p>
                                       </a>
                                    </div>
                                    ";

                                    if ( $i==3 ) break;
                                  $i++; } //end part2
                              ?>



                              <div class="tab-pane fade show <?php echo $activeornot?>" id="special_<?echo $y?>" role="tabpanel" aria-labelledby="special_<?echo $y?>-tab">

                                    <div class="swiper-container sub_slide">
                                            <div class="swiper-wrapper">
                                              <div class="swiper-slide" > 
                                                <div class="row no-gutters">

                                                  <?php echo $part1?>

                                              </div>
                                            </div>

                                            <div class="swiper-slide" > 
                                                <div class="row no-gutters">

                                                  <?php echo $part2?>


                                              </div>
                                            </div>

                                          </div>
                                          <!-- 如果需要导航按钮 -->
                                          <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                          <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                </div>


                          </div><!-- end special_<?echo $y?> -->
                          <?php 
                          $part1="";
                          $part2="";
                          $y++;} //結束tab內容＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝?>
                        


                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
                    
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


                    <!--專題、卡訊、行動PAY -->
                    <div class="col-md-12 col">

                        <div class="cardshap blue_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab" href="second.php" tab-target="#title_1" aria-selected="true" >專題</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_2-tab" href="second.php" tab-target="#title_2" aria-selected="false" >卡訊</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_3-tab" href="second.php" tab-target="#title_3" aria-selected="false" >行動Pay</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         

                         <!-- tab-content -->
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">
                            <div class="swiper-container sub_slide">
                                <div class="swiper-wrapper">
                                  <div class="swiper-slide" >
                                    <div class="row no-gutters">
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="swiper-slide" >
                                    <div class="row no-gutters">
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>

                            </div>
                          </div>
                          <!-- tab-content END -->

                          <!-- tab-content -->
                          <div class="tab-pane fade" id="title_2" role="tabpanel" aria-labelledby="title_2-tab">
                            <div class="swiper-container sub_slide">
                                <div class="swiper-wrapper">
                                  <div class="swiper-slide" >
                                    <div class="row no-gutters">
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="swiper-slide" >
                                    <div class="row no-gutters">
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>

                            </div>
                          </div>
                          <!-- tab-content END -->
                          
                          <!-- tab-content -->
                          <div class="tab-pane fade" id="title_3" role="tabpanel" aria-labelledby="title_3-tab">
                            <div class="swiper-container sub_slide">
                                <div class="swiper-wrapper">
                                  <div class="swiper-slide" >
                                    <div class="row no-gutters">
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo3.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo3.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo3.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="swiper-slide" >
                                    <div class="row no-gutters">
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                        <div class="col-4 cards-3">
                                           <a href="#">
                                               <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                               </div>
                                               <p>遊日血拚大回饋，信用卡大調查</p>
                                           </a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>

                            </div>
                          </div>
                          <!-- tab-content END -->
                         
                        </div>
                      </div>
                    </div>
                    <!--專題、卡訊、行動PAY end -->

                    
                    
                    <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                    
                    <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap blue_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2" id="title_4-tab" href="second.php" tab-target="#title_4" aria-selected="true">財經</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_5-tab" href="second.php" tab-target="#title_5" aria-selected="false">科技</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_6-tab" href="second.php" tab-target="#title_6" aria-selected="false">消費</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_4" role="tabpanel" aria-labelledby="title_4-tab">

                            <div class="row no-gutters">
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                            <div class="row no-gutters">
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">

                            <div class="row no-gutters">
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo3.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo3.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo3.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                           
                          </div>
                      
                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
                     <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->
                    
                    <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap blue_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2" id="title_7-tab" href="second.php" tab-target="#title_7" aria-selected="true">休閒</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_8-tab" href="second.php" tab-target="#title_8" aria-selected="false">萬象</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">

                            <div class="row no-gutters">
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="title_8" role="tabpanel" aria-labelledby="title_8-tab">

                            <div class="row no-gutters">
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo2.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                           
                          </div>
                   
                       
                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
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

                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one blue_tab">
                           <div class="title_tab hole">
                               <h4>熱門情報</h4>
                               <span>謹慎理財 信用至上</span>
                           </div>
                           <div class="content_tab">
                               <!-- 熱門情報輪播 -->
                            <div class="swiper-container HotNews_slide">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                
                            </div>
                            <!-- 熱門情報輪播 END -->

                           </div>
                       </div>
                    </div>

                    <div class="col-md-12 col">
                       
                       <div class="cardshap blue_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active pl-30" id="card-tab" tab-target="#card" href="javascript:;"  aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/news/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-30" id="right-tab" tab-target="#right" href="javascript:;"  aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/news/icon2.png); background-size: 80%;"></i>權益快搜
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content ccard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">--選擇銀行--</option>
                                      <option value="第一銀行">第一銀行</option>
                                      <option value="台新銀行">台新銀行</option>
                                      <option value="渣打銀行">渣打銀行</option>
                                  </select>

                                  <select>
                                      <option value="">--選擇信用卡--</option>
                                      <option value="JBC白金卡">JBC白金卡</option>
                                      <option value="富邦世界卡">富邦世界卡</option>
                                      <option value="SOGO聯名卡">SOGO聯名卡</option>
                                  </select>  
                                </div>

                                <div class="col-3">
                                  <div class="hv-center w-h-100">
                                      <button type="button">GO</button>
                                  </div>
                                </div>
                               
                            </form>
                          </div>
                          <div class="tab-pane fade" id="right" role="tabpanel" aria-labelledby="right-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">選擇比較的權益項目</option>
                                      <option value="年費">年費</option>
                                      <option value="循環利息">循環利息</option>
                                      <option value="逾期違約金">逾期違約金</option>
                                  </select>

                                  <select>
                                      <option value="">選擇比較的權益項目</option>
                                      <option value="年費">年費</option>
                                      <option value="循環利息">循環利息</option>
                                      <option value="逾期違約金">逾期違約金</option>
                                  </select> 
                                </div>

                                <div class="col-3">
                                 <div class="hv-center w-h-100">
                                   <button type="button">GO</button>
                                 </div>
                                </div>
                               
                            </form>
                          </div>
                        </div>
                      </div>
                    
                    </div>

                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one blue_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                 </div>
                               </div>

                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                 </div>
                               </div>

                           </div>
                       </div>
                    </div>

                    <div class="col-md-12 col">
                       <div class="cardshap tab_one blue_tab">
                           <div class="title_tab hole">
                               <h4>熱門新聞</h4>
                           </div>
                           <div class="content_tab">
                               <ul class="tab_list cardu_li">
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                            </ul>
                           </div>
                       </div>
                    </div>
                    
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>

                    
                    <?php 
                     //-- 共用Footer --
                     require '../share_area/footer.php';
                    ?>
                    

                </div>
            </div>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


   <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>
    <script type="text/javascript">


    </script>

  </body>
</html>