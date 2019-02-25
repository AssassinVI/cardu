<?php  include("../../core/page/header01.php");//載入頁面heaer01 ?>
 <style type="text/css">
 	.fancybox-slide--iframe .fancybox-content {width  : 900px;max-width  : 80%;max-height : 80%;margin: 0;}
 </style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=array('Tb_index'=>$_GET['Tb_index']);

   	$del_row=pdo_select('SELECT ns_photo_1, ns_photo_2 FROM appNews WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['ns_photo_1'])) { unlink('../../img/'.$del_row['ns_photo_1']); }
    if (isset($del_row['ns_photo_2'])) { unlink('../../img/'.$del_row['ns_photo_2']); }

   	 pdo_delete('appNews', $where);
   }

   //-- 抓資料夾ID --
  $parent_mt_id=pdo_select("SELECT parent_id FROM maintable WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['MT_id']]);

  //-- 版區資料 --
  $area_arr=[];
  $area_row=pdo_select('SELECT Tb_index, at_name FROM appArea', 'no');
  foreach ($area_row as $area_one) {
  	$area_arr[$area_one['Tb_index']]=$area_one['at_name'];
  }

  //-- 銀行資料 --
  $bank_arr=[];
  $bank_row=pdo_select('SELECT Tb_index, bi_shortname FROM bank_info', 'no');
  foreach ($bank_row as $bank_one) {
  	$bank_arr[$bank_one['Tb_index']]=$bank_one['bi_shortname'];
  }

  

   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM appNews WHERE mt_id=:mt_id AND ns_verify IN (0,2,5,6) AND ns_kiman=:ns_kiman ORDER BY OrderBy DESC, StartDate DESC");
   $sql->execute(array( "mt_id"=>$parent_mt_id['parent_id'], 'ns_kiman'=>$_SESSION['admin_index']));   
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

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
								<th>版區分類</th>
								<th>主分類</th>
								<th>主標題</th>
								<th>商店名稱</th>
								<th>情報銀行</th>
								<th>上架期間</th>
								<th>撰稿者</th>
								<th>完稿時間</th>
								<th>審核狀態</th>
								<th>審核者</th>
								<th>審核時間</th>
								<th>審核原因</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

						<?php 
 

						     while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

                              //-- 商店 --
                              $ns_store=pdo_select('SELECT * FROM store WHERE Tb_index=:Tb_index', ['Tb_index'=>$row['ns_store']]);

						      $ns_nt_pk=pdo_select("SELECT area_id, nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']]);
                              //審核狀態 ns_verify 0.草稿; 1.送一審中; 2.送二審中; 3.審核通過; 4.退回一審; 5.退稿; 6.退件 9.放棄
                              switch ($row['ns_verify']) {
                              	case 0:
                              		$ns_verify='草稿';
                              		$edit_disabled='';
                              		$del_disabled='';
                              		break;
                              	case 2:
                              		$ns_verify='送審中';
                              		$edit_disabled='style="display: none;"';
                              		$del_disabled='style="display: none;"';
                              		break;
                              	case 5:
                              		$ns_verify='退稿';
                              		$edit_disabled='';
                              		$del_disabled='';
                              		break;
                              	case 6:
                              		$ns_verify='退件';
                              		$edit_disabled='style="display: none;"';
                              		$del_disabled='';
                              		break;
                              }
                              
                              $StartAndEndDate=$row['StartDate'].' ～ '.$row['EndDate'];
							?>
							<tr>
								<td><?php echo $area_arr[$ns_nt_pk['area_id']]; ?></td>
								<td><?php echo $ns_nt_pk['nt_name'];?></td>
								<td><?php echo $row['ns_ftitle']; ?></td>
								<td><?php echo $ns_store['st_name']; ?></td>
								<td><?php echo $bank_arr[$row['ns_bank']]; ?></td>
								
								<td><?php echo $StartAndEndDate;?></td>
								<td><?php echo $row['ns_reporter'];?></td>
								<td><?php echo $row['ns_fwdate'];?></td>
								<td><?php echo $ns_verify;?></td>
								<td><?php echo $row['ns_vfman_2_name'];?></td>
								<td><?php echo $row['ns_vfdate'];?></td>
								<td><?php echo $row['ns_reason'];?></td>
						
								<td class="text-right">

								<a href="javascript:;" onclick="window.open('../cardNews_public/newsView_windows.php?Tb_index=<?php echo $row['Tb_index'];?>', '<?php echo $row['ns_ftitle']; ?>', config='height=800,width=900');" class="btn btn-rounded btn-default btn-sm">
								<i class="fa fa-binoculars" aria-hidden="true"></i>
								預覽
								</a>

								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" <?php echo $edit_disabled;?> class="btn btn-rounded btn-info btn-sm" >
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯
								</a>

								<a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" class="btn btn-rounded btn-warning btn-sm"
								   onclick="if (!confirm('確定要刪除 [<?php echo $row['ns_ftitle']?>] ?')) {return false;}" <?php echo $del_disabled;?>>
								<i class="fa fa-trash" aria-hidden="true"></i>
								刪除
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
