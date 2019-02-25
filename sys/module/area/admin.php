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

   
   //-- 單元 --
   $unit_arr=[];

   //-- 優情報 --
   if ($_GET['MT_id']=='site2019011116102369') {
   	 	$unit=$NewPdo->select("SELECT * FROM appUnit WHERE mt_id='site2019011717515289' ORDER BY OrderBy ASC");
   	}
   	//-- 卡情報 --
    elseif($_GET['MT_id']=='site201902110948308'){
         $unit=$NewPdo->select("SELECT * FROM appUnit WHERE mt_id='site2019011716484078' ORDER BY OrderBy ASC");
    }

   foreach ($unit as $unit_one) {
   	$unit_arr[$unit_one['Tb_index']]=$unit_one['un_name'];
   }
   
   //-- 版區LIST --
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM appArea WHERE mt_id=:mt_id ORDER BY OrderBy ASC");
   $sql->execute( ["mt_id"=>$_GET['MT_id']] );


}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩</p>
	   <div class="new_div">

        <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序 </button>

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
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>版區名稱</th>
                                <th>單元1名稱</th>
                                <th>單元2名稱</th>
                                <th>單元3名稱</th>
                                <th>單元4名稱</th>
                                <th>單元5名稱</th>
								<th>狀態</th>
								<th>排序</th>
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
								<td><?php echo $row['at_name'] ?></td>

                                <td><?php echo $at_unit1=empty($at_unit[0]) ? '': $unit_arr[$at_unit[0]] ; ?></td>
                                <td><?php echo $at_unit2=empty($at_unit[1]) ? '': $unit_arr[$at_unit[1]] ; ?></td>
                                <td><?php echo $at_unit3=empty($at_unit[2]) ? '': $unit_arr[$at_unit[2]] ; ?></td>
                                <td><?php echo $at_unit4=empty($at_unit[3]) ? '': $unit_arr[$at_unit[3]] ; ?></td>
                                <td><?php echo $at_unit5=empty($at_unit[4]) ? '': $unit_arr[$at_unit[4]] ; ?></td>

								<td><?php  echo $OnLineOrNot=$row['OnLineOrNot']==0 ? '未使用':'使用中'; ?></td>
								<td><input type="number" class="sort_in" name="OrderBy" Tb_index="<?php echo $row['Tb_index'];?>" value="<?php echo $row['OrderBy'] ?>"></td>
				
								
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
