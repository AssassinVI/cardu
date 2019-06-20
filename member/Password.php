<?php 
 require '../share_area/conn.php';

 if ($_POST) {
   
   //-- GOOGLE recaptcha 驗證程式 --
  GOOGLE_recaptcha('6Le2HRIUAAAAAJJbt4e5F6g6yuW-FmSAYg--3R43', $_POST['g-recaptcha-response'], 'back');

  
  $row_mem=$pdo->select("SELECT COUNT(*) as total, ud_userid, ud_activekey, ud_pk, ud_email, ud_nickname
                         FROM user_data 
                         WHERE ud_userid=:ud_userid AND ud_email=:ud_email", 
                         ['ud_userid'=>$_POST['ud_userid'], 'ud_email'=>$_POST['ud_email']], 'one');
  
  if ($row_mem['total']=='1') {
    
    $password_rand=randTXT(10);
    
    //-- 更新，新密碼 --
    $pdo->update('user_data', ['ud_password_new'=>md5($password_rand)], ['ud_email'=>$row_mem['ud_email']]);

    $body_data='
     <table border="0" width="600">
       <tbody><tr>
         <td width="100%">
           <img src="http://www.cardu.com.tw/images/mail_head.gif" class="CToWUd">
         </td>
       </tr>
       <tr>
         <td width="100%" bgcolor="#E0E0E0"><br>
            親愛的《卡優新聞網》的會員 <br>
            以下是您的密碼資料，請儘速登入系統變更您的密碼 <br>
            帳號:'.$row_mem['ud_userid'].' <br>
            密碼:'.$password_rand.' <br>
            <br>
            為確保資訊安全，請點選以下的連結，新密碼才會啟動 <br>
            <a href="'.$URL.'/member/forget_confirm.php?p='.$row_mem['ud_pk'].'&k='.$row_mem['ud_activekey'].'">
            '.$URL.'/member/forget_confirm.php?p='.$row_mem['ud_pk'].'&k='.$row_mem['ud_activekey'].' 
            </a>
            <br>
            <br>
            會員中心:<a href="'.$URL.'/member/member.php">'.$URL.'/member/member.php</a> <br>
            <br>
            (本確認信為系統自動寄發，請勿直接回覆本信函)<br>
            若您有相關問題，請至 《卡優新聞網》<a href="'.$URL.'/footer/contact_report.php">聯絡我們</a>回應問題，《卡優新聞網》將盡快為您服務)
         </td>
       </tr>
     </tbody></table>
    ';
    send_Mail('卡優新聞網', 'paper@cardu.com.tw', $row_mem['ud_nickname'].'的新密碼通知信', $body_data, [$row_mem['ud_nickname']], [$row_mem['ud_email']]);
    location_up('password.php', '已發送新的密碼到您的信箱，請確認');
  }
  else{
    location_up('back', '您輸入的帳號或信箱錯誤，請再重新輸入一次');
  }

  
 }
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心 > 忘記密碼</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 忘記密碼" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 忘記密碼" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="member_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../share_area/phone/header.php';
         }
         else{
          require '../share_area/header.php';
         }
        ?>
        <!-- 麵包屑 -->
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心/ <a href="javascript:;">忘記密碼</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    
                    <div class="pb-3 detail_content">
                    <div class="col-md-12 col">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">忘記密碼</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="javascript:;" tab-target="#goodPerson" aria-selected="false">重發註冊信</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                              <form id="member_form1" class="px-md-2 login_info" action="" method="POST">
                                <p>若您忘記登入卡優新聞網的密碼，請輸入您的會員帳號，我們將會重新發送新的密碼，到您註冊登記的Email信箱。</p>
                               <div class="login_line">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*會員帳號</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" id="ud_userid1" name="ud_userid" placeholder="＊會員帳號">
                                   </div>
                                 </div>
                               
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*Email</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="email" class="form-control" id="ud_email1" name="ud_email" placeholder="請填寫您註冊所填寫的email信箱">
                                   </div>
                                 </div>
                               
                                <div class="row">
                                   <label class="col-sm-2 col-form-label">*驗證</label>
                                   <div class="col-sm-10 form-inline">
                                     <!-- google 驗證碼 -->
                                     <div class="g-recaptcha" data-sitekey="6Le2HRIUAAAAAJuw4gBeXfGm_RBmQ1ONISumalC0"></div>
                                   </div>
                                 </div>

                                <div class="col-md-12 col  member_btn hv-center">
                                  <button id="submit_btn" class="gray-layered btnOver" type="button">送出資料</button>
                                </div>

                                </div>
                                
                            </form>
                          </div>
                          <div class="tab-pane fade" id="goodPerson" role="tabpanel" aria-labelledby="goodPerson-tab">

                            <form id="member_form2" class="px-md-2 login_info">
                                <p>若您尚未收到卡優新聞網寄發的註冊確認信，請填寫下列資料，系統將重新寄送註冊確認信到您的電子信箱。</p>
                               <div class="login_line">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*會員帳號</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" id="ud_userid2" name="ud_userid" placeholder="＊會員帳號">
                                   </div>
                                 </div>
                               
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*Email</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="email" class="form-control" id="ud_email2" name="ud_email" placeholder="請填寫您註冊所填寫的email信箱">
                                   </div>
                                 </div>
                               
                                <div class="row">
                                   <label class="col-sm-2 col-form-label">*驗證</label>
                                   <div class="col-sm-10 form-inline">
                                     <!-- google 驗證碼 -->
                                     <div class="g-recaptcha" data-sitekey="6Le2HRIUAAAAAJuw4gBeXfGm_RBmQ1ONISumalC0"></div>
                                   </div>
                                 </div>

                                <div class="col-md-12 col  member_btn hv-center">
                                  <button id="submit_btn" class="gray-layered btnOver" type="button">送出資料</button>
                                </div>

                                </div>
                                
                               
                                 
                            </form>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
              if (!wp_is_mobile()) {
                require 'right_area_div.php';
              }
            ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
      //-- 共用js --
      require '../share_area/share_js.php';
    ?>

    <!-- GOOGLE recaptcha 驗證程式 -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript">
      $(document).ready(function() {
        
        $('#submit_btn').click(function(event) {
          
          var err_txt='';
          err_txt = err_txt + check_input( '#ud_userid1', '會員帳號\n' );
          err_txt = err_txt + check_input( '#ud_email1', 'Email\n' );

          if (err_txt!='') {
             alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
          }
          else if(check_userid('#ud_userid1')){
            alert('會員帳號：請輸入6至12字元英、數字，第1個字元需為英文字母');
          }
          else if(check_email('#ud_email1')){
            alert('Email格式錯誤');
          }
          else{
            $('#member_form1').submit();
          }

        });
      });
    </script>

  </body>
</html>