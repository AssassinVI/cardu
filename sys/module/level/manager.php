<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {

	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='level'.date('YmdHis').rand(0,99);
     

  $OrderBy=pdo_select("SELECT OrderBy FROM card_level ORDER BY OrderBy DESC LIMIT 0,1", 'no');
  $OrderBy=(int)$OrderBy['OrderBy']+1;

  $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;
	$param=  ['Tb_index'=>$Tb_index,
			     'mt_id'=>$_POST['mt_id'],
			     'attr_name'=>$_POST['attr_name'],
           'OrderBy'=>$OrderBy,
			     'OnLineOrNot'=>$OnLineOrNot
			  ];
	pdo_insert('card_level', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];
    
    $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;
    $param=[  
    	           'attr_name'=>$_POST['attr_name'],
		        'OnLineOrNot'=>$OnLineOrNot
		          ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('card_level', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM card_level WHERE Tb_index=:Tb_index', $where);

  $card_type=$_GET['MT_id']=='site2018110611041573' ? '信用卡':'金融卡';
  $newORedit=empty($_GET['Tb_index']) ? '新增':'修改';
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><?php echo $newORedit.$card_type; ?>卡等
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="attr_name">屬性名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="attr_name" name="attr_name" value="<?php echo $row['attr_name'];?>">
							</div>
						</div>
						

						
						<div class="form-group">
							<label class="col-md-2 control-label" for="OnLineOrNot">是否上線</label>
							<div class="col-md-10">
								<div class="switch" style="padding-top: 8px;">
                  <div class="onoffswitch">
                   <input type="checkbox" class="onoffswitch-checkbox" id="OnLineOrNot" value="1" name="OnLineOrNot" <?php echo $check=!isset($row['OnLineOrNot']) || $row['OnLineOrNot']==1 ? 'checked' : ''; ?>>
                   <label class="onoffswitch-label" for="OnLineOrNot">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                  </label>
                  </div>
                </div>
							</div>
						</div>

						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->




		</div>

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
          <?php if(empty($_GET['Tb_index'])){?>
            <button type="button" id="submit_btn" class="btn btn-info btn-raised">儲存</button>
          <?php }else{?>
              <button type="button" id="submit_btn" class="btn btn-info btn-raised">更新</button>
          <?php }?>
          <button type="button" class="btn btn-danger  btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="getBack()">放棄</button>

					
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

