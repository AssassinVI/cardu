<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
 <style type="text/css">
 	.group_name{ color: #007d71; font-weight: 600; margin: 17px 0px; }
 </style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php
 if ($_GET) { //刪除
 	$Tb_index=$_GET['Tb_index'];
    $where=array('Tb_index'=>$Tb_index);
 	pdo_delete('sysAdmin', $where);
 }

 $pdo=pdo_conn();

 //-- 權限 --
 $sql_group=$pdo->prepare("SELECT Tb_index, Group_name FROM sysAdminGroup");
 $sql_group->execute();


?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary">管理帳號列表</h2>
		<p>本頁面條列目前網站權限，請勿任意刪除，感恩</p>
	   <div class="new_div">
	    <a href="manager.php">
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
										<th>名稱</th>
										<th>帳號</th>
										<th>群組</th>
										<th>狀態</th>
										<th class="text-right">管理</th>

									</tr>
								</thead>
								<tbody>
								<?php 
		                         $sql=$pdo->prepare("SELECT Tb_index, admin_id, name, is_use, admin_per FROM sysAdmin ORDER BY Tb_index ASC");
		                         $sql->execute();
								 $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                                     
                                     $admin_per_txt='';

                                     if ($row['admin_per']!='admin') {
                                     	$admin_per_arr=explode(',', $row['admin_per']);
								 	    for ($i=0; $i <count($admin_per_arr) ; $i++) { 
								 	    	$admin_per_name=pdo_select("SELECT Group_name FROM sysAdminGroup WHERE Tb_index=:Tb_index", ['Tb_index'=>$admin_per_arr[$i]]);
								 	    	$admin_per_txt.=$admin_per_name['Group_name'].'<br>';
								 	    }
                                     }
                                     else{
                                     	$admin_per_txt='系統管理員';
                                     }
								 	 
                                     
								 	?>
									<tr>
										<td><?php echo $i?></td>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['admin_id']?></td>
                                        <td><?php echo $admin_per_txt;?></td>
										<td><input class="checkbox switch switch-primary" disabled id="settings7" type="checkbox" 
										 <?php echo $check=$row['is_use']=='1' ? 'checked' : '';?> /></td>
										

										<td class="text-right">

										<a href="manager.php?Tb_index=<?php echo $row['Tb_index'];?>" >
										<button type="button" class="btn btn-rounded btn-info btn-sm">
										<i class="fa fa-pencil-square" aria-hidden="true"></i>
										編輯</button>
										</a>

										<a href="admin.php?Tb_index=<?php echo $row['Tb_index'];?>" 
										   onclick="if (!confirm('確定要刪除 [<?php echo $row['name']?>] ?')) {return false;}">
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
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>


