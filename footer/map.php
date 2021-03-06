<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />




    <title>卡優新聞網-服務總覽</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
      require '../share_area/fb_config.php'; 
    ?>
    <meta property="og:site_name" content="卡優新聞網-服務總覽" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-服務總覽" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="news_body">

    <div class="container detail_page">

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
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">服務總覽</a></p>
          </div>
        </div>

        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">
                       <!--特別議題-->
                 <div class="col-md-12 col">

                     <div class="cardshap blue_tab mouseHover_other_tab">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                       <li class="nav-item news_tab">
                         <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">服務總覽</a>
                       </li>
                     </ul>

                     <div class="tab-content" id="myTabContent">
                       <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                        
                        <div class="row">

                            <div class="col-md-4 col">
                             
                               <div class="cardshap tab_one blue_tab border mb-3">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>新聞</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li cardu_li">
                                        <li><a href="../news/list.php?nt_pk=8" target="_blank">卡訊</a></li>
                                        <li><a href="../news/list.php?nt_pk=4" target="_blank">專題</a></li>
                                        <li><a href="../news/list.php?nt_pk=58" target="_blank">行動pay</a></li>
                                        <li><a href="../news/list.php?nt_pk=7" target="_blank">財經</a></li>
                                        <li><a href="../news/list.php?nt_pk=5" target="_blank">3C</a></li>
                                        <li><a href="../news/list.php?nt_pk=6" target="_blank">消費</a></li>
                                        <li><a href="../news/list.php?nt_pk=27" target="_blank">休閒</a></li>
                                        <li><a href="../news/list.php?nt_pk=28" target="_blank">萬象</a></li>
                                       
                                    </ul>
                                   </div>
                               </div>

                               <div class="cardshap tab_one darkpurple_tab border mb-3">
                                   <div class="title_tab hole">
                                        <i class="icon" style="background-image: url(img/component/icon/icon12.png);"></i><h4>卡排行</h4>
                                   </div>
                                   <div class="content_tab ">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../rank/cardrank.php?1" target="_blank">現金回饋</a></li>
                                        <li><a href="../rank/cardrank.php?15" target="_blank">保險</a></li>
                                        <li><a href="../rank/cardrank.php?10" target="_blank">加油</a></li>
                                        <li><a href="../rank/cardrank.php?3" target="_blank">航空哩程</a></li>
                                        <li><a href="../rank/cardrank.php?6" target="_blank">機場接送</a></li>
                                        <li><a href="../rank/cardrank.php?9" target="_blank">電影</a></li>
                                        <li><a href="../rank/cardrank.php?8" target="_blank">分期卡</a></li>
                                        <li><a href="../rank/cardrank.php?14" target="_blank">首刷禮</a></li>
                                        <li><a href="../rank/cardrank.php?11" target="_blank">悠遊卡</a></li>
                                        <li><a href="../rank/cardrank.php?12" target="_blank">一卡通</a></li>
                                        <li><a href="../rank/cardrank.php?13" target="_blank">iCash卡</a></li>
                                        <li><a href="../rank/cardrank.php?16" target="_blank">網購</a></li>
                                        <li><a href="../rank/newcard.php" target="_blank">新卡人氣排行</a></li>
                                        <li><a href="../rank/apply.php" target="_blank">辦卡人氣排行</a></li>
                                        <li><a href="../rank/click.php" target="_blank">點閱人氣排行</a></li>
                                        <li><a href="../rank/compare01.php" target="_blank">新手快搜</a></li>
                                        <li><a href="../rank/compare02.php" target="_blank">卡片比一比</a></li>
                                        <li><a href="../rank/compare03.php" target="_blank">權益比一比</a></li>
                                    </ul>
                                   </div>
                               </div>
                               <div class="cardshap tab_one border mb-3 brown_tab">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>卡情報</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../card/new_card_list.php" target="_blank">新卡訊</a></li>
                                        <li><a href="../card/card_browse.php" target="_blank">卡總覽</a></li>
                                        <li><a href="../card/bank_list.php" target="_blank">銀行總覽</a></li>
                                        <li><a href="../card/interests_list.php" target="_blank">權益變更</a></li>
                                        <li><a href="../message/list.php?mt_pk=73" target="_blank">卡訊</a></li>
                                        <li><a href="../message/list.php?mt_pk=72" target="_blank">首刷禮</a></li>
                                        <li><a href="../message/list.php?mt_pk=71" target="_blank">購物</a></li>
                                        <li><a href="../message/list.php?mt_pk=70" target="_blank">美食</a></li>
                                        <li><a href="../message/list.php?mt_pk=66" target="_blank">旅遊</a></li>
                                        <li><a href="../message/list.php?mt_pk=67" target="_blank">交通</a></li>
                                        <li><a href="../message/list.php?mt_pk=69" target="_blank">電影</a></li>
                                        <li><a href="../message/list.php?mt_pk=68" target="_blank">休閒</a></li>
                                        <li><a href="../message/list.php?mt_pk=65" target="_blank">懶人包</a></li>
                                        <li><a href="../message/list.php?mt_pk=nt2019021210032563" target="_blank">開卡文</a></li>
                                        <li><a href="../message/list.php?mt_pk=nt2019021210033278" target="_blank">愛分享</a></li>
                                        <li><a href="../card/card_assign.php" target="_blank">線上辦卡</a></li>
                                       
                                    </ul>
                                   </div>
                               </div>
                            </div>
                            <div class="col-md-4 col">
                             
                               <div class="cardshap tab_one border mb-3 blueGreen_tab">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優行動pay</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../mpay/all.php" target="_blank">pay總覽</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=74" target="_blank">首刷禮</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=75" target="_blank">購物</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=76" target="_blank">美食</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=77" target="_blank">旅遊</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=78" target="_blank">電影</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=79" target="_blank">休閒</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=80" target="_blank">交通</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=81" target="_blank">藝文</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=82" target="_blank">懶人包</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=83" target="_blank">樂分享</a></li>
                                        <li><a href="../mpay/list.php?mt_pk=84" target="_blank">新手篇</a></li>
                                    </ul>
                                   </div>
                               </div>
                               <div class="cardshap tab_one border mb-3 pink_tab">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優票證</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../eticket/all.php" target="_blank">票證總覽</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=85" target="_blank">交通</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=86" target="_blank">購物</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=87" target="_blank">美食</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=88" target="_blank">旅遊</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=89" target="_blank">藝文</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=90" target="_blank">電影</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=91" target="_blank">休閒</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=92" target="_blank">懶人包</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=93" target="_blank">樂分享</a></li>
                                        <li><a href="../eticket/list.php?mt_pk=94" target="_blank">新手篇</a></li>
                                    </ul>
                                   </div>
                               </div>
                               <div class="cardshap tab_one border mb-3 Darkbrown_tab">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優集點</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../epoint/all.php" target="_blank">集點總覽</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=95" target="_blank">購物</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=96" target="_blank">美食</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=97" target="_blank">旅遊</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=98" target="_blank">交通</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=99" target="_blank">電影</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=100" target="_blank">休閒</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=101" target="_blank">藝文</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=102" target="_blank">懶人包</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=103" target="_blank">樂分享</a></li>
                                        <li><a href="../epoint/list.php?mt_pk=104" target="_blank">新手篇</a></li>
                                    </ul>
                                   </div>
                               </div>
                            </div>
                            <div class="col-md-4 col">
                             
                               <div class="cardshap tab_one border mb-3 green_tab">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優旅行</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../travel/share.php" target="_blank">旅行分享</a></li>
                                        <li><a href="../travel/recommend.php" target="_blank">行程推薦</a></li>
                                        <li><a href="../travel/tip.php" target="_blank">刷卡秘笈</a></li>
                                        <li><a href="../travel/preferential.php" target="_blank">優惠情報</a></li>
                                        <li><a href="../travel/jp/index.php" target="_blank">日本嬉遊趣</a></li>
                                    </ul>
                                   </div>
                               </div>
                               
                               <div class="cardshap tab_one border mb-3 primary_tab">
                                   <div class="title_tab hole">
                                         <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>會員中心</h4>
                                   </div>
                                   <div class="content_tab">
                                       <ul class="tab_list cardu_li">
                                        <li><a href="../member/login_info.php" target="_blank">會員資料</a></li>
                                        <li><a href="../member/annouce_second.php" target="_blank">卡優公告</a></li>
                                        <li><a href="../member/event_second.php" target="_blank">卡優活動</a></li>
                                        <li><a href="#" target="_blank">卡優貼紙</a></li>
                                        <li><a href="../member/epaper.php" target="_blank">電子報</a></li>
                                        <li><a href="../member/service.php" target="_blank">客服中心</a></li>
                                        <li><a href="../member/mycard.php" target="_blank">我的信用卡</a></li>
                                        <li><a href="../member/mybill.php" target="_blank">我的帳單</a></li>
                                        <li><a href="../member/myinfo.php" target="_blank">我的資訊</a></li>
                                        <li><a href="../member/mypen.php" target="_blank">我的文章</a></li>
                                        <li><a href="../member/mycollect.php" target="_blank">我的收藏</a></li>
                                        <li><a href="../member/mydate.php" target="_blank">我的行事曆</a></li>
                                    </ul>
                                   </div>
                               </div>

                               
                            </div>

                          </div>
                         
                 
                       </div>
                 
                       
                 
                     </div>
                   </div>

                 </div>
                  
                 
                 <!--特別議題end -->
               
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php require '../news/right_area_div.php'; ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <?php 
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>

  </body>
</html>