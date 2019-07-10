<?php 
 require '../share_area/conn.php';
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="mybill.php">我的帳單</a> / <a href="javascript:;">我的帳單明細</a></p>
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
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab"  tab-target="#goodMember" aria-selected="true">我的帳單明細</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                          
                              <div class="px-md-2 member_info">
                                 
                                 <div class="form-row mb-2">
                                   <div class="col-md-2">
                                     <h5 class="m-0">信用卡：</h5>
                                   </div>
                                   <div class="col-md-8">
                                     <select class="form-control" id="mbd_mb_pk">
                                       <?php 
                                        $row_mycard=$pdo->select("SELECT mb.mb_bill_cc_pk, mb.mb_pk, mb.mb_stop_card, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, mb.mb_pay_day
                                                                  FROM my_billing as mb 
                                                                  INNER JOIN cc_detail as cc ON cc.Tb_index=mb.mb_bill_cc_pk
                                                                  WHERE mb.mb_ud_pk=:mb_ud_pk AND mb.mb_disable=0 AND mb.mb_del_flag='N' 
                                                                  ORDER BY mb.mb_crtime DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);
                                        foreach ($row_mycard as $mycard_one) {
                                          $cc_name=$mycard_one['bi_shortname'].$mycard_one['cc_cardname'].'_'.$mycard_one['org_nickname'].$mycard_one['attr_name'];
                                          $mb_stop_card=$mycard_one['mb_stop_card']==0 ? '':'(已剪卡)';
                                          if ($_GET['mb_pk']==$mycard_one['mb_pk']) {
                                            //-- 每月繳款截止日 --
                                            $mb_pay_day=$mycard_one['mb_pay_day'];
                                            echo '<option selected value="'.$mycard_one['mb_pk'].'">'.$cc_name.$mb_stop_card.'</option>';
                                          }else{
                                            echo '<option  value="'.$mycard_one['mb_pk'].'">'.$cc_name.$mb_stop_card.'</option>';
                                          }
                                          
                                        }
                                       ?> 
                                      </select>
                                   </div>
                                 </div>
                                 <div class="form-row form-inline mb-2">
                                   <div class="col-md-2">
                                     <h5 class="m-0">期間：</h5>
                                   </div>
                                   <div class="col-md-10">
                                     <input type="text" class="form-control datepicker_range from" value="<?php echo date('Y-m').'-01';?>">～
                                     <input type="text" class="form-control datepicker_range to" value="<?php echo date("Y-m", strtotime('+1 month')).'-01';?>">
                                     <button id="ch_expdate_btn" type="button" class="btn gray-layered btnOver ml-2">查詢</button>
                                   </div>
                                 </div>
                                 
                                  <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">帳單年</th>
                                       <th scope="col">帳單月</th>
                                       <th scope="col">應繳金額</th>
                                       <th scope="col">已繳金額</th>
                                       <th scope="col">繳款日</th>
                                       <th scope="col">繳款方式</th>
                                       <th scope="col">查閱/修改帳單</th>
                                     </tr>
                                   </thead>
                                   <tbody class="d_tbody">

                                     <?php 
                                      $row_my_billing=$pdo->select("SELECT mb.mb_pk, mbd.mbd_amount, mbd.mbd_amount_paid, mbd.mbd_expdate, mbd.mbd_pay_type, mbd.mbd_bill_yy, mbd.mbd_bill_mm,
                                                                           mbd.mbd_pay_date
                                                                    FROM my_billing as mb
                                                                    INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                                                    WHERE mb.mb_ud_pk=:mb_ud_pk AND mb.mb_pk=:mb_pk AND mbd.mbd_expdate>=:mbd_expdate_from AND mbd.mbd_expdate<=:mbd_expdate_to
                                                                    ORDER BY mbd.mbd_expdate ASC",
                                                                   ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mb_pk'=>$_GET['mb_pk'], 'mbd_expdate_from'=>date('Y-m').'-01', 'mbd_expdate_to'=>date("Y-m", strtotime('+1 month')).'-01']);

                                      $mbd_amount_paid=0;
                                      foreach ($row_my_billing as $my_billing) {
                                        $mbd_amount_paid+=(int)$my_billing['mbd_amount_paid'];
                                        $mbd_pay_type=['', '金融機構臨櫃繳款', '超商/代收處繳款', '金融機構自動轉帳', 'ATM/網路銀行轉帳', '全國繳費網繳款'];
                                        $mbd_pay_date=$my_billing['mbd_pay_date']=='0000-00-00' ? '' : $my_billing['mbd_pay_date'];
                                        echo '
                                        <tr>
                                          <td>'.$my_billing['mbd_bill_yy'].'</td>
                                          <td>'.$my_billing['mbd_bill_mm'].'</td>
                                          <td>'.$my_billing['mbd_amount'].'</td>
                                          <td>'.$my_billing['mbd_amount_paid'].'</td>
                                          <td>'.$mbd_pay_date.'</td>
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



                                 <hr class="my-md-5">
                                 
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
         ajax_mybill_history();
       });


       $("[data-fancybox]").fancybox({
          beforeClose: function( instance, slide ) {
            ajax_mybill_history();
          }
        });
     });



     function ajax_mybill_history() {
       
       $.ajax({
         url: '../ajax/member_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
          type: 'ch_mb_pk_expdate',
          mb_pk: $('#mbd_mb_pk').val(),
          from:$('.datepicker_range.from').val(),
          to:$('.datepicker_range.to').val()
         },
         success:function (data) {
          //console.log(data);
          $('.d_tbody').html('');
          var mbd_amount_paid=0;


          //-- 已繳款 --
          var mbd_pay_type=['', '金融機構臨櫃繳款', '超商/代收處繳款', '金融機構自動轉帳', 'ATM/網路銀行轉帳', '全國繳費網繳款'];
          for (var i = 0; i < data.length; i++) {
            mbd_amount_paid+=parseInt(data[i]['mbd_amount_paid']);
            var mbd_pay_date=data[i]['mbd_pay_date']=='0000-00-00' ? '':data[i]['mbd_pay_date'];
            var txt_to='<tr>'+
                           '<td>'+data[i]['mbd_bill_yy']+'</td>'+
                           '<td>'+data[i]['mbd_bill_mm']+'</td>'+
                           '<td>'+data[i]['mbd_amount']+'</td>'+
                           '<td>'+data[i]['mbd_amount_paid']+'</td>'+
                           '<td>'+mbd_pay_date+'</td>'+
                           '<td>'+mbd_pay_type[data[i]['mbd_pay_type']]+'</td>'+
                           '<td><a data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='+data[i]['mb_pk']+'&yy='+data[i]['mbd_bill_yy']+'&mm='+data[i]['mbd_bill_mm']+'" href="javascript:;"><img src="../img/component/bill.png"></a></td>'+
                      '</tr>';
            $('.d_tbody').append(txt_to);
          }

          $('.d_tbody').append('<tr class="text-right">'+
                                     '<td colspan="8" class="px-2">已繳款金額：：'+mbd_amount_paid+'元</td>'+
                                  '</tr>');
         },
         error: function (xhr) {
           alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
         }
       });
     }
   </script>

  </body>
</html>