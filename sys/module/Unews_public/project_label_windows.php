<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<!-- 關閉視窗 -->
	<a class="close_fancybox" href="javascript:;">Ｘ</a>
	
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>新增標籤
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form class="form-horizontal put_form">
						<div class="form-group">
							<div class="col-xs-9">
								<input type="text" id="add_proj_label_txt" class="form-control">
							</div>
							<div class="col-xs-3">
								<a href="javascript:;" id="add_btn" class="btn btn-info">新增</a>
							</div>
							<!-- <div class="col-xs-12">
								<label>標籤類型：</label>
								<label><input type="radio" name="lb_type" value="area" checked>地區</label>｜<label><input type="radio" name="lb_type" value="other">其他</label>
							</div> -->
						</div>
					</form>
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

		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>搜尋結果
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form action="manager.php" method="POST" class="form-horizontal put_form">
						<div class="form-group">
							<div id="search_input" class="col-md-9">
								<?php 
                                 $row_label=$NewPdo->select("SELECT lb_name FROM project_label WHERE OnLineOrNot=1");
                                 foreach ($row_label as $row_label_one) {
                                 	echo '<label><input type="checkbox"  name="project_label[]" value="'.$row_label_one['lb_name'].'">'.$row_label_one['lb_name'].'</label>｜';
                                 }
                                 
								?>
							  
							</div>
						</div>
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>

		
	</div>



</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
        
        //-- 搜尋按鈕 --
		$("#add_btn").click(function(event) {

			if ($('#add_proj_label_txt').val()!='') {

				$.ajax({
					url: 'project_label_windows_ajax.php',
					type: 'POST',
					data: {
						add_proj_label: $('#add_proj_label_txt').val()
					},
					success:function (data) {
						console.log(data);
						if (data!='error') {
							$('#search_input').append(data);
						}
						else{
						   alert('這個標籤已重複');
						}
					}
				});
			}
			else{
				alert('請輸入標籤');
			}
		});


		//-- ( 搜尋結果 勾選) --
		$('#search_input').on('change', '.check_label', function(event) {
			//-- 判斷選取個數 --
			if ($('.confirm_label:checked').length>=3) {
				$(this).prop('checked', false);
				alert('最多勾選3個');
			}
			else{
                //-- 顯示以勾選 --
			    $('#checked_label').append('<label><input type="checkbox" checked class="confirm_label" value="'+$(this).val()+'">'+$(this).val()+'｜</label>');
			    $(this).parent().remove();				
			}
		});

		//-- (以勾選 勾選) --
		$('#checked_label').on('change', '.confirm_label', function(event) {
			$('#search_input').append('<label class="col-xs-6"><input type="checkbox" class="check_label" value="'+$(this).val()+'">'+$(this).val()+'</label>');
			$(this).parent().remove();
		});


		

          $("#submit_btn").click(function(event) {
          
              $("#project_label",parent.document).html('');
              
              //-- 以勾選陣列 --
              var con_lab_arr=[];
              $.each($('[name="project_label[]"]:checked'), function() {
                   con_lab_arr.push($(this).val());
                   //-- 標籤 --
                   $("#project_label",parent.document).append( '<span class="label">'+$(this).val()+'<input type="hidden" name="in_sp_label[]" value="'+$(this).val()+'"></span>、' );
              });

              //-- 記錄暫存 --
              sessionStorage.setItem("project_label", con_lab_arr);

              parent.jQuery.fancybox.close();	
            
          	
          });
         

      
      });
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {
        
		if (sessionStorage.getItem("project_label")!=undefined) {
			var project_arr=sessionStorage.getItem("project_label");
			    project_arr=project_arr.split(',');

			for (var i = 0; i < project_arr.length; i++) {
				
		        //-- 顯示以勾選 --
		        $('[name="project_label[]"][value="'+project_arr[i]+'"]').prop('checked', true);
				// $('#search_input').append('<label><input type="checkbox" checked name="project_label[]" value="'+project_arr[i]+'">'+project_arr[i]+'｜</label>');
			}
		}
	});
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>