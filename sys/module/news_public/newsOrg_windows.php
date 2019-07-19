<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();

   //-- 主分類 --
   $sql=$pdo->prepare("SELECT * FROM card_org WHERE OnLineOrNot='1' ORDER BY Tb_index ASC");
   $sql->execute();
   $row_org=$sql->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<!-- 關閉視窗 -->
	<a class="close_fancybox" href="javascript:;">Ｘ</a>
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>發卡組織</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form  action="manager.php" method="POST" class="form-horizontal put_form">

						<div class="form-group">
							<div class="col-md-9">
								<?php
                                  foreach ($row_org as $row_org_one) {

                                  	//-- 信用卡 --
                                  	if ($row_org_one['mt_id']=='site2018110611172385') {
                                  		echo '<label><input type="checkbox" name="news_org" orgName="[信用卡]'.$row_org_one['org_name'].'" value="'.$row_org_one['Tb_index'].'"> [信用卡]'.$row_org_one['org_name'].'</label> <br>';
                                  	}
                                  	//-- 金融卡 --
                                  	else{
                                  		echo '<label><input type="checkbox" name="news_org" orgName="[金融卡]'.$row_org_one['org_name'].'" value="'.$row_org_one['Tb_index'].'"> [金融卡]'.$row_org_one['org_name'].'</label> <br>';
                                  	}
                                  	
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
				<div class="panel-body text-center">
					<button type="button" id="submit_btn" class="btn btn-info btn-raised">確定</button>
					<button type="button" class="btn btn-default btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
					<button type="button" id="close_btn" class="btn btn-default btn-flat" >重設</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

          $("#submit_btn").click(function(event) {
           
              $("#over_org",parent.document).html('');
              
              var news_org_arr=[];
              $.each($('[name="news_org"]:checked'), function() {
              	 //-- 組織 --
                 $("#over_org",parent.document).append( '<span class="label">'+$(this).attr('orgName')+' <input type="hidden" name="ns_org[]" value="'+$(this).val()+'"></span>、' );

                 //-- 去除無發卡組織/銀行 勾選 --
                 if ($('[name="no_BankOrg"]',parent.document).prop('checked')==true) {
                 	 $('[name="no_BankOrg"]',parent.document).prop('checked', false);
                 }
                 $('[name="no_BankOrg"]',parent.document).prop('disabled', true);

                 news_org_arr.push($(this).val());
              });

               //-- 記錄暫存 --
               sessionStorage.setItem("news_org", news_org_arr);
              parent.jQuery.fancybox.close();	
            
          });
         
         //-- 重設 --
         $('#close_btn').click(function(event) {
         	$('.put_form').trigger('reset');
         });

      
      });
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {
        
		if (sessionStorage.getItem("news_org")!=undefined) {

			var news_org_arr=sessionStorage.getItem("news_org");
			    news_org_arr=news_org_arr.split(',');

			for (var i = 0; i < news_org_arr.length; i++) {
				
				$('[value="'+news_org_arr[i]+'"]').prop('checked', true); 
			}
			
		}

	});
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>