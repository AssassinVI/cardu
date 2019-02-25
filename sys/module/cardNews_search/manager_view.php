<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
#over_bank{ margin-bottom: 15px; }
.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM appNews WHERE Tb_index=:Tb_index', $where);
  
  $newsType_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']], 'one');
  $newsType_sp_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_sp_pk']], 'one');
  $newsType_txt=empty($newsType_sp_name['nt_name']) ? $newsType_name['nt_name'] : $newsType_name['nt_name'].'｜'.$newsType_sp_name['nt_name'].'｜';
  $Start_End_day=$row['StartDate'].' ~ '.$row['EndDate'];

  //-- 情報來源 --

  //-- 銀行 --
  $bank_name=[];
  $bank_logo=[];
  $bank_arr=pdo_select('SELECT Tb_index, bi_shortname, bi_logo FROM bank_info', 'no');
  foreach ($bank_arr as $bank_one) {
    $bank_name[$bank_one['Tb_index']]=$bank_one['bi_shortname'];
    $bank_logo[$bank_one['Tb_index']]=$bank_one['bi_logo'];
  }

  //-- 組織 --
  $org_name=[];
  $org_arr=pdo_select('SELECT Tb_index, mt_id, org_nickname FROM card_org', 'no');
  foreach ($org_arr as $org_one) {
    //-- 信用卡 --
    if ($org_one['mt_id']=='site2018110611172385') {
      $org_name[$org_one['Tb_index']]='[信用卡]'.$org_one['org_nickname'];
    }
    //-- 金融卡 --
    else{
      $org_name[$org_one['Tb_index']]='[金融卡]'.$org_one['org_nickname'];
    }
  }

  $ns_bank_arr=explode(',', $row['ns_bank']);
  $ns_org_arr=explode(',', $row['ns_org']);
  $ns_bank_txt='';
  $ns_org_txt='';

  foreach ($ns_bank_arr as $ns_bank_one) {
    $ns_bank_txt.=$bank_name[$ns_bank_one].',';
  }

  foreach ($ns_org_arr as $ns_org_one) {
    $ns_org_txt.=$org_name[$ns_org_one].',';
  }

  $ns_bank_org=substr($ns_bank_txt.$ns_org_txt, 0,-1) ;
  //-- 情報來源 END--


  //-- 延伸閱讀 --
  if (!empty($row['ns_news'])) {

    $ns_news=explode(',', $row['ns_news']);
    $ns_news_txt='<h3> ◉ 延伸閱讀：';
    $ns_news_txt.='<ul>';
    foreach ($ns_news as $ns_news_one) {
      $ns_news_name=pdo_select("SELECT ns_ftitle, mt_id FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$ns_news_one]);
      //-- 新聞 --
     if ($ns_news_name['mt_id']=='site2018111910430599') {
       $window_URL='../news_public/newsView_windows.php?Tb_index='.$ns_news_one;
     }
     //-- 卡情報 --
     elseif($ns_news_name['mt_id']=='site201901111555425'){
       $window_URL='../cardNews_public/newsView_windows.php?Tb_index='.$ns_news_one;
     }
     //-- 優情報 --
     elseif($ns_news_name['mt_id']=='site2019011116095854'){
       $window_URL='../Unews_public/newsView_windows.php?Tb_index='.$ns_news_one;
     }
     $ns_news_txt.='<li><a href="javascript:;" onclick="window.open(\''.$window_URL.'\', \''.$ns_news_name['ns_ftitle'].'\', config=\'height=800,width=900\');">'.$ns_news_name['ns_ftitle'].'</a></li>';
    }
    $ns_news_txt.='</ul>
                  </h3>';
  }


  //-- 注意事項 --
  $note=empty($row['note']) ? '':'<h3>◉ 注意事項：'.$row['note'].'</h3>';

  //-- 商店 --
  $ns_store=pdo_select('SELECT * FROM store WHERE Tb_index=:Tb_index', ['Tb_index'=>$row['ns_store']]);

  //-- 活動日期 --
  $ac_s_date=$row['activity_s_date']=='0000-00-00' ? '即日起' : $row['activity_s_date'];
  $ac_e_date=$row['activity_e_date'];
  $activity_date=$ac_s_date.'至'.$ac_e_date;
}


