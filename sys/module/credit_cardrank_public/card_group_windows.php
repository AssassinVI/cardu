<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('news_type', $data, $where);
  }
}

   
   //-- 發卡單位 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");



?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-default">
                 <div class="panel-heading">
                     選擇單卡
                 </div>
                 <div class="panel-body">
                     <form id="search_st_form" class="form-horizontal" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label"><span class="text-danger">*</span>發卡單位</label>
                     		<div class="col-md-10">
                     		  <select class="form-control" id="select_bank" name="cc_bi_pk">
                            <option value="">請選擇</option>
                     		  	<?php
                                 foreach ($row_bank as $row_bank_one) {
                                 	echo '<option value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     	</div>
                      
                      <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-danger">*</span>信用卡名稱</label>
                            <div class="col-md-10 ">
                              <select class="form-control" id="select_card" >
                               <option value="">請選擇</option>
                              </select>
                            </div>
                      </div>

                     <!--  <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-danger">*</span>信用卡卡等</label>
                            <div class="col-md-10 ">
                              <select class="form-control" id="select_card_level" >
                               <option value="">請選擇</option>
                              </select>
                            </div>
                      </div> -->

                      <input type="hidden" name="ccs_cc_bi_pk" value="">
                      <input type="hidden" name="ccs_cc_pk" value="">
                      <input type="hidden" name="ccs_cc_group_id" value="">
                      <input type="hidden" name="ccs_cc_cardlevel" value="">
                      <input type="hidden" name="ccs_cc_cardlvname" value="">

                     </form>
                 </div>
                 <div class="form-group">
                   <div class="col-md-12 text-center">
                       <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                       <button type="button" id="close_btn" class="btn btn-default btn-raised">取消</button>
                   </div>
                 </div>
             </div>
	</div>


   
	
</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

		
     $('#search_btn').click(function(event) {

          var err_txt='';
          err_txt = $('#select_bank :selected').val()=='' ? err_txt + '發卡單位，' :'' ;
          err_txt = $('#select_card :selected').val()=='' ? err_txt + '信用卡名稱，' :'' ; 
          //err_txt = $('#select_card_level :selected').val()=='' ? err_txt + '信用卡卡等' :'' ; 

          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");

          }
          else{
            
            var card_name=$('#select_bank :selected').html()+$('#select_card :selected').html();
            $("#ccs_cc_cardname",parent.document).val(card_name);



            $('[name="ccs_cc_bi_pk"]',parent.document).val($('[name="ccs_cc_bi_pk"]').val());
            $('[name="ccs_cc_group_id"]',parent.document).val($('[name="ccs_cc_group_id"]').val());
            $('[name="ccs_cc_pk"]',parent.document).val('');
            $('[name="ccs_cc_cardlevel"]',parent.document).val('');
            $('[name="ccs_cc_cardlvname"]',parent.document).val('');

            parent.jQuery.fancybox.close(); 
           }
     });


     //-- 取消 --
     $('#close_btn').click(function(event) {
       parent.jQuery.fancybox.close(); 
     });
     

     //-- 改變銀行 --
     $('#select_bank').change(function(event) {
       //-- ccs_cc_bi_pk暫存 --
       $('[name="ccs_cc_bi_pk"]').val($(this).val());

       if ($(this).val()!='') {
       	 $.ajax({
       	   url: 'card_windows_ajax.php',
       	   type: 'POST',
       	   dataType: 'json',
       	   data: {
       	   	type:'show_cc',
       	    cc_bi_pk: $(this).val(),
       	    show_stop_cc:$('#show_stop_cc:checked').val()
       	  },
       	  success:function (data) {

       	    $("#select_card").html('<option value="">請選擇</option>');
       	    
       	    //-- 正常使用 --
       	    $.each(data, function(index, val) {
       	      if (this['cc_group_state']=='0' || this['cc_group_state']=='3') {
       	      	$("#select_card").append('<option value="'+this['cc_group_id']+'">'+this['cc_cardname']+'</option>');

       	      }
       	    });
            
            //-- 停發/停卡 --
       	    $.each(data, function(index, val){
       	    	if (this['cc_group_state']=='1' || this['cc_group_state']=='2'){
                   $("#select_card").append('<option status="stop" value="'+this['cc_group_id']+'">'+this['cc_cardname']+'('+this['cc_status_name']+')</option>');
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
      
       //-- ccs_cc_group_id暫存 --
       $('[name="ccs_cc_group_id"]').val($(this).val());

       // if ($(this).val()!=''){
       //   $.ajax({
       //     url: 'card_windows_ajax.php',
       //     type: 'POST',
       //     dataType: 'json',
       //     data: {
       //      type:'show_cc_level',
       //      cc_group_id:$(this).val(),
       //      show_stop_cc:$('#show_stop_cc:checked').val()
       //    },
       //    success:function (data) {
       //      $("#select_card_level").html('<option value="">請選擇</option>');
            
       //      //-- 正常使用 --
       //      $.each(data, function(index, val) {
       //        if (this['cc_stop_publish']=='0' && this['cc_stop_card']=='0') {
       //          $("#select_card_level").append('<option level_id="'+this['cc_cardlevel']+'" value="'+this['Tb_index']+'">'+this['level_name']+'</option>');

       //        }
       //      });
            
       //      //-- 停發/停卡 --
       //      $.each(data, function(index, val){
       //        if (this['cc_stop_publish']=='1' || this['cc_stop_card']=='1'){
       //             $("#select_card_level").append('<option status="stop" level_id="'+this['cc_cardlevel']+'" value="'+this['Tb_index']+'">'+this['level_name']+'('+this['cc_status_name']+')</option>');
       //        }
       //      });
       //    }
       //   });
       // }
       // else{
       //   $("#select_card_level").html('<option value="">請選擇</option>');
       // }
     });


     //--------------- 選擇信用卡 ---------------------
     $('#select_card_level').change(function(event) {
       //-- ccs_cc_pk暫存 --
       //$('[name="ccs_cc_pk"]').val($(this).val());
       
       //-- ccs_cc_cardlevel暫存 --
       // $('[name="ccs_cc_cardlevel"]').val($(this).find(':selected').attr('level_id'));

       // var level_name=$(this).find(':selected').html().split('_');
       // level_name=level_name[1];
       // //-- ccs_cc_cardlvname暫存 --
       // $('[name="ccs_cc_cardlvname"]').val(level_name);

     });
    




  
  });


		
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>
