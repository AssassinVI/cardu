<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>卡優新聞網-卡情報</title>

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

    <div class="container">

             
    <?php 
     //-- 共用Header --
     require '../share_area/header.php';
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

                   <?php 
                    //============================================
                    //每頁的輪播
                    //設定好sql後，交由 func.php執行
                    //============================================
                    $sql_carousel="
                     SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                     FROM appNews as n
                     INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                     WHERE n.mt_id='site201901111555425' AND n.ns_nt_pk!='nt2019021210051224' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                     ORDER BY n.ns_vfdate DESC LIMIT 0,6
                     ";
                    slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                   ?>

                     <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col ad_news">
                          <div class="row no-gutters">
                            <div class="col-md-6 h-center">
                             <img src="../img/component/ad_sm.png"> 
                            </div>
                           <div class="col-md-6">
                            <div class="best">
                             <img src="../img/component/best.png">
                            </div>
                            <h6>匯豐現金回饋卡</h6>
                            <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                           </div>
                         </div>
                        </div>
                        <div class="col-md-6 col ad_news">
                          <div class="row no-gutters">
                            <div class="col-md-6 h-center">
                             <img src="../img/component/ad_sm.png"> 
                            </div>
                           <div class="col-md-6">
                            <div class="best">
                             <img src="../img/component/best.png">
                            </div>
                            <h6>匯豐現金回饋卡</h6>
                            <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                           </div>
                         </div>
                        </div>
                    </div>      

                     <!-- ================================================================================ 卡總覽 ================================================================== -->
                    <div class="col-md-12 col">
                        <div id="iCardRanking" class="cardshap">
                           
                           <div class="card_all row no-gutters">

                             <div class="col-2">
                               <div class="card_fun w-h-100 hv-center hole">
                                   <div class="text-center mt-05">
                                       <img src="../img/component/card_rank_logo.png" alt=""> <p class="mb-0 mt-025">卡總覽</p>
                                   </div>
                               </div>  
                             </div>
                             <div class="col-10">
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
                                       echo '
                                       <div class="swiper-slide '.$active.'" fun_id="'.$card_type['Tb_index'].'" index="'.$x.'" > 
                                        <div class="text-center" ><a href="all.php?func='.$card_type['Tb_index'].'" title="'.$card_type['fun_name'].'"><img src="../sys/img/'.$card_image.'" alt="'.$card_type['fun_name'].'" ></a></div>
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


                           <div class="ccard">
                               
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">
                                    
                                  </div>
                              </div>

                              <!-- 如果需要导航按钮 -->
                              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

                           </div>
                            
                        </div>
                    </div>
                    <!-- ================================================================================ 卡總覽end ================================================================================ -->


                     <!--廣告-->
                    <div class="col-md-12 col"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->

                   <!-- ==================================================================== 新卡訊&權益變更 =========================================================================-->
                   <div class="col-md-12 col">
                    <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link  py-2 pl-0 flex-x-center active show" id="goodTicket-tab"  href="new_card_list.php" tab-target="#goodTicket" aria-selected="true"><i class="icon"></i> 新卡訊</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodSet-tab" href="interests_list.php" tab-target="#goodSet" aria-selected="false"><i class="icon"></i> 權益變更</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodTicket" role="tabpanel" aria-labelledby="goodTicket-tab">

                            <div class="swiper-container sub_slide">
                                <div class="swiper-wrapper">

                                  <?php 
                                    //-- 新卡訊 --
                                    $row_news=$pdo->select("SELECT Tb_index, ns_ftitle, ns_photo_1 ,ns_cdate
                                                            FROM appNews 
                                                            WHERE ns_nt_pk='nt201902121004593' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                            ORDER BY ns_vfdate DESC LIMIT 0,6", ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                                    for ($i=0; $i <2 ; $i++) { 
                                      
                                      $news_txt='';

                                      for ($j=0; $j <3 ; $j++) { 
                                        $index=($i*3)+$j;
                                        $ns_ftitle=mb_substr($row_news[$index]['ns_ftitle'], 0,14, 'utf-8');
                                        $news_txt.='
                                        <div class="col-4 cards-3">
                                          <a href="new_card_detail.php?'.$row_news[$index]['Tb_index'].'">
                                           <div class="img_div" title="'.$row_news[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news[$index]['ns_photo_1'].');">
                                           </div>
                                            <p>'.$ns_ftitle.'</p>
                                          </a>
                                        </div>';
                                      }

                                      $txt='
                                      <div class="swiper-slide">
                                      <div class="row no-gutters">
                                        '.$news_txt.'
                                      </div>
                                    </div>';
                                    echo $txt;
                                    }
                                  ?>
                                   
                                </div>
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="goodSet" role="tabpanel" aria-labelledby="goodSet-tab">
                            <div class="change_law">
                            <?php 
                             //-- 權益變更 --
                             $row_news=$pdo->select("SELECT Tb_index, ns_ftitle, ns_photo_1 ,ns_vfdate, ns_msghtml
                                                     FROM appNews 
                                                     WHERE ns_nt_pk='nt2019021210051224' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                     ORDER BY ns_vfdate DESC LIMIT 0,7", ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                            ?>
                            <div class="col-md-12">
                              <a href="interests_card_detail.php?<?php echo $row_news[0]['Tb_index'];?>" title="<?php echo $row_news[0]['ns_ftitle'];?>">
                               <h5><?php echo $row_news[0]['ns_ftitle'];?><span>(<?php echo date('Y/m/d', strtotime($row_news[0]['ns_vfdate'])); ?>)</span></h5>
                              </a>
                              <p><?php echo mb_substr(strip_tags($row_news[0]['ns_msghtml']), 0, 70, 'utf-8');?></p>
                            </div>
                            <div class="col-md-12 col0">
                              <div class="row">
                                <?php 
                                  
                                  for ($i=0; $i <2 ; $i++) { 
                                    
                                    $interests_li='';

                                    for ($j=1; $j <4 ; $j++) { 
                                      $index=($i*3)+$j;
                                      $ns_ftitle=mb_substr($row_news[$index]['ns_ftitle'], 0,14,'utf-8');
                                      $interests_li.='<li><a href="interests_card_detail.php?'.$row_news[$index]['Tb_index'].'" title="'.$row_news[$index]['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                                    }

                                    $txt='
                                    <div class="col-6">
                                      <ul class="cardu_li interests">
                                      '.$interests_li.'
                                      </ul>
                                    </div>';
                                    echo $txt;
                                  }
                                ?>
                             </div>
                            </div>
                          </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- ========================================================== 新卡訊&權益變更end ==================================================================-->

                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!-- ========================================================== 特別議題 ========================================================== -->
                    <?php 
                      $row_news_type=$pdo->select("SELECT Tb_index, nt_name 
                                                   FROM news_type 
                                                   WHERE mt_id='site2019011115561564' AND nt_sp=1 AND OnLineOrNot=1 AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>=:nt_sp_end_date", 
                                                   ['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
                      //-- tab html --
                      $list_txt='';
                      //-- 內容html --
                      $content_txt='';
                      $x=1;
                      foreach ($row_news_type as $news_type) {
                        $active=$x==1 ? 'active':'';

                       //-- tab --
                       $list_txt.= '
                        <li class="nav-item news_tab">
                          <a class="nav-link '.$active.' pl-30 py-2" id="special_'.$x.'-tab"  href="/message/second.php?mt_pk='.$news_type['Tb_index'].'" tab-target="#special_'.$x.'" aria-selected="true">'.$news_type['nt_name'].'</a>
                        </li>';


                       //-- 內容 --
                       $row_news_con=$pdo->select("SELECT Tb_index, ns_ftitle, ns_photo_1 ,ns_cdate
                                                      FROM appNews 
                                                      WHERE ns_nt_sp_pk=:ns_nt_sp_pk AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                      ORDER BY ns_vfdate DESC LIMIT 0,6", ['ns_nt_sp_pk'=>$news_type['Tb_index'],'StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                       $slide_txt='';

                       for ($i=0; $i <2 ; $i++) { 
                                
                                $news_txt='';

                                for ($j=0; $j <3 ; $j++) { 
                                  $index=($i*3)+$j;
                                  $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');
                                  $news_txt.='
                                  <div class="col-4 cards-3">
                                    <a href="/message/detail.php?'.$row_news_con[$index]['Tb_index'].'">
                                     <div class="img_div" title="'.$row_news_con[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                     </div>
                                      <p>'.$ns_ftitle.'</p>
                                    </a>
                                  </div>';
                                }

                                $slide_txt.='
                                <div class="swiper-slide">
                                <div class="row no-gutters">
                                  '.$news_txt.'
                                </div>
                              </div>';
                       }

                       $content_txt.='<div class="tab-pane fade show '.$active.'" id="special_'.$x.'" role="tabpanel" aria-labelledby="special_'.$x.'-tab">
                                       <div class="swiper-container sub_slide">
                                          <div class="swiper-wrapper">
                                          '.$slide_txt.'
                                          </div>

                                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                       </div>
                                      </div>';

                       $x++;
                     }
                    ?>

                    <div class="col-md-12 col">

                      <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                          <?php echo $list_txt; ?>
                         
                        </ul>
                        <div class="tab-content" id="myTabContent">

                          <?php echo $content_txt; ?>

                        </div>
                      </div>
                    </div>
                    <!-- ========================================================== 特別議題end  ========================================================== -->
                    
                    <!--廣告-->
                    <div class="col-md-12 col"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    


                    <!-- ========================================================== 刷卡整理 ========================================================== -->
                    <?php 
                      $row_news_type=$pdo->select("SELECT Tb_index, nt_name
                                                   FROM news_type 
                                                   WHERE mt_id='site2019011115561564' AND unit_id='un2019011716580977' AND OnLineOrNot=1
                                                   ORDER BY OrderBy ASC
                                                   LIMIT 0,3");
                      //-- tab html --
                      $list_txt='';
                      //-- 內容html --
                      $content_txt='';
                      $x=1;
                      foreach ($row_news_type as $news_type) {
                        $active=$x==1 ? 'active':'';

                       //-- tab --
                       $list_txt.= '
                        <li class="nav-item news_tab news_tab_three">
                          <a class="nav-link '.$active.' pl-30 py-2" id="card_'.$x.'-tab"  href="/message/second.php?mt_pk='.$news_type['Tb_index'].'" tab-target="#card_'.$x.'" aria-selected="true">'.$news_type['nt_name'].'</a>
                        </li>';


                       //-- 內容 --
                       $row_news_con=$pdo->select("SELECT n.Tb_index, n.mt_id, n.ns_nt_pk, n.ns_ftitle, n.ns_photo_1, nt.area_id
                                                      FROM appNews as n 
                                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                                      WHERE (n.ns_nt_pk=:ns_nt_pk OR n.ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                      ORDER BY n.ns_vfdate DESC LIMIT 0,6", 
                                                      ['ns_nt_pk'=>$news_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$news_type['Tb_index'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                       $slide_txt='';

                       for ($i=0; $i <2 ; $i++) { 
                                
                                $news_txt='';

                                for ($j=0; $j <3 ; $j++) { 
                                  $index=($i*3)+$j;
                                  $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');

                                  //-------------- 網址判斷 ------------------
                                  $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                                  
                                  $news_txt.='
                                  <div class="col-4 cards-3">
                                    <a href="'.$news_url.'">
                                     <div class="img_div" title="'.$row_news_con[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                     </div>
                                      <p>'.$ns_ftitle.'</p>
                                    </a>
                                  </div>';
                                }

                                $slide_txt.='
                                <div class="swiper-slide">
                                <div class="row no-gutters">
                                  '.$news_txt.'
                                </div>
                              </div>';
                       }

                       $content_txt.='<div class="tab-pane fade show '.$active.'" id="card_'.$x.'" role="tabpanel" aria-labelledby="card_'.$x.'-tab">
                                       <div class="swiper-container sub_slide">
                                          <div class="swiper-wrapper">
                                          '.$slide_txt.'
                                          </div>

                                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                       </div>
                                      </div>';

                       $x++;
                     }
                    ?>
                    <div class="col-md-12 col">

                      <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                          <?php echo $list_txt; ?>
                         
                        </ul>
                        <div class="tab-content" id="myTabContent">

                          <?php echo $content_txt; ?>

                        </div>
                      </div>
                    </div>
                    <!-- ========================================================== 刷卡整理 END ========================================================== -->

                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!-- ========================================================== 卡好康 1-4 ========================================================== -->
                    <?php 
                      $row_news_type=$pdo->select("SELECT Tb_index, nt_name
                                                   FROM news_type 
                                                   WHERE mt_id='site2019011115561564' AND unit_id='un2019011716575635' AND nt_sp=0 AND OnLineOrNot=1
                                                   ORDER BY OrderBy ASC
                                                   LIMIT 0,4");
                      //-- tab html --
                      $list_txt='';
                      //-- 內容html --
                      $content_txt='';
                      $x=1;
                      foreach ($row_news_type as $news_type) {
                        $active=$x==1 ? 'active':'';

                       //-- tab --
                       $list_txt.= '
                        <li class="nav-item news_tab ">
                          <a class="nav-link '.$active.' pl-30 py-2" id="message1_'.$x.'-tab"  href="/message/second.php?mt_pk='.$news_type['Tb_index'].'" tab-target="#message1_'.$x.'" aria-selected="true">'.$news_type['nt_name'].'</a>
                        </li>';


                       //-- 內容 --
                       $row_news_con=$pdo->select("SELECT n.Tb_index, n.mt_id, n.ns_nt_pk, n.ns_ftitle, n.ns_photo_1, nt.area_id
                                                      FROM appNews as n 
                                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                                      WHERE (n.ns_nt_pk=:ns_nt_pk OR n.ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                      ORDER BY n.ns_vfdate DESC LIMIT 0,6", 
                                                      ['ns_nt_pk'=>$news_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$news_type['Tb_index'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                       $slide_txt='';

                       for ($i=0; $i <2 ; $i++) { 
                                
                                $news_txt='';

                                for ($j=0; $j <3 ; $j++) { 
                                  $index=($i*3)+$j;
                                  $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');

                                  //-------------- 網址判斷 ------------------
                                  $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                                  
                                  $news_txt.='
                                  <div class="col-4 cards-3">
                                    <a href="'.$news_url.'">
                                     <div class="img_div" title="'.$row_news_con[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                     </div>
                                      <p>'.$ns_ftitle.'</p>
                                    </a>
                                  </div>';
                                }

                                $slide_txt.='
                                <div class="swiper-slide">
                                <div class="row no-gutters">
                                  '.$news_txt.'
                                </div>
                              </div>';
                       }

                       $content_txt.='<div class="tab-pane fade show '.$active.'" id="message1_'.$x.'" role="tabpanel" aria-labelledby="message1_'.$x.'-tab">
                                       <div class="swiper-container sub_slide">
                                          <div class="swiper-wrapper">
                                          '.$slide_txt.'
                                          </div>

                                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                       </div>
                                      </div>';

                       $x++;
                     }
                    ?>
                    <div class="col-md-12 col">

                      <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                          <?php echo $list_txt; ?>
                         
                        </ul>
                        <div class="tab-content" id="myTabContent">

                          <?php echo $content_txt; ?>

                        </div>
                      </div>
                    </div>
                    <!-- ========================================================== 卡好康 1-4 END ========================================================== -->

                    
                    
                    <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->
                    
                    
                    
                    <!-- ========================================================== 卡好康 5-8 ========================================================== -->
                    <?php 
                      $row_news_type=$pdo->select("SELECT Tb_index, nt_name
                                                   FROM news_type 
                                                   WHERE mt_id='site2019011115561564' AND unit_id='un2019011716575635' AND nt_sp=0 AND OnLineOrNot=1
                                                   ORDER BY OrderBy ASC
                                                   LIMIT 4,4");
                      //-- tab html --
                      $list_txt='';
                      //-- 內容html --
                      $content_txt='';
                      $x=1;
                      foreach ($row_news_type as $news_type) {
                        $active=$x==1 ? 'active':'';

                       //-- tab --
                       $list_txt.= '
                        <li class="nav-item news_tab ">
                          <a class="nav-link '.$active.' pl-30 py-2" id="message2_'.$x.'-tab"  href="/message/second.php?mt_pk='.$news_type['Tb_index'].'" tab-target="#message2_'.$x.'" aria-selected="true">'.$news_type['nt_name'].'</a>
                        </li>';


                       //-- 內容 --
                       $row_news_con=$pdo->select("SELECT n.Tb_index, n.mt_id, n.ns_nt_pk, n.ns_ftitle, n.ns_photo_1, nt.area_id
                                                      FROM appNews as n 
                                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                                      WHERE (n.ns_nt_pk=:ns_nt_pk OR n.ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                      ORDER BY n.ns_vfdate DESC LIMIT 0,6", 
                                                      ['ns_nt_pk'=>$news_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$news_type['Tb_index'].'%','StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
                       $slide_txt='';

                       for ($i=0; $i <2 ; $i++) { 
                                
                                $news_txt='';

                                for ($j=0; $j <3 ; $j++) { 
                                  $index=($i*3)+$j;
                                  $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');

                                  //-------------- 網址判斷 ------------------
                                  $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                                  
                                  $news_txt.='
                                  <div class="col-4 cards-3">
                                    <a href="'.$news_url.'">
                                     <div class="img_div" title="'.$row_news_con[$index]['ns_ftitle'].'" style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                     </div>
                                      <p>'.$ns_ftitle.'</p>
                                    </a>
                                  </div>';
                                }

                                $slide_txt.='
                                <div class="swiper-slide">
                                <div class="row no-gutters">
                                  '.$news_txt.'
                                </div>
                              </div>';
                       }

                       $content_txt.='<div class="tab-pane fade show '.$active.'" id="message2_'.$x.'" role="tabpanel" aria-labelledby="message2_'.$x.'-tab">
                                       <div class="swiper-container sub_slide">
                                          <div class="swiper-wrapper">
                                          '.$slide_txt.'
                                          </div>

                                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                       </div>
                                      </div>';

                       $x++;
                     }
                    ?>
                    <div class="col-md-12 col">

                      <div class="cardshap brown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                          <?php echo $list_txt; ?>
                         
                        </ul>
                        <div class="tab-content" id="myTabContent">

                          <?php echo $content_txt; ?>

                        </div>
                      </div>
                    </div>
                    <!-- ========================================================== 卡好康 5-8 END ========================================================== -->

                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->
                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
              require 'right_area_div.php'; 
            ?>
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