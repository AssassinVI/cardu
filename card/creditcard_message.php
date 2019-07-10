<?php 
 require '../share_area/conn.php';
 require 'config.php';

  $row_cc_one=$pdo->select("SELECT cc.Tb_index, ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name, 
                                   cc.cc_group_id, cc.cc_bi_pk, cc.cc_cardorg, cc.cc_cardlevel
                            FROM credit_card as cc 
                            INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                            WHERE cc.Tb_index=:Tb_index", 
                            ['Tb_index'=>$_GET['cc_pk']], 'one');
  $cc_name=$row_cc_one['bi_shortname'].$row_cc_one['cc_cardname'].$row_cc_one['org_nickname'].$row_cc_one['attr_name'];
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-<?php echo $cc_name;?>相關好康</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-<?php echo $cc_name;?>相關好康" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-<?php echo $cc_name;?>相關好康" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="cardNews_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="bank_list.php">銀行總覽</a> / <a href="creditcard.php?cc_pk=<?php echo $_GET['cc_pk'] ;?>&cc_group_id=<?php echo $row_cc_one['cc_group_id'] ;?>"><?php echo $cc_name; ?></a> / <a href="javascript:;">相關好康</a>
            </p>
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
                          'bank_id'=>$row_cc_one['cc_bi_pk'],
                          'card_group_id'=>$row_cc_one['cc_group_id'], 
                          'org_id'=>$row_cc_one['cc_cardorg'], 
                          'level_id'=>$row_cc_one['cc_cardlevel']
                        ];

                      
                        //-- 總頁數 --
                      
                       


                        $row_list_total=$pdo->select("SELECT count(DISTINCT n.Tb_index) as total
                                                FROM NewsAndType as n
                                                INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                WHERE abc.bank_id=:bank_id AND abc.card_group_id =:card_group_id AND abc.org_id=:org_id AND abc.level_id=:level_id AND 
                                                      n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND n.area_id='at2019021114154632'
                                                GROUP BY n.Tb_index"
                                                , $where, 'one');
                        $total_page=ceil(((int)$row_list_total['total'])/$num);


                        $row=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, n.area_id, n.unit_id, n.activity_s_date, n.activity_e_date, n.ns_bank
                                           FROM NewsAndType as n
                                           INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                           WHERE abc.bank_id=:bank_id AND abc.card_group_id =:card_group_id AND abc.org_id=:org_id AND abc.level_id=:level_id AND 
                                                 n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND n.area_id='at2019021114154632'
                                           GROUP BY n.Tb_index
                                           ORDER BY n.ns_vfdate DESC
                                           LIMIT $now_page_num, $num" , $where);

                        foreach ($row as $row_one) {

                          $ns_msghtml=mb_substr(strip_tags($row_one['ns_msghtml']), 0,50,'utf-8').'...';
                          $url=news_url($row_one['mt_id'], $row_one['Tb_index'], $row_one['ns_nt_pk'], $row_one['area_id']);
                          $fb_url=urlencode($url);

                          //-- 關聯銀行 --
                          $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname
                                                  FROM appNews_bank_card as abc
                                                  INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                                  WHERE news_id=:news_id
                                                  GROUP BY abc.bank_id", ['news_id'=>$row_one['Tb_index']]);
                          
                          $back_num=count($row_back);
                          $cs_small_txt=$back_num==1 ? '<small class="cs_small"><a href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">('.$row_back[0]['bi_shortname'].')</a></small>' : '';
                          $ns_ftitle=$back_num==1 ? mb_substr($row_one['ns_ftitle'], 0,15,'utf-8') : $row_one['ns_ftitle'];
                          
                          

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
                             '.$cs_small_txt.'
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
              if (!wp_is_mobile()) {
                require 'right_area_div.php';
              }
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