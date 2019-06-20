<?php 
 require '../share_area/conn.php';

 if ($_POST) {
  
   //-- 更改密碼 --
   if ($_POST['type']=='change_password') {
     
     $row_pass=$pdo->select("SELECT COUNT(*) as total, ud_userid, ud_nickname, ud_email
                             FROM user_data 
                             WHERE ud_pk=:ud_pk AND ud_password=:ud_password", 
                             ['ud_pk'=>$_SESSION['ud_pk'], 'ud_password'=>md5($_POST['ud_password'])], 'one');

     if ($row_pass['total']>0) {
       
       $pdo->update('user_data', ['ud_password'=>md5($_POST['new_password'])], ['ud_pk'=>$_SESSION['ud_pk']]);

       $body_data='
        <table border="0" width="600">
          <tbody><tr>
            <td width="100%">
         <img src="http://www.cardu.com.tw/images/mail_head.gif" class="CToWUd">
            </td>
          </tr>
          <tr>
            <td width="100%" bgcolor="#E0E0E0">
              親愛的《卡優新聞網》的會員<br>
              您的帳號在'.date('Y-m-d H:i:s').'時<br>
              修改您進入《卡優新聞網》的密碼<br>
              <br>
              帳號:'.$row_pass['ud_userid'].'<br>
              IP:'.user_ip().'<br>
              <br>
              如果是您本人修改密碼，可不予理會該封信件<br>
              如果不是您本人修改密碼，請至《卡優新聞網》聯絡我們回應問題<br>
              <br>
              我們將盡快為您服務！<br>
              會員中心:'.$URL.'/member/member.php<br>
              <br>
              (本確認信為系統自動寄發，請勿直接回覆本信函)<br>
              卡優新聞網 客戶服務部 敬啟

            </td>
          </tr>
        </tbody></table>
       ';
       send_Mail('卡優新聞網', 'paper@cardu.com.tw', $row_pass['ud_nickname'].'的修改密碼通知信', $body_data, [$row_pass['ud_nickname']], [$row_pass['ud_email']]);
       
       location_up('member.php', '修改完畢，下次請用新密碼登入');
     }
     else{
       location_up('login_info.php', '您輸入的密碼錯誤，請重新輸入');
     }
   }
 }
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />


    <title>卡優新聞網-會員中心 > 會員資料</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 會員資料" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 會員資料" />
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">
                  <div class="col-md-12 col">
                    <div class="cardshap ">

                      <div class="pt-3 detail_title">
                       <div class="col-md-12 col">
                         <div class="row user_info">
                                <div class="col-md-4 hv-center">
                                  <ul>
                                    <li><img src="../img/component/user.png"><br>會員暱稱</li>
                                    <li><img src="../img/component/grade.png"><br>會員等級</li>
                                  </ul>
                                </div>
                                <div class="col-md-8">
                                  <div class="row no-gutters">
                                    <div class="col-md-5">
                                        <p><img src="../img/component/li.png">U幣:XX</p>
                                        <p><img src="../img/component/li.png">積分:XX</p>
                                        <p><img src="../img/component/li.png">威望值:XX</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><img src="../img/component/li.png">註冊時間：20XX/XX/XX XX:XX</p>
                                        <p><img src="../img/component/li.png">最近登錄：20XX/XX/XX XX:XX</p>
                                        <p><img src="../img/component/li.png">登錄次數：XXX</p>
                                    </div>
                                  </div>
                                </div>
                              </div> 
                            </div> 
                          </div>

                    
                          <!--特別議題-->
                    <div class="col-md-12 col pb-3 detail_content">

                        <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link active pl-30 py-2" id="title_5-tab" href="javascript:;" tab-target="#title_5" aria-selected="true">基本資料</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_6-tab" href="javascript:;" tab-target="#title_6" aria-selected="false">個人設定</a>
                          </li>
                          <li class="nav-item news_tab news_tab_three">
                            <a class="nav-link py-2" id="title_7-tab" href="javascript:;" tab-target="#title_7" aria-selected="false">變更密碼</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_5" role="tabpanel" aria-labelledby="title_5-tab">
                            
                            <form class="px-md-2 login_info">
                               <div class="login_line">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">帳號：</label>
                                   <div class="col-sm-10 form-inline">XXXXX</div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">暱稱：</label>
                                   <div class="col-sm-10 form-inline">XXXXX</div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">姓名：</label>
                                   <div class="col-sm-10 form-inline">XXX</div>
                                 </div>
                              
                               <div class="row">
                                  <label class="col-sm-2 col-form-label">性別：</label>
                                  <div class="col-sm-10 form-inline">
                                     <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">男性</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">女性</label>
                                  </div>
                                   </div>
                                  
                                
                               </div>
                                <div class="row">
                                   <label class="col-sm-2 col-form-label">生日：</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" placeholder="XXXX-XX-XX">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">Email：</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="email" class="form-control" id="inputEmail3" placeholder="ＸＸＸ＠ＸＸＸ.XXX.XX">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">手機：</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" placeholder="XXXXXXXXXX">
                                   </div>
                                 </div>
                                <div class="row">
                                   <label label for="inputAddress" class="col-sm-2 col-form-label">地址：</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="text" class="form-control" id="inputAddress" placeholder="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX">
                                   </div>
                                 </div>

                                 <div class="col-md-12 col  member_btn hv-center">
                                    <button class="gray-layered btnOver" type="submit">確認送出</button>
                                    <button class="gray-layered btnOver" type="submit">重新填寫</button>
                                 </div>

                                </div>
                                
                              
                            </form>

                          </div>
                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">
                           <form class="px-md-2 check_in">
                               <div class="login_line">
                              <div class="row">
                                    <label class="col-sm-3 col-form-label">婚姻狀態：</label>
                                     <div class="col-sm-9 form-inline">
                                       <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">已婚</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">未婚</label>
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                    <label class="col-sm-3 col-form-label">子女：</label>
                                     <div class="col-sm-9 form-inline">
                                       <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">無</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">有</label>
                                    　 <input type="text" class="form-control" placeholder="">
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">職業：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">電腦/網際網路</option>
                                        <option value="02">金融/保險/傳銷</option>
                                        <option value="03">房地產</option>
                                        <option value="04">醫療</option>
                                        <option value="05">旅遊/交通/運輸</option>
                                        <option value="06">建築/營造</option>
                                        <option value="07">製造/供應商</option>
                                        <option value="08">娛樂/出版</option>
                                        <option value="09">貿易代理</option>
                                        <option value="10">流通/百貨零售/餐飲</option>
                                        <option value="11">廣告/傳播/公共關係</option>
                                        <option value="12">軍公教/政府機關</option>
                                        <option value="13">政治/宗教/公益法律相關行業</option>
                                        <option value="14">教育/研究</option>
                                        <option value="15">藝術人文</option>
                                        <option value="16">農漁牧</option>
                                        <option value="17">學生</option>
                                        <option value="18">家管</option>
                                        <option value="19">待業中</option>
                                        <option value="20">其他</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">職位：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">企業負責人</option>
                                        <option value="02">主管</option>
                                        <option value="03">職員</option>
                                        <option value="04">學生</option>
                                        <option value="99">其他</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">每月收入：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">$0-$15,000</option>
                                        <option value="02">$15,000-$30,000</option>
                                        <option value="03">$30,000-$45,000</option>
                                        <option value="04">$45,000-$60,000</option>
                                        <option value="05">$60,000-$75,000</option>
                                        <option value="06">$75,000-$90,000</option>
                                        <option value="07">$90,000-$100,000</option>
                                        <option value="08">$100,000以上</option>
                                   </select>
                                     </div>
                                   </div>

                               <div class="row">
                                     <label class="col-sm-3 col-form-label">最高學歷：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>請選擇</option>
                                        <option value="01">國小/國中</option>
                                        <option value="02">高中(職)</option>
                                        <option value="03">大專/大學</option>
                                        <option value="04">研究所(含)以上</option>
                                   </select>
                                     </div>
                                   </div>


                                <div class="row">
                                    <label class="col-sm-3 col-form-label">興趣：</label>
                                     <div class="col-sm-9 form-inline">
                                      <ul>
                                        <li><input type="checkbox" name="" value="">科學科技</li>
                                        <li><input type="checkbox" name="" value="">電腦通訊</li>
                                        <li><input type="checkbox" name="" value="">網路活動</li>
                                        <li><input type="checkbox" name="" value="">金融投資</li>
                                        <li><input type="checkbox" name="" value="">政治活動</li>
                                        <li><input type="checkbox" name="" value="">圖書閱讀</li>
                                        <li><input type="checkbox" name="" value="">藝術表演</li>
                                        <li><input type="checkbox" name="" value="">人文歷史</li>
                                        <li><input type="checkbox" name="" value="">視聽娛樂</li>
                                        <li><input type="checkbox" name="" value="">電視廣播</li>
                                        <li><input type="checkbox" name="" value="">運動活動</li>
                                        <li><input type="checkbox" name="" value="">戶外休閒</li>
                                        <li><input type="checkbox" name="" value="">教育學習</li>
                                        <li><input type="checkbox" name="" value="">生活資訊</li>
                                        <li><input type="checkbox" name="" value="">醫療保健</li>
                                      </ul>
                                     </div>
                                   </div>
                            
                               <div class="row">
                                     <label class="col-sm-3 col-form-label">上傳個人圖檔：</label>
                                     <div class="col-sm-9 py-2">
                                      <button type="button" class="btn gray-layered btnOver"><a href="#">上傳檔案</a></button>
                                      <span>未選...案</span>
                                      <img src="../img/component/user.png">
                                      <input type="checkbox" name="" value="">刪除
                                     </div>
                                   </div>
                      
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">附加個性簽名：</label>
                                     <div class="col-sm-9 py-2">
                                       <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">是</label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                       <label class="form-check-label" for="inlineRadio2">否</label>
                                       </div>
                                       <textarea class="form-control my-2" id="exampleFormControlTextarea1" rows="5"></textarea>
                                       <button type="button" class="btn gray-layered btnOver"><a href="#">選擇檔案</a></button>
                                       <span>未選...案</span>
                                     </div>
                                   </div>
                       
                               </div>
                           </form> 
                          </div>
                          <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">
                            <form id="change_password_form" action="" method="POST">
