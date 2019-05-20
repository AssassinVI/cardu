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
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    <div class="col-md-12 col">
                      <div class="row about_bg py-md-0 py-2">
                       <div class="col-md-3">
                         <img src="../img/component/people.png">
                       </div>
                       <div class="col-md-5">
                        <h1>新使用者</h1>
                        <p>立即註冊享受卡優新聞網的服務</p>
                       </div>
                       <div class="col-md-4">
                        <h2>Register Now</h2>
                        <div class="col-md-12 col hv-center primary_tab_btn">
                         <button class="gray-layered btnOver" type="submit">我要註冊</button>
                         <button class="gray-layered btnOver" type="submit">會員登入</button>
                        </div>
                       </div>  
                      </div>
                    </div>
                    
                    
                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">卡優公告</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="javascript:;" tab-target="#goodPerson" aria-selected="false">卡優活動</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">
                           
                           <div class="swiper-container sub_slide">
                               <div class="swiper-wrapper">
                                   <div class="swiper-slide">
                                     <div class="row no-gutters">
                                       <div class="col-md-4 col-12 cards-3 text-center">
                                         <a href="#">
                                          <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                              
                                          </div>
                                          <span>遊日血拚大回饋，信用卡大調查</span>
                                         </a>
                                       </div>
                                       <div class="col-md-4 col-12 cards-3 text-center">
                                         <a href="#">
                                           <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                              
                                           </div>
                                           <span>遊日血拚大回饋，信用卡大調查</span>
                                         </a>
                                       </div>
                                        <div class="col-md-4 col-12 cards-3 text-center">
                                         <a href="#">
                                           <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                               
                                           </div>
                                           <span>遊日血拚大回饋，信用卡大調查</span>
                                         </a>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="swiper-slide">
                                     <div class="row no-gutters">
                                       <div class="col-md-4 col-12 cards-3 text-center">
                                         <a href="#">
                                          <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                              
                                          </div>
                                          <span>遊日血拚大回饋，信用卡大調查</span>
                                         </a>
                                       </div>
                                       <div class="col-md-4 col-12 cards-3 text-center">
                                         <a href="#">
                                           <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                              
                                           </div>
                                           <span>遊日血拚大回饋，信用卡大調查</span>
                                         </a>
                                       </div>
                                        <div class="col-md-4 col-12 cards-3 text-center">
                                         <a href="#">
                                           <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                               
                                           </div>
                                           <span>遊日血拚大回饋，信用卡大調查</span>
                                         </a>
                                       </div>
                                     </div>
                                   </div>
                               </div>
                               
                               <!-- 如果需要导航按钮 -->
                               <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                               <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                               
                           </div>
                            


                            <br>
                              <div class="px-md-2 member_info">
                                 <h4>會員專區</h5>
                                 <p>
                                 卡優新聞網以卡優、卡油、卡友為宗旨，提供銀行與商店所發行的各種信用卡、金融卡、儲值卡與會員卡，以及各種購物、美食、休閒、旅遊、生活的卡好康與優情報等相關訊息，讓會員可以快速地掌握最新、最正確的資訊。卡優新聞網是您每天必上的優質網站，只要您註冊並登錄卡優新聞網，即可享受本網站所提供給會員獨享的免費服務。  
                                 </p>
                                 <h5>【訂閱電子報】</h5>
                                 <p>卡優新聞網將會不定期發送電子報，透過e-mail即可以獲得銀行、商店所提供的各式好康訊息與新聞，讓您掌握商務脈動比別人快一步。</p>

                                 <h5>【活動獎勵】</h5>
                                 <p>卡優新聞網不定期為各位會員準備多種有趣的活動，當您參加卡優活動時，還可獲得卡優新聞網所給予的積分獎勵喔！</p>
                                 <br>
                                 <h5>我的卡優</h5>
                                 <p>
                                  只要註冊成為卡優新聞網的會員，登入帳密後即可享受本網站所給您的個人化功能如下。
                                 </p>
                                 <h5>【我的信用卡】</h5>
                                 <p>只要選擇您的信用卡名稱及卡別,就可以立即擁有該卡片所有的好康資訊及權益資
                                    料,簡單便利,不用搜尋一目瞭然,馬上註冊即刻享有會員獨特的客制化服務。
                                 </p>

                                 <h5>【我的帳單】</h5>
                                 <p>填入信用卡帳單金額後,系統即會自動提醒繳費,讓您不再漏繳任何信用卡帳單,並
                                    可自行設定消費類別、方便管理帳務,更能統計各銀行、各類別的消費總額,是您最佳的記帳工具。
                                 </p>

                                 <h5>【我的資訊】</h5>
                                 <p>您可訂閱有興趣的銀行或商店,隨時掌握最新新聞與好康優惠,輕鬆成為生活理財達人。</p>

                                  <h5>【我的文章】</h5>
                                 <p>您可以收藏有興趣的新聞與好康優惠內容,可以永久保留,方便日後查看。</p>

                                 <h5>【我的收藏】</h5>
                                 <p>您可以收藏有興趣的新聞與好康優惠內容,可以永久保留,方便日後查看。</p>

                                 <h5>【我的行事曆】</h5>
                                 <p>您可以在行事曆中查看您所加入的帳單最後繳費日提醒,也可以查看加入收藏的好康訊息,提醒您好康截止日期。</p>
                              </div>
                            
                           
                          </div>
                          <div class="tab-pane fade" id="goodPerson" role="tabpanel" aria-labelledby="goodPerson-tab">

                            
                            <ul class="fun">
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                              <li>
                                <img src="../img/component/li.png">
                                <span class="publish_cate">[好康活動]</span>
                                <a href="#">抽獎活動》FB留言抽獎　送你鮮食家年菜自(已結束)</a>
                                <span class="ontime">2018/01/22~2018/02/04</span>
                              </li>
                            </ul>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one primary_tab">
                           <div class="title_tab hole">
                               <h4>熱門優惠</h4>
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
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>

  </body>
</html>