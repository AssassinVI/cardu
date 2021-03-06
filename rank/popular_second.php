<?php 
 //require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

   <?php 
    if (strpos($_SERVER['PHP_SELF'], 'newcard.php')!=false) {
      $crumbs_txt='新卡人氣排行';
    }
    elseif(strpos($_SERVER['PHP_SELF'], 'apply.php')!=false){
      $crumbs_txt='辦卡人氣排行';
    } 
    elseif(strpos($_SERVER['PHP_SELF'], 'click.php')!=false){
      $crumbs_txt='點閱人氣排行';
    }
   ?>

    <title>卡優新聞網 - 卡排行 > <?php echo $crumbs_txt; ?></title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/rank/rank.php">卡排行</a> / <a class="crumbs_now" href="javascript:;"><?php echo $crumbs_txt; ?></a></p>
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
                            <a id="newCard_a" class="nav-link active pop_card_tap pl-30 py-2" tap_name="新卡人氣排行" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">
                              新卡人氣<span class="phone_hidden">排行</span>
                            </a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a id="addCard_a" class="nav-link pop_card_tap py-2" tap_name="辦卡人氣排行" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">
                              辦卡人氣<span class="phone_hidden">排行</span>
                            </a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a id="viewCard_a" class="nav-link pop_card_tap py-2" tap_name="點閱人氣排行" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">
                              點閱人氣<span class="phone_hidden">排行</span>
                            </a>
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
                                  <h4 class="text-center text-md-left">匯豐銀行 MasterCard 鈦金卡</h4>
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


                                //-----------------------------------
                                //-- share_area/func.php 信用卡List 樣板 --
                                //-----------------------------------
                                popular_card_txt($x, $row_car_d );

                                //-- 隱藏更多卡片 --
                                $is_d_none=$x>10 ? 'd-none':'';
                               
                               //-- 原生廣告 --
                               if ($x%3==0) {
                                 echo '
                                <div class="row no-gutters rank_ad '.$is_d_none.'">
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
                                  <h4 class="text-center text-md-left">匯豐銀行 MasterCard 鈦金卡</h4>
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
                           if ($x>11){
                            echo '<a class="rank_more warning-layered btnOver" show_num="10" href="javascript:;">顯示更多卡片</a>';
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
                                  <h4 class="text-center text-md-left">匯豐銀行 MasterCard 鈦金卡</h4>
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
                                                         GROUP BY cc.Tb_index
                                                         ORDER BY ccrc.assigncount DESC 
                                                         LIMIT 0,10", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                               $x=1;
                               foreach ($row_add_card as $add_card_one) {



                                 //-----------------------------------
                                 //-- share_area/func.php 信用卡List 樣板 --
                                 //-----------------------------------
                                 popular_card_txt($x, $add_card_one );
                                
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
                                  <h4 class="text-center text-md-left">匯豐銀行 MasterCard 鈦金卡</h4>
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
                            if ($x>11){
                             echo '<a class="rank_more warning-layered btnOver" show_num="10" href="javascript:;">顯示更多卡片</a>';
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
                                  <h4 class="text-center text-md-left">匯豐銀行 MasterCard 鈦金卡</h4>
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
                                                          GROUP BY cc.Tb_index
                                                          ORDER BY ccrc.viewcount DESC 
                                                          LIMIT 0,10", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                                $x=1;
                                foreach ($row_view_card as $add_view_one) {



                                  //-----------------------------------
                                  //-- share_area/func.php 信用卡List 樣板 --
                                  //-----------------------------------
                                  popular_card_txt($x, $add_view_one );
                                 
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
                                  <h4 class="text-center text-md-left">匯豐銀行 MasterCard 鈦金卡</h4>
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
                             if ($x>11){
                              echo '<a class="rank_more warning-layered btnOver" show_num="10" href="javascript:;">顯示更多卡片 '.$x.'</a>';
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
            
           <?php 
           //-- 版面右側 --
            require 'right_area_div.php';
           ?>
           
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>