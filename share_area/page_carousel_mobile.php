<div class="col-md-12 col"> 
  <div id="iNews" class="cardshap news_slide">
      <!-- <div class="title hole">新聞專題</div> -->
      

      <div class="swiper-container">
        <?php 

        //===================================
        //取出最新 6筆資料,依審核完成時間--刊頭輪播動畫
        //===================================
        $pdo=pdo_conn();
        $sql=$pdo->prepare($sql_carousel);
        $sql->execute();
        ?>
          <div class="swiper-wrapper">
              <?php 
                $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
              //echo "222".$row['ns_ftitle']."<br>";
                if($i==1){
                  $activeornot="active";
                }else{
                  $activeornot="";
                }

              $id=$row['Tb_index'];
              $ns_ftitle=$row['ns_ftitle'];
              $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 15,"utf-8");
              $ns_photo_1="../sys/img/".$row['ns_photo_1'];
              $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");

              $photo1.="<a href=\"detail.php?$id\" index_img=\"$i\" title=\"$ns_ftitle\" class=\"img_div $activeornot\" style=\"background-image: url($ns_photo_1);\"></a>\n";
              ?>

              <div class="swiper-slide" title="<?php echo $ns_ftitle?>" style="background-image: url(<?php echo $ns_photo_1?>);"> 
                <a href="detail.php?<?php echo $id?>">
                    <div class="word shadow_text" ><?php echo $ns_ftitle?></div>
                </a>
              </div>
        <?php $i++; } //end ?>

          </div>
          <!-- 如果需要分页器 -->
          <div class="swiper-pagination"></div>
          
          <!-- 如果需要导航按钮 -->
          <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
          <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
          
      </div>
  </div>
</div>