<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {


	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='nt'.date('YmdHis').rand(0,99);
     

  $OrderBy=pdo_select("SELECT OrderBy FROM news_type WHERE mt_id=:mt_id AND nt_sp=1 ORDER BY OrderBy DESC LIMIT 0,1", 'no');
  $OrderBy=(int)$OrderBy['OrderBy']+1;

  $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;

	$param=  ['Tb_index'=>$Tb_index,
			     'mt_id'=>$_POST['mt_id'],
			     'area_id'=>'at2019021114154632',
			     'unit_id'=>$_POST['unit_id'],
			     'nt_name'=>$_POST['nt_name'],
                  'nt_sp'=>'1',
           'nt_sp_begin_date'=>$_POST['nt_sp_begin_date'],
           'nt_sp_end_date'=>$_POST['nt_sp_end_date'],
           'nt_define'=>$_POST['nt_define'],
           'OrderBy'=>$OrderBy,
			     'OnLineOrNot'=>$OnLineOrNot
			  ];
	pdo_insert('news_type', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

    $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;


    $param=  [
           'nt_name'=>$_POST['nt_name'],
           'unit_id'=>$_POST['unit_id'],
           'nt_sp_begin_date'=>$_POST['nt_sp_begin_date'],
           'nt_sp_end_date'=>$_POST['nt_sp_end_date'],
           'nt_define'=>$_POST['nt_define'],
           'OnLineOrNot'=>$OnLineOrNot
        ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('news_type', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM news_type WHERE Tb_index=:Tb_index', $where);
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>網頁資料編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager_sp.php" method="POST" enctype='multipart/form-data' class="form-horizontal">

						<div class="form-group">
							<label class="col-md-2 control-label" for="unit_id"><span class="text-danger">*</span>主題單元</label>
							<div class="col-md-10">
								<label><input type="radio" name="unit_id" value="un2019011716575635" checked> 卡好康</label>
							</div>
			            </div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="nt_name">分類名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nt_name" name="nt_name" value="<?php echo $row['nt_name'];?>">
							</div>
						</div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="nt_define">定義說明</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="nt_define" name="nt_define" value="<?php echo $row['nt_define'];?>">
              </div>
            </div>
						
            <div class="form-group">
              <label class="col-md-2 control-label" >檔期時間</label>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control datepicker_range from" id="nt_sp_begin_date" name="nt_sp_begin_date" placeholder="年-月-日" value="<?php echo $row['nt_sp_begin_date'];?>" >
                  </div>
                  <div class="col-md-2">
                    <h3 class="text-center">到</h3>
                  </div>
                  <div class="col-md-5">
                    <input type="text" class="form-control datepicker_range to" id="nt_sp_end_date" name="nt_sp_end_date" placeholder="年-月-日" value="<?php echo $row['nt_sp_end_date'];?>">
                  </div>
                  
                </div>
                
              </div>
            </div>

						
						<div class="form-group">
							<label class="col-md-2 control-label" for="OnLineOrNot">是否上線</label>
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
      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

