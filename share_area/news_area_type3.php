<div class="col-md-12 col">

  <div class="cardshap <?php echo $tab_color?> ">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab"  href="list.php?<?php echo $nt_or_mt.'='.$nt_pk?>" ><?php echo $nt_name?></a>
        <a class="top_link" href="list.php?<?php echo $nt_or_mt.'='.$nt_pk?>"></a>
      </li>
    </ul>
    <div class="tab-content p-2" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
           <?php for($y=1;$y<=3;$y++){?>
            <div class="row no-gutters py-md-3 mx-md-4 mx-1 news_list">
                <div class="col-md-4 col-6 py-1">
                    <a class="img_div news_list_img" href="detail.php?<?php echo $id_arr[$y]?>" title="<?php echo $ns_ftitle_arr[$y]?>" style="background-image: url(<?php echo $ns_photo_1_arr[$y]?>);"></a>
                </div>
                <div class="col-md-8 col-6 pl-2 py-1 news_list_txt">
                    <a class="d-block" href="detail.php?<?php echo $id_arr[$y]?>" title="<?php echo $ns_ftitle_arr[$y]?>"><h3><?php echo $ns_ftitle_arr[$y]?></h3></a>

                    <span>(<?php echo $StartDate_arr[$y]; ?>)</span>
                </div>
            </div>
           <? }?>
      </div> 
    </div>
  </div>

</div>