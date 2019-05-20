<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心</title>

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
  <body class="member_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="news.php">會員中心</a> / <a href="news_second.php">卡優活動</a></p>
          </div>
        </div>
        
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                <div class="row">

                 
                    <!--卡優活動-->
                    <div class="col-md-12 col">

                        <div class="cardshap primary_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" data-toggle="tab" href="#title_5" role="tab" aria-controls="title_5" aria-selected="true">卡優活動</a>
                          </li>
                         
                        </ul>
                        <div class="" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                           
                             <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                             <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(已結束)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                             <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 phone_hidden"><div class="test hv-center w-100"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                        <!--手機板廣告-->
                        <div class="col-md-12 row">
                          <div class="col-md-6 col banner d-md-none d-sm-block ">
                              <img src="http://placehold.it/365x100" alt="">
                          </div>                    
                        </div>
                        <!--手機板廣告end-->


                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                             <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                             <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                         <div class="col-md-12 row phone_hidden">
                           <div class="col-md-6 col">
                               <img class="w-100" src="http://placehold.it/365x100" alt="">
                           </div>
                           <div class="col-md-6 col">
                               <img class="w-100" src="http://placehold.it/365x100" alt="">
                           </div>                   
                         </div>
                         <!--手機板廣告-->
                         <div class="col-md-12 row">
                           <div class="col-md-6 col banner d-md-none d-sm-block ">
                               <img src="http://placehold.it/365x100" alt="">
                           </div>                    
                         </div>
                         <!--手機板廣告end-->


                          <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-2 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" href="#" style="background-image: url(../img/component/photo2.jpg);" title="新聞"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼賺回饋　必備信用卡大公開</h3></a><small><a href="#" title="新聞">(進行中)</a></small>
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
                    <!--最新文章end -->

                   
                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one primary_tab">
                           <div class="title_tab hole">
                               <h4>熱門優惠 </h4>
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
                       <div class="cardshap primary_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active  pl-30" id="hotNews-tab" data-toggle="tab" href="#hotNews" role="tab" aria-controls="hotNews" aria-selected="true">
                                <i class="icon" style="background-image: url(img/component/icon/index/icon3.png); background-size: 80%;"></i> 卡優公告
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="hotGift-tab" data-toggle="tab" href="#hotGift" role="tab" aria-controls="hotGift" aria-selected="false">
                                <i class="icon" style="background-image: url(img/component/icon_down/index/icon4.png); background-size: 76%;"></i> 卡優活動
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="hotNews" role="tabpanel" aria-labelledby="hotNews-tab">

                            <ul class="tab_list cardu_li">
                                <li><a href="">三張必備現金回饋卡! 國內國外高回饋</a></li>
                                <li><a href="">三張必備現金回饋卡! 國內國外高回饋</a></li>
                                <li><a href="">三張必備現金回饋卡! 國內國外高回饋</a></li>
                                <li><a href="">三張必備現金回饋卡! 國內國外高回饋</a></li>
                                <li><a href="">三張必備現金回饋卡! 國內國外高回饋</a></li>
                            </ul>
                           
                          </div>
                          <div class="tab-pane fade" id="hotGift" role="tabpanel" aria-labelledby="hotGift-tab">

                            <ul class="tab_list cardu_li">
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                            </ul>
                           
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
     //-- 共用jS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>