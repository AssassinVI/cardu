<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	#st_main_type{ display: none; }
	#st_second_type{ display: none; }
	#search_div{ display: none; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
  //-- 商店分類 --
   $row_type=$NewPdo->select("SELECT * FROM store_type ORDER BY OrderBy ASC");

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>商店搜尋
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form   class="form-horizontal put_form">

						<div class="form-group">
							<label class="control-label col-md-2"><span class="text-danger">*</span> 類別與名稱</label>
							<div class="col-md-10">
								<select id="st_type" >
									<option value="">-- 商店類別 --</option>
									<?php
                                      foreach ($row_type as $row_type_one) {
                                      	echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['st_name'].'</option>';
                                      }
                     		  	    ?>
								</select>
								<select id="st_main_type" >
									<option value="">-- 商店主分類 --</option>
								</select>
								<select id="st_second_type" >
									<option value="">-- 商店次分類 --</option>
								</select>
								<select id="st_name" >
									<option value="">-- 商店名稱 --</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-2">關鍵字</label>
							<div class="col-md-10">
								<input type="text" id="st_keyWord" class="form-control">
							</div>
						</div>
                        
                        <div class="form-group">
                        	<div class="col-md-12 text-center">
								<button type="button" id="search_store" class="btn btn-success">搜尋</button>
							</div>
                        </div>
						
						<div class="form-group">
						  <div class="col-md-12 ">
							<label>無商店 <input id="no_store" type="radio" name="ns_store" st_name="無商店" value="no"></label>
						  </div>
						</div>
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


        <div id="search_div" class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>搜尋結果</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>商店類別</th>
									<th>主分類</th>
									<th>次分類</th>
									<th>商店全名</th>
									<th>商店狀態</th>
									<th>管理</th>

								</tr>
							</thead>
							<tbody>

							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>

							</tbody>
						</table>
					</div>

					<div class="text-right">
							<label >
								到 
								<select class="page_select">
							    </select>
						   </label>
					</div>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
		

		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6">
							<button type="button" class="btn btn-default btn-block btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
						</div>
						<div class="col-xs-6">
						   <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">確定</button>
						</div>
					</div>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
        
        //-- 選擇商店類別 --
		$('#st_type').change(function(event) {

          //-- 集點店家 其他 --
		  if ($('#st_type').val()=='st2019013117015133' || $('#st_type').val()=='st201901311701582') {

		  	$('#st_main_type').css('display', 'inline-block');
		  	$('#st_second_type').css('display', 'inline-block');

		  	//-- 撈主分類 --
		  	$.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   st_type: $(this).val()
		  	 },
		  	 success:function (data) {
		  	 	
		  	 	
		  	   $("#st_main_type").html('<option value="">-- 商店主分類 --</option>');
		  	   $("#st_second_type").html('<option value="">-- 商店次分類 --</option>');
		  	   $("#st_name").html('<option value="">-- 商店名稱 --</option>');
		  	   $.each(data, function(index, val) {
		  	      $("#st_main_type").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
		  	   });
		  	 }
		  	});
		  }

		  else{

		  	$('#st_main_type').css('display', 'none');
		  	$('#st_second_type').css('display', 'none');
            
            //-- 撈商店名稱 --
		  	$.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   st_type: $(this).val()
		  	 },
		  	 success:function (data) {

		  	   $("#st_main_type").html('<option value="">-- 商店主分類 --</option>');
		  	   $("#st_second_type").html('<option value="">-- 商店次分類 --</option>');
		  	   $("#st_name").html('<option value="">-- 商店名稱 --</option>');
		  	   $.each(data, function(index, val) {
		  	      $("#st_name").append('<option value="'+this['st_name']+'">'+this['st_name']+'</option>');
		  	   });
		  	 }
		  	});
		  }
		  
		});
        //-- 選擇商店類別 END --

        //-- 選擇主分類 --
        $('#st_main_type').change(function(event){
          //-- 撈次分類 --
          $.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   st_main_type: $(this).val()
		  	 },
		  	 success:function (data) {
		  	 	
		  	   $("#st_second_type").html('<option value="">-- 商店次分類 --</option>');
		  	   $("#st_name").html('<option value="">-- 商店名稱 --</option>');
		  	   $.each(data, function(index, val) {
		  	      $("#st_second_type").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
		  	   });
		  	 }
		  	});
        });
        //-- 選擇主分類 END --

        //-- 選擇次分類 --
        $('#st_second_type').change(function(event){
          //-- 撈次分類 --
          $.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   st_second_type: $(this).val()
		  	 },
		  	 success:function (data) {
		  	 	
		  	   $("#st_name").html('<option value="">-- 商店名稱 --</option>');
		  	   $.each(data, function(index, val) {
		  	      $("#st_name").append('<option value="'+this['st_name']+'">'+this['st_name']+'</option>');
		  	   });
		  	 }
		  	});
        });
        //-- 選擇次分類 END --

      
      //-- 分頁數 --
      var page_num=10;

        //-- 搜尋結果 --
        $('#search_store').click(function(event) {
           $('#search_div').css('display', 'block');

           //-- 撈資料 --
           $.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   st_type: $('#st_type').val(),
		  	   st_main_type: $('#st_main_type').val(),
		  	   st_second_type: $('#st_second_type').val(),
		  	   st_name: $('#st_name').val(),
		  	   st_keyWord: $('#st_keyWord').val(),
		  	   page_num: page_num

		  	 },
		  	 success:function (data) {
		  	 	
		  	   $("#search_div tbody").html('');

		  	   $.each(data, function(index, val) {

		  	   	  var txt='<tr>'+
		  	   	            '<td>'+this['st_type']+'</td>'+
		  	   	            '<td>'+this['st_main_type']+'</td>'+
		  	   	            '<td>'+this['st_second_type']+'</td>'+
		  	   	            '<td>'+this['st_name']+'</td>'+
		  	   	            '<td>'+this['OnLineOrNot']+'</td>'+
		  	   	            '<td><input type="radio" name="ns_store" st_name="'+this['st_name']+'" value="'+this['Tb_index']+'"></td>'+
		  	   	          '</tr>';
		  	      $("#search_div tbody").append(txt);
		  	   });
		  	 }
		  	});

           //-- 撈分頁數 --
           $.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   type:'page',
		  	   st_type: $('#st_type').val(),
		  	   st_main_type: $('#st_main_type').val(),
		  	   st_second_type: $('#st_second_type').val(),
		  	   st_name: $('#st_name').val(),
		  	   st_keyWord: $('#st_keyWord').val(),
		  	   page_num: page_num

		  	 },
		  	 success:function (data) {
		  	 
		  	   $('.page_select').html('');
               for (var i = 1; i <= Math.ceil(data/page_num); i++) {
               	 $('.page_select').append('<option value="'+i+'">第'+i+'頁</option>');
               }
		  	 }
		  	});

        });
        //-- 搜尋結果 END -- 



        //-- 切換頁數 --
        $('.page_select').change(function(event) {
        	$.ajax({
		  	  url: 'news_store_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   st_type: $('#st_type').val(),
		  	   st_main_type: $('#st_main_type').val(),
		  	   st_second_type: $('#st_second_type').val(),
		  	   st_name: $('#st_name').val(),
		  	   st_keyWord: $('#st_keyWord').val(),
		  	   page_num: page_num,
		  	   page:$(this).val()

		  	 },
		  	 success:function (data) {
		  	 	
		  	   $("#search_div tbody").html('');

		  	   $.each(data, function(index, val) {

		  	   	  var txt='<tr>'+
		  	   	            '<td>'+this['st_type']+'</td>'+
		  	   	            '<td>'+this['st_main_type']+'</td>'+
		  	   	            '<td>'+this['st_second_type']+'</td>'+
		  	   	            '<td>'+this['st_name']+'</td>'+
		  	   	            '<td>'+this['OnLineOrNot']+'</td>'+
		  	   	            '<td><input type="radio" name="ns_store" st_name="'+this['st_name']+'" value="'+this['Tb_index']+'"></td>'+
		  	   	          '</tr>';
		  	      $("#search_div tbody").append(txt);
		  	   });
		  	 }
		  	});
        }); 
        //-- 切換頁數 END --

        
        //-- 選擇商店 --
        $('#search_div tbody').on('change', '[name="ns_store"]', function(event) {
        	$('#no_store').prop('checked', false);
        });

        //-- 選擇無商店 --
        $('#no_store').change(function(event) {
        	$('[name="ns_store"]').prop('checked', false);
        	$('#no_store').prop('checked', true);
        });


          $("#submit_btn").click(function(event) {
            
            $("#over_store",parent.document).html('');

              //-- 商店 --
              $("#over_store",parent.document).append( '<span class="btn btn-success">'+$('[name="ns_store"]:checked').attr('st_name')+' <input type="hidden" name="ns_store" value="'+$('[name="ns_store"]:checked').val()+'"></span> ' );
              //-- 記錄暫存 --
              sessionStorage.setItem("ns_store", $('[name="ns_store"]:checked').val());

              parent.jQuery.fancybox.close();	
          	
          });
         
      });
    

	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>