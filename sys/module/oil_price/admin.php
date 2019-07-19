<?php 
include("../../core/page/header01.php");//載入頁面heaer01
?>
<style type="text/css">
	.table_sort_p{ border:none !important; }
</style>
<?php
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  if (isset($_POST['op_showorder'])) {
  	for ($i=0; $i <count($_POST['op_showorder']) ; $i++) { 
  	    $data=["op_showorder"=>$_POST['op_showorder'][$i]];
  	    $where=["op_pk"=>$_POST['op_pk'][$i]];
  	    pdo_update('oil_price', $data, $where);
  	  }
  }
  elseif(isset($_POST['op_oil_type'])){
    
  	$oil_time=$NewPdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=:op_store AND op_valid_time<=DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 
  		                      ['op_store'=>$_POST['op_store']], 'one');
    
    $NewPdo->select("DELETE FROM oil_price WHERE op_store=:op_store AND op_valid_time>:op_valid_time", 
    	            ['op_valid_time'=>$oil_time['op_valid_time'], 'op_store'=>$_POST['op_store']]);
    
    for ($i=0; $i <count($_POST['op_oil_type']) ; $i++) { 
       $op_valid_time=$_POST['op_valid_time'].' '.$_POST['op_valid_time_hour'];
       $param=[
         'op_oil_type'=>$_POST['op_oil_type'][$i],
         'op_price'=>$_POST['op_price'][$i],
         'op_showorder'=>($i+1),
         'op_store'=>$_POST['op_store'],
         'op_valid_time'=>$op_valid_time,
       ];
       $NewPdo->insert('oil_price', $param);
    }
    location_up('admin.php','油價設定完畢!');
  }
  

}


