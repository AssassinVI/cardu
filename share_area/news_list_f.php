<?php
//算出上一頁 及 下一頁＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
if($PageNo<=1){$prepage=1;}else{$prepage=$PageNo-1;}
if($PageNo>=$totalpage){$nextpage=$totalpage;}else{$nextpage=$PageNo+1;}
?>
<div class="col-12 page">
  <span>第<?echo $PageNo?>頁( 共<?echo $totalpage?>頁 )</span>
  <a href="list.php?nt_pk=<?php echo $pk?>&PageNo=<?php echo $prepage?>"><i class="fa fa-angle-left"></i>上一頁</a>
  <select onChange="location = this.options[this.selectedIndex].value;" id="pagenum">
    <?php for($i=1;$i<=$totalpage;$i++){?>
    <option value="list.php?nt_pk=<?php echo $pk?>&PageNo=<?php echo $i;?>">第<?php echo $i;?>頁</option>
    <?php }?>
  </select>

  <a href="list.php?nt_pk=<?php echo $pk?>&PageNo=<?php echo $nextpage?>">下一頁 <i class="fa fa-angle-right"></i></a>
</div>