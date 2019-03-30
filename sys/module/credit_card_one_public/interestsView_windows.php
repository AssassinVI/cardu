<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
 .table-hover>tbody>.activity>td{ background-color: #ffed50; }
 .table-hover>tbody>.activity:hover>td{ background-color: #f9df05; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 

   //-- 權益項目名稱 --
   $row_name_arr=[];
   $row_name=$NewPdo->select("SELECT * FROM card_eq_item");
   foreach ($row_name as $row_name_one) {
     $row_name_arr[$row_name_one['Tb_index']]=$row_name_one['eq_name'];
   }
   
  
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>預覽權益內容</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="nowrap">權益項目</th>
                                    <th class="nowrap">權益內容</th>
                                    <th class="nowrap">附註資料</th>
                                    <th class="nowrap">量化資料</th>
                                    <th class="nowrap">生效日期</th>
                                    <th class="nowrap">截止日期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  //-- 信用卡權益項目 --
                                  $row=$NewPdo->select("SELECT * FROM credit_card_eq WHERE card_id=:card_id ORDER BY eq_id ASC", ['card_id'=>$_GET['card_id']]);

                                  foreach ($row as $row_one) {
                                    $activity=$row_one['StartDate']<=date('Y-m-d') && $row_one['EndDate']>=date('Y-m-d') ? 'activity':'';
                                    echo '
                                    <tr class="'.$activity.'">
                                     <td>'.$row_name_arr[$row_one['eq_id']].'</td>
                                     <td>'.$row_one['content'].'</td>
                                     <td>'.$row_one['note'].'</td>
                                     <td>'.$row_one['number_data'].'</td>
                                     <td class="nowrap">'.$row_one['StartDate'].'</td>
                                     <td class="nowrap">'.$row_one['EndDate'].'</td>
                                    </tr>';
                                  }
                                ?>
                                
                                
                                </tbody>
            </table>

            <div>
              <span style="display: inline-block; width: 20px; height: 10px; background-color: #ffed50;"></span> 目前生效權益
            </div>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


		<!-- <div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<button type="button" class="btn btn-default btn-block btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
						</div>
						<div class="col-lg-4">
						   <button type="button" id="submit_btn" class="btn btn-info btn-block btn-raised">確定</button>
						</div>
						<div class="col-lg-4">
							<button type="button" id="close_btn" class="btn btn-default btn-block btn-flat" >重設</button>
						</div>
					</div>
					
				</div>
			</div>
		</div> -->
	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>

<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>