?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row" style="width: 1280px;">
		<div class="col-lg-12">
			<div class="panel panel-success">
		    <div class="panel-heading text-center">
              中油油價設定
            </div>
			<div class="panel-body">
				<div class="row no-gutters">
				  <div class="col-md-6">
				  	<div class="table-responsive">
				  		<table class="table no-margin">
				  			<thead>
				  				<tr>
				  					<th>油品種類</th>
				  					<th>當前油價</th>
				  					<th>當前顯示順序</th>
				  				</tr>
				  			</thead>
				  			<tbody>

				  			  <?php 
				  			     $oil_time=$NewPdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=1 AND op_valid_time<=DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 'no', 'one');
				  			     $op_valid_datetime=explode(' ', $oil_time['op_valid_time']);

				  			     $op_valid_date_now=$op_valid_datetime[0];

				  			     $op_valid_time_now=explode(':', $op_valid_datetime[1]);
				  			     $op_valid_time_now=$op_valid_time_now[0];

				  			     $row_oil=$NewPdo->select("SELECT * FROM oil_price WHERE op_store=1 AND op_valid_time=:op_valid_time ORDER BY op_showorder", ['op_valid_time'=>$oil_time['op_valid_time']]);
				  			     foreach ($row_oil as $oil_one) {
				  			       echo '  
				  			       <tr>
				  			       	<td><input type="text" value="'.$oil_one['op_oil_type'].'" readonly></td>
				  			       	<td><input type="text" value="'.$oil_one['op_price'].'" readonly>元/公升</td>
				  			       	<td>'.$oil_one['op_showorder'].'</td>
				  			       </tr>';
				  			     }
				  			  ?>
				  			  

				  			</tbody>
				  		</table>
				  		<div>
				  		  生效時間：<input type="text" value="<?php echo $op_valid_date_now;?>" readonly>
				  		  <input style="width: 50px;" type="text" value="<?php echo $op_valid_time_now;?>" readonly>時
				  		</div>
				  	</div>
				  </div>
				  <div class="col-md-6">
				  	<form id="r_oil_form1" action="" method="POST">
				  	<div class="table-responsive">
				  		<table class="table no-margin">
				  			<thead>
				  				<tr>
				  					<th>油品種類</th>
				  					<th>預設油價</th>
				  					<th>預設顯示順序</th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  				<?php 
				  				  $oil_time_r=$NewPdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=1 AND op_valid_time>DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 'no', 'one');
				  				  
                                  //-- 判斷有無預設油價 --
                                  $op_valid_time=empty($oil_time_r['op_valid_time']) ? $oil_time['op_valid_time']:$oil_time_r['op_valid_time'];
                                  $op_valid_time_txt=empty($oil_time_r['op_valid_time']) ? '尚未排程油價' : '目前已排程資料';

                                   $op_valid_datetime=empty($oil_time_r['op_valid_time']) ? explode(' ', date('Y-m-d H:i:s')) : explode(' ', $oil_time_r['op_valid_time']);
                                   $op_valid_date_r=$op_valid_datetime[0];

                                    $op_valid_time_r=explode(':', $op_valid_datetime[1]);
                                    $op_valid_time_r=$op_valid_time_r[0];

                                    
                                    $row_oil=$NewPdo->select("SELECT * FROM oil_price WHERE op_store=1 AND op_valid_time=:op_valid_time ORDER BY op_showorder", ['op_valid_time'=>$op_valid_time]);
                                    foreach ($row_oil as $oil_one) {
				  				  	  echo '  
				  				  	  <tr>
				  				  	  	<td><input type="text" name="op_oil_type[]" value="'.$oil_one['op_oil_type'].'" ></td>
				  				  	  	<td><input type="text" name="op_price[]" value="'.$oil_one['op_price'].'" >元/公升</td>
				  				  	  	<td>'.$oil_one['op_showorder'].' (拖曳修改)</td>
				  				  	  </tr>';
				  				  	}


                                  
				  				?>
				  			  
				  			  
				  			</tbody>
				  		</table>
				  		<div>
				  		  生效時間：<input type="text" name="op_valid_time" class="datepicker" value="<?php echo $op_valid_date_r;?>" readonly >
				  			  		<select name="op_valid_time_hour">
				  			  		  <?php 
                                       for ($i=0; $i <24 ; $i++) { 
                                       	if ((int)$op_valid_time_r==$i) {
                                       	  echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                       	}
                                       	else{
                                       	  echo '<option value="'.$i.'">'.$i.'</option>';
                                       	}
                                       }
				  			  		  ?>
				  			  		</select>
				  			  		時
				  		</div>
				  	</div>
				  	<input type="hidden" name="op_store" value="1">
				  </form>
				  </div>

				  <div class="col-md-12 text-right">
				  	<span><?php echo $op_valid_time_txt; ?></span> <button type="button" id="submit_oil1" class=" btn btn-success">設定油價</button>
				  </div>
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-lg-12">
			<div class="panel panel-success">
			<div class="panel-heading text-center">
              台塑油價設定
            </div>
			<div class="panel-body">
				<div class="row no-gutters">
				  <div class="col-md-6">
				  	<div class="table-responsive">
				  		<table class="table no-margin">
				  			<thead>
				  				<tr>
				  					<th>油品種類</th>
				  					<th>當前油價</th>
				  					<th>當前顯示順序</th>
				  				</tr>
				  			</thead>
				  			<tbody>

				  			  <?php 
				  			     $oil_time=$NewPdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=2 AND op_valid_time<=DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 'no', 'one');
				  			     $op_valid_datetime=explode(' ', $oil_time['op_valid_time']);

				  			     $op_valid_date_now=$op_valid_datetime[0];

				  			     $op_valid_time_now=explode(':', $op_valid_datetime[1]);
				  			     $op_valid_time_now=$op_valid_time_now[0];

				  			     $row_oil=$NewPdo->select("SELECT * FROM oil_price WHERE op_store=2 AND op_valid_time=:op_valid_time ORDER BY op_showorder", ['op_valid_time'=>$oil_time['op_valid_time']]);
				  			     foreach ($row_oil as $oil_one) {
				  			       echo '  
				  			       <tr>
				  			       	<td><input type="text" value="'.$oil_one['op_oil_type'].'" readonly></td>
				  			       	<td><input type="text" value="'.$oil_one['op_price'].'" readonly>元/公升</td>
				  			       	<td>'.$oil_one['op_showorder'].'</td>
				  			       </tr>';
				  			     }
				  			  ?>
				  			  

				  			</tbody>
				  		</table>
				  		<div>
				  		  生效時間：<input type="text" value="<?php echo $op_valid_date_now;?>" readonly>
				  		  <input style="width: 50px;" type="text" value="<?php echo $op_valid_time_now;?>" readonly>時
				  		</div>
				  	</div>
				  </div>
				  <div class="col-md-6">
				  	<form id="r_oil_form2" action="" method="POST">
				  	<div class="table-responsive">
				  		<table class="table no-margin">
				  			<thead>
				  				<tr>
				  					<th>油品種類</th>
				  					<th>預設油價</th>
				  					<th>預設顯示順序</th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  				<?php 
				  				  $oil_time_r=$NewPdo->select("SELECT op_valid_time FROM oil_price WHERE op_store=2 AND op_valid_time>DATE(NOW()) ORDER BY op_valid_time DESC LIMIT 0,1", 'no', 'one');
				  				  
                                  //-- 判斷有無預設油價 --
                                  $op_valid_time=empty($oil_time_r['op_valid_time']) ? $oil_time['op_valid_time']:$oil_time_r['op_valid_time'];
                                  $op_valid_time_txt=empty($oil_time_r['op_valid_time']) ? '尚未排程油價' : '目前已排程資料';

                                   $op_valid_datetime=empty($oil_time_r['op_valid_time']) ? explode(' ', date('Y-m-d H:i:s')) : explode(' ', $oil_time_r['op_valid_time']);
                                   $op_valid_date_r=$op_valid_datetime[0];

                                    $op_valid_time_r=explode(':', $op_valid_datetime[1]);
                                    $op_valid_time_r=$op_valid_time_r[0];

                                    
                                    $row_oil=$NewPdo->select("SELECT * FROM oil_price WHERE op_store=2 AND op_valid_time=:op_valid_time ORDER BY op_showorder", ['op_valid_time'=>$op_valid_time]);
                                    foreach ($row_oil as $oil_one) {
				  				  	  echo '  
				  				  	  <tr>
				  				  	  	<td><input type="text" name="op_oil_type[]" value="'.$oil_one['op_oil_type'].'" ></td>
				  				  	  	<td><input type="text" name="op_price[]" value="'.$oil_one['op_price'].'" >元/公升</td>
				  				  	  	<td>'.$oil_one['op_showorder'].' (拖曳修改)</td>
				  				  	  </tr>';
				  				  	}


                                  
				  				?>
				  			  
				  			  
				  			</tbody>
				  		</table>
				  		<div>
				  		  生效時間：<input type="text" name="op_valid_time" class="datepicker" value="<?php echo $op_valid_date_r;?>" readonly >
				  			  		<select name="op_valid_time_hour">
				  			  		  <?php 
                                       for ($i=0; $i <24 ; $i++) { 
                                       	if ((int)$op_valid_time_r==$i) {
                                       	  echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                       	}
                                       	else{
                                       	  echo '<option value="'.$i.'">'.$i.'</option>';
                                       	}
                                       }
				  			  		  ?>
				  			  		</select>
				  			  		時
				  		</div>
				  	</div>
				  	<input type="hidden" name="op_store" value="2">
				  </form>
				  </div>

				  <div class="col-md-12 text-right">
				  	<span><?php echo $op_valid_time_txt; ?></span> <button type="button" id="submit_oil2" class=" btn btn-success">設定油價</button>
				  </div>
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
       $( "#r_oil_form1 .table tbody" ).sortable({
             placeholder: "table_sort_p",
             revert: 300,
             update: function( event, ui ) {
             	$("#sort_btn").css('display', 'inline-block');
             }
        });

       //-- 拖曳更新排序 --
       $( "#r_oil_form2 .table tbody" ).sortable({
             placeholder: "table_sort_p",
             revert: 300,
             update: function( event, ui ) {
             	$("#sort_btn").css('display', 'inline-block');
             }
        });

       $('#submit_oil1').click(function(event) {
       	 
       	 var err_txt='';
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(1) [name="op_oil_type[]"]', '油品種類1，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(2) [name="op_oil_type[]"]', '油品種類2，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(3) [name="op_oil_type[]"]', '油品種類3，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(4) [name="op_oil_type[]"]', '油品種類4，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(1) [name="op_price[]"]', '當前油價1，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(2) [name="op_price[]"]', '當前油價2，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(3) [name="op_price[]"]', '當前油價3，' );
       	 err_txt = err_txt + check_input( '#r_oil_form1 tr:nth-child(4) [name="op_price[]"]', '當前油價4，' );
       	 
       	 if (err_txt!='') {
       	  err_txt=err_txt.slice(0, -1);
       	  alert("請輸入"+err_txt+"!!");
       	 }
       	 else{
       	 	$('#r_oil_form1').submit();
       	 }
       });


       $('#submit_oil2').click(function(event) {
       	 
       	 var err_txt='';
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(1) [name="op_oil_type[]"]', '油品種類1，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(2) [name="op_oil_type[]"]', '油品種類2，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(3) [name="op_oil_type[]"]', '油品種類3，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(4) [name="op_oil_type[]"]', '油品種類4，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(1) [name="op_price[]"]', '當前油價1，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(2) [name="op_price[]"]', '當前油價2，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(3) [name="op_price[]"]', '當前油價3，' );
       	 err_txt = err_txt + check_input( '#r_oil_form2 tr:nth-child(4) [name="op_price[]"]', '當前油價4，' );
       	 
       	 if (err_txt!='') {
       	  err_txt=err_txt.slice(0, -1);
       	  alert("請輸入"+err_txt+"!!");
       	 }
       	 else{
       	 	$('#r_oil_form2').submit();
       	 }
       });


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
