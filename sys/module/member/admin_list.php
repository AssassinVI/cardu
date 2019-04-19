<?php include("../../core/page/header01.php");//載入頁面heaer01?>
<style type="text/css">
    #table_id_example_length, #table_id_example_filter{display: none;}
    .fancybox-slide--iframe .fancybox-content {width  : 700px;max-width  : 700px;max-height : 500px;margin: 0;}
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('bank_info', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];

   	$del_row=pdo_select('SELECT aPic, OtherFile FROM bank_info WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['aPic'])) { unlink('../../img/'.$del_row['aPic']); }
    if (isset($del_row['OtherFile'])) {

      $OtherFile=explode(',', $del_row['OtherFile']);
      for ($i=0; $i <count($OtherFile)-1 ; $i++) { 
      	 unlink('../../img/'.$OtherFile[$i]); 
      }
   }

   	 pdo_delete('bank_info', $where);
   }

 

}

?>


<div class="wrapper wrapper-content">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

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
								<th>帳號</th>
								<th class="nowrap">真實姓名</th>
								<th>暱稱</th>
								<th>Email</th>
								<th>電話</th>
								<th class="nowrap">狀態</th>
								<th>註冊時間</th>
								<th>修改時間</th>
                <th>註冊IP</th>
                <th>登入次數</th>
                <th>推薦者</th>
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

   var table= $('#table_id_example').DataTable({
          "order": [[6,'desc']],
          "pageLength": 50,
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
            "url":"member_ajax.php?MT_id=<?php echo $_GET['MT_id'];?>",
            "type": "POST",
            "data": {
              "ud_regtime_s":sessionStorage.getItem("ud_regtime_s"),
              "ud_regtime_e":sessionStorage.getItem("ud_regtime_e"),
              "ud_update_s":sessionStorage.getItem("ud_update_s"),
              "ud_update_e":sessionStorage.getItem("ud_update_e"),
              "keywords":sessionStorage.getItem("keywords")
            }
          },
          "processing": true,
          "serverSide": true
         
        });
  

    //-- 進行確認 --
    $('#table_id_example').on('click', '.update_ud_active', function(event) {
      $.ajax({
        url: '../member_public/mem_ajax.php',
        type: 'POST',
        data: {
          type: 'update_ud_active',
          ud_pk:$(this).attr('ud_pk'), 
          ud_active:'1'
        },
        success:function function_name(argument) {
          alert('確認成功!!');
          table.draw();
        }
      });
    });

    

    //-- 重發確認信 --
    $('#table_id_example').on('click', '.re_mail', function(event) {
      $.ajax({
        url: '../member_public/mem_ajax.php',
        type: 'POST',
        data: {
          type: 're_mail',
          ud_pk:$(this).attr('ud_pk')
        },
        success:function function_name(argument) {
          alert('已發送確認信!!');
        }
      });
    });



	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
