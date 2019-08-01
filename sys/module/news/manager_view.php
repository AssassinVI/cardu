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



}


?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
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
                <p><?php echo $ns_reporter_type.' '.$row['ns_reporter'].'報導 '.$row['ns_date'];?></p>
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
                  <div class="img_div">
                    <img style="width: 100%;" src="../../img/<?php echo $row['ns_photo_2'];?>" alt="">
                    <?php 
                      if (!empty($row['ns_alt_2'])) {
                        echo '<p>▲'.$row['ns_alt_2'].'</p>';
                      }
                    ?>
                    
                  </div>
                 <?php } ?>

                  <p class="remark_p">【<?php echo $row['ns_date'];?> 卡優新聞網】http://www.cardu.com.tw</p>
                  <div class="news_info">
                    <p>新聞分類：<?php echo $newsType_txt;?></p>
                    <p>上架日期：<?php echo $Start_End_day;?></p>
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
          <button type="button" id="confirm_btn" class="btn btn-info btn-flat">確定</button>
          <button type="button" id="back_btn" class="btn btn-danger btn-flat" >返回</button>
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
          img_750_w('.news_div img');
          //-- table 優化 --
          html_table('.news_div>table');

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

