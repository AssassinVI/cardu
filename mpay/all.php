<?php 
require '../share_area/conn.php';
require '../share_area/get_news.php';
require 'config.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優行動Pay > pay總攬</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
    require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-優行動Pay > pay總攬" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-優行動Pay > pay總攬" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL; ?>" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/mpay/mpay.php">優行動Pay</a> / <a href="javascript:;">Pay總覽</a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">
                

                
                <div class="row">

                  <div class="col-md-12 col">
                  
                    <?php 


                       //-- 優行動pay單元 --
                       $ns_nt_ot_pk_query="";
                       $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id='$area_id'");
                       foreach ($row_newsType as $newsType) {
                        $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                       }
                       $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);



                       //-- 判斷是否為手機 --
                       if (wp_is_mobile()){
                      
                       //============================================
                       //每頁的輪播 (手機)
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="
                                      SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                      where (area_id='$area_id' OR $ns_nt_ot_pk_query) AND ns_verify=3 and OnLineOrNot=1
                                      and  StartDate<=:StartDate and EndDate>=:EndDate
                                      order by ns_vfdate desc
                                      LIMIT 0, 10
                                     ";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                       } 
                       else{

                         //============================================
                         //每頁的輪播 (電腦)
                         //設定好sql後，交由 func.php執行
                         //============================================
                         $sql_carousel="
                          SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                          where (area_id='$area_id' OR $ns_nt_ot_pk_query) AND ns_verify=3 and OnLineOrNot=1 
                          and StartDate<=:StartDate and EndDate>=:EndDate
                          order by ns_vfdate desc
                          LIMIT 0, 6
                          ";
                         slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                        
                       }

                      ?>
                  
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
                            <div class="col-md-6 h-center ">
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
                          //----- 商店 -----
                          $row_pay=$pdo->select("SELECT * FROM store where st_type='st2019013117011395' and OnLineOrNot=1 order by st_name");
                          $row_pay_num=count($row_pay);
                          for ($i=0; $i <$row_pay_num ; $i++) { 

                              $row_pay_one=$row_pay[$j];

                              $Tb_index=$row_pay[$i]['Tb_index'];
                              $st_name=$row_pay[$i]['st_name'];
                              $st_logo=$row_pay[$i]['st_logo'];
                              $st_url=$row_pay[$i]['st_url'];

                              echo "<div class='col-md-4 col-6 mb-3 ticketbg'>
                                           <div class='cardshap move_3 hv-center'>
                                            
                                            <div >
                                            <a class='all_form' href='about.php?".$Tb_index."' title='".$st_name."'>
                                              <img src='../sys/img/".$st_logo."'>
                                              <hr>
                                              <h4>".$st_name."</h4>
                                            </a>
                                            <div class='card_btn  hv-center ' style='display:none !important;'>
                                              <a class='all_form' href='about.php?".$Tb_index."' title='".$st_name."'>
                                                <button type='button' class='btn warning-layered btnOver'>詳細介紹</button>
                                              </a>
                                              <a class='all_form' href='".$st_url."' title='".$st_name."'>
                                                <button type='button' class='btn gray-layered btnOver'>前往官網</button>
                                              </a>
                                            </div>
                                            </div>

                                            </div>
                                        </div>";
                            
                          

                            //-- 手機廣告 --
                            if (wp_is_mobile()) {
                              if (($i+1)%6==0) {
                                echo '
                                <div class="col-md-12 row">
                                <div class="col-md-6 col banner d-md-none d-sm-block ">
                                    <img src="https://placehold.it/900x300" alt="">
                                </div>
                                </div>';
                              }
                            }
                            //-- 電腦廣告 --
                            else{
                              if (($i+1)%6==0 ) {
                                echo '<div class="col-md-12 col banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
                              }
                              elseif(($i+1)%12==0){
                                echo '<div class="col-md-12 row phone_hidden">
                                         <div class="col-md-6 col banner ">
                                             <img src="https://placehold.it/365x100" alt="">
                                         </div>
                                         <div class="col-md-6 col banner">
                                             <img src="https://placehold.it/365x100">
                                         </div>
                                     </div>';
                              }
                            }
                          }

                          ?>

                    
     
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