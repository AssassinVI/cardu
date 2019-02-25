<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.fancybox-slide--iframe .fancybox-content {
    width  : 500px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}

#over_bank{ margin-bottom: 15px; }
.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {

    if (!empty($_POST['type']) && $_POST['type']=='delete') { //刪除
    	if (!empty($_POST['aPic'])) {
    		$param=array('aPic'=>'');
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('appNews', $param, $where);

            unlink('../../img/'.$_POST['aPic']);
    	}else{
    		 //----------------------- 多檔刪除 -------------------------------
    		$sel_where=array('Tb_index'=>$_POST['Tb_index']);
    		$otr_file=pdo_select('SELECT OtherFile FROM appNews WHERE Tb_index=:Tb_index', $sel_where);
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
            pdo_update('appNews', $param, $where);
    	}

       exit();
  	}

   
   //========================================= 新增=========================================
   //========================================= 新增=========================================
   //========================================= 新增=========================================

	if (empty($_POST['Tb_index'])) {

		$Tb_index='news'.date('YmdHis').rand(0,99);
        

   //----------------------- 檔案判斷 -------------------------

      //-- 上圖檔 --
      if (!empty($_FILES['ns_photo_1']['name'])) {

      	if (test_img($_FILES['ns_photo_1']['name'])){
      		 $type=explode('.', $_FILES['ns_photo_1']['name']);
      		 $ns_photo_1=$Tb_index.'.'.$type[count($type)-1];
      		 ecstart_convert_jpeg_NEW($_FILES['ns_photo_1']['tmp_name'],'../../img/'.$ns_photo_1, 600);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      	 
      }else{ $ns_photo_1=''; }

      //-- 下圖檔 --
      if (!empty($_FILES['ns_photo_2']['name'])) {

      	if (test_img($_FILES['ns_photo_2']['name'])){
      		 $type=explode('.', $_FILES['ns_photo_2']['name']);
      		 $ns_photo_2=$Tb_index.'.'.$type[count($type)-1];
      		 ecstart_convert_jpeg_NEW($_FILES['ns_photo_2']['tmp_name'],'../../img/'.$ns_photo_2, 600);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      	 
      }else{ $ns_photo_2=''; }


      //===================== 多圖檔 ========================
      if (!empty($_FILES['OtherFile']['name'][0])){
        for ($i=0; $i <count($_FILES['OtherFile']['name']) ; $i++) { 
        	
          if (test_file($_FILES['OtherFile']['name'][$i])){
          	    $type=explode('/', $_FILES['OtherFile']['type'][$i]);
          	 	 $OtherFile.=$Tb_index.'_other_'.$i.'.'.$type[1].',';
          	    more_other_upload('OtherFile', $i, $Tb_index.'_other_'.$i.'.'.$type[1]);
          }else{
          	 location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
          	 exit();
          }
        }
      }else{ $OtherFile=''; }


      $ns_nt_pk=empty($_POST['ns_nt_pk']) ? '': implode(',', $_POST['ns_nt_pk']);
      $ns_label=empty($_POST['ns_label']) ? '': implode(',', $_POST['ns_label']);
      $ns_bank=empty($_POST['ns_bank']) ? '' : implode(',', $_POST['ns_bank']);
      $ns_org=empty($_POST['ns_bank']) ? '' : implode(',', $_POST['ns_org']);
      $StartDate=empty($_POST['StartDate']) ? date('Y-m-d') : $_POST['StartDate'];
      $EndDate=empty($_POST['EndDate']) ? '2200-12-31' : $_POST['EndDate'];
      $ns_date=empty($_POST['ns_date']) ? date('Y-m-d') : $_POST['ns_date'];
      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;

	$param=array(  'Tb_index'=>$Tb_index,
		              'mt_id'=>$_POST['mt_id'],
                   'ns_nt_pk'=>$ns_nt_pk,
		          'ns_ftitle'=>$_POST['ns_ftitle'],
		          'ns_stitle'=>$_POST['ns_stitle'],
		         'ns_msghtml'=>$_POST['ns_msghtml'],
		         'ns_photo_1'=>$ns_photo_1,
		           'ns_alt_1'=>$_POST['ns_alt_1'],
		         'ns_photo_2'=>$ns_photo_2,
		           'ns_alt_2'=>$_POST['ns_alt_2'],
		           'ns_label'=>$ns_label,
		            'ns_bank'=>$ns_bank,
		             'ns_org'=>$ns_org,
		        'ns_reporter'=>$_POST['ns_reporter'],
		   'ns_reporter_type'=>$_POST['ns_reporter_type'],
               'ns_kiman'=>$_SESSION['admin_index'],
                    'ns_date'=>$ns_date,
                   'ns_cdate'=>date('Y-m-d H:i:s'),
		          'StartDate'=>$StartDate,
		            'EndDate'=>$EndDate,
		        'OnLineOrNot'=>$OnLineOrNot,
		          );
	pdo_insert('appNews', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }


   //========================================= 修改=========================================
   //========================================= 修改=========================================
   //========================================= 修改=========================================

   else{ 

   	$Tb_index =$_POST['Tb_index'];


     //----------------------- 檔案判斷 -------------------------
   	   //-- 上圖檔 --
      if (!empty($_FILES['ns_photo_1']['name'])) {

      	if (test_img($_FILES['ns_photo_1']['name'])){
      			$type=explode('/', $_FILES['ns_photo_1']['type']);
      			$ns_photo_1=$Tb_index.'-'.date("His").'.'.$type[1];
      		    ecstart_convert_jpeg_NEW($_FILES['ns_photo_1']['tmp_name'],'../../img/'.$ns_photo_1, 600);

      		  $ns_photo_1_param=array('ns_photo_1'=>$ns_photo_1);
      		  $ns_photo_1_where=array('Tb_index'=>$Tb_index);
      		  pdo_update('appNews', $ns_photo_1_param, $ns_photo_1_where);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      }
 
       //-- 下圖檔 --
      if (!empty($_FILES['ns_photo_2']['name'])) {

      	if (test_img($_FILES['ns_photo_2']['name'])){
      			$type=explode('/', $_FILES['ns_photo_2']['type']);
      			$ns_photo_2=$Tb_index.'-'.date("His").'.'.$type[1];
      		    ecstart_convert_jpeg_NEW($_FILES['ns_photo_2']['tmp_name'],'../../img/'.$ns_photo_2, 600);

      		  $ns_photo_2_param=array('ns_photo_2'=>$ns_photo_2);
      		  $ns_photo_2_where=array('Tb_index'=>$Tb_index);
      		  pdo_update('appNews', $ns_photo_2_param, $ns_photo_2_where);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      }


      //-------------------- 多檔上傳 ------------------------------
      if (!empty($_FILES['OtherFile']['name'][0])) {

      	$sel_where=array('Tb_index'=>$Tb_index);
      	$now_file =pdo_select("SELECT OtherFile FROM appNews WHERE Tb_index=:Tb_index", $sel_where);
      	if (!empty($now_file['OtherFile'])) {
      	   $sel_file=explode(',', $now_file['OtherFile']);
           $file_num=explode('_', $sel_file[count($sel_file)-2]);
           $file_num=explode('.', $file_num[2]);
           $file_num=(int)$file_num[0]+1;
      	}else{
      	   $file_num=0;
      	}

      	for ($i=0; $i <count($_FILES['OtherFile']['name']) ; $i++) { 

      	  if (test_file($_FILES['OtherFile']['name'][$i])){
                $type=explode('/', $_FILES['OtherFile']['type'][$i]);
            	$OtherFile.=$Tb_index.'-'.date("His").'_other_'.($file_num+$i).'.'.$type[1].',';
               more_other_upload('OtherFile', $i, $Tb_index.'-'.date("His").'_other_'.($file_num+$i).'.'.$type[1]);
      	 }else{
      	 		   location_up('admin.php?MT_id='.$_POST['mt_id'],'檔案錯誤!請上傳正確檔案');
      	 	       exit();
      	 }
      	}

      	$OtherFile=$now_file['OtherFile'].$OtherFile;
      	 
        $OtherFile_param=array('OtherFile'=>$OtherFile);
        $OtherFile_where=array('Tb_index'=>$Tb_index);
        pdo_update('appNews', $OtherFile_param, $OtherFile_where);
      }
      	//--------------------------- 多檔上傳END -----------------------------------
   
   $ns_nt_pk=empty($_POST['ns_nt_pk']) ? '': implode(',', $_POST['ns_nt_pk']);
   $ns_label=empty($_POST['ns_label']) ? '': implode(',', $_POST['ns_label']);
   $ns_bank=empty($_POST['ns_bank']) ? '' : implode(',', $_POST['ns_bank']);
   $ns_org=empty($_POST['ns_bank']) ? '' : implode(',', $_POST['ns_org']);
   $StartDate=empty($_POST['StartDate']) ? date('Y-m-d') : $_POST['StartDate'];
   $EndDate=empty($_POST['EndDate']) ? '2200-12-31' : $_POST['EndDate'];
   $ns_date=empty($_POST['ns_date']) ? date('Y-m-d') : $_POST['ns_date'];
   $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;
    
    $param=array(  
                   'ns_nt_pk'=>$ns_nt_pk,
		          'ns_ftitle'=>$_POST['ns_ftitle'],
		          'ns_stitle'=>$_POST['ns_stitle'],
		         'ns_msghtml'=>$_POST['ns_msghtml'],
		           'ns_alt_1'=>$_POST['ns_alt_1'],
		           'ns_alt_2'=>$_POST['ns_alt_2'],
		           'ns_label'=>$ns_label,
		            'ns_bank'=>$ns_bank,
		             'ns_org'=>$ns_org,
		        'ns_reporter'=>$_POST['ns_reporter'],
		   'ns_reporter_type'=>$_POST['ns_reporter_type'],
                    'ns_date'=>$ns_date,
                   'ns_cdate'=>date('Y-m-d H:i:s'),
		          'StartDate'=>$StartDate,
		            'EndDate'=>$EndDate,
		        'OnLineOrNot'=>$OnLineOrNot,
		          );
    $where=array( 'Tb_index'=>$Tb_index );
	pdo_update('appNews', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM appNews WHERE Tb_index=:Tb_index', $where);
    
    $ns_nt_pk=explode(',', $row['ns_nt_pk']);
    $ns_label=explode(',', $row['ns_label']);
    $ns_bank=explode(',', $row['ns_bank']);
    $ns_org=explode(',', $row['ns_org']);
 	$ns_date=empty($row['ns_date']) ? date('Y-m-d'): $row['ns_date'];
  $ns_reporter=empty($row['ns_reporter']) ? $_SESSION['admin_name'] : $row['ns_reporter'];
 	$ns_reporter_type1=$row['ns_reporter_type']==1 ? 'checked': '';
 	$ns_reporter_type2=$row['ns_reporter_type']==2 ? 'checked': '';
 	$StartDate=empty($row['StartDate']) ? date('Y-m-d'): $row['StartDate'];
 	$EndDate=empty($row['EndDate']) ? date('Y-m-d', strtotime('+3 month')) : $row['EndDate'];
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
							<label class="col-md-2 control-label" for="ns_nt_pk"><span class="text-danger">*</span> 新聞分類</label>
							<div class="col-md-8" id="ns_nt_pk">
								<?php
                  if(!empty($row['ns_nt_pk'])){
                    for ($i=0; $i <count($ns_nt_pk) ; $i++) { 
                      $nt_name=pdo_select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_nt_pk[$i]]);
                      echo '<span class="btn btn-success">'.$nt_name['nt_name'].' <input type="hidden" name="ns_nt_pk[]" value="'.$ns_nt_pk[$i].'"></span>';
                    }
                  }
								?>

							</div>
							<div class="col-md-2">
								<a href="newsType_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇分類</a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_ftitle"><span class="text-danger">*</span>主標題</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="ns_ftitle" name="ns_ftitle" value="<?php echo $row['ns_ftitle'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_stitle"><span class="text-danger">*</span>副標題</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="ns_stitle" name="ns_stitle" value="<?php echo $row['ns_stitle'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span>內容</label>
							<div class="col-md-10">
								<textarea id="ckeditor" name="ns_msghtml" ><?php echo $row['ns_msghtml'];?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_photo_1">圖檔(上)</label>
							<div class="col-md-2">
								<input type="file" name="ns_photo_1" class="form-control" id="ns_photo_1" onchange="file_viewer_load_new(this, '#img_box')">
								<span class="text-danger">( 圖檔尺寸: 寬度不超過750pixles )</span>
							</div>

							<label class="col-md-1 control-label" for="ns_alt_1">圖說</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="ns_alt_1" name="ns_alt_1" value="<?php echo $row['ns_alt_1'];?>">
								<span class="text-danger">(限50個字)</span>
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['ns_photo_1'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" class="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <input type="hidden" value="<?php echo $row['ns_photo_1'];?>">
								  <img id="one_img" src="../../img/<?php echo $row['ns_photo_1'];?>" alt="請上傳代表圖檔">
								</div>
							</div>
						<?php }?>		
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_photo_2">圖檔(下)</label>
							<div class="col-md-2">
								<input type="file" name="ns_photo_2" class="form-control" id="ns_photo_2" onchange="file_viewer_load_new(this, '#img_box2')">
								<span class="text-danger">( 圖檔尺寸: 寬度不超過750pixles )</span>
							</div>

							<label class="col-md-1 control-label" for="ns_alt_2">圖說</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="ns_alt_2" name="ns_alt_2" value="<?php echo $row['ns_alt_2'];?>">
								<span class="text-danger">(限50個字)</span>
							</div>
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box2" class="col-md-4">
								
							</div>
						<?php if(!empty($row['ns_photo_2'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" class="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <input type="hidden" value="<?php echo $row['ns_photo_1'];?>">
								  <img id="one_img" src="../../img/<?php echo $row['ns_photo_2'];?>" alt="請上傳代表圖檔">
								</div>
							</div>
						<?php }?>		
						</div>

                        <div class="form-group">
							<label class="col-md-2 control-label" >延伸閱讀</label>
							<div id="over_ex_news" class="col-md-8">
								
							</div>
							<div class="col-md-2">
								<a href="ex_news_windows.php" data-fancybox data-type="iframe" class="btn btn-info">查詢文章</a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_label"><span class="text-danger">*</span>標籤</label>
							<div id="over_label" class="col-md-8">
							  <?php 
                  if (!empty($row['ns_label'])) {
                    for ($i=0; $i <count($ns_label) ; $i++) { 
                       echo '<span class="label">'.$ns_label[$i].'<input type="hidden" name="ns_label[]" value="'.$ns_label[$i].'"></span>、';
                     }
                  }
							  ?>
							</div>
							<div class="col-md-2">
								<a href="news_label_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇標籤</a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_bank">發卡組織&銀行關聯</label>
							<div  class="col-md-8">
								<div id="over_bank">
 								  <?php 
 								   if (!empty($row['ns_bank'])) {
 								   	for ($i=0; $i <count($ns_bank); $i++) { 
                                       $bank_name=pdo_select("SELECT bi_shortname, bi_code FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_bank[$i]]);
                                       echo '<span class="label">['.$bank_name['bi_code'].']'.$bank_name['bi_shortname'].' <input type="hidden" name="ns_bank[]" value="'.$ns_bank[$i].'"></span>、';
                                    }
 								   }
								  ?>
								</div>
								<div id="over_org">
								  <?php 
								   if(!empty($row['ns_org'])){
                                     for ($i=0; $i <count($ns_org); $i++) { 
                                       $org_name=pdo_select("SELECT org_name FROM card_org WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_org[$i]]);
                                       echo '<span class="label">'.$org_name['org_name'].' <input type="hidden" name="ns_org[]" value="'.$ns_org[$i].'"></span>、';
                                    }
								   }
								  ?>
								</div>
							</div>
							<div class="col-md-2">
								<a href="newsBank_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇銀行</a>
								<a href="newsOrg_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇發卡組織</a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_store">商店關聯</label>
							<div id="over_store" class="col-md-8">
								
							</div>
							<div class="col-md-2">
								<a href="news_store_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇商店</a>
							</div>
						</div>

						
						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_reporter"><span class="text-danger">*</span>撰文者</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="ns_reporter" name="ns_reporter" value="<?php echo $ns_reporter;?>">
							</div>
							<div class="col-md-5">
								<label><input type="radio" name="ns_reporter_type" value="1" <?php echo $ns_reporter_type1;?> > 記者｜</label>
								<label><input type="radio" name="ns_reporter_type" value="2" <?php echo $ns_reporter_type2;?> > 作者｜</label>
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-2 control-label" for="ns_date">新聞發布日期</label>
							<div class="col-md-10">
								<input type="date" class="form-control" id="ns_date" name="ns_date" value="<?php echo $ns_date;?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="StartDate">新聞上架日期</label>
							<div class="col-md-10 row">
								<div class="col-md-5">
								  <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echo $StartDate;?>">
								</div>
                                <div class="col-md-1"><h3>至</h3></div>
								<div class="col-md-5">
								  <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echo $EndDate;?>">
								</div>
								<div class="col-md-1"><h3>止</h3></div>
								
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

          	var err_txt='';
          	err_txt = err_txt + check_input( '[name="ns_nt_pk[]"]', '新聞分類，' );
          	err_txt = err_txt + check_input( '#ns_ftitle', '主標題，' );
          	err_txt = err_txt + check_input( '#ns_stitle', '副標題，' );
          	// err_txt = err_txt + check_input( '[name="ns_msghtml"]', '內容，' );
          	err_txt = err_txt + check_input( '[name="ns_label[]"]', '標籤，' );
          	err_txt = err_txt + check_input( '#ns_reporter', '撰文者' );
          	err_txt = err_txt + check_input( '[name="ns_reporter_type"]', '撰文者類型' );


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
          $(".one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            aPic: $(this).next().next().val(),
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
		if ($('[name="ns_nt_pk[]"]').length>0) {
            var type_arr=[];
			$.each($('[name="ns_nt_pk[]"]'), function() {
			  type_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_type", type_arr);
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
        
        //-- 銀行關聯 --
		if ($('[name="ns_bank[]"]').length>0) {
            var bank_arr=[];
			$.each($('[name="ns_bank[]"]'), function() {
			  bank_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_bank", bank_arr);
		}

		//-- 發卡組織關聯 --
		if ($('[name="ns_org[]"]').length>0) {
            var org_arr=[];
			$.each($('[name="ns_org[]"]'), function() {
			  org_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_org", org_arr);
		}
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

