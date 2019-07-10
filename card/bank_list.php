<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網 - 卡情報 > 銀行總覽</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網 - 卡情報 > 銀行總覽" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網 - 卡情報 > 銀行總覽" />
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
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="javascript:;">銀行總覽</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                      <?php 
                       //-- 判斷是否為手機 --
                       if (wp_is_mobile()){
                       
                       //============================================
                       //每頁的輪播 (手機)
                       //設定好sql後，交由 func.php執行
                       //============================================
                       $sql_carousel="SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                                      FROM appNews as n
                                      INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                                      WHERE n.mt_id='$mt_id' AND n.ns_nt_pk='nt201902121004593' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                                      ORDER BY n.ns_vfdate DESC LIMIT 0,10";

                       slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

                       } 
                       else{

                         //============================================
                         //每頁的輪播 (電腦)
                         //設定好sql後，交由 func.php執行
                         //============================================
                         $sql_carousel="
                          SELECT n.Tb_index, n.ns_nt_pk, n.ns_ftitle, n.ns_msghtml, n.ns_photo_1, n.mt_id, nt.area_id
                          FROM appNews as n
                          INNER JOIN news_type as nt ON nt.Tb_index=n.ns_nt_pk
                          WHERE n.mt_id='$mt_id' AND n.ns_nt_pk='nt201902121004593' AND n.ns_verify=3 AND n.StartDate<=:StartDate AND n.EndDate>=:EndDate
                          ORDER BY n.ns_vfdate DESC LIMIT 0,6
                          ";
                         slide_4s_3b($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                        
                       }
                      ?>
                  
                  </div>

                     <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col ad_news">
                          <div class="row no-gutters">
                            <div class="col-md-6 h-center">
                             <img src="../img/component/ad_sm.png"> 
                            </div>
                           <div class="col-md-6">
                            <div class="best">
                             <img src="../img/component/best.png">
                            </div>
                            <h6>匯豐現金回饋卡</h6>
                            <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                           </div>
                         </div>
                        </div>
                        <div class="col-md-6 col ad_news">
                          <div class="row no-gutters">
                            <div class="col-md-6 h-center">
                             <img src="../img/component/ad_sm.png"> 
                            </div>
                           <div class="col-md-6">
                            <div class="best">
                             <img src="../img/component/best.png">
                            </div>
                            <h6>匯豐現金回饋卡</h6>
                            <p>卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網卡優新聞網</p>
                           </div>
                         </div>
                        </div>
                    </div>  

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                    <div class="col-md-12 col">
                     <div class="primary_tab">
                       <div class="row no-gutter bank_search cardshap py-md-2">
                            <div class="col-md h-center col-4"><b>顯示順序:</b></div>
                            <div class="col-md-5 h-center col-8">
                            <form class="row search_from">
                             <select class="bk_list_order" onchange="location.href = '?order='+this.options[this.selectedIndex].value;">
                             <option value="bi_code">依銀行代碼</option>
                             <option value="bi_shortname">依銀行筆畫</option>
                             <?php 
                               $row_org_list=$pdo->select("SELECT mt_id, org_nickname FROM card_org WHERE OnLineOrNot=1 ORDER BY mt_id ASC, OrderBy ASC");
                               foreach ($row_org_list as $org) {

                                 //-- 信用卡 --
                                 if ($org['mt_id']=='site2018110611172385') {
                                   echo '<option value="cc_'.$org['org_nickname'].'">所有信用卡_'.$org['org_nickname'].'卡片</option>';
                                 }
                                 //-- 金融卡 --
                                 else{
                                   echo '<option value="dc_'.$org['org_nickname'].'">所有金融卡_'.$org['org_nickname'].'卡片</option>';
                                 }
                               }
                             ?>
                             <!-- <option value="cc_visa">所有信用卡VISA卡片</option>
                             <option value="cc_mastercard">所有信用卡mastercard卡片</option>
                             <option value="cc_JCB">所有信用卡JCB卡片</option>
                             <option value="cc_AMEX">所有信用卡AMEX卡片</option> -->
                             </select>
     
                            </form>

                            </div>
                            <div class="col-md h-center col-4"><b>銀行查詢:</b></div>
                            <div class="col-md-3 h-center col-8">
                             <form class="row search_from">
                              <input style=" background-color: #fcf0d8;  border: 1px solid #cc9d4d;" type="text" name="bank_keyword" placeholder="請輸入關鍵字">
                             </form>    
                            </div> 
                          </div> 
                      </div>
                    </div>
                    
                    <div class="row ticketbg w-100">


                      
                    
                    <?php 

                     //-- 依銀行代碼排序 --
                     if (!$_GET || $_GET['order']=='bi_code') {
                       $row_bank_list=$pdo->select("SELECT bk.Tb_index, bk.bi_shortname, bk.bi_code, bk.bi_logo, bk.bi_tel, bk.bi_tel_card, 
                                                           bk.bi_tel2_card, bk.bi_tel3_card, bk.bi_bank_url, bk.bi_card_url,
                                                           org.org_nickname, org.org_image
                                                    FROM bank_info as bk 
                                                    INNER JOIN credit_card as cc ON cc.cc_bi_pk=bk.Tb_index
                                                    INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                    WHERE bk.OnLineOrNot=1 AND org.OnLineOrNot=1 
                                                    GROUP BY bk.Tb_index, org.org_nickname
                                                    ORDER BY bk.bi_code, org.OrderBy");
                     }

                     //-- 依銀行筆畫排序 --
                     elseif($_GET['order']=='bi_shortname'){
                       $row_bank_list=$pdo->select("SELECT bk.Tb_index, bk.bi_shortname, bk.bi_code, bk.bi_logo, bk.bi_tel, bk.bi_tel_card, 
                                                           bk.bi_tel2_card, bk.bi_tel3_card, bk.bi_bank_url, bk.bi_card_url,
                                                           org.org_nickname, org.org_image
                                                    FROM bank_info as bk 
                                                    INNER JOIN credit_card as cc ON cc.cc_bi_pk=bk.Tb_index
                                                    INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                    WHERE bk.OnLineOrNot=1 AND org.OnLineOrNot=1 
                                                    GROUP BY bk.Tb_index, org.org_nickname
                                                    ORDER BY bk.bi_shortname, org.OrderBy");
                     }

                     //-- 銀行關鍵字查詢 --
                     elseif(isset($_GET['bank_keyword'])){

                       $row_bank_list=$pdo->select("SELECT bk.Tb_index, bk.bi_shortname, bk.bi_code, bk.bi_logo, bk.bi_tel, bk.bi_tel_card, 
                                                           bk.bi_tel2_card, bk.bi_tel3_card, bk.bi_bank_url, bk.bi_card_url,
                                                           org.org_nickname, org.org_image
                                                    FROM bank_info as bk 
                                                    INNER JOIN credit_card as cc ON cc.cc_bi_pk=bk.Tb_index
                                                    INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                    WHERE bk.OnLineOrNot=1 AND org.OnLineOrNot=1 AND 
                                                    (bk.bi_shortname LIKE :bi_shortname OR bk.bi_code LIKE :bi_code)
                                                    GROUP BY bk.Tb_index, org.org_nickname
                                                    ORDER BY bk.bi_code, org.OrderBy", ['bi_shortname'=> '%'.$_GET['bank_keyword'].'%', 'bi_code'=> '%'.$_GET['bank_keyword'].'%']);
                     }

                     //-- 所有XX卡XX卡片 --
                     else{
                      $order=explode('_', $_GET['order']);
                      if ($order[0]=='cc') {
                        $inner_tb_query='INNER JOIN credit_card as cc ON cc.cc_bi_pk=bk.Tb_index
                                         INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg';
                      }
                      else{
                       $inner_tb_query='INNER JOIN debit_card as dc ON dc.dc_bi_pk=bk.Tb_index
                                        INNER JOIN card_org as org ON org.Tb_index=dc.dc_debitorg';
                      }
                      

                      $row_bank_list=$pdo->select("SELECT bk.Tb_index, bk.bi_shortname, bk.bi_code, bk.bi_logo, bk.bi_tel, bk.bi_tel_card, 
                                                          bk.bi_tel2_card, bk.bi_tel3_card, bk.bi_bank_url, bk.bi_card_url,
                                                          org.org_nickname, org.org_image
                                                   FROM bank_info as bk 
                                                   $inner_tb_query 
                                                   WHERE bk.OnLineOrNot=1 AND org.OnLineOrNot=1 
                                                   GROUP BY bk.Tb_index, org.org_nickname
                                                   ORDER BY bk.bi_code, org.OrderBy");

                     }

                     

                     //-- 銀行群組 --
                     $bank_arr=[];
                     foreach ($row_bank_list as $bank_list) {
                       $bank_arr[$bank_list['Tb_index']][]=$bank_list;
                     }

                     
                     $count_i=ceil(count($bank_arr)/3);
                     $x=1;
                     $bank_txt='';
                     foreach ($bank_arr as $bank_one) {

                       $bi_tel_card=empty($bank_one[0]['bi_tel_card']) ? '': $bank_one[0]['bi_tel_card'];
                       $bi_tel2_card=empty($bank_one[0]['bi_tel2_card']) ? '': $bank_one[0]['bi_tel2_card'].'、';
                       $bi_tel3_card=empty($bank_one[0]['bi_tel3_card']) ? '': $bank_one[0]['bi_tel3_card'].'、';
                       
                       //-- 卡組織 --
                       $org_txt='';
                       $org_arr=[];
                       foreach ($bank_one as $org_one) {
                         $org_txt.='<img class="mx-1" src="../sys/img/'.$org_one['org_image'].'" title="'.$org_one['org_nickname'].'">';
                         array_push($org_arr, $org_one['org_nickname']);
                       }

                       $bank_txt='
                       <div class="col-md-4 col">
                          <div class="cardshap bank_3 bank_list_ph">
                            <a class="all_form" href="bank_detail.php?bi_pk='.$bank_one[0]['Tb_index'].'">
                             <img src="../sys/img/'.$bank_one[0]['bi_logo'].'">
                             <hr>
                             
                            </a>
                           <div class="text-center">
                             <a class="all_form" href="bank_detail.php?bi_pk='.$bank_one[0]['Tb_index'].'">
                              <h5>'.$bank_one[0]['bi_shortname'].'(銀行代碼'.$bank_one[0]['bi_code'].')</h5>
                             </a>
                              <b>總行電話：</b>'.$bank_one[0]['bi_tel'].' <br>
                              <b>信用卡服務專線：</b><br>'.$bi_tel_card.'
                           </div>
                           <div class="bank_icon">
                           '.$org_txt.'
                           </div>

                            <div class="bank_btn  hv-center">
                              <a target="_blank" class="gray-layered btnOver py-1 px-2 mr-2" href="'.$bank_one[0]['bi_bank_url'].'" >銀行網址</a>
                              <a target="_blank" class="gray-layered btnOver py-1 px-2" href="'.$bank_one[0]['bi_card_url'].'" >信用卡網址</a>
                            </div>
                          </div>
                      </div>';
                      

                      if (!isset($order) || in_array($order[1], $org_arr)) {
                        echo $bank_txt;

                        //-- 廣告 --
                        if ($x%6==0) {
                          if (($x/6)%2==1) {
                            echo '<div class="col-md-12 col phone_hidden"><img src="http://placehold.it/750x100" alt="banner"></div>';
                          }
                          else{
                            echo '<div class="col-md-12 row phone_hidden">
                                      <div class="col-md-6 col ">
                                          <img class="w-100" src="http://placehold.it/365x100" alt="">
                                      </div>
                                      <div class="col-md-6 col">
                                          <img class="w-100" src="http://placehold.it/365x100">
                                      </div>
                                  </div>';
                          }
                        }
                        //-- 廣告 END --
                        $x++;
                      }
                    }
                    //-- 銀行群組 END --
                    ?>
                  </div>
                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
             <?php 
             if (!wp_is_mobile()) {
               require 'right_area_div.php';
              } ?>
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

        if (location.search.indexOf('bank_keyword')!=-1) {
          var get=location.search.split('?bank_keyword=');
          $('[name="bank_keyword"]').val(decodeURI(get[1]));
        }
        else if(location.search.indexOf('order')!=-1){
          var get=location.search.split('?order=');
          $('.bk_list_order [value="'+decodeURI(get[1])+'"]').prop('selected', true);
        }
      });
    </script>
  </body>
</html>