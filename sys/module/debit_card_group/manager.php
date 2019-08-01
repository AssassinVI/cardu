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
    	if (!empty($_POST['dc_doc_path'])) {
    		$param=['dc_doc_path'=>''];
            $where=['dc_group_id'=>$_POST['dc_group_id']];
            pdo_update('debit_card', $param, $where);
            unlink('../../other_file/'.$_POST['dc_doc_path']);
    	}
       exit();
  	}


  	//------------------------------ 新增 ----------------------------

   if (empty($_POST['dc_group_id'])) {

   }

   //修改
   else{  
   	$Tb_index='dcard'.date('YmdHis').rand(0,99);

    
   	//============================ 新增新卡等 ==============================
   	if (!empty($_POST['dc_card_orglevel']) && $_POST['dc_group_state']=='0') {
   		
   
    $dc_publish=empty($_POST['dc_publish']) ? date('Y-m-d'): $_POST['dc_publish'];
    $dc_card_orglevel_num=count($_POST['dc_card_orglevel']);
    $dc_doc_path=empty($_POST['old_file']) ? '': $_POST['old_file'];

    for ($i=0; $i <$dc_card_orglevel_num ; $i++) { 
    	
    	$dc_card_orglevel_one=explode(',', $_POST['dc_card_orglevel'][$i]);

       	$param=  ['Tb_index'=>$Tb_index.$i,
       	       'dc_group_id'=>$_POST['dc_group_id'],
       		   'dc_cardname'=>$_POST['dc_cardname'],
       			  'dc_bi_pk'=>$_POST['dc_bi_pk'],
       			'dc_debitorg'=>$dc_card_orglevel_one[0],
       		  'dc_debitlevel'=>$dc_card_orglevel_one[1],
                   'dc_doc_url'=>$_POST['dc_doc_url'],
                  'dc_doc_name'=>$_POST['dc_doc_name'],
       		   'dc_doc_path'=>$dc_doc_path,
       			'dc_publish'=>$dc_publish
       			 ];
       	pdo_insert('debit_card', $param);
      }
   	}
    //============================ 新增新卡等 END ==============================




   	 //===================== 申請書 ========================
      if (!empty($_FILES['dc_doc_path']['name'])) {

      	 $type=explode('.', $_FILES['dc_doc_path']['name']);
      	 $dc_doc_path=$Tb_index.'.'.$type[count($type)-1];
         other_fire_upload('dc_doc_path', $dc_doc_path);
        $dc_doc_path_param=['dc_doc_path'=>$dc_doc_path];
        $dc_doc_path_where=['dc_group_id'=>$_POST['dc_group_id']];
        pdo_update('debit_card', $dc_doc_path_param, $dc_doc_path_where);

      }



       $dc_publish=empty($_POST['dc_publish']) ? date('Y-m-d'): $_POST['dc_publish'];

      $param=  [
         		   'dc_cardname'=>$_POST['dc_cardname'],
         			  'dc_bi_pk'=>$_POST['dc_bi_pk'],
                     'dc_doc_url'=>$_POST['dc_doc_url'],
                    'dc_doc_name'=>$_POST['dc_doc_name'],
         			'dc_publish'=>$dc_publish
         			 ];


      //-- 無申請書 --
      if (empty($_POST['dc_doc_name'])) {
      	 $param['dc_doc_name']='';
      	 $param['dc_doc_path']='';
      }

      //-- 有選擇金融卡狀態 --
      if (isset($_POST['dc_group_state'])) {
      	$param['dc_group_state']=$_POST['dc_group_state'];
      }


     //-- 判斷金融卡狀態 --
     switch ($_POST['dc_group_state']) {
     	//- 正常使用 -
     	case 0:

     	  $where= ['dc_group_id'=>$_POST['dc_group_id']] ;
     	  pdo_update('debit_card', $param, $where);
     	  location_up('../debit_card_one/manager.php?MT_id=site2019033014263399&Tb_index='.$Tb_index.'0','成功更新');
     	break;
     	//- 全部停發 -
        case 1:
     	  
     	  $param['dc_status']=1;
     	  $param['dc_stop_publish']=1;
     	  $param['dc_stop_card']=0;
     	  $where= ['dc_group_id'=>$_POST['dc_group_id']] ;
     	  pdo_update('debit_card', $param, $where);
     	  location_up('manager.php?MT_id='.$_POST['mt_id'].'&dc_group_id='.$_POST['dc_group_id'],'成功更新');
     	break;
     	//- 全部停卡 -
        case 2:

     	  $param['dc_status']=2;
     	  $param['dc_stop_publish']=0;
     	  $param['dc_stop_card']=1;
     	  $where= ['dc_group_id'=>$_POST['dc_group_id']] ;
     	  pdo_update('debit_card', $param, $where);
     	  location_up('manager.php?MT_id='.$_POST['mt_id'].'&dc_group_id='.$_POST['dc_group_id'],'成功更新');
     	break;
     	//- 部分使用 -
     	case 3:
     		
     	       $x=0;
     	       foreach ($_POST['dc_card_orglevel'] as $card_orglevel) {
     	       	$dc_card_orglevel=explode(',', $card_orglevel);
     	       	$dc_card_org=$dc_card_orglevel[0];
     	       	$dc_card_level=$dc_card_orglevel[1];


     	       	if ($_POST['dc_card_status'][$x]=='0') {
     	       	   $param['dc_status']=0;
     	  	       $param['dc_stop_publish']=0;
     	  	       $param['dc_stop_card']=0;
     	       	}
     	       	elseif($_POST['dc_card_status'][$x]=='1'){
     	            $param['dc_status']=1;
     	  	       $param['dc_stop_publish']=1;
     	  	       $param['dc_stop_card']=0;
     	       	}
     	       	elseif($_POST['dc_card_status'][$x]=='2'){
     	       	   $param['dc_status']=2;
     	  	       $param['dc_stop_publish']=0;
     	  	       $param['dc_stop_card']=1;
     	       	}

     	         //-- where --
     	         $param['dc_group_id']=$_POST['dc_group_id'];
     	         $param['dc_debitorg']=$dc_card_org;
     	         $param['dc_debitlevel']=$dc_card_level;
     	         $NewPdo->select("UPDATE debit_card 
     	         	        SET dc_cardname=:dc_cardname, dc_bi_pk=:dc_bi_pk, 
     	         	            dc_doc_url=:dc_doc_url, dc_doc_name=:dc_doc_name, 
     	         	            dc_publish=:dc_publish, dc_group_state=3,
     	         	            dc_status=:dc_status, dc_stop_publish=:dc_stop_publish,
     	         	            dc_stop_card=:dc_stop_card 
     	         	        WHERE dc_group_id=:dc_group_id AND dc_debitorg=:dc_debitorg AND dc_debitlevel=:dc_debitlevel", $param);
     	         

     	         $x++;
     	       }
     	       location_up('manager.php?MT_id='.$_POST['mt_id'].'&dc_group_id='.$_POST['dc_group_id'],'成功更新');
     	break;
     	default:
		# code...
		    break;
     }
    
   }
}



