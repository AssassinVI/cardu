<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-卡排行</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="https://www.cardu.com.tw" />
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="rank_body">

    <div class="container detail_page">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="rank.php">卡排行</a> / <a href="compare01.php">新手快搜
            </a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">


                    <!--信用卡推薦-->
                    <div class="col-md-12 col">
                      <div class="rank_search bank_search cardshap py-md-2 row">

                        <div class="col-md-9">
                          <p class="p-0 px-md-3">您所勾選的搜尋條件: </p>
                          <?php 
                           $search_pref=[];
                           $search_fun=[];

                           //-- 優惠 --
                           $pref_id=explode(',', $_GET['pref_id']);
                           $pref_id_txt='';
                           foreach ($pref_id as $pref_id_one) {
                             $pref_id_txt.='\''.str_replace([' ','#','*'],['','',''],$pref_id_one).'\',';
                           }
                           $pref_id_txt=substr($pref_id_txt, 0,-1);
                           $row_pref=$pdo->select("SELECT pref_name FROM card_pref WHERE Tb_index IN (".$pref_id_txt.")");
                           foreach ($row_pref as $row_pref_one) {
                             array_push($search_pref, $row_pref_one['pref_name']);
                           }

                           echo '<div class="row no-gutters"> <div class="col-md-3 text-md-right">信用卡優惠：</div><div class="text-primary col-md-9">'. implode('，', $search_pref) .'</div></div>';
                           
                           
                           //-- 功能 --
                           $fun_id=explode(',', $_GET['fun_id']);
                           // $fun_id_txt='';
                           // foreach ($fun_id as $fun_id_one) {
                           //   $fun_id_txt.='\''.str_replace([' ','#','*'],['','',''],$fun_id_one).'\',';
                           // }
                           // $fun_id_txt=substr($fun_id_txt, 0,-1);
                           // $row_fun=$pdo->select("SELECT fun_name FROM card_func WHERE Tb_index IN (".$fun_id_txt.")");
                           // foreach ($row_fun as $row_fun_one) {
                           //   array_push($search_all, $row_fun_one['fun_name']);
                           // }
                           $fun_sp_name=[
                             'fun201811061007565'=>'加油',
                             'fun2018110610075611'=>'電影',
                             'fun201811061007567'=>'餐飲',
                             'fun201811061007568'=>'交通通勤',
                             'fun201811061007561'=>'航空旅遊',
                             'fun201811061007563'=>'百貨購物',
                             'fun201811061007562'=>'量販超市'
                           ];
                           foreach ($fun_id as $fun_id_one) {
                             array_push($search_fun, $fun_sp_name[$fun_id_one]);
                           }

                           echo '<div class="row no-gutters"> <div class="col-md-3 text-md-right">信用卡用途：</div><div class="text-primary col-md-9">'. implode('，', $search_fun) .'</div></div>';
                          ?>
                        </div>
                        <div class="col-md-3 hv-center mb-md-0 mb-2">
                         <button id="change_search_btn" type="button" class="btn gray-layered btnOver"><a href="compare01.php">變更新手快搜條件</a></button>
                        </div>
                      </div>

                    </div>

                      <div class="col-md-12 col">
                        <div class="cardshap darkpurple_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">新手快搜</a>
                          </li>
                        </ul>
                        
                          <!--信用卡推薦-->
                       <div class="col-md-12 col0">

                        <div class="tab-content p-0" id="myTabContent">
                          <div class="tab-pane new_hand_card fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <?php 
                              $sql_txt='';
                              $sql_arr=[];
                              //-- 快搜優惠 --
                              if (!empty($_GET['pref_id'])) {
                                $i=0;
                                foreach ($pref_id as $pref_id_one) {
                                $sql_txt.=" cc.cc_pref_id LIKE :pref_id".$i." AND ";
                                $sql_arr['pref_id'.$i]='%'.$pref_id_one.'%';
                                $i++;
                               }
                              }
                              //-- 快搜功能 --
                              if (!empty($_GET['fun_id'])){
                                $i=0;
                                foreach ($fun_id as $fun_id_one) {
                                $sql_txt.=" cc.cc_fun_id LIKE :fun_id".$i." AND ";
                                $sql_arr['fun_id'.$i]='%'.$fun_id_one.'%';
                                $i++;
                               }
                              }
                              
                              $sql_txt=substr($sql_txt, 0,-4);


                              $row_card=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.cc_interest_desc, cc.cc_doc_url, cc.cc_doc_path, 
                                                             ccd.bi_shortname, ccd.org_nickname, ccd.attr_name 
                                                      FROM credit_card as cc
                                                      INNER JOIN cc_detail as ccd ON cc.Tb_index=ccd.Tb_index
                                                      WHERE cc.cc_stop_publish=0 AND cc.cc_stop_card=0 AND ".$sql_txt.
                                                      "LIMIT 0,9", $sql_arr);
                              $x=1;
                              foreach ($row_card as $row_card_one) {


                                //-----------------------------------
                                //-- share_area/func.php 信用卡List 樣板 --
                                //-----------------------------------
                                popular_card_txt($x, $row_card_one, 'N' );
                                
                         
                            

                            //-- 廣告 --
                            if ($x%3==0) {
                              echo ' <div class="text-center banner"><img src="http://placehold.it/750x150" alt="banner"></div>';
                            }

                             $x++; }

                             
                             //---------- 找無卡片 -----------
                             if (count($row_card)<1) {
                               
                               echo '<div class="p-3 m-3 border">
                                         <h4 class="text-danger text-center no-search-txt">您所勾選的條件無法找到符合的信用卡，<br> 請更改或減少搜尋條件，以便為您重新搜尋信用卡</h4>
                                     </div>';
                             }
                            ?>


                          </div>
                        </div>
                      
                      
                    </div>
                    
                    <?php 
                      if ($x>9) {
                        echo '<a class="rank_more new_hand warning-layered btnOver" show_num="6" href="javascript:;">顯示更多卡片</a>';
                      }
                    ?>
                    <!--信用卡推薦end -->
                         
                        
                         
                </div>
                
               </div>
             </div>
            </div>
            <!--版面左側end-->
            
            <?php 
            //-- 版面右側 --
             require 'right_area_div.php';
            ?>

        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>

    <script type="text/javascript">

      $(window).on('load',function(event) {
        //-- 讀取查詢條件 --
        // if (sessionStorage.getItem('rank_arr')!=null) {
        //   var rank_arr=sessionStorage.getItem('rank_arr').split(',');
        //   var rank_arr_txt='';
        //   for (var i = 0; i < rank_arr.length; i++) {
        //     rank_arr_txt+=(i+1)+'.'+rank_arr[i]+'，';
        //   }
        //   rank_arr_txt=rank_arr_txt.slice(0,-1);
        //   $('#search_rank_arr').html(rank_arr_txt);
        // }
        
      });

    </script>

  </body>
</html>