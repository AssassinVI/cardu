<?php include("../../core/page/header01.php");//載入頁面heaer01?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 
    	if (!empty($_POST['org_image'])) {
    		$param=['org_image'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('card_org', $param, $where);
            unlink('../../img/'.$_POST['org_image']);
    	}else{
        //----------------------- image_hover刪除 -------------------------------
    		$param=['org_image_hover'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('card_org', $param, $where);
            unlink('../../img/'.$_POST['org_image_hover']);
    	}
       exit();
  	}
	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='org'.date('YmdHis').rand(0,99);
     
     //===================== image圖 ========================
      if (!empty($_FILES['org_image']['name'])){

      	 $type=explode('.', $_FILES['org_image']['name']);
      	 $org_image=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('org_image', $org_image); 
      }
      else{ $org_image='';}

     //===================== image_hover圖 ========================
      if (!empty($_FILES['org_image_hover']['name'])){

      	 $type=explode('.', $_FILES['org_image_hover']['name']);
      	 $org_image_hover=$Tb_index.'_hover'.'.'.$type[count($type)-1];
         fire_upload('org_image_hover', $org_image_hover); 
      }
      else{ $org_image_hover='';}

      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;
      $OrderBy=pdo_select("SELECT OrderBy FROM card_org ORDER BY OrderBy DESC LIMIT 0,1", 'no');
      $OrderBy=(int)$OrderBy['OrderBy']+1;

	$param=  [           'Tb_index'=>$Tb_index,
			                'mt_id'=>$_POST['mt_id'],
			             'org_name'=>$_POST['org_name'],
			         'org_nickname'=>$_POST['org_nickname'],
			            'org_image'=>$org_image,
			      'org_image_hover'=>$org_image_hover,
			              'OrderBy'=>$OrderBy,
			          'OnLineOrNot'=>$OnLineOrNot
			         ];
	pdo_insert('card_org', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== image圖 ========================
      if (!empty($_FILES['org_image']['name'])) {

      	 $type=explode('.', $_FILES['org_image']['name']);
      	 $org_image=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('org_image', $org_image);
        $org_image_param=['org_image'=>$org_image];
        $org_image_where=['Tb_index'=>$Tb_index];
        pdo_update('card_org', $org_image_param, $org_image_where);

      }
      //-------------------- image_hover圖 ------------------------------
      if (!empty($_FILES['org_image_hover']['name'])) {

      	 $type=explode('.', $_FILES['org_image_hover']['name']);
      	 $org_image_hover=$Tb_index.date('His').'_hover'.'.'.$type[count($type)-1];
         fire_upload('org_image_hover', $org_image_hover);
        $org_image_hover_param=['org_image_hover'=>$org_image_hover];
        $org_image_hover_where=['Tb_index'=>$Tb_index];
        pdo_update('card_org', $org_image_hover_param, $org_image_hover_where);

      }
      	//--------------------------- END -----------------------------------
    
    $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;

    $param=[  
		              'mt_id'=>$_POST['mt_id'],
    	             'org_name'=>$_POST['org_name'],
    	             'org_nickname'=>$_POST['org_nickname'],
		             'OnLineOrNot'=>$OnLineOrNot
		          ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('card_org', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM card_org WHERE Tb_index=:Tb_index', $where);

 	$card_type=$_GET['MT_id']=='site2018110611172385' ? '信用卡':'金融卡';
 	$newORedit=empty($_GET['Tb_index']) ? '新增':'修改';
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><?php echo $newORedit.$card_type;?>組織
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="org_name"><span class="text-danger">*</span> 發卡組織全名</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="org_name" name="org_name" value="<?php echo $row['org_name'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="org_nickname"><span class="text-danger">*</span> 發卡組織簡稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="org_nickname" name="org_nickname" value="<?php echo $row['org_nickname'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="org_image">發卡組織圖檔</label>
							<div class="col-md-10">
								<input type="file" name="org_image" class="form-control" accept="image/*" id="org_image" onchange="file_viewer_load_new(this, '#img_box')">
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['org_image'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['org_image'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_img" value="<?php echo $row['org_image'];?>">
								</div>
							</div>
						<?php }?>		
						</div>


						<!-- <div class="form-group">
							<label class="col-md-2 control-label" for="org_image_hover">發卡組織Hover圖檔</label>
							<div class="col-md-10">
								<input type="file" name="org_image_hover" class="form-control" accept="image/*" id="org_image_hover" onchange="file_viewer_load_new(this, '#img_box_hover')">
							</div>
						</div> -->

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box_hover" class="col-md-4">
								
							</div>
						<?php if(!empty($row['org_image_hover'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img_hover"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['org_image_hover'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_img_hover" value="<?php echo $row['org_image_hover'];?>">
								</div>
							</div>
						<?php }?>		
						</div>

		

						<div class="form-group">
							<label class="col-md-2 control-label" for="OnLineOrNot"><span class="text-danger">*</span> 是否上線</label>
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

					<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="getBack()">放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
          $("#submit_btn").click(function(event) {
          	  var err_txt='';
          	 err_txt = err_txt + check_input( '[name="org_name"]', '發卡組織全名，' );
          	 err_txt = err_txt + check_input( '[name="org_nickname"]', '發卡組織簡稱' );


          	 if (err_txt!='') {
          	  alert("請輸入"+err_txt+"!!");
          	 }
          	 else{

          	  $('#put_form').submit();
          	 }
          });
    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            org_image: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});
      //------------------------------ 刪hover圖 ---------------------------------
          $("#one_del_img_hover").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                       org_image_hover: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});
      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

