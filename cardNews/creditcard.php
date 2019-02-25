<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-焦點新聞</title>

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="card_second.php">卡總攬
            </a> / <a href="debitcard_detail.php">元大銀行</a></p>
          </div>
        </div>
        
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row pt-3 mx-3 detail_title">
                          <div class="col-8">
                          <h2>
                            <i><img src="../img/component/pay.png"></i>元大銀行元大鑽金卡_VISA_御璽卡
                          </h2>
                          </div>

                           <div class="col-4">
                               <div class="search_div hv-center">
                                 
                                <div class="fb-like mr-2" data-href="http://srl.tw/cardu/news_detail.html" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                 <a class="search_btn" href="#"><img src="../img/component/search/fb.png" alt="" title="Fb分享"></a>
                                 <a class="search_btn" href="#"><img src="../img/component/search/line.png" alt="" title="Line分享"></a>
                                 <a class="search_btn" href="#"><img src="../img/component/search/message.png" alt="" title="留言"></a>
                                 <a id="arrow_btn" class="search_btn" href="javascript:;"><img src="../img/component/search/arrow.png" alt="" title="往下開啟"></a>
                               </div>
                               <div class="more_search">
                                 <a href="#"><img src="../img/component/search/print.png" alt="" title="列印"></a>
                                 <a href="#"><img src="../img/component/search/work.png" alt="" title="收藏"></a>
                                 <a href="#"><img src="../img/component/search/mail.png" alt="" title="轉寄"></a>
                                 <a href="#"><img src="../img/component/search/mood.png" alt="" title="回報"></a>
                               </div>
                            </div>
                            <div class=" col-12 row debit_card col ">
                            <div class="col-5 text-center col0">
                             <img src="../img/component/cardNews/card_big.png" title="新聞"><br>
                             <div class="card_btn  hv-center">
                                <button type="button" class="btn btn-orange"><i class="fa fa-credit-card"></i>立即辦卡</button>
                                <button type="button" class="btn btn-gray">加入比較</button>
                              </div>
                            

                            </div>
                            <div class="col-7">
                             <div class="row no-gutters">
                              <div class="col-9">
                                <div class="credit_prize cardshap h-center">
                                  <img src="../img/component/cardNews/crown.png">
                                  <h4>現金回饋NO.1</h4>
                                </div>
                               <ul>
                               <li><a><img src="../img/component/cardNews/visa.png" title="新聞"></a></li>
                               <li><a><img src="../img/component/cardNews/visa.png" title="新聞"></a></li>
                               </ul>
                                <ul class="debit_limit">
                                <li><a href="#" title="新聞">無限卡</a></li>
                                </ul>
                             
                             </div>

                              </div>


                             
                            
                             
                             
                             <ul class="debit_list">
                               <li><img src="../img/component/debitcard.png" title="新聞"></li>
                               <li><img src="../img/component/debitcard.png" title="新聞"></li>
                               <li><img src="../img/component/debitcard.png" title="新聞"></li>
                               <li><img src="../img/component/debitcard.png" title="新聞"></li>
                               <li><img src="../img/component/debitcard.png" title="新聞"></li>
                               <li><img src="../img/component/debitcard.png" title="新聞"></li>
                             </ul>
                             
                             
                             <ul>
                             <li><img src="../img/component/debitcard1.png" title="新聞"></li>
                             <li><img src="../img/component/debitcard1.png" title="新聞"></li>
                             <li><img src="../img/component/debitcard1.png" title="新聞"></li>
                             <li><img src="../img/component/debitcard1.png" title="新聞"></li>
                             <li><img src="../img/component/debitcard1.png" title="新聞"></li>
                             <li><img src="../img/component/debitcard1.png" title="新聞"></li>
                             </ul>

                             

                             </div>
                             
                             
                           
                           
                          </div> 
                            <div class="row no-gutters mt-2 mb-3 newcard_g">
                            <div class="col-6"><span><i class="fa fa-check-circle"></i></span>網路消費2.5%現金回饋 </div>
                            <div class="col-6"><span><i class="fa fa-check-circle"></i></span>一般消費紅利2倍</div>
                            <div class="col-6"><span><i class="fa fa-check-circle"></i></span>3期分期0利率</div>
                            <div class="col-6"><span><i class="fa fa-check-circle"></i></span>首次自動加值OPENPOINT點數 </div> 
                            <div class="col-6"><span><i class="fa fa-check-circle"></i></span>首次自動加值OPENPOINT點數 </div> 
                          </div> 
                         
                        </div>

                       
                      </div>
                    </div>

                    
                     <!--廣告-->
                    <div class="col-md-12 col"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                          
                     <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" href="javascript:;" tab-target="#special_1" aria-selected="true">重要權益</a>
                          </li>
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">全部權益</a>
                          </li>
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2" id="special_3-tab" href="javascript:;" tab-target="#special_3" aria-selected="false">資訊內容</a>
                          </li>
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2" id="special_4-tab" href="javascript:;" tab-target="#special_4" aria-selected="false">網友留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row imp_int_title">
                              <div class="col-3 text-center">權益項目</div>
                              <div class="col-9 text-center">內容說明(謹慎理財，信用至上)</div>
                            </div>
                            <div class="accordion imp_int" id="accordionExample">

                              <div class="card">
                                <div class="card-header hv-center" id="imp_int1">
                                  <div class="row w-h-100">
                                    <div class="col-3 hv-center">
                                      <p class="hv-center mb-0"><img src="../img/component/debitcard1.png" alt="">現金回饋</p>
                                    </div>
                                    <div class="col-8 v-center border-left border-right">
                                      <p class="mb-0">國內：1.2%，國外：2.2% <br> (當月消費3,000元以上)</p>
                                    </div>
                                    <div class="col-1 hv-center">
                                      <button class="btn btn-link angle_down" type="button" data-toggle="collapse" data-target="#imp_int_txt1" aria-expanded="true" aria-controls="imp_int_txt1">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div id="imp_int_txt1" class="collapse" aria-labelledby="imp_int1" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <p class="collapse_txt mb-0">
                                     國內消費：1.2%，國外消費：2.2% <br>
                                     優惠期限至105/06/30，回饋金額無上限
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <div class="card">
                                <div class="card-header hv-center" id="imp_int2">
                                  <div class="row w-h-100">
                                    <div class="col-3 hv-center">
                                      <p class="hv-center mb-0"><img src="../img/component/debitcard1.png" alt="">旅遊保險</p>
                                    </div>
                                    <div class="col-8 v-center border-left border-right">
                                      <p class="mb-0">旅平險：800萬</p>
                                    </div>
                                    <div class="col-1 hv-center">
                                      <button class="btn btn-link angle_down" type="button" data-toggle="collapse" data-target="#imp_int_txt2" aria-expanded="true" aria-controls="imp_int_txt2">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div id="imp_int_txt2" class="collapse" aria-labelledby="imp_int2" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <p class="collapse_txt mb-0">
                                     國內消費：1.2%，國外消費：2.2% <br>
                                     優惠期限至105/06/30，回饋金額無上限
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <div class="card">
                                <div class="card-header hv-center" id="imp_int3">
                                  <div class="row w-h-100">
                                    <div class="col-3 hv-center">
                                      <p class="hv-center mb-0"><img src="../img/component/debitcard1.png" alt="">機場接送</p>
                                    </div>
                                    <div class="col-8 v-center border-left border-right">
                                      <p class="mb-0">一年兩次 <br> (前兩個月消費1萬元)</p>
                                    </div>
                                    <div class="col-1 hv-center">
                                      <button class="btn btn-link angle_down" type="button" data-toggle="collapse" data-target="#imp_int_txt3" aria-expanded="true" aria-controls="imp_int_txt3">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div id="imp_int_txt3" class="collapse" aria-labelledby="imp_int3" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <p class="collapse_txt mb-0">
                                     國內消費：1.2%，國外消費：2.2% <br>
                                     優惠期限至105/06/30，回饋金額無上限
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <div class="card">
                                <div class="card-header hv-center" id="imp_int4">
                                  <div class="row w-h-100">
                                    <div class="col-3 hv-center">
                                      <p class="hv-center mb-0"><img src="../img/component/debitcard1.png" alt="">道路救援</p>
                                    </div>
                                    <div class="col-8 v-center border-left border-right">
                                      <p class="mb-0">100公里 <br> (前三個月累積消費3千元以上)</p>
                                    </div>
                                    <div class="col-1 hv-center">
                                      <button class="btn btn-link angle_down" type="button" data-toggle="collapse" data-target="#imp_int_txt4" aria-expanded="true" aria-controls="imp_int_txt4">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div id="imp_int_txt4" class="collapse" aria-labelledby="imp_int4" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <p class="collapse_txt mb-0">
                                     國內消費：1.2%，國外消費：2.2% <br>
                                     優惠期限至105/06/30，回饋金額無上限
                                    </p>
                                  </div>
                                </div>
                              </div>

                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">

                            <form class="credit_boot">
                              <table>
                                <thead>
                                <tr>
                                  <th>權益項目</th>
                                  <th>內容說明(謹慎理財，信用至上)</th>
                                </tr>
                               </thead>
                               <tbody>
                                <tr>
                                  <td><input type="checkbox" name="條件">申辦條件</td>
                                  <td>1.正卡20歲以上；附卡15歲以上，且為正卡持卡人之父母、配偶、配偶父母、兄弟姐妹、子女。<br>
                                      2.固定年收入120萬以上，或近2個月平均資產達150萬元以上。
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">年費</td>
                                  <td>1.正卡：8,000元，首年優惠6,600元<br>
                                      2.附卡免年費
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">循環起息日</td>
                                  <td>入帳日起。</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">逾期違約金</td>
                                  <td>當期繳款發生延滯時，違約金300 元；<br> 
                                      連續2期發生繳款延滯時，違約金400元；<br> 
                                      連續3期發生繳款延滯時，違約金500元。<br>
                                      違約金最高連續收取期數不超過3期。
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">預借現金</td>
                                  <td>預借現金手續費：（每筆預借金額 × 3.5％) ＋150元 。</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">哩程數累積</td>
                                  <td>1.海外：消費金額換算新臺幣計算，人民幣兌換新臺幣每11元換1哩；其他外幣兌換新臺幣每12元換1哩<br> 
                                      2.國內：新臺幣每22元換1哩
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">旅遊保險</td>
                                  <td>旅行平安險NT5,000萬元，海外全程險NT1,000萬元</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">機場停車優惠</td>
                                  <td>支付當次國外旅遊八成以上團費或全額機票且當次金額滿1萬元以上，可享當次免費機場停車優惠，每次最高30天、一年不限次。<br>
                                      ※須事先撥打專線02-27458080輸入個人資料後再按896或以網路預約停車服務。
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">機場接送</td>
                                  <td>1.正卡：8,000元，首年優惠6,600元<br>
                                      2.附卡免年費
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">機場貴賓室</td>
                                  <td>107/4/1~12/31 <br>
                                      使用服務時，每戶消費達以下任一情形，即可享1年4次：<br> 
                                      1.前90天內刷卡支付國外旅遊機票/團費金額達2萬元以上 <br>
                                      2.最近1個月帳單每戶新增消費額達2萬元以上 <br>
                                      3.最近3個月帳單每戶累計新增消費額達10萬元 <br>
                                      4.前一年度1~12月帳單每戶累計新增消費金額(不含繳納綜合所得稅之金額)達60萬元以上 <br>

                                      -指定合作之貴賓室請詳閱中信官網
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">掛失自負</td>
                                  <td>1.銀行負擔自電話掛失起之前24小時以後被冒用之損失。<br> 
                                      2.自付額以新台幣3000元為上限。
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">掛失補卡費用</td>
                                  <td>無須支付掛失手續費</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">國外簽帳消費手續費</td>
                                  <td>依各國際組織依約所列之結匯日匯率轉換為新台幣，並加計1.5％之手續費。(VISA/MasterCard卡國外外幣交易加收交易金額之1.5%，國外新臺幣交易加收交易金額之1.3%；JCB卡國外外幣交易加收交易金額之1.5%；AE卡國外非美金交易加收交易金額之2%，國外美金交易加收交易金額之0.5%)
                                  </td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">調閱簽帳單費用</td>
                                  <td>鼎極卡不收取。</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">緊急替代卡手續費</td>
                                  <td>免收手續費。</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">溢付款退回匯款處理費</td>
                                  <td>鼎極卡不收取</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">轉卡手續費</td>
                                  <td>卡片毀損補發手續費：無</td>
                                </tr>
                                 <tr>
                                  <td><input type="checkbox" name="條件">補寄帳單費用</td>
                                  <td>補發兩個月以前之帳單，每個月份補發手續費100元。 </td>
                                </tr>
                                </tbody>
                              </table>
                            </form>
                           
                          </div>
                          <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">
                            <div class="bank_main hole">
                               <h5>相關新聞</h5>
                              </div>
                            
                            <div class="row no-gutters py-2">
                                <div class="col-4 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                          
                            <div class="bank_main hole">
                             <h5>相關好康</h5>
                              </div>
                          
                            <div class="row no-gutters py-2">
                                <div class="col-4 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-4 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                            </div>
                          
                           
                          </div>
                          <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

                           <!--網友留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <div class="bank_main hole">
                         <h5>網友留言</h5>
                         </div>
                        <div class="tab-content" id="myTabContent">
                          

                            <p>您尚未登入，請先<a href="#">登入會員</a></p>
                           
                          
                         
                        </div>
                      </div>
                    </div>
                    <!--網友留言end -->


                    <!--Facebook留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                         <div class="bank_main hole">
                         <h5>Facebook留言</h5>
                         </div>
                        <div class="tab-content" id="myTabContent">
                          

                            <div class="fb-comments" data-width="100%" data-href="http://srl.tw/cardu/news_detail.html" data-numposts="5"></div>
                           

                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->

                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
                    
                   
                    
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

                        <div class="cardshap brown_tab ">
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
                                  <img src="../img/component/card2.png" alt="">
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
                                  <img src="../img/component/card3.png" alt="">
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
                    

                   


                   

                   <div class="col-12 py-4">
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
                               <h4>熱門辦卡 </h4>
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

                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" style="background-image: url(../img/component/photo1.jpg);"></div>
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
                                    <div class="img_div w-h-100" style="background-image: url(../img/component/photo1.jpg);"></div>
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
                       <div class="cardshap hotCard tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>瀏覽過信用卡 </h4>
                                <a class="more_link" href="#"></a>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" style="background-image: url(../img/component/photo1.jpg);"></div>
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
                                    <div class="img_div w-h-100" style="background-image: url(../img/component/photo1.jpg);"></div>
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
                                    <div class="img_div w-h-100" style="background-image: url(../img/component/photo1.jpg);"></div>
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
                               <h4>熱門好康</h4>
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

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


        <?php 
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>

  </body>
</html>