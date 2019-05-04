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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡排行</a> / <a href="javascript:;">新卡人氣排行</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                <div class="row">

                  <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap darkpurple_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a id="newCard_a" class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">新卡人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a id="addCard_a" class="nav-link py-2" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">辦卡人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a id="viewCard_a" class="nav-link py-2" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">點閱人氣<span class="phone_hidden">排行</span></a>
                          </li>
                        </ul>


                        <div class="tab-content p-0" id="myTabContent">

                          <!-- 新卡人氣排行 -->
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                            <!-- 原生廣告 -->
                            <div class="row no-gutters rank_ad">
                               <div class="col-md-5 wx-100-ph hv-center">
                                <div class="row">
                                  <div class="col-md-2 col-2 ">
                                   <img src="../img/component/hot.png">
                                  </div>
                                  <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                    <a class="popular_list_img" href="#">
                                     <img src="../img/component/card1.png" alt="" title="新聞">
                                    </a>
                                  </div>
                                </div>
                               </div>
                             <div class="col-md-7 wx-100-ph ad_rank rank_color">
                               <div class="row no-gutters h-center">
                                <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                  <img src="../img/component/ad_sm2.png">
                                </div>
                               </div>
                             </div>
                            </div>
                            <!-- 原生廣告 END -->


                            <?php 
                              $row_new_card=$pdo->select("SELECT bc.card_group_id
                                                          FROM appNews_bank_card as bc
                                                          INNER JOIN appNews as news ON bc.news_id=news.Tb_index
                                                          WHERE news.ns_nt_pk='nt201902121004593' AND news.ns_verify=3 AND news.ns_vfdate >=:month_ago
                                                          GROUP BY bc.card_group_id
                                                          ORDER BY news.ns_viewcount DESC, news.ns_mobvecount DESC", ['month_ago'=>date('Y-m-d H:i:s',strtotime('-3 month'))]);
                              $x=1;
                              foreach ($row_new_card as $new_card_one) {

                                $row_car_d=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name, cc.cc_interest_desc, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_card as cc
                                                         INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                                         INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                         WHERE cc.cc_group_id=:cc_group_id
                                                         ORDER BY level.OrderBy ASC
                                                         LIMIT 0,1", ['cc_group_id'=>$new_card_one['card_group_id']], 'one');


                                //-- 卡名 --
                                $card_name=$row_car_d['bi_shortname'].'_'.$row_car_d['cc_cardname'].'_'.$row_car_d['org_nickname'].$row_car_d['attr_name'];
                                //-- 卡特色 --
                                $card_adv_txt='';
                                $card_adv=preg_split('/\n/',$row_car_d['cc_interest_desc']);
                                foreach ($card_adv as $card_adv_one) {
                                  $card_adv_txt.='<li><b>●</b>'.$card_adv_one.'</li>';
                                }
                                //-- 立即辦卡 --
                                if (!empty($row_car_d['cc_doc_url'])) {
                                  $cc_doc='<a target="_blank" href="'.$row_car_d['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                elseif(!empty($row_car_d['cc_doc_path'])){
                                  $cc_doc='<a target="_blank" href="'.$row_car_d['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                else{
                                  $cc_doc='';
                                }
                                //-- 卡片圖 --
                                $cc_photo=empty($row_car_d['cc_photo']) ? 'CardSample.png':$row_car_d['cc_photo'];
                                //-- 隱藏更多卡片 --
                                $is_d_none=$x>9 ? 'd-none':'';

                                $top_prize=$x<=3 ? '<span class="top_prize">'.$x.'</span>':'<h1 class=" hv-center mb-0">'.$x.'</h1>';
                                echo '
                            <div class="row no-gutters py-3 rankbg_list rank_hot '.$is_d_none.'">
                               <div class="col-md-1 wx-100-ph hv-center popular_prize">
                                  '.$top_prize.'
                              </div>

                              <div class="col-md-4 wx-100-ph text-center">
                                <a class="popular_list_img" href="../cardNews/creditcard.php?cc_pk='.$row_car_d['Tb_index'].'&cc_group_id='.$row_car_d['cc_group_id'].'">
                                  <img src="../sys/img/'.$cc_photo.'" >
                                </a>
                              </div>
                              <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                               <h4>'.$card_name.'</h4>
                               <div class="row no-gutters">
                                <div class="col-md-5 wx-100-ph card_list_txt rank_color">
                                  <ul>
                                    '.$card_adv_txt.'
                                  </ul>
                                </div>
                                <div class="col-md-2 wx-100-ph">
                                  <div class="rank_btn">
                                    '.$cc_doc.'
                                    <button type="button" card_id="'.$row_car_d['Tb_index'].'" cc_group_id="'.$row_car_d['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$row_car_d['cc_photo'].'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                  </div>
                                  <span>謹慎理財 信用至上</span>
                                </div>
                               </div>
                             </div>
                            </div>';
                               
                               //-- 原生廣告 --
                               if ($x%3==0) {
                                 echo '
                                <div class="row no-gutters rank_ad">
                               <div class="col-md-5 wx-100-ph hv-center">
                                <div class="row">
                                  <div class="col-md-2 col-2 ">
                                   <img src="../img/component/hot.png">
                                  </div>
                                  <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                    <a class="popular_list_img" href="#">
                                     <img src="../img/component/card1.png" alt="" title="新聞">
                                    </a>
                                  </div>
                                </div>
                               </div>
                             <div class="col-md-7 wx-100-ph ad_rank rank_color">
                               <div class="row no-gutters h-center">
                                <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                  <img src="../img/component/ad_sm2.png">
                                </div>
                               </div>
                             </div>
                            </div>';
                               }

                             $x++; }
                            ?>

                          <?php 
                           if ($x>9){
                            echo '<a class="rank_more warning-layered btnOver" show_num="6" href="javascript:;">顯示更多卡片</a>';
                           }
                          ?>
                          
                   
                          </div>
                          <!-- 新卡人氣排行 END -->

                          



                          <!-- 辦卡人氣排行 -->
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">

                            <!-- 原生廣告 -->
                            <div class="row no-gutters rank_ad">
                               <div class="col-md-5 wx-100-ph hv-center">
                                <div class="row">
                                  <div class="col-md-2 col-2 ">
                                   <img src="../img/component/hot.png">
                                  </div>
                                  <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                    <a class="popular_list_img" href="#">
                                     <img src="../img/component/card1.png" alt="" title="新聞">
                                    </a>
                                  </div>
                                </div>
                               </div>
                             <div class="col-md-7 wx-100-ph ad_rank rank_color">
                               <div class="row no-gutters h-center">
                                <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                  <img src="../img/component/ad_sm2.png">
                                </div>
                               </div>
                             </div>
                            </div>
                            <!-- 原生廣告 END -->

                            <?php 
                               $row_add_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_cardrank as ccr
                                                         INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                         INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                         WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                         ORDER BY ccrc.assigncount DESC 
                                                         LIMIT 0,10", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                               $x=1;
                               foreach ($row_add_card as $add_card_one) {



                                 //-- 卡名 --
                                 $card_name=$add_card_one['bi_shortname'].'_'.$add_card_one['cc_cardname'].'_'.$add_card_one['org_nickname'].$add_card_one['attr_name'];
                                 //-- 卡特色 --
                                 $card_adv_txt='';
                                 $card_adv=preg_split('/\n/',$add_card_one['cc_interest_desc']);
                                 foreach ($card_adv as $card_adv_one) {
                                   $card_adv_txt.='<li><b>●</b>'.$card_adv_one.'</li>';
                                 }
                                 //-- 立即辦卡 --
                                 if (!empty($add_card_one['cc_doc_url'])) {
                                   $cc_doc='<a target="_blank" href="'.$add_card_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                 }
                                 elseif(!empty($add_card_one['cc_doc_path'])){
                                   $cc_doc='<a target="_blank" href="'.$add_card_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                 }
                                 else{
                                   $cc_doc='';
                                 }
                                 //-- 卡片圖 --
                                 $cc_photo=empty($add_card_one['cc_photo']) ? 'CardSample.png':$add_card_one['cc_photo'];
                                 //-- 隱藏更多卡片 --
                                 $is_d_none=$x>9 ? 'd-none':'';
                                 //-- 前三名(獎牌) --
                                 $top_prize=$x<=3 ? '<span class="top_prize">'.$x.'</span>':'<h1 class=" hv-center mb-0">'.$x.'</h1>';
                                 echo '
                             <div class="row no-gutters py-3 rankbg_list rank_hot '.$is_d_none.'">
                                <div class="col-md-1 wx-100-ph hv-center popular_prize">
                                   '.$top_prize.'
                               </div>

                               <div class="col-md-4 wx-100-ph text-center">
                                 <a class="popular_list_img" href="../cardNews/creditcard.php?cc_pk='.$add_card_one['Tb_index'].'&cc_group_id='.$add_card_one['cc_group_id'].'">
                                   <img src="../sys/img/'.$cc_photo.'" >
                                 </a>
                               </div>
                               <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                                <h4>'.$card_name.'</h4>
                                <div class="row no-gutters">
                                 <div class="col-md-5 wx-100-ph card_list_txt rank_color">
                                   <ul>
                                     '.$card_adv_txt.'
                                   </ul>
                                 </div>
                                 <div class="col-md-2 wx-100-ph">
                                   <div class="rank_btn">
                                     '.$cc_doc.'
                                     <button type="button" card_id="'.$add_card_one['Tb_index'].'" cc_group_id="'.$add_card_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$add_card_one['cc_photo'].'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                   </div>
                                   <span>謹慎理財 信用至上</span>
                                 </div>
                                </div>
                              </div>
                             </div>';
                                
                                //-- 原生廣告 --
                                if ($x%3==0) {
                                  echo '
                                 <div class="row no-gutters rank_ad">
                               <div class="col-md-5 wx-100-ph hv-center">
                                <div class="row">
                                  <div class="col-md-2 col-2 ">
                                   <img src="../img/component/hot.png">
                                  </div>
                                  <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                    <a class="popular_list_img" href="#">
                                     <img src="../img/component/card1.png" alt="" title="新聞">
                                    </a>
                                  </div>
                                </div>
                               </div>
                             <div class="col-md-7 wx-100-ph ad_rank rank_color">
                               <div class="row no-gutters h-center">
                                <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                  <img src="../img/component/ad_sm2.png">
                                </div>
                               </div>
                             </div>
                            </div>';
                                }

                              $x++; }

                            ?>
                          
                      
                           <?php 
                            if ($x>9){
                             echo '<a class="rank_more warning-layered btnOver" show_num="6" href="javascript:;">顯示更多卡片</a>';
                            }
                           ?>

                          </div>
                          <!-- 辦卡人氣排行 END -->


                          <!-- 點閱人氣排行 -->
                          <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">


                            <!-- 原生廣告 -->
                            <div class="row no-gutters rank_ad">
                               <div class="col-md-5 wx-100-ph hv-center">
                                <div class="row">
                                  <div class="col-md-2 col-2 ">
                                   <img src="../img/component/hot.png">
                                  </div>
                                  <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                    <a class="popular_list_img" href="#">
                                     <img src="../img/component/card1.png" alt="" title="新聞">
                                    </a>
                                  </div>
                                </div>
                               </div>
                             <div class="col-md-7 wx-100-ph ad_rank rank_color">
                               <div class="row no-gutters h-center">
                                <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                  <img src="../img/component/ad_sm2.png">
                                </div>
                               </div>
                             </div>
                            </div>
                            <!-- 原生廣告 END -->


                             <?php 
                                $row_view_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                 cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                          FROM credit_cardrank as ccr
                                                          INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                          INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                          WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                          ORDER BY ccrc.viewcount DESC 
                                                          LIMIT 0,10", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                                $x=1;
                                foreach ($row_view_card as $add_view_one) {



                                  //-- 卡名 --
                                  $card_name=$add_view_one['bi_shortname'].'_'.$add_view_one['cc_cardname'].'_'.$add_view_one['org_nickname'].$add_view_one['attr_name'];
                                  //-- 卡特色 --
                                  $card_adv_txt='';
                                  $card_adv=preg_split('/\n/',$add_view_one['cc_interest_desc']);
                                  foreach ($card_adv as $card_adv_one) {
                                    $card_adv_txt.='<li><b>●</b>'.$card_adv_one.'</li>';
                                  }
                                  //-- 立即辦卡 --
                                  if (!empty($add_view_one['cc_doc_url'])) {
                                    $cc_doc='<a target="_blank" href="'.$add_view_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                  }
                                  elseif(!empty($add_view_one['cc_doc_path'])){
                                    $cc_doc='<a target="_blank" href="'.$add_view_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                  }
                                  else{
                                    $cc_doc='';
                                  }
                                  //-- 卡片圖 --
                                  $cc_photo=empty($add_view_one['cc_photo']) ? 'CardSample.png':$add_view_one['cc_photo'];
                                  //-- 隱藏更多卡片 --
                                  $is_d_none=$x>9 ? 'd-none':'';
                                  //-- 前三名(獎牌) --
                                  $top_prize=$x<=3 ? '<span class="top_prize">'.$x.'</span>':'<h1 class=" hv-center mb-0">'.$x.'</h1>';
                                  echo '
                              <div class="row no-gutters py-3 rankbg_list rank_hot '.$is_d_none.'">
                                 <div class="col-md-1 wx-100-ph hv-center popular_prize">
                                    '.$top_prize.'
                                </div>

                                <div class="col-md-4 wx-100-ph text-center">
                                  <a class="popular_list_img" href="../cardNews/creditcard.php?cc_pk='.$add_view_one['Tb_index'].'&cc_group_id='.$add_view_one['cc_group_id'].'">
                                    <img src="../sys/img/'.$cc_photo.'" >
                                  </a>
                                </div>
                                <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                                 <h4>'.$card_name.'</h4>
                                 <div class="row no-gutters">
                                  <div class="col-md-5 wx-100-ph card_list_txt rank_color">
                                    <ul>
                                      '.$card_adv_txt.'
                                    </ul>
                                  </div>
                                  <div class="col-md-2 wx-100-ph">
                                    <div class="rank_btn">
                                      '.$cc_doc.'
                                      <button type="button" card_id="'.$add_view_one['Tb_index'].'" cc_group_id="'.$add_view_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$add_view_one['cc_photo'].'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                    </div>
                                    <span>謹慎理財 信用至上</span>
                                  </div>
                                 </div>
                               </div>
                              </div>';
                                 
                                 //-- 原生廣告 --
                                 if ($x%3==0) {
                                   echo '
                                  <div class="row no-gutters rank_ad">
                               <div class="col-md-5 wx-100-ph hv-center">
                                <div class="row">
                                  <div class="col-md-2 col-2 ">
                                   <img src="../img/component/hot.png">
                                  </div>
                                  <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                    <a class="popular_list_img" href="#">
                                     <img src="../img/component/card1.png" alt="" title="新聞">
                                    </a>
                                  </div>
                                </div>
                               </div>
                             <div class="col-md-7 wx-100-ph ad_rank rank_color">
                               <div class="row no-gutters h-center">
                                <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                  <ul>
                                    <li><b>●</b>國內現金回饋1.22%</li>
                                    <li><b>●</b>國外現金回饋2.22%</li>
                                    <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                  </ul>
                                </div>
                                <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                  <img src="../img/component/ad_sm2.png">
                                </div>
                               </div>
                             </div>
                            </div>';
                                 }

                               $x++; }

                             ?>
                            
                            <?php 
                             if ($x>9){
                              echo '<a class="rank_more warning-layered btnOver" show_num="6" href="javascript:;">顯示更多卡片</a>';
                             }
                            ?>

                          </div>
                          <!-- 點閱人氣排行 END -->
                  
                        </div>
                      </div>
                    </div>

                  
                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>熱門情報</h4>
                               <span>謹慎理財 信用至上</span>
                           </div>
                           <div class="content_tab">
                               <!-- 熱門情報輪播 -->
                            <div class="swiper-container HotNews_slide">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                
                            </div>
                            <!-- 熱門情報輪播 END -->

                           </div>
                       </div>
                    </div>

                    <div class="col-md-12 col">
                       
                       <div class="cardshap darkpurple_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active  pl-30" id="card-tab" tab-target="#card" href="javascript:;" aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/index/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="right-tab" tab-target="#right" href="javascript:;" aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/index/icon2.png); background-size: 80%;"></i>權益快搜
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content ccard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">--選擇銀行--</option>
                                      <option value="第一銀行">第一銀行</option>
                                      <option value="台新銀行">台新銀行</option>
                                      <option value="渣打銀行">渣打銀行</option>
                                  </select>

                                  <select>
                                      <option value="">--選擇信用卡--</option>
                                      <option value="JBC白金卡">JBC白金卡</option>
                                      <option value="富邦世界卡">富邦世界卡</option>
                                      <option value="SOGO聯名卡">SOGO聯名卡</option>
                                  </select>  
                                </div>

                                <div class="col-3">
                                  <div class="hv-center w-h-100">
                                      <button type="button">GO</button>
                                  </div>
                                </div>
                               
                            </form>
                          </div>
                          <div class="tab-pane fade" id="right" role="tabpanel" aria-labelledby="right-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">選擇比較的權益項目</option>
                                      <option value="年費">年費</option>
                                      <option value="循環利息">循環利息</option>
                                      <option value="逾期違約金">逾期違約金</option>
                                  </select>

                                  <select>
                                      <option value="">選擇比較的權益項目</option>
                                      <option value="年費">年費</option>
                                      <option value="循環利息">循環利息</option>
                                      <option value="逾期違約金">逾期違約金</option>
                                  </select>
                                </div>

                                <div class="col-3">
                                 <div class="hv-center w-h-100">
                                   <button type="button">GO</button>
                                 </div>
                                </div>
                               
                            </form>
                          </div>
                        </div>
                      </div>
                    
                    </div>

                   <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                    
                                  </a>
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>★</b>國內現金回饋1.22%<br> <b>★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                 </div>
                               </div>

                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>

                                  </a> 
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                    <p><b>★</b>國內現金回饋1.22%<br> <b>★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                 </div>
                               </div>

                           </div>
                       </div>
                    </div>
                     <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>瀏覽過信用卡 </h4>
                                <a class="more_link" href="browse_detail.php"></a>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
                                 </div>
                               </div>

                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
                                 </div>
                               </div>
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
                                 </div>
                               </div>


                           </div>
                       </div>
                    </div>
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>

                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>

                    
                    <div class="col-md-12 col">
                       <div class="cardshap tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>熱門辦卡</h4>
                           </div>
                           <div class="content_tab">
                               <ul class="tab_list cardu_li">
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                            </ul>
                           </div>
                       </div>
                    </div>
                    


                    
                    <?php 
                     //-- 共用Footer --
                     if (wp_is_mobile()) {
                        require '../share_area/phone/footer.php';
                     }
                     else{
                       require '../share_area/footer.php';
                      }
                    ?>
                    
                    

                </div>
            </div>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>