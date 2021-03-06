<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-卡排行</title>

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
  <body class="rank_body">

    <div class="container detail_page">

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
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="news.php">卡排行</a> / <a href="news_second.php">新手快搜
            </a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                                 <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap darkpurple_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" data-toggle="tab" href="#title_5" role="tab" aria-controls="title_5" aria-selected="true">新手快搜</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_6-tab" data-toggle="tab" href="#title_6" role="tab" aria-controls="title_6" aria-selected="false">卡片比一比</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_7-tab" data-toggle="tab" href="#title_7" role="tab" aria-controls="title_7" aria-selected="false">權益比一比</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                             <!--信用卡推薦-->
                    <div class="col-md-12 col">

                       
                        
                        
                          

                            <div class="col-md-12 col0">
                                <p>您所勾選的搜尋條件:<br>
                                信用卡優惠:<a href="#">現金回饋</a>、<a href="#">紅利集點</a>、<a href="#">哩程累積</a><br>
                                信用卡用途:<a href="#">交通通勤</a>、<a href="#">百貨購物</a></p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="rank_research hv-center">
                                <p>您所勾選的搜尋條件無法找到符合的信用卡，<br>
                                   請在下方更改或減少搜尋條件，以便為您重新搜尋信用卡。
                                </p>
                              </div>
                            </div>
                            <div class="col-md-12 col0">
                             <p class="change_main">變更新手快搜條件</p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="rank_change">
                            <div class="row no-gutters">
                                 <div class="col-4 h-center card_list">
                                  1.信用卡優惠(可複選)
                                 </div>
                                 <div class="col-8">
                                  <div class="row">
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">現金回饋</a>
                                    <a><input type="checkbox" name="條件">市區停車</a>
                                    <a><input type="checkbox" name="條件">機場貴賓室</a>
                                    </div>
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">紅利集點</a>
                                    <a><input type="checkbox" name="條件">旅遊保險</a>
                                    <a><input type="checkbox" name="條件">免費機場停車</a>
                                    </div>
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">哩程累積</a>
                                    <a><input type="checkbox" name="條件">分期0利率</a>
                                    <a><input type="checkbox" name="條件">免費機場接送</a>
                                    </div>
                                  </div>
                                 </div>
                               </div>
                               <div class="row no-gutters">
                                 <div class="col-4 h-center">
                                  2.信用卡消費用途(可複選)
                                 </div>
                                 <div class="col-8">
                                  <div class="row">
                                   <div class="col-3">
                                     <a><input type="checkbox" name="條件">加油</a>
                                     <a><input type="checkbox" name="條件">航空旅遊</a>
                                   </div>
                                    <div class="col-3">
                                      <a><input type="checkbox" name="條件">電影</a>
                                      <a><input type="checkbox" name="條件">百貨購物</a>
                                   </div>
                                    <div class="col-3">
                                      <a><input type="checkbox" name="條件">餐飲</a>
                                      <a><input type="checkbox" name="條件">量販超市</a>
                                   </div>
                                    <div class="col-3"> 
                                      <a><input type="checkbox" name="條件">交通通勤</a>
                                   </div>
 
                                  
                                </div>
                                 </div>
                               </div>
                             </div>
                             </div>
                            <div class="col-md-12 col hv-center">
                                <a class="rank_button" href="#">開始找卡</a>
                            </div>
                        
                      
                    </div>
                    <!--信用卡推薦end -->
                           
                          </div>
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">
                            <div class="col-md-12 col">

                              <div class="col-md-12 col0">
                                <p>您所勾選的搜尋條件:<br>
                                信用卡優惠:<a href="#">現金回饋</a>、<a href="#">紅利集點</a>、<a href="#">哩程累積</a><br>
                                信用卡用途:<a href="#">交通通勤</a>、<a href="#">百貨購物</a></p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="rank_research hv-center">
                                <p>您所勾選的搜尋條件無法找到符合的信用卡，<br>
                                   請在下方更改或減少搜尋條件，以便為您重新搜尋信用卡。
                                </p>
                              </div>
                            </div>
                           <div class="col-md-12 col0">
                             <p class="change_main">變更新手快搜條件</p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="rank_change">
                            <div class="row no-gutters">
                                 <div class="col-4 h-center card_list">
                                  1.信用卡優惠(可複選)
                                 </div>
                                 <div class="col-8">
                                  <div class="row">
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">現金回饋</a>
                                    <a><input type="checkbox" name="條件">市區停車</a>
                                    <a><input type="checkbox" name="條件">機場貴賓室</a>
                                    </div>
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">紅利集點</a>
                                    <a><input type="checkbox" name="條件">旅遊保險</a>
                                    <a><input type="checkbox" name="條件">免費機場停車</a>
                                    </div>
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">哩程累積</a>
                                    <a><input type="checkbox" name="條件">分期0利率</a>
                                    <a><input type="checkbox" name="條件">免費機場接送</a>
                                    </div>
                                  </div>
                                 </div>
                               </div>
                               <div class="row no-gutters">
                                 <div class="col-4 h-center">
                                  2.信用卡消費用途(可複選)
                                 </div>
                                 <div class="col-8">
                                  <div class="row">
                                   <div class="col-3">
                                     <a><input type="checkbox" name="條件">加油</a>
                                     <a><input type="checkbox" name="條件">航空旅遊</a>
                                   </div>
                                    <div class="col-3">
                                      <a><input type="checkbox" name="條件">電影</a>
                                      <a><input type="checkbox" name="條件">百貨購物</a>
                                   </div>
                                    <div class="col-3">
                                      <a><input type="checkbox" name="條件">餐飲</a>
                                      <a><input type="checkbox" name="條件">量販超市</a>
                                   </div>
                                    <div class="col-3"> 
                                      <a><input type="checkbox" name="條件">交通通勤</a>
                                   </div>
  
                                  
                                </div>
                                 </div>
                               </div>
                             </div>
                             </div>
                            <div class="col-md-12 col hv-center">
                                <a class="rank_button" href="#">開始找卡</a>
                            </div>

                          
                           
                          </div>
                          </div>
                          <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">
                            <div class="col-md-12 col">

                              <div class="col-md-12 col0">
                                <p>您所勾選的搜尋條件:<br>
                                信用卡優惠:<a href="#">現金回饋</a>、<a href="#">紅利集點</a>、<a href="#">哩程累積</a><br>
                                信用卡用途:<a href="#">交通通勤</a>、<a href="#">百貨購物</a></p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="rank_research hv-center">
                                <p>您所勾選的搜尋條件無法找到符合的信用卡，<br>
                                   請在下方更改或減少搜尋條件，以便為您重新搜尋信用卡。
                                </p>
                              </div>
                            </div>
                            <div class="col-md-12 col0">
                             <p class="change_main">變更新手快搜條件</p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="rank_change">
                            <div class="row no-gutters">
                                 <div class="col-4 h-center card_list">
                                  1.信用卡優惠(可複選)
                                 </div>
                                 <div class="col-8">
                                  <div class="row">
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">現金回饋</a>
                                    <a><input type="checkbox" name="條件">市區停車</a>
                                    <a><input type="checkbox" name="條件">機場貴賓室</a>
                                    </div>
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">紅利集點</a>
                                    <a><input type="checkbox" name="條件">旅遊保險</a>
                                    <a><input type="checkbox" name="條件">免費機場停車</a>
                                    </div>
                                    <div class="col-4 card_list">
                                    <a><input type="checkbox" name="條件">哩程累積</a>
                                    <a><input type="checkbox" name="條件">分期0利率</a>
                                    <a><input type="checkbox" name="條件">免費機場接送</a>
                                    </div>
                                  </div>
                                 </div>
                               </div>
                               <div class="row no-gutters">
                                 <div class="col-4 h-center">
                                  2.信用卡消費用途(可複選)
                                 </div>
                                 <div class="col-8">
                                  <div class="row">
                                   <div class="col-3">
                                     <a><input type="checkbox" name="條件">加油</a>
                                     <a><input type="checkbox" name="條件">航空旅遊</a>
                                   </div>
                                    <div class="col-3">
                                      <a><input type="checkbox" name="條件">電影</a>
                                      <a><input type="checkbox" name="條件">百貨購物</a>
                                   </div>
                                    <div class="col-3">
                                      <a><input type="checkbox" name="條件">餐飲</a>
                                      <a><input type="checkbox" name="條件">量販超市</a>
                                   </div>
                                    <div class="col-3"> 
                                      <a><input type="checkbox" name="條件">交通通勤</a>
                                   </div>
  
                                  
                                </div>
                                 </div>
                               </div>
                             </div>
                             </div>
                            <div class="col-md-12 col hv-center">
                                <a class="rank_button" href="#">開始找卡</a>
                            </div>

                           
                          </div>
  
                          </div>
                  
                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->

                    
                     <!--廣告-->
                    <div class="col-md-12 col"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->


                    <!--信用卡推薦-->
                    <div class="col-md-12 col">

                        <div class="cardshap darkpurple_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
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
                                <a class="card_list_img" href="#">
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
                                <a class="card_list_img" href="#">
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


                  
                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
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
                       
                       <div class="cardshap purple_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active  pl-30" id="card-tab" tab-target="#card" href="javascript:;" aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/index/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="right-tab" tab-target="#right" href="javascript:;" aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/index/icon2.png); background-size: 80%;"></i>權益快搜
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
                       <div class="cardshap hotCard tab_one darkpurple_tab">
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
                       <div class="cardshap tab_one darkpurple_tab">
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

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>