<?php 
 require 'conn.php';
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>發信</title>
	<?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>

    <style type="text/css">
      body{ width: 700px; padding: 15px;}
      .logo img{ width: 150px; }
      .cardshap{ padding: 15px; }
      .mail_form{ padding: 15px;margin: 0 0 20px 0; border: 1px solid #ccc; border-radius: 10px; background-color: #f8f8f8;}
      .form-group.row{ margin-bottom: 10px; }
      .col-form-label{ text-align: right;}
      .btn_div{ text-align: center; }
      .error_title{ display: inline-block; margin: 10px 0; color: #1c37a3; }
      .close_fancybox{ position: absolute; right: 0; top: 0; border-radius: 0; }
    </style>
</head>
<body>
   
   <div class="cardshap">
    
    <!-- 關閉視窗 -->
    <button class="btn btn-danger btn-sm close_fancybox">Ｘ</button>

    <div class="logo">
      <img src="/img/component/logo.png" alt="">
    </div>

    <b class="error_title">★錯誤回報</b>
    <div class="mail_form">

        <form id="send_form" action="#" method="POST">
                
                <!-- 新聞資訊 -->
                <?php 
                 
                 //-- 新聞 -- 
                 if (strpos($_SERVER['QUERY_STRING'], 'news')!==FALSE) {
                   $row_news=$pdo->select("SELECT n.ns_ftitle, n.Tb_index, n.mt_id, n.ns_nt_pk, n.area_id, a.at_name
                                           FROM NewsAndType as n 
                                           LEFT JOIN appArea as a ON a.Tb_index=n.area_id
                                           WHERE n.Tb_index=:Tb_index", 
                                           ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

                   $sqm_referer=news_url($row_news['mt_id'], $row_news['Tb_index'], $row_news['ns_nt_pk'], $row_news['area_id']);
                   $sqm_title=$row_news['ns_ftitle'];
                   $sqm_type_name=empty($row_news['at_name']) ? '新聞': $row_news['at_name'];
                   $sqm_no=$row_news['Tb_index'];
                 }

                 //-- 公告活動 -- 
                 elseif(strpos($_SERVER['QUERY_STRING'], 'note')!==FALSE){
                   $row_note=$pdo->select("SELECT note_type, aTitle, Tb_index
                                           FROM appNotice
                                           WHERE Tb_index=:Tb_index", 
                                           ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

                   $sqm_referer=$row_note['note_type']=='0' ? $URL.'/member/notify_detail.php?'.$row_note['Tb_index'] : $URL.'/member/event_activity_detail.php?'.$row_note['Tb_index'];
                   $sqm_title=$row_note['aTitle'];
                   $sqm_type_name=$row_note['note_type']=='0' ? '公告': '活動';
                   $sqm_no=$row_note['Tb_index'];
                 }

                 //-- 信用卡 -- 
                 elseif(strpos($_SERVER['QUERY_STRING'], 'ccard')!==FALSE){
                   
                   $row_ccard=$pdo->select("SELECT cc_group_id, Tb_index, bi_shortname, cc_cardname, org_nickname, attr_name
                                           FROM cc_detail
                                           WHERE Tb_index=:Tb_index", 
                                           ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

                   $sqm_referer=$URL.'/card/creditcard.php?cc_pk='.$row_ccard['Tb_index'].'&cc_group_id='.$row_ccard['cc_group_id'];
                   $sqm_title=$row_ccard['bi_shortname'].$row_ccard['cc_cardname'].$row_ccard['org_nickname'].$row_ccard['attr_name'];
                   $sqm_type_name='信用卡';
                   $sqm_no=$row_ccard['Tb_index'];
                 }

                 //-- 金融卡 -- 
                 elseif(strpos($_SERVER['QUERY_STRING'], 'dcard')!==FALSE){
                   $row_ccard=$pdo->select("SELECT dc_group_id, Tb_index, bi_shortname, dc_cardname, org_nickname, attr_name
                                            FROM dc_detail
                                            WHERE Tb_index=:Tb_index", 
                                            ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');

                   $sqm_referer=$URL.'/card/debitcard.php?dc_pk='.$row_ccard['Tb_index'].'&dc_group_id='.$row_ccard['dc_group_id'];
                   $sqm_title=$row_ccard['bi_shortname'].$row_ccard['dc_cardname'].$row_ccard['org_nickname'].'卡';
                   $sqm_type_name='金融卡';
                   $sqm_no=$row_ccard['Tb_index'];
                 }
                ?>
                <input type="hidden" name="sqm_type_name" value="<?php echo $sqm_type_name;?>">
                <input type="hidden" name="sqm_no" value="<?php echo $sqm_no;?>">
                <input type="hidden" name="sqm_title" value="<?php echo $sqm_title;?>">
                <input type="hidden" name="sqm_referer" value="<?php echo $sqm_referer;?>">
                   
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><span class="text-danger">*</span> 您的姓名：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['ud_nickname'];?>">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><span class="text-danger">*</span> 你的Email：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="my_mail" value="<?php echo $_SESSION['ud_email'];?>">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><span class="text-danger">*</span> 錯誤內容：</label>
                     <div class="col-sm-9">
                       <textarea class="form-control" name="error_content"></textarea>
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label">正確內容：</label>
                     <div class="col-sm-9">
                       <textarea class="form-control" name="correct_content"></textarea>
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label">正確出處：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="sqm_link" placeholder="http://XXXXX.com.tw">
                       <span>請填寫完整網址</span>
                     </div>
                   </div>
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">驗證：</label>
                    <div class="col-sm-9">
                      <!-- google 驗證碼 -->
                      <div id="myCaptcha"></div> 
                    </div>
                   </div>
                   
                 </form>
    </div>

    <div class="btn_div">
      <button id="send_mail_btn" class="btn btn-default">送出</button> <button id="clean_input" class="btn btn-default">清除</button>
    </div>
   	
   </div>

   <!-- GOOGLE recaptcha 驗證程式 -->
    <script src='https://www.google.com/recaptcha/api.js?render=explicit&onload=onReCaptchaLoad'></script>

    <?php 
     //-- 共用JS --
     require '../share_area/share_js.php';
    ?>


   <script type="text/javascript">
      // --- GOOGLE recaptcha 驗證程式 ---
        var captchaWidgetId;   
        var onReCaptchaLoad = function() {   
          
                    captchaWidgetId = grecaptcha.render( 'myCaptcha', {   
                        'sitekey' : '6Le2HRIUAAAAAJuw4gBeXfGm_RBmQ1ONISumalC0',  // required   
                        'theme' : 'light',  // optional   
                        'callback': 'verifyCallback'  // optional   
                    });   
        };   
        var verifyCallback = function( recaptcha ) {   
            //接到回傳值   
        };  

        // --- GOOGLE recaptcha 驗證程式 END ---


       $(document).ready(function() {

        // --清除--
        $('#clean_input').click(function(event) {
          $('#send_form')[0].reset();
        });


         $('#send_mail_btn').click(function(event) {

           var err_txt='';
           err_txt = err_txt + check_input( '[name="name"]', '您的姓名，' );
           err_txt = err_txt + check_input( '[name="my_mail"]', '您的Email，' );
           err_txt = err_txt + check_input( '[name="error_content"]', '錯誤內容' );


           if (err_txt!='') {
             alert("請輸入"+err_txt+"!!");
            }
            else{

              var grecaptcha_tokn=grecaptcha.getResponse(captchaWidgetId);
      
              $.ajax({
                url: 'send_ajax.php',
                type: 'POST',
                data: {
                  type: 'send_error',
                  name: $('[name="name"]').val(),
                  my_mail: $('[name="my_mail"]').val(),
                  error_content: $('[name="error_content"]').val(),
                  correct_content: $('[name="correct_content"]').val(),
                  sqm_link: $('[name="sqm_link"]').val(),
                  sqm_type_name:$('[name="sqm_type_name"]').val(),
                  sqm_no:$('[name="sqm_no"]').val(),
                  sqm_title:$('[name="sqm_title"]').val(),
                  sqm_referer:$('[name="sqm_referer"]').val(),
                  'g-recaptcha-response': grecaptcha_tokn
                },
                success:function (data) {

                  console.log(data);
                  
                  if (data!='send') {
                    alert('請確定您不是機器人');
                  }
                  else{
                    alert('信件已寄出');
                    $('#send_form')[0].reset();
                    parent.jQuery.fancybox.getInstance().close();
                  }
                }
              });
              
            }
         });
       });
   </script>
</body>
</html>