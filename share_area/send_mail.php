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
      body{ width: 600px; padding: 15px;}
      .logo img{ width: 150px; }
      .cardshap{ padding: 15px; }
      .mail_form{ padding: 15px; margin: 20px 0; border: 1px solid #ccc; border-radius: 10px; background-color: #f8f8f8;}
      .form-group.row{ margin-bottom: 10px; }
      .col-form-label{ text-align: right;}
      .btn_div{ text-align: center; }
      .send_news{  margin: 15px 0; border: 1px dashed #ccc; padding: 10px; }
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

    <?php 
     
     if (strpos($_SERVER['QUERY_STRING'], 'news')!==FALSE) {
       $row_news=$pdo->select("SELECT ns_ftitle, Tb_index, mt_id, ns_nt_pk, area_id FROM NewsAndType WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');
       $title=$row_news['ns_ftitle'];
       $url=news_url($row_news['mt_id'], $row_news['Tb_index'], $row_news['ns_nt_pk'], $row_news['area_id']);
     }
     else if(strpos($_SERVER['QUERY_STRING'], 'note')!==FALSE){
        $row_note=$pdo->select("SELECT aTitle, Tb_index, note_type FROM appNotice WHERE Tb_index=:Tb_index", ['Tb_index'=>$_SERVER['QUERY_STRING']], 'one');
        $title=$row_note['aTitle'];
        $url=$row_note['note_type']=='0' ? '../member/notify_detail.php?'.$row_note['Tb_index']:'../member/event_activity_detail.php?'.$row_note['Tb_index'];
     }
     
    ?>

    <p class="send_news">將以下這篇訊息寄給朋友 <br><a href="<?php echo $url; ?>" target="_blank"><?php echo $title; ?></a></p>

    <div class="mail_form">
        
        <form id="send_form" action="#" method="POST">
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label">好友Email：</label>
                     <div class="col-sm-9">
                       <textarea class="form-control" name="fd_mail"></textarea>
                       <span>注意：寄給不同的Email請以半形逗號分開</span>
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label">您的姓名：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="name">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label">你的Email：</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" name="my_mail">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label class="col-sm-3 col-form-label">給朋友留言：</label>
                     <div class="col-sm-9">
                       <textarea class="form-control" name="fd_txt"></textarea>
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
      <button id="send_mail_btn" class="btn btn-default">送出</button> <button id="clean_input" class="btn ">清除</button>
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
           err_txt = err_txt + check_input( '[name="fd_mail"]', '好友Email，' );
           err_txt = err_txt + check_input( '[name="name"]', '您的姓名，' );
           err_txt = err_txt + check_input( '[name="my_mail"]', '您的Email' );

           if (err_txt!='') {
             alert("請輸入"+err_txt+"!!");
            }
            else{

              var grecaptcha_tokn=grecaptcha.getResponse(captchaWidgetId);
      
              $.ajax({
                url: 'send_ajax.php',
                type: 'POST',
                data: {
                  type: 'send_mail',
                  fd_mail: $('[name="fd_mail"]').val(),
                  name: $('[name="name"]').val(),
                  my_mail: $('[name="my_mail"]').val(),
                  fd_txt: $('[name="fd_txt"]').val(),
                  send_news:$('.send_news a').html(),
                  send_news_url:$('.send_news a').attr('href'),
                  'g-recaptcha-response': grecaptcha_tokn
                },
                success:function (data) {

                  
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