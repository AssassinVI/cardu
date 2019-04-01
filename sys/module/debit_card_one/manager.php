<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">

  .fancybox-slide--iframe .fancybox-content {
    width  : 1000px;
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
    	if (!empty($_POST['dc_doc_path'])) {
    		$param=['dc_doc_path'=>''];
            $where=['dc_group_id'=>$_POST['dc_group_id']];
            pdo_update('debit_card', $param, $where);
            unlink('../../img/'.$_POST['dc_doc_path']);
    	}
       exit();
  	}


  	//------------------------------ 新增 ----------------------------

	if (empty($_POST['Tb_index'])) {
	// 	$Tb_index='ccard'.date('YmdHis').rand(0,99);
     
 //     //===================== 代表圖 ========================
 //      if (!empty($_FILES['dc_doc_path']['name'])){

 //      	 $type=explode('.', $_FILES['dc_doc_path']['name']);
 //      	 $dc_doc_path=$Tb_index.'.'.$type[count($type)-1];
 //         fire_upload('dc_doc_path', $dc_doc_path); 
 //      }
 //      else{
 //      	$dc_doc_path='';
 //      }

 //    $cc_attr=implode(',', $_POST['cc_attr']);
 //    $dc_publish=empty($_POST['dc_publish']) ? date('Y-m-d'): $_POST['dc_publish'];

 //    $cc_card_orglevel_num=count($_POST['cc_card_orglevel']);
 //    for ($i=0; $i <$cc_card_orglevel_num ; $i++) { 
    	
 //    	$cc_card_orglevel_one=explode(',', $_POST['cc_card_orglevel'][$i]);

 //       	$param=  ['Tb_index'=>$Tb_index.$i,
 //       		   'dc_cardname'=>$_POST['dc_cardname'],
 //       			  'dc_bi_pk'=>$_POST['dc_bi_pk'],
 //       			   'cc_attr'=>$cc_attr,
 //       			'dc_debitorg'=>$cc_card_orglevel_one[0],
 //       		  'dc_debitlevel'=>$cc_card_orglevel_one[1],
 //                   'cc_doc_url'=>$_POST['cc_doc_url'],
 //                  'cc_doc_name'=>$_POST['cc_doc_name'],
 //       		   'dc_doc_path'=>$dc_doc_path,
 //       			'dc_publish'=>$dc_publish
 //       			 ];
 //       	pdo_insert('debit_card', $param);
 //    }
    
	// //-- 跳至修改單卡權益 --
	// location_up('admin.php?MT_id='.$_POST['mt_id'].'&bank_id='.$_POST['dc_bi_pk'].'&Tb_index='.$Tb_index.'0','成功新增');
   }

   //修改
   else{  

    
   	$Tb_index=$_POST['Tb_index'];




   	 //===================== 金融卡圖片 ========================
      if (!empty($_FILES['dc_photo']['name'])) {

      	 $type=explode('.', $_FILES['dc_photo']['name']);
      	 $dc_photo=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('dc_photo', $dc_photo);
        $dc_photo_param=['dc_photo'=>$dc_photo];
        $dc_photo_where=['Tb_index'=>$Tb_index];
        pdo_update('debit_card', $dc_photo_param, $dc_photo_where);

      }



       $dc_publish=empty($_POST['dc_publish']) ? date('Y-m-d'): $_POST['dc_publish'];
       $dc_fun_id=empty($_POST['dc_fun_id']) ? '' : implode(',', $_POST['dc_fun_id']);
       $dc_pref_id=empty($_POST['dc_pref_id']) ? '' : implode(',', $_POST['dc_pref_id']);

      $param=  [
               'dc_interest_desc'=>$_POST['dc_interest_desc'],
                      'dc_fun_id'=>$dc_fun_id,
                     'dc_pref_id'=>$dc_pref_id
         			 ];


            //-- 判斷金融卡狀態 --
     switch ($_POST['dc_status']) {
      //- 正常使用 -
      case 0:
        $param['dc_status']=0;
        $param['dc_stop_publish']=0;
        $param['dc_stop_card']=0;
        break;
      //- 全部停發 -
        case 1:
        $param['dc_status']=1;
        $param['dc_stop_publish']=1;
        $param['dc_stop_card']=0;
        break;
      //- 全部停卡 -
        case 2:
        $param['dc_status']=2;
        $param['dc_stop_publish']=0;
        $param['dc_stop_card']=1;
        break;
      default:
    # code...
        break;
     }
    
    
    $where= ['Tb_index'=>$Tb_index] ;
	  pdo_update('debit_card', $param, $where);
	
	  location_up('manager.php?MT_id='.$_POST['mt_id'].'&Tb_index='.$Tb_index,'成功更新');
   }
}



