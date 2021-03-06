<div class="index-content-right col0">
    
    <div class="row">
        <div class="col-md-12 col">
           <div class="cardshap hotCard tab_one blueGreen_tab">
               <div class="title_tab hole">
                   <h4>熱門情報</h4>
                   <span>謹慎理財 信用至上</span>
               </div>
               <div class="content_tab">
                
                   <?php 
                    //-- ad --
                    $ad_arr=[
                     'Tb_index'=>'ad123',
                     'ns_photo_1'=>'../img/component/photo2.jpg',
                     'ns_ftitle'=>'廣告',
                     'ns_msghtml'=>'我是廣告...',
                    ];


                    //-- 優行動PAY(懶人包) --
                    $row_hot_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, ns_msghtml 
                                                FROM appNews 
                                                WHERE ns_nt_pk='nt2019011818090030' 
                                                ORDER BY ns_fwdate DESC LIMIT 0,1");

                    for ($i=1; $i <3 ; $i++) { 
                      $row_hot_news[$i]=$ad_arr;
                    }

                    
                    //-- 優行動PAY(樂分享) --
                    $row_hot_news2=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, ns_msghtml 
                                                 FROM appNews 
                                                 WHERE ns_nt_pk='nt2019011818090996' 
                                                 ORDER BY ns_fwdate DESC LIMIT 0,1");

                    for ($i=1; $i <3 ; $i++) { 
                      $row_hot_news2[$i]=$ad_arr;
                    }
                   ?>

                   <!-- 熱門情報輪播 -->
                   <div class="swiper-container HotNews_slide">
                       <div class="swiper-wrapper">
                           <div class="swiper-slide" > 
                             <?php 
                              $x=1;
                              foreach ($row_hot_news as $hot_news) {
                               $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,15, 'utf-8');
                               $ns_msghtml=mb_substr(strip_tags(trim($hot_news['ns_msghtml'])), 0,20, 'utf-8');
                               //-- 判斷網址 --
                               $news_url=$x==2 || $x==3 ? 'ad.php?'.$hot_news['Tb_index'] : '../message/detail.php?'.$hot_news['Tb_index'];
                               //-- 判斷廣告圖片 --
                               $ns_photo_1=$x==2 || $x==3 ? $hot_news['ns_photo_1'] : '../sys/img/'.$hot_news['ns_photo_1'];
                                echo '
                               <div class="row no-gutters">
                               <div class="col-5">
                                 <a class="img_a" href="'.$news_url.'">
                                   <div class="img_div w-h-100" title="'.$hot_news['ns_ftitle'].'" style="background-image: url('.$ns_photo_1.');"></div>
                                 </a>
                               </div>
                               <div class="col-7">
                                <a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">
                                  <h4>'.$ns_ftitle.'</h4>
                                </a>
                                 <p>'.$ns_msghtml.'</p>
                               </div>
                               </div>';
                              $x++; }
                             ?>
                           </div>

                           <div class="swiper-slide" >
                             <?php 
                              $x=1;
                              foreach ($row_hot_news2 as $hot_news) {
                               $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,15, 'utf-8');
                               $ns_msghtml=mb_substr(strip_tags(trim($hot_news['ns_msghtml'])), 0,20, 'utf-8');
                               //-- 判斷網址 --
                               $news_url=$x==2 || $x==3 ? 'ad.php?'.$hot_news['Tb_index'] : '../message/detail.php?'.$hot_news['Tb_index'];
                               //-- 判斷廣告圖片 --
                               $ns_photo_1=$x==2 || $x==3 ? $hot_news['ns_photo_1'] : '../sys/img/'.$hot_news['ns_photo_1'];
                                echo '
                               <div class="row no-gutters">
                               <div class="col-5">
                                 <a class="img_a" href="'.$news_url.'">
                                   <div class="img_div w-h-100" title="'.$hot_news['ns_ftitle'].'" style="background-image: url('.$ns_photo_1.');"></div>
                                 </a>
                               </div>
                               <div class="col-7">
                                <a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">
                                  <h4>'.$ns_ftitle.'</h4>
                                </a>
                                 <p>'.$ns_msghtml.'</p>
                               </div>
                               </div>';
                              $x++; }
                             ?>
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
           
           <div class="cardshap tab_one blueGreen_tab">
             <div class="title_tab hole">
                   <h4>優行動Pay</h4>
               </div>
            <div class="tab-content pcard_back" id="myTabContent">
              <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                <form class="row search_from" action="search_result.php" method="GET">

                    <div class="col-9">
                      <select name="store_id">
                          <option value="">--所有支付--</option>

                          <?php 
                            $row_pay=$pdo->select("SELECT Tb_index, st_name FROM store WHERE st_type='st2019013117011395' AND OnLineOrNot=1 ORDER BY OrderBy, StartDate DESC");
                            foreach ($row_pay as $row_pay_one) {
                              
                              echo '<option value="'.$row_pay_one['Tb_index'].'">'.$row_pay_one['st_name'].'</option>';
                            }
                          ?>
                          
                      </select>

                      <select name="nt_id">
                          <option value="">--所有類別--</option>
                          <?php 
                            $row_nt=$pdo->select("SELECT Tb_index, nt_name FROM news_type WHERE area_id='at2019011117341414' AND OnLineOrNot=1 AND nt_sp=0 ORDER BY OrderBy");
                            foreach ($row_nt as $row_nt_one) {
                              
                              echo '<option value="'.$row_nt_one['Tb_index'].'">'.$row_nt_one['nt_name'].'</option>';
                            }
                          ?>
                         
                      </select>  
                      <input type="text" name="pay_keywords" placeholder="關鍵字搜尋...">
                    </div>

                    <div class="col-3">
                      <div class="hv-center w-h-100">
                          <button >GO</button>
                      </div>
                    </div>
                   
                </form>
              </div>
            
            </div>
          </div>
        
        </div>
        
         <!-- 廣告 -->
        <div class="col-md-12 col">
            <img src="http://placehold.it/300x250" alt="">
        </div>
        
        <div class="col-md-12 col">
           <div class="cardshap hotCard tab_one blueGreen_tab">
               <div class="title_tab hole">
                   <h4>辦卡推薦 </h4>
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

               </div>
           </div>
        </div>
         <!-- 廣告 -->
        <div class="col-md-12 col">
            <img src="http://placehold.it/300x250" alt="">
        </div>
        
        <div class="col-md-12 col">
           <div class="cardshap tab_one blueGreen_tab">
               <div class="title_tab hole">
                   <h4>熱門支付</h4>
               </div>
               <div class="content_tab">
                   <ul class="tab_list cardu_li">
                    <?php 
                     $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                                 FROM NewsAndType as n
                                                 INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                                 WHERE n.area_id='at2019011117341414' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                                 AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                                 GROUP BY n.Tb_index
                                                 ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                                 LIMIT 0,5", 
                                                 ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                     foreach ($row_hot_news as $hot_news) {

                       $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,14, 'utf-8');
                       //-------------- 網址判斷 ------------------
                       $news_url=news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);

                       echo '<li><a href="'.$news_url.'" title="'.$hot_news['ns_ftitle'].'">'.$ns_ftitle.'</a></li>';
                     }
                    ?>
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
         //-- 共用footer --
         require '../share_area/footer.php';
        ?>

    </div>
</div>