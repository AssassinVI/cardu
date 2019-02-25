<?php  include("../../core/page/header01.php");//載入頁面heaer01 ?>
 <style type="text/css">
 	.fancybox-slide--iframe .fancybox-content {width  : 900px;max-width  : 80%;max-height : 80%;margin: 0;}
 </style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=array('Tb_index'=>$_GET['Tb_index']);

   	$del_row=pdo_select('SELECT st_logo FROM store WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['st_logo'])) { unlink('../../img/'.$del_row['st_logo']); }

   	 pdo_delete('store', $where);
   }

}


if ($_POST) {
  //-- 商店類別 --
  $st_type_arr=[];
  $st_type_row=pdo_select('SELECT Tb_index, st_name FROM store_type', 'no');
  foreach ($st_type_row as $st_type_one) {
  	$st_type_arr[$st_type_one['Tb_index']]=$st_type_one['st_name'];
  }

  //-- 主分類 --
  $st_main_type_arr=[];
  $st_main_type_row=pdo_select('SELECT Tb_index, st_name FROM store_type_main', 'no');
  foreach ($st_main_type_row as $st_main_type_one) {
  	$st_main_type_arr[$st_main_type_one['Tb_index']]=$st_main_type_one['st_name'];
  }

  //-- 次分類 --
  $st_second_type_arr=[];
  $st_second_type_row=pdo_select('SELECT Tb_index, st_name FROM store_type_second', 'no');
  foreach ($st_second_type_row as $st_second_type_one) {
  	$st_second_type_arr[$st_second_type_one['Tb_index']]=$st_second_type_one['st_name'];
  }
  
  //-- 關鍵字 --
  $keyWord_txt='';
  $keyWord=strpos($_POST['st_keyWord'], ',')!=FALSE ? explode(',', $_POST['st_keyWord']) : explode(' ', $_POST['st_keyWord']);
  foreach ($keyWord as $keyWord_one) {
  	$keyWord_txt.=" concat(st_nickname,st_url,st_phone,st_ser_phone,st_adds,st_label,st_intro) LIKE '%".$keyWord_one."%' OR ";
  }

  $keyWord_txt=' AND ('.substr($keyWord_txt, 0,-3).') ';

   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM store WHERE st_type LIKE :st_type AND st_name LIKE :st_name ".$keyWord_txt." ORDER BY OrderBy ASC, StartDate DESC");
   $sql->execute(['st_type'=>'%'.$_POST['st_type'].'%', 'st_name'=>'%'.$_POST['st_name'].'%']);
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

	   <!--  <a href="manager.php?MT_id=<?php //echo $_GET['MT_id'];?>">
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
								<th>商店類別</th>
								<th>主分類</th>
								<th>次分類</th>
								<th>商店全名</th>
								<th>商店簡稱</th>
								<th>點閱數(PC)</th>
								<th>點閱數(手機)</th>
								<th>FB按讚數</th>
								<th>商店狀態</th>
								<th>建檔時間</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

						<?php 
 

						     while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

						     	$OnLineOrNot=$row['OnLineOrNot']==0 ? '關閉':'開啟';

							?>
							<tr>
								<td><?php echo $st_type_arr[$row['st_type']]; ?></td>
								<td><?php echo $st_main_type_arr[$row['st_main_type']];?></td>
								<td><?php echo $st_second_type_arr[$row['st_second_type']]; ?></td>
								<td><?php echo $row['st_name'];?></td>
								<td><?php echo $row['st_nickname'];?></td>
								<td><?php echo $row['st_viewcount'];?></td>
								<td><?php echo $row['st_mobvecount'];?></td>
								<td><?php echo $row['st_fbcount'];?></td>
								<td><?php echo $OnLineOrNot;?></td>
								<td><?php echo $row['StartDate'];?></td>
								
						
								<td class="text-right">

								<a href="javascript:;" onclick="window.open('newsView_windows.php?Tb_index=<?php echo $row['Tb_index'];?>', '<?php echo $row['ns_ftitle']; ?>', config='height=800,width=900');" class="btn btn-rounded btn-default btn-sm">
								<i class="fa fa-binoculars" aria-hidden="true"></i>
								預覽
								</a>

								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" <?php echo $edit_disabled;?> class="btn btn-rounded btn-info btn-sm" >
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯
								</a>

								<a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" class="btn btn-rounded btn-warning btn-sm"
								   onclick="if (!confirm('確定要刪除 [<?php echo $row['st_name']?>] ?')) {return false;}" <?php echo $del_disabled;?>>
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
