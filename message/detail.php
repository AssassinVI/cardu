<?php 
 require '../share_area/conn.php';

 //-- 紀錄LOG --
 message_click_total($_SERVER['QUERY_STRING']);

 $row=$pdo->select("SELECT * FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

 //-- 404 判斷 --
 if (empty($row['Tb_index'])) {
  location_up('../member/my404.php?card','');
  exit();
 }

 $ns_msghtml=mb_substr(strip_tags($row['ns_msghtml']), 0,100);


 //-- 上下篇新聞  --
 $where=[
   'StartDate'=>date('Y-m-d'), 
   'EndDate'=>date('Y-m-d'), 
   'ns_nt_pk'=>$row['ns_nt_pk'], 
   'ns_nt_ot_pk'=>'%'.$row['ns_nt_pk'].'%', 
   'ns_vfdate'=>$row['ns_vfdate']
 ];
 
 //-- 上一篇 --
 $prev_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate
                                   FROM NewsAndType 
                                   WHERE ns_verify=3 AND OnLineOrNot=1 
                                   AND StartDate<=:StartDate AND EndDate>=:EndDate AND ns_nt_pk=:ns_nt_pk 
                                   AND ns_vfdate>:ns_vfdate  ORDER BY ns_vfdate ASC LIMIT 0,1 ", $where, 'one');
 
 //-- 下一篇 --
 $next_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate
                                   FROM NewsAndType 
                                   WHERE ns_verify=3 AND OnLineOrNot=1 
                                   AND StartDate<=:StartDate AND EndDate>=:EndDate AND ns_nt_pk=:ns_nt_pk 
                                   AND ns_vfdate<:ns_vfdate  ORDER BY ns_vfdate DESC LIMIT 0,1 ", $where, 'one');

 $prev_btn_display=empty($prev_news['Tb_index']) ? 'd-none':'d-block';
 $next_btn_display=empty($next_news['Tb_index']) ? 'd-none':'d-block';

 $prev_url=news_url($prev_news['mt_id'], $prev_news['Tb_index'], $prev_news['ns_nt_pk'], $prev_news['area_id']);
 $next_url=news_url($next_news['mt_id'], $next_news['Tb_index'], $next_news['ns_nt_pk'], $next_news['area_id']);


?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $row['ns_ftitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row['ns_ftitle']; ?>,<?php echo $row['nt_name']; ?>,卡好康"/>  
    <meta name="description" content="<?php echo $ns_msghtml.'...';?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $row['ns_ftitle']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $row['ns_ftitle']; ?>" />
    <meta property="og:description" content="<?php echo $ns_msghtml.'...';?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
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

        
        <!-- 上下篇按鈕 -->
        <div class="<?php echo $prev_btn_display; ?> d-md-none PrevNext_div prev_btn">
          <a href="<?php echo $prev_url; ?>"><i class="fa fa-angle-left"></i></a>
        </div>
        <div class="<?php echo $next_btn_display; ?> d-md-none PrevNext_div next_btn">
          <a href="<?php echo $next_url; ?>"><i class="fa fa-angle-right"></i></a>
        </div>

        
        <!-- 麵包屑 -->
        <div class="row crumbs_row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/card/card.php">卡情報</a> / <a href="list.php?mt_pk=<?php echo $row['pk'];?>"><?php echo $row['nt_name']; ?></a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="pt-3 mx-3 detail_title">
                          <h2><?php echo $row['ns_ftitle']; ?></h2>
                          <div class="row no-gutters my-3">

                            <div class="col-md-8">
                              <h4><?php echo $row['ns_stitle']; ?></h4>
                            </div>
                            <div class="col-md-6">

                             <?php 
                               
                               //-- 關聯銀行 --
                               $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname, bk.bi_logo
                                                       FROM appNews_bank_card as abc
                                                       INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                                       WHERE news_id=:news_id
                                                       GROUP BY abc.bank_id", ['news_id'=>$row['Tb_index']]);
                               
                               $back_num=count($row_back);
                               $back_txt=$back_num==1 ? '<a title="'.$row_back[0]['bi_shortname'].'" href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">
                                                          <img class="icon_top" src="../sys/img/'.$row_back[0]['bi_logo'].'"> 
                                                        </a>' : '';

                               //--------- 活動日期 ----------
                               if ($row['activity_e_date']!='0000-00-00') {
                               	$activity_s_date=$row['activity_s_date']!='0000-00-00' ? $row['activity_s_date']:'即日起';
                               	$activity_date=$back_txt.'<p>活動時間： '.$activity_s_date.'~'.$row['activity_e_date'].'</p>';
                               }
                               else{
                               	$activity_date='';
                               }


                               echo $activity_date;
                             ?>
                              <!-- <a href=""><img class="icon_top" src="../img/component/pay.png"> </a><p>活動時間： 20XX/XX/XX~20XX/XX/XX</p> -->
                            </div>
                            <div class="col-md-6">
                               <?php 
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 // 新聞內頁分享功能按鈕 In share_area/func.php：：：：：：：：：：：：：：：：：：：：：：：
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 news_share_btn($FB_URL, $_SERVER['QUERY_STRING']); 
                               ?>
                            </div>
                          </div> 

                         
                        </div>

                        <div class="pb-3 mx-3 detail_content">

                          <?php 
                           
                           //-- 首圖 --
                           echo '<p>
                                  <img src="'.$img_url.$row['ns_photo_1'].'" alt="'.$row['ns_alt_1'].'">
                                 </p>';
                           

                          if(wp_is_mobile()){
                            //-- 手機廣告 --
                            echo '
                            <a href="#" class="hv-center banner">
                             <img src="http://placehold.it/900x300" alt="">
                           </a>';

                          }
                          
                          //-- html 內文 --
                          echo $row['ns_msghtml'];

                          //-- 尾圖 --
                          if(!empty($row['ns_photo_2'])) {

                            echo '<p>
                                   <img src="'.$img_url.$row['ns_photo_2'].'" alt="'.$row['ns_alt_2'].'">
                                  </p>';
                          }


                          if(wp_is_mobile()){
                            //-- 手機廣告 --
                            echo '
                            <a href="#" class="hv-center banner">
                             <img src="http://placehold.it/900x300" alt="">
                           </a>';

                          }
                          
                          ?>


                           

                            <!-- 注意事項 -->
                            <?php 
                             if (!empty($row['note'])) {
                               echo '<p>
                                       <b>◎注意事項：</b><br>
                                       '.nl2br($row['note']).'
                                     </p>';
                             }
                            ?>
                            <!-- 注意事項 END -->

                            
                            
                            <!-- 延伸閱讀 -->
                            <?php 
                             if (!empty($row['ns_news'])) {
                                
                                $ns_news_txt='';
                             	$ns_news=explode(',', $row['ns_news']);
                             	foreach ($ns_news as $ns_news_one) {
                             	  $ns_news_txt.="'".$ns_news_one."',";
                             	}
                             	$ns_news_txt=substr($ns_news_txt, 0,-1);
                                
                                $o_news_txt='';
                             	$row_o_news=$pdo->select("SELECT Tb_index, ns_ftitle, mt_id, area_id, ns_nt_pk 
                                                        FROM NewsAndType 
                                                        WHERE Tb_index IN ($ns_news_txt)
                                                        ORDER BY field(Tb_index,$ns_news_txt)");
                                foreach ($row_o_news as $o_news) {

                                  $url=news_url($o_news['mt_id'], $o_news['Tb_index'], $o_news['ns_nt_pk'], $o_news['area_id']);
                                  $o_news_txt.='▶▶<a href="'.$url.'">'.$o_news['ns_ftitle'].'</a><br>';
                                }
                             	
                             	echo '
                             	 <p><b>◎延伸閱讀</b><br>
                                   '.$o_news_txt.'
                                 </p>';
                             }
                             
                            ?>

                            <!-- <p><b>◎延伸閱讀</b><br>
                            ▶▶<a href="#">【RichartX蝦皮】小資省錢術!高額回饋金大放送</a><br>
                            ▶▶<a href="#">【信用卡推薦】小資族最愛！澳盛現金回饋卡刷小額高回饋5%</a><br>
                            ▶▶<a href="#">【分享文】台北富邦 VISA無限卡 核卡心得</a>
                            </p> -->
                            <!-- 延伸閱讀 END -->


                          <div class="col-md-12 col hv-center">
                            <div class="row paybg">
                             <div class="col-md-4 hv-center">
                              <p>☆謹慎理財，信用至上☆</p>
                             </div>
                             <div class="col-md-8 hv-center">
                              <p>本文中之活動內容以該銀行、公司公告為準<br>
                                 本文中之各註冊商標、公司名稱，皆屬該公司所有</p>
                             </div> 
                           </div> 
                          </div>
                          

                          

                         
                        </div>

                      </div>
                    </div>

                    
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
                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->




                     <!--XXＸ更多好康-->
                     <?php 

                         $back_num=count($row_back);

                         if ($back_num==1) {
                           
                           $row_c_news=$pdo->select("SELECT n.ns_ftitle, n.ns_photo_1, n.Tb_index, n.area_id, n.ns_nt_pk, n.mt_id
                                                     FROM NewsAndType as n
                                                     INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                     WHERE n.area_id='at2019021114154632' AND n.Tb_index!=:Tb_index AND abc.bank_id=:bank_id
                                                     GROUP BY n.Tb_index
                                                     ORDER BY n.ns_vfdate DESC
                                                     LIMIT 0,3", ['Tb_index'=>$row['Tb_index'], 'bank_id'=>$row_back[0]['bank_id']]);
                           $x=1;
                           $c_news_txt='';
                           foreach ($row_c_news as $c_news) {

                           	$url=news_url($c_news['mt_id'], $c_news['Tb_index'], $c_news['ns_nt_pk'], $c_news['area_id']);
                           	$ns_ftitle=mb_substr($c_news['ns_ftitle'], 0,15,'utf-8');


                            //-- 手機樣式 --
                            if (wp_is_mobile() && $x>2) {

                              if ($x==3) {
                                $c_news_txt.= ' 
                                   <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                    <div class="col-md-4 col-6 py-2 ">
                                       <a target="_blank" class="img_div news_list_img" href="#" style="background-image: url(https://placehold.it/150x100);"></a>
                                    </div>
                                     <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                      <div class="mb-2">
                                       
                                         <h3>
                                          <a target="_blank" href="#" >我是廣告我是廣告我是廣告我是廣告 </a>
                                         </h3>
                                       
                                      </div>
                                     </div>
                                    </div>';
                              }
                              
                              $c_news_txt.= '
                                  <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                    <div class="col-md-4 col-6 py-2 ">
                                       <a target="_blank" class="img_div news_list_img" href="'.$url.'" style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');"></a>
                                    </div>
                                     <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                      <div class="mb-2">
                                       <h3>
                                        <a target="_blank" href="'.$url.'" title="'.$c_news['ns_ftitle'].'">'.$c_news['ns_ftitle'].'</a>
                                       </h3>
                                        
                                      </div>
                                     </div>
                                    </div>';
                            }

                            //-- 電腦樣式 --
                            else{

                             $c_news_txt.= '
                              <div class="col-md-4 cards-3 py-md-2 col-6">
                                 <a target="_blank" href="'.$url.'" title="'.$c_news['ns_ftitle'].'">
                                     <div class="img_div"  style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');">
                                     </div>
                                     <p>'.$ns_ftitle.'</p>
                                 </a>
                              </div>';
                            }


                           	// $c_news_txt.='
                           	//     <div class="col-md-4 col-12 cards-3 py-md-2">
                            //        <a href="'.$url.'" title="'.$c_news['ns_ftitle'].'">
                            //            <div class="img_div w-100-ph"  style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');">
                            //            </div>
                            //            <p>'.$ns_ftitle.'</p>
                            //        </a>
                            //     </div>';
                            $x++;
                           }
                         
                       if (count($row_c_news)>0) {
                             $back_news_txt='
                             <div class="col-md-12 col">
                             <div class="cardshap brown_tab ">
                             <ul class="nav nav-tabs" id="myTab" role="tablist">
                               <li class="nav-item news_tab">
                                 <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">'.$row_back[0]['bi_shortname'].'更多好康</a>
                               </li>
                             </ul>
                             <div class="tab-content" id="myTabContent">
                               <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                                 <div class="row no-gutters">

                                     '.$c_news_txt.'

                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>';

                         echo $back_news_txt;
                       }
                        
                     }
                     ?>
                    
                    <!--XXＸ更多好康end -->
                       <!--相關好康-->
                    <?php 
                      $row_c_news=$pdo->select("SELECT ns_ftitle, ns_photo_1, Tb_index, area_id, ns_nt_pk, mt_id
                                                FROM NewsAndType 
                                                WHERE ns_nt_pk=:ns_nt_pk AND Tb_index!=:Tb_index
                                                ORDER BY ns_vfdate DESC
                                                LIMIT 0,3", ['Tb_index'=>$row['Tb_index'], 'ns_nt_pk'=>$row['ns_nt_pk']]);
                      
                      
                      if (count($row_c_news)>0) {
                    ?>
                    <div class="col-md-12 col">
                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">相關好康</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">
                               
                               <?php 
                                 
                                 $x=1;
                                 $c_news_txt='';
                                 foreach ($row_c_news as $c_news) {

                                 	$url=news_url($c_news['mt_id'], $c_news['Tb_index'], $c_news['ns_nt_pk'], $c_news['area_id']);
                                 	$ns_ftitle=mb_substr($c_news['ns_ftitle'], 0,15,'utf-8');


                                  //-- 手機樣式 --
                                  if (wp_is_mobile() && $x>2) {

                                    if ($x==3) {
                                      $c_news_txt.= ' 
                                         <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                          <div class="col-md-4 col-6 py-2 ">
                                             <a target="_blank" class="img_div news_list_img" href="#" style="background-image: url(https://placehold.it/150x100);"></a>
                                          </div>
                                           <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                            <div class="mb-2">
                                             
                                               <h3>
                                                <a target="_blank" href="#" >我是廣告我是廣告我是廣告我是廣告 </a>
                                               </h3>
                                             
                                            </div>
                                           </div>
                                          </div>';
                                    }
                                    
                                    $c_news_txt.= '
                                        <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                          <div class="col-md-4 col-6 py-2 ">
                                             <a target="_blank" class="img_div news_list_img" href="'.$url.'" style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');"></a>
                                          </div>
                                           <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                            <div class="mb-2">
                                             <h3>
                                              <a target="_blank" href="'.$url.'" title="'.$c_news['ns_ftitle'].'">'.$ns_ftitle.'</a>
                                             </h3>
                                              
                                            </div>
                                           </div>
                                          </div>';
                                  }

                                  //-- 電腦樣式 --
                                  else{

                                   $c_news_txt.= '
                                    <div class="col-md-4 cards-3 py-md-2 col-6">
                                       <a target="_blank" href="'.$url.'" title="'.$c_news['ns_ftitle'].'">
                                           <div class="img_div"  style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');">
                                           </div>
                                           <p>'.$ns_ftitle.'</p>
                                       </a>
                                    </div>';
                                  }

                                  $x++;
                                 }
                                 echo $c_news_txt;

                               ?>
                               
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <?php 
                      } 
                    ?>
                    <!--相關好康end -->


                    
                    
                   <?php 
                     if(wp_is_mobile()){
                    ?>
                     <!--信用卡推薦-->
                      <div class="col-md-12 col ">

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
                                  <h4>匯豐銀行 MasterCard 鈦金卡</h4>
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

                    <?php }else{ ?>
                     
                     <!--廣告-->
                     <div class="col-md-12 row phone_hidden">
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
                     <!--廣告end-->


                     <!--信用卡推薦-->
                     <div class="col-md-12 col">

                         <div class="cardshap brown_tab phone_hidden">
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
                               <div class="col-md-4 card_list_txt">
                                 <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                 <ul>
                                   <li>國內現金回饋1.22%</li>
                                   <li>國外現金回饋2.22%</li>
                                   <li>感應式刷卡快速結帳</li>
                                   <li>高額旅遊平安險</li>
                                   <li>華航機票優惠</li>
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
                                   <img src="../img/component/card2.png" alt="" title="新聞">
                                 </a>
                                 <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                               </div>
                               <div class="col-md-4 card_list_txt">
                                 <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                 <ul>
                                   <li>國內現金回饋1.22%</li>
                                   <li>國外現金回饋2.22%</li>
                                   <li>感應式刷卡快速結帳</li>
                                   <li>高額旅遊平安險</li>
                                   <li>華航機票優惠</li>
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
                                   <img src="../img/component/card3.png" alt="" title="新聞">
                                 </a>
                                 <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                               </div>
                               <div class="col-md-4 card_list_txt">
                                 <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                 <ul>
                                   <li>國內現金回饋1.22%</li>
                                   <li>國外現金回饋2.22%</li>
                                   <li>感應式刷卡快速結帳</li>
                                   <li>高額旅遊平安險</li>
                                   <li>華航機票優惠</li>
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

                    <?php
                     }
                    ?>
                              



                    <!--網友留言-->
                    <div id="message_area" class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">網友留言</a>
                          </li>
                        </ul>
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">Facebook留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="fb-comments" data-width="100%" data-href="<?php echo $FB_URL;?>" data-numposts="5"></div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->

                   

                   <!-- 上一則/下一則 -->
                    <div id="PrevNext_footer" class="col-md-12 row d-md-none pt-3 pb-5 mb-5">
                      <div class="col-6 d-block border-right">
                        <a <?php echo $prev_btn_display; ?> href="<?php echo $prev_url;?>">
                          <i class="fa fa-chevron-circle-left"></i>上一則 <br>
                          <p><?php echo $prev_news['ns_ftitle']; ?></p>
                        </a>
                      </div>
                      <div class="col-6 d-block text-right">
                        <a <?php echo $next_btn_display; ?> href="<?php echo $next_url;?>">
                          <i class="fa fa-chevron-circle-right"></i>下一則 <br>
                          <p><?php echo $next_news['ns_ftitle']; ?></p>
                        </a>
                        </div>
                      </div>
                      <!-- 上一則/下一則 -->




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

    <script type="text/javascript">
      $(document).ready(function() {

        //-- 圖寬限制 --
        img_750_w('.detail_content img');

        //-- alt 圖說 加入fancybox --
        img_txt('.detail_content p img');

        //-- table 優化 --
        html_table('.detail_content>table');
      });

      $(window).on('load', function() {
        
        //-- 內文插入廣告 --
        html_ad();
      });
    </script>

  </body>
</html>