?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>網頁預覽
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">


					<div class="news_div">
             <h2><?php echo $row['ns_ftitle'];?></h2>
             <div class="second_div">
               <h4><?php echo $row['ns_stitle'];?></h4>
               
               <?php 
                //-- 銀行活動 --
                if ($row['ns_bank']!='no' && $row['ns_org']!='no') {
                  echo '<h4><img class="bank_logo" src="../../img/'.$bank_logo[$row['ns_bank']].'" alt=""> '.$bank_name[$row['ns_bank']].' <b>活動時間：'.$activity_date.'</b></h4>';
                }
                ?>
             </div>
                <div>
                               
                               <?php if(!empty($row['ns_photo_1'])){ ?>
                                 <div class="img_div">
                                  <img style="width: 100%;" src="../../img/<?php echo $row['ns_photo_1'];?>" alt="">
                                  <p>▲<?php echo $row['ns_alt_1'];?></p>
                                 </div>
                               <?php } ?>
                  

                                <div class="txt_div">
                                  <?php echo $row['ns_msghtml'];?>  
                                </div>
                               
                               <?php if(!empty($row['ns_photo_2'])){ ?>
                  <div class="img_div">
                    <img style="width: 100%;" src="../../img/<?php echo $row['ns_photo_2'];?>" alt="">
                    <?php 
                      if (!empty($row['ns_alt_2'])) {
                        echo '<p>▲'.$row['ns_alt_2'].'</p>';
                      }
                    ?>
                    
                  </div>
                 <?php } ?>

                 <?php echo $note; ?>
                 <?php echo $ns_news_txt; ?>
                 <h3 class="Warning_txt">謹慎理財，信用至 ; 以上活動內容以該銀行、公司公告為準</h3>
                  <p class="remark_p">【<?php echo $row['ns_date'];?> 卡優新聞網】http://www.cardu.com.tw</p>
                  <div class="news_info">
                    <p>好康分類：<?php echo $newsType_txt;?></p>
                    <p>上架日期：<?php echo $Start_End_day;?></p>
                    <p>好康來源：<?php echo $ns_bank_org;?></p>
                  </div>
                </div>
              </div>


				</div><!-- /.panel-body -->
			</div><!-- /.panel -->




		</div>

		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<button type="button" id="confirm_btn" class="btn btn-info btn-block btn-flat">確定</button>
						</div>
            <div class="col-lg-6">
              <button type="button" id="back_btn" class="btn btn-danger btn-block btn-flat" >返回</button>
            </div>
					</div>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

          //-- alt 圖說 --
          img_txt('.news_div p img');

          $('#confirm_btn').click(function(event) {
            location.replace('admin.php?MT_id=<?php echo $_GET['MT_id'];?>');
          });

          $('#back_btn').click(function(event) {
            location.replace('manager.php?MT_id=<?php echo $_GET['MT_id'];?>&Tb_index=<?php echo $_GET['Tb_index'];?>');
          });
          

          //-- 預覽、更新 ---
          $("#submit_btn").click(function(event) {

          	var err_txt='';
          	err_txt = err_txt + check_input( '[name="ns_nt_pk"]', '新聞分類，' );
          	err_txt = err_txt + check_input( '#ns_ftitle', '主標題，' );
          	err_txt = err_txt + check_input( '#ns_stitle', '副標題，' );
          	// err_txt = err_txt + check_input( '[name="ns_msghtml"]', '內容，' );
          	err_txt = err_txt + check_input( '[name="ns_label[]"]', '標籤，' );
          	err_txt = err_txt + check_input( '#ns_reporter', '撰文者' );
          	err_txt = err_txt + check_input( '[name="ns_reporter_type"]', '撰文者類型' );


          	if (err_txt!='') {
          	 alert("請輸入"+err_txt+"!!");
          	}
          	else{
              
             $('#ns_verify').val(2);

             if (confirm('是否要更新??')){
               $('#put_form').submit();
             }
          	}
          });



      });
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

