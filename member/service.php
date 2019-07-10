<?php 
 require '../share_area/conn.php';

  if ($_POST) {
   
   //-- GOOGLE recaptcha 驗證程式 --
  GOOGLE_recaptcha('6Le2HRIUAAAAAJJbt4e5F6g6yuW-FmSAYg--3R43', $_POST['g-recaptcha-response'], 'back');
  
  $sqm_ud_pk=empty($_SESSION['ud_pk']) ? '0' : $_SESSION['ud_pk'];
  $sqm_ud_nickname=empty($_POST['sqm_ud_nickname']) ? $_SESSION['ud_nickname'] : $_POST['sqm_ud_nickname'];
  
  if ($_POST['sqm_channel']=="21"){
      $sqm_type=11;
      $sqm_channel_name='聯絡我們';
  } else if ($_POST['sqm_channel']=="22"){
      $sqm_type=12;
      $sqm_channel_name='行銷合作';
  } else if ($_POST['sqm_channel']=="23"){
      $sqm_type=13;
      $sqm_channel_name='廣告刊登';
  }

  $param=[
    'sqm_ud_pk'=>$sqm_ud_pk,
    'sqm_ud_nickname'=>$sqm_ud_nickname,
    'sqm_mail'=>$_POST['sqm_mail'],
    'sqm_phone'=>$_POST['sqm_phone'],
    'sqm_channel'=>$_POST['sqm_channel'],
    'sqm_type'=>$sqm_type,
    'sqm_title'=>$_POST['sqm_title'],
    'sqm_ptext'=>$_POST['sqm_ptext'],
    'sqm_pdate'=>date('Y-m-d H:i:s')
  ];

  $pdo->insert('service_question_manage', $param);
  
  //-- 發信 --
  $body_data = file_get_contents("email_service_notify.html");
  $body_data = str_replace("{http-host}", $_SERVER['HTTP_HOST'], $body_data);
  $body_data = str_replace("{sqm_datetime}", date("Y-m-d H:i:s"), $body_data);
  $body_data = str_replace("{sqm_title}", $_POST['sqm_title'], $body_data);
  $body_data = str_replace("{sqm_channel_name}", $sqm_channel_name, $body_data);

   
     if ($_POST['sqm_channel']=="21"){
          $fromEmail="service@cardu.com.tw";
      //$toEmail="tracey@cardu.com.tw";
      //$service_to_mail="mlsc1025@ms41.hinet.net"; //目的email(正式用)
      } else if ($_POST['sqm_channel']=="22"){
          $fromEmail="marketing@cardu.com.tw";
      //$toEmail="tracey@cardu.com.tw";
      //$service_to_mail="tracey@starwin.com.tw";   //目的email(正式用)
      } else if ($_POST['sqm_channel']=="23"){
          $fromEmail="ad@cardu.com.tw";
      //$toEmail="tracey@cardu.com.tw";
      //$service_to_mail="traceyman@msn.com";       //目的email(正式用)
      }

      $name_data=['測試'];
      $adds_data=['d974252037@gmail.com'];

  send_Mail('卡優新聞網', 'service@cardu.com.tw', '《'.$sqm_channel_name.'資料管理》有1筆新資料', $body_data, $name_data, $adds_data);

  location_up('service.php', '我們已收到來信，將盡快回覆您');
 }
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心 > 客服中心</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
      require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 客服中心" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 客服中心" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心 </a> / <a class="now_crumbs" href="javascript:;">客服中心</a></p>
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
                            <a class="nav-link py-2 pl-0 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">聯絡我們</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link py-2 pl-0 flex-x-center" id="goodPerson-tab" href="javascript:;" tab-target="#goodPerson" aria-selected="false">常見問題</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                              <form id="service_form" class="px-md-2 login_info" action="" method="POST">
                               
                                 <p>感謝您瀏覽本網站資訊，若您需要更進一步的服務，請在下方詳述您的問題並留下聯絡資訊，以利專人處理，感謝。<br>※如有新聞稿、活動邀請函等相關資料，請將資料寄至<br>【新聞部信箱cardu_news@cardu.com.tw】</p>
                                <div class="login_line">
                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*服務項目</label>
                                     <div class="col-sm-10 form-inline">
                                       <select select class="form-control" id="sqm_channel" name="sqm_channel">
                                        <option selected value="">請選擇</option>
                                        <option value="21">聯絡我們</option>
                                        <option value="22">行銷合作</option>
                                        <option value="23">廣告刊登</option>
                                   </select>
                                     </div>
                                   </div>

                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*姓名</label>
                                     <div class="col-sm-10">
                                       <input type="text" class="form-control my-2" name="sqm_ud_nickname" placeholder="姓名" >
                                     </div>
                                   </div>
                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*Email</label>
                                     <div class="col-sm-10 login_w">
                                       <input type="email" class="form-control my-2" name="sqm_mail" placeholder="Email">
                                     </div>
                                   </div>
                                 <div class="row">
                                     <label class="col-sm-2 col-form-label">*電話</label>
                                     <div class="col-sm-10 login_w">
                                       <input type="text" class="form-control my-2" name="sqm_phone" placeholder="請輸入數字，如：0900123456">
                                     </div>
                                   </div>
                                 <div class="row">
                                    <label class="col-sm-2 col-form-label">*主旨</label>
                                    <div class="col-sm-10 login_w">
                                      <input type="text" class="form-control my-2" name="sqm_title">
                                    </div>
                                  </div>

                                  <div class="row">
                                     <label class="col-sm-2 col-form-label">*內容</label>
                                     <div class="col-sm-10 py-md-2">
                                       <textarea id="ckeditor" class="form-control" name="sqm_ptext" rows="5" ></textarea>
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
                            
                            <div class="note_div mt-4 mx-2 p-3 border">
                              <h5>◎注意事項：</h5>
                              <ol>
                                <li>
                                  您所提供的資訊，卡優新聞網保留修改、刪除之權限，並且允許複製、發行、可向大眾發表或衍生新的創作作品，且無需事先通知。
                                </li>
                                <li>
                                  您所提供的圖檔，請確認版權所有者為本人所有，並且同意無償提供給卡優新聞網永久使用。若您違反著作權、智慧財產權或其他法律規定者，將由您自己負完全的法律責任，本站不負擔任何相關責任。
                                </li>
                              </ol>
                            </div>
                           
                          </div>
                          <div class="tab-pane fade" id="goodPerson" role="tabpanel" aria-labelledby="goodPerson-tab">

                            <form class="px-md-2">
                               <p>若您尚未收到卡優新聞網寄發的註冊確認信，請填寫下列資料，系統將重新寄送註冊確認信到您的電子信箱。</p>
                               
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
            require 'right_area_div.php';
            ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
         //-- 共用js --
         require '../share_area/share_js.php';
    ?>

  <!-- ckeditor -->
  <script src="../vendor/ckeditor5/ckeditor.js"></script>
  <!-- GOOGLE recaptcha 驗證程式 -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {

             // ClassicEditor
             //     .create( document.querySelector( '#ckeditor' ), {
             //      toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
             //     })
             //     .catch( error => {
             //         console.error( error );
             //     } );



      
      if (location.search=='') {
        $('#goodMember-tab').html('客服中心');
      }
      else if(location.search=='?cu'){
        $('#goodMember-tab').html('聯絡我們');
        $('.now_crumbs').html('聯絡我們');
        $('#sqm_channel [value="21"]').prop('selected', true);
      }
      else if(location.search=='?mc'){
        $('#goodMember-tab').html('行銷合作');
        $('.now_crumbs').html('行銷合作');
        $('#sqm_channel [value="22"]').prop('selected', true);
      }
      else if(location.search=='?ad'){
        $('#goodMember-tab').html('廣告刊登');
        $('.now_crumbs').html('廣告刊登');
        $('#sqm_channel [value="23"]').prop('selected', true);
      }


      $('#sqm_channel').change(function(event) {
        if ($(this).val()=='21') {
          $('#goodMember-tab').html('聯絡我們');
          $('.now_crumbs').html('聯絡我們');
        }
        else if ($(this).val()=='22') {
          $('#goodMember-tab').html('行銷合作');
          $('.now_crumbs').html('行銷合作');
        }
        else if ($(this).val()=='23') {
          $('#goodMember-tab').html('廣告刊登');
          $('.now_crumbs').html('廣告刊登');
        }
      });


      $('#submit_btn').click(function(event) {
         
         var err_txt='';
          err_txt = err_txt + check_input( '[name="sqm_channel"]', '服務項目\n' );
          err_txt = err_txt + check_input( '[name="sqm_ud_nickname"]', '姓名\n' );
          err_txt = err_txt + check_input( '[name="sqm_mail"]', 'E-mail\n' );
          err_txt = err_txt + check_input( '[name="sqm_phone"]', '電話\n' );
          err_txt = err_txt + check_input( '[name="sqm_title"]', '主旨\n' );
          err_txt = err_txt + check_input( '[name="sqm_ptext"]', '內容\n' );


          if (err_txt!='') {
             alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
          }
          else if(check_email('[name="sqm_mail"]')){
             alert('Email格式錯誤');
          }
          else if(check_phone('[name="sqm_phone"]')){
             alert('手機：請輸入數字，如：0900123456');
          }
          else{

            $('#service_form').submit();
          }
      });
    });
  </script>
  </body>
</html>