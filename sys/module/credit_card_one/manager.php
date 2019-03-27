<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">

  .fancybox-slide--iframe .fancybox-content {
    width  : 700px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}

.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(even){ background-color: #f5f5f5; }

.btn.btn-success{ margin: 2px; padding: 2px 5px; position: relative;}
.btn.btn-success button{ padding: 2px 5px; position: absolute; top: -1px; right: -1px; border-radius: 0; }

	.card_level{ padding: 5px; border-bottom: 1px solid #ccc; }
	.card_level div{ display: none; }
	.cc_apply_url{display: none;}
	.cc_apply_file{ display: none; }

	/*-- fancybox inline --*/
	.tool_alert{ display: none; width: 300px;}
	.tool_alert .a_div{ display: flex; justify-content: space-around;  margin-top: 4vh;}

  #eq_list a i{display: none;}
  #eq_list a i.active{display: inline-block !important;}
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 
    	if (!empty($_POST['cc_doc_path'])) {
    		$param=['cc_doc_path'=>''];
            $where=['cc_group_id'=>$_POST['cc_group_id']];
            pdo_update('credit_card', $param, $where);
            unlink('../../other_file/'.$_POST['cc_doc_path']);
    	}
       exit();
  	}


  	//------------------------------ 新增 ----------------------------

	if (empty($_POST['cc_group_id'])) {
	// 	$Tb_index='ccard'.date('YmdHis').rand(0,99);
     
 //     //===================== 代表圖 ========================
 //      if (!empty($_FILES['cc_doc_path']['name'])){

 //      	 $type=explode('.', $_FILES['cc_doc_path']['name']);
 //      	 $cc_doc_path=$Tb_index.'.'.$type[count($type)-1];
 //         fire_upload('cc_doc_path', $cc_doc_path); 
 //      }
 //      else{
 //      	$cc_doc_path='';
 //      }

 //    $cc_attr=implode(',', $_POST['cc_attr']);
 //    $cc_publish=empty($_POST['cc_publish']) ? date('Y-m-d'): $_POST['cc_publish'];

 //    $cc_card_orglevel_num=count($_POST['cc_card_orglevel']);
 //    for ($i=0; $i <$cc_card_orglevel_num ; $i++) { 
    	
 //    	$cc_card_orglevel_one=explode(',', $_POST['cc_card_orglevel'][$i]);

 //       	$param=  ['Tb_index'=>$Tb_index.$i,
 //       		   'cc_cardname'=>$_POST['cc_cardname'],
 //       			  'cc_bi_pk'=>$_POST['cc_bi_pk'],
 //       			   'cc_attr'=>$cc_attr,
 //       			'cc_cardorg'=>$cc_card_orglevel_one[0],
 //       		  'cc_cardlevel'=>$cc_card_orglevel_one[1],
 //                   'cc_doc_url'=>$_POST['cc_doc_url'],
 //                  'cc_doc_name'=>$_POST['cc_doc_name'],
 //       		   'cc_doc_path'=>$cc_doc_path,
 //       			'cc_publish'=>$cc_publish
 //       			 ];
 //       	pdo_insert('credit_card', $param);
 //    }
    
	// //-- 跳至修改單卡權益 --
	// location_up('admin.php?MT_id='.$_POST['mt_id'].'&bank_id='.$_POST['cc_bi_pk'].'&Tb_index='.$Tb_index.'0','成功新增');
   }

   //修改
   else{  
   	$Tb_index='ccard'.date('YmdHis').rand(0,99);

    
   	//============================ 新增新卡等 ==============================
   	if (!empty($_POST['cc_card_orglevel']) && $_POST['cc_group_state']=='0') {
   		

    $cc_attr=implode(',', $_POST['cc_attr']);
    $cc_publish=empty($_POST['cc_publish']) ? date('Y-m-d'): $_POST['cc_publish'];

    $cc_card_orglevel_num=count($_POST['cc_card_orglevel']);

    for ($i=0; $i <$cc_card_orglevel_num ; $i++) { 
    	
    	$cc_card_orglevel_one=explode(',', $_POST['cc_card_orglevel'][$i]);

       	$param=  ['Tb_index'=>$Tb_index.$i,
       	       'cc_group_id'=>$_POST['cc_group_id'],
       		   'cc_cardname'=>$_POST['cc_cardname'],
       			  'cc_bi_pk'=>$_POST['cc_bi_pk'],
       			   'cc_attr'=>$cc_attr,
       			'cc_cardorg'=>$cc_card_orglevel_one[0],
       		  'cc_cardlevel'=>$cc_card_orglevel_one[1],
                   'cc_doc_url'=>$_POST['cc_doc_url'],
                  'cc_doc_name'=>$_POST['cc_doc_name'],
       		   'cc_doc_path'=>$_POST['old_file'],
       			'cc_publish'=>$cc_publish
       			 ];
       	pdo_insert('credit_card', $param);
      }
   	}
    //============================ 新增新卡等 END ==============================




   	 //===================== 申請書 ========================
      if (!empty($_FILES['cc_doc_path']['name'])) {

      	 $type=explode('.', $_FILES['cc_doc_path']['name']);
      	 $cc_doc_path=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('cc_doc_path', $cc_doc_path);
        $cc_doc_path_param=['cc_doc_path'=>$cc_doc_path];
        $cc_doc_path_where=['cc_group_id'=>$_POST['cc_group_id']];
        pdo_update('credit_card', $cc_doc_path_param, $cc_doc_path_where);

      }



       $cc_attr=implode(',', $_POST['cc_attr']);
       $cc_publish=empty($_POST['cc_publish']) ? date('Y-m-d'): $_POST['cc_publish'];

      $param=  [
         		   'cc_cardname'=>$_POST['cc_cardname'],
         			  'cc_bi_pk'=>$_POST['cc_bi_pk'],
         			   'cc_attr'=>$cc_attr,
                     'cc_doc_url'=>$_POST['cc_doc_url'],
                    'cc_doc_name'=>$_POST['cc_doc_name'],
         			'cc_publish'=>$cc_publish
         			 ];


      //-- 無申請書 --
      if (empty($_POST['cc_doc_name'])) {
      	 $param['cc_doc_name']='';
      	 $param['cc_doc_path']='';
      }

      //-- 有選擇信用卡狀態 --
      if (!empty($_POST['cc_group_state'])) {
      	$param['cc_group_state']=$_POST['cc_group_state'];
      }


     //-- 判斷信用卡狀態 --
     switch ($_POST['cc_group_state']) {
     	//- 正常使用 -
     	case 0:

     	  $param['cc_status_name']='';
     	  $param['cc_stop_publish']=0;
     	  $param['cc_stop_card']=0;
     		break;
     	//- 全部停發 -
        case 1:
     	  
     	  $param['cc_status_name']='停發';
     	  $param['cc_stop_publish']=1;
     	  $param['cc_stop_card']=0;
     		break;
     	//- 全部停卡 -
        case 2:

     	  $param['cc_status_name']='停卡';
     	  $param['cc_stop_publish']=0;
     	  $param['cc_stop_card']=1;
     		break;
     	//- 部分使用 -
     	case 3:
     		# code...
     		break;
     	default:
		# code...
		    break;
     }
    
    
    $where= ['cc_group_id'=>$_POST['cc_group_id']] ;
	pdo_update('credit_card', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}



if ($_GET) {
 	//-- 銀行 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");

   
   //-- 卡組織 --
   $org_name=[];
   $org=$NewPdo->select("SELECT Tb_index, org_nickname, org_image FROM card_org WHERE mt_id='site2018110611172385' ORDER BY OrderBy ASC");
   foreach ($org as $org_one) {
    $org_name[$org_one['Tb_index']]=$org_one['org_nickname'];
   }

   //-- 卡等 --
   $level_name=[];
   $level=$NewPdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
   foreach ($level as $level_one) {
   	$level_name[$level_one['Tb_index']]=$level_one['attr_name'];
   }

   //-- 信用卡功能 --
   $card_func=$NewPdo->select("SELECT Tb_index, fun_name, card_image FROM card_func WHERE mt_id='site2018110517362644' ORDER BY OrderBy ASC");


   //-- 信用卡優惠 --
   $card_pref=$NewPdo->select("SELECT Tb_index, pref_name, pref_image FROM card_pref WHERE mt_id='site2018110617521258' ORDER BY OrderBy ASC");


  //-- 信用卡權益 --
  $card_eq_item=$NewPdo->select("SELECT Tb_index, eq_name FROM card_eq_item WHERE mt_id='site2019021216245137' ORDER BY OrderBy ASC");


   //-- 讀取信用卡資料 --
   $row_card=$NewPdo->select("SELECT * FROM credit_card WHERE Tb_index=:Tb_index ", ['Tb_index'=>$_GET['Tb_index']], 'one');

   //-- 信用卡狀態 --
   $cc_status_name0=$row_card['cc_status_name']=='' ? 'checked':'';
   $cc_status_name1=$row_card['cc_status_name']=='停發' ? 'checked':'';
   $cc_status_name2=$row_card['cc_status_name']=='停卡' ? 'checked':'';


   $cc_attr=explode(',', $row_card['cc_attr']);

   $cc_doc_url_check=empty($row_card['cc_doc_url']) ? '':'selected';
   $cc_doc_path_check=empty($row_card['cc_doc_path']) ? '':'selected';

   $cc_doc_url_display=!empty($row_card['cc_doc_url']) ? 'style="display: block"':'';
   $cc_doc_path_display=!empty($row_card['cc_doc_path']) ? 'style="display: block"':'';

   //-- 信用卡群 --
   $row_cc_group=$NewPdo->select("SELECT cc_group_id ,cc_cardname FROM credit_card WHERE cc_bi_pk=:cc_bi_pk GROUP BY cc_group_id", ['cc_bi_pk'=>$row_card['cc_bi_pk']]);

   //-- 卡等 --
   $row_cc_level=$NewPdo->select("SELECT Tb_index, cc_cardorg, cc_cardlevel FROM credit_card WHERE cc_group_id=:cc_group_id ", ['cc_group_id'=>$row_card['cc_group_id']]);
}
?>


<div class="wrapper wrapper-content animated fadeInRight" >
  <form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>
            <span style="float: left;">信用卡資料編輯</span>

           <!-- 信用卡選擇 -->
						<div class="text-center">
							<select id="select_bank" class="bank">
								<?php
                                 foreach ($row_bank as $row_bank_one) {
                                 	if ($row_card['cc_bi_pk']==$row_bank_one['Tb_index']) {
                                 	  echo '<option selected value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 	}
                                 	else{
                                 	  echo '<option value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 	}
                                 }
                ?>
							</select>

							<select id="select_card" class="cc_group">
								<?php
                                 foreach ($row_cc_group as $row_cc_group_one) {
                                 	if ($row_card['cc_group_id']==$row_cc_group_one['cc_group_id']) {
                                 	  echo '<option selected value="'.$row_cc_group_one['cc_group_id'].'">'.$row_cc_group_one['cc_cardname'].'</option>';
                                 	}
                                 	else{
                                 	  echo '<option value="'.$row_cc_group_one['cc_group_id'].'">'.$row_cc_group_one['cc_cardname'].'</option>';
                                 	}
                                 }
                     		  	?>
							</select>

							<select id="select_card_level" class="ccard">
								
								<?php 
                                  foreach ($row_cc_level as $row_cc_level_one) {

                                   $cc_status_name= empty($row_card['cc_status_name']) ? '':'('.$row_card['cc_status_name'].')';
                                   $level_id=$row_cc_level_one['cc_cardlevel'];
                                   $org_id=$row_cc_level_one['cc_cardorg'];

                                   if ($row_card['Tb_index']==$row_cc_level_one['Tb_index']){
                                     echo '<option selected value="'.$row_cc_level_one['Tb_index'].'">'.$org_name[$org_id].$level_name[$level_id].$cc_status_name.'</option>';
                                   }
                                   else{
                                   	 echo '<option value="'.$row_cc_level_one['Tb_index'].'">'.$org_name[$org_id].$level_name[$level_id].$cc_status_name.'</option>';
                                   }
                                  }
								 ?>
							</select>
						</div>
            <!-- 信用卡選擇 END -->

                        
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					
						
						<div class="form-group">
							<label class="col-md-2 control-label" ><span class="text-danger">*</span> 信用卡狀態</label>
							<div class="col-md-10">
								<label><input name="cc_status_name" type="radio" <?php echo $cc_status_name0; ?> value="">正常使用</label>｜
                <label><input name="cc_status_name" type="radio" <?php echo $cc_status_name1; ?> value="停發">停發</label>｜
                <label><input name="cc_status_name" type="radio" <?php echo $cc_status_name2; ?> value="停卡">停卡</label>
							</div>
						</div>

						<div class="form-group">
              <label class="col-md-2 control-label" for="cc_doc_path"> 信用卡圖檔</label>
              <div class="col-md-4">
                <input type="file" name="cc_doc_path" class="form-control" id="cc_doc_path" onchange="file_viewer_load_new(this, '#img_box')">
                <span class="text-danger">檔名規則：西元年月日-銀行-卡名</span>
              </div>
              
            </div>

            <div class="form-group">
               <label class="col-md-2 control-label" ></label>
               <div id="img_box" class="col-md-4">
                
              </div>
            <?php if(!empty($row_card['cc_doc_path'])){?>
              <div  class="col-md-4">
                 <div id="img_div" >
                  <p>目前檔案</p>
                 <button type="button" id="one_del_img"> X </button>
                  <span class="img_check"><i class="fa fa-check"></i></span>
                  <h3><?php echo $row_card['cc_doc_name'];?></h3>
                  <input type="hidden" name="old_file" value="<?php echo $row_card['cc_doc_path'];?>">
                </div>
              </div>
            <?php }?>   
            </div>

						<div class="form-group">
						  <label class="col-md-2 control-label" >信用卡特色</label>
						  <div class="col-md-10">
						  	<textarea class="form-control" style="height: 100px;"></textarea>
                <span class="text-danger">描述該單卡的特色及優惠，每1行為1個特色的描述，每行建議不超過18字</span>
						  </div>
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" >信用卡功能</label>
							<div class="col-md-10">
								<?php
								     foreach ($card_func as $card_func_one) {

								       echo '<label title="'.$card_func_one['fun_name'].'" class="card_func"><img src="../../img/'.$card_func_one['card_image'].'"><input type="checkbox" name="card_func_id[]" value="'.$card_func_one['Tb_index'].'"> </label>';
								     }
								?>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="note">信用卡優惠</label>
							<div class="col-md-10">
								<?php 
                  foreach ($card_pref as $card_pref_one) {
                    
                    echo '<label title="'.$card_pref_one['pref_name'].'" class="card_pref"><img src="../../img/'.$card_pref_one['pref_image'].'"><input type="checkbox" name="card_pref_id[]" value="'.$card_pref_one['Tb_index'].'"> </label>';
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
                <a href="../credit_card_one_public/news_store_windows.php" data-fancybox data-type="iframe" class="btn btn-info"> 選擇商店</a>
              </div>
            </div>

            <input type="hidden" id="cc_bi_pk" name="cc_bi_pk" value="<?php echo $row_card['cc_bi_pk'];?>">
						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
					
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
						<?php if(empty($_GET['cc_group_id'])){?>
							<button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">儲存</button>
						<?php }else{?>
						    <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">更新</button>
						<?php }?>
						</div>
					</div>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>

    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <header>權益項目</header>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
          
          <div id="eq_list" class="form-group">
            <?php 
             foreach ($card_eq_item as $card_eq_item_one) {
               echo '<div class="col-md-2"> <a href="javascript:;" card_eq_id="'.$card_eq_item_one['Tb_index'].'">'.$card_eq_item_one['eq_name'].' <i class="text-danger fa fa-check"></i></a> </div>';
             }
            ?>

          </div>

           
           <!-- 權益項目內容 -->
            <div id="interest_div" class="row">
              <div class="col-lg-6 new_interest_div">
                <div class="panel panel-success">
                           <div class="panel-heading">
                              <span>申辦條件</span> 
                              <div class="panel_tool_div" style="display: inline-block; ">
                                <button class="btn btn-default btn-xs new_schedule" type="button">新增排程</button>
                                <button class="btn btn-default btn-xs ch_example" type="button">引用群組</button>
                                <button class="btn btn-default btn-xs del_example" type="button">刪除群組</button>
                              </div>
                           </div>
                           <div class="panel-body">

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" > 簡易內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="sm_content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" >附註資料 <br> <span class="text-danger">(不公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="note"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 量化資料</label>
                                          <div class="col-md-6">
                                            <input type="text" name="number_data" class="form-control">
                                            <span class="eq_txt">(量化資料說明XXX)</span>
                                          </div>
                                          <div class="col-md-2 eq_type">
                                            
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 生效日期</label>
                                          <div class="col-md-8">
                                            <input type="date" name="StartDate" class="form-control" value="">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" >截止日期</label>
                                          <div class="col-md-8">
                                            <input type="date" name="EndDate" class="form-control" value="">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-md-2">
                                            <button id="submit_card_eq" type="button" class="btn btn-success btn-lg btn-block">確定</button>
                                          </div>
                                        </div>

                                        <input type="hidden" name="interest_content_id" value="">
                                        <input type="hidden" name="interest_id" value="">
                           </div>
                </div>
              </div>

              <div class="col-lg-6 schedule_div">
                <div class="panel panel-success">
                           <div class="panel-heading">
                              <span>申辦條件</span> <i>(排程)</i>
                              <div class="panel_tool_div" style="display: inline-block; ">
                                <button class="btn btn-default btn-xs" type="button">引用群組</button>
                                <button class="btn btn-default btn-xs" type="button">刪除群組</button>
                              </div>
                           </div>
                           <div class="panel-body">

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" > 簡易內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="sm_content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" >附註資料 <br> <span class="text-danger">(不公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="note"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 量化資料</label>
                                          <div class="col-md-6">
                                            <input type="text" name="number_data" class="form-control">
                                            <span class="eq_txt">(量化資料說明XXX)</span>
                                          </div>
                                          <div class="col-md-2 eq_type">
                                            
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 生效日期</label>
                                          <div class="col-md-8">
                                            <input type="date" name="StartDate" class="form-control">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" >截止日期</label>
                                          <div class="col-md-8">
                                            <input type="date" name="EndDate" class="form-control">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-md-2">
                                            <button id="submit_card_eq_schedule" type="button" class="btn btn-success btn-lg btn-block">確定</button>
                                          </div>
                                        </div>

                                        <input type="hidden" name="interest_content_id" value="">
                                        <input type="hidden" name="interest_id" value="">
                           </div>
                </div>
              </div>
            </div>
            <!-- 權益項目內容 END -->

          
        </div><!-- /.panel-body -->
      </div><!-- /.panel -->
    </div>


	</div>
 </form>




</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {


    

          $("#submit_btn").click(function(event) {
          		var err_txt='';
          		err_txt = err_txt + check_input( '[name="cc_cardname"]', '信用卡名稱，' );
          		err_txt = err_txt + check_input( '[name="cc_bi_pk"]', '發卡單位，' );
          		err_txt = err_txt + check_input( '[name="cc_attr[]"]', '信用卡屬性，' );
          		// err_txt = err_txt + check_input( '[name="cc_cardorg[]"]', '發卡組織，' );
          		err_txt = err_txt + check_input( '[name="cc_card_orglevel[]"]', '發卡組織/卡等' );


          		if (err_txt!='') {
          		 alert("請輸入"+err_txt+"!!");

          		}
          		else{
                
                if (confirm("確定是否要更新此次修改??")) {
                   $('#put_form').submit();
                }
          	     
          	   }
          });








    //------------------------------ 刪信用卡申請書檔案 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除檔案?')) {
			 var data={
			 	        cc_group_id: $('[name="cc_group_id"]').val(),
                            cc_doc_path: $('[name="old_file"]').val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});






    //-------------------------- 權益項目選取 -------------------------------
    $('#eq_list a').click(function(event) {
      $('#interest_div').css('display', 'block');
      $('.schedule_div').css('display', 'none');
      $('.new_schedule').css('display', 'inline-block');

       //-- 撈取權益 --
       $.ajax({
         url: 'manager_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
          type: 'ch_eq',
          eq_id: $(this).attr('card_eq_id'),
        },
        success:function (data) {
          console.log(data);
          var eq_type_arr={'txt':'(一般文字內容)', 'big':'(比大)', 'small':'(比小)'};
          $('#interest_div .panel-heading span').html(data['eq_name']);
          $('#interest_div .eq_type').html(eq_type_arr[data['eq_type']]);
          $('#interest_div .eq_txt').html(data['eq_txt']);
          $('[name="interest_id"]').val(data['Tb_index']);
        }
       });
       
       //-- 撈取信用卡權益 --
       ch_card_eq($(this).attr('card_eq_id'));
       
    });



    //----------------------- 顯示權益項目排程 --------------------------
    $('.new_schedule').click(function(event) {
      $(this).css('display', 'none');
      $('.schedule_div').css('display', 'block');
    });




    //------------------------------ 新增、更新權益項目 -------------------------------------
    $('#submit_card_eq').click(function(event) {
          var err_txt='';
          err_txt = err_txt + check_input( '.new_interest_div [name="content"]', '內容說明，' );
          //err_txt = err_txt + check_input( '.new_interest_div [name="sm_content"]', '簡易內容說明，' );
          err_txt = err_txt + check_input( '.new_interest_div [name="number_data"]', '量化資料，' );
          err_txt = err_txt + check_input( '.new_interest_div [name="StartDate"]', '生效日期' );


          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");
          }
          else{
            if (confirm("確定是否要更新此次修改??")) {
               $.ajax({
                 url: 'manager_ajax.php',
                 type: 'POST',
                 data: {
                  type: 'int_up_eq',
                  Tb_index:$('.new_interest_div [name="interest_content_id"]').val(),
                  eq_id: $('.new_interest_div [name="interest_id"]').val(),
                  card_id: $('#Tb_index').val(),
                  bank_id: $('#cc_bi_pk').val(),
                  content:$('.new_interest_div [name="content"]').val(),
                  sm_content:$('.new_interest_div [name="sm_content"]').val(),
                  note:$('.new_interest_div [name="note"]').val(),
                  number_data:$('.new_interest_div [name="number_data"]').val(),
                  StartDate:$('.new_interest_div [name="StartDate"]').val(),
                  EndDate:$('.new_interest_div [name="EndDate"]').val()
                },
                success:function (data) {
                  $('.new_interest_div [name="interest_content_id"]').val(data);
                  //-- 顯示勾勾 --
                  $('#eq_list a[card_eq_id="'+$('.new_interest_div [name="interest_id"]').val()+'"] i').addClass('active');
                  console.log('更新完成');
                }
               });
            }
           }
    });


    //------------------------------ 新增、更新權益項目(排程) -------------------------------------
    $('#submit_card_eq_schedule').click(function(event) {
          var err_txt='';
          err_txt = err_txt + check_input( '.schedule_div [name="content"]', '內容說明，' );
          //err_txt = err_txt + check_input( '.schedule_div [name="sm_content"]', '簡易內容說明，' );
          err_txt = err_txt + check_input( '.schedule_div [name="number_data"]', '量化資料，' );
          err_txt = err_txt + check_input( '.schedule_div [name="StartDate"]', '生效日期' );


          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");
          }
          else{
            if (confirm("確定是否要更新此次修改??")) {
               $.ajax({
                 url: 'manager_ajax.php',
                 type: 'POST',
                 data: {
                  type: 'int_up_eq_schedule',
                  Tb_index:$('.schedule_div [name="interest_content_id"]').val(),
                  eq_id: $('.schedule_div [name="interest_id"]').val(),
                  card_id: $('#Tb_index').val(),
                  bank_id: $('#cc_bi_pk').val(),
                  content:$('.schedule_div [name="content"]').val(),
                  sm_content:$('.schedule_div [name="sm_content"]').val(),
                  note:$('.schedule_div [name="note"]').val(),
                  number_data:$('.schedule_div [name="number_data"]').val(),
                  StartDate:$('.schedule_div [name="StartDate"]').val(),
                  EndDate:$('.schedule_div [name="EndDate"]').val()
                },
                success:function (data) {
                  //-- 撈取信用卡權益 --
                  ch_card_eq($('.schedule_div [name="interest_id"]').val());
                  $('.schedule_div [name="interest_content_id"]').val(data);
                  //-- 顯示勾勾 --
                  $('#eq_list a[card_eq_id="'+$('.schedule_div [name="interest_id"]').val()+'"] i').addClass('active');
                  console.log('更新完成');
                }
               });
            }
           }
    });



    
    //-- 改變銀行 --
    $('#select_bank').change(function(event) {

      if ($(this).val()!='') {
         $.ajax({
           url: 'admin_ajax.php',
           type: 'POST',
           dataType: 'json',
           data: {
            type:'show_cc',
            cc_bi_pk: $(this).val(),
            show_stop_cc:'1'
          },
          success:function (data) {
            $("#select_card").html('<option value="">請選擇</option>');
            $("#select_card_level").html('<option value="">請選擇</option>');
            
            //-- 正常使用 --
            $.each(data, function(index, val) {
              if (this['cc_group_state']=='0' || this['cc_group_state']=='3') {
                $("#select_card").append('<option value="'+this['cc_group_id']+'">'+this['cc_cardname']+'</option>');

              }
            });
           
           //-- 停發/停卡 --
            $.each(data, function(index, val){
              if (this['cc_group_state']=='1' || this['cc_group_state']=='2'){
                  $("#select_card").append('<option status="stop" value="'+this['cc_group_id']+'">'+this['cc_cardname']+'('+this['cc_status_name']+')</option>');
              }
            });
          }
         });
      }
      else{
         $("#select_card").html('<option value="">請選擇</option>');
      }
      
    });



    //-- 改變信用卡 --
    $('#select_card').change(function(event) {
      if ($(this).val()!=''){
        $.ajax({
          url: 'admin_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
           type:'show_cc_level',
           cc_group_id:$(this).val(),
           show_stop_cc:'1'
         },
         success:function (data) {
           $("#select_card_level").html('<option value="">請選擇</option>');
           
           //-- 正常使用 --
           $.each(data, function(index, val) {
             if (this['cc_stop_publish']=='0' && this['cc_stop_card']=='0') {
               $("#select_card_level").append('<option value="'+this['Tb_index']+'">'+this['level_name']+'</option>');

             }
           });
           
           //-- 停發/停卡 --
           $.each(data, function(index, val){
             if (this['cc_stop_publish']=='1' || this['cc_stop_card']=='1'){
                  $("#select_card_level").append('<option status="stop" value="'+this['Tb_index']+'">'+this['level_name']+'('+this['cc_status_name']+')</option>');
             }
           });
         }
        });
      }
      else{
        $("#select_card_level").html('<option value="">請選擇</option>');
      }
    });


    //-- 改變信用卡等 --
    $("#select_card_level").change(function(event) {
      location.href='manager.php?MT_id=site2019031616304770&Tb_index='+$(this).val();
    });




      });

