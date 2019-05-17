<!--延伸閱讀-->
  <?php 
  $ns_news_arr= explode(",",$row['ns_news']);//將資料整理為sql可以查詢，--》切成陣列--》組合成字串
  foreach($ns_news_arr as $element){
     $ns_news.= "'".$element."',";  
   }
  $ns_news = substr($ns_news, 0, -1); //去掉最後分號


  $pdo=pdo_conn();
  $sql_other=$pdo->prepare("
    SELECT ns_ftitle,ns_stitle,ns_reporter,ns_photo_1,ns_alt_1,ns_msghtml,Tb_index,StartDate,ns_date,ns_nt_pk FROM  appNews
    where ns_verify=3 and OnLineOrNot=1  
    and StartDate<='$todayis' and EndDate>='$todayis'
    and Tb_index in ($ns_news)
    order by ns_vfdate desc");


  $sql_other->execute();
  $row_others = $sql_other->fetchAll();
  $rowCount = count($row_others);//查出資料筆數

  if($rowCount>0){ // 判斷是否有資料，如果沒有資料就直接隱藏區塊
  ?>
  <div class="col-md-12 col">

      <div class="cardshap blue_tab ">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item news_tab">
          <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">延伸閱讀</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

          <div class="row no-gutters">


            <?php // 回圈跑出資料
            foreach ($row_others as $row_other) {
              $ns_ftitle_other=$row_other['ns_ftitle'];
              $ns_stitle_other=mb_substr(strip_tags($ns_ftitle_other),0, 14,"utf-8")."...";
              $Tb_index_other=$row_other['Tb_index'];
              $ns_photo_1_other=$img_url.$row_other['ns_photo_1'];
            ?>
            
              <div class="col-md-4 cards-3 py-md-2 col-6">
                 <a href="detail.php?<?php echo $Tb_index_other?>">
                     <div class="img_div" title="<?php echo $ns_ftitle_other?>" style="background-image: url(<?php echo $ns_photo_1_other?>);">
                     </div>
                     <p><?php echo $ns_stitle_other?></p>
                 </a>
              </div>

           <?php }// 回圈跑出資料 end ?>


          </div>
         
        </div>
       
      </div>
    </div>
  </div>
<?php } // 判斷是否有資料，如果沒有資料就直接隱藏區塊 end ?>
  <!--延伸閱讀end -->