<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {


	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='at'.date('YmdHis').rand(0,99);
     

  $OrderBy=pdo_select("SELECT OrderBy FROM appArea ORDER BY OrderBy DESC LIMIT 0,1", 'no');
  $OrderBy=(int)$OrderBy['OrderBy']+1;
 
  $at_unit=implode(',', $_POST['at_unit']);
  $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;

	$param=  ['Tb_index'=>$Tb_index,
			     'mt_id'=>$_POST['mt_id'],
			   'at_name'=>$_POST['at_name'],
               'at_unit'=>$at_unit,
               'OrderBy'=>$OrderBy,
		   'OnLineOrNot'=>$OnLineOrNot
	];
	pdo_insert('appArea', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];
    
    $at_unit=implode(',', $_POST['at_unit']);
    $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;

    $param=  [
           'at_name'=>$_POST['at_name'],
           'at_unit'=>$at_unit,
       'OnLineOrNot'=>$OnLineOrNot
        ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('appArea', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM appArea WHERE Tb_index=:Tb_index', $where);

 	$at_unit=explode(',', $row['at_unit']);
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>版區編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">

						<div class="form-group">
							<label class="col-md-2 control-label" for="at_name"><span class="text-danger">*</span>版區名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="at_name" name="at_name" value="<?php echo $row['at_name'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" ></label>
							<div class="col-md-10">
                                <span class="text-danger">最多5個</span> <br>
								<?php 
                                 
                                 //-- 優情報 --
								 if ($_GET['MT_id']=='site2019011116102369') {
								 	 $unit=$NewPdo->select("SELECT * FROM appUnit WHERE mt_id='site2019011717515289' ORDER BY OrderBy ASC");
								 }
								 //-- 卡情報 --
								 elseif($_GET['MT_id']=='site201902110948308'){
                                     $unit=$NewPdo->select("SELECT * FROM appUnit WHERE mt_id='site2019011716484078' ORDER BY OrderBy ASC");
								 }
                                
                                 
                                 $x=0;
                                 foreach ($unit as $unit_one) {

                                 	if (in_array($unit_one['Tb_index'], $at_unit)) {
                                 		echo '<label><input type="checkbox" name="at_unit[]" value="'.$unit_one['Tb_index'].'" checked> '.$unit_one['un_name'].'</label>｜';
                                 	}
                                 	else{
                                       echo '<label><input type="checkbox" name="at_unit[]" value="'.$unit_one['Tb_index'].'"> '.$unit_one['un_name'].'</label>｜';
                                 	}
                                 	
                                 	$x++;
                                 }
								?>
								<!-- <button id="add_unit" type="button" class="btn btn-info">增加單元</button> -->
								
							</div>
						</div>

						<!-- <div class="unit_div"> -->
						   <?php 
             //                  for ($i=0; $i <$at_unit_num ; $i++) { 
                              	
             //                  	echo '             <div class="form-group">
													// 	<label class="col-md-2 control-label">單元名稱</label>
													// 	<div class="col-md-3">
													// 		<input type="text" class="form-control" name="at_unit[]" value="'.$at_unit[$i].'">
													// 	</div>
													// 	<div class="col-md-1">
													// 		<button type="button" class="btn btn-danger del_unit">Ｘ</button>
													// 	</div>
													// </div>';
             //                  }
						   ?>
							                        

						<!-- </div> -->

                        

						
						
						
						<div class="form-group">
							<label class="col-md-2 control-label" for="OnLineOrNot"><span class="text-danger">*</span>是否上線</label>
							<div class="col-md-10">
								<input style="width: 20px; height: 20px;" id="OnLineOrNot" name="OnLineOrNot" type="checkbox" value="1" <?php echo $check=!isset($row['OnLineOrNot']) || $row['OnLineOrNot']==1 ? 'checked' : ''; ?>  />
							</div>
						</div>

						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
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

