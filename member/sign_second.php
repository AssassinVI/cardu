<?php 
 require '../share_area/conn.php';

 if ($_POST) {
   
   //-- GOOGLE recaptcha 驗證程式 --
  GOOGLE_recaptcha('6Le2HRIUAAAAAJJbt4e5F6g6yuW-FmSAYg--3R43', $_POST['g-recaptcha-response'], 'back');
  
  $ud_epaper=empty($_POST['ud_epaper']) ? '':$_POST['ud_epaper'];
  $ud_activekey=randTXT(32);

  $param=[
   'ud_userid'=>$_POST['ud_userid'],
   'ud_password'=>md5($_POST['ud_password']),
   'ud_nickname'=>$_POST['ud_nickname'],
   'ud_realname'=>$_POST['ud_realname'],
   'ud_email'=>$_POST['ud_email'],
   'ud_gender'=>$_POST['ud_gender'],
   'ud_mobile'=>$_POST['ud_mobile'],
   'ud_birth'=>$_POST['ud_birth'],
   'ud_zipcode'=>$_POST['zipcode'],
   'ud_addr'=>$_POST['ud_addr'],
   'ud_epaper'=>$ud_epaper,
   'ud_activekey'=>$ud_activekey,
   'ud_regip'=>user_ip(),
   'ud_regtime'=>date('Y-m-d'),
   'ud_crdate'=>date('Y-m-d'),

   'ud_fb_id'=> aes_decrypt($aes_key, $_POST['FB_id']),
   'ud_fb_email'=>$_POST['FB_email'],
   'ud_google_id'=>aes_decrypt($aes_key, $_POST['google_id']),
   'ud_google_email'=>$_POST['google_email'],
   'ud_photo'=>$_POST['google_img']

  ];
  $pdo->insert('user_data', $param);


  $body_data='
   <table border="0" width="600">
     <tbody><tr>
       <td width="100%">
    <img src="http://www.cardu.com.tw/images/mail_head.gif" class="CToWUd">
       </td>
     </tr>
     <tr>
       <td width="100%" bgcolor="#E0E0E0"><br>
    感謝您加入《卡優新聞網》的會員<br>
    為確認您的資料正確性，請點擊下列網址進入確認畫面，即可成為《卡優網》會員<br>
    <a href="'.$URL.'/member/member_confirm.php?k='.$ud_activekey.'" target="_blank" >'.$URL.'/member/member_confirm.php?k='.$ud_activekey.'</a><p>
    (本確認信為系統自動寄發，請勿直接回覆本信函，<wbr>若您有相關問題，可進入 <a href="'.$URL.'" target="_blank">'.$URL.'</a> 查詢，<br>
    或E-mail至客服信箱: <a href="mailto:service@cardu.com.tw" target="_blank">service@cardu.com.tw</a>，《卡優新聞網》<wbr>將盡快為您服務)<br>
       </p></td>
     </tr>
   </tbody></table>
  ';
  send_Mail('卡優新聞網', 'paper@cardu.com.tw', $_POST['ud_nickname'].'的會員確認信', $body_data, [$_POST['ud_nickname']], [$_POST['ud_email']]);


  
  location_up('/index.php', '感謝您的加入，已寄送確認信到您的信箱中');
 }
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="https://www.cardu.com.tw" />
    
      
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
        <div class="row">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心
            </a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">

                <div class="row">
                   <!--我的信用卡-->
                    <div class="col-md-12 col">

                        <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab"  href="javascript:;" tab-target="#title_5" aria-selected="true">加入卡優會員</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">

                             <div class="sign_info">
                             <h5>使用社群帳號註冊</h5>

                             
                             <div class="user_login hv-center">
                                <button id="FB_login" type="button" class="btn blue_tab_btn btnOver mx-md-2">Facebook</button>
                                <button id="G_login" type="button" class="btn red_tab_btn btnOver">Google</button>
                             </div>

                             <div class="social_login text-center my-2">
                              
                             </div>


                             
                             
                             <h5>使用Email帳號註冊</h5>
                             
                             <form id="member_form" class="px-md-2 login_info" action="sign_second.php" method="POST">
                               <div class="login_line">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*會員帳號</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" name="ud_userid" placeholder="＊會員帳號">
                                     <i data-toggle="tooltip" data-placement="right" data-original-title="請輸入6至12字元英、數字，第1個字元需為英文字母" class="fa fa-question-circle-o"></i>
                                     <!-- 判斷是否重複文字 -->
                                     <span class="text-danger" check=""></span>
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*暱稱</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" name="ud_nickname" placeholder="＊暱稱">
                                     <i data-toggle="tooltip" data-placement="right" data-original-title="您於《卡優新聞網》之稱號，可使用中文名稱，但不可與他人重複，註冊後即不得要求修改，字數限2～16字元。" class="fa fa-question-circle-o"></i>
                                     <!-- 判斷是否重複文字 -->
                                     <span class="text-danger" check=""></span>
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*密碼</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="password" class="form-control" name="ud_password"  placeholder="*密碼(4碼以上，僅可使用英文/數字)" >
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*請再次輸入</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="password" class="form-control" name="ud_password_ch" placeholder="*請再次輸入密碼">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*真實姓名</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="text" class="form-control" name="ud_realname" placeholder="*真實姓名">
                                   </div>
                                 </div>
                               <div class="row">
                                  <label class="col-sm-2 col-form-label">*性別</label>
                                  <div class="col-sm-10 form-inline">
                                     <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ud_gender" id="inlineRadio1" value="M">
                                    <label class="form-check-label" for="inlineRadio1">男性</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ud_gender" id="inlineRadio2" value="F">
                                    <label class="form-check-label" for="inlineRadio2">女性</label>
                                  </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*生日</label>
                                   <div class="col-sm-10 date_w form-inline">
                                     <input class="form-control datepicker" type="text" name="ud_birth" placeholder="請輸入您的生日">
                                   </div>
                                 </div> 
                                
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*Email</label>
                                   <div class="col-sm-10  login_w py-2">
                                     <input type="email" class="form-control" id="inputEmail3" name="ud_email" placeholder="建議輸入常用的Gmail信箱">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">*手機</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="text" class="form-control" name="ud_mobile" placeholder="請輸入數字，如：0900123456">
                                   </div>
                                 </div>
                                <div class="row">
                                   <label label for="inputAddress" class="col-sm-2 col-form-label">地址</label>
                                     <div class="col-sm-10 date_w ">
                                      <div class="row no-gutters">
                                        <div class="col-md-12 form-inline">
                                          <div id="twzipcode" class="py-2"></div>
                                        </div>
                                        <div class="col-md-12 pb-2 login_w">
                                         <input type="text" class="form-control" name="ud_addr" placeholder="">
                                        </div>
                                      </div>
                                     </div>

                                 </div>
                                <div class="row">
                                   <label class="col-sm-2 col-form-label">*驗證</label>
                                   <div class="col-sm-10 form-inline">
                                     <!-- google 驗證碼 -->
                                     <div id="G-recaptcha"></div>
                                   </div>
                                 </div>

                                  <div class="row px-3 py-2">
                                   <div class="form-check">
                                     <input class="form-check-input" type="checkbox" id="Check_Terms">
                                     <label class="form-check-label" for="gridCheck">
                                        我已詳閱<a data-fancybox data-src="#terms" data-modal="true" href="javascript:;">卡優新聞網會員服務條款</a>
                                     </label>
                                   </div>
                                 </div>
                                 <div class="row px-3 py-2">
                                   <div class="form-check">
                                     <label class="form-check-label" >
                                       <input class="form-check-input" type="checkbox" name="ud_epaper" value="Y" checked>  我同意訂閱卡優電子報
                                     </label>
                                   </div>
                                 </div>
                                   <div class="col-md-12 col  member_btn hv-center">
                                     <button id="submit_btn" class="gray-layered btnOver" type="button">確認送出</button>
                                  </div>
                                  <label class="form-check-label hv-center py-2" >
                                     若已加入會員<a href="javascript:;" data-fancybox="" data-src="#member_div">請按此登入</a>
                                  </label>
                                </div>

                                <input type="hidden" name="FB_id" value="">
                                <input type="hidden" name="FB_email" value="">
                                <input type="hidden" name="FB_name" value="">
                                <input type="hidden" name="google_id" value="">
                                <input type="hidden" name="google_email" value="">
                                <input type="hidden" name="google_name" value="">
                                <input type="hidden" name="google_img" value="">
                              
                            </form>

                           </div>
                          </div>
              
          
                  
                        </div>
                      </div>
                    </div>
                    <!--我的信用卡-->
                    
                  
                  <!-- 卡優新聞網會員服務條款 -->
                  <div id="terms" style="display: none;">
                  <!-- 關閉視窗 -->
                  <button class="btn btn-danger btn-sm close_fancybox">Ｘ</button>

                  <div >
                    卡優網會員服務條款：<br><br>

                    一、認知與接受條款<br>
                    歡迎您加入卡優網會員(Cardu.com.tw)，卡優網會員服務(以下簡稱本服務)，係由威辰資通股份有限公司(以下簡稱本公司)所提供之各項會員服務。為保障您的權益，請詳細閱讀本服務條款所有內容，當您點選「我同意」鍵，並註冊完成或開始使用本服務時，即視為您已經詳細閱讀、了解本服務條款，並同意遵守以下服務條款之約定。本公司有權於任何時間修改或變更本服務條款之內容，建議您隨時注意該等修改或變更。您於任何修改或變更後繼續使用本服務，皆視為您同意接受本服務條款修改或變更。如果您不同意本服務條款的內容，或者您所屬的國家或地域排除本服務條款內容之全部或一部時，您應立即停止使用本服務。<br><br>

                    二、真實登錄義務：<br>
                    基於本公司所提供之各項服務，您同意於註冊時依註冊申請程序所提示之項目，登錄您本人正確、真實及完整之個人資料。當您的個人資料有異動時，請立即更新，以維持您個人資料之正確、真實及完整性。若因您登錄不實資料或冒用他人名義，以致於侵害他人之權利或違法時，應自負法律責任；若您提供任何錯誤或不實的資料，本公司有權暫停或終止您的帳號，並拒絕您使用本服務之全部或一部。<br><br>

                    三、隱私權政策<br>
                    1.本公司將會保護每一位會員的隱私，包括申請帳號、個人資料等的資料，除了可能涉及違法、侵權、或違反使用條款、或經本人同意以外，本服務不會將個人資料交予非本公司關係企業之第三人。<br>
                    2.在下列的情況下，本公司有可能會查看或提供你的個人或相關電信資料給有權機關、或主張其權利受侵害並提出適當證明之第三人：<br>
                    (1) 依法令規定、或依司法機關或其他有權機關的命令；<br>
                    (2) 為執行本使用條款、或使用者違反使用條款；<br>
                    (3) 為保護會員服務系統之安全或經營者之合法權益；<br>
                    (4) 為保護其他使用者或其他第三人的合法權益；<br>
                    (5) 為維護會員服務系統的正常運作。 <br><br>

                    四、會員帳號、密碼及安全<br>
                    當您完成本服務的登記程序之後，請自行熟記密碼及帳號，並維護其機密安全。若非因本公司及其員工之因素而發生之妨害機密安全情事，您應自負其責，與本公司無涉。您並同意您的密碼或帳號遭到盜用或有其他任何安全問題發生時，您將立即通知本公司；且於每次連線完畢，均確實登出，結束您的帳號使用。<br><br>

                    五、使用者守法義務及承諾<br>
                    1.不得藉由本服務進行任何非本公司之商業行為。<br>
                    2.您除了須遵守本服務條款之約定外，並同意遵守本公司之各項服務營業規章、相關法令規範、網際網路國際使用慣例與禮節之相關規定，且不從事以下行為<br>
                    (1)意圖破壞、入侵本公司伺服器及網站；或使用外掛程式、利用程式漏洞侵入或修改會員資料庫；散播電腦病毒程式及竊取、更改、破壞本公司網站或他人資訊情事等之行為者。<br>
                    (2)利用或假借本公司網站刊載、傳輸、或發送任何誹謗、詐欺、傷害、猥褻、色情、賭博等之一切違反法令或任何侵害他人智慧財產權或其他權益的資料之郵件、檔案或資料。<br>
                    (3)未經同意收集他人電子郵件位址以及其他個人資料。<br>
                    (4)未經同意擅自摘錄或使用會員服務內任何資料庫內容之全部或一部。<br>
                    (5)破壞或干擾會員服務的系統運作或違反一般網路禮節之行為。<br>
                    (6)在未經授權下進入會員服務系統或是與系統有關之網路、或冒用他人帳號。<br>
                    (7)任何妨礙或干擾其他使用者使用會員服務之行為。<br>
                    (8)任何透過不正當管道竊取會員服務之會員帳號、密碼或存取權限之行為。<br>
                    (9)其他不符合會員服務所提供的使用目的之行為。<br><br>

                    六、產品購買：<br>
                    1.於本公司網站購買產品，皆須具備本服務之會員資格。<br>
                    2.本公司有權取消您的訂單。<br>
                    3.本網站所公佈之售價，若發生顯與市價或現實不符之錯誤時，得隨時修正售價，並告知訂購者修改訂單。使用者有權取消或修正該筆訂單。然使用者不得請求任何補償或賠償。<br>
                    4.本服務有權隨時修改促銷活動內容、售價及贈品，請使用者隨時留意本網站之內容。<br>
                    5.您若因未確實填寫產品付款、運送等之各項資料，所造成之任何損害，您須全然承受，不得以任何理由要求賠償。<br>
                    6.本服務不負擔您對產品用途、銷售性、商業利益與適用性等問題之任何責任。<br><br>

                    七、免責聲明<br>
                    您明確了解並同意本服務不提供任何明示或默示的擔保。您不得因此要求補償或賠償。<br>
                    本服務不保證以下事項：<br>
                    1.本服務將完全符合您的需求<br>
                    2.本服務所銷售之產品完全符合您的需求或您的期望<br>
                    3.本服務不受干擾、及時提供、安全可靠或免於出錯<br>
                    4.由本服務之使用而取得之結果為正確或可靠<br>
                    5.本服務因軟硬體設備進行搬遷、更換、升級、保養或維修；天災或其他不可抗力之因素或其他不可歸責於本公司之事由所致之服務停止或中斷之情事。所造成您使用上的不便或任何直接或間接之損害。<br><br>

                    八、會員行為 <br>
                    凡由會員公開張貼或私下傳送的資訊、資料、文字、軟體、音樂、音訊、照片、圖形、視訊、信息或其他資料均由提供者自負責任。本公司無法控制及不保証其正確性、完整性或品質，並不為其負責。<br><br>

                    九、智慧財產權：<br>
                    本網站上之所有著作及資料，其著作權、專利權、商標、營業秘密、其他智慧財產權、所有權或其他權利，均為本公司或分屬其權利人所有，未經威辰資通合法授權外，使用者不得擅自重製、傳輸、改作、編輯或以其他任何形式或基於任何目的使用，違者應自負相關之法律責任。<br><br>

                    十、終止服務<br>
                    1.基於本公司的運作，會員服務有可能停止提供服務之全部或一部，並不另個別通知使用者，使用者不可以此而要求任何賠償或補償。<br>
                    2.若您違反本服務條款，本公司有權隨時暫時停止提供服務、或終止提供服務之權利，您不得以此而要求任何賠償或補償。<br><br>

                    十一、服務條款之增訂及修改：<br>
                    本服務保留將來新增、修改或刪除本服務之全部或一部之權利，且不另行個別通知使用者，使用者不得以此要求任何補償或賠償。<br><br>

                    十二、準據法與管轄法院 <br>
                    本服務條款之解釋與適用，以及有關之爭議，均應依照中華民國法律予以處理，並以台北市士林地方法院為第一審管轄法院。
                  </div>
                  </div>



                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php require 'right_area_div.php'; ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
     //-- 共用jS --
     require '../share_area/share_js.php';
    ?>



    <!-- GOOGLE recaptcha 驗證程式 -->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
    


    <script type="text/javascript">
      
      // GOOGLE recaptcha 驗證
      var onloadCallback = function() {
        grecaptcha.render('G-recaptcha', {
          'sitekey' : '6Le2HRIUAAAAAJuw4gBeXfGm_RBmQ1ONISumalC0',
        });
      };


      





        //=================== 驗證暱稱是否重複 ========================
        function check_ud_nickname(ud_nickname) {
          
          $.ajax({
            url: '../ajax/member_ajax.php',
            type: 'POST',
            data: {
              type: 'check_ud_nickname',
              ud_nickname: ud_nickname
            },
            success:function (data) {
              if (data=='1') {
                $('[name="ud_nickname"]').next().next().html('此暱稱與他人重複');
                $('[name="ud_nickname"]').next().next().attr('class', '');
                $('[name="ud_nickname"]').next().next().attr('check', 'N');
                $('[name="ud_nickname"]').next().next().addClass('text-danger');
              }
              else{
                $('[name="ud_nickname"]').next().next().html('此暱稱可以使用');
                $('[name="ud_nickname"]').next().next().attr('class', '');
                $('[name="ud_nickname"]').next().next().attr('check', 'Y');
                $('[name="ud_nickname"]').next().next().addClass('text-success');
              }
            }
          });
        }
      



      $(document).ready(function() {


        //-- FB註冊  ---
        $('#FB_login').click(function(event) {

          if ($('[name="FB_id"]').val()=='') {

            FB.login(function(response) {
              if (response.status === 'connected') {

                  FB.api('/me?fields=id,name,email', function(response) {
                        // console.log(response.name);
                        // console.log(response.id);
                        // console.log(response.email);

                        $.ajax({
                          url: '../ajax/member_ajax.php',
                          type: 'POST',
                          data: {
                           type:'F_G_aes_encrypt',
                           id : response.id
                         },
                         success:function (data) {
                           $('[name="FB_id"]').val(data);
                         }
                        });

                        $('[name="FB_email"]').val(response.email);
                        $('[name="FB_name"]').val(response.name);
                        
                        $('[name="ud_email"]').val(response.email);
                        $('[name="ud_nickname"]').val(response.name);
                        check_ud_nickname($('[name="ud_nickname"]').val());

                        $('.social_login').append('<p>已關聯FB帳號：'+response.email+'</p>');
                        $('#FB_login').css('display', 'none');
                        
                      });

               } else {
                 // The person is not logged into this app or we are unable to tell. 
               }
            }, {scope: 'public_profile,email'});

          }
          else{
            alert('您已關聯FB帳號');
          }
          
        });




        // GOOGLE 註冊 (在community_login.js做串接)
        


        
        //-- 檢驗會員帳號是否重複 --
        $('[name="ud_userid"]').change(function(event) {

          var _this=$(this);
          
          $.ajax({
            url: '../ajax/member_ajax.php',
            type: 'POST',
            data: {
              type: 'check_userid',
              ud_userid: $(this).val()
            },
            success:function (data) {

              if (data=='1') {
                _this.next().next().html('此帳號與他人重複');
                _this.next().next().attr('class', '');
                _this.next().next().attr('check', 'N');
                _this.next().next().addClass('text-danger');
              }
              else{
                _this.next().next().html('此帳號可以使用');
                _this.next().next().attr('class', '');
                _this.next().next().attr('check', 'Y');
                _this.next().next().addClass('text-success');
              }
            }
          });
          
        });

        //-- 檢驗暱稱是否重複 --
        $('[name="ud_nickname"]').change(function(event) {
          
          check_ud_nickname($(this).val());
        });



        //-- 帳號註冊 --
        $('#submit_btn').click(function(event) {

          var err_txt='';
          err_txt = err_txt + check_input( '[name="ud_userid"]', '會員帳號\n' );
          err_txt = err_txt + check_input( '[name="ud_nickname"]', '暱稱\n' );
          err_txt = err_txt + check_input( '[name="ud_password"]', '會員密碼\n' );
          err_txt = err_txt + check_input( '[name="ud_password_ch"]', '請再次輸入密碼\n' );
          err_txt = err_txt + check_input( '[name="ud_realname"]', '真實姓名\n' );
          err_txt = err_txt + check_input( '[name="ud_gender"]', '性別\n' );
          err_txt = err_txt + check_input( '[name="ud_birth"]', '生日\n' );
          err_txt = err_txt + check_input( '[name="ud_email"]', 'Email\n' );
          err_txt = err_txt + check_input( '[name="ud_mobile"]', '手機' );


          if (err_txt!='') {
             alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
          }
          else if(check_userid('[name="ud_userid"]')){
             alert('會員帳號：請輸入6至12字元英、數字，第1個字元需為英文字母');
          }
          else if($('[name="ud_nickname"]').val().length<2 || $('[name="ud_nickname"]').val().length>16){
             alert('會員暱稱：字數限2～16字元');
             $('[name="ud_nickname"]').css('borderColor', 'red');
          }
          else if($('[name="ud_userid"]').next().next().attr('check')=='N'){
             alert('此會員帳號與他人重複，請修改');
          }
          else if($('[name="ud_nickname"]').next().next().attr('check')=='N'){
             alert('此暱稱與他人重複，請修改');
          }
          else if(check_password('[name="ud_password"]')){
             alert('會員密碼：4碼以上，僅可使用英文/數字');
          }
          else if($('[name="ud_password_ch"]').val()!=$('[name="ud_password"]').val()){
             alert('密碼不相同請重新輸入');
             $('[name="ud_password_ch"]').css('borderColor', 'red');
             $('[name="ud_password"]').css('borderColor', 'red');
          }
          else if(check_email('[name="ud_email"]')){
             alert('Email格式錯誤');
          }
          else if(check_phone('[name="ud_mobile"]')){
             alert('手機：請輸入數字，如：0900123456');
          }
          else if($('#Check_Terms').prop('checked')==false){
             alert('請勾選"我已詳閱卡優新聞網會員服務條款"');
          }
          else{
             $('#member_form').submit();
          }
          
        });


        
      });
    </script>

  </body>
</html>