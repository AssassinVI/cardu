<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['Tb_index']) ; $i++) { 
    $data=["cc_so_order"=>($i+1)];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('credit_cardrank_type', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];

   	$del_row=pdo_select('SELECT cc_so_photo_1, cc_so_photo_1_hover FROM credit_cardrank_type WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['cc_so_photo_1'])) { unlink('../../img/'.$del_row['cc_so_photo_1']); }
    if (isset($del_row['cc_so_photo_1_hover'])) {

      $cc_so_photo_1_hover=explode(',', $del_row['cc_so_photo_1_hover']);
      for ($i=0; $i <count($cc_so_photo_1_hover)-1 ; $i++) { 
      	 unlink('../../img/'.$cc_so_photo_1_hover[$i]); 
      }
   }

   	 pdo_delete('credit_cardrank_type', $where);
   }
   
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM credit_cardrank_type ORDER BY cc_so_order ASC");
   $sql->execute();


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
								<th>排行分類</th>
								<th>排行圖示</th>
								<th>點閱數</th>
								<th>項目1名稱</th>
								<th>項目2名稱</th>
								<th>項目3名稱</th>
								<th>使用狀態</th>
								<th style="width: 80px;">編輯</th>
								<th style="width: 80px;">刪除</th>

							</tr>
						</thead>
						<tbody>

						<?php $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

							  switch ($row['cc_so_status']) {
							  	case '0':
							  		$cc_so_status='停用';
							  		break;
							  	case '1':
							  		$cc_so_status='使用中';
							  		break;
							  	case '2':
							  		$cc_so_status='後台顯示';
							  		break;
							  }
							?>
							<tr>
								<td><?php echo $i?></td>
								<td class="nowrap"><?php echo $row['cc_so_cname'] ?></td>
								<td><img style="width: 80px;" src="../../img/<?php echo $row['cc_so_photo_1'] ?>"></td>
								<td><?php echo $row['cc_so_viewcount'] ?></td>
								<th><?php echo $row['cc_so_type_01_cname'] ?></th>
								<th><?php echo $row['cc_so_type_02_cname'] ?></th>
								<th><?php echo $row['cc_so_type_03_cname'] ?></th>
                                <td class="nowrap"><?php echo $cc_so_status;?></td>
								<td>
								  <a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								  <i class="fa fa-pencil-square" aria-hidden="true"></i>編輯
								  </a>
								</td>
                                <td>
								  <a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" 
								     onclick="if (!confirm('確定要刪除 [<?php echo $row['aTitle']?>] ?')) {return false;}">
								  <i class="fa fa-trash" aria-hidden="true"></i>刪除
								  </a>
							    </td>

								

								<input type="hidden" class="sort_in" name="cc_so_order[]" value="<?php echo $row['Tb_index'];?>">
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
