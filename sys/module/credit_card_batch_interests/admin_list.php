<?php include("../../core/page/header01.php");//載入頁面heaer01?>
<style type="text/css">
  #table_id_example_filter{ display: none; }
  .sorting_1{ display: none; }
  .d-none{ display: none; }
  .cc_orgLevel{ padding-left: 20px; }
  .show_cc_a{ display: block; }
  .cc_g_a{ display: block; }
  .cc_g_div{ display: none; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  // for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
  //   $data=["OrderBy"=>$_POST['OrderBy'][$i]];
  //   $where=["Tb_index"=>$_POST['Tb_index'][$i]];
  //   pdo_update('bank_info', $data, $where);
  // }
  
}

if ($_GET) {

}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

        <!-- <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序</button>

	    <a href="manager.php?MT_id=<?php //echo $_GET['MT_id'];?>">
        <button type="button" class="btn btn-default">
        <i class="fa fa-plus" aria-hidden="true"></i> 新增</button>
        </a> -->
	  </div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table id="table_id_example" class="display">
						<thead>
							<tr>
								<th>權益項目</th>
								<th style="width: 400px;">權益內容</th>
								<th>簡易權益內容</th>
								<th>附註資料</th>
								<th>量化規則</th>
								<th>適用信用卡</th>
								<th>修改</th>
                <th>刪除</th>
                <th class="d-none">順序</th>
							</tr>
						</thead>

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

     var table = $('#table_id_example').DataTable({
         "order": [[8,'asc']],
        	language:{
        "sProcessing": "處理中...",
        "sLengthMenu": "顯示 _MENU_ 項結果",
        "sZeroRecords": "没有匹配結果",
        "sInfo": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
        "sInfoEmpty": "顯示第 0 至 0 項結果，共 0 項",
        "sInfoFiltered": "(由 _MAX_ 項結果過濾)",
        "sInfoPostFix": "",
        "sSearch": "搜索:",
        "sUrl": "",
        "sEmptyTable": "表中數據為空",
        "sLoadingRecords": "載入中...",
        "sInfoThousands": ",",
        "oPaginate": {
            "sFirst": "首頁",
            "sPrevious": "上一頁",
            "sNext": "下一頁",
            "sLast": "末頁"
        },
        "oAria": {
            "sSortAscending": ": 以升序排列此列",
            "sSortDescending": ": 以降序排列此列"
        }
        	},
        "ajax": "admin_list_ajax.php"+location.search,
        "processing": true,
        "serverSide": true,
        "columns": [
            { "data": "eq_name" },
            { "data": "content" },
            { "data": "sm_content" },
            { "data": "note" },
            { "data": "number_data" },
            { "data": "group_id" },
            { "data": "update" },
            { "data": "delete" },
            { "data": "OrderBy" }
        ]

        //  initComplete: function () {

        //     this.api().columns([6]).every( function () {
        //         var column = this;
        //         var select = $('<select><option value=""></option></select>')
        //             .appendTo( $(column.footer()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );
 
        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );
 
        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     } );
        // },
       
      });

    //-- 刪除新聞 --
    $('#table_id_example tbody').on('click', '.del_news_btn', function(event) {
      var _this=$(this);
      event.preventDefault();
      if (confirm('是否確定要刪除 ['+$(this).parents('tr').find('td:nth-child(2)').html()+'] ? \r\n 按[確定]確定刪除 \r\n 按[取消]取消刪除')) {
        if (confirm('再次確定是否要刪除 ['+$(this).parents('tr').find('td:nth-child(2)').html()+'] ? \r\n 按[確定]確定刪除 \r\n 按[取消]取消刪除')) {
          $.ajax({
            url: 'admin_list_ajax.php',
            type: 'POST',
            data: {
              type:'delete',
              Tb_index: $(this).attr('Tb_index')
            },
            success:function () {
              table.draw();
            }
          });
          
        }
      }
      
    });

    $('#table_id_example').on('click', '.show_cc_a', function(event) {
      if($(this).next().css('display')=='none'){
        $(this).next().css('display', 'block');
        $(this).html('隱藏 <i class="fa fa-angle-up"></i>');
      }
      else{
        $(this).next().css('display', 'none');
        $(this).html('展開 <i class="fa fa-angle-down"></i>');
      }
    });
    
    $('#table_id_example').on('click', '.cc_g_a', function(event){
      if($(this).next().css('display')=='none'){
        $(this).next().css('display', 'block');
        $(this).find('i').attr('class', 'fa fa-angle-up');
      }
      else{
        $(this).next().css('display', 'none');
        $(this).find('i').attr('class', 'fa fa-angle-down');
      }
    });


		// $("#sort_btn").click(function(event) {
		        
  //       var arr_OrderBy=new Array();
  //       var arr_Tb_index=new Array();

  //         $(".sort_in").each(function(index, el) {
             
  //            arr_OrderBy.push($(this).val());
  //            arr_Tb_index.push($(this).attr('Tb_index'));
  //         });

  //         var data={ 
  //                       OrderBy: arr_OrderBy,
  //                      Tb_index: arr_Tb_index 
  //                     };
  //            ajax_in('admin.php', data, 'no', 'no');

  //         alert('更新排序');
  //        location.replace('admin.php?MT_id=<?php //echo $_GET['MT_id'];?>');
		// });
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
