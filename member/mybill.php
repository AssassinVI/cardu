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



    <title>卡優新聞網-會員中心 > 我的帳單</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 我的帳單" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 我的帳單" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a>/ <a href="javascript:;">我的帳單</a></p>
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
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab"  tab-target="#goodMember" aria-selected="true">我的帳單</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                          
                              <div class="px-md-2 member_info">
                                 
                                 <p class="text-right m-0">今天日期：<?php echo date('Y-m-d');?></p>
                                 
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">發卡組織</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">繳款截止日</th>
                                       <th scope="col">帳單登錄</th>
                                       <th scope="col">帳單列表</th>
                                     </tr>
                                   </thead>
                                   <tbody>

                                     <?php 
                                      $row_my_billing=$pdo->select("SELECT mb.mb_pk, mbd.mbd_amount, mbd.mbd_expdate,
                                                                           ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname
                                                                    FROM my_billing as mb
                                                                    INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                                                    LEFT JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                                                    WHERE mb.mb_ud_pk=:mb_ud_pk AND YEAR(mbd_expdate)=:mbd_expdate_Y AND MONTH(mbd_expdate)=:mbd_expdate_M
                                                                    ORDER BY mbd.mbd_pk, mbd.mbd_pay_tag, mbd.mbd_expdate ASC, mb.mb_pk DESC",
                                                                   ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mbd_expdate_Y'=>date('Y'), 'mbd_expdate_M'=>date('m')]);
                                      foreach ($row_my_billing as $my_billing) {
                                        
                                        echo '
                                        <tr>
                                          <td>'.$my_billing['bi_shortname'].'</td>
                                          <td>'.$my_billing['org_nickname'].'</td>
                                          <td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$my_billing['mb_pk'].'" href="javascript:;">'.$my_billing['cc_cardname'].'</a></td>
                                          <td>'.number_format($my_billing['mbd_amount']).'</td>
                                          <td>'.$my_billing['mbd_expdate'].'</td>
                                          <td><a data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='.$my_billing['mb_pk'].'" href="javascript:;"><img src="../img/component/file.png"></a></td>
                                          <td><a href="mybill_history.php?mb_pk='.$my_billing['mb_pk'].'">明細</a></td>
                                        </tr>';
                                      }
                                     ?>
                                    
                                   </tbody>
                                 </table>

                                 <hr class="my-md-5">
                                 

                                 <div class="form-row member_more">
                                    <label class="col-sm-2 col-form-label form-group m-0">*繳款期間</label>
                                     <div class="col-sm-8">
                                       <div class="form-check form-check-inline">
                                        <input type="text" class="form-control datepicker_range from" value="<?php echo date('Y-m').'-01';?>">～
                                        <input type="text" class="form-control datepicker_range to" value="<?php echo date("Y-m", strtotime('+1 month')).'-01';?>">
                                        <button id="ch_expdate_btn" type="button" class="btn gray-layered btnOver ml-2">查詢</button>
                                       </div>
                                     </div>
                                   </div>                                 
                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <b>未繳款帳單</b>
                                   </div>
                                 </div>
                                 
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">發卡組織</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">帳單年月</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">繳款截止日</th>
                                       <th scope="col">修改帳單</th>
                                       
                                     </tr>
                                   </thead>
                                   <tbody class="from_tbody">
                                    <?php 
                                     $row_my_billing=$pdo->select("SELECT mb.mb_pk, mbd.mbd_amount, mbd.mbd_expdate, mbd.mbd_bill_yy, mbd.mbd_bill_mm,
                                                                          ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname
                                                                   FROM my_billing as mb
                                                                   INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                                                   INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                                                   WHERE mb.mb_ud_pk=:mb_ud_pk AND mbd.mbd_expdate>=:mbd_expdate_from AND mbd.mbd_expdate<=:mbd_expdate_to AND mbd.mbd_pay_tag=0
                                                                   ORDER BY mbd.mbd_expdate ASC, mb.mb_pk DESC",
                                                                  ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mbd_expdate_from'=>date('Y-m').'-01', 'mbd_expdate_to'=>date("Y-m", strtotime('+1 month')).'-01']);
                                     $mbd_amount=0;
                                     foreach ($row_my_billing as $my_billing) {
                                       $mbd_amount+=(int)$my_billing['mbd_amount'];
                                       echo '  
                                       <tr>
                                         <td>'.$my_billing['bi_shortname'].'</td>
                                         <td>'.$my_billing['org_nickname'].'</td>
                                         <td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$my_billing['mb_pk'].'" href="javascript:;">'.$my_billing['cc_cardname'].'</a></td>
                                         <td>'.$my_billing['mbd_bill_yy'].'-'.$my_billing['mbd_bill_mm'].'</td>
                                         <td>'.number_format($my_billing['mbd_amount']).'</td>
                                         <td>'.$my_billing['mbd_expdate'].'</td>
                                         <td><a data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='.$my_billing['mb_pk'].'&yy='.$my_billing['mbd_bill_yy'].'&mm='.$my_billing['mbd_bill_mm'].'" href="javascript:;"><img src="../img/component/bill.png"></a></td>
                                       </tr>';
                                     }

                                    ?>
                                     <tr class="text-right">
                                       <td colspan="7" class="px-2">未繳款金額：<?php echo $mbd_amount;?>元</td>
                                     </tr>
                                   </tbody>
                                 </table>

                                
                                 
                                 <div class="col-md-12 col0">
                                   <div class="user_more">
                                   <b>已繳款帳單</b>
                                   </div>
                                 </div>
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th scope="col">發卡組織</th>
                                       <th scope="col">信用卡名稱</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">已繳金額</th>
                                       <th scope="col">繳款日</th>
                                       <th scope="col">繳款方式</th>
                                       <th scope="col">修改帳單</th>
                                     </tr>
                                   </thead>
                                   <tbody class="to_tbody">
                                    <?php 
                                     $row_my_billing=$pdo->select("SELECT mb.mb_pk,
                                                                          mbd.mbd_amount, mbd.mbd_expdate, mbd.mbd_bill_yy, mbd.mbd_bill_mm, 
                                                                          mbd.mbd_amount_paid, mbd.mbd_pay_type, mbd.mbd_pay_date,
                                                                          ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname
                                                                   FROM my_billing as mb
                                                                   INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                                                   INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                                                   WHERE mb.mb_ud_pk=:mb_ud_pk AND mbd.mbd_expdate>=:mbd_expdate_from AND mbd.mbd_expdate<=:mbd_expdate_to AND mbd.mbd_pay_tag=1
                                                                   ORDER BY mbd.mbd_expdate ASC, mb.mb_pk DESC",
                                                                  ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mbd_expdate_from'=>date('Y-m').'-01', 'mbd_expdate_to'=>date("Y-m", strtotime('+1 month')).'-01']);
                                     $mbd_amount_paid=0;
                                     foreach ($row_my_billing as $my_billing) {
                                       $mbd_amount_paid+=(int)$my_billing['mbd_amount_paid'];
                                       $mbd_pay_type=['', '金融機構臨櫃繳款', '超商/代收處繳款', '金融機構自動轉帳', 'ATM/網路銀行轉帳', '全國繳費網繳款'];
                                       echo '  
                                       <tr>
                                         <td>'.$my_billing['bi_shortname'].'</td>
                                         <td>'.$my_billing['org_nickname'].'</td>
                                         <td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$my_billing['mb_pk'].'" href="javascript:;">'.$my_billing['cc_cardname'].'</a></td>
                                         <td>'.number_format($my_billing['mbd_amount']).'</td>
                                         <td>'.number_format($my_billing['mbd_amount_paid']).'</td>
                                         <td>'.$my_billing['mbd_pay_date'].'</td>
                                         <td>'.$mbd_pay_type[$my_billing['mbd_pay_type']].'</td>
                                         <td><a data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='.$my_billing['mb_pk'].'&yy='.$my_billing['mbd_bill_yy'].'&mm='.$my_billing['mbd_bill_mm'].'" href="javascript:;"><img src="../img/component/bill.png"></a></td>
                                       </tr>';
                                     }

                                    ?>
                                     
                                     <tr class="text-right">
                                       <td colspan="8" class="px-2">已繳款金額：<?php echo $mbd_amount_paid;?>元</td>
                                     </tr>
                                   </tbody>
                                 </table>

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
       $('#ch_expdate_btn').click(function(event) {
         $.ajax({
           url: '../ajax/member_ajax.php',
           type: 'POST',
           dataType: 'json',
           data: {
            type: 'ch_expdate',
            from:$('.datepicker_range.from').val(),
            to:$('.datepicker_range.to').val()
           },
           success:function (data) {

            $('.from_tbody').html('');
            $('.to_tbody').html('');
            var mbd_amount=0, mbd_amount_paid=0;

            //-- 未繳款 --
            for (var i = 0; i < data['from'].length; i++) {
              mbd_amount+=parseInt(data['from'][i]['mbd_amount']);
              var txt_from='<tr>'+
                              '<td>'+data['from'][i]['bi_shortname']+'</td>'+
                              '<td>'+data['from'][i]['org_nickname']+'</td>'+
                              '<td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'+data['from'][i]['mb_pk']+'" href="javascript:;">'+data['from'][i]['cc_cardname']+'</a></td>'+
                              '<td>'+data['from'][i]['mbd_bill_yy']+'-'+data['from'][i]['mbd_bill_mm']+'</td>'+
                              '<td>'+accounting.formatMoney(data['from'][i]['mbd_amount'],'',0)+'</td>'+
                              '<td>'+data['from'][i]['mbd_expdate']+'</td>'+
                              '<td><a data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='+data['from'][i]['mb_pk']+'&yy='+data['from'][i]['mbd_bill_yy']+'&mm='+data['from'][i]['mbd_bill_mm']+'" href="javascript:;"><img src="../img/component/bill.png"></a></td>'+
                            '</tr>';
              $('.from_tbody').append(txt_from);
            } 

            $('.from_tbody').append('<tr class="text-right">'+
                                       '<td colspan="7" class="px-2">未繳款金額：'+mbd_amount+'元</td>'+
                                    '</tr>');

            //-- 已繳款 --
            var mbd_pay_type=['', '金融機構臨櫃繳款', '超商/代收處繳款', '金融機構自動轉帳', 'ATM/網路銀行轉帳', '全國繳費網繳款'];
            for (var i = 0; i < data['to'].length; i++) {
              mbd_amount_paid+=parseInt(data['to'][i]['mbd_amount_paid']);
              var txt_to='<tr>'+
                             '<td>'+data['to'][i]['bi_shortname']+'</td>'+
                             '<td>'+data['to'][i]['org_nickname']+'</td>'+
                             '<td><a data-fancybox data-type="iframe" data-src="mycard_iframe.php?'+data['to'][i]['mb_pk']+'" href="javascript:;">'+data['to'][i]['cc_cardname']+'</a></td>'+
                             '<td>'+accounting.formatMoney(data['to'][i]['mbd_amount'],'',0)+'</td>'+
                             '<td>'+accounting.formatMoney(data['to'][i]['mbd_amount_paid'],'',0)+'</td>'+
                             '<td>'+data['to'][i]['mbd_pay_date']+'</td>'+
                             '<td>'+mbd_pay_type[data['to'][i]['mbd_pay_type']]+'</td>'+
                             '<td><a data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='+data['to'][i]['mb_pk']+'&yy='+data['to'][i]['mbd_bill_yy']+'&mm='+data['to'][i]['mbd_bill_mm']+'" href="javascript:;"><img src="../img/component/bill.png"></a></td>'+
                        '</tr>';
              $('.to_tbody').append(txt_to);
            }

            $('.to_tbody').append('<tr class="text-right">'+
                                       '<td colspan="8" class="px-2">已繳款金額：：'+mbd_amount_paid+'元</td>'+
                                    '</tr>');
           },
           error: function (xhr) {
             alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
           }
         });
         
       });
     });
   </script>

  </body>
</html>