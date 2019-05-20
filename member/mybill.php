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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心</a>/ <a href="javascript:;">我的帳單</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">我的帳單</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                          
                              <div class="px-md-2 member_info">
                                 
                                 
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">繳款截止日</th>
                                       <th scope="col">帳單登錄</th>
                                       <th scope="col">帳單列表</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>XXX</td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                       <td><a href="#">明細</a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                       <td><a href="#">明細</a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                       <td><a href="#">明細</a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                       <td><a href="#">明細</a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                       <td><a href="#">明細</a></td>
                                     </tr>
                                     <tr class="text-right">
                                       <td colspan="7">未繳款金額：ＸＸＸ元</td>
                                     </tr>
                                   </tbody>
                                 </table>

                                 <div class="form-row member_more">
                                    <label class="col-sm-2 col-form-label form-group">*繳款期間</label>
                                     <div class="col-sm-8">
                                       <div class="form-check form-check-inline">
                                        <input type="text" class="form-control" placeholder="">~
                                        <input type="text" class="form-control" placeholder="">
                                        <button type="button" class="btn gray-layered btnOver"><a href="#">更多</a></button>
                                       </div>
                                       
                                     </div>
                                   </div>
                                 
                                 
                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <b>未繳款帳單</b>
                                   </div>
                                 </div>
                                 
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">帳單年月</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">繳款截止日</th>
                                       <th scope="col">修改帳單</th>
                                       
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>20XX/XX</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>20XX/XX</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>20XX/XX</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>20XX/XX</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>20XX/XX</td>
                                       <td>XXX</td>
                                       <td>20XX/XX/XX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr class="text-right">
                                       <td colspan="7">未繳款金額：ＸＸＸ元</td>
                                     </tr>
                                   </tbody>
                                 </table>

                                
                                 
                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <b>已繳款帳單</b>
                                   </div>
                                 </div>
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">已繳金額</th>
                                       <th scope="col">繳款日</th>
                                       <th scope="col">繳款方式</th>
                                       <th scope="col">修改帳單</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>XXX</td>
                                       <td>每月X日</td>
                                       <td>XXX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>XXX</td>
                                       <td>每月X日</td>
                                       <td>XXX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>XXX</td>
                                       <td>XXX</td>
                                       <td>每月X日</td>
                                       <td>XXX</td>
                                       <td><a data-fancybox href="#bill_update"><img src="../img/component/bill.png"></a></td>
                                     </tr>
                                     <tr class="text-right">
                                       <td colspan="7">已繳款金額：ＸＸＸ元</td>
                                     </tr>
                                   </tbody>
                                 </table>
                                 

                                 
                              </div>
                            
                           
                          </div>
                          
                        </div>
                      </div>
                    
                  </div>




                    
                <!-- fancybox -->

                <!-- 帳單登錄(帳單) -->
                 <div id="add_bill">
                                  <div class="mem_logo">
                                    <img src="../img/component/logo_ph.png" alt="">
                                   </div>
                                   <h1>我的帳單登入</h1>
                                   <form class="px-md-2 check_in">
                                     <div class="login_line">

                               <div class="row">
                                     <label class="col-sm-3 col-form-label">信用卡</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇信用卡</option>
                                        <option value="01">請選擇信用卡</option>
                                        
                                   </select>
                                     </div>
                                   </div>
                               <div class="row">
                                     <label class="col-sm-3 col-form-label">帳單月份</label>
                                     <div class="col-sm-9 date_w form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>20XX</option>
                                       </select>
                                       年
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>20XX</option>
                                       </select>
                                       月
                                     </div>
                                   </div>
                              

                              
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*本月應繳金額</label>
                                     <div class="col-sm-9 date_w form-inline">
                                       每月<input type="text" class="form-control" placeholder="">元
                                     </div>
                                   </div>
                              <div class="row">
                                    <label class="col-sm-3 col-form-label">繳款狀態</label>
                                     <div class="col-sm-9 form-inline">
                                        <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">未繳</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">已繳</label>
                                       </div>
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*實際繳款日</label>
                                     <div class="col-sm-9 form-inline">
                                       <input type="text" class="form-control" placeholder="">
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*繳款方式</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                       </select>
                                     </div>
                                   </div>
                              <div class="col-md-12 col  member_btn hv-center">
                                   <button class="gray-layered btnOver" type="submit">確定</button>
                                   <button class="gray-layered btnOver" type="submit">取消</button>
                                   <button class="gray-layered btnOver" type="submit">刪除</button>
                                </div>
                               </div>
                           </form> 
                           <h5>帳單消費明細(可自行設定帳單消費項目內容，也可省略不填寫)</h5>
                           <form class="px-md-2 check_in">
                               <div class="login_line">

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*本月應繳金額</label>
                                     <div class="col-sm-9 py-md-2">
                                      <div class="row py-md-2">
                                        <div class="col-md-6 date_w form-inline">購物<input type="text" class="form-control" placeholder="">元</div>
                                        <div class="col-md-6 date_w form-inline">飲食<input type="text" class="form-control" placeholder="">元</div>
                                      </div>
                                      <div class="row py-md-2">
                                        <div class="col-md-6 date_w form-inline">娛樂<input type="text" class="form-control" placeholder="">元</div>
                                        <div class="col-md-6 date_w form-inline">旅遊<input type="text" class="form-control" placeholder="">元</div>
                                      </div>
                                      <div class="row py-md-2">
                                        <div class="col-md-6 date_w form-inline">交通<input type="text" class="form-control" placeholder="">元</div>
                                        <div class="col-md-6 date_w form-inline">水電<input type="text" class="form-control" placeholder="">元</div>
                                      </div>
                                      <div class="row py-md-2">
                                        <div class="col-md-6 date_w form-inline">保險<input type="text" class="form-control" placeholder="">元</div>
                                        <div class="col-md-6 date_w form-inline">投資<input type="text" class="form-control" placeholder="">元</div>
                                      </div>
                                      <div class="row py-md-2">
                                        <div class="col-md-6 date_w form-inline">其他<input type="text" class="form-control" placeholder="">元</div>
                                        <div class="col-md-6 date_w form-inline">本期循環息<input type="text" class="form-control" placeholder="">元</div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 form-inline member_btn hv-center">
                                          <input type="text" class="form-control" placeholder="">
                                          <button class="gray-layered btnOver" type="submit">新增消費項目</button>
                                          <span>本期帳單消費總額：　　　　    　元</span>
                                        </div>
                                      </div>  
                                     </div>
                                   </div>

                             
                              
                              <div class="col-md-12 col  member_btn hv-center">
                                   <p>注意事項：<br>
                                    1.「本期帳單金額」：為實際應繳款的總費用。<br>
                                    2.帳單消費明細：可自行選擇是否要輸入明細內容，或者不填寫亦可。<br>
                                    3.以上消費紀錄，本網僅做統計之用，不涉及個人資料，亦不保證永久保存。若有需要請自行保存。</p>
                              </div>
                               
                              <div class="col-md-12 col  member_btn hv-center">
                                   <button class="gray-layered btnOver" type="submit">確定</button>
                                   <button class="gray-layered btnOver" type="submit">取消</button>
                                   <button class="gray-layered btnOver" type="submit">刪除</button>
                                </div>
                               </div>
                           </form> 

                                  
                                 </div>
                <!-- 修改帳單(帳單) -->
                <div id="bill_update">
                         <div class="mem_logo">
                           <img src="../img/component/logo_ph.png" alt="">
                          </div>
                          <h1>修改帳單</h1>
                          <form class="px-md-2 check_in">
                            <div class="login_line">

                      <div class="row">
                            <label class="col-sm-3 col-form-label">信用卡</label>
                            <div class="col-sm-9 form-inline">
                              <select select class="form-control" id="exampleFormControlSelect1">
                               <option selected>請選擇信用卡</option>
                               <option value="01">請選擇信用卡</option>
                               
                          </select>
                            </div>
                          </div>
                      <div class="row">
                            <label class="col-sm-3 col-form-label">帳單月份</label>
                            <div class="col-sm-9 date_w form-inline">
                              <select select class="form-control" id="exampleFormControlSelect1">
                               <option selected>20XX</option>
                              </select>
                              年
                              <select select class="form-control" id="exampleFormControlSelect1">
                               <option selected>20XX</option>
                              </select>
                              月
                            </div>
                          </div>
                     

                     
                     <div class="row">
                            <label class="col-sm-3 col-form-label">*本月應繳金額</label>
                            <div class="col-sm-9 date_w form-inline">
                              每月<input type="text" class="form-control" placeholder="">元
                            </div>
                          </div>
                     <div class="row">
                           <label class="col-sm-3 col-form-label">繳款狀態</label>
                            <div class="col-sm-9 form-inline">
                               <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">未繳</label>
                              </div>
                              <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">已繳</label>
                              </div>
                            </div>
                          </div>
                     <div class="row">
                            <label class="col-sm-3 col-form-label">*實際繳款日</label>
                            <div class="col-sm-9 form-inline">
                              <input type="text" class="form-control" placeholder="">
                            </div>
                          </div>
                     <div class="row">
                            <label class="col-sm-3 col-form-label">*繳款方式</label>
                            <div class="col-sm-9 form-inline">
                              <select select class="form-control" id="exampleFormControlSelect1">
                               <option selected>請選擇</option>
                              </select>
                            </div>
                          </div>
                     <div class="col-md-12 col  member_btn hv-center">
                          <button class="gray-layered btnOver" type="submit">確定</button>
                          <button class="gray-layered btnOver" type="submit">取消</button>
                          <button class="gray-layered btnOver" type="submit">刪除</button>
                       </div>
                      </div>
                  </form> 
                  <h5>帳單消費明細(可自行設定帳單消費項目內容，也可省略不填寫)</h5>
                  <form class="px-md-2 check_in">
                      <div class="login_line">

                     <div class="row">
                            <label class="col-sm-3 col-form-label">*本月應繳金額</label>
                            <div class="col-sm-9 py-md-2">
                             <div class="row py-md-2">
                               <div class="col-md-6 date_w form-inline">購物<input type="text" class="form-control" placeholder="">元</div>
                               <div class="col-md-6 date_w form-inline">飲食<input type="text" class="form-control" placeholder="">元</div>
                             </div>
                             <div class="row py-md-2">
                               <div class="col-md-6 date_w form-inline">娛樂<input type="text" class="form-control" placeholder="">元</div>
                               <div class="col-md-6 date_w form-inline">旅遊<input type="text" class="form-control" placeholder="">元</div>
                             </div>
                             <div class="row py-md-2">
                               <div class="col-md-6 date_w form-inline">交通<input type="text" class="form-control" placeholder="">元</div>
                               <div class="col-md-6 date_w form-inline">水電<input type="text" class="form-control" placeholder="">元</div>
                             </div>
                             <div class="row py-md-2">
                               <div class="col-md-6 date_w form-inline">保險<input type="text" class="form-control" placeholder="">元</div>
                               <div class="col-md-6 date_w form-inline">投資<input type="text" class="form-control" placeholder="">元</div>
                             </div>
                             <div class="row py-md-2">
                               <div class="col-md-6 date_w form-inline">其他<input type="text" class="form-control" placeholder="">元</div>
                               <div class="col-md-6 date_w form-inline">本期循環息<input type="text" class="form-control" placeholder="">元</div>
                             </div>
                             <div class="row">
                               <div class="col-md-12 form-inline member_btn hv-center">
                                 <input type="text" class="form-control" placeholder="">
                                 <button class="gray-layered btnOver" type="submit">新增消費項目</button>
                                 <span>本期帳單消費總額：　　　　    　元</span>
                               </div>
                             </div>  
                            </div>
                          </div>

                    
                     
                     <div class="col-md-12 col  member_btn hv-center">
                          <p>注意事項：<br>
                           1.「本期帳單金額」：為實際應繳款的總費用。<br>
                           2.帳單消費明細：可自行選擇是否要輸入明細內容，或者不填寫亦可。<br>
                           3.以上消費紀錄，本網僅做統計之用，不涉及個人資料，亦不保證永久保存。若有需要請自行保存。</p>
                     </div>
                      
                     <div class="col-md-12 col  member_btn hv-center">
                          <button class="gray-layered btnOver" type="submit">確定</button>
                          <button class="gray-layered btnOver" type="submit">取消</button>
                          <button class="gray-layered btnOver" type="submit">刪除</button>
                       </div>
                      </div>
                  </form> 

                  
                </div>

                <!-- fancybox END -->

                    
                  
                    
                    

                   

                    

                   




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