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
          <div class="col-md-12 col">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="travel.php">優旅行</a> / <a href="javascript:;">日本嬉遊趣
            </a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
         <!--版面中間--->
            <div class="col-md-12 col0">
                    <div class="">
                        <div class="row no-gutters">    
                        <div class="col-md-12 row">
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php" title="新聞">
                            <div class="img_div" style="background-image: url(../../img/component/travel/York.jpg);">
                             <big>東京</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=11&idx=1" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">淺草晴空塔趴趴GO</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=11&idx=2" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">築地台場親子玩透透</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=11&idx=3" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">原宿澀谷新宿好好逛</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=11&idx=4" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">走進宮崎駿奇幻世界</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about_2.php" title="新聞">
                            <div class="img_div" style="background-image: url(../../img/component/travel/kansai.jpg);">
                             <big>關西</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=12&idx=1" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">走訪清水寺祇園之行</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=12&idx=2" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">搭小火車京都嵐山行</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=12&idx=3" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">大阪購物美食好好買</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=12&idx=4" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">神戶異國美食趴趴走</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about_3.php" title="新聞">
                            <div class="img_div" style="background-image: url(../../img/component/travel/hokkaido.jpg);">
                             <big>北海道</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=13&idx=1" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">富良野美瑛慢活賞花</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=13&idx=2" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">漫步小樽北國風情趣</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=13&idx=3" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">搭火車走訪濕原秘境</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=13&idx=4" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">戰嚴冬搭車欣賞流冰</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        </div>
                        </div>
                         <div class="row no-gutters">    
                        <div class="col-md-12 row">
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about_4.php" title="新聞">
                            <div class="img_div" style="background-image: url(../../img/component/travel/tour.jpg);">
                             <big>東北</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=14&idx=1" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">十和田感受繽紛秋色</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=14&idx=2" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">拜訪古城泡湯又暖心</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=14&idx=3" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">品美食欣賞奧之細道</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=14&idx=4" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">陸奧小京都角館即行</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about_5.php" title="新聞">
                            <div class="img_div" style="background-image: url(../../img/component/travel/kyushu.jpg);">
                             <big>九州</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=1" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">熊本火之國自然巡禮</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=2" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">漫遊福岡好吃又好玩</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=3" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">由布院別府泡湯之旅</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=15&idx=4" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">長崎白天夜晚超迷人</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                       <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about_6.php" title="新聞">
                            <div class="img_div" style="background-image: url(../../img/component/travel/okinnawa.jpg);">
                             <big>冲繩</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=16&idx=1" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">沖繩親子就醬玩透透</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=16&idx=2" title="新聞">
                                    <span><img src="/img/component/icon/map-icon.png">沖繩放空浮潛賞夕照</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=16&idx=3" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">走訪沖繩世界遺產行</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?type=58&pk=16&idx=4" title="新聞">
                                   <span><img src="/img/component/icon/map-icon.png">美國村國際通趴趴走</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        </div>
                        </div>
                    </div>
                  </div>
             <!--版面中間end--->
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                

                 
                   
                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" title="新聞" href="#" style="background-image: url(/img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" title="新聞" href="#" style="background-image: url(/img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" title="新聞" href="#" style="background-image: url(/img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
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
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    


                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" title="新聞" href="#" style="background-image: url(/img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" title="新聞" href="#" style="background-image: url(/img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
                            <a href="#" title="新聞"><span>活動日期:</span><span>20XX/XX/XX~20XX/XX/XX</span></a>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a class="img_div news_list_img" title="新聞" href="#" style="background-image: url(/img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small><a href="#" title="新聞">(XXX)</a></small>
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
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
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
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                        <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                        <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                        <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
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
                                  <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
                                  
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
                                  <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>

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