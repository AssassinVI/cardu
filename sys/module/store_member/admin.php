<?php include("../../core/page/header01.php");//載入頁面heaer01?>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
	.fancybox-slide--iframe .fancybox-content {width  : 900px;max-width  : 80%;max-height : 80%;margin: 0;}
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 

if ($_GET) {

   
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	

			<div style="width: 600px;" class="panel panel-success">
                 <div class="panel-heading">
                     商店會員資料查詢
                 </div>
                 <div class="panel-body">
                     <div class="form-horizontal">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label" for="nt_define">註冊日期</label>
                     		<div class="col-md-10">
                     		  <input type="text" name="ud_regtime_s" class="datepicker">~<input type="text" name="ud_regtime_e" class="datepicker">
                     		</div>
                     	</div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="nt_define">會員狀態</label>
                            <div class="col-md-10">
                               <select name="sm_status" class="form-control">
                                               <option value="">不限</option>
                                               <option value="0">未確認</option>
                                               <option value="3">未審核</option>
                                               <option value="1">審核成功</option>
                                               <option value="2">審核未通過</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="nt_define">關鍵字</label>
                            <div class="col-md-10">
                              <input type="text" name="keywords" class="form-control">
                              <span>關鍵字搜尋範圍：會員帳號/暱稱/email等欄位</span><br>
                              <span class="text-danger">(請用半形逗號隔開)</span>
                            </div>
                        </div>
                     	<div class="form-group">
                     		<div class="col-md-12 text-right">
                     		    <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                     		</div>
                     	</div>
                     </div>
                 </div>
             </div>



</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {

        //-- 日期 --
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: "-50:+0",
            changeMonth: true,
            changeYear: true,
            dayNamesMin :["日","一","二","三","四","五","六"],
            dayNames :["日","一","二","三","四","五","六"],
            monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
        });

        $('#search_btn').click(function(event) {
        	sessionStorage.setItem("sm_creattime_s", $('[name="sm_creattime_s"]').val());
            sessionStorage.setItem("sm_creattime_e", $('[name="sm_creattime_e"]').val());
            sessionStorage.setItem("sm_status", $('[name="sm_status"]').val());
            sessionStorage.setItem("keywords", $('[name="keywords"]').val());
        	location.href='admin_list.php?MT_id=<?php echo $_GET['MT_id'];?>';
        });
	});

</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
