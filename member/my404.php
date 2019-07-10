<?php 
 require '../share_area/conn.php';


 if (strpos($_SERVER['QUERY_STRING'], 'news')!==FALSE) {
   $url_404='../news/news.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/news/news.php">新聞</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='news_body';
   $color_tab='blue_tab';
 }
 elseif(strpos($_SERVER['QUERY_STRING'], 'card')!==FALSE){
   $url_404='../card/card.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/card/card.php">卡情報</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='cardNews_body';
   $color_tab='brown_tab';
 }
 elseif(strpos($_SERVER['QUERY_STRING'], 'mpay')!==FALSE){
   $url_404='../mpay/mpay.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/mpay/mpay.php">優行動Pay</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='pay_body';
   $color_tab='blueGreen_tab';
 }
 elseif(strpos($_SERVER['QUERY_STRING'], 'eticket')!==FALSE){
   $url_404='../eticket/eticket.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/eticket/eticket.php">優票證</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='ticket_body';
   $color_tab='pink_tab';
 }
 elseif(strpos($_SERVER['QUERY_STRING'], 'epoint')!==FALSE){
   $url_404='../epoint/epoint.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/epoint/epoint.php">優集點</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='point_body';
   $color_tab='Darkbrown_tab';
 }
 elseif(strpos($_SERVER['QUERY_STRING'], 'travel')!==FALSE){
   $url_404='../travel/index.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/travel/index.php">優旅行</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='travel_body';
   $color_tab='green_tab';
 }
 elseif(strpos($_SERVER['QUERY_STRING'], 'member')!==FALSE){
   $url_404='../member/member.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/member/member.php">會員中心</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='member_body';
   $color_tab='primary_tab';
 }
 else{
   $url_404='../index.php';
   $crumbs_txt='<p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">404錯誤</a></p>';
   $body_class='member_body';
   $color_tab='primary_tab';
 }

 $QUERY_STRING=empty($_SERVER['QUERY_STRING']) ? 'member':$_SERVER['QUERY_STRING'];

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-404 Error!</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <!-- <meta property="og:url" content="https://www.cardu.com.tw" /> -->
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="<?php echo $body_class;?>">

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
            <?php echo $crumbs_txt ;?>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">
                
                <div class="row">

                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="cardshap <?php echo $color_tab;?> mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="second.php" tab-target="#goodMember" aria-selected="true">404 錯誤</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">
                            
                              <div class="px-md-2 member_info error">

                                
                                <div class="row no-gutters">
                                  <div class="col-md-4 hv-center">
                                    <img src="../img/component/u_logo.png">
                                  </div>
                                  <div class="col-md-8">
                                    <div>
                                    <h1>抱歉!您查看的網頁目前有問題</h1>
                                    <h3>我們似乎找不到您要找的頁面...</h3>
                                    <p>您可以<a href="<?php echo $url_404;?>">按此</a>跳轉<br><br><br><br><br></p>

                                    </div>
                                  </div>
                                </div>
                                 
                              </div>

                            
                           
                          </div>

                          
                        </div>
                      </div>
                    
                  </div>
                  <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

                        <div class="cardshap <?php echo $color_tab;?> ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content py-md-4 py-0" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card2.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card3.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>




                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->
                    <!--手機板信用卡推薦-->
                            <div class="col-md-12 col d-md-none d-sm-block">

                                <div class="cardshap <?php echo $color_tab;?> exception">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item news_tab">
                                    <a class="nav-link active pl-30 py-2" id="special_1-tab" aria-selected="true">信用卡推薦</a>
                                  </li>
                                </ul>
                                <div class="tab-content p-0" id="myTabContent">
                                  <div class="tab-pane fade show active"  role="tabpanel" >

                                    <div class="row no-gutters mx-2 py-3 card_list">
                                      <div class="col-md-4 text-center">
                                        <a class="card_list_img" href="#">
                                          <img src="../img/component/card1.png" alt="" title="新聞">
                                        </a>
                                        <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                                      </div>
                                      <div class="col-md-4 card_list_txt rank_color phone_card">
                                        <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                        <ul>
                                          <li><b>●</b>國內現金回饋1.22%</li>
                                          <li><b>●</b>國外現金回饋2.22%</li>
                                          <li><b>●</b>感應式刷卡快速結帳</li>
                                          <li><b>●</b>高額旅遊平安險</li>
                                          <li><b>●</b>華航機票優惠</li>
                                        </ul>
                                      </div>
                                      <div class="col-md-4 phone_hidden">
                                        <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                        <p>謹慎理財 信用至上</p>
                                      </div>
                                    </div>
                                   
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                            <!--信用卡推薦end -->  
                              
                 


                    
                   

                    
                  
                    
                    

                   

                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
              require '../'.$QUERY_STRING.'/right_area_div.php';
            ?>
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