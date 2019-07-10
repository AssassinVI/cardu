<?php 
 require '../../share_area/conn.php';

 //-- 判斷單元 --
 $row_nt=$pdo->select("SELECT nt_name, Tb_index, unit_id
                       FROM news_type 
                       WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['tr_pk']], 'one');
 
 $title_name='卡優新聞網-日本嬉遊趣 > '.$row_nt['nt_name'];
 $crumbs_name='<a href="javascript:;">'.$row_nt['nt_name'].'</a>';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    


    <title><?php echo $title_name; ?></title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $title_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $title_name; ?>" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="<?php echo $FB_URL;?>" />
      
      
    <?php 
     //-- 共用CSS --
     require '../../share_area/share_css.php';
    ?>



  </head>
  <body class="travel_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../../share_area/phone/header.php';
         }
         else{
          require '../../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/travel/index.php">優旅行</a> / <a href="index.php">日本嬉遊趣</a> / <?php echo $crumbs_name; ?></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                    <?php 

                     //-- 判斷是否為手機 --
                     if (wp_is_mobile()){
                    
                     //============================================
                     //每頁的輪播 (手機)
                     //設定好sql後，交由 func.php執行
                     //============================================

                     $sql_carousel="
                                    SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                    where (ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                                    and ns_verify=3 and  StartDate<=:StartDate and EndDate>=:EndDate and OnLineOrNot=1
                                    order by ns_vfdate desc
                                    LIMIT 0, 10
                                   ";

                     slide_ph($sql_carousel, 
                      [
                        'ns_nt_pk'=>$row_nt['Tb_index'], 
                        'ns_nt_ot_pk'=>'%'.$row_nt['Tb_index'].'%', 
                        'StartDate'=>date('Y-m-d'), 
                        'EndDate'=>date('Y-m-d')
                      ]);

                     } 
                     else{


                       //============================================
                       //每頁的輪播 (電腦)
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="
                        SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType 
                        where (ns_nt_pk =:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                        and ns_verify=3 and StartDate<=:StartDate and EndDate>=:EndDate and OnLineOrNot=1
                        order by ns_vfdate desc
                        LIMIT 0, 6
                        ";
                       slide_4s_3b($sql_carousel, 
                        [
                        'ns_nt_pk'=>$row_nt['Tb_index'], 
                        'ns_nt_ot_pk'=>'%'.$row_nt['Tb_index'].'%', 
                        'StartDate'=>date('Y-m-d'), 
                        'EndDate'=>date('Y-m-d')
                        ]);
                      
                     }
                    ?>

                  
                  
                  </div>
                  <!--電腦版廣告-->
                  <div class="col-md-12 row phone_hidden">
                      <div class="col-md-6 col ad_news">
                        <div class="row no-gutters">
                          <div class="col-md-6 h-center">
                           <img src="../../img/component/ad_sm.png"> 
                          </div>
                         <div class="col-md-6">
                          <div class="best">
                           <img src="../../img/component/best.png">
                          </div>
                          <h6>匯豐現金回饋卡</h6>
                          <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                         </div>
                       </div>
                      </div>
                      <div class="col-md-6 col ad_news">
                        <div class="row no-gutters">
                          <div class="col-md-6 h-center">
                           <img src="../../img/component/ad_sm.png"> 
                          </div>
                         <div class="col-md-6">
                          <div class="best">
                           <img src="../../img/component/best.png">
                          </div>
                          <h6>匯豐現金回饋卡</h6>
                          <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                         </div>
                       </div>
                      </div>
                  </div>  

                  <!--手機板廣告-->
                  <div class="col-md-12 row">
                      <div class="col-md-6 col banner d-md-none d-sm-block ">
                          <img src="http://placehold.it/365x100" alt="">
                      </div>
                  </div>
                  <!--廣告end-->

                 
                   <?php 
                    //----------------------------- 各區域資訊 -----------------------------
                    require $row_nt['Tb_index'].'.php';
                   ?>


                    <!--XX精選-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab" href="recommend3.php?tr_pk=<?php echo $_GET['tr_pk']; ?>" >
                              <?php echo $row_nt['nt_name']; ?>精選
                            </a>
                             <a class="top_link" href="recommend3.php?tr_pk=<?php echo $_GET['tr_pk']; ?>"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <div class="row no-gutters travel_about">


                               <?php 
                                $row_share=$pdo->select("SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                                         where ns_nt_pk = :ns_nt_pk AND in_sp_label='精選'
                                                         and ns_verify=3 and StartDate<=:StartDate and EndDate>=:EndDate AND OnLineOrNot=1
                                                         order by ns_vfdate desc
                                                         LIMIT 0, 2", 
                                                         ['ns_nt_pk'=>$_GET['tr_pk'], 'ns_nt_ot_pk'=>'%'.$_GET['tr_pk'].'%', 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                                 foreach ($row_share as $row_share_one) {
                                   $ns_ftitle=mb_substr($row_share_one['ns_ftitle'], 0,20,'utf-8');
                                   $ns_msghtml=mb_substr(strip_tags($row_share_one['ns_msghtml']), 0,40,'utf-8').'...';
                                   $url=news_url($row_share_one['mt_id'], $row_share_one['Tb_index'], $row_share_one['ns_nt_pk'], $row_share_one['area_id']);

                                   echo '
                                    <div class="col-md-6">
                                    <a href="'.$url.'" title="'.$row_share_one['ns_ftitle'].'">
                                        <div class="img_div wx-100-ph"  style="background-image: url(../../sys/img/'.$row_share_one['ns_photo_1'].');">
                                        </div>
                                         <h6>'.$ns_ftitle.'</h6>
                                         <p>'.$ns_msghtml.'...</p>
                                    </a>
                                    </div>';
                                 }
                               ?>
                                
                            </div>
                           
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--XX精選end -->
                     
                      <!--XX旅行分享-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab"  href="share.php?tr_pk=<?php echo $_GET['tr_pk'];?>">
                              <?php echo $row_nt['nt_name']; ?>旅行分享
                             </a>
                             <a class="top_link" href="share.php?tr_pk=<?php echo $_GET['tr_pk'];?>"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <div class="row no-gutters travel_about">
                              <?php 
                               $row_share=$pdo->select("SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                                        where (ns_nt_pk = :ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                                                        and ns_verify=3 and StartDate<=:StartDate and EndDate>=:EndDate AND OnLineOrNot=1
                                                        order by ns_vfdate desc
                                                        LIMIT 0, 2", 
                                                        ['ns_nt_pk'=>$_GET['tr_pk'], 'ns_nt_ot_pk'=>'%'.$_GET['tr_pk'].'%', 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                                foreach ($row_share as $row_share_one) {
                                  $ns_ftitle=mb_substr($row_share_one['ns_ftitle'], 0,20,'utf-8');
                                  $ns_msghtml=mb_substr(strip_tags($row_share_one['ns_msghtml']), 0,40,'utf-8').'...';
                                  $url=news_url($row_share_one['mt_id'], $row_share_one['Tb_index'], $row_share_one['ns_nt_pk'], $row_share_one['area_id']);

                                  echo '
                                   <div class="col-md-6">
                                   <a href="'.$url.'" title="'.$row_share_one['ns_ftitle'].'">
                                       <div class="img_div wx-100-ph"  style="background-image: url(../../sys/img/'.$row_share_one['ns_photo_1'].');">
                                       </div>
                                        <h6>'.$ns_ftitle.'</h6>
                                        <p>'.$ns_msghtml.'...</p>
                                   </a>
                                   </div>';
                                }
                              ?>
                                
                            </div>
                           
                          </div>
                         
                         
                          
                        </div>
                      </div>
                    </div>
                    <!--XX旅行分享end -->
                     <!--優惠情報-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab"  href="../preferential.php">優惠情報</a>
                             <a class="top_link" href="../preferential.php"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <div class="row no-gutters travel_about">
                                
                                <?php 
                                 //-- 優惠情報單元 --
                                 $ns_nt_ot_pk_query="";
                                 $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id='un2019011717571414'");
                                 foreach ($row_newsType as $newsType) {
                                  $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                                 }
                                 $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


                                 $row_share=$pdo->select("SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                                          where (unit_id='un2019011717571414' OR $ns_nt_ot_pk_query)
                                                          and ns_verify=3 and StartDate<=:StartDate and EndDate>=:EndDate AND OnLineOrNot=1
                                                          order by ns_vfdate desc
                                                          LIMIT 0, 2", 
                                                          ['ns_nt_pk'=>$_GET['tr_pk'], 'ns_nt_ot_pk'=>'%'.$_GET['tr_pk'].'%', 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                                  foreach ($row_share as $row_share_one) {
                                    $ns_ftitle=mb_substr($row_share_one['ns_ftitle'], 0,20,'utf-8');
                                    $ns_msghtml=mb_substr(strip_tags($row_share_one['ns_msghtml']), 0,40,'utf-8').'...';
                                    $url=news_url($row_share_one['mt_id'], $row_share_one['Tb_index'], $row_share_one['ns_nt_pk'], $row_share_one['area_id']);

                                    echo '
                                     <div class="col-md-6">
                                     <a href="'.$url.'" title="'.$row_share_one['ns_ftitle'].'">
                                         <div class="img_div wx-100-ph"  style="background-image: url(../../sys/img/'.$row_share_one['ns_photo_1'].');">
                                         </div>
                                          <h6>'.$ns_ftitle.'</h6>
                                          <p>'.$ns_msghtml.'...</p>
                                     </a>
                                     </div>';
                                  }
                                ?>
                                
                            </div>
                           
                          </div>
                         
                         
                          
                        </div>
                      </div>
                    </div>
                    <!--優惠情報end -->






                   
                    
                    
                   
                    
                   
                

                   
                  



                   

                    <div class="col-12 py-5">
                      
                    </div>

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
             require '../right_area_div_jp.php';
            ?>
            <!--版面右側end-->
             <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60">
                        </div>
                    </div>
             <!--廣告end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


     <?php 
     //-- 共用js --
     require '../../share_area/share_js.php';
    ?>

  </body>
</html>