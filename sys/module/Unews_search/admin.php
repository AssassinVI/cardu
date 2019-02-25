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

   //-- 版區 --
   $row_area=$NewPdo->select("SELECT * FROM appArea WHERE mt_id='site2019011116102369' ORDER BY OrderBy ASC");

   //-- 商店分類 --
   $row_store_type=$NewPdo->select("SELECT Tb_index, st_name FROM store_type ORDER BY OrderBy ASC");

}

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-success">
                 <div class="panel-heading">
                     優情報查詢
                 </div>
                 <div class="panel-body">
                     <form id="search_ns_form" class="form-horizontal" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">


                      <div class="form-group">
                        <label class="col-md-2 control-label" >版區分類</label>
                        <div class="col-md-10">
                          <select class="form-control"  name="area_id">
                            <option value="">-- 全部 --</option>
                            <?php
                                 foreach ($row_area as $row_area_one) {
                                  echo '<option value="'.$row_area_one['Tb_index'].'">'.$row_area_one['at_name'].'</option>';
                                 }
                            ?>
                          </select>
                        </div>
                      </div>

                     	<div class="form-group">
                     		<label class="col-md-2 control-label" >情報分類</label>
                     		<div class="col-md-10">
                     		  <select class="form-control"  name="ns_nt_pk">
                            <option value="">-- 全部 --</option>

                     		  </select>
                     		</div>
                     	</div>

                      <div class="form-group">
                        <label class="col-md-2 control-label" for="nt_define">特別議題分類</label>
                        <div class="col-md-10">
                          <select class="form-control" name="ns_nt_sp_pk">
                            <option value="">-- 全部 --</option>

                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label" >活動期間</label>
                            <div class="col-md-10 form-inline">
                              <input type="date" name="activity_s_date" class="form-control"> ~ <input type="date" name="activity_e_date" class="form-control">
                            </div>
                      </div>
                      
                      <div class="form-group">
                            <label class="col-md-2 control-label" >上架時間</label>
                            <div class="col-md-10 form-inline">
                              <input type="date" name="StartDate" class="form-control" value=""> ~ <input type="date" name="EndDate" class="form-control" value="">
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label" >審核期間</label>
                            <div class="col-md-10 form-inline">
                              <input type="date" name="ns_st_vfdate" class="form-control"> ~ <input type="date" name="ns_en_vfdate" class="form-control">
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label" >新聞狀態</label>
                        <div class="col-md-10">
                          <select class="form-control"  name="ns_verify">
                            <option value="3">上架中</option>
                            <option value="">全部</option>
                            <option value="0">草稿</option>
                            <option value="2">審核中</option>
                            <option value="5">退稿</option>
                            <option value="7">下架</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label" >商店</label>
                        <div class="col-md-10 form-inline">
                          <select class="form-control" name="ns_store_area">
                            <option value="">全部</option>
                            <?php
                                 foreach ($row_store_type as $row_store_type_one) {
                                  echo '<option value="'.$row_store_type_one['Tb_index'].'">'.$row_store_type_one['st_name'].'</option>';
                                 }
                            ?>
                          </select>

                          <select class="form-control" name="ns_store_type" style="display: none">
                            <option value="">全部</option>

                          </select>

                          <select class="form-control" name="ns_store_s_type" style="display: none">
                            <option value="">全部</option>

                          </select>

                          <select class="form-control" name="ns_store_name" style="display: none">
                            <option value="">全部</option>
                            
                          </select>
                        </div>

                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label" >撰稿者</label>
                            <div class="col-md-10">
                              <input type="text" name="ns_reporter" class="form-control">
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label">關鍵字</label>
                            <div class="col-md-10">
                              <input type="text"  name="ns_keyWord" class="form-control" placeholder="可輸入二個以上字詞，以「,」或「空白」區隔均可">
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
      $('#search_ns_form').submit();
     });


     //-- 選擇單元分類 --
     $('[name="area_id"]').change(function(event) {
        $('[name="ns_nt_pk"]').html('<option value="">-- 全部 --</option>');
        $('[name="ns_nt_sp_pk"]').html('<option value="">-- 全部 --</option>');
         
         if ($(this).val()!='') {

          //-- 情報分類 --
          $.ajax({
            url: 'admin_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
              nt_sp:0,
              area_id: $(this).val()
            },
            success:function (data) {
              $.each(data, function(index, val) {
                 $('[name="ns_nt_pk"]').append('<option value="'+this['Tb_index']+'">'+this['nt_name']+'</option>');
              });
            }
          });
          //-- 特別議題分類 --
          $.ajax({
            url: 'admin_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
              nt_sp:1,
              area_id: $(this).val()
            },
            success:function (data) {
              $.each(data, function(index, val) {
                $('[name="ns_nt_sp_pk"]').append('<option value="'+this['Tb_index']+'">'+this['nt_name']+'</option>');
              });
            }
          });

        }

     });


     //-- 選擇商店 --
     $('[name="ns_store_area"]').change(function(event) {

      $('[name="ns_store_type"]').html('<option value="">全部</option>');
      $('[name="ns_store_s_type"]').html('<option value="">全部</option>');
      $('[name="ns_store_name"]').html('<option value="">全部</option>');

       if ($(this).val()!='') {
        
        //-- 集點店家、其他 --
        if ($(this).val()=='st2019013117015133' || $(this).val()=='st201901311701582') {

          $('[name="ns_store_type"]').css('display', 'inline-block');
          $('[name="ns_store_s_type"]').css('display', 'inline-block');
          $('[name="ns_store_name"]').css('display', 'inline-block');

          $.ajax({
            url: 'admin_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
              type:'store_type',
              st_type: $(this).val()
            },
            success:function (data) {
              $.each(data, function(index, val) {
                 $('[name="ns_store_type"]').append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
              });
            }
          });

        }
        else{
          $('[name="ns_store_type"]').css('display', 'none');
          $('[name="ns_store_s_type"]').css('display', 'none');
          $('[name="ns_store_name"]').css('display', 'inline-block');

          $.ajax({
            url: 'admin_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
              type:'store',
              st_type: $(this).val()
            },
            success:function (data) {
              $.each(data, function(index, val) {
                 $('[name="ns_store_name"]').append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
              });
            }
          });
        }

       }
       else{
         $('[name="ns_store_type"]').css('display', 'none');
         $('[name="ns_store_s_type"]').css('display', 'none');
         $('[name="ns_store_name"]').css('display', 'none');
       }
     });


     //-- 選擇商店主分類 --
     $('[name="ns_store_type"]').change(function(event) {
        
        $('[name="ns_store_s_type"]').html('<option value="">全部</option>');
        $('[name="ns_store_name"]').html('<option value="">全部</option>');

        $.ajax({
          url: 'admin_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
            type: 'store_s_type',
            st_main_type:$(this).val()
          },
          success:function (data) {
            $.each(data, function(index, val) {
                 $('[name="ns_store_s_type"]').append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
              });
          }
        });
     });


     //-- 選擇商店次分類 --
     $('[name="ns_store_s_type"]').change(function(event) {
        
        $('[name="ns_store_name"]').html('<option value="">全部</option>');

        $.ajax({
          url: 'admin_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
            type: 'store',
            st_type:$('[name="ns_store_area"]').val(),
            st_main_type:$('[name="ns_store_type"]').val(),
            st_second_type:$(this).val()
          },
          success:function (data) {
            $.each(data, function(index, val) {
                 $('[name="ns_store_name"]').append('<option value="'+this['Tb_index']+'">'+this['st_name']+'</option>');
              });
          }
        });
     });

  });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