//-- 撈取信用卡權益 --
function ch_card_eq(eq_id) {
  
  $.ajax({
    url: 'manager_ajax.php',
    type: 'POST',
    dataType: 'json',
    data: {
     type: 'ch_eq_content',
     eq_id: eq_id,
     card_id: $('#Tb_index').val()
   },
   success:function (data) {
     console.log(data);
     $('.new_interest_div input:not([name="interest_id"])').val('');
     $('.new_interest_div textarea').val('');

     if (data[0]!=undefined) {
       $('.new_interest_div [name="content"]').val(data[0]['content']);
       $('.new_interest_div [name="sm_content"]').val(data[0]['sm_content']);
       $('.new_interest_div [name="note"]').val(data[0]['note']);
       $('.new_interest_div [name="number_data"]').val(data[0]['number_data']);
       $('.new_interest_div [name="StartDate"]').val(data[0]['StartDate']);
       $('.new_interest_div [name="EndDate"]').val(data[0]['EndDate']);
       $('.new_interest_div [name="interest_content_id"]').val(data[0]['Tb_index']);

     }

     if(data[1]!=undefined ){

       $('.schedule_div').css('display', 'block');
       $('.new_schedule').css('display', 'none');
       
       $('.schedule_div [name="content"]').val(data[1]['content']);
       $('.schedule_div [name="sm_content"]').val(data[1]['sm_content']);
       $('.schedule_div [name="note"]').val(data[1]['note']);
       $('.schedule_div [name="number_data"]').val(data[1]['number_data']);
       $('.schedule_div [name="StartDate"]').val(data[1]['StartDate']);
       $('.schedule_div [name="EndDate"]').val(data[1]['EndDate']);
       $('.schedule_div [name="interest_content_id"]').val(data[1]['Tb_index']);
     }

   }
  });
}
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

