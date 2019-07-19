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
            pdo_update('appNotice', $param, $where);
            unlink('../../img/'.$_POST['aPic']);
    	}
       exit();
  	}
	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='note'.date('YmdHis').rand(0,99);
     
     //===================== 代表圖 ========================
      if (!empty($_FILES['aPic']['name'])){

      	 $type=explode('.', $_FILES['aPic']['name']);
      	 $aPic=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('aPic', $aPic); 
      }

	$param=  ['Tb_index'=>$Tb_index,
			          'note_type'=>$_POST['note_type'],
			             'aTitle'=>$_POST['aTitle'],
			               'note'=>$_POST['note'],
			               'aPic'=>$aPic,
			           'aPic_txt'=>$_POST['aPic_txt'],
			               'aTXT'=>$_POST['aTXT'],
			               'aUrl'=>$_POST['aUrl'],
			          'StartDate'=>$_POST['StartDate'],
			            'EndDate'=>$_POST['EndDate'],
			        'OnLineOrNot'=>$_POST['OnLineOrNot']
			         ];
	pdo_insert('appNotice', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== 代表圖 ========================
      if (!empty($_FILES['aPic']['name'])) {

      	 $type=explode('.', $_FILES['aPic']['name']);
      	 $aPic=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('aPic', $aPic);
        $aPic_param=['aPic'=>$aPic];
        $aPic_where=['Tb_index'=>$Tb_index];
        pdo_update('appNotice', $aPic_param, $aPic_where);

      }
    
    
    $param=  [
			          'note_type'=>$_POST['note_type'],
			             'aTitle'=>$_POST['aTitle'],
			               'note'=>$_POST['note'],
			           'aPic_txt'=>$_POST['aPic_txt'],
			               'aTXT'=>$_POST['aTXT'],
			               'aUrl'=>$_POST['aUrl'],
			          'StartDate'=>$_POST['StartDate'],
			            'EndDate'=>$_POST['EndDate'],
			        'OnLineOrNot'=>$_POST['OnLineOrNot']
			 ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('appNotice', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM appNotice WHERE Tb_index=:Tb_index', $where);

 	$note_type=empty($row['note_type']) ? 0:1;

 	$header_txt=strpos($_SERVER['QUERY_STRING'], 'Tb_index')!==FALSE ? '修改公告活動':'新增公告活動';
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><?php echo $header_txt; ?></header>
				</div><!-- /.panel-heading -->
				<div class="panel-body ">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="note_type"><span class="text-danger">*</span> 單元分類</label>
							<div class="col-md-10">
								<label><input type="radio" name="note_type" value="0"> 卡優公告</label>｜<label><input type="radio" name="note_type" value="1"> 卡優活動</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="aTitle"><span class="text-danger">*</span> 主題名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="aTitle" name="aTitle" value="<?php echo $row['aTitle'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" ><span class="text-danger">*</span> 活動時間</label>
							<div class="col-md-10 form-inline">
								<input type="text" class="form-control datepicker_range from" id="StartDate" name="StartDate" value="<?php echo $row['StartDate'];?>">
								~
								<input type="text" class="form-control datepicker_range to" id="EndDate" name="EndDate" value="<?php echo $row['EndDate'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor"><span class="text-danger">*</span> 內容介紹</label>
							<div class="col-md-10">
								<textarea id="ckeditor" name="aTXT" placeholder="詳細內容"><?php echo $row['aTXT'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="note">注意事項</label>
							<div class="col-md-10">
								<textarea class="form-control" id="note" name="note" ><?php echo $row['note'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="aPic"><span class="text-danger">*</span> 主圖檔</label>
							<div class="col-md-4">
								<input type="file" name="aPic" class="form-control" accept="image/*" id="aPic" onchange="file_viewer_load_new(this, '#img_box')">
								<span class="text-danger">圖檔尺寸:750*500</span><br>
								<input type="text" class="form-control" placeholder="圖檔說明 (例如：圖/新光三越)" id="aPic_txt" name="aPic_txt" value="<?php echo $row['aPic_txt'];?>">
							</div>
							
						</div>

						<div class="form-group">
						   <label class="col-md-2 control-label" ></label>
						   <div id="img_box" class="col-md-4">
								
							</div>
						<?php if(!empty($row['aPic'])){?>
							<div  class="col-md-4">
							   <div id="img_div" >
							    <p>目前圖檔</p>
								 <button type="button" id="one_del_img"> X </button>
								  <span class="img_check"><i class="fa fa-check"></i></span>
								  <img id="one_img" src="../../img/<?php echo $row['aPic'];?>" alt="請上傳代表圖檔">
								  <input type="hidden" name="old_img" value="<?php echo $row['aPic'];?>">
								</div>
							</div>
						<?php }?>		
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="aUrl">活動網址</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="aUrl" name="aUrl" value="<?php echo $row['aUrl'];?>">
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

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
					<?php if(empty($_GET['Tb_index'])){?>
						<button type="button" id="submit_btn" class="btn btn-info btn-raised">儲存</button>
					<?php }else{?>
					    <button type="button" id="submit_btn" class="btn btn-info btn-raised">更新</button>
					<?php }?>
					<button type="button" class="btn btn-danger btn-flat" onclick="getBack();">放棄</button>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
    
        $('[name="note_type"][value="<?php echo $note_type;?>"]').prop('checked', true);


          $("#submit_btn").click(function(event) {
          		var err_txt='';
          		err_txt = err_txt + check_input( '[name="note_type"]', '單元分類，' );
          		err_txt = err_txt + check_input( '[name="aTitle"]', '主題名稱，' );
          		err_txt = err_txt + check_input( '[name="StartDate"]', '活動時間(開始)，' );
          		err_txt = err_txt + check_input( '[name="EndDate"]', '活動時間(結束)，' );
          		err_txt = CKEDITOR.instances.ckeditor.getData()=='' ? err_txt + '內容介紹，' : err_txt;
                err_txt = $('[name="aPic"]').val()=='' && $('[name="old_img"]').val()==undefined ? err_txt + '主圖檔' : err_txt;

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

