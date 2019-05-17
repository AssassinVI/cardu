<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.fancybox-slide--iframe .fancybox-content {
    width  : 700px;
    max-width  : 80%;
    max-height : 95%;
    margin: 0;
}

#over_bank{ max-height: 150px; overflow: auto;}
#over_org{ max-height: 150px; overflow: auto;}
.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }

.btn.btn-success{ margin: 2px; padding: 2px 5px; position: relative;}
.btn.btn-success button{ padding: 2px 5px; position: absolute; top: -1px; right: -1px; border-radius: 0; }

#ns_nt_pk_div, #ns_nt_ot_pk_div, #ccard_sp{ display: none; }

.travel_div{ display: none; border: 1px solid #ccc; padding: 0 10px; }
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

      if (empty($_POST['ns_nt_pk'])) {
        $ns_nt_pk=pdo_select("SELECT Tb_index FROM news_type WHERE area_id=:area_id LIMIT 0,1", ['area_id'=>$_POST['area_id']]);
        $ns_nt_pk=$ns_nt_pk['Tb_index'];
      }
      else{
        $ns_nt_pk=$_POST['ns_nt_pk'];
      }
      
      //$ns_nt_pk=empty($_POST['ns_nt_pk']) ? '': $_POST['ns_nt_pk'];
      $ns_nt_sp_pk=empty($_POST['ns_nt_sp_pk']) ? '': $_POST['ns_nt_sp_pk'];
      $ns_nt_ot_pk=empty($_POST['ns_nt_ot_pk']) ? '': implode(',', $_POST['ns_nt_ot_pk']);
      $ns_store=empty($_POST['ns_store']) ? '' : $_POST['ns_store'];
      $ns_news=empty($_POST['ns_news']) ? '' : implode(',', $_POST['ns_news']);
      $ns_label=empty($_POST['ns_label']) ? '': implode(',', $_POST['ns_label']);
      $activity_s_date=empty($_POST['activity_s_date']) ? '' : $_POST['activity_s_date'];
      $activity_e_date=empty($_POST['activity_e_date']) ? '' : $_POST['activity_e_date'];
      $StartDate=empty($_POST['StartDate']) ? date('Y-m-d') : $_POST['StartDate'];
      $EndDate=empty($_POST['EndDate']) ? '2200-12-31' : $_POST['EndDate'];
      $ns_date=empty($_POST['ns_date']) ? date('Y-m-d') : $_POST['ns_date'];
      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;

      //-- 無發卡組織/銀行 --
      if(!empty($_POST['no_BankOrg'])){
         $ns_card='no';
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
               'ccard_sp'=>$_POST['ccard_sp'],
                   'note'=>$_POST['note'],
		         'ns_photo_1'=>$ns_photo_1,
		           'ns_alt_1'=>$_POST['ns_alt_1'],
		         'ns_photo_2'=>$ns_photo_2,
		           'ns_alt_2'=>$_POST['ns_alt_2'],
		           'ns_label'=>$ns_label,
               'ns_kiman'=>$_SESSION['admin_index'],
            'ns_reporter'=>$_SESSION['admin_name'],
                'ns_date'=>$ns_date,
               'ns_cdate'=>date('Y-m-d H:i:s'),
              'activity_s_date'=>$activity_s_date,
              'activity_e_date'=>$activity_e_date,
		          'StartDate'=>$StartDate,
		            'EndDate'=>$EndDate,
		        'OnLineOrNot'=>$OnLineOrNot,
              'ns_verify'=>$_POST['ns_verify']
		          );
  
  //-- 完稿時間 --
  if ($_POST['ns_verify']==2) {
    $param=array_merge($param, ['ns_fwdate'=>date('Y-m-d H:i:s')]);
  }

	pdo_insert('appNews', $param);
  
  //-- 新聞銀行/組織關聯儲存 --
  if (isset($_POST['ns_card'])) {
    $x=1;
    $nbc_id='news_bc'.date('YmdHis').rand(0,99);
    foreach ($_POST['ns_card'] as $ns_card_one) {
    $ns_card_one_arr=explode(',', $ns_card_one);
    $param_bank_card=[
    'Tb_index'=>$nbc_id.$x,
    'news_id'=>$Tb_index,
    'card_type'=>$ns_card_one_arr[0],
    'bank_id'=>$ns_card_one_arr[1],
    'card_group_id'=>$ns_card_one_arr[2],
    'org_id'=>$ns_card_one_arr[3],
    'level_id'=>$ns_card_one_arr[4],
    ];
    pdo_insert('appNews_bank_card', $param_bank_card);
    $x++;
  }
 }

  if (isset($_POST['ns_org'])) {
    $x=1;
    $nbc_id='news_bc'.date('YmdHis').rand(0,99);
    foreach ($_POST['ns_org'] as $ns_org_one) {
    $ns_org_one_arr=explode(',', $ns_org_one);
    $param_bank_card=[
    'Tb_index'=>$nbc_id.$x,
    'news_id'=>$Tb_index,
    'card_type'=>$ns_org_one_arr[0],
    'org_id'=>$ns_org_one_arr[1],
    'level_id'=>$ns_org_one_arr[2],
    ];
    pdo_insert('appNews_bank_card', $param_bank_card);
    $x++;
   }
  }

  //-- 新聞銀行/組織關聯儲存 END --
  

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

   if (empty($_POST['ns_nt_pk'])) {
     $ns_nt_pk=pdo_select("SELECT Tb_index FROM news_type WHERE area_id=:area_id LIMIT 0,1", ['area_id'=>$_POST['area_id']]);
     $ns_nt_pk=$ns_nt_pk['Tb_index'];
   }
   else{
     $ns_nt_pk=$_POST['ns_nt_pk'];
   }
   
   //$ns_nt_pk=empty($_POST['ns_nt_pk']) ? '': $_POST['ns_nt_pk'];
   $ns_nt_sp_pk=empty($_POST['ns_nt_sp_pk']) ? '': $_POST['ns_nt_sp_pk'];
   $ns_nt_ot_pk=empty($_POST['ns_nt_ot_pk']) ? '': implode(',', $_POST['ns_nt_ot_pk']);
   $ns_store=empty($_POST['ns_store']) ? '' : $_POST['ns_store'];
   $ns_news=empty($_POST['ns_news']) ? '' : implode(',', $_POST['ns_news']);
   $ns_label=empty($_POST['ns_label']) ? '': implode(',', $_POST['ns_label']);
   $activity_s_date=empty($_POST['activity_s_date']) ? '' : $_POST['activity_s_date'];
   $activity_e_date=empty($_POST['activity_e_date']) ? '' : $_POST['activity_e_date'];
   $StartDate=empty($_POST['StartDate']) ? date('Y-m-d') : $_POST['StartDate'];
   $EndDate=empty($_POST['EndDate']) ? '2200-12-31' : $_POST['EndDate'];
   $ns_date=empty($_POST['ns_date']) ? date('Y-m-d') : $_POST['ns_date'];
   $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;

   //-- 無發卡組織/銀行 --
   if(!empty($_POST['no_BankOrg'])){
      $ns_card='no';
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
               'ccard_sp'=>$_POST['ccard_sp'],
                   'note'=>$_POST['note'],
		           'ns_alt_1'=>$_POST['ns_alt_1'],
		           'ns_alt_2'=>$_POST['ns_alt_2'],
		           'ns_label'=>$ns_label,
                'ns_date'=>$ns_date,
        'activity_s_date'=>$activity_s_date,
        'activity_e_date'=>$activity_e_date,
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

  
  //-- 新聞銀行/組織關聯儲存 --
  pdo_delete('appNews_bank_card', ['news_id'=>$Tb_index]);

  if (isset($_POST['ns_card'])) {
  
    $x=1;
    $nbc_id='news_bc'.date('YmdHis').rand(0,99);
    foreach ($_POST['ns_card'] as $ns_card_one) {
    $ns_card_one_arr=explode(',', $ns_card_one);
    $param_bank_card=[
    'Tb_index'=>$nbc_id.$x,
    'news_id'=>$Tb_index,
    'card_type'=>$ns_card_one_arr[0],
    'bank_id'=>$ns_card_one_arr[1],
    'card_group_id'=>$ns_card_one_arr[2],
    'org_id'=>$ns_card_one_arr[3],
    'level_id'=>$ns_card_one_arr[4],
    ];
    pdo_insert('appNews_bank_card', $param_bank_card);
    $x++;
  }
 }

  if (isset($_POST['ns_org'])) {

    $x=1;
    $nbc_id='news_bc'.date('YmdHis').rand(0,99);
    foreach ($_POST['ns_org'] as $ns_org_one) {
    $ns_org_one_arr=explode(',', $ns_org_one);
    $param_bank_card=[
    'Tb_index'=>$nbc_id.$x,
    'news_id'=>$Tb_index,
    'card_type'=>$ns_org_one_arr[0],
    'org_id'=>$ns_org_one_arr[1],
    'level_id'=>$ns_org_one_arr[2],
    ];
    pdo_insert('appNews_bank_card', $param_bank_card);
    $x++;
   }
  }

	
  location_up('manager_view.php?MT_id='.$_POST['mt_id'].'&Tb_index='.$Tb_index,'');
  }
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM appNews WHERE Tb_index=:Tb_index', $where);

    //-- 版區，次版區 --
    $where_type=['Tb_index'=>$row['ns_nt_pk']];
    $Unews_type=pdo_select('SELECT * FROM news_type WHERE Tb_index=:Tb_index', $where_type);
    
    $ns_nt_ot_pk=empty($row['ns_nt_ot_pk']) ? '': explode(',', $row['ns_nt_ot_pk']);
    $ns_label=empty($row['ns_label']) ? '' : explode(',', $row['ns_label']);
    $ns_card=empty($row['ns_card']) ? '' : explode(',', $row['ns_card']);
    $ns_news=empty( $row['ns_news']) ? '' : explode(',', $row['ns_news']);
 	//$ns_date=empty($row['ns_date']) ? date('Y-m-d'): $row['ns_date'];
  //$ns_reporter=empty($row['ns_reporter']) ? $_SESSION['admin_name'] : $row['ns_reporter'];
 	//$ns_reporter_type1=$row['ns_reporter_type']==1 ? 'checked': '';
 	//$ns_reporter_type2=$row['ns_reporter_type']==2 ? 'checked': '';
  $activity_s_date=empty($row['activity_s_date']) ? '' : $row['activity_s_date'];
  $activity_e_date=empty($row['activity_e_date']) ? '' : $row['activity_e_date'];
 	$StartDate=empty($row['StartDate']) ? date('Y-m-d'): $row['StartDate'];
 	$EndDate=empty($row['EndDate']) ? date('Y-m-d', strtotime('+1 month')) : $row['EndDate'];


  //-- 顯示分類 --
  if (!empty($row['ns_nt_pk']) && $row['ns_nt_pk']!='nt201902121004593' && $row['ns_nt_pk']!='nt2019021210051224') {
    $block_ns_nt_pk='style="display:block;"';
  }
  else{
    $block_ns_nt_pk='';
  }
 
  //-- 選擇分類連結 ---
  $choose_type_btn_url=!empty($row['ns_nt_pk']) ? '../cardNews_public/newsType_windows.php?area_id='.$Unews_type['area_id'].'&unit_id='.$Unews_type['unit_id'] : '../cardNews_public/newsType_windows.php';
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
              <label class="col-md-2 control-label" ><span class="text-danger">*</span>單元分類</label>
              <div class="col-md-10">
               <?php 
                 //-- 版區 --
                 $row_area=$NewPdo->select("SELECT * FROM appArea WHERE mt_id='site201902110948308' ORDER BY OrderBy ASC");
                 foreach ($row_area as $row_area_one) {

                  if($Unews_type['area_id']==$row_area_one['Tb_index']){
                    echo '<label><input type="radio" checked name="area_id" value="'.$row_area_one['Tb_index'].'"> '.$row_area_one['at_name'].'｜</label>'; 
                  }
                  else{
                    echo '<label><input type="radio" name="area_id" value="'.$row_area_one['Tb_index'].'"> '.$row_area_one['at_name'].'｜</label>';
                  }
                   
                 }

                 
               ?>

              </div>
            </div>

						<div id="ns_nt_pk_div" <?php echo $block_ns_nt_pk; ?> class="form-group">
							<label class="col-md-2 control-label" for="ns_nt_pk"><span class="text-danger">*</span> 情報分類</label>
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
								<a id="choose_type_btn" href="<?php echo $choose_type_btn_url;?>" data-fancybox data-type="iframe" class="btn btn-info">選擇分類</a>
							</div>
						</div>

            <div id="ns_nt_ot_pk_div" <?php echo $block_ns_nt_pk; ?> class="form-group">
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
                <a href="../cardNews_public/news_store_windows.php" data-fancybox data-type="iframe" class="btn btn-info"> 選擇商店</a>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ns_card"><span class="text-danger">*</span>情報來源</label>
              <div  class="col-md-8">
                <div id="over_bank">

                  <?php 

                    if ($row['ns_card']!='no') {

                      $where=['news_id'=>$_GET['Tb_index']];
                      $row_bank_card=$NewPdo->select("SELECT nbc.card_type, nbc.bank_id, nbc.card_group_id, nbc.org_id, nbc.level_id, bk.bi_code, bk.bi_shortname, cc.cc_cardname, org.org_nickname, level.attr_name
                                                      FROM appNews_bank_card as nbc 
                                                      INNER JOIN bank_info as bk ON nbc.bank_id=bk.Tb_index 
                                                      INNER JOIN credit_card as cc ON nbc.card_group_id=cc.cc_group_id 
                                                      INNER JOIN card_org as org ON nbc.org_id=org.Tb_index 
                                                      INNER JOIN card_level as level ON nbc.level_id=level.Tb_index 
                                                      WHERE nbc.news_id=:news_id AND nbc.bank_id!='' AND nbc.card_group_id!='' 
                                                      GROUP BY nbc.Tb_index
                                                      ORDER BY nbc.bank_id, nbc.card_group_id, nbc.org_id, nbc.level_id", $where);

                      foreach ($row_bank_card as $row_bank_card_one) {
                        $card_id=$row_bank_card_one['card_type'].','.$row_bank_card_one['bank_id'].','.$row_bank_card_one['card_group_id'].','.$row_bank_card_one['org_id'].','.$row_bank_card_one['level_id'];
                        $card_name_txt='['.$row_bank_card_one['bi_code'].']'.$row_bank_card_one['bi_shortname'].' '.$row_bank_card_one['cc_cardname'].' '.$row_bank_card_one['org_nickname'].' '.$row_bank_card_one['attr_name'];
                        echo '<span class="label">'.$card_name_txt.' <input type="hidden" name="ns_card[]" card_name="'.$card_name_txt.'" value="'.$card_id.'"></span><br>';
                      }
                    }
                    else{
                       echo '<input type="hidden" name="ns_card[]" value="no">';
                    }
                   
                  ?>

                </div>
                <div id="over_org">

                  <?php 

                     if ($row['ns_org']!='no') {

                       //-- 銀行/組織關聯 --
                       $where=array('news_id'=>$_GET['Tb_index']);
                       $row_org=pdo_select("SELECT nbc.card_type, nbc.org_id, nbc.level_id, org.org_nickname, level.attr_name
                                            FROM appNews_bank_card as nbc
                                            INNER JOIN card_org as org ON nbc.org_id=org.Tb_index 
                                            INNER JOIN card_level as level ON nbc.level_id=level.Tb_index 
                                            WHERE nbc.news_id=:news_id AND nbc.bank_id='' AND nbc.card_group_id=''", $where);

                       foreach ($row_org as $row_org_one) {
                         $orglevel_name=$row_org_one['card_type']=='1' ? '所有銀行'.$row_org_one['org_nickname'].$row_org_one['attr_name'] : '所有銀行'.$row_org_one['org_nickname'].$row_org_one['attr_name'].'金融卡';
                         echo '<span class="label">'.$orglevel_name.' <input type="hidden" name="ns_org[]" orglevel_name="'.$orglevel_name.'" value="'.$row_org_one['card_type'].','.$row_org_one['org_id'].','.$row_org_one['level_id'].'"></span><br>';
                       }

                     }
                     else{
                       echo '<input type="hidden" name="ns_org[]" value="no">';
                     }
                   
                  ?>
                  
                </div>
              </div>
              <div class="col-md-2">
                <a href="../cardNews_public/newsBank_windows.php" data-fancybox data-type="iframe" class="btn btn-info btn-block my-025">選擇銀行</a>
                <a href="../cardNews_public/newsOrg_windows.php" data-fancybox data-type="iframe" class="btn btn-info btn-block my-025">選擇發卡組織</a>
                <a href="javascript:;" id="clean_BankOrg" class="btn btn-default btn-block my-025">清除</a>
                <?php
                  if ($row['ns_card']=='no' && $row['ns_org']=='no') {
                    echo '<label><input type="checkbox" name="no_BankOrg" checked value="1"> 無發卡組織/銀行</label>';
                  }
                  else{
                    echo '<label><input type="checkbox" name="no_BankOrg" value="1"> 無發卡組織/銀行</label>';
                  }
                ?>
              </div>
            </div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_ftitle"><span class="text-danger">*</span>主標題</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="ns_ftitle" name="ns_ftitle" value="<?php echo $row['ns_ftitle'];?>">
                <span class="text-danger">(限20個字)</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_stitle">副標題</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="ns_stitle" name="ns_stitle" value="<?php echo $row['ns_stitle'];?>">
                <span class="text-danger">(限20個字)</span>
							</div>
						</div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="activity_s_date">活動期間</label>
              <div class="col-md-10 row">
                <div class="col-md-5">
                  <input type="date" class="form-control" id="activity_s_date" name="activity_s_date" value="<?php echo $activity_s_date;?>">
                </div>
                    <div class="col-md-1"><h3>至</h3></div>
                <div class="col-md-5">
                  <input type="date" class="form-control" id="activity_e_date" name="activity_e_date" value="<?php echo $activity_e_date;?>">
                </div>
                <div class="col-md-1"><h3>止</h3></div>
                <div class="col-md-12">
                  <span class="text-danger">（起始日期未填寫代表即日起）</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="StartDate"><span class="text-danger">*</span> 上架期間</label>
              <div class="col-md-10 row">
                <div class="col-md-5">
                  <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echo $StartDate;?>">
                </div>
                                <div class="col-md-1"><h3>至</h3></div>
                <div class="col-md-5">
                  <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echo $EndDate;?>">
                </div>
                <div class="col-md-1"><h3>止</h3></div>
                <div class="col-md-12">
                  <span class="text-danger">（開始日預設新增文章當天日期，結束日為開始日後推30天）</span>
                </div>
              </div>
            </div>

            <div id="ccard_sp" class="form-group">
              <label class="col-md-2 control-label">信用卡特色</label>
              <div class="col-md-10">
                <textarea class="form-control" name="ccard_sp" ><?php echo $row['ccard_sp'];?></textarea>
              </div>
            </div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span>內容</label>
							<div class="col-md-10">
								<textarea id="ckeditor" name="ns_msghtml" ><?php echo $row['ns_msghtml'];?></textarea>
							</div>
						</div>

						<div class="form-group">
              <label class="col-md-2 control-label" for="ckeditor">注意事項</label>
              <div class="col-md-10">
                <textarea class="form-control" name="note" ><?php echo $row['note'];?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" >延伸閱讀</label>
              <div id="over_ex_news" class="col-md-8">
                <?php 
                  if (!empty($row['ns_news'])) {
                    for ($i=0; $i <count($ns_news) ; $i++) {
                      $ns_news_name=pdo_select("SELECT ns_ftitle FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_news[$i]]); 
                       echo '<span class="btn btn-success btn-block">'.$ns_news_name['ns_ftitle'].' <input type="hidden" name="ns_news[]" ns_ftitle="'.$ns_news_name['ns_ftitle'].'" value="'.$ns_news[$i].'"><button class="del_ns_news btn btn-danger" type="button">Ｘ</button></span>';
                     }
                  }
                ?>
              </div>
              <div class="col-md-2">
                <a href="../cardNews_public/news_windows.php" data-fancybox data-type="iframe" class="btn btn-info">查詢文章</a>
              </div>
            </div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_photo_1"><span class="text-danger">*</span> 圖檔(上)</label>
							<div class="col-md-3">
								<input type="file" name="ns_photo_1" class="form-control" id="ns_photo_1" onchange="file_viewer_load_new(this, '#img_box')">
								<span class="text-danger">( 圖檔尺寸: 寬度不超過750pixles )</span>
							</div>

							<label class="col-md-1 control-label" for="ns_alt_1">圖說</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="ns_alt_1" name="ns_alt_1" maxlength="50" value="<?php echo $row['ns_alt_1'];?>">
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
								  <input type="hidden" name="old_ns_photo_1" value="<?php echo $row['ns_photo_1'];?>">
								  <img id="one_img" src="../../img/<?php echo $row['ns_photo_1'];?>" alt="請上傳代表圖檔">
								</div>
							</div>
						<?php }?>		
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="ns_photo_2">圖檔(下)</label>
							<div class="col-md-3">
								<input type="file" name="ns_photo_2" class="form-control" id="ns_photo_2" onchange="file_viewer_load_new(this, '#img_box2')">
								<span class="text-danger">( 圖檔尺寸: 寬度不超過750pixles )</span>
							</div>

							<label class="col-md-1 control-label" for="ns_alt_2">圖說</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="ns_alt_2" name="ns_alt_2" maxlength="50" value="<?php echo $row['ns_alt_2'];?>">
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
							<label class="col-md-2 control-label" for="ns_label">標籤</label>
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
								<a href="../cardNews_public/news_label_windows.php" data-fancybox data-type="iframe" class="btn btn-info">選擇標籤</a>
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
            <input type="hidden" id="ns_verify" name="ns_verify" value="2">
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
						<div class="col-lg-4">
							<button type="button" id="draft_btn" class="btn btn-default btn-block btn-flat"  >草稿</button>
						</div>
						<div class="col-lg-4">
						<?php if(empty($_GET['Tb_index'])){?>
							<button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">預覽</button>
						<?php }else{?>
						    <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">更新</button>
						<?php }?>
						</div>
            <div class="col-lg-4">
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

          //-- 版區次版區 --
          $('[name="area_id"]').change(function(event) {
            
            //-- 卡好康 顯示分類 --
            if ($(this).val()=='at2019021114154632') {
              $('#ns_nt_pk_div').css('display', 'block');
              $('#ns_nt_ot_pk_div').css('display', 'block');
              $('#ccard_sp').css('display', 'none');
              $('#choose_type_btn').attr('href', '../cardNews_public/newsType_windows.php?area_id='+$(this).val());
              //-- 清空 分類 AND 上刊其他分類 暫存 --
              $('#ns_nt_pk').html('');
              $('#ns_nt_ot_pk').html('');
              sessionStorage.removeItem("news_type");
              sessionStorage.removeItem("news_sp_type");
              sessionStorage.removeItem("news_ot_type");
            }
            //-- 其他 隱藏份類 --
            else{
              
              //-- 新卡訊 --
              if ($(this).val()=='at2019021114160725') {
                $('#ccard_sp').css('display', 'block');
              }else{
                $('#ccard_sp').css('display', 'none');
              }

              $('#ns_nt_pk_div').css('display', 'none');
              $('#ns_nt_ot_pk_div').css('display', 'none');
              //-- 清空 分類 AND 上刊其他分類 暫存 --
              $('#ns_nt_pk').html('');
              $('#ns_nt_ot_pk').html('');
              sessionStorage.removeItem("news_type");
              sessionStorage.removeItem("news_sp_type");
              sessionStorage.removeItem("news_ot_type");
            }
          });
          //-- 版區次版區 END --

          

          //-- 清除銀行、發卡組織 --
          $('#clean_BankOrg').click(function(event) {
            if (confirm('是否要清除銀行、發卡組織??')) {
              $('#over_bank').html('');
              $('#over_org').html('');
              sessionStorage.removeItem("news_bank");
              sessionStorage.removeItem("news_card");
              sessionStorage.removeItem("news_card_name");
              sessionStorage.removeItem("news_card_orglevel");
              sessionStorage.removeItem("news_card_orglevel_name");

              $('[name="no_BankOrg"]').prop('disabled', false);
            }
          });


          //-- 無發卡租之/銀行 --
          $('[name="no_BankOrg"]').change(function(event) {
            if ($(this).prop('checked')==true) {
              $('#over_bank').html('<input type="hidden" name="ns_card[]" value="no">');
              $('#over_org').html('<input type="hidden" name="ns_org[]" value="no">');
            }
            else{
              $('#over_bank').html('');
              $('#over_org').html('');
            }
          });


          //-- 預覽、更新 ---
          $("#submit_btn").click(function(event) {

          	var err_txt='';
            
            err_txt = err_txt + check_input( '[name="area_id"]', '版區分類，' );

            if ($('[name="area_id"][value="at2019021114154632"]').prop('checked')==true) {
              err_txt = err_txt + check_input( '[name="ns_nt_pk"]', '情報分類，' );
            }
          	err_txt = err_txt + check_input( '#ns_ftitle', '主標題，' );
            err_txt = err_txt + check_input( '#StartDate', '上架起始日，' );
            err_txt = err_txt + check_input( '#EndDate', '上架結束日，' );
            if ($('[name="ns_card[]"]').length<1 && $('[name="ns_org[]"]').length<1) {
              err_txt = err_txt + '發卡組織&銀行關聯，';
            }
            err_txt = CKEDITOR.instances.ckeditor.getData()=='' ? err_txt + '內容，' : err_txt;
            err_txt = $('[name="ns_photo_1"]').val()=='' && $('[name="old_ns_photo_1"]').val()==undefined ? err_txt + '圖檔(上)，' : err_txt;


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
            err_txt = err_txt + check_input( '[name="area_id"]', '版區分類，' );

            if ($('[name="area_id"][value="at2019021114154632"]').prop('checked')==true){
               err_txt = err_txt + check_input( '[name="ns_nt_pk"]', '情報分類，' );
            }
            err_txt = err_txt + check_input( '#ns_ftitle', '主標題，' );
            err_txt = err_txt + check_input( '#StartDate', '上架起始日，' );
            err_txt = err_txt + check_input( '#EndDate', '上架結束日，' );
            if ($('[name="ns_card[]"]').length<1 && $('[name="ns_org[]"]').length<1) {
              err_txt = err_txt + '發卡組織&銀行關聯，';
            }
            err_txt = CKEDITOR.instances.ckeditor.getData()=='' ? err_txt + '內容，' : err_txt;
            err_txt = $('[name="ns_photo_1"]').val()=='' && $('[name="old_ns_photo_1"]').val()==undefined ? err_txt + '圖檔(上)，' : err_txt;



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

    //-- 上刊到其他單元 --
    if($('[name="ns_nt_ot_pk[]"]').length>0){
        var news_ot_type=[];
        $.each($('[name="ns_nt_ot_pk[]"]'), function(index, val) {
            news_ot_type.push($(this).val());
        });
        news_ot_type=news_ot_type.join(',');
        //-- 記錄暫存 --
        sessionStorage.setItem("news_ot_type", news_ot_type);
    }


    //-- 情報來源 --
    if ($('[name="ns_card[]"]').length>0) {
     
     //-- 銀行 --
     var news_bank_arr=[];

      $.ajax({
      url: '../cardNews_public/newsBank_windows_ajax.php',
      type: 'POST',
      dataType: 'json',
      data: {
        type: 'check_bank',
        news_id: $('#Tb_index').val()
      },
      success:function (data) {
        $.each(data, function(index, val) {
           var card_type=this['card_type']=='1' ? 'credit_card':'debit_card';
           var card_type_name=this['card_type']=='1' ? '信用卡':'金融卡';
           var news_bank_one=card_type+','+this['bank_id']+'|'+card_type_name+','+this['bi_shortname'];
           news_bank_arr.push(news_bank_one);

        });

        //-- 銀行暫存 --
        sessionStorage.setItem("news_bank", news_bank_arr.join('*'));
      }
    });
      

       var card_arr=[];
       var card_name_arr=[];
       $.each($('[name="ns_card[]"]'), function(index, val) {
          card_arr.push($(this).val());
          card_name_arr.push($(this).attr('card_name'));
       });

      //-- 記錄暫存 --
      sessionStorage.setItem("news_card", card_arr.join('|'));
      sessionStorage.setItem("news_card_name", card_name_arr.join(','));
    }
    
    //-- 情報來源(銀行組織關聯) --
    if ($('[name="ns_org[]"]').length>0) {
      var news_card_orglevel_arr=[];
      var news_card_orglevel_name_arr=[];
      $.each($('[name="ns_org[]"]'), function(index, val) {
         news_card_orglevel_arr.push($(this).val());
         news_card_orglevel_name_arr.push($(this).attr('orglevel_name'));
      });
      
      //-- 記錄暫存 --
      sessionStorage.setItem("news_card_orglevel", news_card_orglevel_arr.join('|'));
      sessionStorage.setItem("news_card_orglevel_name", news_card_orglevel_name_arr);
    }


    //-- 新卡訊 --
    if ($('[name="area_id"][value="at2019021114160725"]').prop('checked')==true) {
      $('#ccard_sp').css('display', 'block');
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
		// if ($('[name="ns_card[]"]').length>0) {
  //           var bank_arr=[];
		// 	$.each($('[name="ns_card[]"]'), function() {
		// 	  bank_arr.push($(this).val());
		// 	});
  //     $('[name="no_BankOrg"]').prop('disabled', true);
		// 	//-- 記錄暫存 --
  //     sessionStorage.setItem("news_bank", bank_arr);
		// }

		//-- 發卡組織關聯 --
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

