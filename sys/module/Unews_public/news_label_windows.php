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
					<header>標籤搜尋
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form class="form-horizontal put_form">
						<div class="form-group">
							<div class="col-xs-9">
								<input type="text" id="search_label_txt" class="form-control">
								<span class="text-danger">(搜尋請用','作標籤區隔,勿使用空白)</span>
							</div>
							<div class="col-xs-3">
								<a href="javascript:;" id="search_btn" class="btn btn-info">搜尋</a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-xs-12">以勾選:</label>
							<div id="checked_label" class="col-xs-12">
								
							</div>
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
							<div id="search_input" class="col-md-9 row">
								
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
		$("#search_btn").click(function(event) {

			if ($('#search_label_txt').val()!='') {

				$.ajax({
					url: 'news_label_windows_ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						ns_label: $('#search_label_txt').val()
					},
					success:function (data) {
						$('#search_input').html('');
						//-- 以勾選陣列 --
						var con_lab_arr=[];
                        if ($('.confirm_label').length>0) {
                           $.each($('.confirm_label'), function() {
                           	 con_lab_arr.push($(this).val());
                           });
                        }
						$.each(data, function() {
						  if (con_lab_arr.indexOf(this['lb_name'])==-1) {
						  	$('#search_input').append('<label class="col-xs-6"><input type="checkbox" class="check_label" value="'+this['lb_name']+'">'+this['lb_name']+'</label>');
						  }
						});
					}
				});
			}
			else{
				alert('請輸入標籤關鍵字');
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
          
              $("#over_label",parent.document).html('');
              
              //-- 以勾選陣列 --
              var con_lab_arr=[];
              $.each($('.confirm_label'), function() {
                   con_lab_arr.push($(this).val());
                   //-- 標籤 --
                   $("#over_label",parent.document).append( '<span class="label">'+$(this).val()+'<input type="hidden" name="ns_label[]" value="'+$(this).val()+'"></span>、' );
              });

              //-- 記錄暫存 --
              sessionStorage.setItem("news_label", con_lab_arr);

              parent.jQuery.fancybox.close();	
            
          	
          });
         

      
      });
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {
        
		if (sessionStorage.getItem("news_label")!=undefined) {
			var news_label_arr=sessionStorage.getItem("news_label");
			    news_label_arr=news_label_arr.split(',');

			for (var i = 0; i < news_label_arr.length; i++) {
				
		        //-- 顯示以勾選 --
				 $('#checked_label').append('<label><input type="checkbox" checked class="confirm_label" value="'+news_label_arr[i]+'">'+news_label_arr[i]+'｜</label>');
			}
		}
	});
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>