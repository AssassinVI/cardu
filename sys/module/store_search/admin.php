<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('news_type', $data, $where);
  }
}

if ($_GET) {

   
   //-- 商店分類 --
   $row_type=$NewPdo->select("SELECT * FROM store_type ORDER BY OrderBy ASC");

}

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-success">
                 <div class="panel-heading">
                     商店查詢
                 </div>
                 <div class="panel-body">
                     <form id="search_st_form" class="form-horizontal" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label" for="nt_define">商店分類</label>
                     		<div class="col-md-10">
                     		  <select class="form-control" id="select_type" name="st_type">
                            <option value="">-- 全部 --</option>
                     		  	<?php
                                 foreach ($row_type as $row_type_one) {
                                 	echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['st_name'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     	</div>
                      
                      <div class="form-group">
                            <label class="col-md-2 control-label" for="nt_define">商店名稱</label>
                            <div class="col-md-10">
                              <select class="form-control" id="select_store" name="st_name">
                               <option value="">-- 全部 --</option>
                              </select>
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label" for="nt_define">關鍵字查詢</label>
                            <div class="col-md-10">
                              <input type="text" id='st_keyWord' name="st_keyWord" class="form-control" placeholder="可輸入二個以上字詞，以「,」或「空白」區隔均可">
                            </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                        </div>
                      </div>
                     </form>
                 </div>
             </div>
	</div>


   
	
</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {
		
     $('#search_btn').click(function(event) {
      $('#search_st_form').submit();
     	
     });

     $('#select_type').change(function(event) {
       $.ajax({
         url: 'admin_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
          st_type: $(this).val()
        },
        success:function (data) {
          $("#select_store").html('<option value="">-- 全部 --</option>');
          $.each(data, function(index, val) {
             $("#select_store").append('<option value="'+this['st_name']+'">'+this['st_name']+'</option>');
          });
        }
       });
       
     });

  
  });

  $(window).on('load', function(event) {
    $.ajax({
         url: 'admin_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
          st_type: $('#select_type').val()
        },
        success:function (data) {
          $("#select_store").html('<option value="">-- 全部 --</option>');
          $.each(data, function(index, val) {
             $("#select_store").append('<option value="'+this['st_name']+'">'+this['st_name']+'</option>');
          });
        }
       });
  });
		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
