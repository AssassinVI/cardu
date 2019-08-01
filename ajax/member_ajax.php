<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-- 驗證會員帳號是否重複 --
	case 'check_userid':
     
     $row=$pdo->select("SELECT COUNT(*) as num FROM user_data WHERE ud_userid=:ud_userid", ['ud_userid'=>$_POST['ud_userid']], 'one');
     echo $row['num'];
     
	break;



	//-- 驗證暱稱是否重複 --
	case 'check_ud_nickname':
     
     $row=$pdo->select("SELECT COUNT(*) as num FROM user_data WHERE ud_nickname=:ud_nickname", ['ud_nickname'=>$_POST['ud_nickname']], 'one');
     echo $row['num'];
     
	break;



	//-- 驗證E-mail是否重複 --
	case 'check_ud_email':
     
     $row=$pdo->select("SELECT COUNT(*) as num FROM user_data WHERE ud_email=:ud_email", ['ud_email'=>$_POST['ud_email']], 'one');
     echo $row['num'];
     
	break;



	//-- FB或google 資料加密 --
	case 'F_G_aes_encrypt':
      
      echo aes_encrypt($aes_key, $_POST['id']);

	break;



	//-- FB 和 GOOGLE 登入 --
	case 'FB_G_login':

     $row=$pdo->select("SELECT ud_pk, ud_nickname, ud_photo, ud_email FROM user_data WHERE ud_email=:ud_email", ['ud_email'=>$_POST['ud_email']], 'one');

     setcookie('ud_pk', $row['ud_pk'], time()+3600000, '/');
     $_SESSION['ud_pk']=$row['ud_pk'];
     $_SESSION['ud_nickname']=$row['ud_nickname'];
     $_SESSION['ud_photo']=$row['ud_photo'];
     $_SESSION['ud_email']=$row['ud_email'];

     $pdo->select("UPDATE user_data SET ud_logintime=:ud_logintime, ud_loginip=:ud_loginip, ud_logincnt=ud_logincnt+1 WHERE ud_pk=:ud_pk", 
                   ['ud_logintime'=>date('Y-m-d H:i:s'), 'ud_loginip'=>user_ip(), 'ud_pk'=>$row['ud_pk']]);

     echo $row['ud_nickname'];

	break;




	//-- 讀取個人設定 --
	case 'detai_ud':
     
     $row_mem=$pdo->select("SELECT ud_nickname, ud_photo, ud_regtime, ud_logintime, ud_logincnt, ud_userid, 
                                ud_realname, ud_email, ud_gender, ud_birth, ud_mobile, ud_zipcode, ud_addr,
                                ud_marriage, ud_children, ud_job, ud_title, ud_incomm, ud_edu, ud_interest, ud_sign, ud_sign_txt, ud_sign_photo, ud_children_num
                         FROM user_data 
                         WHERE ud_pk=:ud_pk", 
                         ['ud_pk'=>$_SESSION['ud_pk']], 'one');
     
     echo json_encode($row_mem);

	break;



	//-- 讀取有無訂閱電子報 --
	case 'check_epaper':

	$row=$pdo->select("SELECT ud_epaper FROM user_data WHERE ud_pk=:ud_pk", ['ud_pk'=>$_SESSION['ud_pk']], 'one');
	echo $row['ud_epaper'];

	break;


	//-- 更改訂閱電子報 --
	case 'set_epaper':
     
     $pdo->update('user_data', ['ud_epaper'=>$_POST['ud_epaper']], ['ud_pk'=>$_SESSION['ud_pk']]);
	 echo $_SESSION['ud_pk'];

	break;


	//-- 撈信用卡資料 --
	case 'sel_bank':
     
     $row=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, ccd.cc_cardname, ccd.cc_photo, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name 
     	                FROM credit_card as cc
     	                INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
     	                WHERE cc.cc_bi_pk=:cc_bi_pk AND cc.cc_stop_card=0 AND cc.cc_stop_publish=0
     	                ORDER BY cc_publish DESC"
     	                , ['cc_bi_pk'=>$_POST['cc_bi_pk']]);
	 echo json_encode($row);

	break;


	//-- 撈單卡資料 --
	case 'sel_ccard':
     
        $row=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_cardorg, cc.cc_cardlevel, cc.cc_photo, cce.content
         	                FROM credit_card as cc
         	                LEFT JOIN credit_card_eq as cce ON cce.card_id=cc.Tb_index AND cce.eq_id='eq2019021218025739'
         	                WHERE cc.Tb_index=:Tb_index AND cc.cc_stop_card=0 AND cc.cc_stop_publish=0
         	                ORDER BY cc.cc_publish DESC"
         	                , ['Tb_index'=>$_POST['ccard_id']], 'one');
    	 echo json_encode($row);

	break;


	//-- 撈我的信用卡資料 --
	case 'sel_mycard':
     
        $row=$pdo->select("SELECT mb_pk, mb_bill_bi_pk, mb_bill_cc_pk, mb_checkout_day, mb_pay_day, mb_remind
         	                FROM my_billing 
         	                WHERE mb_pk=:mb_pk"
         	                , ['mb_pk'=>$_POST['mb_pk']], 'one');
    	 echo json_encode($row);

	break;




  //--------------------------------- 新增我的信用卡 ----------------------------------------------------
  case 'insert_mycard':

     $param=[
      'mb_ud_pk'=>$_SESSION['ud_pk'],
      'mb_bill_bi_pk'=> $_POST['mb_bill_bi_pk'],
      'mb_bill_co_pk'=> $_POST['mb_bill_co_pk'],
      'mb_bill_cc_pk'=> $_POST['mb_bill_cc_pk'],
      'mb_bill_group_id'=> $_POST['mb_bill_group_id'],
      'mb_bill_name'=> $_POST['mb_bill_name'],
      'mb_checkout_day'=> $_POST['mb_checkout_day'],
      'mb_pay_day'=> $_POST['mb_pay_day'],
      'mb_crtime'=> date('Y-m-d H:i:s'),
      'mb_remind'=> $_POST['mb_remind']
     ];
     $pdo->insert('my_billing', $param);
     
     
   
  break;
  //--------------------------------- 新增我的信用卡 END ----------------------------------------------------



  //--------------------------------- 修改我的信用卡 ----------------------------------------------------
  case 'update_mycard':
   
   $param=[
     'mb_bill_bi_pk'=> $_POST['mb_bill_bi_pk'],
     'mb_bill_co_pk'=> $_POST['mb_bill_co_pk'],
     'mb_bill_cc_pk'=> $_POST['mb_bill_cc_pk'],
     'mb_bill_group_id'=> $_POST['mb_bill_group_id'],
     'mb_bill_name'=> $_POST['mb_bill_name'],
     'mb_checkout_day'=> $_POST['mb_checkout_day'],
     'mb_pay_day'=> $_POST['mb_pay_day'],
     'mb_remind'=> $_POST['mb_remind'],
     'mb_cardcut_date'=>$_POST['mb_cardcut_date'],
     'mb_stop_card'=>$_POST['mb_stop_card'],
     'mb_updtime'=> date('Y-m-d H:i:s')
   ];

   $where=['mb_pk'=>$_POST['mb_pk']];
   $pdo->update('my_billing', $param, $where);



  break;
  //--------------------------------- 修改我的信用卡 END ----------------------------------------------------


  //--------------------------------- 刪除我的信用卡 ----------------------------------------------------
  case 'delete_mycard':
   
   $where=['mb_pk'=>$_POST['mb_pk']];
   $pdo->delete('my_billing', $where);
   $where_d=['mbd_mb_pk'=>$_POST['mb_pk']];
   $pdo->delete('my_billing_detail', $where_d);

  break;
  //--------------------------------- 刪除我的信用卡 END ----------------------------------------------------


	//-- 新增我的帳單消費類別 --
	case 'add_consume_category':

	  $row_ch_mbd=$pdo->select("SELECT COUNT(*) as total, mbd_pk
      	                        FROM my_billing_detail 
      	                        WHERE mbd_ud_pk=:mbd_ud_pk AND mbd_mb_pk=:mbd_mb_pk AND mbd_bill_yy=:mbd_bill_yy AND mbd_bill_mm=:mbd_bill_mm",
      	                        ['mbd_ud_pk'=>$_SESSION['ud_pk'], 'mbd_mb_pk'=>$_POST['mbd_mb_pk'], 'mbd_bill_yy'=>$_POST['mbd_bill_yy'], 'mbd_bill_mm'=>$_POST['mbd_bill_mm']], 'one');

	  if ($row_ch_mbd['total']<1) {
	  	
	  	$mbd_expdate=$_POST['mbd_bill_yy'].'-'.$_POST['mbd_bill_mm'].'-'.$_POST['mb_pay_day'];
        $param=[
          'mbd_ud_pk'=>$_SESSION['ud_pk'],
          'mbd_mb_pk'=>$_POST['mbd_mb_pk'],
          'mbd_bill_yy'=>$_POST['mbd_bill_yy'],
          'mbd_bill_mm'=>$_POST['mbd_bill_mm'],
          'mbd_expdate'=>$mbd_expdate,
          'mbd_crtime'=>date('Y-m-d H:i:s')
         ];
        $pdo->insert('my_billing_detail', $param);

        $row_mbd=$pdo->select("SELECT mbd_pk FROM my_billing_detail ORDER BY mbd_pk DESC LIMIT 0,1",'no','one');
        $mbd_pk=$row_mbd['mbd_pk'];
	  }
	  else{
	  	$mbd_pk=$row_ch_mbd['mbd_pk'];
	  }
       
       $param=[
         'cc_ud_pk'=>$_SESSION['ud_pk'],
         'cc_category'=>$_POST['cc_category'],
         'cc_mbd_pk'=>$mbd_pk
        ];
       $pdo->insert('consume_category', $param);

       $row=$pdo->select("SELECT cc_pk FROM consume_category ORDER BY cc_pk DESC LIMIT 0,1", 
       	                 ['cc_ud_pk'=>$_SESSION['up_pk'], 'cc_category'=>$_POST['cc_category']], 'one');
       echo $row['cc_pk'];
	break;



	//-- 刪除我的帳單消費類別 --
	case 'del_consume_category':
      
      $pdo->delete('consume_category', ['cc_pk'=>$_POST['cc_pk']]);
      $pdo->delete('consume_log', ['cl_cc_pk'=>$_POST['cc_pk']]);
	break;


	//--------------------------------- 登入帳單 ----------------------------------------------------
	case 'add_my_billing_detail':
      $param=[
        'mbd_ud_pk'=>$_SESSION['ud_pk'],
        'mbd_mb_pk'=>$_POST['mbd_mb_pk'],
        'mbd_bill_yy'=>$_POST['mbd_bill_yy'],
        'mbd_bill_mm'=>$_POST['mbd_bill_mm'],
        'mbd_amount'=>$_POST['mbd_amount'],
        'mbd_pay_tag'=>$_POST['mbd_pay_tag'],
        'mbd_expdate'=>$_POST['mbd_expdate'],
        'mbd_crtime'=>date('Y-m-d H:i:s')
      ];
      
      if ($_POST['mbd_pay_tag']=='1') {
      	$param['mbd_amount_paid']=$_POST['mbd_amount_paid'];
      	$param['mbd_pay_date']=$_POST['mbd_pay_date'];
      	$param['mbd_pay_type']=$_POST['mbd_pay_type'];
      }
      else{
      	$param['mbd_amount_paid']='';
      	$param['mbd_pay_date']='';
      	$param['mbd_pay_type']='';
      }

      $row_ch_mbd=$pdo->select("SELECT COUNT(*) as total, mbd_pk
      	                        FROM my_billing_detail 
      	                        WHERE mbd_ud_pk=:mbd_ud_pk AND mbd_mb_pk=:mbd_mb_pk AND mbd_bill_yy=:mbd_bill_yy AND mbd_bill_mm=:mbd_bill_mm",
      	                        ['mbd_ud_pk'=>$_SESSION['ud_pk'], 'mbd_mb_pk'=>$_POST['mbd_mb_pk'], 'mbd_bill_yy'=>$_POST['mbd_bill_yy'], 'mbd_bill_mm'=>$_POST['mbd_bill_mm']], 'one');
      //-- 查無資料 新增 --
      if ($row_ch_mbd['total']<1) {
      	$pdo->insert('my_billing_detail', $param);
      	echo 'insert';
      }
      //-- 查有資料 更新 --
      else{
      	$param['mbd_updtime']=date('Y-m-d');
      	$where=['mbd_pk'=>$row_ch_mbd['mbd_pk']];
        $pdo->update('my_billing_detail', $param, $where);
      	echo 'update';
      }
      
      
      //-- 寫入消費明細 --
      $cl_amount_num=count($_POST['cl_amount']);
      for ($i=0; $i <$cl_amount_num ; $i++) { 
      	if (!empty($_POST['cl_amount'][$i]) ) {
      	   
      	   $row_mbd=$pdo->select("SELECT mbd_pk FROM my_billing_detail ORDER BY mbd_pk DESC LIMIT 0,1",'no','one');
      	   $param_log=[
             'cl_ud_pk'=>$_SESSION['ud_pk'],
             'cl_mbd_pk'=>$row_mbd['mbd_pk'],
             'cl_cc_pk'=>$_POST['cc_pk'][$i],
             'cl_amount'=>$_POST['cl_amount'][$i]
      	   ]; 

           $row_ch_cl=$pdo->select("SELECT COUNT(*) as total, cl_pk FROM consume_log WHERE cl_ud_pk=:cl_ud_pk AND cl_mbd_pk=:cl_mbd_pk AND cl_cc_pk=:cl_cc_pk",
                                    ['cl_ud_pk'=>$_SESSION['ud_pk'], 'cl_mbd_pk'=>$row_mbd['mbd_pk'], 'cl_cc_pk'=>$_POST['cc_pk'][$i]], 'one');
           //-- 查無資料 新增 --
           if ($row_ch_cl['total']<1) {
           	$pdo->insert('consume_log', $param_log);
           }
           //-- 查有資料 更新 --
           else{
           	$where=['cl_pk'=>$row_ch_cl['cl_pk']];
            $pdo->update('consume_log', $param_log, $where);
           }
      	}
      }

    break;
    //--------------------------------- 登入帳單 END ----------------------------------------------------


    //--------------------------------- 刪除帳單 ----------------------------------------------------
	case 'del_my_billing_detail':
	  $row= $pdo->select("SELECT mbd_pk FROM my_billing_detail WHERE mbd_mb_pk=:mbd_mb_pk AND mbd_bill_yy=:mbd_bill_yy AND mbd_bill_mm=:mbd_bill_mm", 
	  	['mbd_mb_pk'=>$_POST['mbd_mb_pk'], 'mbd_bill_yy'=>$_POST['mbd_bill_yy'], 'mbd_bill_mm'=>$_POST['mbd_bill_mm']] ,'one');

       $pdo->delete('my_billing_detail', ['mbd_pk'=>$row['mbd_pk']]);
       $pdo->delete('consume_log', ['cl_mbd_pk'=>$row['mbd_pk']]);

	break;
	//--------------------------------- 刪除帳單 END ----------------------------------------------------




     

    //--------------------------------- 獲取帳單資料 ----------------------------------------------------
	case 'my_billing_detail':
    
     $row_mbd=$pdo->select("SELECT mbd_pk, mbd_amount, mbd_amount_paid, mbd_pay_tag, mbd_pay_date, mbd_pay_type
     	                    FROM my_billing_detail 
     	                    WHERE mbd_ud_pk=:mbd_ud_pk AND mbd_mb_pk=:mbd_mb_pk AND mbd_bill_yy=:mbd_bill_yy AND mbd_bill_mm=:mbd_bill_mm",
     	                    ['mbd_ud_pk'=>$_SESSION['ud_pk'], 'mbd_mb_pk'=>$_POST['mbd_mb_pk'], 'mbd_bill_yy'=>$_POST['mbd_bill_yy'], 'mbd_bill_mm'=>$_POST['mbd_bill_mm']], 'one');
     
     //-- 新增消費項目 --
     $row_cc=$pdo->select("SELECT cc_category, cc_pk 
     	                   FROM consume_category 
     	                   WHERE cc_ud_pk=:cc_ud_pk AND cc_mbd_pk=:cc_mbd_pk",
     	                   ['cc_ud_pk'=>$_SESSION['ud_pk'], 'cc_mbd_pk'=>$row_mbd['mbd_pk']]);
     
     //-- 消費項目資訊 --
     $row_col=$pdo->select("SELECT cl_cc_pk, cl_amount 
     	                   FROM consume_log 
     	                   WHERE cl_ud_pk=:cl_ud_pk AND cl_mbd_pk=:cl_mbd_pk",
     	                   ['cl_ud_pk'=>$_SESSION['ud_pk'], 'cl_mbd_pk'=>$row_mbd['mbd_pk']]);

     $row_mbd['consume_category']=$row_cc;
     $row_mbd['consume_log']=$row_col;
     echo json_encode($row_mbd);

    break;
	//--------------------------------- 獲取帳單資料 END ----------------------------------------------------
  






 //--------------------------------- 查詢繳款期間 ----------------------------------------------------
 case 'ch_expdate':
   
   $row_from=$pdo->select("SELECT mb.mb_pk, mbd.mbd_amount, mbd.mbd_expdate, mbd.mbd_bill_yy, mbd.mbd_bill_mm,
                                  ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname
                                 FROM my_billing as mb
                                 INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                 INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                 WHERE mb.mb_ud_pk=:mb_ud_pk AND mbd.mbd_expdate>=:mbd_expdate_from AND mbd.mbd_expdate<=:mbd_expdate_to AND mbd.mbd_pay_tag=0
                                 ORDER BY mbd.mbd_expdate ASC, mb.mb_pk DESC",
                                ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mbd_expdate_from'=>$_POST['from'], 'mbd_expdate_to'=>$_POST['to']]);

   $row_to=$pdo->select("SELECT mb.mb_pk,
                                mbd.mbd_amount, mbd.mbd_expdate, mbd.mbd_bill_yy, mbd.mbd_bill_mm, mbd.mbd_amount_paid, mbd.mbd_pay_type, mbd.mbd_pay_date,
                                ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname
                                 FROM my_billing as mb
                                 INNER JOIN cc_detail as ccd ON ccd.Tb_index=mb.mb_bill_cc_pk
                                 INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                                 WHERE mb.mb_ud_pk=:mb_ud_pk AND mbd.mbd_expdate>=:mbd_expdate_from AND mbd.mbd_expdate<=:mbd_expdate_to AND mbd.mbd_pay_tag=1
                                 ORDER BY mbd.mbd_expdate ASC, mb.mb_pk DESC",
                                ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mbd_expdate_from'=>$_POST['from'], 'mbd_expdate_to'=>$_POST['to']]);
  $row=[];
  $row['from']=$row_from;
  $row['to']=$row_to;

   echo json_encode($row);

 break;
 //--------------------------------- 查詢繳款期間 END ----------------------------------------------------




 //--------------------------------- 查詢繳款期間 (我的帳單明細) ----------------------------------------------------
 case 'ch_mb_pk_expdate':

   $row_d=$pdo->select("SELECT mb.mb_pk, mbd.mbd_amount, mbd.mbd_amount_paid, mbd.mbd_pay_date, mbd.mbd_pay_type, mbd.mbd_bill_yy, mbd.mbd_bill_mm
                         FROM my_billing as mb
                         INNER JOIN my_billing_detail as mbd ON mbd.mbd_mb_pk=mb.mb_pk
                         WHERE mb.mb_ud_pk=:mb_ud_pk AND mb.mb_pk=:mb_pk AND mbd.mbd_expdate>=:mbd_expdate_from AND mbd.mbd_expdate<=:mbd_expdate_to
                         ORDER BY mbd.mbd_expdate ASC",
                         ['mb_ud_pk'=>$_SESSION['ud_pk'], 'mb_pk'=>$_POST['mb_pk'], 'mbd_expdate_from'=>$_POST['from'], 'mbd_expdate_to'=>$_POST['to']]);


   echo json_encode($row_d);

 break;
 //--------------------------------- 查詢繳款期間 (我的帳單明細) END ----------------------------------------------------




 //--------------------------------- 會員訂閱  ----------------------------------------------------
 case 'my_subscription':
  
  $row=$pdo->select("SELECT COUNT(*) as total FROM my_subscription WHERE ms_ud_pk=:ms_ud_pk AND (ms_bi_pk=:ms_bi_pk OR ms_si_pk=:ms_si_pk)",
                     ['ms_ud_pk'=>$_SESSION['ud_pk'], 'ms_bi_pk'=>$_POST['bi_pk'], 'ms_si_pk'=>$_POST['si_pk']], 'one');


  if ($row['total']>'0') {
    echo "0";
  }
  else{
    $param=[
      'ms_ud_pk'=>$_SESSION['ud_pk'],
      'ms_create_time'=>date('Y-m-d H:i:s')
    ];
    if (!empty($_POST['bi_pk'])) {
      $param['ms_bi_pk']=$_POST['bi_pk'];
    }
    if (!empty($_POST['si_pk'])) {
      $param['ms_si_pk']=$_POST['si_pk'];
    }

    $pdo->insert('my_subscription', $param);
    echo "1";
  }

 break;
 //--------------------------------- 會員訂閱 END ----------------------------------------------------





 //--------------------------------- 修改訂閱  ----------------------------------------------------
 case 'edit_info_order':
   $ms_pk_num=count($_POST['ms_pk']);

   for ($i=0; $i <$ms_pk_num ; $i++) { 

     $param=[
      'mo_news_flag'=>$_POST['mo_news_flag'][$i],
      'mo_msg_flag'=>$_POST['mo_msg_flag'][$i],
      'mo_bf_flag'=>$_POST['mo_bf_flag'][$i]
     ];
     $where=['ms_pk'=>$_POST['ms_pk'][$i]];
     $pdo->update('my_subscription', $param, $where);
   }


 break;
 //--------------------------------- 修改訂閱 END ----------------------------------------------------



 //--------------------------------- 會員收藏  ----------------------------------------------------
 case 'my_favorite':
  
  $row=$pdo->select("SELECT COUNT(*) as total FROM my_favorite WHERE mf_ud_pk=:mf_ud_pk AND mf_msg_pk=:mf_msg_pk",
                     ['mf_ud_pk'=>$_SESSION['ud_pk'], 'mf_msg_pk'=>$_POST['news_id']], 'one');


  if ($row['total']>'0') {
    echo "0";
  }
  else{
    
    //-- 新聞 --
    if (strpos($_POST['news_id'], 'news')!==FALSE) {
      $row_news=$pdo->select("SELECT ns_ftitle FROM NewsAndType WHERE Tb_index=:Tb_index ",['Tb_index'=>$_POST['news_id']], 'one');
      $mf_msg_title=$row_news['ns_ftitle'];
    }
    //-- 活動 --
    else if(strpos($_POST['news_id'], 'note')!==FALSE){
      $row_note=$pdo->select("SELECT aTitle FROM appNotice WHERE Tb_index=:Tb_index ",['Tb_index'=>$_POST['news_id']], 'one');
      $mf_msg_title=$row_note['aTitle'];
    }
    //-- 信用卡 --
    else if(strpos($_POST['news_id'], 'ccard')!==FALSE){
      $row_cc=$pdo->select("SELECT bi_shortname, cc_cardname, org_nickname, attr_name FROM cc_detail WHERE Tb_index=:Tb_index ",['Tb_index'=>$_POST['news_id']], 'one');
      $mf_msg_title=$row_cc['bi_shortname'].' '.$row_cc['cc_cardname'].$row_cc['org_nickname'].$row_cc['attr_name'];
    }
    
    $row_mem=$pdo->select("SELECT ud_userid FROM user_data WHERE ud_pk=:ud_pk ",['ud_pk'=>$_SESSION['ud_pk']], 'one');
    $param=[
      'mf_ud_pk'=>$_SESSION['ud_pk'],
      'mf_ud_userid'=>$row_mem['ud_userid'],
      'mf_msg_pk'=>$_POST['news_id'],
      'mf_msg_title'=>$mf_msg_title,
      'mf_create_time'=>date('Y-m-d H:i:s')
    ];


    $pdo->insert('my_favorite', $param);
    echo "1";
  
    
  }

 break;
 //--------------------------------- 會員收藏 END ----------------------------------------------------



 //--------------------------------- 會員留言  ----------------------------------------------------
 case 'discuss':

 $param=[
  'ds_type_pk'=>$_POST['ds_type_pk'],
  'ds_ud_pk'=>$_SESSION['ud_pk'],
  'ds_content'=>$_POST['ds_content'],
  'ds_pdate'=>date('Y-m-d H:i:s')
 ];
 $pdo->insert('discuss', $param);

 break;
 //--------------------------------- 會員留言 END ----------------------------------------------------




 //--------------------------------- 修改會員留言  ----------------------------------------------------
 case 'edit_discuss':
  
  $param=[
   'ds_content'=>$_POST['ds_content'],
   'ds_edate'=>date('Y-m-d H:i:s')
  ];
  $where=['ds_pk'=>$_POST['ds_pk']];
  $pdo->update('discuss', $param, $where);

 break;
 //--------------------------------- 修改會員留言 END ----------------------------------------------------



 //--------------------------------- 讀取會員留言  ----------------------------------------------------
 case 'loading_discuss':

  $row_discuss=$pdo->select("SELECT ud.ud_nickname, ud.ud_photo, d.ds_pdate, d.ds_content, d.ds_ud_pk, d.ds_pk
                             FROM discuss as d 
                             INNER JOIN user_data as ud ON ud.ud_pk=d.ds_ud_pk
                             WHERE d.ds_type_pk=:ds_type_pk AND ds_type=0
                             ORDER BY d.ds_pdate DESC", ['ds_type_pk'=>$_POST['ds_type_pk']]);

  foreach ($row_discuss as $discuss_one) {
    
    if ($discuss_one['ds_ud_pk']==$_SESSION['ud_pk']) {
      $d_mem_edit='  
      <div class="d_mem_edit">
        <a href="javascript:;" class="edit" title="編輯留言"><i class="fa fa-edit"></i></a>
      </div>';
    }
    elseif(!empty($_SESSION['ud_pk'])){
      $d_mem_edit='  
      <div class="d_mem_edit">
        <a href="javascript:;" class="reply" title="回覆"><i class="fa fa-comment-o"></i></a>｜
        <a href="javascript:;" class="reply_q" title="引言回覆"><i class="fa fa-commenting-o"></i></a>
      </div>';
    }
    else{
      $d_mem_edit='';
    }

    $ud_photo=empty($discuss_one['ud_photo']) ? '../img/component/user.png': '../sys/img/'.$discuss_one['ud_photo'];
    
    //-- 回覆留言 --
    $row_reply=$pdo->select("SELECT ud.ud_nickname, ud.ud_photo, d.ds_pdate, d.ds_content, d.ds_ud_pk, d.ds_pk
                             FROM discuss as d
                             INNER JOIN user_data as ud ON ud.ud_pk=d.ds_ud_pk
                             WHERE d.ds_parent=:ds_parent AND ds_type=1
                             ORDER BY d.ds_pdate DESC", 
                             ['ds_parent'=>$discuss_one['ds_pk']]);
    $reply_txt='';
    foreach ($row_reply as $reply_one) {
      
      $reply_ud_photo=empty($reply_one['ud_photo']) ? '../img/component/user.png': '../sys/img/'.$reply_one['ud_photo'];

      $reply_txt.='  
      <div class="mb-2 position-relative">
      <div class="d_mem_img mr-1">
          <img src="'.$reply_ud_photo.'">
      </div>
      <div class="d_mem_txt">
       <p class="mb-0"><span class="d_mem_name">'.$reply_one['ud_nickname'].'</span><span class="d_mem_time">'.$reply_one['ds_pdate'].'</span></p>
       <p class="mb-0">'.nl2br($reply_one['ds_content']).'</p>
      </div>
      </div>';
    }
    //-- 回覆留言 END --

    echo '  
    <div class=" p-2 discuss_content">
      <div class="d_mem_img mr-1">
          <img src="'.$ud_photo.'">
      </div>
      <div class="d_mem_txt">
        <p class="mb-0"><span class="d_mem_name">'.$discuss_one['ud_nickname'].'</span><span class="d_mem_time">'.$discuss_one['ds_pdate'].'</span></p>
        <p class="mb-0">'.nl2br($discuss_one['ds_content']).'</p>
      </div>
       '.$d_mem_edit.'
      
       <div class="reply_txt ml-md-5 ml-2 mt-2 pl-2 border-left">
        
        <div class="edit_reply">

        </div>
        

        '.$reply_txt.'
       </div>

       <input type="hidden" name="ds_pk" value="'.$discuss_one['ds_pk'].'">
    </div>';
  }

 break;
 //--------------------------------- 讀取會員留言 END  ----------------------------------------------------






 //--------------------------------- 編輯回覆留言  ----------------------------------------------------
 case 'reply_mem':
   
   $row_reply=$pdo->select("SELECT ud_nickname, ud_photo, ud_pk FROM user_data WHERE ud_pk=:ud_pk", ['ud_pk'=>$_SESSION['ud_pk']], 'one');
   echo  json_encode($row_reply);
 break;
 //--------------------------------- 編輯回覆留言 END  ----------------------------------------------------




 //--------------------------------- 確定編輯回覆留言  ----------------------------------------------------
 case 'reply_discuss':

 $param=[
  'ds_type'=>1,
  'ds_type_pk'=>'',
  'ds_parent'=>$_POST['ds_parent'],
  'ds_ud_pk'=>$_SESSION['ud_pk'],
  'ds_type_pk'=>$_POST['ds_type_pk'],
  'ds_content'=>$_POST['ds_content'],
  'ds_pdate'=>date('Y-m-d H:i:s')
 ];
 $pdo->insert('discuss', $param);

 break;
 //--------------------------------- 確定編輯回覆留言 END ----------------------------------------------------

	default:
		# code...
		break;
  }

  $pdo=NULL;
}
?>