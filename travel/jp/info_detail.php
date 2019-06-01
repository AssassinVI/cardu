<?php 
  $pk=$_GET['pk'];
?>
<?php 
 require '../../share_area/conn.php';

 //-- 判斷單元 --
 $row_nt=$pdo->select("SELECT nt_name, Tb_index, unit_id
                       FROM news_type 
                       WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['tr_pk']], 'one');

 $title_name='卡優新聞網-日本嬉遊趣 > '.$row_nt['nt_name'].'資訊';
 $crumbs_name='<a href="about.php?tr_pk='.$row_nt['Tb_index'].'">'.$row_nt['nt_name'].'</a> / <a href="javascript:;">'.$row_nt['nt_name'].'資訊</a>';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $title_name; ?></title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $title_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $title_name; ?>" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL; ?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../../share_area/share_css.php';
    ?>



  </head>
  <body class="travel_body">

    <div class="container detail_page">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../../share_area/phone/header.php';
         }
         else{
          require '../../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/travel/index.php">優旅行</a> / <a href="index.php">日本嬉遊趣</a> / <?php echo $crumbs_name; ?></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="pt-3 mx-3 detail_title">
                          
                           
                          <div class="row no-gutters my-3">

                            <!-- <div class="col-8">
                             <h2>東京，不管去幾次都不厭倦！</h2>
                            </div>
                            <div class="col-4">
                               <div class="search_div hv-center">
                                <div class="fb-like mr-2" data-href="http://srl.tw/cardu/news_detail.html" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                 <a class="search_btn" href="#"><img src="../../img/component/search/fb.png" alt="" title="Fb分享"></a>
                                 <a class="search_btn" href="#"><img src="../../img/component/search/line.png" alt="" title="Line分享"></a>
                                 <a class="search_btn" href="#"><img src="../../img/component/search/message.png" alt="" title="留言"></a>
                                 <a id="arrow_btn" class="search_btn" href="javascript:;"><img src="../../img/component/search/arrow.png" alt="" title="往下開啟"></a>
                               </div>
                               <div class="more_search">
                                 <a href="#"><img src="../../img/component/search/print.png" alt="" title="列印"></a>
                                 <a href="#"><img src="../../img/component/search/work.png" alt="" title="收藏"></a>
                                 <a href="#"><img src="../../img/component/search/mail.png" alt="" title="轉寄"></a>
                                 <a href="#"><img src="../../img/component/search/mood.png" alt="" title="回報"></a>
                               </div>
                            </div> -->
                          </div> 

                         
                        </div>

                        <div class="pb-3 mx-3 detail_content">
                          

                          <?php 
                           require 'data/recomm_02_01_'.$pk.'_detail.php';
                          ?>

                         
                        </div>

                      </div>
                    </div>


                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
             require '../right_area_div_jp.php';
             ?>
            <!--版面右側end-->
             <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60">
                        </div>
                    </div>
                    <!--廣告end-->
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
     require '../../share_area/share_js.php';
    ?>

  </body>
</html>