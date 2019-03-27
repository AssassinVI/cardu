<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.card_level{ padding: 5px; border-bottom: 1px solid #ccc; }
	.card_level div{ display: none; }
	.cc_apply_url{display: none;}
	.cc_apply_file{ display: none; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
 


  	//------------------------------ 新增 ----------------------------

	if (empty($_POST['Tb_index'])) {
		$Tb_index='ccard'.date('YmdHis').rand(0,99);
		$cc_group_id='ccgroup'.date('YmdHis').rand(0,99);
     
     //===================== 用卡申請書檔案 ========================
      if (!empty($_FILES['cc_doc_path']['name'])){

      	 $type=explode('.', $_FILES['cc_doc_path']['name']);
      	 $cc_doc_path=$Tb_index.'.'.$type[count($type)-1];
         other_fire_upload('cc_doc_path', $cc_doc_path); 
      }
      else{
      	$cc_doc_path='';
      }

    $cc_attr=implode(',', $_POST['cc_attr']);
    $cc_publish=empty($_POST['cc_publish']) ? date('Y-m-d'): $_POST['cc_publish'];

    $cc_card_orglevel_num=count($_POST['cc_card_orglevel']);

    for ($i=0; $i <$cc_card_orglevel_num ; $i++) { 
    	
    	$cc_card_orglevel_one=explode(',', $_POST['cc_card_orglevel'][$i]);

       	$param=  ['Tb_index'=>$Tb_index.$i,
       	          'cc_group_id'=>$cc_group_id,
       		   'cc_cardname'=>$_POST['cc_cardname'],
       			  'cc_bi_pk'=>$_POST['cc_bi_pk'],
       			   'cc_attr'=>$cc_attr,
       			'cc_cardorg'=>$cc_card_orglevel_one[0],
       		  'cc_cardlevel'=>$cc_card_orglevel_one[1],
                   'cc_doc_url'=>$_POST['cc_doc_url'],
                  'cc_doc_name'=>$_POST['cc_doc_name'],
       		   'cc_doc_path'=>$cc_doc_path,
       			'cc_publish'=>$cc_publish
       			 ];
       	pdo_insert('credit_card', $param);
    }
    
	//-- 跳至修改單卡權益 --
	location_up('../credit_card_one/manager.php?MT_id=site2019031616304770&Tb_index='.$Tb_index.'0','成功新增');
   }

   //修改
   else{  
 //   	$Tb_index =$_POST['Tb_index'];

 //   	 //===================== 代表圖 ========================
 //      if (!empty($_FILES['aPic']['name'])) {

 //      	 $type=explode('.', $_FILES['aPic']['name']);
 //      	 $aPic=$Tb_index.'.'.$type[count($type)-1];
 //         fire_upload('aPic', $aPic);
 //        $aPic_param=['aPic'=>$aPic];
 //        $aPic_where=['Tb_index'=>$Tb_index];
 //        pdo_update('credit_card', $aPic_param, $aPic_where);

 //      }
    
    
 //    $param=  [
	// 		          'note_type'=>$_POST['note_type'],
	// 		             'aTitle'=>$_POST['aTitle'],
	// 		               'note'=>$_POST['note'],
	// 		           'aPic_txt'=>$_POST['aPic_txt'],
	// 		               'aTXT'=>$_POST['aTXT'],
	// 		               'aUrl'=>$_POST['aUrl'],
	// 		          'StartDate'=>$_POST['StartDate'],
	// 		            'EndDate'=>$_POST['EndDate'],
	// 		        'OnLineOrNot'=>$_POST['OnLineOrNot']
	// 		 ];
 //    $where= ['Tb_index'=>$Tb_index] ;
	// pdo_update('credit_card', $param, $where);
	
	// location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	//-- 銀行 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");

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
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>信用卡資料編輯
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="admin.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						
						<div class="form-group">
							<label class="col-md-2 control-label" for="cc_cardname"><span class="text-danger">*</span> 信用卡名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_cardname" name="cc_cardname" value="<?php echo $row['cc_cardname'];?>">
							</div>
						</div>

						<div class="form-group">
						  <label class="col-md-2 control-label" ><span class="text-danger">*</span> 發卡單位</label>
						  <div class="col-md-10 form-inline">
						    <select class="form-control" name="cc_bi_pk">
						      <option value="">請選擇銀行</option>
						      <?php
						           foreach ($row_bank as $row_bank_one) {
						            echo '<option value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].'] '.$row_bank_one['bi_shortname'].'</option>';
						           }
						      ?>
						    </select>
						  </div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" ><span class="text-danger">*</span> 信用卡屬性</label>
							<div class="col-md-10">
								<?php
								     foreach ($attr as $attr_one) {
								      echo '<label><input type="checkbox" name="cc_attr[]" value="'.$attr_one['Tb_index'].'"> '.$attr_one['attr_name'].'</label>｜';
								     }
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="note"><span class="text-danger">*</span> 發卡組織/卡等</label>
							<div class="col-md-10">
								<?php
								     foreach ($org as $org_one) {
								      echo '<div class="card_level">';
								      echo '<label><input type="checkbox" name="cc_cardorg[]" > '.$org_one['org_nickname'].'</label>';
                                      echo '<div>';
                                       $card_level=$NewPdo->select("SELECT level_id FROM org_level WHERE org_id=:org_id", ['org_id'=>$org_one['Tb_index']]);
                                       foreach ($card_level as $card_level_one) {
                                       	echo '<label><input type="checkbox" name="cc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> '.$level_name[$card_level_one['level_id']].'</label>｜';
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
								<input type="date" class="form-control" id="cc_publish" name="cc_publish" value="<?php echo $row['cc_publish'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" > 信用卡申請書提供方式</label>
							<div class="col-md-10 form-inline">
								<select class="form-control choose_apply">
									<option value="">請選擇</option>
									<option value="1">連結網址</option>
									<option value="2">檔案上傳</option>
								</select>
							</div>
						</div>

						<div class="form-group cc_apply_url">
							<label class="col-md-2 control-label" for="cc_doc_url">信用卡申請書外部網址</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_doc_url" name="cc_doc_url" value="<?php echo $row['cc_doc_url'];?>">
							</div>
						</div>
                        
                        <div class="cc_apply_file">
                          <div class="form-group">
							<label class="col-md-2 control-label" for="cc_doc_name">信用卡申請書名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="cc_doc_name" name="cc_doc_name" value="<?php echo $row['cc_doc_name'];?>">
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
						<?php if(!empty($row['cc_doc_path'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前檔案</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <h3><?php echo $row['cc_doc_name'];?></h3>
								  <input type="hidden" name="old_file" value="<?php echo $row['cc_doc_path'];?>">
								</div>
							</div>
						<?php }?>		
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

