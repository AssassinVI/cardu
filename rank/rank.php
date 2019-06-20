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
        
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">
                
                <div class="row">

              
                    <!--卡排行-->
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap">
                           
                           <div class="card_rank row no-gutters">

                             <div class="col-md-2">
                               <div class="card_fun w-h-100 hv-center hole">
                                   <div class="text-center mt-05">
                                       <img src="../img/component/card_rank_logo.png" alt=""> <p class="mb-0 mt-025">卡排行</p>
                                   </div>
                               </div>  
                             </div>
                             <div class="col-md-10">
                              <div class="swiper_div">
                                 <div class="swiper-container">
                                   <div class="swiper-wrapper">
                                    <?php 
                                      //-- 卡排行分類 --
                                      $row_cc_type=$pdo->select("SELECT Tb_index, cc_so_cname, cc_so_photo_1, cc_so_photo_1_hover, old_id
                                                                 FROM credit_cardrank_type 
                                                                 WHERE cc_so_status=1 ORDER BY cc_so_order ASC");
                                      $x=1;
                                      $rand_num=rand(1,count($row_cc_type));
                                      foreach ($row_cc_type as $rct_one) {
                                        $active=$x==$rand_num ? 'active':'';
                                        $active_img=$x==$rand_num ? $rct_one['cc_so_photo_1_hover']:$rct_one['cc_so_photo_1'];
                                        $cardrank_url=wp_is_mobile() ? 'javascript:;' :'cardrank.php?'.$rct_one['old_id'].'" title="'.$rct_one['cc_so_cname'];
                                        echo '
                                        <div class="swiper-slide '.$active.'" index="'.$x.'" Tb_index="'.$rct_one['Tb_index'].'" pk="'.$rct_one['old_id'].'" > 
                                         <div class="text-center"  >
                                            <a target="_blank" href="'.$cardrank_url.'">
                                              <img src="../sys/img/'.$active_img.'" alt="'.$rct_one['cc_so_cname'].'" > <br> '.$rct_one['cc_so_cname'].'
                                            </a>
                                          </div>
                                        </div>';
                                        $x++;
                                      }
                                    ?>
                                   </div>

                               </div>

                               <!-- 如果需要导航按钮 -->
                                   <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                                   <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>

                              </div>
                              <!-- 給予隨機卡功能 -->
                              <input type="hidden" name="rand_num" value="<?php echo $rand_num;?>">

                             </div>
                           </div>

                           <div class="ccard slider">
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">

                                    <!-- main.js 卡排行 -->

                                  </div>
                                                                    
                              </div>

                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

                           </div>
                            
                            <a id="rankcc_more_bot1" class="rank_more card_rank warning-layered btnOver d-block d-md-none" href="cardrank.php?<?php echo $row_cc_type[$rand_num-1]['old_id'];?>">顯示更多卡片</a>
                        </div>
                    </div>
                    <!--卡排行end -->
                    
                     <!--廣告-->
                    <div class="col-md-12 col phone_hidden"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                     <!--卡比較-->
                    <div class="col-md-12 col">
                       <div class="cardshap darkpurple_tab">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">卡比較</a>
                          </li>
                        </ul>
                             <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="swiper-container searchRank_type">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                      <div class="rank-4 mx-md-2 my-3">
                                        <a href="compare01.php">
                                         <div>
                                          <img src="../img/component/rank_1.png">
                                          </div>
                                        <h1>新手快搜</h1>
                                        <p>茫茫卡海該如何找信用卡呢!輕鬆點選找到最速配的卡片</p>
                                        </a>
                                      </div>
                                    </div>

                                    <div class="swiper-slide">
                                      <div class="rank-4 mx-md-2 my-3">
                                        <a href="compare02.php">
                                          <div>
                                            <img src="../img/component/rank_2.png">
                                          </div>
                                          <h1>卡片比一比</h1>
                                          <p>全台唯一信用卡最完整收錄挑尬意卡片動動手指比一比!</p>
                                        </a>
                                      </div>
                                    </div>

                                    <div class="swiper-slide">
                                      <div class="rank-4 mx-md-2 my-3">
                                        <a href="compare03.php">
                                         <div>
                                          <img src="../img/component/rank_3.png">
                                         </div>
                                         <h1>權益比一比</h1>
                                         <p>重要、熱門信用卡權益整理好康優惠不漏接各卡大比拼!</p> 
                                       </a>
                                      </div>
                                    </div>
                                </div>
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                
                            </div>

                           
                          </div>
                      
                        </div>
                       </div>
                    </div>
                    <!--卡比較End-->

                    
                    
                    
                    <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                   

                    <div class="col-md-12 col">

                        <div class="cardshap darkpurple_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2 index_pop_btn" id="title_5-tab" target="_blank" href="newcard.php" tab-target="#title_5" aria-selected="true">新卡人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2 index_pop_btn" id="title_6-tab" target="_blank" href="apply.php" tab-target="#title_6" aria-selected="false">辦卡人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2 index_pop_btn" id="title_7-tab" target="_blank" href="click.php" tab-target="#title_7" aria-selected="false">點閱人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content p-0" id="myTabContent">

                          <!-- 新卡人氣排行 -->
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                            
                            <!-- 精選廣告 -->
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


                          <?php 
                             $row_new_card=$pdo->select("SELECT bc.card_group_id
                                                          FROM appNews_bank_card as bc
                                                          INNER JOIN appNews as news ON bc.news_id=news.Tb_index
                                                          WHERE news.ns_nt_pk='nt201902121004593' AND news.ns_verify=3 AND news.ns_vfdate >=:month_ago
                                                          GROUP BY bc.card_group_id
                                                          ORDER BY news.ns_viewcount DESC, news.ns_mobvecount DESC LIMIT 0,5", ['month_ago'=>date('Y-m-d H:i:s',strtotime('-3 month'))]);

                             $x=1;
                             foreach ($row_new_card as $rnc_one) {

                               $row_car_d=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name, cc.cc_interest_desc, cc.cc_doc_url, cc.cc_doc_path
                                                        FROM credit_card as cc
                                                        INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                                        INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                        WHERE cc.cc_group_id=:cc_group_id
                                                        ORDER BY level.OrderBy ASC
                                                        LIMIT 0,1", ['cc_group_id'=>$rnc_one['card_group_id']], 'one');
                               

                               
                               //-----------------------------------
                               //-- share_area/func.php 各人氣排行 --
                               //-----------------------------------
                               popular_card_txt($x, $row_car_d );

                             $x++; }
                            ?>

                          </div>
                          <!-- 新卡人氣排行 END -->


                          <!-- 辦卡人氣排行 -->
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">
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


                            <?php 
                             $row_app_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_cardrank as ccr
                                                         INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                         INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                         WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                         GROUP BY cc.Tb_index
                                                         ORDER BY ccrc.assigncount DESC 
                                                         LIMIT 0,5", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                             $x=1;
                             foreach ($row_app_card as $rac_one) {
                               
                               //-----------------------------------
                               //-- share_area/func.php 各人氣排行 --
                               //-----------------------------------
                               popular_card_txt($x, $rac_one );

                             $x++; }
                            ?>
                          </div>
                          <!-- 辦卡人氣排行 END -->


                          <!-- 點閱人氣排行 -->
                          <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">

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

                            <?php 
                             $row_read_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_cardrank as ccr
                                                         INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                         INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                         WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                         GROUP BY cc.Tb_index
                                                         ORDER BY ccrc.viewcount DESC 
                                                         LIMIT 0,5", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                             $x=1;
                             foreach ($row_read_card as $rrc_one) {
                               
                               //-----------------------------------
                               //-- share_area/func.php 各人氣排行 --
                               //-----------------------------------
                               popular_card_txt($x, $rrc_one );

                             $x++; }
                            ?>
                    
                            <!--信用卡推薦end -->
                           
                          </div>
                          <!-- 點閱人氣排行 END -->
                        </div>

                        <a id="rankcc_more_bot2" class="rank_more card_rank warning-layered btnOver d-block d-md-none" href="newcard.php">顯示更多卡片</a>
                      </div>

                    </div>

                   

                </div>
            </div>
            <!--版面左側end-->
            
           <?php 
           //-- 版面右側 --
           if (!wp_is_mobile()) {
             require 'right_area_div.php';
           }
           ?>
           
        </div>
        <!--版面end-->
        
                
        
    </div><!-- container end-->


    <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>