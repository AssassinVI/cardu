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
					<header><h3 class="text-center">會員詳細資料</h3></header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">

			      	<div class="row">
			      	 <div class="col-xs-4 text-right">帳號：</div>
			      	 <div class="col-xs-8"><?php echo $row['ud_userid']; ?></div>	
			      	</div>
			      	<div class="row">
			      	 <div class="col-xs-4 text-right">暱稱：</div>
			       	 <div class="col-xs-8"><?php echo $row['ud_nickname']; ?></div>
			        </div>
			        <div class="row">
			      	  <div class="col-xs-4 text-right">E-mail：</div>
			      	  <div class="col-xs-8"><?php echo $row['ud_email']; ?></div>
			        </div>
			        <div class="row">
			      	<div class="col-xs-4 text-right">真實姓名：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_realname']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">身分證字號：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_idno']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">性別：</div>
			      	<div class="col-xs-8"><?php echo $ud_gender=$row['ud_gender']=='M' ? '男':'女'; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">生日：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_birth']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">電話：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_phone']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">手機號碼：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_mobile']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">地址：</div>
			      	<div class="col-xs-8 adds"></div>
			      	<div class="twzipcode"></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">婚姻狀態：</div>
			      	<div class="col-xs-8"><?php echo $ud_marriage=$row['ud_marriage']=='Y' ? '已婚':'未婚' ; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">職業：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_job']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">月收入：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_incomm']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">註冊時間/IP：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_regtime'].'／'.$row['ud_regip']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">登入次數/最後登入時間/IP：</div>
			      	<div class="col-xs-8"><?php echo $row['ud_logincnt'].'／'.$row['ud_logintime'].'／'.$row['ud_loginip']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4 text-right">與FB帳號連結：</div>
			      	<div class="col-xs-8"><?php echo $ud_fb_email=empty($row['ud_fb_email']) ? "未連結Facebook" : $row['ud_fb_email']; ?></div>
			      </div>

				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>

		
	</div>



</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
	   var zipcode='<?php echo $row['ud_zipcode']; ?>';
	   var ud_addr='<?php echo $row['ud_addr']; ?>';

       $('.twzipcode').twzipcode({'zipcodeSel'  : zipcode});
       $('.adds').html(zipcode+$('.twzipcode [name="county"]').val()+$('.twzipcode [name="district"]').val()+ud_addr);
	});
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>