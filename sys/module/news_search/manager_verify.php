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

  //-- 分類上架數量-1 & 累計總數-1 --
  if ($_POST['ns_verify']=='5' || $_POST['ns_verify']=='6') {
    $row_news=$NewPdo->select("SELECT ns_nt_pk FROM appNews WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['Tb_index']], 'one');
    $NewPdo->select("UPDATE news_type SET nt_online=nt_online-1, nt_total=nt_total-1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$row_news['ns_nt_pk']]);
  }
  
  location_up('admin.php?MT_id='.$_POST['MT_id'], '審核完成');
}

if ($_GET) {
 	$where=array('Tb_index'=>$_GET['Tb_index']);
 	$row=pdo_select('SELECT * FROM appNews WHERE Tb_index=:Tb_index', $where);

  $ns_reporter_type=$row['ns_reporter_type']==2 ? '發表人':'記者';
  
  //-- 新聞分類 --
  $newsType_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_pk']], 'one');
  $newsType_sp_name=$NewPdo->select("SELECT nt_name FROM news_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$row['ns_nt_sp_pk']], 'one');
  $newsType_txt=empty($newsType_sp_name['nt_name']) ? $newsType_name['nt_name'] : $newsType_name['nt_name'].'｜'.$newsType_sp_name['nt_name'].'｜';

  $Start_End_day=$row['StartDate'].' ~ '.$row['EndDate'];

  //-- 分類 --
  $news_types=pdo_select_NEW("SELECT nt_name FROM news_type WHERE Tb_index IN (:ns_nt_pk,:ns_nt_sp_pk)", ['ns_nt_pk'=>$row['ns_nt_pk'], 'ns_nt_sp_pk'=>$row['ns_nt_sp_pk']]);
  $news_types_txt='';
  foreach ($news_types as $news_types_one) {
    $news_types_txt.=$news_types_one['nt_name'].',';
  }

  //-- 銀行 --
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
 }



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
                  <p ><?php echo $ns_reporter_type.' '.$row['ns_reporter'].'報導 '.$row['ns_date'];?></p>
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

                  <p class="remark_p">【<?php echo $row['ns_date'];?> 卡優新聞網】http://www.cardu.com.tw</p>
                  <div class="news_info">
                    <p>新聞分類：<?php echo $newsType_txt;?></p>
                    <p>上架日期：<?php echo $Start_End_day;?></p>
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
      
      <!-- 審核 -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <header>審核</header>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <ul>
                <li>新聞分類：<?php echo $news_types_txt;?></li>
                <li>標籤： <?php echo $row['ns_label'];?></li>
                <li>延伸閱讀：
                  <ul>
                    <?php echo $ns_news_name_txt;?>
                  </ul>
                </li>
                <li>發卡組織：<?php echo $news_orgs_txt;?></li>
                <li>銀行關聯：<?php echo $news_banks_txt;?></li>
                <li>商店關聯：<?php echo $ns_store['st_name'];?></li>
                <li>撰文者：<?php echo $row['ns_reporter'];?></li>
                <li>新聞發布日期：<?php echo $row['ns_date'];?></li>
                <li>新聞上架日期：<?php echo $row['StartDate'].' ~ '.$row['EndDate'];?></li>
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
                    <label><input type="checkbox" name="google" value="google"> Google｜</label>
                    <label><input type="checkbox" name="yahoo" value="yahoo"> Yahoo｜</label><label><input type="checkbox" name="msn" value="msn"> MSN｜</label><label><input type="checkbox" name="hinet" value="hinet"> HiNet｜</label><label><input type="checkbox" name="yam" value="yam"> Yam天空｜</label><label><input type="checkbox" name="newsrepb" value="newsrepb"> Newsrepublic｜</label><label><input type="checkbox" name="linetoday" value="linetoday"> Line Today</label>
                  </div>
                </div>
                <input type="hidden" name="MT_id" value="<?php echo $_GET['MT_id'];?>">
                <input type="hidden" name="Tb_index" value="<?php echo $_GET['Tb_index'];?>">
              </form>
            </div>
          </div>
          
        </div><!-- /.panel-body -->
      </div><!-- /.panel -->
      <!-- 審核 END -->

		</div>



	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

         //-- alt 圖說 --
         img_txt('.news_div p img');


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