if ($_GET) {
 	//-- 銀行 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");

   
   //-- 卡組織 --
   $org_name=[];
   $org=$NewPdo->select("SELECT Tb_index, org_nickname, org_image FROM card_org WHERE mt_id='site2018120315164066' ORDER BY OrderBy ASC");
   foreach ($org as $org_one) {
    $org_name[$org_one['Tb_index']]=$org_one['org_nickname'];
   }

   //-- 卡等 --
   $level_name=[];
   $level=$NewPdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
   foreach ($level as $level_one) {
   	$level_name[$level_one['Tb_index']]=$level_one['attr_name'];
   }

   //-- 金融卡功能 --
   $card_func=$NewPdo->select("SELECT Tb_index, fun_name, card_image FROM card_func WHERE mt_id='site2019021312385319' ORDER BY OrderBy ASC");


   //-- 金融卡優惠 --
   $card_pref=$NewPdo->select("SELECT Tb_index, pref_name, pref_image FROM card_pref WHERE mt_id='site201902131239305' ORDER BY OrderBy ASC");


  //-- 金融卡權益 --
  $card_eq_item=$NewPdo->select("SELECT Tb_index, eq_name FROM card_eq_item WHERE mt_id='site2019021312591095' ORDER BY OrderBy ASC");


   //--------------------------------------------- 讀取金融卡資料 ---------------------------------------------------

   $row_card=$NewPdo->select("SELECT * FROM debit_card WHERE Tb_index=:Tb_index ", ['Tb_index'=>$_GET['Tb_index']], 'one');

   //-- 金融卡狀態名 --
   $dc_status_name=['','(停發)','(停卡)'];

   //-- 金融卡狀態 --
   $dc_status0=empty($row_card['dc_status']) || $row_card['dc_status']==0 ? 'checked':'';
   $dc_status1=$row_card['dc_status']==1 ? 'checked':'';
   $dc_status2=$row_card['dc_status']==2 ? 'checked':'';

   //-- 金融卡功能 --
   $dc_fun_id=explode(',', $row_card['dc_fun_id']);

   //-- 金融卡優惠 --
   $dc_pref_id=explode(',', $row_card['dc_pref_id']);

   //-- 金融卡群 --
   $row_dc_group=$NewPdo->select("SELECT dc_group_id ,dc_cardname, dc_group_state FROM debit_card WHERE (dc_group_state=0 OR dc_group_state=3) AND dc_bi_pk=:dc_bi_pk GROUP BY dc_group_id 
                                  UNION 
                                  SELECT dc_group_id ,dc_cardname, dc_group_state FROM debit_card WHERE (dc_group_state=1 OR dc_group_state=2) AND dc_bi_pk=:dc_bi_pk GROUP BY dc_group_id", 
                                 ['dc_bi_pk'=>$row_card['dc_bi_pk']]);


   //-- 卡等 --
   $row_dc_level=$NewPdo->select("SELECT Tb_index, dc_debitorg, dc_debitlevel, dc_status FROM debit_card WHERE dc_group_id=:dc_group_id ", ['dc_group_id'=>$row_card['dc_group_id']]);


   //-- 金融卡權益項目 --
   $eq_con_arr=[];
   $row_eq_con=$NewPdo->select("SELECT eq_id FROM debit_card_eq WHERE card_id=:card_id", ['card_id'=>$_GET['Tb_index']]);
   $eq_con_num=count($row_eq_con);
   for ($i=0; $i <$eq_con_num ; $i++) { 
     $eq_con_arr[$i]=$row_eq_con[$i]['eq_id'];
   }

   //--------------------------------------------- 讀取金融卡資料 END ---------------------------------------------------
}
?>


