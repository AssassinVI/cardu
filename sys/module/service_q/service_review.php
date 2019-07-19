<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
  <style type="text/css">
  	body{ font-size: 15px;}
   .panel-body .row:nth-child(even){ background-color: #dbdbdb; padding: 3px;}
  </style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
  $row=$NewPdo->select("SELECT * FROM service_question_manage WHERE sqm_pk=:sqm_pk", ['sqm_pk'=>$_GET['sqm_pk']], 'one');
  $sqm_type_arr[0]='聯絡我們';
  $sqm_type_arr[2]='錯誤回報';
  $sqm_type_arr[11]='聯絡我們';
  $sqm_type_arr[12]='行銷合作';
  $sqm_type_arr[13]='廣告刊登';
  
  if ($row['sqm_type']=='2') {
  	$sqm_ch_name=$row['sqm_type_name'];
  }
  else{
  	$sqm_ch_name=$sqm_type_arr[$row['sqm_type']];
  }

  $sqm_ud_pk=empty($row['sqm_ud_pk']) ? '非卡優會員':'卡優會員';
  $sqm_status=['未處理','已處理，回覆如下','免處理'];
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><h3 class="text-center">客服問題管理>>回覆</h3></header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
			      	<div class="row">
			      	 <div class="col-xs-2 text-right">發送時間：</div>
			      	 <div class="col-xs-10"><?php echo $row['sqm_pdate']; ?></div>	
			      	</div>
			      	<div class="row">
			      	 <div class="col-xs-2 text-right">服務項目：</div>
			       	 <div class="col-xs-10"><?php echo $sqm_type_arr[$row['sqm_type']]; ?></div>
			        </div>
			        <div class="row">
			      	  <div class="col-xs-2 text-right">頻道：</div>
			      	  <div class="col-xs-10"><?php echo $sqm_ch_name;?></div>
			        </div>
			        <div class="row">
			      	<div class="col-xs-2 text-right">身份別：</div>
			      	<div class="col-xs-10"><?php echo $sqm_ud_pk; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-2 text-right">聯絡人：</div>
			      	<div class="col-xs-10 sqm_ud_nickname"><?php echo $row['sqm_ud_nickname']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-2 text-right">E-Mail：</div>
			      	<div class="col-xs-10 sqm_mail"><?php echo $row['sqm_mail']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-2 text-right">主題：</div>
			      	<div class="col-xs-10 sqm_title"><?php echo $row['sqm_title']; ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-2 text-right">內容：</div>
			      	<div class="col-xs-10 sqm_ptext" style="word-break: break-all;"><?php echo nl2br($row['sqm_ptext']); ?></div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-2 text-right"><span class="text-danger">*</span>處理狀態：</div>
			      	<div class="col-xs-10">
			      	  <?php echo $sqm_status[$row['sqm_status']]; ?>
			      	</div>
			      </div>
			      <div class="row">
			      	<div class="col-xs-2 text-right">回覆內容：</div>
			      	<div class="col-xs-10">
			      	  <p>
			      	  	<?php echo nl2br($row['sqm_rtext']); ?>
			      	  </p>
			      	</div>
			      	<input type="hidden" name="sqm_pk" value="<?php echo $_GET['sqm_pk'];?>">
			      </div>
			      

				</div><!-- /.panel-body -->

			</div><!-- /.panel -->

		</div>

		
	</div>



</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>

<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>