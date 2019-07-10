<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-其他聲明</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
      require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-其他聲明" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-其他聲明" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">其他聲明</a></p>
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
                        <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">其他聲明</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                       
                       <p>
                        一、卡優新聞網中的文字、圖片所提及、刊登或出現的各公司註冊商標、LOGO、名稱，皆屬該公司所有，且均受中華民國著作權法及國際智慧財產權相關條文保護，請充分尊重著作權及智慧財產權。使用者自行發表文章於卡優新聞網中，即同意授權留存於卡優新聞網網域內使用，供網友瀏覽、推薦。在未經本公司或正當權利人合法授權前，您不得擅自以任何形式複製、改作、編輯、散布、公開傳播或其他非法使用，否則本公司將依法追訴並請求賠償。
                        </p>
                        <p>
                        二、卡優新聞網中的文字、圖片、音樂，若有不當引用、誤用或侵權之處，請與本公司聯繫，本公司本著尊重著作權及智慧財產權的精神，將盡速移除或更正，並竭誠致歉。
                        </p>
                        <p>
                         三、卡優新聞網中所刊登的文字、圖片、價格、數字…等，若與發卡機構或原發稿機構不符時，以該機構所公佈之內容為準，如造成不便，敬請見諒！
                        </p>
                         <p>
                         四、卡優新聞網所提供予網友發言、回文、討論等版面，皆屬自由論壇，受言論自由保障，所有言論皆為個人行為，並非本網站立場。若有不適當言論、引用或侵權行為時，當由發言之個人負責。本站基於善盡管理之責，有權決定移除與否。
                        </p>
                        
                
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