<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['Tb_index']) ; $i++) { 
    $data=["ccs_order"=>($i+1)];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('credit_cardrank', $data, $where);
  }
}

if ($_GET) {

   
   //-- 發卡單位 --
   $row_rank_type=$NewPdo->select("SELECT * FROM credit_cardrank_type WHERE cc_so_status!=0 ORDER BY cc_so_order ASC");

}

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-success">
                 <div class="panel-heading text-center">
                     查詢卡排行
                 </div>
                 <div class="panel-body">
                     <form id="search_st_form" class="form-horizontal" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label"><span class="text-danger">*</span>卡排行分類</label>
                     		<div class="col-md-10">
                     		  <select class="form-control" id="select_rank_type" name="cc_bi_pk">
                            <option value="">請選擇</option>
                     		  	<?php
                                 foreach ($row_rank_type as $row_rank_type_one) {
                                 	echo '<option value="'.$row_rank_type_one['Tb_index'].'"> '.$row_rank_type_one['cc_so_cname'].'</option>';
                                 }
                     		  	?>
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
	</div>

  <div class="col-lg-12">
          <div class="panel panel-success">
                     <div class="panel-heading text-center">
                         現金回饋排行
                        <div class="panel_tool_div">
                          <a href="#" class="btn btn-default btn-xs">新增現金回饋排行資料</a>
                        </div>
                     </div>
                     <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>排行分類</th>
                                    <th>信用卡名稱</th>
                                    <th>點閱數</th>
                                    <th>辦卡數</th>
                                    <th>項目1名稱</th>
                                    <th>排列順序</th>
                                    <th>項目2名稱</th>
                                    <th>排列順序</th>
                                    <th>項目3名稱</th>
                                    <th>排列順序</th>
                                    <th>備忘說明</th>
                                    <th>預覽</th>
                                    <th>修改</th>
                                    <th>刪除</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>1</td>
                                    <td>Mark</td>

                                    <input type="hidden" class="sort_in" name="ccs_order[]" value="<?php echo $row['Tb_index'];?>">
                                </tr>
                                
                                </tbody>
                            </table> 
                          </div>
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
          err_txt = $('#select_rank_type :selected').val()=='' ? err_txt + '卡排行分類，' :'' ;

          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");

          }
          else{
            
            location.href="manager.php?MT_id=<?php echo $_GET['MT_id'];?>&cc_group_id="+$('#select_card').val();
           }
     });
     

     //-- 拖曳更新排序 --
       $( ".table-responsive .table tbody" ).sortable({

             revert: 300,
             update: function( event, ui ) {
              $("#sort_btn").css('display', 'inline-block');
             }
        });

      //-- 更新排序 --
        $("#sort_btn").click(function(event) {
                
             var arr_Tb_index=new Array();

               $(".sort_in").each(function(index, el) {
                  
                  arr_Tb_index.push($(this).val());
               });

               var data={ 
                            Tb_index: arr_Tb_index 
                           };
                ajax_in('admin.php', data, 'no', 'no');

              alert('更新排序');
              location.replace('admin.php?MT_id=<?php echo $_GET['MT_id'];?>');
        });

  
  });


  $(window).on('load', function(event) {
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
  });

		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
