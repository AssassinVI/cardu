<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優惠情報</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-優惠情報" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-優惠情報" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL; ?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>


  </head>
  <body class="travel_body">

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
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="index.php">優旅行</a> / <a href="javascript:;">優惠情報
            </a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                    <?php 
                     //-- 優惠情報單元 --
                     $ns_nt_ot_pk_query="";
                     $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id='un2019011717571414'");
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
                                     where (unit_id='un2019011717571414' OR $ns_nt_ot_pk_query) 
                                     and ns_verify=3 and  StartDate<=:StartDate and EndDate>=:EndDate and OnLineOrNot=1 
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
                         where (unit_id='un2019011717571414' OR $ns_nt_ot_pk_query) 
                         and ns_verify=3 and StartDate<=:StartDate and EndDate>=:EndDate and OnLineOrNot=1 
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


                  
                  <div class="col-md-12 col">
                    <div class="cardshap redius_bg">
                   
                    <?php 
                      //-- 分頁判斷數 --
                      $num=12;
                      //--- 分頁起頭數 ---
                      $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                      //-- 目前分頁 --
                      $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];


                      //-- 總頁數 --
                      $row_list_total=$pdo->select("SELECT count(*) as total
                                              FROM NewsAndType
                                              WHERE (unit_id='un2019011717571414' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND OnLineOrNot=1"
                                              , ['pk'=>$_GET['mt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')], 'one');
                      $total_page=ceil(((int)$row_list_total['total'])/$num);


                      $row_list=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, activity_s_date, activity_e_date, ns_bank, ns_store
                                             FROM NewsAndType
                                             WHERE (unit_id='un2019011717571414' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND OnLineOrNot=1
                                             ORDER BY ns_vfdate DESC LIMIT $now_page_num, $num", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                     $row_list_num=count($row_list);
                     $count_i=ceil($row_list_num/3);



                     foreach ($row_list as $row_list_one) {
                       
                       //-- 關聯銀行 --
                       if (!empty($row_list_one['ns_bank']) && (empty($row_list_one['ns_store']) || $row_list_one['ns_store']=='no')) {
                         
                         $bank_arr=explode(',', $row_list_one['ns_bank']);
                         
                         if (count($bank_arr)==1) {
                           $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$bank_arr[0]], 'one');
                           $related_txt='<a href="/card/bank_detail.php?bi_pk='.$row_bank['Tb_index'].'">
                                           <small class="cs_small">('.$row_bank['bi_shortname'].')</small>
                                         </a>';
                         }else{
                           $related_txt='';
                         }
                       }
                       //-- 關聯商店 --
                       elseif(empty($row_list_one['ns_bank']) && !empty($row_list_one['ns_store']) && $row_list_one['ns_store']!='no'){

                         $store_arr=explode(',', $row_list_one['ns_store']);
                         
                         if (count($store_arr)==1) {
                           $row_store=$pdo->select("SELECT st_nickname, Tb_index FROM store WHERE Tb_index=:Tb_index", ['Tb_index'=>$store_arr[0]], 'one');
                           $related_txt='<a href="/epoint/about2.php?'.$row_store['Tb_index'].'">
                                          <small class="cs_small"> ( '.$row_store['st_nickname'].' ) </small>
                                         </a>';
                         }else{
                           $related_txt='';
                         }
                       }
                       else{
                         $related_txt='';
                       }
                       

                       //-- 活動時間 --
                       if ($row_list_one['activity_e_date']!='0000-00-00') {
                         $activity_s_date=$row_list_one['activity_s_date']!='0000-00-00' ? $row_list_one['activity_s_date']:'即日起';
                         $activity_date='<span class="mb-1">活動日期：'.$activity_s_date.'~'.$row_list_one['activity_e_date'].'</span>';
                       }
                       else{
                         $activity_date='';
                       }
                       

                       $ns_ftitle= wp_is_mobile() ? $row_list_one['ns_ftitle'] : mb_substr($row_list_one['ns_ftitle'], 0,15,'utf-8');
                       $ns_msghtml=mb_substr(strip_tags($row_list_one['ns_msghtml']), 0,55,'utf-8');
                       $url=news_url($row_list_one['mt_id'], $row_list_one['Tb_index'], $row_list_one['ns_nt_pk'], $row_list_one['area_id']);
                       $fb_url=urlencode($url);
                       echo '
                       <div class="row no-gutters py-md-3 mx-md-4 news_list">
                        <div class="col-md-4 col-6 py-2 pl-2">
                          <a class="img_div news_list_img" title="'.$row_list_one['ns_ftitle'].'" href="'.$url.'" style="background-image: url('.$img_url.$row_list_one['ns_photo_1'].');"></a>
                        </div>
                        <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 pr-2 news_list_txt">
                         <div>
                           
                            <h3>
                             <a href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'">'.$ns_ftitle.'</a>'.$related_txt.'
                            </h3>
                           
                         </div>
                          '.$activity_date.'
                          <p class="phone_hidden">'.$ns_msghtml.'...</p>
                          
                          <div class="fb_search_btn">
                            <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=119&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="119" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                          </div>
                        </div>
                       </div>';
                     }


                    ?>
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
            <?php 
             require 'right_area_div_preferential.php';
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
     require '../share_area/share_js.php';
    ?>

  </body>
</html>