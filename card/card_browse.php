<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網 - 卡情報 > 卡總覽</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
      require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網 - 卡情報 > 卡總覽" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網 - 卡情報 > 卡總覽" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="javascript:;">卡總覽</a>
            </p>
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
                    <div class="col-md-12 col phone_hidden"><div class="test hv-center"><img src="http://placehold.it/750x100" alt="banner"></div></div>
                    <!--banner end -->
                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                  

                     <!--功能卡&權益優惠-->
                     <?php 
                      $fun_active=!$_GET || !empty($_GET['func']) ? 'active show':'';
                      $pref_active=!empty($_GET['pref']) ? 'active show':'';
                     ?>
                     
                   <div class="col-md-12 col">
                    <div class="cardshap brown_tab mouseHover_other_tab2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link hole py-2 pl-0 flex-x-center <?php echo $fun_active; ?>" id="goodTicket-tab"  href="javascript:;"  tab-target="#goodTicket" aria-selected="true">功能卡</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center <?php echo $pref_active; ?>" id="goodSet-tab"  href="javascript:;"  tab-target="#goodSet" aria-selected="false">權益優惠</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane tab-ones fade <?php echo $fun_active; ?>" id="goodTicket" role="tabpanel" aria-labelledby="goodTicket-tab">
                            
                           <div class="card_all_fun position-relative">
                            <div class="swiper-container mx-4 mx-md-5">
                                <div class="swiper-wrapper">
                                  <?php 
                                    //--====================================== 功能卡 ==============================================--
                                    //-- 信用卡 --
                                    $row_card_fun=$pdo->select("SELECT Tb_index, fun_name, card_image, card_image_hover 
                                                                FROM card_func 
                                                                WHERE mt_id='site2018110517362644' AND OnLineOrNot=1 
                                                                ORDER BY OrderBy ASC");
                                    //-- 金融卡  --
                                    // $row_dcard_fun=$pdo->select("SELECT Tb_index, fun_name, card_image, card_image_hover 
                                    //                             FROM card_func 
                                    //                             WHERE mt_id='site2019021312385319' AND OnLineOrNot=1 
                                    //                             ORDER BY OrderBy ASC");
                                    // $dcard_fun_id=[];
                                    // foreach ($row_dcard_fun as $dcard_fun) {
                                    //   $dcard_fun_id[$dcard_fun['fun_name']]=$dcard_fun['Tb_index'];
                                    // }
                                    
                                    $x=0;
                                    $url_arr=[];
                                    foreach ($row_card_fun as $card_fun) {

                                      $url='?func='.$card_fun['Tb_index'];
                                      array_push($url_arr, $url);

                                      $active=$_GET['func']==$card_fun['Tb_index'] ? 'active':'';
                                      $card_image=$_GET['func']==$card_fun['Tb_index'] ? $card_fun['card_image_hover']:$card_fun['card_image'];

                                      echo '<div class="swiper-slide text-center">
                                             <a class="ccard_icon_js '.$active.'" href="'.$url.'">
                                              <img class="cc_fun_icon" src="../sys/img/'.$card_image.'" title="'.$card_fun['fun_name'].'">
                                             </a>
                                            </div>';

                                      $x++;
                                    }


                                    //-- 隨機選取功能卡 --
                                    if (empty($_SERVER['QUERY_STRING'])) {
                                      location_up($url_arr[rand(0,count($row_card_fun)-1)],'');
                                      exit();
                                    }

                                    //--====================================== 功能卡 END ==============================================--
                                  ?>
                                    
                                </div>
                                
                            </div>

                            <!-- 如果需要导航按钮 -->
                            <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                            <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>

                            <input type="hidden" name="rand_num" value="">
                            
                           </div>
                            
                            
                            <div class="col-md-12 col px-0 px-md-1">
                                <div id="iCardRanking" class="cardshap big_tab tab_list_div brown_tab creditbg">
                                  <div class="tab_menu row no-gutters">

                                    <?php 
                                      $fun_name=$pdo->select("SELECT fun_name FROM card_func WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['func']], 'one');
                                    ?>

                                     <div class="col-md-4">
                                        <div class="title_tab hole">
                                          <h4 class="card_fun_title py-1"><?php echo  $f_name=empty($fun_name['fun_name']) ? '全功能': $fun_name['fun_name']; ?></h4>
                                        </div>
                                     </div> 

                                     <div class="col-md-8">
                                        <div class="w-h-100 menu cardtext">
                                          <ul class="nav " id="myTab" role="tablist">
                                            <li class="nav-item">
                                              <a class="card_browse cre_card ms_enter" id="CreditCard-tab" href="#CreditCard" tab-link="1">信用卡</a>
                                            </li>

                                            <?php 
                                             //--判斷有無金融卡 --
                                             $row_is_dc=$pdo->select("SELECT Tb_index
                                                                      FROM card_func 
                                                                      WHERE mt_id='site2019021312385319' AND OnLineOrNot=1 AND fun_name=:fun_name", 
                                                                      ['fun_name'=>$fun_name['fun_name']], 'one');

                                             if ((empty($_GET['func']) && empty($row_is_dc['Tb_index'])) || !empty($row_is_dc['Tb_index'])) {
                                            ?>

                                            <li class="nav-item">
                                              <a class="card_browse deb_card" id="DebitCard-tab" href="#DebitCard" tab-link="2">金融卡</a>
                                            </li>

                                            <?php
                                             }
                                            ?>
                                            
                                          </ul>
                                        </div>
                                    </div>

                                  </div>
                                

                            <div class="content_tab px-md-1 px-0" id="myTabContent">
                              <div class="news_list_div show " tab="1" id="CreditCard" role="tabpanel" aria-labelledby="CreditCard-tab">
                               <div class="credit_table">

                                <?php 
                                  //--------------------------------------- 信用卡(功能) ------------------------------------------------
                                  $row_card_list=$pdo->select("SELECT  cc.cc_bi_pk, bk.bi_shortname, bk.bi_logo, 
                                                                     cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.cc_stop_publish, cc.cc_stop_card,
                                                                     cc.cc_cardorg, org.org_image, org.org_nickname, 
                                                                     level.attr_name
                                                               FROM credit_card as cc 
                                                               INNER JOIN bank_info as bk ON bk.Tb_index=cc.cc_bi_pk
                                                               INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                               INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                               WHERE cc.cc_group_state!=1 AND cc.cc_group_state!=2 AND cc.cc_fun_id LIKE :cc_fun_id
                                                               ORDER BY bk.bi_code ASC, cc.cc_publish DESC, cc.cc_group_id DESC, level.OrderBy ASC", ['cc_fun_id'=>'%'.$_GET['func'].'%']);

                                  //-- 銀行陣列 --
                                  $bank_arr=[];
                                  foreach ($row_card_list as $card_list) {
                                    $bank_arr[$card_list['cc_bi_pk']][]=$card_list;
                                  }
                                  foreach ($bank_arr as $bank) {

                                    //-- 卡群組陣列 --
                                    $card_group_arr=[];
                                    foreach ($bank as $bank_one) {
                                      $card_group_arr[$bank_one['cc_group_id']][]=$bank_one;
                                    }
                                    $x=1;
                                    $c_group_txt='';
                                    foreach ($card_group_arr as $card_group) {

                                     if ($x<=4) {

                                        //-- 卡組織陣列 --
                                        $card_org_arr=[];
                                        foreach ($card_group as $card_group_one) {
                                          $card_org_arr[$card_group_one['cc_cardorg']][]=$card_group_one;
                                        }
                                        $c_org_txt='';
                                        foreach ($card_org_arr as $card_org) {
                                          
                                          //-- 卡等 --
                                          $c_level_txt='';
                                          foreach ($card_org as $card_org_one) {
                                            if ($card_org_one['cc_stop_publish']==0 && $card_org_one['cc_stop_card']==0) {
                                               $c_level_txt.='<a href="creditcard.php?cc_pk='.$card_org_one['Tb_index'].'&cc_group_id='.$card_org_one['cc_group_id'].'">
                                                                  '.$card_org_one['attr_name'].'
                                                              </a>、';
                                            }
                                            else if ($card_org_one['cc_stop_publish']==1){
                                               $c_level_txt.='<a href="creditcard.php?cc_pk='.$card_org_one['Tb_index'].'&cc_group_id='.$card_org_one['cc_group_id'].'">
                                                                  '.$card_org_one['attr_name'].'(停發)
                                                              </a>、';
                                            }
                                            
                                          }
                                          $c_level_txt=mb_substr($c_level_txt, 0,-1,'utf-8');
                                          
                                          if (!empty($c_level_txt)){
                                            $c_org_txt.='
                                              <div class="py-1 row no-gutters">
                                               <div class="col-md-2 col-4">
                                                <a href="bank_list.php?order=cc_'.$card_org[0]['org_nickname'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'"></a>
                                               </div>
                                               <div class="col-md-10 col-8">
                                                '.$c_level_txt.'
                                               </div>
                                              </div>';
                                          }
                                        }
                                        //-- 卡組織陣列 END --

                                       //-- 卡片圖 --
                                       $cc_photo=empty($card_group[0]['cc_photo']) ? 'CardSample.png':$card_group[0]['cc_photo'];

                                       $c_group_txt.='
                                       <div class="row cards_div bankbg_list">
                                         <div class="col-md-5 col-6 hv-center" title="'.$card_group[0]['cc_cardname'].'">
                                             <a class="bank_all_small_img card_name text-center" href="type.php?bi_pk01='.$bank[0]['cc_bi_pk'].'&gid='.$card_group[0]['cc_group_id'].'">
                                              <img src="../sys/img/'.$cc_photo.'" ><br>'.$card_group[0]['cc_cardname'].'
                                             </a>
                                         </div>
                                         <div class="col-md-7 col-6 h-center col0 all_color mb-md-4">
                                          <div class="w-100 text-md-center" >
                                          '.$c_org_txt.'
                                          </div>
                                         </div> 
                                       </div>';
                                     }
                                     $x++;
                                    }
                                    //-- 卡群組陣列 END --
                                    
                                    $more_btn_txt=($x-1)>4 ? '<a class="rank_more card_more warning-layered btnOver" bank_id="'.$bank[0]['cc_bi_pk'].'" func_id="'.$_GET['func'].'" now_num="4" show_num="4" c_type="cc" href="javascript:;">顯示更多卡片</a>' : '';
                                    $list_txt='<div class="row">
                                                 <div class="bank_div col-md-2 hv-center py-2">
                                                     <a class="card_name text-center" href="/card/bank_detail.php?bi_pk='.$bank[0]['cc_bi_pk'].'"><img class="max-w-100" src="../sys/img/'.$bank[0]['bi_logo'].'" title="'.$bank[0]['bi_shortname'].'"><br>'.$bank[0]['bi_shortname'].'</a>
                                                 </div>
                                                 <div class="card_div col-md-10 p-md-0 px-0">
                                                  <div class="card_group_div">
                                                   '.$c_group_txt.'
                                                  </div>
                                                   '.$more_btn_txt.'
                                                 </div>
                                               </div>';
                                    echo $list_txt;
                                  }
                                  //-- 銀行陣列 END --
                                ?>

                               </div>
                              </div>

                              <div class="news_list_div" id="DebitCard" tab="2" role="tabpanel" aria-labelledby="DebitCard-tab">

                                <div class="credit_table">

                                  <?php 

                                    //--------------------------------------- 金融卡(功能) ------------------------------------------------
                                    if ((empty($_GET['func']) && empty($row_is_dc['Tb_index'])) || !empty($row_is_dc['Tb_index'])) {
                                      $row_card_list=$pdo->select("SELECT  dc.dc_bi_pk, bk.bi_shortname, bk.bi_logo, 
                                                                         dc.Tb_index, dc.dc_group_id, dc.dc_photo, dc.dc_cardname, dc.dc_stop_publish, dc.dc_stop_card,
                                                                         dc.dc_debitorg, org.org_image, org.org_nickname, 
                                                                         level.attr_name
                                                                   FROM debit_card as dc 
                                                                   INNER JOIN bank_info as bk ON bk.Tb_index=dc.dc_bi_pk
                                                                   INNER JOIN card_org as org ON org.Tb_index=dc.dc_debitorg
                                                                   INNER JOIN card_level as level ON level.Tb_index=dc.dc_debitlevel
                                                                   WHERE dc.dc_group_state=0 AND dc.dc_fun_id LIKE :dc_fun_id
                                                                   ORDER BY bk.bi_code ASC, dc.dc_publish DESC, dc.dc_group_id DESC, level.OrderBy ASC", ['dc_fun_id'=>'%'.$row_is_dc['Tb_index'].'%']);

                                      //-- 銀行陣列 --
                                      $bank_arr=[];
                                      foreach ($row_card_list as $card_list) {
                                        $bank_arr[$card_list['dc_bi_pk']][]=$card_list;
                                      }
                                      foreach ($bank_arr as $bank) {

                                        //-- 卡群組陣列 --
                                        $card_group_arr=[];
                                        foreach ($bank as $bank_one) {
                                          $card_group_arr[$bank_one['dc_group_id']][]=$bank_one;
                                        }
                                        $x=1;
                                        $c_group_txt='';
                                        foreach ($card_group_arr as $card_group) {

                                         if ($x<=4) {

                                            //-- 卡組織陣列 --
                                            $card_org_arr=[];
                                            foreach ($card_group as $card_group_one) {
                                              $card_org_arr[$card_group_one['dc_debitorg']][]=$card_group_one;
                                            }
                                            $c_org_txt='';
                                            foreach ($card_org_arr as $card_org) {
                                              
                                              //-- 卡等 --
                                              // $c_level_txt='';
                                              // foreach ($card_org as $card_org_one) {
                                              //   $c_level_txt.='<a href="debitcard.php?dc_pk='.$card_org_one['Tb_index'].'&dc_group_id='.$card_org_one['dc_group_id'].'">'.$card_org_one['attr_name'].'</a>、';
                                              // }
                                              // $c_level_txt=mb_substr($c_level_txt, 0,-1,'utf-8');
                                              if ($card_org[0]['dc_stop_publish']==0 && $card_org[0]['dc_stop_card']==0){
                                                $c_org_txt.='
                                                    <a class="mr-2 mb-2" href="bank_list.php?order=dc_'.$card_org[0]['org_nickname'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'"></a>
                                                  ';
                                              }
                                            }
                                            //-- 卡組織陣列 END --

                                           //-- 卡片圖 --
                                           $dc_photo=empty($card_group[0]['dc_photo']) ? 'CardSample.png':$card_group[0]['dc_photo'];

                                           $c_group_txt.='
                                           <div class="row cards_div bankbg_list" >
                                             <div class="col-md-5 col-6 hv-center" title="'.$card_group[0]['dc_cardname'].'">
                                                 <a class="bank_all_small_img card_name text-center" href="type.php?bi_pk01='.$bank[0]['dc_bi_pk'].'&gid='.$card_group[0]['dc_group_id'].'">
                                                  <img src="../sys/img/'.$dc_photo.'" ><br>'.$card_group[0]['dc_cardname'].'
                                                 </a>
                                             </div>
                                             <div class="col-md-7 col-6 h-center col0 all_color mb-md-4">
                                              <div>
                                              '.$c_org_txt.'
                                              </div>
                                             </div> 
                                           </div>';
                                         }
                                         $x++;
                                        }
                                        //-- 卡群組陣列 END --
                                        
                                        $more_btn_txt=($x-1)>4 ? '<a class="rank_more card_more warning-layered btnOver" bank_id="'.$bank[0]['dc_bi_pk'].'" func_id="'.$row_is_dc['Tb_index'].'" now_num="4" show_num="4" c_type="dc" href="javascript:;">顯示更多卡片</a>' : '';
                                        $list_txt='<div class="row">
                                                     <div class="bank_div col-md-2 hv-center py-2">
                                                         <a class="card_name text-center" href="/card/bank_detail.php?bi_pk='.$bank[0]['dc_bi_pk'].'"><img class="max-w-100" src="../sys/img/'.$bank[0]['bi_logo'].'" title="'.$bank[0]['bi_shortname'].'"><br>'.$bank[0]['bi_shortname'].'</a>
                                                     </div>
                                                     <div class="card_div col-md-10 p-md-0 px-0">
                                                      <div class="card_group_div">
                                                       '.$c_group_txt.'
                                                      </div>
                                                       '.$more_btn_txt.'
                                                     </div>
                                                   </div>';
                                        echo $list_txt;
                                      }
                                      //-- 銀行陣列 END --
                                    }
                                    //-- if END --
                                  ?>

                                 
                                </div>

                              </div>
                            </div>
                          </div>



                           </div>
                          </div>


                          <div class="tab-pane tab-ones fade <?php echo $pref_active; ?>" id="goodSet" role="tabpanel" aria-labelledby="goodSet-tab">

                            <ul class="credit_icon">
                              <?php 
                                //--====================================== 權益優惠 ==============================================--
                                //-- 信用卡 --
                                $row_card_pref=$pdo->select("SELECT Tb_index, pref_name, pref_image, pref_image_hover 
                                                            FROM card_pref 
                                                            WHERE mt_id='site2018110617521258' AND OnLineOrNot=1 
                                                            ORDER BY OrderBy ASC");

                                //--  金融卡 --
                                $row_dcard_pref=$pdo->select("SELECT Tb_index, pref_name, pref_image, pref_image_hover 
                                                            FROM card_pref 
                                                            WHERE mt_id='site201902131239305' AND OnLineOrNot=1 
                                                            ORDER BY OrderBy ASC");

                                $dcard_pref_id=[];
                                foreach ($row_dcard_pref as $dcard_pref) {
                                  $dcard_pref_id[$dcard_pref['pref_name']]=$dcard_pref['Tb_index'];
                                }



                                foreach ($row_card_pref as $card_pref) {

                              $url=empty($dcard_pref_id[$card_pref['pref_name']]) ? '?pref='.$card_pref['Tb_index'] : '?pref='.$card_pref['Tb_index'].'&dc_pref='.$dcard_pref_id[$card_pref['pref_name']];

                                  if ($_GET['pref']==$card_pref['Tb_index']) {
                                   echo '<li>
                                         <a class="ccard_icon_js active" href="'.$url.'">
                                          <img src="../sys/img/'.$card_pref['pref_image_hover'].'" title="'.$card_pref['pref_name'].'">
                                         </a>
                                        </li>';
                                  }
                                  else{
                                    echo '<li>
                                          <a class="ccard_icon_js" href="'.$url.'">
                                           <img src="../sys/img/'.$card_pref['pref_image'].'" title="'.$card_pref['pref_name'].'">
                                          </a>
                                        </li>';
                                  }
                                }
                                //--====================================== 權益優惠 END ==============================================--
                              ?>
                            </ul>
                            
                             <div class="col-md-12 col px-0 px-md-1">
                                <div id="iCardRanking" class="cardshap big_tab tab_list_div brown_tab creditbg">
                                  <div class="tab_menu row no-gutters">

                                    <?php 
                                      $pref_name=$pdo->select("SELECT pref_name FROM card_pref WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['pref']], 'one');
                                    ?>

                                     <div class="col-md-4">
                                        <div class="title_tab hole">
                                          <h4 class="py-1"><?php echo $p_name=empty($pref_name['pref_name']) ? '全優惠' : $pref_name['pref_name']; ?></h4>
                                        </div>
                                     </div> 

                                     <div class="col-md-8">
                                        <div class="w-h-100 menu cardtext">
                                          <ul class="nav " id="myTab" role="tablist">
                                            <li class="nav-item">
                                              <a class="card_browse cre_card ms_enter" id="int-CreditCard-tab" href="#int-CreditCard"  tab-link="3">信用卡</a>
                                            </li>
                                            <?php 
                                             if ( (empty($_GET['pref']) && empty($_GET['dc_pref'])) || !empty($_GET['dc_pref'])){
                                            ?>

                                             <li class="nav-item">
                                               <a class="card_browse deb_card" id="int-DebitCard-tab"  href="#int-DebitCard"  tab-link="4">金融卡</a>
                                             </li>

                                            <?php
                                             }
                                            ?>
                                            
                                          </ul>
                                        </div>
                                    </div>

                                  </div>
                                
                            


                            <div class="content_tab px-md-1 px-0" id="myTabContent">
                              <div class="news_list_div show " tab="3" id="int-CreditCard" role="tabpanel" aria-labelledby="int-CreditCard-tab">
                               <div class="credit_table">

                                <?php 
                                 //--------------------------------------- 信用卡(權益優惠) ------------------------------------------------
                                 $row_card_list=$pdo->select("SELECT  cc.cc_bi_pk, bk.bi_shortname, bk.bi_logo, 
                                                                    cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.cc_stop_publish, cc.cc_stop_card,
                                                                    cc.cc_cardorg, org.org_image, org.org_nickname, 
                                                                    level.attr_name
                                                              FROM credit_card as cc 
                                                              INNER JOIN bank_info as bk ON bk.Tb_index=cc.cc_bi_pk
                                                              INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                              INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                              WHERE cc.cc_group_state!=1 AND cc.cc_group_state!=2 AND cc.cc_pref_id LIKE :cc_pref_id
                                                              ORDER BY bk.bi_code ASC, cc.cc_publish DESC, cc.cc_group_id DESC, level.OrderBy ASC", ['cc_pref_id'=>'%'.$_GET['pref'].'%']);

                                 //-- 銀行陣列 --
                                 $bank_arr=[];
                                 foreach ($row_card_list as $card_list) {
                                   $bank_arr[$card_list['cc_bi_pk']][]=$card_list;
                                 }
                                 foreach ($bank_arr as $bank) {

                                   //-- 卡群組陣列 --
                                   $card_group_arr=[];
                                   foreach ($bank as $bank_one) {
                                     $card_group_arr[$bank_one['cc_group_id']][]=$bank_one;
                                   }
                                   $x=1;
                                   $c_group_txt='';
                                   foreach ($card_group_arr as $card_group) {

                                    if ($x<=4) {

                                       //-- 卡組織陣列 --
                                       $card_org_arr=[];
                                       foreach ($card_group as $card_group_one) {
                                         $card_org_arr[$card_group_one['cc_cardorg']][]=$card_group_one;
                                       }
                                       $c_org_txt='';
                                       foreach ($card_org_arr as $card_org) {
                                         
                                         //-- 卡等 --
                                         $c_level_txt='';
                                         foreach ($card_org as $card_org_one) {
                                          if ($card_org_one['cc_stop_publish']==0 && $card_org_one['cc_stop_card']==0){
                                           $c_level_txt.='<a href="creditcard.php?cc_pk='.$card_org_one['Tb_index'].'&cc_group_id='.$card_org_one['cc_group_id'].'">'.$card_org_one['attr_name'].'</a>、';
                                          }
                                         }
                                         $c_level_txt=mb_substr($c_level_txt, 0,-1,'utf-8');
                                        
                                         if (!empty($c_level_txt)) {
                                           $c_org_txt.='
                                             <div class="py-1 row no-gutters">
                                              <div class="col-md-2 col-4">
                                               <a href="bank_list.php?order=cc_'.$card_org[0]['org_nickname'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'"></a>
                                              </div>
                                              <div class="col-md-10 col-8">
                                               '.$c_level_txt.'
                                              </div>
                                             </div>';
                                         }
                                       }
                                       //-- 卡組織陣列 END --

                                      //-- 卡片圖 --
                                      $cc_photo=empty($card_group[0]['cc_photo']) ? 'CardSample.png':$card_group[0]['cc_photo'];

                                      $c_group_txt.='
                                      <div class="row cards_div bankbg_list" >
                                        <div class="col-md-5 col-6 hv-center" title="'.$card_group[0]['cc_cardname'].'">
                                            <a class="bank_all_small_img card_name text-center" href="type.php?bi_pk01='.$bank[0]['cc_bi_pk'].'&gid='.$card_group[0]['cc_group_id'].'">
                                             <img src="../sys/img/'.$cc_photo.'" ><br>'.$card_group[0]['cc_cardname'].'
                                            </a>
                                        </div>
                                        <div class="col-md-7 col-6 h-center col0 all_color mb-md-4">
                                         <div class="w-100 text-md-center" >
                                         '.$c_org_txt.'
                                         </div>
                                        </div> 
                                      </div>';
                                      
                                    }
                                    $x++;
                                   }
                                   //-- 卡群組陣列 END --
                                   
                                   $more_btn_txt=($x-1)>4 ? '<a class="rank_more card_more warning-layered btnOver" bank_id="'.$bank[0]['cc_bi_pk'].'" pref_id="'.$_GET['pref'].'" now_num="4" show_num="4" c_type="cc" href="javascript:;">顯示更多卡片</a>' : '';
                                   $list_txt='<div class="row">
                                                <div class="bank_div col-md-2 hv-center py-2">
                                                    <a class="card_name text-center" href="/card/bank_detail.php?bi_pk='.$bank[0]['cc_bi_pk'].'"><img class="max-w-100" src="../sys/img/'.$bank[0]['bi_logo'].'" title="'.$bank[0]['bi_shortname'].'"><br>'.$bank[0]['bi_shortname'].'</a>
                                                </div>
                                                <div class="card_div col-md-10 p-md-0 px-0">
                                                  <div class="card_group_div">
                                                   '.$c_group_txt.'
                                                  </div>
                                                  '.$more_btn_txt.'
                                                </div>
                                              </div>';
                                   echo $list_txt;
                                 }
                                 //-- 銀行陣列 END --
                                ?>

                               </div>
                              </div>

                              <div class="news_list_div" tab="4" id="int-DebitCard" role="tabpanel" aria-labelledby="int-DebitCard-tab">

                                <div class="credit_table">

                                  <?php 
                                   //--------------------------------------- 金融卡(權益優惠) ------------------------------------------------
                                   if ( (empty($_GET['dc_pref']) && empty($_GET['dc_pref'])) || !empty($_GET['dc_pref'])) {
                                      $row_card_list=$pdo->select("SELECT  dc.dc_bi_pk, bk.bi_shortname, bk.bi_logo, 
                                                                         dc.Tb_index, dc.dc_group_id, dc.dc_photo, dc.dc_cardname, dc.dc_stop_publish, dc.dc_stop_card,
                                                                         dc.dc_debitorg, org.org_image, org.org_nickname, 
                                                                         level.attr_name
                                                                   FROM debit_card as dc 
                                                                   INNER JOIN bank_info as bk ON bk.Tb_index=dc.dc_bi_pk
                                                                   INNER JOIN card_org as org ON org.Tb_index=dc.dc_debitorg
                                                                   INNER JOIN card_level as level ON level.Tb_index=dc.dc_debitlevel
                                                                   WHERE dc.dc_group_state=0 AND dc.dc_pref_id LIKE :dc_pref_id
                                                                   ORDER BY bk.bi_code ASC, dc.dc_publish DESC, dc.dc_group_id DESC, level.OrderBy ASC", ['dc_pref_id'=>'%'.$_GET['dc_pref'].'%']);

                                      //-- 銀行陣列 --
                                      $bank_arr=[];
                                      foreach ($row_card_list as $card_list) {
                                        $bank_arr[$card_list['dc_bi_pk']][]=$card_list;
                                      }
                                      foreach ($bank_arr as $bank) {

                                        //-- 卡群組陣列 --
                                        $card_group_arr=[];
                                        foreach ($bank as $bank_one) {
                                          $card_group_arr[$bank_one['dc_group_id']][]=$bank_one;
                                        }
                                        $x=1;
                                        $c_group_txt='';
                                        foreach ($card_group_arr as $card_group) {

                                         if ($x<=4) {

                                            //-- 卡組織陣列 --
                                            $card_org_arr=[];
                                            foreach ($card_group as $card_group_one) {
                                              $card_org_arr[$card_group_one['dc_debitorg']][]=$card_group_one;
                                            }
                                            $c_org_txt='';
                                            foreach ($card_org_arr as $card_org) {
                                              
                                              //-- 卡等 --
                                              // $c_level_txt='';
                                              // foreach ($card_org as $card_org_one) {
                                              //   $c_level_txt.='<a href="debitcard.php?dc_pk='.$card_org_one['Tb_index'].'&dc_group_id='.$card_org_one['dc_group_id'].'">'.$card_org_one['attr_name'].'</a>、';
                                              // }
                                              // $c_level_txt=mb_substr($c_level_txt, 0,-1,'utf-8');
                                              if ($card_org[0]['dc_stop_publish']==0 && $card_org[0]['dc_stop_card']==0) {
                                                $c_org_txt.='
                                                    <a class="mr-2 mb-2" href="bank_list.php?order=dc_'.$card_org[0]['org_nickname'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'"></a>
                                                    
                                                  ';
                                              }

                                              
                                            }
                                            //-- 卡組織陣列 END --

                                           //-- 卡片圖 --
                                           $dc_photo=empty($card_group[0]['dc_photo']) ? 'CardSample.png':$card_group[0]['dc_photo'];

                                           $c_group_txt.='
                                           <div class="row cards_div bankbg_list" >
                                             <div class="col-md-5 col-6 hv-center" title="'.$card_group[0]['dc_cardname'].'">
                                                 <a class="bank_all_small_img card_name text-center" href="type.php?bi_pk01='.$bank[0]['dc_bi_pk'].'&gid='.$card_group[0]['dc_group_id'].'">
                                                  <img src="../sys/img/'.$dc_photo.'" ><br>'.$card_group[0]['dc_cardname'].'
                                                 </a>
                                             </div>
                                             <div class="col-md-7 col-6 h-center col0 all_color mb-md-4">
                                              <div>
                                              '.$c_org_txt.'
                                              </div>
                                             </div> 
                                           </div>';
                                           
                                         }
                                         $x++;
                                        }
                                        //-- 卡群組陣列 END --
                                        
                                        $more_btn_txt=($x-1)>4 ? '<a class="rank_more card_more warning-layered btnOver" bank_id="'.$bank[0]['dc_bi_pk'].'" pref_id="'.$_GET['dc_pref'].'" now_num="4" show_num="4" c_type="dc" href="javascript:;">顯示更多卡片</a>' : '';
                                        $list_txt='<div class="row">
                                                     <div class="bank_div col-md-2 hv-center py-2">
                                                         <a class="card_name text-center" href="/card/bank_detail.php?bi_pk='.$bank[0]['dc_bi_pk'].'"><img class="max-w-100" src="../sys/img/'.$bank[0]['bi_logo'].'" title="'.$bank[0]['bi_shortname'].'"><br>'.$bank[0]['bi_shortname'].'</a>
                                                     </div>
                                                     <div class="card_div col-md-10 p-md-0">
                                                       <div class="card_group_div">
                                                        '.$c_group_txt.'
                                                       </div>
                                                       '.$more_btn_txt.'
                                                     </div>
                                                   </div>';
                                        echo $list_txt;
                                      }
                                      //-- 銀行陣列 END --
                                    }
                                    //-- if END --
                                  ?>

                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>


                    <!--新卡訊end-->

                      
                      
                     <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/365x100">
                        </div>
                    </div>
                    <!--廣告end-->

                    <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="bank_all_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li>國內現金回饋1.22%</li>
                                  <li>國外現金回饋2.22%</li>
                                  <li>感應式刷卡快速結帳</li>
                                  <li>高額旅遊平安險</li>
                                  <li>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="bank_all_img" href="#">
                                  <img src="../img/component/card2.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li>國內現金回饋1.22%</li>
                                  <li>國外現金回饋2.22%</li>
                                  <li>感應式刷卡快速結帳</li>
                                  <li>高額旅遊平安險</li>
                                  <li>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="bank_all_img" href="#">
                                  <img src="../img/component/card3.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li>國內現金回饋1.22%</li>
                                  <li>國外現金回饋2.22%</li>
                                  <li>感應式刷卡快速結帳</li>
                                  <li>高額旅遊平安險</li>
                                  <li>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>




                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->
                    <!--手機板信用卡推薦-->
                    <div class="col-md-12 col d-md-none d-sm-block">

                        <div class="cardshap brown_tab exception">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content p-0" id="myTabContent">
                          <div class="tab-pane fade show active"  role="tabpanel" >

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color phone_card">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 phone_hidden">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--信用卡推薦end -->  


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

  </body>
</html>