<?php 
require '../share_area/conn.php';
require '../share_area/get_news.php';
require 'config.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優行動Pay</title>

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
  <body class="pay_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="pay_second.php">優行動Pay</a> / <a href="javascript:;">Pay總覽</a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">
                

                
                <div class="row">

                  <div class="col-md-12 col">
                  
                    <?php 
                       //先取出優行動pay的分類，再從優行動pay的分類中，把appNews load出來，優行動pay版區id為at2019011117341414
                       $pdo=pdo_conn();
                       $sql_area=$pdo->prepare("SELECT Tb_index FROM `news_type` WHERE `area_id` LIKE '$area_id'");
                       $sql_area->execute();
                       $row_areas = $sql_area->fetchAll();

                       foreach ($row_areas as $row_area) {
                           $unit_all_id.="'".$row_area['Tb_index']."',";
                        }
                       $unit_all_id = substr($unit_all_id, 0, -1); //去掉最後一碼，


                      if (wp_is_mobile()) {

                         //============================================
                         //每頁的輪播
                         //設定好sql後，交由 page_carousel_mobile.php執行
                         //============================================
                         $sql_carousel="
                          SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
                          where mt_id = 'site2019011116095854'
                          and ns_verify=3 and OnLineOrNot=1 
                          and  StartDate<='$todayis' and EndDate>='$todayis'
                          order by ns_vfdate desc
                          LIMIT 0, 6
                          ";
                          require("../share_area/page_carousel_mobile.php"); //載入手機版刊頭輪播
                       }
                       else{
                         //============================================
                         //每頁的輪播
                         //設定好sql後，交由 page_carousel.php執行
                         //============================================
                         $sql_carousel="
                          SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
                          where ns_nt_pk in ($unit_all_id) 
                          and ns_verify=3 and OnLineOrNot=1 
                          and  StartDate<='$todayis' and EndDate>='$todayis'
                          order by ns_vfdate desc
                          LIMIT 0, 12
                          ";
                         require '../share_area/page_carousel.php';
                       }

                      ?>
                  
                  </div>
                 
                  

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

                          <?php 
                          $pdo=pdo_conn();
                          $sql_pay=$pdo->prepare("SELECT * FROM store where st_type='st2019013117011395' and OnLineOrNot=1 order by st_name ");
                          $sql_pay->execute();

                          $i=1; while ($row_pay=$sql_pay->fetch(PDO::FETCH_ASSOC)) {
                            $Tb_index=$row_pay['Tb_index'];
                            $st_name=$row_pay['st_name'];
                            $st_logo=$row_pay['st_logo'];
                            $st_url=$row_pay['st_url'];

                            $Date[$i]="<div class='col-md-4 col'>
                                          <div class='cardshap move_3'>
                                          <a class='all_form' href='about.php?$Tb_index' title='$st_name'>
                                          <img src='../sys/img/$st_logo'>
                                          <hr>
                                           <h4>$st_name</h4>
                                          </a>
                                            <div class='card_btn  hv-center'>

                                            <a class='all_form' href='about.php?$Tb_index' title='$st_name'>
                                              <button type='button' class='btn warning-layered btnOver'>詳細介紹</button>
                                            </a>

                                            <a class='all_form' href='$st_url' title='$st_name'>
                                              <button type='button' class='btn gray-layered btnOver'>前往官網</button>
                                            </a>
                                            </div>
                                          </div>
                                      </div>";
                          $i++; }

                          $Date['header']="<div class='col-md-12 row col0'><div class='row ticketbg'>";
                          $Date['fooder']="</div></div>";


                          echo $Date['header'];
                          echo $Date[1];
                          echo $Date[2];
                          echo $Date[3];
                          echo $Date[4];
                          echo $Date[5];
                          echo $Date[6];
                          echo $Date['fooder'];

                          ?>

                        
                     <!--廣告-->
                    <div class="col-md-12 col phone_hidden"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                          <?php
                          if($i>7){
                          echo $Date['header'];
                          echo $Date[7];
                          echo $Date[8];
                          echo $Date[9];
                          echo $Date[10];
                          echo $Date[11];
                          echo $Date[12];
                          echo $Date['fooder'];
                          }
                          ?>
                    
                     <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img class="w-100" src="http://placehold.it/360x100" alt="">
                        </div>
                        <div class="col-md-6 col banner">
                            <img class="w-100" src="http://placehold.it/360x100">
                        </div>
                    </div>
                    <!--廣告end-->
                    
                          <?php
                          if($i>13){
                          echo $Date['header'];
                          echo $Date[13];
                          echo $Date[14];
                          echo $Date[15];
                          echo $Date[16];
                          echo $Date[17];
                          echo $Date[18];
                          echo $Date['fooder'];
                          }
                          ?>

                     <!--廣告-->
                    <div class="col-md-12 col phone_hidden"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->
                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one blueGreen_tab">
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
                       
                       <div class="cardshap tab_one blueGreen_tab">
                           <div class="title_tab hole">
                               <h4>優行動pay</h4>
                           </div>
                        <div class="tab-content pcard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">--所有支付--</option>
                                      <option value="apple pay">apple pay</option>
                                      <option value="samsung pay">samsung pay</option>
                                      <option value="android pay">android pay</option>
                                  </select>

                                  <select>
                                      <option value="">--所有類別--</option>
                                      <option value="首刷禮">首刷禮</option>
                                      <option value="購物">購物</option>
                                      <option value="美食">美食</option>
                                      <option value="旅遊">旅遊</option>
                                      <option value="電影">電影</option>
                                      <option value="休閒">休閒</option>
                                      <option value="交通">交通</option>
                                      <option value="藝文">藝文</option>
                                  </select>  
                                  <input type="text" value="enter text...">
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
                                      <option value="">--所有支付--</option>
                                      <option value="apple pay">apple pay</option>
                                      <option value="samsung pay">samsung pay</option>
                                      <option value="android pay">android pay</option>
                                  </select>

                                  <select>
                                      <option value="">--所有類別--</option>
                                      <option value="首刷禮">首刷禮</option>
                                      <option value="購物">購物</option>
                                      <option value="美食">美食</option>
                                      <option value="旅遊">旅遊</option>
                                      <option value="電影">電影</option>
                                      <option value="休閒">休閒</option>
                                      <option value="交通">交通</option>
                                      <option value="藝文">藝文</option>
                                  </select>  
                                  <input type="text" value="enter text...">
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
                    
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>
                    
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one blueGreen_tab">
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
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>
                    

                    <div class="col-md-12 col">
                       <div class="cardshap tab_one blueGreen_tab">
                           <div class="title_tab hole">
                               <h4>熱門支付</h4>
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
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>


                    

                    

                   



                    
                     <?php 
                     //-- 共用Footer --
                     if (wp_is_mobile()) {
                        require '../share_area/phone/footer.php';
                     }
                     else{
                       require '../share_area/footer.php';
                      }
                    ?>
                    

                </div>
            </div>
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