<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-卡總覽</title>

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="javascript:;">卡總覽</a>
            </p>
          </div>
        </div>
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                  <div class="col-md-12 col">
                  
                      <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" data-toggle="tab" href="#title_5" role="tab" aria-controls="title_5" aria-selected="true">信用卡</a>
                          </li>
                        </ul>
                       
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                             <!--信用卡推薦-->
                    <div class="col-md-12 col">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <?php 
                              if (!empty($_GET['gid'])) {
                                $row_card=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_bi_pk, cc.cc_cardname, cc.cc_photo, cc.cc_interest_desc, cc.cc_fun_id, 
                                                               bk.bi_shortname, org.org_nickname, level.attr_name, org.org_image
                                                              FROM credit_card as cc
                                                              INNER JOIN bank_info as bk ON bk.Tb_index=cc.cc_bi_pk
                                                              INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                              INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel 
                                                              WHERE cc.cc_group_id =:cc_group_id AND cc.cc_stop_publish=0 AND cc.cc_stop_card=0
                                                              ORDER BY org.OrderBy ASC ,level.OrderBy ASC", ['cc_group_id'=>$_GET['gid']]);
                                foreach ($row_card as $row_card_one) {

                                  //-- 卡名 --
                                  $card_name=$row_card_one['cc_cardname'].$row_card_one['org_nickname'].$row_card_one['attr_name'];
                                  //-- 功能 --
                                  $cc_fun_id_txt='';
                                  $cc_fun_id_arr=explode(',', $row_card_one['cc_fun_id']);
                                  foreach ($cc_fun_id_arr as $fun_id_one) {
                                    $cc_fun_id_txt.='\''.$fun_id_one.'\',';
                                  }
                                  $cc_fun_id_txt=substr($cc_fun_id_txt, 0,-1);
                                  $row_fun=$pdo->select("SELECT Tb_index, fun_name, card_image, card_image_hover  FROM card_func WHERE Tb_index IN (".$cc_fun_id_txt.") ORDER BY OrderBy ASC");
                                  $row_fun_txt='';
                                  foreach ($row_fun as $row_fun_one) {
                                    $row_fun_txt.='<a class="ccard_icon_js" href="all.php?func='.$row_fun_one['Tb_index'].'"><img src="../sys/img/'.$row_fun_one['card_image'].'" title="'.$row_fun_one['fun_name'].'"></a>';
                                  }

                                  //-- 卡片圖 --
                                  $cc_photo=empty($row_card_one['cc_photo']) ? 'CardSample.png':$row_card_one['cc_photo'];
                                  
                                  echo '<div class="row no-gutters px-2 py-3 bankbg_list">
                                          <div class="col-md-4 text-center">
                                            <a class="bank_all_img" href="../card/creditcard.php?cc_pk='.$row_card_one['Tb_index'].'&cc_group_id='.$row_card_one['cc_group_id'].'">
                                              <img src="../sys/img/'.$cc_photo.'" alt="'.$card_name.'" title="'.$card_name.'">
                                            </a>
                                          </div>
                                           <div class="col-md-5 card_list_txt">
                                             <div class="bank_list type_card">
                                             <h5>
                                              <a href="bank_detail.php?bi_pk='.$row_card_one['cc_bi_pk'].'">'.$row_card_one['bi_shortname'].'</a>-
                                              <a class="card_name my-2" href="../card/creditcard.php?cc_pk='.$row_card_one['Tb_index'].'&cc_group_id='.$row_card_one['cc_group_id'].'" title="'.$card_name.'">
                                              '.$card_name.'
                                              </a>
                                             </h5>
                                             <ul>
                                               <li><img src="../sys/img/'.$row_card_one['org_image'].'" > '.$row_card_one['attr_name'].'</li>
                                             </ul>
                                             <div class="fb_search_btn">
                                              <iframe src="https://www.facebook.com/plugins/like.php?href='.$URL.'/card/creditcard.php?cc_pk='.$row_card_one['Tb_index'].'&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="90" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3 text-center phone_hidden">
                                            '.$row_fun_txt.'
                                          </div>
                                        </div>';
                                }
                              }
                            ?>
                        
                        </div>
                     
                    </div>
                    <!--信用卡推薦end -->

                           
                          </div>
                        
                    
                  
                       
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

  </body>
</html>