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
                                    <li class="nav-item">
                                      <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">卡優公告</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="javascript:;" tab-target="#goodPerson" aria-selected="false">卡優活動</a>
                                    </li>
                                  </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                              <div class="row no-gutters">
                                <div class="col-md-4 cards-3 text-center">
                                  <a href="#">
                                   <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                       
                                   </div>
                                   <span>遊日血拚大回饋，信用卡大調查</span>
                                  </a>
                                </div>
                                <div class="col-md-4 cards-3 text-center">
                                  <a href="#">
                                    <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                       
                                    </div>
                                    <span>遊日血拚大回饋，信用卡大調查</span>
                                  </a>
                                </div>
                                 <div class="col-md-4 cards-3 text-center">
                                  <a href="#">
                                    <div class="img_div w-100-ph" style="background-image: url(../img/component/photo2.jpg);">
                                        
                                    </div>
                                    <span>遊日血拚大回饋，信用卡大調查</span>
                                  </a>
                                </div>
                              </div>
                              <br>
                              <div class="member_info">
                                <!--我的信用卡-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab">
                                        <a class="nav-link active  pl-30 py-2" id="box-tab"  href="second.php" tab-target="#box" aria-selected="true">
                                        我的信用卡</a>
                                      </li>
                                    </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                   <table class="table table-striped table-bordered text-center">
                                     <thead>
                                       <tr>
                                         <th scope="col">發卡單位</th>
                                         <th scope="col">信用卡名稱</th>
                                         <th scope="col">結帳日</th>
                                         <th scope="col">繳款日</th>
                                         <th scope="col">年度累積金額</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>每月X日</td>
                                         <td>每月X日</td>
                                         <td>XXXX</td>
                                       </tr>
                                       
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>每月X日</td>
                                         <td>每月X日</td>
                                         <td>XXXX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>每月X日</td>
                                         <td>每月X日</td>
                                         <td>XXXX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡(請修正)</td>
                                         <td>每月X日</td>
                                         <td>每月X日</td>
                                         <td>XXXX</td>
                                       </tr>

                                     </tbody>
                                   </table>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--我的信用卡end -->
                                <!--我的帳單-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab">
                                        <a class="nav-link active  pl-30 py-2" id="box-tab"  href="second.php" tab-target="#box" aria-selected="true">
                                        我的帳單</a>
                                      </li>
                                    </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

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
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>20XX/XX</td>
                                         <td>XXX</td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>20XX/XX</td>
                                         <td>XXX</td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>20XX/XX</td>
                                         <td>XXX</td>
                                         <td>20XX/XX/XX</td>
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
                                       </tr>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>XXX</td>
                                         <td>XXX</td>
                                         <td>每月X日</td>
                                         <td>XXX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XX銀行</th>
                                         <td>XXXX卡</td>
                                         <td>XXX</td>
                                         <td>XXX</td>
                                         <td>每月X日</td>
                                         <td>XXX</td>
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
                                <!--我的帳單end -->
                                <!--我的資訊-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab">
                                        <a class="nav-link active  pl-30 py-2" id="box-tab"  href="second.php" tab-target="#box" aria-selected="true">
                                        我的資訊</a>
                                      </li>
                                    </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                   <table class="table table-striped table-bordered text-center">
                                     <thead>
                                       <tr>
                                         <th scope="col">來源</th>
                                         <th scope="col">類別</th>
                                         <th scope="col">主題名稱</th>
                                         <th scope="col">發布時間</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                     </tbody>
                                   </table>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--我的資訊end -->
                                <!--我的文章-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab">
                                        <a class="nav-link active  pl-30 py-2" id="box-tab"  href="second.php" tab-target="#box" aria-selected="true">
                                        我的文章</a>
                                      </li>
                                    </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                   <table class="table table-striped table-bordered text-center">
                                     <thead>
                                       <tr>
                                         <th scope="col">發文/回文</th>
                                         <th scope="col">來源</th>
                                         <th scope="col">主題名稱</th>
                                         <th scope="col">發布時間</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td>XXX</td>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                     </tbody>
                                   </table>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--我的文章end -->
                                <!--我的收藏-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab">
                                        <a class="nav-link active  pl-30 py-2" id="box-tab"  href="second.php" tab-target="#box" aria-selected="true">
                                        我的收藏</a>
                                      </li>
                                    </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                   <table class="table table-striped table-bordered text-center">
                                     <thead>
                                       <tr>
                                         <th scope="col">來源</th>
                                         <th scope="col">主題名稱</th>
                                         <th scope="col">發布時間</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                       <tr>
                                         <th scope="row">XXX</th>
                                         <td><a href="#">遊日血拼賺回饋　必備信用卡大比拼</a></td>
                                         <td>20XX/XX/XX</td>
                                       </tr>
                                     </tbody>
                                   </table>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--我的收藏end -->

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