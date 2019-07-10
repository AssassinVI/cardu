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



    <title>卡優新聞網-我的信用卡 > 文章</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-我的信用卡 > 文章" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-我的信用卡 > 文章" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



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
        <div class="row ">
          <div class="col-md-12 col">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="mycard.php">我的信用卡
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
                       switch ($_GET['area_id']) {
                         case '':
                          $area_name='新聞';
                         break;
                         case 'at2019021114154632':
                          $area_name='卡情報';
                         break;
                         case 'at2019011117341414':
                          $area_name='優行動Pay';
                         break;
                         case 'at2019011117435970':
                          $area_name='優票證';
                         break;
                         case 'at2019011117443626':
                          $area_name='優集點';
                         break;
                       }

                       $bank_id_arr=explode(',', $_GET['bank_id']);
                       $bank_id_sql="";
                       $bank_param=[];
                       $x=1;
                       foreach ($bank_id_arr as $bank_id) {
                         $bank_id_sql.=" Tb_index=:Tb_index".$x." OR ";
                         $bank_param['Tb_index'.$x]=$bank_id;
                         $x++;
                       }
                       $bank_id_sql=substr($bank_id_sql, 0,-3);

                       //-- 搜尋銀行 --
                       $bank_txt='';
                       $bank_sql='';
                       $c_bank_sql="";
                       $row_bank=$pdo->select("SELECT bi_shortname, Tb_index FROM bank_info WHERE $bank_id_sql", $bank_param);
                       foreach ($row_bank as $bank_one) {
                         $bank_txt.=$bank_one['bi_shortname'].'，';
                         $bank_sql.=" FIND_IN_SET('".$bank_one['Tb_index']."', ns_bank) OR ";
                         $c_bank_sql.=" FIND_IN_SET('".$bank_one['Tb_index']."', abc.bank_id) OR ";
                       }
                       $bank_txt=mb_substr($bank_txt, 0,-1, 'utf-8');
                       $bank_sql=substr($bank_sql, 0,-3);
                       $c_bank_sql=substr($c_bank_sql, 0,-3);

                       //-- 搜尋銀行 END -- 
                       echo '
                        <p>我的信用卡-'.$area_name.'｜搜尋條件：'.$bank_txt.'</p>';
                      ?>
                      
                      <div class="cardshap ">

                       <?php 
                        //-- 分頁判斷數 --
                        $num=12;
                        //--- 分頁起頭數 ---
                        $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                        //-- 目前分頁 --
                        $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                        $where=[
                          'StartDate'=>date('Y-m-d'), 
                          'EndDate'=>date('Y-m-d'),
                          'area_id'=>$_GET['area_id']
                        ];

                        
                        if ($_GET['area_id']!='at2019021114154632') {
                          //-- 總頁數 --
                          $row_list_total=$pdo->select("SELECT count(*) as total
                                                  FROM NewsAndType
                                                  WHERE area_id=:area_id AND ($bank_sql) AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate"
                                                  , $where, 'one');
                          $total_page=ceil(((int)$row_list_total['total'])/$num);


                          $row=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, 
                                                    unit_id, in_blog, activity_s_date, activity_e_date, ns_store, ns_vfdate, pk, nt_name
                                             FROM NewsAndType 
                                             WHERE area_id=:area_id AND ($bank_sql) AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                             ORDER BY ns_vfdate DESC
                                             LIMIT $now_page_num, $num" , $where);
                        }

                        //-- 卡情報用 --
                        else{
                          
                          //-- 總頁數 --
                          $row_list_total=$pdo->select("SELECT n.Tb_index
                                                  FROM NewsAndType as n
                                                  INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                  WHERE n.area_id=:area_id AND ($c_bank_sql) AND n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                  GROUP BY n.Tb_index"
                                                  , $where, 'one');
                          $total_page=ceil(((int)count($row_list_total))/$num);


                          $row=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, n.area_id, 
                                                    n.unit_id, n.in_blog, n.activity_s_date, n.activity_e_date, n.ns_store, n.ns_vfdate, n.pk, n.nt_name
                                             FROM NewsAndType as n
                                             INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                             WHERE n.area_id=:area_id AND ($c_bank_sql) AND n.ns_verify=3 AND n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                             GROUP BY n.Tb_index
                                             ORDER BY n.ns_vfdate DESC
                                             LIMIT $now_page_num, $num" , $where);
                        }
                        



                        foreach ($row as $row_one) {

                          $ns_msghtml=mb_substr(strip_tags($row_one['ns_msghtml']), 0,50,'utf-8').'...';
                          $url=news_url($row_one['mt_id'], $row_one['Tb_index'], $row_one['ns_nt_pk'], $row_one['area_id']);
                          $fb_url=urlencode($url);
                          $ns_vfdate=explode(' ', $row_one['ns_vfdate']);
                          

                          switch ($_GET['area_id']) {
                            case '':
                             $area_name='新聞';
                             $crumbs_txt='<a class="text-primary" href="../news/news.php">新聞</a> > 
                                          <a class="text-primary" href="../news/list.php?nt_pk='.$row_one['pk'].'">'.$row_one['nt_name'].'</a>';
                            break;
                            case 'at2019021114154632':
                             $area_name='卡情報';
                             $crumbs_txt='<a class="text-primary" href="../card/card.php">卡情報</a> > 
                                          <a class="text-primary" href="../message/list.php?mt_pk='.$row_one['pk'].'">'.$row_one['nt_name'].'</a>';
                            break;
                            case 'at2019011117341414':
                             $area_name='優行動Pay';
                             $crumbs_txt='<a class="text-primary" href="../mpay/mpay.php">優行動Pay</a> > 
                                          <a class="text-primary" href="../mpay/list.php?mt_pk='.$row_one['pk'].'">'.$row_one['nt_name'].'</a>';
                            break;
                            case 'at2019011117435970':
                             $area_name='優票證';
                             $crumbs_txt='<a class="text-primary" href="../eticket/eticket.php">優票證</a> > 
                                          <a class="text-primary" href="../eticket/list.php?mt_pk='.$row_one['pk'].'">'.$row_one['nt_name'].'</a>';
                            break;
                            case 'at2019011117443626':
                             $area_name='優集點';
                             $crumbs_txt='<a class="text-primary" href="../epoint/epoint.php">優集點</a> > 
                                          <a class="text-primary" href="../epoint/list.php?mt_pk='.$row_one['pk'].'">'.$row_one['nt_name'].'</a>';
                            break;
                          }
                        

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
                            <a target="_blank" href="'.$url.'" title="'.$row_one['ns_ftitle'].'">
                             <h3>'.$ns_ftitle.'</h3>
                            </a>
                           </div>
                            '.$activity_date.'
                            <p class="phone_hidden">'.$ns_msghtml.'...</p>
                            <div class="fb_search_btn">
                              <small class="px-md-4 pb-md-0 px-0 pb-2 phone_hidden">('.$crumbs_txt.' > '.$ns_vfdate[0].')</small>
                              <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
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