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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡排行</a> / <a href="javascript:;">新手快搜</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                <div class="row">

                  <!--卡比較-->
                    <div class="col-md-12 col">

                        <div class="cardshap darkpurple_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a id="newHand_a" class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">新手快搜</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a id="cardCompare_a" class="nav-link py-2" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">卡片比一比</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a id="interest_a" class="nav-link py-2" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">權益比一比</a>
                          </li>
                          
                        </ul>
                    <div class="tab-content" id="myTabContent">

                    <!-- 信用卡快搜-->
                    <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                    <div class="col-md-12 col">

                            <div class="ranksearch_list new_hand_search">
                             <p>我們依您所偏好的信用卡優惠及用途，推薦適合的信用卡<span class="warr_txt text-danger">(請點擊下方選項，若要取消請再次點擊即可)</span></p>
                             <div class="text-right reset_div">
                               <a id="reset_new_btn" href="javascript:;" class="btn gray-layered btnOver">重選</a>
                             </div>
                             
                            <h6>1.信用卡優惠(可複選)</h6>
                            
                            <ul>
                            <li><a rank="pref201811061807131" class="card_pref" href="javascript:;">現金回饋</a></li>
                            <li><a rank="pref201811061807133" class="card_pref" href="javascript:;">紅利集點</a></li>
                            <li><a rank="pref201811061807135" class="card_pref" href="javascript:;">哩程累積</a></li>
                            <li><a rank="pref201811061807139" class="card_pref" href="javascript:;">免費機場停車</a></li>
                            <li><a rank="pref201811061807132" class="card_pref" href="javascript:;">免費機場貴賓室</a></li>
                            <li><a rank="pref201811061807136" class="card_pref" href="javascript:;">免費機場接送</a></li>
                            <li><a rank="pref201811061807137" class="card_pref" href="javascript:;">旅遊保險</a></li>
                            <li><a rank="pref2018110618071310" class="card_pref" href="javascript:;">市區停車優惠</a></li>
                            <li><a rank="pref2018110618071311" class="card_pref" href="javascript:;">分期零利率</a></li>
                            </ul>

                            <!-- <ul>
                            <?php 
                             // $row_pref=$pdo->select("SELECT Tb_index, pref_name FROM card_pref WHERE mt_id='site2018110617521258' ORDER BY OrderBy ASC");
                             // foreach ($row_pref as $row_pref_one) {
                             //   echo '<li><a rank="'.$row_pref_one['Tb_index'].'" class="card_pref" href="javascript:;">'.$row_pref_one['pref_name'].'</a></li>';
                             // }
                            ?>
                            </ul> -->
                            </div>

                            <div class="ranksearch_list new_hand_search">
                             <h6>2.消費用途(可複選)</h6>
                             <ul>
                              <li><a rank="fun201811061007565" class="card_func" href="javascript:;">加油</a></li>
                              <li><a rank="fun2018110610075611" class="card_func" href="javascript:;">電影</a></li>
                              <li><a rank="fun201811061007567" class="card_func" href="javascript:;">餐飲</a></li>
                              <li><a rank="fun201811061007568" class="card_func" href="javascript:;">交通通勤</a></li>
                              <li><a rank="fun201811061007561" class="card_func" href="javascript:;">航空旅遊</a></li>
                              <li><a rank="fun201811061007563" class="card_func" href="javascript:;">百貨購物</a></li>
                              <li><a rank="fun201811061007562" class="card_func" href="javascript:;">量販超市</a></li>                        
                            </ul>

                            <!-- <ul>
                              <?php 
                               // $row_func=$pdo->select("SELECT Tb_index, fun_name FROM card_func WHERE mt_id='site2018110517362644' ORDER BY OrderBy ASC");
                               // foreach ($row_func as $row_func_one) {
                               //   echo '<li><a rank="'.$row_func_one['Tb_index'].'" class="card_func" href="javascript:;">'.$row_func_one['fun_name'].'</a></li>';
                               // }
                              ?>
                            </ul> -->

                            </div>
                            
                             <div class="col-md-12 col hv-center">
                                <a id="easy_rank"  class="rank_button gray-layered btnOver" href="javascript:;">開始找卡</a>
                            </div>

                    </div>
                  </div>
                  <!-- 信用卡快搜end -->
                  
                  <!-- 卡片比一比-->
                  <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">
                        
                         <div class="row compare_bg">
                         <div class="col-md-4 col card_list_txt text-center">
                           <div class="rank_care ">

                             <form class="row search_from">
                             <select class="c_compare_bk">
                                 <option value="">--選擇銀行--</option>
                                 <?php 
                                   $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info ORDER BY bi_code ASC");
                                   foreach ($row_bank as $row_bank_one) {
                                     echo '<option value="'.$row_bank_one['Tb_index'].'">'.$row_bank_one['bi_shortname'].'</option>';
                                   }
                                 ?>
                             </select>
                             </form>

                             <form class="row search_from">
                             <select class="show_cc_group">
                                 <option value="">--選擇信用卡--</option>
                             </select> 
                             </form>

                             <form class="row search_from">
                             <select class="show_cc">
                                 <option value="">--選擇卡等--</option>
                             </select> 
                             </form>
                             <a class="show_card" href="javascript:;">
                               <h1 class="hv-center">卡片一</h1>
                             </a>
                          </div>
                         </div>
                        
                        <div class="col-md-4 col card_list_txt text-center">
                            <div class="rank_care ">

                              <form class="row search_from">
                              <select class="c_compare_bk2">
                                  <option value="">--選擇銀行--</option>
                                  <?php 
                                    $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info ORDER BY bi_code ASC");
                                    foreach ($row_bank as $row_bank_one) {
                                      echo '<option value="'.$row_bank_one['Tb_index'].'">'.$row_bank_one['bi_shortname'].'</option>';
                                    }
                                  ?>
                              </select>
                              </form>

                              <form class="row search_from">
                              <select class="show_cc_group2">
                                  <option value="">--選擇信用卡--</option>
                              </select> 
                              </form>

                              <form class="row search_from">
                              <select class="show_cc2">
                                  <option value="">--選擇卡等--</option>
                              </select> 
                              </form>
                              <a class="show_card" href="javascript:;">
                                <h1 class="hv-center">卡片二</h1>
                              </a>
                           </div>
                        </div>
                        
                        <div class="col-md-4 col card_list_txt text-center">
                          <div class="rank_care">
                             <form class="row search_from">
                              <select class="c_compare_bk3">
                                  <option value="">--選擇銀行--</option>
                                  <?php 
                                    $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info ORDER BY bi_code ASC");
                                    foreach ($row_bank as $row_bank_one) {
                                      echo '<option value="'.$row_bank_one['Tb_index'].'">'.$row_bank_one['bi_shortname'].'</option>';
                                    }
                                  ?>
                              </select>
                              </form>

                              <form class="row search_from">
                              <select class="show_cc_group3">
                                  <option value="">--選擇信用卡--</option>
                              </select> 
                              </form>

                              <form class="row search_from">
                              <select class="show_cc3">
                                  <option value="">--選擇卡等--</option>
                              </select> 
                              </form>
                              <a class="show_card" href="javascript:;">
                                <h1 class="hv-center">卡片三</h1>
                              </a>
                           </div>
                        </div>
                    </div>

                    <div class="col-md-12 col hv-center">
                     <a id="card_rank" class="rank_button gray-layered btnOver" href="javascript:;">開始比較</a>
                    </div>
                   </div>
                   <!-- 卡片比一比 END-->
                    
                    <!-- 權益比一比-->
                    <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">
                            <div class="col-md-12 col">
                            <div class="ranksearch_list rights_search profit_shop">
                             <p>請選擇要比較的權益項目，(最多3項)<span class="warr_txt text-danger">(請點擊下方選項，若要取消請再次點擊即可)</span></p>
                             <div class="text-right reset_div">
                               <a id="reset_profit_btn" href="javascript:;" class="btn gray-layered btnOver">重選</a>
                             </div>
                             <h6>1.權益項目(可複選)</h6>
                            <ul class="research_li">

                            <?php 
                             $row_int=$pdo->select("SELECT Tb_index, eq_name, eq_image FROM card_eq_item WHERE mt_id='site2019021216245137' AND is_im_eq=1 AND eq_type IN ('small','big') ORDER BY OrderBy ASC");
                             foreach ($row_int as $row_int_one) {
                               $eq_image=empty($row_int_one['eq_image']) ? '':'<img src="../sys/img/'.$row_int_one['eq_image'].'">';
                               echo '<li><a rank="'.$row_int_one['Tb_index'].'" class="" href="javascript:;">'.$eq_image.$row_int_one['eq_name'].'</a></li>';
                             }

                            ?>
                            
                            </ul>
                            </div>

                            <div class="ranksearch_list rights_checked">
                             <p>您選擇要比較的權益項目順序如下方所列，點選【開始比較】即可進行權益比一比</p>
                            <ul class="phone_list">
                            
                            
                            </ul>
                            </div>
                            
                             <div class="col-md-12 col hv-center">
                                <a id="profit_rank" class="rank_button gray-layered btnOver" href="javascript:;" >開始比較</a>
                            </div>
                            </div>
                          </div>
                          <!-- 權益比一比 END-->
                  
                        </div>
                      </div>
                    </div>
                    <!--卡比較end -->

                    
                     <!--廣告-->
                    <div class="col-md-12 col phone_hidden"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                    <!--banner end -->

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->


                    <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

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
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
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
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
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
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
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
                    <!--手機板信用卡推薦-->
                            <div class="col-md-12 col d-md-none d-sm-block">

                                <div class="cardshap darkpurple_tab exception">
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

                    <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
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
                       
                       <div class="cardshap darkpurple_tab mouseHover_tab">
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
                     <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>瀏覽過信用卡 </h4>
                                <a class="more_link" href="browse_detail.php"></a>
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
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
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
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
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
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
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

    <script type="text/javascript">
      $(window).on('load', function(event) {

        //-- 讀取查詢條件 --
         if (sessionStorage.getItem('rank_arr')!=null) {
          var rank_arr=sessionStorage.getItem('rank_arr').split(',');
          for (var i = 0; i < rank_arr.length; i++) {
            $('.new_hand_search [rank="'+rank_arr[i]+'"]').addClass('active');
          }
         }
      });
    </script>

  </body>
</html>