<?php session_start();
//尚未load出舊照片
//尚未標千還未排除disable的
//目前暫時用tb_index進入的內容頁
//目前load 出來的資料有點少，再檢查一下sql唷
//暫時把mt_id的條件拿掉
require '../share_area/conn.php';
require '../share_area/get_news.php';
require 'config.php';

$todayis=date("Y-m-d"); //取得要查詢的日期，預設為今日

//取出類別資料
$pk_sql=strlen($_GET['mt_pk'])>3 ? 'Tb_index=:pk' : 'pk=:pk';


$row=$pdo->select("SELECT * FROM news_type WHERE $pk_sql", ['pk'=>$_GET['mt_pk']], 'one');
$Tb_index =$row['Tb_index'];
$nt_name =$row['nt_name'];

?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網- 優行動pay > <?php echo $nt_name; ?></title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網- 優行動pay > <?php echo $nt_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網- 優行動pay > <?php echo $nt_name; ?>" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="pay_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="mpay.php">優行動Pay</a> / <a href="javascript:;"><?php echo $nt_name ?></a></p>
          </div>
        </div>
        
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">
                   
                   <div class="col-md-12 col">
                      <?php 
                      //-- 判斷特別議題 --
                      $nt_pk_sql= !empty($_GET['sp']) ? "ns_nt_sp_pk=:ns_nt_pk" : "ns_nt_pk=:ns_nt_pk";

                       //-- 判斷是否為手機 --
                       if (wp_is_mobile()){
                      
                       //============================================
                       //每頁的輪播 (手機)
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="
                                      SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                      where ns_verify=3 and OnLineOrNot=1
                                      and  StartDate<=:StartDate and EndDate>=:EndDate
                                      and ($nt_pk_sql OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                                      order by ns_vfdate desc
                                      LIMIT 0, 10
                                     ";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$Tb_index, 'ns_nt_ot_pk'=>'%'.$Tb_index.'%']);

                       } 
                       else{

                         //============================================
                         //每頁的輪播 (電腦)
                         //設定好sql後，交由 func.php執行
                         //============================================
                         $sql_carousel="
                          SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                          where ns_verify=3 and OnLineOrNot=1 
                          and StartDate<=:StartDate and EndDate>=:EndDate
                          and ($nt_pk_sql OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                          order by ns_vfdate desc
                          LIMIT 0, 6
                          ";
                         slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$Tb_index, 'ns_nt_ot_pk'=>'%'.$Tb_index.'%']);
                        
                       }
                      ?>
                     </div>
                      
                  
                  
                  </div>

                    <?php 
                     //-- 判斷是否為手機 --
                     if (wp_is_mobile()){
                    ?>

                    <!--手機板廣告-->
                      <div class="col-md-12 row">
                          <div class="col-md-6 col banner d-md-none d-sm-block ">
                              <img src="https://placehold.it/365x100" alt="">
                          </div>
                      </div>
                      <!--廣告end-->
                      

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

                    <?php } ?>

                    

                    <?php 
                      //============================================
                      //每頁的LIST (電腦)
                      //給予mt_pk後，交由 func.php執行
                      //============================================
                      $sp=empty($_GET['sp']) ? '' : 'sp';
                      news_list($_GET['PageNo'], $Tb_index, $sp);
                      
                    ?>

                   

            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
             if (!wp_is_mobile()) {
               require 'right_area_div.php';
             }
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