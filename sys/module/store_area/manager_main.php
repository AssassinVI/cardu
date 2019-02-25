<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {


	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='stm'.date('YmdHis').rand(0,99);
     

  $OrderBy=pdo_select("SELECT OrderBy FROM store_type_main WHERE mt_id=:mt_id ORDER BY OrderBy DESC LIMIT 0,1", ['mt_id'=>$_POST['main_id']]);
  $OrderBy=(int)$OrderBy['OrderBy']+1;
 

	$param=  ['Tb_index'=>$Tb_index,
			     'mt_id'=>$_POST['main_id'],
			   'st_name'=>$_POST['st_name'],
               'remark'=>$_POST['remark'],
               'OrderBy'=>$OrderBy,

	];
	pdo_insert('store_type_main', $param);
	location_up('admin_main.php?MT_id='.$_POST['mt_id'].'&main_id='.$_POST['main_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

    $param=  [
           'st_name'=>$_POST['st_name'],
            'remark'=>$_POST['remark'],
            ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('store_type_main', $param, $where);
	
	location_up('admin_main.php?MT_id='.$_POST['mt_id'].'&main_id='.$_POST['main_id'],'成功更新');
   }
}
if ($_GET) {

	//-- 商店分類 --
    $store_type=pdo_select("SELECT st_name FROM store_type WHERE Tb_index=:Tb_index ", ["Tb_index"=>$_GET['main_id']]);

 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM store_type_main WHERE Tb_index=:Tb_index', $where);

}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><?php echo $store_type['st_name']; ?> 主分類編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager_main.php" method="POST" enctype='multipart/form-data' class="form-horizontal">

						<div class="form-group">
							<label class="col-md-2 control-label" for="st_name"><span class="text-danger">*</span>主分類</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="st_name" name="st_name" value="<?php echo $row['st_name'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="remark">定義說明</label>
							<div class="col-md-10">
								<textarea  class="form-control" name="remark"><?php echo $row['remark'];?></textarea>
							</div>
						</div>
						
						<!-- <div class="form-group">
							<label class="col-md-2 control-label" for="OnLineOrNot"><span class="text-danger">*</span>是否上線</label>
							<div class="col-md-10">
								<input style="width: 20px; height: 20px;" id="OnLineOrNot" name="OnLineOrNot" type="checkbox" value="1" <?php //echo $check=!isset($row['OnLineOrNot']) || $row['OnLineOrNot']==1 ? 'checked' : ''; ?>  />
							</div>
						</div> -->

						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
						<input type="hidden" id="main_id" name="main_id" value="<?php echo $_GET['main_id'];?>">
					</form>
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
						<div class="col-lg-6">
							<button type="button" class="btn btn-danger btn-block btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="clean_all()">重設表單</button>
						</div>
						<div class="col-lg-6">
						<?php if(empty($_GET['Tb_index'])){?>
							<button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">儲存</button>
						<?php }else{?>
						    <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">更新</button>
						<?php }?>
						</div>
					</div>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
          $("#submit_btn").click(function(event) {
          	 $('#put_form').submit();
          });
    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            aPic: '<?php echo $row["aPic"]?>',
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});
      //------------------------------ 刪檔 ---------------------------------
          $(".one_del_file").click(function(event) { 
			if (confirm('是否要刪除檔案?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                       OtherFile: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});


       //----- 增加單元 ----
      //  $('#add_unit').click(function(event) {

      // 	  if ($('.unit_div .form-group').length<5) {
      //       var add_txt='<div class="form-group">'+
						// '<label class="col-md-2 control-label" >單元名稱</label>'+
						// '<div class="col-md-3">'+
						// 	'<input type="text" class="form-control" name="at_unit[]">'+
						// '</div>'+
						// '<div class="col-md-1">'+
						// 	'<button type="button" class="btn btn-danger del_unit">Ｘ</button>'+
						// '</div>'+
					 //  '</div>';
      // 	   $('.unit_div').append(add_txt);
      // 	  }
      //  });

      //  //---- 刪除單元 -----
      //  $('.unit_div').on('click', '.del_unit', function(event) {

      //  	if (confirm('確定要刪除??')) {
      //  	  $(this).parent().parent().remove();
      //  	}
       	 
      //  });

      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

