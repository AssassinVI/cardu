<?php 
 require '../share_area/conn.php';

 //-- 判斷登入會員 --
 check_member();


  $row_mem=$pdo->select("SELECT ud_nickname, ud_photo, ud_regtime, ud_logintime, ud_logincnt, ud_userid, 
                                ud_realname, ud_email, ud_gender, ud_birth, ud_mobile, ud_zipcode, ud_addr,
                                ud_marriage, ud_children, ud_job, ud_title, ud_incomm, ud_edu, ud_interest, ud_sign, ud_sign_txt, ud_sign_photo, ud_children_num
                         FROM user_data 
                         WHERE ud_pk=:ud_pk", 
                         ['ud_pk'=>$_SESSION['ud_pk']], 'one');

 if (!empty($row_mem['ud_photo'])) {
   $ud_photo= strpos($row_mem['ud_photo'], 'http') ===FALSE ?  '../sys/img/'.$row_mem['ud_photo'] : $row_mem['ud_photo'];
 }
 else{
   $ud_photo='../img/component/user.png';
 }
 
 //-- 性別 --
 $ud_gender_M=$row_mem['ud_gender']=='M' ? 'checked':'';
 $ud_gender_F=$row_mem['ud_gender']=='F' ? 'checked':'';

 //-- 婚姻 --
 $ud_marriage_Y=$row_mem['ud_marriage']=='Y' ? 'checked':'';
 $ud_marriage_N=$row_mem['ud_marriage']=='N' ? 'checked':'';

 //-- 子女 --
 $ud_children_0=$row_mem['ud_children']=='0' ? 'checked':'';
 $ud_children_1=$row_mem['ud_children']=='1' ? 'checked':'';

 //-- 是否附加個性簽名 --
 $ud_sign_0=$row_mem['ud_sign']=='0' ? 'checked':'';
 $ud_sign_1=$row_mem['ud_sign']=='1' ? 'checked':'';



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
   //-- 更改密碼 END --
   



   //-- 修改基本資料 --
   elseif ($_POST['type']=='base_ud') {
     
     $param=[
       'ud_gender'=>$_POST['ud_gender'],
       'ud_birth'=>$_POST['ud_birth'],
       'ud_email'=>$_POST['ud_email'],
       'ud_mobile'=>$_POST['ud_mobile'],
       'ud_zipcode'=>$_POST['ud_zipcode'],
       'ud_addr'=>$_POST['ud_addr']
     ];
     $where=['ud_pk'=>$_SESSION['ud_pk']];
     $pdo->update('user_data', $param, $where );

     location_up('login_info.php', '已更新您的基本資料');
   }
   //-- 修改基本資料 END --
  


   //-- 修改個人設定 --
   elseif ($_POST['type']=='detail_ud') {

     $ud_marriage=empty($_POST['ud_marriage']) ? '' : $_POST['ud_marriage'];
     $ud_children=empty($_POST['ud_children']) ? '' : $_POST['ud_children'];
     $ud_job=empty($_POST['ud_job']) ? '' : $_POST['ud_job'];
     $ud_title=empty($_POST['ud_title']) ? '' : $_POST['ud_title'];
     $ud_incomm=empty($_POST['ud_incomm']) ? '' : $_POST['ud_incomm'];
     $ud_edu=empty($_POST['ud_edu']) ? '' : $_POST['ud_edu'];
     $ud_interest=empty($_POST['ud_interest']) ? '' : implode(',', $_POST['ud_interest']) ;
     $ud_sign=empty($_POST['ud_sign']) ? '' : $_POST['ud_sign'];
     
     //-- 個人圖檔 --
     if (!empty($_FILES['ud_photo']['name'])) {
       
       $type=explode('.', $_FILES['ud_photo']['name']);
       $ud_photo=$_SESSION['ud_pk'].'_ud_photo.'.$type[count($type)-1];
       fire_upload_pc('ud_photo', $ud_photo);
       $_SESSION['ud_photo']=$ud_photo;
       $pdo->update('user_data', ['ud_photo'=>$ud_photo], ['ud_pk'=>$_SESSION['ud_pk']] );
     }
     
     //-- 刪除個人圖檔 --
     if (isset($_POST['ud_photo_del'])) {

       if (strpos($_POST['ud_photo_del'], 'http') <0) {
         unlink( '../sys/img'.$_POST['ud_photo_del'] );
       }
       $pdo->update('user_data', ['ud_photo'=>''], ['ud_pk'=>$_SESSION['ud_pk']] );
     }

     //-- 刪除附加個性簽名 --
     if (isset($_POST['ud_sign_photo_del'])) {

       if (strpos($_POST['ud_sign_photo_del'], 'http') <0) {
         unlink( '../sys/img'.$_POST['ud_sign_photo_del'] );
       }
       $pdo->update('user_data', ['ud_sign_photo'=>''], ['ud_pk'=>$_SESSION['ud_pk']] );
     }


     //-- 個性簽名圖檔 --
     if (!empty($_FILES['ud_sign_photo']['name'])) {
       
       $type=explode('.', $_FILES['ud_sign_photo']['name']);
       $ud_sign_photo=$_SESSION['ud_pk'].'_ud_sign_photo.'.$type[count($type)-1];
       fire_upload_pc('ud_sign_photo', $ud_sign_photo);
       $pdo->update('user_data', ['ud_sign_photo'=>$ud_sign_photo], ['ud_pk'=>$_SESSION['ud_pk']] );
     }


     
     $param=[
       'ud_marriage'=>$ud_marriage,
       'ud_children'=>$ud_children,
       'ud_children_num'=>$_POST['ud_children_num'],
       'ud_job'=>$ud_job,
       'ud_title'=>$ud_title,
       'ud_incomm'=>$ud_incomm,
       'ud_edu'=>$ud_edu,
       'ud_interest'=>$ud_interest,
       'ud_sign'=>$ud_sign,
       'ud_sign_txt'=>$_POST['ud_sign_txt']
     ];
     $where=['ud_pk'=>$_SESSION['ud_pk']];
     $pdo->update('user_data', $param, $where );

     location_up('login_info.php', '已更新您的個人設定');
   }
   //-- 修改個人設定 END --

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
                                    <li class="text-center"><img style="height: 65px;" src="<?php echo $ud_photo; ?>"><br><?php echo $row_mem['ud_nickname']; ?></li>
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
                                        <p><img src="../img/component/li.png">註冊時間：<?php echo $row_mem['ud_regtime']; ?></p>
                                        <p><img src="../img/component/li.png">最近登錄：<?php echo $row_mem['ud_logintime']; ?></p>
                                        <p><img src="../img/component/li.png">登錄次數：<?php echo $row_mem['ud_logincnt']; ?></p>
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
                            
                            <form id="base_form" class="px-md-2 login_info" action="" method="POST">
                               <div class="login_line">
                              
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">帳號：</label>
                                   <div class="col-sm-10 form-inline"><?php echo $row_mem['ud_userid']; ?></div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">暱稱：</label>
                                   <div class="col-sm-10 form-inline"><?php echo $row_mem['ud_nickname']; ?></div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">姓名：</label>
                                   <div class="col-sm-10 form-inline"><?php echo $row_mem['ud_realname']; ?></div>
                                 </div>
                              
                               <div class="row">
                                  <label class="col-sm-2 col-form-label">性別：</label>
                                  <div class="col-sm-10 form-inline">
                                    <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="ud_gender"  value="M" <?php echo $ud_gender_M; ?>>男性
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <label class="form-check-label" >
                                      <input class="form-check-input" type="radio" name="ud_gender"  value="F" <?php echo $ud_gender_F; ?>>女性
                                    </label>
                                  </div>
                                   </div>
                                  
                                
                               </div>
                                <div class="row">
                                   <label class="col-sm-2 col-form-label">生日：</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control datepicker w-100" name="ud_birth" value="<?php echo $row_mem['ud_birth']; ?>"
                                            data-toggle="tooltip" data-placement="right" title="請填入正確出生年月日 ，此將作為會員資料修改及活動之用。">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">Email：</label>
                                   <div class="col-sm-10 form-inline login_w">
                                     <input type="email" class="form-control w-100" id="inputEmail3" name="ud_email" value="<?php echo $row_mem['ud_email']; ?>"
                                            data-toggle="tooltip" data-placement="right" title="請務必填寫正確且可使用的email ，建議使用Gmail帳號，不漏接卡優會員好康訊息喔！">
                                   </div>
                                 </div>
                               <div class="row">
                                   <label class="col-sm-2 col-form-label">手機：</label>
                                   <div class="col-sm-10 form-inline">
                                     <input type="text" class="form-control" name="ud_mobile" value="<?php echo $row_mem['ud_mobile']; ?>"
                                            data-toggle="tooltip" data-placement="right" title="請填寫正確行動電話，以便以簡訊通知您各項即時訊息及帳單資訊。">
                                   </div>
                                 </div>
                                <div class="row">
                                   <label label for="inputAddress" class="col-sm-2 col-form-label">地址：</label>
                                   <div class="col-sm-10 form-inline login_w" data-toggle="tooltip" data-placement="right" title="請填寫正確聯絡地址，以便寄送活動贈品或購買商品。">
                                     <div id="twzipcode" class="py-2">
                                       <div data-role="county" class="d-inline"></div>
                                       <div data-role="district" class="d-inline"></div>
                                       <div data-role="zipcode" data-name="ud_zipcode" data-value="<?php echo $row_mem['ud_zipcode']; ?>" class="d-inline"></div>
                                     </div>
                                     <input type="text" class="form-control mb-2 w-100" id="inputAddress" name="ud_addr" value="<?php echo $row_mem['ud_addr']; ?>">
                                   </div>
                                 </div>

                                 <div class="col-md-12 col  member_btn hv-center">
                                    <button id="submit_base" class="gray-layered btnOver" type="button">確認送出</button>
                                    <button id="submit_base_re" class="gray-layered btnOver" type="button">重新填寫</button>
                                 </div>

                                </div>
                                
                                <input type="hidden" name="type" value="base_ud">
                            </form>
                          </div>

                          <div class="tab-pane fade" id="title_6" role="tabpanel" aria-labelledby="title_6-tab">

                           <form id="detail_form" class="px-md-2 check_in" action="" method="POST" enctype="multipart/form-data">
                               <div class="login_line">
                              <div class="row">
                                    <label class="col-sm-3 col-form-label">婚姻狀態：</label>
                                     <div class="col-sm-9 form-inline">
                                       <div class="form-check form-check-inline">
                                        
                                        <label class="form-check-label" >
                                          <input class="form-check-input" type="radio" name="ud_marriage" <?php echo $ud_marriage_Y; ?> value="Y">已婚
                                        </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       
                                       <label class="form-check-label" >
                                        <input class="form-check-input" type="radio" name="ud_marriage" <?php echo $ud_marriage_N; ?> value="N">未婚
                                      </label>
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                    <label class="col-sm-3 col-form-label">子女：</label>
                                     <div class="col-sm-9 form-inline">
                                       <div class="form-check form-check-inline">
                                        <label class="form-check-label" >
                                          <input class="form-check-input" type="radio" name="ud_children" <?php echo $ud_children_0; ?> value="0">無
                                        </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       <label class="form-check-label" >
                                        <input class="form-check-input" type="radio" name="ud_children" <?php echo $ud_children_1; ?> value="1">有
                                       </label>
                                    　 <input type="text" class="form-control" name="ud_children_num" <?php echo $row_mem['ud_children_num']; ?> placeholder="幾個小孩" >
                                       </div>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">職業：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" name="ud_job">
                                        <option value="">請選擇</option>
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
                                        <option value="99">其他</option>
                                   </select>
                                     </div>
                                   </div>

                              <div class="row">
                                     <label class="col-sm-3 col-form-label">職位：</label>
                                     <div class="col-sm-9 form-inline">
                                       <select select class="form-control" name="ud_title">
                                        <option value="">請選擇</option>
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
                                       <select select class="form-control" name="ud_incomm">
                                        <option value="">請選擇</option>
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
                                       <select select class="form-control" name="ud_edu">
                                        <option value="">請選擇</option>
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
                                        <li><label><input type="checkbox" name="ud_interest[]" value="01">科學科技</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="02">電腦通訊</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="03">網路活動</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="04">金融投資</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="05">政治活動</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="06">圖書閱讀</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="07">藝術表演</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="08">人文歷史</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="09">視聽娛樂</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="10">電視廣播</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="11">運動活動</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="12">戶外休閒</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="13">教育學習</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="14">生活資訊</label></li>
                                        <li><label><input type="checkbox" name="ud_interest[]" value="15">醫療保健</label></li>
                                      </ul>
                                     </div>
                                   </div>
                            
                               <div class="row">
                                     <label class="col-sm-3 col-form-label">上傳個人圖檔：</label>
                                     <div class="col-sm-9 py-2" data-toggle="tooltip" data-placement="right" title="這可用為您在<<卡優新聞網>>中的個人識別，在文章中或他人好友名單中，都可顯示此一圖示，圖檔限JPG格式，尺寸為50*50 pixel，檔案大小15K以內。">
                                      <input type="file" name="ud_photo" accept="image/*" style="width: 150px;">
                                      <img class="ud_photo_now" src="../img/component/user.png" style="height: 65px;">
                                      <label><input type="checkbox" name="ud_photo_del" value="<?php echo $row_mem['ud_photo'];?>">刪除</label>
                                     </div>
                                   </div>
                      
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">附加個性簽名：</label>
                                     <div class="col-sm-9 py-2">
                                       <div class="form-check form-check-inline">
                                        
                                        <label class="form-check-label" >
                                          <input class="form-check-input" type="radio" name="ud_sign" <?php echo $ud_sign_1; ?> value="1">是
                                        </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                       
                                       <label class="form-check-label" >
                                        <input class="form-check-input" type="radio" name="ud_sign" <?php echo $ud_sign_0; ?> value="0">否
                                      </label>
                                       </div>
                                       <textarea class="form-control my-2" name="ud_sign_txt" rows="5" maxlength="225" data-toggle="tooltip" data-placement="right" title="此為設定可出現在您的發文及回文下方，作為另類的個人標章，最多以225字(英文)為限，上傳圖檔寬度勿超過600 pixels，檔案大小在60K以內。"><?php echo trim($row_mem['ud_sign_txt']);?></textarea>
                                       <input type="file" name="ud_sign_photo" accept="image/*">
                                       <div class="ud_sign_photo_now">
                                         
                                       </div>
                                     </div>
                                   </div>

                                   <div class="col-md-12 col  member_btn hv-center">
                                      <button id="submit_detail" class="gray-layered btnOver" type="button">確認送出</button>
                                      <button id="submit_detail_re" class="gray-layered btnOver" type="button">重新填寫</button>
                                   </div>
                       
                               </div>

                              <input type="hidden" name="type" value="detail_ud">
                           </form> 
                          </div>


                          <div class="tab-pane fade" id="title_7" role="tabpanel" aria-labelledby="title_7-tab">
                            <form id="change_password_form" action="" method="POST">
