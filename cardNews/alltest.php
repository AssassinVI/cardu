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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="javascript:;">卡總覽</a>
            </p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                      <div id="iNews" class="cardshap news_slide">
                          <!-- <div class="title hole">新聞專題</div> -->
                          

                          <div class="swiper-container">
                              <div class="swiper-wrapper">
                                  <div class="swiper-slide" style="background-image: url(../img/component/photo1.jpg);"> 
                                    <a href="#" title="新聞">
                                        <div  class="ani word shadow_text" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s">新光三越週慶強強滾　首日6店業績逾14.9億</div>
                                    </a>
                                  </div>
                                  <div class="swiper-slide" style="background-image: url(../img/component/photo2.jpg);"> 
                                    <a href="#" title="新聞">
                                        <div  class="ani word shadow_text" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s">ATM「靠臉」就能領錢　台新內湖分行首上線</div>
                                    </a>
                                  </div>
                                  <div class="swiper-slide" style="background-image: url(../img/component/photo3.jpg);"> 
                                    <a href="#" title="新聞">
                                        <div  class="ani word shadow_text" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s">跨年4天連假玩翻台北　#Party101之夜看煙火</div>
                                    </a>
                                  </div>
                              </div>
                              <!-- 如果需要分页器 -->
                              <div class="swiper-pagination"></div>
                              
                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                              
                          </div>

                      </div>
                  
                  </div>

                    <!--廣告-->
                    <div class="col-md-12 col banner"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                    <!--banner end -->
                  

                     <!--功能卡-->
                   <div class="col-md-12 col">
                    <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link hole py-2 pl-0 flex-x-center active show" id="goodTicket-tab" data-toggle="tab" href="#goodTicket" role="tab" aria-controls="goodTicket" aria-selected="true">功能卡</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodSet-tab" data-toggle="tab" href="#goodSet" role="tab" aria-controls="goodSet" aria-selected="false">權益優惠</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodTicket" role="tabpanel" aria-labelledby="goodTicket-tab">

                          
                            <ul class="credit_icon">
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            <li><a href="#"><img src="../img/component/debitcard.png" title="新聞"></a></li>
                            </ul>
                            
                            <ul class="nav " id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active credit_card hv-center" id="CreditCard-tab" data-toggle="tab" href="#CreditCard" role="tab" aria-controls="CreditCard" aria-selected="true">信用卡<i class="fa fa-angle-down"></i></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link credit_card hv-center" id="DebitCard-tab" data-toggle="tab" href="#DebitCard" role="tab" aria-controls="DebitCard" aria-selected="false">金融卡<i class="fa fa-angle-down"></i></a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="CreditCard" role="tabpanel" aria-labelledby="CreditCard-tab">
                               <div class="credit_table">

                                 <div class="row">
                                   <div class="col-md-2 hv-center">
                                       <a class="card_name text-center" href="#"><img src="../img/component/cardNews/wild.png" alt="" title="新聞"><br>國泰世華</a>
                                   </div>
                                   <div class="col-md-10">
                                     <div class="row cards_div bankbg_list py-3">
                                       <div class="col-md-5 hv-center">
                                           <a class="bank_all_img card_name text-center" href="#">
                                            <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                           </a>
                                       </div>
                                       <div class="col-md-7 h-center col0 all_color">
                                           <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php">白金卡</a>
                                       </div> 
                                     </div>
                                   </div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-2 hv-center">
                                       <a class="card_name text-center" href="#"><img src="../img/component/cardNews/timthumb.png" alt="" title="新聞"><br>國泰世華</a>
                                   </div>
                                   <div class="col-md-10">
                                     <div class="row cards_div bankbg_list py-3">
                                       <div class="col-md-5 hv-center">
                                           <a class="bank_all_img card_name text-center" href="#">
                                            <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                           </a>
                                       </div>
                                       <div class="col-md-7 h-center col0 all_color">
                                           <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                       </div> 
                                     </div>
                                     <div class="row cards_div bankbg_list py-3">
                                       <div class="col-md-5 hv-center">
                                           <a class="bank_all_img card_name text-center" href="#">
                                            <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                           </a>
                                       </div>
                                       <div class="col-md-7 h-center col0 all_color">
                                           <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                       </div> 
                                     </div>
                                     <div class="row cards_div bankbg_list py-3">
                                       <div class="col-md-5 hv-center">
                                           <a class="bank_all_img card_name text-center" href="#">
                                            <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                           </a>
                                       </div>
                                       <div class="col-md-7 h-center col0 all_color">
                                           <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                       </div> 
                                     </div>
                                   </div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-2 hv-center">
                                       <a class="card_name text-center" href="#"><img src="../img/component/cardNews/flower.png" alt="" title="新聞"><br>國泰世華</a>
                                   </div>
                                   <div class="col-md-10">
                                     <div class="row cards_div bankbg_list py-3">
                                       <div class="col-md-5 hv-center">
                                           <a class="bank_all_img card_name text-center" href="#">
                                            <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                           </a>
                                       </div>
                                       <div class="col-md-7 h-center col0 all_color">
                                           <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                       </div> 
                                     </div>
                                     <div class="row cards_div bankbg_list py-3">
                                       <div class="col-md-5 hv-center">
                                           <a class="bank_all_img card_name text-center" href="#">
                                            <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                           </a>
                                       </div>
                                       <div class="col-md-7 h-center col0 all_color">
                                           <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                       </div> 
                                     </div>
                                   </div>
                                 </div>

                               </div>
                              </div>

                              <div class="tab-pane fade" id="DebitCard" role="tabpanel" aria-labelledby="DebitCard-tab">

                                <div class="credit_table">

                                  <div class="row">
                                    <div class="col-md-2 hv-center">
                                        <a class="card_name text-center" href="#"><img src="../img/component/cardNews/wild.png" alt="" title="新聞"><br>匯豐世華</a>
                                    </div>
                                    <div class="col-md-10">
                                      <div class="row cards_div bankbg_list py-3">
                                        <div class="col-md-5 hv-center">
                                            <a class="bank_all_img card_name text-center" href="#">
                                             <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                            </a>
                                        </div>
                                        <div class="col-md-7 h-center col0 all_color">
                                            <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-2 hv-center">
                                        <a class="card_name text-center" href="#"><img src="../img/component/cardNews/flower.png" alt="" title="新聞"><br>國泰世華</a>
                                    </div>
                                    <div class="col-md-10">
                                      <div class="row cards_div bankbg_list py-3">
                                        <div class="col-md-5 hv-center">
                                            <a class="bank_all_img card_name text-center" href="#">
                                             <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                            </a>
                                        </div>
                                        <div class="col-md-7 h-center col0 all_color">
                                            <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                        </div> 
                                      </div>
                                      <div class="row cards_div bankbg_list py-3">
                                        <div class="col-md-5 hv-center">
                                            <a class="bank_all_img card_name text-center" href="#">
                                             <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                            </a>
                                        </div>
                                        <div class="col-md-7 h-center col0 all_color">
                                            <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                        </div> 
                                      </div>
                                      <div class="row cards_div bankbg_list py-3">
                                        <div class="col-md-5 hv-center">
                                            <a class="bank_all_img card_name text-center" href="#">
                                             <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                            </a>
                                        </div>
                                        <div class="col-md-7 h-center col0 all_color">
                                            <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-2 hv-center">
                                        <a class="card_name text-center" href="#"><img src="../img/component/cardNews/timthumb.png" alt="" title="新聞"><br>國泰世華</a>
                                    </div>
                                    <div class="col-md-10">
                                      <div class="row cards_div bankbg_list py-3">
                                        <div class="col-md-5 hv-center">
                                            <a class="bank_all_img card_name text-center" href="#">
                                             <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                            </a>
                                        </div>
                                        <div class="col-md-7 h-center col0 all_color">
                                            <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                        </div> 
                                      </div>
                                      <div class="row cards_div bankbg_list py-3">
                                        <div class="col-md-5 hv-center">
                                            <a class="bank_all_img card_name text-center" href="#">
                                             <img src="../img/component/card1.png" alt="" title="新聞">現金回饋御璽卡
                                            </a>
                                        </div>
                                        <div class="col-md-7 h-center col0 all_color">
                                            <a href="bank.php"><img src="../img/component/cardNews/visa.png" title="新聞"></a> <a href="creditcard.php" title="新聞">無限卡</a>、<a href="creditcard.php" title="新聞">御璽卡</a>、<a href="creditcard.php" title="新聞">白金卡</a>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>

                                 
                                </div>

                              </div>
                            </div>


                            
                          </div>

                          <div class="tab-pane fade" id="goodSet" role="tabpanel" aria-labelledby="goodSet-tab">

                            <div class="row no-gutters">
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
                    <!--新卡訊end-->

                      
                      
                     <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!--信用卡推薦-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab phone_hidden">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="bank_all_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn btn-info mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li>國內現金回饋1.22%</li>
                                  <li>國外現金回饋2.22%</li>
                                  <li>感應式刷卡快速結帳</li>
                                  <li>高額旅遊平安險</li>
                                  <li>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="bank_all_img" href="#">
                                  <img src="../img/component/card2.png" alt="" title="新聞">
                                </a>
                                <a class="btn btn-info mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li>國內現金回饋1.22%</li>
                                  <li>國外現金回饋2.22%</li>
                                  <li>感應式刷卡快速結帳</li>
                                  <li>高額旅遊平安險</li>
                                  <li>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="bank_all_img" href="#">
                                  <img src="../img/component/card3.png" alt="" title="新聞">
                                </a>
                                <a class="btn btn-info mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li>國內現金回饋1.22%</li>
                                  <li>國外現金回饋2.22%</li>
                                  <li>感應式刷卡快速結帳</li>
                                  <li>高額旅遊平安險</li>
                                  <li>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>




                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->



                  

                    




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>熱門辦卡 </h4>
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
                                   <p>★國內現金回饋1.22%<br> ★國外現金回饋2.22%<br>★高額旅遊平安險<br>★華航機票優惠</p>
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
                                    <p>★國內現金回饋1.22%<br> ★國外現金回饋2.22%<br>★高額旅遊平安險<br>★華航機票優惠</p>
                                 </div>
                               </div>

                           </div>
                       </div>
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