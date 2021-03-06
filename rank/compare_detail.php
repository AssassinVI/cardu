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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="rank.php">卡排行</a> / <a href="compare02.php">卡片比一比
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
                     

                        <div class="cardshap darkpurple_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">卡片比一比</a>
                          </li>
                        </ul>


                        <?php 

                          for ($i=1; $i <=3 ; $i++) { 
                            if (!empty($_GET['cc_pk0'.$i])) {

                              ${'row_card'.$i}=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_bi_pk, cc.cc_fun_id, cc.cc_pref_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path, 
                                                              ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name
                                                       FROM credit_card as cc
                                                       INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                                       WHERE cc.Tb_index=:Tb_index", ['Tb_index'=>$_GET['cc_pk0'.$i]], 'one');
                              //-- 卡名 --
                              ${'card'.$i.'_name'}=${'row_card'.$i}['cc_cardname'].'_'.${'row_card'.$i}['attr_name'];

                              //-- 立即辦卡 --
                              if (!empty(${'row_card'.$i}['cc_doc_url']) || !empty(${'row_card'.$i}['cc_doc_path'])) {
                                $card_href=!empty(${'row_card'.$i}['cc_doc_url']) ? ${'row_card'.$i}['cc_doc_url']:${'row_card'.$i}['cc_doc_path'];
                                ${'cc_doc'.$i}='<div class="rank_btn  hv-center"><a target="_blank"  href="'.$card_href.'" class="btn warning-layered btnOver">立即辦卡</a></div>';
                              }
                              else{
                                ${'cc_doc'.$i}='<div class="rank_btn hv-center"></div>';
                              }

                              //-- 功能 --
                              if (!empty(${'row_card'.$i}['cc_fun_id'])) {
                                ${'cc_func'.$i}='';
                                $cc_fun_id_arr=explode(',', ${'row_card'.$i}['cc_fun_id']);
                                foreach ($cc_fun_id_arr as $cc_fun_id) {
                                  $cc_func_d=$pdo->select("SELECT Tb_index, fun_name, card_image, card_image_hover FROM card_func WHERE Tb_index=:Tb_index", ['Tb_index'=>$cc_fun_id], 'one');
                                  ${'cc_func'.$i}.='<a class="ccard_icon_js" href="../card/card_browse.php?func='.$cc_func_d['Tb_index'].'">
                                                <img class="rankasable_img" src="../sys/img/'.$cc_func_d['card_image'].'" title="'.$cc_func_d['fun_name'].'">
                                              </a>';
                                }
                              }

                              //-- 優惠 --
                              if (!empty(${'row_card'.$i}['cc_pref_id'])){
                                ${'cc_pref'.$i}='';
                                $cc_pref_id_arr=explode(',', ${'row_card'.$i}['cc_pref_id']);
                                foreach ($cc_pref_id_arr as $cc_pref_id) {
                                  $cc_pref_d=$pdo->select("SELECT Tb_index, pref_name, pref_image FROM card_pref WHERE Tb_index=:Tb_index", ['Tb_index'=>$cc_pref_id], 'one');
                                  ${'cc_pref'.$i}.='<a href="../card/card_browse.php?pref='.$cc_pref_d['Tb_index'].'">
                                                <img class="rankasable_img cc_pref_img" src="../sys/img/'.$cc_pref_d['pref_image'].'" title="'.$cc_pref_d['pref_name'].'">
                                              </a>';
                                }
                              }

                            }
                          }
                          

                        ?>
                        
                          <!--信用卡推薦-->
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          <form class="rank_boot">
                            <table>
                              <tr class="rank_boot_title">
                                <td style="width: 50px;">
                                  <span class="d-md-inline d-block">信用卡</span>
                                  <span class="d-md-inline d-block">名稱</span>
                                </td>
                                
                                <?php 
                                 //-- 信用卡 --
                                for ($i=1; $i <=3 ; $i++) { 
                                  if (!empty($_GET['cc_pk0'.$i])) {
                                    //-- 卡片圖 --
                                    $cc_photo=empty(${'row_card'.$i}['cc_photo']) ? 'CardSample.png':${'row_card'.$i}['cc_photo'];


                                    if (wp_is_mobile()) {
                                      $cc_s_name=mb_substr(${'card'.$i.'_name'}, 0,8,'utf-8');
                                    }else{
                                      $cc_s_name=mb_substr(${'card'.$i.'_name'}, 0,11,'utf-8');
                                    }
                                    
                                    echo '
                                      <td valign="top">  
                                        <div class="rank_care">
                                          <a target="_blank" href="../card/creditcard.php?cc_pk='.${'row_card'.$i}['Tb_index'].'&cc_group_id='.${'row_card'.$i}['cc_group_id'].'" title="'.${'card'.$i.'_name'}.'">
                                            <img class="rankas_img" src="../sys/img/'.$cc_photo.'">
                                          </a>
                                          <a target="_blank" href="../card/bank_detail.php?bi_pk='.${'row_card'.$i}['cc_bi_pk'].'">
                                            <h5 class=" money_main text-center mb-0">'.${'row_card'.$i}['bi_shortname'].'</h5>
                                          </a>
                                          <a target="_blank" href="../card/creditcard.php?cc_pk='.${'row_card'.$i}['Tb_index'].'&cc_group_id='.${'row_card'.$i}['cc_group_id'].'" title="'.${'card'.$i.'_name'}.'">
                                             <h5 class=" money_main text-center mb-0"><span>'.$cc_s_name.'</span></h5>
                                          </a>
                                          '.${'cc_doc'.$i}.'
                                         </div>
                                       </td>';
                                  }
                                }
                                ?>
                              </tr>
                              <tr>
                                <td>
                                  <span class="d-md-inline d-block">卡的</span>
                                  <span class="d-md-inline d-block">功能</span>
                                </td>

                                <?php 
                                  for ($i=1; $i <=3 ; $i++) { 
                                    if (!empty($_GET['cc_pk0'.$i])){
                                      echo '<td>'.${'cc_func'.$i}.'</td>';
                                    }
                                  }
                                ?>

                              </tr>
                              <tr>
                                <td>
                                 <span class="d-md-inline d-block">卡的</span>
                                 <span class="d-md-inline d-block">權益</span>
                                </td>

                                <?php 
                                  for ($i=1; $i <=3 ; $i++) { 
                                    if (!empty($_GET['cc_pk0'.$i])){
                                      echo '<td>'.${'cc_pref'.$i}.'</td>';
                                    }
                                  }
                                ?>
                              </tr>
                              

                              <?php 
                               //-- 撈出所有權益項目 --
                               $row_eq=$pdo->select("SELECT Tb_index, eq_name, eq_type FROM card_eq_item WHERE mt_id='site2019021216245137' ORDER BY is_im_eq DESC, OrderBy ASC");
                               $x=1;
                               foreach ($row_eq as $eq_one) {
                                 $cc_eq_txt_arr=[];
                                 $cc_eq_num_arr=[];
                                 //-- 無資料欄位數 --
                                 $null_tr_num=0;
                                 //-- 依卡片撈出項目資訊 --
                                 for ($i=1; $i <=3 ; $i++) { 
                                    if (!empty($_GET['cc_pk0'.$i])){
                                      ${'row_cc_eq'.$i}=$pdo->select("SELECT Tb_index, number_data, sm_content 
                                                                      FROM credit_card_eq 
                                                                      WHERE card_id=:card_id AND eq_id=:eq_id", 
                                                                      ['card_id'=>$_GET['cc_pk0'.$i], 'eq_id'=>$eq_one['Tb_index']],'one');
                                      
                                      //-- 判斷是否無資料 --
                                      if (empty(${'row_cc_eq'.$i}['Tb_index'])) {
                                        $is_null_num_data='';
                                        $null_tr_num++;
                                      }
                                      else{
                                        $is_null_num_data=${'row_cc_eq'.$i}['number_data'];
                                      }

                                      array_push($cc_eq_txt_arr, '<td>'.${'row_cc_eq'.$i}['sm_content'].'</td>');
                                      array_push($cc_eq_num_arr, $is_null_num_data);
                                    }
                                  }
                                  
                                  //-- 比大小 --
                                  if ($eq_one['eq_type']!='txt') {

                                    $win_index=0;
                                    for ($i=0; $i <count($cc_eq_num_arr)-1 ; $i++) { 
                                      //-- 比大 --
                                      if ($eq_one['eq_type']=='big') {

                                        if (!is_numeric($cc_eq_num_arr[$win_index])) {
                                          $win_index=($i+1);
                                        }
                                        else if (!is_numeric($cc_eq_num_arr[($i+1)])) {
                                          $win_index=$win_index;
                                        }
                                        else{
                                          $win_index=$cc_eq_num_arr[$win_index]>=$cc_eq_num_arr[($i+1)] ? $win_index:($i+1);
                                        }
                                      }
                                      //-- 比小 --
                                      else if($eq_one['eq_type']=='small'){

                                        if (!is_numeric($cc_eq_num_arr[$win_index])) {
                                          $win_index=($i+1);
                                        }
                                        else if (!is_numeric($cc_eq_num_arr[($i+1)])) {
                                          $win_index=$win_index;
                                        }
                                        else{
                                          $win_index=$cc_eq_num_arr[$win_index]<=$cc_eq_num_arr[($i+1)] ? $win_index:($i+1);
                                        }
                                      }

                                    }
                                    $cc_eq_txt_arr[$win_index]='<td><div><img src="../img/component/prize_r.png"></div>'.mb_substr($cc_eq_txt_arr[$win_index], 4);
                                  }

                                  
                                 
                                 $d_none=$x>5 ? 'class="d-none"':'';

                                 if ($null_tr_num==count($cc_eq_txt_arr)) {
                                   $eq_txt='';
                                 }
                                 else{

                                  if (mb_strlen($eq_one['eq_name'], 'utf-8')>=4) {
                                    $eq_name1=mb_strlen($eq_one['eq_name'], 'utf-8')<=5 ? mb_substr($eq_one['eq_name'], 0,2,'utf-8') : mb_substr($eq_one['eq_name'], 0,3,'utf-8');
                                    $eq_name2=mb_strlen($eq_one['eq_name'], 'utf-8')<=5 ? mb_substr($eq_one['eq_name'], 2,2,'utf-8') : mb_substr($eq_one['eq_name'], 3, mb_strlen($eq_one['eq_name'], 'utf-8'),'utf-8');
                                    $eq_name='<span class="d-md-inline d-block">'.$eq_name1.'</span>
                                              <span class="d-md-inline d-block">'.$eq_name2.'</span>';
                                  }
                                  else{
                                    $eq_name=$eq_one['eq_name'];
                                  }

                                  $eq_txt='
                                  <tr '.$d_none.'>
                                   <td>'.$eq_name.'</td>
                                   '.implode(' ', $cc_eq_txt_arr).'
                                  </tr>';
                                 }
                                 

                                 echo $eq_txt;
                               $x++; }
                              ?>
                              

                            </table>
                          </form>

                    </div>

                    <!--信用卡推薦end -->
                  
                     <a class="rank_more warning-layered btnOver" show_num="5" href="javascript:;">顯示更多資訊</a>   
                         
                </div>
                <div class="col-md-12 col">
                  <div class="row">
                  
                   
                  
                  </div>
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


                    <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

                        <div class="cardshap darkpurple_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card2.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
                                </ul>
                              </div>
                              <div class="col-md-4 ">
                                <a class="img_div card_list_img" href="#" title="新聞" style="background-image: url(../img/component/photo2.jpg);"></a>
                                <p>謹慎理財 信用至上</p>
                              </div>
                            </div>

                            <div class="row no-gutters mx-2 py-3 card_list">
                              <div class="col-md-4 text-center">
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card3.png" alt="" title="新聞">
                                </a>
                                <a class="btn warning-layered btnOver mt-2" href="#">立即辦卡</a>
                              </div>
                              <div class="col-md-4 card_list_txt rank_color">
                                <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                <ul>
                                  <li><b>●</b>國內現金回饋1.22%</li>
                                  <li><b>●</b>國外現金回饋2.22%</li>
                                  <li><b>●</b>感應式刷卡快速結帳</li>
                                  <li><b>●</b>高額旅遊平安險</li>
                                  <li><b>●</b>華航機票優惠</li>
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

                                <div class="cardshap darkpurple_tab exception">
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

  </body>
</html>