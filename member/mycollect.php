<?php 
 require '../share_area/conn.php';

 //-- 判斷登入會員 --
 check_member();

 if ($_POST) {

  foreach ($_POST['my_favorite'] as $my_favorite) {
   $where=['mf_pk'=>$my_favorite];
   $pdo->delete('my_favorite', $where);
  }
   
 }
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心 > 我的收藏</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
      require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 我的收藏" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 我的收藏" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="javascript:;">我的收藏</a></p>
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
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">我的收藏</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">


                            
                              <div class="px-md-2 member_info">

                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <h5>我的收藏</h5>
                                    <button id="del_fa_btn" type="button" class="btn gray-layered btnOver">刪除</button>
                                   </div>
                                 </div>
                                 <div>
                                <form id="mf_form" action="" method="POST">
                                 <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">來源</th>
                                       <th scope="col">主題名稱</th>
                                       <th scope="col">收藏時間</th>
                                       <th scope="col"><label class="m-0"><input type="checkbox" id="all_check" >全選</label> </th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                    <?php 
                                      //-- 分頁判斷數 --
                                      $num=12;
                                      //--- 分頁起頭數 ---
                                      $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                                      //-- 目前分頁 --
                                      $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

                                      //-- 總頁數 --
                                      $row_list_total=$pdo->select("SELECT COUNT(*) as total
                                                                    FROM my_favorite as mf 
                                                                    LEFT JOIN NewsAndType as n ON n.Tb_index=mf.mf_msg_pk
                                                                    LEFT JOIN appNotice as note ON note.Tb_index=mf.mf_msg_pk
                                                                    LEFT JOIN credit_card as cc ON cc.Tb_index=mf.mf_msg_pk
                                                                    LEFT JOIN appArea as aa ON aa.Tb_index=n.area_id
                                                                    WHERE mf.mf_ud_pk=:mf_ud_pk 
                                                                    ORDER BY mf.mf_create_time DESC"
                                                                    , ['mf_ud_pk'=>$_SESSION['ud_pk']], 'one');
                                      $total_page=ceil(((int)$row_list_total['total'])/$num);
                                      
                                      $row_f=$pdo->select("SELECT n.mt_id, n.ns_nt_pk, n.area_id, note.note_type, cc.cc_group_id,
                                                                  aa.at_name, mf.mf_msg_pk, mf.mf_msg_title, mf.mf_create_time, mf.mf_pk
                                                           FROM my_favorite as mf 
                                                           LEFT JOIN NewsAndType as n ON n.Tb_index=mf.mf_msg_pk
                                                           LEFT JOIN appNotice as note ON note.Tb_index=mf.mf_msg_pk
                                                           LEFT JOIN credit_card as cc ON cc.Tb_index=mf.mf_msg_pk
                                                           LEFT JOIN appArea as aa ON aa.Tb_index=n.area_id
                                                           WHERE mf.mf_ud_pk=:mf_ud_pk 
                                                           ORDER BY mf.mf_create_time DESC
                                                           LIMIT $now_page_num, $num", 
                                                           ['mf_ud_pk'=>$_SESSION['ud_pk']]);

                                      foreach ($row_f as $row_f_one) {

                                        if (strpos($row_f_one['mf_msg_pk'], 'news')!==FALSE) {
                                          $url=news_url($row_f_one['mt_id'], $row_f_one['mf_msg_pk'], $row_f_one['ns_nt_pk'], $row_f_one['area_id']);
                                          $type_name=empty($row_f_one['at_name']) ? '新聞': $row_f_one['at_name'];
                                        }
                                        elseif(strpos($row_f_one['mf_msg_pk'], 'note')!==FALSE){
                                          $url=$row_f_one['note_type']=='0' ? '../member/notify_detail.php?'.$row_f_one['mf_msg_pk'] : '../member/event_activity_detail.php?'.$row_f_one['mf_msg_pk'];
                                          $type_name=$row_f_one['note_type']=='0' ? '公告': '活動';
                                        }
                                        elseif(strpos($row_f_one['mf_msg_pk'], 'ccard')!==FALSE){
                                          $url='../card/creditcard.php?cc_pk='.$row_f_one['mf_msg_pk'].'&cc_group_id='.$row_f_one['cc_group_id'];
                                          $type_name='信用卡';
                                        }
                                        
                                        echo '   
                                        <tr>
                                          <th scope="row">'.$type_name.'</th>
                                          <td><a target="_blank" href="'.$url.'">'.$row_f_one['mf_msg_title'].'</a></td>
                                          <td>'.$row_f_one['mf_create_time'].'</td>
                                          <td><input type="checkbox" name="my_favorite[]" value="'.$row_f_one['mf_pk'].'"></td>
                                        </tr>';
                                      }
                                    ?>
                                     
                                   </tbody>
                                 </table>
                               </form>
                               </div>
                                 
                              <?php 
                               //-- 分頁 --
                               paging($total_page, $page);
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

   <script type="text/javascript">
     $(document).ready(function() {
       $('#all_check').click(function(event) {
          if ($(this).prop('checked')==true) {
           $('[name="my_favorite[]"]').prop('checked', true);
          }
          else{
           $('[name="my_favorite[]"]').prop('checked', false);
          }
       });

       $('#del_fa_btn').click(function(event) {
        if ($('[name="my_favorite[]"]:checked').length<1) {
          alert('請勾選要刪除的文章');
        }
        else{
          if (confirm('是否要刪除勾選文章\n按「確定」確定刪除文章\n按「取消」取消刪除文章')) {
            $('#mf_form').submit();
          }
        }
         
       });
       
     });
   </script>

  </body>
</html>