<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('news_type', $data, $where);
  }
}

if ($_GET) {

   
   //-- 新聞分類 --
   $row_type=$NewPdo->select("SELECT * FROM news_type WHERE mt_id='site2018111910445721' AND nt_sp=0 ORDER BY OrderBy ASC");

   //-- 特別議題分類 --
   $row_sp_type=$NewPdo->select("SELECT * FROM news_type WHERE mt_id='site2018111910445721' AND nt_sp=1 AND nt_sp_begin_date<=:today AND nt_sp_end_date>=:today ORDER BY OrderBy ASC", ['today'=>date('Y-m-d')]);

   //-- 銀行 --
   $row_bank=$NewPdo->select("SELECT * FROM bank_info ORDER BY OrderBy ASC");

}

?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-success">
                 <div class="panel-heading">
                     新聞查詢
                 </div>
                 <div class="panel-body">
                     <form id="search_ns_form" class="form-horizontal" method="POST" action="admin_list.php?MT_id=<?php echo$_GET['MT_id']; ?>">
                     	<div class="form-group">
                     		<label class="col-md-2 control-label" >新聞分類</label>
                     		<div class="col-md-10">
                     		  <select class="form-control"  name="ns_nt_pk">
                            <option value="">-- 全部 --</option>
                     		  	<?php
                                 foreach ($row_type as $row_type_one) {
                                 	echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['nt_name'].'</option>';
                                 }
                     		  	?>
                     		  </select>
                     		</div>
                     	</div>

                      <div class="form-group">
                        <label class="col-md-2 control-label" for="nt_define">特別議題分類</label>
                        <div class="col-md-10">
                          <select class="form-control" name="ns_nt_sp_pk">
                            <option value="">-- 全部 --</option>
                            <?php
                                 foreach ($row_sp_type as $row_type_one) {
                                  echo '<option value="'.$row_type_one['Tb_index'].'">'.$row_type_one['nt_name'].'</option>';

                                 }
                            ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                            <label class="col-md-2 control-label" >新聞上架時間</label>
                            <div class="col-md-10 form-inline">
                              <input type="date" name="StartDate" class="form-control" value="<?php echo date('Y-m-d', strtotime('-3 month'));?>"> ~ <input type="date" name="EndDate" class="form-control" value="<?php echo date('Y-m-d');?>">
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label" >審核期間</label>
                            <div class="col-md-10 form-inline">
                              <input type="date" name="ns_st_vfdate" class="form-control"> ~ <input type="date" name="ns_en_vfdate" class="form-control">
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label" >新聞狀態</label>
                        <div class="col-md-10">
                          <select class="form-control"  name="ns_verify">
                            <option value="3">上架中</option>
                            <option value="">全部</option>
                            <option value="0">草稿</option>
                            <option value="2">審核中</option>
                            <option value="5">退稿</option>
                            <option value="7">下架</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label" >銀行別</label>
                        <div class="col-md-10">
                          <select class="form-control" name="ns_bank">
                            <option value="">全部</option>
                            <?php
                                 foreach ($row_bank as $row_bank_one) {
                                  echo '<option value="'.$row_bank_one['Tb_index'].'">['.$row_bank_one['bi_code'].'] '.$row_bank_one['bi_shortname'].'</option>';
                                 }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label" >作者</label>
                            <div class="col-md-10">
                              <input type="text" name="ns_reporter" class="form-control">
                            </div>
                      </div>

                      <div class="form-group">
                            <label class="col-md-2 control-label">關鍵字</label>
                            <div class="col-md-10">
                              <input type="text"  name="ns_keyWord" class="form-control" placeholder="可輸入二個以上字詞，以「,」或「空白」區隔均可">
                            </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="button" id="search_btn" class="btn btn-success btn-raised">確定</button>
                        </div>
                      </div>
                     </form>
                 </div>
             </div>
	</div>


   
	
</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {
		
     $('#search_btn').click(function(event) {
      $('#search_ns_form').submit();
     });

  });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
