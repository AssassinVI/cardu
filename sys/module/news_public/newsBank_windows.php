<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();

   //-- 銀行 --
   $sql=$pdo->prepare("SELECT * FROM bank_info WHERE OnLineOrNot='1' ORDER BY bi_code ASC");
   $sql->execute();
   $row_bank=$sql->fetchAll(PDO::FETCH_ASSOC);
   

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>銀行
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form class="form-horizontal put_form">

						<div class="form-group">
							<div class="col-md-9 row">
								<?php
                                  foreach ($row_bank as $row_bank_one) {
                                  	echo '<label class="col-xs-6"><input type="checkbox" name="news_bank" bankName="['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'" value="'.$row_bank_one['Tb_index'].'"> ['.$row_bank_one['bi_code'].']'.$row_bank_one['bi_shortname'].'</label>';
                                  }
								?>
							</div>
						</div>

						
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
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
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

          $("#submit_btn").click(function(event) {
           
              $("#over_bank",parent.document).html('');
              
              var news_bank_arr=[];
              $.each($('[name="news_bank"]:checked'), function() {
              	 //-- 銀行 --
                 $("#over_bank",parent.document).append( '<span class="label">'+$(this).attr('bankName')+' <input type="hidden" name="ns_bank[]" value="'+$(this).val()+'"></span>、' );
                 
                 //-- 去除無發卡組織/銀行 勾選 --
                 if ($('[name="no_BankOrg"]',parent.document).prop('checked')==true) {
                 	 $('[name="no_BankOrg"]',parent.document).prop('checked', false);
                 }
                 $('[name="no_BankOrg"]',parent.document).prop('disabled', true);

                 news_bank_arr.push($(this).val());
              });

               //-- 記錄暫存 --
               sessionStorage.setItem("news_bank", news_bank_arr);
              parent.jQuery.fancybox.close();	
            
          });
         
         //-- 重設 --
         $('#close_btn').click(function(event) {
         	$('.put_form').trigger('reset');
         });

      
      });
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {
        
		if (sessionStorage.getItem("news_bank")!=undefined) {

			var news_bank_arr=sessionStorage.getItem("news_bank");
			    news_bank_arr=news_bank_arr.split(',');

			for (var i = 0; i < news_bank_arr.length; i++) {
				
				$('[value="'+news_bank_arr[i]+'"]').prop('checked', true); 
			}
			
		}

	});
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>