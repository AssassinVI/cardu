<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('news_type', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];
   	 pdo_delete('news_type', $where);
   }
   
   //-- 版區資料 --
   
   //-- 優情報 --
   if ($_GET['MT_id']=='site2019011116103929') {
     $row=$NewPdo->select("SELECT * FROM appArea WHERE mt_id='site2019011116102369' ORDER BY OrderBy ASC");
   }
   //-- 卡情報 --
   elseif($_GET['MT_id']=='site2019011115561564'){
     $row=$NewPdo->select("SELECT * FROM appArea WHERE mt_id='site201902110948308' ORDER BY OrderBy ASC");
   }
   

}

?>


<div class="wrapper wrapper-content animated fadeInRight">



			<div class="panel panel-success" style="width: 600px;">
                 <div class="panel-heading">
                     版區選擇
                 </div>
                 <div class="panel-body">
                     <div class="form-horizontal">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label" for="nt_define">版區</label>
                     		<div class="col-md-8">
                     		  <select class="form-control" id="select_area">
                     		  	<?php
                                 foreach ($row as $row_one) {
                                 	echo '<option value="'.$row_one['Tb_index'].'">'.$row_one['at_name'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     		<div class="col-md-2">
                     		    <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                     		</div>
                     	</div>
                     </div>
                 </div>
             </div>



   

</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {
		
     $('#search_btn').click(function(event) {
     	var select_area=$('#select_area').val();
     	location.href='admin_type.php?MT_id=<?php echo $_GET['MT_id'];?>&area_id='+select_area;
     });

  
  });
		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
