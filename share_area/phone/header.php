<!-- header -->
    <header>
      <div class="row no-gutters py-1 px-3" style="background: #fff;">
       <div class="col-4">
        <a href="/index.php"><img class="w-100" src="/img/component/logo_ph.png" alt=""></a>
       </div> 
       <div class="col-8 tool_div">
         <div class="hv-around w-h-100">
           <a class="img_div" href="javascript:;" data-fancybox data-src="#ccard_search" style="background-image: url(/img/component/icon/icon_m1.png);"></a>
           <a class="img_div" target="_blank" href="https://www.facebook.com/cardu.tw/" style="background-image: url(/img/component/icon/icon_m2.png);"></a>
           <a class="img_div" href="javascript:;" data-fancybox data-src="#member_div" style="background-image: url(/img/component/icon/icon_m3.png);"></a>
           <a class="img_div search_a" href="javascript:;" style="background-image: url(/img/component/icon/icon_m4.png);"></a>
           <button id="menu" class="hamburger hamburger--collapse" type="button">
             <span class="hamburger-box">
               <span class="hamburger-inner"></span>
             </span>
           </button>
         </div>
       </div>
     </div>

     <div id="menu_list" class="w-100">
      <div class="close_div">
        <a href="/index.php"><i class="fa fa-home"></i> 首頁</a>
        <a class="close_btn" href="#" >Ｘ</a>
      </div>
       <div class="accordion" id="accordionExample">
         <div class="card">
           <div class="card-header" id="headingOne">
             <h5 class="mb-0">
               <a href="/news/news.php">新聞</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>

           <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
             <div class="card-body">
               <div class="row no-gutters">

                <?php 
                  $row_newsType=$pdo->select("SELECT nt_name, pk, OrderBy
                                              FROM news_type
                                              WHERE mt_id='site2018111910445721' AND nt_sp=1 AND nt_sp_idx=1 AND OnLineOrNot=1 
                                              AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>= :nt_sp_end_date

                                              UNION
                                                                 
                                              SELECT nt_name, pk, OrderBy
                                              FROM news_type 
                                              WHERE mt_id='site2018111910445721' AND nt_sp=0 AND OnLineOrNot=1 
                                              ORDER BY OrderBy ASC", ['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
                  foreach ($row_newsType as $newsType) {
                    
                    echo '<div class="col-6"><a href="/news/list.php?nt_pk='.$newsType['pk'].'">'.$newsType['nt_name'].'</a></div>';
                  }
                ?>
                
               </div>
             </div>
           </div>
         </div>
         <div class="card">
           <div class="card-header" id="card2">
             <h5 class="mb-0">
               <a href="/rank/rank.php">卡排行</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                  <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>

           <div id="collapse2" class="collapse " aria-labelledby="card2" data-parent="#accordionExample">
             <div class="card-body">

               <h4>卡優排行</h4>
               <div class="row no-gutters">
                <?php 
                 $row_rankType=$pdo->select("SELECT old_id, cc_so_cname FROM credit_cardrank_type WHERE cc_so_status=1 ORDER BY cc_so_order ASC");
                 foreach ($row_rankType as $rankType) {
                   echo '<div class="col-6"><a href="/rank/cardrank.php?'.$rankType['old_id'].'">'.$rankType['cc_so_cname'].'</a></div>';
                 }
                ?>
                 
               </div>

               <h4>人氣排行</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="/rank/newcard.php">新卡人氣排行</a></div>
                 <div class="col-6"><a href="/rank/apply.php">辦卡人氣排行</a></div>
                 <div class="col-6"><a href="/rank/click.php">點閱人氣排行</a></div>
               </div>

               <h4>卡比較</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="/rank/compare01.php">新手快搜</a></div>
                 <div class="col-6"><a href="/rank/compare02.php">卡片比一比</a></div>
                 <div class="col-6"><a href="/rank/compare03.php">權益比一比</a></div>
               </div>
             </div>
           </div>
         </div>
         <div class="card">
           <div class="card-header" id="card3">
             <h5 class="mb-0">
               <a href="/card/card.php">卡情報</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>

           <div id="collapse3" class="collapse " aria-labelledby="card3" data-parent="#accordionExample">
             <div class="card-body">
              <h4>卡資訊</h4>
              <div class="row no-gutters">
                <div class="col-6"><a href="/card/new_card_list.php">新卡訊</a></div>
                <div class="col-6"><a href="/card/card_browse.php">卡總覽</a></div>
                <div class="col-6"><a href="/card/bank_list.php">銀行總覽</a></div>
                <div class="col-6"><a href="/card/interests_list.php">權益變更</a></div>
              </div>
              <?php 
                //-- 套用 share_area/fun.php   MENU fun ph --
                menu_newsType_ph('at2019021114154632', 'message');
              ?>

              <h4>線上辦卡</h4>
              <div class="row no-gutters">
                <div class="col-6"><a href="/card/card_assign.php">線上辦卡</a></div>
              </div>
               
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card4">
             <h5 class="mb-0">
               <a href="/mpay/mpay.php">優行動Pay</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                  <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse4" class="collapse " aria-labelledby="card4" data-parent="#accordionExample">
             <div class="card-body">
              <h4>Pay資訊</h4>
              <div class="row no-gutters">
                <div class="col-6"><a href="/mpay/all.php">Pay總覽</a></div>
              </div>
               <?php 
                //-- 套用 share_area/fun.php   MENU fun ph --
                menu_newsType_ph('at2019011117341414', 'mpay');
              ?>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card5">
             <h5 class="mb-0">
               <a href="/eticket/eticket.php"> 優票證</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse5" class="collapse " aria-labelledby="card5" data-parent="#accordionExample">
             <div class="card-body">
              <h4>票證資訊</h4>
              <div class="row no-gutters">
                <div class="col-6"><a href="/eticket/all.php">票證總覽</a></div>
              </div>
               <?php 
                //-- 套用 share_area/fun.php   MENU fun ph --
                menu_newsType_ph('at2019011117435970', 'eticket');
              ?>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card6">
             <h5 class="mb-0">
               <a href="/epoint/epoint.php"> 優集點</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse6" class="collapse " aria-labelledby="card6" data-parent="#accordionExample">
             <div class="card-body">
               <h4>集點資訊</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="/epoint/all.php">點數平台</a></div>
                 <div class="col-6"><a href="/epoint/all2.php">集點店家</a></div>
               </div>
               <?php 
                //-- 套用 share_area/fun.php   MENU fun ph --
                menu_newsType_ph('at2019011117443626', 'epoint');
              ?>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card7">
             <h5 class="mb-0">
               <a href="/travel/index.php"> 優旅行</a>
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse7" class="collapse " aria-labelledby="card7" data-parent="#accordionExample">
             <div class="card-body">
               <div class="row no-gutters">
                 <div class="col-6"><a href="/travel/share.php">旅行分享</a></div>
                 <div class="col-6"><a href="/travel/recommend.php">行程推薦</a></div>
                 <div class="col-6"><a href="/travel/tip.php">刷卡秘笈</a></div>
                 <div class="col-6"><a href="/travel/preferential.php">優惠情報</a></div>
                 <div class="col-6"><a href="/travel/jp/index.php">日本嬉遊趣</a></div>
               </div>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card8">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                 討論區 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse8" class="collapse " aria-labelledby="card8" data-parent="#accordionExample">
             <div class="card-body">
               <div class="row no-gutters">
                 <div class="col-6"><a href="#">專題</a></div>
                 <div class="col-6"><a href="#">卡訊</a></div>
                 <div class="col-6"><a href="#">行動Pay</a></div>
                 <div class="col-6"><a href="#">財金</a></div>
               </div>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card9">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                 會員中心 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse9" class="collapse " aria-labelledby="card9" data-parent="#accordionExample">
             <div class="card-body">
               <h4>會員專區</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="/member/index.php">會員資料</a></div>
                 <div class="col-6"><a href="#">電子報</a></div>
                 <div class="col-6"><a href="/member/annouce_second.php">卡優公告</a></div>
                 <div class="col-6"><a href="/member/service.php">客服中心</a></div>
                 <div class="col-6"><a href="/member/event_second.php">卡優活動</a></div>
                 <div class="col-6"><a href="#">卡優貼紙</a></div>
               </div>
               <h4>我的卡優</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="/member/mycard.php">我的信用卡</a></div>
                 <div class="col-6"><a href="/member/mycollect.php">我的收藏</a></div>
                 <div class="col-6"><a href="/member/mybill.php">我的帳單</a></div>
                 <div class="col-6"><a href="/member/mydate.php">我的行事曆</a></div>
                 <div class="col-6"><a href="/member/myinfo.php">我的資訊</a></div>
                 <div class="col-6"><a href="/member/mypen.php">我的文章</a></div>
               </div>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card10">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                 關於我們 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse10" class="collapse " aria-labelledby="card10" data-parent="#accordionExample">
             <div class="card-body">
               <div class="row no-gutters">
                 <div class="col-6"><a href="#">專題</a></div>
                 <div class="col-6"><a href="#">卡訊</a></div>
                 <div class="col-6"><a href="#">行動Pay</a></div>
                 <div class="col-6"><a href="#">財金</a></div>
               </div>
             </div>
           </div>
         </div>

       </div>
     </div>



     <div id="menu_bar" class="swiper-container">
         <div class="swiper-wrapper">
             <div class="swiper-slide" area_name="news"><a href="/news/news.php">新聞</a></div>
             <div class="swiper-slide" area_name="rank"><a href="/rank/rank.php">卡排行</a></div>
             <div class="swiper-slide" area_name="card"><a href="/card/card.php">卡情報</a></div>
             <div class="swiper-slide" area_name="mpay"><a href="/mpay/mpay.php">優行動Pay</a></div>
             <div class="swiper-slide" area_name="eticket"><a href="/eticket/eticket.php">優票證</a></div>
             <div class="swiper-slide" area_name="epoint"><a href="/epoint/epoint.php">優集點</a></div>
             <div class="swiper-slide" area_name="travel"><a href="/travel/index.php">優旅行</a></div>
             <div class="swiper-slide" area_name=""><a href="#">討論區</a></div>
             <div class="swiper-slide" area_name="member"><a href="/member/member.php">會員中心</a></div>
             
         </div>
     </div>

     <div id="search_bar">
     	<form method="POST" action="#">
     	  <div class="form-row">
     	  	<div class=" col-9">
     	    	<input type="text" class="form-control" name="" placeholder="搜尋">
     	    </div>
            <div class=" col-2">
            	<button type="submit" class="btn search_btn">搜尋</button>
            </div>
            <div class=" col-1">
            	<button type="button" class="btn close_btn">Ｘ</button>
            </div>
     	  </div>
     	</form>
     	
     </div>



     <!-- 會員登入 -->
     <div id="member_div" >
       <div class="mem_logo">
         <img src="/img/component/logo_ph.png"  alt="">
       </div>
       <h2>卡優會員登入</h2>
       <form id="form_login" action="#" method="POST">
         <div class="form-group">
           <input type="email" class="form-control" id="mem_email"  placeholder="會員帳號">
           
         </div>
         <div class="form-group">
           <input type="password" class="form-control" id="mem_pwd"  placeholder="會員密碼">
         </div>
         <div class="form-group">
           <label><input type="checkbox" value="1"> 記住我的帳號 </label>
           <a href="/member/password.php">忘記密碼</a>
         </div>
         <div class="form-group">
           <a class="login_btn" href="#">登入</a>
           <p>還不是會員嗎?<a href="/member/sign_second.php">立即註冊</a></p>
         </div>
         <div class="form-group">
           <p class="text-center">或使用以下帳號登入</p>
           <div class="row no-gutters">
             <div class="col-6">
               <a class="other_login_btn fb_color" href="#">Facebook</a>
             </div>
             <div class="col-6">
               <a class="other_login_btn google_color" href="#">Google</a>
             </div>
           </div>
         </div>
       </form>
     </div>
     <!-- 會員登入 END -->


     <!-- 信用卡快搜/權益快搜 -->
     <div id="ccard_search">
       <div class="mem_logo mb-3">
         <img src="/img/component/logo_ph.png"  alt="">
       </div>
        <div class="cardshap blue_tab mouseHover_tab m-0">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
           <li class="nav-item">
             <a class="nav-link active pl-30" id="card-tab" tab-target="#card" href="javascript:;"  aria-selected="true">
                 <i class="icon" style="background-image: url(../img/component/icon/news/icon1.png);"></i>信用卡快搜
             </a>
           </li>
           <li class="nav-item">
             <a class="nav-link pl-30" id="right-tab" tab-target="#right" href="javascript:;"  aria-selected="false">
                 <i class="icon" style="background-image: url(../img/component/icon_down/news/icon2.png); background-size: 80%;"></i>權益快搜
             </a>
           </li>
         </ul>
         <div class="tab-content ccard_back px-2 py-4" id="myTabContent">
           <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
             <form class="row search_from">

                 <div class="col-9">
                   <select class="c_search_bk">
                       <option value="">--選擇銀行--</option>
                       <?php 
                         $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info ORDER BY bi_code ASC");
                         foreach ($row_bank as $row_bank_one) {
                           echo '<option value="'.$row_bank_one['Tb_index'].'">'.$row_bank_one['bi_shortname'].'</option>';
                         }
                       ?>
                   </select>

                   <select class="c_search_cc">
                       <option value="">--選擇信用卡--</option>
                   </select>  
                 </div>

                 <div class="col-3">
                   <div class="hv-center w-h-100">
                       <button id="c_search_btn" type="button">GO</button>
                   </div>
                 </div>
                
             </form>
           </div>
           <div class="tab-pane fade" id="right" role="tabpanel" aria-labelledby="right-tab">
             <form class="row search_from">

                <div class="col-9">
                  
                  <select class="int_search_item">
                      <option value="">選擇比較的權益項目</option>
                      <?php 
                        $row_int=$pdo->select("SELECT Tb_index, eq_name FROM card_eq_item WHERE mt_id='site2019021216245137' AND eq_type IN ('small','big') ORDER BY OrderBy ASC");
                        foreach ($row_int as $row_int_one) {
                          echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                        }
                      ?>
                  </select>

                  <select class="int_search_item">
                      <option value="">選擇比較的權益項目</option>
                      <?php 
                        foreach ($row_int as $row_int_one) {
                          echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                        }
                      ?>
                  </select>
                </div>

                <div class="col-3">
                 <div class="hv-center w-h-100">
                   <button id="int_search_btn" type="button">GO</button>
                 </div>
                </div>
                
             </form>
           </div>
         </div>
       </div>
     </div>
     <!-- 信用卡快搜/權益快搜 END -->
     
    </header>
    <!-- header END -->


    <!-- TOP 按鈕 -->
    <div class="top_div">
      <a href="javascript:;">
        <i class="fa fa-chevron-up"></i>
        <p>top</p>
      </a>
    </div>