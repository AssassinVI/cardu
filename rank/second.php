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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡排行</a> / <a href="javascript:;">現金回饋</a></p>
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
                            <div class="row imp_int_title rank_card_title phone_hidden">
                              <div class="col-md-1 text-center"></div>
                              <div class="col-md-4 text-center">卡片名稱</div>
                              <div class="col-md text-center"><?php echo $cc_so_type_01_cname; ?></div>
                              <div class="col-md text-center"><?php echo $cc_so_type_02_cname; ?></div>
                              <div class="col-md text-center"><?php echo $cc_so_type_03_cname; ?></div>
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
                              <!-- 精選廣告 END -->


                            <?php 
                              $row_rank=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path, cc.cc_interest_desc, 
                                                             ccr.ccs_cc_cardname2, ccr.ccs_cc_cardshrname, ccr.ccs_cc_cardurl, ccr.ccs_cc_pk2, 
                                                             ccr.ccs_cc_cardname, ccr.ccs_typename_01, ccr.ccs_typename_02, ccr.ccs_typename_03, 
                                                             ccr.ccs_typename_01_memo, ccr.ccs_typename_02_memo, ccr.ccs_typename_03_memo
                                                      FROM credit_cardrank as ccr
                                                      LEFT JOIN cc_detail as cc ON cc.Tb_index=ccr.ccs_cc_pk
                                                      WHERE ccr.ccs_cc_so_pk=:ccs_cc_so_pk 
                                                      ORDER BY ccr.ccs_order ASC LIMIT 0,10",['ccs_cc_so_pk'=>$row_rank_title['Tb_index']]);


                               $x=1;
                              foreach ($row_rank as $row_rank_one) {
                                
                                $card_name=empty($row_rank_one['ccs_cc_cardname2']) ? mb_substr($row_rank_one['ccs_cc_cardname'], 5,mb_strlen($row_rank_one['ccs_cc_cardname']),'utf-8') : $row_rank_one['ccs_cc_cardname2'] ;
                                //-- 單卡網址 (sys/core/inc/function.php) --
                                $card_url=empty($row_rank_one['ccs_cc_cardurl']) ? card_url($row_rank_one['Tb_index'], $row_rank_one['cc_group_id']) : $row_rank_one['ccs_cc_cardurl'];
                                //-- 卡片圖 --
                                $cc_photo=empty($row_rank_one['cc_photo']) ? 'CardSample.png':$row_rank_one['cc_photo'];
                                //-- 卡特色 --
                                $card_adv_txt1='';
                                $card_adv_txt2='';
                                $card_adv=preg_split('/\n/',$row_rank_one['cc_interest_desc']);
                                $y=1;
                                if (!empty($row_rank_one['cc_interest_desc'])) {
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
                                  $cc_doc='<a target="_blank" href="'.$row_rank_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                elseif(!empty($row_rank_one['cc_doc_path'])){
                                  $cc_doc='<a target="_blank" href="'.$row_rank_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                else{
                                  $cc_doc='';
                                }
                                
                                //-- 卡排行 比較文字判斷 ccs_typename() (sys/core/inc/function.php)--
                                 echo '
                              <div class="card rank_hot rank_second">
                                <div class="card-header money_header hv-center" id="imp_int1">
                                  <div class="row">
                                    <div class="col-md-1 ">
                                      <div class="hv-center wx-100-ph modal_prize">
                                        <span class="top_prize">'.$x.'</span>
                                     </div>
                                    </div>
                                    <div class="col-md-11 wx-100-ph">
                                      <div class="row">
                                        <div class="col-md-12">
                                         <a href="'.$card_url.'">
                                          <h5 class=" money_main mb-0">'.$card_name.'</h5>
                                         </a>
                                        </div>
                                    <div class="row w-h-100">
                                  
                                    <div class="col-md-4 hv-center wx-100-ph">
                                       <div class="rank_care ">
                                         <a href="'.$card_url.'">
                                          <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$card_name.'">
                                         </a>
                                      </div>
                                    </div>
                                     <div class="col-md hv-center phone_block">
                                      <strong>'.$row_rank_title['cc_so_type_01_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_01_memo'], $row_rank_one['ccs_typename_01']).'
                                     </div>
                                    <div class="col-md hv-center border-left border-right phone_block">
                                      <strong>'.$row_rank_title['cc_so_type_02_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_02_memo'], $row_rank_one['ccs_typename_02']).'
                                    </div>
                                    <div class="col-md hv-center phone_block">
                                      <strong>'.$row_rank_title['cc_so_type_03_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_03_memo'], $row_rank_one['ccs_typename_03'], $row_rank_one['ccs_cc_pk2']).'
                                    </div>

                                    <div class="col-md-12 row">
                                       <div class="col-md-4 hv-center wx-100-ph">
                                       <div class="profit_btn  hv-center my-2">
                                       '.$cc_doc.'
                                       <button type="button" card_id="'.$row_rank_one['Tb_index'].'" cc_group_id="'.$row_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                       </div>
                                       
                                      </div>
                                      <div class="col-md-8 hv-center">
                                        <p class="collapse_txt mb-0"> 謹慎理財 信用至上(✱本排行僅供參考)</p>
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
                                      <div class="col-md-4 hv-center">
                                        <h4><img src="https://www.cardu.com.tw/images/cardrank/tick.png">信用卡特色</h4>
                                      </div>
                                      <div class="col-md-8">
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
                              

                              
                               
                            </div>

                            <a class="rank_more card_rank warning-layered btnOver" show_num="10" rank_type_id="<?php echo $row_rank_title['Tb_index'];?>" href="javascript:;">顯示更多卡片</a>

                          </div>



                 





























                        <!---------------------- 有門檻 ----------------------------------->

                          <div class="tab-pane fade" id="goodSet" role="tabpanel" aria-labelledby="goodSet-tab">
                            <div class="row imp_int_title rank_card_title phone_hidden">
                               <div class="col-md-1 text-center"></div>
                               <div class="col-md-4 text-center">卡片名稱</div>
                               <div class="col-md-2 text-center">國內回饋</div>
                               <div class="col-md-2 text-center">國外回饋</div>
                               <div class="col-md-3 text-center">其他卡片</div>
                            </div>
                            


                            <div class="accordion imp_int" id="accordionExample2">


                                

                              <a class="rank_more warning-layered btnOver" show_num="10" href="javascript:;">顯示更多卡片</a>
                            </div>
                            
                           
                          </div>
                          
                          
                          
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

                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
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
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
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
                                   <p><b>●</b>國內消費享1.22% <br> <b>●</b>國內消費享2.22%</p>
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
                                   <p><b>●</b>國內消費享1.22% <br> <b>●</b>國內消費享2.22%</p>
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
                                   <p><b>●</b>國內消費享1.22% <br> <b>●</b>國內消費享2.22%</p>
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
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>