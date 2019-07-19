<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">


#over_bank{ margin-bottom: 15px; }
.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }

.btn.btn-success{ margin: 2px; padding: 2px 5px; position: relative;}
.btn.btn-success button{ padding: 2px 5px; position: absolute; top: -1px; right: -1px; border-radius: 0; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {

    if (!empty($_POST['type']) && $_POST['type']=='delete') { //刪除
    	if (!empty($_POST['ns_photo_1'])) {
    		    $param=array('ns_photo_1'=>'');
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('appNews', $param, $where);

            unlink('../../img/'.$_POST['ns_photo_1']);
    	}
      elseif(!empty($_POST['ns_photo_2'])){
            $param=array('ns_photo_2'=>'');
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('appNews', $param, $where);

            unlink('../../img/'.$_POST['ns_photo_2']);
      }
     //  else{
    	// 	 //----------------------- 多檔刪除 -------------------------------
    	// 	$sel_where=array('Tb_index'=>$_POST['Tb_index']);
    	// 	$otr_file=pdo_select('SELECT OtherFile FROM appNews WHERE Tb_index=:Tb_index', $sel_where);
    	// 	$otr_file=explode(',', $otr_file['OtherFile']);

    	// 	for ($i=0; $i <count($otr_file)-1 ; $i++) { //比對 
    	// 		 if ($otr_file[$i]!=$_POST['OtherFile']) {
    	// 		 	$new_file.=$otr_file[$i].',';
    	// 		 }else{
    	// 		 	 unlink('../../other_file/'.$_POST['OtherFile']);
    	// 		 }
    	// 	}
    	// 	$param=array('OtherFile'=>$new_file);
     //        $where=array('Tb_index'=>$_POST['Tb_index']);
     //        pdo_update('appNews', $param, $where);
    	// }

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
      		 $ns_photo_1=$Tb_index.'_1.'.$type[count($type)-1];
      		 ecstart_convert_jpeg_NEW($_FILES['ns_photo_1']['tmp_name'],'../../img/'.$ns_photo_1, 750);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      	 
      }else{ $ns_photo_1=''; }

      //-- 下圖檔 --
      if (!empty($_FILES['ns_photo_2']['name'])) {

      	if (test_img($_FILES['ns_photo_2']['name'])){
      		 $type=explode('.', $_FILES['ns_photo_2']['name']);
      		 $ns_photo_2=$Tb_index.'_2.'.$type[count($type)-1];
      		 ecstart_convert_jpeg_NEW($_FILES['ns_photo_2']['tmp_name'],'../../img/'.$ns_photo_2, 750);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      	 
      }else{ $ns_photo_2=''; }


      //===================== 多圖檔 ========================
      // if (!empty($_FILES['OtherFile']['name'][0])){
      //   for ($i=0; $i <count($_FILES['OtherFile']['name']) ; $i++) { 
        	
      //     if (test_file($_FILES['OtherFile']['name'][$i])){
      //     	    $type=explode('/', $_FILES['OtherFile']['type'][$i]);
      //     	 	 $OtherFile.=$Tb_index.'_other_'.$i.'.'.$type[1].',';
      //     	    more_other_upload('OtherFile', $i, $Tb_index.'_other_'.$i.'.'.$type[1]);
      //     }else{
      //     	 location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      //     	 exit();
      //     }
      //   }
      // }else{ $OtherFile=''; }
      
      $ns_nt_pk=empty($_POST['ns_nt_pk']) ? '': $_POST['ns_nt_pk'];
      $ns_nt_sp_pk=empty($_POST['ns_nt_sp_pk']) ? '': $_POST['ns_nt_sp_pk'];
      $ns_nt_ot_pk=empty($_POST['ns_nt_ot_pk']) ? '': implode(',', $_POST['ns_nt_ot_pk']);
      $ns_store=empty($_POST['ns_store']) ? '' : $_POST['ns_store'];
      $ns_news=empty($_POST['ns_news']) ? '' : implode(',', $_POST['ns_news']);
      $ns_label=empty($_POST['ns_label']) ? '': implode(',', $_POST['ns_label']);
      $ns_bank=empty($_POST['ns_bank']) ? '' : implode(',', $_POST['ns_bank']);
      $ns_org=empty($_POST['ns_org']) ? '' : implode(',', $_POST['ns_org']);
      $StartDate=empty($_POST['StartDate']) ? date('Y-m-d') : $_POST['StartDate'];
      $EndDate=empty($_POST['EndDate']) ? '2200-12-31' : $_POST['EndDate'];
      $ns_date=empty($_POST['ns_date']) ? date('Y-m-d') : $_POST['ns_date'];

      //-- 無發卡組織/銀行 --
      if(!empty($_POST['no_BankOrg'])){
         $ns_bank='no';
         $ns_org='no';
      }
      
      //-- 抓資料夾ID --
      $parent_mt_id=pdo_select("SELECT parent_id FROM maintable WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['mt_id']]);

	$param=array(  'Tb_index'=>$Tb_index,
		              'mt_id'=>$parent_mt_id['parent_id'],
               'ns_nt_pk'=>$ns_nt_pk,
            'ns_nt_sp_pk'=>$ns_nt_sp_pk,
            'ns_nt_ot_pk'=>$ns_nt_ot_pk,
               'ns_store'=>$ns_store,
                'ns_news'=>$ns_news,
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
              'ns_verify'=>$_POST['ns_verify']
		          );
  
  //-- 完稿時間 --
  if ($_POST['ns_verify']==2) {
    $param=array_merge($param, ['ns_fwdate'=>date('Y-m-d H:i:s')]);
  }

	pdo_insert('appNews', $param);

	location_up('manager_view.php?MT_id='.$_POST['mt_id'].'&Tb_index='.$Tb_index,'');
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
      			$ns_photo_1=$Tb_index.'_1-'.date("His").'.'.$type[1];
      		    ecstart_convert_jpeg_NEW($_FILES['ns_photo_1']['tmp_name'],'../../img/'.$ns_photo_1, 750);

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
      			$ns_photo_2=$Tb_index.'_2-'.date("His").'.'.$type[1];
      		    ecstart_convert_jpeg_NEW($_FILES['ns_photo_2']['tmp_name'],'../../img/'.$ns_photo_2, 750);

      		  $ns_photo_2_param=array('ns_photo_2'=>$ns_photo_2);
      		  $ns_photo_2_where=array('Tb_index'=>$Tb_index);
      		  pdo_update('appNews', $ns_photo_2_param, $ns_photo_2_where);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      }


      //-------------------- 多檔上傳 ------------------------------
      // if (!empty($_FILES['OtherFile']['name'][0])) {

      // 	$sel_where=array('Tb_index'=>$Tb_index);
      // 	$now_file =pdo_select("SELECT OtherFile FROM appNews WHERE Tb_index=:Tb_index", $sel_where);
      // 	if (!empty($now_file['OtherFile'])) {
      // 	   $sel_file=explode(',', $now_file['OtherFile']);
      //      $file_num=explode('_', $sel_file[count($sel_file)-2]);
      //      $file_num=explode('.', $file_num[2]);
      //      $file_num=(int)$file_num[0]+1;
      // 	}else{
      // 	   $file_num=0;
      // 	}

      // 	for ($i=0; $i <count($_FILES['OtherFile']['name']) ; $i++) { 

      // 	  if (test_file($_FILES['OtherFile']['name'][$i])){
      //           $type=explode('/', $_FILES['OtherFile']['type'][$i]);
      //       	$OtherFile.=$Tb_index.'-'.date("His").'_other_'.($file_num+$i).'.'.$type[1].',';
      //          more_other_upload('OtherFile', $i, $Tb_index.'-'.date("His").'_other_'.($file_num+$i).'.'.$type[1]);
      // 	 }else{
      // 	 		   location_up('admin.php?MT_id='.$_POST['mt_id'],'檔案錯誤!請上傳正確檔案');
      // 	 	       exit();
      // 	 }
      // 	}

      // 	$OtherFile=$now_file['OtherFile'].$OtherFile;
      	 
      //   $OtherFile_param=array('OtherFile'=>$OtherFile);
      //   $OtherFile_where=array('Tb_index'=>$Tb_index);
      //   pdo_update('appNews', $OtherFile_param, $OtherFile_where);
      // }
      	//--------------------------- 多檔上傳END -----------------------------------
   
   $ns_nt_pk=empty($_POST['ns_nt_pk']) ? '': $_POST['ns_nt_pk'];
   $ns_nt_sp_pk=empty($_POST['ns_nt_sp_pk']) ? '': $_POST['ns_nt_sp_pk'];
   $ns_nt_ot_pk=empty($_POST['ns_nt_ot_pk']) ? '': implode(',', $_POST['ns_nt_ot_pk']);
   $ns_store=empty($_POST['ns_store']) ? '' : $_POST['ns_store'];
   $ns_news=empty($_POST['ns_news']) ? '' : implode(',', $_POST['ns_news']);
   $ns_label=empty($_POST['ns_label']) ? '': implode(',', $_POST['ns_label']);
   $ns_bank=empty($_POST['ns_bank']) ? '' : implode(',', $_POST['ns_bank']);
   $ns_org=empty($_POST['ns_org']) ? '' : implode(',', $_POST['ns_org']);
   $StartDate=empty($_POST['StartDate']) ? date('Y-m-d') : $_POST['StartDate'];
   $EndDate=empty($_POST['EndDate']) ? '2200-12-31' : $_POST['EndDate'];
   $ns_date=empty($_POST['ns_date']) ? date('Y-m-d') : $_POST['ns_date'];
   $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;

   //-- 無發卡組織/銀行 --
   if(!empty($_POST['no_BankOrg'])){
      $ns_bank='no';
      $ns_org='no';
   }
    
    $param=array(  
                   'ns_nt_pk'=>$ns_nt_pk,
                'ns_nt_sp_pk'=>$ns_nt_sp_pk,
                'ns_nt_ot_pk'=>$ns_nt_ot_pk,
                'ns_store'=>$ns_store,
                 'ns_news'=>$ns_news,
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
		          'StartDate'=>$StartDate,
		            'EndDate'=>$EndDate,
		        'OnLineOrNot'=>$OnLineOrNot,
              'ns_verify'=>$_POST['ns_verify']
		          );

    //-- 完稿時間 --
  if ($_POST['ns_verify']==2) {
    $param=array_merge($param, ['ns_fwdate'=>date('Y-m-d H:i:s')]);
  }

    $where=array( 'Tb_index'=>$Tb_index );
	pdo_update('appNews', $param, $where);
	
  location_up('manager_view.php?MT_id='.$_POST['mt_id'].'&Tb_index='.$Tb_index,'');
  }
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM appNews WHERE Tb_index=:Tb_index', $where);
    
    $ns_nt_pk=explode(',', $row['ns_nt_pk']);
    $ns_nt_ot_pk=explode(',', $row['ns_nt_ot_pk']);
    $ns_label=explode(',', $row['ns_label']);
    $ns_bank=explode(',', $row['ns_bank']);
    $ns_org=explode(',', $row['ns_org']);
    $ns_news=explode(',', $row['ns_news']);
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
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>網頁資料編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="" method="POST" enctype='multipart/form-data' class="form-horizontal">

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_nt_pk"><span class="text-danger">*</span> 新聞分類</label>
							<div class="col-md-8" id="ns_nt_pk">
								<?php
                  if(!empty($row['ns_nt_pk'])){
                      $nt_name=pdo_select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']]);
                      echo '<span class="btn btn-success">'.$nt_name['nt_name'].' <input type="hidden" name="ns_nt_pk" value="'.$row['ns_nt_pk'].'"></span> ';
                  }

                  if(!empty($row['ns_nt_sp_pk'])){
                      $nt_name=pdo_select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_sp_pk']]);
                      echo '<span class="btn btn-success">'.$nt_name['nt_name'].' <input type="hidden" name="ns_nt_sp_pk" value="'.$row['ns_nt_sp_pk'].'"></span> ';
                  }


								?>

							</div>
							<div class="col-md-2">
								<a href="../news_public/newsType_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇分類</a>
							</div>
						</div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="ns_nt_pk">上刊到其他單元</label>
              <div class="col-md-8" id="ns_nt_ot_pk">
                <?php 
                 $ns_nt_ot_pk_num=count($ns_nt_ot_pk);
                 for ($i=0; $i <$ns_nt_ot_pk_num ; $i++) { 
                   
                   $ns_nt_ot_pk_type=substr($ns_nt_ot_pk[$i], 0,2);
                   //-- 一般 --
                   if ($ns_nt_ot_pk_type=='nt') {
                     $ot_type=pdo_select('SELECT nt_name, mt_id, area_id, unit_id FROM news_type WHERE Tb_index=:Tb_index', ['Tb_index'=>$ns_nt_ot_pk[$i]]);
                   }
                   //-- 優旅行(特殊) --
                   else{
                     $ot_type=pdo_select('SELECT * FROM appUnit WHERE Tb_index=:Tb_index', ['Tb_index'=>$ns_nt_ot_pk[$i]]);
                   }
                   

                   //-- 新聞 --
                   if ($ot_type['mt_id']=='site2018111910445721') {
                     echo '<span class="btn btn-success">新聞-'.$ot_type['nt_name'].' <input type="hidden" name="ns_nt_ot_pk[]" value="'.$ns_nt_ot_pk[$i].'"></span>';
                   }
                   //-- 卡區 --
                   elseif($ot_type['mt_id']=='site2019011115561564'){
                     echo '<span class="btn btn-success">卡情報-'.$ot_type['nt_name'].' <input type="hidden" name="ns_nt_ot_pk[]" value="'.$ns_nt_ot_pk[$i].'"></span>';
                   }
                   //-- 優區 --
                   elseif($ot_type['mt_id']=='site2019011116103929'){
                     $area_name=pdo_select('SELECT at_name FROM appArea WHERE Tb_index=:Tb_index', ['Tb_index'=>$ot_type['area_id']]);
                     
                     //-- 優旅行 --
                     if ($area_name['at_name']=='優旅行') {
                       $unit_name=pdo_select('SELECT un_name FROM appUnit WHERE Tb_index=:Tb_index', ['Tb_index'=>$ot_type['unit_id']]);
                       echo '<span class="btn btn-success">'.$area_name['at_name'].'-'.$unit_name['un_name'].'-'.$ot_type['nt_name'].' <input type="hidden" name="ns_nt_ot_pk[]" value="'.$ns_nt_ot_pk[$i].'"></span>';
                     }
                     else{
                       echo '<span class="btn btn-success">'.$area_name['at_name'].'-'.$ot_type['nt_name'].' <input type="hidden" name="ns_nt_ot_pk[]" value="'.$ns_nt_ot_pk[$i].'"></span>';
                     }
                   }

                   
                 }
                ?>
              </div>
            </div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_ftitle"><span class="text-danger">*</span>主標題</label>
							<div class="col-md-10">
								<input type="text" class="form-control title_w" id="ns_ftitle" name="ns_ftitle" value="<?php echo $row['ns_ftitle'];?>">
                <span class="text-danger">(限20個字)</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_stitle"><span class="text-danger">*</span>副標題</label>
							<div class="col-md-10">
								<input type="text" class="form-control title_w" id="ns_stitle" name="ns_stitle" value="<?php echo $row['ns_stitle'];?>">
                <span class="text-danger">(限20個字)</span>
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
								<input type="file" name="ns_photo_1" class="form-control " id="ns_photo_1" onchange="file_viewer_load_new(this, '#img_box')">
								<span class="text-danger">( 圖檔尺寸: 寬度不超過750pixles )</span>
							</div>

							<label class="col-md-1 control-label" for="ns_alt_1">圖說</label>
							<div class="col-md-7">
								<input type="text" class="form-control imgTxt_w" id="ns_alt_1" name="ns_alt_1" maxlength="50" value="<?php echo $row['ns_alt_1'];?>">
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
								 <button type="button" id="one_del_img1" class="one_del_img"> X </button>
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
								<input type="text" class="form-control imgTxt_w" id="ns_alt_2" name="ns_alt_2" maxlength="50" value="<?php echo $row['ns_alt_2'];?>">
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
								 <button type="button" id="one_del_img2" class="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <input type="hidden" value="<?php echo $row['ns_photo_2'];?>">
								  <img id="one_img" src="../../img/<?php echo $row['ns_photo_2'];?>" alt="請上傳代表圖檔">
								</div>
							</div>
						<?php }?>		
						</div>

            <div class="form-group">
							<label class="col-md-2 control-label" >延伸閱讀</label>
							<div id="over_ex_news" class="col-md-6">
                <?php 
                  if (!empty($row['ns_news'])) {
                    for ($i=0; $i <count($ns_news) ; $i++) {
                       if (strpos($ns_news[$i] , '_ex')===FALSE) {
                         $ns_news_name=pdo_select("SELECT ns_ftitle FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_news[$i]]); 
                          echo '<div class="btn btn-success btn-block">'.$ns_news_name['ns_ftitle'].' <input type="hidden" name="ns_news[]" ns_ftitle="'.$ns_news_name['ns_ftitle'].'" value="'.$ns_news[$i].'"><button class="del_ns_news btn btn-danger" type="button">Ｘ</button></div>';
                       }
                       else{
                         $ns_news_name=pdo_select("SELECT ne_ns_pk_ext_ftitle FROM news_extends_custom WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_news[$i]]); 
                          echo '<div class="btn btn-success btn-block">'.$ns_news_name['ne_ns_pk_ext_ftitle'].' <input type="hidden" name="ns_news[]" ns_ftitle="'.$ns_news_name['ne_ns_pk_ext_ftitle'].'" value="'.$ns_news[$i].'"><button class="del_ns_news btn btn-danger" type="button">Ｘ</button></div>';
                       }
                     }
                  }
                ?>
							</div>
              <div class="col-md-2">
                <span class="text-danger">拖曳標籤，即可排序 <br>(由上到下)</span>
              </div>
							<div class="col-md-2">
								<a href="../news_public/news_windows.php" data-fancybox data-type="iframe" class="btn btn-info">查詢文章</a>
								<a href="../news_public/news_extends_custom_windows.php" data-fancybox data-type="iframe" class="btn btn-info">輸入</a>
                <a href="../news_public/news_extends_sort_windows.php" data-fancybox data-type="iframe" class="btn btn-info">排序</a>
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
								<a href="../news_public/news_label_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇標籤</a>
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
                                       $org_name=pdo_select("SELECT mt_id, org_name FROM card_org WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_org[$i]]);
                                       //-- 信用卡 --
                                       if ($org_name['mt_id']=='site2018110611172385') {
                                         echo '<span class="label">[信用卡]'.$org_name['org_name'].' <input type="hidden" name="ns_org[]" value="'.$ns_org[$i].'"></span>、';
                                       }
                                       //-- 金融卡 --
                                       else{
                                         echo '<span class="label">[金融卡]'.$org_name['org_name'].' <input type="hidden" name="ns_org[]" value="'.$ns_org[$i].'"></span>、';
                                       }
                                    }
								   }
								  ?>
								</div>
							</div>
							<div class="col-md-2">
								<a href="../news_public/newsBank_windows.php" data-fancybox data-type="iframe" class="btn btn-info btn-block my-025">選擇銀行</a>
								<a href="../news_public/newsOrg_windows.php" data-fancybox data-type="iframe" class="btn btn-info btn-block my-025">選擇發卡組織</a>
                <a href="javascript:;" id="clean_BankOrg" class="btn btn-default btn-block my-025">清除</a>
                <?php
                  // if ($row['ns_bank']=='no' && $row['ns_org']=='no') {
                  //   echo '<label><input type="checkbox" name="no_BankOrg" checked value="1"> 無發卡組織/銀行</label>';
                  // }
                  // else{
                  //   echo '<label><input type="checkbox" name="no_BankOrg" value="1"> 無發卡組織/銀行</label>';
                  // }
                ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_store">商店關聯</label>
							<div id="over_store" class="col-md-8">
								<?php 
                  if (!empty($row['ns_store'])) {
                    if($row['ns_store']=='no'){
                      echo '<span class="btn btn-success">無商店 <input type="hidden" name="ns_store" value="no"></span> ';
                    }
                    else{
                      $ns_store=pdo_select('SELECT Tb_index, st_name FROM store WHERE Tb_index=:Tb_index', ['Tb_index'=>$row['ns_store']]);
                      echo '<span class="btn btn-success">'.$ns_store['st_name'].' <input type="hidden" name="ns_store" value="'.$row['ns_store'].'"></span> ';
                    }
                  }
                 ?>
							</div>
							<div class="col-md-2">
								<a href="../news_public/news_store_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇商店</a>
							</div>
						</div>

						
						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_reporter"><span class="text-danger">*</span>撰文者</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="ns_reporter" name="ns_reporter" value="<?php echo $ns_reporter;?>">
							</div>
							<div class="col-md-5">
								<label><input checked type="radio" name="ns_reporter_type" value="1" <?php echo $ns_reporter_type1;?> > 記者｜</label>
								<label><input type="radio" name="ns_reporter_type" value="2" <?php echo $ns_reporter_type2;?> > 作者｜</label>
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-2 control-label" for="ns_date">新聞發布日期</label>
							<div class="col-md-10">
								<input type="text" class="form-control datepicker" id="ns_date" name="ns_date" value="<?php echo $ns_date;?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="StartDate">新聞上架日期</label>
							<div class="col-md-10 row">
								<div class="col-md-5">
								  <input type="text" class="form-control datepicker" id="StartDate" name="StartDate" value="<?php echo $StartDate;?>">
								</div>
                                <div class="col-md-1"><h3>至</h3></div>
								<div class="col-md-5">
								  <input type="text" class="form-control datepicker" id="EndDate" name="EndDate" value="<?php echo $EndDate;?>">
								</div>
								<div class="col-md-1"><h3>止</h3></div>
								
							</div>
						</div>

			     <!-- <div class="form-group">
						<label class="col-md-2 control-label" for="OnLineOrNot">是否上線</label>
					    <div class="col-md-10">
                        <div class="switch" style="padding-top: 8px;">
                          <div class="onoffswitch">
                           <input type="checkbox" class="onoffswitch-checkbox" id="OnLineOrNot" value="1" name="OnLineOrNot" <?php //echo $check=!isset($row['OnLineOrNot']) || $row['OnLineOrNot']==1 ? 'checked' : ''; ?>>
                           <label class="onoffswitch-label" for="OnLineOrNot">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                          </label>
                          </div>
                        </div>
								
					    </div>
				     </div> -->

						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
            <input type="hidden" id="ns_verify" name="ns_verify" value="2">
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
          <button type="button" id="submit_btn" class="btn btn-info btn-raised">更新</button>

					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

          
          //-- 清除銀行、發卡組織 --
          $('#clean_BankOrg').click(function(event) {
            if (confirm('是否要清除銀行、發卡組織??')) {
              $('#over_bank').html('');
              $('#over_org').html('');
              sessionStorage.removeItem("news_bank");
              sessionStorage.removeItem("news_org");
              $('[name="no_BankOrg"]').prop('disabled', false);
            }
          });

          //-- 預覽、更新 ---
          $("#submit_btn").click(function(event) {

          	var err_txt='';
          	err_txt = err_txt + check_input( '[name="ns_nt_pk"]', '新聞分類，' );
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

             $('#ns_verify').val(2);

             $('#put_form').submit();
          	}
          });

          //-- 草稿 ---
          $("#draft_btn").click(function(event) {

            var err_txt='';
            err_txt = err_txt + check_input( '[name="ns_nt_pk"]', '新聞分類，' );
            err_txt = err_txt + check_input( '#ns_ftitle', '主標題，' );
            err_txt = err_txt + check_input( '#ns_stitle', '副標題，' );
            err_txt = CKEDITOR.instances.ckeditor.getData()=='' ? err_txt + '內容，' : err_txt;
            err_txt = err_txt + check_input( '[name="ns_label[]"]', '標籤，' );
            err_txt = err_txt + check_input( '#ns_reporter', '撰文者' );
            err_txt = err_txt + check_input( '[name="ns_reporter_type"]', '撰文者類型' );


            if (err_txt!='') {
             alert("請輸入"+err_txt+"!!");
            }
            else{

            $('#ns_verify').val(0);

             $('#put_form').submit();
            }
          });

    //------------------------------- 拖曳更新排序 -------------------------
       $( "#over_ex_news" ).sortable({
             revert: 300,
             update: function( event, ui ) {
               var ns_news_arr=[];
               var ns_news_name_arr=[];

               $.each($('[name="ns_news[]"]'), function(index, val) {
                  ns_news_arr.push($(this).val());
                  ns_news_name_arr.push($(this).attr('ns_ftitle'));
               });

               sessionStorage.setItem("ns_news", ns_news_arr);
               sessionStorage.setItem("ns_news_name", ns_news_name_arr);
             }
    });

    //----------------------------- 刪除延伸閱讀 ---------------------------
    $('#over_ex_news').on('click', '.del_ns_news', function(event) {
      
      if (confirm('是否要刪除 "'+$(this).prev().attr('ns_ftitle')+'" 此篇延伸閱讀??')) {
        var ns_news_arr=sessionStorage.getItem("ns_news").split(',');
        var ns_news_name_arr=sessionStorage.getItem("ns_news_name").split(',');
        //-- Tb_index --
        var ns_news_index=ns_news_arr.indexOf($(this).prev().val());
            ns_news_arr.splice(ns_news_index,1);
            sessionStorage.setItem("ns_news", ns_news_arr);
        //-- 主標 --
        var ns_news_name_index=ns_news_name_arr.indexOf($(this).prev().attr('ns_ftitle'));
            ns_news_name_arr.splice(ns_news_name_index,1);
            sessionStorage.setItem("ns_news_name", ns_news_name_arr);

        $(this).parent().remove();
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
  //         $(".one_del_file").click(function(event) { 
		// 	if (confirm('是否要刪除檔案?')) {
		// 	 var data={
		// 	 	        Tb_index: $("#Tb_index").val(),
  //                      OtherFile: $(this).next().next().val(),
  //                           type: 'delete'
		// 	          };	
  //              ajax_in('manager.php', data, '成功刪除', 'no');
  //              $(this).parent().html('');
		// 	}
		// });
});


	$(window).on('load',  function(event){
		sessionStorage.clear();
        
    //------------------- 新聞分類 --------------------------
		if ($('[name="ns_nt_pk"]').length>0) {
			//-- 記錄暫存 --
       sessionStorage.setItem("news_type", $('[name="ns_nt_pk"]').val());
       sessionStorage.setItem("news_sp_type", $('[name="ns_nt_sp_pk"]').val());
		}

    //------------------- 上刊到其他單元 ---------------------------
    if($('[name="ns_nt_ot_pk[]"]').length>0){
        var news_ot_type=[];
        $.each($('[name="ns_nt_ot_pk[]"]'), function(index, val) {
            news_ot_type.push($(this).val());
        });
        news_ot_type=news_ot_type.join(',');
        //-- 記錄暫存 --
        sessionStorage.setItem("news_ot_type", news_ot_type);
    }

    //------------------------- 延伸閱讀 -----------------------------
    if ($('[name="ns_news[]"]').length>0) {
      var ns_news_arr=[];
      var ns_news_name_arr=[];
      $.each($('[name="ns_news[]"]'), function() {
        ns_news_arr.push($(this).val());
        ns_news_name_arr.push($(this).attr('ns_ftitle'));
      });
      //-- 記錄暫存 --
      sessionStorage.setItem("ns_news", ns_news_arr);
      sessionStorage.setItem("ns_news_name", ns_news_name_arr);
    }
        
    //--------------------------- 標籤 ------------------------------
		if ($('[name="ns_label[]"]').length>0) {
      var lab_arr=[];
			$.each($('[name="ns_label[]"]'), function() {
			  lab_arr.push($(this).val());
			});
			//-- 記錄暫存 --
      sessionStorage.setItem("news_label", lab_arr);
		}
        
    //--------------------------- 銀行關聯 ------------------------------
		if ($('[name="ns_bank[]"]').length>0) {
            var bank_arr=[];
			$.each($('[name="ns_bank[]"]'), function() {
			  bank_arr.push($(this).val());
			});
      $('[name="no_BankOrg"]').prop('disabled', true);
			//-- 記錄暫存 --
            sessionStorage.setItem("news_bank", bank_arr);
		}

		//---------------------------- 發卡組織關聯 ---------------------------
		if ($('[name="ns_org[]"]').length>0) {
            var org_arr=[];
			$.each($('[name="ns_org[]"]'), function() {
			  org_arr.push($(this).val());
			});
      $('[name="no_BankOrg"]').prop('disabled', true);
			//-- 記錄暫存 --
            sessionStorage.setItem("news_org", org_arr);
		}
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>