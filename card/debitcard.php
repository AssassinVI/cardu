<?php 
 require '../share_area/conn.php';
 
 //-- 紀錄瀏覽信用卡 --
 // if (empty($_COOKIE['dc_id'])) {
 //   setcookie('dc_id', $_GET['dc_pk'], time()+3600000, '/');
 // }
 // else{


 //  $dc_id_arr=explode(',', $_COOKIE['dc_id']);

 //  //--- 判斷是否重複 ----
 //  if (in_array($_GET['dc_pk'], $dc_id_arr)) {
 //    $index= array_search($_GET['dc_pk'], $dc_id_arr);
 //    array_splice($dc_id_arr, $index,1);
 //    $dc_id=implode(',', $dc_id_arr).','.$_GET['dc_pk'];
 //  }
 //  else{
 //    $dc_id=$_COOKIE['dc_id'].','.$_GET['dc_pk'];
 //  }

 //  $dc_id_arr=explode(',', $dc_id);

 //  if (count($dc_id_arr)>10) {
 //    array_splice($dc_id_arr, 0,1);
 //  }
 //  setcookie('dc_id', implode(',', $dc_id_arr), time()+3600000, '/');
 // }

 //echo $_COOKIE['dc_id'];

 //setcookie('dc_id', '', time()-3600000,'/');
 //setcookie('dc_id', '', time()-3600000);

 //-- 信用卡資訊 --
 $row_card_group=$pdo->select("SELECT dc.Tb_index, dc.dc_group_id, dc.dc_bi_pk, dc.dc_cardname, dc.dc_photo, dc.dc_doc_url, 
                                      dc.dc_doc_path, dc.dc_interest_desc, dc.dc_fun_id, dc.dc_pref_id, dc.dc_stop_publish,
                                      bk.bi_logo, bk.bi_shortname, 
                                      dc.dc_debitorg, org.org_nickname, org.org_image,
                                      dc.dc_debitlevel, level.attr_name
                         FROM debit_card as dc 
                         INNER JOIN bank_info as bk ON bk.Tb_index=dc.dc_bi_pk
                         INNER JOIN card_org as org ON org.Tb_index=dc.dc_debitorg
                         INNER JOIN card_level as level ON level.Tb_index=dc.dc_debitlevel
                         WHERE dc.dc_group_id=:dc_group_id AND dc.dc_stop_card=0
                         ORDER BY org.OrderBy ASC, level.OrderBy ASC", ['dc_group_id'=>$_GET['dc_group_id']]);
 
 //-- 該單卡 --
 $card_one=[];
 foreach ($row_card_group as $card_group) {
   if ($card_group['Tb_index']==$_GET['dc_pk']) {
     $card_one=$card_group;
   }
 }

 //-- 卡名 --
 $card_name=$card_one['bi_shortname'].$card_one['dc_cardname'].'_'.$card_one['org_nickname'].'_'.$card_one['attr_name'];
 
 //-- 判斷停發 --
 $stop_publish_txt=$card_one['dc_stop_publish']==1 ? '(停發)':'';

 //-- 信用卡圖 --
 $dc_photo=empty($card_one['dc_photo']) ? 'CardSample.png':$card_one['dc_photo'];

 //-- 立即辦卡 --
 if (!empty($card_one['dc_doc_url'])) {
   $dc_doc='<a target="_blank" href="'.$card_one['dc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
 }
 elseif(!empty($card_one['dc_doc_path'])){
   $dc_doc='<a target="_blank" href="'.$card_one['dc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
 }
 else{
   $dc_doc='';
 }

 //-- 卡特色 --
 $card_adv_txt='';
 $card_adv=preg_split('/\n/',$card_one['dc_interest_desc']);
 foreach ($card_adv as $card_adv_one) {
   $card_adv_txt.='<div class="col-md-6 py-1"><span><img src="../img/component/li_brown.png"></span>'.$card_adv_one.'</div>';
 }

 //-- 單卡描述 --
 $description=$card_one['bi_shortname'].'-'.$card_one['dc_cardname'].$card_one['org_nickname'].$card_one['attr_name'].'，'.$card_one['dc_interest_desc'];

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $card_one['bi_shortname'].'-'.$card_one['dc_cardname']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="<?php echo $description;?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $card_one['bi_shortname'].'-'.$card_one['dc_cardname']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $card_one['bi_shortname'].'-'.$card_one['dc_cardname']; ?>" />
    <meta property="og:description" content="<?php echo $description;?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="<?php //echo $URL;?>" /> -->
      
      
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="card_browse.php">卡總覽</a>
             / <a href="bank_detail.php?bi_pk=<?php echo $card_one['dc_bi_pk'];?>"><?php echo $card_one['bi_shortname'];?></a></p>
          </div>
        </div>
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="row no-gutters pt-3 mx-3 detail_title">
                          <div class="col-md-8">
                          <h2>
                            <i><img style="width: 30px;" src="../sys/img/<?php echo $card_one['bi_logo'];?>"></i> 
                            <a class="d-inline" href="bank_detail.php?bi_pk=<?php echo $card_one['dc_bi_pk']; ?>"><?php echo $card_one['bi_shortname']; ?></a>
                            <?php echo $card_one['dc_cardname'].'_'.$card_one['org_nickname'].'_'.$card_one['attr_name'].$stop_publish_txt; ?>
                          </h2>
                          </div>

                           <div class="col-md-4">
                                <!-- 分享 -->
                               <div class="search_div hv-center">
                                <div class="fb-like mr-2" data-href="<?php echo $FB_URL;?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=319016928941764&display=popup&link=<?php echo $FB_URL;?>&redirect_uri=https://www.facebook.com/', 'FB分享', config='height=600,width=800');"><img src="../img/component/search/fb.png" alt="" title="分享">
                                 </a>
                                 <a class="search_btn" href="javascript:;" onclick="window.open('https://social-plugins.line.me/lineit/share?url=<?php echo $FB_URL;?>', 'LINE分享', config='height=600,width=800');"><img src="../img/component/search/line.png" alt="" title="Line">
                                 </a>
                                 <a class="search_btn cc_message_btn" href="javascript:;"><img src="../img/component/search/message.png" alt="" title="訊息"></a>
                                 <a id="arrow_btn" class="search_btn" href="javascript:;"><img src="../img/component/search/arrow.png" alt="" title="更多"></a>
                               </div>
                               <div class="more_search">
                                 <!-- <a target="_blank" href="print.php?<?php //echo $temparray[1]?>"><img src="../img/component/search/print.png" alt="" title="列印"></a> -->
                                 <a href="javascript:;" data-fancybox data-src="#member_div"><img src="../img/component/search/work.png" alt="" title="收藏"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_mail.php"><img src="../img/component/search/mail.png" alt="" title="信箱"></a>
                                 <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_error.php"><img src="../img/component/search/mood.png" alt="" title="回報"></a>
                               </div>
                               <!-- 分享 END -->
                            </div>
                            <div class=" col-md-12 row no-gutters debit_card col">

                            <!-- 信用卡 -->
                            <div class="col-md-5 text-center ">
                             <img class="ccard_img" src="../sys/img/<?php echo $dc_photo;?>"><br>
                             <div class="card_btn  hv-center">
                                <?php echo $dc_doc; ?>
                                <button type="button" card_id="<?php echo $card_one['Tb_index'];?>" dc_group_id="<?php echo $card_one['dc_group_id'];?>" card_name="<?php echo $card_name;?>" card_img="<?php echo $dc_photo;?>" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                              </div>
                            </div>
                            
                            <!-- 單卡詳細資訊 -->
                            <div class="col-md-7 ">
                             <div class=" ph-center pl-md-2">
                               
                               <!-- 信用卡圖 -->
                               
                                <?php 
                                  $row_cardRank=$pdo->select("SELECT ccr.ccs_order, ccr.ccs_cc_so_pk, ccrt.cc_so_cname, ccrt.old_id
                                                              FROM credit_cardrank as ccr 
                                                              INNER JOIN credit_cardrank_type as ccrt ON ccrt.Tb_index=ccr.ccs_cc_so_pk
                                                              WHERE ccr.ccs_cc_pk=:ccs_cc_pk AND ccr.ccs_order<=6", ['ccs_cc_pk'=>$card_one['Tb_index']]);
                                  
                                  //-- 小於等於2個 --
                                  if (count($row_cardRank)<=2) {
                                    echo '<ul>';
                                    foreach ($row_cardRank as $cardRank) {
                                      echo '
                                      <li class="mr-md-2 cardRank">
                                        <a href="../rank/cardrank.php?'.$cardRank['old_id'].'"><img src="../img/component/ccprize.png">
                                          <h5>'.$cardRank['cc_so_cname'].'</h5>
                                          <b>'.$cardRank['ccs_order'].'</b>
                                        </a>
                                      </li>';
                                    }
                                    echo '</ul>';
                                  }
                                  //-- 大於2個 --
                                  else{

                                    echo '<div class="cc_rank mb-md-2 position-relative">
                                          <div class="swiper-container mr-md-5">
                                             <div class="swiper-wrapper">';

                                     foreach ($row_cardRank as $cardRank) {
                                       echo '<div class="swiper-slide cardRank">
                                              <a href="../rank/cardrank.php?'.$cardRank['old_id'].'"><img src="../img/component/ccprize.png">
                                                <h5>'.$cardRank['cc_so_cname'].'</h5>
                                                <b>'.$cardRank['ccs_order'].'</b>
                                              </a>
                                            </div>';
                                     }

                                     echo '</div>
                                         
                                      </div>
                                      <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                      <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                      </div>';
                                  }
                                 


                                ?>
                               
                               <!-- 信用卡圖 END -->
                               
                               <?php
                                 //-- 卡組織陣列 -- 
                                 $card_org_arr=[];
                                 foreach ($row_card_group as $card_group) {
                                   $card_org_arr[$card_group['dc_debitorg']][]=$card_group;
                                 }
                                 $card_org_txt='';
                                 foreach ($card_org_arr as $card_org) {
                                    
                                    //-- 卡等 --
                                    $card_level_txt='';
                                    foreach ($card_org as $card_level) {
                                      $active=$card_level['Tb_index']==$card_one['Tb_index'] ? 'active' : '';
                                      //-- 停發 --
                                      $dc_stop_publish=$card_level['dc_stop_publish']==1 ? '(停發)':'';
                                      $card_level_txt.='<li class="'.$active.' mr-md-2"><a href="debitcard.php?dc_pk='.$card_level['Tb_index'].'&dc_group_id='.$card_level['dc_group_id'].'" title="'.$card_level['org_nickname'].'-'.$card_level['attr_name'].'">'.$card_level['attr_name'].$dc_stop_publish.'</a></li>';
                                    }

                                    $active=$card_org[0]['dc_debitorg']==$card_one['dc_debitorg'] ? 'active' : '';
                                    $card_org_txt.='
                                     <li class="oneCard_org mr-md-1 '.$active.'" now_card="'.$active.'">
                                      <a href="debitcard.php?dc_pk='.$card_org[0]['Tb_index'].'&dc_group_id='.$card_org[0]['dc_group_id'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'">
                                      </a>
                                      <ul class="debit_limit oneCard_level mt-md-2">
                                      '.$card_level_txt.'
                                      </ul>
                                     </li>';
                                 }

                                 $card_orgLevel_txt='
                                 <ul>
                                  '.$card_org_txt.'
                                 </ul>';
                                 echo $card_orgLevel_txt;
                               ?>
                               
                               <!-- 卡功能 -->
                               
                                <?php 
                                 $fun_id_txt='';
                                 $dc_fun_id=explode(',', $card_one['dc_fun_id']);
                                 foreach ($dc_fun_id as $dc_fun_id_one) {
                                   $fun_id_txt.="'".$dc_fun_id_one."',";
                                 }
                                 $fun_id_txt=substr($fun_id_txt, 0,-1);
                                 $row_fun=$pdo->select("SELECT Tb_index, fun_name, card_image FROM card_func WHERE Tb_index IN ($fun_id_txt) ORDER BY OrderBy ASC");
                                 
                                 //-- 小於等於6個 --
                                 if (count($dc_fun_id)<=6) {
                                   echo '<ul class="crecard_icon">';
                                   foreach ($row_fun as $fun_one) {
                                     
                                     echo '<li class="pr-1">
                                            <a class="ccard_icon_js" href="card_browse.php?func='.$fun_one['Tb_index'].'">
                                              <img class="wh-50px" src="../sys/img/'.$fun_one['card_image'].'" title="'.$fun_one['fun_name'].'">
                                            </a>
                                          </li>';
                                   }
                                   echo '</ul>';
                                 }
                                 //-- 大於6個 --
                                 else{

                                 echo '<div class="dc_fun mb-md-2 position-relative">
                                       <div class="swiper-container mr-md-5">
                                          <div class="swiper-wrapper">';

                                  foreach ($row_fun as $fun_one) {
                                    echo '<div class="swiper-slide">
                                           <a class="ccard_icon_js" href="card_browse.php?func='.$fun_one['Tb_index'].'">
                                             <img class="wh-50px" src="../sys/img/'.$fun_one['card_image'].'" title="'.$fun_one['fun_name'].'">
                                           </a>
                                         </div>';
                                  }

                                  echo '</div>
                                      
                                   </div>
                                   <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                   <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                   </div>';
                                 }
                                 
                                ?>

                               
                               <!-- 卡功能 END -->
                             
                             <!-- 權益優惠 -->
                             <ul class="pref_icon">
                              <?php 
                               $pref_id_txt='';
                               $dc_pref_id=explode(',', $card_one['dc_pref_id']);
                               foreach ($dc_pref_id as $dc_pref_id_one) {
                                 $pref_id_txt.="'".$dc_pref_id_one."',";
                               }
                               $pref_id_txt=substr($pref_id_txt, 0,-1);

                               $row_pref=$pdo->select("SELECT Tb_index, pref_name, pref_image FROM card_pref WHERE Tb_index IN ($pref_id_txt) ORDER BY OrderBy ASC");
                               foreach ($row_pref as $pref_one) {
                                 
                                 echo '<li class="pl-1">
                                        <a class="ccard_icon_js" href="card_browse.php?pref='.$pref_one['Tb_index'].'">
                                          <img src="../sys/img/'.$pref_one['pref_image'].'" title="'.$pref_one['pref_name'].'">
                                        </a>
                                      </li>';
                               }
                              ?>
                             </ul>
                             <!-- 權益優惠 END -->
                             
                             </div>
                             </div>
                             <!-- 單卡詳細資訊 END -->
                             
                             
                           
                           
                          </div> 
                            
                            <!-- 信用卡特色 -->
                            <div class="col-md-12 row no-gutters mt-2 mb-3 newcard_g cardshap">
                              <?php echo $card_adv_txt; ?>
                            </div> 
                            <!-- 信用卡特色 END -->
                         
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

                          
                     <!--權益項目-->
                     <?php 
                       $row_im_eq=$pdo->select("SELECT cce.eq_id, cce.content, cce.sm_content,
                                                       cei.eq_name, cei.eq_image, cei.eq_type, cei.is_im_eq
                                                FROM debit_card_eq as cce
                                                INNER JOIN card_eq_item as cei ON cei.Tb_index=cce.eq_id
                                                WHERE cce.card_id=:card_id 
                                                ORDER BY cei.OrderBy ASC", ['card_id'=>$card_one['Tb_index']]);
                     ?>
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link active py-2" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="true">全部權益</a>
                          </li>
                          
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_4-tab" href="javascript:;" tab-target="#special_4" aria-selected="false">網友留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         

                          <!-- 全部權益 -->
                          <div class="tab-pane fade show active" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                            <form class="credit_boot">
                              <table class="w-100">
                                <thead>
                                <tr>
                                  <th>權益項目</th>
                                  <th>內容說明(謹慎理財，信用至上)</th>
                                </tr>
                               </thead>
                               <tbody>

                                <?php 
                                foreach ($row_im_eq as $im_eq) {

                                  //-- 判斷權益類型 (文字) --
                                  $check_dis=$im_eq['eq_type']=='txt' ? 'disabled style="opacity:0;"':'';

                                  echo '
                                  <tr>
                                   <td class="nowrap">
                                    <label>
                                     <input type="checkbox" '.$check_dis.' name="all_profit" value="'.$im_eq['eq_id'].'">　'.$im_eq['eq_name'].'
                                    </label>
                                   </td>
                                   <td>'.nl2br($im_eq['content']).'</td>
                                  </tr>';
                                }
                                ?>
                               
                                </tbody>
                              </table>
                               <div class="card_btn  text-center pt-2">
                                        <button id="all_profit_compare" type="button" class="btn warning-layered btnOver mr-2">權益比一比</button>
                                        <button id="all_profit_clean" type="button" class="btn gray-layered btnOver">清除</button>
                                </div>
                            </form>
                          </div>
                          <!-- 全部權益 END -->



                          <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

                           <!--網友留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <div class="bank_main hole">
                         <h5>網友留言</h5>
                         </div>
                        <div class="tab-content" id="myTabContent">
                          

                            <p>您尚未登入，請先<a href="#">登入會員</a></p>
                           
                          
                         
                        </div>
                      </div>
                    </div>
                    <!--網友留言end -->


                    <!--Facebook留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                         <div class="bank_main hole">
                         <h5>Facebook留言</h5>
                         </div>
                        <div class="tab-content" id="myTabContent">
                          

                            <div class="fb-comments" data-width="100%" data-href="<?php echo $FB_URL;?>" data-numposts="5"></div>
                           

                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->

                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--權益項目end -->
                    
                   
                    
                    <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    
                    <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
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
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card2.png" alt="">
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
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card3.png" alt="">
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
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->
                    

                   


                   

                   <div class="col-12 py-4">
                    </div>




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
              if (!wp_is_mobile()) {
                require 'right_area_div.php';
              }
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