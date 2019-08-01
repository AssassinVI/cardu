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

  $ns_reporter_type=$row['ns_reporter_type']==2 ? '發表人':'記者';
  
  $newsType_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']], 'one');
  $newsType_sp_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_sp_pk']], 'one');
  $newsType_txt=empty($newsType_sp_name['nt_name']) ? $newsType_name['nt_name'] : $newsType_name['nt_name'].'｜'.$newsType_sp_name['nt_name'].'｜';
  $Start_End_day=$row['StartDate'].' ~ '.$row['EndDate'];




  //------------------- 情報來源 ----------------------

  //-- 銀行卡 --
  $where=['news_id'=>$_GET['Tb_index']];
  $row_bank_card=$NewPdo->select("SELECT nbc.card_type, nbc.bank_id, nbc.card_group_id, nbc.org_id, nbc.level_id, bk.bi_code, bk.bi_shortname, bk.bi_logo, cc.cc_cardname, org.org_nickname, level.attr_name
                                                      FROM appNews_bank_card as nbc 
                                                      INNER JOIN bank_info as bk ON nbc.bank_id=bk.Tb_index 
                                                      INNER JOIN credit_card as cc ON nbc.card_group_id=cc.cc_group_id 
                                                      INNER JOIN card_org as org ON nbc.org_id=org.Tb_index 
                                                      INNER JOIN card_level as level ON nbc.level_id=level.Tb_index 
                                                      WHERE nbc.news_id=:news_id AND nbc.bank_id!='' AND nbc.card_group_id!='' 
                                                      GROUP BY nbc.Tb_index
                                                      ORDER BY nbc.bank_id, nbc.card_group_id, nbc.org_id, nbc.level_id", $where);

  foreach ($row_bank_card as $row_bank_card_one) {
    //-群組銀行-
    $bank_card_group[$row_bank_card_one['bi_shortname']][]=$row_bank_card_one;
  }

  //-- 卡組織 --
  $where=['news_id'=>$_GET['Tb_index']];
  $row_orglevel=$NewPdo->select("SELECT nbc.card_type, nbc.org_id, nbc.level_id, org.org_nickname, level.attr_name
                                                      FROM appNews_bank_card as nbc 
                                                      INNER JOIN card_org as org ON nbc.org_id=org.Tb_index 
                                                      INNER JOIN card_level as level ON nbc.level_id=level.Tb_index 
                                                      WHERE nbc.news_id=:news_id AND nbc.bank_id='' AND nbc.card_group_id='' 
                                                      ORDER BY nbc.org_id, nbc.level_id", $where);


  //----------------- 情報來源 END-----------------------




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

  //-- 情報來源網址 --
  $sourceUrl=empty($row['sourceUrl']) ? '':'<h3>◉ 情報來源網址：'.$row['sourceUrl'].'</h3>';

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
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>卡情報預覽
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
                     if (count($bank_card_group)>=2) {
                       echo '<h4><b>活動時間：'.$activity_date.'</b></h4>';
                     }
                     else{
                       foreach ($bank_card_group as $key => $bank_card){
                         echo '<h4><img class="bank_logo" src="../../img/'.$bank_card[0]['bi_logo'].'" alt=""> '.$key.' <b>活動時間：'.$activity_date.'</b></h4>';
                       }
                     }
                   }
                   ?>
             </div>
                <div>
                               
                               <?php if(!empty($row['ns_photo_1'])){ ?>
                                 <p>
                                  <img src="../../img/<?php echo $row['ns_photo_1'];?>" alt="<?php echo $row['ns_alt_1'];?>">
                                 </p>
                               <?php } ?>
                  

                                <div class="txt_div">
                                  <?php echo $row['ns_msghtml'];?>  
                                </div>
                               
                               <?php if(!empty($row['ns_photo_2'])){ ?>
                                 <p>
                                  <img src="../../img/<?php echo $row['ns_photo_2'];?>" alt="<?php echo $row['ns_alt_2'];?>">
                                 </p>
                               <?php } ?>

                 <?php echo $note; ?>
                 <?php echo $ns_news_txt; ?>
                 <?php echo $sourceUrl; ?>
                 <h3 class="Warning_txt">謹慎理財，信用至 ; 以上活動內容以該銀行、公司公告為準</h3>

                  <p class="remark_p">【<?php echo $row['ns_date'];?> 卡優新聞網】http://www.cardu.com.tw</p>
                  <div class="news_info">
                    <p>情報分類：<?php echo $newsType_txt;?></p>
                    <p>上架日期：<?php echo $Start_End_day;?></p>
                    <p>情報來源：
                     <?php 
                       //-- 銀行卡 --
                       foreach ($bank_card_group as $key => $bank_card) {
                         
                         echo '<div>'.$key.'<a class="check_bank_card" href="javascript:;">查看</a>
                                  <div style="display: none">';
                             
                             foreach ($bank_card as $bank_card_one) {
                                $card_type=$bank_card_one['card_type']=='1' ? '信用卡':'金融卡';
                                echo $key.$bank_card_one['cc_cardname'].$bank_card_one['org_nickname'].$bank_card_one['attr_name'].'<br>';
                             }  

                         echo '   </div>
                              </div>';
                       }

                       //-- 卡組織 --
                       foreach ($row_orglevel as $row_orglevel_one) {
                         echo '所有銀行'.$row_orglevel_one['org_nickname'].$row_orglevel_one['attr_name'].'<br>';
                       }
                     ?>
                    </p>
                  </div>
                </div>
              </div>


				</div><!-- /.panel-body -->
			</div><!-- /.panel -->




		</div>

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
          <button type="button" id="confirm_btn" class="btn btn-info  btn-flat">確定</button>
          <button type="button" id="back_btn" class="btn btn-danger  btn-flat" >返回</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

          //-- alt 圖說 & 手機加入fancybox --
          img_txt('.news_div p img');
                  
          //-- 圖寬限制 --
          img_750_w('.news_div p img');
          //-- table 優化 --
          html_table('.news_div>table');


          //-- 查看展開 --
          $('.check_bank_card').click(function(event) {
            $(this).next().slideToggle('fast');
          });


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

