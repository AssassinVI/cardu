<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
  // ======================== 刪除 ===========================
  	//----------------------- 代表圖刪除 -------------------------------
    if (!empty($_POST['type']) && $_POST['type']=='delete') { 

    		$param=['eq_image'=>''];
            $where=['Tb_index'=>$_POST['Tb_index']];
            pdo_update('card_eq_item', $param, $where);
            unlink('../../img/'.$_POST['eq_image']);
    	
       exit();
  	}


	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='eq'.date('YmdHis').rand(0,99);
     
     //===================== image圖 ========================
      if (!empty($_FILES['eq_image']['name'])){

      	 $type=explode('.', $_FILES['eq_image']['name']);
      	 $eq_image=$Tb_index.'.'.$type[count($type)-1];
         fire_upload('eq_image', $eq_image); 
      }
      else{ $eq_image='';}

      $OrderBy=pdo_select("SELECT OrderBy FROM card_eq_item ORDER BY OrderBy DESC LIMIT 0,1", 'no');
      $OrderBy=(int)$OrderBy['OrderBy']+1;

	$param=  ['Tb_index'=>$Tb_index,
			              'mt_id'=>$_POST['mt_id'],
			             'eq_name'=>$_POST['eq_name'],
			              'eq_image'=>$eq_image,
			              'eq_type'=>$_POST['eq_type'],
			              'eq_txt'=>$_POST['eq_txt'],
			              'OrderBy'=>$OrderBy,

			         ];
	pdo_insert('card_eq_item', $param);
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功新增');
   }
   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

   	 //===================== image圖 ========================
      if (!empty($_FILES['eq_image']['name'])) {

      	 $type=explode('.', $_FILES['eq_image']['name']);
      	 $eq_image=$Tb_index.date('His').'.'.$type[count($type)-1];
         fire_upload('eq_image', $eq_image);
        $eq_image_param=['eq_image'=>$eq_image];
        $eq_image_where=['Tb_index'=>$Tb_index];
        pdo_update('card_eq_item', $eq_image_param, $eq_image_where);

      }
      	//--------------------------- END -----------------------------------
    

    $param=[  
		               'mt_id'=>$_POST['mt_id'],
    	             'eq_name'=>$_POST['eq_name'],
		             'eq_type'=>$_POST['eq_type'],
			          'eq_txt'=>$_POST['eq_txt'],
		          ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('card_eq_item', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'],'成功更新');
   }
}
if ($_GET) {
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM card_eq_item WHERE Tb_index=:Tb_index', $where);
 	$newORedit=empty($_GET['Tb_index']) ? '新增':'修改';
}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><?php echo $newORedit; ?>權益項目
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="eq_name"><span class="text-danger">*</span> 權益項目名稱</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="eq_name" name="eq_name" value="<?php echo $row['eq_name'];?>">
							</div>
						</div>


					
					    <div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor">權益類型</label>
							<div class="col-md-10">
								<label><input type="radio" name="eq_type" value="txt" checked> 一般文字內容</label>｜
								<label><input type="radio" name="eq_type" value="big"> 數字比大 (較大者為優)</label>｜
								<label><input type="radio" name="eq_type" value="small"> 數字比小 (較小者為優)</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="ckeditor">量化規則</label>
							<div class="col-md-10">
								<textarea  class="form-control"  name="eq_txt" style="height: 200px;" ><?php echo $row['eq_txt'];?></textarea>
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
					<button type="button" class="btn btn-danger btn-flat"  onclick="getBack()">放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

         //-- 權益類型 --
         $('[name="eq_type"][value="<?php echo $row['eq_type'];?>"]').prop('checked', true);


          $("#submit_btn").click(function(event) {

          	 var err_txt='';
          	 err_txt = err_txt + check_input( '#eq_name', '權益項目名稱，' );

          	

          	 if (err_txt!='') {
          	  alert("請輸入"+err_txt+"!!");
          	 }
          	 else{

          	  $('#put_form').submit();
          	 }
          });



      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

