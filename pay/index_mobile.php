<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優行動Pay</title>

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
  <body class="pay_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         require '../share_area/phone/header.php';
        ?>
        
        <!-- 麵包屑 -->
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">優行動Pay</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                
                <div class="row">

                  <?php 
                  //先取出優行動pay的分類，再從優行動pay的分類中，把appNews load出來，優行動pay版區id為at2019011117341414
                       $pdo=pdo_conn();
                       $sql_area=$pdo->prepare("SELECT Tb_index FROM `news_type` WHERE `area_id` LIKE 'at2019011117341414'");
                       $sql_area->execute();
                       $row_areas = $sql_area->fetchAll();

                       foreach ($row_areas as $row_area) {
                           $unit_all_id.="'".$row_area['Tb_index']."',";
                        }
                       $unit_all_id = substr($unit_all_id, 0, -1); //去掉最後一碼，

                       
                   //============================================
                   //手機版刊頭輪播
                   //ns_verify=3 and OnLineOrNot=1 確認文章上線
                   //設定好sql後，交由 page_carousel.php執行
                   //============================================
                   $sql_carousel="
                    SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
                    where mt_id = 'site2019011116095854'
                    and ns_verify=3 and OnLineOrNot=1 
                    and  StartDate<='$todayis' and EndDate>='$todayis'
                    order by ns_vfdate desc
                    LIMIT 0, 6
                    ";

                    require("../share_area/page_carousel_mobile.php"); //暫入手機版刊頭輪播上
                    //手機版刊頭輪播end 
                    ?>

                    <!--廣告-->
                    <div class="col-md-12 col banner"><img src="http://placehold.it/750x100" alt="banner"></div><!--banner end -->
                    
                   
                    
                    <!--Pay總攬-->
                    <div class="col-md-12 col">
                       <div class="cardshap blueGreen_tab">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item news_tab">
                                <a class="nav-link active pl-30 py-2" id="all_1-tab" href="all.php"  aria-controls="all_1" aria-selected="true">Pay總覽</a>
                                <a class="top_link" href="all.php"></a>
                              </li>
                            </ul>
                             <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all_1" role="tabpanel" aria-labelledby="all_1-tab">

                             <div class="row">
                              <?php 
                              $pdo=pdo_conn();
                              $sql_pay=$pdo->prepare("SELECT * FROM store where st_type='st2019013117011395' and OnLineOrNot=1 order by st_name LIMIT 0, 3");
                              $sql_pay->execute();

                              $i=1; while ($row_pay=$sql_pay->fetch(PDO::FETCH_ASSOC)) {
                              ?>

                               <div class="col-md-4 col">
                                 <div class="cardshap pay-4 pb-2">
                                   <a href="about.php?<?php echo $row_pay['Tb_index']?>" title="<?php echo $row_pay['st_name']?>">
                                     <img src="../sys/img/<?php echo $row_pay['st_logo']?>">
                                     <h3><?php echo $row_pay['st_name']?></h3>
                                   </a>
                                </div>
                              </div>


                             <?php 
                             $i++; }?>
                          </div>
                           
                          </div>
                      
                        </div>
                       </div>
                    </div>
                 
                    <!--Pay總攬end -->
                     
                     <!--廣告-->


                     <?php 
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //特別議題：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     $queryfield = 'area_id'; //要查詢的欄位
                     $tab_mtid=$area_id; //代入優先動payID，
                     $tab_color='blueGreen_tab'; //介面顏色
                     require('../share_area/news_special.php');
                     ?>


                   
                     <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->

                    <?php 
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //Pay攻略：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     $sqltemp = "
                                SELECT nt_name,Tb_index,pk FROM news_type
                                where unit_id='un2019011717535610' and nt_sp=0 
                                and OnLineOrNot=1
                                order by OrderBy  
                                LIMIT 0, 2"; 

                     $tab_color='blueGreen_tab'; //介面顏色
                     $list_template='news_area_type2.php';//選擇樣版
                     require('../share_area/news_cagalog.php');
                     ?>
                    
                    
                    <!--廣告-->
                    <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/365x100" alt="">
                        </div>
                    </div>
                    <!--廣告end-->
                   

                   <?php 
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     //Pay優惠：：：：：：：：：：：：：：：：：：：：：：：
                     //：：：：：：：：：：：：：：：：：：：：：：：：：：：
                     $sqltemp = "
                                SELECT nt_name,Tb_index,pk FROM news_type
                                where unit_id='un2019011717534416' and nt_sp=0 
                                and OnLineOrNot=1
                                order by OrderBy  
                                LIMIT 0, 10"; 

                     $tab_color='blueGreen_tab'; //介面顏色
                     $list_template='news_area_type3.php';//選擇樣版
                     require('../share_area/news_cagalog.php');
                     ?>
                   
                     

                     




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one blueGreen_tab">
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
                       
                       <div class="cardshap tab_one blueGreen_tab">
                         <div class="title_tab hole">
                               <h4>優行動pay</h4>
                           </div>
                        <div class="tab-content ccard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select>
                                      <option value="">--所有支付--</option>
                                      <option value="第一銀行">第一銀行</option>
                                      <option value="台新銀行">台新銀行</option>
                                      <option value="渣打銀行">渣打銀行</option>
                                  </select>

                                  <select>
                                      <option value="">--所有類別--</option>
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
                        
                        </div>
                      </div>
                    
                    </div>

                    

                    <div class="col-md-12 col">
                       <div class="cardshap tab_one blueGreen_tab">
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