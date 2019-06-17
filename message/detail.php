<?php 
 require '../share_area/conn.php';

 //-- 紀錄LOG --
 message_click_total($_SERVER['QUERY_STRING']);

 $row_message=$pdo->select("SELECT * FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

 $ns_msghtml=mb_substr(strip_tags($row_message['ns_msghtml']), 0,100);
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $row_message['ns_ftitle']; ?>｜卡優新聞網</title>

    <meta name="keywords" content="<?php echo $row_message['ns_ftitle']; ?>,<?php echo $row_message['nt_name']; ?>,卡好康"/>  
    <meta name="description" content="<?php echo $ns_msghtml.'...';?>" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     //-- fb資料設定 --
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $row_message['ns_ftitle']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $row_message['ns_ftitle']; ?>" />
    <meta property="og:description" content="<?php echo $ns_msghtml.'...';?>" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>
  </head>


  <body class="cardNews_body">
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="card.php">卡情報</a> / <a href="list.php?mt_pk=<?php echo $row_message['pk'];?>"><?php echo $row_message['nt_name']; ?></a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left detail_page col0">

                <div class="row">



                    <div class="col-md-12 col">

                      <div class="cardshap ">
                        <div class="pt-3 mx-3 detail_title">
                          <h2><?php echo $row_message['ns_ftitle']; ?></h2>
                          <div class="row no-gutters my-3">

                            <div class="col-md-8">
                              <h4><?php echo $row_message['ns_stitle']; ?></h4>
                            </div>
                            <div class="col-md-6">

                             <?php 
                               
                               //-- 關聯銀行 --
                               $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname, bk.bi_logo
                                                       FROM appNews_bank_card as abc
                                                       INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                                       WHERE news_id=:news_id
                                                       GROUP BY abc.bank_id", ['news_id'=>$row_message['Tb_index']]);
                               
                               $back_num=count($row_back);
                               $back_txt=$back_num==1 ? '<a title="'.$row_back[0]['bi_shortname'].'" href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">
                                                          <img class="icon_top" src="../sys/img/'.$row_back[0]['bi_logo'].'"> 
                                                        </a>' : '';

                               //--------- 活動日期 ----------
                               if ($row_message['activity_e_date']!='0000-00-00') {
                               	$activity_s_date=$row_message['activity_s_date']!='0000-00-00' ? $row_message['activity_s_date']:'即日起';
                               	$activity_date=$back_txt.'<p>活動時間： '.$activity_s_date.'~'.$row_message['activity_e_date'].'</p>';
                               }
                               else{
                               	$activity_date='';
                               }


                               echo $activity_date;
                             ?>
                              <!-- <a href=""><img class="icon_top" src="../img/component/pay.png"> </a><p>活動時間： 20XX/XX/XX~20XX/XX/XX</p> -->
                            </div>
                            <div class="col-md-6">
                               <?php 
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 // 新聞內頁分享功能按鈕 In share_area/func.php：：：：：：：：：：：：：：：：：：：：：：：
                                 // ：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：：
                                 news_share_btn($FB_URL, $_SERVER['QUERY_STRING']); 
                               ?>
                            </div>
                          </div> 

                         
                        </div>

                        <div class="pb-3 mx-3 detail_content">
                          <div class="con_img">
                            <img src="../sys/img/<?php echo $row_message['ns_photo_1'] ;?>" alt="">
                            <?php 
                             if (!empty($row_message['ns_alt_1'])) {
                               echo '<p>'.$row_message['ns_alt_1'].'</p>';
                             }
                            ?>
                          </div>

                          <?php 
                           echo $row_message['ns_msghtml'];
                          ?>
                          
                            <!-- <p>
                            喜歡旅遊的你，每次出國旅行前必準備的東西有哪些呢？首先當然要訂機票、住宿，另外旅平險也是人人出國必備之一，出國總是要保個心安。還有小編每次出國一定必帶的WiFi分享器。
                            </p>
                            <p>
                            最重要的出國一定要瘋狂血拼，若不想帶太多現金在身上，最方便的就是刷信用卡。出國旅遊帶一張合適的信用卡刷卡消費，到海外血拼才可以買得盡興，不用擔心被收取交易手續費，『現金回饋』是小編覺得比較有感的刷卡福利。
                            </p>
                            <p>
                            在國外使用信用卡刷卡，會有一筆國外交易手續費，其中使用Master、Visa、JCB需付1.5%、美國運通則是2%。這時候選擇信用卡，就要考慮海外消費現金回饋高於1.5%的，這樣才不會被charge到手續費，以海外消費現金回饋來看，匯豐銀行現金回饋御璽卡、元大銀行鑽金卡、國泰世華現金回饋御璽卡，都有2%以上的海外刷卡金回饋，用這幾張信用卡，不但可以省去手續費，還可賺到現金。
                            </p>
                            <p><b>【匯豐現金回饋御璽卡】</b><br>
                            ●現金回饋：國內1.22%；國外2.22%。<br>
                            ●住宿訂房優惠：Expedia酒店住宿9折、agoda訂房93折優惠 、HotelQuickly首訂85折、AsiaYo首訂93折、SWISSÔTEL <br>
                            ●瑞士酒店及度假村酒店享優惠房價和免費早餐、指定Small Luxury Hotels of the World™酒店房價優惠，住2晚享額外1晚免費。<br>
                            ●行程票券：KKday 旅遊體驗 95折、KLOOK日韓行程最優9折。<br>
                            ●租車暢遊：Rentalcars租車95折。<br>
                            ●租借WiFi：jetfi WiFi租5日享3日免費、all享租借日韓2日免費、GLOBAL WiFi全航線75折+寄件免運、Willing go WiFi日韓每日優惠價149元。<br>
                            ●旅遊優惠：指定行程優惠最高可折1萬2千元。<br>
                            ●國內外機票：華航全球航線95折(部分國家出發航線不適用)。</p>
                            
                            <p>
                            ●國際組織海內外優惠：日本購物折扣＋禮券、韓國購物最優8折、香港美食最優買一送一、凱悅集團買3送1、Hotels.com享92折。
                            </p>
                            <p>
                            ●旅遊保障：2,000萬旅平險、10萬公共交通工具意外傷害醫療保險。
                            </p>
                            
                            <p>
                            <a href="#">>>還沒有匯豐卡嗎?立即申辦拿好禮</a>
                            </p> -->
                           

                            <!-- 注意事項 -->
                            <?php 
                             if (!empty($row_message['note'])) {
                               echo '<p>
                                       <b>◎注意事項：</b><br>
                                       '.nl2br($row_message['note']).'
                                     </p>';
                             }
                            ?>
                            <!-- 注意事項 END -->

                            <!-- <p>
                            	<b>◎注意事項：</b><br>
                              1.新戶定義於核卡前六個月內須未持有滙豐信用卡正卡或附卡，且於滙豐銀行未有任何未繳清之信用卡帳款
                              (包含但不限於一般消費帳款、年費、利息、違約金及各項手續費等)，原持有滙豐信用卡而辦理升等、加辦或轉卡者不得適用。<br>
                              2.如有其他未盡事項請依匯豐銀行公告為主。
                            </p> -->
                            
                            
                            <!-- 延伸閱讀 -->
                            <?php 
                             if (!empty($row_message['ns_news'])) {
                                
                                $ns_news_txt='';
                             	$ns_news=explode(',', $row_message['ns_news']);
                             	foreach ($ns_news as $ns_news_one) {
                             	  $ns_news_txt.="'".$ns_news_one."',";
                             	}
                             	$ns_news_txt=substr($ns_news_txt, 0,-1);
                                
                                $o_news_txt='';
                             	$row_o_news=$pdo->select("SELECT Tb_index, ns_ftitle, mt_id, area_id, ns_nt_pk FROM NewsAndType WHERE Tb_index IN ($ns_news_txt)");
                                foreach ($row_o_news as $o_news) {

                                  $url=news_url($o_news['mt_id'], $o_news['Tb_index'], $o_news['ns_nt_pk'], $o_news['area_id']);
                                  $o_news_txt.='▶▶<a href="'.$url.'">'.$o_news['ns_ftitle'].'</a><br>';
                                }
                             	
                             	echo '
                             	 <p><b>◎延伸閱讀</b><br>
                                   '.$o_news_txt.'
                                 </p>';
                             }
                            ?>

                            <!-- <p><b>◎延伸閱讀</b><br>
                            ▶▶<a href="#">【RichartX蝦皮】小資省錢術!高額回饋金大放送</a><br>
                            ▶▶<a href="#">【信用卡推薦】小資族最愛！澳盛現金回饋卡刷小額高回饋5%</a><br>
                            ▶▶<a href="#">【分享文】台北富邦 VISA無限卡 核卡心得</a>
                            </p> -->
                            <!-- 延伸閱讀 END -->


                          <div class="col-md-12 col hv-center">
                            <div class="row paybg">
                             <div class="col-md-4 hv-center">
                              <p>☆謹慎理財，信用至上☆</p>
                             </div>
                             <div class="col-md-8 hv-center">
                              <p>本文中之活動內容以該銀行、公司公告為準<br>
                                 本文中之各註冊商標、公司名稱，皆屬該公司所有</p>
                             </div> 
                           </div> 
                          </div>
                          

                          

                         
                        </div>

                      </div>
                    </div>

                    
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
                    <!--手機板廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner d-md-none d-sm-block ">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                     <!--XXＸ更多好康-->
                     <?php 

                         $back_num=count($row_back);

                         if ($back_num==1) {
                           
                           $row_c_news=$pdo->select("SELECT ns_ftitle, ns_photo_1, Tb_index, area_id, ns_nt_pk, mt_id
                                                     FROM NewsAndType 
                                                     WHERE area_id='at2019021114154632' AND ns_bank LIKE :ns_bank AND Tb_index!=:Tb_index
                                                     ORDER BY ns_vfdate DESC
                                                     LIMIT 0,3", ['Tb_index'=>$row_message['Tb_index'], 'ns_bank'=>'%'.$row_back['bank_id'].'%']);
                           $c_news_txt='';
                           foreach ($row_c_news as $c_news) {

                           	$url=news_url($c_news['mt_id'], $c_news['Tb_index'], $c_news['ns_nt_pk'], $c_news['area_id']);
                           	$ns_ftitle=mb_substr($c_news['ns_ftitle'], 0,15,'utf-8');

                           	$c_news_txt.='
                           	    <div class="col-md-4 col-12 cards-3 py-md-2">
                                   <a href="'.$url.'" title="'.$c_news['ns_ftitle'].'">
                                       <div class="img_div w-100-ph"  style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');">
                                       </div>
                                       <p>'.$ns_ftitle.'</p>
                                   </a>
                                </div>';
                           }

                           $back_news_txt='
                        <div class="col-md-12 col">
                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">'.$row_back[0]['bi_shortname'].'更多好康</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">

                                '.$c_news_txt.'

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';

                    echo $back_news_txt;
                     }
                     ?>
                    
                    <!--XXＸ更多好康end -->
                       <!--相關好康-->
                    <div class="col-md-12 col">
                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">相關好康</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
                            <div class="row no-gutters">
                               
                               <?php 
                                 $row_c_news=$pdo->select("SELECT ns_ftitle, ns_photo_1, Tb_index, area_id, ns_nt_pk, mt_id
                                                           FROM NewsAndType 
                                                           WHERE ns_nt_pk=:ns_nt_pk AND Tb_index!=:Tb_index
                                                           ORDER BY ns_vfdate DESC
                                                           LIMIT 0,3", ['Tb_index'=>$row_message['Tb_index'], 'ns_nt_pk'=>$row_message['ns_nt_pk']]);
                                 $c_news_txt='';
                                 foreach ($row_c_news as $c_news) {

                                 	$url=news_url($c_news['mt_id'], $c_news['Tb_index'], $c_news['ns_nt_pk'], $c_news['area_id']);
                                 	$ns_ftitle=mb_substr($c_news['ns_ftitle'], 0,15,'utf-8');

                                 	$c_news_txt.='
                                 	    <div class="col-md-4 col-12 cards-3 py-md-2">
                                         <a href="'.$url.'" title="'.$c_news['ns_ftitle'].'">
                                             <div class="img_div w-100-ph"  style="background-image: url(../sys/img/'.$c_news['ns_photo_1'].');">
                                             </div>
                                             <p>'.$ns_ftitle.'</p>
                                         </a>
                                      </div>';
                                 }

                                 echo $c_news_txt;
                               ?>

                                <!-- <div class="col-md-4 cards-3 py-md-2">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-md-4 cards-3 py-md-2">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div>
                                <div class="col-md-4 cards-3 py-md-2">
                                   <a href="#">
                                       <div class="img_div w-100-ph" title="新聞" style="background-image: url(../img/component/photo1.jpg);">
                                       </div>
                                       <p>遊日血拚大回饋，信用卡大調查</p>
                                   </a>
                                </div> -->
                               
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--相關好康end -->


                    
                    
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

                    
                    <!--信用卡推薦-->
                    <div class="col-md-12 col phone_hidden">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">信用卡推薦</a>
                          </li>
                        </ul>
                        <div class="tab-content py-md-4 py-0" id="myTabContent">
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
                              <div class="col-md-4">
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
                              <div class="col-md-4">
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
                              <div class="col-md-4">
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
                              



                    <!--網友留言-->
                    <div id="message_area" class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">網友留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <p>您尚未登入，請先<a href="#">登入會員</a></p>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--網友留言end -->


                    <!--Facebook留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap brown_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">Facebook留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="fb-comments" data-width="100%" data-href="<?php echo $FB_URL;?>" data-numposts="5"></div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->

                   <div class="col-12 py-4">
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

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <?php 
     //-- 共用js --
     require '../share_area/share_js.php';
    ?>

    <script type="text/javascript">
      $(document).ready(function() {
        //-- alt 圖說 --
        img_txt('.detail_content p img');
      });
    </script>

  </body>
</html>