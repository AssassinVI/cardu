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

   
   //-- 發卡單位 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");

}

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-success">
                 <div class="panel-heading">
                     批次管理(權益)
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
                                 	echo '<option value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     	</div>
                     	
                      <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-danger">*</span>權益項目</label>
                            <div class="col-md-10 ">
                              <select class="form-control" id="select_interests" >
                               <option value="">請選擇</option>
                               <option value="all">全部權益</option>
                               <option value="import">重要權益</option>
                               <?php 
                                $row_in=$NewPdo->select("SELECT Tb_index, eq_name FROM card_eq_item WHERE mt_id='site2019021216245137' ORDER BY OrderBy ASC");
                                foreach ($row_in as $in_one) {
                                   echo '<option value="'.$in_one['Tb_index'].'">'.$in_one['eq_name'].'</option>';
                                }
                               ?>
                              </select>
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label">信用卡狀態</label>
                            <div class="col-md-10">
                              <label><input type="checkbox" id='show_stop_cc' name="show_stop_cc" value="1"> 顯示停發或停卡</label>
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

          var err_txt='';
          err_txt = $('#select_bank :selected').val()=='' ? err_txt + '發卡單位，' :'' ;
          err_txt = $('#select_interests :selected').val()=='' ? err_txt + '權益項目，' :'' ; 

          if (err_txt!='') {
           err_txt=err_txt.slice(0,-1);
           alert("請選擇"+err_txt+"!!");
          }
          else{
            var show_stop_cc=$('#show_stop_cc').prop('checked')===true ? '&show_stop_cc=1': '';
            location.href="admin_list.php?bi_pk="+$('#select_bank').val()+"&eq_pk="+$('#select_interests').val()+show_stop_cc;
           }
     });
     

     //-- 改變銀行 --
     // $('#select_bank').change(function(event) {

     //   if ($(this).val()!='') {
     //   	 $.ajax({
     //   	   url: 'admin_ajax.php',
     //   	   type: 'POST',
     //   	   dataType: 'json',
     //   	   data: {
     //   	   	type:'show_cc',
     //   	    cc_bi_pk: $(this).val(),
     //   	    show_stop_cc:$('#show_stop_cc:checked').val()
     //   	  },
     //   	  success:function (data) {
     //   	    $("#select_card").html('<option value="">請選擇</option>');
       	    
     //   	    //-- 正常使用 --
     //   	    $.each(data, function(index, val) {
     //   	      if (this['cc_group_state']=='0' || this['cc_group_state']=='3') {
     //   	      	$("#select_card").append('<option value="'+this['cc_group_id']+'">'+this['cc_cardname']+'</option>');

     //   	      }
     //   	    });
            
     //        //-- 停發/停卡 --
     //   	    $.each(data, function(index, val){
     //   	    	if (this['cc_group_state']=='1' || this['cc_group_state']=='2'){
     //               $("#select_card").append('<option status="stop" value="'+this['cc_group_id']+'">'+this['cc_cardname']+'('+this['cc_status_name']+')</option>');
     //   	    	}
     //   	    });
     //   	  }
     //   	 });
     //   }
     //   else{
     //   	 $("#select_card").html('<option value="">請選擇</option>');
     //   }
       
     // });








     //-- 顯示停發或停卡 --
     $('#show_stop_cc').change(function(event) {

     	if ($(this).prop('checked')==true) {
     	  $.ajax({
       	   url: 'admin_ajax.php',
       	   type: 'POST',
       	   dataType: 'json',
       	   data: {
       	   	type:'show_cc',
       	    cc_bi_pk: $('#select_bank').val(),
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
     	  $('#select_card [status="stop"]').remove();
     	}

     });

  
  });


  $(window).on('load', function(event) {
    // $.ajax({
    //      url: 'admin_ajax.php',
    //      type: 'POST',
    //      dataType: 'json',
    //      data: {
    //       type:'show_cc',
    //       cc_bi_pk: $('#select_bank').val(),
    //       show_stop_cc:$('#show_stop_cc:checked').val()
    //     },
    //     success:function (data) {
          
    //       $("#select_card").html('<option value="">請選擇</option>');
       	    
    //    	    //-- 正常使用 --
    //    	    $.each(data, function(index, val) {
    //    	      if (this['cc_group_state']=='0' || this['cc_group_state']=='3') {
    //    	      	$("#select_card").append('<option value="'+this['cc_group_id']+'">'+this['cc_cardname']+'</option>');

    //    	      }
    //    	    });
            
    //         //-- 停發/停卡 --
    //    	    $.each(data, function(index, val){
    //    	    	if (this['cc_group_state']=='1' || this['cc_group_state']=='2'){
    //                $("#select_card").append('<option status="stop" value="'+this['cc_group_id']+'">'+this['cc_cardname']+'('+this['cc_status_name']+')</option>');
    //    	    	}
    //    	    });
    //     }
    //    });
  });

		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
