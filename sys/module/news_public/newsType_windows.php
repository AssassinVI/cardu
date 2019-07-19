<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.tooltip-demo .row a{ font-size: 18px; }
	.panel-body .type_div{ border-bottom: 1px solid #ccc; margin-bottom: 5px; }
	.panel-body .type_div .type{ display: none; padding-left: 15px; }

</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();

   //-- 主分類 --
   $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id='site2018111910445721' AND nt_sp='0'");
   $sql->execute();
   $row_type=$sql->fetchAll(PDO::FETCH_ASSOC);
   
   //-- 特別議題 --
   $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id='site2018111910445721' AND nt_sp='1' AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>=:nt_sp_end_date");
   $sql->execute(['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
   $row_sp_type=$sql->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="wrapper wrapper-content animated fadeInRight">
 
 <!-- 關閉視窗 -->
 <a class="close_fancybox" href="javascript:;">Ｘ</a>

	<div class="row">
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>主分類(至少要選擇一個)
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form  action="manager.php" method="POST" class="form-horizontal put_form">

						<div class="form-group">
							<div class="col-md-9 tooltip-demo">
                               
								<?php
                                  foreach ($row_type as $row_type_one) {
                                  	echo '

                                  	   <div class="row">
                                  	   	<div class="col-xs-7">
                                         <label>
                                           <input type="radio" name="news_type" typeName="'.$row_type_one['nt_name'].'" value="'.$row_type_one['Tb_index'].'"> '.$row_type_one['nt_name'].'
                                         </label> 
                                  	   	</div>
                                  	   	<div class="col-xs-1">
                                           <a href="javascript:;" data-toggle="tooltip" data-placement="right" title="" data-original-title="'.$row_type_one['nt_define'].'"><i class="fa fa-question-circle"></i></a>
                                  	   	</div>
                                  	   </div> ';
                                  }
								?>
							</div>
						</div>

						
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>

		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>特別議題
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form action="manager.php" method="POST" class="form-horizontal put_form">

						<div class="form-group">
							
							<div class="col-md-9 tooltip-demo">

									   <div class="row">
									   	<div class="col-xs-7">
								       <label>
								         <input type="radio" name="news_sp_type" > 無
								       </label> 
									   	</div>
									   	
									   </div>

								<?php
                                  foreach ($row_sp_type as $row_type_one) {
                                  	echo '
                                  		   <div class="row">
                                  		   	<div class="col-xs-7">
                                  	       <label>
                                  	         <input type="radio" name="news_sp_type" typeName="'.$row_type_one['nt_name'].'" value="'.$row_type_one['Tb_index'].'"> '.$row_type_one['nt_name'].'
                                  	       </label> 
                                  		   	</div>
                                  		   	<div class="col-xs-1">
                                  	         <a href="javascript:;" data-toggle="tooltip" data-placement="right" title="" data-original-title="'.$row_type_one['nt_define'].'"><i class="fa fa-question-circle"></i></a>
                                  		   	</div>
                                  		   </div>
                                  	';
                                  }
								?>
							</div>
						</div>


					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>

		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>選擇要上刊到其他單元</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
				 <form class="put_form">
				  <div id="cardNews" class="type_div">
				  	<label><input type="checkbox" class="show_check" value="卡情報"> 卡情報</label>
				  	<div class="type row">
				  	  <?php 
                        $cardNews_type=$NewPdo->select("SELECT * FROM news_type 
                                                        WHERE mt_id='site2019011115561564' AND Tb_index!='nt201902121004593' AND Tb_index!='nt2019021210051224' 
                                                        ORDER BY nt_sp ASC, OrderBy ASC");
                        foreach ($cardNews_type as $cardNews_type_one) {
                        	echo '
                        	<div class="col-xs-3">
                        	<label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$cardNews_type_one['nt_name'].'" value="'.$cardNews_type_one['Tb_index'].'"> '.$cardNews_type_one['nt_name'].'</label>
                        	</div>';
                        }
				  	  ?>
				  	</div>
				  </div>

				  <div id="pay" class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優行動Pay"> 優行動Pay</label>
				  	<div class="type row">
				  	  <?php 
                        $pay_type=$NewPdo->select("SELECT * FROM news_type WHERE area_id='at2019011117341414' ORDER BY nt_sp ASC, OrderBy ASC");
                        foreach ($pay_type as $pay_type_one) {
                        	echo '
                        	<div class="col-xs-3">
                        	 <label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$pay_type_one['nt_name'].'" value="'.$pay_type_one['Tb_index'].'"> '.$pay_type_one['nt_name'].'</label>
                        	</div>';
                        }
				  	  ?>
				  	</div>
				  </div>

				  <div id="ticket" class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優票證"> 優票證</label>
				  	<div class="type row">
				  		<?php 
                        $ticket_type=$NewPdo->select("SELECT * FROM news_type WHERE area_id='at2019011117435970' ORDER BY nt_sp ASC, OrderBy ASC");
                        foreach ($ticket_type as $ticket_type_one) {
                        	echo '
                        	<div class="col-xs-3">
                        	  <label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$ticket_type_one['nt_name'].'" value="'.$ticket_type_one['Tb_index'].'"> '.$ticket_type_one['nt_name'].'</label>
                        	</div>';
                        }
				  	  ?>
				  	</div>
				  </div>

				  <div id="point" class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優集點"> 優集點</label>
				  	<div class="type row">
				  	  <?php 
                        $point_type=$NewPdo->select("SELECT * FROM news_type WHERE area_id='at2019011117443626' ORDER BY nt_sp ASC, OrderBy ASC");
                        foreach ($point_type as $point_type_one) {
                        	echo '
                        	<div class="col-xs-3">
                        	  <label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$point_type_one['nt_name'].'" value="'.$point_type_one['Tb_index'].'"> '.$point_type_one['nt_name'].'</label>
                        	</div>';
                        }
				  	  ?>
				  	</div>
				  </div>

				  <div id="travel" class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優旅行"> 優旅行</label>
				  	<div class="type">
				  		<?php 
				  		//-- 單元名稱 --
				  		$unit_arr=[];
				  		$unit_name=$NewPdo->select("SELECT * FROM appUnit", 'no');
                        foreach ($unit_name as $unit_name_one) {
                        	$unit_arr[$unit_name_one['Tb_index']]=$unit_name_one['un_name'];
                        }

                        $travel_unit=$NewPdo->select("SELECT * FROM appArea WHERE Tb_index='at2019011117461656'", 'no', 'one');
                        $travel_unit=explode(',', $travel_unit['at_unit']);

                        foreach ($travel_unit as $travel_unit_one) {
                        	echo '<label><input type="checkbox" class="show_type" typeName="'.$unit_arr[$travel_unit_one].'" value="'.$travel_unit_one.'"> '.$unit_arr[$travel_unit_one].'</label><br>';
                          
                          $tr_share_type_txt='';
                          $tr_share_type=$NewPdo->select("SELECT * FROM news_type WHERE unit_id=:unit_id ORDER BY OrderBy ASC", ['unit_id'=>$travel_unit_one]);
                          foreach ($tr_share_type as $tr_share_type_one) {
                          	$tr_share_type_txt.='
                          	  <label>
                          	    <input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$unit_arr[$travel_unit_one].'-'.$tr_share_type_one['nt_name'].'" value="'.$tr_share_type_one['Tb_index'].'"> 
                          	    '.$tr_share_type_one['nt_name'].'
                          	  </label>｜';
                          }

                        	echo '<div class="type" link_unit="'.$travel_unit_one.'">
                                   '.$tr_share_type_txt.'
                        	      </div>';
                        }
				  	  ?>

				  	  

				  	</div>
				  </div>

				   
				   
				   
					</form>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>

		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
          <button type="button" id="submit_btn" class="btn btn-info  btn-raised">確定</button>
          <button type="button" class="btn btn-default  btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
          <button type="button" id="close_btn" class="btn btn-default  btn-flat" >重設</button>

					
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
              $("#ns_nt_ot_pk",parent.document).html('');

              //--------------- 主分類 -------------------
              $("#ns_nt_pk",parent.document).append( '<span class="btn btn-success">'+$('[name="news_type"]:checked').attr('typeName')+' <input type="hidden" name="ns_nt_pk" value="'+$('[name="news_type"]:checked').val()+'"></span> ' );
              //-- 記錄暫存 --
              sessionStorage.setItem("news_type", $('[name="news_type"]:checked').val());


              //--------------- 特別議題 ---------------
              if ($('[name="news_sp_type"]:checked').attr('typeName')!=undefined) {
                $("#ns_nt_pk",parent.document).append( 
                	'<span class="btn btn-success">'+$('[name="news_sp_type"]:checked').attr('typeName')+' <input type="hidden" name="ns_nt_sp_pk" value="'+$('[name="news_sp_type"]:checked').val()+'"></span> ' 
                );
                //-- 記錄暫存 --
                sessionStorage.setItem("news_sp_type", $('[name="news_sp_type"]:checked').val());
              }
              else{
              	//-- 刪除暫存 --
                sessionStorage.removeItem("news_sp_type");
              }

              //--------------- 上刊到其他單元 ---------------
              if ($('[name="ns_nt_ot_pk[]"]:checked').length>0) {
                var news_ot_type=[];
                $.each($('[name="ns_nt_ot_pk[]"]:checked'), function(index, val) {

                	    news_ot_type.push($(this).val());
                	
                		var area_name=$(this).parents('.type_div').find('.show_check').val();
                		$('#ns_nt_ot_pk', parent.document).append(
                	      '<span class="btn btn-success">'+area_name+'-'+$(this).attr('typeName')+' <input type="hidden" name="ns_nt_ot_pk[]" value="'+$(this).val()+'"></span> '
                		);
                });
                news_ot_type=news_ot_type.join(',');
              	//-- 記錄暫存 --
                sessionStorage.setItem("news_ot_type", news_ot_type);
              }

              parent.jQuery.fancybox.close();	
            }
          	
          });
         
         //-- 重設 --
         $('#close_btn').click(function(event) {
         	$('.put_form').trigger('reset');
         	$('.show_check').parent().next().css('display', 'none');
         });


         //-- 其他要上刊單元下拉 --
         $('.show_check').change(function(event) {
         	if ($(this).prop('checked')==true) {
         		$(this).parent().next().css('display', 'block');
         	}
         	else{
         		$(this).parent().next().find('[type="checkbox"]').prop('checked', false);
         		$(this).parent().next().css('display', 'none');
         	}
         });

         //-- 其他要上刊單元下拉(優旅行) --
         $('.show_type').change(function(event) {
         	var unit_id=$(this).val();
         	if ($(this).prop('checked')==true) {
         		$(this).parents('.type').find('[link_unit="'+unit_id+'"]').css('display', 'block');
         	}
         	else{
         		$(this).parents('.type').find('[link_unit="'+unit_id+'"]').find('[type="checkbox"]').prop('checked', false);
         		$(this).parents('.type').find('[link_unit="'+unit_id+'"]').css('display', 'none');
         	}
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

		if (sessionStorage.getItem("news_ot_type")!=undefined) {
			var news_ot_type=sessionStorage.getItem("news_ot_type").split(',');

			for (var i = 0; i < news_ot_type.length; i++) {
				//console.log(news_ot_type[i]);
				$('[value="'+news_ot_type[i]+'"]').prop('checked', true); 
                //-- 分類 --
				if ($('[value="'+news_ot_type[i]+'"]').parents('.type').css('display')=='none') {
					$('[value="'+news_ot_type[i]+'"]').parents('.type').css('display','block');
				}
				//-- 版區 --
				if ($('[value="'+news_ot_type[i]+'"]').parents('.type_div').find('.show_check').prop('checked')==false) {
                    $('[value="'+news_ot_type[i]+'"]').parents('.type_div').find('.show_check').prop('checked', true);
				}
				//-- 優旅行次版區 --
				if ($('[value="'+news_ot_type[i]+'"]').parents('.type').prev().prev().find('.show_type').prop('checked')==false) {
					$('[value="'+news_ot_type[i]+'"]').parents('.type').prev().prev().find('.show_type').prop('checked', true);
				}
			}
		}
	});
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>