<?php 

require '../share_area/conn.php';

if ($_POST) {
 

}
?>

<!DOCTYPE html>
<html lang="zh-tw">
<head >
	<meta charset="UTF-8">
	<title></title>

	<?php 
	 //-- 共用CSS --
	 require '../share_area/share_css.php';
	?>

	<style type="text/css">
		@media (min-width: 1024px){
          body{ width: 800px;}
		}
	</style>
</head>
<body style="background-color: #fff;">
          <!-- 帳單設定(信用卡) -->
          <div id="add_bill">
          	<!-- 關閉按鈕 -->
          	<button class="btn btn-danger btn-sm close_fancybox">Ｘ</button>
           
           <div class="mem_logo pl-3 pt-3">
             <img src="../img/component/logo_ph.png" alt="">
            </div>
            <h1>我已訂閱的內容</h1>
            <form id="order_form" class="px-md-2 check_in" action="" method="POST">
             <div class="">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col"><h5>選擇銀行/商店</h5></th>
                    <th scope="col"><h5>訂閱範圍</h5></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <select id="ch_type">
                        <option value="">全部</option>
                        <option value="bank">銀行</option>
                        <option value="store">商店</option>
                      </select>
                    </td>
                    <td>
                      <select id="ch_flag">
                        <option value="">請選擇</option>
                        <option value="all">全部選取</option>
                        <option value="all_c">全部取消</option>
                        <option value="news_flag">全部新聞</option>
                        <option value="msg_flag">全部卡好康</option>
                        <option value="bf_flag">全部優情報</option>
                      </select>
                    </td>
                  </tr>
                  <?php 

                     if (!empty($_GET['type'])) {
                       $show_type=$_GET['type']=='bank' ? " AND ms.ms_si_pk IS NULL": " AND ms.ms_bi_pk IS NULL";
                     }else{
                       $show_type='';
                     }
                                      
                     $row_oreder=$pdo->select("SELECT bi.bi_shortname, s.st_nickname, ms.mo_type_no, ms.mo_news_flag, ms.mo_msg_flag, ms.mo_bf_flag, ms.ms_pk
                                               FROM my_subscription as ms 
                                               LEFT JOIN bank_info as bi ON bi.Tb_index=ms.ms_bi_pk OR bi.old_id=ms.ms_bi_pk
                                               LEFT JOIN store as s ON s.Tb_index=ms.ms_si_pk
                                               WHERE ms.ms_ud_pk=:ms_ud_pk $show_type
                                               ORDER BY ms.ms_si_pk, bi.bi_code", ['ms_ud_pk'=>$_SESSION['ud_pk']]);
                     foreach ($row_oreder as $oreder_one) {
                       
                       $name=empty($oreder_one['bi_shortname']) ? $oreder_one['st_nickname'] : $oreder_one['bi_shortname'];
                       $mo_news_flag=$oreder_one['mo_news_flag']=='Y' ? 'checked' : '';
                       $mo_msg_flag=$oreder_one['mo_msg_flag']=='Y' ? 'checked' : '';
                       $mo_bf_flag=$oreder_one['mo_bf_flag']=='Y' ? 'checked' : '';
                       echo '   
                       <tr>
                         <td>'.$name.'</td>
                         <td>
                           <label><input type="checkbox" '.$mo_news_flag.' name="mo_news_flag[]" value="Y"> 新聞</label>｜
                           <label><input type="checkbox" '.$mo_msg_flag.' name="mo_msg_flag[]" value="Y"> 卡好康</label>｜
                           <label><input type="checkbox" '.$mo_bf_flag.' name="mo_bf_flag[]" value="Y"> 優情報</label>
                           <input type="hidden" name="ms_pk[]" value="'.$oreder_one['ms_pk'].'">
                         </td>
                       </tr>';
                     }
                  ?>

                  <!-- <tr>
                    <td>台灣銀行</td>
                    <td>
                      <label><input type="checkbox" name="mo_news_flag"> 新聞</label>｜
                      <label><input type="checkbox" name="mo_msg_flag"> 卡好康</label>｜
                      <label><input type="checkbox" name="mo_bf_flag"> 優情報</label>
                    </td>
                  </tr> -->
                 
                </tbody>
              </table>

              <div class=" col  member_btn hv-center">
                  <button id="submit_btn" class="gray-layered btnOver" type="button">確定修改訂閱</button>
                  <button class="gray-layered btnOver close_box close_fancybox" type="button">取消</button>
               </div>
             </div>
     
  
    </form> 

           
  </div>
  <!-- fancybox END -->

  <script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
  <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- twzipcode -->
  <script type="text/javascript" src="/vendor/twzipcode/jquery.twzipcode.js"></script>
  <!-- Fancybox -->
  <script type="text/javascript" src="/vendor/fancybox/jquery.fancybox.min.js"></script>
  <!-- swiper -->
  <script type="text/javascript" src="/vendor/swiper/swiper.min.js"></script>
  <script type="text/javascript" src="/vendor/swiper/swiper.animate1.0.3.min.js"></script>
  <!-- 超強動畫庫 -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
  <!-- ajax JS -->
  <script type="text/javascript" src="/js/ajax.js"></script>
  <!-- 主要JS -->
  <script type="text/javascript" src="/js/main.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      if (location.search.indexOf('bank')!=-1) {
        $('#ch_type').val('bank');
      }else if(location.search.indexOf('store')!=-1){
        $('#ch_type').val('store');
      }

      $('#ch_type').change(function(event) {
        location.replace('?type='+$(this).val());
      });

      $('#ch_flag').change(function(event) {
        if ($(this).val()=='all') {
          $('[name="mo_news_flag[]"]').prop('checked', true);
          $('[name="mo_msg_flag[]"]').prop('checked', true);
          $('[name="mo_bf_flag[]"]').prop('checked', true);
        }
        else if($(this).val()=='all_c'){
          $('[name="mo_news_flag[]"]').prop('checked', false);
          $('[name="mo_msg_flag[]"]').prop('checked', false);
          $('[name="mo_bf_flag[]"]').prop('checked', false);
        }
        else if ($(this).val()=='news_flag') {
          $('[name="mo_news_flag[]"]').prop('checked', true);
          $('[name="mo_msg_flag[]"]').prop('checked', false);
          $('[name="mo_bf_flag[]"]').prop('checked', false);
        }
        else if ($(this).val()=='msg_flag') {
          $('[name="mo_news_flag[]"]').prop('checked', false);
          $('[name="mo_msg_flag[]"]').prop('checked', true);
          $('[name="mo_bf_flag[]"]').prop('checked', false);
        }
        else if ($(this).val()=='bf_flag') {
          $('[name="mo_news_flag[]"]').prop('checked', false);
          $('[name="mo_msg_flag[]"]').prop('checked', false);
          $('[name="mo_bf_flag[]"]').prop('checked', true);
        }
      });


      $('#submit_btn').click(function(event) {
         
         var ms_pk=[];
         var mo_news_flag=[];
         var mo_msg_flag=[];
         var mo_bf_flag=[];
         $.each($('[name="ms_pk[]"]'), function(index, val) {
           ms_pk.push($(this).val());
         });
         $.each($('[name="mo_news_flag[]"]'), function(index, val) {
           if ($(this).prop('checked')==true) {
             mo_news_flag.push('Y');
           }
           else{
             mo_news_flag.push('N');
           }
         });

         $.each($('[name="mo_msg_flag[]"]'), function(index, val) {
           if ($(this).prop('checked')==true) {
             mo_msg_flag.push('Y');
           }
           else{
             mo_msg_flag.push('N');
           }
         });
         $.each($('[name="mo_bf_flag[]"]'), function(index, val) {
           if ($(this).prop('checked')==true) {
             mo_bf_flag.push('Y');
           }
           else{
             mo_bf_flag.push('N');
           }
         });

         $.ajax({
           url: '../ajax/member_ajax.php',
           type: 'POST',
           data: {
            type: 'edit_info_order',
            ms_pk: ms_pk,
            mo_news_flag: mo_news_flag,
            mo_msg_flag: mo_msg_flag,
            mo_bf_flag: mo_bf_flag
           },
           success:function (data) {
            
            alert('修改成功');
            parent.jQuery.fancybox.getInstance().close();
            parent.location.reload();
           },
            error: function (xhr) {
              alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
            }
         });
      });

    });
  </script>
</body>
</html>