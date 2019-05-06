<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>卡優新聞網-優集點</title>

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
  <body class="point_body">

    <div class="container">

        <?php 
         //-- 共用header --
         require '../share_area/header.php';
        ?>

        <!-- 麵包屑 -->
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">優集點</a></p>
          </div>
        </div>
        
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                <div class="row">

                  <?php 
                       //先取出優集點的分類，再從優集點的分類中，把appNews load出來，優集點版區id為$area_id
                       $pdo=pdo_conn();
                       $sql_area=$pdo->prepare("SELECT Tb_index FROM `news_type` WHERE `area_id` LIKE '$area_id'");
                       $sql_area->execute();
                       $row_areas = $sql_area->fetchAll();

                       foreach ($row_areas as $row_area) {
                           $unit_all_id.="'".$row_area['Tb_index']."',";
                        }
                       $unit_all_id = substr($unit_all_id, 0, -1); //去掉最後一碼，



                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 page_carousel.php執行
                       //============================================
                       $sql_carousel="
                        SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
                        where ns_nt_pk in ($unit_all_id)  
                        and ns_verify=3 and OnLineOrNot=1 
                        and  StartDate<='$todayis' and EndDate>='$todayis'
                        order by ns_vfdate desc
                        LIMIT 0, 12
                        ";
                       require '../share_area/page_carousel.php';
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
                    <!--廣告end-->
                    
                   
                    
                    <!--集點資訊-->
                    <div class="col-md-12 col">

                        <div class="cardshap Darkbrown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="all-tab" href="all.php" aria-controls="all" aria-selected="true">集點資訊</a>
                          </li>
                         
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                           <div class="row">
                               <div class="col-md-6 col">
                                 <div class="cardshap point-4">
                                   <a href="http://cardu.srl.tw/point/about.php" title="點數平台">
                                    <div>
                                     <img src="../img/component/icon/point.png">
                                     </div>
                                   <h1>點數平台</h1>
                                   
                                   </a>
                                </div>
                              </div>
                              
                              <div class="col-md-6 col">
                                <div class="cardshap point-4">
                                  <a href="http://cardu.srl.tw/point/shop.php" title="點數店家">
                                 <div>
                                    <img src="../img/component/icon/point_2.png">
                                  </div>
                                  <h1>集點店家</h1>
                                 
                                  </a>
                               </div>
                             </div>
                            </div>
                           
                          </div>
                      
                        </div>
                      </div>
                    </div>
                    <!--集點資訊end -->

                     <!--廣告-->
                    <div class="col-md-12 col"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->


                    <!--特別議題-->
                    <?php 
                    //===================================
                    //取出特別議題頁籤
                    //===================================
                      $sql_special=$pdo->prepare("
                        SELECT nt_name,Tb_index,pk FROM news_type
                        where area_id='$area_id' and nt_sp=1 
                        and OnLineOrNot=1 
                        and nt_sp_begin_date <= '$todayis' and nt_sp_end_date >= '$todayis' 
                        order by OrderBy  
                        LIMIT 0, 4");

                      $sql_special->execute();
                      $row_specials = $sql_special->fetchAll();

                    ?>
                    <div class="col-md-12 col">

                        <div class="cardshap Darkbrown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <?php 
                        //tab來個回圈＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
                        $i=1;
                        foreach ($row_specials as $row_special) {
                          if($i==1){
                              $activeornot="active";
                            }else{
                              $activeornot="";
                            }
                        $Tb_index = $row_special['Tb_index'];
                        $nt_name = $row_special['nt_name'];
                        $nt_pk = $row_special['pk'];

                        echo "<li class='nav-item news_tab'>
                                <a class='nav-link pl-30 py-2 $activeornot' id='special_$Tb_index-tab' href='javascript:;' tab-target='#special_$Tb_index' aria-selected='true' disabled>$nt_name</a>
                              </li>";
                        $i++;}
                        ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <?php 
                           //跑回圈將每個tab內容都load出＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
                            $y=1;
                            foreach ($row_specials as $row_special) {
                                if($y==1){
                                  $activeornot="active";
                                }else{
                                  $activeornot="";
                                }

                              $Tb_index = $row_special['Tb_index'];
                            ?>

                              <?php echo getNews($Tb_index,$todayis,$mt_id,$activeornot,$y,1);?>

                          <?php $y++;} //結束tab內容＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝?>
                      </div>
                    </div>
                    </div>
                    <!--特別議題end -->
                    
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


              

                   <?php 
                    //======================================================================
                    //取出全分類頁籤+頁籤內資料--
                    //目前只列出懶人包 nt2019011818241680 / 樂分享 nt2019011818242292
                    //======================================================================
                      $sql_type=$pdo->prepare("
                        SELECT nt_name,Tb_index,pk FROM news_type
                        where area_id='$area_id' and nt_sp<>1 
                        and OnLineOrNot=1 
                        and Tb_index='nt2019011818241680' or Tb_index='nt2019011818242292'
                        order by OrderBy  
                        ");
                      $sql_type->execute();



                     //分批取出part1--------------------------------------
                    $i=1; while ($row_types=$sql_type->fetch(PDO::FETCH_ASSOC)) {

                
                        if($i==1){
                          $activeornot="active show";
                        }else{
                          $activeornot="";
                        }
                      $Tb_index = $row_types['Tb_index'];
                      $nt_name = $row_types['nt_name'];
                      $nt_pk = $row_types['pk'];


                      $tab1.= "<li class='nav-item '>
                              <a class='nav-link py-2 pl-0 flex-x-center $activeornot' id='special_$Tb_index-tab' href='list.php?nt_pk=$nt_pk' tab-target='#special_$Tb_index' aria-selected='true'>$nt_name</a>
                            </li>";
                      $content1.=getNews($Tb_index,$todayis,$mt_id,$activeornot,$i,0);

                      if ( $i==3 ) break;
                      $i++;}
                      //end part1--------------------------------------


                    ?>
                    <div class="col-md-12 col">
                    <div class="cardshap Darkbrown_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <?php echo $tab1?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <?php echo $content1?>
                        </div>
                      </div>
                    </div>


                    
                    
                    

                    
                    <!--最新文章-->
                    <?php 
                       //============================================
                       //最新文章
                       //============================================
                       $sql_newtemp="
                        SELECT a.ns_ftitle,a.ns_photo_1,a.ns_msghtml,a.Tb_index,b.nt_name
                        FROM  appNews a left join news_type b on a.ns_nt_pk = b.Tb_index
                        where a.ns_nt_pk in ($unit_all_id)  
                        and a.ns_verify=3 and a.OnLineOrNot=1 
                        and  a.StartDate<='$todayis' and a.EndDate>='$todayis'
                        order by a.ns_vfdate desc
                        LIMIT 0, 10
                        ";
                        $sql_new=$pdo->prepare($sql_newtemp);
                        $sql_new->execute();

                        //分批取出part1--------------------------------------
                      $i=1; while ($row_new=$sql_new->fetch(PDO::FETCH_ASSOC)) {
                        $id=$row_new['Tb_index'];
                        $ns_ftitle=$row_new['ns_ftitle'];
                        $ns_msghtml=$row_new['ns_msghtml'];
                        $ns_photo_1="../sys/img/".$row_new['ns_photo_1'];
                        $nt_name = $row_new['nt_name'];

                        $ns_ftitle_temp=mb_substr(strip_tags($ns_ftitle),0, 14,"utf-8")."...";



                                $new_temp2[$i]="<a href='detail.php?$id'>
                                               <div class='img_div' title='$ns_ftitle' style='background-image: url($ns_photo_1);'>
                                                 <small>$nt_name</small>
                                               </div>
                                               <p>$ns_ftitle</p>
                                           </a>"
                                           ;
                                    $new_temp3[$i]="<a href='detail.php?$id'>
                                               <div class='img_div' title='$ns_ftitle' style='background-image: url($ns_photo_1);'>
                                                 <small>$nt_name</small>
                                               </div>
                                               <p>$ns_ftitle_temp</p>
                                           </a>"
                                           ;
                              }



                       
                      ?>
                    <div class="col-md-12 col">

                        <div class="cardshap Darkbrown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" data-toggle="tab" href="#title_5" role="tab" aria-controls="title_5" aria-selected="true">最新文章</a>
                          </li>
                         
                        </ul>
                        
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                            <div class="tab-content" id="myTabContent">
                             <div class="row no-gutters">
                                <div class="col-6 cards-two">
                                   <?php echo $new_temp2[1]?>
                                </div>
                                <div class="col-6 cards-two">
                                   <?php echo $new_temp2[2]?>
                                </div>
                            </div>

                            <div class="row no-gutters pt-2">
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp2[3]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp2[4]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp2[5]?>
                                </div>
                            </div>
                           </div>
                            <!--廣告-->
                             <div class="col-md-12"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                             <!--banner end -->
                                <div class="tab-content" id="myTabContent">
                                 <div class="row no-gutters">
                                <div class="col-6 cards-two">
                                   <?php echo $new_temp2[6]?>
                                </div>
                                <div class="col-6 cards-two">
                                   <a href="#">
                                   <?php echo $new_temp2[7]?>
                                </div>
                            </div>

                            <div class="row no-gutters pt-2">
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp2[8]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp2[9]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp2[10]?>
                                </div>
                            </div>
                          </div>
                                          
                          </div>
                          
                        
                      </div>
                    </div>
                    <!--最新文章end -->
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
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one Darkbrown_tab">
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
                       
                       <div class="cardshap tab_one Darkbrown_tab">
                           <div class="title_tab hole">
                               <h4>優集點</h4>
                           </div>
                        <div class="tab-content ucard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">--點數平台--</option>
                                      <option value="UUPON">UUPON</option>
                                      <option value="OPENPOINT">OPENPOINT</option>
                                      <option value="Happy Cash">Happy Cash</option>
                                  </select>

                                  <select>
                                      <option value="">--所有類別--</option>
                                      <option value="購物">購物</option>
                                      <option value="美食">美食</option>
                                      <option value="旅遊">旅遊</option>
                                      <option value="電影">電影</option>
                                      <option value="休閒">休閒</option>
                                      <option value="交通">交通</option>
                                      <option value="藝文">藝文</option>
                                  </select> 
                                  <input type="text" value="enter text..."> 
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
                       <div class="cardshap hotCard tab_one Darkbrown_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
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

                           </div>
                       </div>
                    </div>

                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>



                    

                    <div class="col-md-12 col">
                       <div class="cardshap tab_one Darkbrown_tab">
                           <div class="title_tab hole">
                               <h4>熱門集點</h4>
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
                    
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>

                    

                    

                   



                    
                    <?php 
                     //-- 共用footer --
                     require '../share_area/footer.php';
                    ?>
                    

                </div>
            </div>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
     //-- 共用jS --
     require '../share_area/share_js.php';
    ?>

  </body>
</html>