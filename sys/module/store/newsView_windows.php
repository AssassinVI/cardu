<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
  .col-7{display: inline-block; width: 58%; }
  .col-7 h1{ margin: 3.1rem 3rem; font-weight: 600; font-size: 37px; color: #fff; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.32); }
  .col-5{ width: 41%; display: inline-flex; justify-content: center; align-items: center; vertical-align: top;}
  .ticketbg2{width: 100%; background-image: url(http://cardu.srl.tw/img/component/about_bg.jpg); background-size: cover; }
  .card_btn button{  margin: 3px 10px; }
  .card_btn button:nth-child(1){ background-color: #fc9b1b; color: #fff; }
  .card_btn button:nth-child(2){ background-color: #797979; color: #fff; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
  $where=array('Tb_index'=>$_GET['Tb_index']);
  $row=pdo_select('SELECT * FROM store WHERE Tb_index=:Tb_index', $where);
   

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>新聞預覽</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					                
          <div class="ticketbg2">

                              <div class="col-7">
                              <h1><?php echo $row['st_name']; ?></h1>
                              </div>
                              <div class="col-5">
                               <div class="text-center">
                                  <img src="../../img/<?php echo $row['st_logo']; ?>" >
                                 <div class="card_btn">
                                   <button type="button" class="btn btn-orange">詳細介紹</button>
                                   <button type="button" class="btn btn-gray">前往官網</button>
                                 </div>
                               </div>
                            </div>
      
          </div>

          <div class="txt_div">
            <?php echo $row['st_intro']; ?>
          </div>

                                  
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

		//-- alt 圖說 --
		img_txt('.news_div p img');


      
      });
    
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>