　　　　　　　　　　　　　　　   <div class="login_line"> 
                             <div class="row">
                                   <label class="col-sm-3 col-form-label">*請輸入舊密碼：</label>
                                   <div class="col-sm-9 ">
                                     <input type="password" class="form-control my-2" id="ud_password" name="ud_password" data-toggle="tooltip" data-placement="right" title="請輸入一次，原來的密碼">
                                   </div>
                                 </div>

                             <div class="row">
                                   <label class="col-sm-3 col-form-label">*請輸入新密碼：</label>
                                   <div class="col-sm-9 ">
                                     <input type="password" class="form-control my-2" id="new_password" name="new_password" placeholder="*密碼(4碼以上，僅可使用英文/數字)"
                                            data-toggle="tooltip" data-placement="right" title="請輸入要更換的新密碼。">
                                   </div>
                                 </div>  
                              
                              <div class="row">
                                   <label class="col-sm-3 col-form-label">*確認新密碼：</label>
                                   <div class="col-sm-9 ">
                                     <input type="password" class="form-control my-2" id="ag_new_password" name="ag_new_password" placeholder="重新輸入新密碼"
                                            data-toggle="tooltip" data-placement="right" title="為保護您的權益，請再輸入一次原來的密碼。">
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

        //-- 讀取資料 --
        $.ajax({
          url: '../ajax/member_ajax.php',
          type: 'POST',
          dataType: 'json',
          data: {
            type: 'detai_ud'
          },
          success:function (data) {
            
            if (data['ud_job']!=null) { $('[name="ud_job"] [value="'+data['ud_job']+'"]').prop('selected', true); }
            if (data['ud_title']!=null) { $('[name="ud_title"] [value="'+data['ud_title']+'"]').prop('selected', true); }
            if (data['ud_incomm']!=null) { $('[name="ud_incomm"] [value="'+data['ud_incomm']+'"]').prop('selected', true); }
            if (data['ud_edu']!=null) { $('[name="ud_edu"] [value="'+data['ud_edu']+'"]').prop('selected', true); }

            if (data['ud_interest']!=null){
              var ud_interest=data['ud_interest'].split(',');
              for (var i = 0; i < ud_interest.length; i++) {
                $('[name="ud_interest[]"][value="'+ud_interest[i]+'"]').prop('checked', true);
              }
            }

            if (data['ud_photo']!=null && data['ud_photo']!=''){
              var ud_photo=data['ud_photo'].indexOf('http')!=-1 ? data['ud_photo'] : '../sys/img/'+data['ud_photo'];
             $('.ud_photo_now').attr('src', ud_photo); 
            }
            if (data['ud_sign_photo']!=null && data['ud_sign_photo']!=''){ $('.ud_sign_photo_now').html('<img class="w-100" src="../sys/img/'+data['ud_sign_photo']+'"><label><input type="checkbox" name="ud_sign_photo_del" value="'+data['ud_sign_photo']+'">刪除</label>'); }
          }
        });



        //-- 基本資料 --
        $('#submit_base').click(function(event) {
          
          var err_txt='';
          err_txt = err_txt + check_input( '[name="ud_gender"]', '性別\n' );
          err_txt = err_txt + check_input( '[name="ud_birth"]', '生日\n' );
          err_txt = err_txt + check_input( '[name="ud_email"]', 'E-mail\n' );
          err_txt = err_txt + check_input( '[name="ud_mobile"]', '手機\n' );
          err_txt = err_txt + check_input( '[name="ud_zipcode"]', '郵遞區號\n' );
          err_txt = err_txt + check_input( '[name="ud_addr"]', '地址\n' );
          

          if (err_txt!='') {
             alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
          }
          else if(check_email('[name="ud_email"]')){
             alert('Email格式錯誤');
          }
          else if(check_phone('[name="ud_mobile"]')){
             alert('手機：請輸入數字，如：0900123456');
          }
          else{
            $('#base_form').submit();
          }

        });

        
        //-- 個人設定 --
        $('#submit_detail').click(function(event) {
          
          // var err_txt='';
          // err_txt = err_txt + check_input( '[name="ud_marriage"]', '婚姻狀態\n' );
          // err_txt = err_txt + check_input( '[name="ud_birth"]', '生日\n' );
          // err_txt = err_txt + check_input( '[name="ud_email"]', 'E-mail\n' );
          // err_txt = err_txt + check_input( '[name="ud_mobile"]', '手機\n' );
          // err_txt = err_txt + check_input( '[name="ud_zipcode"]', '郵遞區號\n' );
          // err_txt = err_txt + check_input( '[name="ud_addr"]', '地址\n' );
          

          // if (err_txt!='') {
          //    alert("以下欄位為空值或是帶有特殊符號\n"+err_txt);
          // }
          // else if(check_email('[name="ud_email"]')){
          //    alert('Email格式錯誤');
          // }
          // else if(check_phone('[name="ud_mobile"]')){
          //    alert('手機：請輸入數字，如：0900123456');
          // }
          // else{
            
          // }

          $('#detail_form').submit();

        });

        
        //-- 重新填寫-基本資料 --
        $('#submit_base_re').click(function(event) {
          $('#base_form [type="radio"]').prop('checked', false);
          $('#base_form [type="text"]').val('');
          $('#base_form [type="email"]').val('');
          $('#base_form select').val('');
        });


        //-- 重新填寫-個人設定 --
        $('#submit_detail_re').click(function(event) {
          $('#detail_form [type="radio"]').prop('checked', false);
          $('#detail_form select').val('');
          $('#detail_form [type="checkbox"]').prop('checked', false);
          $('#detail_form textarea').val('');
        });

        
        //-- 重設密碼 --
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