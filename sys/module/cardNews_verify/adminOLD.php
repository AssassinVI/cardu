<?php include("../../core/page/header01.php");//載入頁面heaer01?>
<style type="text/css">
	.fancybox-slide--iframe .fancybox-content {width  : 900px;max-width  : 80%;max-height : 80%;margin: 0;}
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 

if ($_GET) {

   
  //-- 版區資料 --
   $row=$NewPdo->select("SELECT * FROM appArea WHERE mt_id='site201902110948308' ORDER BY OrderBy ASC"); 
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	
<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-success">
                 <div class="panel-heading">
                     分類選擇
                 </div>
                 <div class="panel-body">
                     <div class="form-horizontal">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label" for="nt_define"><span class="text-danger">*</span> 單元分類</label>
                     		<div class="col-md-10">
                     		  <select class="form-control" id="select_area">
                     		  	<option value="">全部</option>
                     		  	<?php
                                 foreach ($row as $row_one) {
                                 	echo '<option value="'.$row_one['Tb_index'].'">'.$row_one['at_name'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     	</div>
                     	<div class="form-group">
                     		<label class="col-md-2 control-label" for="nt_define">情報分類</label>
                     		<div class="col-md-10">
                     		  <select class="form-control" id="select_type">
                     		  	<option value="">全部</option>
                     		  	
                     		  </select>
                     		</div>
                     	</div>
                     	<div class="form-group">
                     		<div class="col-md-12 text-right">
                     		    <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                     		</div>
                     	</div>
                     </div>
                 </div>
             </div>
	</div>
</div>

</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {

        $('#select_area').change(function(event) {
        	$.ajax({
        		url: 'admin_ajax.php',
        		type: 'POST',
        		dataType: 'json',
        		data: {
        			area_id: $('#select_area').val()
        		},
        		success:function (data) {

        		   $('#select_type').html('<option value="">全部</option>');

        		   $.each(data, function(index, val) {
        		   	 
        		   	 $('#select_type').append('<option value="'+this['Tb_index']+'">'+this['nt_name']+'</option>');
        		   });
        		}
        	});
        	
        });

        $('#search_btn').click(function(event) {
        	var select_area=$('#select_area').val();
        	var select_type=$('#select_type').val();
        	location.href='admin_list.php?MT_id=<?php echo $_GET['MT_id'];?>&area_id='+select_area+'&ns_nt_pk='+select_type;
        });
	});


	$(window).on('load', function(event) {
		$.ajax({
        		url: 'admin_ajax.php',
        		type: 'POST',
        		dataType: 'json',
        		data: {
        			area_id: $('#select_area').val()
        		},
        		success:function (data) {

        		   $('#select_type').html('<option value="">全部</option>');

        		   $.each(data, function(index, val) {
        		   	 
        		   	 $('#select_type').append('<option value="'+this['Tb_index']+'">'+this['nt_name']+'</option>');
        		   });
        		}
        	});
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
