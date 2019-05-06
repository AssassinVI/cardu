<?php 
 require '../../share_area/conn.php';
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

    <link rel="shortcut icon" href="../../images/favicon.ico"/>

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
     require '../../share_area/share_css.php';
    ?>



  </head>
  <body class="travel_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../../share_area/phone/header.php';
         }
         else{
          require '../../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="travel.php">優旅行</a> / <a href="javascript:;">日本嬉遊去</a></p>
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
                                    <div class="swiper-slide img_div" pagination-index="1" style="background-image: url(../../img/component/slide_photo1.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >新光三越週慶強強滾　首日6店業績逾14.9億</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="2" style="background-image: url(../../img/component/slide_photo2.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >ATM「靠臉」就能領錢　台新內湖分行首上線</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="3" style="background-image: url(../../img/component/slide_photo3.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >跨年4天連假玩翻台北　#Party101之夜看煙火</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="4" style="background-image: url(../../img/component/U20181204080844.jpg);"> 
                                      <a href="#" title="新聞">
                                          <div  class="word shadow_text" >跨年4天連假玩翻台北　#Party101之夜看煙火</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide img_div" pagination-index="5" style="background-image: url(../../img/component/U20181212084227.jpg);"> 
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
                                        <a href="#" index_img="1" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div active" style="background-image: url(../../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線" class="img_div" style="background-image: url(../../img/component/photo2.jpg);"></a>
                                        <a href="#" index_img="3" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div" style="background-image: url(../../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火" class="img_div" style="background-image: url(../../img/component/photo3.jpg);"></a>
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
                                        <a href="#" index_img="1" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div active" style="background-image: url(../../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線" class="img_div" style="background-image: url(../../img/component/photo2.jpg);"></a>
                                        <a href="#" index_img="3" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div" style="background-image: url(../../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火" class="img_div" style="background-image: url(../../img/component/photo3.jpg);"></a>
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
                                        <a href="#" index_img="1" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div active" style="background-image: url(../../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="2" title="ATM「靠臉」就能領錢　台新內湖分行首上線" class="img_div" style="background-image: url(../../img/component/photo2.jpg);"></a>
                                        <a href="#" index_img="3" title="新光三越週慶強強滾　首日6店業績逾14.9億" class="img_div" style="background-image: url(../../img/component/photo1.jpg);"></a>
                                        <a href="#" index_img="4" title="跨年4天連假玩翻台北　#Party101之夜看煙火" class="img_div" style="background-image: url(../../img/component/photo3.jpg);"></a>
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
                  <!--電腦版廣告-->
                  <div class="col-md-12 row phone_hidden">
                      <div class="col-md-6 col ad_news">
                        <div class="row no-gutters">
                          <div class="col-md-6 h-center">
                           <img src="../../img/component/ad_sm.png"> 
                          </div>
                         <div class="col-md-6">
                          <div class="best">
                           <img src="../../img/component/best.png">
                          </div>
                          <h6>匯豐現金回饋卡</h6>
                          <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                         </div>
                       </div>
                      </div>
                      <div class="col-md-6 col ad_news">
                        <div class="row no-gutters">
                          <div class="col-md-6 h-center">
                           <img src="../../img/component/ad_sm.png"> 
                          </div>
                         <div class="col-md-6">
                          <div class="best">
                           <img src="../../img/component/best.png">
                          </div>
                          <h6>匯豐現金回饋卡</h6>
                          <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                         </div>
                       </div>
                      </div>
                  </div>  

                  <!--手機板廣告-->
                  <div class="col-md-12 row">
                      <div class="col-md-6 col banner d-md-none d-sm-block ">
                          <img src="http://placehold.it/365x100" alt="">
                      </div>
                  </div>
                  <!--廣告end-->


                 
                    <!--特別議題-->
                    <div class="col-md-12 col">



                        <div class="cardshap green_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" href="javascript:;" tab-target="#special_1" aria-selected="true">九州資訊</a>
                          </li>
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">九州景點</a>
                          </li>
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_3-tab" href="javascript:;" tab-target="#special_3" aria-selected="false">飛往九州</a>
                          </li>
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_4-tab" href="javascript:;" tab-target="#special_4" aria-selected="false">九州交通</a>
                          </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters hv-center">
                                <img class="wx-100-ph" src="../../img/component/travel/kyushu/recomm_02_content_01_15.jpg" title="新聞">
                            </div>
                            <div class="travel_about pl-md-5 ml-md-1">
                              <a><h6>九州，截然不同的旅遊風情！</h6></a>
                              <p>在九州可感受截然不同的旅遊風情，無論是熊本城下尋訪前人足跡、欣賞阿蘇火山壯闊絕景、在天然溫泉中放鬆身心或是品嚐九州7縣道地美食，在這集美景、溫泉、美食三大特色的九州，都可以感受到無窮魅力與驚喜。<span>
                              <a href="http://cardu.srl.tw/travel/jp/info_detail.php?type=58&pk=15">more</a></span></p>
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">
                              <div class="map">
                                <div class="row no-gutters hv-center">
                                    <img class="photo" src="../../img/component/travel/kyushu/map-bg.jpg" title="新聞">

                                    <div class="MOJIKO phone_hidden"><!--門司港-->
                                    <a data-fancybox data-src="#MOJIKO_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/01.png" width="75" height="30" ></a>
                                    <div class="MOJIKO-01"><a data-fancybox data-src="#MOJIKO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/01-1.png" width="180" height="120"></a></div>

                                    </div><!--門司港結束-->


                                    <div class="DAZAIFU phone_hidden"><!--太宰府天滿宮-->
                                    <a data-fancybox data-src="#DAZAIFU_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/02.png" width="109" height="32"></a>
                                    <div class="DAZAIFU-01"><a data-fancybox data-src="#DAZAIFU_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/02-1.png" width="180" height="120"></a></div>
                                    </div><!--太宰府天滿宮結束-->


                                    <div class="YUFUIN phone_hidden"><!--由布院-->
                                    <a data-fancybox data-src="#YUFUIN_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/04.png" width="77" height="32"></a>
                                    <div class="YUFUIN-01"><a data-fancybox data-src="#YUFUIN_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/04-1.png" width="180" height="120"></a></div>
                                    </div><!--由布院結束-->


                                    <div class="BAPPU phone_hidden"><!--別府地獄溫泉-->
                                    <a data-fancybox data-src="#BAPPU_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/03.png" width="109" height="32"></a>
                                    <div class="BAPPU-01"><a data-fancybox data-src="#BAPPU_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/03-1.png" width="180" height="120"></a></div>
                                    </div><!--別府地獄溫泉結束-->

                                    <div class="FA phone_hidden"><!--福岡機場-->
                                    <img src="../../img/component/travel/kyushu/16.png" width="69" height="25">
                                    </div><!--福岡機場結束-->

                                    <div class="GINZA phone_hidden"><!--草千里-->
                                    <a data-fancybox data-src="#GINZA_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/05.png" width="77" height="32"></a>
                                    <div class="GINZA-01"><a data-fancybox data-src="#GINZA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/05-1.png" width="180" height="120"></a></div>
                                    </div><!--草千里結束-->

                                    <div class="ASO phone_hidden"><!--阿蘇山-->
                                    <a data-fancybox data-src="#ASO_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/06.png" width="72" height="30"></a>
                                    <div class="ASO-01"><a data-fancybox data-src="#ASO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/06-1.png" width="180" height="120"></a></div>
                                    </div><!--阿蘇山結束-->

                                    <div class="KUMAMOTO phone_hidden"><!--熊本城-->
                                    <a data-fancybox data-src="#KUMAMOTO_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/07.png" width="66" height="41"></a>
                                    <div class="KUMAMOTO-01"><a data-fancybox data-src="#KUMAMOTO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/07-1.png" width="180" height="120"></a></div>
                                    </div><!--熊本城結束-->


                                    <div class="KUMAMOTOOFFICE phone_hidden"><!--熊本熊辦公室-->
                                    <a data-fancybox data-src="#KUMAMOTOOFFICE_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/08.png" width="103" height="31"></a>
                                    <div class="KUMAMOTOOFFICE-01"><a data-fancybox data-src="#KUMAMOTOOFFICE_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src='../../img/component/travel/kyushu/08-1.png' width="180" height="120"></a></div>
                                    </div><!--熊本熊辦公室結束-->

                                    <div class="SAKURAJIMA phone_hidden"><!--櫻島-->
                                    <a data-fancybox data-src="#SAKURAJIMA_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/10.png" width="61" height="33"></a>
                                    <div class="SAKURAJIMA-01"><a data-fancybox data-src="#SAKURAJIMA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/10-1.png" width="180" height="120"></a></div>
                                    </div><!--櫻島結束-->

                                    <div class="MANAGAHA phone_hidden"><!--軍艦島-->
                                    <a data-fancybox data-src="#MANAGAHA_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/11.png" width="71" height="33"></a>
                                    <div class="MANAGAHA-01"><a data-fancybox data-src="#MANAGAHA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/11-1.png" width="180" height="120"></a></div>
                                    </div><!--軍艦島結束-->

                                    <div class="KIRISHIMA phone_hidden"><!--霧島神社-->
                                    <a data-fancybox data-src="#KIRISHIMA_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/09.png" width="68" height="41"></a>
                                    <div class="KIRISHIMA-01"><a data-fancybox data-src="#KIRISHIMA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/09-1.png" width="180" height="120"></a></div>
                                    </div><!--霧島神社結束-->

                                    <div class="RICESAYAMA phone_hidden"><!--稻佐山-->
                                    <a data-fancybox data-src="#RICESAYAMA_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/12.png" width="71" height="33"></a>
                                    <div class="RICESAYAMA-01"><a data-fancybox data-src="#RICESAYAMA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/12-1.png" width="180" height="120"></a></div>
                                    </div><!--稻佐山結束-->

                                    <div class="ATOMICBOMB phone_hidden"><!--原爆資料館-->
                                    <a data-fancybox data-src="#ATOMICBOMB_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/13.png" width="89" height="33"></a>
                                    <div class="ATOMICBOMB-01"><a data-fancybox data-src="#ATOMICBOMB_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/13-1.png" width="180" height="120"></a></div>
                                    </div><!--原爆資料館結束-->

                                    <div class="HUIS phone_hidden"><!--豪斯登堡-->
                                    <a data-fancybox data-src="#HUIS_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/14.png" width="80" height="33"></a>
                                    <div class="HUIS-01"><a data-fancybox data-src="#HUIS_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/14-1.png" width="180" height="120"></a></div>
                                    </div><!--豪斯登堡結束-->

                                    <div class="HAKATA phone_hidden"><!--博多運河城-->
                                    <a data-fancybox data-src="#HAKATA_detail" href="javascript:;"><img src="../../img/component/travel/kyushu/15.png" width="95" height="33"></a>
                                    <div class="HAKATA-01"><a data-fancybox data-src="#HAKATA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kyushu/15-1.png" width="180" height="120"></a></div>
                                    </div><!--博多運河城結束-->

                                    
                                </div>
                              </div>
                              
                              

                            </div>
                             <div class="row no-gutters travel_list">
                                 <div class="col-md-6 col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=1">
                                    <h6><img src="../../img/component/icon/map-icon.png">壯闊絕景！熊本火之國自然巡禮</h6>
                                  </a>
                                 </div>
                                  <div class="col-md-6 col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=2">
                                    <h6><img src="../../img/component/icon/map-icon.png">盡情享受！漫遊福岡好吃又好玩</h6>
                                  </a>
                                 </div>
                              </div>
                              <div class="row no-gutters travel_list">
                                 <div class="col-md-6 col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=3">
                                    <h6><img src="../../img/component/icon/map-icon.png">溫泉大不同！由布院別府泡湯旅</h6>
                                  </a>
                                 </div>
                                  <div class="col-md-6 col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=4">
                                    <h6><img src="../../img/component/icon/map-icon.png">異國風情！長崎白天夜晚超迷人</h6>
                                  </a>
                                 </div>
                              </div>
                           
                          </div>
                          <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

                           <div class="row no-gutters hv-center">
                                <img class="wx-100-ph" src="../../img/component/travel/kyushu/recomm_02_content_03_15.jpg" title="新聞">
                            </div>
                             <div class="travel_about pl-md-5 ml-md-1">
                              <a><h6>搞定飛往九州機票</h6></a>
                              <p>不論您想要前往九州那個景點，搭乘前往九州各機場的飛機就對了！想要感受九州壯闊絕景及品嚐道地美食，就從搞定你的飛機票著手吧！<span>
                                <a href="http://cardu.srl.tw/travel/jp/sky_detail.php?type=58&pk=15">more</a></span></p>
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

                           <div class="row no-gutters hv-center">
                                <img class="wx-100-ph" src="../../img/component/travel/kyushu/recomm_02_content_04_15.jpg" title="新聞">
                            </div>
                             <div class="travel_about pl-md-5 ml-md-1">
                              <a><h6>根據旅行目的地，選擇交通工具！</h6></a>
                              <p>抵達機場後，根據你的旅行目的地，選擇想要搭乘的交通工具，不論您想要前往九州任何一個景點，都可輕鬆到達！
                              <span><a href="http://cardu.srl.tw/travel/jp/traffic_detail.php?type=58&pk=15">more</a></span>
                              </p>
                            </div>
                           
                          </div>
                        </div>
                      </div>




                     <!-- 旅遊景點說明 -->
                     <div class="fancybox-div">
                       
                       <!--門司港-->
                       <div id="MOJIKO_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/01_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">門司港</h3>
                           <p>
                             關門海峽為日本本島與九州之間的海峽，海峽北岸為山口縣下關市，南岸為福岡縣北九州市門司區，連接兩地的跨海大橋即為「關門大橋」，也是高速國道公路，橋上僅為車輛通過，若行人要通行則可利用海底隧道通行，1948年完工的關門海峽行人隧道為日本最早的海底隧道，全長約780公尺，約15分鐘可走完。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--門司港 END-->


                       <!--太宰府天滿宮-->
                       <div id="DAZAIFU_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/03_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">太宰府天滿宮</h3>
                           <p>
                             太宰府天滿宮的地位相當於孔廟，是福岡著名的觀光勝地，也是重要的文化遺產。不只有許多人來此祈禱學業順利、金榜題名，這裡也是日本傳統節慶時香客絡繹不決，相當有人氣的神社。太宰府天滿宮也非常適合賞梅，甚至以傳說中的飛梅為其象徵物。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--太宰府天滿宮 END-->


                       <!--由布院-->
                       <div id="YUFUIN_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/06_Big.jpg"><br>
                           <span>圖/由布院溫泉協會</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">由布院</h3>
                           <p>
                             由布院稱為由布院溫泉，又因為在湯布院町，故又稱為湯布院溫泉，是九州有名的溫泉渡假勝地。由布院坐落在優美的由布嶽山腳下，起初這裡只是金鱗湖周邊幾處小溫泉療養所，在1970年後，各式活動在此舉辦，這裡的溫泉也聞名全日本，在《最想去的溫泉》排行榜裡名列前茅。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--由布院 END-->


                       <!--別府地獄溫泉-->
                       <div id="BAPPU_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/04_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">別府地獄溫泉</h3>
                           <p>
                             別府的地獄八湯分別為海地獄、鬼石坊主地獄、山地獄、灶地獄、鬼山地獄、白池地獄、血之池地獄和龍卷地獄，因為各個溫泉的泉質成分不同，分別呈現出藍、紅、白色等各種顏色，造就出恐怖卻又不可思議的景致，所以取名為地獄八湯。每種溫泉都各有特色，非常值得花時間慢慢參觀欣賞。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--別府地獄溫泉 END-->
                       
                       <!--草千里-->
                       <div id="GINZA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/09_Big.jpg"><br>
                           <span>圖/熊本觀光網站</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">草千里</h3>
                           <p>
                             草千里位於烏帽子嶽北麓，是一片夾在火山群間的富饒草原，晨間時分常常瀰漫輕霧，再加上四週終年飄煙的山頭，並有放牧的成群牛馬，不時可以見到放牧的牛馬在悠閒吃草的情景，景緻非常特別。天氣晴朗的白日則又是另一番景象，尤其是夏天，茂密的青草，佈滿天地之間，還有遼闊的藍天白雲，是阿蘇最具代表性的景致之一，也是遊客必到之處。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--草千里 END-->
                      
                       <!--阿蘇山-->
                       <div id="ASO_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/12_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">阿蘇山</h3>
                           <p>
                             阿蘇山是位於日本九州中央，熊本縣東北部的一個活火山，為阿蘇地區的火山群和週邊外輪山之總稱。火山群中有五嶽，其中「中嶽」仍是座持續噴發的活火山。阿蘇山也是熊本縣別稱「火之國」的由來。現在整個區域被列入阿蘇九重國立公園的範圍。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--阿蘇山 END-->

                       <!--熊本城-->
                       <div id="KUMAMOTO_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/08_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">熊本城</h3>
                           <p>
                            熊本城位於熊本市中央區，是豐臣秀吉旗下大將加藤清正受封為熊本城主後於西元1607年完工的城堡，由於城內種有許多銀杏樹，故又稱為「銀杏城」。熊本城也是牢不可破的名城，其中以稱為「倒武者」石牆最為出名，又斜又抖的石牆讓敵人不易爬上，是日本三大名城之一。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--熊本城 END-->
                       

                       <!--熊本熊辦公室-->
                       <div id="KUMAMOTOOFFICE_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/11_Big.jpg"><br>
                           <span>圖/熊本熊FB</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">熊本熊辦公室</h3>
                           <p>
                             熊本熊是2011年為慶祝九州新幹線開業，熊本縣為宣導當地觀光所創造的吉祥物，為熊本的營業部長，因宣傳手法加上獨樹一格的個性，使熊本熊一夕爆紅，粉絲遍及海內外，熊本熊的的辦公室也成為來熊本必朝聖的熱門景點！
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--熊本熊辦公室 END-->

                       <!--櫻島-->
                       <div id="SAKURAJIMA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/15_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">櫻島</h3>
                           <p>
                             櫻島位在日本九州鹿兒島縣，是鹿兒島的象徵代表，目前還是一座活火山，至今火山活動仍十分活躍。為國際火山學與地球內部化學協會，選出16座「十年火山」之一。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--櫻島 END-->

                         
                       <!--軍艦島-->
                       <div id="MANAGAHA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/13_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">軍艦島</h3>
                           <p>
                             軍艦島正式名稱為端島，日本第一座鋼筋混泥土大廈即建於島上，過去曾因開採煤礦而繁榮，但現已無人居住。由於島上風景氛圍詭譎，007系列電影《Skyfalll》及日本大逃殺電影都曾在此處取景拍攝，所以島上除可看到日本產業革命的遺跡外，也可以看到這些電影的拍攝地點，是非常特別的經驗喔！軍艦島已於2015年被列為世界遺產之一。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--軍艦島 END-->
                       
                       <!--霧島神社-->
                       <div id="KIRISHIMA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/14_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">霧島神社</h3>
                           <p>
                             霧島神宮為南九州最大的神宮，也是霧島的地標，祭祀著日本傳說中的日本開國之神「瓊瓊杵尊」。神社內有紅色迴廊的社殿和曲線優美的唐式山形牆，朱紅社殿被指定重要文物。神宮的外參道大鳥居，高22.4公尺，兩柱間隔16公尺為西日本最壯大。坂本龍馬在遭遇暗殺後，曾與妻子到霧島深山的溫泉療傷，並在霧島神社住過一宿，對於寺院裡的大杉樹及殿宇等建築表示贊嘆。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--霧島神社 END-->
                       
                       <!--稻佐山-->
                       <div id="RICESAYAMA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/10_Big.jpg"><br>
                           <span>圖/長崎觀光纜車網站</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">稻佐山</h3>
                           <p>
                             是日本長崎縣長崎市的一座標高333米的山峰，位於長崎市市區西部，山腰處有不少建築，山頂則是著名的觀光景點。在山頂處可以眺望長崎全市的景色，也是著名的觀賞夜景的聖地。2012年10月5日，在稻佐山看到的夜景和摩納哥、香港被共同選為世界新三大夜景，可搭乘長崎纜車從稻佐山腳直通山頂。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--稻佐山 END-->

                       <!--原爆資料館-->
                       <div id="ATOMICBOMB_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/07_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">原爆資料館</h3>
                           <p>
                             第二次世界大戰時，美軍在長崎投下第二顆原子彈，造成長崎市死傷十幾萬人，市街大部分燒毀，戰後重新整建。原爆資料館內收藏了這場核爆的詳盡資料與遺物，其中包括了15萬名罹難者的相片、簡單的物品如瓶子及燒焦了的和服等，見證了當時的原爆是多麼的厲害。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--原爆資料館 END-->
                        

                       <!--豪斯登堡-->
                       <div id="HUIS_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/05_Big.jpg"><br>
                           <span>圖/豪斯登堡FB</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">豪斯登堡</h3>
                           <p>
                             豪斯登堡位於九州長崎縣，模仿荷蘭街道所設立的一個主題公園。面積152公頃，除了荷蘭風格的主題外，目前園區內也包括一些歐洲其他地區風格的造景，屢次作為電視劇、電影、廣告的外景拍攝地。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--豪斯登堡 END-->

                       <!--博多運河城-->
                       <div id="HAKATA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100"src="../../img/component/travel/kyushu/detail/02_Big.jpg"><br>
                           <span>圖/博多運河城官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">博多運河城</h3>
                           <p>
                             與天神商店街和中洲組成福岡縣內最為熱鬧的區域，而博多運河城是由酒店、劇場、電影院和餐廳等組合成的綜合性商業中心。運河城內也有聚集全日本著名拉麵店的拉麵競技場，是拉麵愛好者的最佳去處。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--博多運河城 END-->  
                        



                     </div>
                     <!-- 旅遊景點說明 END -->





                    </div>
                    <!--特別議題end -->

                    <!--東京精選-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab" data-toggle="tab" href="#title_1" role="tab" aria-controls="title_1" aria-selected="true">九州精選</a>
                             <a class="top_link" href="share_second.php"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <div class="row no-gutters travel_about">
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                                        <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                                   </a>
                                   
                                </div>
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                                        <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                                   </a>
                                    
                                </div>
                                
                            </div>
                           
                          </div>

                         
                          
                        </div>
                      </div>
                    </div>
                    <!--東京精選end -->
                     
                      <!--東京旅行分享-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab" data-toggle="tab" href="#title_1" role="tab" aria-controls="title_1" aria-selected="true">九州旅行分享</a>
                             <a class="top_link" href="share_second.php"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <div class="row no-gutters travel_about">
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                                        <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                                   </a>
                                   
                                </div>
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                                        <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                                   </a>
                                    
                                </div>
                                
                            </div>
                           
                          </div>
                         
                         
                          
                        </div>
                      </div>
                    </div>
                    <!--東京旅行分享end -->
                     <!--優惠情報-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab" data-toggle="tab" href="#title_1" role="tab" aria-controls="title_1" aria-selected="true">優惠情報</a>
                             <a class="top_link" href="banefit.php"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <div class="row no-gutters travel_about">
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                                        <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                                   </a>
                                   
                                </div>
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6>旅行社代退訂爭議多　消保處提醒4點要123</h6>
                                        <p>進入年底時刻，不少民眾向旅行業者購買行程,<br>安排出國跨年活動。行政院消保...</p>
                                   </a>
                                    
                                </div>
                                
                            </div>
                           
                          </div>
                         
                         
                          
                        </div>
                      </div>
                    </div>
                    <!--優惠情報end -->






                   
                    
                    
                   
                    
                   
                

                   
                  



                   

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
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
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
                               <h4>區域分類</h4>
                              
                           </div>
                           <div class="content_tab">
                             <div class="journey_icon">
                               <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about.php"> <i class="fa fa-arrow-circle-right mr-2"></i>東京篇</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_4.php"><i class="fa fa-arrow-circle-right mr-2"></i>東北篇</a>
                                 </div>
                               </div>
                               <hr>
                                <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_2.php"><i class="fa fa-arrow-circle-right mr-2"></i>關西篇</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_5.php"><i class="fa fa-arrow-circle-right mr-2"></i>九州篇</a>
                                 </div>
                               </div>
                               <hr>
                                <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_3.php"><i class="fa fa-arrow-circle-right mr-2"></i>北海道篇</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_6.php"><i class="fa fa-arrow-circle-right mr-2"></i>沖繩篇</a>
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
                                   <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                   
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
                                   <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>

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
                        require '../../share_area/phone/footer.php';
                     }
                     else{
                       require '../../share_area/footer.php';
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
     require '../../share_area/share_js.php';
    ?>

  </body>
</html>