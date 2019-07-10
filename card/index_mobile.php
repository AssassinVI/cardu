<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-卡情報</title>

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
  <body class="cardNews_body">

    <div class="container">

             
   <?php 
         //-- 共用Header --
         require '../share_area/phone/header.php';
        ?>
        

        
    <!-- 麵包屑 -->
    <div class="row">
      <div class="col-12">
        <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">卡情報</a></p>
      </div>
    </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

              

                <div class="row">

                   <div class="col-md-12 col">
                  
                      <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                                      FROM appNews as n
                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                      WHERE n.mt_id='$mt_id' AND n.ns_nt_pk!='nt2019021210051224' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                      ORDER BY n.ns_vfdate DESC LIMIT 0,10";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                      ?>
                  
                  </div>
                   <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                                       
                     <!--卡總覽-->
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap">
                           
                           <div class="card_all row no-gutters">

                             <div class="col-md-2">
                               <div class="card_fun w-h-100 hv-center hole">
                                   <div class="text-center">
                                       <img src="../img/component/card_rank_logo.png" alt=""> <p class="mb-0 mt-025">卡總覽</p>
                                   </div>
                               </div>  
                             </div>
                             <div class="col-md-10">
                              <div class="swiper_div">
                                 <div class="swiper-container">
                                   <div class="swiper-wrapper">
                                       <?php 
                                        $row_card_type=$pdo->select("SELECT Tb_index, fun_name, card_image, card_image_hover FROM card_func WHERE mt_id='site2018110517362644' AND OnLineOrNot=1 ORDER BY OrderBy ASC");
                                        $x=1;
                                        $rand_num=rand(1,count($row_card_type));
                                        foreach ($row_card_type as $card_type) {
                                         $active=$x==$rand_num ? 'active':'';
                                         $card_image=$x==$rand_num ? $card_type['card_image_hover'] : $card_type['card_image'];
                                         $card_url='card_browse.php?func='.$card_type['Tb_index'].'" title="'.$card_type['fun_name'];
                                          echo '
                                          <div class="swiper-slide '.$active.'" fun_id="'.$card_type['Tb_index'].'" index="'.$x.'" > 
                                           <div class="text-center" ><a href="javascript:;"><img src="../sys/img/'.$card_image.'" alt="'.$card_type['fun_name'].'" ></a></div>
                                          </div>';
                                         $x++;
                                        }
                                       ?>                                     
                                   </div>

                               </div>

                               <!-- 如果需要导航按钮 -->
                                   <div class="swiper-button-prev"> <i class=" fa fa-angle-left"></i> </div>
                                   <div class="swiper-button-next"> <i class="fa fa-angle-right"></i></div>

                                <!-- 給予隨機卡功能 -->
                                <input type="hidden" name="rand_num" value="<?php echo $rand_num;?>">

                              </div>
                             </div>
                           </div>

                           <div class="ccard slider">
                               
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">
                                     <?php //-- /js/main.js 卡總覽 -- ?>
                                  </div>
                                                                    
                              </div>

                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

                           </div>
                            <a id="cc_more_btn2" class="rank_more card_rank warning-layered btnOver d-block d-md-none" href="">顯示更多卡片</a>
                        </div>
                    </div>
                    <!--卡總覽end -->
                    
                    <!--新卡訊-->
                    <div class="col-md-12 col">
                    <div class="cardshap tab_one brown_tab">
                           <div class="title_tab hole">
                               <i class="icon" style="background-image: url(img/component/icon/icon5.png); background-size: 100%;"></i><h4>新卡訊</h4>
                               <a class="tab_link" href="card/new_card_list.php"></a>
                           </div>
                          
                               <div class="accordion" id="new_card">
                                 <?php 
                                  $row_card_news=$pdo->select("SELECT n.Tb_index, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.area_id, n.mt_id, n.ns_nt_pk, n.ccard_sp, cc.cc_interest_desc
                                                              FROM NewsAndType as n 
                                                              INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                              INNER JOIN credit_card as cc ON cc.cc_group_id=abc.card_group_id AND cc.cc_cardorg=abc.org_id AND cc.cc_cardlevel=abc.level_id
                                                              WHERE n.ns_nt_pk='nt201902121004593' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 AND n.OnLineOrNot=1
                                                              AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                              ORDER BY n.ns_vfdate DESC 
                                                              LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                  $x=1;
                                  foreach ($row_card_news as $card_news) {

                                    $ns_ftitle=mb_substr($card_news['ns_ftitle'], 0,20, 'utf-8');
                                    $ns_msghtml=mb_substr(strip_tags($card_news['ns_msghtml']), 0,55,'utf-8');

                                    //-------------- 網址判斷 ------------------
                                    $news_url=news_url($card_news['mt_id'], $card_news['Tb_index'], $card_news['ns_nt_pk'], $card_news['area_id']);

                                    $show=$x==1 ? 'show':'';

                                    $ccard_sp_txt='';
                                    $ccard_sp=empty($card_news['ccard_sp']) ? preg_split('/\n/',$card_news['cc_interest_desc']) : preg_split('/\n/',$card_news['ccard_sp']);
                                    $y=1;
                                    foreach ($ccard_sp as $ccard_sp_one) {
                                      if ($y<=3) {
                                        $ccard_sp_txt.='<li>'.$ccard_sp_one.'</li>';
                                    }
                                    $y++;
                                    }

                                    echo '
                                  <div class="card">
                                   <div class="card-header" id="heading'.$x.'">
                                     <h5 class="mb-0">
                                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$x.'" aria-expanded="true" aria-controls="collapse'.$x.'">
                                         '.$ns_ftitle.'
                                       </button>
                                     </h5>
                                   </div>

                                   <div id="collapse'.$x.'" class="collapse '.$show.'" aria-labelledby="heading'.$x.'" data-parent="#new_card">
                                     <div class="card-body">
                                      <a style="top: 0; left: 0;" class="position-absolute w-h-100" href="'.$news_url.'" title="'.$card_news['ns_ftitle'].'"></a>
                                       <div class="card_one">
                                         <a href="'.$news_url.'" title="'.$card_news['ns_ftitle'].'">
                                          <img src="/sys/img/'.$card_news['ns_photo_1'].'" alt=""> <br>
                                          '.$ns_ftitle.'
                                         </a>
                                       </div>
                                       <div class="card_info star_li">
                                        
                                         <ul>
                                         '.$ccard_sp_txt.'
                                        </ul>
                                        
                                       </div>
                                       <a class="card_more" href="'.$news_url.'">more</a>
                                     </div>
                                   </div>
                                 </div>';
                                  $x++; }
                                 ?>
                               </div>
                       </div>
                      </div>
                    <!--新卡訊end -->
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                    


                    <?php 
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //卡情報-特別議題 ：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     area_nt_sp_list_ph('at2019021114154632', 'message', 'brown_tab');
                    ?>

                    
                     

                     <?php 
                      //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                      //卡情報-刷卡整理 ：：：：：：：：：：：：：：：：：：：：：：：
                      //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                      area_nt2_list_ph('un2019011716580977', 'message', 'brown_tab');
                     ?>

                     
                    

                    <?php 
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //卡情報-卡好康 ：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     area_nt_list_ph('un2019011716575635', 'message', 'brown_tab');
                    
                    ?>
                    
                    

                    <!--信用卡推薦-->
                    <div class="col-md-12 col mb-5 pb-5">

                        <div class="cardshap brown_tab exception">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content p-0" id="myTabContent">
                          <div class="tab-pane fade show active"  role="tabpanel" >

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color phone_card">
                                <h4 class="text-center">匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 phone_hidden">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->    

                    
                    <!-- 懸浮廣告 -->
                    <div class="ad_fixed_ph">
                      <div class="swiper-container sub_ph_slide">
                          <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <a href="#"><img class="w-100" src="http://placehold.it/900x180" alt=""></a>
                              </div>
                              <div class="swiper-slide">
                                 <a href="#"><img class="w-100" src="http://placehold.it/900x180" alt=""></a>
                              </div>
                          </div>
                          
                          <!-- 如果需要导航按钮 -->
                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                      </div>
                    </div>
                    <!-- 懸浮廣告 END -->



                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            
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