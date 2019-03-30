<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.nowrap{white-space: nowrap;}
  .table>tbody>tr:nth-child(even){ background-color: #ccc; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  $row=$NewPdo->select("SELECT ".$_GET['td_name']." FROM credit_card_eq WHERE bank_id=:bank_id AND eq_id=:eq_id GROUP BY ".$_GET['td_name']." ORDER BY Tb_index DESC", ['bank_id'=>$_GET['bank_id'], 'eq_id'=>$_GET['eq_id']]);
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
          <div class="col-xs-12">
     			<div class="panel panel-default">
     				<div class="panel-heading">
     					<header>權益項目</header>
     				</div>
     				<div class="panel-body">

     				<table class="table table-hover">
		                              <thead>
		                                <tr>
		                                    <th class="nowrap">資料</th>
		                                    <th>管理</th>
		                                </tr>
		                              </thead>
		                              <tbody>
		                              	<?php 
		                              	 foreach ($row as $row_one) {
		                              	 	
		                              	  $type=$_GET['type']=='interest' ? 'include_group': 'schedule_include_group';

                                       echo '
                                      <tr>
		                                		<td>'.$row_one[$_GET['td_name']].'</td>
		                                		<td><button class="btn btn-info btn-sm '.$type.' '.$_GET['td_name'].'" type="button">引用群組</button></td>
		                                	</tr>';

		                              	 }
		                              	?>
		                              </tbody>
		            </table>
                <input type="hidden" name="td_name" value="<?php echo $_GET['td_name'];?>">

     					
     				</div>
     			</div>
     		</div>

		



		
	</div>



</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
        
		
         //-- 引用群組 --
          $(".include_group").click(function(event) {
              
              //-- 權益內容 --
              var interests=$(this).parent().prev().html();       
              $('.new_interest_div [name="'+$('[name=td_name]').val()+'"]',parent.document).val( interests);

              parent.jQuery.fancybox.close();	          	
          });




          //-- 引用群組 (排程) --
          $(".schedule_include_group").click(function(event) {
              
              //-- 權益內容 --
              var interests=$(this).parent().prev().html();       
              $('.schedule_div [name="'+$('[name=td_name]').val()+'"]',parent.document).val( interests);

              parent.jQuery.fancybox.close();	          	
          });
         

      
      });
   
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>