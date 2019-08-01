<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.tooltip-demo .row a{ font-size: 18px; }
	.panel-body .type_div{ border-bottom: 1px solid #ccc; margin-bottom: 5px; }
	.panel-body .type_div .type{ display: none; padding-left: 15px; }

</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
   $pdo=pdo_conn();
   
   //-- 非優旅行 --
   if ($_GET['area_id']!='at2019011117461656') {
     //-- 主分類 --
     $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id='site2019011116103929' AND area_id=:area_id AND nt_sp='0' AND OnLineOrNot=1");
     $sql->execute(['area_id'=>$_GET['area_id']]);
     $row_type=$sql->fetchAll(PDO::FETCH_ASSOC);
   }
   //-- 優旅行 --
   else{
     
     $row_area=$NewPdo->select("SELECT at_unit FROM appArea WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['area_id']], 'one');
     $area_sql=str_replace(",","','",$row_area['at_unit']);
     $area_sql="'".$area_sql."'";
     $row_type=$NewPdo->select("SELECT Tb_index, un_name FROM appUnit WHERE Tb_index IN ($area_sql) ORDER BY field($area_sql)");
     
   }

   
   //-- 特別議題 --
   $sql=$pdo->prepare("SELECT * FROM news_type WHERE mt_id='site2019011116103929' AND area_id=:area_id AND unit_id LIKE :unit_id AND nt_sp='1' AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>=:nt_sp_end_date AND OnLineOrNot=1");
   $sql->execute(['area_id'=>$_GET['area_id'], 'unit_id'=>'%'.$_GET['unit_id'].'%', 'nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
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
                                    //-- 非優旅行 --
                                    if ($_GET['area_id']!='at2019011117461656') {
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
                                    //-- 優旅行 --
                                    else{
                                        echo '
                                           <div class="row">
                                            <div class="col-xs-7">
                                              <label>
                                                <input type="radio" name="news_unit" typeName="'.$row_type_one['un_name'].'" value="'.$row_type_one['Tb_index'].'"> '.$row_type_one['un_name'].'
                                              </label> 
                                            </div>
                                           
                                           </div> ';
                                    }
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


    <div id="travel_area" class="col-xs-12" style="display: none;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <header>地區</header>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
          </div>
        </div>
      </div>
    </div>

		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>選擇要上刊到其他單元</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body" style="height: 190px; overflow: auto;">
				 <form class="put_form">

				  <div  class="type_div">
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

				  <?php 
				   //-------------------------------------- 優行動Pay -----------------------------------------------
				   if($_GET['area_id']!='at2019011117341414'){
                  ?>
            				  <div  class="type_div">
            				  	<label><input type="checkbox" class="show_check" value="優行動Pay"> 優行動Pay</label>
            				  	<div class="type row">
            				  	  <?php 
                                    $pay_type=$NewPdo->select("SELECT * FROM news_type WHERE area_id='at2019011117341414' AND OnLineOrNot=1 ORDER BY nt_sp ASC, OrderBy ASC");
                                    foreach ($pay_type as $pay_type_one) {
                                    	echo '
                                    	<div class="col-xs-3">
                                    	<label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$pay_type_one['nt_name'].'" value="'.$pay_type_one['Tb_index'].'"> '.$pay_type_one['nt_name'].'</label>
                                    	</div>';
                                    }
            				  	  ?>
            				  	</div>
            				  </div>

                  <?php }?>

				  
                  <?php 
				   //-------------------------------------- 優票證 -----------------------------------------------
				   if($_GET['area_id']!='at2019011117435970'){
                  ?>

				  <div  class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優票證"> 優票證</label>
				  	<div class="type row">
				  		<?php 
                        $ticket_type=$NewPdo->select("SELECT * FROM news_type WHERE area_id='at2019011117435970' AND OnLineOrNot=1 ORDER BY nt_sp ASC, OrderBy ASC");
                        foreach ($ticket_type as $ticket_type_one) {
                        	echo '
                        	<div class="col-xs-3">
                        	<label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$ticket_type_one['nt_name'].'" value="'.$ticket_type_one['Tb_index'].'"> '.$ticket_type_one['nt_name'].'</label>
                        	</div>';
                        }
				  	  ?>
				  	</div>
				  </div>

				 <?php } ?>


				 <?php 
				   //-------------------------------------- 優集點 -----------------------------------------------
				   if($_GET['area_id']!='at2019011117443626'){
                  ?>

				  <div  class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優集點"> 優集點</label>
				  	<div class="type row">
				  	  <?php 
                        $point_type=$NewPdo->select("SELECT * FROM news_type WHERE area_id='at2019011117443626' AND OnLineOrNot=1 ORDER BY nt_sp ASC, OrderBy ASC");
                        foreach ($point_type as $point_type_one) {
                        	echo '
                        	<div class="col-xs-3">
                        	<label><input type="checkbox" name="ns_nt_ot_pk[]" typeName="'.$point_type_one['nt_name'].'" value="'.$point_type_one['Tb_index'].'"> '.$point_type_one['nt_name'].'</label>
                        	</div>';
                        }
				  	  ?>
				  	</div>
				  </div>

				<?php } ?>
                

                <?php 
				   //-------------------------------------- 優集點 -----------------------------------------------
				   if($_GET['area_id']!='at2019011117461656'){
                  ?>

				  <div  class="type_div">
				  	<label><input type="checkbox" class="show_check" value="優旅行"> 優旅行</label>
				  	<div class="type">
				  		<?php 
				  		//-- 單元名稱 --
				  		$unit_arr=[];
				  		$unit_name=$NewPdo->select("SELECT * FROM appUnit", 'no');
                        foreach ($unit_name as $unit_name_one) {
                        	$unit_arr[$unit_name_one['Tb_index']]=$unit_name_one['un_name'];
                        }

                        $travel_unit=$NewPdo->select("SELECT * FROM appArea WHERE Tb_index='at2019011117461656' AND OnLineOrNot=1", 'no', 'one');
                        $travel_unit=explode(',', $travel_unit['at_unit']);

                        foreach ($travel_unit as $travel_unit_one) {
                        	echo '<label><input type="checkbox" class="show_type" typeName="'.$unit_arr[$travel_unit_one].'" value="'.$travel_unit_one.'"> '.$unit_arr[$travel_unit_one].'</label><br>';
                          
                          $tr_share_type_txt='';
                          $tr_share_type=$NewPdo->select("SELECT * FROM news_type WHERE unit_id=:unit_id AND OnLineOrNot=1 ORDER BY OrderBy ASC", ['unit_id'=>$travel_unit_one]);
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

				 <?php } ?>

				   
				   
				   
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
          <button type="button" id="submit_btn" class="btn btn-info btn-raised">確定</button>
          <button type="button" id="close_btn" class="btn btn-default btn-flat" >重設</button>
          <button type="button" class="btn btn-default btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
				
					
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
              var news_type_txt='';
              $.each($('[name="news_type"]:checked'), function(index, val) {
                 $("#ns_nt_pk",parent.document).append( '<span class="btn btn-success">'+$(this).attr('typeName')+' <input type="hidden" name="ns_nt_pk[]" value="'+$(this).val()+'"></span>' );
                 news_type_txt+=$(this).val()+',';
              });
              
              //-- 記錄暫存 --
              if ($('[name="news_unit"]').length>0) {
                sessionStorage.setItem("news_unit", $('[name="news_unit"]:checked').val());
              }
              sessionStorage.setItem("news_type", news_type_txt.slice(0, -1));


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

          
          //-- 優旅行-選擇主分類 --
          if ($('[name="news_unit"]').length>0) {
            $('[name="news_unit"]').change(function(event) {
              travel_ajax($(this));
            });
          }
      
      });
      //-- document.ready END --
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {

    //-- 優旅行 --
    if (sessionStorage.getItem("news_unit")!=undefined) {
      $('[value="'+sessionStorage.getItem("news_unit")+'"]').prop('checked', true); 
      travel_ajax($('[value="'+sessionStorage.getItem("news_unit")+'"]'));
    } 
    
    //-- 主分類 --  
		if (sessionStorage.getItem("news_type")!=undefined) {
			$('[value="'+sessionStorage.getItem("news_type")+'"]').prop('checked', true); 
		}
    
    //-- 特別議題 -- 
		if (sessionStorage.getItem("news_sp_type")!=undefined) {
			$('[value="'+sessionStorage.getItem("news_sp_type")+'"]').prop('checked', true); 
		}
    
    //-- 上刊到其他單元 --
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



  function travel_ajax(dom) {
   
   $.ajax({
     url: 'newsType_windows_ajax.php',
     type: 'POST',
     dataType: 'json',
     data: {
       unit_id: dom.val()
     },
     success:function (data) {
       //-- 排除 刷卡秘笈、優惠情報 --
       if (dom.val()!='un2019011717570690' && dom.val()!='un2019011717571414') {
         $('#travel_area').css('display', 'block');
         $('#travel_area .panel-body .row').html('');

         $.each(data, function(index, val) {
           var typeName=dom.attr('typeName')+'-'+this['nt_name'];
           var html='<div class="col-xs-3"><label><input type="checkbox" typeName="'+typeName+'" name="news_type" value="'+this['Tb_index']+'"> '+this['nt_name']+'</label></div>';
           $('#travel_area .panel-body .row').append(html);
         });
       }
       else{
          $('#travel_area').css('display', 'none');
          $('#travel_area .panel-body .row').html('');

          $.each(data, function(index, val) {
            var html='<div class="col-xs-3"><label><input type="checkbox" typeName="'+this['nt_name']+'" name="news_type" value="'+this['Tb_index']+'" checked> '+this['nt_name']+'</label></div>';
            $('#travel_area .panel-body .row').append(html);
          });
       }
       
       if (sessionStorage.getItem("news_type")!=undefined) {
         var news_type_arr=sessionStorage.getItem("news_type").split(',');
         for (var i = 0; i < news_type_arr.length; i++) {
           $('[value="'+news_type_arr[i]+'"]').prop('checked', true);
         }
       }
       
     }
   });
  }
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>