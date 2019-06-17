<?php 
 require '../share_area/conn.php';
 require 'config.php';
 
 $row_store_one=$pdo->select("SELECT st_nickname, Tb_index, st_main_type FROM store WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['store_id']], 'one');
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-<?php echo $row_store_one['st_nickname'];?>相關好康</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-<?php echo $row_store_one['st_nickname'];?>相關好康" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-<?php echo $row_store_one['st_nickname'];?>相關好康" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="point_body">

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
        <div class="row crumbs_row">
          <div class="col-12">
            <?php
              //-- 判斷是否為集點商店 --
              if (empty($row_store_one['st_main_type'])) {
                echo '<p class="crumbs">
                         <i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="epoint.php">優集點</a> / <a href="all.php">點數平台</a> / <a href="about.php?'.$row_store_one['Tb_index'].'">'.$row_store_one['st_nickname'].'</a> / <a href="javascript:;">相關好康</a>
                      </p>';
              }
              else{
               echo '<p class="crumbs">
                         <i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="epoint.php">優集點</a> / <a href="all2.php">集點店家</a> / <a href="about2.php?'.$row_store_one['Tb_index'].'">'.$row_store_one['st_nickname'].'</a> / <a href="javascript:;">相關好康</a>
                      </p>';
              }
            ?>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                
                <div class="row">

                    <div class="col-md-12 col">
                      
                      <div class="cardshap ">

                       <?php 
                        //-- 分頁判斷數 --
                        $num=10;
                        //--- 分頁起頭數 ---
                        $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                        //-- 目前分頁 --
                        $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                        $where=[
                          'StartDate'=>date('Y-m-d'), 
                          'EndDate'=>date('Y-m-d'),
                          'ns_store'=>'%'.$_GET['store_id'].'%',
                         
                        ];

                      
                        //-- 總頁數 --
                      
                       


                        $row_list_total=$pdo->select("SELECT count(*) as total
                                                FROM NewsAndType
                                                WHERE unit_id='un2019011716575635' AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate AND
                                                ns_store LIKE :ns_store"
                                                , $where, 'one');
                        $total_page=ceil(((int)$row_list_total['total'])/$num);


                        $row=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, unit_id, in_blog, activity_s_date, activity_e_date, ns_store
                                           FROM NewsAndType 
                                           WHERE unit_id='un2019011716575635' AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate AND 
                                           ns_store LIKE :ns_store  
                                           ORDER BY ns_vfdate DESC
                                           LIMIT $now_page_num, $num" , $where);

                        foreach ($row as $row_one) {

                          $ns_msghtml=mb_substr(strip_tags($row_one['ns_msghtml']), 0,50,'utf-8').'...';
                          $url=news_url($row_one['mt_id'], $row_one['Tb_index'], $row_one['ns_nt_pk'], $row_one['area_id']);
                          $fb_url=urlencode($url);


                          
                          //-- 關聯商店 --
                          $ns_store_arr=explode(',', $row_one['ns_store']);
                          $ns_store_txt='';
                          foreach ($ns_store_arr as $ns_store) {
                            $ns_store_txt.="'".$ns_store."',";
                          }
                          $ns_store_txt=substr($ns_store_txt, 0,-1);
                          $row_store=$pdo->select("SELECT Tb_index, st_nickname
                                                  FROM store
                                                  WHERE Tb_index IN ($ns_store_txt)", 'no');
                          $store_num=count($row_store);
                          $small_txt=$store_num==1 ? '<small class="cs_small"><a href="/mpay/about.php?'.$row_store[0]['Tb_index'].'">('.$row_store[0]['st_nickname'].')</a></small>' : '';

                          $ns_ftitle=empty($small_txt) ? $row_one['ns_ftitle'] : mb_substr($row_one['ns_ftitle'], 0,15,'utf-8');

                          //-- 活動時間 --
                          if ($row_one['activity_e_date']!='0000-00-00') {
                            $activity_s_date=$row_one['activity_s_date']!='0000-00-00' ? $row_one['activity_s_date']:'即日起';
                            $activity_date='<span class="mb-1">活動日期：'.$activity_s_date.'~'.$row_one['activity_e_date'].'</span>';
                          }
                          else{
                            $activity_date='';
                          }


                          echo '
                          <div class="row no-gutters py-md-3 mx-md-4 news_list">
                          <div class="col-md-4 col-6 py-2 pl-2">
                            <a target="_blank" class="img_div news_list_img" title="'.$row_one['ns_ftitle'].'" href="'.$url.'" style="background-image: url(../sys/img/'.$row_one['ns_photo_1'].');"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                           <div class="mb-2">
                           <h3>
                            <a target="_blank" href="'.$url.'" title="'.$row_one['ns_ftitle'].'">
                             '.$ns_ftitle.'
                            </a>
                            '.$small_txt.'
                           </h3>
                            
                           </div>
                            '.$activity_date.'
                            <p class="phone_hidden">'.$ns_msghtml.'...</p>
                            <div class="fb_search_btn">
                              <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                          </div>
                          </div>';
                        }

                        //-- 無資料 --
                        if ($row_list_total['total']==0) {
                          echo "<h3 class='ml-3'>查無資料...請重新搜尋</h3>";
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
              require 'right_area_div.php';
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