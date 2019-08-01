<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['Tb_index']) ; $i++) { 
    $data=["OrderBy"=>($i+1)];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('card_func', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];

   	$del_row=pdo_select('SELECT card_image, card_image_hover FROM card_func WHERE Tb_index=:Tb_index', $where);
   	if (isset($del_row['card_image'])) { unlink('../../img/'.$del_row['card_image']); }
    if (isset($del_row['card_image_hover'])) {

      $card_image_hover=explode(',', $del_row['card_image_hover']);
      for ($i=0; $i <count($card_image_hover)-1 ; $i++) { 
      	 unlink('../../img/'.$card_image_hover[$i]); 
      }
   }

   	 pdo_delete('card_func', $where);
   }
   
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM card_func WHERE mt_id=:mt_id  ORDER BY OrderBy ASC");
   $sql->execute( ["mt_id"=>$_GET['MT_id']] );


}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出所有的文章清單，如需檢看或進行管理，請由每篇文章右側 管理區進行，感恩 <b class="text-danger">(點擊空白處拖曳可更改排序)</b></p>
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
								<th>圖示</th>
								<th>功能說明</th>
								<th>狀態</th>
								<th style="width: 80px;">編輯</th>
								<th style="width: 80px;">刪除</th>

							</tr>
						</thead>
						<tbody>

						<?php $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                                $OnLineOrNot=$row['OnLineOrNot']=='1' ? '使用中': '未使用';
							?>
							<tr>
								<td><?php echo $i?></td>
								<td class="nowrap"><?php echo $row['fun_name'] ?></td>
								<td><img style="width: 50px;" src="../../img/<?php echo $row['card_image'] ?>"></td>
								<td><?php echo $row['fun_txt'] ?></td>
                                <td class="nowrap"><?php echo $OnLineOrNot;?></td>
								<td >
								<a href="manager.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" >
								<i class="fa fa-pencil-square" aria-hidden="true"></i>
								編輯
								</a>
								</td>
                                <td>
                                 <?php if(in_array($_GET['MT_id'].'-del', $_SESSION['group']) || $_SESSION['admin_per']=='admin'){?>
								    <a href="admin.php?MT_id=<?php echo $_GET['MT_id']?>&Tb_index=<?php echo $row['Tb_index'];?>" 
								       onclick="if (!confirm('確定要刪除 [<?php echo $row['aTitle']?>] ?')) {return false;}">
								    <i class="fa fa-trash" aria-hidden="true"></i>
								    刪除
								    </a>
								  <?php }?>
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
             placeholder: "sortable_new_placeholder",
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
