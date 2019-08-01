<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.fancybox-slide--iframe .fancybox-content {
    width  : 700px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}

.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }

.btn.btn-success{ margin: 2px; padding: 2px 5px; }

#twzipcode select, #twzipcode input{ padding: 5px 10px; border: 1px solid #ececec; }
#st_main_type{ display: none; }
#st_second_type{ display: none; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {

    if (!empty($_POST['type']) && $_POST['type']=='delete') { //刪除
    	if (!empty($_POST['card_img'])) {
    		    $param=array('card_img'=>'');
            $where=array('Tb_index'=>$_POST['Tb_index']);
            pdo_update('member_card', $param, $where);

            unlink('../../img/'.$_POST['card_img']);
    	}
       exit();
  	}

   
   //========================================= 新增=========================================
   //========================================= 新增=========================================
   //========================================= 新增=========================================

	if (empty($_POST['Tb_index'])) {

		$Tb_index='mc'.date('YmdHis').rand(0,99);
        

   //----------------------- 檔案判斷 -------------------------

      //-- 商店LOGO --
      if (!empty($_FILES['card_img']['name'])) {

      	if (test_img($_FILES['card_img']['name'])){
      		 $type=explode('.', $_FILES['card_img']['name']);
      		 $card_img=$Tb_index.'.'.$type[count($type)-1];
      		 //ecstart_convert_jpeg_NEW($_FILES['card_img']['tmp_name'],'../../img/'.$card_img, 750);
           fire_upload('card_img', $card_img);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      	 
      }else{ $card_img=''; }


  $card_attr=empty($_POST['card_attr']) ? '':implode(',', $_POST['card_attr']);
  $card_pref=empty($_POST['card_pref']) ? '':implode(',', $_POST['card_pref']);

	$param=array('Tb_index'=>$Tb_index,
		           'card_name'=>$_POST['card_name'],
               'store_id'=>$_POST['store_id'],
               'card_attr'=>$card_attr,
               'card_sp_txt'=>$_POST['card_sp_txt'],
               'card_img'=>$card_img,
               'card_pref'=>$card_pref,
               'StartDate'=>date('Y-m-d H:i:s')
		          );

	pdo_insert('member_card', $param);

  //-- 權益內容 --
  if (!empty($_POST['pref_txt_id'])) {
    $Tb_index_pref='mcp'.date('YmdHis').rand(0,99);
    for ($i=0; $i <count($_POST['pref_txt_id']) ; $i++) { 
      $param=array(
               'Tb_index'=>$Tb_index_pref.$i,
               'card_id'=>$Tb_index,
               'pref_id'=>$_POST['pref_txt_id'][$i],
               'pref_txt'=>$_POST['pref_txt'][$i],
               'ez_pref_txt'=>$_POST['ez_pref_txt'][$i],
              );

     pdo_insert('member_card_pref', $param);
    }
  }

	location_up('admin.php?MT_id='.$_POST['mt_id'],'已新增會員卡');
}


   //========================================= 修改=========================================
   //========================================= 修改=========================================
   //========================================= 修改=========================================

   else{ 

   	$Tb_index =$_POST['Tb_index'];


     //----------------------- 檔案判斷 -------------------------
   	   //-- 商店LOGO --
      if (!empty($_FILES['st_logo']['name'])) {

      	if (test_img($_FILES['st_logo']['name'])){
      			$type=explode('/', $_FILES['st_logo']['type']);
      			$st_logo=$Tb_index.'-'.date("His").'.'.$type[1];
      		   // ecstart_convert_jpeg_NEW($_FILES['st_logo']['tmp_name'],'../../img/'.$st_logo, 750);
            fire_upload('st_logo', $st_logo);

      		  $st_logo_param=array('st_logo'=>$st_logo);
      		  $st_logo_where=array('Tb_index'=>$Tb_index);
      		  pdo_update('store', $st_logo_param, $st_logo_where);
      	}else{
      		location_up('admin.php?MT_id='.$_POST['mt_id'],'圖檔錯誤!請上傳圖片檔');
      		exit();
      	}
      }
 

   
      $st_main_type=empty($_POST['st_main_type']) ? '':$_POST['st_main_type'];
      $st_second_type=empty($_POST['st_second_type']) ? '':$_POST['st_second_type'];
      $st_label=empty($_POST['st_label']) ? '': implode(',', $_POST['st_label']);
      $OnLineOrNot=empty($_POST['OnLineOrNot']) ? 0: 1 ;

    
    $param=array(
                  
                  'st_type'=>$_POST['st_type'],
                  'st_main_type'=>$st_main_type,
                  'st_second_type'=>$st_second_type,
                  'st_name'=>$_POST['st_name'],
                  'st_nickname'=>$_POST['st_nickname'],
                  'st_url'=>$_POST['st_url'],
                  'st_phone'=>$_POST['st_phone'],
                  'st_ser_phone'=>$_POST['st_ser_phone'],
                  'st_adds'=>$_POST['zipcode'].$_POST['county'].$_POST['district'].','.$_POST['st_adds'],
                  'st_label'=>$st_label,
                  'st_intro'=>$_POST['st_intro'],
                  'OnLineOrNot'=>$OnLineOrNot,
              );

  $where=array( 'Tb_index'=>$Tb_index );
	pdo_update('store', $param, $where);
	
  location_up('admin.php?MT_id='.$_POST['mt_id'], '已更新商店');
  }
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM store WHERE Tb_index=:Tb_index', $where);

    
    $st_label=empty($row['st_label']) ? '' : explode(',', $row['st_label']);
    $zipcode=substr($row['st_adds'], 0,3);
    $adds=explode(',', $row['st_adds']);
  
  $header_txt=strpos($_SERVER['QUERY_STRING'], 'Tb_index')!==FALSE ? '修改會員卡':'新增會員卡';
}


