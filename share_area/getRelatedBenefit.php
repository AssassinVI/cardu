<!--相關好康-->
<?php 
  //在sql_type_temp中，查出所有news_type, 並藉此查出所有的分類下的新聞
  //例如：
  //$sql_type_temp="SELECT * FROM `news_type` WHERE `unit_id` LIKE 'un2019011716575635'";

  require('../share_area/getNewsType.php');



  //查詢上方類別
  $ns_store=$temparray[1];
  $pdo_OLD=pdo_conn();
  $sql_card=$pdo_OLD->prepare("
    SELECT ns_ftitle,ns_stitle,ns_reporter,ns_photo_1,ns_alt_1,ns_msghtml,Tb_index,StartDate,ns_date,ns_nt_pk FROM  appNews
    where ns_verify=3 and OnLineOrNot=1  
    and StartDate<='$todayis' and EndDate>='$todayis'
    and ns_store='$ns_store'
    and ns_nt_pk in ($type_all_id) 
    order by ns_vfdate desc
    LIMIT 0, 3
    ");

  $sql_card->execute();
  $row_card2s = $sql_card->fetchAll();
  $rowCount2 = count($row_card2s);//查出資料筆數

  if($rowCount2>0 and $ns_store<>'no'){ // 判斷XXＸ更多好康是否有資料，如果沒有資料就直接隱藏區塊
  ?>
<div class="bank_main hole <?php echo $tab_style; ?> py-2">
  <h5>相關好康</h5>
  <a class="float-right more_ot_btn" href="about_message.php?store_id=<?php echo $ns_store; ?>">More</a>
</div>

<div class="row no-gutters">
  <?php // 回圈跑出資料
  foreach ($row_card2s as $row_card2) {
    $ns_ftitle_other2=$row_card2['ns_ftitle'];
    $ns_stitle_other2=mb_substr(strip_tags($ns_ftitle_other2),0, 14,"utf-8")."...";
    $Tb_index_other2=$row_card2['Tb_index'];
    $ns_photo_1_other2=$img_url.$row_card2['ns_photo_1'];
  ?>
    <div class="col-md-4 col-12 cards-3 text-center py-md-2 py-2">

      <div class="row no-gutters ">
        <div class="col-md-12 col-6">
          <a class="news_list_img" target="_blank" href="<?php echo $url;?>" title="<?php echo $ns_ftitle_other2?>">
              <div class="img_div"  style="background-image: url(<?php echo $ns_photo_1_other2?>);">
              </div>
              
          </a>
        </div>
        <div class="col-md-12 col-6 cards-3-ph">
          <a href="<?php echo $url;?>" target="_blank" title="<?php echo $ns_ftitle_other2?>">
           <span class="text-center p-0"><?php echo $ns_stitle_other2?></span>
          </a>
        </div>
      </div>
       
    </div>
  <?php }// 回圈跑出資料 end ?>
</div>
<?php } // 判斷XXＸ更多好康是否有資料，如果沒有資料就直接隱藏區塊 end ?>
<!--相關好康end -->