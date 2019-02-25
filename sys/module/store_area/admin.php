<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('appArea', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];
   	 pdo_delete('appArea', $where);
   }

  
   
   //-- 版區LIST --
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM store_type WHERE mt_id=:mt_id ORDER BY OrderBy ASC");
   $sql->execute( ["mt_id"=>$_GET['MT_id']] );


}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

        <!-- <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序 </button> -->

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
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>商店類別</th>
                                <th>商店數量</th>
                                <th>狀態</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

						<?php 
						  $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

						  	$at_unit=explode(',', $row['at_unit']);

						?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row['st_name'] ?></td>
                                <td><?php  ?></td>
								<td><?php  echo $OnLineOrNot=$row['OnLineOrNot']==0 ? '未使用':'使用中'; ?></td>
								
								<td class="text-right">

								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								<button type="button" class="btn btn-rounded btn-info btn-sm">
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯</button>
								</a>

								<?php 
                                 if ($row['Tb_index']=='st2019013117015133' || $row['Tb_index']=='st201901311701582') {
                                ?>

                                <a href="admin_main.php?MT_id=<?php echo $_GET['MT_id']?>&main_id=<?php echo $row['Tb_index'];?>" class="btn btn-rounded btn-default btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> 主分類</a>
                                <?php
                                 }
								?>

					
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


		$('[name="nt_sp_idx"]').change(function(event) {
			  $.ajax({
					   	url: 'manager_sp_ajax.php',
					   	type: 'POST',
					   	data: {
			                Tb_index: $(this).attr('index')
					   	}
					 });
		});

  
  });
		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
