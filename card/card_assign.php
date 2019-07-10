<?php 
 require '../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-卡情報 > 線上辦卡</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
      require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-卡情報 >線上辦卡" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-卡情報 >線上辦卡" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo  $FB_URL;?>" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="javascript:;">線上辦卡</a></p>
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
                    <!--線上辦卡-->

                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">線上辦卡</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                          <ul class="online_list">
                            <?php 
                              $bank_row=$pdo->select("SELECT * FROM bank_info WHERE bd_src>0");
                              $bank_num=count($bank_row);
                              $rand=rand(0,(int)$bank_num-1);
                              for ($i=0; $i < $bank_num; $i++) { 
                                if ($rand==$i) {
                                  echo '<li>
                                         <a class="gray-layered btnOver active" href="javascript:;" bank_id="'.$bank_row[$i]['Tb_index'].'" title="'.$bank_row[$i]['bi_shortname'].'">
                                         '.$bank_row[$i]['bi_shortname'].' 
                                         </a>
                                        </li>';
                                }
                                else{
                                  echo '<li>
                                         <a class="gray-layered btnOver" href="javascript:;" bank_id="'.$bank_row[$i]['Tb_index'].'" title="'.$bank_row[$i]['bi_shortname'].'">
                                         '.$bank_row[$i]['bi_shortname'].' 
                                         </a>
                                        </li>';
                                }
                              }
                              
                              //-- 亂數選出銀行資訊 --
                              //-- 立即辦卡-檔案 --
                              if ($bank_row[$rand]['bd_src']=='1') {
                                $path='../other_file/'.$bank_row[$rand]['bd_path'];
                              }
                              //-- 立即辦卡-連結 --
                              elseif($bank_row[$rand]['bd_src']=='2'){
                                $path=$bank_row[$rand]['bd_url'];
                              }

                              //-- 地址 --
                              $bank_adds=explode(',', $bank_row[$rand]['bi_addr']);
                              $bank_adds=$bank_adds[0].$bank_adds[1];

                            ?>
                            
                          </ul>
                          
                          <div class="online_div">
                          <div id="<?php echo $bank_row[$rand]['Tb_index'];?>" class="bank_div">
                          <!-- 銀行簡介 -->
                          <div id="bank_detial" class="pt-3 detail_title">
                          <div class="col-md-12">
                            <div class="row onlinebg cardshap">
                              
                             <div class="col-5 col hv-center">
                              <div class="text-center">
                              <img src="../sys/img/<?php echo $bank_row[$rand]['bi_logo'];?>" title="<?php echo $bank_row[$rand]['bi_shortname'];?>">
                              <h6>銀行代碼：<?php echo $bank_row[$rand]['bi_code'];?></h6>
                              <a target="_blank" class="applycard_btn warning-layered btnOver" href="<?php echo $path;?>">立即辦卡</a>
                              </div>
                             </div>
                             
                             <div class="col-7 col">
                             <h4><?php echo $bank_row[$rand]['bi_fullname'];?>(簡稱<?php echo $bank_row[$rand]['bi_shortname'];?>)</h4>
                             <hr>
                             <p>總行電話：<?php echo $bank_row[$rand]['bi_tel'];?> <br>           
                                信用卡服務專線：<?php echo $bank_row[$rand]['bi_tel_card'];?><br>
                                總行地址：<?php echo $bank_adds;?><br>
                                銀行網址：<a target="_blank" href="<?php echo $bank_row[$rand]['bi_bank_url'];?>"><?php echo $bank_row[$rand]['bi_bank_url'];?></a>
                              </p>
                             </div>
                             
                           </div> 
                          </div> 
                         </div>
                         <!-- 銀行簡介 END -->
                         
                        <!-- 銀行單卡 -->
                        <div id="bank_card" class="row no-gutters mx-2 py-3">    
                        <div class="col-md-12 row">

                          <?php 
                           $row_bk_card=$pdo->select("SELECT cc_group_id, cc_cardname, cc_photo, cc_doc_path, cc_doc_url
                                                      FROM credit_card 
                                                      WHERE cc_bi_pk=:cc_bi_pk AND (cc_doc_path!='' OR cc_doc_url!='') 
                                                      GROUP BY cc_group_id
                                                      ORDER BY cc_publish ASC", ['cc_bi_pk'=>$bank_row[$rand]['Tb_index']]);

                           foreach ($row_bk_card as $bk_card) {

                            //-- 卡片圖 --
                            $cc_photo=empty($bk_card['cc_photo']) ? 'CardSample.png':$bk_card['cc_photo'];
                            $doc=empty($bk_card['cc_doc_url']) ? '/sys/other_file/'.$bk_card['cc_doc_path'] : $bk_card['cc_doc_url'];

                             echo '
                             <div class="pb-3 col-md-4 text-center">
                               <a class="bank_all_img" href="type.php?bi_pk01='.$bank_row[$rand]['Tb_index'].'&gid='.$bk_card['cc_group_id'].'"><img src="../sys/img/'.$cc_photo.'" ></a>
                               <h6><a class="card_name" href="type.php?bi_pk01='.$bank_row[$rand]['Tb_index'].'&gid='.$bk_card['cc_group_id'].'">'.$bk_card['cc_cardname'].'</a></h6>
                               <a class="btn mt-2 online_btn warning-layered btnOver" target="_blank" href="'.$doc.'">立即辦卡</a>
                             </div>';
                           }
                          ?>

                        
                        </div>
                        </div>
                        <!-- 銀行單卡 END -->
                        </div>
                        </div>
                        
                        <hr>
                         <div class="online_care">
                         <h5 class="text-center">－謹慎理財，信用至上，辦卡前請詳閱申請書－</h5>
                         
                          <p><b>注意事項：</b><br>
                          1.本專區所提供之檔案或網址連結，皆經該銀行授權使用，請網友放心下載與點閱。<br>
                          2.依據金管會規定，申辦信用卡皆須經申辦人親自簽名。故不論線上辦卡或下載申請書，皆須列印表單，親筆簽名後，寄回或傳真至該銀行，方可完成申辦作業。<br>
                          3.各銀行核卡程序各有不同，請申辦人依照各銀行指示辦法。<br>
                          4.申辦人不論使用線上辦卡或下載申請書等方式，本網站皆不會要求留下個人資料，以確保網友個人資料的安全性。<br>
                          5.線上辦卡者，進入該銀行官網之後，隱私權的保護已與本網站無涉，請自行參見各銀行隱私權政策。<br>
                          6.本專區僅提供辦卡訊息的服務，並不承諾或保證銀行端核卡的成功與否。所有核卡政策與權利，皆屬各銀行所有。<br>
                          7.本網站所提供的信用卡訊息，皆以該銀行公告為準。不得以本網站資料作為法律追訴使用。<br>
                          8.本網站不保證與銀行連線的成功與否，亦不負與本網站或銀行之法律追訴責任。<br>
                          9.辦卡相關問題，請逕自向各銀行信用卡部門洽詢。
                          </p>
                        </div>
                        </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--線上辦卡end -->


                      
                      
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
                                <a class="card_list_img" href="#">
                                  <img src="../img/component/card1.png" alt="" title="新聞">
                                </a>
                                <a class="btn mt-2 warning-layered btnOver" href="#">立即辦卡</a>
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
                                <a class="btn mt-2 warning-layered btnOver" href="#">立即辦卡</a>
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
                                <a class="btn mt-2 warning-layered btnOver" href="#">立即辦卡</a>
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