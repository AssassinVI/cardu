<?php 
  if (strpos($_SERVER['QUERY_STRING'], 'news')!==FALSE) {
    $ds_type_pk=$_SERVER['QUERY_STRING'];
  }
  elseif(strpos($_SERVER['QUERY_STRING'], 'note')!==FALSE){
    $ds_type_pk=$_SERVER['QUERY_STRING'];
  }
  elseif(strpos($_SERVER['QUERY_STRING'], 'ccard')!==FALSE){
    $ds_type_pk=explode('&', $_SERVER['QUERY_STRING']);
    $ds_type_pk=explode('=', $ds_type_pk[0]);
    $ds_type_pk=$ds_type_pk[1];
  }

  if (empty($_SESSION['ud_pk'])) {
    echo '  
    <div>
      <p>您尚未登入，請先<a href="javascript:;" data-fancybox data-src="#member_div">登入會員</a></p>
      <input type="hidden" name="ds_type_pk" value="'.$ds_type_pk.'">
    </div>';
  }
  else{

    $ud_photo= empty( $_SESSION['ud_photo']) ? '../img/component/user.png' : '../sys/img/'.$_SESSION['ud_photo'];

    echo '   
    <div class=" p-2 discuss_content">
      <div class="d_mem_img mr-1">
          <img src="'.$ud_photo.'" alt="">
      </div>
      <div class="d_mem_txt">
        <textarea id="leave_msg_txt" rows="5"></textarea>
        <div class="d_mem_edit">
          <a id="leave_msg_btn" href="javascript:;" class="confirm_edit gray-layered">我要留言</a>
          <input type="hidden" name="ds_type_pk" value="'.$ds_type_pk.'">
        </div>
      </div>
    </div>';

  }
?>

<div class="discuss_div p-md-2 py-2 px-0">

  <?php 

    // $row_discuss=$pdo->select("SELECT ud.ud_nickname, ud.ud_photo, d.ds_pdate, d.ds_content, d.ds_ud_pk, d.ds_pk
    //                            FROM discuss as d 
    //                            INNER JOIN user_data as ud ON ud.ud_pk=d.ds_ud_pk
    //                            WHERE d.ds_type_pk=:ds_type_pk 
    //                            ORDER BY d.ds_pdate DESC", ['ds_type_pk'=>$ds_type_pk]);

    // foreach ($row_discuss as $discuss_one) {
      
    //   if ($discuss_one['ds_ud_pk']==$_SESSION['ud_pk']) {
    //     $d_mem_edit='  
    //     <div class="d_mem_edit">
    //       <a href="javascript:;" class="edit" title="編輯留言"><i class="fa fa-edit"></i></a>
    //       <input type="hidden" name="ds_pk" value="'.$discuss_one['ds_pk'].'">
    //     </div>';
    //   }
    //   else{
    //     $d_mem_edit='';
    //   }

    //   $ud_photo=empty($discuss_one['ud_photo']) ? '../img/component/user.png': '../sys/img/'.$discuss_one['ud_photo'];

    //   echo '  
    //   <div class=" p-2 discuss_content">
    //     <div class="d_mem_img mr-1">
    //         <img src="'.$ud_photo.'">
    //     </div>
    //     <div class="d_mem_txt">
    //       <p class="mb-0"><span class="d_mem_name">'.$discuss_one['ud_nickname'].'</span><span class="d_mem_time">'.$discuss_one['ds_pdate'].'</span></p>
    //       <p class="mb-0">'.nl2br($discuss_one['ds_content']).'</p>
    //     </div>
    //      '.$d_mem_edit.'
    //   </div>';
    // }
  ?>
  
  
</div>