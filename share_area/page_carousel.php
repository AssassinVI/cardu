<?php 
                    $todayis=date("Y-m-d");

                    //===================================
                    //取出最新 12筆資料,依審核完成時間--刊頭輪播動畫
                    //===================================
                    $pdo=pdo_conn();
                    $sql=$pdo->prepare($sql_carousel);
                    $sql->execute();


                    //分批取出part1---------
                    $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                      //echo count($row);
                      //echo "222".$row['ns_ftitle']."<br>";
                        if($i==1){
                          $activeornot="active";
                        }else{
                          $activeornot="";
                        }

                      $id=$row['Tb_index'];
                      $ns_ftitle=$row['ns_ftitle'];
                      $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 14,"utf-8")."...";
                      $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                      $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

                      $photo1.="<a href=\"detail.php?$id\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";


                      $msg1.="<a class=\"$activeornot\" href=\"detail.php?$id\" index=\"$i\" title=\"$ns_ftitle\">
                                <h4>$ns_stitle</h4>
                                <p>$ns_msghtml...</p>
                              </a>\n";
                      if ( $i==4 ) break;
                    $i++; } //end part1


                    //分批取出part2---------
                    $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                      $activeornot=""; //預設後面都沒有囉

                      $id=$row['Tb_index'];
                      $ns_ftitle=$row['ns_ftitle'];
                      $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 14,"utf-8")."...";
                      $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                      $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

                      $photo2.="<a href=\"detail.php?$id\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";


                      $msg2.="<a class=\"$activeornot\" href=\"detail.php?$id\" index=\"$i\" title=\"$ns_ftitle\">
                                <h4>$ns_stitle</h4>
                                <p>$ns_msghtml...</p>
                              </a>\n";
                      if ( $i==4 ) break;
                    $i++; } //end part2


                    //分批取出part3---------
                    $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                      $activeornot=""; //預設後面都沒有囉

                      $id=$row['Tb_index'];
                      $ns_ftitle=$row['ns_ftitle'];
                      $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 14,"utf-8")."...";
                      $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                      $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

                      $photo3.="<a href=\"detail.php?$id\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";


                      $msg3.="<a class=\"$activeornot\" href=\"detail.php?$id\" index=\"$i\" title=\"$ns_ftitle\">
                                <h4>$ns_stitle</h4>
                                <p>$ns_msghtml...</p>
                              </a>\n";
                      if ( $i==4 ) break;
                    $i++; } //end part3


                    //$row_count = $sql->fetchAll();
                    ?>


                    <div class="col-md-12 col">
                      <!-- 四小三大輪播 -->
                      <div id="new_iNews" class="cardshap new_slide">
                          <div class="swiper-container">
                              <div class="swiper-wrapper">

                                  <div class="swiper-slide" > 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <?php echo $photo1?>
                                      </div>
                                      <div class="slide_list">
                                         <?php echo $msg1?>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="swiper-slide"> 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <?php echo $photo2?>
                                      </div>
                                      <div class="slide_list">
                                        <?php echo $msg2?>
                                      </div>
                                    </div>
                                  </div>
                                <!--尚未加入廣告之前，先不出現
                                  <div class="swiper-slide" > 
                                    <div class="slide_div">
                                      <div class="slide_img">
                                        <?php echo $photo3?>
                                      </div>
                                      <div class="slide_list">
                                        <?php echo $msg3?>
                                      </div>
                                    </div>
                                  </div>
                                -->


                              </div>
                              <!-- 如果需要分页器 -->
                              <div class="swiper-pagination"></div>

                          </div>
                      </div>
                      <!-- 四小三大輪播 END -->
                      </div>
