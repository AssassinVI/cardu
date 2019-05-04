<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-權益比一比</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta property="fb:admins" content="100000121777752" />
    <meta property="fb:admins" content="100008160723180" />
    <meta property="fb:app_id" content="616626501755047" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="news.php">卡排行</a> / <a href="news_second.php">權益比一比
            </a></p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">


                    <div class="col-md-12 col">
                      <div class="rank_search bank_search cardshap py-md-2">
                      <p>根據您所設定的權益比較條件:
                        <span id="search_rank_arr" class="text-primary">
                          <?php 
                            $eq_name_txt='';
                            if (!empty($_GET['ci_pk01'])) {
                              $row_name1=$pdo->select("SELECT eq_name FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['ci_pk01']], 'one');
                              $eq_name_txt.= '1.'.$row_name1['eq_name'].'、';
                            }
                            if (!empty($_GET['ci_pk02'])) {
                              $row_name2=$pdo->select("SELECT eq_name FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['ci_pk02']], 'one');
                              $eq_name_txt.= '2.'.$row_name2['eq_name'].'、';
                            }
                            if (!empty($_GET['ci_pk03'])) {
                              $row_name3=$pdo->select("SELECT eq_name FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['ci_pk03']], 'one');
                              $eq_name_txt.= '3.'.$row_name3['eq_name'].'、';
                            }
                            echo mb_substr($eq_name_txt, 0,-1);
                          ?>
                        </span>
                        ，依序顯示下列信用卡
                      </p>
                      </div>
                    </div>
                    <div class="col-md-12 col">
                        <div class="cardshap darkpurple_tab ">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">權益比一比</a>
                          </li>
                        </ul>
                        

                        <!--信用卡推薦-->
                        <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                        <div class="profit_boot">
                        <table class="profit_detail">
                          <thead>
                            <tr class="profit_bg">
                              <!-- 分類選項 -->

                              <?php 
                                $row_int=$pdo->select("SELECT Tb_index, eq_name FROM card_eq_item WHERE mt_id='site2019021216245137' AND eq_type IN ('small','big') ORDER BY OrderBy ASC");
                                
                                //-- 項目紀錄 --
                                $ci_pk_all=[$_GET['ci_pk01']];
                              ?>
                              <th>
                                <p class="text-center">權益項目</p>
                              </th>
                              <th class="ci_pk01">
                                <div class="rank_care money_main profit_width hv-center">
                                  <form class="row search_from">
                                  <select class="change_eq_item">
                                  <?php 
                                   foreach ($row_int as $row_int_one) {
                                    if ($_GET['ci_pk01']==$row_int_one['Tb_index']) {
                                      echo '<option selected value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                    }
                                    else{
                                     echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                    }
                                   }
                                  ?>
                                  </select>
                                  </form>
                                </div>
                              </th>

                              <?php 
                               if (!empty($_GET['ci_pk02'])) {

                                 //-- 項目紀錄 --
                                 array_push($ci_pk_all, $_GET['ci_pk02']);

                                 echo '
                                 <th class="ci_pk02">
                                   <div class="rank_care money_main profit_width hv-center">
                                     <form class="row search_from">
                                     <select class="change_eq_item">';

                                     foreach ($row_int as $row_int_one) {
                                       if ($_GET['ci_pk02']==$row_int_one['Tb_index']) {
                                        echo '<option selected value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                      }
                                      else{
                                       echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                      }
                                     }

                                echo '</select>
                                     </form>
                                   </div>
                                 </th>';
                               }


                               if (!empty($_GET['ci_pk03'])) {

                                 //-- 項目紀錄 --
                                 array_push($ci_pk_all, $_GET['ci_pk03']);

                                 echo '
                                 <th class="ci_pk03">
                                   <div class="rank_care money_main profit_width hv-center">
                                     <form class="row search_from">
                                     <select class="change_eq_item">';

                                     foreach ($row_int as $row_int_one) {
                                       if ($_GET['ci_pk03']==$row_int_one['Tb_index']) {
                                        echo '<option selected value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                      }
                                      else{
                                       echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                      }
                                     }

                                echo '</select>
                                     </form>
                                   </div>
                                 </th>';
                               }
                              ?>
                              
                            </tr>
                            <!-- 分類選項 -->
                          </thead>
                          
                          <?php 
                           //-- 項目紀錄 --
                           $ci_pk_all=implode(',', $ci_pk_all);
                           echo '<input type="hidden" name="ci_pk_all" value="'.$ci_pk_all.'">';
                          ?>
                          
                          <tbody>

                           <?php 

                             //-- 權益項目1 --
                             $row_eq=$pdo->select("SELECT eq_type FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['ci_pk01']], 'one');
                             $eq_type=$row_eq['eq_type']=='big' ? 'DESC':'ASC';
                             $row_eq_rank=$pdo->select("SELECT  cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, cc.cc_doc_url, cc.cc_doc_path, cc_eq.sm_content
                                                        FROM credit_card_eq as cc_eq
                                                        INNER JOIN cc_detail as cc ON cc_eq.card_id=cc.Tb_index 
                                                        WHERE cc_eq.eq_id=:eq_id
                                                        ORDER BY cc_eq.number_data ".$eq_type." LIMIT 0,6", ['eq_id'=>$_GET['ci_pk01']]);
                             
                             $ci_pk01_arr=[];
                             foreach ($row_eq_rank as $eq_rank_one) {
                               //-- 卡名 --
                               $card_name=$eq_rank_one['bi_shortname'].'_'.$eq_rank_one['cc_cardname'].'_'.$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

                               //-- 立即辦卡 --
                               if (!empty($eq_rank_one['cc_doc_url'])) {
                                 $cc_doc='<a target="_blank"  href="'.$eq_rank_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               elseif(!empty($eq_rank_one['cc_doc_path'])){
                                 $cc_doc='<a target="_blank" href="'.$eq_rank_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               else{
                                 $cc_doc='';
                               }

                               //-- 卡片圖 --
                               $cc_photo=empty($eq_rank_one['cc_photo']) ? 'CardSample.png':$eq_rank_one['cc_photo'];

                              $ci_pk01_one= '
                              <td class="ci_pk01">
                                <div class="rank_care money_main">
                                 <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
                                  <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$eq_rank_one['sm_content'].'">
                                  <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
                                 </a>
                                <div class="profit_btn  hv-center">
                                  '.$cc_doc.'
                                  <button type="button" card_id="'.$eq_rank_one['Tb_index'].'" cc_group_id="'.$eq_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                </div>
                               </div>
                              </td>';
                              array_push($ci_pk01_arr, $ci_pk01_one);
                             }
                             

                             //-- 權益項目2 --
                             if (!empty($_GET['ci_pk02'])) {

                             $row_eq=$pdo->select("SELECT eq_type FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['ci_pk02']], 'one');
                             $eq_type=$row_eq['eq_type']=='big' ? 'DESC':'ASC';
                             $row_eq_rank=$pdo->select("SELECT  cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, cc.cc_doc_url, cc.cc_doc_path, cc_eq.sm_content
                                                        FROM credit_card_eq as cc_eq
                                                        INNER JOIN cc_detail as cc ON cc_eq.card_id=cc.Tb_index 
                                                        WHERE cc_eq.eq_id=:eq_id
                                                        ORDER BY cc_eq.number_data ".$eq_type." LIMIT 0,6", ['eq_id'=>$_GET['ci_pk02']]);
                             
                             $ci_pk02_arr=[];
                             foreach ($row_eq_rank as $eq_rank_one) {
                               //-- 卡名 --
                               $card_name=$eq_rank_one['bi_shortname'].'_'.$eq_rank_one['cc_cardname'].'_'.$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

                               //-- 立即辦卡 --
                               if (!empty($eq_rank_one['cc_doc_url'])) {
                                 $cc_doc='<a target="_blank"  href="'.$eq_rank_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               elseif(!empty($eq_rank_one['cc_doc_path'])){
                                 $cc_doc='<a target="_blank" href="'.$eq_rank_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               else{
                                 $cc_doc='';
                               }
                               //-- 卡片圖 --
                               $cc_photo=empty($eq_rank_one['cc_photo']) ? 'CardSample.png':$eq_rank_one['cc_photo'];

                              $ci_pk02_one= '
                              <td class="ci_pk01">
                                <div class="rank_care money_main">
                                 <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
                                  <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$eq_rank_one['sm_content'].'">
                                  <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
                                 </a>
                                <div class="profit_btn  hv-center">
                                  '.$cc_doc.'
                                  <button type="button" card_id="'.$eq_rank_one['Tb_index'].'" cc_group_id="'.$eq_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                </div>
                               </div>
                              </td>';
                              array_push($ci_pk02_arr, $ci_pk02_one);
                             }
                             }



                             //-- 權益項目3 --
                             if (!empty($_GET['ci_pk03'])) {

                             $row_eq=$pdo->select("SELECT eq_type FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['ci_pk03']], 'one');
                             $eq_type=$row_eq['eq_type']=='big' ? 'DESC':'ASC';
                             $row_eq_rank=$pdo->select("SELECT  cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, cc.cc_doc_url, cc.cc_doc_path, cc_eq.sm_content
                                                        FROM credit_card_eq as cc_eq
                                                        INNER JOIN cc_detail as cc ON cc_eq.card_id=cc.Tb_index 
                                                        WHERE cc_eq.eq_id=:eq_id
                                                        ORDER BY cc_eq.number_data ".$eq_type." LIMIT 0,6", ['eq_id'=>$_GET['ci_pk03']]);
                             $ci_pk03_arr=[];
                             foreach ($row_eq_rank as $eq_rank_one) {
                               //-- 卡名 --
                               $card_name=$eq_rank_one['bi_shortname'].'_'.$eq_rank_one['cc_cardname'].'_'.$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

                               //-- 立即辦卡 --
                               if (!empty($eq_rank_one['cc_doc_url'])) {
                                 $cc_doc='<a target="_blank"  href="'.$eq_rank_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               elseif(!empty($eq_rank_one['cc_doc_path'])){
                                 $cc_doc='<a target="_blank" href="'.$eq_rank_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
                               }
                               else{
                                 $cc_doc='';
                               }

                               //-- 卡片圖 --
                               $cc_photo=empty($eq_rank_one['cc_photo']) ? 'CardSample.png':$eq_rank_one['cc_photo'];

                              $ci_pk03_one= '
                              <td class="ci_pk01">
                                <div class="rank_care money_main">
                                 <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
                                  <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$eq_rank_one['sm_content'].'">
                                  <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
                                 </a>
                                <div class="profit_btn  hv-center">
                                  '.$cc_doc.'
                                  <button type="button" card_id="'.$eq_rank_one['Tb_index'].'" cc_group_id="'.$eq_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                </div>
                               </div>
                              </td>';
                              array_push($ci_pk03_arr, $ci_pk03_one);
                             }
                             }
                             
                             for ($i=0; $i <6 ; $i++) { 
                              
                              $ci_pk01_txt=empty($ci_pk01_arr[$i]) ? '<td></td>':$ci_pk01_arr[$i];
                              $ci_pk02_txt=empty($ci_pk02_arr[$i]) ? '<td></td>':$ci_pk02_arr[$i];
                              $ci_pk03_txt=empty($ci_pk03_arr[$i]) ? '<td></td>':$ci_pk03_arr[$i];
                              
                           
                              $top_prize=$i<3 ? '<span class="top_prize">'.($i+1).'</span>':'<h1 class=" hv-center mb-0">'.($i+1).'</h1>';
                               echo '
                               <tr class="profit_bg">
                                 <td>
                                   <div class="hv-center profit_prize rank_hot">
                                   '.$top_prize.'
                                 </div>
                                 </td>
                                '.$ci_pk01_txt.$ci_pk02_txt.$ci_pk03_txt.'
                               </tr>';

                               //-- 廣告 --
                               if (($i+1)%3==0) {
                                 echo '
                                   <td colspan="4">
                                    <div class="test hv-center"><img src="http://placehold.it/750x150" alt="banner"></div>
                                   </td>';
                               }
                             }



                           ?>
                            
                          </tbody>
                        </table>
                      </div>


                    <a class="rank_more eq warning-layered btnOver" show_num="3" href="javascript:;">顯示更多卡片</a>

                  </div>
                    <!--信用卡推薦end -->
                </div>


                 
        
            </div>
           </div>
          </div>
          <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>熱門情報</h4>
                               <span>謹慎理財 信用至上</span>
                           </div>
                           <div class="content_tab">
                               <!-- 熱門情報輪播 -->
                            <div class="swiper-container HotNews_slide">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="swiper-slide" > 
                                      <div class="row no-gutters">
                                        <div class="col-5">
                                          <a class="img_a" href="#">
                                            <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                          </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div class="col-5">
                                         <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>

                                      <div class="row no-gutters">
                                        <div  class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                         </a>
                                        </div>
                                        <div class="col-7">
                                         <a href="#">
                                           <h4>匯豐現金回饋玉璽卡</h4>
                                         </a>
                                          <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                                
                            </div>
                            <!-- 熱門情報輪播 END -->

                           </div>
                       </div>
                    </div>

                    <div class="col-md-12 col">
                       
                       <div class="cardshap darkpurple_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active  pl-30" id="card-tab" tab-target="#card" href="javascript:;" aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/index/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-0 flex-x-center" id="right-tab" tab-target="#right" href="javascript:;" aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/index/icon2.png); background-size: 80%;"></i>權益快搜
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content ccard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">--選擇銀行--</option>
                                      <option value="第一銀行">第一銀行</option>
                                      <option value="台新銀行">台新銀行</option>
                                      <option value="渣打銀行">渣打銀行</option>
                                  </select>

                                  <select>
                                      <option value="">--選擇信用卡--</option>
                                      <option value="JBC白金卡">JBC白金卡</option>
                                      <option value="富邦世界卡">富邦世界卡</option>
                                      <option value="SOGO聯名卡">SOGO聯名卡</option>
                                  </select>  
                                </div>

                                <div class="col-3">
                                  <div class="hv-center w-h-100">
                                      <button type="button">GO</button>
                                  </div>
                                </div>
                               
                            </form>
                          </div>
                          <div class="tab-pane fade" id="right" role="tabpanel" aria-labelledby="right-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">選擇比較的權益項目</option>
                                      <option value="年費">年費</option>
                                      <option value="循環利息">循環利息</option>
                                      <option value="逾期違約金">逾期違約金</option>
                                  </select>

                                  <select>
                                      <option value="">選擇比較的權益項目</option>
                                      <option value="年費">年費</option>
                                      <option value="循環利息">循環利息</option>
                                      <option value="逾期違約金">逾期違約金</option>
                                  </select>
                                </div>

                                <div class="col-3">
                                 <div class="hv-center w-h-100">
                                   <button type="button">GO</button>
                                 </div>
                                </div>
                               
                            </form>
                          </div>
                        </div>
                      </div>
                    
                    </div>

                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>辦卡推薦 </h4>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                    
                                  </a>
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>★</b>國內現金回饋1.22%<br> <b>★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                 </div>
                               </div>

                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>

                                  </a> 
                                  <span>謹慎理財 信用至上</span>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                    <p><b>★</b>國內現金回饋1.22%<br> <b>★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                 </div>
                               </div>

                           </div>
                       </div>
                    </div>

                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one darkpurple_tab">
                           <div class="title_tab hole">
                               <h4>瀏覽過信用卡 </h4>
                                <a class="more_link" href="browse_detail.php"></a>
                           </div>
                           <div class="content_tab">
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
                                 </div>
                               </div>

                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p><b>●</b>國內消費享1.22% <br><b> ●</b>國內消費享2.22%</p>
                                 </div>
                               </div>
                               <div class="row no-gutters">
                                 <div class="col-5">
                                  <a class="img_a" href="#">
                                    <div class="img_div w-h-100" title="新聞" style="background-image: url(../img/component/photo1.jpg);"></div>
                                  </a>
                                 </div>
                                 <div class="col-7">
                                  <a href="#">
                                    <h4>匯豐現金回饋玉璽卡</h4>
                                  </a>
                                   <p>●國內消費享1.22% <br> ●國內消費享2.22%</p>
                                 </div>
                               </div>


                           </div>
                       </div>
                    </div>
                    
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="https://placehold.it/300x250" alt="">
                    </div>

                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="https://placehold.it/300x250" alt="">
                    </div>

                    
                    
                    <?php 
                     //-- 共用Footer --
                     if (wp_is_mobile()) {
                        require '../share_area/phone/footer.php';
                     }
                     else{
                       require '../share_area/footer.php';
                      }
                    ?>
                    

                </div>
            </div>
            <!--版面右側end-->
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

      // $(window).on('load',function(event) {
      //   //-- 讀取查詢條件 --
      //   if (sessionStorage.getItem('profit_rank_arr')!=null) {
      //     var rank_arr=sessionStorage.getItem('profit_rank_arr').split(',');
      //     var rank_arr_txt='';
      //     for (var i = 0; i < rank_arr.length; i++) {
      //       rank_arr_txt+=(i+1)+'.'+rank_arr[i]+'，';
      //     }
      //     rank_arr_txt=rank_arr_txt.slice(0,-1);
      //     $('#search_rank_arr').html(rank_arr_txt);
      //   }
        
      // });

    </script>

  </body>
</html>