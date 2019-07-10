<?php session_start();
//尚未load出舊照片
//目前暫時用tb_index進入的內容頁
require '../share_area/conn.php';
require '../share_area/get_news.php';

$todayis=date("Y-m-d"); //取得要查詢的日期，預設為今日

//取出ID 
$temparray=explode("?",$_SERVER['REQUEST_URI']);

//echo $temparray[1];

if (!$temparray[1]) {
  location_up('back','好像有東西出錯了唷，請回上一頁');

}else{
     $sql_temp="
      SELECT aTitle, aTXT, note, aPic, aPic_txt, StartDate, EndDate, note_type FROM appNotice
      where Tb_index=:Tb_index";
     
    $row=pdo_select($sql_temp, ['Tb_index'=>$temparray[1]]);
    
    $note_type=$row['note_type']==0 ? '公告時間：':'活動時間：';
    
  }


?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-列印</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-列印" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-列印" />
    <meta property="og:image" content="http://cardu.srl.tw/img/component/photo1.jpg" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <meta property="og:see_also" content="<?php echo $FB_URL;?>" />
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>

   <style type="text/css">
     .print_logo{ margin-top: 40px; }
     .index-content-left.detail_page{ max-width: 100%; }
   </style>

  </head>
  <body class="">

    <div class="container detail_page">

        <div class="print_logo">
          <img src="/img/component/logo.png" alt="">
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="pt-3 mx-3 detail_title">
                          <h2><?php echo $row['aTitle'];?></h2>
                          <div class="row no-gutters my-3">

                            <div class="col-md-8 col-12">
                               <p><?php echo $note_type; ?> <?php echo $row['StartDate'];?> ~  <?php echo $row['EndDate'];?></p>
                            </div>
                          </div> 
                        </div>

                        <div class="pb-3 mx-3 detail_content">
                          <?php 
                           if (!empty($row['aPic'])) {
                            

                             echo '<p>
                                    <img src="../sys/img/'.$row['aPic'].'" alt="'.$row['aPic_txt'].'" >
                                  </p>  ';
                           }
                          ?>
                            <?php 

                             echo $row['aTXT'];

                             if (!empty($row['note'])) {
                               echo '<p>
                                     ◎注意事項：<br>
                                     '.$row['note'].'
                                     </p>';
                             }

                            ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 col">
                    <div class="travel_info">
                      <div class="row no-gutters">
                      <div class="col-4 hv-center">
                        <img src="../img/component/logo_footer.png">
                      </div>
                      
                     
                      <div class="col-8">
                        <ul>
                          <li><a href="#">關於卡優新聞網｜</a></li>
                          <li><a href="#">服務總覽｜</a></li>
                          <li><a href="#">服務條款｜</a></li>
                          <li><a href="#">隱私權聲明｜</a></li>
                          <li><a href="#">廣告刊登｜</a></li>
                          <li><a href="#">行銷合作｜</a></li>
                          <li><a href="#">聯絡我們｜</a></li>
                          <li><a href="#">其他聲明｜</a></li>
                        </ul>
                        <p>威辰資通 版權所有 Copyright Ⓒ Starwin All Rights Reserved.</p>
                        <p>台北市中三北路三段27號7樓</p>
                        <p>TEL：(02)2591-3300</p>
                      </div>
                    </div>
                    </div>
                   </div>


                </div>
            </div>
            <!--版面左側end-->
            
           
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
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

    <script type="text/javascript">
      $(document).ready(function() {
        //-- alt 圖說 --
        img_txt('.detail_content p img');
        //-- 圖寬限制 --
        img_750_w('.detail_content img');
      });

     //--- 載入完成後列印 ---
     $(window).on('load', function(event) {
       // setTimeout ("CloseWin()" , 1);
       // window.print();
     });
       

      // -- 列印後關閉 --
      function CloseWin()
      {
      window.opener=null;
      window.close();
      }
    </script>

  </body>
</html>