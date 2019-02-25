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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">優票證</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

              


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                      <div class="myCarousel">

                          <div class="news_live cardshap">
                            <div class="swiper-container">
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
                            </div>
                          </div>

                          <div class="slide_pagination">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                   <div class="swiper-slide" pagination-index="1"> 
                                      <a href="javascript:;"  class="cardshap" title="新聞">
                                          <img src="../img/component/slide_photo1.jpg" alt="">
                                          <div  class="word" >新光三越週慶強強滾...</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide" pagination-index="2"> 
                                      <a href="javascript:;"  class="cardshap" title="新聞">
                                          <img src="../img/component/slide_photo2.jpg" alt="">
                                          <div  class="word" >ATM「靠臉」就能...</div>
                                      </a>
                                    </div>
                                   <div class="swiper-slide" pagination-index="3"> 
                                      <a href="javascript:;" class="cardshap" title="新聞">
                                          <img src="../img/component/slide_photo3.jpg" alt="">
                                          <div  class="word" >跨年4天連假...</div>
                                      </a>
                                    </div>  
                                    <div class="swiper-slide" pagination-index="4"> 
                                      <a href="javascript:;"  class="cardshap" title="新聞">
                                          <img src="../img/component/U20181204080844.jpg" alt="">
                                          <div  class="word" >ATM「靠臉」就能...</div>
                                      </a>
                                    </div>
                                    <div class="swiper-slide" pagination-index="5"> 
                                      <a href="javascript:;"  class="cardshap" title="新聞">
                                          <img src="../img/component/U20181212084227.jpg" alt="">
                                          <div  class="word" >ATM「靠臉」就能...</div>
                                      </a>
                                    </div>
                                </div>
                            </div>
                            <!-- 如果需要导航按钮 -->
                            <div class="pink_tab">
                              <div class="swiper-button-prev  title_tab"><i class=" fa fa-angle-down"></i></div>
                              <div class="swiper-button-next  title_tab"><i class=" fa fa-angle-up"></i></div>
                            </div>
                         </div>
                      </div>
                  
                  </div>

                    <!--廣告-->
                    <div class="col-md-12 col banner"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    
                   <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="all-tab" href="all.php" aria-controls="all" aria-selected="true">票證總覽</a>
                            <a class="top_link" href="all.php"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                            <div class="row no-gutters ticket_card">
                                <div class="col-md-3 cards-4 col-6 py-2">
                                  <div class="cardshap ticket_img hv-center">
                                  <a href="#" title="悠遊卡">
                                    <img src="../img/component/ticket/easycard.png">
                                    <h4>悠遊卡</h4>
                                  </a>
                                </div>
                                </div>
                                <div class="col-md-3 cards-4 col-6 py-2">
                                  <div class="cardshap ticket_img hv-center">
                                  <a href="#" title="一卡通">
                                    <img src="../img/component/ticket/IPass.png">
                                    <h4>一卡通</h4>
                                  </a>
                                </div>
                                </div>
                                <div class="col-md-3 cards-4 col-6 py-2">
                                  <div class="cardshap ticket_img hv-center">
                                  <a href="#" title="iCash">
                                    <img src="../img/component/ticket/icash.png">
                                    <h4>iCash</h4>
                                  </a>
                                </div>
                                </div>
                                <div class="col-md-3 cards-4 col-6 py-2">
                                   <div class="cardshap ticket_img hv-center">
                                  <a href="#" title="Happy Cash">
                                    <img src="../img/component/ticket/happycash.png">
                                    <h4>Happy Cash</h4>
                                  </a>
                                </div>
                                </div>
                            </div>
                           
                          </div>
                          

                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
                     <!--廣告-->
                    <div class="col-md-12 col banner"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    <!--特別議題1-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" href="second.php" tab-target="#special_1" aria-selected="true">特別議題一</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters">
                                 <div class="col-12 bigcard py-md-2 mb-2">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                         <p>遊日血拚大回饋，信用卡大調查</p>
                                       </div>
                                      
                                   </a>
                                </div>
                                <div class="col-md-4 cards-3 col-6">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-md-4 cards-3 col-6">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                           
                          </div>
                          
                         
                         
                        </div>
                      </div>
                    </div>
                    <!--特別議題1end -->
                    <!--特別議題2-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">特別議題2</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          <div class="row no-gutters">
                                <div class="col-12 bigcard py-md-2">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                        <p>遊日血拚大回饋，信用卡大調查</p>
                                       </div>
                                       
                                   </a>
                                </div>
                            </div>
                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
   
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--特別議題2end -->
                    
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    <!--懶人包-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">懶人包</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters"> 
                               <div class="col-12 bigcard py-md-2 mb-2">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                         <p>遊日血拚大回饋，信用卡大調查</p>
                                       </div>
                                      
                                   </a>
                                </div>

                                <div class="col-md-4 cards-3 py-md-2 col-6">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-md-4 cards-3 py-md-2 col-6">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>

                            </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--懶人包end -->
                    <!--樂分享-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">樂分享</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters"> 
                               <div class="col-12 bigcard py-md-2 mb-2">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                         <p>遊日血拚大回饋，信用卡大調查</p>
                                       </div>
                                      
                                   </a>
                                </div>

                                <div class="col-md-4 cards-3 py-md-2 col-6">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-md-4 cards-3 py-md-2 col-6">
                                   <a href="#">
                                       <div class="img_div" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>

                            </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--樂分享end -->
                    
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                   <!--首刷禮-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">首刷禮</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
   
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--首刷禮end -->

                    <!--購物-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">購物</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
   
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--購物end -->
                   <!--美食-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">美食</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
   
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--美食end -->
                   <!--旅遊-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">旅遊</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
   
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--旅遊end -->
                   <!--電影-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">電影</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 py-2 news_list">
                          <div class="col-md-4 col-5">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
   
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--電影end -->
                   

                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one pink_tab">
                           <div class="title_tab hole">
                               <h4>熱門優惠 </h4>
                               <span>謹慎理財 信用至上</span>
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
                    </div>

                    <div class="col-md-12 col">
                       
                       <div class="cardshap tab_one pink_tab">
                           <div class="title_tab hole">
                               <h4>優票證</h4>
                           </div>
                        <div style="background-image: url(../img/component/t_card.png);" class="tab-content ccard_back" id="myTabContent">
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

                                  <div style="font-size: 15px;">
                                      <label>白金卡以上 <input type="checkbox" name=""></label>｜<label>白金卡 <input type="checkbox" name=""></label>｜<label>金卡/普卡 <input type="checkbox" name=""></label>
                                  </div>  
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