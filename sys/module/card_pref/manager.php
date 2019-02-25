<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 
    	if (!empty($_POST['pref_image'])) {
    		$param=['pref_image'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('card_pref', $param, $where);
            unlink('../../img/'.$_POST['pref_image']);
    	}else{
        //----------------------- image_hover刪除 -------------------------------
    		$param=['card_image_hover'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('card_pref', $param, $where);
            unlink('../../img/'.$_POST['card_image_hover']);
    	}
       exit();
  	}
	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='pref'.date('YmdHis').rand(0,99);
     
     //===================== image圖 ========================
      if (!empty($_FILES['pref_image']['name'])){

      	 $type=explode('.', $_FILES['pref_image']['name']);
      	 $pref_image=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('pref_image', $pref_image); 
      }
      else{ $pref_image='';}

     //===================== image_hover圖 ========================
      if (!empty($_FILES['card_image_hover']['name'])){

      	 $type=explode('.', $_FILES['card_image_hover']['name']);
      	 $card_image_hover=$Tb_index.'_hover'.'.'.$type[count($type)-1];
         fire_upload('card_image_hover', $card_image_hover); 
      }
      else{ $card_image_hover='';}

      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;
      $OrderBy=pdo_select("SELECT OrderBy FROM card_pref ORDER BY OrderBy DESC LIMIT 0,1", 'no');
      $OrderBy=(int)$OrderBy['OrderBy']+1;

	$param=  ['Tb_index'=>$Tb_index,
			              'mt_id'=>$_POST['mt_id'],
			             'pref_name'=>$_POST['pref_name'],
			           'pref_image'=>$pref_image,
			              'pref_txt'=>$_POST['pref_txt'],
			              'OrderBy'=>$OrderBy,
			        'OnLineOrNot'=>$OnLineOrNot
			         ];
	pdo_insert('card_pref', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== image圖 ========================
      if (!empty($_FILES['pref_image']['name'])) {

      	 $type=explode('.', $_FILES['pref_image']['name']);
      	 $pref_image=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('pref_image', $pref_image);
        $pref_image_param=['pref_image'=>$pref_image];
        $pref_image_where=['Tb_index'=>$Tb_index];
        pdo_update('card_pref', $pref_image_param, $pref_image_where);

      }
      //-------------------- image_hover圖 ------------------------------
      if (!empty($_FILES['card_image_hover']['name'])) {

      	 $type=explode('.', $_FILES['card_image_hover']['name']);
      	 $card_image_hover=$Tb_index.date('His').'_hover'.'.'.$type[count($type)-1];
         fire_upload('card_image_hover', $card_image_hover);
        $card_image_hover_param=['card_image_hover'=>$card_image_hover];
        $card_image_hover_where=['Tb_index'=>$Tb_index];
        pdo_update('card_pref', $card_image_hover_param, $card_image_hover_where);

      }
      	//--------------------------- END -----------------------------------
    
    $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;

    $param=[  
		              'mt_id'=>$_POST['mt_id'],
    	             'pref_name'=>$_POST['pref_name'],
		               'pref_txt'=>$_POST['pref_txt'],
		        'OnLineOrNot'=>$OnLineOrNot
		          ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('card_pref', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM card_pref WHERE Tb_index=:Tb_index', $where);
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
							<label class="col-md-2 control-label" for="pref_name"><span class="text-danger">*</span> 優惠名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="pref_name" name="pref_name" value="<?php echo $row['pref_name'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="pref_image"><span class="text-danger">*</span> 優惠圖示</label>
							<div class="col-md-10">
								<input type="file" name="pref_image" class="form-control" accept="image/*" id="pref_image" onchange="file_viewer_load_new(this, '#img_box')">
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['pref_image'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['pref_image'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_pref_image" value="<?php echo $row['pref_image'];?>">
								</div>
							</div>
						<?php }?>		
						</div>

					
					

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span> 優惠範圍說明</label>
							<div class="col-md-10">
								<textarea  class="form-control" name="pref_txt" style="height: 200px;" ><?php echo $row['pref_txt'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="OnLineOrNot"><span class="text-danger"></span> 是否上線</label>
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
          	  var err_txt='';
          	err_txt = err_txt + check_input( '[name="pref_name"]', '優惠名稱，' );
          	err_txt = $('[name="pref_image"]').val()=='' && $('[name="old_pref_image"]').val()==undefined ? err_txt + '優惠圖示，' : err_txt;
          	err_txt = err_txt + check_input( '[name="pref_txt"]', '優惠範圍說明' );

          	

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

