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
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心
            </a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                <div class="row">
                   <!--我的信用卡-->
                    <div class="col-md-12 col">

                        <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab"  href="javascript:;" tab-target="#title_5" aria-selected="true">加入卡優會員</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                             <div class="sign_info">
                             <h5>使用社群帳號註冊</h5>

                             
                             <div class="user_login hv-center">
                                <button type="button" class="btn blue_tab_btn btnOver mx-md-2">Facebook</a>
                                <button type="button" class="btn red_tab_btn btnOver">Google</button>
                             </div>


                             
                             
                             <h5>使用Email帳號註冊</h5>
                             
                             <form class="px-md-2 login_info">
                               <div class="login_line">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*會員帳號</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" placeholder="＊會員帳號">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*暱稱</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" placeholder="＊暱稱">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*密碼</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="password" class="form-control" id="inputPassword4" placeholder="*密碼(4碼以上，僅可使用英文/數字)">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*請再次輸入</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="password" class="form-control" id="inputPassword4" placeholder="*請再次輸入密碼">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*真實姓名</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="text" class="form-control" placeholder="*真實姓名">
                                   </div>
                                 </div>
                               <div class="row">
                                  <label class="col-sm-2 col-form-label">*性別</label>
                                  <div class="col-sm-10 form-inline">
                                     <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">男性</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">女性</label>
                                  </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*生日</label>
                                   <div class="col-sm-10 date_w form-inline">
                                       西年
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option value="1920">1920</option>
                                        <option value="1921">1921</option>
                                        <option value="1922">1922</option>
                                        <option value="1923">1923</option>
                                        <option value="1924">1924</option>
                                        <option value="1925">1925</option>
                                        <option value="1926">1926</option>
                                        <option value="1927">1927</option>
                                        <option value="1928">1928</option>
                                        <option value="1929">1929</option>
                                        <option value="1930">1930</option>
                                        <option value="1931">1931</option>
                                        <option value="1932">1932</option>
                                        <option value="1933">1933</option>
                                        <option value="1934">1934</option>
                                        <option value="1935">1935</option>
                                        <option value="1936">1936</option>
                                        <option value="1937">1937</option>
                                        <option value="1938">1938</option>
                                        <option value="1939">1939</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                       </select>
                                       年
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                       </select>
                                       月
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                       </select>
                                       日
                                     </div>
                                 </div> 
                                
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*Email</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="email" class="form-control" id="inputEmail3" placeholder="建議輸入常用的Gmail信箱">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*手機</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="text" class="form-control" placeholder="請輸入數字，如：0900123456">
                                   </div>
                                 </div>
                                <div class="row">
                                   <label label for="inputAddress" class="col-sm-2 col-form-label">地址</label>
                                     <div class="col-sm-10 date_w form-inline">
                                      <div class="row no-gutters">
                                        <div class="col-md-12">
                                         <select select class="form-control mr-2" id="exampleFormControlSelect1">
                                          <option value="">請選擇</option>
                                         </select>
                                         <select select class="form-control mr-2" id="exampleFormControlSelect1">
                                          <option value="">請選擇</option>
                                         </select>
                                        </div>
                                        <div class="col-md-12">
                                         <input type="text" class="form-control" placeholder="">
                                        </div>
                                      </div>
                                     </div>

                                 </div>
                                <div class="row">
                                   <label class="col-sm-2 col-form-label">*驗證</label>
                                   <div class="col-sm-10 form-inline">
                                     <!-- google 驗證碼 -->
                                     <div class="g-recaptcha" data-sitekey="6Le2HRIUAAAAAJuw4gBeXfGm_RBmQ1ONISumalC0"></div>
                                   </div>
                                 </div>

                                  <div class="row px-3 py-2">
                                   <div class="form-check">
                                     <input class="form-check-input" type="checkbox" id="gridCheck">
                                     <label class="form-check-label" for="gridCheck">
                                        我已詳閱<a href="#">卡優新聞網會員服務條款</a>
                                     </label>
                                   </div>
                                 </div>
                                 <div class="row px-3 py-2">
                                   <div class="form-check">
                                     <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                                     <label class="form-check-label" for="gridCheck">
                                         我同意訂閱卡優電子報
                                     </label>
                                   </div>
                                 </div>
                                   <div class="col-md-12 col  member_btn hv-center">
                                     <button class="gray-layered btnOver" type="submit">確認送出</button>
                                  </div>
                                  <label class="form-check-label hv-center py-2" for="gridCheck">
                                     若已加入會員<a href="#">請按此登入</a>
                                  </label>
                                </div>
                                
                                
                                
                              
                            </form>

                            
                           </div>
                          </div>
              
          
                  
                        </div>
                      </div>
                    </div>
                    <!--我的信用卡-->
                    




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

    <!-- GOOGLE recaptcha 驗證程式 -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

  </body>
</html>