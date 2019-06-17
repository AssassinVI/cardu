<?php 
 require '../share_area/conn.php';
 require 'config.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-搜尋文章</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
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
        <!-- <div class="row ">
          <div class="col-md-12 col">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="travel.php">優旅行</a> / <a href="javascript:;">日本嬉遊趣
            </a></p>
          </div>
        </div> -->
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                
                <div class="row">

                    <div class="col-md-12 col">

                      <?php 
                       if ($_GET['store_type']=='') {
                         $search_store_txt='所有點數資訊、';
                         $store_query='';
                       }elseif($_GET['store_type']=='platform'){
                         $search_store_txt='點數平台、';
                         $store_query=" AND s.st_main_type='' AND s.st_second_type='' ";
                       }elseif ($_GET['store_type']=='store') {
                         $search_store_txt='集點店家、';
                         $store_query=" AND s.st_main_type!='' AND s.st_second_type!='' ";
                       }


                       $search_nt=$pdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['nt_id']], 'one');
                       $search_nt_txt=empty($search_nt['nt_name']) ? '所有類別、' : $search_nt['nt_name'].'、';
                       $search_keyWords=empty($_GET['pay_keywords']) ? '' : $_GET['pay_keywords'].'、';
                       $search_txt=$search_store_txt.$search_nt_txt.$search_keyWords;
                       $search_txt=mb_substr($search_txt, 0,-1,'utf-8');

                       echo '<p>搜尋條件：'.$search_txt.'</p>';
                      ?>
                      
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
                          'ns_nt_pk'=>'%'.$_GET['nt_id'].'%'
                        ];

                        //-- 關鍵字 --
                        $keyword_arr=mb_strpos($_GET['pay_keywords'], ',')!=FALSE ? explode(',', $_GET['pay_keywords']) : explode(' ', $_GET['pay_keywords']);
                        $keyword_arr_num=count($keyword_arr);
                        $key_query='';
                        for ($i=0; $i <$keyword_arr_num ; $i++) { 
                          $key_query.='(n.ns_ftitle LIKE :keyword'.(4*$i+1).' OR n.ns_stitle LIKE :keyword'.(4*$i+2).' OR n.ns_msghtml LIKE :keyword'.(4*$i+3).' OR n.ns_label LIKE :keyword'.(4*$i+4).') AND ';
                          $where['keyword'.(4*$i+1)]='%'.$keyword_arr[$i].'%';
                          $where['keyword'.(4*$i+2)]='%'.$keyword_arr[$i].'%';
                          $where['keyword'.(4*$i+3)]='%'.$keyword_arr[$i].'%';
                          $where['keyword'.(4*$i+4)]='%'.$keyword_arr[$i].'%';
                        }

                        $key_query=substr($key_query, 0,-4);
                        

                        //-- 總頁數 --
                      
                        //-- 優行動Pay單元 --
                        $ns_nt_ot_pk_query="";
                        $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id='$area_id'");
                        foreach ($row_newsType as $newsType) {
                         $ns_nt_ot_pk_query.=" n.ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                        }
                        $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


                        $row_list_total=$pdo->select("SELECT count(*) as total
                                                FROM NewsAndType as n 
                                                INNER JOIN store as s ON s.Tb_index=n.ns_store
                                                WHERE (n.area_id='$area_id' OR $ns_nt_ot_pk_query) AND n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate 
                                                AND n.ns_nt_pk LIKE :ns_nt_pk AND $key_query $store_query"
                                                , $where, 'one');
                        $total_page=ceil(((int)$row_list_total['total'])/$num);


                        $row=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, n.area_id, n.unit_id, n.activity_s_date, n.activity_e_date, n.ns_store
                                           FROM NewsAndType as n 
                                           INNER JOIN store as s ON s.Tb_index=n.ns_store 
                                           WHERE (n.area_id='$area_id' OR $ns_nt_ot_pk_query) AND n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate 
                                           AND n.ns_nt_pk LIKE :ns_nt_pk AND $key_query $store_query
                                           ORDER BY n.ns_vfdate DESC
                                           LIMIT $now_page_num, $num" , $where);

                        foreach ($row as $row_one) {

                          $ns_ftitle=mb_substr($row_one['ns_ftitle'], 0,15,'utf-8');
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
                            <a class="img_div news_list_img" title="'.$row_one['ns_ftitle'].'" href="'.$url.'" style="background-image: url(../sys/img/'.$row_one['ns_photo_1'].');"></a>
                          </div>
                          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                           <div class="mb-2">
                            <a href="'.$url.'" title="'.$row_one['ns_ftitle'].'">
                             <h3>'.$row_one['ns_ftitle'].'</h3>
                            </a>
                            '.$small_txt.'
                           </div>
                            '.$activity_date.'
                            <p>'.$ns_msghtml.'...</p>
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