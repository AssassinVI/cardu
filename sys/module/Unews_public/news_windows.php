<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	/*.news_old_div{ display: none; }*/
	#search_div{ display: none; }
	body{ width: 1000px; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
  //-- 版區分類 --
   $row_area=$NewPdo->select("SELECT Tb_index,at_name FROM appArea WHERE Tb_index!='at2019021114160725' AND Tb_index!='at2019021114161530' ORDER BY OrderBy ASC");
  //-- 新聞次版區 --
   $row_type=$NewPdo->select("SELECT Tb_index,nt_name FROM news_type WHERE area_id='' AND nt_sp=0 ORDER BY OrderBy ASC");

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>新聞搜尋
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form   class="form-horizontal put_form">

						<div class="form-group">
							<label class="control-label col-xs-2"><span class="text-danger">*</span> 版區搜尋</label>

							<div class="col-xs-5">
								<select id="area_id" class="form-control">
									<option value="">新聞</option>
									<?php
                                      foreach ($row_area as $row_area_one) {
                                      	echo '<option value="'.$row_area_one['Tb_index'].'">'.$row_area_one['at_name'].'</option>';
                                      }
                     		  	    ?>
								</select>
							</div>

							<div class="col-xs-5">
								<select id="news_type" class="form-control">
									<option value="">-- 全部 --</option>
									<?php
                                      foreach ($row_type as $row_type_one) {
                                      	echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['nt_name'].'</option>';
                                      }
                     		  	    ?>
								</select>
							</div>

						</div>

						<div class="form-group">
							<label class="control-label col-xs-2">關鍵字</label>
							<div class="col-xs-8">
								<input type="text" id="ns_keyWord" class="form-control">
							</div>
							<div class="col-xs-2 text-center">
								<button type="button" id="search_news" class="btn btn-success">搜尋</button>
							</div>
						</div>

						<!-- <div class="news_old_div form-group">
							<label class="control-label col-xs-2">以勾選文章</label>
							<div class="col-xs-10 content_div">

							</div>
						</div> -->
                        
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
					<div class="ns_loading">
						<div>
						  <i class="fa fa-cog fa-spin"></i>
						  <p>讀取中...</p>
						</div>
					  
					</div>
					<div class="table-responsive">
						<table class="table no-margin table-hover">
							<thead>
								<tr>
                                    <th>選取</th>
									<th>主分類</th>
									<th>文章標題</th>
									<th>點閱數</th>
									<th>發佈日期</th>
									<th>記者/作者</th>
									<th>預覽</th>

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
        
        //------------------------------ 選擇版區分類 -------------------------------------------
		$('#area_id').change(function(event) {

            //-- 撈次版區 --
		  	$.ajax({
		  	  url: 'news_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   type:'area',
		  	   area_id: $(this).val()
		  	 },
		  	 success:function (data) {

		  	   $("#news_type").html('<option value="">-- 全部 --</option>');
		  	   $.each(data, function(index, val) {
		  	      $("#news_type").append('<option value="'+this['Tb_index']+'">'+this['nt_name']+'</option>');
		  	   });
		  	 }
		  	});		  
		});
        //-- 選擇版區分類 END --

      
      //---------------------------------------- 分頁數 --------------------------------------------
      var page_num=10;

        //-- 搜尋結果 --
        $('#search_news').click(function(event) {
           $('#search_div').css('display', 'block');

           //-- 撈資料 --
           $.ajax({
		  	  url: 'news_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   type:'search',
		  	   area_id:$('#area_id').val(),
		  	   ns_nt_pk: $('#news_type').val(),
		  	   ns_keyWord: $('#ns_keyWord').val(),
		  	   page_num: page_num

		  	 },
		  	 beforeSend:function () {
		  	 	$('.ns_loading').show();
		  	 },
		  	 complete:function () {
		  	 	$('.ns_loading').hide();
		  	 },
		  	 success:function (data) {
		  	 	
		  	   $("#search_div tbody").html('');

		  	   $.each(data, function(index, val) {

		  	   	  var txt='<tr>'+
		  	   	            '<td><input type="checkbox" name="ns_news" ns_ftitle="'+this['ns_ftitle']+'" value="'+this['Tb_index']+'"></td>'+
		  	   	            '<td>'+this['ns_nt_pk']+'</td>'+
		  	   	            '<td>'+this['ns_ftitle']+'</td>'+
		  	   	            '<td>'+this['ns_viewcount']+'</td>'+
		  	   	            '<td>'+this['ns_date']+'</td>'+
		  	   	            '<td>'+this['ns_reporter']+'</td>'+
		  	   	            '<td><a href="javascript:;" onclick="window.open(\'newsView_windows.php?Tb_index='+this['Tb_index']+'\', \''+this['ns_ftitle']+'\', config=\'height=800,width=900\');">預覽</a></td>'+
		  	   	          '</tr>';
		  	      $("#search_div tbody").append(txt);

		  	      if (sessionStorage.getItem("ns_news")!=undefined) {
		  	   	  	 
		  	   	  	 var ns_news_arr=sessionStorage.getItem("ns_news").split(',');

		  	   	  	 if (ns_news_arr.indexOf(this['Tb_index'])!=-1) {
		  	   	  	 	$('[name="ns_news"][value="'+this['Tb_index']+'"]').prop('checked', true);
		  	   	  	 }
		  	   	  }
		  	   });
		  	 }
		  	});

           //-------------------------------------------- 撈分頁數 -------------------------------------
           $.ajax({
		  	  url: 'news_windows_ajax.php',
		  	  type: 'POST',
		  	  data: {
		  	   type:'page',
		  	   area_id:$('#area_id').val(),
		  	   ns_nt_pk: $('#news_type').val(),
		  	   ns_keyWord: $('#ns_keyWord').val(),
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
        //-- 撈分頁數 END -- 



        //--------------------------------------------- 切換頁數 ------------------------------------------
        $('.page_select').change(function(event) {
        	$.ajax({
		  	  url: 'news_windows_ajax.php',
		  	  type: 'POST',
		  	  dataType: 'json',
		  	  data: {
		  	   type: 'search',
		  	   area_id:$('#area_id').val(),
		  	   ns_nt_pk: $('#news_type').val(),
		  	   ns_keyWord: $('#ns_keyWord').val(),
		  	   page_num: page_num,
		  	   page:$(this).val()

		  	 },
		  	 beforeSend:function () {
		  	 	$('.ns_loading').show();
		  	 },
		  	 complete:function () {
		  	 	$('.ns_loading').hide();
		  	 },
		  	 success:function (data) {
		  	 	
		  	   $("#search_div tbody").html('');

		  	   $.each(data, function(index, val) {

		  	   	  var txt='<tr>'+
		  	   	            '<td><input type="checkbox" name="ns_news" ns_ftitle="'+this['ns_ftitle']+'" value="'+this['Tb_index']+'"></td>'+
		  	   	            '<td>'+this['ns_nt_pk']+'</td>'+
		  	   	            '<td>'+this['ns_ftitle']+'</td>'+
		  	   	            '<td>'+this['ns_viewcount']+'</td>'+
		  	   	            '<td>'+this['ns_date']+'</td>'+
		  	   	            '<td>'+this['ns_reporter']+'</td>'+
		  	   	            '<td><a href="javascript:;" onclick="window.open(\'newsView_windows.php?Tb_index='+this['Tb_index']+'\', \''+this['ns_ftitle']+'\', config=\'height=800,width=900\');">預覽</a></td>'+
		  	   	          '</tr>';
		  	      $("#search_div tbody").append(txt);

		  	      if (sessionStorage.getItem("ns_news")!=undefined) {
		  	   	  	 
		  	   	  	 var ns_news_arr=sessionStorage.getItem("ns_news").split(',');

		  	   	  	 if (ns_news_arr.indexOf(this['Tb_index'])!=-1) {
		  	   	  	 	$('[name="ns_news"][value="'+this['Tb_index']+'"]').prop('checked', true);
		  	   	  	 }
		  	   	  }
		  	   });
		  	 }
		  	});
        }); 
        //-- 切換頁數 END --

        
        //-------------------------------------------------- 勾選新聞 ---------------------------------------------------

        var ns_news_arr=sessionStorage.getItem("ns_news")!=undefined ? sessionStorage.getItem("ns_news").split(',') : [];
        var ns_news_name_arr=sessionStorage.getItem("ns_news_name")!=undefined ? sessionStorage.getItem("ns_news_name").split(',') : [];
        $("#search_div tbody").on('change', '[name="ns_news"]', function(event) {
        	
        	if ($(this).prop('checked')==true) {
        		 ns_news_arr.push($(this).val());
        		 ns_news_name_arr.push($(this).attr('ns_ftitle'));
        	}
        	else{ 
        		  //-- Tb_index --
        		  var ns_news_index=ns_news_arr.indexOf($(this).val());
        		      ns_news_arr.splice(ns_news_index,1);
        		  //-- 主標 --
        		  var ns_news_name_index=ns_news_name_arr.indexOf($(this).attr('ns_ftitle'));
        		      ns_news_name_arr.splice(ns_news_name_index,1);
        	}

        });


         //---------------------------------------------- 確定 --------------------------------------------------
          $("#submit_btn").click(function(event) {
            
            $("#over_ex_news",parent.document).html('');
            
            for (var i = 0; i < ns_news_arr.length; i++) {
              //-- 延伸閱讀 --
              $("#over_ex_news",parent.document).append( '<span class="btn btn-success btn-block">'+ns_news_name_arr[i]+' <input type="hidden" name="ns_news[]" ns_ftitle="'+ns_news_name_arr[i]+'" value="'+ns_news_arr[i]+'"><button class="del_ns_news btn btn-danger" type="button">Ｘ</button></span>' ); 
            }
        
              //-- 記錄暫存 --
              sessionStorage.setItem("ns_news", ns_news_arr);
              sessionStorage.setItem("ns_news_name", ns_news_name_arr);
              parent.jQuery.fancybox.close();	
          });

      });
      

      //------------ 讀取暫存 -------------
      // $(window).on('load', function(event) {
      // 	if (sessionStorage.getItem("ns_news")!=undefined){
      // 		$('.news_old_div').css('display', 'block');
      // 		var ns_news_arr=sessionStorage.getItem("ns_news").split(',');
      // 		var ns_news_name_arr=sessionStorage.getItem("ns_news_name").split(',');

      // 		for (var i = 0; i < ns_news_arr.length; i++) {
      // 			$('.news_old_div .content_div').append('<label><input checked type="checkbox" name="ns_news_old[]" value="'+ns_news_arr[i]+'"> '+ns_news_name_arr[i]+'</label>｜');
      // 		}
      		
      // 	}
      // });
    
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>