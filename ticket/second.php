<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優票證</title>

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
  <body class="ticket_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="ticket.php">優票證</a> / <a href="javascript:;">購物</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                       <!-- 四小三大輪播 -->
                      <div id="new_iNews" class="cardshap new_slide">
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
                                  <div class="swiper-slide" "> 
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
                                  <div class="swiper-slide" "> 
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
                  
                  </div>

                    <!--廣告-->
                    <div class="col-md-12 col"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    
                   


                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">

                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                            
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                           <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    
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


                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                           <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                           <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    
                    
                    <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                    
                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                           <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                           <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>


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


                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-3 mx-4 news_list">
                          <div class="col-md-4">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 pl-3 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(票證名稱)</a></small>
                            <a href="#" title="新聞"><span>活動日期:20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
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
                       <div class="cardshap hotCard tab_one pink_tab">
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
                       
                      <div class="cardshap tab_one pink_tab">
                           <div class="title_tab hole">
                               <h4>優票證</h4>
                           </div>
                        <div class="tab-content tcard_back" id="myTabContent">
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
                        
                        </div>
                      </div>
                    
                    </div>

                    
                    
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one pink_tab">
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