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



    <title>卡優新聞網-會員中心 > 我的信用卡</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 我的信用卡" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 我的信用卡" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="$FB_URL" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="javascript:;">我的信用卡</a></p>
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
                          <li class="nav-item news_tab ">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">我的信用卡</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                              <div class="member_info">
                                 
                                 <div class="user_more">
                                  <button type="button" class="btn gray-layered btnOver py-1 mt-1"><a id="add_card_btn" data-fancybox data-type="iframe" data-src="mycard_iframe.php" href="javascript:;">新增信用卡</a></button>
                                 </div>

                                 <!-- fancybox -->
                                 <!-- 新增信用卡 -->
                              <div id="add_card">
                                  <!-- 關閉按鈕 -->
                                  <button class="btn btn-danger btn-sm close_fancybox">Ｘ</button>

                                   <div class="mem_logo">
                                    <img src="../img/component/logo_ph.png" alt="">
                                   </div>
                                   <h1 class="mycard_title">新增信用卡設定</h1>

                                <form id="add_myccard_form" class="px-md-2 check_in" action="" method="POST">
                                <div class="login_line">

                                 <div id="stop_card_div" class="row" style="display: none;">
                                   <label class="col-sm-3 col-form-label py-1 py-md-2">*使用狀態</label>
                                   <div class="col-sm-9 form-inline date_w">
                                     <label><input type="radio" name="mb_stop_card" value="0" checked>使用中</label>｜
                                     <label><input type="radio" name="mb_stop_card" value="1">已剪卡</label>
                                     <input type="text" class="datepicker" name="mb_cardcut_date" style="display: none;">｜
                                     <label><input type="radio" name="mb_stop_card" value="2">刪除</label>

                                   </div>
                                 </div>

                                 <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">＊發卡單位</label>
                                     <div class="col-sm-9 form-inline">
                                       <select id="sel_bank" name="mb_bill_bi_pk" class="form-control" >
                                        <option value="">-- 請選擇信用卡 --</option>
                                        <?php 
                                          $row_bank=$pdo->select("SELECT bi_code, bi_shortname, Tb_index FROM bank_info WHERE OnLineOrNot=1 ORDER BY bi_code ASC");
                                          foreach ($row_bank as $bank_one) {
                                            echo '<option value="'.$bank_one['Tb_index'].'">['.$bank_one['bi_code'].']'.$bank_one['bi_shortname'].'</option>';
                                          }
                                        ?>

                                       </select>
                                     </div>
                                   </div>

                                    <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">*信用卡</label>
                                     <div class="col-sm-9 form-inline">
                                       <select class="form-control w-100" name="mb_bill_cc_pk" id="sel_ccard">
                                         <option value="">-- 請選擇信用卡 --</option>
                                       </select>
                                     </div>
                                   </div>
                                   <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">結帳日</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       每月 
                                       <select class="form-control mx-1" name="mb_checkout_day">
                                        <?php 
                                         for ($i=0; $i <=31 ; $i++) { 
                                           echo ' <option value="'.$i.'">'.$i.'</option>';
                                         }
                                        ?>
                                       </select>
                                        日
                                     </div>
                                   </div>
                                   <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">*繳款截止日</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       每月
                                       <select class="form-control mx-1" name="mb_pay_day">
                                        <?php 
                                         for ($i=1; $i <=31 ; $i++) { 
                                           echo ' <option value="'.$i.'">'.$i.'</option>';
                                         }
                                        ?>
                                       </select>
                                       日
                                     </div>
                                   </div>
                                   <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">*提醒設定</label>
                                     <div class="col-sm-9 form-inline date_w">
                                       繳款截止日前
                                       <select class="form-control mx-1" name="mb_remind">
                                        <?php 
                                         for ($i=0; $i <=31 ; $i++) { 
                                           $selected_txt=$i==3 ? 'selected':'';
                                           echo ' <option '.$selected_txt.' value="'.$i.'">'.$i.'</option>';
                                         }
                                        ?>
                                       </select>
                                       日(設定為0系統將不提醒)
                                     </div>
                                   </div>
                                   <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">年費門檻</label>
                                     <div class="col-sm-9 py-md-2 date_w" style="line-height: 2;">

                                         <textarea id="cc_eq_content" class="form-control" readonly rows="5"></textarea>
                                     </div>
                                   </div>
                                   <div class="row">
                                     <label class="col-sm-3 col-form-label py-1 py-md-2">信用卡預覽</label>
                                     <div class="col-sm-9 py-md-2">
                                      <img style="height: 120px;" class="cc_img" src="../sys/img/CardSample.png">
                                      <div>
                                        <span id="card_info"  style="display: none;"><a href="#" target="_blank" class="this_ccard_link gray-layered btnOver px-2 py-1">查詢該卡資料</a></span>
                                      </div>
                                     </div>
                                   </div>

                                 <div class="col-md-12 col  member_btn hv-center">
                                   <button id="submit_btn" class="gray-layered btnOver" type="button">確認新增</button>
                                   <button class="gray-layered btnOver close_box" type="button">放棄</button>
                                </div>
                                 
                                 <!-- 判斷新增或修改 -->
                                 <input type="hidden" name="type" value="insert">
                                 <!-- 信用卡資料 -->
                                 <input type="hidden" name="mb_pk" value="">
                                 <input type="hidden" name="mb_bill_co_pk" value="">
                                 <input type="hidden" name="mb_bill_group_id" value="">
                                 <input type="hidden" name="mb_bill_name" value="">

                                </div>
                              </form> 
                             </div>
                             <!-- fancybox END -->


                                 
                                 <div class="mycard_info">
                                 <table class="table table-striped table-bordered text-center">
                                   <thead>
                                     <tr>
                                       <th scope="col">發卡單位</th>
                                       <th class="phone_hidden" scope="col">發卡組織</th>
                                       <th scope="col" style="max-width: 180px;">信用卡名稱</th>
                                       <th class="phone_hidden" scope="col">卡等</th>
                                       <th scope="col">結帳日</th>
                                       <th scope="col">繳款日</th>
                                       <th scope="col">修改設定</th>
                                       <th scope="col">帳單設定</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                    <?php 
                                     $row_mycard=$pdo->select("SELECT mb.mb_pk, mb.mb_bill_bi_pk, mb.mb_bill_cc_pk, mb.mb_checkout_day, mb.mb_pay_day, 
                                                                      ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name
                                                               FROM my_billing as mb
                                                               INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                                               WHERE mb.mb_ud_pk=:mb_ud_pk AND mb.mb_stop_card=0 AND mb.mb_disable=0 AND mb.mb_del_flag='N'
                                                               ORDER BY mb.mb_crtime DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);

                                     foreach ($row_mycard as $mycard_one) {
                                       
                                       $mb_checkout_day=empty($mycard_one['mb_checkout_day']) ? '':'每月'.$mycard_one['mb_checkout_day'].'日';
                                       echo '<tr>
                                               <td scope="row">'.$mycard_one['bi_shortname'].'</td>
                                               <td class="phone_hidden">'.$mycard_one['org_nickname'].'</td>
                                               <td class="text-left">
                                                 '.$mycard_one['cc_cardname'].'
                                               </td>
                                               <td class="phone_hidden">'.$mycard_one['attr_name'].'</td>
                                               <td>'.$mb_checkout_day.'</td>
                                               <td>每月'.$mycard_one['mb_pay_day'].'日</td>
                                               <td>
                                                 <a class="edit_mycard" data-fancybox data-type="iframe" data-src="mycard_iframe.php?'.$mycard_one['mb_pk'].'" href="javascript:;">
                                                  <img src="../img/component/repair.png">
                                                 </a>
                                               </td>
                                               <td>
                                                <a class="in_billing" data-fancybox data-type="iframe" data-src="add_mybill.php?mb_pk='.$mycard_one['mb_pk'].'" href="javascript:;"  mb_pk="'.$mycard_one['mb_pk'].'">
                                                 <img src="../img/component/file.png">
                                                </a>
                                               </td>
                                            </tr>';
                                     }
                                    ?>

                                   </tbody>
                                 </table>
                                 </div>
                                 <div class="p-2 border">
                                   已剪卡的信用卡 <button type="button" class="btn btn-sm show_cut_card">展開</button>
                                 </div>
                                 <div class="mycard_info ">
                                    <table class="table table-striped table-bordered text-center">
                                      <tbody class="cut_card_tb" style="display: none;">
                                        <tr>
                                          <th>發卡單位</th>
                                          <th class="phone_hidden">發卡組織</th>
                                          <th style="max-width: 180px;">信用卡名稱</th>
                                          <th class="phone_hidden">卡等</th>
                                          <th>剪卡日</th>
                                          <th>帳單列表</th>
                                        </tr>

                                        <?php 
                                         $row_cut_ccard=$pdo->select("SELECT mb.mb_pk, mb.mb_bill_bi_pk, mb.mb_bill_cc_pk, mb.mb_checkout_day, mb.mb_pay_day, mb.mb_cardcut_date, 
                                                                      ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name
                                                                      FROM my_billing as mb
                                                                      INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                                                      WHERE mb.mb_ud_pk=:mb_ud_pk AND mb.mb_stop_card=1 AND mb.mb_disable=0 AND mb.mb_del_flag='N'
                                                                      ORDER BY mb.mb_cardcut_date DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);

                                         foreach ($row_cut_ccard as $cut_ccard_one) {
                                           
                                           echo '<tr>
                                                  <td>'.$cut_ccard_one['bi_shortname'].'</td>
                                                  <td class="phone_hidden">'.$cut_ccard_one['org_nickname'].'</td>
                                                  <td class="text-left">'.$cut_ccard_one['cc_cardname'].'</td>
                                                  <td class="phone_hidden">'.$cut_ccard_one['attr_name'].'</td>
                                                  <td>'.$cut_ccard_one['mb_cardcut_date'].'</td>
                                                  <td><a href="mybill_history.php?mb_pk='.$cut_ccard_one['mb_pk'].'">明細</a></td>
                                                 </tr>';
                                         }
                                        ?>

                                        

                                      </tbody>
                                    </table>
                                     
                                   </div>


                                


                             <?php 
                              /*--- 我的信用卡關聯 ----*/
                              $row_mycard=$pdo->select("SELECT mb_bill_bi_pk 
                                                        FROM my_billing 
                                                        WHERE mb_ud_pk=:mb_ud_pk AND mb_stop_card=0",
                                                        ['mb_ud_pk'=>$_SESSION['ud_pk']]);
                              $bank_id=[];
                              foreach ($row_mycard as $mycard) {
                                array_push($bank_id, $mycard['mb_bill_bi_pk']);
                              } 
                               
                              $bank_sql="";
                              $c_bank_sql="";
                              $bank_id_arr="";
                              foreach ($bank_id as $bank_id_one) {
                                $bank_sql.=" FIND_IN_SET('".$bank_id_one."', ns_bank) OR ";
                                $c_bank_sql.=" FIND_IN_SET('".$bank_id_one."', abc.bank_id) OR ";
                                $bank_id_arr.=$bank_id_one.',';
                              }
                              $bank_sql=empty($bank_sql) ? '': substr($bank_sql, 0, -3);
                              $c_bank_sql=empty($c_bank_sql) ? '': substr($c_bank_sql, 0, -3);
                              $bank_id_arr=empty($bank_id_arr) ? '': substr($bank_id_arr, 0, -1);

                              $more_btn_dis=count($row_mycard)<1 ? 'd-none': '' ;
                              /*--- 我的信用卡關聯 END ----*/
                             ?>


                             <!--我的信用卡－新聞-->
                             <div class="col-md-12 col0">
                                <div class="cardshap exception">
                                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                   <li class="nav-item news_tab news_tab_three wx-100-ph">
                                     <a class="nav-link active  pl-30 py-2">
                                     我的信用卡－新聞</a>
                                   </li>
                                 </ul>
                                 <a href="search_result.php?area_id=&bank_id=<?php echo $bank_id_arr;?>" class="btn btn-sm mycard_more_btn <?php echo $more_btn_dis;?>">More</a>
                             <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">
                              <div class="row no-gutters w-100">
                             <?php

                              //-- 新聞 --
                              if (count($row_mycard)>0) {
                                $row_news=$pdo->select("SELECT mt_id, Tb_index, ns_nt_pk, area_id, ns_photo_1, ns_ftitle 
                                                        FROM NewsAndType 
                                                        WHERE ($bank_sql) AND area_id='' AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                        ORDER BY ns_vfdate DESC LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                foreach ($row_news as $news_one) {
                                  $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                  $ns_ftitle=mb_substr($news_one['ns_ftitle'], 0,15,'utf-8');

                                  if (wp_is_mobile()) {
                                    echo '   
                                    <div class="col-md-4 cards-3 text-center col-12">
                                      <div class="row no-gutters py-2">
                                        <div class="col-6">
                                          <a target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                            <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                            </div>
                                          </a>
                                        </div>
                                        <div class="col-6 news_list_txt">
                                          <a class="text-left" target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                            <h3>'.$ns_ftitle.'</h3>
                                          </a>
                                        </div>
                                      </div>
                                    </div>';
                                  }
                                  else{
                                    echo '   
                                     <div class="col-md-4 cards-3 text-center col-6">
                                       <a target="_blank" href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                        <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                            
                                        </div>
                                        <span>'.$ns_ftitle.'</span>
                                       </a>
                                     </div>';
                                  }
                                }
                              }
                              
                             ?>
                             
                              
                            </div>
                                    
                                   </div>
                                 </div>
                               </div>
                             </div>
                             <!--我的信用卡－新聞end -->
                              <!--我的信用卡－卡情報-->
                              <div class="col-md-12 col0">

                                  <div class="cardshap exception">
                                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item news_tab news_tab_three wx-100-ph">
                                      <a class="nav-link active  pl-30 py-2">
                                      我的信用卡－卡情報</a>
                                    </li>
                                  </ul>
                                  <a href="search_result.php?area_id=at2019021114154632&bank_id=<?php echo $bank_id_arr;?>" class="btn btn-sm mycard_more_btn <?php echo $more_btn_dis;?>">More</a>
                              <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                              <div class="row no-gutters w-100">
                                <?php 
                                  //-- 卡情報 --
                                  if (count($row_mycard)>0) {
                                    $row_news=$pdo->select("SELECT n.mt_id, n.Tb_index, n.ns_nt_pk, n.area_id, n.ns_photo_1, n.ns_ftitle 
                                                            FROM NewsAndType as n
                                                            INNER JOIN appNews_bank_card as abc ON abc.news_id=n.Tb_index
                                                            WHERE ($c_bank_sql) AND n.area_id='at2019021114154632' AND n.ns_verify=3 AND 
                                                                  n.OnLineOrNot=1 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                                            GROUP BY n.Tb_index
                                                            ORDER BY n.ns_vfdate DESC LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                    foreach ($row_news as $news_one) {
                                      $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                      $ns_ftitle=mb_substr($news_one['ns_ftitle'], 0,15,'utf-8');
                                      
                                      if (wp_is_mobile()) {
                                        echo '   
                                        <div class="col-md-4 cards-3 text-center col-12">
                                          <div class="row no-gutters py-2">
                                            <div class="col-6">
                                              <a target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                                <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                                </div>
                                              </a>
                                            </div>
                                            <div class="col-6 news_list_txt">
                                              <a class="text-left" target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                                <h3>'.$ns_ftitle.'</h3>
                                              </a>
                                            </div>
                                          </div>
                                        </div>';
                                      }
                                      else{
                                        echo '   
                                         <div class="col-md-4 cards-3 text-center col-6">
                                           <a target="_blank" href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                            <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                                
                                            </div>
                                            <span>'.$ns_ftitle.'</span>
                                           </a>
                                         </div>';
                                      }
                                    }
                                  }
                                  
                                ?>
                               </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--我的信用卡－卡情報end -->
                               <!--我的信用卡－優行動Pay-->
                               <div class="col-md-12 col0">

                                   <div class="cardshap exception">
                                   <ul class="nav nav-tabs" id="myTab" role="tablist">
                                     <li class="nav-item news_tab news_tab_three wx-100-ph">
                                       <a class="nav-link active  pl-30 py-2">
                                       我的信用卡－優行動Pay</a>
                                     </li>
                                   </ul>
                                   <a href="search_result.php?area_id=at2019011117341414&bank_id=<?php echo $bank_id_arr;?>" class="btn btn-sm mycard_more_btn <?php echo $more_btn_dis;?>">More</a>
                               <div class="tab-content" id="myTabContent">
                               <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                               <div class="row no-gutters w-100">

                                <?php
                                if (count($row_mycard)>0){
                                  //-- 優行動Pay --
                                  $row_news=$pdo->select("SELECT mt_id, Tb_index, ns_nt_pk, area_id, ns_photo_1, ns_ftitle 
                                                          FROM NewsAndType 
                                                          WHERE ($bank_sql) AND area_id='at2019011117341414' AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                          ORDER BY ns_vfdate DESC LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                  foreach ($row_news as $news_one) {
                                    $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                    $ns_ftitle=mb_substr($news_one['ns_ftitle'], 0,15,'utf-8');
                                    
                                    if (wp_is_mobile()) {
                                      echo '   
                                      <div class="col-md-4 cards-3 text-center col-12">
                                        <div class="row no-gutters py-2">
                                          <div class="col-6">
                                            <a target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                              <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                              </div>
                                            </a>
                                          </div>
                                          <div class="col-6 news_list_txt">
                                            <a class="text-left" target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                              <h3>'.$ns_ftitle.'</h3>
                                            </a>
                                          </div>
                                        </div>
                                      </div>';
                                    }
                                    else{
                                      echo '   
                                       <div class="col-md-4 cards-3 text-center col-6">
                                         <a target="_blank" href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                          <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                              
                                          </div>
                                          <span>'.$ns_ftitle.'</span>
                                         </a>
                                       </div>';
                                    }
                                  }
                                }
                                 
                                ?>
                              </div>
                                      
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               <!--我的信用卡－優行動Payend -->
                                <!--我的信用卡－優票證-->
                                <div class="col-md-12 col0">

                                    <div class="cardshap exception">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item news_tab news_tab_three wx-100-ph">
                                        <a class="nav-link active  pl-30 py-2">
                                        我的信用卡－優票證</a>
                                      </li>
                                    </ul>
                                    <a href="search_result.php?area_id=at2019011117435970&bank_id=<?php echo $bank_id_arr;?>" class="btn btn-sm mycard_more_btn <?php echo $more_btn_dis;?>">More</a>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                <div class="row no-gutters w-100">

                                  <?php
                                  if (count($row_mycard)>0){
                                    //-- 優票證 --
                                    $row_news=$pdo->select("SELECT mt_id, Tb_index, ns_nt_pk, area_id, ns_photo_1, ns_ftitle 
                                                            FROM NewsAndType 
                                                            WHERE ($bank_sql) AND area_id='at2019011117435970' AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                            ORDER BY ns_vfdate DESC LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                    foreach ($row_news as $news_one) {
                                      $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                      $ns_ftitle=mb_substr($news_one['ns_ftitle'], 0,15,'utf-8');
                                      
                                      if (wp_is_mobile()) {
                                        echo '   
                                        <div class="col-md-4 cards-3 text-center col-12">
                                          <div class="row no-gutters py-2">
                                            <div class="col-6">
                                              <a target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                                <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                                </div>
                                              </a>
                                            </div>
                                            <div class="col-6 news_list_txt">
                                              <a class="text-left" target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                                <h3>'.$ns_ftitle.'</h3>
                                              </a>
                                            </div>
                                          </div>
                                        </div>';
                                      }
                                      else{
                                        echo '   
                                         <div class="col-md-4 cards-3 text-center col-6">
                                           <a target="_blank" href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                            <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                                
                                            </div>
                                            <span>'.$ns_ftitle.'</span>
                                           </a>
                                         </div>';
                                      }
                                    }
                                  }
                                   
                                  ?>
                                 
                               </div>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--我的信用卡－優票證end -->
                                 <!--我的信用卡－優集點-->
                                 <div class="col-md-12 col0">

                                     <div class="cardshap exception">
                                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                                       <li class="nav-item news_tab news_tab_three wx-100-ph">
                                         <a class="nav-link active  pl-30 py-2">
                                         我的信用卡－優集點</a>
                                       </li>
                                     </ul>
                                     <a href="search_result.php?area_id=at2019011117443626&bank_id=<?php echo $bank_id_arr;?>" class="btn btn-sm mycard_more_btn <?php echo $more_btn_dis;?>">More</a>
                                 <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="box" role="tabpanel" aria-labelledby="box-tab">

                                 <div class="row no-gutters w-100">
                                  <?php
                                   if (count($row_mycard)>0){
                                     //-- 優集點 --
                                     $row_news=$pdo->select("SELECT mt_id, Tb_index, ns_nt_pk, area_id, ns_photo_1, ns_ftitle 
                                                             FROM NewsAndType 
                                                             WHERE ($bank_sql) AND area_id='at2019011117443626' AND ns_verify=3 AND OnLineOrNot=1 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                                             ORDER BY ns_vfdate DESC LIMIT 0,3", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                     foreach ($row_news as $news_one) {
                                       $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                       $ns_ftitle=mb_substr($news_one['ns_ftitle'], 0,15,'utf-8');
                                       
                                       if (wp_is_mobile()) {
                                         echo '   
                                         <div class="col-md-4 cards-3 text-center col-12">
                                           <div class="row no-gutters py-2">
                                             <div class="col-6">
                                               <a target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                                 <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                                 </div>
                                               </a>
                                             </div>
                                             <div class="col-6 news_list_txt">
                                               <a class="text-left" target="_blank" title="'.$news_one['ns_ftitle'].'" href="'.$url.'">
                                                 <h3>'.$ns_ftitle.'</h3>
                                               </a>
                                             </div>
                                           </div>
                                         </div>';
                                       }
                                       else{
                                         echo '   
                                          <div class="col-md-4 cards-3 text-center col-6">
                                            <a target="_blank" href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                             <div class="img_div" style="background-image: url(../sys/img/'.$news_one['ns_photo_1'].');">
                                                 
                                             </div>
                                             <span>'.$ns_ftitle.'</span>
                                            </a>
                                          </div>';
                                       }
                                     }
                                   }
                                   
                                  ?>
                                </div>
                                        
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <!--我的信用卡－優集點end -->

                               
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
              if (!wp_is_mobile()) {
                require 'right_area_div.php';
              }
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
        
        //--  關閉視窗 --
        $('.close_box, .close_fancybox').click(function(event) {
           $('#sel_bank').val('');
           $('#sel_ccard').html('<option value="">-- 請選擇信用卡 --</option>');
           document.getElementById("add_myccard_form").reset();
           $('[name="mb_remind"]').val(3);
           $('#card_info').css('display', 'none');
           $('.cc_img').attr('src', '../sys/img/CardSample.png');
           $.fancybox.close();
        });

        //----------------- 選擇銀行 -------------------
        $('#sel_bank').change(function(event) {
          sel_bank($(this).val());
        });
        //----------------- 選擇銀行 END -------------------
        

        //----------------- 選擇信用卡 -------------------

        $('#sel_ccard').change(function(event) {
          sel_ccard($(this).val());
        });

        //----------------- 選擇信用卡 END -------------------


        //----------------- 新增信用卡 -------------------
        $('#add_card_btn').click(function(event) {
          $('[name="type"]').val('insert');
          $('.mycard_title').html('新增信用卡設定');
          $('#submit_btn').html('確定新增');
          $('#stop_card_div').css('display', 'none');
        });
        //----------------- 新增信用卡 END -------------------

        
        //----------------- 確認新增 OR 修改 -------------------

        $('#submit_btn').click(function(event) {

          var err_txt='';
          err_txt = err_txt + check_input( '[name="mb_bill_bi_pk"]', '發卡單位\n' );
          err_txt = err_txt + check_input( '[name="mb_bill_cc_pk"]', '信用卡\n' );
          err_txt = err_txt + check_input( '[name="mb_pay_day"]', '繳款截止日\n' );
          err_txt = err_txt + check_input( '[name="mb_remind"]', '提醒設定\n' );
          if ($('[name="mb_stop_card"]:checked').val()=='1') {
           err_txt = err_txt + check_input( '[name="mb_cardcut_date"]', '剪卡日\n' );
          }
          err_txt = err_txt + check_input( '[name="mb_remind"]', '提醒設定\n' );
          

          if (err_txt!='') {
             alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
          }
          else if($('[name="mb_stop_card"]:checked').val()=='1'){
             if (confirm('您是否確定將本卡設定為已剪卡\n 按「確定」確定 \n 按「取消」取消')) {
               $('#add_myccard_form').submit();
             }
             else{
              $('[name="mb_stop_card"][value="0"]').prop('checked', true);
              $('[name="mb_cardcut_date"]').css('display', 'none');
              $('[name="mb_cardcut_date"]').val('');
             }
          }
          else{
            $('#add_myccard_form').submit();
          }

        });

        //----------------- 確認新增 END -------------------



        //---------------------- 選擇修改設定 ---------------------------
        $('.edit_mycard').click(function(event) {
         
         var _this=$(this);

         $.ajax({
           url: '../ajax/member_ajax.php',
           type: 'POST',
           dataType: 'json',
           data: {
            type: 'sel_mycard',
            mb_pk: $(this).attr('mb_pk')
          },
           success:function (data) {
             
             $('#sel_bank').val(data['mb_bill_bi_pk']);
             edit_ccard(data['mb_bill_bi_pk'], data['mb_bill_cc_pk']);
             $('[name="mb_pk"]').val(data['mb_pk']);
             $('[name="mb_checkout_day"]').val(data['mb_checkout_day']);
             $('[name="mb_pay_day"]').val(data['mb_pay_day']);
             $('[name="mb_remind"]').val(data['mb_remind']);
           }
         });
         
          $('[name="type"]').val('update');
          $('.mycard_title').html('修改信用卡設定');
          $('#submit_btn').html('確定修改');
          $('#stop_card_div').css('display', 'flex');
        });
        //---------------------- 選擇修改設定 END ---------------------------


        //---------------------- 更改使用狀態 ---------------------------
         $('[name="mb_stop_card"]').click(function(event) {
           if ($(this).val()==0) {
             $('[name="mb_cardcut_date"]').css('display', 'none');
             $('[name="mb_cardcut_date"]').val('');
           }
           else if ($(this).val()==1) {
             $('[name="mb_cardcut_date"]').css({
               'display': 'inline',
               'width': '30%'
             });
           }
           else if ($(this).val()==2) {
             if (confirm('注意：您將本卡設為刪除，\n也將一併刪除原有設定與帳單登入資料，\n您是否確定將本卡刪除?\n 按「確定」確定 \n 按「取消」取消')) {
               $('#add_myccard_form').submit();
             }
             else{
               $('[name="mb_stop_card"][value="0"]').prop('checked', true);
               $('[name="mb_cardcut_date"]').css('display', 'none');
               $('[name="mb_cardcut_date"]').val('');
             }
           }
         });
         //---------------------- 更改使用狀態 END ---------------------------


         $('.show_cut_card').click(function(event) {
           $('.cut_card_tb').slideToggle('fast');
         });

      });







      //------------------ 選擇銀行 -----------------------
      function sel_bank(cc_bi_pk) {

        $.ajax({
          url: '../ajax/member_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
            type: 'sel_bank',
            cc_bi_pk: cc_bi_pk
          },
          success:function (data) {

            $('#sel_ccard').html('<option value="">-- 請選擇信用卡 --</option>');

            $.each(data, function(index, val) {
               var ccard_name=this['cc_cardname']+'_'+this['org_nickname']+this['attr_name'];
               $('#sel_ccard').append('<option cc_img="'+this['cc_photo']+'" cc_group="'+this['cc_group_id']+'" value="'+this['Tb_index']+'">'+ccard_name+'</option>');
            });

          }
        });
      }
      //------------------ 選擇銀行 END -----------------------


      //------------------ 選擇信用卡 -----------------------
      function sel_ccard(ccard_id) {
        
        $.ajax({
          url: '../ajax/member_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
            type: 'sel_ccard',
            ccard_id: ccard_id
          },
          success:function (data){
            //console.log(data);

            if ($('#sel_ccard').val()!='') {
              $('#card_info').css('display', 'block');
              var cc_pk=$('#sel_ccard').val();
              var cc_group_id= data['cc_group_id'];
              $('.this_ccard_link').attr('href', '/card/creditcard.php?cc_pk='+cc_pk+'&cc_group_id='+cc_group_id);

              var cc_photo= data['cc_photo']==null ? 'CardSample.png' : data['cc_photo'];
              $('.cc_img').attr('src', '../sys/img/'+cc_photo);

              $('[name="mb_bill_co_pk"]').val(data['cc_cardorg']);
              $('[name="mb_bill_group_id"]').val(data['cc_group_id']);

              $('#cc_eq_content').val(data['content']);

              var bank_name=$('#sel_bank :selected').html().split(']');
              var ccard_name=bank_name[1]+$('#sel_ccard').find(':selected').html();
              $('[name="mb_bill_name"]').val(ccard_name);
            }

          }
        });
      }
      //------------------ 選擇信用卡 END -----------------------


      //------------------ 獲取修改信用卡 -----------------------
      function edit_ccard(cc_bi_pk, ccard_id) {
        
        $.ajax({
          url: '../ajax/member_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
            type: 'sel_bank',
            cc_bi_pk: cc_bi_pk
          },
          success:function (data) {

            $('#sel_ccard').html('<option value="">-- 請選擇信用卡 --</option>');

            $.each(data, function(index, val) {
               var ccard_name=this['cc_cardname']+'_'+this['org_nickname']+this['attr_name'];
               $('#sel_ccard').append('<option cc_img="'+this['cc_photo']+'" cc_group="'+this['cc_group_id']+'" value="'+this['Tb_index']+'">'+ccard_name+'</option>');
            });
            
            $('#sel_ccard').val(ccard_id);
            sel_ccard(ccard_id);
          }
        });
      }
      //------------------ 獲取修改信用卡 END -----------------------
    </script>

  </body>
</html>