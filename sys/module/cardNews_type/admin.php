<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('news_type', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];
   	 pdo_delete('news_type', $where);
   }
   
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id=:mt_id AND nt_sp='0' ORDER BY OrderBy ASC");
   $sql->execute( ["mt_id"=>$_GET['MT_id']] );
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

        <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序</button>

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
				<h3>主題專區</h3>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>名稱</th>
								<th>狀態</th>
								<th>排序</th>
								<th>上架中數量</th>
								<th>累計總數</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

						<?php $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row['nt_name'] ?></td>
								<td>
									<?php  echo $OnLineOrNot=$row['OnLineOrNot']==0 ? '未使用':'使用中'; ?>
								</td>
								<td><input type="number" class="sort_in" name="OrderBy" Tb_index="<?php echo $row['Tb_index'];?>" value="<?php echo $row['OrderBy'] ?>"></td>
								<td><?php echo $row['nt_online'];?></td>
								<td><?php echo $row['nt_total'];?></td>
				
								
								<td class="text-right">

								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								<button type="button" class="btn btn-rounded btn-info btn-sm">
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯</button>
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


 <?php
  $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id=:mt_id AND nt_sp='1' ORDER BY OrderBy ASC");
  $sql->execute( ["mt_id"=>$_GET['MT_id']] );
 ?>

   <div class="col-lg-12 text-right">

   		    <a href="manager_sp.php?MT_id=<?php echo $_GET['MT_id'];?>">
   	        <button type="button" class="btn btn-default">
   	        <i class="fa fa-plus" aria-hidden="true"></i> 新增特別議題</button>
   	        </a>
   	
   </div>
   
	<div class="col-lg-12">

			<div class="panel panel-default">
			<div class="panel-body">
				<h3>特別議題</h3>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>預設首頁</th>
								<th>名稱</th>
								<th>狀態</th>
								<th>排序</th>
								<th>檔期時間</th>
								<th>上架中數量</th>
								<th>累計總數</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

							<tr>
								<td>0</td>
								<td> <input type="radio" name="nt_sp_idx" index="null"></td>
								<td>無預設首頁</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>

						<?php $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                               
                               if(date('Y-m-d')>$row['nt_sp_end_date']){
                                 $OnLineOrNot='<span class="text-danger">未使用</span>';
                                 $time_color='#ccc';
                                 $is_radio='none';
                                 $is_del_btn=true;
                               }
                               else{
                                 $OnLineOrNot=$row['OnLineOrNot']==0 ? '<span class="text-danger">未使用</span>':'使用中';
                                 $time_color='#000';
                                 $is_radio='block';
                                 $is_del_btn=false;
                               }

							?>
							<tr>
								<td><?php echo $i?></td>
								<td><input style="display: <?php echo $is_radio;?>;" type="radio" name="nt_sp_idx" index="<?php echo $row['Tb_index'] ?>" <?php echo $nt_sp_idx=$row['nt_sp_idx']=='1' ? 'checked':'';?>></td>
								<td><?php echo $row['nt_name'] ?></td>
								<td>
									<?php  echo $OnLineOrNot; ?> 
								</td>
								<td><input type="number" class="sort_in" name="OrderBy" Tb_index="<?php echo $row['Tb_index'];?>" value="<?php echo $row['OrderBy'] ?>"></td>
								<td style="color:<?php echo $time_color;?>;"><?php echo $row['nt_sp_begin_date'].' to '.$row['nt_sp_end_date'];?></td>
								<td><?php echo $row['nt_online'];?></td>
								<td><?php echo $row['nt_total'];?></td>

								<td class="text-right">
								<a href="manager_sp.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								<button type="button" class="btn btn-rounded btn-info btn-sm">
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯</button>
								</a>
                             
                            <?php
                              if($is_del_btn){
                            ?>

                               <a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" 
								   onclick="if (!confirm('確定要刪除 [<?php echo $row['nt_name']?>] ?')) {return false;}">
								<button type="button" class="btn btn-rounded btn-warning btn-sm">
								<i class="fa fa-trash" aria-hidden="true"></i>
								刪除</button>
								</a>
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
					   		area_id: 'at2019021114154632',
			                Tb_index: $(this).attr('index')
					   	}
					 });
		});

  
  });
		
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
