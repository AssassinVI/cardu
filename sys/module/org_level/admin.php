<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('card_org', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];

   	$del_row=pdo_select('SELECT org_image FROM card_org WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['org_image'])) { unlink('../../img/'.$del_row['org_image']); }
   	 pdo_delete('card_org', $where);
   }
   
   //-- 組織資料 --
   $pdo=pdo_conn();
   $sql_org=$pdo->prepare("SELECT * FROM card_org WHERE mt_id=:mt_id  ORDER BY OrderBy ASC");
   $sql_org->execute( ["mt_id"=>'site2018110611172385'] );


}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面，勾選後即更新，</p>
	   <div class="new_div">

        <!-- <button id="sort_btn" type="button" class="btn btn-default">
        <i class="fa fa-sort-amount-desc"></i> 更新排序</button>

	    <a href="manager.php?MT_id=<?php //echo $_GET['MT_id'];?>">
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
								<th>組織簡稱</th>
								<th>圖示</th>
                                <th>卡等名稱</th>

							</tr>
						</thead>
						<tbody>

						<?php $i=1; while ($row=$sql_org->fetch(PDO::FETCH_ASSOC)) {

							//-- 卡等資料 --
							$level_txt='';
							$sql_level=$pdo->prepare("SELECT * FROM card_level WHERE mt_id=:mt_id  ORDER BY OrderBy ASC");
							$sql_level->execute( ["mt_id"=>'site2018110611041573'] );
							while ($row_level=$sql_level->fetch(PDO::FETCH_ASSOC)){
								 
							   $is_org_level=pdo_select("SELECT COUNT(*) as total FROM org_level WHERE org_id =:org_id AND level_id =:level_id ", ['org_id'=>$row['Tb_index'], 'level_id'=>$row_level['Tb_index']]);

							   if ($is_org_level['total']>0) {
							   	 $level_txt.=' <label><input type="checkbox" checked name="org_level_id" value="'.$row['Tb_index'].','.$row_level['Tb_index'].'">'.$row_level['attr_name'].'</label>｜';
							   }
							   else{
                                 $level_txt.=' <label><input type="checkbox" name="org_level_id" value="'.$row['Tb_index'].','.$row_level['Tb_index'].'">'.$row_level['attr_name'].'</label>｜';
							   }
                               
							}

                                $OnLineOrNot=$row['OnLineOrNot']=='1' ? '使用中': '未使用';
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row['org_nickname'] ?></td>
								<td><img style="width: 50px;" src="../../img/<?php echo $row['org_image'] ?>"></td>
								<td><?php echo $level_txt;?></td>
								
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

        
        //------------ 更改卡等------------

		$('[name="org_level_id"]').change(function(event) {


                           var org_level=$(this).val().split(',');

               			if (no_change(org_level[0], org_level[1])==true) {

               							if ($(this).prop('checked')==true) {

               								$.ajax({
               									url: 'admin_ajax.php',
               									type: 'POST',
               									data: {
               										switch: 'on',
               										org_id: org_level[0],
               										level_id : org_level[1]
               									}
               								});
               								
               							}
               							else{
               								
               								$.ajax({
               									url: 'admin_ajax.php',
               									type: 'POST',
               									data: {
               										switch: 'off',
               										org_id: org_level[0],
               										level_id : org_level[1]
               									}
               								});
               							}

               			}
               			else{
               				alert('無法修改');
                               $(this).prop('checked',true);
               			}
			
		});

		

	});

	//------------- 禁止修改 ----------------
	function no_change(org_id, level_id) {
		var not_arr=[
		'org201811061213341,level2018110611112115', 
		'org201811061213341,level201811061111211', 
		'org201811061213341,level2018110611112116',
		'org201811061213342,level201811061111212',
		'org201811061213342,level2018110611112118',
		'org201811061213343,level2018110611112112',
		'org201811061213341,level2018110611112114',
		'org201811061213341,level201811061111213',
		'org201811061213342,level2018110611112113',
		'org201811061213342,level2018110611112117',
		'org201811061213342,level201811061111214',
		'org201811061213343,level201811061111217',
		'org201811061213341,level201811061111215',
		'org201811061213342,level201811061111215',
		'org201811061213343,level201811061111215',
		'org201811061213341,level201811061111216',
		'org201811061213342,level201811061111216',
		'org201811061213344,level201811061111216',
		'org201811061213344,level2018110611112111',
		'org201811061213341,level201811061111218',
		'org201811061213341,level201811061111219',
		'org201811061213341,level2018110611112110',
		'org201811061213342,level201811061111218',
		'org201811061213342,level201811061111219',
		'org201811061213342,level2018110611112110',
		'org201811061213343,level201811061111218',
		'org201811061213343,level201811061111219',
		'org201811061213343,level2018110611112110',
		'org201811061213344,level201811061111218',
		'org201811061213344,level201811061111219',
		'org201811061213346,level201811061111218'
		];
		if (not_arr.indexOf(org_id+','+level_id)==-1) {
          return true;
		}
		else{
		  return false;
		}
	}
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
