<?php 
//熱門新聞
$sql_hotnews=$pdo->prepare("
                        SELECT ns_ftitle,Tb_index FROM  appNews
                        where mt_id = 'site2018111910430599' and ns_vfdate<>'0000-00-00 00:00:00' 
                        and  StartDate<='$todayis' and EndDate>='$todayis'
                        order by ns_mobvecount desc
                        LIMIT 0, 4
                        ");
$sql_hotnews->execute();


?>
<div class="col-md-12 col">
   <div class="cardshap tab_one blue_tab">
       <div class="title_tab hole">
           <h4>熱門新聞</h4>
       </div>
       <div class="content_tab">
           <ul class="tab_list cardu_li">
            <?php $i=1; while ($row_hotnews=$sql_hotnews->fetch(PDO::FETCH_ASSOC)) {
              $ns_ftitle=$ns_msghtml=mb_substr(strip_tags($row_hotnews['ns_ftitle']),0, 14,"utf-8");
              $id=$row_hotnews['Tb_index'];

            ?>

            <li><a href="detail.php?<?php echo $id;?>" title="<?php echo $row_hotnews['ns_ftitle']?>"><?php echo $ns_ftitle;?>...</a></li>
            <?php $i++; }?>

        </ul>
       </div>
   </div>
</div>