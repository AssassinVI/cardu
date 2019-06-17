
   <!-- Header -->
      <div class="header_div">
        <div class="row">
            <div class="col-md-12 text-right col0"  id="TopInfo">
              <?php 
                if (empty($_SESSION['ud_pk'])) {
                  echo '<span>Hi,  您尚未登入唷！</span>       <a href="/member/sign_second.php">註冊會員</a>      <a href="javascript:;" data-fancybox data-src="#member_div">會員登入</a>';
                }
                else{
                  echo '<span>Hi,  '.$_SESSION['ud_nickname'].'</span>｜<a href="/index.php?logout">登出</a>';
                }
              ?>
                
            </div>
            
            <div id="index_head_left" class="col0 hv-center">
              <div>
                <a href="<?php echo $URL;?>">
                 <img src="/img/component/logo.png" alt="" >
                </a>
              </div>
            </div>

            <div id="index_head_right" class="col0">
                    <div class="col" >
                        <div id="menu">
                         <ul >

                           <!--============================================ 新聞 ======================================-->
                            <li>
                              <a href="/news/news.php">新聞</a>
                               <div class="cardshap dropDown_menu">
                                 <div class="row news_list_menu">
                                   <?php 
                                     $row_newsType=$pdo->select("SELECT nt_name, pk, OrderBy
                                                                 FROM news_type
                                                                 WHERE mt_id='site2018111910445721' AND nt_sp=1 AND nt_sp_idx=1 AND OnLineOrNot=1 
                                                                 AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>= :nt_sp_end_date

                                                                 UNION
                                                                 
                                                                 SELECT nt_name, pk, OrderBy
                                                                 FROM news_type 
                                                                 WHERE mt_id='site2018111910445721' AND nt_sp=0 AND OnLineOrNot=1 
                                                                 ORDER BY OrderBy ASC", ['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
                                     foreach ($row_newsType as $newsType) {
                                       
                                       echo '<div class="col-md-3"><a href="/news/list.php?nt_pk='.$newsType['pk'].'">'.$newsType['nt_name'].'</a></div>';
                                     }
                                   ?>
                                 </div>

                                 <div class="row news_img_menu">
                                  <?php 
                                     $row_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, nt_name, pk
                                                             FROM  NewsAndType
                                                             where mt_id = 'site2018111910430599' AND ns_vfdate<>'0000-00-00 00:00:00' AND ns_verify=3 
                                                             AND  StartDate<=:StartDate AND EndDate>=:EndDate
                                                             order by ns_vfdate desc
                                                             LIMIT 0, 4",
                                                             ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                     foreach ($row_news as $news_one) {

                                       $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                       $ns_ftitle=mb_substr(trim($news_one['ns_ftitle']), 0,10,'utf-8').'...';

                                       echo '
                                       <div class="col-md-3">
                                         <a href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                           <div class="img_div w-h-100" style="background-image: url(/sys/img/'.$news_one['ns_photo_1'].');">
                                           </div>
                                           <p>'.$ns_ftitle.'</p>
                                         </a>
                                       </div>';
                                     }
                                   ?>
                                  
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 新聞 ======================================-->

                            <!--============================================ 卡排行 ======================================-->
                            <li>
                              <a href="/rank/rank.php">卡排行</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">
                                   <div class="col-md-3">
                                    <h4>卡優排行</h4>
                                     
                                     <?php 
                                      $row_rankType=$pdo->select("SELECT old_id, cc_so_cname FROM credit_cardrank_type WHERE cc_so_status=1 ORDER BY cc_so_order ASC");
                                      $row_rankType_num=count($row_rankType);
                                      for ($i=0; $i <2 ; $i++) { 
                                        
                                        $TypeOne_txt='';
                                        $count_j=ceil($row_rankType_num/2);
                                        for ($j=0; $j <$count_j ; $j++) { 
                                          $index=($i*$count_j)+$j;
                                          if (!empty($row_rankType[$index]['old_id'])) {
                                            $TypeOne_txt.='<li><a href="/rank/cardrank.php?'.$row_rankType[$index]['old_id'].'">'.$row_rankType[$index]['cc_so_cname'].'</a></li>';
                                          }
                                        }

                                        $rank_txt='<ul class="ul-2-part">'.$TypeOne_txt.'</ul>';
                                        echo $rank_txt;
                                      }
                                     ?>

                                  </div>
                                   <div class="col-md-3">
                                    <h4>人氣排行</h4>
                                    <ul>
                                      <li><a href="/rank/newcard.php">新卡人氣排行</a></li>
                                      <li><a href="/rank/apply.php">辦卡人氣排行</a></li>
                                      <li><a href="/rank/click.php">點閱人氣排行</a></li>
                                    </ul>
                                  </div>
                                   <div class="col-md-3">
                                    <h4>卡比較</h4>
                                    <ul>
                                      <li><a href="/rank/compare01.php">新手快搜</a></li>
                                      <li><a href="/rank/compare02.php">卡片比一比</a></li>
                                      <li><a href="/rank/compare03.php">權益比一比</a></li>
                                    </ul>
                                  </div>
                                   <div class="col-md-3">
                                    <h4>卡計算</h4>
                                    <ul>
                                      <li><a href="#">回饋/紅利/里程計算機</a></li>
                                      <li><a href="#">海外刷卡計算</a></li>
                                      <li><a href="#">卡速配小測驗</a></li>
                                    </ul>
                                  </div>
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 卡排行 END ======================================-->
                            

                            <!--============================================ 卡情報 ======================================-->
                            <li>
                              <a href="/card/card.php">卡情報</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">
                                   <div class="col-md-3">
                                    <h4>卡資訊</h4>
                                    <ul>
                                      <li><a href="/card/new_card_list.php">新卡訊</a></li>
                                      <li><a href="/card/card_browse.php">卡總覽</a></li>
                                      <li><a href="/card/bank_list.php">銀行總覽</a></li>
                                      <li><a href="/card/interests_list.php">權益變更</a></li>
                                    </ul>
                                  </div>

                                  <?php 
                                   //-- 套用 share_area/fun.php   MENU fun --
                                   menu_newsType('at2019021114154632','col-md-3','message');
                                   ?>
                                   

                                   <div class="col-md-3">
                                    <h4>線上辦卡</h4>
                                    <ul>
                                      <li><a href="/card/card_assign.php">線上辦卡</a></li>
                                    </ul>
                                  </div>
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 卡情報 END ======================================-->

                            <!--============================================ 優行動Pay ======================================-->
                            <li>
                              <a href="/mpay/mpay.php">優行動Pay</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">
                                   <div class="col-md-4">
                                    <h4>Pay資訊</h4>
                                    <ul>
                                      <li><a href="/mpay/all.php">Pay總覽</a></li>
                                    </ul>
                                  </div>

                                  <?php 
                                   //-- 套用 share_area/fun.php   MENU fun --
                                   menu_newsType('at2019011117341414','col-md-4','mpay');
                                   ?>
                                   
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 優行動Pay END ======================================-->

                            <!--============================================ 優票證 ======================================-->
                            <li>
                              <a href="/eticket/eticket.php">優票證</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">
                                   <div class="col-md-4">
                                    <h4>票證資訊</h4>
                                    <ul>
                                      <li><a href="/eticket/all.php">票證總覽</a></li>
                                    </ul>
                                  </div>
                                   
                                   <?php 
                                    //-- 套用 share_area/fun.php   MENU fun --
                                    menu_newsType('at2019011117435970','col-md-4','eticket');
                                    ?>
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 優票證 END ======================================-->

                            <!--============================================ 優集點 ======================================-->
                            <li>
                              <a href="/epoint/epoint.php">優集點</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">
                                   <div class="col-md-4">
                                    <h4>集點資訊</h4>
                                    <ul>
                                      <li><a href="/epoint/all.php">點數平台</a></li>
                                      <li><a href="/epoint/all2.php">集點店家</a></li>
                                    </ul>
                                  </div>
                                   
                                   <?php 
                                    //-- 套用 share_area/fun.php   MENU fun --
                                    menu_newsType('at2019011117443626','col-md-4','epoint');
                                    ?>
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 優集點 END ======================================-->

                            <!--============================================ 優旅行 ======================================-->
                            <li>
                              <a href="/travel/index.php">優旅行</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">

                                   <div class="col">
                                    <a href="/travel/share.php"><h4>旅行分享</h4></a>
                                   </div>
                                  <div class="col">
                                    <a href="/travel/recommend.php"><h4>行程推薦</h4></a>
                                  </div>
                                   <div class="col">
                                    <a href="/travel/tip.php"><h4>刷卡祕笈</h4></a>
                                  </div>
                                  <div class="col">
                                    <a href="/travel/preferential.php"><h4>優惠情報</h4></a>
                                  </div>
                                  <div class="col">
                                    <a href="/travel/jp/index.php"><h4>日本嬉遊趣</h4></a>
                                  </div>
                                 </div>
                                 <div class="row news_img_menu">

                                  <?php 
                                     $row_news=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, nt_name, pk
                                                             FROM  NewsAndType
                                                             where area_id = 'at2019011117461656' AND ns_vfdate<>'0000-00-00 00:00:00' AND ns_verify=3 
                                                             AND  StartDate<=:StartDate AND EndDate>=:EndDate
                                                             order by ns_vfdate desc
                                                             LIMIT 0, 4",
                                                             ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                                     foreach ($row_news as $news_one) {

                                       $url=news_url($news_one['mt_id'], $news_one['Tb_index'], $news_one['ns_nt_pk'], $news_one['area_id']);
                                       $ns_ftitle=mb_substr(trim($news_one['ns_ftitle']), 0,10,'utf-8').'...';

                                       echo '
                                       <div class="col-md-3">
                                         <a href="'.$url.'" title="'.$news_one['ns_ftitle'].'">
                                           <div class="img_div w-h-100" style="background-image: url(/sys/img/'.$news_one['ns_photo_1'].');">
                                           </div>
                                           <p>'.$ns_ftitle.'</p>
                                         </a>
                                       </div>';
                                     }
                                   ?>
                                   
                                 </div>
                               </div>
                            </li>
                            <!--============================================ 優旅行 END ======================================-->


                            <li><a href="#">討論區</a></li>
                            <li>
                              <a href="/member/member.php">會員中心</a>
                              <div class="cardshap dropDown_menu">
                                 <div class="row list_menu">
                                   <div class="col-md-6">
                                    <h4>會員專區</h4>
                                    <ul class="ul-2-part">
                                      <li><a href="/member/index.php">會員資料</a></li>
                                      <li><a href="/member/annouce_second.php">卡優公告</a></li>
                                      <li><a href="/member/event_second.php">卡優活動</a></li>
                                      <li><a href="#">卡優貼紙</a></li>

                                      
                                    </ul>
                                    <ul class="ul-2-part">
                                      <li><a href="#">電子報</a></li>
                                      <li><a href="/member/service.php">客服中心</a></li>
                                    </ul>
                                  </div>
                                   <div class="col-md-6">
                                    <h4>我的卡優</h4>
                                    <ul class="ul-2-part">
                                      <li><a href="/member/mycard.php">我的信用卡</a></li>
                                      <li><a href="/member/mybill.php">我的帳單</a></li>
                                      <li><a href="/member/myinfo.php">我的資訊</a></li>
                                      <li><a href="/member/mypen.php">我的文章</a></li>
                                      
                                    </ul>
                                    <ul class="ul-2-part">
                                      <li><a href="/member/mycollect.php">我的收藏</a></li>
                                      <li><a href="/member/mydate.php">我的行事曆</a></li>
                                    </ul>
                                    
                                  </div>
                                   
                                 </div>
                               </div>
                            </li>
                            <li><a id="searchBtn"><img src="/img/component/icon_search.png" alt=""></a></li>
                        </ul>
                        </div>

                       <!-- search_box -->
                       <div class="search_box">
                         <form id="search_box_form">
                          <div class="form-row">
                            <div class=" col-8">
                              <input class="form-control" type="text" name="search_txt" placeholder="搜尋">
                            </div>
                            <div class=" col-3">
                              <a href="javascript:;" class="btn search_box_btn">搜尋</a>
                            </div>
                            <div class=" col-1">
                              <a href="javascript:;" class="btn close_btn">Ｘ</a>
                            </div>
                         </div>
                         </form>
                       </div>
                       <!-- search_box END -->

                    </div>
                
                <div class="row">
                    <div class="col-md-11 col text-right" ><img src="http://placehold.it/750x100" alt="banner"></div>
                    <div class="col-md-1 col  text-left">
                        <!-- <div id="icon_head_fb" class="col0"><a href="#"><img src="img/component/icon_facebook.png" alt=""></a></div>
                        <div id="icon_head_rss" class="col0"><a href="#"><img src="img/component/icon_rss.png" alt=""></a></div> -->
                        <div  class="col0 icon_head"><a target="_blank" href="https://www.facebook.com/cardu.tw/"><li class="fa fa-facebook"></li></a></div>
                        <div  class="col0 icon_head"><a target="_blank" href="https://www.cardu.com.tw/rss/cardurss.xml"><li class="fa fa-rss"></li></a></div>
                    </div>
                </div>                
            </div>
            
            <!-- 會員登入 -->
            <?php 
              $ud_userid_lg=empty($_COOKIE['remember_id']) ? '' : $_COOKIE['remember_id'];
              $ck_remember_id=empty($_COOKIE['remember_id']) ? '' : 'checked';
            ?>
            <div id="member_div" >
              <div class="mem_logo">
                <img src="/img/component/logo_ph.png"  alt="">
              </div>
              <h2>卡優會員登入</h2>
              <form id="form_login" action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" name="ud_userid_lg"  placeholder="會員帳號" value="<?php echo $ud_userid_lg;?>">
                  
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="ud_password_lg"  placeholder="會員密碼">
                </div>
                <div class="form-group">
                  <label><input type="checkbox" name="remember_id" value="1" <?php echo $ck_remember_id;?>> 記住我的帳號 </label>
                  <a href="/member/password.php">忘記密碼</a>
                </div>
                <div class="form-group">
                  <button class="login_btn">登入</button>
                  <p>還不是會員嗎?<a href="/member/sign_second.php">立即註冊</a></p>
                </div>
                <div class="form-group">
                  <p class="text-center">或使用以下帳號登入</p>
                  <div class="row no-gutters">
                    <div class="col-6">
                      <a id="mem_FB_login" class="other_login_btn fb_color" href="#">Facebook</a>
                    </div>
                    <div class="col-6">
                      <!-- <a class="other_login_btn google_color" href="#">Google</a> -->
                      <button id="mem_G_login" type="button" class="btn btnOver">Google</button>
                      <!-- <a href="javascript:;" onclick="signOut();">out</a> -->
                    </div>
                  </div>
                </div>
                <input type="hidden" name="login" value="Y">
              </form>
            </div>
            <!-- 會員登入 END -->

            <div class="clearfix"></div>
         </div>
        </div>
        <!-- Header end-->

        <!-- TOP 按鈕 -->
        <div class="top_div">
          <a href="javascript:;">
            <i class="fa fa-chevron-up"></i>
            <p>top</p>
          </a>
        </div>

        <!-- 左邊浮動廣告 -->
        <div class="left-ad">
        </div>

        <!-- 右邊浮動廣告 -->
        <div class="right-ad">
           <img src="http://placehold.it/180x300" alt="banner">
          <!-- 卡片比一比 -->
          <div class="card_compare mt-3">
            <h4><button class="contrast_card_close" type="button">Ｘ</button></h4>
            
            <div class="card_compare_div">
              <p class="text-center m-0">卡片比一比</p>
              
              <div class="contrast_card_div">
                <!-- <div class="card">
                  <button type="button">Ｘ</button>
                  <a href="#"><img class="w-100" src="../img/component/card3.png" alt=""></a>
                </div>
                <div class="card">
                  <button type="button">Ｘ</button>
                  <a href="#"><img class="w-100" src="../img/component/card3.png" alt=""></a>
                </div>
                <div class="card">
                  <button type="button">Ｘ</button>
                  <a href="#"><img class="w-100" src="../img/component/card3.png" alt=""></a>
                </div> -->
              </div>
              <div class="text-center">
                <a class="contrast_card_submit btn warning-layered btnOver" href="javascript:;" >比較卡片</a>
              </div>

            </div>
          </div>
          
        </div>
        