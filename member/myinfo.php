<?php 
 require '../share_area/conn.php';

 //-- 判斷登入會員 --
 check_member();
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-會員中心 > 我的資訊</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 我的資訊" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 我的資訊" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>

   <style type="text/css">
    .fancybox-slide--iframe{padding: 0;}
   </style>

  </head>
  <body class="member_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="javascript:;">我的資訊
            </a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    <!--我的資訊-->
                    <div class="col-md-12 col">
                       <div class="cardshap primary_tab">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="all_1-tab" aria-controls="all_1" aria-selected="true">我的資訊</a>
                            <div class="info_btn">
                             <a class="gray-layered btnOver px-3" data-fancybox data-type="iframe" data-src="info_order.php" href="mycard.php">查詢訂閱</a>
                            </div>
                          </li>
                        </ul>
                       
                     <div class="tab-pane fade show active" id="all_1" role="tabpanel" aria-labelledby="all_1-tab">
                             


                        <?php 
                          //-- 分頁判斷數 --
                          $num=12;
                          //--- 分頁起頭數 ---
                          $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                          //-- 目前分頁 --
                          $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                          //------------ 會員訂閱 --------------
                          $row_subscription=$pdo->select("SELECT bi.Tb_index, bi.old_id, ms.ms_si_pk, ms.mo_news_flag, ms.mo_msg_flag, ms.mo_bf_flag
                                                          FROM my_subscription as ms 
                                                          LEFT JOIN bank_info as bi ON bi.Tb_index=ms.ms_bi_pk OR bi.old_id=ms.ms_bi_pk
                                                          WHERE ms.ms_ud_pk=:ms_ud_pk", ['ms_ud_pk'=>$_SESSION['ud_pk']]);
                          

                          $subscription_sql='';
                          foreach ($row_subscription as $subscription) {
                            
                            if (!empty($subscription['Tb_index'])) {
                              $subscription_sql.=" FIND_IN_SET('".$subscription['Tb_index']."',n.ns_bank) OR";
                            }
                            else{
                              $subscription_sql.=" FIND_IN_SET('".$subscription['ms_si_pk']."',n.ns_store) OR";
                            }
                          }

                          $subscription_sql=!empty($subscription_sql) ? 'and ('.substr($subscription_sql, 0,-2).')' : '';


                          //-- 判斷有無訂閱 --
                          if (count($row_subscription)>0) {
                            
                             //-- 總頁數 --
                             $row_list_total=$pdo->select("SELECT count(*) as total
                                                           FROM NewsAndType as n
                                                           WHERE n.ns_verify=3 and n.OnLineOrNot=1 and  n.StartDate<=:StartDate and n.EndDate>=:EndDate $subscription_sql"
                                                           , ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')], 'one');
                             $total_page=ceil(((int)$row_list_total['total'])/$num);


                             $row_list=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, n.area_id, n.pk, n.nt_name,
                                                            n.StartDate, n.activity_s_date, n.activity_e_date, n.ns_store, a.at_name
                                                     FROM NewsAndType as n 
                                                     LEFT JOIN appArea as a ON a.Tb_index=n.area_id
                                                     WHERE n.ns_verify=3 and n.OnLineOrNot=1 and  n.StartDate<=:StartDate and n.EndDate>=:EndDate $subscription_sql 
                                                     ORDER BY n.ns_vfdate DESC LIMIT $now_page_num, $num", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                            $row_list_num=count($row_list);
                            $count_i=ceil($row_list_num/3);

                            for ($i=0; $i <$count_i ; $i++) { 
                              
                              echo '<div class="col-md-12 col px-0">
                                     <div class=" redius_bg">';

                              for ($j=$i*3; $j <($i+1)*3 ; $j++) {
                               
                               if ($j<$row_list_num) {

                                 $row_list_one=$row_list[$j];


                                 switch ($row_list_one['area_id']) {
                                   //--新聞--
                                   case '':
                                    $crumbs_txt='<a class="text-primary" href="../news/news.php">新聞</a> > 
                                                 <a class="text-primary" href="../news/list.php?nt_pk='.$row_list_one['pk'].'">'.$row_list_one['nt_name'].'</a>';
                                   break;

                                   //--卡情報--
                                   case 'at2019021114154632':
                                    $crumbs_txt='<a class="text-primary" href="../card/card.php">卡情報</a> > 
                                                 <a class="text-primary" href="../message/list.php?mt_pk='.$row_list_one['pk'].'">'.$row_list_one['nt_name'].'</a>';
                                   break;

                                   //-- 優行動Pay --
                                   case 'at2019011117341414':
                                    $crumbs_txt='<a class="text-primary" href="../mpay/mpay.php">優行動Pay</a> > 
                                                 <a class="text-primary" href="../mpay/list.php?mt_pk='.$row_list_one['pk'].'">'.$row_list_one['nt_name'].'</a>';
                                   break;

                                   //-- 優票證 --
                                   case 'at2019011117435970':
                                    $crumbs_txt='<a class="text-primary" href="../eticket/eticket.php">優票證</a> > 
                                                 <a class="text-primary" href="../eticket/list.php?mt_pk='.$row_list_one['pk'].'">'.$row_list_one['nt_name'].'</a>';
                                   break;

                                   //-- 優集點 --
                                   case 'at2019011117443626':
                                    $crumbs_txt='<a class="text-primary" href="../epoint/epoint.php">優集點</a> > 
                                                 <a class="text-primary" href="../epoint/list.php?mt_pk='.$row_list_one['pk'].'">'.$row_list_one['nt_name'].'</a>';
                                   break;
                                 }
                                
                                 
                                 $ns_msghtml=mb_substr(strip_tags($row_list_one['ns_msghtml']), 0,50,'utf-8');
                                 $url=news_url($row_list_one['mt_id'], $row_list_one['Tb_index'], $row_list_one['ns_nt_pk'], $row_list_one['area_id']);
                                 $fb_url=urlencode($url);
                                 $ns_ftitle=mb_substr($row_list_one['ns_ftitle'], 0,20,'utf-8');
                                 $news_small_txt='<small class="px-md-4 pb-md-0 px-0 pb-2">('.$crumbs_txt.' > '.$row_list_one['StartDate'].')</small>';
                            

                                 //-- 圖文廣告(手機) --
                                 if (wp_is_mobile() && $j==0){
                                   echo '
                                   <div class="row no-gutters py-md-3 mx-md-4 news_list">
                                    <div class="col-md-4 col-6 py-2 pl-2">
                                      <a class="img_div news_list_img" href="#" style="background-image: url(http://placehold.it/150x100);"></a>
                                    </div>
                                    <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                                     <div class="mb-2">
                                       <a href="#" title="廣告">
                                        <h3>我是圖文廣告</h3>
                                       </a>
                                     </div>
                                      <p>我是圖文廣告...</p>
                                    </div>
                                   </div>';
                                 }
                                 //-- 圖文廣告(手機) END --
                                 
                                 //-- LIST --

                                 echo '
                                 <div class="row no-gutters py-md-3 mx-md-4 news_list ">
                                  <div class="col-md-4 col-6 py-2 pl-2 ">
                                    <a target="_blank" class="img_div news_list_img" title="'.$row_list_one['ns_ftitle'].'" href="'.$url.'" style="background-image: url(/sys/img/'.$row_list_one['ns_photo_1'].');"></a>
                                  </div>
                                  <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt news_list_txt">
                                   <div class="mb-2">
                                     
                                      <h3>
                                        <a target="_blank" href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'">'.$ns_ftitle.'</a> '.$cs_small_txt.'
                                      </h3>
                                     
                                   </div>
                                    <p class="phone_hidden">'.$ns_msghtml.'...</p>
                                    
                                    <div class="fb_search_btn">
                                      '.$news_small_txt.'
                                      <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=119&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=616626501755047" width="119" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                    </div>
                                  </div>
                                 </div>';
                                 //-- LIST END --
                               }
                              }

                              echo '</div>
                                  </div>';


                             //-- 手機廣告 --
                             if (wp_is_mobile()) {
                               if ($i!=3 && $i!=$count_i) {
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
                               if ($i%2==0) {
                                 echo '<div class="col-md-12 px-0 banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
                               }
                               else{
                                 echo '<div class="col-md-12 row phone_hidden">
                                          <div class="col-md-6 p-1 banner ">
                                              <img src="https://placehold.it/365x100" alt="">
                                          </div>
                                          <div class="col-md-6 p-1 banner">
                                              <img src="https://placehold.it/365x100">
                                          </div>
                                      </div>';
                               }
                             }
                            }
                            //--  --
                          }
                          //-- 判斷有無訂閱 END --
                        ?>


                     </div>
                  </div>
                </div>
                 


                    <?php 
                     //-- 分頁 --
                     paging($total_page, $page);
                    ?>

                    <div class="col-12 py-5">
                      
                    </div>

                   




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