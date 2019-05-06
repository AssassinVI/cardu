<?php 
 require '../share_area/conn.php';

  if ($_POST) {
   
   //-- GOOGLE recaptcha 驗證程式 --
  GOOGLE_recaptcha('6Le2HRIUAAAAAJJbt4e5F6g6yuW-FmSAYg--3R43', $_POST['g-recaptcha-response'], 'back');
 }
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心/ <a href="javascript:;">客服中心</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    
                    

                    <div class="pb-3 detail_content">
                    <div class="col-md-12 col">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="second.php" tab-target="#goodMember" aria-selected="true">聯絡我們</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="second.php" tab-target="#goodPerson" aria-selected="false">常見問題</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                              <form class="px-md-2 login_info">
                               
                                 <p>感謝您瀏覽本網站資訊，若您需要更進一步的服務，請在下方詳述您的問題並留下聯絡資訊，以利專人處理，感謝。<br>※如有新聞稿、活動邀請函等相關資料，請將資料寄至<br>【新聞部信箱cardu_news@cardu.com.tw】</p>
                                <div class="login_line">
                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*服務項目</label>
                                     <div class="col-sm-10 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                   </select>
                                     </div>
                                   </div>

                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*姓名</label>
                                     <div class="col-sm-10 form-inline">
                                       <input type="text" class="form-control" placeholder="姓名">
                                     </div>
                                   </div>
                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*Email</label>
                                     <div class="col-sm-10 form-inline login_w">
                                       <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                     </div>
                                   </div>
                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*電話</label>
                                     <div class="col-sm-10 form-inline login_w">
                                       <input type="text" class="form-control" placeholder="請輸入數字，如：0900123456">
                                     </div>
                                   </div>
                                 <div class="row">
                                    <label class="col-sm-2 col-form-label">*主旨</label>
                                    <div class="col-sm-10 form-inline login_w">
                                      <input type="text" class="form-control" placeholder="">
                                    </div>
                                  </div>

                                  <div class="row">
                                     <label class="col-sm-2 col-form-label">*內容</label>
                                     <div class="col-sm-10 py-md-2">
                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                     </div>
                                   </div>

                                  

                                 <div class="row">
                                   <label class="col-sm-2 col-form-label">*驗證</label>
                                   <div class="col-sm-6 form-inline">
                                     <!-- google 驗證碼 -->
                                     <div class="g-recaptcha" data-sitekey="6Le2HRIUAAAAAJuw4gBeXfGm_RBmQ1ONISumalC0"></div>
                                   </div>
                                 </div>
                               </div>
                                 <div class="col-md-12 col  member_btn hv-center">
                                    <button class="gray-layered btnOver" type="submit">送出資料</button>
                                 </div>

                              </form>
                            
                           
                          </div>
                          <div class="tab-pane fade" id="goodPerson" role="tabpanel" aria-labelledby="goodPerson-tab">

                            <form class="px-md-2">
                               <p>若您尚未收到卡優新聞網寄發的註冊確認信，請填寫下列資料，系統將重新寄送註冊確認信到您的電子信箱。</p>
                               
                            </form>
                           
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
  
  <!-- GOOGLE recaptcha 驗證程式 -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
</html>