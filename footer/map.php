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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="about.php">服務總覽</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">
                 <div class="row">
                    <div class="col-md-12 col">
               
                      <div class="cardshap ">
                
                        
                       
                        <div class="pb-3 detail_content">
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
                                
                                  <div class="cardshap tab_one blue_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>新聞</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li cardu_li">
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=8" target="_blank">卡訊</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=4" target="_blank">專題</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=58" target="_blank">行動pay</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=7" target="_blank">財經</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=5" target="_blank">3C</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=6" target="_blank">消費</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=27" target="_blank">休閒</a></li>
                                           <li><a href="http://cardu.srl.tw/news/list.php?nt_pk=28" target="_blank">萬象</a></li>
                                          
                                       </ul>
                                      </div>
                                  </div>

                                  <div class="cardshap tab_one darkpurple_tab">
                                      <div class="title_tab hole">
                                           <i class="icon" style="background-image: url(img/component/icon/icon12.png);"></i><h4>卡排行</h4>
                                      </div>
                                      <div class="content_tab ">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?1" target="_blank">現金回饋</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?15" target="_blank">保險</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?10" target="_blank">加油</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?3" target="_blank">航空哩程</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?6" target="_blank">機場接送</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?9" target="_blank">電影</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?8" target="_blank">分期卡</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?14" target="_blank">首刷禮</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?11" target="_blank">悠遊卡</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?12" target="_blank">一卡通</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?13" target="_blank">iCash卡</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/cardrank.php?16" target="_blank">網購</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/newcard.php" target="_blank">新卡人氣排行</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/apply.php" target="_blank">辦卡人氣排行</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/click.php" target="_blank">點閱人氣排行</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/compare01.php" target="_blank">新手快搜</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/compare02.php" target="_blank">卡片比一比</a></li>
                                           <li><a href="http://cardu.srl.tw/rank/compare03.php" target="_blank">權益比一比</a></li>
                                       </ul>
                                      </div>
                                  </div>
                                  <div class="cardshap tab_one brown_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>卡情報</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/card/new_card_list.php" target="_blank">新卡訊</a></li>
                                           <li><a href="http://cardu.srl.tw/card/card_browse.php?func=fun2018110610075608" target="_blank">卡總覽</a></li>
                                           <li><a href="http://cardu.srl.tw/card/bank_list.php" target="_blank">銀行總覽</a></li>
                                           <li><a href="http://cardu.srl.tw/card/interests_list.php" target="_blank">權益變更</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=73" target="_blank">卡訊</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=72" target="_blank">首刷禮</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=71" target="_blank">購物</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=70" target="_blank">美食</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=66" target="_blank">旅遊</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=67" target="_blank">交通</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=69" target="_blank">電影</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=68" target="_blank">休閒</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=65" target="_blank">懶人包</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=nt2019021210032563" target="_blank">開卡文</a></li>
                                           <li><a href="http://cardu.srl.tw/message/list.php?mt_pk=nt2019021210033278" target="_blank">愛分享</a></li>
                                           <li><a href="http://cardu.srl.tw/card/card_assign.php" target="_blank">線上辦卡</a></li>
                                          
                                       </ul>
                                      </div>
                                  </div>
                               </div>
                               <div class="col-md-4 col">
                                
                                  <div class="cardshap tab_one blueGreen_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優行動pay</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/mpay/all.php" target="_blank">pay總覽</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=74" target="_blank">首刷禮</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=75" target="_blank">購物</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=76" target="_blank">美食</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=77" target="_blank">旅遊</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=78" target="_blank">電影</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=79" target="_blank">休閒</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=80" target="_blank">交通</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=81" target="_blank">藝文</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=82" target="_blank">懶人包</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=83" target="_blank">樂分享</a></li>
                                           <li><a href="http://cardu.srl.tw/mpay/list.php?mt_pk=84" target="_blank">新手篇</a></li>
                                       </ul>
                                      </div>
                                  </div>
                                  <div class="cardshap tab_one pink_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優票證</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/eticket/all.php" target="_blank">票證總覽</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=85" target="_blank">交通</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=86" target="_blank">購物</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=87" target="_blank">美食</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=88" target="_blank">旅遊</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=89" target="_blank">藝文</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=90" target="_blank">電影</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=91" target="_blank">休閒</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=92" target="_blank">懶人包</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=93" target="_blank">樂分享</a></li>
                                           <li><a href="http://cardu.srl.tw/eticket/list.php?mt_pk=94" target="_blank">新手篇</a></li>
                                       </ul>
                                      </div>
                                  </div>
                                  <div class="cardshap tab_one Darkbrown_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優集點</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/epoint/all.php" target="_blank">集點總覽</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=95" target="_blank">購物</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=96" target="_blank">美食</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=97" target="_blank">旅遊</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=98" target="_blank">交通</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=99" target="_blank">電影</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=100" target="_blank">休閒</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=101" target="_blank">藝文</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=102" target="_blank">懶人包</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=103" target="_blank">樂分享</a></li>
                                           <li><a href="http://cardu.srl.tw/epoint/list.php?mt_pk=104" target="_blank">新手篇</a></li>
                                       </ul>
                                      </div>
                                  </div>
                               </div>
                               <div class="col-md-4 col">
                                
                                  <div class="cardshap tab_one green_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>優旅行</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/travel/share.php" target="_blank">旅行分享</a></li>
                                           <li><a href="http://cardu.srl.tw/travel/recommend.php" target="_blank">行程推薦</a></li>
                                           <li><a href="http://cardu.srl.tw/travel/tip.php" target="_blank">刷卡秘笈</a></li>
                                           <li><a href="http://cardu.srl.tw/travel/preferential.php" target="_blank">優惠情報</a></li>
                                           <li><a href="http://cardu.srl.tw/travel/jp/index.php" target="_blank">日本嬉遊趣</a></li>
                                       </ul>
                                      </div>
                                  </div>
                                  
                                  <div class="cardshap tab_one primary_tab">
                                      <div class="title_tab hole">
                                            <i class="icon" style="background-image: url(img/component/icon/icon3.png);"></i><h4>會員中心</h4>
                                      </div>
                                      <div class="content_tab">
                                          <ul class="tab_list cardu_li">
                                           <li><a href="http://cardu.srl.tw/member/index.php" target="_blank">會員資料</a></li>
                                           <li><a href="http://cardu.srl.tw/member/annouce_second.php" target="_blank">卡優公告</a></li>
                                           <li><a href="http://cardu.srl.tw/member/event_second.php" target="_blank">卡優活動</a></li>
                                           <li><a href="#" target="_blank">卡優貼紙</a></li>
                                           <li><a href="#" target="_blank">電子報</a></li>
                                           <li><a href="http://cardu.srl.tw/member/service.php" target="_blank">客服中心</a></li>
                                           <li><a href="http://cardu.srl.tw/member/mycard.php" target="_blank">我的信用卡</a></li>
                                           <li><a href="http://cardu.srl.tw/member/mybill.php" target="_blank">我的帳單</a></li>
                                           <li><a href="http://cardu.srl.tw/member/myinfo.php" target="_blank">我的資訊</a></li>
                                           <li><a href="http://cardu.srl.tw/member/mypen.php" target="_blank">我的文章</a></li>
                                           <li><a href="http://cardu.srl.tw/member/mycollect.php" target="_blank">我的收藏</a></li>
                                           <li><a href="http://cardu.srl.tw/member/mydate.php" target="_blank">我的行事曆</a></li>
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

                      </div>
                   </div>
                   </div> 
               
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one blue_tab">
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

                    <div class="col-md-12 col">
                       
                       <div class="cardshap blue_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active pl-30" id="card-tab" tab-target="#card" href="javascript:;" aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/news/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-30" id="right-tab" tab-target="#right" href="javascript:;" aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/news/icon2.png); background-size: 80%;"></i>權益快搜
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
                       <div class="cardshap hotCard tab_one blue_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
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

                           </div>
                       </div>
                    </div>

                    <div class="col-md-12 col">
                       <div class="cardshap tab_one blue_tab">
                           <div class="title_tab hole">
                               <h4>熱門新聞</h4>
                           </div>
                           <div class="content_tab">
                               <ul class="tab_list cardu_li cardu_li">
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                            </ul>
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