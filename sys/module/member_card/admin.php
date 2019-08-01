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


?>


<div class="wrapper wrapper-content animated fadeInRight">

		<div style="width: 800px;">
			<div class="panel panel-success">
                 <div class="panel-heading">
                     會員卡查詢
                 </div>
                 <div class="panel-body">
                     <form id="search_st_form" class="form-horizontal" method="POST" action="manager.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	
                      <div class="form-group">
                        <label class="control-label col-md-2"><span class="text-danger">*</span> 發卡單位</label>
                        <div class="col-md-10 ">
                          <select id="st_type">
                            <option value="">-- 商店類別 --</option>
                            <option value="st2019013117015133">集點店家</option>
                            <?php
                              //-- 商店分類 --
                              //  $row_type=$NewPdo->select("SELECT * FROM store_type ORDER BY OrderBy ASC");
                              // foreach ($row_type as $row_type_one) {
                              //   echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['st_name'].'</option>';
                              // }
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
                            <label class="col-md-2 control-label" >卡片名稱</label>
                            <div class="col-md-10">
                              <select class="form-control" id="select_card" name="card_id">
                               <option value="">-- 會員卡名稱 --</option>
                              </select>
                            </div>
                      </div>


                      <div class="form-group">
                         <label class="col-md-2 control-label" >關鍵字</label>
                         <div class="col-md-10">
                           <input type="text" class="form-control" name="keywords" placeholder="請輸入關鍵字，以「,」或「空白」區隔均可">
                         </div>
                      </div>


                      <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                        </div>
                      </div>
                      <input type="hidden" name="MT_id" value="<?php echo $_GET['MT_id'];?>">
                     </form>
                 </div>
             </div>
	</div>

</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
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
             $("#select_card").html('<option value="">-- 會員卡名稱 --</option>');
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
             $("#select_card").html('<option value="">-- 會員卡名稱 --</option>');
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
             $("#select_card").html('<option value="">-- 會員卡名稱 --</option>');
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
             $("#select_card").html('<option value="">-- 會員卡名稱 --</option>');
             $.each(data, function(index, val) {
                $("#st_name").append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
             });
           }
          });
          });
           //-- 選擇次分類 END --


          //-- 選擇商店 --
           $('#st_name').change(function(event){
             //-- 撈次分類 --
             $.ajax({
            url: '../member_card_public/store_windows_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
             store_id: $(this).val()
           },
           success:function (data) {
            
             $("#select_card").html('<option value="">-- 會員卡名稱 --</option>');
             $.each(data, function(index, val) {
                $("#select_card").append('<option value="'+this['Tb_index']+'">'+this['card_name']+'</option>');
             });
           }
          });
          });
           //-- 選擇商店 END --
		
     $('#search_btn').click(function(event) {
      if ($("#select_card").val()=="") {
        alert("請選擇會員卡");
      }
      else{
        location.href="manager.php?MT_id="+$('[name="MT_id"]').val()+'&Tb_index='+$("#select_card").val();
      }
     });



  
  });

  $(window).on('load', function(event) {
    // $.ajax({
    //      url: 'admin_ajax.php',
    //      type: 'POST',
    //      dataType: 'json',
    //      data: {
    //       st_type: $('#select_type').val()
    //     },
    //     success:function (data) {
    //       $("#select_card").html('<option value="">-- 全部 --</option>');
    //       $.each(data, function(index, val) {
    //          $("#select_card").append('<option value="'+this['st_name']+'">'+this['st_name']+'</option>');
    //       });
    //     }
    //    });
  });
		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
