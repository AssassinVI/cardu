<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('search_label', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];
   	 pdo_delete('search_label', $where);
   }

 

}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

      <input type="text" name="lb_name">
      <a id="add_btn" href="javascript:;"class="btn btn-default">
          <i class="fa fa-plus" aria-hidden="true"></i> 新增
        </a>

        <!-- <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序</button> -->

	    <!-- <a href="manager.php?MT_id=<?php //echo $_GET['MT_id'];?>">
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
								<th>名稱</th>
								<th style="width: 150px;">管理</th>
							</tr>
						</thead>
                   <tfoot>
                     <tr>
                       <th>名稱</th>
                       <th>管理</th>
                     </tr>
                   </tfoot>
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
        "ajax": "member_ajax.php?MT_id=<?php echo $_GET['MT_id'];?>",
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


      //-- 新增 ---
    $('#add_btn').click(function(event) {
    var _this=$(this);
    if ($(this).prev().val()!='') {
       $.ajax({
          url: 'admin_ajax.php',
          type: 'POST',
          data: {
            lb_name: $(this).prev().val()
          },
          success:function (data) {
            
            if (data=='1') {
              //     var txt=' <tr>'+
              // '<td>new</td>'+
              // '<td>'+_this.prev().val()+'</td>'+
              // '<td class="text-right">'+
              //   '<a class="btn btn-rounded btn-warning btn-sm del_btn" href="javascript:;" ><i class="fa fa-trash" aria-hidden="true"></i>刪除</a>'+
              // '</td>'+
              // '</tr>';

              //   $('.table tbody').append(txt);
              //           _this.prev().val('');

              table.draw();
            }
            //-- 重複 --
            else{
              alert(data);
            }
          }
        });
    }
    else{
      alert('請輸入標籤名稱');
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
