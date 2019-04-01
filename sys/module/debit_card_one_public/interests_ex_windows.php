<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
  .table>tbody>tr:nth-child(even){ background-color: #ccc; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  $row=$NewPdo->select("SELECT * FROM debit_card_eq WHERE bank_id=:bank_id AND eq_id=:eq_id GROUP BY group_id ORDER BY Tb_index DESC", ['bank_id'=>$_GET['bank_id'], 'eq_id'=>$_GET['eq_id']]);
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
          <div class="col-xs-12">
     			<div class="panel panel-default">
     				<div class="panel-heading">
     					<header>權益項目群組</header>
     				</div>
     				<div class="panel-body">

     				<table class="table table-hover">
		                              <thead>
		                                <tr>
		                                    <th style="width: 500px;">內容說明</th>
		                                    <th class="nowrap">簡化內容說明</th>
		                                    <th class="nowrap">附註資料</th>
		                                    <th class="nowrap">量化資料</th>
		                                    <th class="nowrap">生效日期</th>
		                                    <th class="nowrap">截止日期</th>
		                                    <th>管理</th>

		                                </tr>
		                              </thead>
		                              <tbody>
		                              	<?php 
		                              	 foreach ($row as $row_one) {
		                              	 	
		                              	   $type=$_GET['type']=='interest' ? 'include_group': 'schedule_include_group';

                                           echo '
                                             <tr>
                                                <input type="hidden" class="group_id" name="group_id" value="'.$row_one['group_id'].'">
		                                		<td class="content">'.$row_one['content'].'</td>
		                                		<td class="sm_content">'.$row_one['sm_content'].'</td>
		                                		<td class="note">'.$row_one['note'].'</td>
		                                		<td class="nowrap number_data">'.$row_one['number_data'].'</td>
		                                		<td class="nowrap StartDate">'.$row_one['StartDate'].'</td>
		                                		<td class="nowrap EndDate">'.$row_one['EndDate'].'</td>
		                                		<td><button class="btn btn-info btn-sm '.$type.'" type="button">引用群組</button></td>
		                                	</tr>';

		                              	 }
		                              	?>
		                              </tbody>
		            </table>
     					
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
              var interests=[];
              interests[0]=$(this).parents('tr').find('.group_id').val();
              interests[1]=$(this).parents('tr').find('.content').html();
              interests[2]=$(this).parents('tr').find('.sm_content').html();
              interests[3]=$(this).parents('tr').find('.note').html();
              interests[4]=$(this).parents('tr').find('.number_data').html();
              interests[5]=$(this).parents('tr').find('.StartDate').html();
              interests[6]=$(this).parents('tr').find('.EndDate').html();
              
              $('.new_interest_div [name="interest_content_group_id"]',parent.document).val( interests[0] );
              $('.new_interest_div [name="content"]',parent.document).val( interests[1] );
              $('.new_interest_div [name="sm_content"]',parent.document).val( interests[2] );
              $('.new_interest_div [name="note"]',parent.document).val( interests[3] );
              $('.new_interest_div [name="number_data"]',parent.document).val( interests[4] );
              $('.new_interest_div [name="StartDate"]',parent.document).val( interests[5] );
              $('.new_interest_div [name="EndDate"]',parent.document).val( interests[6]  );

              $('.new_interest_div [name="interest_content_group_id"]',parent.document).prop('readonly', true);
              $('.new_interest_div [name="content"]',parent.document).prop('readonly', true);
              $('.new_interest_div [name="sm_content"]',parent.document).prop('readonly', true);
              $('.new_interest_div [name="note"]',parent.document).prop('readonly', true);
              $('.new_interest_div [name="number_data"]',parent.document).prop('readonly', true);
              $('.new_interest_div [name="StartDate"]',parent.document).prop('readonly', true);
              $('.new_interest_div [name="EndDate"]',parent.document).prop('readonly', true);;
              
              $('.new_interest_div .Template',parent.document).css('display', 'none');

              parent.jQuery.fancybox.close();	          	
          });




          //-- 引用群組 (排程) --
          $(".schedule_include_group").click(function(event) {
              
              //-- 權益內容 --
              var interests=[];
              interests[0]=$(this).parents('tr').find('.group_id').val();
              interests[1]=$(this).parents('tr').find('.content').html();
              interests[2]=$(this).parents('tr').find('.sm_content').html();
              interests[3]=$(this).parents('tr').find('.note').html();
              interests[4]=$(this).parents('tr').find('.number_data').html();
              interests[5]=$(this).parents('tr').find('.StartDate').html();
              interests[6]=$(this).parents('tr').find('.EndDate').html();
              
              $('.schedule_div [name="interest_content_group_id"]',parent.document).val( interests[0] );
              $('.schedule_div [name="content"]',parent.document).val( interests[1] );
              $('.schedule_div [name="sm_content"]',parent.document).val( interests[2] );
              $('.schedule_div [name="note"]',parent.document).val( interests[3] );
              $('.schedule_div [name="number_data"]',parent.document).val( interests[4] );
              $('.schedule_div [name="StartDate"]',parent.document).val( interests[5] );
              $('.schedule_div [name="EndDate"]',parent.document).val( interests[6]  );

              $('.schedule_div [name="interest_content_group_id"]',parent.document).prop('readonly', true);
              $('.schedule_div [name="content"]',parent.document).prop('readonly', true);
              $('.schedule_div [name="sm_content"]',parent.document).prop('readonly', true);
              $('.schedule_div [name="note"]',parent.document).prop('readonly', true);
              $('.schedule_div [name="number_data"]',parent.document).prop('readonly', true);
              $('.schedule_div [name="StartDate"]',parent.document).prop('readonly', true);
              $('.schedule_div [name="EndDate"]',parent.document).prop('readonly', true);;
              
              $('.schedule_div .Template',parent.document).css('display', 'none');

              parent.jQuery.fancybox.close();	          	
          });
         

      
      });
   
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>