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
                <input type="hidden" id="send_news" href="http://cardu.srl.tw/news/detail.php" value="JCB信用卡日本遊樂去　25家現金回饋總整理">
                   
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><span class="text-danger">*</span> 您的姓名：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="name">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><span class="text-danger">*</span> 你的Email：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="my_mail">
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
                       <input type="text" class="form-control" name="correct_url">
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
                  correct_url: $('[name="correct_url"]').val(),
                  send_news:$('#send_news').val(),
                  send_news_url:$('#send_news').attr('href'),
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
                  }
                }
              });
              
            }
         });
       });
   </script>
</body>
</html>