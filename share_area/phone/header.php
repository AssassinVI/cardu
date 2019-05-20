<!-- header -->
    <header>
      <div class="row no-gutters py-1 px-3" style="background: #fff;">
       <div class="col-4">
        <a href="/index.php"><img class="w-100" src="/img/component/logo_ph.png" alt=""></a>
       </div> 
       <div class="col-8 tool_div">
         <div class="hv-around w-h-100">
           <a class="img_div" href="#" style="background-image: url(/img/component/icon/icon_m1.png);"></a>
           <a class="img_div" href="#" style="background-image: url(/img/component/icon/icon_m2.png);"></a>
           <a class="img_div" href="#" style="background-image: url(/img/component/icon/icon_m3.png);"></a>
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
        <a href="#"><i class="fa fa-home"></i> 首頁</a>
        <a class="close_btn" href="#" >Ｘ</a>
      </div>
       <div class="accordion" id="accordionExample">
         <div class="card">
           <div class="card-header" id="headingOne">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 新聞 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>

           <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
             <div class="card-body">
               <div class="row no-gutters">

                <?php 
                  $row_newsType=$pdo->select("SELECT nt_name, pk 
                                              FROM news_type 
                                              WHERE mt_id='site2018111910445721' AND nt_sp=0 AND OnLineOrNot=1 
                                              ORDER BY OrderBy ASC");
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
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                 卡排行 <i class="fa fa-angle-down"></i>
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
                 <div class="col-6"><a href="/rank/popular_second.php#newCard">新卡人氣排行</a></div>
                 <div class="col-6"><a href="/rank/popular_second.php#addCard">辦卡人氣排行</a></div>
                 <div class="col-6"><a href="/rank/popular_second.php#viewCard">點閱人氣排行</a></div>
               </div>

               <h4>卡比較</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="/rank/new_second.php#newHand">新卡快搜</a></div>
                 <div class="col-6"><a href="/rank/new_second.php#cardCompare">卡片比一比</a></div>
                 <div class="col-6"><a href="/rank/new_second.php#interest">權益比一比</a></div>
               </div>
             </div>
           </div>
         </div>
         <div class="card">
           <div class="card-header" id="card3">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                 卡情報 <i class="fa fa-angle-down"></i>
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
                <div class="col-6"><a href="/card/card_assign">線上辦卡</a></div>
              </div>
               
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card4">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                 優行動Pay <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse4" class="collapse " aria-labelledby="card4" data-parent="#accordionExample">
             <div class="card-body">
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
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                 優票證 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse5" class="collapse " aria-labelledby="card5" data-parent="#accordionExample">
             <div class="card-body">
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
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                 優集點 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse6" class="collapse " aria-labelledby="card6" data-parent="#accordionExample">
             <div class="card-body">
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
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                 優旅行 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse6" class="collapse " aria-labelledby="card7" data-parent="#accordionExample">
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
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                 討論區 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse7" class="collapse " aria-labelledby="card8" data-parent="#accordionExample">
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
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                 會員中心 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse8" class="collapse " aria-labelledby="card9" data-parent="#accordionExample">
             <div class="card-body">
               <h4>會員專區</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="#">會員資料</a></div>
                 <div class="col-6"><a href="#">電子報</a></div>
                 <div class="col-6"><a href="#">卡優公告</a></div>
                 <div class="col-6"><a href="#">客服中心</a></div>
                 <div class="col-6"><a href="#">卡優活動</a></div>
                 <div class="col-6"><a href="#">卡優貼紙</a></div>
               </div>
               <h4>我的卡優</h4>
               <div class="row no-gutters">
                 <div class="col-6"><a href="#">我的信用卡</a></div>
                 <div class="col-6"><a href="#">我的收藏</a></div>
                 <div class="col-6"><a href="#">我的帳單</a></div>
                 <div class="col-6"><a href="#">我的行事曆</a></div>
                 <div class="col-6"><a href="#">我的資訊</a></div>
                 <div class="col-6"><a href="#">我的文章</a></div>
               </div>
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header" id="card10">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                 關於我們 <i class="fa fa-angle-down"></i>
               </button>
             </h5>
           </div>
           <div id="collapse9" class="collapse " aria-labelledby="card10" data-parent="#accordionExample">
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
             <div class="swiper-slide"><a href="/news/news.php">新聞</a></div>
             <div class="swiper-slide"><a href="/rank/rank.php">卡排行</a></div>
             <div class="swiper-slide"><a href="/card/card.php">卡情報</a></div>
             <div class="swiper-slide"><a href="/mpay/mapy.php">優行動Pay</a></div>
             <div class="swiper-slide"><a href="/eticket/eticket.php">優票證</a></div>
             <div class="swiper-slide"><a href="/epoint/epoint.php">優集點</a></div>
             <div class="swiper-slide"><a href="/travel/index.php">優旅行</a></div>
             <div class="swiper-slide"><a href="#">討論區</a></div>
             <div class="swiper-slide"><a href="/member/member.php">會員中心</a></div>
             
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
    </header>
    <!-- header END -->