<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">

</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {


	if (empty($_POST['Tb_index'])) {//新增
		$Tb_index='crank'.date('YmdHis').rand(0,99);
  
  //-- 判斷項目2、3是否排序 --
  $check_order=pdo_select("SELECT cc_so_type_02_order, cc_so_type_03_order FROM credit_cardrank_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['rank_type_id']]);

  $ccs_order=pdo_select("SELECT ccs_order FROM credit_cardrank WHERE ccs_cc_so_pk=:ccs_cc_so_pk ORDER BY ccs_order DESC LIMIT 0,1", ['ccs_cc_so_pk'=>$_POST['rank_type_id']]);
  $ccs_order=(int)$ccs_order['ccs_order']+1;
  $ccs_order2=$check_order['cc_so_type_02_order']==0 ? 0:$ccs_order;
  $ccs_order3=$check_order['cc_so_type_03_order']==0 ? 0:$ccs_order;


	$param=  ['Tb_index'=>$Tb_index,
			     'ccs_cc_so_pk'=>$_POST['rank_type_id'],
			     'ccs_cc_bi_pk'=>$_POST['ccs_cc_bi_pk'],
           'ccs_cc_pk'=>$_POST['ccs_cc_pk'],
           'ccs_cc_group_id'=>$_POST['ccs_cc_group_id'],
           'ccs_cc_cardlevel'=>$_POST['ccs_cc_cardlevel'],
           'ccs_cc_cardlvname'=>$_POST['ccs_cc_cardlvname'],
           'ccs_cc_pk2'=>$_POST['ccs_cc_pk2'],
           'ccs_cc_cardname'=>$_POST['ccs_cc_cardname'],
           'ccs_cc_cardname2'=>$_POST['ccs_cc_cardname2'],
           'ccs_cc_cardshrname'=>$_POST['ccs_cc_cardshrname'],
           'ccs_typename_01'=>$_POST['ccs_typename_01'],
           'ccs_typename_01_memo'=>$_POST['ccs_typename_01_memo'],
           'ccs_typename_02'=>$_POST['ccs_typename_02'],
           'ccs_typename_02_memo'=>$_POST['ccs_typename_02_memo'],
           'ccs_typename_03'=>$_POST['ccs_typename_03'],
           'ccs_typename_03_memo'=>$_POST['ccs_typename_03_memo'],
           'ccs_cc_cardurl'=>$_POST['ccs_cc_cardurl'],
           'ccs_memo'=>$_POST['ccs_memo'],
           'ccs_order'=>$ccs_order,
           'ccs_order2'=>$ccs_order2,
           'ccs_order3'=>$ccs_order3,
           'ccs_create_time'=>date('Y-m-d H:i:s')
			  ];
	pdo_insert('credit_cardrank', $param);
	location_up('manager.php?MT_id='.$_POST['mt_id'].'&rank_type_id='.$_POST['rank_type_id'],'成功新增');
   }


   else{  //修改
   	$Tb_index =$_POST['Tb_index'];

    
    $param=  [
           'ccs_cc_bi_pk'=>$_POST['ccs_cc_bi_pk'],
           'ccs_cc_pk'=>$_POST['ccs_cc_pk'],
           'ccs_cc_group_id'=>$_POST['ccs_cc_group_id'],
           'ccs_cc_cardlevel'=>$_POST['ccs_cc_cardlevel'],
           'ccs_cc_cardlvname'=>$_POST['ccs_cc_cardlvname'],
           'ccs_cc_pk2'=>$_POST['ccs_cc_pk2'],
           'ccs_cc_cardname'=>$_POST['ccs_cc_cardname'],
           'ccs_cc_cardname2'=>$_POST['ccs_cc_cardname2'],
           'ccs_cc_cardshrname'=>$_POST['ccs_cc_cardshrname'],
           'ccs_typename_01'=>$_POST['ccs_typename_01'],
           'ccs_typename_01_memo'=>$_POST['ccs_typename_01_memo'],
           'ccs_typename_02'=>$_POST['ccs_typename_02'],
           'ccs_typename_02_memo'=>$_POST['ccs_typename_02_memo'],
           'ccs_typename_03'=>$_POST['ccs_typename_03'],
           'ccs_typename_03_memo'=>$_POST['ccs_typename_03_memo'],
           'ccs_cc_cardurl'=>$_POST['ccs_cc_cardurl'],
           'ccs_memo'=>$_POST['ccs_memo']
        ];
    $where= ['Tb_index'=>$Tb_index] ;
	pdo_update('credit_cardrank', $param, $where);
	
	location_up('admin.php?MT_id='.$_POST['mt_id'].'&rank_type_id='.$_POST['rank_type_id'],'成功更新');
  }
}


if ($_GET) {

  //-- 撈卡排行分類資訊 --
  $row_type=$NewPdo->select("SELECT cc_so_cname, cc_so_type_01_cname, cc_so_type_02_cname, cc_so_type_03_cname FROM credit_cardrank_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['rank_type_id']], 'one');
  
  //-- 撈卡排行資料 --
 	$where=['Tb_index'=>$_GET['Tb_index']];
 	$row=pdo_select('SELECT * FROM credit_cardrank WHERE Tb_index=:Tb_index', $where);
  
  $ccs_typename_03_readonly=empty($row['ccs_cc_pk2']) ? '':'readonly';

}
?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
          <?php 
           if (empty($_GET['Tb_index'])) {
             echo '<header>新增 [ '.$row_type['cc_so_cname'].' ] 卡排行資料</header>';
           }
           else{
             echo '<header>修改 [ '.$row_type['cc_so_cname'].' ] 卡排行資料</header>';
           }
          ?>
					
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<form id="put_form" action="manager.php" method="POST" enctype='multipart/form-data' class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label" for="ccs_cc_cardname"><span class="text-danger">*</span> 信用卡名稱</label>
							<div class="col-md-4">
								<input type="text" class="form-control" readonly id="ccs_cc_cardname" name="ccs_cc_cardname" value="<?php echo $row['ccs_cc_cardname'];?>">
							</div>
              <div class="col-md-6">
                <a id="ccard_name_btn" href="../credit_cardrank_public/card_one_windows.php" class="btn btn-default" data-fancybox data-type="iframe" >選擇卡片</a>
                <label><input type="radio" checked name="card_OneOrGroup" value="one">單卡</label>｜<label><input type="radio" name="card_OneOrGroup" value="group">卡組</label>
                <span class="text-danger">註：先勾選信用卡為單卡或卡組</span>
              </div>

              <input type="hidden" name="ccs_cc_bi_pk" value="<?php echo $row['ccs_cc_bi_pk'];?>">
              <input type="hidden" name="ccs_cc_pk" value="<?php echo $row['ccs_cc_pk'];?>">
              <input type="hidden" name="ccs_cc_group_id" value="<?php echo $row['ccs_cc_group_id'];?>">
              <input type="hidden" name="ccs_cc_cardlevel" value="<?php echo $row['ccs_cc_cardlevel'];?>">
              <input type="hidden" name="ccs_cc_cardlvname" value="<?php echo $row['ccs_cc_cardlvname'];?>">
						</div>
            <div class="form-group">
              <label class="col-md-2 control-label" ><span class="text-danger">*</span> <span class="label_name"><?php echo $row_type['cc_so_type_01_cname']; ?></span></label>
              <div class="col-md-2">
                <textarea style="height: 100px;" class="form-control" name="ccs_typename_01"><?php echo $row['ccs_typename_01'];?></textarea>
              </div>
              <div class="col-md-2">
                <textarea style="height: 100px;" class="form-control" name="ccs_typename_01_memo"><?php echo $row['ccs_typename_01_memo'];?></textarea>
              </div>
              <div class="col-md-6">
                <span class="text-danger" >備註：<br>1.左欄位前台5行約40字，此欄若超過長度時，則以對話框形是顯示出全部文字出來 <br> 2.右欄位(即條件欄)前台3行約39字，此欄若有資料即優先於前台對話框顯示</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label"><span class="text-danger">*</span> <span class="label_name"><?php echo $row_type['cc_so_type_02_cname']; ?></span></label>
              <div class="col-md-2">
                <textarea style="height: 100px;" class="form-control" name="ccs_typename_02"><?php echo $row['ccs_typename_02'];?></textarea>
              </div>
              <div class="col-md-2">
                <textarea style="height: 100px;" class="form-control" name="ccs_typename_02_memo"><?php echo $row['ccs_typename_02_memo'];?></textarea>
              </div>
              <div class="col-md-6">
                <span class="text-danger" >備註：<br>1.左欄位前台5行約40字，此欄若超過長度時，則以對話框形是顯示出全部文字出來 <br> 2.右欄位(即條件欄)前台3行約39字，此欄若有資料即優先於前台對話框顯示</span>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label"><span class="text-danger">*</span> <span class="label_name"><?php echo $row_type['cc_so_type_03_cname']; ?></span></label>
              <div class="col-md-4">
                <textarea style="height: 100px;" class="form-control" <?php echo $ccs_typename_03_readonly;?> name="ccs_typename_03"><?php echo $row['ccs_typename_03'];?></textarea>
              </div>
              <div class="col-md-2">
                <textarea  style="height: 100px;" class="form-control" name="ccs_typename_03_memo"><?php echo $row['ccs_typename_03_memo'];?></textarea>
              </div>
       

              <?php 
               //-- 現金回饋 --
               if ($_GET['rank_type_id']=='r_type201904010959361' || $_GET['rank_type_id']=='r_type201904010959362') {
               	 echo '<input type="hidden" name="ccs_cc_pk2">';
                 echo '
                <div class="col-md-4 form-inline">
                <div style="margin-bottom: 5px;">
                   <a id="ccard_name_more_btn" href="../credit_cardrank_public/card_one_more_windows.php" data-fancybox data-type="iframe" class="btn btn-default">選擇卡片</a>
                   <label><input type="radio" checked name="card_OneOrGroup_03" value="one">單卡</label>｜<label><input type="radio" name="card_OneOrGroup_03" value="group">卡組</label> 
                  </div>
                  <div>
                    <a id="sortAnddel" href="../credit_cardrank_public/card_SortAndDel_windows.php" data-fancybox data-type="iframe" class="btn btn-default">排序/取消</a>
                  </div>
                 </div>
                 
                 <div class="col-md-12 row">
                  <label class="col-md-2 control-label" ></label>
                  <div class="col-md-6">
                    <span class="text-danger" >備註：<br>1.左欄位前台5行約40字，此欄若超過長度時，則以對話框形是顯示出全部文字出來 <br> 2.右欄位(即條件欄)前台3行約39字，此欄若有資料即優先於前台對話框顯示</span>
                  </div>
                 </div>';
               }
               else{
                echo '
                 <div class="col-md-12 row">
                  <label class="col-md-2 control-label" ></label>
                  <div class="col-md-6">
                   <span class="text-danger" >備註：<br>1.左欄位前台5行約40字，此欄若超過長度時，則以對話框形是顯示出全部文字出來 <br> 2.右欄位(即條件欄)前台3行約39字，此欄若有資料即優先於前台對話框顯示</span>
                  </div>
                 </div>';
               }
              ?>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ccs_memo">備忘說明</label>
              <div class="col-md-4">
                <textarea class="form-control" name="ccs_memo"><?php echo $row['ccs_memo'];?></textarea>
              </div>
              <div class="col-md-6">
                <span class="text-danger">(輸入備忘提醒說明用)</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ccs_cc_cardname2">自訂信用卡名稱</label>
              <div class="col-md-4">
                <input type="text" class="form-control" name="ccs_cc_cardname2" value="<?php echo $row['ccs_cc_cardname2'];?>">
              </div>
              <div class="col-md-6">
                <span class="text-danger">(顯示在卡排行列表)</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ccs_cc_cardshrname">自訂信用卡名稱</label>
              <div class="col-md-4">
                <input type="text" class="form-control" name="ccs_cc_cardshrname" value="<?php echo $row['ccs_cc_cardshrname'];?>">
              </div>
              <div class="col-md-6">
                <span class="text-danger">(顯示在卡優比較列表)</span>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label" for="ccs_cc_cardurl">自訂信用卡網址</label>
              <div class="col-md-4">
                <input type="text" class="form-control" name="ccs_cc_cardurl" value="<?php echo $row['ccs_cc_cardurl'];?>">
              </div>
              <div class="col-md-6">
                <span class="text-danger">(卡排行的卡片名稱連結)</span>
              </div>
            </div>


						<input type="hidden" id="Tb_index" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
						<input type="hidden" id="mt_id" name="mt_id" value="<?php echo $_GET['MT_id'];?>">
            <input type="hidden" id="rank_type_id" name="rank_type_id" value="<?php echo $_GET['rank_type_id'];?>">
					</form>

          <div class="text-center">
            
            
            <?php if(empty($_GET['Tb_index'])){?>
              <button type="button" id="submit_btn" class="btn btn-success btn-raised px-2">儲存</button>
            <?php }else{?>
                <button type="button" id="submit_btn" class="btn btn-success btn-raised px-2">更新</button>
            <?php }?>

              <button type="button" class="btn btn-danger btn-flat px-2" data-toggle="modal" data-target="#settingsModal1" onclick="clean_all()">放棄</button>
          </div>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->




		</div>

	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

        sessionStorage.removeItem('other_ccard_name');
        sessionStorage.removeItem('other_ccard_id');

        //-- (現金回饋) 其他卡片 --
        if ($('#Tb_index').val()!='') {
          $.ajax({
            url: 'manager_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
              type: 'show_one_rank',
              Tb_index: $('#Tb_index').val()
            },
            success:function (data) {
              
              sessionStorage.setItem('other_ccard_name', data['ccs_typename_03']);
              sessionStorage.setItem('other_ccard_id', data['ccs_cc_pk2']);
            }
          });
        }
        
        
        


          $("#submit_btn").click(function(event) {

              var err_txt='';
              err_txt = err_txt + check_input( '[name="ccs_cc_cardname"]', '信用卡名稱，' );
              err_txt = err_txt + check_input( '[name="ccs_typename_01"]', $('[name="ccs_typename_01"]').parent().prev().find('.label_name').html()+'，' );
              err_txt = err_txt + check_input( '[name="ccs_typename_02"]', $('[name="ccs_typename_02"]').parent().prev().find('.label_name').html()+'，' );
              err_txt = err_txt + check_input( '[name="ccs_typename_03"]', $('[name="ccs_typename_03"]').parent().prev().find('.label_name').html() );
              

              if (err_txt!='') {
               alert("請輸入"+err_txt+"!!");

              }
              else{

                 $('#put_form').submit();
              }
          });





    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            aPic: '<?php echo $row["aPic"]?>',
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});
      //------------------------------ 刪檔 ---------------------------------
          $(".one_del_file").click(function(event) { 
			if (confirm('是否要刪除檔案?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                       OtherFile: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});



  //----------------------------------- 更改選擇卡片(單卡、卡組) ------------------------------------
  $('[name="card_OneOrGroup"]').change(function(event) {
  	$('#ccs_cc_cardname').val('');
    if ($(this).val()=='one') {
      $('#ccard_name_btn').attr('href', '../credit_cardrank_public/card_one_windows.php');
    }
    else{
      $('#ccard_name_btn').attr('href', '../credit_cardrank_public/card_group_windows.php');
    }
    
  });

  //----------------------------------- 更改選擇卡片 多張 (單卡、卡組) ------------------------------------
  $('[name="card_OneOrGroup_03"]').change(function(event) {
    if ($(this).val()=='one') {
      $('#ccard_name_more_btn').attr('href', '../credit_cardrank_public/card_one_more_windows.php');
    }
    else{
      $('#ccard_name_more_btn').attr('href', '../credit_cardrank_public/card_group_more_windows.php');
    }
    
  });


    //-- 排序/取消 --
  $('#sortAnddel').click(function(event) {
  	// console.log(sessionStorage.getItem("other_ccard_name"));
  	// console.log(sessionStorage.getItem("other_ccard_id"));
  });

});
</script>

<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

