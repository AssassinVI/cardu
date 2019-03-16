<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.card_level{ padding: 5px; border-bottom: 1px solid #ccc; }
	.card_level div{ display: none; }
	.cc_apply_url{display: none;}
	.cc_apply_file{ display: none; }

	/*-- fancybox inline --*/
	.tool_alert{ display: none; width: 300px;}
	.tool_alert .a_div{ display: flex; justify-content: space-around;  margin-top: 4vh;}
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
   $row_bank=$NewPdo->select("SELECT Tb_index, bi_shortname, bi_code FROM bank_info ORDER BY OrderBy ASC");

   //-- 信用卡屬性 --
   $attr=$NewPdo->select("SELECT Tb_index, attr_name FROM card_attr WHERE mt_id='site2018110516373341' ORDER BY OrderBy ASC");

   //-- 卡組織 --
   $org=$NewPdo->select("SELECT Tb_index, org_nickname, org_image FROM card_org WHERE mt_id='site2018110611172385' ORDER BY OrderBy ASC");

   //-- 卡等 --
   $level_name=[];
   $level=$NewPdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
   foreach ($level as $level_one) {
   	$level_name[$level_one['Tb_index']]=$level_one['attr_name'];
   }


   //-- 讀取信用卡組資料 --
   $row_card=$NewPdo->select("SELECT * FROM credit_card WHERE cc_group_id=:cc_group_id ", ['cc_group_id'=>$_GET['cc_group_id']], 'one');
   $cc_attr=explode(',', $row_card['cc_attr']);

   $cc_doc_url_check=empty($row_card['cc_doc_url']) ? '':'selected';
   $cc_doc_path_check=empty($row_card['cc_doc_path']) ? '':'selected';

   $cc_doc_url_display=!empty($row_card['cc_doc_url']) ? 'style="display: block"':'';
   $cc_doc_path_display=!empty($row_card['cc_doc_path']) ? 'style="display: block"':'';


}
?>


