<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-卡排行</title>

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
  <body class="rank_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="news.php">卡排行</a> / <a href="browse_detail.php">瀏覽過信用卡
            </a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">


                    <!--信用卡推薦-->
                    <div class="col-md-12 col">
                     

                        <div class="cardshap darkpurple_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <span class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab"  role="tab" aria-controls="special_1" aria-selected="true">瀏覽過信用卡</span>
                          </li>
                        </ul>
                        
                          <!--信用卡推薦-->
                       

                       
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <?php 
                              if (!empty($_COOKIE['cc_id'])) {
                               $cc_id_arr=explode(',', $_COOKIE['cc_id']);
                               $cc_id_txt='';
                               $cc_id_num=count($cc_id_arr);
                               $cc_id_num_max=$cc_id_num>10 ? $cc_id_num-10:0;
                               $x=1;
                               for ($i=$cc_id_num-1; $i >=$cc_id_num_max ; $i--) { 
                                 $row_cookie_cc=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_cardname, cc.cc_photo, cc.cc_interest_desc, cc.cc_doc_url, cc.cc_doc_path, 
                                                                     bk.bi_shortname, org.org_nickname, level.attr_name
                                                              FROM credit_card as cc
                                                              INNER JOIN bank_info as bk ON bk.Tb_index=cc.cc_bi_pk
                                                              INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                              INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                              WHERE cc.Tb_index=:Tb_index", ['Tb_index'=>$cc_id_arr[$i]], 'one');

                                 $card_name=$row_cookie_cc['bi_shortname'].$row_cookie_cc['cc_cardname'].$row_cookie_cc['org_nickname'].$row_cookie_cc['attr_name'];
                                 //-- 特色 --
                                 $card_adv_txt='';
                                 $card_adv=preg_split('/\n/',$row_cookie_cc['cc_interest_desc']);
                                 $y=1;
                                 foreach ($card_adv as $card_adv_one) {
                                  if ($y<=4) {
                                    $card_adv_txt.='<li title="'.$card_adv_one.'"><b>●</b>'.mb_substr($card_adv_one, 0,15,'utf-8').'</li>';
                                  }
                                   $y++;
                                 }
                                 //-- 立即辦卡 --
                                 if (!empty($row_cookie_cc['cc_doc_url'])) {
                                   $cc_doc='<a target="_blank" href="'.$row_cookie_cc['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                 }
                                 elseif(!empty($row_cookie_cc['cc_doc_path'])){
                                   $cc_doc='<a target="_blank" href="'.$row_cookie_cc['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                 }
                                 else{
                                   $cc_doc='';
                                 }

                                 //-- 卡片圖 --
                                 $cc_photo=empty($row_cookie_cc['cc_photo']) ? 'CardSample.png':$row_cookie_cc['cc_photo'];

                                  echo '
                                  <div class="row no-gutters py-3 bankbg_list rank_hot">
                                     <div class="col-md-5 wx-100-ph text-center">
                                       <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$row_cookie_cc['Tb_index'].'&cc_group_id='.$row_cookie_cc['cc_group_id'].'">
                                         <img src="../sys/img/'.$cc_photo.'" alt="'.$card_name.'" title="'.$card_name.'">
                                       </a>
                                     </div>
                                     <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                                       <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$row_cookie_cc['Tb_index'].'&cc_group_id='.$row_cookie_cc['cc_group_id'].'">
                                       <h4>'.$card_name.'</h4>
                                       </a>
                                       <div class="row no-gutters">
                                        <div class="col-md-5 wx-100-ph card_list_txt rank_color">
                                       <ul>
                                         '.$card_adv_txt.'
                                       </ul>
                                     </div>
                                      <div class="col-md-2 wx-100-ph">
                                        <div class="rank_btn">
                                          '.$cc_doc.'
                                          <button type="button" card_id="'.$row_cookie_cc['Tb_index'].'" cc_group_id="'.$row_cookie_cc['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card">加入比較</button>
                                        </div>
                                        <span>謹慎理財 信用至上</span>
                                         </div>
                                        </div>
                                      </div>
                                   </div>';
                                   
                                   //-- 廣告 --
                                   if ($x%3==0) {
                                     echo '
                                     <div class="col-md-12 col">
                                      <div class="test hv-center"><img src="http://placehold.it/750x140" alt="banner"></div>
                                     </div>';
                                   }
                                 $x++;
                               }
                             
                             }
                            ?>


                          </div>
                         
                        
                        </div>
                      
                    <!-- <a class="rank_more warning-layered btnOver" show_num="5" href="javascript:;">顯示更多卡片</a> -->
                    <!--信用卡推薦end -->
                         
                        
                         
                </div>

               </div>
             </div>
            </div>
            <!--版面左側end-->
            
            <?php 
           //-- 版面右側 --
            require 'right_area_div.php';
           ?>
           
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

  </body>
</html>