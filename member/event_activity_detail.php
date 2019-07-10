<?php 
 require '../share_area/conn.php';

 $row=$pdo->select("SELECT * FROM appNotice WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

 $aTXT=mb_substr( strip_tags($row['aTXT']), 0,50).'...';
 $aPic_txt=empty($row['aPic_txt']) ? '': '<p>▲'.$row['aPic_txt'].'</p>';


 //-- 上一篇 --
 $prev_news=$pdo->select("SELECT * 
                          FROM appNotice 
                          WHERE Tb_index>:Tb_index AND note_type=1 AND OnLineOrNot=1
                          ORDER BY OrderBy DESC, StartDate ASC, Tb_index ASC 
                          LIMIT 0,1 ", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');
 
 //-- 下一篇 --
 $next_news=$pdo->select("SELECT * 
                          FROM appNotice 
                          WHERE Tb_index<:Tb_index AND note_type=1 AND OnLineOrNot=1
                          ORDER BY OrderBy ASC, StartDate DESC, Tb_index DESC 
                          LIMIT 0,1 ", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

 $prev_btn_display=empty($prev_news['Tb_index']) ? 'd-none':'d-block';
 $next_btn_display=empty($next_news['Tb_index']) ? 'd-none':'d-block';

 $prev_url='event_activity_detail.php?'.$prev_news['Tb_index'];
 $next_url='event_activity_detail.php?'.$next_news['Tb_index'];

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title><?php echo $row['aTitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row['aTitle']; ?>,卡優活動"/>  
    <meta name="description" content="<?php echo $aTXT;?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $row['aTitle']; ?>｜卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $row['aTitle']; ?>｜卡優新聞網" />
    <meta property="og:description" content="<?php echo $aTXT;?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="member_body">

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

        <!-- 上下篇按鈕 -->
        <div class="<?php echo $prev_btn_display; ?> d-md-none PrevNext_div prev_btn">
          <a href="<?php echo $prev_url; ?>"><i class="fa fa-angle-left"></i></a>
        </div>
        <div class="<?php echo $next_btn_display; ?> d-md-none PrevNext_div next_btn">
          <a href="<?php echo $next_url; ?>"><i class="fa fa-angle-right"></i></a>
        </div>
        
        <!-- 麵包屑 -->
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="event_second.php">卡優活動</a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap">
                        <div class="pt-3 mx-3 detail_title">
                          <h2><?php echo $row['aTitle']; ?></h2>
                          <div class="row no-gutters my-3">

                            <div class="col-md-8">
                               <h4></h4>
                               <p>活動時間：<?php echo $row['StartDate']; ?>~<?php echo $row['EndDate']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <!-- 分享 -->
                               <?php 
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 // 新聞內頁分享功能按鈕 In share_area/func.php：：：：：：：：：：：：：：：：：：：：：：：
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 news_share_btn($FB_URL, $_SERVER['QUERY_STRING'], 'message_btn_N'); 
                               ?>
                               <!-- 分享 END -->
                            </div>
                          </div> 

                         
                        </div>

                        <div class="pb-3 mx-3 detail_content">

                          <p>
                            <img  src="<?php echo $img_url.$row['aPic'];?>" alt="<?php echo $aPic_txt; ?>">
                          </p>
                          
                            <?php 
                             echo $row['aTXT'];

                             if (!empty($row['note'])) {
                               echo '<p>◎注意事項:<br> '.nl2br($row['note']).'</p>';
                             }
                            ?>
                         
                        </div>

                      </div>
                    </div>

                    <!-- 上一則/下一則 -->
                    <div id="PrevNext_footer" class="col-md-12 row d-md-none pt-3 pb-5 mb-5">
                      <div class="col-6 d-block border-right">
                        <a <?php echo $prev_btn_display; ?> href="<?php echo $prev_url;?>">
                          <i class="fa fa-chevron-circle-left"></i>上一則 <br>
                          <p><?php echo $prev_news['aTitle']; ?></p>
                        </a>
                      </div>
                      <div class="col-6 d-block text-right">
                        <a <?php echo $next_btn_display; ?> href="<?php echo $next_url;?>">
                          <i class="fa fa-chevron-circle-right"></i>下一則 <br>
                          <p><?php echo $next_news['aTitle']; ?></p>
                        </a>
                        </div>
                      </div>
                      <!-- 上一則/下一則 -->

                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
             require 'right_area_div.php';
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
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

    <script type="text/javascript">
      $(document).ready(function() {

        //-- alt 圖說 & 手機加入fancybox --
        img_txt('.detail_content p img');
                
        //-- 圖寬限制 --
        img_750_w('.detail_content img');
        //-- table 優化 --
        html_table('.detail_content>table');
      });

      $(window).on('load', function() {
        
        //-- 內文插入廣告 --
        html_ad();
      });
    </script>

  </body>
</html>