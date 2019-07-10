<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心 > 卡優公告</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 卡優公告" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 卡優公告" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
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
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="javascript:;">卡優公告</a></p>
          </div>
        </div>
        
        

        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                <div class="row">

                 
                    <!--卡優公告-->
                    <div class="col-md-12 col">

                        <div class="cardshap primary_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" data-toggle="tab" href="#title_5" role="tab" aria-controls="title_5" aria-selected="true">卡優公告</a>
                          </li>
                         
                        </ul>
                        <div class="" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                           
                          <?php 
                          //-- 分頁判斷數 --
                          $num=12;
                          //--- 分頁起頭數 ---
                          $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                          //-- 目前分頁 --
                          $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                          //-- 總頁數 --
                          $row_list_total=$pdo->select("SELECT COUNT(*) as total
                                                        FROM appNotice 
                                                        WHERE note_type=0 AND OnLineOrNot=1"
                                                        , 'no', 'one');
                          $total_page=ceil(((int)$row_list_total['total'])/$num);

                           $row_annouce=$pdo->select("SELECT aTitle, Tb_index, aTXT, aPic, StartDate
                                                   FROM appNotice 
                                                   WHERE note_type=0 AND OnLineOrNot=1
                                                   ORDER BY OrderBy ASC, StartDate DESC, Tb_index DESC
                                                   LIMIT 0, 12");
                            $x=1;
                           foreach ($row_annouce as $list_one) {
                            
                            $news_small_txt='<small class="px-md-4 pb-md-0 px-0 pb-2">('.$list_one['StartDate'].')</small>';
                            $ns_ftitle=mb_substr($list_one['aTitle'], 0,20,'utf-8');
                            $ns_msghtml=mb_substr(strip_tags($list_one['aTXT']), 0,50,'utf-8').'...';
                            $url=$URL.'/member/notify_detail.php?'.$list_one['Tb_index'];
                            $fb_url=urlencode($url);
                             
                             echo '
                             <div class="row no-gutters py-md-3 mx-md-2 news_list">
                               <div class="col-md-4 col-6 py-2 pl-2">
                                 <a class="img_div news_list_img" href="'.$url.'" style="background-image: url('.$img_url.$list_one['aPic'].');" title="'.$list_one['aTitle'].'"></a>
                               </div>
                                 <div class="col-md-8 col-6 pl-md-3 pl-0 py-2 news_list_txt">
                                   <a href="'.$url.'" title="'.$list_one['aTitle'].'"><h3>'.$ns_ftitle.'</h3></a>
                                   <a href="'.$url.'" title="'.$list_one['aTitle'].'"><p class="phone_hidden">'.$ns_msghtml.'</p></a>
                                   <div class="fb_search_btn">
                                     '.$news_small_txt.'
                                     <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=119&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=616626501755047" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                   </div>
                                 </div>
                               </div>';


                               //-- 手機廣告 --
                               if (wp_is_mobile()) {
                                 if ($x%3==0) {
                                   echo '
                                   <div class="col-md-12 row d-md-none d-sm-block ">
                                   <div class="col-md-6 col banner ">
                                       <img src="https://placehold.it/900x300" alt="">
                                   </div>
                                   </div>';
                                 }
                               }
                               //-- 電腦廣告 --
                               else{
                                
                                if ($x%6==0) {
                                  
                                  echo '<div class="col-md-12 row phone_hidden">
                                           <div class="col-md-6 col banner ">
                                               <img src="https://placehold.it/365x100" alt="">
                                           </div>
                                           <div class="col-md-6 col banner">
                                               <img src="https://placehold.it/365x100">
                                           </div>
                                       </div>';
                                }
                                else if($x%3==0){
                                  echo '<div class="col-md-12 col banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
                                  
                                }

                               }

                              $x++;
                           }
                          ?>

                      


                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!--最新文章end -->

                   
                    

                   <?php 
                     
                     //-- 分頁 --
                     paging($total_page, $page);
                   ?>




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


    <?php 
     //-- 共用jS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>