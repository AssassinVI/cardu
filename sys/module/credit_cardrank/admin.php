<?php 
include("../../core/page/header01.php");//載入頁面heaer01
?>
<style type="text/css">
  .table > thead > tr > th, .table > tbody > tr > td{ padding: 2px 5px; vertical-align: middle;}
  .table > tbody > tr:nth-child(odd) { background-color: #e1e1e1; }
  .table > tbody > tr:hover{ background-color: #bababa; }
  td .btn{ padding: 1px 5px; }
  .btn-link:hover{ color: #000; border: 1px solid; }
</style>
<?php
include("../../core/page/header02.php");//載入頁面heaer02
?>
<?php 
if ($_POST) {
   
}

if ($_GET) {

   
   //-- 發卡單位 --
   $row_rank_type=$NewPdo->select("SELECT * FROM credit_cardrank_type WHERE cc_so_status!=0 ORDER BY cc_so_order ASC");


}

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-success">
                 <div class="panel-heading text-center">
                     查詢卡排行
                 </div>
                 <div class="panel-body">

                     <form id="search_st_form" class="form-inline" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	<div class="form-group ">
                     		<label class=" control-label"><span class="text-danger">*</span>卡排行分類：</label>
                     		
                     		  <select class="form-control" id="select_rank_type" name="cc_bi_pk">
                            <option value="">請選擇</option>
                     		  	<?php
                                 foreach ($row_rank_type as $row_rank_type_one) {
                                  if ($_GET['rank_type_id']==$row_rank_type_one['Tb_index']) {
                                    echo '<option selected value="'.$row_rank_type_one['Tb_index'].'"> '.$row_rank_type_one['cc_so_cname'].'</option>';
                                  }
                                  else{
                                    echo '<option value="'.$row_rank_type_one['Tb_index'].'"> '.$row_rank_type_one['cc_so_cname'].'</option>';
                                  }
                                 	
                                 }
                     		  	?>
                     		  </select>
                     	</div>

                      <div class="form-group">
                        <div class="text-right">
                            <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                        </div>
                      </div>
                     </form>
                 </div>
             </div>
	</div>

  <div id="rank_list" style="display: none;" class="col-lg-12">
          <div class="panel panel-success">
                     <div class="panel-heading text-center">
                        <span> 卡排行分類名稱排行 </span>
                        <div class="panel_tool_div">
                          <a href="#" class="btn btn-default btn-xs">新增卡排行分類名稱排行資料</a>
                        </div>
                     </div>
                     <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="nowrap">排行分類</th>
                                    <th class="nowrap">信用卡名稱</th>
                                    <th class="nowrap">點閱數</th>
                                    <th class="nowrap">辦卡數</th>
                                    <th class="nowrap item1">項目1名稱</th>
                                    <th class="nowrap item1_rank">排列順序▼</th>
                                    <th class="nowrap item2">項目2名稱</th>
                                    <th class="nowrap item2_rank">排列順序</th>
                                    <th class="nowrap item3">項目3名稱</th>
                                    <th class="nowrap item3_rank">排列順序</th>
                                    <th class="nowrap">備忘說明</th>
                                    <th>預覽</th>
                                    <th>修改</th>
                                    <th>刪除</th>
                                </tr>
                                </thead>
                                <tbody>

                                
                                
                                </tbody>
                            </table> 
                          </div>

                          <div id="sort_btn_div" class="dis-none text-center">                       
                            <button type="button" id="sort_btn" class="btn btn-success btn-raised px-2">排序</button>
                            <button type="button" id="reset_btn" class="btn btn-danger btn-flat px-2">取消</button>
                          </div>
                          <!-- 目前排序項目 -->
                          <input type="hidden" name="rank_item" value="1">
                     </div>
                 </div>

                
  </div>

</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {


    //-- 直接顯示卡排行 --
    if ($('#select_rank_type').val()!='') {
      //-- 顯示卡排行資訊 --
      show_rank();
    }



		 
     //-- 選擇卡排行分類 --
     $('#search_btn').click(function(event) {
      var err_txt='';
          err_txt = $('#select_rank_type :selected').val()=='' ? err_txt + '卡排行分類，' :'' ;

          if (err_txt!='') {
           alert("請輸入"+err_txt+"!!");

          }
          else{
             //-- 顯示卡排行資訊 --
             show_rank();
             $('[name="rank_item"]').val('1');
             $('.item1_rank').html('排列順序▼');
           }
     });
     





     //-- 拖曳更新排序 --
       $( ".table-responsive .table tbody" ).sortable({

             revert: 300,
             update: function( event, ui ) {
              $("#sort_btn_div").css('display', 'block');
             }
        });




      //-- 更新排序 --
        $("#sort_btn").click(function(event) {
                
             var arr_Tb_index=new Array();

               $(".sort_in").each(function(index, el) {
                  arr_Tb_index.push($(this).val());
               });

                $.ajax({
                  url: 'admin_ajax.php',
                  type: 'POST',
                  data: { 
                          type:'update_rank',
                          rank_item:$('[name="rank_item"]').val(),
                          Tb_index: arr_Tb_index
                  },
                  success:function (data) {
                    //-- 顯示卡排行資訊 --
                    show_rank($('[name="rank_item"]').val());
                    $("#sort_btn_div").css('display', 'none');
                  }
                });
        });




       //-- 快速排序(上) --
       $('#rank_list tbody').on('click', '.fast_rank_up', function(event) {

          var Tb_index_this=$(this).parents('tr').find('.sort_in').val();
          var Tb_index_up=$(this).parents('tr').prev().find('.sort_in').val();
          var rank_sort_this=$(this).parents('tr').find('.sort_in_num').val();
          var rank_sort_up=$(this).parents('tr').prev().find('.sort_in_num').val();



          $.ajax({
           url: 'admin_ajax.php',
           type: 'POST',
           data: {
             type:'update_fast_rank',
             Tb_index1: Tb_index_this,
             Tb_index2: Tb_index_up,
             rank_sort1: rank_sort_this,
             rank_sort2: rank_sort_up,
             rank_item:$('[name="rank_item"]').val()
           },
           success:function (data) {
             
             //-- 顯示卡排行資訊 --
             show_rank($('[name="rank_item"]').val());
           }
         });
       });




       //-- 快速排序(下) --
       $('#rank_list tbody').on('click', '.fast_rank_down', function(event) {

          var Tb_index_this=$(this).parents('tr').find('.sort_in').val();
          var Tb_index_up=$(this).parents('tr').next().find('.sort_in').val();
          var rank_sort_this=$(this).parents('tr').find('.sort_in_num').val();
          var rank_sort_up=$(this).parents('tr').next().find('.sort_in_num').val();

          $.ajax({
           url: 'admin_ajax.php',
           type: 'POST',
           data: {
             type:'update_fast_rank',
             Tb_index1: Tb_index_this,
             Tb_index2: Tb_index_up,
             rank_sort1: rank_sort_this,
             rank_sort2: rank_sort_up,
             rank_item:$('[name="rank_item"]').val()
           },
           success:function (data) {
             
             //-- 顯示卡排行資訊 --
             show_rank($('[name="rank_item"]').val());
           }
         });
       });




      //-- 取消排序 --
      $('#reset_btn').click(function(event) {
        //-- 顯示卡排行資訊 --
        show_rank($('[name="rank_item"]').val());
        $("#sort_btn_div").css('display', 'none');
      });





      //-- 刪除卡排行 --
      $('#rank_list tbody').on('click', '.del_crank', function(event) {
        var Tb_index=$(this).parents('tr').find('.sort_in').val();
        var ccs_cc_cardname=$(this).parents('tr').find('.ccs_cc_cardname').html();
        if (confirm('是否確認刪除"'+ccs_cc_cardname+'"? \n 按「確定」確定刪除 \n 按「取消」取消刪除')) {
           if (confirm('是否再次確認刪除"'+ccs_cc_cardname+'"? \n 按「確定」確定刪除 \n 按「取消」取消刪除')) {
             $.ajax({
               url: 'admin_ajax.php',
               type: 'POST',
               data: {
                type: 'del_rank',
                Tb_index: Tb_index
              },
              success:function (data) {
                //-- 顯示卡排行資訊 --
                show_rank($('[name="rank_item"]').val());
              }
             });
             
           }
        }
      });

  
  });


//-- 顯示卡排行分類資訊 --
function show_rank_type(Tb_index) {
 $.ajax({
   url: 'admin_ajax.php',
   type: 'POST',
   dataType: 'json',
   data: {
    type:'show_rank_type',
    Tb_index: Tb_index
   },
   success:function (data) {
     $('#rank_list').css('display', 'block');
     $('.panel-heading span').html(data['cc_so_cname']+'排行');
     $('.panel-heading .panel_tool_div a').attr('href', 'manager.php?MT_id=<?php echo$_GET['MT_id']; ?>&rank_type_id='+data['Tb_index']);
     $('.panel-heading .panel_tool_div a').html('新增'+data['cc_so_cname']+'排行資料');
     $('#rank_list thead .item1').html(data['cc_so_type_01_cname']);
     $('#rank_list thead .item2').html(data['cc_so_type_02_cname']);
     $('#rank_list thead .item3').html(data['cc_so_type_03_cname']);

     //-- 判斷可排序項目 --
     if ($('[name="rank_item"]').val()=='1') {
       if (data['cc_so_type_02_order']=='1') {
         $('#rank_list thead .item2_rank').html('<a id="crank_sort2" href="javascript:change_rank(2);">排列順序</a>');
       }
       else{
         $('#rank_list thead .item2_rank').html('排列順序');
       }
       
       if (data['cc_so_type_03_order']=='1') {
         $('#rank_list thead .item3_rank').html('<a id="crank_sort3" href="javascript:change_rank(3);">排列順序</a>');
       }
       else{
         $('#rank_list thead .item3_rank').html('排列順序');
       }
     }
   }
 });
 
}



//-- 顯示卡排行資訊 --
function show_rank(rank_item=1) {
   
   $.ajax({
     url: 'admin_ajax.php',
     type: 'POST',
     dataType: 'json',
     data: {
      type:'show_rank',
      rank_item: rank_item,
      ccs_cc_so_pk: $('#select_rank_type').val()
     },
     success:function (data) {
       
       //-- 顯示卡排行分類資訊 --
       show_rank_type($('#select_rank_type').val());
       
       $('#rank_list tbody').html('');
       
       var data_total=data.length-1;

       $.each(data, function(index, val) {
          
          var ccs_order_UpDown=['','',''];
          if (index==0) {
            ccs_order_UpDown[parseInt(rank_item)-1]='<a class="fast_rank_down" href="javascript:;">▼</a>';
          }
          else if(index==data_total){
            ccs_order_UpDown[parseInt(rank_item)-1]='<a class="fast_rank_up" href="javascript:;">▲</a>';
          }
          else{
            ccs_order_UpDown[parseInt(rank_item)-1]='<a class="fast_rank_up" href="javascript:;">▲</a><a class="fast_rank_down" href="javascript:;">▼</a>';
          }
          

          if (rank_item=='1') {
            var sort_in_num=this['ccs_order'];
          }
          else if(rank_item=='2'){
            var sort_in_num=this['ccs_order2'];
          }
          else if(rank_item=='3'){
            var sort_in_num=this['ccs_order3'];
          }
          
          
          var txt='<tr>'+
                          '<td>'+$('#select_rank_type :selected').html()+'</td>'+
                          '<td class="ccs_cc_cardname">'+this['ccs_cc_cardname']+'</td>'+
                          '<td>'+this['ccs_cc_viewcount']+'</td>'+
                          '<td>'+this['ccs_cc_assigncount']+'</td>'+
                          '<td>'+this['ccs_typename_01']+'</td>'+
                          '<td>'+this['ccs_order']+ccs_order_UpDown[0]+'</td>'+
                          '<td>'+this['ccs_typename_02']+'</td>'+
                          '<td>'+this['ccs_order2']+ccs_order_UpDown[1]+'</td>'+
                          '<td>'+nl2br( this['ccs_typename_03'] )+'</td>'+
                          '<td>'+this['ccs_order3']+ccs_order_UpDown[2]+'</td>'+
                          '<td>'+this['ccs_memo']+'</td>'+
                          '<td class="tool-width"><a href="javascript:;" onclick="window.open(\'../credit_cardrank_public/newsView_windows.php?Tb_index='+this['Tb_index']+'\', \'預覽\', config=\'height=800,width=900\');" class="btn btn-link"><i class="fa fa-binoculars" aria-hidden="true"></i>預覽</a></td>'+
                          '<td class="tool-width"><a class="btn btn-link" href="manager.php?MT_id=site2019033016121894&rank_type_id='+this['ccs_cc_so_pk']+'&Tb_index='+this['Tb_index']+'"><i class="fa fa-pencil-square" aria-hidden="true"></i>修改</a></td>'+
                          '<td class="tool-width"><a class="btn btn-link del_crank" href="javascript:;"><i class="fa fa-trash" aria-hidden="true"></i>刪除</a></td>'+
                          '<input type="hidden" class="sort_in" name="ccs_order[]" value="'+this['Tb_index']+'">'+
                          '<input type="hidden" class="sort_in_num"  value="'+sort_in_num+'">'+
                      '</tr>';

         $('#rank_list tbody').append(txt);
       });
     }
   });
}




//-- 切換排序項目 --
function change_rank(rank_item) {
  var old_rank_item=$('[name="rank_item"]').val();
  var new_rank_item=rank_item;

  $('.item'+old_rank_item+'_rank').html('<a id="crank_sort'+old_rank_item+'" href="javascript:change_rank('+old_rank_item+');">排列順序</a>');
  $('.item'+new_rank_item+'_rank').html('排列順序▼');
  $('[name="rank_item"]').val(rank_item);
  //-- 顯示卡排行資訊 --
  show_rank(rank_item);
}

		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
