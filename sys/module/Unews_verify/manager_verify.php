<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
.news_div{ width: 782px; margin:auto; padding: 15px; border: 1px solid #ccc;  border-radius: 20px 0;}
  .news_div h2{  font-weight: 600; color: #3c4f97; font-size: 26px; }
  .news_div h4{ font-weight: 500; font-size: 20px; }
  .news_div p{ font-size: 16px; }
  .news_div .img_div{ padding: 5px 0; border-bottom: 1px solid #e9e9e9; }
  .img_div p{ margin: 5px 0 0 0; font-size: 13px;}
  .txt_div { margin: 2rem 0; }
  .txt_div p{ font-size: 18px; letter-spacing: 1px; line-height: 1.7; margin: 2rem 0; margin: 2rem 0; text-align: justify;}
  .remark_p{ margin:2rem 0; }

#over_bank{ margin-bottom: 15px; }
.form-group{ margin-bottom:0; padding: 1rem 0; }
.form-group:nth-child(odd){ background-color: #f5f5f5; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 

if($_POST){

  $parem=[
    'ns_verify'=>$_POST['ns_verify'],
    'ns_vfman_2'=>$_SESSION['admin_index'],
    'ns_vfman_2_name'=>$_SESSION['admin_name'],
    'ns_vfdate'=>date('Y-m-d H:i:s'),
    'ns_reason'=>$_POST['ns_reason']
  ];
  $where=['Tb_index'=>$_POST['Tb_index']];
  pdo_update('appNews', $parem, $where);
  
  location_up('admin.php?MT_id='.$_POST['MT_id'], '審核完成');
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM appNews WHERE Tb_index=:Tb_index', $where);

  $ns_reporter_type=$row['ns_reporter_type']==2 ? '發表人':'記者';

  //-- 情報分類 --
  $newsType_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']], 'one');
  $newsType_sp_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_sp_pk']], 'one');
  $newsType_txt=empty($newsType_sp_name['nt_name']) ? $newsType_name['nt_name'] : $newsType_name['nt_name'].'｜'.$newsType_sp_name['nt_name'].'｜';

  $Start_End_day=$row['StartDate'].' ~ '.$row['EndDate'];

  //-- 情報來源 --
  $bank_name=[];
  $bank_arr=pdo_select('SELECT Tb_index, bi_shortname FROM bank_info', 'no');
  foreach ($bank_arr as $bank_one) {
    $bank_name[$bank_one['Tb_index']]=$bank_one['bi_shortname'];
  }
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

  //---------------------------------------- 分類 ------------------------------------
  $type_arr=[];
  $area_id_arr=[];
  $news_types=pdo_select("SELECT Tb_index ,nt_name, area_id FROM news_type", 'no');
  foreach ($news_types as $news_type_one) {
    $type_arr[$news_type_one['Tb_index']]=$news_type_one['nt_name'];
    $area_id_arr[$news_type_one['Tb_index']]=$news_type_one['area_id'];
  }
  
  $area_arr=[];
  $area=pdo_select("SELECT Tb_index ,at_name FROM appArea", 'no');
  foreach ($area as $area_one) {
    $area_arr[$area_one['Tb_index']]=$area_one['at_name'];
  }
  
  //-- 情報分類 --
  $ns_nt_pk=empty($row['ns_nt_pk']) ? '': $type_arr[$row['ns_nt_pk']];
  //-- 特別議題 --
  $ns_nt_sp_pk=empty($row['ns_nt_sp_pk']) ? '': $type_arr[$row['ns_nt_sp_pk']];
  //-- 上刊到其他單元 --
  $ns_nt_ot_pk_txt='';
  $ns_nt_ot_pk=empty($row['ns_nt_ot_pk']) ? '': explode(',', $row['ns_nt_ot_pk']);
  foreach ($ns_nt_ot_pk as $ns_nt_ot_pk_one) {

    if (empty($area_arr[$area_id_arr[$ns_nt_ot_pk_one]])) {
      $ns_nt_ot_pk_txt.='[卡情報-'.$type_arr[$ns_nt_ot_pk_one].'] ,';
    }
    else{
      $ns_nt_ot_pk_txt.='['.$area_arr[$area_id_arr[$ns_nt_ot_pk_one]].'-'.$type_arr[$ns_nt_ot_pk_one].'] ,';
    }
  }


  //---------------------------------------- 銀行 -------------------------------------
  $ns_bank=explode(',', $row['ns_bank']);
  $ns_bank_txt='';
  for ($i=0; $i <count($ns_bank) ; $i++) { 
    $ns_bank_txt.='"'.$ns_bank[$i].'",';
  }
  $ns_bank_txt=substr($ns_bank_txt, 0,-1);
  $news_banks=pdo_select_NEW("SELECT bi_shortname FROM bank_info WHERE Tb_index IN (".$ns_bank_txt.")", 'no');
  $news_banks_txt='';
  foreach ($news_banks as $news_banks_one) {
    $news_banks_txt.=$news_banks_one['bi_shortname'].',';
  }

  //-- 組織 --
  $ns_org=explode(',', $row['ns_org']);
  $ns_org_txt='';
  for ($i=0; $i <count($ns_org) ; $i++) { 
    $ns_org_txt.='"'.$ns_org[$i].'",';
  }
  $ns_org_txt=substr($ns_org_txt, 0,-1);
  $news_orgs=pdo_select_NEW("SELECT org_name,mt_id FROM card_org WHERE Tb_index IN (".$ns_org_txt.")", 'no');
  $news_orgs_txt='';
  foreach ($news_orgs as $news_orgs_one) {

    //-- 信用卡 --
    if ($news_orgs_one['mt_id']=='site2018110611172385') {
      $news_orgs_txt.='[信用卡]'.$news_orgs_one['org_name'].',';
    }

    //-- 金融卡 --
    else{
      $news_orgs_txt.='[金融卡]'.$news_orgs_one['org_name'].',';
    }
    
  }

  //-- 延伸閱讀 --
  if (!empty($row['ns_news'])) {
    //-- 審核 --
    $ns_news_name_txt='';
    $ns_news=explode(',', $row['ns_news']);
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
     $ns_news_name_txt.='<li><a href="javascript:;" onclick="window.open(\''.$window_URL.'\', \''.$ns_news_name['ns_ftitle'].'\', config=\'height=800,width=900\');">'.$ns_news_name['ns_ftitle'].'</a></li>';
    }

    //-- 預覽 --
    $ns_news_txt='<h3> ◉ 延伸閱讀：
                     <ul>
                      '.$ns_news_name_txt.'
                     </ul>
                 </h3>';
  }
  
  //-- 注意事項 --
  $note=empty($row['note']) ? '':'<h3>◉ 注意事項：'.$row['note'].'</h3>';

  //-- 情報來源網址 --
  $sourceUrl=empty($row['sourceUrl']) ? '':'<h3>◉ 情報來源網址：'.$row['sourceUrl'].'</h3>';

  //-- 商店 --
  $ns_store=pdo_select('SELECT * FROM store WHERE Tb_index=:Tb_index', ['Tb_index'=>$row['ns_store']]);
  
     
}


?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>網頁審核
					</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body over-85">

          <div class="row">
            
            <div class="col-md-12">

              <div class="news_div">
                <h2><?php echo $row['ns_ftitle'];?></h2>
                <div class="second_div">
                  <h4><?php echo $row['ns_stitle'];?></h4>
                  <p><img class="store_logo" src="../../img/<?php echo $ns_store['st_logo'];?>" alt=""></p>
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
                    <p>▲<?php echo $row['ns_alt_2'];?></p>
                  </div>
                 <?php } ?>

                                <?php echo $note; ?>
                                <?php echo $ns_news_txt; ?>
                                <?php echo $sourceUrl; ?>
                                <h3 class="Warning_txt">謹慎理財，信用至 ; 以上活動內容以該銀行、公司公告為準</h3>
                  <p class="remark_p">【<?php echo $row['ns_date'];?> 卡優新聞網】http://www.cardu.com.tw</p>
                  <div class="news_info">
                    <p>情報分類：<?php echo $newsType_txt;?></p>
                    <p>上架日期：<?php echo $Start_End_day;?></p>
                    <p>情報來源：<?php echo $ns_bank_org;?></p>
                  </div>

                </div>
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

    <!-- 審核 -->
    <div class="col-lg-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <header>審核</header>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <ul>
                <li>情報分類：<?php echo $ns_nt_pk;?></li>
                <li>特別議題：<?php echo $ns_nt_sp_pk;?></li>
                <li>上刊到其他單元：<?php echo $ns_nt_ot_pk_txt;?></li>
                <li>標籤： <?php echo $row['ns_label'];?></li>
                <li>延伸閱讀：
                  <ul>
                    <?php echo $ns_news_name_txt;?>
                  </ul>
                </li>
                <li>發卡組織：<?php echo $news_orgs_txt;?></li>
                <li>來源銀行：<?php echo $news_banks_txt;?></li>
                <li>來源商店：<?php echo $ns_store['st_name'];?></li>
                <li>撰文者：<?php echo $row['ns_reporter'];?></li>
                <li>發布日期：<?php echo $row['ns_date'];?></li>
                <li>上架日期：<?php echo $row['StartDate'].' ~ '.$row['EndDate'];?></li>
                <li>完稿時間：<?php echo $row['ns_fwdate'];?></li>
              </ul>

              <form id="put_form" action="manager_verify.php" method="POST" class="form-horizontal">
                <div class="form-group">
                  <div class="col-md-12">
                    <h4>審核狀態：</h4>
                    <select name="ns_verify" id="ns_verify" class="form-control">
                      <option value="">-- 請選擇 --</option>
                      <option value="3">審核通過</option>
                      <option value="5">退稿</option>
                      <option value="6">退件</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                   <h4>退稿/退件原因說明：</h4>
                   <textarea style="height: 200px;" class="form-control" name="ns_reason"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <h4>合作廠商：</h4>
                    <label><input type="checkbox" name="Google" value="Google"> Google｜</label>
                    <label><input type="checkbox" name="Yahoo" value="Yahoo"> Yahoo｜</label>
                    <label><input type="checkbox" name="PChome" value="PChome"> PChome｜</label>
                    <label><input type="checkbox" name="HiNet" value="HiNet"> HiNet｜</label>
                    <label><input type="checkbox" name="MSN" value="MSN"> MSN｜</label>
                    <label><input type="checkbox" name="yam" value="yam"> Yam天空｜</label>
                    <label><input type="checkbox" name="newsrepb" value="newsrepb"> Newsrepublic｜</label>
                    <label><input type="checkbox" name="Life" value="Life"> Life｜</label>
                    <label><input type="checkbox" name="linetoday" value="linetoday"> Line Today</label>
                  </div>
                </div>
                <input type="hidden" name="MT_id" value="<?php echo $_GET['MT_id'];?>">
                <input type="hidden" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
              </form>
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



          $('#confirm_btn').click(function(event) {
            if ($('#ns_verify').val()!='') {
              $('#put_form').submit();
            }
            else{
              alert('請選擇審核狀態');
            }
            
          });

          $('#back_btn').click(function(event) {
            window.history.back();
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

          //-- 草稿 ---
          $("#draft_btn").click(function(event) {

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

            $('#ns_verify').val(0);

             if (confirm('是否要更新草稿??')) {
              $('#put_form').submit();
             }
            }
          });


    //------------------------------ 刪圖 ---------------------------------
          $("#one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            aPic: '<?php echo $row["aPic"]?>',
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $("#img_div").html('');
			}
		});

    //------------------------------ 刪檔 ---------------------------------
          $(".one_del_img").click(function(event) { 
			if (confirm('是否要刪除圖檔?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                            aPic: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});

    //------------------------------ 刪檔 ---------------------------------
          $(".one_del_file").click(function(event) { 
			if (confirm('是否要刪除檔案?')) {
			 var data={
			 	        Tb_index: $("#Tb_index").val(),
                       OtherFile: $(this).next().next().val(),
                            type: 'delete'
			          };	
               ajax_in('manager.php', data, '成功刪除', 'no');
               $(this).parent().html('');
			}
		});


    //------------------------------- 審核狀態更改 -------------------------------------
    $('#ns_verify').change(function(event) {
      if ($(this).val()==3) {
        $('[name="google"]').prop('checked', true);
        $('[name="yahoo"]').prop('checked', true);
        $('[name="msn"]').prop('checked', true);
        $('[name="hinet"]').prop('checked', true);
        $('[name="yam"]').prop('checked', true);
        $('[name="newsrepb"]').prop('checked', true);
        $('[name="linetoday"]').prop('checked', true);
      }
      else{
        $('[name="google"]').prop('checked', false);
        $('[name="yahoo"]').prop('checked', false);
        $('[name="msn"]').prop('checked', false);
        $('[name="hinet"]').prop('checked', false);
        $('[name="yam"]').prop('checked', false);
        $('[name="newsrepb"]').prop('checked', false);
        $('[name="linetoday"]').prop('checked', false);
      }
    });


      });


	$(window).on('load',  function(event){
		sessionStorage.clear();

    //-- alt 圖說 & 手機加入fancybox --
    img_txt('.news_div p img');
            
    //-- 圖寬限制 --
    img_750_w('.news_div p img');
    //-- table 優化 --
    html_table('.news_div>table');
        
        //-- 新聞分類 --
		if ($('[name="ns_nt_pk"]').length>0) {
            
			//-- 記錄暫存 --
            sessionStorage.setItem("news_type", $('[name="ns_nt_pk"]').val());
            sessionStorage.setItem("news_sp_type", $('[name="ns_nt_sp_pk"]').val());
		}
        
        //-- 標籤 --
		if ($('[name="ns_label[]"]').length>0) {
            var lab_arr=[];
			$.each($('[name="ns_label[]"]'), function() {
			  lab_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_label", lab_arr);
		}
        
        //-- 銀行關聯 --
		if ($('[name="ns_bank[]"]').length>0) {
            var bank_arr=[];
			$.each($('[name="ns_bank[]"]'), function() {
			  bank_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_bank", bank_arr);
		}

		//-- 發卡組織關聯 --
		if ($('[name="ns_org[]"]').length>0) {
            var org_arr=[];
			$.each($('[name="ns_org[]"]'), function() {
			  org_arr.push($(this).val());
			});
			//-- 記錄暫存 --
            sessionStorage.setItem("news_org", org_arr);
		}
	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>

