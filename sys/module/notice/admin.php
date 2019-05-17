<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('appNotice', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];

   	$del_row=pdo_select('SELECT aPic FROM appNotice WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['aPic'])) { unlink('../../img/'.$del_row['aPic']); }

   	 pdo_delete('appNotice', $where);
   }
   
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT Tb_index, note_type, aTitle, StartDate, EndDate, nt_viewcount, OnLineOrNot FROM appNotice ORDER BY StartDate DESC");
   $sql->execute( );

}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">
<!-- 
        <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序</button> -->

	    <a href="manager.php?MT_id=<?php echo $_GET['MT_id'];?>">
        <button type="button" class="btn btn-default">
        <i class="fa fa-plus" aria-hidden="true"></i> 新增</button>
        </a>
	  </div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>#</th>
								<th>項目</th>
								<th>主題名稱</th>
								<th>活動時間</th>
								<th>狀態</th>
								<th>點閱數</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

						<?php 
						      $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                              $note_type=$row['note_type']=='0' ? '卡優公告':'卡優活動';
                              $OnLineOrNot=$row['OnLineOrNot']=='0' ? '已下架':'上架中';
					    ?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $note_type; ?></td>
								<td><?php echo $row['aTitle']; ?></td>
								<td><?php echo $row['StartDate'].'~'.$row['EndDate']; ?></td>
								<td><?php echo $OnLineOrNot; ?></td>
								<td><?php echo $row['nt_viewcount']; ?></td>
								

								<td class="text-right">

								<a href="javascript:;" onclick="window.open('newsView_windows.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>','公告活動預覽', config='height=800,width=900');" class="btn btn-rounded btn-default btn-sm">
								<i class="fa fa-binoculars" aria-hidden="true"></i>
								預覽
								</a>

								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								<button type="button" class="btn btn-rounded btn-info btn-sm">
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯</button>
								</a>

								<a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" 
								   onclick="if (!confirm('確定要刪除 [<?php echo $row['aTitle']?>] ?')) {return false;}">
								<button type="button" class="btn btn-rounded btn-warning btn-sm">
								<i class="fa fa-trash" aria-hidden="true"></i>
								刪除</button>
								</a>

					
								</td>
							</tr>
						<?php $i++; }?>
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
