<?php 
 require '../share_area/conn.php';
 
 //-- 卡排行分類點閱+1 --
 if (empty($_SESSION['type_viewcount']) || $_SESSION['type_viewcount']!=$_SERVER['QUERY_STRING']) {
   $pdo->select("UPDATE credit_cardrank_type SET cc_so_viewcount=cc_so_viewcount+1 WHERE old_id=:old_id", ['old_id'=>$_SERVER['QUERY_STRING']]);
   $_SESSION['type_viewcount']=$_SERVER['QUERY_STRING'];
 }

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <?php 
      $row_cc_type=$pdo->select("SELECT cc_so_cname
                                 FROM credit_cardrank_type 
                                 WHERE old_id=:old_id", ['old_id'=>$_SERVER['QUERY_STRING']], 'one');
    ?>

    <title>卡優新聞網 - 卡排行 > <?php echo $row_cc_type['cc_so_cname']; ?></title>

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
            <p class="crumbs">
              <i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/rank/rank.php">卡排行</a> / <a href="javascript:;"><?php echo $row_cc_type['cc_so_cname']; ?></a>
            </p>
          </div>
        </div>
        
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">
                
                <div class="row">

                  
                    
                    <!--卡排行-->
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap">
                           
                           <div class="card_type row no-gutters">

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
                                      $row_cc_type=$pdo->select("SELECT Tb_index, cc_so_cname, cc_so_photo_1, cc_so_photo_1_hover ,old_id
                                                                 FROM credit_cardrank_type 
                                                                 WHERE cc_so_status=1 ORDER BY cc_so_order ASC");
                                      $x=1;
                                      foreach ($row_cc_type as $rct_one) {

                                        $active=$_SERVER['QUERY_STRING']==$rct_one['old_id'] ? 'active now':'';
                                        $active_img=$_SERVER['QUERY_STRING']==$rct_one['old_id'] ? $rct_one['cc_so_photo_1_hover']:$rct_one['cc_so_photo_1'];

                                        echo '
                                        <div class="swiper-slide '.$active.'" index="'.$x.'" Tb_index="'.$rct_one['Tb_index'].'" > 
                                         <div class="text-center"  >
                                            <a href="?'.$rct_one['old_id'].'" title="'.$rct_one['cc_so_cname'].'">
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

                            
                        </div>
                    </div>
                    <!--卡排行end -->
                    
                    
                     <div class="col-md-12 col">
                    <div class="cardshap darkpurple_tab mouseHover_other_tab">
                       
                       <?php 
                        //-- 現金回饋 --
                        if ($_SERVER['QUERY_STRING']=='1' || $_SERVER['QUERY_STRING']=='2') {
                          echo '
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodTicket-tab"  tab-target="#goodTicket" aria-selected="true">無門檻</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center mouseHover_rank" id="goodSet-tab" ajax="no" rank_type="r_type201904010959362" tab-target="#goodSet" aria-selected="false">有門檻</a>
                          </li>
                          </ul>';
                        }
                       ?>
                        

                        <div class="tab-content p-0 card_rank_div" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodTicket" role="tabpanel" aria-labelledby="goodTicket-tab">

                            <?php 
                             $row_rank_title=$pdo->select("SELECT Tb_index, cc_so_type_01_cname, cc_so_type_02_cname, cc_so_type_03_cname, cc_so_type_02_order, cc_so_type_03_order
                                                           FROM credit_cardrank_type 
                                                           WHERE old_id=:old_id", ['old_id'=>$_SERVER['QUERY_STRING']], 'one');

                             $cc_so_type_01_cname='<a class="rank_order active" href="javascript:;" rank_type_id="'.$row_rank_title['Tb_index'].'" order="ccs_order">'.$row_rank_title['cc_so_type_01_cname'].'</a>';
                             $cc_so_type_02_cname=$row_rank_title['cc_so_type_02_order']=='1' ? '<a class="rank_order" href="javascript:;" rank_type_id="'.$row_rank_title['Tb_index'].'" order="ccs_order2">'.$row_rank_title['cc_so_type_02_cname'].'</a>': $row_rank_title['cc_so_type_02_cname'];
                             $cc_so_type_03_cname=$row_rank_title['cc_so_type_03_order']=='1' ? '<a class="rank_order" href="javascript:;" rank_type_id="'.$row_rank_title['Tb_index'].'" order="ccs_order3">'.$row_rank_title['cc_so_type_03_cname'].'</a>': $row_rank_title['cc_so_type_03_cname'];
                            ?>
                            <div class="row imp_int_title rank_card_title">
                              <div class="col-md-1 text-center"></div>
                              <div class="col-md-4 text-center phone_hidden">卡片名稱</div>
                              <div class="col-md text-center col-4"><?php echo $cc_so_type_01_cname; ?></div>
                              <div class="col-md text-center col-4"><?php echo $cc_so_type_02_cname; ?></div>
                              <div class="col-md text-center col-4"><?php echo $cc_so_type_03_cname; ?></div>
                            </div>


                            <div class="accordion imp_int" id="accordionExample">

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
                              <!-- 精選廣告 END -->


                            <?php 
                              $row_rank=$pdo->select("SELECT cc.Tb_index as cc_Tb_index, cc.cc_group_id , cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path, cc.cc_interest_desc, 
                                                             ccr.Tb_index as ccr_Tb_index, ccr.ccs_cc_group_id as ccr_group_id,
                                                             ccr.ccs_cc_cardname2, ccr.ccs_cc_cardshrname, ccr.ccs_cc_cardurl, ccr.ccs_cc_pk2, 
                                                             ccr.ccs_cc_cardname, ccr.ccs_typename_01, ccr.ccs_typename_02, ccr.ccs_typename_03, 
                                                             ccr.ccs_typename_01_memo, ccr.ccs_typename_02_memo, ccr.ccs_typename_03_memo,
                                                             ccrt.cc_so_show_order_icon
                                                      FROM credit_cardrank as ccr
                                                      LEFT JOIN cc_detail as cc ON cc.Tb_index=ccr.ccs_cc_pk
                                                      INNER JOIN credit_cardrank_type as ccrt ON ccrt.Tb_index=ccr.ccs_cc_so_pk
                                                      WHERE ccr.ccs_cc_so_pk=:ccs_cc_so_pk 
                                                      ORDER BY ccr.ccs_order ASC LIMIT 0,10",['ccs_cc_so_pk'=>$row_rank_title['Tb_index']]);


                               $x=1;
                              foreach ($row_rank as $row_rank_one) {
                                
                                $card_name=empty($row_rank_one['ccs_cc_cardname2']) ? mb_substr($row_rank_one['ccs_cc_cardname'], 5,mb_strlen($row_rank_one['ccs_cc_cardname']),'utf-8') : $row_rank_one['ccs_cc_cardname2'] ;
                                
                                //-- 判斷是否卡群組 --
                                if (empty($row_rank_one['cc_Tb_index'])) {
                                  $row_card_group=$pdo->select("SELECT cc.cc_photo, cc.Tb_index, cc.cc_group_id, cc.cc_interest_desc
                                                                FROM credit_card as cc
                                                                INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                                WHERE cc_group_id=:cc_group_id 
                                                                ORDER BY level.OrderBy ASC
                                                                LIMIT 0,1", ['cc_group_id'=>$row_rank_one['ccr_group_id']], 'one');

                                }

                                //-- card_id --
                                $card_id=empty($row_rank_one['cc_Tb_index']) ? $row_card_group['Tb_index'] : $row_rank_one['cc_Tb_index'];

                                //-- 單卡網址 (share_area/func.php) --
                                if (!empty($row_rank_one['ccs_cc_cardurl'])) {
                                  $card_url=$row_rank_one['ccs_cc_cardurl'];
                                }
                                elseif(empty($row_rank_one['cc_Tb_index'])){
                                  $card_url=card_url('', $row_card_group['cc_group_id']);
                                }
                                else{
                                  $card_url=card_url($row_rank_one['cc_Tb_index'], $row_rank_one['cc_group_id']);
                                }
                                
                                //-- 卡片圖 --
                                if (empty($row_rank_one['cc_Tb_index'])) {
                                  $cc_photo=empty($row_card_group['cc_photo']) ? 'CardSample.png':$row_card_group['cc_photo'];
                                }
                                else{
                                  $cc_photo=empty($row_rank_one['cc_photo']) ? 'CardSample.png':$row_rank_one['cc_photo'];
                                }
                                
                                //-- 卡特色 --
                                $cc_interest_desc=empty($row_rank_one['cc_Tb_index']) ? $row_card_group['cc_interest_desc'] : $row_rank_one['cc_interest_desc'];
                                $card_adv_txt1='';
                                $card_adv_txt2='';
                                $card_adv=preg_split('/\n/',$cc_interest_desc);
                                $y=1;
                                if (!empty($cc_interest_desc)) {
                                  foreach ($card_adv as $card_adv_one) {
                                  if ($y%2==1) {
                                   $card_adv_txt1.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
                                  }
                                  else{
                                    $card_adv_txt2.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
                                  }
                                    $y++;
                                  }
                                  $card_adv_txt1='<ul class="collapse_txt mb-0">'.$card_adv_txt1.'</ul>';
                                  $card_adv_txt2='<ul class="collapse_txt mb-0">'.$card_adv_txt2.'</ul>';
                                }
                                
                                //-- 立即辦卡 --
                                if (!empty($row_rank_one['cc_doc_url'])) {
                                  $cc_doc='<a href="javascript:cardRank_log(\''.$row_rank_one['cc_doc_url'].'\', \''.$row_rank_one['ccr_Tb_index'].'\', \'assign\', \'_blank\');" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                elseif(!empty($row_rank_one['cc_doc_path'])){
                                  $cc_doc='<a href="javascript:cardRank_log(\''.$row_rank_one['cc_doc_path'].'\', \''.$row_rank_one['ccr_Tb_index'].'\', \'assign\', \'_blank\');" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                else{
                                  $cc_doc='';
                                }
                                
                                //-- 卡排行 比較文字判斷 ccs_typename() (share_area/func.php)--
                                $top_prize=$x>3 ? 'no_prize' : 'top_prize';
                                $top_prize_txt= $row_rank_one['cc_so_show_order_icon']==0 ? '' : '<span class="'.$top_prize.'">'.$x.'</span>';
                                 echo '
                              <div class="card rank_hot rank_second">
                                <div class="card-header money_header hv-center" id="imp_int1">
                                  <div class="row">
                                    <div class="col-md-1 ">
                                      <div class="hv-center wx-100-ph modal_prize">
                                        '.$top_prize_txt.'
                                     </div>
                                    </div>
                                    <div class="col-md-11 wx-100-ph">
                                      <div class="row">
                                        <div class="col-md-12 d-md-block phone_hidden">
                                         <a href="javascript:cardRank_log(\''.$card_url.'\', \''.$row_rank_one['ccr_Tb_index'].'\', \'view\', \'_blank\');">
                                          <h5 class=" money_main mb-0">'.$card_name.'</h5>
                                         </a>
                                        </div>
                                    <div class="row w-h-100">
                                  
                                    <div class="col-md-4 hv-center wx-100-ph">
                                       <div class="rank_care ">
                                         <a href="javascript:cardRank_log(\''.$card_url.'\', \''.$row_rank_one['ccr_Tb_index'].'\', \'view\', \'_blank\');">
                                          <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$card_name.'">
                                         </a>
                                      </div>
                                      <div class="d-md-none">
                                       <a href="javascript:cardRank_log(\''.$card_url.'\', \''.$row_rank_one['ccr_Tb_index'].'\', \'view\', \'_blank\');">
                                        <h5 class=" money_main mb-0">'.$card_name.'</h5>
                                       </a>
                                      </div>
                                    </div>
                                     <div class="col-md hv-center phone_block col-4 py-2">
                                      <strong>'.$row_rank_title['cc_so_type_01_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_01_memo'], $row_rank_one['ccs_typename_01']).'
                                     </div>
                                    <div class="col-md hv-center border-left border-right phone_block col-4 py-2">
                                      <strong>'.$row_rank_title['cc_so_type_02_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_02_memo'], $row_rank_one['ccs_typename_02']).'
                                    </div>
                                    <div class="col-md hv-center phone_block col-4 py-2">
                                      <strong>'.$row_rank_title['cc_so_type_03_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_03_memo'], $row_rank_one['ccs_typename_03'], $row_rank_one['ccs_cc_pk2']).'
                                    </div>

                                    <div class="col-md-12 row">
                                       <div class="col-md-4 hv-center wx-100-ph">
                                       <div class="profit_btn  hv-center my-2">
                                       '.$cc_doc.'
                                       <button type="button" card_id="'.$card_id.'" cc_group_id="'.$row_rank_one['ccr_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                       </div>
                                       
                                      </div>
                                      <div class="col-md-8 hv-around">
                                        <div class="collapse_txt "> <p class="d-md-inline-block d-block mb-0">謹慎理財 信用至上</p><p class="d-md-inline-block d-block mb-0">(✱本排行僅供參考)</p></div>
                                        <button class="btn btn-link angle_down money_button" type="button" data-toggle="collapse" data-target="#imp_int_txt'.$x.'" aria-expanded="true" aria-controls="imp_int_txt'.$x.'" title="更多資訊">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                      </div>
                                     </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div id="imp_int_txt'.$x.'" class="collapse" aria-labelledby="imp_int1" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row no-gutters">
                                      <div class="col-md-3 hv-center">
                                        <h4><img src="https://www.cardu.com.tw/images/cardrank/tick.png">信用卡特色</h4>
                                      </div>
                                      <div class="col-md-9">
                                       '.$card_adv_txt1.' 
                                       '.$card_adv_txt2.'  
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                              
                              //-- 廣告 --
                              if ($x==3 || $x==6) {
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
                                  <div class="col-md-8 wx-100-ph card_list_txt rank_color ">
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
                              

                              
                               
                            </div>

                            <a class="rank_more card_rank warning-layered btnOver" show_num="10" rank_type_id="<?php echo $row_rank_title['Tb_index'];?>" href="javascript:;">顯示更多卡片</a>

                          </div>



                 





























                        <!---------------------- 有門檻 ----------------------------------->

                          <div class="tab-pane fade" id="goodSet" role="tabpanel" aria-labelledby="goodSet-tab">
                            <div class="row imp_int_title rank_card_title ">
                               <div class="col-md-1 text-center"></div>
                               <div class="col-md-4 text-center">卡片名稱</div>
                               <div class="col-md-2 text-center">國內回饋</div>
                               <div class="col-md-2 text-center">國外回饋</div>
                               <div class="col-md-3 text-center">其他卡片</div>
                            </div>

                            <div class="accordion imp_int" id="accordionExample2">
                              
                            </div>

                             <a class="rank_more sp card_rank warning-layered btnOver" show_num="10" rank_type_id="r_type201904010959362" href="javascript:;">顯示更多卡片</a>
                          </div>
                          
                          
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