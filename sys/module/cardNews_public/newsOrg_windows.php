<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	.org_level_list{ height: 500px; overflow: auto; }
</style>
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
					<header>
                      選擇發卡組資：
						<select class="card_type">
							<option value="">-- 選擇卡片 --</option>
							<option value="site2018110611172385">信用卡</option>
							<option value="site2018120315164066">金融卡</option>
						</select>
					</header>
				</div><!-- /.panel-heading -->
				<div class="org_level_list panel-body">
					

				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>


		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
          <button type="button" id="submit_btn" class="btn btn-info  btn-raised">確定</button>
          <button type="button" class="btn btn-default  btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
        </div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>


</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">


 //-- 卡組織卡等陣列 --
 var news_card_orglevel_arr=sessionStorage.getItem("news_card_orglevel")==undefined ? [] : sessionStorage.getItem("news_card_orglevel").split('|');
 //-- 卡組織卡等名稱陣列 --
 var news_card_orglevel_name_arr=sessionStorage.getItem("news_card_orglevel_name")==undefined ? [] : sessionStorage.getItem("news_card_orglevel_name").split(',');

	$(document).ready(function() {


    //-- 選擇卡片 --
    $('.card_type').change(function(event) {
    	
    	$.ajax({
    		url: 'newsOrg_windows_ajax.php',
    		type: 'POST',
    		dataType: 'json',
    		data: {
    			type:'org_level',
    			card_type: $(this).val()
    		},
    		success:function (data) {
    		  
    		  var card_type_name=$('.card_type :selected').html();
    		  var card_type=card_type_name=='信用卡' ? '1':'2';
    		  var txt='';
                 
                        //-- 第一層卡組織 --
					    for(var key in data){

					     txt+='<li>'+
                   				 '<label><input type="checkbox" >全選(所有銀行'+key+card_type_name+')</label>'+
                                    '<ul class="card_level">';
                           	//-- 卡組織 --
                           	var data_org=data[key];

                            //-- 第二層卡等 --
                            for (var i = 0; i < data_org.length; i++) {
                            	var data_level=data_org[i];
                            	var orglevel_name=card_type_name=='信用卡' ? '所有銀行'+key+data_level['attr_name'] : '所有銀行'+key+data_level['attr_name']+'金融卡';
                            	if (news_card_orglevel_arr[0]!='' && news_card_orglevel_arr.indexOf(card_type+','+data_level['org_id']+','+data_level['level_id'])!=-1){
                                   txt+='<li><label><input type="checkbox" checked name="ns_card_level" orglevel_name="'+orglevel_name+'" value="'+card_type+','+data_level['org_id']+','+data_level['level_id']+'">所有銀行'+key+data_level['attr_name']+'</label>｜</li>';
                            	}
                            	else{
                            		txt+='<li><label><input type="checkbox" name="ns_card_level" orglevel_name="'+orglevel_name+'" value="'+card_type+','+data_level['org_id']+','+data_level['level_id']+'">所有銀行'+key+data_level['attr_name']+'</label>｜</li>';
                            	}
                            }

                          txt+=     '</ul>'+
                   			   '</li>';
					    }

                   $('.org_level_list').html(txt);

    		}
    	});
    	
    });



    //-- checkbox (子層級同步選取) --
		$('.org_level_list').on('change', 'input', function(event) {

			//-- 勾選 --
			if ($(this).prop('checked')==true) {
				$(this).parent().parent().find('input').prop('checked', true);
				$.each($(this).parent().parent().find('input[name="ns_card_level"]'), function(index, val) {
					if (news_card_orglevel_arr.indexOf($(this).val())==-1) {
						news_card_orglevel_arr.push($(this).val());
						news_card_orglevel_name_arr.push($(this).attr('orglevel_name'));
					}
				});
			}

			//-- 取消勾選 --
			else{
				$(this).parent().parent().find('input').prop('checked', false);
				$.each($(this).parent().parent().find('input[name="ns_card_level"]'), function(index, val) {
					 var news_card_orglevel_arr_index=news_card_orglevel_arr.indexOf($(this).val());
					 var news_card_orglevel_name_arr_index=news_card_orglevel_name_arr.indexOf($(this).attr('orglevel_name'));
					 news_card_orglevel_arr.splice(news_card_orglevel_arr_index,1);
					 news_card_orglevel_name_arr.splice(news_card_orglevel_name_arr_index,1);
				});
			}
		});



          $("#submit_btn").click(function(event) {
           
              $("#over_org",parent.document).html('');
              
              //-- 去除無發卡組織/銀行 勾選 --
              if (news_card_orglevel_arr.length>0) {

                 if ($('[name="no_BankOrg"]',parent.document).prop('checked')==true) {
                 	 $('[name="no_BankOrg"]',parent.document).prop('checked', false);
                 }
                 $('[name="no_BankOrg"]',parent.document).prop('disabled', true);
              }


              //-- 匯出 --
              for (var i = 0; i < news_card_orglevel_arr.length; i++) {
              	//-- 組織 --
                $("#over_org",parent.document).append( '<span class="label">'+news_card_orglevel_name_arr[i]+' <input type="hidden" name="ns_org[]" value="'+news_card_orglevel_arr[i]+'"></span><br>' );
              }

               //-- 記錄暫存 --
               sessionStorage.setItem("news_card_orglevel", news_card_orglevel_arr.join('|'));
               sessionStorage.setItem("news_card_orglevel_name", news_card_orglevel_name_arr);
              parent.jQuery.fancybox.close();	
            
          });
         
         //-- 重設 --
         $('#close_btn').click(function(event) {
         	$('.put_form').trigger('reset');
         });

      
      });
    

	
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>