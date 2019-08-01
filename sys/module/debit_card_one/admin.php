<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 


if ($_GET) {

   
   //-- 發卡單位 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");

}

?>


<div class="wrapper wrapper-content animated fadeInRight">

			<div class="panel panel-success" style="width: 700px;">
                 <div class="panel-heading">
                     修改單卡權益
                 </div>
                 <div class="panel-body">
                     <form id="search_st_form" class="form-horizontal" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label"><span class="text-danger">*</span>發卡單位</label>
                     		<div class="col-md-10">
                     		  <select class="form-control" id="select_bank" name="dc_bi_pk">
                            <option value="">請選擇</option>
                     		  	<?php
                                 foreach ($row_bank as $row_bank_one) {
                                 	echo '<option value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     	</div>

                     	<div class="form-group">
                     	      <label class="col-md-2 control-label">信用卡狀態</label>
                     	      <div class="col-md-10">
                     	        <label><input type="checkbox" id='show_stop_dc' name="show_stop_dc" value="show_stop"> 顯示停發或停卡</label>
                     	      </div>
                     	</div>
                      
                      <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-danger">*</span>金融卡名稱</label>
                            <div class="col-md-10 ">
                              <select class="form-control" id="select_card" >
                               <option value="">請選擇</option>
                              </select>
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-danger">*</span>金融卡卡等</label>
                            <div class="col-md-10 ">
                              <select class="form-control" id="select_card_level" >
                               <option value="">請選擇</option>
                              </select>
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

</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {

		
     $('#search_btn').click(function(event) {

          var err_txt='';
          err_txt = $('#select_bank :selected').val()=='' ? err_txt + '發卡單位，' :'' ;
          err_txt = $('#select_card :selected').val()=='' ? err_txt + '信用卡名稱，' :'' ; 
          err_txt = $('#select_card_level :selected').val()=='' ? err_txt + '信用卡卡等' :'' ; 

          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");

          }
          else{
            
            location.href="manager.php?MT_id=<?php echo $_GET['MT_id'];?>&Tb_index="+$('#select_card_level').val();
           }
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
       	    show_stop_dc:$('#show_stop_dc:checked').val()
       	  },
       	  success:function (data) {
       	    $("#select_card").html('<option value="">請選擇</option>');
       	    
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



     //-- 改變信用卡 --
     $('#select_card').change(function(event) {
       if ($(this).val()!=''){
         $.ajax({
           url: 'admin_ajax.php',
           type: 'POST',
           dataType: 'json',
           data: {
            type:'show_dc_level',
            dc_group_id:$(this).val(),
            show_stop_dc:$('#show_stop_dc:checked').val()
          },
          success:function (data) {
            $("#select_card_level").html('<option value="">請選擇</option>');

            //-- 只有單張直接選取 --
            var sel_one_card=data.length==1 ? 'selected':'';
            
            //-- 正常使用 --
            $.each(data, function(index, val) {
              if (this['dc_stop_publish']=='0' && this['dc_stop_card']=='0') {
                $("#select_card_level").append('<option '+sel_one_card+' value="'+this['Tb_index']+'">'+this['level_name']+'</option>');

              }
            });
            
            //-- 停發/停卡 --
            $.each(data, function(index, val){
              if (this['dc_stop_publish']=='1' || this['dc_stop_card']=='1'){
                   $("#select_card_level").append('<option '+sel_one_card+' status="stop" value="'+this['Tb_index']+'">'+this['level_name']+'('+dc_status_name[this['dc_group_state']]+')</option>');
              }
            });
          }
         });
       }
       else{
         $("#select_card_level").html('<option value="">請選擇</option>');
       }
     });




     //-- 顯示停發或停卡 --
     $('#show_stop_dc').change(function(event) {

     	if ($(this).prop('checked')==true) {
     	  $.ajax({
       	   url: 'admin_ajax.php',
       	   type: 'POST',
       	   dataType: 'json',
       	   data: {
       	   	type:'show_dc',
       	    dc_bi_pk: $('#select_bank').val(),
       	    show_stop_dc:$('#show_stop_dc:checked').val()
       	  },
       	  success:function (data) {
       	  	$("#select_card").html('<option value="">請選擇</option>');
            
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
     	  $('#select_card [status="stop"]').remove();
     	}

     });

  
  });


  $(window).on('load', function(event) {
    $.ajax({
         url: 'admin_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
          type:'show_dc',
          dc_bi_pk: $('#select_bank').val(),
          show_stop_dc:$('#show_stop_dc:checked').val()
        },
        success:function (data) {
          
          $("#select_card").html('<option value="">請選擇</option>');
       	    
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
  });

		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
