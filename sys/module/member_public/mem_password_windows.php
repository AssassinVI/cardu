<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
  <style type="text/css">
  	.twzipcode { display: none; }
  </style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
  $row=$NewPdo->select("SELECT * FROM user_data WHERE ud_pk=:ud_pk", ['ud_pk'=>$_GET['ud_pk']], 'one');
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><h3 class="text-center">請輸入 <?php echo $row['ud_userid']; ?> 的新密碼</h3></header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
                   <div class="form-horizontal">
                   	<div class="form-group">
                   	  <label class="col-xs-2 control-label text-right">新密碼：</label>
                      <div class="col-xs-7">
                      	<input type="text" name="ud_password" class="form-control">
                      </div>
                      <div class="col-xs-3">
                      	<button id="update_password_btn" type="button" class="btn btn-success">送出</button>
                      	<input type="hidden" name="ud_pk" value="<?php echo $_GET['ud_pk'];?>">
                      </div>
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
	   $('#update_password_btn').click(function(event) {
	   	 $.ajax({
	   	 	url: 'mem_ajax.php',
	   	 	type: 'POST',
	   	 	data: {
	   	 		type: 'update_password',
	   	 		ud_pk: $('[name="ud_pk"]').val(),
	   	 		ud_password: $('[ud_password]').val()
	   	 	},
	   	 	success:function () {
	   	 	   alert('密碼修改成功');
	   	 	   parent.jQuery.fancybox.close();	
	   	 	}
	   	 });
	   	 
	   });
	});
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>