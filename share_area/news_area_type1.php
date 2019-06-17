<?php 
  $sp_url=!empty($is_sp) ? '&sp=1':'';
  $tab_url='list.php?'.$nt_or_mt.'='.$nt_pk.$sp_url;
  
?>

<div class="col-md-12 col">

    <div class="cardshap <?php echo $tab_color?> mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="<?php echo $tab_url;?>" tab-target="#special_1" aria-selected="true"><?php echo $nt_name?></a>
        <a class="top_link" href="<?php echo $tab_url;?>"></a>
      </li>
    </ul>
    <div class="tab-content p-2" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters">
             <div class="col-12 bigcard py-md-2">

               <!-- 手機用分類輪播 -->
               <div class="sub_ph_slide swiper-container">
                   <div class="swiper-wrapper">

                    <?php for($y=1;$y<=3;$y++){?>

                       <div class="swiper-slide" > 
                         <a href="detail.php?<?php echo $id_arr[$y]?>" title="<?php echo $ns_ftitle_arr[$y]?>" class="img_div" style="background-image: url(<?php echo $ns_photo_1_arr[$y]?>);">
                             <p><?php echo $ns_ftitle_arr[$y];?></p>
                         </a>
                       </div>
                    <?}?>


                   </div>
                   <!-- 如果需要分页器 -->
                   <div class="swiper-pagination"></div>
                   
                   <!-- 如果需要导航按钮 -->
                   <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                   <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
               </div>
               <!-- 手機用分類輪播 END -->

            </div>
            <?php for($y=4;$y<=5;$y++){?>
            <div class="col-md-4 cards-3 col-6 py-2">

               <a href="detail.php?<?php echo $id_arr[$y]?>">
                   <div class="img_div" title="<?php echo $ns_ftitle_arr[$y]?>" style="background-image: url(<?php echo $ns_photo_1_arr[$y]?>);">
                   </div>
                   <p><?php echo mb_substr($ns_ftitle_arr[$y], 0,10,'utf-8') ;?></p>
               </a>
            </div>
            <? }?>
        </div>
       
      </div>
      
     
     
    </div>
  </div>
</div>