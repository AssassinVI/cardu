<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <?php 
     $row_bank=$pdo->select("SELECT bi_code, bi_fullname, bi_shortname, bi_tel, bi_tel_card, bi_tel2_card, bi_tel3_card, bi_addr, bi_logo, bi_bank_url, bi_card_url, bd_url, bd_path
                             FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['bi_pk']], 'one');

     $bi_tel_card=$row_bank['bi_tel_card'].'、';
     $bi_tel_card=empty($row_bank['bi_tel2_card']) ? $bi_tel_card : $bi_tel_card.$row_bank['bi_tel2_card'].'、';
     $bi_tel_card=empty($row_bank['bi_tel3_card']) ? $bi_tel_card : $bi_tel_card.$row_bank['bi_tel3_card'].'、';
     $bi_tel_card=mb_substr($bi_tel_card, 0,-1,'utf-8');
     
     $bi_addr=explode(',', $row_bank['bi_addr']);
     $bi_addr=$bi_addr[count($bi_addr)-2].$bi_addr[count($bi_addr)-1];
    ?>

    <title>卡優新聞網 - 卡情報 > 銀行總覽</title>

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
  <body class="cardNews_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="bank_list.php">銀行總覽</a> / <a href="javascript:;"><?php echo $row_bank['bi_shortname']; ?></a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">
               <div class="row">



                    <div class="col-md-12 col">
                      <div class="cardshap ">
                        
                        <div class="pt-md-3 detail_title">
                        <div class="col-md-12">
                            <div class="row ticketbg">
                              
                             <div class="col-md-4 hv-center">
                              <div>
                               <img src="../sys/img/<?php echo $row_bank['bi_logo']; ?>">
                               <h6>銀行代碼:<?php echo $row_bank['bi_code']; ?></h6>
                              </div>
                             </div>
                             
                             <div class="col-md-8">
                             <h4><?php echo $row_bank['bi_fullname'].'(簡稱'.$row_bank['bi_shortname'].')'; ?></h4>
                             <hr>
                             <p>
                              總行電話：<?php echo $row_bank['bi_tel']; ?> <br>           
                              信用卡服務專線： <?php echo $bi_tel_card; ?><br>
                              總行地址： <?php echo $bi_addr; ?> <br>
                              銀行網址：<a href="<?php echo $row_bank['bi_bank_url']; ?>"><?php echo $row_bank['bi_bank_url']; ?></a>
                              </p>
                             </div>
 
                           </div> 
                          </div>
                          <div class="col-md-12">
                               <div class="row">
                                <div class="col-md-4">
                                  <?php 
                                   if ($row_bank['bd_src']==1) {
                                     echo '<a class="applycard_btn warning-layered btnOver" href="'.$row_bank['bd_path'].'" target="_blank">立即辦卡</a>';
                                   }
                                   elseif($row_bank['bd_src']==2){
                                     echo '<a class="applycard_btn warning-layered btnOver" href="'.$row_bank['bd_url'].'" target="_blank">立即辦卡</a>';
                                   } 
                                  ?>
                                  
                                </div>
                                <div class="col-md-8 col">
                                  <div class="bank_btn">
                                   <a class="gray-layered btnOver" href="<?php echo $row_bank['bi_card_url']; ?>" target="_blank" >信用卡網址</a>
                                   <a class="gray-layered btnOver" href="javascript:;" title="新聞">我要訂閱</a>
                                </div>
                               </div>
                              </div>

                          </div> 
                         </div>
                   
                         
                        <!--廣告-->
                        <div class="col-md-12 col phone_hidden"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                        <!--banner end -->

                        <!--手機板廣告-->
                        <div class="col-md-12 row">
                            <div class="col-md-6 col banner d-md-none d-sm-block ">
                                <img src="http://placehold.it/365x100" alt="">
                            </div>
                        </div>
                        <!--廣告end-->
                        
                    <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">信用卡</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">金融卡</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">相關資訊</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content p-0" id="myTabContent">

                          <!--信用卡-->
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                          <?php 
                            $row_bk_card=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_cardname, cc.cc_photo,
                                                              cc.cc_cardorg, org.org_nickname, org.org_image, 
                                                              cc.cc_cardlevel, level.attr_name
                                                       FROM credit_card as cc 
                                                       INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                       INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                       WHERE cc.cc_bi_pk=:cc_bi_pk AND cc.cc_stop_publish=0 AND cc.cc_stop_card=0
                                                       ORDER BY cc.cc_group_id DESC, org.OrderBy ASC, level.OrderBy ASC",
                                                       ['cc_bi_pk'=>$_GET['bi_pk']]);
                            
                            //-- 卡群組陣列 --
                            $card_group_arr=[];
                            foreach ($row_bk_card as $bk_card) {
                              $card_group_arr[$bk_card['cc_group_id']][]=$bk_card;
                            }
                            $x=1;
                            foreach ($card_group_arr as $card_group) {

                              
                              //--- 卡組織陣列 ---
                              $c_org_arr=[];
                              foreach ($card_group as $card_group_one) {
                                $c_org_arr[$card_group_one['cc_cardorg']][]=$card_group_one;
                              }
                              $c_org_txt='';
                              foreach ($c_org_arr as $c_org) {


                                //--- 卡等 ---
                                $c_level_txt='';
                                foreach ($c_org as $c_org_one) {
                                  $c_level_txt.='<a href="creditcard.php?cc_pk='.$c_org_one['Tb_index'].'&cc_group_id='.$c_org_one['cc_group_id'].'">'.$c_org_one['attr_name'].'</a>、';
                                }
                                
                                $c_org_txt.='<li>
                                              <img src="../sys/img/'.$c_org[0]['org_image'].'" title="'.$c_org[0]['org_nickname'].'">
                                              '.mb_substr($c_level_txt, 0,-1,'utf-8').'
                                            </li>';
                              }


                              //-- 卡片圖 --
                              $cc_photo=empty($card_group[0]['cc_photo']) ? 'CardSample.png':$card_group[0]['cc_photo'];

                              $card_txt='
                              <div class="row no-gutters px-2 py-3 bankbg_list">
                              <div class="col-md-4">
                                <a class="bank_all_img" href="type.php?bi_pk01='.$_GET['bi_pk'].'&gid='.$card_group[0]['cc_group_id'].'">
                                  <img src="../sys/img/'.$cc_photo.'" alt="" title="'.$card_group[0]['cc_cardname'].'">
                                </a>
                                <a class="card_name my-2" href="type.php?bi_pk01='.$_GET['bi_pk'].'&gid='.$card_group[0]['cc_group_id'].'">'.$card_group[0]['cc_cardname'].'</a>
                              </div>
                              <div class="col-md-8 card_list_txt h-center">
                                <div class="bank_list">
                                <ul>
                                 '.$c_org_txt.'
                                </ul>
                                </div>
                              </div>
                            </div>';

                            echo $card_txt;


                            //---- 廣告 ----
                            if ($x%6==0) {

                              //-- 判斷手機 --
                              if (wp_is_mobile()){
                                echo '
                                <div class="col-md-12 row">
                                    <div class="col-md-6 col banner d-md-none d-sm-block ">
                                        <img src="http://placehold.it/365x100" alt="">
                                    </div>
                                </div>';
                              }
                              else{
                                echo '<div class="col-md-12 col phone_hidden"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>';
                              }

                            }
                            elseif($x%3==0){
                              
                              //-- 判斷手機 --
                              if (wp_is_mobile()){
                                echo '
                                <div class="col-md-12 row">
                                    <div class="col-md-6 col banner d-md-none d-sm-block ">
                                        <img src="http://placehold.it/365x100" alt="">
                                    </div>
                                </div>';
                              }
                              else{
                                echo '
                                <div class="col-md-12 row phone_hidden">
                                     <div class="col-md-6 col ">
                                        <img class="w-100" src="http://placehold.it/365x100" alt="" >
                                    </div>
                                    <div class="col-md-6 col">
                                         <img class="w-100" src="http://placehold.it/365x100">
                                    </div>
                                </div>';
                              }
                            }


                            $x++;
                            }
                          ?>

                          </div>
                          <!--信用卡end -->

                          
                          <!--金融卡 -->
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">

                            
                          <?php 
                            $row_bk_card=$pdo->select("SELECT dc.Tb_index, dc.dc_group_id, dc.dc_cardname, dc.dc_photo,
                                                              dc.dc_debitorg, org.org_nickname, org.org_image, 
                                                              dc.dc_debitlevel, level.attr_name
                                                       FROM debit_card as dc 
                                                       INNER JOIN card_org as org ON org.Tb_index=dc.dc_debitorg
                                                       INNER JOIN card_level as level ON level.Tb_index=dc.dc_debitlevel
                                                       WHERE dc.dc_bi_pk=:dc_bi_pk AND dc.dc_stop_publish=0 AND dc.dc_stop_card=0
                                                       ORDER BY dc.dc_group_id DESC, org.OrderBy ASC, level.OrderBy ASC",
                                                       ['dc_bi_pk'=>$_GET['bi_pk']]);
                            
                            //-- 卡群組陣列 --
                            $card_group_arr=[];
                            foreach ($row_bk_card as $bk_card) {
                              $card_group_arr[$bk_card['dc_group_id']][]=$bk_card;
                            }
                            $x=1;
                            foreach ($card_group_arr as $card_group) {

                              
                              //--- 卡組織陣列 ---
                              $c_org_arr=[];
                              foreach ($card_group as $card_group_one) {
                                $c_org_arr[$card_group_one['dc_debitorg']][]=$card_group_one;
                              }
                              $c_org_txt='';
                              foreach ($c_org_arr as $c_org) {


                                //--- 卡等 ---
                                // $c_level_txt='';
                                // foreach ($c_org as $c_org_one) {
                                //   $c_level_txt.='<a href="debitcard.php?dc_pk='.$c_org_one['Tb_index'].'&dc_group_id='.$c_org_one['dc_group_id'].'">'.$c_org_one['attr_name'].'</a>、';
                                // }
                                
                                $c_org_txt.='<li>
                                              <a href="debitcard.php?dc_pk='.$c_org[0]['Tb_index'].'&dc_group_id='.$c_org[0]['dc_group_id'].'">
                                                <img src="../sys/img/'.$c_org[0]['org_image'].'" title="'.$c_org[0]['org_nickname'].'">
                                              </a>
                                            </li>';
                              }


                              //-- 卡片圖 --
                              $dc_photo=empty($card_group[0]['dc_photo']) ? 'CardSample.png':$card_group[0]['dc_photo'];

                              $card_txt='
                              <div class="row no-gutters px-2 py-3 bankbg_list">
                              <div class="col-md-4">
                                <a class="bank_all_img" href="type.php?bi_pk01='.$_GET['bi_pk'].'&gid='.$card_group[0]['dc_group_id'].'">
                                  <img src="../sys/img/'.$dc_photo.'" alt="" title="'.$card_group[0]['dc_cardname'].'">
                                </a>
                                <a class="card_name my-2" href="type.php?bi_pk01='.$_GET['bi_pk'].'&gid='.$card_group[0]['dc_group_id'].'">'.$card_group[0]['dc_cardname'].'</a>
                              </div>
                              <div class="col-md-8 card_list_txt h-center">
                                <div class="bank_list">
                                <ul>
                                 '.$c_org_txt.'
                                </ul>
                                </div>
                              </div>
                            </div>';

                            echo $card_txt;


                            //---- 廣告 ----
                            if ($x%6==0) {

                              //-- 判斷手機 --
                              if (wp_is_mobile()){
                                echo '
                                <div class="col-md-12 row">
                                    <div class="col-md-6 col banner d-md-none d-sm-block ">
                                        <img src="http://placehold.it/365x100" alt="">
                                    </div>
                                </div>';
                              }
                              else{
                                echo '<div class="col-md-12 col phone_hidden"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>';
                              }

                            }
                            elseif($x%3==0){
                              
                              //-- 判斷手機 --
                              if (wp_is_mobile()){
                                echo '
                                <div class="col-md-12 row">
                                    <div class="col-md-6 col banner d-md-none d-sm-block ">
                                        <img src="http://placehold.it/365x100" alt="">
                                    </div>
                                </div>';
                              }
                              else{
                                echo '
                                <div class="col-md-12 row phone_hidden">
                                     <div class="col-md-6 col ">
                                        <img class="w-100" src="http://placehold.it/365x100" alt="" >
                                    </div>
                                    <div class="col-md-6 col">
                                         <img class="w-100" src="http://placehold.it/365x100">
                                    </div>
                                </div>';
                              }
                            }


                            $x++;
                            }
                          ?>

                          
                          </div>
                          <!--金融卡 END -->

                           <div class="tab-pane fade py-2" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">

                               <div class="bank_main hole">
                               <h5>相關新聞</h5>
                              </div>
                            
                            <div class="row no-gutters py-2">

                              <?php 
                                $card_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, mt_id, ns_nt_pk, area_id
                                                         FROM NewsAndType 
                                                         WHERE mt_id='site2018111910430599' AND ns_bank LIKE :ns_bank 
                                                         ORDER BY ns_vfdate DESC LIMIT 0,3", ['ns_bank'=>'%'.$_GET['bi_pk'].'%']);

                                foreach ($card_news as $card_news_one) {

                                  //-------------- 網址判斷 ------------------
                                  $news_url=news_url($card_news_one['mt_id'], $card_news_one['Tb_index'], $card_news_one['ns_nt_pk'], $card_news_one['area_id']);
                                  $ns_ftitle=mb_substr($card_news_one['ns_ftitle'], 0,14, 'utf-8');

                                  echo '
                                  <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="'.$news_url.'">
                                       <div class="img_div w-100-ph" title="'.$card_news_one['ns_ftitle'].'" style="background-image: url(../sys/img/'.$card_news_one['ns_photo_1'].');">
                                       </div>
                                       <span class="text-center">'.$ns_ftitle.'</span>
                                   </a>
                                  </div>';
                                }
                              ?>
                                <!-- <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <span class="text-center">遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                </div>
                                <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <span class="text-center">遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                </div>
                                <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <span class="text-center">遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                </div> -->
                            </div>
                          
                            
                            <div class="bank_main hole">
                              <h5>相關好康</h5>
                              </div>
                           
                            <div class="row no-gutters py-2">
                              <?php 
                                $card_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, mt_id, ns_nt_pk, area_id
                                                         FROM NewsAndType 
                                                         WHERE area_id='at2019021114154632' AND ns_bank LIKE :ns_bank 
                                                         ORDER BY ns_vfdate DESC LIMIT 0,3", ['ns_bank'=>'%'.$_GET['bi_pk'].'%']);

                                foreach ($card_news as $card_news_one) {

                                  //-------------- 網址判斷 ------------------
                                  $news_url=news_url($card_news_one['mt_id'], $card_news_one['Tb_index'], $card_news_one['ns_nt_pk'], $card_news_one['area_id']);
                                  $ns_ftitle=mb_substr($card_news_one['ns_ftitle'], 0,14, 'utf-8');

                                  echo '
                                  <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="'.$news_url.'">
                                       <div class="img_div w-100-ph" title="'.$card_news_one['ns_ftitle'].'" style="background-image: url(../sys/img/'.$card_news_one['ns_photo_1'].');">
                                       </div>
                                       <span class="text-center">'.$ns_ftitle.'</span>
                                   </a>
                                  </div>';
                                }
                              ?>
                                <!-- <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <span class="text-center">遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                </div>
                                <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <span class="text-center">遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                </div>
                                <div class="col-md-4 col-12 cards-3 text-center">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <span class="text-center">遊日血拚大回饋，信用卡大調查</span>
                                   </a>
                                </div> -->
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
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php require 'right_area_div.php'; ?>
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