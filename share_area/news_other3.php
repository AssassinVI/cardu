<!--相關好康-->

  <?php 
  $pdo=pdo_conn();
  $sql_other3=$pdo->prepare("
    SELECT ns_ftitle,ns_stitle,ns_reporter,ns_photo_1,ns_alt_1,ns_msghtml,Tb_index,StartDate,ns_date,ns_nt_pk FROM  appNews
    where ns_verify=3 and OnLineOrNot=1  
    and StartDate<='$todayis' and EndDate>='$todayis'
    and ns_nt_pk='$pk'
    and Tb_index<>'$temparray[1]'
    order by ns_vfdate desc
    LIMIT 0, 3
    ");


  $sql_other3->execute();
  $row_other3s = $sql_other3->fetchAll();
  $rowCount3 = count($row_other3s);//查出資料筆數

  if($rowCount3>0){ // 判斷XXＸ更多好康是否有資料，如果沒有資料就直接隱藏區塊
  ?>
<div class="col-md-12 col">

    <div class="cardshap <?php echo $tab_style?> ">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">相關好康</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters">


              <?php // 回圈跑出資料
              foreach ($row_other3s as $row_other3) {
                $ns_ftitle_other2=$row_other3['ns_ftitle'];
                $ns_stitle_other2=mb_substr(strip_tags($ns_ftitle_other2),0, 14,"utf-8")."...";
                $Tb_index_other2=$row_other3['Tb_index'];
                $ns_photo_1_other2=$img_url.$row_other3['ns_photo_1'];
              ?>

            <div class="col-md-4 cards-3 py-md-2 col-12">
               <a href="detail.php?<?php echo $Tb_index_other2?>">
                   <div class="img_div w-100-ph" title="<?php echo $ns_ftitle_other2?>" style="background-image: url(<?php echo $ns_photo_1_other2?>);">
                   </div>
                   <p><?php echo $ns_stitle_other2?></p>
               </a>
            </div>

            <?php }// 回圈跑出資料 end ?>
            

           
        </div>
       
      </div>
     
    </div>
  </div>
</div>
<?php } // 判斷XXＸ更多好康是否有資料，如果沒有資料就直接隱藏區塊 end ?>
<!--相關好康end -->