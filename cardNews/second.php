<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-卡情報</title>

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="javascript:;">卡訊</a></p>
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

                     <!--電腦版廣告-->
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

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    
                   


                    <div class="col-md-12 col">

                      <div class="cardshap redius_bg">
                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!--電腦版廣告-->
                    <div class="col-md-12 col banner phone_hidden"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                    <!--banner end -->

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    
                    


                    <div class="col-md-12 col">

                      <div class="cardshap redius_bg">
                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    
                    <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col banner">
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

                    

                    
                    <div class="col-md-12 col">

                      <div class="cardshap redius_bg">
                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!--電腦版廣告-->
                    <div class="col-md-12 col phone_hidden"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                    <!--banner end -->

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                   


                    <div class="col-md-12 col">

                      <div class="cardshap redius_bg">
                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋 必備信用卡大公開</h3></a><small><a href="#" title="新聞">(xx銀行)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                     <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->
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
                       <div class="cardshap hotCard tab_one brown_tab">
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
                       
                       <div class="cardshap brown_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active pl-30" id="card-tab" tab-target="#card" href="javascript:;"  aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/cardNews/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-30" id="right-tab" tab-target="#right" href="javascript:;"  aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/cardNews/icon2.png); background-size: 80%;"></i>權益快搜
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
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>

                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one brown_tab">
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
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>
                    
                     <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>瀏覽過信用卡 </h4>
                                <a class="more_link" href="#"></a>
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
                                   <p><b>●</b>國內消費享1.22% <br> <b>●</b>國內消費享2.22%</p>
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
                                   <p><b>●</b>國內消費享1.22% <br> <b>●</b>國內消費享2.22%</p>
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
                                   <p><b>●</b>國內消費享1.22% <br> <b>●</b>國內消費享2.22%</p>
                                 </div>
                               </div>


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

                    
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>熱門辦卡</h4>
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