<div class="index-content-right col0">
    <div class="row">
        <div class="col-md-12 col">
            <div class="cardshap hotCard tab_one green_tab">
                <div class="title_tab hole">
                    <h4>熱門情報</h4>
                    <span>謹慎理財 信用至上</span>
                </div>
                <div class="content_tab">
                    
                    <?php 
                     //-- ad --
                     $ad_arr=[
                      'Tb_index'=>'ad123',
                      'ns_photo_1'=>'/img/component/photo2.jpg',
                      'ns_ftitle'=>'廣告',
                      'ns_msghtml'=>'我是廣告...',
                     ];


                     //-- 優旅行(旅行分享) --
                     $row_hot_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, ns_msghtml, mt_id, ns_nt_pk, area_id
                                                 FROM NewsAndType 
                                                 WHERE unit_id='un2019011717563437' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate 
                                                 ORDER BY ns_vfdate DESC LIMIT 0,1", ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                     for ($i=1; $i <3 ; $i++) { 
                       $row_hot_news[$i]=$ad_arr;
                     }

                     
                     //-- 優旅行(行程推薦) --
                     $row_hot_news2=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, ns_msghtml, mt_id, ns_nt_pk, area_id
                                                  FROM NewsAndType 
                                                  WHERE unit_id='un2019011717564690' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate 
                                                  ORDER BY ns_vfdate DESC LIMIT 0,1", ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

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
                                $news_url=$x==2 || $x==3 ? 'ad.php?'.$hot_news['Tb_index'] : news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);
                                //-- 判斷廣告圖片 --
                                $ns_photo_1=$x==2 || $x==3 ? $hot_news['ns_photo_1'] : '/sys/img/'.$hot_news['ns_photo_1'];
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
                                $news_url=$x==2 || $x==3 ? 'ad.php?'.$hot_news['Tb_index'] : news_url($hot_news['mt_id'], $hot_news['Tb_index'], $hot_news['ns_nt_pk'], $hot_news['area_id']);
                                //-- 判斷廣告圖片 --
                                $ns_photo_1=$x==2 || $x==3 ? $hot_news['ns_photo_1'] : '/sys/img/'.$hot_news['ns_photo_1'];
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
         <div class="green_tab">
          <form action="/travel/search_result.php" method="GET" class="row search_from">
           <input type="search" required name="keyword"  class="journey_search" placeholder="請輸入優旅行要查詢的字串">  
           <button>搜尋</button>
          </form>
         </div>  
        </div> 

         <div class="col-md-12 col">
           <div class="cardshap hotCard tab_one green_tab">
               <div class="title_tab hole">
                   <h4>區域分類 </h4>
               </div>
               <div class="content_tab">
                 <div class="journey_icon">
                   <div class="row no-gutters">

                    <?php 
                     $row_tr_type=$pdo->select("SELECT nt_name, Tb_index FROM news_type WHERE unit_id='un2019011717573494' AND OnLineOrNot=1 ORDER BY OrderBy ASC");
                     foreach ($row_tr_type as $tr_type) {
                       echo '
                       <div class="col-6 py-2 border-bottom">
                         <a href="about.php?tr_pk='.$tr_type['Tb_index'].'"> <i class="fa fa-arrow-circle-right mr-2"></i>'.$tr_type['nt_name'].'篇</a>
                       </div>';
                     }
                    ?>

                   </div>
                 </div>

               </div>
           </div>
        </div>

       
        <!-- 廣告 -->
        <div class="col-md-12 col">
            <img src="http://placehold.it/300x250" alt="">
        </div>
        <!-- 辦卡推薦 -->
       <div class="col-md-12 col">
       <div class="cardshap hotCard tab_one green_tab">
           <div class="title_tab hole">
               <h4>辦卡推薦 </h4>
           </div>
           <div class="content_tab">
               <div class="row no-gutters">
                 <div class="col-5">
                  <a class="img_a" href="#">
                    <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>
                    
                  </a>
                  <span>謹慎理財 信用至上</span>
                 </div>
                 <div class="col-7">
                  <a href="#">
                    <h4>匯豐現金回饋玉璽卡</h4>
                  </a>
                   <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                 </div>
               </div>

               <div class="row no-gutters">
                 <div class="col-5">
                  <a class="img_a" href="#">
                    <div class="img_div w-h-100" title="新聞" style="background-image: url(/img/component/photo1.jpg);"></div>

                  </a> 
                  <span>謹慎理財 信用至上</span>
                 </div>
                 <div class="col-7">
                  <a href="#">
                    <h4>匯豐現金回饋玉璽卡</h4>
                  </a>
                    <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                 </div>
               </div>

           </div>
       </div>
    </div>
    <!--辦卡推薦end-->
    <!-- 廣告 -->
        <div class="col-md-12 col">
            <img src="http://placehold.it/300x250" alt="">
        </div>
    <!-- 廣告end-->
    <div class="col-md-12 col">
       <div class="cardshap tab_one green_tab">
           <div class="title_tab hole">
               <h4>熱門旅行</h4>
           </div>
           <div class="content_tab">
               <ul class="tab_list cardu_li">
                <?php 
                 //-- 熱門旅行 --
                 $row_hot_news=$pdo->select("SELECT  n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, n.ns_ftitle
                                             FROM NewsAndType as n
                                             INNER JOIN news_click_total as nct ON nct.ack_type_pk=n.Tb_index
                                             WHERE n.area_id='at2019011117461656' AND n.ns_vfdate<>'0000-00-00 00:00:00' AND n.ns_verify=3 
                                             AND  n.StartDate<=:StartDate AND n.EndDate>=:EndDate AND nct.ack_click_date >=:day_ago
                                             GROUP BY n.Tb_index
                                             ORDER BY nct.ack_click_total DESC, n.ns_vfdate DESC
                                             LIMIT 0,7", 
                                             ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'day_ago'=>date('Y-m-d',strtotime('-7 day'))]);

                 foreach ($row_hot_news as $hot_news) {

                   $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,16, 'utf-8');
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
    <!-- 廣告end-->
    <!-- 廣告 -->
        <div class="col-md-12 col">
            <img src="http://placehold.it/300x250" alt="">
        </div>
    <!-- 廣告end-->
    <?php 
     //-- 共用Footer --
     if (wp_is_mobile()) {
        require dirname(__FILE__).'/../share_area/phone/footer.php';
     }
     else{
       require dirname(__FILE__).'/../share_area/footer.php';
      }
    ?>
    </div>
</div>