<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 

    		$param=['eq_image'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('card_eq_item', $param, $where);
            unlink('../../img/'.$_POST['eq_image']);
    	
       exit();
  	}
	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='eq'.date('YmdHis').rand(0,99);
     
     //===================== image圖 ========================
      if (!empty($_FILES['eq_image']['name'])){

      	 $type=explode('.', $_FILES['eq_image']['name']);
      	 $eq_image=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('eq_image', $eq_image); 
      }
      else{ $eq_image='';}

      $is_im_eq=empty($_POST['is_im_eq']) ? 0:1;
      $OrderBy=pdo_select("SELECT OrderBy FROM card_eq_item ORDER BY OrderBy DESC LIMIT 0,1", 'no');
      $OrderBy=(int)$OrderBy['OrderBy']+1;

	$param=  ['Tb_index'=>$Tb_index,
			              'mt_id'=>$_POST['mt_id'],
			             'eq_name'=>$_POST['eq_name'],
			           'eq_image'=>$eq_image,
			              'eq_type'=>$_POST['eq_type'],
			              'eq_txt'=>$_POST['eq_txt'],
			              'OrderBy'=>$OrderBy,
			        'is_im_eq'=>$is_im_eq
			         ];
	pdo_insert('card_eq_item', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== image圖 ========================
      if (!empty($_FILES['eq_image']['name'])) {

      	 $type=explode('.', $_FILES['eq_image']['name']);
      	 $eq_image=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('eq_image', $eq_image);
        $eq_image_param=['eq_image'=>$eq_image];
        $eq_image_where=['Tb_index'=>$Tb_index];
        pdo_update('card_eq_item', $eq_image_param, $eq_image_where);

      }
      	//--------------------------- END -----------------------------------
    
    $is_im_eq=empty($_POST['is_im_eq']) ? 0:1;

    $param=[  
		               'mt_id'=>$_POST['mt_id'],
    	             'eq_name'=>$_POST['eq_name'],
		             'eq_type'=>$_POST['eq_type'],
			          'eq_txt'=>$_POST['eq_txt'],
		             'is_im_eq'=>$is_im_eq
		          ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('card_eq_item', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM card_eq_item WHERE Tb_index=:Tb_index', $where);
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
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="eq_name"><span class="text-danger">*</span> 權益項目名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="eq_name" name="eq_name" value="<?php echo $row['eq_name'];?>">
							</div>
						</div>
						<div class="form-group">
							<label id="eq_image_la" class="col-md-2 control-label" for="eq_image">權益項目ICON</label>
							<div class="col-md-10">
								<input type="file" name="eq_image" class="form-control" accept="image/*" id="eq_image" onchange="file_viewer_load_new(this, '#img_box')">
								<span class="text-danger">icon 大小 寬：40px ; 高：等比例</span>
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['eq_image'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['eq_image'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_eq_image" value="<?php echo $row['eq_image'];?>">
								</div>
							</div>
						<?php }?>		
						</div>

					
					    <div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span> 權益類型</label>
							<div class="col-md-10">
								<label><input type="radio" name="eq_type" value="txt"> 一般文字內容</label>｜
								<label><input type="radio" name="eq_type" value="big"> 數字比大 (較大者為優)</label>｜
								<label><input type="radio" name="eq_type" value="small"> 數字比小 (較小者為優)</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor">量化規則</label>
							<div class="col-md-10">
								<textarea  class="form-control"  name="eq_txt" style="height: 200px;" ><?php echo $row['eq_txt'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="is_im_eq"><span class="text-danger">*</span> 是否為重要權益</label>
							<div class="col-md-10">
								<input style="width: 20px; height: 20px;" id="is_im_eq" name="is_im_eq" type="checkbox" value="1" <?php echo $check=$row['is_im_eq']==1 ? 'checked' : ''; ?>  />
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

         //-- 權益類型 --
         $('[name="eq_type"][value="<?php echo $row['eq_type'];?>"]').prop('checked', true);


          $("#submit_btn").click(function(event) {

          	 var err_txt='';
          	 err_txt = err_txt + check_input( '#eq_name', '權益項目名稱，' );

          	 if ($('#is_im_eq').prop('checked')==true) {

          	 	if ($('#img_div').length==0) {
          	 		err_txt = $('[name="eq_image"]').val()=='' && $('[name="old_eq_image"]').val()==undefined ? err_txt + '權益項目ICON，' : err_txt;
          	 	}
          	 }
          	 err_txt = err_txt + check_input( '[name="eq_type"]', '權益類型，' );
          	

          	 if (err_txt!='') {
          	  alert("請輸入"+err_txt+"!!");
          	 }
          	 else{

          	  $('#put_form').submit();
          	 }
          });

    //-- 選擇為重要權益 --
    $('#is_im_eq').change(function(event) {
    	if ($(this).prop('checked')==true) {
    		$('#eq_image_la').html('<span class="text-danger">*</span> 權益項目ICON');
    	}
    	else{
    		$('#eq_image_la').html('權益項目ICON');
    	}
    });

    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            pref_image: '<?php echo $row["pref_image"]?>',
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
                       card_image_hover: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});
      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

