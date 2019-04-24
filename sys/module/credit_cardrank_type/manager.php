<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 
    	if (!empty($_POST['cc_so_photo_1'])) {
    		$param=['cc_so_photo_1'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('credit_cardrank_type', $param, $where);
            unlink('../../img/'.$_POST['cc_so_photo_1']);
    	}else{
        //----------------------- image_hover刪除 -------------------------------
    		$param=['cc_so_photo_1_hover'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('credit_cardrank_type', $param, $where);
            unlink('../../img/'.$_POST['cc_so_photo_1_hover']);
    	}
       exit();
  	}
	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='r_type'.date('YmdHis').rand(0,99);
     
     //===================== image圖 ========================
      if (!empty($_FILES['cc_so_photo_1']['name'])){

      	 $type=explode('.', $_FILES['cc_so_photo_1']['name']);
      	 $cc_so_photo_1=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('cc_so_photo_1', $cc_so_photo_1); 
      }
      else{ $cc_so_photo_1='';}

     //===================== image_hover圖 ========================
      if (!empty($_FILES['cc_so_photo_1_hover']['name'])){

      	 $type=explode('.', $_FILES['cc_so_photo_1_hover']['name']);
      	 $cc_so_photo_1_hover=$Tb_index.'_down'.'.'.$type[count($type)-1];
         fire_upload('cc_so_photo_1_hover', $cc_so_photo_1_hover); 
      }
      else{ $cc_so_photo_1_hover='';}

      $cc_so_order=pdo_select("SELECT cc_so_order FROM credit_cardrank_type ORDER BY cc_so_order DESC LIMIT 0,1", 'no');
      $cc_so_order=(int)$cc_so_order['cc_so_order']+1;

	$param=  [   'Tb_index'=>$Tb_index,
			  'cc_so_cname'=>$_POST['cc_so_cname'],
	        'cc_so_photo_1'=>$cc_so_photo_1,
      'cc_so_photo_1_hover'=>$cc_so_photo_1_hover,
			  'cc_so_order'=>$cc_so_order,
			 'cc_so_status'=>$_POST['cc_so_status'],
	'cc_so_show_order_icon'=>$_POST['cc_so_show_order_icon'],
	  'cc_so_type_01_cname'=>$_POST['cc_so_type_01_cname'],
	  'cc_so_type_02_cname'=>$_POST['cc_so_type_02_cname'],
	  'cc_so_type_03_cname'=>$_POST['cc_so_type_03_cname'],
	   'cc_so_type_02_order'=>$_POST['cc_so_type_02_is_r'],
	   'cc_so_type_03_order'=>$_POST['cc_so_type_03_is_r'],
	    'cc_so_create_time'=>date("Y-m-d H:i:s")

			         ];
	pdo_insert('credit_cardrank_type', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== image圖 ========================
      if (!empty($_FILES['cc_so_photo_1']['name'])) {

      	 $type=explode('.', $_FILES['cc_so_photo_1']['name']);
      	 $cc_so_photo_1=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('cc_so_photo_1', $cc_so_photo_1);
        $cc_so_photo_1_param=['cc_so_photo_1'=>$cc_so_photo_1];
        $cc_so_photo_1_where=['Tb_index'=>$Tb_index];
        pdo_update('credit_cardrank_type', $cc_so_photo_1_param, $cc_so_photo_1_where);

      }
      //-------------------- image_hover圖 ------------------------------
      if (!empty($_FILES['cc_so_photo_1_hover']['name'])) {

      	 $type=explode('.', $_FILES['cc_so_photo_1_hover']['name']);
      	 $cc_so_photo_1_hover=$Tb_index.date('His').'_down'.'.'.$type[count($type)-1];
         fire_upload('cc_so_photo_1_hover', $cc_so_photo_1_hover);
        $cc_so_photo_1_hover_param=['cc_so_photo_1_hover'=>$cc_so_photo_1_hover];
        $cc_so_photo_1_hover_where=['Tb_index'=>$Tb_index];
        pdo_update('credit_cardrank_type', $cc_so_photo_1_hover_param, $cc_so_photo_1_hover_where);

      }
      	//--------------------------- END -----------------------------------
    

    $param=  [   
			  'cc_so_cname'=>$_POST['cc_so_cname'],
			 'cc_so_status'=>$_POST['cc_so_status'],
	'cc_so_show_order_icon'=>$_POST['cc_so_show_order_icon'],
	  'cc_so_type_01_cname'=>$_POST['cc_so_type_01_cname'],
	  'cc_so_type_02_cname'=>$_POST['cc_so_type_02_cname'],
	  'cc_so_type_03_cname'=>$_POST['cc_so_type_03_cname'],
       'cc_so_type_02_order'=>$_POST['cc_so_type_02_is_r'],
	    'cc_so_type_03_order'=>$_POST['cc_so_type_03_is_r'],
			         ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('credit_cardrank_type', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM credit_cardrank_type WHERE Tb_index=:Tb_index', $where);
    
    $cc_so_status1=$row['cc_so_status']==1 || !isset($row['cc_so_status']) ? 'checked':'';
 	$cc_so_status0=$row['cc_so_status']==0 && isset($_GET['Tb_index']) ? 'checked':'';
 	$cc_so_status2=$row['cc_so_status']==2 ? 'checked':'';
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				  <?php 
                   if (empty($_GET['Tb_index'])) {
                   	echo '<header>新增排行分類</header>';
                   }
                   else{
                   	echo '<header>修改'.$row['cc_so_cname'].'排行分類</header>';
                   }
				  ?>
					
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_so_cname"><span class="text-danger">*</span> 排行分類</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_so_cname" name="cc_so_cname" value="<?php echo $row['cc_so_cname'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_so_photo_1"><span class="text-danger">*</span> 排行圖示</label>
							<div class="col-md-10">
								<input type="file" name="cc_so_photo_1" class="form-control" accept="image/*" id="cc_so_photo_1" onchange="file_viewer_load_new(this, '#img_box')">
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['cc_so_photo_1'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['cc_so_photo_1'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_cc_so_photo_1" value="<?php echo $row['cc_so_photo_1'];?>">
								</div>
							</div>
						<?php }?>		
						</div>

					

						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_so_photo_1_hover"><span class="text-danger">*</span> 排行圖示(滑鼠經過)</label>
							<div class="col-md-10">
								<input type="file"  name="cc_so_photo_1_hover" class="form-control" id="cc_so_photo_1_hover" onchange="file_viewer_load_new(this, '#other_div')">
								
							</div>
						</div>



						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="other_div" class="col-md-4">
								
							</div>

							<div class="col-md-4">
				<?php if(!empty($row['cc_so_photo_1_hover'])){
                                  
                          $cc_so_photo_1_hover=explode(',', $row['cc_so_photo_1_hover']);
                          for ($i=0; $i <count($cc_so_photo_1_hover) ; $i++) { 
                          	 $other_txt='<div class="file_div" >
                          	              <p>目前檔案</p>
                          	               <button type="button" class="one_del_file"> X </button>
                          	               <img id="one_img" src="../../img/'.$cc_so_photo_1_hover[$i].'" alt="">
                          	               <input type="hidden" name="old_cc_so_photo_1_hover" value="'.$cc_so_photo_1_hover[$i].'">
                          	             </div>';
                          	 echo $other_txt;
                          }
                        }
			    ?>
			            </div>

						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span> 項目1名稱</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="cc_so_type_01_cname" name="cc_so_type_01_cname" value="<?php echo $row['cc_so_type_01_cname'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span> 項目2名稱</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="cc_so_type_02_cname" name="cc_so_type_02_cname" value="<?php echo $row['cc_so_type_02_cname'];?>">
							</div>
							<div class="col-md-3">
							   是否排序：<label><input type="radio" name="cc_so_type_02_is_r" value="1"> 是</label>｜<label><input type="radio" name="cc_so_type_02_is_r" checked value="0"> 否</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span> 項目3名稱</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="cc_so_type_03_cname" name="cc_so_type_03_cname" value="<?php echo $row['cc_so_type_03_cname'];?>">
							</div>
							<div class="col-md-3">
								是否排序：<label><input type="radio" name="cc_so_type_03_is_r" value="1"> 是</label>｜<label><input type="radio" name="cc_so_type_03_is_r" checked value="0"> 否</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_so_status"><span class="text-danger">*</span> 使用狀態</label>
							<div class="col-md-10">
								<label><input type="radio" <?php echo $cc_so_status1;?> name="cc_so_status" value="1"> 使用中</label>｜
								<label><input type="radio" <?php echo $cc_so_status0;?> name="cc_so_status" value="0"> 停用</label>｜
								<label><input type="radio" <?php echo $cc_so_status2;?> name="cc_so_status" value="2"> 後台顯示</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_so_show_order_icon"><span class="text-danger">*</span> 顯示排名</label>
							<div class="col-md-10">
								<label><input type="radio" checked name="cc_so_show_order_icon" value="1"> 是</label>｜
								<label><input type="radio" name="cc_so_show_order_icon" value="0"> 否</label>
							</div>
						</div>

						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
					</form>

                    <div class="text-center">
                    	
                    	
                    	<?php if(empty($_GET['Tb_index'])){?>
                    		<button type="button" id="submit_btn" class="btn btn-success btn-raised px-2">儲存</button>
                    	<?php }else{?>
                    	    <button type="button" id="submit_btn" class="btn btn-success btn-raised px-2">更新</button>
                    	<?php }?>

                    		<button type="button" class="btn btn-danger btn-flat px-2" data-toggle="modal" data-target="#settingsModal1" onclick="clean_all()">放棄</button>
                    </div>

				</div><!-- /.panel-body -->
			</div><!-- /.panel -->


		</div>

		
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {


        $('[name="cc_so_type_02_is_r"][value="<?php echo $row['cc_so_type_02_order']; ?>"]').prop('checked', true);
        $('[name="cc_so_type_03_is_r"][value="<?php echo $row['cc_so_type_03_order']; ?>"]').prop('checked', true);



          $("#submit_btn").click(function(event) {
          	 var err_txt='';
          	err_txt = err_txt + check_input( '[name="cc_so_cname"]', '排行分類，' );
          	err_txt = $('[name="cc_so_photo_1"]').val()=='' && $('[name="old_cc_so_photo_1"]').val()==undefined ? err_txt + '排行圖示，' : err_txt;
          	err_txt = $('[name="cc_so_photo_1_hover"]').val()=='' && $('[name="old_cc_so_photo_1_hover"]').val()==undefined ? err_txt + '排行圖示(滑鼠經過)，' : err_txt;
          	err_txt = err_txt + check_input( '[name="cc_so_type_01_cname"]', '項目1名稱，' );
          	err_txt = err_txt + check_input( '[name="cc_so_type_02_cname"]', '項目2名稱，' );
          	err_txt = err_txt + check_input( '[name="cc_so_type_03_cname"]', '項目3名稱' );


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
                            cc_so_photo_1: '<?php echo $row["cc_so_photo_1"]?>',
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
                       cc_so_photo_1_hover: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});
      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