　　　　　　　　　　　　　　　   <div class="login_line"> 
                             <div class="row">
                                   <label class="col-sm-3 col-form-label">*請輸入舊密碼：</label>
                                   <div class="col-sm-9 ">
                                     <input type="password" class="form-control my-2" id="ud_password" name="ud_password" placeholder="">
                                   </div>
                                 </div>

                             <div class="row">
                                   <label class="col-sm-3 col-form-label">*請輸入新密碼：</label>
                                   <div class="col-sm-9 ">
                                     <input type="password" class="form-control my-2" id="new_password" name="new_password" placeholder="*密碼(4碼以上，僅可使用英文/數字)">
                                   </div>
                                 </div>  
                              
                              <div class="row">
                                   <label class="col-sm-3 col-form-label">*確認新密碼：</label>
                                   <div class="col-sm-9 ">
                                     <input type="password" class="form-control my-2" id="ag_new_password" name="ag_new_password" placeholder="重新輸入新密碼">
                                   </div>
                                 </div>


                              <div class="col-md-12 col  member_btn hv-center">
                                 <button id="submit_btn3" class="gray-layered btnOver" type="button">確認送出</button>
                              </div>

                             </div>
                             <input type="hidden" name="type" value="change_password">
                           </form>
                          </div>
                    
                        </div>
                      </div>
                    </div>
                    <!--特別議題end -->
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

    <script type="text/javascript">
      $(document).ready(function() {
        
        $('#submit_btn3').click(function(event) {
           
           var err_txt='';
           err_txt = err_txt + check_input( '#ud_password', '舊密碼\n' );
           err_txt = err_txt + check_input( '#new_password', '新密碼\n' );
           err_txt = err_txt + check_input( '#ag_new_password', '確認新密碼\n' );

           if (err_txt!='') {
              alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
           }
           else if(check_password('#new_password')){
             alert('會員密碼：4碼以上，僅可使用英文/數字');
           }
           else if ($('#new_password').val()!=$('#ag_new_password').val()) {
             alert('您的新密碼與確認新密碼不同');
           }
           else{
             $('#change_password_form').submit();
           }


        });
      });
    </script>

  </body>
</html>