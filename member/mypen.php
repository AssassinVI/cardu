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



    <title>卡優新聞網-會員中心 > 我的文章</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php
      require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 我的文章" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 我的文章" />
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
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="javascript:;">我的文章</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">我的發文</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="javascript:;" tab-target="#goodPerson" aria-selected="false">我的回文</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">


                            
                              <div class="px-md-2 member_info">

                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <h5>我的文章</h5>
                                   </div>
                                 </div>
                                 <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">項目</th>
                                       <th scope="col">來源</th>
                                       <th scope="col">主題名稱</th>
                                       <th scope="col">發布時間</th>
                                     </tr>
                                   </thead>
                                   <tbody>

                                    <?php 
                                      //-- 分頁判斷數 --
                                      // $num=12;
                                      // //--- 分頁起頭數 ---
                                      // $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                                      // //-- 目前分頁 --
                                      // $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                                      // $row_discuss_total=$pdo->select("SELECT COUNT(*) as total
                                      //                                  FROM discuss
                                      //                                  WHERE ds_ud_pk=:ds_ud_pk AND ds_type=0 ", ['ds_ud_pk'=>$_SESSION['ud_pk']], 'one');
                                      // $total_page=ceil(((int)$row_discuss_total['total'])/$num);

                                      $row_discuss=$pdo->select("SELECT d.ds_type, d.ds_type_pk, d.ds_pdate, n.mt_id, 
                                                                        n.ns_nt_pk, n.area_id, n.ns_ftitle, 
                                                                        note.aTitle, note.note_type,
                                                                        cc.cc_group_id, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name,
                                                                        aa.at_name
                                                                 FROM discuss as d 
                                                                 LEFT JOIN NewsAndType as n ON n.Tb_index=d.ds_type_pk
                                                                 LEFT JOIN appNotice as note ON note.Tb_index=d.ds_type_pk
                                                                 LEFT JOIN cc_detail as cc ON cc.Tb_index=d.ds_type_pk
                                                                 LEFT JOIN appArea as aa ON aa.Tb_index=n.area_id
                                                                 WHERE d.ds_ud_pk=:ds_ud_pk AND ds_type=0
                                                                 ORDER BY d.ds_pdate DESC
                                                                 ", ['ds_ud_pk'=>$_SESSION['ud_pk']]);
                                      $x=1;
                                      foreach ($row_discuss as $discuss) {
                                        
                                        $ds_type=$discuss['ds_type']=='0' ? '發文':'回覆';

                                        if (strpos($discuss['ds_type_pk'], 'news')!==FALSE) {
                                          $url=news_url($discuss['mt_id'], $discuss['ds_type_pk'], $discuss['ns_nt_pk'], $discuss['area_id']);
                                          $title_name=$discuss['ns_ftitle'];
                                          $type_name=empty($discuss['at_name']) ? '新聞': $discuss['at_name'];
                                        }
                                        elseif(strpos($discuss['ds_type_pk'], 'note')!==FALSE){
                                          $url=$discuss['note_type']=='0' ? '../member/notify_detail.php?'.$discuss['ds_type_pk'] : '../member/event_activity_detail.php?'.$discuss['ds_type_pk'];
                                          $title_name=$discuss['aTitle'];
                                          $type_name=$discuss['note_type']=='0' ? '公告': '活動';
                                        }
                                        elseif(strpos($discuss['ds_type_pk'], 'ccard')!==FALSE){
                                          $url='../card/creditcard.php?cc_pk='.$discuss['ds_type_pk'].'&cc_group_id='.$discuss['cc_group_id'];
                                          $title_name=$discuss['bi_shortname'].$discuss['cc_cardname'].$discuss['org_nickname'].$discuss['attr_name'];
                                          $type_name='信用卡';
                                        }

                                        echo '  
                                        <tr>
                                          <td>'.$x.'</td>
                                          <td>'.$type_name.'</td>
                                          <td><a href="'.$url.'">'.$title_name.'</a></td>
                                          <td>'.$discuss['ds_pdate'].'</td>
                                        </tr>';
                                        $x++;
                                      }
                                    ?>
                                   </tbody>
                                 </table>
                                 
                                 <?php 
                                  //-- 分頁 --
                                  //paging($total_page, $page);
                                 ?>
                              </div>
                            
                           
                          </div>
                          <div class="tab-pane fade" id="goodPerson" role="tabpanel" aria-labelledby="goodPerson-tab">

                            <div class="px-md-2 member_info">

                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <h5>我的文章</h5>
                                   </div>
                                 </div>
                                 <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">項目</th>
                                       <th scope="col">來源</th>
                                       <th scope="col">主題名稱</th>
                                       <th scope="col">發布時間</th>
                                     </tr>
                                   </thead>
                                   <tbody>

                                    <?php 
                                      //-- 分頁判斷數 --
                                      // $num=12;
                                      // //--- 分頁起頭數 ---
                                      // $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                                      // //-- 目前分頁 --
                                      // $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                                      // $row_discuss_total=$pdo->select("SELECT COUNT(*) as total
                                      //                                  FROM discuss
                                      //                                  WHERE ds_ud_pk=:ds_ud_pk AND ds_type=0 ", ['ds_ud_pk'=>$_SESSION['ud_pk']], 'one');
                                      // $total_page2=ceil(((int)$row_discuss_total['total'])/$num);

                                      $row_discuss=$pdo->select("SELECT d.ds_type, d.ds_type_pk, d.ds_pdate, n.mt_id, 
                                                                        n.ns_nt_pk, n.area_id, n.ns_ftitle, 
                                                                        note.aTitle, note.note_type,
                                                                        cc.cc_group_id, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name,
                                                                        aa.at_name
                                                                 FROM discuss as d 
                                                                 LEFT JOIN NewsAndType as n ON n.Tb_index=d.ds_type_pk
                                                                 LEFT JOIN appNotice as note ON note.Tb_index=d.ds_type_pk
                                                                 LEFT JOIN cc_detail as cc ON cc.Tb_index=d.ds_type_pk
                                                                 LEFT JOIN appArea as aa ON aa.Tb_index=n.area_id
                                                                 WHERE d.ds_ud_pk=:ds_ud_pk AND ds_type=1
                                                                 ORDER BY d.ds_pdate DESC
                                                                 ", ['ds_ud_pk'=>$_SESSION['ud_pk']]);
                                      $x=1;
                                      foreach ($row_discuss as $discuss) {
                                        
                                        $ds_type=$discuss['ds_type']=='0' ? '發文':'回覆';

                                        if (strpos($discuss['ds_type_pk'], 'news')!==FALSE) {
                                          $url=news_url($discuss['mt_id'], $discuss['ds_type_pk'], $discuss['ns_nt_pk'], $discuss['area_id']);
                                          $title_name=$discuss['ns_ftitle'];
                                          $type_name=empty($discuss['at_name']) ? '新聞': $discuss['at_name'];
                                        }
                                        elseif(strpos($discuss['ds_type_pk'], 'note')!==FALSE){
                                          $url=$discuss['note_type']=='0' ? '../member/notify_detail.php?'.$discuss['ds_type_pk'] : '../member/event_activity_detail.php?'.$discuss['ds_type_pk'];
                                          $title_name=$discuss['aTitle'];
                                          $type_name=$discuss['note_type']=='0' ? '公告': '活動';
                                        }
                                        elseif(strpos($discuss['ds_type_pk'], 'ccard')!==FALSE){
                                          $url='../card/creditcard.php?cc_pk='.$discuss['ds_type_pk'].'&cc_group_id='.$discuss['cc_group_id'];
                                          $title_name=$discuss['bi_shortname'].$discuss['cc_cardname'].$discuss['org_nickname'].$discuss['attr_name'];
                                          $type_name='信用卡';
                                        }

                                        echo '  
                                        <tr>
                                          <td>'.$x.'</td>
                                          <td>'.$type_name.'</td>
                                          <td><a href="'.$url.'">'.$title_name.'</a></td>
                                          <td>'.$discuss['ds_pdate'].'</td>
                                        </tr>';
                                        $x++;
                                      }
                                    ?>
                                    
                                   </tbody>
                                 </table>
                                 
                                <?php 
                                 //-- 分頁 --
                                 //paging($total_page, $page);
                                ?>
                                 
                              </div>
                           
                          </div>
                        </div>
                      </div>
                    
                  </div>


                    
                   

                    
                  
                    
                    

                   

                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php require 'right_area_div.php';?>
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