<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>卡優新聞網-焦點新聞</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-焦點新聞" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-焦點新聞" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>


  </head>
  <body class="news_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         require '../share_area/header.php';
        ?>

        <!-- 麵包屑 -->
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">新聞</a></p>
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
                       //-- 新聞單元 --
                       $ns_nt_ot_pk_query="";
                       $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE mt_id='site2018111910445721'");
                       foreach ($row_newsType as $newsType) {
                        $ns_nt_ot_pk_query.=" n.ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                       }
                       $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);

                       $sql_carousel="
                        SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                        FROM  appNews as n
                        INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                        where (n.mt_id = '$mt_id' OR $ns_nt_ot_pk_query) and n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                        and  n.StartDate<='$todayis' and n.EndDate>='$todayis'
                        order by n.ns_vfdate desc
                        LIMIT 0, 6
                        ";
                        slide_4s_3b($sql_carousel);
                       //require '../share_area/page_carousel.php';
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

                    <?php 
                    //===================================
                    //取出特別議題頁籤
                    //===================================
                       $pdo_OLD=pdo_conn();
                      // $sql_special=$pdo->prepare("
                      //   SELECT nt_name,Tb_index,pk FROM news_type
                      //   where mt_id='site2018111910445721' and nt_sp=1 
                      //   and nt_sp_begin_date <= '$todayis' and nt_sp_end_date >= '$todayis' 
                      //   order by OrderBy  
                      //   LIMIT 0, 4");
                      // $sql_special->execute();
                      // $row_specials = $sql_special->fetchAll();

                    ?>
                    
                   

                    <!-- ========================================================== 特別議題 ========================================================== -->
                    <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                      $nt_query="SELECT nt_name,Tb_index,pk FROM news_type
                                 where mt_id='site2018111910445721' and nt_sp=1 
                                 and nt_sp_begin_date <=:nt_sp_begin_date and nt_sp_end_date >=:nt_sp_end_date
                                 order by OrderBy  
                                 LIMIT 0, 4";
                      $nt_where_arr=['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')];
                      index_sec_area($nt_query, $nt_where_arr, 'news', '', 'sp');
                    ?>
                    
                    <!-- ========================================================== 特別議題end  ========================================================== -->



                    
                    <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->




                    <!-- ========================================================== 1~3次版區 ========================================================== -->
                    <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                      $nt_query="SELECT nt_name,Tb_index,pk FROM news_type
                                 where mt_id='site2018111910445721' and nt_sp<>1 and OnLineOrNot=1
                                 order by OrderBy  
                                 LIMIT 0, 3";
                      index_sec_area($nt_query, 'no', 'news', 'news_tab_three');
                    ?>
                    <!-- ========================================================== 1~3次版區 END ========================================================== -->
                    
                    
                    
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

                    
                  

                    <!-- ========================================================== 3~6次版區 ========================================================== -->
                    <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                      $nt_query="SELECT nt_name,Tb_index,pk FROM news_type
                                 where mt_id='site2018111910445721' and nt_sp<>1 and OnLineOrNot=1
                                 order by OrderBy  
                                 LIMIT 3, 3";
                      index_sec_area($nt_query, 'no', 'news', 'news_tab_three');
                    ?>
                    <!-- ========================================================== 3~6次版區 END ========================================================== -->





                     <!--廣告-->
                    <div class="col-md-12 col"><div class="test"><img src="http://placehold.it/750x100" alt="banner"></div></div><!--banner end -->
                    
                    


                    <!-- ========================================================== 6~9次版區 ========================================================== -->
                    <?php 
                       //============================================
                       //每頁的輪播
                       //設定好sql後，交由 func.php執行
                       //============================================
                      $nt_query="SELECT nt_name,Tb_index,pk FROM news_type
                                 where mt_id='site2018111910445721' and nt_sp<>1 and OnLineOrNot=1
                                 order by OrderBy  
                                 LIMIT 6, 3";
                      index_sec_area($nt_query, 'no', 'news', 'news_tab_three');
                    ?>
                    <!-- ========================================================== 6~9次版區 END ========================================================== -->




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
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>
    <script type="text/javascript">


    </script>

  </body>
</html>