<div class="wrapper wrapper-content animated fadeInRight" >
  <form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>
            <span style="float: left;">修改單卡權益</span>

           <!-- 金融卡選擇 -->
						<div class="text-center">
							<select id="select_bank" class="bank">
								<?php
                                 foreach ($row_bank as $row_bank_one) {
                                 	if ($row_card['dc_bi_pk']==$row_bank_one['Tb_index']) {
                                 	  echo '<option selected value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 	}
                                 	else{
                                 	  echo '<option value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 	}
                                 }
                ?>
							</select>

							<select id="select_card" class="dc_group">
								<?php
                                 foreach ($row_dc_group as $row_dc_group_one) {

                                  //-- 停發/停卡 --
                                  $stop_dc=$row_dc_group_one['dc_group_state']==0 || $row_dc_group_one['dc_group_state']==3 ? '':$dc_status_name[$row_dc_group_one['dc_group_state']];
                                  
                                 	if ($row_card['dc_group_id']==$row_dc_group_one['dc_group_id']) {
                                 	  echo '<option selected value="'.$row_dc_group_one['dc_group_id'].'">'.$row_dc_group_one['dc_cardname'].$stop_dc.'</option>';
                                 	}
                                 	else{
                                 	  echo '<option value="'.$row_dc_group_one['dc_group_id'].'">'.$row_dc_group_one['dc_cardname'].$stop_dc.'</option>';
                                 	}
                                 }
                     		  	?>
							</select>

							<select id="select_card_level" class="ccard">
								
								<?php 
                                  foreach ($row_dc_level as $row_dc_level_one) {

                                   $level_id=$row_dc_level_one['dc_debitlevel'];
                                   $org_id=$row_dc_level_one['dc_debitorg'];

                                   if ($row_card['Tb_index']==$row_dc_level_one['Tb_index']){
                                     echo '<option selected value="'.$row_dc_level_one['Tb_index'].'">'.$org_name[$org_id].$level_name[$level_id].$dc_status_name[$row_dc_level_one['dc_status']].'</option>';
                                   }
                                   else{
                                   	 echo '<option value="'.$row_dc_level_one['Tb_index'].'">'.$org_name[$org_id].$level_name[$level_id].$dc_status_name[$row_dc_level_one['dc_status']].'</option>';
                                   }
                                  }
								 ?>
							</select>
						</div>
            <!-- 金融卡選擇 END -->

                        
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					
						
						<div class="form-group">
							<label class="col-md-2 control-label" ><span class="text-danger">*</span> 金融卡狀態</label>
							<div class="col-md-10">
								<label><input name="dc_status" type="radio" <?php echo $dc_status0; ?> value="0">正常使用</label>｜
                <label><input name="dc_status" type="radio" <?php echo $dc_status1; ?> value="1">停發</label>｜
                <label><input name="dc_status" type="radio" <?php echo $dc_status2; ?> value="2">停卡</label>
							</div>
						</div>

						<div class="form-group">
              <label class="col-md-2 control-label" for="dc_photo"> 金融卡圖檔</label>
              <div class="col-md-4">
                <input type="file" name="dc_photo" class="form-control" id="dc_photo" onchange="file_viewer_load_new(this, '#img_box')">
                <span class="text-danger">圖片尺寸: 300*190 去背png檔</span>
              </div>
              
            </div>

            <div class="form-group">
               <label class="col-md-2 control-label" ></label>
               <div id="img_box" class="col-md-4">
                
              </div>
            <?php if(!empty($row_card['dc_photo'])){?>
              <div  class="col-md-4">
                 <div id="img_div" >
                  <p>目前檔案</p>
                 <button type="button" id="one_del_img"> X </button>
                  <span class="img_check"><i class="fa fa-check"></i></span>
                  <img style="width: 120px" src="../../img/<?php echo $row_card['dc_photo'];?>">
                  <input type="hidden" name="old_file" value="<?php echo $row_card['dc_photo'];?>">
                </div>
              </div>
            <?php }?>   
            </div>

						<div class="form-group">
						  <label class="col-md-2 control-label" >金融卡特色</label>
						  <div class="col-md-10">
						  	<textarea class="form-control" name="dc_interest_desc" style="height: 100px;"><?php echo $row_card['dc_interest_desc'];?></textarea>
                <span class="text-danger">描述該單卡的特色及優惠，每1行為1個特色的描述，每行建議不超過18字</span>
						  </div>
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" >金融卡功能</label>
							<div class="col-md-10">
								<?php
								     foreach ($card_func as $card_func_one) {
                      
                      if (in_array($card_func_one['Tb_index'], $dc_fun_id)) {
                        echo '<label title="'.$card_func_one['fun_name'].'" class="card_func"><img src="../../img/'.$card_func_one['card_image'].'"><input checked type="checkbox" name="dc_fun_id[]" value="'.$card_func_one['Tb_index'].'"> </label>';
                      }
                      else{

								       echo '<label title="'.$card_func_one['fun_name'].'" class="card_func"><img src="../../img/'.$card_func_one['card_image'].'"><input type="checkbox" name="dc_fun_id[]" value="'.$card_func_one['Tb_index'].'"> </label>';
                      }
								     }
								?>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="note">金融卡優惠</label>
							<div class="col-md-10">
								<?php 
                  foreach ($card_pref as $card_pref_one) {
                    
                    if (in_array($card_pref_one['Tb_index'], $dc_pref_id)) {
                      echo '<label title="'.$card_pref_one['pref_name'].'" class="card_pref"><img src="../../img/'.$card_pref_one['pref_image'].'"><input checked type="checkbox" name="dc_pref_id[]" value="'.$card_pref_one['Tb_index'].'"> </label>';
                    }
                    else{
                      echo '<label title="'.$card_pref_one['pref_name'].'" class="card_pref"><img src="../../img/'.$card_pref_one['pref_image'].'"><input type="checkbox" name="dc_pref_id[]" value="'.$card_pref_one['Tb_index'].'"> </label>';
                    }
                    
                  }
                ?>
								
							</div>
						</div>



            <input type="hidden" id="dc_bi_pk" name="dc_bi_pk" value="<?php echo $row_card['dc_bi_pk'];?>">
						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>


		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						
						<div class="col-lg-4">
						<?php if(empty($_GET['dc_group_id'])){?>
							<button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">儲存</button>
						<?php }else{?>
						    <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">更新</button>
						<?php }?>
						</div>
            <div class="col-lg-4">
              <button type="button" class="btn btn-danger btn-block btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="clean_all()">放棄</button>
            </div>
            <div class="col-lg-4">
              <button type="button" class="btn btn-default btn-block btn-flat" onclick="window.open('../debit_card_one_public/interestsView_windows.php?card_id=<?php echo $row_card['Tb_index'];?>', '預覽權益內容', config='height=500,width=1000');">預覽權益內容</button>
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

               if (in_array($card_eq_item_one['Tb_index'], $eq_con_arr)) {
                 echo '<div class="col-md-2"> <a href="javascript:;" card_eq_id="'.$card_eq_item_one['Tb_index'].'">'.$card_eq_item_one['eq_name'].' <i class="text-danger fa fa-check active"></i></a> </div>';
               }
               else{
                 echo '<div class="col-md-2"> <a href="javascript:;" card_eq_id="'.$card_eq_item_one['Tb_index'].'">'.$card_eq_item_one['eq_name'].' <i class="text-danger fa fa-check"></i></a> </div>';
               }
               
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
                                <a href="" data-fancybox data-type="iframe" class="btn btn-default btn-xs ch_example">引用群組</a>
                                <button class="btn btn-default btn-xs del_example" type="button">脫離群組</button>
                              </div>
                           </div>
                           <div class="panel-body">

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="../debit_card_one_public/interests_ex_det_windows.php" data-fancybox data-type="iframe" td_name="content" class="btn Template">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" > 簡易內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="sm_content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="" data-fancybox data-type="iframe" td_name="sm_content" class="btn Template">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" >附註資料 <br> <span class="text-danger">(不公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="note"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="" data-fancybox data-type="iframe" td_name="note" class="btn Template">參考範本</a>
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
                                            <a href="" data-fancybox data-type="iframe" td_name="number_data" class="btn Template">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 生效日期</label>
                                          <div class="col-md-8">
                                            <input type="date" name="StartDate" class="form-control" value="">
                                            <span class="text-danger">空值視為今天</span>
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
                                        
                                        <input type="hidden" name="interest_content_group_id" value="">
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
                                <a href="" data-fancybox data-type="iframe" class="btn btn-default btn-xs ch_example">引用群組</a>
                                <button class="btn btn-default btn-xs del_example" type="button">脫離群組</button>
                              </div>
                           </div>
                           <div class="panel-body">

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="" data-fancybox data-type="iframe" td_name="content" class="btn Template">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" > 簡易內容說明 <br> <span class="text-danger">(公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="sm_content"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="" data-fancybox data-type="iframe" td_name="sm_content" class="btn Template">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" >附註資料 <br> <span class="text-danger">(不公開)</span></label>
                                          <div class="col-md-8">
                                            <textarea class="form-control" name="note"></textarea>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="" data-fancybox data-type="iframe" td_name="note" class="btn Template">參考範本</a>
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
                                            <a href="" data-fancybox data-type="iframe" td_name="number_data" class="btn Template">參考範本</a>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" ><span class="text-danger">*</span> 生效日期</label>
                                          <div class="col-md-8">
                                            <input type="date" name="StartDate" class="form-control">
                                            <span class="text-danger">空值視為今天</span>
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
                                        
                                        <input type="hidden" name="interest_content_group_id" value="">
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
          		err_txt = err_txt + check_input( '[name="dc_status"]', '金融卡狀態，' );
          		

          		if (err_txt!='') {
          		 alert("請輸入"+err_txt+"!!");

          		}
          		else{
                
                if (confirm("確定是否要更新此次修改??")) {
                   $('#put_form').submit();
                }
          	     
          	   }
          });








    //------------------------------ 刪金融卡申請書檔案 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除檔案?')) {
			 var data={
			 	        dc_group_id: $('[name="dc_group_id"]').val(),
                            dc_doc_path: $('[name="old_file"]').val(),
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
          var eq_type_arr={'txt':'(一般文字內容)', 'big':'(比大)', 'small':'(比小)'};
          $('#interest_div .panel-heading span').html(data['eq_name']);
          $('#interest_div .eq_type').html(eq_type_arr[data['eq_type']]);
          $('#interest_div .eq_txt').html(data['eq_txt']);
          $('[name="interest_id"]').val(data['Tb_index']);
          //-- 引用群組 --
          $('.new_interest_div .ch_example').attr('href', '../debit_card_one_public/interests_ex_windows.php?bank_id='+$('#dc_bi_pk').val()+'&eq_id='+data['Tb_index']+'&type=interest');
          $('.schedule_div .ch_example').attr('href', '../debit_card_one_public/interests_ex_windows.php?bank_id='+$('#dc_bi_pk').val()+'&eq_id='+data['Tb_index']+'&type=schedule');

          //-- 參考範本 --
          $.each($('.new_interest_div .Template'), function(index, val) {
             $(this).attr('href', '../debit_card_one_public/interests_ex_det_windows.php?bank_id='+$('#dc_bi_pk').val()+'&eq_id='+data['Tb_index']+'&type=interest&td_name='+$(this).attr('td_name'));
          });
          $.each($('.schedule_div .Template'), function(index, val) {
             $(this).attr('href', '../debit_card_one_public/interests_ex_det_windows.php?bank_id='+$('#dc_bi_pk').val()+'&eq_id='+data['Tb_index']+'&type=schedule&td_name='+$(this).attr('td_name'));
          });
        }
       });
       
       //-- 撈取金融卡權益 --
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
          //err_txt = err_txt + check_input( '.new_interest_div [name="StartDate"]', '生效日期' );


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
                  bank_id: $('#dc_bi_pk').val(),
                  interest_content_group_id: $('.new_interest_div [name="interest_content_group_id"]').val(),
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
                  
                  //-- 恢復可輸入狀態 --
                  $('.new_interest_div [name="content"]').prop('readonly', false);
                  $('.new_interest_div [name="sm_content"]').prop('readonly', false);
                  $('.new_interest_div [name="note"]').prop('readonly', false);
                  $('.new_interest_div [name="number_data"]').prop('readonly', false);
                  $('.new_interest_div [name="StartDate"]').prop('readonly', false);
                  $('.new_interest_div [name="EndDate"]').prop('readonly', false);;
                  
                  $('.new_interest_div .Template').css('display', 'inline-block');

                  $('.new_interest_div [name="interest_content_group_id"]').val('');
                   
                  alert('修改完成');
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
                  bank_id: $('#dc_bi_pk').val(),
                  interest_content_group_id: $('.schedule_div [name="interest_content_group_id"]').val(),
                  content:$('.schedule_div [name="content"]').val(),
                  sm_content:$('.schedule_div [name="sm_content"]').val(),
                  note:$('.schedule_div [name="note"]').val(),
                  number_data:$('.schedule_div [name="number_data"]').val(),
                  StartDate:$('.schedule_div [name="StartDate"]').val(),
                  EndDate:$('.schedule_div [name="EndDate"]').val()
                },
                success:function (data) {
                  //-- 撈取金融卡權益 --
                  ch_card_eq($('.schedule_div [name="interest_id"]').val());
                  $('.schedule_div [name="interest_content_id"]').val(data);
                  //-- 顯示勾勾 --
                  $('#eq_list a[card_eq_id="'+$('.schedule_div [name="interest_id"]').val()+'"] i').addClass('active');

                  //-- 恢復可輸入狀態 --
                  $('.schedule_div [name="content"]').prop('readonly', false);
                  $('.schedule_div [name="sm_content"]').prop('readonly', false);
                  $('.schedule_div [name="note"]').prop('readonly', false);
                  $('.schedule_div [name="number_data"]').prop('readonly', false);
                  $('.schedule_div [name="StartDate"]').prop('readonly', false);
                  $('.schedule_div [name="EndDate"]').prop('readonly', false);
                  
                  $('.schedule_div .Template').css('display', 'inline-block');

                  $('.schedule_div [name="interest_content_group_id"]').val('');
                  alert('修改完成');
                }
               });
            }
           }
    });


    //--- 脫離群組 ---
    $('.del_example').click(function(event) {

      //-- 恢復可輸入狀態 --
      $(this).parents('.panel-success').find('[name="content"]').prop('readonly', false);
      $(this).parents('.panel-success').find('[name="sm_content"]').prop('readonly', false);
      $(this).parents('.panel-success').find('[name="note"]').prop('readonly', false);
      $(this).parents('.panel-success').find('[name="number_data"]').prop('readonly', false);
      $(this).parents('.panel-success').find('[name="StartDate"]').prop('readonly', false);
      $(this).parents('.panel-success').find('[name="EndDate"]').prop('readonly', false);
      
      $(this).parents('.panel-success').find('.Template').css('display', 'inline-block');

      $(this).parents('.panel-success').find('[name="content"]').val('');
      $(this).parents('.panel-success').find('[name="sm_content"]').val('');
      $(this).parents('.panel-success').find('[name="note"]').val('');
      $(this).parents('.panel-success').find('[name="number_data"]').val('');
      $(this).parents('.panel-success').find('[name="StartDate"]').val('');
      $(this).parents('.panel-success').find('[name="EndDate"]').val('');

      $(this).parents('.panel-success').find('[name="interest_content_group_id"]').val('');
      
    });


    var dc_status_name=['','停發','停卡'];

    //-- 改變銀行 --
    $('#select_bank').change(function(event) {

      if ($(this).val()!='') {
         $.ajax({
           url: 'admin_ajax.php',
           type: 'POST',
           dataType: 'json',
           data: {
            type:'show_dc',
            dc_bi_pk: $(this).val(),
            show_stop_dc:'1'
          },
          success:function (data) {
            $("#select_card").html('<option value="">請選擇</option>');
            $("#select_card_level").html('<option value="">請選擇</option>');
            
            //-- 正常使用 --
            $.each(data, function(index, val) {
              if (this['dc_group_state']=='0' || this['dc_group_state']=='3') {
                $("#select_card").append('<option value="'+this['dc_group_id']+'">'+this['dc_cardname']+'</option>');

              }
            });
           
           //-- 停發/停卡 --
            $.each(data, function(index, val){
              if (this['dc_group_state']=='1' || this['dc_group_state']=='2'){
                  $("#select_card").append('<option status="stop" value="'+this['dc_group_id']+'">'+this['dc_cardname']+'('+dc_status_name[this['dc_group_state']]+')</option>');
              }
            });
          }
         });
      }
      else{
         $("#select_card").html('<option value="">請選擇</option>');
      }
      
    });



    //-- 改變金融卡 --
    $('#select_card').change(function(event) {
      if ($(this).val()!=''){
        $.ajax({
          url: 'admin_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
           type:'show_dc_level',
           dc_group_id:$(this).val(),
           show_stop_dc:'1'
         },
         success:function (data) {
           $("#select_card_level").html('<option value="">請選擇</option>');
           
           //-- 正常使用 --
           $.each(data, function(index, val) {
             if (this['dc_stop_publish']=='0' && this['dc_stop_card']=='0') {
               $("#select_card_level").append('<option value="'+this['Tb_index']+'">'+this['level_name']+'</option>');

             }
           });
           
           //-- 停發/停卡 --
           $.each(data, function(index, val){
             if (this['dc_stop_publish']=='1' || this['dc_stop_card']=='1'){
                  $("#select_card_level").append('<option status="stop" value="'+this['Tb_index']+'">'+this['level_name']+'('+dc_status_name[this['dc_group_state']]+')</option>');
             }
           });
         }
        });
      }
      else{
        $("#select_card_level").html('<option value="">請選擇</option>');
      }
    });


    //-- 改變金融卡等 --
    $("#select_card_level").change(function(event) {
      location.href='manager.php?MT_id=site2019031616304770&Tb_index='+$(this).val();
    });




      });

//-- 撈取金融卡權益 --
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

