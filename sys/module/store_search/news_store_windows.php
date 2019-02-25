<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();

   //-- 主分類 --
   $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id='site2018111910445721' AND nt_sp='0'");
   $sql->execute();
   $row_type=$sql->fetchAll(PDO::FETCH_ASSOC);
   
   //-- 特別議題 --
   $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id='site2018111910445721' AND nt_sp='1'");
   $sql->execute();
   $row_sp_type=$sql->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>主分類(至少要選擇一個)
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form  action="manager.php" method="POST" class="form-horizontal put_form">

						<div class="form-group">
							<div class="col-md-9">
								<?php
                                  foreach ($row_type as $row_type_one) {
                                  	echo '<label><input type="radio" name="news_type" typeName="'.$row_type_one['nt_name'].'" value="'.$row_type_one['Tb_index'].'"> '.$row_type_one['nt_name'].'</label> <br>';
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
					<header>特別議題
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form action="manager.php" method="POST" class="form-horizontal put_form">

						<div class="form-group">
							
							<div class="col-md-9">
								<?php
                                  foreach ($row_sp_type as $row_type_one) {
                                  	echo '<label><input type="radio" name="news_sp_type" typeName="'.$row_type_one['nt_name'].'" value="'.$row_type_one['Tb_index'].'"> '.$row_type_one['nt_name'].'</label> <br>';
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
            if ($('[name="news_type"]:checked').attr('typeName')==undefined) {
            	alert('請選擇一個主題');
            }
            else{
              $("#ns_nt_pk",parent.document).html('');

              //-- 主分類 --
              $("#ns_nt_pk",parent.document).append( '<span class="btn btn-success">'+$('[name="news_type"]:checked').attr('typeName')+' <input type="hidden" name="ns_nt_pk" value="'+$('[name="news_type"]:checked').val()+'"></span> ' );
              //-- 記錄暫存 --
              sessionStorage.setItem("news_type", $('[name="news_type"]:checked').val());

              //-- 特別議題 --
              if ($('[name="news_sp_type"]:checked').attr('typeName')!=undefined) {
                $("#ns_nt_pk",parent.document).append( 
                	'<span class="btn btn-success">'+$('[name="news_sp_type"]:checked').attr('typeName')+' <input type="hidden" name="ns_nt_pk" value="'+$('[name="news_sp_type"]:checked').val()+'"></span> ' 
                );
                //-- 記錄暫存 --
                sessionStorage.setItem("news_sp_type", $('[name="news_sp_type"]:checked').val());
              }

              parent.jQuery.fancybox.close();	
            }
          	
          });
         
         //-- 重設 --
         $('#close_btn').click(function(event) {
         	$('.put_form').trigger('reset');
         });

      
      });
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {
        
		if (sessionStorage.getItem("news_type")!=undefined) {
			$('[value="'+sessionStorage.getItem("news_type")+'"]').prop('checked', true); 
		}

		if (sessionStorage.getItem("news_sp_type")!=undefined) {
			$('[value="'+sessionStorage.getItem("news_sp_type")+'"]').prop('checked', true); 
		}
	});
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>