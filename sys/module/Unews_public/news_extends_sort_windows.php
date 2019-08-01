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
	<!-- 關閉視窗 -->
	<a class="close_fancybox" href="javascript:;">Ｘ</a>
	<div class="row">

        <div id="sort_div" class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>文章排序</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive overflow-h35">
						<table class="table no-margin table-hover">
							<thead>
								<tr>
									<th>主分類</th>
									<th>文章標題</th>
									<th>點閱數</th>
									<th>發佈時間</th>
									<th>預覽</th>
									<th>刪除</th>

								</tr>
							</thead>
							<tbody>


							</tbody>
						</table>
					</div>

					<!-- <div class="text-right">
							<label >
								到 
								<select class="page_select">
							    </select>
						   </label>
					</div>
					 -->
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
		

		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
					<button type="button" id="submit_btn" class="btn btn-info btn-raised">確定</button>
					<button type="button" class="btn btn-default btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>



</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
    
    if (sessionStorage.getItem("ns_news")!=null) {

     $.ajax({
     	url: '../news_public/news_extends_sort_windows_ajax.php',
     	type: 'POST',
     	dataType: 'json',
     	data: {
     		type: 'news_extend',
     		news_arr: sessionStorage.getItem("ns_news")
     	},
     	success:function (data) {

     		$.each(data, function(index, val) {

     		   var html=
     		       '<tr>'+
     		         '<td>'+this['main_type']+'</td>'+
     		         '<td>'+this['ns_ftitle']+'</td>'+
     		         '<td>'+this['ns_viewcount']+'</td>'+
     		         '<td>'+this['ns_vfdate']+'</td>'+
     		         '<td><a target="_blank" href="'+this['url']+'">預覽</a></td>'+
     		         '<td><a class="del_news_extend" Tb_index="'+this['Tb_index']+'" href="javascript:;">刪除</a></td>'+
     		         '<td><input type="hidden" name="ns_news[]" value="'+this['Tb_index']+'" ns_ftitle="'+this['ns_ftitle']+'"></td>'+
     		       '</tr>';
     		   
     		   $('.table-responsive tbody').append(html);
     		});
     		
     	}
      });

    }



     //------------------------------- 拖曳更新排序 -------------------------
     $( ".table-responsive tbody" ).sortable({
              revert: 300,
              placeholder: "sortable_new_placeholder"
     });



     $('#submit_btn').click(function(event) {
       var ns_news_arr=[];
       var ns_news_name_arr=[];
       
       $("#over_ex_news",parent.document).html('');
       $.each($('[name="ns_news[]"]'), function(index, val) {
          ns_news_arr.push($(this).val());
          ns_news_name_arr.push($(this).attr('ns_ftitle'));
          //-- 延伸閱讀 --
          $("#over_ex_news",parent.document).append( '<span class="btn btn-success btn-block">'+$(this).attr('ns_ftitle')+' <input type="hidden" name="ns_news[]" ns_ftitle="'+$(this).attr('ns_ftitle')+'" value="'+$(this).val()+'"><button class="del_ns_news btn btn-danger" type="button">Ｘ</button></span>' ); 
       });

       sessionStorage.setItem("ns_news", ns_news_arr);
       sessionStorage.setItem("ns_news_name", ns_news_name_arr);

       parent.jQuery.fancybox.getInstance().close();
     });

     //-- 刪除延伸閱讀文章 --
     $('.table-responsive tbody').on('click', '.del_news_extend', function(event) {
        
        var ns_ftitle=$(this).parent().next().find('[name="ns_news[]"]').attr('ns_ftitle');
     	if (confirm('是否要刪除\n"'+ns_ftitle+'"\n此篇延伸閱讀??')) {

     		var ns_news_arr=[];
     		var ns_news_name_arr=[];

     		$(this).parents('tr').remove();
      
     		$.each($('[name="ns_news[]"]'), function(index, val) {
     		   ns_news_arr.push($(this).val());
     		   ns_news_name_arr.push($(this).attr('ns_ftitle'));
     		});

     		sessionStorage.setItem("ns_news", ns_news_arr);
     		sessionStorage.setItem("ns_news_name", ns_news_name_arr);
     	}
     	

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