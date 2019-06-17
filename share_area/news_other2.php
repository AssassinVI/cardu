<!--XXＸ更多好康-->
<?php 
  $ns_store=$row['ns_store'];
  $pdo_OLD=pdo_conn();
  $sql_other2=$pdo_OLD->prepare("
    SELECT ns_ftitle,ns_stitle,ns_reporter,ns_photo_1,ns_alt_1,ns_msghtml,Tb_index,StartDate,ns_date,ns_nt_pk, mt_id, area_id FROM  NewsAndType
    where ns_verify=3 and OnLineOrNot=1  
    and StartDate<='$todayis' and EndDate>='$todayis'
    and ns_store='$ns_store'
    and Tb_index<>'$temparray[1]'
    order by ns_vfdate desc
    LIMIT 0, 3
    ");


  $sql_other2->execute();
  $row_other2s = $sql_other2->fetchAll();
  $rowCount2 = count($row_other2s);//查出資料筆數

  if($rowCount2>0 and $ns_store<>'no'){ // 判斷XXＸ更多好康是否有資料，如果沒有資料就直接隱藏區塊
  ?>
<div class="col-md-12 col">

    <div class="cardshap <?php echo $tab_style?> ">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true"><?php echo $st_name?>更多好康</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters">

              <?php // 回圈跑出資料
              $x=1;
              foreach ($row_other2s as $row_other2) {
                $ns_ftitle_other2=$row_other2['ns_ftitle'];
                $ns_stitle_other2=mb_substr(strip_tags($ns_ftitle_other2),0, 14,"utf-8")."...";
                $Tb_index_other2=$row_other2['Tb_index'];
                $ns_photo_1_other2=$img_url.$row_other2['ns_photo_1'];
                $url=news_url($row_other2['mt_id'], $row_other2['Tb_index'], $row_other2['ns_nt_pk'], $row_other2['area_id']);


                //-- 手機樣式 --
                if (wp_is_mobile() && $x>2) {

                  if ($x==3) {
                    echo ' 
                       <div class="row no-gutters py-md-3 mx-md-4 news_list">
                        <div class="col-md-4 col-6 py-2 ">
                           <a target="_blank" class="img_div news_list_img" href="#" style="background-image: url(https://placehold.it/150x100);"></a>
                        </div>
                         <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                          <div class="mb-2">
                           
                             <h3>
                              <a target="_blank" href="#" >我是廣告我是廣告我是廣告我是廣告 </a>
                             </h3>
                           
                          </div>
                         </div>
                        </div>';
                  }
                  
                  echo '
                      <div class="row no-gutters py-md-3 mx-md-4 news_list">
                        <div class="col-md-4 col-6 py-2 ">
                           <a target="_blank" class="img_div news_list_img" href="'.$url.'" style="background-image: url('.$ns_photo_1_other2.');"></a>
                        </div>
                         <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                          <div class="mb-2">
                           <h3>
                            <a target="_blank" href="'.$url.'" title="'.$row_other['ns_ftitle'].'">'.$ns_ftitle_other2.'</a>
                           </h3>
                            
                          </div>
                         </div>
                        </div>';
                }

                //-- 電腦樣式 --
                else{

                 echo '
                  <div class="col-md-4 cards-3 py-md-2 col-6">
                     <a target="_blank" href="'.$url.'" title="'.$ns_ftitle_other2.'">
                         <div class="img_div"  style="background-image: url('.$ns_photo_1_other2.');">
                         </div>
                         <p>'.$ns_stitle_other2.'</p>
                     </a>
                  </div>';
                }

           $x++; 
           }// 回圈跑出資料 end ?>


        </div>
       
      </div>
     
    </div>
  </div>
</div>
<?php } // 判斷XXＸ更多好康是否有資料，如果沒有資料就直接隱藏區塊 end ?>
<!--XXＸ更多好康end -->