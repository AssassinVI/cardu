<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優票證</title>

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
  <body class="ticket_body">

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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="javascript:;">優票證</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

              
                
                <div class="row">
                 <div class="col-md-12 col">
                  <?php 
                   //============================================
                   //每頁的輪播 (手機)
                   //設定好sql後，交由 func.php執行
                   //============================================
                   //-- 優票證pay單元 --
                   $ns_nt_ot_pk_query="";
                   $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE area_id='$area_id'");
                   foreach ($row_newsType as $newsType) {
                    $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                   }
                   $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);


                   $sql_carousel="
                                  SELECT ns_ftitle, ns_photo_1, ns_msghtml, Tb_index, ns_nt_pk, mt_id, area_id FROM  NewsAndType
                                  where ns_verify=3 and OnLineOrNot=1 and StartDate<=:StartDate and EndDate>=:EndDate and (area_id=:area_id OR $ns_nt_ot_pk_query )
                                  order by ns_vfdate desc
                                  LIMIT 0, 10
                                 ";

                   slide_ph($sql_carousel, ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'area_id'=>$area_id]);
                  ?>
                  </div>


                    <!--廣告-->
                    <div class="col-md-12 col banner"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    
                   <!--特別議題-->
                    <div class="col-md-12 col">

                        <div class="cardshap pink_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="all-tab" href="all.php" aria-controls="all" aria-selected="true">票證總覽</a>
                            <a class="top_link" href="all.php"></a>
                          </li>
                          
                        </ul>
                        <div class="tab-content p-2" id="myTabContent">
                          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            
                              <!-- 手機板總覽輪播 -->
                              <div class="sub_ph_slide swiper-container">

                                  <div class="swiper-wrapper">

                                      <div class="swiper-slide">
                                        <div class="row no-gutters ticket_card">

                              <?php 
                              $pdo_OLD=pdo_conn();
                              $sql_pay=$pdo_OLD->prepare("SELECT * FROM store where st_type='st201901311701269' and OnLineOrNot=1 order by st_name LIMIT 0, 4");
                              $sql_pay->execute();

                              $i=1; while ($row_pay=$sql_pay->fetch(PDO::FETCH_ASSOC)) {
                                  if($i % 2 == 1 and $i>2 ){
                                    echo "</div>
                                          </div>

                                          <div class=\"swiper-slide\">
                                            <div class=\"row no-gutters ticket_card\">";
                                  } //每兩個一組
                              ?>
                                          <div class="col-md-3 cards-4 col-6 py-3">
                                            <div class="cardshap ticket_img hv-center">
                                            <a href="about.php?<?php echo $row_pay['Tb_index']?>" title="<?php echo $row_pay['st_name']?>">
                                              <img src="../sys/img/<?php echo $row_pay['st_logo']?>">
                                              <h4><?php echo $row_pay['st_name']?></h4>
                                            </a>
                                          </div>
                                          </div>
                              <?php 
                              
                             $i++; }?>


                                        </div>
                                      </div>

                                  </div>
                                  
                                  <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                  <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                  
                              </div>
                              <!-- 手機板總覽輪播 END -->
                                

                          </div>
                          

                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
                     <!--廣告-->
                    <div class="col-md-12 col banner"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    <!--特別議題1-->
                    <?php 

                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //特別議題 ：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     area_nt_sp_list_ph($area_id, 'eticket', 'pink_tab');
                     ?>
                    <!--特別議題2end -->
                    
                   
                    <?php 

                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //票證攻略 ：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     area_nt2_list_ph('un2019011717541797', 'eticket', 'pink_tab');
                     ?>
                    
                   
                   <?php 

                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //票證優惠 ：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     area_nt_list_ph('un2019011717541054', 'eticket', 'pink_tab');
                     ?>


                    <!--手機板信用卡推薦-->
                    <div class="col-md-12 col d-md-none d-sm-block">

                        <div class="cardshap pink_tab exception">
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
                   

                    <!-- 懸浮廣告 -->
                    <div class="ad_fixed_ph">
                      <div class="swiper-container sub_ph_slide">
                          <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <a href="#"><img class="w-100" src="http://placehold.it/900x180" alt=""></a>
                              </div>
                              <div class="swiper-slide">
                                 <a href="#"><img class="w-100" src="http://placehold.it/900x180" alt=""></a>
                              </div>
                          </div>
                          
                          <!-- 如果需要导航按钮 -->
                          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                      </div>
                    </div>
                    <!-- 懸浮廣告 END -->

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one pink_tab">
                           <div class="title_tab hole">
                               <h4>熱門優惠 </h4>
                               <span>謹慎理財 信用至上</span>
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
                    </div>

                    <div class="col-md-12 col">
                       
                       <div class="cardshap tab_one pink_tab">
                           <div class="title_tab hole">
                               <h4>優票證</h4>
                           </div>
                        <div style="background-image: url(../img/component/t_card.png);" class="tab-content ccard_back" id="myTabContent">
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
                                  <input type="text" value="enter text..."> 
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

                                  <div style="font-size: 15px;">
                                      <label>白金卡以上 <input type="checkbox" name=""></label>｜<label>白金卡 <input type="checkbox" name=""></label>｜<label>金卡/普卡 <input type="checkbox" name=""></label>
                                  </div>  
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
                       <div class="cardshap tab_one pink_tab">
                           <div class="title_tab hole">
                               <h4>熱門支付</h4>
                           </div>
                           <div class="content_tab">
                               <ul class="tab_list cardu_li">
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                                <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                            </ul>
                           </div>
                       </div>
                    </div>
                    
                    <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
                    </div>
                     <!-- 廣告 -->
                    <div class="col-md-12 col">
                        <img src="http://placehold.it/300x250" alt="">
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


    <?php 
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>

  </body>
</html>