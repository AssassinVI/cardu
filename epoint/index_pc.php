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
    <?php 
    require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-優集點" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-優集點" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL; ?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">優集點</a></p>
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
                       //-- 優行動pay單元 --
                       $ns_nt_ot_pk_query="";
                       $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id='$area_id'");
                       foreach ($row_newsType as $newsType) {
                        $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                       }
                       $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);

                       $sql_carousel="
                        SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id
                        FROM  NewsAndType
                        where (area_id = '$area_id' OR $ns_nt_ot_pk_query) and ns_vfdate<>'0000-00-00 00:00:00' AND ns_verify=3 AND OnLineOrNot=1
                        and  StartDate<='$todayis' and EndDate>='$todayis'
                        order by ns_vfdate desc
                        LIMIT 0, 6
                        ";
                        slide_4s_3b($sql_carousel);
                       
                      ?>

                  <?php 
                       
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
                                   <a href="http://cardu.srl.tw/epoint/all.php" title="點數平台">
                                    <div>
                                     <img src="../img/component/icon/point.png">
                                     </div>
                                   <h1>點數平台</h1>
                                   
                                   </a>
                                </div>
                              </div>
                              
                              <div class="col-md-6 col">
                                <div class="cardshap point-4">
                                  <a href="http://cardu.srl.tw/epoint/all2.php" title="點數店家">
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


                    <!-- ========================================================== 特別議題 ========================================================== -->
                    <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                      $nt_query="SELECT nt_name,Tb_index,pk FROM news_type
                                 where area_id='at2019011117443626' and nt_sp=1 
                                 and nt_sp_begin_date <=:nt_sp_begin_date and nt_sp_end_date >=:nt_sp_end_date
                                 order by OrderBy  
                                 LIMIT 0, 4";
                      $nt_where_arr=['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')];
                      index_sec_area($nt_query, $nt_where_arr, 'epoint', 'Darkbrown_tab', '', 'sp');
                    ?>
                    <!-- ========================================================== 特別議題end  ========================================================== -->
                    
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


                   <!-- ========================================================== 懶人包 / 樂分享 ========================================================== -->
                   <?php 
                      //============================================
                      //每頁的輪播
                      //設定好sql後，交由 func.php執行
                      //============================================
                     $nt_query="SELECT nt_name,Tb_index,pk FROM news_type
                                where Tb_index='nt2019011818241680' or Tb_index='nt2019011818242292' and nt_sp<>1 and OnLineOrNot=1
                                order by OrderBy  
                                LIMIT 0, 2";
                     index_sec_area($nt_query, 'no', 'epoint', 'Darkbrown_tab', 'news_tab_two');
                   ?>
                   <!-- ========================================================== 懶人包 / 樂分享 END ========================================================== -->


                    
                    <?php 
                       //============================================
                       //最新文章
                       //============================================
                        //先取出優行動pay的分類，再從優行動pay的分類中，把appNews load出來，優行動pay版區id為at2019011117341414
                       $pdo_OLD=pdo_conn();
                       $sql_area=$pdo_OLD->prepare("SELECT Tb_index FROM `news_type` WHERE `area_id` LIKE '$area_id'");
                       $sql_area->execute();
                       $row_areas = $sql_area->fetchAll();

                       foreach ($row_areas as $row_area) {
                           $unit_all_id.="'".$row_area['Tb_index']."',";
                        }
                       $unit_all_id = substr($unit_all_id, 0, -1); //去掉最後一碼，


                       $sql_newtemp="
                        SELECT a.ns_ftitle, a.ns_photo_1, a.ns_msghtml, a.Tb_index, a.ns_nt_pk, b.pk, b.nt_name
                        FROM  appNews a left join news_type b on a.ns_nt_pk = b.Tb_index
                        where a.ns_nt_pk in ($unit_all_id)  
                        and a.ns_verify=3 and a.OnLineOrNot=1 
                        and  a.StartDate<='$todayis' and a.EndDate>='$todayis'
                        order by a.ns_vfdate desc
                        LIMIT 0, 10
                        ";
                        $sql_new=$pdo_OLD->prepare($sql_newtemp);
                        $sql_new->execute();

                        //分批取出part1--------------------------------------
                      $i=1; while ($row_new=$sql_new->fetch(PDO::FETCH_ASSOC)) {
                        $id=$row_new['Tb_index'];
                        $ns_ftitle=$row_new['ns_ftitle'];
                        $ns_msghtml=$row_new['ns_msghtml'];
                        $ns_photo_1="../sys/img/".$row_new['ns_photo_1'];
                        $nt_name = $row_new['nt_name'];
                        $pk=empty($row_new['pk']) ? $row_new['ns_nt_pk']:$row_new['pk'];

                        $ns_ftitle_temp=mb_substr(strip_tags($ns_ftitle),0, 14,"utf-8")."...";



                                $new_temp2[$i]="<a class='new_article' title='".$row_new['ns_ftitle']."' href='detail.php?$id'></a>
                                               <div class='img_div' style='background-image: url($ns_photo_1);'>
                                                 <a class='small_a' href='list.php?mt_pk=".$pk."' title='".$nt_name."'><small>".$nt_name."</small></a>
                                               </div>
                                               <p>$ns_ftitle</p>";

                                    $new_temp3[$i]="<a class='new_article' title='".$row_new['ns_ftitle']."' href='detail.php?$id'></a>
                                               <div class='img_div'  style='background-image: url($ns_photo_1);'>
                                                 <a class='small_a' href='list.php?mt_pk=".$pk."' title='".$nt_name."'><small>$nt_name</small></a>
                                               </div>
                                               <p>$ns_ftitle_temp</p>
                                           "
                                           ;
                           $i++;}
                       
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
                                   <?php echo $new_temp3[3]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp3[4]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp3[5]?>
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
                                   <?php echo $new_temp3[8]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp3[9]?>
                                </div>
                                <div class="col-4 cards-3">
                                   <?php echo $new_temp3[10]?>
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
            <?php require 'right_area_div.php'; ?>
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