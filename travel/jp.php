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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="travel.php">優旅行</a> / <a href="javascript:;">專題</a></p>
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
                      ?>
                      
                      <!-- 手機板輪播 -->
                      <div class="myCarousel d-md-none d-sm-block">
                          <div id="iNews" class="news_slide cardshap">
                            <div class=" swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../img/component/slide_photo1.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >新光三越週慶強強滾　首日6店業績逾14.9億</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="2" style="background-image: url(../img/component/slide_photo2.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >ATM「靠臉」就能領錢　台新內湖分行首上線</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="3" style="background-image: url(../img/component/slide_photo3.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >跨年4天連假玩翻台北　#Party101之夜看煙火</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="4" style="background-image: url(../img/component/U20181204080844.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >跨年4天連假玩翻台北　#Party101之夜看煙火</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="5" style="background-image: url(../img/component/U20181212084227.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >跨年4天連假玩翻台北　#Party101之夜看煙火</div>
                                      </a>
                                    </div>
                                </div>

                                <div class="swiper-pagination"></div>

                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                          </div>
                      </div>
                      <!-- 手機板輪播 END -->

                      <?php 
                       } 
                       else{
                      ?>

                       <!-- 四小三大輪播 -->
                      <div id="new_iNews" class="cardshap new_slide phone_hidden">
                          <div class="swiper-container">
                              <div class="swiper-wrapper">
                                  <div class="swiper-slide" > 

                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <a href="#" index_img="1" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div active" style="background-image: url(../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);"></a>
                                        <a href="#" index_img="3" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);"></a>
                                      </div>
                                      <div class="slide_list">
                                        <a class="active" href="#" index="1" title="新光三越週慶強強滾　首日6店業績逾14.9億">
                                          <h4>新光三越週慶強強滾　首日6店業</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線">
                                          <h4>ATM「靠臉」就能領錢　台新</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="3" title="新光三越週慶強強滾　首日6店業績逾14.9億">
                                          <h4>新光三越週慶強強滾　首日6店業</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火">
                                          <h4>跨年4天連假玩翻台北　#Party1</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="swiper-slide" > 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <a href="#" index_img="1" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div active" style="background-image: url(../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);"></a>
                                        <a href="#" index_img="3" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);"></a>
                                      </div>
                                      <div class="slide_list">
                                        <a href="#" index="1" title="新光三越週慶強強滾　首日6店業績逾14.9億">
                                          <h4>新光三越週慶強強滾　首日6店業</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線">
                                          <h4>ATM「靠臉」就能領錢　台新</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="3" title="新光三越週慶強強滾　首日6店業績逾14.9億">
                                          <h4>新光三越週慶強強滾　首日6店業</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火">
                                          <h4>跨年4天連假玩翻台北　#Party1</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="swiper-slide" > 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <a href="#" index_img="1" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div active" style="background-image: url(../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);"></a>
                                        <a href="#" index_img="3" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);"></a>
                                      </div>
                                      <div class="slide_list">
                                        <a href="#" index="1" title="新光三越週慶強強滾　首日6店業績逾14.9億">
                                          <h4>新光三越週慶強強滾　首日6店業</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線">
                                          <h4>ATM「靠臉」就能領錢　台新</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="3" title="新光三越週慶強強滾　首日6店業績逾14.9億">
                                          <h4>新光三越週慶強強滾　首日6店業</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                        <a href="#" index="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火">
                                          <h4>跨年4天連假玩翻台北　#Party1</h4>
                                          <p>卡優新聞網卡優新聞網卡優新聞網...</p>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <!-- 如果需要分页器 -->
                              <div class="swiper-pagination"></div>

                          </div>
                      </div>
                      <!-- 四小三大輪播 END -->
                      <?php
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

                  <!--手機板廣告-->
                  <div class="col-md-12 row">
                      <div class="col-md-6 col banner d-md-none d-sm-block ">
                          <img src="http://placehold.it/365x100" alt="">
                      </div>
                  </div>
                  <!--廣告end-->    

                 
                    <div class="col-md-12 col0">
                       <div class="row no-gutters">
                         <div class="col-md-6">
                          <div class="travel_main mb-3">

                           <a href="#">
                             <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                           </a>
                           </div>

                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                          <a href="#">
                            <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                          </a>
                           
                           </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                           <a href="#">
                             <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                           </a>
                            
                            </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                          <a href="#">
                            <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                            <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                          </a> 
                          
                           </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                           <a href="#">
                             <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                              <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                           </a>
                            
                            </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                          <a href="#">
                            <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                          </a>
                           
                            </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                           <a href="#">
                             <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                              <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                           </a> 
                            
                           </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                          <a href="#">
                            <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                          </a> 
                           
                            </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                           <a href="#">
                             <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                              <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                           </a> 
                            
                          </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                          <a href="#">
                            <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                          </a>   
                           
                          </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                           <a href="#">
                             <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                              <div>
                               <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                           </a> 
                            
                          </div>
                         </div>

                         <div class="col-md-6">
                          <div class="travel_main mb-3">
                          <a href="#">
                            <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                             <div>
                               <h6>旅行社代退訂爭議多  消保處提醒4點要123</h6>
                               <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                             </div>
                          </a>  
                           </div>

                         </div>

                       </div>
                    </div>

                    
                   
                    
                    
                   
                    
                   
                

                   
                  



                    <div class="col-12 page">
                      <span>第1頁( 共5頁 )</span>
                      <a href="#"><i class="fa fa-angle-left"></i>上一頁</a>
                      <select>
                        <option value="1">第1頁</option>
                        <option value="2">第2頁</option>
                        <option value="3">第3頁</option>
                        <option value="4">第4頁</option>
                        <option value="5">第5頁</option>
                      </select>

                      <a href="#">下一頁 <i class="fa fa-angle-right"></i></a>
                    </div>

                    <div class="col-12 py-5">
                      
                    </div>

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                            <div class="cardshap hotCard tab_one green_tab">
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
                      <div class="green_tab">
                       <form class="row search_from">
                        <input type="text" class="journey_search" value="請輸入優旅行要查詢的字串">  
                        <button>搜尋</button>
                       </form>
                      </div>  
                     </div>

                     <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one green_tab">
                           <div class="title_tab hole">
                               <h4>旅行地區 </h4>
                              
                           </div>
                           <div class="content_tab">
                             <div class="journey_icon">
                               <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="jp.php"> <i class="fa fa-arrow-circle-right mr-2"></i>日本</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="kr.php"><i class="fa fa-arrow-circle-right mr-2"></i>韓國</a>
                                 </div>
                               </div>
                               <hr>
                                <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="sa.php"><i class="fa fa-arrow-circle-right mr-2"></i>東南亞</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="cn.php"><i class="fa fa-arrow-circle-right mr-2"></i>中港澳</a>
                                 </div>
                               </div>
                               <hr>
                                <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="tw.php"><i class="fa fa-arrow-circle-right mr-2"></i>台灣</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="other.php"><i class="fa fa-arrow-circle-right mr-2"></i>其他地區</a>
                                 </div>
                               </div>
                             </div>

                           </div>
                       </div>
                    </div>
                     <!-- 廣告 -->
                        <div class="col-md-12 col">
                            <img src="http://placehold.it/300x250" alt="">
                        </div>
                     
                      <!-- 辦卡推薦 -->
                       <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one green_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                    
                                  </a>
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                 </div>
                               </div>

                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>

                                  </a> 
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                    <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                 </div>
                               </div>

                           </div>
                       </div>
                    </div>
                    <!--辦卡推薦end-->
                    <!-- 廣告 -->
                        <div class="col-md-12 col">
                            <img src="http://placehold.it/300x250" alt="">
                        </div>
                    <!-- 廣告end-->
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one green_tab">
                           <div class="title_tab hole">
                               <h4>熱門旅行</h4>
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
                    <!-- 廣告end-->
                    <!-- 廣告 -->
                        <div class="col-md-12 col">
                            <img src="http://placehold.it/300x250" alt="">
                        </div>
                    <!-- 廣告end-->
                    

                    
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