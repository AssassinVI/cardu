<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
 .search_div .panel-body{ height: 400px; overflow: auto; }  
</style>
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
                     		<label class="col-md-2 control-label"><span class="text-danger">*</span>選擇銀行</label>
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
                            <label class="col-md-2 control-label">關鍵字</label>
                            <div class="col-md-10 ">
                              <input type="text" class="form-control" id="keywords">
                            </div>
                      </div>



                      <input type="hidden" name="bank_id" value="">
                      <input type="hidden" name="ccard_id" value="">
                      <input type="hidden" name="ccard_group_id" value="">
                      <input type="hidden" name="card_level_id" value="">
                      <input type="hidden" name="card_level_name" value="">

                      <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                        </div>
                      </div>
                     </form>
                 </div>
             </div>
	</div>
  <div class="col-lg-4">
    <div class="panel panel-default search_div">
                 <div class="panel-heading">
                     查詢結果
                 </div>
                 <div class="panel-body">
                     <div class="table-responsive">
                                <table class="table no-margin table-hover">
                                  <thead>
                                    <tr>
                                      <th>選取</th>
                                      <th>銀行</th>
                                      <th>信用卡名稱</th>
                                      <th>卡等</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                  </tbody>
                                </table>
                              </div>
                 </div>
                 
             </div>

             <div class="form-group">
               <div class="col-md-12 text-center">
                   <button type="button" id="check_card_more_btn" class="btn btn-success btn-raised">加入選擇卡片</button>
                   <button type="button" id="close_btn" class="btn btn-default btn-raised">取消</button>
               </div>
             </div>
  </div>


   
	
</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
     
     var card_name_arr=sessionStorage.getItem("other_ccard_name")==null ? [] : sessionStorage.getItem("other_ccard_name").split(/\n/);
     var card_id_arr=sessionStorage.getItem("other_ccard_id")==null ? [] : sessionStorage.getItem("other_ccard_id").split(',');

     // console.log(card_name_arr);
     // console.log(card_id_arr);


		 //-- 搜尋信用卡 --
     $('#search_btn').click(function(event) {

          var err_txt='';
          err_txt = $('#select_bank :selected').val()=='' ? err_txt + '銀行，' :'' ;

          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");

          }
          else{
            $.ajax({
              url: 'card_windows_ajax.php',
              type: 'POST',
              dataType: 'json',
              data: {
                type: 'show_cc_level_more',
                cc_bi_pk: $('#select_bank').val(),
                keywords: $('#keywords').val()
              },
              success:function (data) {
                $('.table-responsive tbody').html('');

                $.each(data, function(index, val) {

                if (card_name_arr[0]!=undefined) {
                  var check_card=card_id_arr.indexOf(this['Tb_index'])==-1 ? '':'checked';
                }
                else{
                  var check_card='';
                }
                 
                  var txt='<tr>'+
                             ' <td><input '+check_card+' type="checkbox" name="ccard_name" card_id="'+this['Tb_index']+'" value="'+$('#select_bank :selected').html()+this['cc_cardname']+this['level_name']+'"></td>'+
                             ' <td>'+$('#select_bank :selected').html()+'</td>'+
                             ' <td>'+this['cc_cardname']+'</td>'+
                             '<td>'+this['level_name']+'</td>'+
                          '</tr>';
                  $('.table-responsive tbody').append(txt);
                });
              }
            });

            //parent.jQuery.fancybox.close(); 
           }
     });


     //-- 加入選擇卡片 --
     $('#check_card_more_btn').click(function(event) {
       var card_name=card_name_arr.join('\n');
       var card_id=card_id_arr.join(',');

       // card_name=card_name.slice(0,-1);
       //card_id=card_id.slice(0,-1);
        $('[name="ccs_typename_03"]', parent.document).val(card_name);
        $('[name="ccs_cc_pk2"]', parent.document).val(card_id);

        $('[name="ccs_typename_03"]', parent.document).prop('readonly', true);

        //-- 記錄暫存 --
        sessionStorage.setItem("other_ccard_name", card_name);
        sessionStorage.setItem("other_ccard_id", card_id);

        parent.jQuery.fancybox.close(); 
     });



     //-- 取消 --
     $('#close_btn').click(function(event) {
       parent.jQuery.fancybox.close(); 
     });



     //-- 勾選卡片 --
     $('.table-responsive tbody').on('change', '[name="ccard_name"]', function(event) {
     	//-- 勾選 --
     	if ($(this).prop('checked')==true) {
           card_name_arr.push($(this).val());
           card_id_arr.push($(this).attr('card_id'));
     	}
     	else{
           
           var del_card_index=card_id_arr.indexOf($(this).attr('card_id'));
           card_id_arr.splice(del_card_index,1);
           card_name_arr.splice(del_card_index,1);
     	}

     	// console.log(card_name_arr);
     	// console.log(card_id_arr);
     });


     

     //-- 改變銀行 --
     // $('#select_bank').change(function(event) {
     //   //-- bank_id暫存 --
     //   $('[name="bank_id"]').val($(this).val());

     //   if ($(this).val()!='') {
     //   	 $.ajax({
     //   	   url: 'card_windows_ajax.php',
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



     //-- 改變信用卡 --
     // $('#select_card').change(function(event) {
      
     //   //-- ccard_group_id暫存 --
     //   $('[name="ccard_group_id"]').val($(this).val());

     //   if ($(this).val()!=''){
     //     $.ajax({
     //       url: 'card_windows_ajax.php',
     //       type: 'POST',
     //       dataType: 'json',
     //       data: {
     //        type:'show_cc_level',
     //        cc_group_id:$(this).val(),
     //        show_stop_cc:$('#show_stop_cc:checked').val()
     //      },
     //      success:function (data) {
     //        $("#select_card_level").html('<option value="">請選擇</option>');
            
     //        //-- 正常使用 --
     //        $.each(data, function(index, val) {
     //          if (this['cc_stop_publish']=='0' && this['cc_stop_card']=='0') {
     //            $("#select_card_level").append('<option level_id="'+this['cc_cardlevel']+'" value="'+this['Tb_index']+'">'+this['level_name']+'</option>');

     //          }
     //        });
            
     //        //-- 停發/停卡 --
     //        $.each(data, function(index, val){
     //          if (this['cc_stop_publish']=='1' || this['cc_stop_card']=='1'){
     //               $("#select_card_level").append('<option status="stop" level_id="'+this['cc_cardlevel']+'" value="'+this['Tb_index']+'">'+this['level_name']+'('+this['cc_status_name']+')</option>');
     //          }
     //        });
     //      }
     //     });
     //   }
     //   else{
     //     $("#select_card_level").html('<option value="">請選擇</option>');
     //   }
     // });


     //--------------- 選擇信用卡 ---------------------
     // $('#select_card_level').change(function(event) {
     //   //-- ccard_id暫存 --
     //   $('[name="ccard_id"]').val($(this).val());
       
     //   //-- card_level_id暫存 --
     //   $('[name="card_level_id"]').val($(this).find(':selected').attr('level_id'));

     //   var level_name=$(this).find(':selected').html().split('_');
     //   level_name=level_name[1];
     //   //-- card_level_name暫存 --
     //   $('[name="card_level_name"]').val(level_name);

     // });



  
  });


		
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>
