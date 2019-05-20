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
                    <div class="cardshap ">

                      <div class="pt-3 detail_title">
                       <div class="col-md-12 col">
                         <div class="row user_info">
                                <div class="col-md-4 hv-center">
                                  <ul>
                                    <li><img src="../img/component/user.png"><br>會員暱稱</li>
                                    <li><img src="../img/component/grade.png"><br>會員等級</li>
                                  </ul>
                                </div>
                                <div class="col-md-8">
                                  <div class="row no-gutters">
                                    <div class="col-md-5">
                                        <p><img src="../img/component/li.png">U幣:XX</p>
                                        <p><img src="../img/component/li.png">積分:XX</p>
                                        <p><img src="../img/component/li.png">威望值:XX</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><img src="../img/component/li.png">註冊時間：20XX/XX/XX XX:XX</p>
                                        <p><img src="../img/component/li.png">最近登錄：20XX/XX/XX XX:XX</p>
                                        <p><img src="../img/component/li.png">登錄次數：XXX</p>
                                    </div>
                                  </div>
                                </div>
                              </div> 
                            </div> 
                          </div>

                    
                          <!--特別議題-->
                    <div class="col-md-12 col pb-3 detail_content">

                        <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">基本資料</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">個人化設定</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">變更密碼</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                            
                            <form class="px-md-2 login_info">
                               <div class="login_line py-2">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">帳號：</label>
                                   <div class="col-sm-10 form-inline">XXXXX</div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">暱稱：</label>
                                   <div class="col-sm-10 form-inline">XXXXX</div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">姓名：</label>
                                   <div class="col-sm-10 form-inline">XXX</div>
                                 </div>
                              
                               <div class="row">
                                  <label class="col-sm-2 col-form-label">性別：</label>
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
                                   <label class="col-sm-2 col-form-label">生日：</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" placeholder="XXXX-XX-XX">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">Email：</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="email" class="form-control" id="inputEmail3" placeholder="ＸＸＸ＠ＸＸＸ.XXX.XX">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">手機：</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" placeholder="XXXXXXXXXX">
                                   </div>
                                 </div>
                                <div class="row">
                                   <label label for="inputAddress" class="col-sm-2 col-form-label">地址：</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="text" class="form-control" id="inputAddress" placeholder="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX">
                                   </div>
                                 </div>

                                 <div class="col-md-12 col  member_btn hv-center">
                                    <button class="gray-layered btnOver" type="submit">確認送出</button>
                                 </div>

                                </div>
                                
                              
                            </form>

                          </div>
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">
                           <form class="px-md-2 check_in">
                               <div class="login_line py-2">
                              <div class="row">
                                    <label class="col-sm-3 col-form-label">婚姻狀態：</label>
                                     <div class="col-sm-9 form-inline">
                                       <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">已婚</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">未婚</label>
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                    <label class="col-sm-3 col-form-label">子女：</label>
                                     <div class="col-sm-9 form-inline">
                                       <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">無</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">有</label>
                                    　 <input type="text" class="form-control" placeholder="">
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">職業：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">電腦/網際網路</option>
                                        <option value="02">金融/保險/傳銷</option>
                                        <option value="03">房地產</option>
                                        <option value="04">醫療</option>
                                        <option value="05">旅遊/交通/運輸</option>
                                        <option value="06">建築/營造</option>
                                        <option value="07">製造/供應商</option>
                                        <option value="08">娛樂/出版</option>
                                        <option value="09">貿易代理</option>
                                        <option value="10">流通/百貨零售/餐飲</option>
                                        <option value="11">廣告/傳播/公共關係</option>
                                        <option value="12">軍公教/政府機關</option>
                                        <option value="13">政治/宗教/公益法律相關行業</option>
                                        <option value="14">教育/研究</option>
                                        <option value="15">藝術人文</option>
                                        <option value="16">農漁牧</option>
                                        <option value="17">學生</option>
                                        <option value="18">家管</option>
                                        <option value="19">待業中</option>
                                        <option value="20">其他</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">職位：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">企業負責人</option>
                                        <option value="02">主管</option>
                                        <option value="03">職員</option>
                                        <option value="04">學生</option>
                                        <option value="99">其他</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">每月收入：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">$0-$15,000</option>
                                        <option value="02">$15,000-$30,000</option>
                                        <option value="03">$30,000-$45,000</option>
                                        <option value="04">$45,000-$60,000</option>
                                        <option value="05">$60,000-$75,000</option>
                                        <option value="06">$75,000-$90,000</option>
                                        <option value="07">$90,000-$100,000</option>
                                        <option value="08">$100,000以上</option>
                                   </select>
                                     </div>
                                   </div>

                               <div class="row">
                                     <label class="col-sm-3 col-form-label">最高學歷：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">國小/國中</option>
                                        <option value="02">高中(職)</option>
                                        <option value="03">大專/大學</option>
                                        <option value="04">研究所(含)以上</option>
                                   </select>
                                     </div>
                                   </div>


                                <div class="row">
                                    <label class="col-sm-3 col-form-label">興趣：</label>
                                     <div class="col-sm-9 form-inline">
                                      <ul>
                                        <li><input type="checkbox" name="" value="">科學科技</li>
                                        <li><input type="checkbox" name="" value="">電腦通訊</li>
                                        <li><input type="checkbox" name="" value="">網路活動</li>
                                        <li><input type="checkbox" name="" value="">金融投資</li>
                                        <li><input type="checkbox" name="" value="">政治活動</li>
                                        <li><input type="checkbox" name="" value="">圖書閱讀</li>
                                        <li><input type="checkbox" name="" value="">藝術表演</li>
                                        <li><input type="checkbox" name="" value="">人文歷史</li>
                                        <li><input type="checkbox" name="" value="">視聽娛樂</li>
                                        <li><input type="checkbox" name="" value="">電視廣播</li>
                                        <li><input type="checkbox" name="" value="">運動活動</li>
                                        <li><input type="checkbox" name="" value="">戶外休閒</li>
                                        <li><input type="checkbox" name="" value="">教育學習</li>
                                        <li><input type="checkbox" name="" value="">生活資訊</li>
                                        <li><input type="checkbox" name="" value="">醫療保健</li>
                                      </ul>
                                     </div>
                                   </div>
                            
                               <div class="row">
                                     <label class="col-sm-3 col-form-label">上傳個人圖檔：</label>
                                     <div class="col-sm-9 py-2">
                                      <button type="button" class="btn gray-layered btnOver"><a href="#">上傳檔案</a></button>
                                      <span>未選...案</span>
                                      <img src="../img/component/user.png">
                                      <input type="checkbox" name="" value="">刪除
                                     </div>
                                   </div>
                      
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">附加個性簽名：</label>
                                     <div class="col-sm-9 py-2">
                                       <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">是</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">否</label>
                                       </div>
                                       <textarea class="form-control my-2" id="exampleFormControlTextarea1" rows="5"></textarea>
                                       <button type="button" class="btn gray-layered btnOver"><a href="#">選擇檔案</a></button>
                                       <span>未選...案</span>
                                     </div>
                                   </div>
                       
                               </div>
                           </form> 
                          </div>
                          <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">
                            <form class="check_in">
　　　　　　　　　　　　　　　   <div class="login_line py-2"> 
                             <div class="row">
                                   <label class="col-sm-3 col-form-label">*請輸入舊密碼：</label>
                                   <div class="col-sm-9 form-inline">
                                     <input type="password" class="form-control" id="inputPassword4" placeholder="">
                                   </div>
                                 </div>

                             <div class="row">
                                   <label class="col-sm-3 col-form-label">*請輸入新密碼：</label>
                                   <div class="col-sm-9 form-inline">
                                     <input type="password" class="form-control" id="inputPassword4" placeholder="">
                                   </div>
                                 </div>  
                              
                              <div class="row">
                                   <label class="col-sm-3 col-form-label">*確認新密碼：</label>
                                   <div class="col-sm-9 form-inline">
                                     <input type="password" class="form-control" id="inputPassword4" placeholder="">
                                   </div>
                                 </div>  
                              
                             </div>
                           </form>
                          </div>
                    
                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
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