if ($_GET) {
 	//-- 銀行 --
   $row_bank=$NewPdo->select("SELECT Tb_index, bi_shortname, bi_code FROM bank_info ORDER BY OrderBy ASC");

   //-- 金融卡屬性 --
   $attr=$NewPdo->select("SELECT Tb_index, attr_name FROM card_attr WHERE mt_id='site2018110516373341' ORDER BY OrderBy ASC");

   //-- 卡組織 --
   $org=$NewPdo->select("SELECT Tb_index, org_nickname, org_image FROM card_org WHERE mt_id='site2018120315164066' ORDER BY OrderBy ASC");

   //-- 卡等 --
   $level_name=[];
   $level=$NewPdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
   foreach ($level as $level_one) {
   	$level_name[$level_one['Tb_index']]=$level_one['attr_name'];
   }


   //-- 讀取金融卡組資料 --
   $row_card=$NewPdo->select("SELECT * FROM debit_card WHERE dc_group_id=:dc_group_id ", ['dc_group_id'=>$_GET['dc_group_id']], 'one');
   
   $dc_group_state0=empty($row_card['dc_group_state']) || $row_card['dc_group_state']==0 ? 'checked':'';
   $dc_group_state1=$row_card['dc_group_state']==1 ? 'checked':'';
   $dc_group_state2=$row_card['dc_group_state']==2 ? 'checked':'';

   $dc_doc_url_check=empty($row_card['dc_doc_url']) ? '':'selected';
   $dc_doc_path_check=empty($row_card['dc_doc_path']) ? '':'selected';

   $dc_doc_url_display=!empty($row_card['dc_doc_url']) ? 'style="display: block"':'';
   $dc_doc_path_display=!empty($row_card['dc_doc_path']) ? 'style="display: block"':'';


}
?>


