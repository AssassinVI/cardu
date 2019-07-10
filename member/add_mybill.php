<?php 

require '../share_area/conn.php';
?>

<!DOCTYPE html>
<html lang="zh-tw">
<head >
	<meta charset="UTF-8">
	<title></title>

	<?php 
	 //-- 共用CSS --
	 require '../share_area/share_css.php';
	?>

	<style type="text/css">
		@media (min-width: 1024px){
          body{ width: 800px;}
		}
	</style>
</head>
<body style="background-color: #fff;">
          <!-- 帳單設定(信用卡) -->
          <div id="add_bill">
          	<!-- 關閉按鈕 -->
          	<button class="btn btn-danger btn-sm close_fancybox">Ｘ</button>
           
           <div class="mem_logo pt-3">
             <img src="../img/component/logo_ph.png" alt="">
            </div>
            <h1>我的帳單登入</h1>
            <form id="my_billing_detail_form" class="px-md-2 check_in">
             <div class="login_line">
            <div class="row">
              <label class="col-sm-3 col-form-label">信用卡</label>
              <div class="col-sm-9 form-inline">
                <select class="form-control w-100" name="mbd_mb_pk">
                 <option value="">請選擇信用卡</option>
                 <?php 
                  $row_mycard=$pdo->select("SELECT mb.mb_bill_cc_pk, mb.mb_pk, mb.mb_stop_card, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, mb.mb_pay_day
                  	                        FROM my_billing as mb 
                  	                        INNER JOIN cc_detail as cc ON cc.Tb_index=mb.mb_bill_cc_pk
                  	                        WHERE mb.mb_ud_pk=:mb_ud_pk AND mb.mb_disable=0 AND mb.mb_del_flag='N' 
                  	                        ORDER BY mb.mb_crtime DESC", ['mb_ud_pk'=>$_SESSION['ud_pk']]);
                  foreach ($row_mycard as $mycard_one) {
                  	$cc_name=$mycard_one['bi_shortname'].$mycard_one['cc_cardname'].'_'.$mycard_one['org_nickname'].$mycard_one['attr_name'];
                    $mb_stop_card=$mycard_one['mb_stop_card']==0 ? '':'(已剪卡)';
                  	if ($_GET['mb_pk']==$mycard_one['mb_pk']) {
                      //-- 每月繳款截止日 --
                  	  $mb_pay_day=$mycard_one['mb_pay_day'];
                  	  echo '<option selected value="'.$mycard_one['mb_pk'].'">'.$cc_name.$mb_stop_card.'</option>';
                  	}else{
                  	  echo '<option  value="'.$mycard_one['mb_pk'].'">'.$cc_name.$mb_stop_card.'</option>';
                  	}
                  	
                  }


                 ?>                 
              </select>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-3 col-form-label">帳單月份</label>
              <div class="col-sm-9 date_w form-inline">
                <select class="form-control w-30" name="mbd_bill_yy">
                  <?php 
                   for ($i=9; $i >=-1 ; $i--) { 
                   	$year=date('Y', strtotime('-'.$i.' year'));

                   	if (date('m')=='12' && $mb_pay_day<date('d')) {
                   	  $ch_year=(int)date('Y')+1==$year ? 'selected':'';
                   	}
                   	else{
                   	  $ch_year=date('Y')==$year ? 'selected':'';
                   	}
                    
                    //-- 有帶入GET 優先 --
                    if (isset($_GET['yy'])) {
                      $ch_year=$_GET['yy']==$year ? 'selected':'';
                    }
                   	
                   	echo '<option '.$ch_year.' value="'.$year.'">'.$year.'</option>';
                   }
                  ?>
                </select>
                年
                <select class="form-control w-30" name="mbd_bill_mm">
                  <?php 
                   for ($i=1; $i <=12 ; $i++) { 

                   	if ($mb_pay_day<date('d')) {
                   	  $ch_month=(int)date('m')+1==$i ? 'selected':'';
                   	}
                   	else{
                   	  $ch_month=date('m')==$i ? 'selected':'';
                   	}

                    //-- 有帶入GET 優先 --
                    if (isset($_GET['mm'])) {
                      $ch_month=$_GET['mm']==$i ? 'selected':'';
                    }
                   	
                   	echo '<option '.$ch_month.' value="'.$i.'">'.$i.'</option>';
                   }
                  ?>
                </select>
                月
              </div>
            </div>
       
       

       <?php 
         //---------------------- 我的帳單資料 -------------------------
         $mbd_bill_yy= date('m')=='12' && $mb_pay_day<date('d') ? (int)date('Y')+1 : date('Y');
         $mbd_bill_mm= $mb_pay_day<date('d') ? (int)date('m')+1 : date('m');

         //-- 有帶入GET 優先 --
         if (isset($_GET['yy']) && isset($_GET['mm'])) {
           $mbd_bill_yy= $_GET['yy'];
           $mbd_bill_mm= $_GET['mm'];
         }

         $row_mbd = $pdo->select("SELECT mbd_pk, mbd_amount, mbd_amount_paid, mbd_pay_tag, mbd_pay_date, mbd_pay_type
         	           FROM my_billing_detail 
         	           WHERE mbd_mb_pk=:mbd_mb_pk AND mbd_bill_yy=:mbd_bill_yy AND mbd_bill_mm=:mbd_bill_mm", 
                      ['mbd_mb_pk'=>$_GET['mb_pk'], 'mbd_bill_yy'=>$mbd_bill_yy, 'mbd_bill_mm'=>$mbd_bill_mm], 'one');

         $mbd_pay_tag0= $row_mbd['mbd_pay_tag']!='1' ? 'checked':'';
         $mbd_pay_tag1= $row_mbd['mbd_pay_tag']=='1' ? 'checked':'';

         $pay_tag_1_display=$row_mbd['mbd_pay_tag']!='1' ? 'd-none':'d-block';
         $delete_btn_display=!empty($row_mbd['mbd_pk']) ? 'd-inline':'d-none';
       ?>
       
       <div class="row">
              <label class="col-sm-3 col-form-label">*本月應繳金額</label>
              <div class="col-sm-9 date_w form-inline">
               <input type="text" class="form-control" name="mbd_amount" value="<?php echo $row_mbd['mbd_amount'];?>">元
              </div>
            </div>
       <div class="row">
             <label class="col-sm-3 col-form-label">*繳款狀態</label>
              <div class="col-sm-9 form-inline">
                 <div class="form-check form-check-inline">
                <label class="form-check-label">
                	<input class="form-check-input" type="radio" name="mbd_pay_tag"  value="0" <?php echo $mbd_pay_tag0;?>> 未繳
                </label>
                </div>
                <div class="form-check form-check-inline">
                <label class="form-check-label">
                	<input class="form-check-input" type="radio" name="mbd_pay_tag"  value="1" <?php echo $mbd_pay_tag1;?>> 已繳
                </label>
                </div>
              </div>
            </div>

            <div class="pay_tag_1 <?php echo $pay_tag_1_display; ?>">
               <div class="row">
                 <label class="col-sm-3 col-form-label">*實際繳款金額</label>
                 <div class="col-sm-9 form-inline">
                   <input type="text" class="form-control" name="mbd_amount_paid" value="<?php echo $row_mbd['mbd_amount_paid'];?>">
                 </div>
               </div>
              <div class="row">
                 <label class="col-sm-3 col-form-label">*實際繳款日</label>
                 <div class="col-sm-9 form-inline">
                   <input type="text" class="form-control datepicker" readonly name="mbd_pay_date" value="<?php echo $row_mbd['mbd_pay_date'];?>">
                 </div>
               </div>
               <div class="row">
                 <label class="col-sm-3 col-form-label">*繳款方式</label>
                 <div class="col-sm-9 form-inline">
                   <select name="mbd_pay_type" class="form-control">
                     <option value="">-請選擇</option>
                     <option value="1">金融機構臨櫃繳款</option>
                     <option value="2">超商/代收處繳款</option>
                     <option value="3">金融機構自動轉帳</option>
                     <option value="4">ATM/網路銀行轉帳</option>
                     <option value="5">全國繳費網繳款</option>
                   </select>
                 </div>
               </div>
            </div>
            

       <div class="col-md-12 col  member_btn hv-center">
            <button class="gray-layered btnOver submit_btn" type="button">確定</button>
            <button class="gray-layered btnOver close_fancybox" type="button">取消</button>
            <button class="gray-layered btnOver delete_btn <?php echo $delete_btn_display; ?>" type="button">刪除</button>
         </div>
        </div>
     
   
    <?php 
     $row_cl=$pdo->select("SELECT cl_amount, cl_cc_pk FROM consume_log WHERE cl_mbd_pk=:cl_mbd_pk ORDER BY cl_cc_pk", ['cl_mbd_pk'=>$row_mbd['mbd_pk']]);

     for ($i=1; $i <=10 ; $i++) { 
       ${'cl_amount_'.$i}='';
     }
     
     $cl_amount_total=0;
     foreach ($row_cl as $cl_one) {
       if ((int)$cl_one['cl_cc_pk']<=10) {
        ${'cl_amount_'.$cl_one['cl_cc_pk']}=$cl_one['cl_amount'];
       }
       $cl_amount_total+=(int)$cl_one['cl_amount'];
       $cl_amount[$cl_one['cl_cc_pk']]=$cl_one['cl_amount'];
     }
    ?>

    <h5>帳單消費明細(可自行設定帳單消費項目內容，也可省略不填寫)</h5>

       <div id="consume_category_div">
       <div class="row login_line">
              <!-- <label class="col-sm-3 col-form-label">*本月應繳金額</label> -->
              <div class="col-sm-12 py-md-2 row">

                 <div class="col-md-6 date_w form-inline py-md-2">
                 	購物<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_1;?>">元
                 	<input type="hidden" name="cc_pk[]" value="1">
                 </div>
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	飲食<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_2;?>">元
                 	<input type="hidden" name="cc_pk[]" value="2">
                 </div>
               

                 <div class="col-md-6 date_w form-inline py-md-2">
                 	娛樂<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_3;?>">元
                 	<input type="hidden" name="cc_pk[]" value="3">
                 </div>
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	旅遊<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_4;?>">元
                 	<input type="hidden" name="cc_pk[]" value="4">
                 </div>
               

                 <div class="col-md-6 date_w form-inline py-md-2">
                 	交通<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_5;?>">元
                 	<input type="hidden" name="cc_pk[]" value="5">
                 </div>
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	水電<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_6;?>">元
                 	<input type="hidden" name="cc_pk[]" value="6">
                 </div>
            
               
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	保險<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_7;?>">元
                 	<input type="hidden" name="cc_pk[]" value="7">
                 </div>
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	投資<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_8;?>">元
                 	<input type="hidden" name="cc_pk[]" value="8">
                 </div>
            
               
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	其他<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_10;?>">元
                 	<input type="hidden" name="cc_pk[]" value="10">
                 </div>
                 <div class="col-md-6 date_w form-inline py-md-2">
                 	本期循環息<input type="text" class="form-control" name="cl_amount[]" value="<?php echo $cl_amount_9;?>">元
                 	<input type="hidden" name="cc_pk[]" value="9">
                 </div>

                 <?php 
                  //-- 新增消費項目 --
                  $row_consume_category=$pdo->select("SELECT cc_category, cc_pk 
                  	                                  FROM consume_category 
                  	                                  WHERE cc_ud_pk=:cc_ud_pk AND cc_mbd_pk=:cc_mbd_pk 
                  	                                  ORDER BY cc_pk ASC", ['cc_ud_pk'=>$_SESSION['ud_pk'], 'cc_mbd_pk'=>$row_mbd['mbd_pk']]);
                  foreach ($row_consume_category as $consume_category) {
                  	
                  	echo '
                  	<div class="col-md-12 date_w form-inline py-md-2 row border-bottom new_consume_category">
                  	 <div class="col-md-6 text-center">
	                   '.$consume_category['cc_category'].'
                     </div>
                     <div class="col-md-6">
                       <input type="text" class="form-control" name="cl_amount[]" value="'.$cl_amount[$consume_category['cc_pk']].'">元
                       <button class="del_consume_category btn" type="button">刪除</button>
                       <input type="hidden" name="cc_pk[]" value="'.$consume_category['cc_pk'].'">
                     </div>
                    </div>';
                  }
                 ?>
            

                 <div class="col-md-12 form-inline member_btn hv-center mt-3">
                   <input type="text" class="form-control" name="cc_category" style="width: 61%;">
                   <button id="add_consume_category" class="gray-layered btnOver" type="button">新增消費項目</button>
                   <span class="w-100 text-center cl_amount_total">本期帳單消費總額： <b><?php echo $cl_amount_total; ?></b>　元</span>
                 </div>
              
              </div>
            </div>

      
       
       <div class="col-md-12 col ">
       	    <h4>注意事項：</h4>
            <p>
             1.「本期帳單金額」：為實際應繳款的總費用。<br>
             2.帳單消費明細：可自行選擇是否要輸入明細內容，或者不填寫亦可。<br>
             3.以上消費紀錄，本網僅做統計之用，不涉及個人資料，亦不保證永久保存。若有需要請自行保存。</p>
       </div>
        
       <div class="col-md-12 col  member_btn hv-center">
            <button class="gray-layered btnOver submit_btn" type="button">確定</button>
            <button class="gray-layered btnOver close_fancybox" type="button">取消</button>
            <button class="gray-layered btnOver delete_btn <?php echo $delete_btn_display; ?>" type="button">刪除</button>
         </div>
        </div>

        <input type="hidden" name="mb_pay_day" value="<?php echo $mb_pay_day;?>">
    </form> 

           
  </div>
  <!-- fancybox END -->

  <script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
  <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- twzipcode -->
  <script type="text/javascript" src="/vendor/twzipcode/jquery.twzipcode.js"></script>
  <!-- Fancybox -->
  <script type="text/javascript" src="/vendor/fancybox/jquery.fancybox.min.js"></script>
  <!-- swiper -->
  <script type="text/javascript" src="/vendor/swiper/swiper.min.js"></script>
  <script type="text/javascript" src="/vendor/swiper/swiper.animate1.0.3.min.js"></script>
  <!-- 超強動畫庫 -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
  <!-- ajax JS -->
  <script type="text/javascript" src="/js/ajax.js"></script>
  <!-- 主要JS -->
  <script type="text/javascript" src="/js/main.js"></script>

  <script type="text/javascript">
  	$(document).ready(function() {


      //-- 繳款方式 --
      <?php 
        if (!empty($row_mbd['mbd_pay_type'])) {
      ?>

       $('[name="mbd_pay_type"] [value="<?php echo $row_mbd['mbd_pay_type'];?>"]').prop('selected', true);

      <?php
        }
      ?>

  		
  	  //-- 新增項目 --
  	  $('#add_consume_category').click(function(event) {
        var _this=$(this);
        var err_txt='';
        err_txt = err_txt + check_input( '[name="cc_category"]', '新增消費項目' );

        if (err_txt!='') {
             alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
        }
        else{
          $.ajax({
          	url: '../ajax/member_ajax.php',
          	type: 'POST', 
          	data: {
          		type: 'add_consume_category',
          		cc_category: $('[name="cc_category"]').val(),
          		mbd_mb_pk: $('[name="mbd_mb_pk"]').val(),
              mbd_bill_yy: $('[name="mbd_bill_yy"]').val(),
              mbd_bill_mm: $('[name="mbd_bill_mm"]').val(),
              mb_pay_day:  $('[name="mb_pay_day"]').val()
          	},
          	success:function (data) {
          	  var html_txt='<div class="col-md-12 date_w form-inline py-md-2 row border-bottom new_consume_category">'+
          	                 '<div class="col-md-6 text-center">'+
          	                   $('[name="cc_category"]').val()+
          	                 '</div>'+
          	                 '<div class="col-md-6">'+
                 	          '<input type="text" class="form-control" name="cl_amount[]">元'+
                 	          '<button class="del_consume_category btn" type="button">刪除</button>'+
                 	          '<input type="hidden" name="cc_pk[]" value="'+data+'">'+
                 	         '</div>'+
                           '</div>';
          	  _this.parent().before(html_txt);
          	  $('[name="cc_category"]').val('');
          	},
          	error: function (xhr) {
          	  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
          	}
          });
        }
  	  });
      //-- 新增項目 END --

  	  //-- 刪除項目 --
  	  $('#consume_category_div').on('click', '.del_consume_category', function(event) {
  	  	var _this=$(this);
  	  	var cc_category =$(this).parent().prev().html().trim();
  	  	 if (confirm('是否刪除 " '+cc_category+' " 消費類別資料?\n按下確定刪除且無法恢復\n按下取消即取消刪除')) {
  	  	 	$.ajax({
  	  	 		url: '../ajax/member_ajax.php',
  	  	 		type: 'POST',
  	  	 		data: {
  	  	 			type: 'del_consume_category',
  	  	 			cc_pk: $(this).next().val()
  	  	 		},
  	  	 		success:function (data) {
  	  	 		   _this.parent().parent().remove();
  	  	 		   //--帳單消費總額--
  	  	 		   cl_amount_total();
  	  	 		},
  	  	 		error: function (xhr) {
  	  	 		  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
  	  	 		}
  	  	 	});
  	  	 }
  	  });
  	  //-- 刪除項目 END --



  	  //-- 確定帳單登入 --
  	  $('.submit_btn').click(function(event) {
  	  	
  	  	var err_txt='';
  	  	err_txt = err_txt + check_input( '[name="mbd_amount"]', '本月應繳金額\n' );
  	  	err_txt = err_txt + check_input( '[name="mbd_pay_tag"]', '繳款狀態\n' );
  	  	if ($('[name="mbd_pay_tag"]:checked').val()=='1') {
  	  	   err_txt = err_txt + check_input( '[name="mbd_amount_paid"]', '實際繳款金額\n' );
  	  	   err_txt = err_txt + check_input( '[name="mbd_pay_date"]', '實際繳款日\n' );
  	  	   err_txt = err_txt + check_input( '[name="mbd_pay_type"]', '繳款方式' );
  	  	}

  	  	if (err_txt!='') {
  	  	     alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
  	  	}
  	  	else{
          
          var cl_amount=[];
          $.each($('[name="cl_amount[]"]'), function(index, val) {
          	 cl_amount.push($(this).val());
          });

          var cc_pk=[];
          $.each($('[name="cc_pk[]"]'), function(index, val) {
          	 cc_pk.push($(this).val());
          });

          var mbd_expdate=$('[name="mbd_bill_yy"]').val()+'-'+$('[name="mbd_bill_mm"]').val()+'-'+$('[name="mb_pay_day"]').val();

          $.ajax({
          	url: '../ajax/member_ajax.php',
          	type: 'POST',
          	data: {
          		type: 'add_my_billing_detail',
                mbd_mb_pk: $('[name="mbd_mb_pk"]').val(),
                mbd_bill_yy: $('[name="mbd_bill_yy"]').val(),
                mbd_bill_mm: $('[name="mbd_bill_mm"]').val(),
                mbd_amount: $('[name="mbd_amount"]').val(),
                mbd_pay_tag: $('[name="mbd_pay_tag"]:checked').val(),
                mbd_amount_paid:$('[name="mbd_amount_paid"]').val(),
                mbd_pay_date:$('[name="mbd_pay_date"]').val(),
                mbd_pay_type:$('[name="mbd_pay_type"]').val(),
                mbd_expdate:mbd_expdate,
                cl_amount: cl_amount,
                cc_pk: cc_pk
          	},
          	success:function (data) {
          	  if (data=='insert') {
          	  	alert("已登入"+$('[name="mbd_bill_mm"]').val()+"月份的帳單");
          	  }
          	  else{
          	  	alert("已更新"+$('[name="mbd_bill_mm"]').val()+"月份的帳單");
          	  }
          	  
          	},
          	error: function (xhr) {
          	  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
          	}
          });
          
  	  	}

  	  });
  	  //-- 確定帳單登入 END --


      //-- 刪除帳單 --
      $('.delete_btn').click(function(event) {
      	var mbd_mb_pk=$('[name="mbd_mb_pk"] [value="'+$('[name="mbd_mb_pk"]').val()+'"]').html();
      	var yy=$('[name="mbd_bill_yy"]').val();
      	var mm=$('[name="mbd_bill_mm"]').val();
      	if (confirm('是否刪除 「" '+mbd_mb_pk+' "」 '+yy+'年'+mm+'月?\n按下「確定」確定刪除\n按下「取消」取消刪除')){
          
          $.ajax({
          	url: '../ajax/member_ajax.php',
          	type: 'POST',
          	data: {
          		type: 'del_my_billing_detail',
          		mbd_mb_pk:$('[name="mbd_mb_pk"]').val(),
          		mbd_bill_yy:$('[name="mbd_bill_yy"]').val(),
          		mbd_bill_mm:$('[name="mbd_bill_mm"]').val()
          	},
          	success:function (data) {
          	 location.replace('add_mybill.php?mb_pk='+$('[name="mbd_mb_pk"]').val());
          	},
          	error: function (xhr) {
          	  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
          	}
          });
          
      	}

      });
      //-- 刪除帳單 END --


  	  //-- 更改繳費狀態 --
  	  $('[name="mbd_pay_tag"]').change(function(event) {
  	  	if ($('[name="mbd_pay_tag"]:checked').val()=='1') {
  	  	   $('.pay_tag_1').removeClass('d-none');
  	  	   $('.pay_tag_1').addClass('d-block');
  	  	}
  	  	else{
  	  	   $('.pay_tag_1').removeClass('d-block');
  	  	   $('.pay_tag_1').addClass('d-none');
  	  	}
  	  });


  	  //-- 帳單消費總額 --
  	  $('#consume_category_div').on('change', '[name="cl_amount[]"]', function(event) {
        if (!isNaN($(this).val())) {
          //--帳單消費總額--
          cl_amount_total();
        }
        else{
        	alert('請輸入數字');
        	$(this).val('');
        }
  	  });

     


    //---- 切換信用卡 ----
    $('[name="mbd_mb_pk"]').change(function(event) {
      if ($(this).val()!='') {
      	location.replace('add_mybill.php?mb_pk='+$(this).val());
      }
    });
    //---- 切換信用卡 END ----






    //---- 切換帳單年份 -----

    $('[name="mbd_bill_yy"]').change(function(event) {
    	my_billing_detail();
    });

    //---- 切換帳單年份 END -----


    //---- 切換帳單月份 -----

    $('[name="mbd_bill_mm"]').change(function(event) {
    	my_billing_detail();

    });

    //---- 切換帳單月份 END -----



  });
   //--- jquery END ---




 
 //-- 更新帳單消費總額 --
 function cl_amount_total() {
 	
 	var total=0;
 	$.each($('[name="cl_amount[]"]'), function(index, val) {
 		if ($(this).val()!='') {
 		  total+=parseInt($(this).val());
 		}
 	});
 	$('.cl_amount_total b').html(total);
 }




 //-- 獲取帳單資料 --
 function my_billing_detail() {
 	
 	$.ajax({
 		url: '../ajax/member_ajax.php',
 		type: 'POST',
 		dataType: 'json',
 		data: {
 			type: 'my_billing_detail',
            mbd_mb_pk:$('[name="mbd_mb_pk"]').val(),
            mbd_bill_yy:$('[name="mbd_bill_yy"]').val(),
            mbd_bill_mm:$('[name="mbd_bill_mm"]').val()
 		},
 		success:function (data) {
 		    //console.log(data);

          //-- 清空表單 --
          $('#my_billing_detail_form input[type="text"]').val('');
          $('[name="mbd_pay_type"]').val('');
          $('[name="mbd_pay_tag"][value="0"]').prop('checked', true);
            $('.pay_tag_1').removeClass('d-block');
            $('.pay_tag_1').addClass('d-none');
            $('.delete_btn').removeClass('d-inline');
            $('.delete_btn').addClass('d-none');
            $('.cl_amount_total b').html('0');
            if ($('.new_consume_category').length>0) {
              $('.new_consume_category').remove();
            }
            //-- 清空表單 END --
          
          if (data['mbd_amount']!=null) {
            $('.delete_btn').addClass('d-inline');
            $('.delete_btn').removeClass('d-none');
          }
          $('[name="mbd_amount"]').val(data['mbd_amount']);
          $('[name="mbd_amount_paid"]').val(data['mbd_amount_paid']);
          $('[name="mbd_pay_date"]').val(data['mbd_pay_date']);
          $('[name="mbd_pay_type"]').val(data['mbd_pay_type']);

          if ( data['mbd_pay_tag']=='1' ) {
          	$('[name="mbd_pay_tag"][value="'+data['mbd_pay_tag']+'"]').prop('checked', true);
            $('.pay_tag_1').removeClass('d-none');
          	$('.pay_tag_1').addClass('d-block');
          }
          else{
          	$('[name="mbd_pay_tag"][value="'+data['mbd_pay_tag']+'"]').prop('checked', true);
            $('.pay_tag_1').removeClass('d-block');
  	  	    $('.pay_tag_1').addClass('d-none');
          }

          
          //-- 新增消費項目 --
          for (var i = 0; i < data['consume_category'].length; i++) {

          	var html_txt='<div class="col-md-12 date_w form-inline py-md-2 row border-bottom new_consume_category">'+
          	                 '<div class="col-md-6 text-center">'+
          	                   data['consume_category'][i]['cc_category']+
          	                 '</div>'+
          	                 '<div class="col-md-6">'+
                 	          '<input type="text" class="form-control" name="cl_amount[]">元'+
                 	          '<button class="del_consume_category btn" type="button">刪除</button>'+
                 	          '<input type="hidden" name="cc_pk[]" value="'+data['consume_category'][i]['cc_pk']+'">'+
                 	         '</div>'+
                           '</div>';
          	$('#add_consume_category').parent().before(html_txt);
          }

          //-- 消費項目資訊 --
          for (var i = 0; i < data['consume_log'].length; i++) {
          	var cc_pk=data['consume_log'][i]['cl_cc_pk'];
          	var cl_amount=data['consume_log'][i]['cl_amount'];
          	$('[name="cc_pk[]"][value="'+cc_pk+'"]').parent().find('[name="cl_amount[]"]').val(cl_amount);
          }

          //-- 更新帳單消費總額 --
          cl_amount_total();
 		},
 		error: function (xhr) {
 		  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
 		}
 	});
 	
 }
  </script>
</body>
</html>