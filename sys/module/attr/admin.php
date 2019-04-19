<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['Tb_index']) ; $i++) { 
    $data=["OrderBy"=>($i+1)];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('card_attr', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];

   	$del_row=pdo_select('SELECT aPic, OtherFile FROM card_attr WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['aPic'])) { unlink('../../img/'.$del_row['aPic']); }
    if (isset($del_row['OtherFile'])) {

      $OtherFile=explode(',', $del_row['OtherFile']);
      for ($i=0; $i <count($OtherFile)-1 ; $i++) { 
      	 unlink('../../img/'.$OtherFile[$i]); 
      }
   }

   	 pdo_delete('card_attr', $where);
   }
   
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM card_attr WHERE mt_id=:mt_id  ORDER BY OrderBy ASC");
   $sql->execute( ["mt_id"=>$_GET['MT_id']] );
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p><b class="text-danger">(點擊空白處拖曳可更改排序)</b></p>
	   <div class="new_div">

        <button style="display: none;" id="sort_btn" type="button" class="btn btn-success">
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
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>名稱</th>
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody>

						<?php $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row['attr_name'] ?></td>
				
								
								<td class="text-right">

								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								<button type="button" class="btn btn-rounded btn-info btn-sm">
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯</button>
								</a>

								<a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" 
								   onclick="if (!confirm('確定要刪除 [<?php echo $row['attr_name']?>] ?')) {return false;}">
								<button type="button" class="btn btn-rounded btn-warning btn-sm">
								<i class="fa fa-trash" aria-hidden="true"></i>
								刪除</button>
								</a>

					
								</td>

								<input type="hidden" class="sort_in" name="OrderBy[]" value="<?php echo $row['Tb_index'];?>">
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
		//-- 拖曳更新排序 --
       $( ".table-responsive .table tbody" ).sortable({

             revert: 300,
             update: function( event, ui ) {
             	$("#sort_btn").css('display', 'inline-block');
             }
        });

  
		$("#sort_btn").click(function(event) {
		        
        var arr_Tb_index=new Array();

          $(".sort_in").each(function(index, el) {
             
             arr_Tb_index.push($(this).val());
          });

          var data={ 
                       Tb_index: arr_Tb_index 
                      };
           ajax_in('admin.php', data, 'no', 'no');

          alert('更新排序');
         location.replace('admin.php?MT_id=<?php echo $_GET['MT_id'];?>');
		});
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