?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
      <form id="put_form" action="admin.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header><?php echo $header_txt; ?>
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">

            <div class="form-group">
              <label class="col-md-2 control-label" for="card_name"><span class="text-danger">*</span>卡片名稱</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="card_name" name="card_name"  value="<?php echo $row['card_name'];?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2"><span class="text-danger">*</span> 發卡單位</label>
              <div class="col-md-10 ">
                <select id="st_type">
                  <option value="">-- 商店類別 --</option>
                  <?php
                    //-- 商店分類 --
                     $row_type=$NewPdo->select("SELECT * FROM store_type ORDER BY OrderBy ASC");
                    foreach ($row_type as $row_type_one) {
                      echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['st_name'].'</option>';
                    }
                  ?>
                </select>
                <select id="st_main_type">
                  <option value="">-- 商店主分類 --</option>
                </select>
                <select id="st_second_type">
                  <option value="">-- 商店次分類 --</option>
                </select>
                <select id="st_name" name="store_id">
                  <option value="">-- 商店名稱 --</option>
                </select>
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-md-2 control-label"><span class="text-danger">*</span>卡片屬性</label>
              <div class="col-md-10">
                <?php 
                  $row_attr=$NewPdo->select("SELECT * FROM card_attr WHERE mt_id='site2019041013013951' AND OnLineOrNot='1'");
                  foreach ($row_attr as $row_attr_one) {
                    echo '<label><input type="checkbox" name="card_attr[]" value="'.$row_attr_one['Tb_index'].'">'.$row_attr_one['attr_name'].'</label>｜';
                  }
                ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="card_sp_txt"><span class="text-danger">*</span>卡片特色</label>
              <div class="col-md-4">
                <textarea class="form-control" style="height: 150px;" id="card_sp_txt" name="card_sp_txt"><?php echo $row['card_sp_txt'];?></textarea>
              </div>
            </div>


              <div class="form-group">
                <label class="col-md-2 control-label" for="card_img">卡片圖檔</label>
                <div class="col-md-3">
                  <input type="file" name="card_img" class="form-control" id="card_img" onchange="file_viewer_load_new(this, '#img_box')">
                </div>

              </div>

              <div class="form-group">
                 <label class="col-md-2 control-label" ></label>
                 <div id="img_box" class="col-md-4">
                  
                </div>
              <?php if(!empty($row['card_img'])){?>
                <div  class="col-md-4">
                   <div id="img_div" >
                    <p>目前圖檔</p>
                   <button type="button" id="one_del_img1" class="one_del_img"> X </button>
                    <span class="img_check"><i class="fa fa-check"></i></span>
                    <input type="hidden" value="<?php echo $row['card_img'];?>">
                    <img id="one_img" src="../../img/<?php echo $row['card_img'];?>" alt="請上傳代表圖檔">
                    <input type="hidden" name="old_card_img" value="<?php echo $row['card_img'];?>">
                  </div>
                </div>
              <?php }?>   
              </div>

            <div class="form-group">
              <label class="col-md-2 control-label">卡片優惠</label>
              <div class="col-md-10">
                <?php 
                  $row_pref=$NewPdo->select("SELECT * FROM card_pref WHERE mt_id='site2019041013020371'");
                  foreach ($row_pref as $row_pref_one) {
                    echo '<label><input type="checkbox" name="card_pref[]" pref_name="'.$row_pref_one['pref_name'].'" value="'.$row_pref_one['Tb_index'].'"><img style="width: 30px;" src="../../img/'.$row_pref_one['pref_image'].'">'.$row_pref_one['pref_name'].'</label>｜';
                  }
                ?>

              </div>
            </div>



						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->


      <div class="panel panel-default">
       <div class="panel-body">
         <div class="form-horizontal">
          <div class="form-group">
              <label class="col-md-2 text-right">優惠項目</label>
              <label class="col-md-6 text-center">權益內容</label>
              <label class="col-md-3 text-center">簡易內容</label>
            </div>
          
          <div class="pref_txt_div">

          </div>
          
           
         </div>
       </div>
     </div>

     </form>



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
            <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#settingsModal1" onclick="getBack()">放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {


           //-- 選擇商店類別 --
      $('#st_type').change(function(event) {

             //-- 集點店家 其他 --
        if ($('#st_type').val()=='st2019013117015133' || $('#st_type').val()=='st201901311701582') {

          $('#st_main_type').css('display', 'inline-block');
          $('#st_second_type').css('display', 'inline-block');

          //-- 撈主分類 --
          $.ajax({
            url: '../member_card_public/store_windows_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
             st_type: $(this).val()
           },
           success:function (data) {
            
            
             $("#st_main_type").html('<option value="">-- 商店主分類 --</option>');
             $("#st_second_type").html('<option value="">-- 商店次分類 --</option>');
             $("#st_name").html('<option value="">-- 商店名稱 --</option>');
             $.each(data, function(index, val) {
                $("#st_main_type").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
             });
           }
          });
        }

        else{

          $('#st_main_type').css('display', 'none');
          $('#st_second_type').css('display', 'none');
               
               //-- 撈商店名稱 --
          $.ajax({
            url: '../member_card_public/store_windows_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
             st_type: $(this).val()
           },
           success:function (data) {

             $("#st_main_type").html('<option value="">-- 商店主分類 --</option>');
             $("#st_second_type").html('<option value="">-- 商店次分類 --</option>');
             $("#st_name").html('<option value="">-- 商店名稱 --</option>');
             $.each(data, function(index, val) {
                $("#st_name").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
             });
           }
          });
        }
        
      });
           //-- 選擇商店類別 END --

           //-- 選擇主分類 --
           $('#st_main_type').change(function(event){
             //-- 撈次分類 --
             $.ajax({
            url: '../member_card_public/store_windows_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
             st_main_type: $(this).val()
           },
           success:function (data) {
            
             $("#st_second_type").html('<option value="">-- 商店次分類 --</option>');
             $("#st_name").html('<option value="">-- 商店名稱 --</option>');
             $.each(data, function(index, val) {
                $("#st_second_type").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
             });
           }
          });
           });
           //-- 選擇主分類 END --

           //-- 選擇次分類 --
           $('#st_second_type').change(function(event){
             //-- 撈次分類 --
             $.ajax({
            url: '../member_card_public/store_windows_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
             st_second_type: $(this).val()
           },
           success:function (data) {
            
             $("#st_name").html('<option value="">-- 商店名稱 --</option>');
             $.each(data, function(index, val) {
                $("#st_name").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
             });
           }
          });
           });
           //-- 選擇次分類 END --



          //-- 選擇優惠 --
          $('[name="card_pref[]"]').change(function(event) {
            if ($(this).prop('checked')==true) {
              var txt='<div class="form-group">'+
                       '<label class="col-md-2 control-label" >'+$(this).attr('pref_name')+'</label>'+
                       '<div class="col-md-6">'+
                          '<textarea class="form-control" name="pref_txt[]"></textarea>'+
                       '</div>'+
                       '<div class="col-md-3">'+
                          '<textarea class="form-control" name="ez_pref_txt[]"></textarea>'+
                       '</div>'+
                       '<input type="hidden" name="pref_txt_id[]" value="'+$(this).val()+'">'+
                      '</div>';
              $('.pref_txt_div').append(txt);
            }
            else{
              $('[name="pref_txt_id[]"][value="'+$(this).val()+'"]').parent().remove();
            }
          });
          //-- 選擇優惠 END --


          //-- 儲存、更新 ---
          $("#submit_btn").click(function(event) {

          	var err_txt='';
          	
          	err_txt = err_txt + check_input( '#card_name', '卡片名稱，' );
            err_txt = err_txt + check_input( '[name="store_id"]', '發卡單位，' );
            err_txt = err_txt + check_input( '[name="card_attr[]"]', '卡片屬性，');
            err_txt = err_txt + check_input( '#card_sp_txt', '卡片特色');
            // err_txt = $('[name="st_logo"]').val()=='' && $('[name="old_st_logo"]').val()==undefined ? err_txt + '商店LOGO，' : err_txt;



          	if (err_txt!='') {
          	 alert("請輸入"+err_txt+"!!");
          	}
          	else{
             $('#put_form').submit();
          	}
          });


    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img1").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                card_img: $(this).next().next().val(),
                type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});


      });


</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

