<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
	/*.news_old_div{ display: none; }*/
	#search_div{ display: none; }
	body{ width: 1000px; }
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 
  
  //-- 版區分類 --
   $row_area=$NewPdo->select("SELECT Tb_index,at_name FROM appArea WHERE Tb_index!='at2019021114160725' AND Tb_index!='at2019021114161530' ORDER BY OrderBy ASC");
  //-- 新聞次版區 --
   $row_type=$NewPdo->select("SELECT Tb_index,nt_name FROM news_type WHERE area_id='' AND nt_sp=0 ORDER BY OrderBy ASC");

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<!-- 關閉視窗 -->
	<a class="close_fancybox" href="javascript:;">Ｘ</a>
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>輸入標題網址
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form   class="form-horizontal put_form">

						<div class="form-group">
							<label class="control-label col-xs-2">標題</label>
							<div class="col-xs-10">
								<input type="text" id="ne_ns_pk_ext_ftitle" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-2">網址</label>
							<div class="col-xs-10">
								<input type="text" id="ne_ns_pk_ext_url" class="form-control">
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
				<div class="panel-body text-center">
					<button type="button" id="submit_btn" class="btn btn-info btn-raised">確定</button>
					<button type="button" class="btn btn-default btn-flat" onclick="javascript:parent.jQuery.fancybox.close();" >放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
        
     $('#submit_btn').click(function(event) {
     	var err_txt='';
            err_txt = err_txt + check_input( '#ne_ns_pk_ext_ftitle', '標題，' );
            err_txt = err_txt + check_input( '#ne_ns_pk_ext_url', '網址，' );

        if (err_txt!='') {
         alert("請輸入"+err_txt+"!!");
        }
        else{

         $.ajax({
         	url: 'news_windows_ajax.php',
         	type: 'POST',
         	data: {
         		type:'news_extends',
         		ns_pk: $('#ns_pk').val(),
         		ne_ns_pk_ext_ftitle: $('#ne_ns_pk_ext_ftitle').val(),
         		ne_ns_pk_ext_url: $('#ne_ns_pk_ext_url').val()
         	},
         	success:function (data) {
         	  //-- 延伸閱讀 --
              $("#over_ex_news",parent.document).append( '<span class="btn btn-success btn-block">'+$('#ne_ns_pk_ext_ftitle').val()+' <input type="hidden" name="ns_news[]" ns_ftitle="'+$('#ne_ns_pk_ext_ftitle').val()+'" value="'+data+'"><button class="del_ns_news btn btn-danger" type="button">Ｘ</button></span>' ); 

              var ns_news_arr=sessionStorage.getItem("ns_news");
                  ns_news_arr+=','+data;

              var ns_news_name_arr=sessionStorage.getItem("ns_news_name");
                  ns_news_name_arr+=','+$('#ne_ns_pk_ext_ftitle').val();


              //-- 記錄暫存 --
              sessionStorage.setItem("ns_news", ns_news_arr);
              sessionStorage.setItem("ns_news_name", ns_news_name_arr);
              parent.jQuery.fancybox.close();	
         	}
         });
         
        }
     });

    });
      
    
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>