<div class="wrapper wrapper-content animated fadeInRight" >
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>信用卡資料編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						
						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_cardname"><span class="text-danger">*</span> 信用卡名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_cardname" name="cc_cardname" value="<?php echo $row_card['cc_cardname'];?>">
							</div>
						</div>

						<div class="form-group">
						  <label class="col-md-2 control-label" ><span class="text-danger">*</span> 發卡單位</label>
						  <div class="col-md-10 form-inline">
						    <select class="form-control" name="cc_bi_pk" disabled>
						      <option value="">請選擇銀行</option>
						      <?php
						           foreach ($row_bank as $row_bank_one) {

						           	if ($row_card['cc_bi_pk']==$row_bank_one['Tb_index']) {
						           		echo '<option selected value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].'] '.$row_bank_one['bi_shortname'].'</option>';
						           	}
						           	else{
						           		echo '<option value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].'] '.$row_bank_one['bi_shortname'].'</option>';
						           	}
						           }
						      ?>
						    </select>
						    <input type="hidden" name="cc_bi_pk" value="<?php echo $row_card['cc_bi_pk'];?>">
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-md-2 control-label" ><span class="text-danger">*</span> 信用卡狀態</label>
						  <div class="col-md-10">
						  	<label><input type="radio" name="cc_group_state" value="0"> 正常使用</label>｜
						  	<label><input type="radio" name="cc_group_state" value="1"> 全部停發</label>｜
						  	<label><input type="radio" name="cc_group_state" value="2"> 全部停卡</label>｜
						  	<label><input type="radio" name="cc_group_state" value="3"> 部分使用</label>
						  	<br>

						  	<span class="text-danger">請先選擇一種狀態，方可新增或停卡、停發卡等</span>
						  </div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" ><span class="text-danger">*</span> 信用卡屬性</label>
							<div class="col-md-10">
								<?php
								     foreach ($attr as $attr_one) {

								       if (in_array($attr_one['Tb_index'], $cc_attr)) {
								       	 echo '<label><input type="checkbox" checked name="cc_attr[]" value="'.$attr_one['Tb_index'].'"> '.$attr_one['attr_name'].'</label>｜';
								       }
								       else{
								       	 echo '<label><input type="checkbox" name="cc_attr[]" value="'.$attr_one['Tb_index'].'"> '.$attr_one['attr_name'].'</label>｜';
								       }
								      
								     }
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="note"><span class="text-danger">*</span> 發卡組織/卡等</label>
							<div class="col-md-10">
								<?php

								     //-- 撈取組織 --
								     foreach ($org as $org_one) {
                                       
                                       //-- 撈取勾選組織的卡等 --
								       $cc_cardlevel=[];
								       //- 卡片狀態 -
								       $cc_status_name=[];
                                       $row_orglevel=$NewPdo->select("SELECT cc_cardorg, cc_cardlevel, cc_status_name FROM credit_card WHERE cc_group_id=:cc_group_id AND cc_cardorg=:cc_cardorg", ['cc_group_id'=>$row_card['cc_group_id'], 'cc_cardorg'=>$org_one['Tb_index']]);
                                       $row_orglevel_num=count($row_orglevel);

                                       foreach ($row_orglevel as $row_orglevel_one) {
                                       	$cc_cardorg=$row_orglevel_one['cc_cardorg'];
                                       	array_push($cc_cardlevel, $row_orglevel_one['cc_cardlevel']);
                                       	array_push($cc_status_name, $row_orglevel_one['cc_status_name']);
                                       }
                                       //-- 撈取勾選組織的卡等 END --


								       echo '<div class="card_level">';

								       if ($cc_cardorg==$org_one['Tb_index']) {
								       	echo '<label><input type="checkbox" checked disabled name="cc_cardorg[]" > '.$org_one['org_nickname'].'</label>';
								       	echo '<div style="display: block;">';
								       }else{
								       	echo '<label><input type="checkbox" disabled name="cc_cardorg[]" > '.$org_one['org_nickname'].'</label>';
								       	echo '<div>';
								       }
								       
                                       

                                       //-- 撈取卡等 --
                                       $card_level=$NewPdo->select("SELECT level_id FROM org_level WHERE org_id=:org_id", ['org_id'=>$org_one['Tb_index']]);
                                       $x=0;
                                       foreach ($card_level as $card_level_one) {

                                       	if ($cc_cardorg==$org_one['Tb_index'] && in_array($card_level_one['level_id'], $cc_cardlevel)) {
                                          
                                          //-- 停發/停卡字 --
                                          $cc_status=empty($cc_status_name[$x]) ? '':'('.$cc_status_name[$x].')';
                                          $cc_status_color=empty($cc_status_name[$x]) ? '':'text-danger';

                                       	  echo '<label class="'.$cc_status_color.'"><input type="checkbox" checked disabled name="cc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> <span class="cc_name">'.$level_name[$card_level_one['level_id']].'</span><span class="cc_status">'.$cc_status.'<span></label>｜';
                                       	  $x++;
                                       	}
                                       	else{
                                       	  echo '<label><input type="checkbox" disabled name="cc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> <span>'.$level_name[$card_level_one['level_id']].'</span></label>｜';
                                       	}
                                       }

								      echo '</div>';
								      echo '</div>';
								     }
								?>
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" >發行日期</label>
							<div class="col-md-10 form-inline">
								<input type="date" class="form-control" id="cc_publish" name="cc_publish" value="<?php echo $row_card['cc_publish'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" > 信用卡申請書提供方式</label>
							<div class="col-md-10 form-inline">
								<select class="form-control choose_apply">
									<option value="">請選擇</option>
									<option <?php echo $cc_doc_url_check;?> value="1">連結網址</option>
									<option <?php echo $cc_doc_path_check;?> value="2">檔案上傳</option>
								</select>
							</div>
						</div>

						<div <?php echo $cc_doc_url_display;?> class="form-group cc_apply_url">
							<label class="col-md-2 control-label" for="cc_doc_url">信用卡申請書外部網址</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_doc_url" name="cc_doc_url" value="<?php echo $row_card['cc_doc_url'];?>">
							</div>
						</div>
                        
                        <div <?php echo $cc_doc_path_display;?> class="cc_apply_file">
                          <div class="form-group">
							<label class="col-md-2 control-label" for="cc_doc_name">信用卡申請書名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_doc_name" name="cc_doc_name" value="<?php echo $row_card['cc_doc_name'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_doc_path"> 信用卡申請書檔案</label>
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
                        </div>
                        

						<input type="hidden" id="cc_group_id" name="cc_group_id" value="<?php echo $_GET['cc_group_id'];?>">
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
	</div>


<!-- Fancybox_div -->
<div id="cc_status" class="tool_alert">
  <h4 class="text-center">請選擇要部份使用的處理方式</h4>
  <div class="a_div">
  	<a class="btn btn-default" href="javascript:;" status="0">正常使用</a>
  	<a class="btn btn-default" href="javascript:;" status="1">停發</a>
  	<a class="btn btn-default" href="javascript:;" status="2">停卡</a>
  </div>
  
  <!-- 要修改的卡等ID -->
  <input type="hidden" name="ch_orglevel">
</div>
<!-- Fancybox_div END -->



</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

		//-- 選擇申請書提供方式 --
		$('.choose_apply').change(function(event) {
			$('.cc_apply_url').css('display', 'none');
			$('.cc_apply_file').css('display', 'none');
			$('#cc_doc_url').val('');
			$('#cc_doc_name').val('');
			$('#cc_doc_path').val('');
			$('#img_box').html('');
		   //-- 網址 --
		   if ($(this).val()==1) {
             $('.cc_apply_url').css('display', 'block');
		   }
		   //-- 檔案 --
		   else if ($(this).val()==2){
              $('.cc_apply_file').css('display', 'block');
		   }
		});
    


          //-- 展開卡等 --
          $('.card_level [name="cc_cardorg[]"]').change(function(event) {
          	if ($(this).prop('checked')==true) {
          	  $(this).parent().next().css('display', 'block');
          	}
          	else{
          	  $(this).parent().next().css('display', 'none');
          	  $(this).parent().next().find('[name="cc_cardlevel[]"]').prop('checked', false);
          	}
          });



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



    //---------------------- 切換狀態 ---------------------
    $('[name="cc_group_state"]').click(function(event) {
    	
    	//-- 正常使用 --
        if ($(this).val()=='0') {
        	alert("請選擇要正常使用的發卡組織");
        	$('[name="cc_cardorg[]"]').prop('disabled', false);
        	$('[name="cc_cardorg[]"]:checked').prop('disabled', true);
        	$('[name="cc_card_orglevel[]"]').prop('disabled', false);
        	$('[name="cc_card_orglevel[]"]:checked').prop('disabled', true);
        }
        //-- 部分使用 --
        else if($(this).val()=='3'){
           $('[name="cc_card_orglevel[]"]:checked').prop('disabled', false);
           
        }
        //-- 停發/停卡 --
        else{
        	$('[name="cc_cardorg[]"]').prop('disabled', true);
        	$('[name="cc_card_orglevel[]"]').prop('disabled', true);
        }
    });



    //------------------- 部分使用功能 -----------------------

    $('[name="cc_card_orglevel[]"]:checked').click(function(event) {
    	event.preventDefault();
        
        $('[name="ch_orglevel"]').val($(this).val());

    	$.fancybox.open({
    		src  : '#cc_status',
    		type : 'inline'
    	});
    });

    $('#cc_status .a_div a').click(function(event) {
        var _this=$(this);
    	$.ajax({
    		url: 'admin_ajax.php',
    		type: 'POST',
    		data: {
    			type:'ch_status',
    			orglevel:$('[name="ch_orglevel"]').val(),
    			cc_status:$(this).attr('status'),
    			cc_group_id:$('#cc_group_id').val()
    		},
    		success:function (data) {
               
               var obj=$('[name="cc_card_orglevel[]"][value="'+$('[name="ch_orglevel"]').val()+'"]');
               
               //-- 正常使用 --
    		   if (_this.attr('status')=='0') {
    		   	 obj.parent().removeClass('text-danger');
    		   	 var cc_name=obj.parent().find('span').html();
    		   	 obj.parent().find('.cc_name').html(cc_name);
    		   	 obj.parent().find('.cc_status').html('');

    		   }
    		   // --停發--
    		   else if(_this.attr('status')=='1'){
    		   	 obj.parent().addClass('text-danger');
                 var cc_name=obj.parent().find('span').html();
                 obj.parent().find('.cc_name').html(cc_name);
                 obj.parent().find('.cc_status').html('(停發)');
    		   }
    		   // --停卡--
    		   else if(_this.attr('status')=='2'){
                 obj.parent().addClass('text-danger');
                 var cc_name=obj.parent().find('span').html();
    		   	 obj.parent().find('.cc_name').html(cc_name);
                 obj.parent().find('.cc_status').html('(停卡)');
    		   }
    		}
    	});

    	$.fancybox.close();
    	
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

      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

