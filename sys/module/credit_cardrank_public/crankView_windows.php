<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<link rel="stylesheet" type="text/css" href="../../../vendor/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../../css/styleUpdate.css">
<link rel="stylesheet" type="text/css" href="../../../css/styleUpdate2.css">
<style type="text/css">
	.rank_hot .col-md-4{ max-width: 240px; }
	.darkpurple_tab .row.imp_int_title{ font-size: 16px; padding: 7px 0; }
	.imp_int .angle_down{ font-size: 40px;  color: #7e7e7e; }
	.angle_down:hover i { color: #1d368c; transform: scale(1.2);}
	.col-md.hv-center p {font-size: 16px;}
	.imp_int .collapse_txt{ font-size: 15px; }

	/*----------------------------- 工具提示框 ----------------------------------*/

	.tooltip-inner{padding: .7rem 1rem; color: #000; text-align: left; background-color: #fff; border-radius: 0.8rem; border: 1px solid #d0b3e9; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.15); font-size: 15px;}
	.tooltip.bottom .tooltip-arrow { border-bottom-color: #fff;top: 1px;}
	.tooltip-arrow:after { content: ""; position: absolute; top: -2px; left: -7px; z-index: -1; width: 0px; height: 0px; border-color: transparent; border-style: solid; border-width: 0 0.55rem 0.6rem; border-bottom-color: #d0b3e9;}

	/*----------------------------- 工具提示框 END ----------------------------------*/
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
   
   //-- 卡排行資料 --
   $row=$NewPdo->select("SELECT * FROM credit_cardrank WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['Tb_index']], 'one');

   //-- 卡排行分類資料 --
   $row_type=$NewPdo->select("SELECT cc_so_type_01_cname, cc_so_type_02_cname, cc_so_type_03_cname FROM credit_cardrank_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ccs_cc_so_pk']], 'one');

   //-- 信用卡 --
   $row_cc=$NewPdo->select("SELECT * FROM credit_card WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ccs_cc_pk']], 'one');
   $ccs_cc_cardname=explode(']', $row['ccs_cc_cardname']);
   $ccs_cc_cardname=$ccs_cc_cardname[1];
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>預覽卡排行</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">

                
              <div class="darkpurple_tab ">
                	                	
                <div class="row no-gutters imp_int_title rank_card_title" style="transform: matrix(1, 0, 0, 1, 0, 0); position: relative; z-index: 10;">
                              <div class="col-md-1 text-center"></div>
                              <div class="col-md-11">
                              	<div class="row no-gutters">
                              		<div class="col-md-4 text-center">卡片名稱</div>
                              		<div class="col-md text-center"><?php echo $row_type['cc_so_type_01_cname']; ?></div>
                              		<div class="col-md text-center"><?php echo $row_type['cc_so_type_02_cname']; ?></div>
                              		<div class="col-md text-center"><?php echo $row_type['cc_so_type_03_cname']; ?></div>
                              	</div>
                              </div>
                              
                              
                </div>


                <div class="accordion imp_int">
                <div class="card rank_hot rank_second">
                                <div class="py-3 money_header hv-center" id="imp_int1">
                                  <div class="row">
                                    <div class="col-md-1">
                                      
                                    </div>
                                    <div class="col-md-11">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h5 class=" money_main mb-0"><?php echo $ccs_cc_cardname; ?></h5>
                                        </div>
                                         <div class="row w-h-100">
                                  
                                     
                                    <div class="col-md-4 hv-center">
                                       <div class="rank_care ">
                                         <a href="#">
                                          <img class="rank_img" src="../../../sys/img/<?php echo $row_cc['cc_photo'] ; ?>" title="<?php echo $ccs_cc_cardname; ?>">
                                         </a>
                                      </div>
                                    </div>
                                     <div class="col-md hv-center">
                                     	<?php
                                     	  if (empty($row['ccs_typename_01_memo'])) {
                                     	  	if (mb_strlen($row['ccs_typename_01'],'utf-8')>40) {
                                     	  	   echo '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$row['ccs_typename_01'].'">'.mb_substr($row['ccs_typename_01'], 0, 40, 'utf-8').'...</p>';
                                     	  	}
                                     	  	else{
                                               echo '<p class=" hv-center mb-0">'.$row['ccs_typename_01'].'</p>';
                                     	  	} 
                                     	  	
                                     	  }
                                     	  else{
                                     	  	echo '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$row['ccs_typename_01_memo'].'">'.$row['ccs_typename_01'].'</p>';
                                     	  }
                                     	?>
                                      
                                     </div>
                                    <div class="col-md hv-center border-left border-right">
                                      <?php
                                     	  if (empty($row['ccs_typename_02_memo'])) {
                                     	  	if (mb_strlen($row['ccs_typename_02'],'utf-8')>40) {
                                     	  	   echo '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$row['ccs_typename_02'].'">'.mb_substr($row['ccs_typename_02'], 0, 40, 'utf-8').'...</p>';
                                     	  	}
                                     	  	else{
                                               echo '<p class=" hv-center mb-0">'.$row['ccs_typename_02'].'</p>';
                                     	  	} 
                                     	  }
                                     	  else{
                                     	  	echo '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$row['ccs_typename_02_memo'].'">'.$row['ccs_typename_02'].'</p>';
                                     	  }
                                     	?>
                                    </div>
                                    <div class="col-md hv-center">
                                      <?php
                                     	  if (empty($row['ccs_typename_03_memo'])) {
                                     	  	if (mb_strlen($row['ccs_typename_03'],'utf-8')>40) {
                                     	  	   echo '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$row['ccs_typename_03'].'">'.mb_substr($row['ccs_typename_03'], 0, 40, 'utf-8').'...</p>';
                                     	  	}
                                     	  	else{
                                               echo '<p class=" hv-center mb-0">'.$row['ccs_typename_03'].'</p>';
                                     	  	} 
                                     	  }
                                     	  else{
                                     	  	echo '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$row['ccs_typename_03_memo'].'">'.$row['ccs_typename_03'].'</p>';
                                     	  }
                                     	?>
                                    </div>

                                    <div class="col-md-12 row">
                                     
                                      
                                       <div class="col-md-4 hv-center">
                                       <div class="profit_btn  hv-center">
                                       <button type="button" class="btn warning-layered btnOver">立即辦卡</button>
                                       <button type="button" card_id="ccard20190320001" card_img="../img/component/card3.png" class="btn gray-layered btnOver add_contrast_card">加入比較</button>
                                       </div>
                                       
                                      </div>
                                      <div class="col-md-8 hv-center">
                                        <p class="collapse_txt mb-0"> 謹慎理財 信用至上(✱本排行僅供參考)</p>
                                        <button class="btn btn-link angle_down money_button" type="button" data-toggle="collapse" data-target="#imp_int_txt1" aria-expanded="true" aria-controls="imp_int_txt1" title="更多資訊">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                      </div>
                                     
                                    
                                  </div>
                                  </div>
                                      </div>
                                    </div>
                                 
                                </div>
                                </div>
                                <div id="imp_int_txt1" class="collapse" aria-labelledby="imp_int1" data-parent="#accordionExample">
                                  <div class="card-body">
                                  	<div class="row">
                                  	  <div class="col-md-4 hv-center">
                                  	  	<h2><img src="https://www.cardu.com.tw/images/cardrank/tick.png">信用卡特色</h2>
                                  	  </div>
                                  	  <div class="col-md-8">
                                  	  	<p class="collapse_txt mb-0">
                                  	  	 <?php echo nl2br($row_cc['cc_interest_desc']); ?>
                                  	  	</p>
                                  	  </div>
                                  	</div>
                                    
                                  </div>
                                </div>
                              </div>
                          </div>
                       </div>



				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>

	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {

       //--- 工具提示框 ---
       $('[data-toggle="tooltip"]').tooltip();
       $('[data-toggle="tooltip"]').mouseenter(function(event) {
       	$('.tooltip').addClass('show');
       });
       $('[data-toggle="tooltip"]').mouseleave(function(event) {
       	$('.tooltip').removeClass('show');
       });

		/*-- 卡情報-單卡-百葉窗 --*/
		$('.imp_int .angle_down').click(function(event) {
		  
		  //-- 展開 --
		  if ($(this).find('i').attr('class')=='fa fa-angle-down') {
		    $('.imp_int .angle_down i').removeClass('fa-angle-down');
		    $('.imp_int .angle_down i').removeClass('fa-angle-up');
		    $('.imp_int .angle_down i').addClass('fa-angle-down');
		    $(this).find('i').removeClass('fa-angle-down');
		    $(this).find('i').addClass('fa-angle-up');
		    $('#imp_int_txt1').addClass('show');
		  }
		  //-- 收合 --
		  else{
		    $(this).find('i').removeClass('fa-angle-up');
		    $(this).find('i').addClass('fa-angle-down');
		    $('#imp_int_txt1').removeClass('show');
		  }
		});
	});
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>