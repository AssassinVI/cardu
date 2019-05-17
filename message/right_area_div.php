<div class="index-content-right col0">
                
                <div class="row">
                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>熱門情報 </h4>
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


                             //-- 卡情報(懶人包) --
                             $row_hot_news=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, ns_msghtml 
                                                         FROM appNews 
                                                         WHERE mt_id='site201901111555425' AND ns_nt_pk='nt201902121003178' 
                                                         ORDER BY ns_fwdate DESC LIMIT 0,1");

                             for ($i=1; $i <3 ; $i++) { 
                               $row_hot_news[$i]=$ad_arr;
                             }

                             
                             //-- 卡情報(開卡文) --
                             $row_hot_news2=$pdo->select("SELECT Tb_index, ns_photo_1, ns_ftitle, ns_msghtml 
                                                          FROM appNews 
                                                          WHERE mt_id='site201901111555425' AND ns_nt_pk='nt2019021210032563' 
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
                                        $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,10, 'utf-8');
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
                                         <a href="'.$news_url.'">
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
                                        $ns_ftitle=mb_substr($hot_news['ns_ftitle'], 0,10, 'utf-8');
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
                                         <a href="'.$news_url.'">
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
                       
                       <div class="cardshap brown_tab mouseHover_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active pl-30" id="card-tab" tab-target="#card" href="javascript:;"  aria-selected="true">
                                <i class="icon" style="background-image: url(../img/component/icon/cardNews/icon1.png);"></i>信用卡快搜
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link pl-30" id="right-tab" tab-target="#right" href="javascript:;"  aria-selected="false">
                                <i class="icon" style="background-image: url(../img/component/icon_down/cardNews/icon2.png); background-size: 80%;"></i>權益快搜
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content ccard_back" id="myTabContent">
                          <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  <select class="c_search_bk">
                                      <option value="">--選擇銀行--</option>
                                      <?php 
                                        $row_bank=$pdo->select("SELECT Tb_index, bi_shortname FROM bank_info ORDER BY bi_code ASC");
                                        foreach ($row_bank as $row_bank_one) {
                                          echo '<option value="'.$row_bank_one['Tb_index'].'">'.$row_bank_one['bi_shortname'].'</option>';
                                        }
                                      ?>
                                  </select>

                                  <select class="c_search_cc">
                                      <option value="">--選擇信用卡--</option>
                                  </select>  
                                </div>

                                <div class="col-3">
                                  <div class="hv-center w-h-100">
                                      <button id="c_search_btn" type="button">GO</button>
                                  </div>
                                </div>
                               
                            </form>
                          </div>
                          <div class="tab-pane fade" id="right" role="tabpanel" aria-labelledby="right-tab">
                            <form class="row search_from">

                                <div class="col-9">
                                  
                                  <select class="int_search_item">
                                      <option value="">選擇比較的權益項目</option>
                                      <?php 
                                        $row_int=$pdo->select("SELECT Tb_index, eq_name FROM card_eq_item WHERE mt_id='site2019021216245137' AND eq_type IN ('small','big') ORDER BY OrderBy ASC");
                                        foreach ($row_int as $row_int_one) {
                                          echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                        }
                                      ?>
                                  </select>

                                  <select class="int_search_item">
                                      <option value="">選擇比較的權益項目</option>
                                      <?php 
                                        foreach ($row_int as $row_int_one) {
                                          echo '<option value="'.$row_int_one['Tb_index'].'">'.$row_int_one['eq_name'].'</option>';
                                        }
                                      ?>
                                  </select>
                                </div>

                                <div class="col-3">
                                 <div class="hv-center w-h-100">
                                   <button id="int_search_btn" type="button">GO</button>
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
                       <div class="cardshap hotCard tab_one brown_tab">
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
                                   <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
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
                                    <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
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
                       <div class="cardshap hotCard tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>瀏覽過信用卡 </h4>
                                <a class="more_link" href="../rank/browse_detail.php"></a>
                           </div>
                           <div class="content_tab">
                               
                               <?php 
                                if (!empty($_COOKIE['cc_id'])) {
                                  $cc_id_arr=explode(',', $_COOKIE['cc_id']);
                                  $cc_id_txt='';
                                  $cc_id_num=count($cc_id_arr);
                                  $cc_id_num_max=$cc_id_num>3 ? $cc_id_num-3:0;
                                  for ($i=$cc_id_num-1; $i >=$cc_id_num_max ; $i--) { 
                                    $row_cookie_cc=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_cardname, cc.cc_photo, cc.cc_interest_desc, bk.bi_shortname, org.org_nickname, level.attr_name
                                                                 FROM credit_card as cc
                                                                 INNER JOIN bank_info as bk ON bk.Tb_index=cc.cc_bi_pk
                                                                 INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                                                 INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                                                 WHERE cc.Tb_index=:Tb_index", ['Tb_index'=>$cc_id_arr[$i]], 'one');

                                    $card_name=$row_cookie_cc['bi_shortname'].$row_cookie_cc['cc_cardname'].$row_cookie_cc['org_nickname'].$row_cookie_cc['attr_name'];
                                    $card_name=mb_strlen($card_name, 'utf-8')>9 ? mb_substr($card_name, 0,9,'utf-8'):$card_name;
                                    //-- 特色 --
                                    $card_adv_txt='';
                                    $card_adv=preg_split('/\n/',$row_cookie_cc['cc_interest_desc']);
                                    $x=1;
                                    foreach ($card_adv as $card_adv_one) {
                                      if ($x>2) {break; }
                                      $card_adv_one_txt=mb_strlen($card_adv_one, 'utf-8')>9 ? mb_substr($card_adv_one, 0,9,'utf-8'):$card_adv_one;
                                      $card_adv_txt.='<b>●</b>'.$card_adv_one_txt.'</br>';
                                      $x++;
                                    }

                                    //-- 卡片圖 --
                                    $cc_photo=empty($row_cookie_cc['cc_photo']) ? 'CardSample.png':$row_cookie_cc['cc_photo'];
                                    
                                     echo '
                                     <div class="row no-gutters">
                                     <div class="col-6">
                                      <a class="img_a hv-center" href="../cardNews/creditcard.php?cc_pk='.$row_cookie_cc['Tb_index'].'&cc_group_id='.$row_cookie_cc['cc_group_id'].'">
                                        <img src="../sys/img/'.$cc_photo.'" style="height:100%;" title="'.$card_name.'">
                                      </a>
                                     </div>
                                     <div class="col-6">
                                      <a href="<?php echo $URL;?>/rank/browse_detail.php">
                                        <h4>'.$card_name.'</h4>
                                      </a>
                                      <p>
                                       '.$card_adv_txt.'
                                      </p>
                                     </div>
                                     </div>';

                                  }
                                
                                }
                               ?>


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

                    <div class="col-md-12 col">
                       <div class="cardshap tab_one brown_tab">
                           <div class="title_tab hole">
                               <h4>熱門好康</h4>
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
                    
                  
                    
                    <?php 
                     //-- 共用footer --
                     require '../share_area/footer.php';
                    ?>
                    

                </div>
            </div>