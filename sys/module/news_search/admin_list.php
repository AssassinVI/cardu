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
  $news_ajax_url='admin_list_ajax.php?MT_id='.$_GET['MT_id'].
  '&ns_nt_pk='.$_POST['ns_nt_pk'].
  '&ns_nt_sp_pk='.$_POST['ns_nt_sp_pk'].
  '&StartDate='.$_POST['StartDate'].
  '&EndDate='.$_POST['EndDate'].
  '&ns_st_vfdate='.$_POST['ns_st_vfdate'].
  '&ns_en_vfdate='.$_POST['ns_en_vfdate'].
  '&ns_verify='.$_POST['ns_verify'].
  '&ns_bank='.$_POST['ns_bank'].
  '&ns_reporter='.$_POST['ns_reporter'].
  '&ns_keyWord='.$_POST['ns_keyWord'];
}

if ($_GET) {

}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
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
        <div class="text-right">
          <?php 
           if (!empty($_POST['ns_nt_pk'])) {
          ?>
            <a href="javascript:;" onclick="window.open('../news_public/news_sort_windows.php?ns_nt_pk=<?php echo $_POST['ns_nt_pk'];?>', '文章排序', config='height=800,width=1450');" >文章排序</a>
          <?php
           }
          ?>
          
        </div>
        
				<div class="table-responsive">
					<table id="table_id_example" class="display">
						<thead>
							<tr>
								<th>主分類</th>
								<th>主標題</th>
								<th>點閱數(PC)</th>
								<th>點閱數(手機)</th>
								<th>FB按讚數</th>
								<th>新聞狀態</th>
								<th>上架期間</th>
                <th>記者/作者</th>
                <th>審核者</th>
                <th>審核時間</th>
                <th>完稿時間</th>
                <th>發佈日期</th>
                <th>排序</th>
								
								<th style="width: 300px;">管理</th>
                <!-- <th>網址</th>
                <th>修改</th>
                <th>重審</th>
                <th>刪除</th> -->

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
        "order": [ [12,'asc'],[9,'desc']],
        "lengthMenu": [ 20 ],
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
        "ajax": {
          "url": "<?php echo $news_ajax_url;?>",
          "type": "POST"
        },
        "searching": false,
        "processing": true,
        "serverSide": true,
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 13 },
            //{ "orderable": false, "targets": 12 },
            // { "orderable": false, "targets": 13 },
            // { "orderable": false, "targets": 14 },
            // { "orderable": false, "targets": 15 },
            // { "orderable": false, "targets": 16 }
        ],

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
      if (confirm('是否確定要刪除 ['+$(this).parents('tr').find('td:nth-child(2)').html()+'] ? \r\n 按[確定]確定刪除 \r\n 按[取消]取消刪除')) {
        if (confirm('再次確定是否要刪除 ['+$(this).parents('tr').find('td:nth-child(2)').html()+'] ? \r\n 按[確定]確定刪除 \r\n 按[取消]取消刪除')) {
          $.ajax({
            url: 'admin_list_del_ajax.php',
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


		$("#sort_btn").click(function(event) {
		        
        var arr_OrderBy=new Array();
        var arr_Tb_index=new Array();

          $(".sort_in").each(function(index, el) {
             
             arr_OrderBy.push($(this).val());
             arr_Tb_index.push($(this).attr('Tb_index'));
          });

          var data={ 
                        OrderBy: arr_OrderBy,
                       Tb_index: arr_Tb_index 
                      };
             ajax_in('admin.php', data, 'no', 'no');

          alert('更新排序');
         location.replace('admin.php?MT_id=<?php echo $_GET['MT_id'];?>');
		});
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
