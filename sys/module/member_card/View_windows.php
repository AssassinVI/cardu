<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
  .popular_list_img img{ height: 127px; }
  .panel-body .shop_card h5 { color: #3f57b5; font-weight: bold; font-size: 20px;}
  .panel-body p{ font-size: 20px; letter-spacing: 0.5px; line-height: 1.8; margin: 0; margin-left: auto; margin-right: auto; }
  .row.imp_int_title{ background-color: #b97253; color: #fff; font-weight: bold; font-size: 16px;  padding: 7px; margin: 0;}
  .border-left {  border-left: 1px solid #dee2e6!important;}
  .border-right { border-right: 1px solid #dee2e6!important;}
  .imp_int .card-header {  padding: 12px 6px;  height: 100px; border-bottom: 1px solid #ddd; }
  .card:nth-child(odd) { background-color: #f5f6f7; }
  .h-center {  display: flex;  align-items: center;}
  .hv-center { display: flex !important; justify-content: center; align-items: center; }
  .w-h-100 { width: 100%;  height: 100%;}
  .h-100{ height: 100%; }
  .angle_down { font-size: 40px; color: #7e7e7e; }
  .shop_card { margin-bottom: 10px; }
  .shop_card .col-md-4{ height: 210px; }
  .card-body { -ms-flex: 1 1 auto; flex: 1 1 auto; padding: 1.25rem; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
 
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>會員卡預覽</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div style="width: 750px; margin: auto;">
					    <?php 
					     $row_st_card=$NewPdo->select("SELECT Tb_index, card_name, card_sp_txt, card_img FROM member_card WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']],'one');
					     $rand_num=rand(0,999);
					    ?>

					    <div class="row no-gutters shop_card py-2">
					      <div class="col-md-4 hv-center">
					        <a class="popular_list_img" href="#">
					          <img src="../../img/<?php echo $row_st_card['card_img'].'?'.$rand_num; ?>">
					        </a>
					      </div>
					      <div class="col-md-8">
					        <h5 class="ph-center"><?php echo $row_st_card['card_name']; ?></h5>
					        <p>
					         <?php echo nl2br($row_st_card['card_sp_txt']); ?>
					        </p>
					      </div>
					    </div>
					   <div class="row imp_int_title">
					      <div class="col-md-3 text-center">權益項目</div>
					      <div class="col-md-9 text-center">內容說明(謹慎理財，信用至上)</div>
					    </div>
					    <div class="accordion imp_int" id="accordionExample">

					     <?php 
					      $row_card_eq=$NewPdo->select("SELECT mcp.pref_txt, mcp.ez_pref_txt, cp.pref_name, cp.pref_image
					                                 FROM member_card_pref as mcp
					                                 INNER JOIN card_pref as cp ON cp.Tb_index=mcp.pref_id
					                                 WHERE mcp.card_id=:card_id", ['card_id'=>$row_st_card['Tb_index']]);
					      
					      $x=1;
					      foreach ($row_card_eq as $card_eq) {
					        
					        echo '
					        <div class="card">
					        <div class="card-header hv-center" id="imp_int'.$x.'">
					          <div class="row w-h-100">
					            <div class="col-md-4 h-center h-100">
					              <p class="shop_txt hv-center mb-0"><img src="../../img/'.$card_eq['pref_image'].'?'.$rand_num.'" >　'.$card_eq['pref_name'].'</p>
					            </div>
					            <div class="col-md-7 h-center h-100 border-left border-right">
					              <p class="shop_txt mb-0">'.$card_eq['ez_pref_txt'].'</p>
					            </div>
					            <div class="col-md-1 hv-center">
					              <button class="btn btn-link angle_down" type="button" data-toggle="collapse" data-target="#imp_int_txt'.$x.'" aria-expanded="true" aria-controls="imp_int_txt'.$x.'">
					                <i class="fa fa-angle-down"></i>
					              </button>
					            </div>
					          </div>
					        </div>
					        <div id="imp_int_txt'.$x.'" class="collapse" aria-labelledby="imp_int1" data-parent="#accordionExample">
					          <div class="card-body">
					            <p class="collapse_txt mb-0">
					             '.$card_eq['pref_txt'].'
					            </p>
					          </div>
					        </div>
					       </div>';
					       $x++;
					      }
					     ?>

					    </div>
					</div>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">

    
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>