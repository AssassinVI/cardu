<?php 
  $row_mem=$pdo->select("SELECT ud_nickname, ud_photo, ud_regtime, ud_logintime, ud_logincnt 
                         FROM user_data 
                         WHERE ud_pk=:ud_pk", 
                         ['ud_pk'=>$_SESSION['ud_pk']], 'one');

 if (!empty($row_mem['ud_photo'])) {
   $ud_photo= strpos($row_mem['ud_photo'], 'http') ===FALSE ?  '../sys/img/'.$row_mem['ud_photo'] : $row_mem['ud_photo'];
 }
 else{
   $ud_photo='../img/component/user.png';
 }
  

?>

<div class="row">
  <div class="col-md-12 col">
    <div class="cardshap ">

      <div class="pt-3 detail_title">
       <div class="col-md-12 col">
         <div class="row user_info">
                <div class="col-md-4 hv-center">
                  <ul>
                    <li class="text-center"><img style="width: 66px;" src="<?php echo $ud_photo; ?>"><br><?php echo $row_mem['ud_nickname']; ?></li>
                    <li><img src="../img/component/grade.png"><br>會員等級</li>
                  </ul>
                </div>
                <div class="col-md-8">
                  <div class="row no-gutters">
                    <div class="col-md-5">
                        <p><img src="../img/component/li.png">U幣:XX</p>
                        <p><img src="../img/component/li.png">積分:XX</p>
                        <p><img src="../img/component/li.png">威望值:XX</p>
                    </div>
                    <div class="col-md-7">
                        <p><img src="../img/component/li.png">註冊時間：<?php echo $row_mem['ud_regtime']; ?></p>
                        <p><img src="../img/component/li.png">最近登錄：<?php echo $row_mem['ud_logintime']; ?></p>
                        <p><img src="../img/component/li.png">登錄次數：<?php echo $row_mem['ud_logincnt']; ?></p>
                    </div>
                  </div>
                </div>
              </div> 
            </div> 
          </div>

    
 <!--特別議題-->
    <div class="col-md-12 col pb-3 detail_content">


        <div class="cardshap primary_tab mouseHover_other_tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="javascript:;" slide_id="sub_slide2_1" tab-target="#goodMember" aria-selected="true">卡優公告</a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="javascript:;" slide_id="sub_slide2_2" tab-target="#goodPerson" aria-selected="false">卡優活動</a>
            </li>
          </ul>
        <div class="tab-content p-0" id="myTabContent">

    <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">
      
     <div class="tab-content">
         <div class="swiper-container sub_slide2">
          <div class="swiper-wrapper">

            <?php 
              $row_notice=$pdo->select("SELECT aTitle, aPic, Tb_index FROM appNotice WHERE note_type=0 ORDER BY StartDate DESC LIMIT 0,6");

              foreach ($row_notice as $notice_one) {

                $aTitle=mb_substr($notice_one['aTitle'], 0,14);
                
                echo '
                <div class="swiper-slide">
                 <div class="cards-3 text-center">
                 <a href="notify_detail.php?'.$notice_one['Tb_index'].'" title="'.$notice_one['aTitle'].'">
                  <div class="img_div" style="background-image: url(../sys/img/'.$notice_one['aPic'].');">
                  </div>
                  <span class="px-2">'.$aTitle.'</span>
                 </a>
                </div>
               </div>';
              }
            ?>
             

          </div>
          
          <!-- 如果需要导航按钮 -->
          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
          
      </div> 
     </div>
    



    </div>
  <div class="tab-pane fade" id="goodPerson" role="tabpanel" aria-labelledby="goodPerson-tab">
    <div class="tab-content">
         <div class="swiper-container sub_slide2">
          <div class="swiper-wrapper">

            <?php 
              $row_notice=$pdo->select("SELECT aTitle, aPic, Tb_index FROM appNotice WHERE note_type=1 ORDER BY StartDate DESC LIMIT 0,6");

              foreach ($row_notice as $notice_one) {

                $aTitle=mb_substr($notice_one['aTitle'], 0,14);
                
                echo '
                <div class="swiper-slide">
                 <div class="cards-3 text-center">
                 <a href="notify_detail.php?'.$notice_one['Tb_index'].'" title="'.$notice_one['aTitle'].'">
                  <div class="img_div" style="background-image: url(../sys/img/'.$notice_one['aPic'].');">
                  </div>
                  <span class="px-2">'.$aTitle.'</span>
                 </a>
                </div>
               </div>';
              }
            ?>

             

          </div>
          
          <!-- 如果需要导航按钮 -->
          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
          
      </div> 
     </div>
  </div>

        </div>
      </div>


      <div class="cardshap primary_tab">
        <div class="member_info">
          <!--我的信用卡-->
          <div class="col-md-12 col0">

              <div class="cardshap exception user_more">
                <a href="mycard.php" class="btn btn-sm btnOver phone_hidden">More</a>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item news_tab w-30">
                  <a class="nav-link active  pl-30 py-2" id="box-tab"  href="mycard.php" tab-target="#box" aria-selected="true">
                  我的信用卡</a>
                  <a class="top_link d-md-none d-sm-block" href="mycard.php"></a>
                </li>
              </ul>
          <div class="" id="myTabContent">
          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">
            <div class="">
              
         
             <table class="table table-striped table-bordered text-center">
               <thead>
                 <tr>
                   <th scope="col">發卡單位</th>
                   <th scope="col">信用卡名稱</th>
                   <th scope="col">結帳日</th>
                   <th scope="col">繳款日</th>
                   <th scope="col">年度累積金額</th>
                 </tr>
               </thead>
               <tbody>
                <?php 
                  $row_mycard=$pdo->select("SELECT mb.mb_pk, cc.bi_shortname, cc.cc_cardname, mb.mb_checkout_day, mb.mb_pay_day,  SUM(mbd.mbd_amount) as total
                                          FROM my_billing as mb 
                                          INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                          INNER JOIN cc_detail as cc ON cc.Tb_index=mb.mb_bill_cc_pk
                                          WHERE mb.mb_ud_pk=:mb_ud_pk 
                                          GROUP BY mb.mb_pk
                                          ORDER BY mb.mb_crtime DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);

                  foreach ($row_mycard as $mycard_one) {
                    $mb_checkout_day=empty($mycard_one['mb_checkout_day']) ? '': '每月'.$mycard_one['mb_checkout_day'].'日';
                    echo '  
                    <tr>
                      <td>'.$mycard_one['bi_shortname'].'</td>
                      <td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$mycard_one['mb_pk'].'" href="javascript:;">'.$mycard_one['cc_cardname'].'</a></td>
                      <td>'.$mb_checkout_day.'</td>
                      <td>'.'每月'.$mycard_one['mb_pay_day'].'日</td>
                      <td>$'.number_format($mycard_one['total']).'</td>
                    </tr>';
                  }
                ?>
                 

               </tbody>
             </table>
           </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!--我的信用卡end -->
          <!--我的帳單-->
          <div class="col-md-12 col0">

              <div class="cardshap exception user_more">
                <a href="mybill.php" class="btn btnOver btn-sm phone_hidden">More</a>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item news_tab w-30">
                  <a class="nav-link active  pl-30 py-2" id="box-tab"  href="mybill.php" tab-target="#box" aria-selected="true">
                  我的帳單</a>
                  <a class="top_link d-md-none d-sm-block" href="mybill.php"></a>
                </li>
              </ul>
          <div class="" id="myTabContent">
          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

             <div class="col-md-12 col0">
               <div class="user_more">
               <b>未繳款帳單</b>
               </div>
             </div>
             <div class="">
              <table class="table table-striped table-bordered text-center">
               <thead>
                 <tr>
                   <th scope="col">發卡單位</th>
                   <th scope="col">信用卡名稱</th>
                   <th scope="col">帳單年月</th>
                   <th scope="col">應繳金額</th>
                   <th scope="col">繳款截止日</th>
                 </tr>
               </thead>
               <tbody>
                 <?php 
                   $row_mycard=$pdo->select("SELECT mb.mb_pk, cc.bi_shortname, cc.cc_cardname, mbd.mbd_bill_yy, mbd.mbd_bill_mm, mbd.mbd_amount, mbd.mbd_expdate
                                           FROM my_billing as mb 
                                           INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                           INNER JOIN cc_detail as cc ON cc.Tb_index=mb.mb_bill_cc_pk
                                           WHERE mb.mb_ud_pk=:mb_ud_pk AND mbd_pay_tag=0
                                           ORDER BY mb.mb_crtime DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);
                   $mbd_amount_total=0;
                   foreach ($row_mycard as $mycard_one) {
                     $mbd_amount_total+=(int)$mycard_one['mbd_amount'];
                     $mbd_bill_yymm=$mycard_one['mbd_bill_yy'].'-'.$mycard_one['mbd_bill_mm'];
                     echo '  
                     <tr>
                       <td>'.$mycard_one['bi_shortname'].'</td>
                       <td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$mycard_one['mb_pk'].'" href="javascript:;">'.$mycard_one['cc_cardname'].'</a></td>
                       <td>'.$mbd_bill_yymm.'</td>
                       <td>$'.number_format($mycard_one['mbd_amount']).'</td>
                       <td>'.$mycard_one['mbd_expdate'].'</td>
                     </tr>';
                   }
                 ?>
                 
                 <tr class="text-right">
                   <td colspan="7" class="px-2">未繳款金額：<?php echo number_format($mbd_amount_total);?>元</td>
                 </tr>
               </tbody>
             </table>
           </div>
             
             <div class="col-md-12 col0">
               <div class="user_more">
               <b>已繳款帳單</b>
               </div>
             </div>
            <div class="">
              <table class="table table-striped table-bordered text-center">
               <thead>
                 <tr>
                   <th scope="col">發卡單位</th>
                   <th scope="col">信用卡名稱</th>
                   <th scope="col">應繳金額</th>
                   <th scope="col">已繳金額</th>
                   <th scope="col">繳款日</th>
                   <th scope="col">繳款方式</th>
                 </tr>
               </thead>
               <tbody>

                <?php 
                  $row_mycard=$pdo->select("SELECT mb.mb_pk, cc.bi_shortname, cc.cc_cardname, mbd.mbd_amount, mbd.mbd_amount_paid, mbd.mbd_pay_type, mbd.mbd_pay_date
                                          FROM my_billing as mb 
                                          INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                          INNER JOIN cc_detail as cc ON cc.Tb_index=mb.mb_bill_cc_pk
                                          WHERE mb.mb_ud_pk=:mb_ud_pk AND mbd_pay_tag=1
                                          ORDER BY mb.mb_crtime DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);
                  $mbd_amount_paid_total=0;
                  foreach ($row_mycard as $mycard_one) {
                    $mbd_amount_paid_total+=(int)$mycard_one['mbd_amount_paid'];
                    $mbd_pay_type=['', '金融機構臨櫃繳款', '超商/代收處繳款', '金融機構自動轉帳', 'ATM/網路銀行轉帳', '全國繳費網繳款'];
                    echo '  
                    <tr>
                      <td>'.$mycard_one['bi_shortname'].'</td>
                      <td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$mycard_one['mb_pk'].'" href="javascript:;">'.$mycard_one['cc_cardname'].'</a></td>
                      <td>$'.number_format($mycard_one['mbd_amount']).'</td>
                      <td>$'.number_format($mycard_one['mbd_amount_paid']).'</td>
                      <td>'.$mycard_one['mbd_pay_date'].'</td>
                      <td>'.$mbd_pay_type[$mycard_one['mbd_pay_type']].'</td>
                    </tr>';
                  }
                ?>
                 
                 <tr class="text-right">
                   <td colspan="7" class="px-2">已繳款金額：<?php echo number_format($mbd_amount_paid_total);?>元</td>
                 </tr>
               </tbody>
             </table>
           </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!--我的帳單end -->
          <!--我的資訊-->
          <div class="col-md-12 col0">

              <div class="cardshap exception user_more">
                <a href="myinfo.php" class="btn btnOver btn-sm phone_hidden">More</a>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item news_tab w-30">
                  <a class="nav-link active  pl-30 py-2" id="box-tab"  href="myinfo.php" tab-target="#box" aria-selected="true">
                  我的資訊</a>
                  <a class="top_link d-md-none d-sm-block" href="myinfo.php"></a>
                </li>
              </ul>
          <div class="" id="myTabContent">
          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">
            <div class="">
             <table class="table table-striped table-bordered text-center">
               <thead>
                 <tr>
                   <th scope="col">來源</th>
                   <th scope="col">類別</th>
                   <th scope="col">主題名稱</th>
                   <th scope="col">發布時間</th>
                 </tr>
               </thead>
               <tbody>
                <?php 
                  
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

                  
                  if (count($row_subscription)>0) {
                  $row_list=$pdo->select("SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.mt_id, n.area_id, n.StartDate, n.ns_store, n.nt_name, n.ns_vfdate,
                                                 a.at_name
                                          FROM NewsAndType as n 
                                          LEFT JOIN appArea as a ON a.Tb_index=n.area_id
                                          WHERE n.ns_verify=3 and n.OnLineOrNot=1 and  n.StartDate<=:StartDate and n.EndDate>=:EndDate $subscription_sql 
                                          ORDER BY n.ns_vfdate DESC LIMIT 0,5", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                  foreach ($row_list as $list_one) {
                    $at_name=empty($list_one['at_name']) ? '新聞':$list_one['at_name'];
                    $url=news_url($list_one['mt_id'], $list_one['Tb_index'], $list_one['ns_nt_pk'], $list_one['area_id']);
                    $ns_vfdate=date('Y-m-d', strtotime($list_one['ns_vfdate']));
                    //$ns_ftitle=mb_substr($row_list_one['ns_ftitle'], 0,20,'utf-8');
                    echo '  
                    <tr>
                      <td>'.$at_name.'</td>
                      <td>'.$list_one['nt_name'].'</td>
                      <td><a href="'.$url.'">'.$list_one['ns_ftitle'].'</a></td>
                      <td>'.$ns_vfdate.'</td>
                    </tr>';
                  }
                 }
                ?>
                 
               </tbody>
             </table>
           </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!--我的資訊end -->
          <!--我的文章-->
          <div class="col-md-12 col0">

              <div class="cardshap exception user_more">
                <a href="mypen.php" class="btn btnOver btn-sm phone_hidden">More</a>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item news_tab w-30">
                  <a class="nav-link active  pl-30 py-2" id="box-tab"  href="mypen.php" tab-target="#box" aria-selected="true">
                  我的文章</a>
                  <a class="top_link d-md-none d-sm-block" href="mypen.php"></a>
                </li>
              </ul>
          <div class="" id="myTabContent">
          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">
           <div class="">
             <table class="table table-striped table-bordered text-center">
               <thead>
                 <tr>
                   <th scope="col">發文/回文</th>
                   <th scope="col">來源</th>
                   <th scope="col">主題名稱</th>
                   <th scope="col">發布時間</th>
                 </tr>
               </thead>
               <tbody>

                <?php 
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
                                             WHERE d.ds_ud_pk=:ds_ud_pk 
                                             ORDER BY d.ds_pdate DESC
                                             LIMIT 0,5", ['ds_ud_pk'=>$_SESSION['ud_pk']]);

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
                      <td>'.$ds_type.'</td>
                      <td>'.$type_name.'</td>
                      <td><a href="'.$url.'">'.$title_name.'</a></td>
                      <td>'.$discuss['ds_pdate'].'</td>
                    </tr>';
                  }
                ?>
                 
              
               </tbody>
             </table>
           </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!--我的文章end -->
          <!--我的收藏-->
          <div class="col-md-12 col0">

              <div class="cardshap exception user_more">
                <a href="mycollect.php" class="btn btnOver btn-sm phone_hidden">More</a>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item news_tab w-30">
                  <a class="nav-link active  pl-30 py-2" id="box-tab"  href="mycollect.php" tab-target="#box" aria-selected="true">
                  我的收藏</a>
                  <a class="top_link d-md-none d-sm-block" href="mycollect.php"></a>
                </li>
              </ul>
          <div class="" id="myTabContent">
          <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">
            <div class="">
             <table class="table table-striped table-bordered text-center">
               <thead>
                 <tr>
                   <th scope="col">來源</th>
                   <th scope="col">主題名稱</th>
                   <th scope="col">收藏時間</th>
                 </tr>
               </thead>
               <tbody>

                <?php 
                 $row_f=$pdo->select("SELECT n.mt_id, n.ns_nt_pk, n.area_id, note.note_type, cc.cc_group_id,
                                             aa.at_name, mf.mf_msg_pk, mf.mf_msg_title, mf.mf_create_time, mf.mf_pk
                                      FROM my_favorite as mf 
                                      LEFT JOIN NewsAndType as n ON n.Tb_index=mf.mf_msg_pk
                                      LEFT JOIN appNotice as note ON note.Tb_index=mf.mf_msg_pk
                                      LEFT JOIN credit_card as cc ON cc.Tb_index=mf.mf_msg_pk
                                      LEFT JOIN appArea as aa ON aa.Tb_index=n.area_id
                                      WHERE mf.mf_ud_pk=:mf_ud_pk 
                                      ORDER BY mf.mf_create_time DESC
                                      LIMIT 0,5", 
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
                     <td>'.$type_name.'</td>
                     <td><a href="'.$url.'">'.$row_f_one['mf_msg_title'].'</a></td>
                     <td>'.$row_f_one['mf_create_time'].'</td>
                   </tr>';
                 }
                ?>
                 
               </tbody>
             </table>
           </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!--我的收藏end -->
          </div>
      </div>
      <!-- 我的信用卡... END -->

    </div>
    <!--特別議題end -->
    </div>
  </div>


</div>