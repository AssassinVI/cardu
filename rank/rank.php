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
                                      foreach ($row_cc_type as $rct_one) {
                                      	$active=$x==1 ? 'active':'';
                                      	$active_img=$x==1 ? $rct_one['cc_so_photo_1_hover']:$rct_one['cc_so_photo_1'];
                                        $cardrank_url=wp_is_mobile() ? 'javascript:;' :'cardrank.php?'.$rct_one['old_id'].'" title="'.$rct_one['cc_so_cname'];
                                      	echo '
                                      	<div class="swiper-slide '.$active.'" index="'.$x.'" Tb_index="'.$rct_one['Tb_index'].'" > 
                                         <div class="text-center"  >
                                            <a href="'.$cardrank_url.'">
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
                             </div>
                           </div>

                           <div class="ccard">
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">

                                  	<?php 
                                      //-- 現金回饋 隨機(無條件/有條件) --
                                      $rand_cc_so_pk=['r_type201904010959361', 'r_type201904010959362'];
                                      $row_ccard_rank=$pdo->select("SELECT ccs_cc_cardname, ccs_cc_pk, ccs_cc_group_id
                                                                    FROM credit_cardrank 
                                                                    WHERE ccs_cc_so_pk=:ccs_cc_so_pk ORDER BY ccs_order ASC LIMIT 0,6", ['ccs_cc_so_pk'=>$rand_cc_so_pk[rand(0,1)]]);
                                      $x=1;
                                      foreach ($row_ccard_rank as $rcr_one) {
                                        //-- 單卡 --
                                        if (!empty($rcr_one['ccs_cc_pk'])) {
                                           $row_ccard=$pdo->select("SELECT cc_photo FROM credit_card WHERE Tb_index=:Tb_index", ['Tb_index'=>$rcr_one['ccs_cc_pk']], 'one');
                                        }
                                        //-- 卡組 --
                                        else{
                                           $row_ccard=$pdo->select("SELECT cc_photo 
                                                                    FROM credit_card as cc
                                                                    INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                                    WHERE cc_group_id=:cc_group_id 
                                                                    ORDER BY level.OrderBy ASC
                                                                    LIMIT 0,1", ['cc_group_id'=>$rcr_one['ccs_cc_group_id']], 'one');
                                        }

                                        //-- 卡片圖 --
                                        $cc_photo=empty($row_ccard['cc_photo']) ? 'CardSample.png':$row_ccard['cc_photo'];

                                        $ccs_cc_cardname=explode(']', $rcr_one['ccs_cc_cardname']);
                                        $ccs_cc_shortname=mb_strlen($ccs_cc_cardname[1],'utf-8')>10 ? mb_substr($ccs_cc_cardname[1], 0,10,'utf-8'):$ccs_cc_cardname[1];

                                        $cc_url=!empty($rcr_one['ccs_cc_pk']) ? '../card/creditcard.php?cc_pk='.$rcr_one['ccs_cc_pk'].'&cc_group_id='.$rcr_one['ccs_cc_group_id'] : '../card/type.php?gid='.$rcr_one['ccs_cc_group_id'];
                                        echo '
                                        <div class="swiper-slide">
                                           <div class="w-h-100 hv-center">
                                             <a href="'.$cc_url.'" title="'.$ccs_cc_cardname[1].'"><span class="top_Medal">'.$x.'</span><img src="../sys/img/'.$cc_photo.'" alt="'.$ccs_cc_cardname[1].'"><br>'.$ccs_cc_shortname.'</a>
                                           </div>
                                        </div>';
                                      	$x++;
                                      }
                                  	?>
                                    

                                  </div>
                                                                    
                              </div>

                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

                           </div>
                            
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

                        <div class="row">
                         <div class="col-md-4 col">
                           <div class="rank-4">
                             <a href="new_second.php#newHand">
                              <div>
                               <img src="../img/component/rank_1.png">
                               </div>
                             <h1>新手快搜</h1>
                             <p>不知道該如何找信用卡嗎?讓新手快搜幫你找到最速配的信用卡!</p>
                             </a>
                          </div>
                        </div>
                        
                        <div class="col-md-4 col">
                          <div class="rank-4">
                            <a href="new_second.php#cardCompare">
                           <div>
                              <img src="../img/component/rank_2.png">
                            </div>
                            <h1>卡片比一比</h1>
                            <p>各銀行信用卡完整蒐集，動動滑鼠比一比!</p>
                            </a>
                         </div>
                       </div>
                        
                        <div class="col-md-4 col">
                          <div class="rank-4">
                            <a href="new_second.php#interest">
                            <div>
                               <img src="../img/component/rank_3.png">
                               </div>
                            <h1>權益比一比</h1>
                            <p>信金回饋、紅利集點、哩程累積等信用卡權益大比拚!</p> 
                            </a>
                         </div>
                       </div>
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
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">新卡人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">辦卡人氣<span class="phone_hidden">排行</span></a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">點閱人氣<span class="phone_hidden">排行</span></a>
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


                          <?php 
                             $row_new_card=$pdo->select("SELECT bc.card_group_id
                                                          FROM appNews_bank_card as bc
                                                          INNER JOIN appNews as news ON bc.news_id=news.Tb_index
                                                          WHERE news.ns_nt_pk='nt201902121004593' AND news.ns_verify=3 AND news.ns_vfdate >=:month_ago
                                                          GROUP BY bc.card_group_id
                                                          ORDER BY news.ns_viewcount DESC, news.ns_mobvecount DESC LIMIT 0,10", ['month_ago'=>date('Y-m-d H:i:s',strtotime('-3 month'))]);

                             $x=1;
                             foreach ($row_new_card as $rnc_one) {

                               $row_car_d=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name, cc.cc_interest_desc, cc.cc_doc_url, cc.cc_doc_path
                                                        FROM credit_card as cc
                                                        INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                                        INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                        WHERE cc.cc_group_id=:cc_group_id
                                                        ORDER BY level.OrderBy ASC
                                                        LIMIT 0,1", ['cc_group_id'=>$rnc_one['card_group_id']], 'one');
                               //-- 卡名 --
                               $card_name=$row_car_d['bi_shortname'].'_'.$row_car_d['cc_cardname'].'_'.$row_car_d['org_nickname'].$row_car_d['attr_name'];
                               //-- 卡特色 --
                               $card_adv_txt='';
                               $card_adv=preg_split('/\n/',$row_car_d['cc_interest_desc']);
                               foreach ($card_adv as $card_adv_one) {
                                 $card_adv_txt.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
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
                               //-- 前三名(獎牌) --
                               $top_prize=$i<3 ? '<span class="top_prize">'.$x.'</span>':'<h1 class=" hv-center mb-0">'.$x.'</h1>';

                               echo '
                               <div class="row no-gutters py-3 rankbg_list rank_hot">
                               <div class="col-md-1 wx-100-ph hv-center popular_prize">
                                  '.$top_prize.'
                               </div>

                              <div class="col-md-4 wx-100-ph wx-100-ph text-center">
                                <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$row_car_d['Tb_index'].'&cc_group_id='.$row_car_d['cc_group_id'].'">
                                  <img src="../sys/img/'.$cc_photo.'" alt="" title="'.$card_name.'">
                                </a>
                              </div>
                             <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                               <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$row_car_d['Tb_index'].'&cc_group_id='.$row_car_d['cc_group_id'].'">
                               <h4>
                                '.$card_name.'
                               </h4>
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
                                    <button type="button" card_id="'.$row_car_d['Tb_index'].'" cc_group_id="'.$row_car_d['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$row_car_d['cc_photo'].'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                  </div>
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                </div>
                               </div>
                              </div>';
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


                            <?php 
                             $row_app_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_cardrank as ccr
                                                         INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                         INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                         WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                         ORDER BY ccrc.assigncount DESC 
                                                         LIMIT 0,10", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                             $x=1;
                             foreach ($row_app_card as $rac_one) {
                               //-- 卡名 --
                               $card_name=$rac_one['bi_shortname'].'_'.$rac_one['cc_cardname'].'_'.$rac_one['org_nickname'].$rac_one['attr_name'];
                               //-- 特色 --
                               $card_adv_txt='';
                               $card_adv=preg_split('/\n/',$rac_one['cc_interest_desc']);
                               foreach ($card_adv as $card_adv_one) {
                                 $card_adv_txt.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
                               }
                               //-- 立即辦卡 --
                               if (!empty($rac_one['cc_doc_url'])) {
                                 $cc_doc='<a target="_blank" href="'.$rac_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                               }
                               elseif(!empty($rac_one['cc_doc_path'])){
                                 $cc_doc='<a target="_blank" href="'.$rac_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                               }
                               else{
                                 $cc_doc='';
                               }

                               //-- 卡片圖 --
                               $cc_photo=empty($rac_one['cc_photo']) ? 'CardSample.png':$rac_one['cc_photo'];
                               //-- 前三名(獎牌) --
                               $top_prize=$i<3 ? '<span class="top_prize">'.$x.'</span>':'<h1 class=" hv-center mb-0">'.$x.'</h1>';

                               echo '
                               <div class="row no-gutters py-3 rankbg_list rank_hot">
                               <div class="col-md-1 wx-100-ph hv-center popular_prize">
                                   '.$top_prize.'
                               </div>

                              <div class="col-md-4 wx-100-ph wx-100-ph text-center">
                                <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$rac_one['Tb_index'].'&cc_group_id='.$rac_one['cc_group_id'].'">
                                  <img src="../sys/img/'.$cc_photo.'" alt="" title="'.$card_name.'">
                                </a>
                              </div>
                             <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                               <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$rac_one['Tb_index'].'&cc_group_id='.$rac_one['cc_group_id'].'">
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
                                    <button type="button" card_id="'.$rac_one['Tb_index'].'" cc_group_id="'.$rac_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                  </div>
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                </div>
                               </div>
                              </div>';
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

                            <?php 
                             $row_read_card=$pdo->select("SELECT cc.bi_shortname, cc.cc_cardname, cc.org_nickname, cc.attr_name, 
                                                                cc.cc_interest_desc, cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path
                                                         FROM credit_cardrank as ccr
                                                         INNER JOIN cc_detail as cc ON ccr.ccs_cc_pk=cc.Tb_index
                                                         INNER JOIN credit_cardrank_count as ccrc ON ccrc.ccr_id=ccr.Tb_index
                                                         WHERE ccr.ccs_del_flag=0 AND ccrc.ccr_date >=:day_ago
                                                         ORDER BY ccrc.viewcount DESC 
                                                         LIMIT 0,10", ['day_ago'=>date('Y-m-d',strtotime('-7 day'))]);
                             $x=1;
                             foreach ($row_read_card as $rrc_one) {
                               //-- 卡名 --
                               $card_name=$rrc_one['bi_shortname'].'_'.$rrc_one['cc_cardname'].'_'.$rrc_one['org_nickname'].$rrc_one['attr_name'];
                               //-- 特色 --
                               $card_adv_txt='';
                               $card_adv=preg_split('/\n/',$rrc_one['cc_interest_desc']);
                               foreach ($card_adv as $card_adv_one) {
                                 $card_adv_txt.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
                               }
                               //-- 立即辦卡 --
                               if (!empty($rrc_one['cc_doc_url'])) {
                                 $cc_doc='<a target="_blank"  href="'.$rrc_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               elseif(!empty($rrc_one['cc_doc_path'])){
                                 $cc_doc='<a target="_blank" href="'.$rrc_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               else{
                                 $cc_doc='';
                               }

                               //-- 卡片圖 --
                               $cc_photo=empty($rrc_one['cc_photo']) ? 'CardSample.png':$rrc_one['cc_photo'];
                               //-- 前三名(獎牌) --
                               $top_prize=$i<3 ? '<span class="top_prize">'.$x.'</span>':'<h1 class=" hv-center mb-0">'.$x.'</h1>';

                               echo '
                               <div class="row no-gutters py-3 rankbg_list rank_hot">
                               <div class="col-md-1 wx-100-ph hv-center popular_prize">
                                   '.$top_prize.'
                               </div>

                              <div class="col-md-4 wx-100-ph text-center">
                                <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$rrc_one['Tb_index'].'&cc_group_id='.$rrc_one['cc_group_id'].'">
                                  <img src="../sys/img/'.$cc_photo.'" alt="" title="'.$card_name.'">
                                </a>
                              </div>
                             <div class="col-md-7 wx-100-ph card_list_txt rank_color">
                              <a class="popular_list_img" href="../card/creditcard.php?cc_pk='.$rrc_one['Tb_index'].'&cc_group_id='.$rrc_one['cc_group_id'].'">
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
                                    <button type="button" card_id="'.$rrc_one['Tb_index'].'" cc_group_id="'.$rrc_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                  </div>
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                </div>
                               </div>
                              </div>';
                             $x++; }
                            ?>
                    
                            <!--信用卡推薦end -->
                           
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
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>