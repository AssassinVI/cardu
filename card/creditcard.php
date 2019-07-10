<?php 
 require '../share_area/conn.php';
 
 //-- 紀錄瀏覽信用卡 --
 if (empty($_COOKIE['cc_id'])) {
   setcookie('cc_id', $_GET['cc_pk'], time()+3600000, '/');
 }
 else{


  $cc_id_arr=explode(',', $_COOKIE['cc_id']);

  //--- 判斷是否重複 ----
  if (in_array($_GET['cc_pk'], $cc_id_arr)) {
    $index= array_search($_GET['cc_pk'], $cc_id_arr);
    array_splice($cc_id_arr, $index,1);
    $cc_id=implode(',', $cc_id_arr).','.$_GET['cc_pk'];
  }
  else{
    $cc_id=$_COOKIE['cc_id'].','.$_GET['cc_pk'];
  }

  $cc_id_arr=explode(',', $cc_id);

  if (count($cc_id_arr)>10) {
    array_splice($cc_id_arr, 0,1);
  }
  setcookie('cc_id', implode(',', $cc_id_arr), time()+3600000, '/');
 }

 //echo $_COOKIE['cc_id'];

 //setcookie('cc_id', '', time()-3600000,'/');
 //setcookie('cc_id', '', time()-3600000);

 //-- 信用卡資訊 --
 $row_card_group=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_bi_pk, cc.cc_cardname, cc.cc_photo, cc.cc_doc_url, 
                                      cc.cc_doc_path, cc.cc_interest_desc, cc.cc_fun_id, cc.cc_pref_id, cc.cc_stop_publish,
                                      bk.bi_logo, bk.bi_shortname, 
                                      cc.cc_cardorg, org.org_nickname, org.org_image,
                                      cc.cc_cardlevel, level.attr_name
                         FROM credit_card as cc 
                         INNER JOIN bank_info as bk ON bk.Tb_index=cc.cc_bi_pk
                         INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                         INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                         WHERE cc.cc_group_id=:cc_group_id AND cc.cc_stop_card=0
                         ORDER BY org.OrderBy ASC, level.OrderBy ASC", ['cc_group_id'=>$_GET['cc_group_id']]);
 
 //-- 該單卡 --
 $card_one=[];
 foreach ($row_card_group as $card_group) {
   if ($card_group['Tb_index']==$_GET['cc_pk']) {
     $card_one=$card_group;
   }
 }

 //-- 卡名 --
 $card_name=$card_one['bi_shortname'].$card_one['cc_cardname'].'_'.$card_one['org_nickname'].'_'.$card_one['attr_name'];
 
 //-- 判斷停發 --
 $stop_publish_txt=$card_one['cc_stop_publish']==1 ? '(停發)':'';

 //-- 信用卡圖 --
 $cc_photo=empty($card_one['cc_photo']) ? 'CardSample.png':$card_one['cc_photo'];

 //-- 立即辦卡 --
 if (!empty($card_one['cc_doc_url'])) {
   $cc_doc='<a target="_blank" href="'.$card_one['cc_doc_url'].'" class="btn btn-block warning-layered btnOver">立即辦卡</a>';
 }
 elseif(!empty($card_one['cc_doc_path'])){
   $cc_doc='<a target="_blank" href="'.$card_one['cc_doc_path'].'" class="btn btn-block warning-layered btnOver">立即辦卡</a>';
 }
 else{
   $cc_doc='';
 }

 //-- 卡特色 --
 $card_adv_txt='';
 $card_adv=preg_split('/\n/',$card_one['cc_interest_desc']);
 foreach ($card_adv as $card_adv_one) {
   $card_adv_txt.='<div class="col-md-6 py-1"><span><img src="../img/component/li_brown.png"></span>'.$card_adv_one.'</div>';
 }

 //-- 單卡描述 --
 $description=$card_one['bi_shortname'].'-'.$card_one['cc_cardname'].$card_one['org_nickname'].$card_one['attr_name'].'，'.$card_one['cc_interest_desc'];

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $card_one['bi_shortname'].'-'.$card_one['cc_cardname']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="<?php echo $description;?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $card_one['bi_shortname'].'-'.$card_one['cc_cardname']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $card_one['bi_shortname'].'-'.$card_one['cc_cardname']; ?>" />
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
             / <a href="bank_detail.php?bi_pk=<?php echo $card_one['cc_bi_pk'];?>"><?php echo $card_one['bi_shortname'];?></a></p>
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
                            <a class="d-inline" href="bank_detail.php?bi_pk=<?php echo $card_one['cc_bi_pk']; ?>"><?php echo $card_one['bi_shortname']; ?></a>
                            <?php echo $card_one['cc_cardname'].'_'.$card_one['org_nickname'].'_'.$card_one['attr_name'].$stop_publish_txt; ?>
                          </h2>
                          </div>

                           <div class="col-md-4">
                                <!-- 分享 -->
                               <?php 
                                cc_share_btn($FB_URL, $_GET['cc_pk']);
                               ?>
                               <!-- 分享 END -->
                            </div>
                            <div class=" col-md-12 row no-gutters debit_card col">

                            <!-- 信用卡 -->
                            <div class="col-md-5 text-center ">
                             <img class="ccard_img" src="../sys/img/<?php echo $cc_photo;?>"><br>
                             <div class="card_btn  hv-center mt-2 mt-md-0">
                                <?php echo $cc_doc; ?>
                                <button type="button" card_id="<?php echo $card_one['Tb_index'];?>" cc_group_id="<?php echo $card_one['cc_group_id'];?>" card_name="<?php echo $card_name;?>" card_img="<?php echo $cc_photo;?>" class="btn  gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                              </div>
                            </div>
                            
                            <!-- 單卡詳細資訊 -->
                            <div class="col-md-7 ">
                             <div class=" ph-center pl-md-2 text-left">
                               
                               <!-- 信用卡圖 -->
                               
                                <?php 
                                  $row_cardRank=$pdo->select("SELECT ccr.ccs_order, ccr.ccs_cc_so_pk, ccrt.cc_so_cname, ccrt.old_id
                                                              FROM credit_cardrank as ccr 
                                                              INNER JOIN credit_cardrank_type as ccrt ON ccrt.Tb_index=ccr.ccs_cc_so_pk
                                                              WHERE ccr.ccs_cc_pk=:ccs_cc_pk AND ccr.ccs_order<=6", ['ccs_cc_pk'=>$card_one['Tb_index']]);
                                  
                                  echo '<div class="cc_rank mb-md-2 my-2 position-relative">
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
                                 


                                ?>
                               
                               <!-- 信用卡圖 END -->
                               
                               <?php
                                 //-- 卡組織陣列 -- 
                                 $card_org_arr=[];
                                 foreach ($row_card_group as $card_group) {
                                   $card_org_arr[$card_group['cc_cardorg']][]=$card_group;
                                 }
                                 $card_org_txt='';
                                 foreach ($card_org_arr as $card_org) {
                                    
                                    //-- 卡等 --
                                    $card_level_txt='';
                                    foreach ($card_org as $card_level) {
                                      $active=$card_level['Tb_index']==$card_one['Tb_index'] ? 'active' : '';
                                      //-- 停發 --
                                      $cc_stop_publish=$card_level['cc_stop_publish']==1 ? '(停發)':'';
                                      $card_level_txt.='<li class="'.$active.' mr-2"><a href="creditcard.php?cc_pk='.$card_level['Tb_index'].'&cc_group_id='.$card_level['cc_group_id'].'" title="'.$card_level['org_nickname'].'-'.$card_level['attr_name'].'">'.$card_level['attr_name'].$cc_stop_publish.'</a></li>';
                                    }

                                    $active=$card_org[0]['cc_cardorg']==$card_one['cc_cardorg'] ? 'active' : '';
                                    $card_org_txt.='
                                     <li class="oneCard_org mr-1 '.$active.'" now_card="'.$active.'">
                                      <a href="creditcard.php?cc_pk='.$card_org[0]['Tb_index'].'&cc_group_id='.$card_org[0]['cc_group_id'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'">
                                      </a>
                                      <ul class="debit_limit oneCard_level mt-2">
                                      '.$card_level_txt.'
                                      </ul>
                                     </li>';
                                 }

                                 $card_orgLevel_txt='
                                 <ul class="text-left">
                                  '.$card_org_txt.'
                                 </ul>';
                                 echo $card_orgLevel_txt;
                               ?>
                               
                               <!-- 卡功能 -->
                               
                                <?php 
                                 $fun_id_txt='';
                                 $cc_fun_id=explode(',', $card_one['cc_fun_id']);
                                 foreach ($cc_fun_id as $cc_fun_id_one) {
                                   $fun_id_txt.="'".$cc_fun_id_one."',";
                                 }
                                 $fun_id_txt=substr($fun_id_txt, 0,-1);
                                 $row_fun=$pdo->select("SELECT Tb_index, fun_name, card_image FROM card_func WHERE Tb_index IN ($fun_id_txt) ORDER BY OrderBy ASC");
                                 
                                 //-- 小於等於6個 --
                                 if (count($cc_fun_id)<=6) {
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

                                 echo '<div class="cc_fun mb-md-2 position-relative">
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
                             <ul class="pref_icon mt-2">
                              <?php 
                               $pref_id_txt='';
                               $cc_pref_id=explode(',', $card_one['cc_pref_id']);
                               foreach ($cc_pref_id as $cc_pref_id_one) {
                                 $pref_id_txt.="'".$cc_pref_id_one."',";
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
                                                FROM credit_card_eq as cce
                                                INNER JOIN card_eq_item as cei ON cei.Tb_index=cce.eq_id
                                                WHERE cce.card_id=:card_id 
                                                ORDER BY cei.OrderBy ASC", ['card_id'=>$card_one['Tb_index']]);
                     ?>
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" href="javascript:;" tab-target="#special_1" aria-selected="true">重要權益</a>
                          </li>
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">全部權益</a>
                          </li>
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_3-tab" href="javascript:;" tab-target="#special_3" aria-selected="false">資訊內容</a>
                          </li>
                          <li class="nav-item news_tab four_tab">
                            <a class="nav-link py-2" id="special_4-tab" href="javascript:;" tab-target="#special_4" aria-selected="false">網友留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row imp_int_title">
                              <div class="col-md-3 text-center">權益項目</div>
                              <div class="col-md-9 text-center">內容說明(謹慎理財，信用至上)</div>
                            </div>
                            <div class="accordion ccd_interest" id="cc_collapse_div">
                            
                            <?php 
                             
                             $x=1;
                             foreach ($row_im_eq as $im_eq) {
                              
                              if ($im_eq['is_im_eq']==1) {

                                //-- 判斷權益類型 (文字) --
                                $check_dis=$im_eq['eq_type']=='txt' ? 'disabled style="opacity:0;"':'';

                                 echo '
                                 <div class="card txt_detail">
                                  <div class="card-header hv-center px-2" id="imp_int'.$x.'">
                                    <div class="row w-h-100">
                                      <div class="col-md h-center px-0">
                                        <p class="hv-center mb-0">
                                         <label>
                                          <input '.$check_dis.' class="big_checkbox mx-1" type="checkbox" name="imp_check" value="'.$im_eq['eq_id'].'">
                                          <img class="mr-1 eq_icon" src="../sys/img/'.$im_eq['eq_image'].'" alt="">'.$im_eq['eq_name'].'
                                         </label>
                                        </p>
                                      </div>
                                      <div class="col-md-8 ml-4 ml-md-0 h-center border-left border-right">
                                        <p class="mb-0">'.nl2br($im_eq['sm_content']).'</p>
                                      </div>
                                      <div class="col-md-1 hv-center">
                                        <button title="更多資訊" class="btn btn-link angle_down" type="button" data-toggle="collapse" data-target="#imp_int_txt'.$x.'" aria-expanded="true" aria-controls="imp_int_txt'.$x.'" title="更多資訊">
                                          <i class="fa fa-angle-down"></i>
                                        </button>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="imp_int_txt'.$x.'" class="collapse cc_collapse" aria-labelledby="imp_int'.$x.'" >
                                    <div class="card-body">
                                      <div class="row w-h-100">
                                       <!--<div class="col-md-3"></div>-->
                                       <div class="col-md">
                                         <p class="collapse_txt mb-0">
                                          '.nl2br($im_eq['content']).'
                                         </p>
                                       </div>
                                       <!--<div class="col-1"></div>-->
                                    </div>
                                  </div>
                                </div>
                                </div>';
                                $x++;
                              }
                             }
                            ?>
                             

                            </div>
                            <div class="card_btn  text-center pt-2">
                                     <button id="profit_compare" type="button" class="btn warning-layered btnOver mr-2">權益比一比</button>
                                     <button id="profit_clean" type="button" class="btn gray-layered btnOver">清除</button>
                             </div>
                           
                          </div>

                          <!-- 全部權益 -->
                          <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                            <form class="credit_boot">
                              <table>
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


                          <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

                            <?php 
                              $row_c_news=$pdo->select("SELECT ns_ftitle, ns_photo_1, Tb_index, area_id, ns_nt_pk, mt_id
                                                        FROM NewsAndType 
                                                        WHERE mt_id='site2018111910430599' AND ns_bank LIKE :ns_bank 
                                                        ORDER BY ns_vfdate DESC
                                                        LIMIT 0,3", ['ns_bank'=>'%'.$card_one['cc_bi_pk'].'%']);

                            if (count($row_c_news)>0) {
                            ?>
                            <div class="bank_main hole py-2">
                               <h5>相關新聞</h5>
                               <a class="float-right more_ot_btn" href="bank_news.php?bi_pk=<?php echo $card_one['cc_bi_pk'];?>">More</a>
                              </div>

                            <div class="row no-gutters py-2">

                              <?php 
                                foreach ($row_c_news as $c_news) {

                                  $url=news_url($c_news['mt_id'], $c_news['Tb_index'], $c_news['ns_nt_pk'], $c_news['area_id']);
                                  $ns_ftitle=wp_is_mobile() ? $c_news['ns_ftitle'] : mb_substr($c_news['ns_ftitle'], 0,14,'utf-8');

                                  echo '
                                  <div class="col-md-4 col-12 cards-3 text-center py-md-2 py-2">

                                   <div class="row no-gutters ">
                                     <div class="col-md-12 col-6">
                                       <a class="news_list_img" target="_blank" href="'.$url.'" title="'.$c_news['ns_ftitle'].'">
                                           <div class="img_div" style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');">
                                           </div>
                                       </a>
                                     </div>
                                     <div class="col-md-12 col-6 cards-3-ph">
                                       <a href="'.$url.'" target="_blank" title="'.$c_news['ns_ftitle'].'">
                                        <span class="text-center p-0">'.$ns_ftitle.'</span>
                                       </a>
                                     </div>
                                   </div>

                                  </div>';
                                }
                              ?>
                            </div>
                            <?php 
                             }
                            ?>

                            <?php 
                              $row_c_message=$pdo->select("SELECT n.ns_ftitle, n.ns_photo_1, n.Tb_index, n.area_id, n.ns_nt_pk, n.mt_id
                                                        FROM NewsAndType as n 
                                                        INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                        WHERE abc.bank_id=:bank_id AND abc.card_group_id =:card_group_id AND abc.org_id=:org_id AND abc.level_id=:level_id AND 
                                                        n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND n.area_id='at2019021114154632'
                                                        ORDER BY n.ns_vfdate DESC
                                                        LIMIT 0,3", 
                                                        ['bank_id'=>$card_one['cc_bi_pk'], 'card_group_id'=>$card_one['cc_group_id'], 'org_id'=>$card_one['cc_cardorg'], 'level_id'=>$card_one['cc_cardlevel'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                              if (count($row_c_message)>0) {
                            ?>
                          
                            <div class="bank_main hole py-2">
                             <h5>相關好康</h5>
                             <a class="float-right more_ot_btn" href="creditcard_message.php?cc_pk=<?php echo $card_one['Tb_index'];?>">More</a>
                              </div>
                          
                            <div class="row no-gutters py-2">

                              <?php 
                                foreach ($row_c_message as $c_message) {

                                  $url=news_url($c_message['mt_id'], $c_message['Tb_index'], $c_message['ns_nt_pk'], $c_message['area_id']);
                                  $ns_ftitle= wp_is_mobile() ? $c_message['ns_ftitle'] : mb_substr($c_message['ns_ftitle'], 0,14,'utf-8');

                                  echo '

                                  <div class="col-md-4 col-12 cards-3 text-center py-md-2 py-2">

                                   <div class="row no-gutters ">
                                     <div class="col-md-12 col-6">
                                       <a class="news_list_img" target="_blank" href="'.$url.'" title="'.$c_message['ns_ftitle'].'">
                                           <div class="img_div" style="background-image: url(../sys/img/'.$c_message['ns_photo_1'].');">
                                           </div>
                                       </a>
                                     </div>
                                     <div class="col-md-12 col-6 cards-3-ph">
                                       <a href="'.$url.'" target="_blank" title="'.$c_message['ns_ftitle'].'">
                                        <span class="text-center p-0">'.$ns_ftitle.'</span>
                                       </a>
                                     </div>
                                   </div>

                                  </div>';
                                }
                              ?>
                            </div>
                          <?php 
                            } 
                          ?>
                          
                           
                          </div>


                          <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

                           <!--網友留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <div class="bank_main hole">
                         <h5>網友留言</h5>
                         </div>
                        <div class="tab-content" id="myTabContent">
                          

                            <?php 
                              //-- 網友留言 HTML --
                              require '../share_area/discuss_html.php';
                            ?>
                           
                         
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