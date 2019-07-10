<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />




    <title>卡優新聞網-關於卡優新聞網</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
     ?>
    <meta property="og:site_name" content="卡優新聞網-關於卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-關於卡優新聞網" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">關於卡優新聞網</a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0 detail_content">
              <!--特別議題-->
              <div class="col-md-12 col">
                <div class="cardshap blue_tab mouseHover_other_tab">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item news_tab">
                      <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">關於卡優</a>
                    </li>
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                     <p>卡優新聞網(CardU.com.tw)於2006年2月正式 開站，主要是提供消費者生活上所使用之各種卡類（包含有：信用卡、金融卡、儲值卡、會員卡及其他消費相關卡類）的資訊平台 ，並且以專業的新聞角度，採訪報導相關的財經、理財、金融、消費、生活、娛樂、藝文、休閒、3C…等，並且結合即時訊息、優惠 情報、資料搜尋、分析比較、市場調查、社群討論等加值服務功能，讓卡優新聞網成為一個專業的「卡優．卡油．卡友」的資訊服 務平台。</p>

              

                     <p>由於網路媒體儼然成為電視媒體外，第二大公眾媒 體，其接觸度及影響度，將不斷隨著使用率的擴增及習慣的養成，成為最受矚目的媒體。卡優新聞網目前不但是消費者最為仰賴的卡 資訊服務平台網站，銀行與商店所發行的各式卡資訊與好康，也都可在卡優新聞網的卡資訊、卡好康、優商店、優情報四大服務中 ，搜尋到相關的優惠活動、商品情報、銀行與商店的介紹等，讓卡優新聞網已成為消費者、商店與銀行間的完整資訊整合平台。</p>
              
                    </div>
              
                    
              
                  </div>
                </div>

              </div>
               <div class="col-md-12 col">

                  <div class="cardshap blue_tab exception">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item news_tab">
                      <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">核心經營</a>
                    </li>
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                     <p>卡優新聞網(CardU.com.tw)運用網路4C(Content內容、Communication通訊、Community社群、Commerce商務) 之資訊傳播整合行銷為經營核心。</p>
                     <p><span class="about_info">＊內容(Content)：</span><br/>
                        針對消費者對卡資訊的需求，提供信用卡、金融卡、儲值卡、會員卡等相關卡類的資訊服務內容，包括權益項目、優惠促 銷、消費資訊、用卡資訊、線上申辦….等，並且隨時提供用卡者，商家之優惠資訊、情報好康等訊息。</p>
                     <p><span class="about_info">＊通訊(Communication)：</span><br/>
                          結合網路通訊、電話通訊等多通道的各項傳遞服務，提供簡訊通知、商店地圖、優惠資訊、折價券下載，以及帳單提醒等功能 ，以滿足使用者的社交溝通需求。</p>
                     <p><span class="about_info">＊社群(Community)：</span><br/>
                         聚集消費者，集合資訊意見之交流、傳遞以及溝通等機制，凝聚消費及使用的效力，讓使用者得到更優惠的消費方案，讓發 卡銀行、商店獲取重度消費之利潤，產生皆贏的結果。</p>
                     <p><span class="about_info">＊商務(Commerce)：</span><br/>
                         提供完整B2B、B2C的解決方案，讓使用者安全的使用各項優質服務。</p>
              
                    </div>
              
                    
              
                  </div>
                </div>
                
              </div>

              <div class="col-md-12 col">

                  <div class="cardshap blue_tab exception">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item news_tab">
                      <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">網站特色</a>
                    </li>
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                     <p><span class="about_info">＊卡優：</span><br/>
                         提供及推薦優質的信用卡、金融卡、儲值卡、會員卡及其他消費卡類相關資訊，並提供使用者用卡之重要權益須知、 好康資訊、卡比較。</p>
                     <p><span class="about_info">＊卡油：</span><br/>
                          提供發卡銀行、商店，在購物、美食、住宿、旅遊、休閒、藝文、交通、生活…等各項優惠及促銷方案，包含贈品、 刷卡優惠、消費優惠、服務優惠、折價券等資訊，讓使用者可以盡情享受卡油的樂趣。</p>
                     <p><span class="about_info">＊卡友：</span><br/>
                         提供卡友彼此相互交流、傳遞以及溝通的各項服務平台功能，凝聚消費者群聚的力量，讓銀行、商店提供更多、更完善的優惠與服務。</p>
                    
              
                    </div>
              
                    
              
                  </div>
                </div>
                
              </div>
              
              <!--特別議題end -->
               
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
             require '../news/right_area_div.php';
            ?>
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