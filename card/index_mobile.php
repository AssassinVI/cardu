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
        <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">卡情報</a></p>
      </div>
    </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

              

                <div class="row">

                   <div class="col-md-12 col">
                  
                      <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                                      FROM appNews as n
                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                      WHERE n.mt_id='$mt_id' AND n.ns_nt_pk!='nt2019021210051224' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                      ORDER BY n.ns_vfdate DESC LIMIT 0,10";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                      ?>
                  
                  </div>
                   <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                                       
                     <!--卡排行-->
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap">
                           
                           <div class="card_all row no-gutters">

                             <div class="col-md-2">
                               <div class="card_fun w-h-100 hv-center hole">
                                   <div class="text-center mt-05">
                                       <img src="../img/component/card_rank_logo.png" alt=""> <p class="mb-0 mt-025">卡總覽</p>
                                   </div>
                               </div>  
                             </div>
                             <div class="col-md-10">
                              <div class="swiper_div">
                                 <div class="swiper-container">
                                   <div class="swiper-wrapper">
                                       <?php 
                                        $row_card_type=$pdo->select("SELECT Tb_index, fun_name, card_image, card_image_hover FROM card_func WHERE mt_id='site2018110517362644' AND OnLineOrNot=1 ORDER BY OrderBy ASC");
                                        $x=1;
                                        $rand_num=rand(1,count($row_card_type));
                                        foreach ($row_card_type as $card_type) {
                                         $active=$x==$rand_num ? 'active':'';
                                         $card_image=$x==$rand_num ? $card_type['card_image_hover'] : $card_type['card_image'];
                                         $card_url='card_browse.php?func='.$card_type['Tb_index'].'" title="'.$card_type['fun_name'];
                                          echo '
                                          <div class="swiper-slide '.$active.'" fun_id="'.$card_type['Tb_index'].'" index="'.$x.'" > 
                                           <div class="text-center" ><a href="javascript:;"><img src="../sys/img/'.$card_image.'" alt="'.$card_type['fun_name'].'" ></a></div>
                                          </div>';
                                         $x++;
                                        }
                                       ?>                                     
                                   </div>

                               </div>

                               <!-- 如果需要导航按钮 -->
                                   <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                                   <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>

                                <!-- 給予隨機卡功能 -->
                                <input type="hidden" name="rand_num" value="<?php echo $rand_num;?>">

                              </div>
                             </div>
                           </div>

                           <div class="ccard">
                               
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">
                                      <div class="swiper-slide">
                                        <div class="w-h-100 hv-center">
                                            <a href="#" title="台新銀行比漾聯名卡">
                                                <img src="../img/component/card1.png" alt="台新銀行比漾聯名卡"><br>台新銀行比漾聯名卡
                                            </a>
                                        </div>
                                      </div>
                                    <div class="swiper-slide">
                                        <div class="w-h-100 hv-center">
                                            <a href="#" title="新光銀行指定卡"><img src="../img/component/card2.png" alt="新光銀行指定卡"><br>新光銀行指定卡</a>
                                        </div>
                                    </div>
                                      <div class="swiper-slide">
                                        <div class="w-h-100 hv-center">
                                            <a href="#" title="台新銀行GoGo悠遊卡"><img src="../img/component/card3.png" alt="台新銀行GoGo悠遊卡"><br>台新銀行GoGo悠遊卡</a>
                                        </div>
                                    </div>
                                      <div class="swiper-slide">
                                        <div class="w-h-100 hv-center">
                                            <a href="#" title="台新銀行比漾聯名卡"><img src="../img/component/card1.png" alt="台新銀行比漾聯名卡"><br>台新銀行比漾聯名卡</a>
                                        </div>
                                    </div>
                                      <div class="swiper-slide">
                                        <div class="w-h-100 hv-center">
                                            <a href="#" title="新光銀行指定卡"><img src="../img/component/card2.png" alt="新光銀行指定卡"><br>新光銀行指定卡</a>
                                        </div>
                                    </div>
                                      <div class="swiper-slide">
                                        <div class="w-h-100 hv-center">
                                            <a href="#" title="台新銀行GoGo悠遊卡"><img src="../img/component/card3.png" alt="台新銀行GoGo悠遊卡"><br>台新銀行GoGo悠遊卡</a>
                                        </div>
                                    </div>
                                  </div>
                                                                    
                              </div>

                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

                           </div>
                            
                        </div>
                    </div>
                    <!--卡排行end -->
                    
                     <!--新卡訊-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">新卡訊</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>台新銀行-比漾聯名卡</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            <span>店內最高1.6%；店外0.3%回饋</span>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>台新銀行-比漾聯名卡</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            <span>店內最高1.6%；店外0.3%回饋</span>
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>台新銀行-比漾聯名卡</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            <span>店內最高1.6%；店外0.3%回饋</span>
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
                    <!--新卡訊end -->
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    
                     <!--特別議題一-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active py-2" id="special_1-tab" href="second.php" tab-target="#special_1" aria-selected="true">特別議題一</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">
                                <div class="col-12 bigcard py-md-2 mb-2">
                                   <!-- 手機用分類輪播 -->
                                   <div class="sub_ph_slide swiper-container">
                                       <div class="swiper-wrapper">
                                           <div class="swiper-slide" > 
                                             <a href="#" title="新光三越週慶強強滾，首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                                 <p>新光三越週慶強強滾，首日6店</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="ATM「靠臉」就能領錢，台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                                 <p>ATM「靠臉」就能領錢，台新內湖</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="跨年4天連假玩翻台北，#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);">
                                                 <p>跨年4天連假玩翻台北，#Party</p>
                                             </a>
                                           </div>
                                       </div>

                                       <div class="swiper-pagination"></div>
                                       
                                       <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                       <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                   </div>
                                   <!-- 手機用分類輪播 END -->
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
                    <!--特別議題end -->
                    <!--特別議題2-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">特別議題2</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          <div class="row no-gutters">
                                <div class="col-12 bigcard py-md-2">
                                   <!-- 手機用分類輪播 -->
                                   <div class="sub_ph_slide swiper-container">
                                       <div class="swiper-wrapper">
                                           <div class="swiper-slide" > 
                                             <a href="#" title="新光三越週慶強強滾，首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                                 <p>新光三越週慶強強滾，首日6店</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="ATM「靠臉」就能領錢，台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                                 <p>ATM「靠臉」就能領錢，台新內湖</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="跨年4天連假玩翻台北，#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);">
                                                 <p>跨年4天連假玩翻台北，#Party</p>
                                             </a>
                                           </div>
                                       </div>

                                       <div class="swiper-pagination"></div>
                                       
                                       <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                       <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                   </div>
                                   <!-- 手機用分類輪播 END -->
                                </div>
                            </div>
                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-5 py-2">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-7 pl-4 py-2 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 py-1 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
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
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                     <!--懶人包-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active py-2" id="special_1-tab" href="second.php" tab-target="#special_1" aria-selected="true">懶人包</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">
                                <div class="col-12 bigcard py-md-2 mb-2">
                                   <!-- 手機用分類輪播 -->
                                   <div class="sub_ph_slide swiper-container">
                                       <div class="swiper-wrapper">
                                           <div class="swiper-slide" > 
                                             <a href="#" title="新光三越週慶強強滾，首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                                 <p>新光三越週慶強強滾，首日6店</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="ATM「靠臉」就能領錢，台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                                 <p>ATM「靠臉」就能領錢，台新內湖</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="跨年4天連假玩翻台北，#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);">
                                                 <p>跨年4天連假玩翻台北，#Party</p>
                                             </a>
                                           </div>
                                       </div>

                                       <div class="swiper-pagination"></div>
                                       
                                       <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                       <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                   </div>
                                   <!-- 手機用分類輪播 END -->
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
                    <!--懶人包end -->
                     <!--開卡文-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active py-2" id="special_1-tab" href="second.php" tab-target="#special_1" aria-selected="true">開卡文</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">
                                <div class="col-12 bigcard py-md-2 mb-2">
                                   <!-- 手機用分類輪播 -->
                                   <div class="sub_ph_slide swiper-container">
                                       <div class="swiper-wrapper">
                                           <div class="swiper-slide" > 
                                             <a href="#" title="新光三越週慶強強滾，首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                                 <p>新光三越週慶強強滾，首日6店</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="ATM「靠臉」就能領錢，台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                                 <p>ATM「靠臉」就能領錢，台新內湖</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="跨年4天連假玩翻台北，#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);">
                                                 <p>跨年4天連假玩翻台北，#Party</p>
                                             </a>
                                           </div>
                                       </div>

                                       <div class="swiper-pagination"></div>
                                       
                                       <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                       <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                   </div>
                                   <!-- 手機用分類輪播 END -->
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
                    <!--開卡文end -->
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                     <!--愛分享-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active py-2" id="special_1-tab" href="second.php" tab-target="#special_1" aria-selected="true">愛分享</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">
                                <div class="col-12 bigcard py-md-2 mb-2">
                                   <!-- 手機用分類輪播 -->
                                   <div class="sub_ph_slide swiper-container">
                                       <div class="swiper-wrapper">
                                           <div class="swiper-slide" > 
                                             <a href="#" title="新光三越週慶強強滾，首日6店業績逾14.9億" class="img_div" style="background-image: url(../img/component/photo1.jpg);">
                                                 <p>新光三越週慶強強滾，首日6店</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="ATM「靠臉」就能領錢，台新內湖分行首上線" class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                                 <p>ATM「靠臉」就能領錢，台新內湖</p>
                                             </a>
                                           </div>
                                           <div class="swiper-slide" > 
                                             <a href="#" title="跨年4天連假玩翻台北，#Party101之夜看煙火" class="img_div" style="background-image: url(../img/component/photo3.jpg);">
                                                 <p>跨年4天連假玩翻台北，#Party</p>
                                             </a>
                                           </div>
                                       </div>

                                       <div class="swiper-pagination"></div>
                                       
                                       <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                       <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                   </div>
                                   <!-- 手機用分類輪播 END -->
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
                    <!--愛分享end -->
                    
                    <!--卡訊-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">卡訊</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
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
                    <!--卡訊end -->
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    <!--首刷禮-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">首刷禮</a>
                            <a class="top_link" href="#"></a>
                          </li>
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          
                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>

                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
                            <a href="#" title="新聞"><p>到了年底出國旅遊潮，海外高現金回饋信用卡是「血拼」必備工具。由上海銀行簡單卡日韓回饋3%最強...</p></a>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsrl.tw%2Fcardu%2Fnews_second.html&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                        </div>
                         <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-1">
                            <a class="img_div news_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
                            <a href="#" title="新聞"><h3>遊日血拼大回饋 信用卡大調查</h3></a><small class="phone_hidden"><a href="#" title="新聞">(XXX)</a></small>
                            
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
                    <!--信用卡推薦-->
                    <div class="col-md-12 col">

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


    <?php 
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>