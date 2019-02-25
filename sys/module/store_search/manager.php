<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.fancybox-slide--iframe .fancybox-content {
    width  : 700px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}

.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }

.btn.btn-success{ margin: 2px; padding: 2px 5px; }

#twzipcode select, #twzipcode input{ padding: 5px 10px; border: 1px solid #ececec; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {

    if (!empty($_POST['type']) && $_POST['type']=='delete') { //刪除
    	if (!empty($_POST['ns_photo_1'])) {
    		    $param=array('ns_photo_1'=>'');
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('store', $param, $where);

            unlink('../../img/'.$_POST['ns_photo_1']);
    	}
      elseif(!empty($_POST['ns_photo_2'])){
            $param=array('ns_photo_2'=>'');
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('store', $param, $where);

            unlink('../../img/'.$_POST['ns_photo_2']);
      }
      else{
    		 //----------------------- 多檔刪除 -------------------------------
    		$sel_where=array('Tb_index'=>$_POST['Tb_index']);
    		$otr_file=pdo_select('SELECT OtherFile FROM store WHERE Tb_index=:Tb_index', $sel_where);
    		$otr_file=explode(',', $otr_file['OtherFile']);

    		for ($i=0; $i <count($otr_file)-1 ; $i++) { //比對 
    			 if ($otr_file[$i]!=$_POST['OtherFile']) {
    			 	$new_file.=$otr_file[$i].',';
    			 }else{
    			 	 unlink('../../other_file/'.$_POST['OtherFile']);
    			 }
    		}
    		$param=array('OtherFile'=>$new_file);
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('store', $param, $where);
    	}

       exit();
  	}

   
   //========================================= 新增=========================================
   //========================================= 新增=========================================
   //========================================= 新增=========================================

	if (empty($_POST['Tb_index'])) {

		$Tb_index='st'.date('YmdHis').rand(0,99);
        

   //----------------------- 檔案判斷 -------------------------

      //-- 商店LOGO --
      if (!empty($_FILES['st_logo']['name'])) {

      	if (test_img($_FILES['st_logo']['name'])){
      		 $type=explode('.', $_FILES['st_logo']['name']);
      		 $st_logo=$Tb_index.'.'.$type[count($type)-1];
      		 //ecstart_convert_jpeg_NEW($_FILES['st_logo']['tmp_name'],'../../img/'.$st_logo, 750);
           fire_upload('st_logo', $st_logo);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      	 
      }else{ $st_logo=''; }



      $st_main_type=empty($_POST['st_main_type']) ? '':$_POST['st_main_type'];
      $st_second_type=empty($_POST['st_second_type']) ? '':$_POST['st_second_type'];
      $st_label=empty($_POST['st_label']) ? '': implode(',', $_POST['st_label']);
      $StartDate=empty($_POST['StartDate']) ? date('Y-m-d H:i:s') : $_POST['StartDate'];
      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;


	$param=array('Tb_index'=>$Tb_index,
		              'mt_id'=>$_POST['mt_id'],
                  'st_type'=>$_POST['st_type'],
                  'st_main_type'=>$st_main_type,
                  'st_second_type'=>$st_second_type,
                  'st_name'=>$_POST['st_name'],
                  'st_nickname'=>$_POST['st_nickname'],
                  'st_url'=>$_POST['st_url'],
                  'st_phone'=>$_POST['st_phone'],
                  'st_ser_phone'=>$_POST['st_ser_phone'],
                  'st_adds'=>$_POST['zipcode'].$_POST['county'].$_POST['district'].','.$_POST['st_adds'],
                  'st_logo'=>$st_logo,
                  'st_label'=>$st_label,
                  'st_intro'=>$_POST['st_intro'],
		              'StartDate'=>$StartDate,
		              'OnLineOrNot'=>$OnLineOrNot,
		          );

	pdo_insert('store', $param);

	location_up('admin.php?MT_id='.$_POST['mt_id'],'已新增商店');
   }


   //========================================= 修改=========================================
   //========================================= 修改=========================================
   //========================================= 修改=========================================

   else{ 

   	$Tb_index =$_POST['Tb_index'];


     //----------------------- 檔案判斷 -------------------------
   	   //-- 商店LOGO --
      if (!empty($_FILES['st_logo']['name'])) {

      	if (test_img($_FILES['st_logo']['name'])){
      			$type=explode('/', $_FILES['st_logo']['type']);
      			$st_logo=$Tb_index.'-'.date("His").'.'.$type[1];
      		   // ecstart_convert_jpeg_NEW($_FILES['st_logo']['tmp_name'],'../../img/'.$st_logo, 750);
            fire_upload('st_logo', $st_logo);

      		  $st_logo_param=array('st_logo'=>$st_logo);
      		  $st_logo_where=array('Tb_index'=>$Tb_index);
      		  pdo_update('store', $st_logo_param, $st_logo_where);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      }
 

   
      $st_main_type=empty($_POST['st_main_type']) ? '':$_POST['st_main_type'];
      $st_second_type=empty($_POST['st_second_type']) ? '':$_POST['st_second_type'];
      $st_label=empty($_POST['st_label']) ? '': implode(',', $_POST['st_label']);
      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;

    
    $param=array(
                  
                  'st_type'=>$_POST['st_type'],
                  'st_main_type'=>$st_main_type,
                  'st_second_type'=>$st_second_type,
                  'st_name'=>$_POST['st_name'],
                  'st_nickname'=>$_POST['st_nickname'],
                  'st_url'=>$_POST['st_url'],
                  'st_phone'=>$_POST['st_phone'],
                  'st_ser_phone'=>$_POST['st_ser_phone'],
                  'st_adds'=>$_POST['zipcode'].$_POST['county'].$_POST['district'].','.$_POST['st_adds'],
                  'st_label'=>$st_label,
                  'st_intro'=>$_POST['st_intro'],
                  'OnLineOrNot'=>$OnLineOrNot,
              );

  $where=array( 'Tb_index'=>$Tb_index );
	pdo_update('store', $param, $where);
	
  location_up('admin.php?MT_id='.$_POST['mt_id'], '已更新商店');
  }
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM store WHERE Tb_index=:Tb_index', $where);

    
    $st_label=empty($row['st_label']) ? '' : explode(',', $row['st_label']);
    $zipcode=substr($row['st_adds'], 0,3);
    $adds=explode(',', $row['st_adds']);

}


?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>商店資料編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">

            <div class="form-group">
              <label class="col-md-2 control-label" ><span class="text-danger">*</span>商店類別</label>
              <div class="col-md-10">
               <?php 
                 //-- 商店類別 --
                 $row_st_type=$NewPdo->select("SELECT * FROM store_type ORDER BY OrderBy ASC");
                 foreach ($row_st_type as $row_st_type_one) {

                  if($row['st_type']==$row_st_type_one['Tb_index']){
                    echo '<label><input type="radio" checked name="st_type" value="'.$row_st_type_one['Tb_index'].'"> '.$row_st_type_one['st_name'].'｜</label>'; 
                  }
                  else{
                    echo '<label><input type="radio" name="st_type" value="'.$row_st_type_one['Tb_index'].'"> '.$row_st_type_one['st_name'].'｜</label>';
                  }
                 }
               ?>

              </div>
            </div>
            
            <?php 
             if ($row['st_type']=='st2019013117015133' || $row['st_type']=='st201901311701582') {
               $style_dis='block';

               $st_main_type_txt='';
               $st_main_type_arr=$NewPdo->select("SELECT Tb_index, st_name FROM store_type_main WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$row['st_type']]);
               foreach ($st_main_type_arr as $st_main_type_one) {
                if ($st_main_type_one['Tb_index']==$row['st_main_type']) {
                  $st_main_type_txt.='<option selected value="'.$st_main_type_one['Tb_index'].'">'.$st_main_type_one['st_name'].'</option>';
                }
                else{
                 $st_main_type_txt.='<option value="'.$st_main_type_one['Tb_index'].'">'.$st_main_type_one['st_name'].'</option>';
                }
               }

               $st_second_type_txt='';
               $st_second_type_arr=$NewPdo->select("SELECT Tb_index, st_name FROM store_type_second WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$row['st_main_type']]);
               foreach ($st_second_type_arr as $st_second_type_one) {
                 if ($st_second_type_one['Tb_index']==$row['st_second_type']){
                  $st_second_type_txt.='<option selected value="'.$st_second_type_one['Tb_index'].'">'.$st_second_type_one['st_name'].'</option>';
                 }
                 else{
                  $st_second_type_txt.='<option value="'.$st_second_type_one['Tb_index'].'">'.$st_second_type_one['st_name'].'</option>';
                 }
                 
               }
             }
             else{
               $style_dis='none';
             }
            ?>
            <div id="stm_type" style="display: <?php echo $style_dis; ?>;" class="form-group">
              <label class="col-md-2 control-label" for="ns_ftitle"><span class="text-danger">*</span>商店分類</label>
              <div class="col-md-10">
                <div class="form-inline">
                  <select id="st_main_type" name="st_main_type" class="form-control">
                    <option value="">--選擇主分類--</option>
                    <?php echo $st_main_type_txt; ?>
                  </select>
                  <select id="st_second_type" name="st_second_type" class="form-control">
                    <option value="">--選擇次分類--</option>
                    <?php echo $st_second_type_txt; ?>
                  </select>
                </div>
                
              </div>
            </div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="st_name"><span class="text-danger">*</span>商店全名</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="st_name" name="st_name"  value="<?php echo $row['st_name'];?>">
							</div>

              <label class="col-md-2 control-label" for="st_nickname"><span class="text-danger">*</span>商店簡稱</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="st_nickname" name="st_nickname"  value="<?php echo $row['st_nickname'];?>">
              </div>
						</div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="st_url"><span class="text-danger">*</span>商店網址</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="st_url" name="st_url"  value="<?php echo $row['st_url'];?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="st_phone">電話</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="st_phone" name="st_phone"  value="<?php echo $row['st_phone'];?>">
              </div>

              <label class="col-md-2 control-label" for="st_ser_phone">客服電話</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="st_ser_phone" name="st_ser_phone"  value="<?php echo $row['st_ser_phone'];?>">
              </div>
            </div>

            <div class="form-group">
              
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="st_adds">地址</label>
              <div class="col-md-10">
                <div id="twzipcode"></div>
                <input type="text" class="form-control" id="st_adds" name="st_adds"  value="<?php echo $adds[1];?>">
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label" for="st_logo"><span class="text-danger">*</span> 商店LOGO</label>
              <div class="col-md-3">
                <input type="file" name="st_logo" class="form-control" id="st_logo" onchange="file_viewer_load_new(this, '#img_box')">
                <span class="text-danger">( 圖檔尺寸: 150*100 )</span>
              </div>

            </div>

            <div class="form-group">
               <label class="col-md-2 control-label" ></label>
               <div id="img_box" class="col-md-4">
                
              </div>
            <?php if(!empty($row['st_logo'])){?>
              <div  class="col-md-4">
                 <div id="img_div" >
                  <p>目前圖檔</p>
                 <button type="button" id="one_del_img1" class="one_del_img"> X </button>
                  <span class="img_check"><i class="fa fa-check"></i></span>
                  <input type="hidden" value="<?php echo $row['st_logo'];?>">
                  <img id="one_img" src="../../img/<?php echo $row['st_logo'];?>" alt="請上傳代表圖檔">
                  <input type="hidden" name="old_st_logo" value="<?php echo $row['st_logo'];?>">
                </div>
              </div>
            <?php }?>   
            </div>



            <div class="form-group">
              <label class="col-md-2 control-label" for="st_label">標籤</label>
              <div id="over_label" class="col-md-8">
                <?php 
                  if (!empty($row['st_label'])) {
                    for ($i=0; $i <count($st_label) ; $i++) { 
                       echo '<span class="label">'.$st_label[$i].'<input type="hidden" name="st_label[]" value="'.$st_label[$i].'"></span>、';
                     }
                  }
                ?>
              </div>
              <div class="col-md-2">
                <a href="news_label_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇標籤</a>
              </div>
            </div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span>商店內容</label>
							<div class="col-md-10">
								<textarea id="ckeditor" name="st_intro" ><?php echo $row['st_intro'];?></textarea>
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
						<?php if(empty($_GET['Tb_index'])){?>
							<button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">儲存</button>
						<?php }else{?>
						    <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">更新</button>
						<?php }?>
						</div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-danger btn-block btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="clean_all()">重設表單</button>
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

        $('#twzipcode').twzipcode({
           'zipcodeSel'  : '<?php echo $zipcode; ?>'
          });

          
          $('[name="st_type"]').change(function(event) {
            //-- 集點店家 OR 其他 --
            if ($(this).val()=='st2019013117015133' || $(this).val()=='st201901311701582') {
                $('#stm_type').css('display', 'block');
                $.ajax({
                  url: 'manager_ajax.php',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                    st_type: $(this).val()
                  },
                  success:function (data) {

                    $('#st_main_type').html('<option value="">--選擇主分類--</option>');
                    $('#st_second_type').html('<option value="">--選擇次分類--</option>');
                    $.each(data, function(index, val) {
                       $('#st_main_type').append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
                    });
                  }
                });
            }
            else{
              $('#stm_type').css('display', 'none');
            }
          });


          //-- 主分類選擇 --
          $('#st_main_type').change(function(event) {
            $.ajax({
              url: 'manager_ajax.php',
              type: 'POST',
                  dataType: 'json',
                  data: {
                    st_main_type: $(this).val()
              },
              success:function (data) {

                $('#st_second_type').html('<option value="">--選擇次分類--</option>');
                $.each(data, function(index, val) {
                   $('#st_second_type').append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
                });
              }
            });
            
          });

          //-- 儲存、更新 ---
          $("#submit_btn").click(function(event) {

          	var err_txt='';
            
            err_txt = err_txt + check_input( '[name="st_type"]', '商店類別，' );
            
            //-- 集點店家 OR 其他 --
            if($('[name="st_type"]:checked').val()=='st2019013117015133' || $('[name="st_type"]:checked').val()=='st201901311701582'){

                err_txt = $('#st_main_type').val()=='' ? err_txt+'商店主分類，': err_txt;
                err_txt = $('#st_second_type').val()=='' ? err_txt+'商店次分類，': err_txt;
            }
            
            err_txt = err_txt + check_input( '#st_name', '商店名稱，' );
            err_txt = err_txt + check_input( '#st_nickname', '商店簡稱，' );
            err_txt = err_txt + check_input( '#st_url', '商店網址，');
            err_txt = $('[name="st_logo"]').val()=='' && $('[name="old_st_logo"]').val()==undefined ? err_txt + '商店LOGO，' : err_txt;
            err_txt = CKEDITOR.instances.ckeditor.getData()=='' ? err_txt + '商店內容' : err_txt;



            if (err_txt!='') {
             alert("請輸入"+err_txt+"!!");
            }
            else{
             $('#put_form').submit();
            }
          });


    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img1").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            ns_photo_1: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});

    //------------------------------ 刪檔 ---------------------------------
          $("#one_del_img2").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            ns_photo_2: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
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


	$(window).on('load',  function(event){
		sessionStorage.clear();
        
    //-- 新聞分類 --
		if ($('[name="ns_nt_pk"]').length>0) {
			//-- 記錄暫存 --
       sessionStorage.setItem("news_type", $('[name="ns_nt_pk"]').val());
       sessionStorage.setItem("news_sp_type", $('[name="ns_nt_sp_pk"]').val());
		}
        
        //-- 標籤 --
		if ($('[name="ns_label[]"]').length>0) {
            var lab_arr=[];
			$.each($('[name="ns_label[]"]'), function() {
			  lab_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_label", lab_arr);
		}
        

	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

