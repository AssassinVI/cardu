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
   

   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM appNews WHERE mt_id=:mt_id AND ns_verify IN (0,2,5,6) AND ns_kiman=:ns_kiman ORDER BY OrderBy DESC, StartDate DESC");
   $sql->execute(array( "mt_id"=>$parent_mt_id['parent_id'], 'ns_kiman'=>$_SESSION['admin_index']));   
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
	   <div class="new_div">

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
					<table class="table no-margin">
						<thead>
							<tr>
								<th>#</th>
								<th>主分類</th>
								<th>新聞標題</th>
								<th>新聞狀態</th>
								<th>完稿時間</th>
								<th>上架期間</th>
								<th>記者/作者</th>
								<th>審核者</th>
								<th>審核時間</th>
								<th>審核原因</th>
								<th>預覽</th>
								<th>編輯</th>
								<th>刪除</th>

							</tr>
						</thead>
						<tbody>

						<?php 
						     $i=1;
						     while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

                              $ns_fwdate=$row['ns_fwdate']=='0000-00-00 00:00:00' ? '':$row['ns_fwdate'];
                              $ns_vfdate=$row['ns_vfdate']=='0000-00-00 00:00:00' ? '':$row['ns_vfdate'];

						      $ns_nt_pk=pdo_select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']]);
						      $ns_nt_pk=$ns_nt_pk['nt_name'];
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
								<td><?php echo $i?></td>
								<td><?php echo $ns_nt_pk;?></td>
								<td><?php echo $row['ns_ftitle'] ?></td>
								<td><?php echo $ns_verify;?></td>
								<td><?php echo $ns_fwdate;?></td>
								<td><?php echo $StartAndEndDate;?></td>
								<td><?php echo $row['ns_reporter'];?></td>
								<td><?php echo $row['ns_vfman_2_name'];?></td>
								<td><?php echo $ns_vfdate;?></td>
								<td><?php echo $row['ns_reason'];?></td>
						
								<td>
								<a href="javascript:;" onclick="window.open('../news_public/newsView_windows.php?Tb_index=<?php echo $row['Tb_index'];?>', '<?php echo $row['ns_ftitle']; ?>', config='height=800,width=900');" >
								<i class="fa fa-binoculars" aria-hidden="true"></i>
								預覽
								</a>
								</td>
								<td>
									<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" <?php echo $edit_disabled;?> >
									<i class="fa fa-pencil-square" aria-hidden="true"></i>
									編輯
									</a>
								</td>
								<td>
									<a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" 
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
