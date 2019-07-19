<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 
    	if (!empty($_POST['aPic'])) {
    		$param=['aPic'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('bank_info', $param, $where);
            unlink('../../img/'.$_POST['aPic']);
    	}else{
        //----------------------- 多檔刪除 -------------------------------
    		$sel_where=['Tb_index'=>$_POST['Tb_index']];
    		$otr_file=pdo_select('SELECT OtherFile FROM bank_info WHERE Tb_index=:Tb_index', $sel_where);
    		$otr_file=explode(',', $otr_file['OtherFile']);
    		for ($i=0; $i <count($otr_file)-1 ; $i++) { //比對 
    			 if ($otr_file[$i]!=$_POST['OtherFile']) {
    			 	$new_file.=$otr_file[$i].',';
    			 }else{
    			 	 unlink('../../other_file/'.$_POST['OtherFile']);
    			 }
    		}
    		$param=['OtherFile'=>$new_file];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('bank_info', $param, $where);
    	}
       exit();
  	}


	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='bank'.date('YmdHis').rand(0,99);
     
     //===================== LOGO圖 ========================
      if (!empty($_FILES['bi_logo']['name'])){

      	 $type=explode('.', $_FILES['bi_logo']['name']);
      	 $bi_logo=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('bi_logo', $bi_logo); 
      }
      else{
      	$bi_logo='';
      }
     //===================== 申請書檔案 ========================
      if (!empty($_FILES['bd_path']['name'])){

      	 $type=explode('.', $_FILES['bd_path']['name']);
      	 $bd_path=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('bd_path', $bd_path); 
      }
      else{
      	$bd_path='';
      }

      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;
     
	$param=  [        'Tb_index'=>$Tb_index,
	                  'mt_id'=>$_POST['mt_id'],
			          'bi_code'=>$_POST['bi_code'],
			          'bi_fullname'=>$_POST['bi_fullname'],
			          'bi_shortname'=>$_POST['bi_shortname'],

			          'bi_logo'=>$bi_logo,
			          'bd_path'=>$bd_path,
			               
			         'bi_area'=>$_POST['bi_area'],
			         'bi_tel'=>$_POST['bi_tel'],
			         'bi_fax'=>$_POST['bi_fax'],
			         'bi_addr'=>$_POST['zipcode'].$_POST['county'].$_POST['district'].','.$_POST['bi_addr'],
			         'bi_tel_card'=>$_POST['bi_tel_card'],
			         'bi_tel2_card'=>$_POST['bi_tel2_card'],
			         'bi_tel3_card'=>$_POST['bi_tel3_card'],
			         'bi_tel_lost'=>$_POST['bi_tel_lost'],
			         'bi_bank_url'=>$_POST['bi_bank_url'],
			         'bi_card_url'=>$_POST['bi_card_url'],
			         'bi_desc'=>$_POST['bi_desc'],
			         'bd_type'=>$_POST['bd_type'],
			         'bd_src'=>$_POST['bd_src'],
			         'bd_name'=>$_POST['bd_name'],
			         'bd_url'=>$_POST['bd_url'],
			         'bi_msg_assign_title'=>$_POST['bi_msg_assign_title'],
			         'bi_msg_assign_url'=>$_POST['bi_msg_assign_url'],
			         'bi_contact_name'=>$_POST['bi_contact_name'],
			         'bi_contact_tel'=>$_POST['bi_contact_tel'],
			         'bi_contact_email'=>$_POST['bi_contact_email'],
			         'bi_contact_job'=>$_POST['bi_contact_job'],
			          
			         'OnLineOrNot'=>$OnLineOrNot

			         ];
	pdo_insert('bank_info', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'].'&page='.$_POST['page'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== LOGO圖 ========================
      if (!empty($_FILES['bi_logo']['name'])) {

      	 $type=explode('.', $_FILES['bi_logo']['name']);
      	 $bi_logo=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('bi_logo', $bi_logo);
        $bi_logo_param=['bi_logo'=>$bi_logo];
        $bi_logo_where=['Tb_index'=>$Tb_index];
        pdo_update('bank_info', $bi_logo_param, $bi_logo_where);

      }
      //-------------------- 申請書檔案 ------------------------------
      if (!empty($_FILES['bd_path']['name'])) {

      	 $type=explode('.', $_FILES['bd_path']['name']);
      	 $bd_path=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('bd_path', $bd_path);
        $bd_path_param=['bd_path'=>$bd_path];
        $bd_path_where=['Tb_index'=>$Tb_index];
        pdo_update('bank_info', $bd_path_param, $bd_path_where);

      }
      	//--------------------------- END -----------------------------------
    
    $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0:1;

    $param=  [     
			          'bi_code'=>$_POST['bi_code'],
			          'bi_fullname'=>$_POST['bi_fullname'],
			          'bi_shortname'=>$_POST['bi_shortname'],
			               
			         'bi_area'=>$_POST['bi_area'],
			         'bi_tel'=>$_POST['bi_tel'],
			         'bi_fax'=>$_POST['bi_fax'],
			         'bi_addr'=>$_POST['zipcode'].$_POST['county'].$_POST['district'].','.$_POST['bi_addr'],
			         'bi_tel_card'=>$_POST['bi_tel_card'],
			         'bi_tel2_card'=>$_POST['bi_tel2_card'],
			         'bi_tel3_card'=>$_POST['bi_tel3_card'],
			         'bi_tel_lost'=>$_POST['bi_tel_lost'],
			         'bi_bank_url'=>$_POST['bi_bank_url'],
			         'bi_card_url'=>$_POST['bi_card_url'],
			         'bi_desc'=>$_POST['bi_desc'],
			         'bd_type'=>$_POST['bd_type'],
			         'bd_src'=>$_POST['bd_src'],
			         'bd_name'=>$_POST['bd_name'],
			         'bd_url'=>$_POST['bd_url'],
			         'bi_msg_assign_title'=>$_POST['bi_msg_assign_title'],
			         'bi_msg_assign_url'=>$_POST['bi_msg_assign_url'],
			         'bi_contact_name'=>$_POST['bi_contact_name'],
			         'bi_contact_tel'=>$_POST['bi_contact_tel'],
			         'bi_contact_email'=>$_POST['bi_contact_email'],
			         'bi_contact_job'=>$_POST['bi_contact_job'],
			         'bi_msg_assign_title'=>$_POST['bi_msg_assign_title'],
			          
			         'OnLineOrNot'=>$OnLineOrNot

			         ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('bank_info', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'].'&page='.$_POST['page'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM bank_info WHERE Tb_index=:Tb_index', $where);

 	$zipcode=substr($row['bi_addr'], 0,3);

 	$bi_area_1=$row['bi_area']=='1' ? 'checked':'';
 	$bi_area_2=$row['bi_area']=='2' ? 'checked':'';
 	$bd_type_0=$row['bd_type']=='0' ? 'checked':'';
 	$bd_type_1=$row['bd_type']=='1' ? 'checked':'';
 	$bd_type_2=$row['bd_type']=='2' ? 'checked':'';
 	$bd_src_0=$row['bd_src']=='0' ? 'checked':'';
 	$bd_src_1=$row['bd_src']=='1' ? 'checked':'';
 	$bd_src_2=$row['bd_src']=='2' ? 'checked':'';
}
?>


<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>銀行資料編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_code">銀行代碼 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_code" name="bi_code" value="<?php echo $row['bi_code'];?>">
								<span>(請依照金融單位代碼)</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_fullname">銀行全名 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_fullname" name="bi_fullname" value="<?php echo $row['bi_fullname'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_shortname">銀行簡稱 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_shortname" name="bi_shortname" value="<?php echo $row['bi_shortname'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_area">銀行地區 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<label><input type="radio" name="bi_area" value="1" <?php echo $bi_area_1;?> > 本國銀行</label>｜
								<label><input type="radio" name="bi_area" value="2" <?php echo $bi_area_2;?> > 外國銀行</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_tel">總行電話 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_tel" name="bi_tel" value="<?php echo $row['bi_tel'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_fax">總行傳真</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_fax" name="bi_fax" value="<?php echo $row['bi_fax'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_addr">總行地址 <span class="text-danger">*</span></label>
							<div class="col-md-10">
							  <div class="twzipcode"></div>
							  <input type="text"  id="bi_addr" class="form-control" name="bi_addr" value="<?php echo $row['bi_addr'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_tel_card">信用卡服務專線 <span class="text-danger">*</span></label>
							<div class="col-md-10">
							  <div class="row">
							  	<div class="col-md-4">
							  		<input type="text"  id="bi_tel_card" class="form-control" name="bi_tel_card" placeholder="專線1" value="<?php echo $row['bi_tel_card'];?>">
							  	</div>
							  	<div class="col-md-4">
							  		<input type="text"  id="bi_tel2_card" class="form-control" name="bi_tel2_card" placeholder="專線2" value="<?php echo $row['bi_tel2_card'];?>">
							  	</div>
							  	<div class="col-md-4">
							  		<input type="text"  id="bi_tel3_card" class="form-control" name="bi_tel3_card" placeholder="專線3" value="<?php echo $row['bi_tel3_card'];?>">
							  	</div>
							  </div>
							  <span>例：0800-123-456</span>
							  
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_tel_lost">信用卡掛失專線 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_tel_lost" name="bi_tel_lost" value="<?php echo $row['bi_tel_lost'];?>">
								<span>例：0800-123-456</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_bank_url">總行網址 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_bank_url" name="bi_bank_url" value="<?php echo $row['bi_bank_url'];?>">
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_card_url">信用卡網址 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_card_url" name="bi_card_url" value="<?php echo $row['bi_card_url'];?>">
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_logo">銀行logo <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="file" name="bi_logo" class="form-control" accept="image/*" id="bi_logo" onchange="file_viewer_load_new(this, '#img_box')">
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['bi_logo'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['bi_logo'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_img" value="<?php echo $row['bi_logo'];?>">
								</div>
							</div>
						<?php }?>		
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_desc">備註</label>
							<div class="col-md-10">
								<textarea class="form-control" id="bi_desc" name="bi_desc" ><?php echo $row['bi_desc'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bd_type">申請書卡別 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<label><input type="radio" name="bd_type" value="0" <?php echo $bd_type_0;?> > 無</label>｜
								<label><input type="radio" name="bd_type" value="1" <?php echo $bd_type_1;?> > 信用卡</label>｜
								<label><input type="radio" name="bd_type" value="2" <?php echo $bd_type_2;?> > 金融卡</label>
							</div>
						</div>
                     
                     <div class="bd_div">
						<div class="form-group">
							<label class="col-md-2 control-label" for="bd_src">申請書提供方式 <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<label><input type="radio" name="bd_src" value="0" <?php echo $bd_src_0;?> > 無資料</label>｜
								<label><input type="radio" name="bd_src" value="1" <?php echo $bd_src_1;?> > 檔案上傳</label>｜
								<label><input type="radio" name="bd_src" value="2" <?php echo $bd_src_2;?> > 網址提供</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bd_name">申請書名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bd_name" name="bd_name" value="<?php echo $row['bd_name'];?>">
								
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="bd_path">申請書檔案</label>
							<div class="col-md-10">
								<input type="file" multiple name="bd_path" class="form-control" id="bd_path" onchange="file_load_new(this, '#other_div', 'manager.php', 'bd_path')">
							</div>
						</div>


						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="other_div" class="col-md-10">
								
							</div>

							<div class="col-md-10">
				<?php if(!empty($row['bd_path'])){
                                  
                          $bd_path=explode(',', $row['bd_path']);
                          for ($i=0; $i <count($bd_path)-1 ; $i++) { 
                          	 $other_txt='<div class="file_div" >
                          	              <p>目前檔案</p>
                          	               <button type="button" class="one_del_file"> X </button>
                          	               <img id="one_img" src="../../other_file/'.$bd_path[$i].'" alt="">
                          	               <input type="hidden" value="'.$bd_path[$i].'">
                          	             </div>';
                          	 echo $other_txt;
                          }
                        }
			    ?>
			            </div>

						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bd_url">申請書網址</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bd_url" name="bd_url" value="<?php echo $row['bd_url'];?>">
							</div>
						</div>
					</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_msg_assign_title">卡好康線上辦卡文字</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_msg_assign_title" name="bi_msg_assign_title" value="<?php echo $row['bi_msg_assign_title'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_msg_assign_url">卡好康線上辦卡網址</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_msg_assign_url" name="bi_msg_assign_url" value="<?php echo $row['bi_msg_assign_url'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_contact_name">聯絡人姓名</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_contact_name" name="bi_contact_name" value="<?php echo $row['bi_contact_name'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_contact_tel">聯絡人電話</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_contact_tel" name="bi_contact_tel" value="<?php echo $row['bi_contact_tel'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_contact_email">聯絡人E-mail</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_contact_email" name="bi_contact_email" value="<?php echo $row['bi_contact_email'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="bi_contact_job">聯絡人姓名職務</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bi_contact_job" name="bi_contact_job" value="<?php echo $row['bi_contact_job'];?>">
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
								<!-- <input style="width: 20px; height: 20px;" id="OnLineOrNot" name="OnLineOrNot" type="checkbox" value="1"   > -->
							</div>
						</div>

						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
						<input type="hidden" id="page" name="page" value="<?php echo $_GET['page'];?>">
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
							<button type="button" id="submit_btn" class="btn btn-success btn-raised">確定</button>
						<?php }else{?>
						    <button type="button" id="submit_btn" class="btn btn-success btn-raised">更新</button>
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
       

        //-- 判斷申請書 --
		$('[name="bd_type"]').change(function(event) {

			if ($(this).val()=='0') {
               $('.bd_div').css('display', 'none');
			}
			else if($(this).val()=='1'){
               $('.bd_div').css('display', 'block');
               $('.bd_div').find('.form-group').css('display', 'none');
               $('.bd_div').find('.form-group:nth-child(1)').css('display', 'block');
               $('.bd_div').find('.form-group:nth-child(1) .control-label').html('信用卡申請書提供方式 <span class="text-danger">*</span>');
               $('.bd_div').find('.form-group:nth-child(2) label').html('信用卡申請書名稱');
               $('.bd_div').find('.form-group:nth-child(3) label').html('信用卡申請書檔案');
               $('.bd_div').find('.form-group:nth-child(5) label').html('信用卡申請書網址');
               $('[name="bd_src"]').prop('checked', false);
			}
			else if($(this).val()=='2'){
               $('.bd_div').css('display', 'block');
               $('.bd_div').find('.form-group').css('display', 'none');
               $('.bd_div').find('.form-group:nth-child(1)').css('display', 'block');
               $('.bd_div').find('.form-group:nth-child(1) .control-label').html('金融卡申請書提供方式 <span class="text-danger">*</span>');
               $('.bd_div').find('.form-group:nth-child(2) label').html('金融卡申請書名稱');
               $('.bd_div').find('.form-group:nth-child(3) label').html('金融卡申請書檔案');
               $('.bd_div').find('.form-group:nth-child(5) label').html('金融卡申請書網址');
               $('[name="bd_src"]').prop('checked', false);
			}
		});

        //-- 判斷申請書提供方式 --
		$('[name="bd_src"]').change(function(event) {
			if ($(this).val()=='0'){
              $(this).parents('.form-group').nextAll().css('display', 'none');
			}
			else if($(this).val()=='1') {
               $(this).parents('.form-group').nextAll().css('display', 'block');
               $('[name="bd_url"]').parents('.form-group').css('display', 'none');
			}
			else if($(this).val()=='2'){
               $(this).parents('.form-group').nextAll().css('display', 'none');
               $('[name="bd_url"]').parents('.form-group').css('display', 'block');
			}
		});


		$('.twzipcode').twzipcode({
		'zipcodeSel'  : '<?php echo $zipcode;?>' // 此參數會優先於 countySel, districtSel
		});


          $("#submit_btn").click(function(event) {

          	var err_txt='';
          	err_txt = err_txt + check_input( '#bi_code', '銀行代碼，' );
          	err_txt = err_txt + check_input( '#bi_fullname', '銀行全名，' );
          	err_txt = err_txt + check_input( '#bi_shortname', '銀行簡稱，' );
          	err_txt = err_txt + check_input( '[name="bi_area"]', '銀行地區，' );
          	err_txt = err_txt + check_input( '#bi_tel', '總行電話，' );
          	err_txt = err_txt + check_input( '#bi_addr', '總行地址，' );
          	err_txt = err_txt + check_input( '#bi_tel_card', '信用卡服務專線，' );
          	err_txt = err_txt + check_input( '#bi_tel_lost', '信用卡掛失專線，' );
          	err_txt = err_txt + check_input( '#bi_bank_url', '總行網址，' );
          	err_txt = err_txt + check_input( '#bi_card_url', '信用卡網址，' );
          	err_txt = $('[name="bi_logo"]').val()=='' && $('[name="old_img"]').val()==undefined ? err_txt + '銀行logo，' : err_txt;
          	err_txt = err_txt + check_input( '[name="bd_type"]', '申請書卡別，' );
          	err_txt = err_txt + check_input( '[name="bd_src"]', '申請書提供方式' );


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

