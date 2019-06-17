<?php include("../../core/page/header01.php");//載入頁面heaer01?>
<style type="text/css">
  #table_id_example_filter{ display: none; }
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
  
  //-- 搜尋URL --
  $news_ajax_url='member_ajax.php?MT_id='.$_GET['MT_id'].
  '&area_id='.$_POST['area_id'].
  '&ns_nt_pk='.$_POST['ns_nt_pk'].
  '&ns_nt_sp_pk='.$_POST['ns_nt_sp_pk'].

  '&ns_store='.$_POST['ns_store_name'].
  '&st_type='.$_POST['ns_store_area'].
  '&st_main_type='.$_POST['ns_store_type'].
  '&st_second_type='.$_POST['ns_store_s_type'].
  
  '&activity_s_date='.$_POST['activity_s_date'].
  '&activity_e_date='.$_POST['activity_e_date'].
  '&StartDate='.$_POST['StartDate'].
  '&EndDate='.$_POST['EndDate'].
  '&ns_st_vfdate='.$_POST['ns_st_vfdate'].
  '&ns_en_vfdate='.$_POST['ns_en_vfdate'].
  '&ns_verify='.$_POST['ns_verify'].
  '&ns_reporter='.$_POST['ns_reporter'].
  '&ns_keyWord='.$_POST['ns_keyWord'];
}

if ($_GET) {

}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

       <!--  <button id="sort_btn" type="button" class="btn btn-default">
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
                <th>版區分類</th>
								<th>主分類</th>
								<th>主標題</th>
                <th>商店名稱</th>
                <th>卡組織/銀行</th>
								<th>點閱數(PC)</th>
								<th>點閱數(手機)</th>
								<th>FB按讚數</th>
								<th>情報狀態</th>
                <th>活動期間</th>
								<th>上架期間</th>
                <th>撰稿者</th>
                <th>審核者</th>
                <th>審核時間</th>
                
								
								<th>管理</th>

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
        //"order": [[13,'desc']],
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
         //-- GET 數過多導致資訊錯誤 (少兩列就正常) --
        "ajax": {
          url:"<?php echo $news_ajax_url;?>"
         
        },
        "processing": true,
        "serverSide": true
        // "columns": [
        //     { "data": "bi_code" },
        //     { "data": "bi_shortname" },
        //     { "data": "bi_logo" },
        //     { "data": "bi_tel" },
        //     { "data": "bi_tel_card" },
        //     { "data": "bi_addr" },
        //     { "data": "OnLineOrNot" },
        //     { "data": "tool_btn" }
        // ],

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
      if (confirm('是否確定要刪除 ['+$(this).parents('tr').find('td:nth-child(3)').html()+'] ? \r\n 按[確定]確定刪除 \r\n 按[取消]取消刪除')) {
        if (confirm('再次確定是否要刪除 ['+$(this).parents('tr').find('td:nth-child(3)').html()+'] ? \r\n 按[確定]確定刪除 \r\n 按[取消]取消刪除')) {
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
