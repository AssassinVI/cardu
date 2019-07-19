<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();

   //-- 新聞 --
   $sql=$pdo->prepare("SELECT * FROM appNews WHERE Tb_index=:Tb_index");
   $sql->execute(['Tb_index'=>$_GET['Tb_index']]);
   $row=$sql->fetch(PDO::FETCH_ASSOC);
   
   $ns_reporter_type=$row['ns_reporter_type']==2 ? '發表人':'記者';

   $newsType_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']], 'one');
  $newsType_sp_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_sp_pk']], 'one');
  $newsType_txt=empty($newsType_sp_name['nt_name']) ? $newsType_name['nt_name'] : $newsType_name['nt_name'].'｜'.$newsType_sp_name['nt_name'].'｜';
  $Start_End_day=$row['StartDate'].' ~ '.$row['EndDate'];

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>新聞預覽</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form class="form-horizontal put_form">

						<div class="form-group">

							<div class="news_div">
							  <h2><?php echo $row['ns_ftitle'];?></h2>
							  <div class="second_div">
							  	<h4><?php echo $row['ns_stitle'];?></h4>
							  	<p ><?php echo $ns_reporter_type.' '.$row['ns_reporter'].'報導 '.$row['ns_date'];?></p>
							  </div>
							  <div>
                               <?php if(!empty($row['ns_photo_1'])){ ?>
                               	 <p>
                               	 	<img src="../../img/<?php echo $row['ns_photo_1'];?>" alt="<?php echo $row['ns_alt_1'];?>">
                               	 </p>
                               <?php } ?>
							  	

                                <div class="txt_div">
                                  <?php echo $row['ns_msghtml'];?>	
                                </div>
                               
                               <?php if(!empty($row['ns_photo_2'])){ ?>
                               	<p>
                               		<img src="../../img/<?php echo $row['ns_photo_2'];?>" alt="<?php echo $row['ns_alt_2'];?>">
                               	</p>
							   <?php } ?>

							  	<p class="remark_p">【<?php echo $row['ns_date'];?> 卡優新聞網】http://www.cardu.com.tw</p>
							  	<div class="news_info">
							  	  <p>新聞分類：<?php echo $newsType_txt;?></p>
							  	  <p>上架日期：<?php echo $Start_End_day;?></p>
							  	</div>
							  </div>
							</div>
							
						</div>

						
					</form>
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
<script type="text/javascript">
	$(document).ready(function() {

		//-- alt 圖說 --
		img_txt('.news_div p img');

		//-- 圖寬限制 --
		img_750_w('.news_div img');
		//-- table 優化 --
		html_table('.news_div>table');

         //  $("#submit_btn").click(function(event) {
           
         //      $("#over_bank",parent.document).html('');
              
         //      var news_bank_arr=[];
         //      $.each($('[name="news_bank"]:checked'), function() {
         //      	 //-- 銀行 --
         //         $("#over_bank",parent.document).append( '<span class="label">'+$(this).attr('bankName')+' <input type="hidden" name="ns_bank[]" value="'+$(this).val()+'"></span>、' );

         //         news_bank_arr.push($(this).val());
         //      });

         //       //-- 記錄暫存 --
         //       sessionStorage.setItem("news_bank", news_bank_arr);
         //      parent.jQuery.fancybox.close();	
            
         //  });
         
         // //-- 重設 --
         // $('#close_btn').click(function(event) {
         // 	$('.put_form').trigger('reset');
         // });

      
      });
    
    //-- 讀取記錄 --
	// $(window).on('load',  function(event) {
        
	// 	if (sessionStorage.getItem("news_bank")!=undefined) {

	// 		var news_bank_arr=sessionStorage.getItem("news_bank");
	// 		    news_bank_arr=news_bank_arr.split(',');

	// 		for (var i = 0; i < news_bank_arr.length; i++) {
				
	// 			$('[value="'+news_bank_arr[i]+'"]').prop('checked', true); 
	// 		}
			
	// 	}

	// });
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>