<div class="wrapper wrapper-content animated fadeInRight" >
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>修改金融卡
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						
						<div class="form-group">
							<label class="col-md-2 control-label" for="dc_cardname"><span class="text-danger">*</span> 金融卡名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="dc_cardname" name="dc_cardname" value="<?php echo $row_card['dc_cardname'];?>">
							</div>
						</div>

						<div class="form-group">
						  <label class="col-md-2 control-label" ><span class="text-danger">*</span> 發卡單位</label>
						  <div class="col-md-10 form-inline">
						    <select class="form-control" name="dc_bi_pk" disabled>
						      <option value="">請選擇銀行</option>
						      <?php
						           foreach ($row_bank as $row_bank_one) {

						           	if ($row_card['dc_bi_pk']==$row_bank_one['Tb_index']) {
						           		echo '<option selected value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].'] '.$row_bank_one['bi_shortname'].'</option>';
						           	}
						           	else{
						           		echo '<option value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].'] '.$row_bank_one['bi_shortname'].'</option>';
						           	}
						           }
						      ?>
						    </select>
						    <input type="hidden" name="dc_bi_pk" value="<?php echo $row_card['dc_bi_pk'];?>">
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-md-2 control-label" ><span class="text-danger">*</span> 金融卡狀態</label>
						  <div class="col-md-10">

						  	<label><input type="radio" name="dc_group_state" value="0"> 正常使用</label>｜
						  	<label><input type="radio" name="dc_group_state" value="1"> 全部停發</label>｜
						  	<label><input type="radio" name="dc_group_state" value="2"> 全部停卡</label>｜
						  	<label><input type="radio" name="dc_group_state" value="3"> 部分使用</label>
						  	<br>

						  	<span class="text-danger">請先選擇一種狀態，方可新增或停卡、停發卡等</span>
						  </div>
						</div>


						<div class="form-group">
							<label class="col-md-2 control-label" for="note"><span class="text-danger">*</span> 發卡組織/卡等</label>
							<div class="col-md-10">
							  <table >
								 <tbody id="orglevel_tb">
								<?php


								     //-- 撈取組織 --
								     foreach ($org as $org_one) {
                                       
                                       //-- 撈取勾選組織的卡等 --
								       $dc_debitlevel=[];
								       //- 卡片狀態 -
								       $dc_status=[];
								       $dc_status_name=['', '停發', '停卡'];
								       $dc_stop_publish=[];
								       $dc_stop_card=[];
                                       $row_orglevel=$NewPdo->select("SELECT dc.dc_debitorg, dc.dc_debitlevel, dc.dc_status, dc.dc_stop_publish, dc.dc_stop_card 
                                       	                              FROM debit_card as dc
                                       	                              INNER JOIN card_level as cl ON cl.Tb_index=dc.dc_debitlevel 
                                       	                              WHERE dc.dc_group_id=:dc_group_id AND dc.dc_debitorg=:dc_debitorg
                                       	                              ORDER BY cl.OrderBy", 
                                       	                              ['dc_group_id'=>$row_card['dc_group_id'], 'dc_debitorg'=>$org_one['Tb_index']]);
                                       $row_orglevel_num=count($row_orglevel);

                                       foreach ($row_orglevel as $row_orglevel_one) {
                                       	$dc_debitorg=$row_orglevel_one['dc_debitorg'];
                                       	array_push($dc_debitlevel, $row_orglevel_one['dc_debitlevel']);
                                       	array_push($dc_status, $row_orglevel_one['dc_status']);
                                       	array_push($dc_stop_publish, $row_orglevel_one['dc_stop_publish']);
                                       	array_push($dc_stop_card, $row_orglevel_one['dc_stop_card']);
                                       }
                                       //-- 撈取勾選組織的卡等 END --
                                       
                                       $check_org=$dc_debitorg==$org_one['Tb_index'] ? 'checked':'';

								       echo '<tr class="card_level">';
                                       echo '<td><label><input type="checkbox" '.$check_org.' disabled name="dc_debitorg[]" value="'.$org_one['Tb_index'].'" > '.$org_one['org_nickname'].'</label></td>';
								       

                                       //-- 撈取卡等 --
                                       $card_level=$NewPdo->select("SELECT ol.level_id 
                                       	                            FROM org_level as ol
                                       	                            INNER JOIN card_level as cl ON cl.Tb_index=ol.level_id 
                                       	                            WHERE ol.org_id=:org_id
                                       	                            ORDER BY cl.OrderBy", ['org_id'=>$org_one['Tb_index']]);
                                       $x=0;
                                       foreach ($card_level as $card_level_one) {

                                       	if ($dc_debitorg==$org_one['Tb_index'] && in_array($card_level_one['level_id'], $dc_debitlevel)) {
                                          
                                          //-- 停發/停卡字 --
                                       	  if ($dc_stop_publish[$x]=='1' && $dc_stop_card[$x]=='0') {
                                       	  	$dc_status_num=1;
                                       	  }
                                       	  else if($dc_stop_publish[$x]=='0' && $dc_stop_card[$x]=='1'){
                                            $dc_status_num=2;
                                       	  }
                                       	  else{
                                       	  	$dc_status_num=0;
                                       	  }

                                          $dc_status_txt=empty($dc_status_name[$dc_status[$x]]) ? '':'('.$dc_status_name[$dc_status[$x]].')';
                                          $dc_status_color=empty($dc_status_name[$dc_status[$x]]) ? '':'text-danger';

                                       	  echo '<td>
                                       	         <label class="'.$dc_status_color.'">
                                       	           <input type="checkbox" checked disabled name="dc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> 
                                                   <input type="hidden" name="dc_card_status[]" value="'.$dc_status_num.'">
                                       	           <span class="dc_name">'.$level_name[$card_level_one['level_id']].'</span><span class="dc_status">'.$dc_status_txt.'<span>
                                       	         </label>
                                       	        </td>';
                                       	  $x++;
                                       	}
                                       	else{
                                       	  echo '<td><label><input type="checkbox" disabled name="dc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> <span>'.$level_name[$card_level_one['level_id']].'</span></label></td>';
                                       	}
                                       }

								      echo '</tr>';
								     }
								?>
								</tbody>
							  </table>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" >發行日期</label>
							<div class="col-md-10 form-inline">
								<input type="text" class="form-control datepicker" id="dc_publish" name="dc_publish" value="<?php echo $row_card['dc_publish'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" > 金融卡申請書提供方式</label>
							<div class="col-md-10 form-inline">
								<select class="form-control choose_apply">
									<option value="">請選擇</option>
									<option <?php echo $dc_doc_url_check;?> value="1">連結網址</option>
									<option <?php echo $dc_doc_path_check;?> value="2">檔案上傳</option>
								</select>
							</div>
						</div>

						<div <?php echo $dc_doc_url_display;?> class="form-group cc_apply_url">
							<label class="col-md-2 control-label" for="dc_doc_url">金融卡申請書外部網址</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="dc_doc_url" name="dc_doc_url" value="<?php echo $row_card['dc_doc_url'];?>">
							</div>
						</div>
                        
                        <div <?php echo $dc_doc_path_display;?> class="cc_apply_file">
                          <div class="form-group">
							<label class="col-md-2 control-label" for="dc_doc_name">金融卡申請書名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="dc_doc_name" name="dc_doc_name" value="<?php echo $row_card['dc_doc_name'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="dc_doc_path"> 金融卡申請書檔案</label>
							<div class="col-md-4">
								<input type="file" name="dc_doc_path" class="form-control" id="dc_doc_path" onchange="file_viewer_load_new(this, '#img_box')">
								<span class="text-danger">檔名規則：西元年月日-銀行-卡名</span>
							</div>
							
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row_card['dc_doc_path'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前檔案</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <h3><?php echo $row_card['dc_doc_name'];?></h3>
								  <input type="hidden" name="old_file" value="<?php echo $row_card['dc_doc_path'];?>">
								</div>
							</div>
						<?php }?>		
						</div>
                        </div>
                        

						<input type="hidden" id="dc_group_id" name="dc_group_id" value="<?php echo $_GET['dc_group_id'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
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
					<?php if(empty($_GET['dc_group_id'])){?>
						<button type="button" id="submit_btn" class="btn btn-info btn-raised">儲存</button>
					<?php }else{?>
					    <button type="button" id="submit_btn" class="btn btn-info btn-raised">更新</button>
					<?php }?>
					<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="getBack()">放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>


<!-- Fancybox_div -->
<!-- Fancybox_div -->
<div id="dc_status_org" class="tool_alert">
  <h4 class="text-center">請選擇要部份使用的處理方式</h4>
  <div class="a_div">
  	<a class="btn btn-default" href="javascript:;" status="0">正常使用</a>
  	<a class="btn btn-default" href="javascript:;" status="1">停發</a>
  	<a class="btn btn-default" href="javascript:;" status="2">停卡</a>
  </div>
  <!-- 要修改的卡組織ID -->
  <input type="hidden" name="ch_org">
</div>


<div id="dc_status_level" class="tool_alert">
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
<!-- Fancybox_div END -->



</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

		//-- 選擇申請書提供方式 --
		$('.choose_apply').change(function(event) {
			$('.cc_apply_url').css('display', 'none');
			$('.cc_apply_file').css('display', 'none');
			$('#dc_doc_url').val('');
			$('#dc_doc_name').val('');
			$('#dc_doc_path').val('');
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
          $('.card_level [name="dc_debitorg[]"]').change(function(event) {
          	if ($(this).prop('checked')==true) {
          	  $(this).parent().next().css('display', 'block');
          	}
          	else{
          	  $(this).parent().next().css('display', 'none');
          	  $(this).parent().next().find('[name="dc_debitlevel[]"]').prop('checked', false);
          	}
          });



          $("#submit_btn").click(function(event) {
          		var err_txt='';
          		err_txt = err_txt + check_input( '[name="dc_cardname"]', '金融卡名稱，' );
          		err_txt = err_txt + check_input( '[name="dc_bi_pk"]', '發卡單位，' );
          		err_txt = err_txt + check_input( '[name="dc_card_orglevel[]"]', '發卡組織/卡等' );


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
    $('[name="dc_group_state"]').change(function(event) {

    	
    	//-- 正常使用 --
        if ($(this).val()=='0') {
        	
        	var state_1_fun= function () {
        		
        		alert("請選擇要正常使用的發卡組織");
        		$('[name="dc_debitorg[]"]').prop('disabled', false);
        		$('[name="dc_debitorg[]"]:checked').prop('disabled', true);
        		$('[name="dc_debitorg[]"]:checked').parents('td').nextAll().find('input').prop('disabled', false);

        		//$('[name="dc_card_orglevel[]"]').prop('disabled', false);
        		$('[name="dc_card_orglevel[]"]:checked').prop('disabled', true);
        	}
        	
        	reload_orglevel(state_1_fun);
        }

        //-- 全部停發 --
        else if($(this).val()=='1'){
        	$('[name="dc_debitorg[]"]').prop('disabled', true);
        	$('[name="dc_card_orglevel[]"]').prop('disabled', true);


            if (confirm('確定將全部卡片停發 ?')) {
               $('[name="dc_card_orglevel[]"]:checked').parent().addClass('text-danger');

               if ($('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').length<1) {
               	$('[name="dc_card_orglevel[]"]:checked').next().after('<span class="dc_status">(停發)</span>');
               }
               else{
               	$('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').html('(停發)');
               }
            }
            else{

            	$(this).prop('checked', false);
            	 // $('[name="dc_card_orglevel[]"]:checked').parent().removeClass('text-danger');
            	 // if ($('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').length>0){
            	 // 	$('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').remove();
            	 // }
            }
        }

        //-- 全部停卡 --
        else if ($(this).val()=='2') {
            $('[name="dc_debitorg[]"]').prop('disabled', true);
        	$('[name="dc_card_orglevel[]"]').prop('disabled', true);

            if (confirm('確定將全部卡片停卡 ?')) {
               $('[name="dc_card_orglevel[]"]:checked').parent().addClass('text-danger');
               
               if ($('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').length<1) {
               	$('[name="dc_card_orglevel[]"]:checked').next().after('<span class="dc_status">(停卡)</span>');
               }
               else{
               	$('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').html('(停卡)');
               }
            }
            else{

            	 $(this).prop('checked', false);
            	 // $('[name="dc_card_orglevel[]"]:checked').parent().removeClass('text-danger');
            	 // if ($('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').length>0){
            	 // 	$('[name="dc_card_orglevel[]"]:checked').parent().find('.dc_status').remove();
            	 // }
            }
        }

        //-- 部分使用 --
        else if($(this).val()=='3'){

           var state_3_fun=function () {
           	 $('[name="dc_debitorg[]"]:checked').prop('disabled', false);
           	 $('[name="dc_card_orglevel[]"]').prop('disabled', true);
           	 $('[name="dc_card_orglevel[]"]:checked').prop('disabled', false);
           }
           
           reload_orglevel(state_3_fun); 
        }
        
    });





    //-- 展開卡等 / 部分使用組織 --
    $('#orglevel_tb').on('change', '.card_level [name="dc_debitorg[]"]', function(event) {
      
      //- 展開卡等 -
      if ($('[name="dc_group_state"]:checked').val()=='0') {
         if ($(this).prop('checked')==true) {
           $(this).parents('td').nextAll().find('input').prop('disabled', false);
         }
         else{
           $(this).parents('td').nextAll().find('input').prop('disabled', true);
           $(this).parents('td').nextAll().find('input').prop('checked', false);
         }
      }

      //- 部分使用組織 -
      else{
        $(this).prop('checked', true);
        
        $('[name="ch_org"]').val($(this).val());
        $.fancybox.open({
        	src  : '#dc_status_org',
        	type : 'inline'
        });
      }
    	
    });



    //-- 勾選卡等提示 / 部分使用卡等 --
    $('#orglevel_tb').on('change', '[name="dc_card_orglevel[]"]', function(event) {
      
      //- 勾選卡等提示 -
    	if ($('[name="dc_group_state"]:checked').val()=='0') {
    	   	if ($(this).prop('checked')==true) {
    	     	if (!confirm('確定要新增卡等：'+$(this).next().html())) {
    	          $(this).prop('checked', false);
    	     	}
    	     }
    	     else{
    	     	if (!confirm('確定要取消卡等：'+$(this).next().html())) {
    	          $(this).prop('checked', true);
    	     	}
    	     }
    	}

    	//- 部分使用卡等 -
    	else{
    	  $(this).prop('checked', true);
    	  
    	  $('[name="ch_orglevel"]').val($(this).val());
    	  $.fancybox.open({
    	  	src  : '#dc_status_level',
    	  	type : 'inline'
    	  });
    	}
    	
    });




    //-- 部分使用卡組織 狀態選擇 --
    $('#dc_status_org .a_div a').click(function(event) {
       var obj=$('[name="dc_debitorg[]"][value="'+$('[name="ch_org"]').val()+'"]');

       //-- 正常使用 --
       if ($(this).attr('status')=='0') {
           obj.parents('td').nextAll().find('input:checked').parent().removeClass('text-danger');
           obj.parents('td').nextAll().find('input:checked').parent().find('.dc_status').html('');
           obj.parents('td').nextAll().find('input:checked').parent().find('[name="dc_card_status[]"]').val('0');
       }
       // --停發--
       else if ($(this).attr('status')=='1') {
           obj.parents('td').nextAll().find('input:checked').parent().addClass('text-danger');
           obj.parents('td').nextAll().find('input:checked').parent().find('.dc_status').html('(停發)');
           obj.parents('td').nextAll().find('input:checked').parent().find('[name="dc_card_status[]"]').val('1');
       }

       else if($(this).attr('status')=='2'){
       	   obj.parents('td').nextAll().find('input:checked').parent().addClass('text-danger');
           obj.parents('td').nextAll().find('input:checked').parent().find('.dc_status').html('(停卡)');
           obj.parents('td').nextAll().find('input:checked').parent().find('[name="dc_card_status[]"]').val('2');
       }

       $.fancybox.close();
    });


    //-- 部分使用卡等 狀態選擇 --
    $('#dc_status_level .a_div a').click(function(event) {
        var obj=$('[name="dc_card_orglevel[]"][value="'+$('[name="ch_orglevel"]').val()+'"]');
               
               //-- 正常使用 --
    		   if ($(this).attr('status')=='0') {
    		   	 obj.parent().removeClass('text-danger');
    		   	 var dc_name=obj.parent().find('span').html();
    		   	 obj.parent().find('.dc_name').html(dc_name);
    		   	 obj.parent().find('.dc_status').html('');
    		   	 obj.next().val('0');

    		   }
    		   // --停發--
    		   else if($(this).attr('status')=='1'){
    		   	 obj.parent().addClass('text-danger');
                 var dc_name=obj.parent().find('span').html();
                 obj.parent().find('.dc_name').html(dc_name);
                 obj.parent().find('.dc_status').html('(停發)');
                 obj.next().val('1');
    		   }
    		   // --停卡--
    		   else if($(this).attr('status')=='2'){
                 obj.parent().addClass('text-danger');
                 var dc_name=obj.parent().find('span').html();
    		   	 obj.parent().find('.dc_name').html(dc_name);
                 obj.parent().find('.dc_status').html('(停卡)');
                 obj.next().val('2');
    		   }

    	$.fancybox.close();
    	
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

      });


//-- 重新讀取資料 --
function reload_orglevel(callback=null) {
		
   $.ajax({
   	url: 'manager_ajax.php',
   	type: 'POST',
   	data: {
   	  dc_group_id: $('#dc_group_id').val()
   	},
   	success:function (data) {
   	  $('#orglevel_tb').html(data);
   	  callback();
   	}
   });
   
}
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

