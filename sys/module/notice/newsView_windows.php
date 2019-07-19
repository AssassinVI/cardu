<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();

   //-- 新聞 --
   $sql=$pdo->prepare("SELECT * FROM appNotice WHERE Tb_index=:Tb_index");
   $sql->execute(['Tb_index'=>$_GET['Tb_index']]);
   $row=$sql->fetch(PDO::FETCH_ASSOC);
   

  $Start_End_day='活動時間：'.$row['StartDate'].' ~ '.$row['EndDate'];
  $note='<p>◉注意事項：<br>'.nl2br($row['note']).'</p>';
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>公告活動預覽</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form class="form-horizontal put_form">

						<div class="form-group">

							<div class="news_div">

							  <h2><?php echo $row['aTitle'];?></h2>
							  <div class="second_div">
							  	<p> <?php echo $Start_End_day;?></p>
							  </div>

							  <div>
                               <?php if(!empty($row['aPic'])){ ?>
                                 <p>
                                 	<img style="width: 100%;" src="../../img/<?php echo $row['aPic'];?>" alt="<?php echo $row['aPic_txt'];?>">
                                 </p>
                               <?php } ?>
							  	

                                <div class="txt_div">
                                  <?php echo $row['aTXT'];?>	
                                  <?php echo $note; ?>
                                </div>
                               
                                
							  	
							  </div>

							</div>
							
						</div>

						
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

       //-- alt 圖說 & 手機加入fancybox --
       img_txt('.news_div p img');
               
       //-- 圖寬限制 --
       img_750_w('.news_div img');
       //-- table 優化 --
       html_table('.news_div>table');
      
      });
    
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>