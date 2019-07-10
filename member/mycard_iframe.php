 <?php 
   require '../share_area/conn.php';
 ?>
 <!DOCTYPE html>
 <html lang="zh-tw">
 <head>
   <meta charset="UTF-8">
   <title>我的信用卡</title>

   <?php 
    //-- 共用CSS --
    require '../share_area/share_css.php';
   ?>
   <style type="text/css">
     #add_card{ display: inline-block; }
        body{ background-color: #fff; }
        @media (min-width: 1024px){
          body{ width: 800px; }
        }
        @media (max-width: 420px){
          body{ width:100%; }
        }

   </style>
 </head>
 <body class="text-center">
       <!-- fancybox -->
       <!-- 新增信用卡 -->
    <div id="add_card">
        <!-- 關閉按鈕 -->
        <button class="btn btn-danger btn-sm close_fancybox">Ｘ</button>

         <div class="mem_logo ml-2 mt-2">
          <img src="../img/component/logo_ph.png" alt="">
         </div>
         <h1 class="mycard_title">新增信用卡設定</h1>

      <form id="add_myccard_form" class="p-3 px-md-2 check_in" action="" method="POST">
      <div class="login_line">

       <div id="stop_card_div" class="row" style="display: none;">
         <label class="col-sm-3 col-form-label py-1 py-md-2">*使用狀態</label>
         <div class="col-sm-9 form-inline date_w">
           <label><input type="radio" name="mb_stop_card" value="0" checked>使用中</label>｜
           <label><input type="radio" name="mb_stop_card" value="1">已剪卡</label>
           <input type="text" class="datepicker" name="mb_cardcut_date" style="display: none;">｜
           <label><input type="radio" name="mb_stop_card" value="2">刪除</label>

         </div>
       </div>

       <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">＊發卡單位</label>
           <div class="col-sm-9 form-inline">
             <select id="sel_bank" name="mb_bill_bi_pk" class="form-control" >
              <option value="">-- 請選擇信用卡 --</option>
              <?php 
                $row_bank=$pdo->select("SELECT bi_code, bi_shortname, Tb_index FROM bank_info WHERE OnLineOrNot=1 ORDER BY bi_code ASC");
                foreach ($row_bank as $bank_one) {
                  echo '<option value="'.$bank_one['Tb_index'].'">['.$bank_one['bi_code'].']'.$bank_one['bi_shortname'].'</option>';
                }
              ?>

             </select>
           </div>
         </div>

          <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">*信用卡</label>
           <div class="col-sm-9 form-inline">
             <select class="form-control w-100" name="mb_bill_cc_pk" id="sel_ccard">
               <option value="">-- 請選擇信用卡 --</option>
             </select>
           </div>
         </div>
         <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">結帳日</label>
           <div class="col-sm-9 form-inline date_w">
             每月 
             <select class="form-control mx-1 w-30" name="mb_checkout_day">
              <?php 
               for ($i=0; $i <=31 ; $i++) { 
                 echo ' <option value="'.$i.'">'.$i.'</option>';
               }
              ?>
             </select>
              日
           </div>
         </div>
         <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">*繳款截止日</label>
           <div class="col-sm-9 form-inline date_w">
             每月
             <select class="form-control mx-1 w-30" name="mb_pay_day">
              <?php 
               for ($i=1; $i <=31 ; $i++) { 
                 echo ' <option value="'.$i.'">'.$i.'</option>';
               }
              ?>
             </select>
             日
           </div>
         </div>
         <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">*提醒設定</label>
           <div class="col-sm-9 form-inline date_w">
             繳款截止日前
             <select class="form-control mx-1" name="mb_remind">
              <?php 
               for ($i=0; $i <=31 ; $i++) { 
                 $selected_txt=$i==3 ? 'selected':'';
                 echo ' <option '.$selected_txt.' value="'.$i.'">'.$i.'</option>';
               }
              ?>
             </select>
             日(設定為0系統將不提醒)
           </div>
         </div>
         <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">年費門檻</label>
           <div class="col-sm-9 py-md-2 date_w" style="line-height: 2;">

               <textarea id="cc_eq_content" class="form-control" readonly rows="5"></textarea>
           </div>
         </div>
         <div class="row">
           <label class="col-sm-3 col-form-label py-1 py-md-2">信用卡預覽</label>
           <div class="col-sm-9 py-md-2 text-left">
            <img style="height: 120px;" class="cc_img" src="../sys/img/CardSample.png">
            <div id="card_info_div">
              <span id="card_info"  style="display: none;"><a href="#" target="_blank" class="this_ccard_link gray-layered btnOver px-2 py-1">查詢該卡資料</a></span>
            </div>
           </div>
         </div>

       <div class="col-md-12 col  member_btn hv-center">
         <button id="submit_btn" class="gray-layered btnOver" type="button">確認新增</button>
         <button class="gray-layered btnOver close_fancybox" type="button">放棄</button>
      </div>
       
       <!-- 判斷新增或修改 -->
       <input type="hidden" name="type" value="insert">
       <!-- 信用卡資料 -->
       <input type="hidden" name="mb_pk" value="">
       <input type="hidden" name="mb_bill_co_pk" value="">
       <input type="hidden" name="mb_bill_group_id" value="">
       <input type="hidden" name="mb_bill_name" value="">

      </div>
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


       //----------------- 選擇銀行 -------------------
       $('#sel_bank').change(function(event) {
         sel_bank($(this).val());
       });
       //----------------- 選擇銀行 END -------------------
       

       //----------------- 選擇信用卡 -------------------

       $('#sel_ccard').change(function(event) {
         sel_ccard($(this).val());
       });

       //----------------- 選擇信用卡 END -------------------



       
       //----------------- 確認新增 OR 修改 -------------------

       $('#submit_btn').click(function(event) {

         var err_txt='';
         err_txt = err_txt + check_input( '[name="mb_bill_bi_pk"]', '發卡單位\n' );
         err_txt = err_txt + check_input( '[name="mb_bill_cc_pk"]', '信用卡\n' );
         err_txt = err_txt + check_input( '[name="mb_pay_day"]', '繳款截止日\n' );
         err_txt = err_txt + check_input( '[name="mb_remind"]', '提醒設定\n' );
         if ($('[name="mb_stop_card"]:checked').val()=='1') {
          err_txt = err_txt + check_input( '[name="mb_cardcut_date"]', '剪卡日\n' );
         }
         err_txt = err_txt + check_input( '[name="mb_remind"]', '提醒設定\n' );
         

         if (err_txt!='') {
            alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
         }
         else if($('[name="mb_stop_card"]:checked').val()=='1'){
            if (confirm('您是否確定將本卡設定為已剪卡\n 按「確定」確定 \n 按「取消」取消')) {
             
             $.ajax({
               url: '../ajax/member_ajax.php',
               type: 'POST',
               data: {
                 type: 'update_mycard',
                 mb_pk:$('[name="mb_pk"]').val(),
                 mb_bill_bi_pk:$('[name="mb_bill_bi_pk"]').val(),
                 mb_bill_co_pk:$('[name="mb_bill_co_pk"]').val(),
                 mb_bill_cc_pk:$('[name="mb_bill_cc_pk"]').val(),
                 mb_bill_name:$('[name="mb_bill_name"]').val(),
                 mb_bill_group_id:$('[name="mb_bill_group_id"]').val(),
                 mb_checkout_day:$('[name="mb_checkout_day"]').val(),
                 mb_pay_day:$('[name="mb_pay_day"]').val(),
                 mb_cardcut_date:$('[name="mb_cardcut_date"]').val(),
                 mb_stop_card:$('[name="mb_stop_card"]:checked').val(),
                 mb_remind:$('[name="mb_remind"]').val()
               },
               success:function (data) {
                alert('已修改"'+$('[name="mb_bill_name"]').val()+'"');
                parent.location.reload();
               },
               error: function (xhr) {
                 alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
               }
             });
              
            }
            else{
             $('[name="mb_stop_card"][value="0"]').prop('checked', true);
             $('[name="mb_cardcut_date"]').css('display', 'none');
             $('[name="mb_cardcut_date"]').val('');
            }
         }
         else{

           var type=$('[name="type"]').val()=='insert' ? 'insert_mycard' : 'update_mycard';
           var type_alert=$('[name="type"]').val()=='insert' ? '已新增' : '已更新';
           $.ajax({
             url: '../ajax/member_ajax.php',
             type: 'POST',
             data: {
               type: type,
               mb_pk:$('[name="mb_pk"]').val(),
               mb_bill_bi_pk:$('[name="mb_bill_bi_pk"]').val(),
               mb_bill_co_pk:$('[name="mb_bill_co_pk"]').val(),
               mb_bill_cc_pk:$('[name="mb_bill_cc_pk"]').val(),
               mb_bill_name:$('[name="mb_bill_name"]').val(),
               mb_bill_group_id:$('[name="mb_bill_group_id"]').val(),
               mb_checkout_day:$('[name="mb_checkout_day"]').val(),
               mb_pay_day:$('[name="mb_pay_day"]').val(),
               mb_cardcut_date:$('[name="mb_cardcut_date"]').val(),
               mb_stop_card:$('[name="mb_stop_card"]').val(),
               mb_remind:$('[name="mb_remind"]').val()
             },
             success:function (data) {
              alert(type_alert+'"'+$('[name="mb_bill_name"]').val()+'"');
              parent.location.reload();
             },
             error: function (xhr) {
               alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
             }
           });
         }

       });

       //----------------- 確認新增 END -------------------





       //---------------------- 更改使用狀態 ---------------------------
        $('[name="mb_stop_card"]').click(function(event) {
          if ($(this).val()==0) {
            $('[name="mb_cardcut_date"]').css('display', 'none');
            $('[name="mb_cardcut_date"]').val('');
          }
          else if ($(this).val()==1) {
            $('[name="mb_cardcut_date"]').css({
              'display': 'inline',
              'width': '30%'
            });
          }
          else if ($(this).val()==2) {
            if (confirm('注意：您將本卡設為刪除，\n也將一併刪除原有設定與帳單登入資料，\n您是否確定將本卡刪除?\n 按「確定」確定 \n 按「取消」取消')) {
              $.ajax({
                url: '../ajax/member_ajax.php',
                type: 'POST',
                data: {
                  type: 'delete_mycard',
                  mb_pk:$('[name="mb_pk"]').val()
                },
                success:function (data) {
                 alert('已刪除"'+$('[name="mb_bill_name"]').val()+'"');
                 parent.location.reload();
                },
                error: function (xhr) {
                  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
                }
              });
            }
            else{
              $('[name="mb_stop_card"][value="0"]').prop('checked', true);
              $('[name="mb_cardcut_date"]').css('display', 'none');
              $('[name="mb_cardcut_date"]').val('');
            }
          }
        });
        //---------------------- 更改使用狀態 END ---------------------------


        $('.show_cut_card').click(function(event) {
          $('.cut_card_tb').slideToggle('fast');
        });
     });
       

     
     //---------------------- 讀取修改設定 ---------------------------
     $(window).on('load', function(event) {
        var get=location.search.substr(1);
        console.log(get);
        if ( get!='') {
          $.ajax({
            url: '../ajax/member_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
             type: 'sel_mycard',
             mb_pk: get
           },
            success:function (data) {
              
              $('#sel_bank').val(data['mb_bill_bi_pk']);
              edit_ccard(data['mb_bill_bi_pk'], data['mb_bill_cc_pk']);
              $('[name="mb_pk"]').val(data['mb_pk']);
              $('[name="mb_checkout_day"]').val(data['mb_checkout_day']);
              $('[name="mb_pay_day"]').val(data['mb_pay_day']);
              $('[name="mb_remind"]').val(data['mb_remind']);
            }
          });
          
           $('[name="type"]').val('update');
           $('.mycard_title').html('修改信用卡設定');
           $('#submit_btn').html('確定修改');
           $('#stop_card_div').css('display', 'flex');
        }
        
     });
     //---------------------- 讀取修改設定 END ---------------------------







     //------------------ 選擇銀行 -----------------------
     function sel_bank(cc_bi_pk) {

       $.ajax({
         url: '../ajax/member_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
           type: 'sel_bank',
           cc_bi_pk: cc_bi_pk
         },
         success:function (data) {

           $('#sel_ccard').html('<option value="">-- 請選擇信用卡 --</option>');

           $.each(data, function(index, val) {
              var ccard_name=this['cc_cardname']+'_'+this['org_nickname']+this['attr_name'];
              $('#sel_ccard').append('<option cc_img="'+this['cc_photo']+'" cc_group="'+this['cc_group_id']+'" value="'+this['Tb_index']+'">'+ccard_name+'</option>');
           });

         }
       });
     }
     //------------------ 選擇銀行 END -----------------------


     //------------------ 選擇信用卡 -----------------------
     function sel_ccard(ccard_id) {
       
       $.ajax({
         url: '../ajax/member_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
           type: 'sel_ccard',
           ccard_id: ccard_id
         },
         success:function (data){
           //console.log(data);

           if ($('#sel_ccard').val()!='') {
             $('#card_info').css('display', 'block');
             var cc_pk=$('#sel_ccard').val();
             var cc_group_id= data['cc_group_id'];
             $('.this_ccard_link').attr('href', '/card/creditcard.php?cc_pk='+cc_pk+'&cc_group_id='+cc_group_id);

             var cc_photo= data['cc_photo']==null ? 'CardSample.png' : data['cc_photo'];
             $('.cc_img').attr('src', '../sys/img/'+cc_photo);

             $('[name="mb_bill_co_pk"]').val(data['cc_cardorg']);
             $('[name="mb_bill_group_id"]').val(data['cc_group_id']);

             $('#cc_eq_content').val(data['content']);

             var bank_name=$('#sel_bank :selected').html().split(']');
             var ccard_name=bank_name[1]+$('#sel_ccard').find(':selected').html();
             $('[name="mb_bill_name"]').val(ccard_name);
           }

         }
       });
     }
     //------------------ 選擇信用卡 END -----------------------


     //------------------ 獲取修改信用卡 -----------------------
     function edit_ccard(cc_bi_pk, ccard_id) {
       
       $.ajax({
         url: '../ajax/member_ajax.php',
         type: 'POST',
         dataType: 'json',
         data: {
           type: 'sel_bank',
           cc_bi_pk: cc_bi_pk
         },
         success:function (data) {

           $('#sel_ccard').html('<option value="">-- 請選擇信用卡 --</option>');

           $.each(data, function(index, val) {
              var ccard_name=this['cc_cardname']+'_'+this['org_nickname']+this['attr_name'];
              $('#sel_ccard').append('<option cc_img="'+this['cc_photo']+'" cc_group="'+this['cc_group_id']+'" value="'+this['Tb_index']+'">'+ccard_name+'</option>');
           });
           
           $('#sel_ccard').val(ccard_id);
           sel_ccard(ccard_id);
         }
       });
     }
     //------------------ 獲取修改信用卡 END -----------------------
   </script>
 </body>
 </html>
