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

                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">我的信用卡</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                              <div class="member_info">
                                 
                                 <div class="user_more">
                                  <button type="button" class="btn gray-layered btnOver"><a data-fancybox href="#add_card">新增信用卡</a></button>
                                 </div>


                                 <!-- fancybox -->
                                 
                                 <!-- 新增信用卡 -->
                                 <div id="add_card">
                                   <div class="mem_logo">
                                    <img src="../img/component/logo_ph.png" alt="">
                                   </div>
                                   <h1>新增信用卡設定</h1>
                                   <form class="px-md-2 check_in">
                                      <div class="login_line">
                              

                             

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">＊發卡單位</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option value="11">上海銀行</option>
                                        <option value="70">元大銀行</option>
                                        <option value="79">中國信託</option>
                                        <option value="77">日盛銀行</option>
                                        <option value="72">玉山銀行</option>
                                        <option value="22">台中銀行</option>
                                        <option value="12">台北富邦</option>
                                        <option value="75">台新銀行</option>
                                        <option value="71">永豐銀行</option>
                                        <option value="5">土地銀行</option>
                                        <option value="86">台灣永旺</option>
                                        <option value="83">美國運通</option>
                                        <option value="92">台灣樂天</option>
                                        <option value="6">合作金庫</option>
                                        <option value="78">安泰銀行</option>
                                        <option value="15">兆豐商銀</option>
                                        <option value="23">京城銀行</option>
                                        <option value="16">花旗銀行</option>
                                        <option value="14">高雄銀行</option>
                                        <option value="7">第一銀行</option>
                                        <option value="13">國泰世華</option>
                                        <option value="21">渣打銀行</option>
                                        <option value="8">華南銀行</option>
                                        <option value="32">陽信銀行</option>
                                        <option value="28">華泰銀行</option>
                                        <option value="73">凱基銀行</option>
                                        <option value="74">星展銀行</option>
                                        <option value="25">滙豐銀行</option>
                                        <option value="9">彰化銀行</option>
                                        <option value="69">遠東商銀</option>
                                        <option value="19">臺灣企銀</option>
                                        <option value="29">新光銀行</option>
                                        <option value="4">臺灣銀行</option>
                                        <option value="67">聯邦銀行</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*信用卡</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇信用卡</option>
                                        <option value="01">請選擇信用卡</option>
                                        
                                   </select>
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">結帳日</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       每月<input type="text" class="form-control" placeholder="">日
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*繳款截止日</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       每月<input type="text" class="form-control" placeholder="">日
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*提醒設定</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       繳款截止日前<input type="text" class="form-control" placeholder="">日(設定為0系統將不提醒)
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">年費門檻</label>
                                     <div class="col-sm-9 py-md-2">
                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="正卡1,800元，附卡900元，每卡當年度消費達150,000元以上或申辦電子帳單，即可享次年免年費。"></textarea>
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">信用卡預覽</label>
                                     <div class="col-sm-9 py-md-2 form-inline">
                                      <img src="../img/component/card1.png">
                                     </div>
                                   </div>

                                 <div class="col-md-12 col  member_btn hv-center">
                                   <button class="gray-layered btnOver" type="submit">確認新增</button>
                                   <button class="gray-layered btnOver" type="submit">放棄</button>
                                </div>
                       
                               </div>
                           </form> 
                                 </div>

                                 <!-- fancybox END -->
                                 
                                 <div class="mycard_info">
                                 <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">結帳日</th>
                                       <th scope="col">繳款日</th>
                                       <th scope="col">修改設定</th>
                                       <th scope="col">帳單設定</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>每月X日</td>
                                       <td>每月X日</td>
                                       <td><a data-fancybox href="#repair_card"><img src="../img/component/repair.png"></a></td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>每月X日</td>
                                       <td>每月X日</td>
                                       <td><a data-fancybox href="#repair_card"><img src="../img/component/repair.png"></a></td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>每月X日</td>
                                       <td>每月X日</td>
                                       <td><a data-fancybox href="#repair_card"><img src="../img/component/repair.png"></a></td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>每月X日</td>
                                       <td>每月X日</td>
                                       <td><a data-fancybox href="#repair_card"><img src="../img/component/repair.png"></a></td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡</td>
                                       <td>每月X日</td>
                                       <td>每月X日</td>
                                       <td><a data-fancybox href="#repair_card"><img src="../img/component/repair.png"></a></td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                     </tr>
                                     <tr>
                                       <th scope="row">XX銀行</th>
                                       <td>XXXX卡(請修正)</td>
                                       <td>每月X日</td>
                                       <td>每月X日</td>
                                       <td><a data-fancybox href="#repair_card"><img src="../img/component/repair.png"></a></td>
                                       <td><a data-fancybox href="#add_bill"><img src="../img/component/file.png"></a></td>
                                     </tr>
                                   </tbody>
                                 </table>
                                 </div>
                                 <div class="row py-2">
                                     <label class="col-sm-3 col-form-label">已剪卡的信用卡</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option value="11">上海銀行</option>
                                        <option value="70">元大銀行</option>
                                        <option value="79">中國信託</option>
                                        <option value="77">日盛銀行</option>
                                        <option value="72">玉山銀行</option>
                                        <option value="22">台中銀行</option>
                                        <option value="12">台北富邦</option>
                                        <option value="75">台新銀行</option>
                                        <option value="71">永豐銀行</option>
                                        <option value="5">土地銀行</option>
                                        <option value="86">台灣永旺</option>
                                        <option value="83">美國運通</option>
                                        <option value="92">台灣樂天</option>
                                        <option value="6">合作金庫</option>
                                        <option value="78">安泰銀行</option>
                                        <option value="15">兆豐商銀</option>
                                        <option value="23">京城銀行</option>
                                        <option value="16">花旗銀行</option>
                                        <option value="14">高雄銀行</option>
                                        <option value="7">第一銀行</option>
                                        <option value="13">國泰世華</option>
                                        <option value="21">渣打銀行</option>
                                        <option value="8">華南銀行</option>
                                        <option value="32">陽信銀行</option>
                                        <option value="28">華泰銀行</option>
                                        <option value="73">凱基銀行</option>
                                        <option value="74">星展銀行</option>
                                        <option value="25">滙豐銀行</option>
                                        <option value="9">彰化銀行</option>
                                        <option value="69">遠東商銀</option>
                                        <option value="19">臺灣企銀</option>
                                        <option value="29">新光銀行</option>
                                        <option value="4">臺灣銀行</option>
                                        <option value="67">聯邦銀行</option>
                                   </select>
                                     </div>
                                   </div>


                                 <!-- fancybox -->

                                 <!-- 修改設定(信用卡) -->
                                 <div id="repair_card">
                                  <div class="mem_logo">
                                    <img src="../img/component/logo_ph.png" alt="">
                                   </div>
                                   <h1>修改信用卡設定</h1>
                                   <form class="px-md-2 check_in">
                                     <div class="login_line">

                              <div class="row">
                                    <label class="col-sm-3 col-form-label">＊發卡單位</label>
                                     <div class="col-sm-9 form-inline">
                                        <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">使用中</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">已剪卡</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">刪除</label>
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">＊發卡單位</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option value="11">上海銀行</option>
                                        <option value="70">元大銀行</option>
                                        <option value="79">中國信託</option>
                                        <option value="77">日盛銀行</option>
                                        <option value="72">玉山銀行</option>
                                        <option value="22">台中銀行</option>
                                        <option value="12">台北富邦</option>
                                        <option value="75">台新銀行</option>
                                        <option value="71">永豐銀行</option>
                                        <option value="5">土地銀行</option>
                                        <option value="86">台灣永旺</option>
                                        <option value="83">美國運通</option>
                                        <option value="92">台灣樂天</option>
                                        <option value="6">合作金庫</option>
                                        <option value="78">安泰銀行</option>
                                        <option value="15">兆豐商銀</option>
                                        <option value="23">京城銀行</option>
                                        <option value="16">花旗銀行</option>
                                        <option value="14">高雄銀行</option>
                                        <option value="7">第一銀行</option>
                                        <option value="13">國泰世華</option>
                                        <option value="21">渣打銀行</option>
                                        <option value="8">華南銀行</option>
                                        <option value="32">陽信銀行</option>
                                        <option value="28">華泰銀行</option>
                                        <option value="73">凱基銀行</option>
                                        <option value="74">星展銀行</option>
                                        <option value="25">滙豐銀行</option>
                                        <option value="9">彰化銀行</option>
                                        <option value="69">遠東商銀</option>
                                        <option value="19">臺灣企銀</option>
                                        <option value="29">新光銀行</option>
                                        <option value="4">臺灣銀行</option>
                                        <option value="67">聯邦銀行</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*信用卡</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇信用卡</option>
                                        <option value="01">請選擇信用卡</option>
                                        
                                   </select>
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">結帳日</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       每月<input type="text" class="form-control" placeholder="">日
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*繳款截止日</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       每月<input type="text" class="form-control" placeholder="">日
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">*提醒設定</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       繳款截止日前<input type="text" class="form-control" placeholder="">日(設定為0系統將不提醒)
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">年費門檻</label>
                                     <div class="col-sm-9 py-md-2">
                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="正卡1,800元，附卡900元，每卡當年度消費達150,000元以上或申辦電子帳單，即可享次年免年費。"></textarea>
                                     </div>
                                   </div>
                              <div class="row">
                                     <label class="col-sm-3 col-form-label">信用卡預覽</label>
                                     <div class="col-sm-9 py-md-2 form-inline">
                                      <img src="../img/component/card1.png">
                                     </div>
                                   </div>
                               <div class="col-md-12 col  member_btn hv-center">
                                   <button class="gray-layered btnOver" type="submit">確認修改</button>
                                   <button class="gray-layered btnOver" type="submit">放棄</button>
                                </div>
                       
                               </div>
                           </form> 
                                   
                                 </div>
                                 <!-- 帳單設定(信用卡) -->
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

                                 <!-- fancybox END -->
                             <!--我的信用卡－新聞-->
                             <div class="col-md-12 col0">

                                 <div class="cardshap exception">
                                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                   <li class="nav-item news_tab">
                                     <a class="nav-link active  pl-30 py-2" id="box-tab"  href="javascript:;" tab-target="#box" aria-selected="true">
                                     我的信用卡－新聞</a>
                                   </li>
                                 </ul>
                             <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                <div class="row no-gutters w-100">
                              <div class="col-md-4 cards-3 text-center col-6">
                                <a href="#">
                                 <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                     
                                 </div>
                                 <span>遊日血拚大回饋，信用卡大調查</span>
                                </a>
                              </div>
                              <div class="col-md-4 cards-3 text-center col-6">
                                <a href="#">
                                  <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                     
                                  </div>
                                  <span>遊日血拚大回饋，信用卡大調查</span>
                                </a>
                              </div>
                               <div class="col-md-4 cards-3 text-center col-6">
                                <a href="#">
                                  <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                      
                                  </div>
                                  <span>遊日血拚大回饋，信用卡大調查</span>
                                </a>
                              </div>
                            </div>
                                    
                                   </div>
                                 </div>
                               </div>
                             </div>
                             <!--我的信用卡－新聞end -->
                              <!--我的信用卡－卡情報-->
                              <div class="col-md-12 col0">

                                  <div class="cardshap exception">
                                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item news_tab">
                                      <a class="nav-link active  pl-30 py-2" id="box-tab"  href="javascript:;" tab-target="#box" aria-selected="true">
                                      我的信用卡－卡情報</a>
                                    </li>
                                  </ul>
                              <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                 <div class="row no-gutters w-100">
                               <div class="col-md-4 cards-3 text-center col-6">
                                 <a href="#">
                                  <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                      
                                  </div>
                                  <span>遊日血拚大回饋，信用卡大調查</span>
                                 </a>
                               </div>
                               <div class="col-md-4 cards-3 text-center col-6">
                                 <a href="#">
                                   <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                      
                                   </div>
                                   <span>遊日血拚大回饋，信用卡大調查</span>
                                 </a>
                               </div>
                                <div class="col-md-4 cards-3 text-center col-6">
                                 <a href="#">
                                   <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                       
                                   </div>
                                   <span>遊日血拚大回饋，信用卡大調查</span>
                                 </a>
                               </div>
                             </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--我的信用卡－卡情報end -->
                               <!--我的信用卡－優行動Pay-->
                               <div class="col-md-12 col0">

                                   <div class="cardshap exception">
                                   <ul class="nav nav-tabs" id="myTab" role="tablist">
                                     <li class="nav-item news_tab">
                                       <a class="nav-link active  pl-30 py-2" id="box-tab"  href="javascript:;" tab-target="#box" aria-selected="true">
                                       我的信用卡－優行動Pay</a>
                                     </li>
                                   </ul>
                               <div class="tab-content" id="myTabContent">
                               <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                  <div class="row no-gutters w-100">
                                <div class="col-md-4 cards-3 text-center col-6">
                                  <a href="#">
                                   <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                       
                                   </div>
                                   <span>遊日血拚大回饋，信用卡大調查</span>
                                  </a>
                                </div>
                                <div class="col-md-4 cards-3 text-center col-6">
                                  <a href="#">
                                    <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                       
                                    </div>
                                    <span>遊日血拚大回饋，信用卡大調查</span>
                                  </a>
                                </div>
                                 <div class="col-md-4 cards-3 text-center col-6">
                                  <a href="#">
                                    <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                        
                                    </div>
                                    <span>遊日血拚大回饋，信用卡大調查</span>
                                  </a>
                                </div>
                              </div>
                                      
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               <!--我的信用卡－優行動Payend -->
                                <!--我的信用卡－優票證-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab">
                                        <a class="nav-link active  pl-30 py-2" id="box-tab"  href="javascript:;" tab-target="#box" aria-selected="true">
                                        我的信用卡－優票證</a>
                                      </li>
                                    </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                   <div class="row no-gutters w-100">
                                 <div class="col-md-4 cards-3 text-center col-6">
                                   <a href="#">
                                    <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                        
                                    </div>
                                    <span>遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                 </div>
                                 <div class="col-md-4 cards-3 text-center col-6">
                                   <a href="#">
                                     <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                        
                                     </div>
                                     <span>遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                 </div>
                                  <div class="col-md-4 cards-3 text-center col-6">
                                   <a href="#">
                                     <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                         
                                     </div>
                                     <span>遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                 </div>
                               </div>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--我的信用卡－優票證end -->
                                 <!--我的信用卡－優集點-->
                                 <div class="col-md-12 col0">

                                     <div class="cardshap exception">
                                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                                       <li class="nav-item news_tab">
                                         <a class="nav-link active  pl-30 py-2" id="box-tab"  href="javascript:;" tab-target="#box" aria-selected="true">
                                         我的信用卡－優集點</a>
                                       </li>
                                     </ul>
                                 <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                    <div class="row no-gutters w-100">
                                  <div class="col-md-4 cards-3 text-center col-6">
                                    <a href="#">
                                     <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                         
                                     </div>
                                     <span>遊日血拚大回饋，信用卡大調查</span>
                                    </a>
                                  </div>
                                  <div class="col-md-4 cards-3 text-center col-6">
                                    <a href="#">
                                      <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                         
                                      </div>
                                      <span>遊日血拚大回饋，信用卡大調查</span>
                                    </a>
                                  </div>
                                   <div class="col-md-4 cards-3 text-center col-6">
                                    <a href="#">
                                      <div class="img_div" style="background-image: url(../img/component/photo2.jpg);">
                                          
                                      </div>
                                      <span>遊日血拚大回饋，信用卡大調查</span>
                                    </a>
                                  </div>
                                </div>
                                        
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <!--我的信用卡－優集點end -->

                               
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