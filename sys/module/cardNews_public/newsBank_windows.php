<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.card_list{ height: 500px; overflow: auto; }
	.sel_bank_card ul{ padding-left: 15px; }
	.card_level li{ display: inline-block; }
	.card_group{ margin-bottom:15px; }
	.card_group .card_group_name{ font-weight: 600; font-size: 15px; margin:0;}
	.card_group label{ margin:0; font-weight: 400; }
</style>
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
					<header>
						選擇發卡銀行：
						<select class="card_type">
							<option value="">-- 選擇卡片 --</option>
							<option value="credit_card">信用卡</option>
							<option value="debit_card">金融卡</option>
						</select>
						<select class="sel_bank">
							<option value="">-- 選擇銀行 --</option>
						</select>
					</header>
				</div><!-- /.panel-heading -->
				<div class="load_bank panel-body">
					
				</div>
				<div class="card_list panel-body">
					





				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>


		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
					<button type="button" class="btn btn-default  btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
					<button type="button" id="submit_btn" class="btn btn-info  btn-raised">確定</button>

					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">


       //-- 銀行鎮列 --
       var news_bank_arr=sessionStorage.getItem("news_bank")==undefined ? [] : sessionStorage.getItem("news_bank").split('*');
       //-- 卡陣列 --
       var news_card_arr=sessionStorage.getItem("news_card")==undefined ? [] : sessionStorage.getItem("news_card").split('|');
       //-- 卡名稱陣列 --
       var news_card_name_arr=sessionStorage.getItem("news_card_name")==undefined ? [] : sessionStorage.getItem("news_card_name").split(',');



	$(document).ready(function() {

		//-- 選擇卡片 --
		$('.card_type').change(function(event) {
			$.ajax({
				url: 'newsBank_windows_ajax.php',
				type: 'POST',
				dataType: 'json',
				data: {
					type: 'bank',
					card_type: $(this).val()
				},
				success:function (data) {

					$('.sel_bank').html('<option value="">-- 選擇銀行 --</option>');
					$.each(data, function(index, val) {
					  $('.sel_bank').append('<option value="'+this['Tb_index']+'">'+'['+this['bi_code']+']'+this['bi_shortname']+'</option>');
					});
				}
			});
		});



		//-- 選擇銀行 --
		$('.sel_bank').change(function(event) {
		  
		  show_card_list($('.card_type').val(),$(this).val());
		});


		//-- checkbox (子層級同步選取) --
		$('.card_list').on('change', '.sel_bank_card input', function(event) {

			//-- 勾選 --
			if ($(this).prop('checked')==true) {
				$(this).parent().parent().find('input').prop('checked', true);
				$.each($(this).parent().parent().find('input[name="ns_card"]'), function(index, val) {
					if (news_card_arr.indexOf($(this).val())==-1) {
						news_card_arr.push($(this).val());
						news_card_name_arr.push($(this).attr('card_name'));
					}
				});
                
                //-- 判斷有勾選，增加此銀行 --
				if ($('.sel_bank_card input[name="ns_card"]:checked').length>0) {
                   var now_news_bank=$('.card_type').val()+','+$('.sel_bank').val()+'|'+$('.card_type :selected').html()+','+$('.sel_bank :selected').html();
                   if (news_bank_arr.indexOf(now_news_bank)==-1) {
                   	 news_bank_arr.push(now_news_bank);
                   }
				}
			}

			//-- 取消勾選 --
			else{
				$(this).parent().parent().find('input').prop('checked', false);
				$.each($(this).parent().parent().find('input[name="ns_card"]'), function(index, val) {
					 var news_card_arr_index=news_card_arr.indexOf($(this).val());
					 var news_card_name_arr_index=news_card_name_arr.indexOf($(this).attr('card_name'));
					 news_card_arr.splice(news_card_arr_index,1);
					 news_card_name_arr.splice(news_card_name_arr_index,1);
				});
                
                //-- 判斷無勾選，取消此銀行 --
				if ($('.sel_bank_card input[name="ns_card"]:checked').length<1) {
                   var now_news_bank=$('.card_type').val()+','+$('.sel_bank').val()+'|'+$('.card_type :selected').html()+','+$('.sel_bank :selected').html();
                   var now_news_bank_index=news_bank_arr.indexOf(now_news_bank);
                   news_bank_arr.splice(now_news_bank_index,1);
				}
			}
		});




          $("#submit_btn").click(function(event) {
           
              $("#over_bank",parent.document).html('');

              
              //-- 去除無發卡組織/銀行 勾選 --
              if (news_card_arr.length>0) {
              		
              	   if ($('[name="no_BankOrg"]',parent.document).prop('checked')==true) {
              	   	 $('[name="no_BankOrg"]',parent.document).prop('checked', false);
              	   }
              	   $('[name="no_BankOrg"]',parent.document).prop('disabled', true);
              }
              
              //---- 匯出 ----
              for (var i = 0; i < news_card_arr.length; i++) {
              		//-- 卡 --
              	   $("#over_bank",parent.document).append( '<span class="label">'+news_card_name_arr[i]+' <input type="hidden" name="ns_card[]" value="'+news_card_arr[i]+'"></span><br>' );
              }

               //---- 記錄暫存 ----
               //-- 銀行暫存 --
               sessionStorage.setItem("news_bank", news_bank_arr.join('*'));

               //-- 卡片暫存 --
               sessionStorage.setItem("news_card", news_card_arr.join('|'));
               sessionStorage.setItem("news_card_name", news_card_name_arr);
               //---- 記錄暫存 END ----


              parent.jQuery.fancybox.close();	
          });

      });
     //------------------- ready END ---------------------
    
    //-- 讀取記錄 --
	$(window).on('load',  function(event) {
		
        
		if (sessionStorage.getItem("news_bank")!=undefined && sessionStorage.getItem("news_bank")!='') {

			for (var i = 0; i < news_bank_arr.length; i++) {
				var bank_arr=news_bank_arr[i].split('|');
				var bank_id_arr=bank_arr[0].split(',');
				var bank_name_arr=bank_arr[1].split(',');
				$('.load_bank').append(bank_name_arr[0]+'-'+bank_name_arr[1]+'<a href="javascript:check_bank(\''+bank_id_arr[0]+'\',\''+bank_id_arr[1]+'\');">查看</a><br>');
			}
		}

	});



    //-- 撈信用卡資料 --
	function show_card_list(card_type,bank_id) {
	   $.ajax({
				url: 'newsBank_windows_ajax.php',
				type: 'POST',
				dataType: 'json',
				data: {
					type: 'card',
					card_type: card_type,
					bank_id: bank_id
				},
				success:function (data) {
                 var card_type_name=$('.card_type :selected').html();
				 var card_type=card_type_name=='信用卡' ? '1':'2';	

			     var txt='<ul class="sel_bank_card">'+
                   	         '<li>'+
                   		       '<label><input type="checkbox" >所有信用卡</label>';
                 

					//-- 第一層卡群組 --
					for(var key in data){

                      txt+='<ul class="card_group">'+
                   			     '<li>'+
                   				  '<label class="card_group_name"><input type="checkbox" >'+key+'</label>'+
                   				    '<ul>';

                        //-- 卡群組 --
						var data_card=data[key];

                        //-- 第二層卡組織 --
					    for(var key2 in data_card){

					     txt+='<li>'+
                   				 '<label><input type="checkbox" >'+key2+'</label>'+
                                    '<ul class="card_level">';
                           	//-- 卡組織 --
                           	var data_org=data_card[key2];

                            //-- 第三層卡等 --
                            for (var i = 0; i < data_org.length; i++) {
                            	var data_level=data_org[i];
                            	var card_name=$('.sel_bank :selected').html()+' '+key+' '+key2+' '+data_level['attr_name'];
                            	var card_id=card_type+','+data_level['bank_id']+','+data_level['group_id']+','+data_level['org_id']+','+data_level['level_id'];
                            	if (news_card_arr[0]!='' && news_card_arr.indexOf(card_id)!=-1) {
                                  txt+='<li><label><input type="checkbox" checked name="ns_card" card_name="'+card_name+'" value="'+card_id+'">'+data_level['attr_name']+'</label>｜</li>';
                            	}
                            	else{
                            	  txt+='<li><label><input type="checkbox" name="ns_card" card_name="'+card_name+'" value="'+card_id+'">'+data_level['attr_name']+'</label>｜</li>';
                            	}
                            }

                          txt+=     '</ul>'+
                   			   '</li>';
					    }

                        txt+=    '</ul>'+
                   			  '</li>'+
                   		    '</ul>';
					}

					txt+='</li>'+
					   '</ul>';

                   $('.card_list').html(txt);
				}
			});
	}

    //-- 查看以勾選銀行 --
	function check_bank(card_type,bank_id){

	 $.ajax({
				url: 'newsBank_windows_ajax.php',
				type: 'POST',
				dataType: 'json',
				data: {
					type: 'bank',
					card_type: card_type
				},
				success:function (data) {

					$('.sel_bank').html('<option value="">-- 選擇銀行 --</option>');
					$.each(data, function(index, val) {
					  $('.sel_bank').append('<option value="'+this['Tb_index']+'">'+'['+this['bi_code']+']'+this['bi_shortname']+'</option>');
					});

				    $('.card_type').find('[value="'+card_type+'"]').prop('selected', true);
				    $('.sel_bank').find('[value="'+bank_id+'"]').prop('selected', true);
					 show_card_list(card_type,bank_id);
				}
			});
	}
	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>